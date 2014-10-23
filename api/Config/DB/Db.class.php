<?php

class MysqlException extends Exception {
  public $backtrace;
  public function __construct($message=false, $code=false) {
    if(!$message) {
      $this->message = mysql_error();
    }
    if(!$code) {
      $this->code = mysql_errno();
    }
    $this->backtrace = debug_backtrace();
  }
    public function __get($name)
    {
        return $this->$name;
    }
}



class Db{

	private static $link;


	public $option;


    public $vars_all;

    public $vars;

    public $vars_number;

    private $result;


    private $log_file;

	 // 查询表达式
    protected $selectSql  = 'SELECT%DISTINCT% %FIELD% FROM %TABLE%%JOIN%%WHERE%%GROUP%%HAVING%%ORDER%%LIMIT% %UNION%%COMMENT%';

	public function __construct() {

		$this->connect();

        $this->log_file = SQLLog . date("Y_m_d") . '.log';
	}


    /**
     * 链接数据库
     */

    private function connect(){

		if(!self::$link) {  

            self::$link = mysql_connect($_ENV['DBHOST'], $_ENV['DBUSER'], $_ENV['DBPASS']);  

            @mysql_query('set names utf8');

            mysql_select_db($_ENV['DBNAME']);  

        }  

        return self::$link; 

	}

    /**
     * 查询
     */


	public function select($options){

		$sql =  $this->parseSql($this->selectSql,$options);

		return $this->getAll($sql);  
	}


    public function getAll($sql){


        $this->query($sql);


        $item = $this->fetchall_assoc($data);  

        if(!empty($item)){

            $result[0] = $item[0];

            $result[1] = $item;

            $result[2] = count($item);

        }

       return $result;   
    }

    protected function parseSet($data) {
        
        if(is_array($data)){

            foreach($data as $k=>$v){


                if(is_numeric($v)){

                    $set[] = $k.' = '.$v; 

                } else{

                    $set[] = $k.' like "'.$v.'"'; 
                }

               
            }

        }

        return ' SET '.implode(',',$set);
    }


	 public function parseSql($sql,$options=array()){
        $sql   = str_replace(
            array('%TABLE%','%DISTINCT%','%FIELD%','%JOIN%','%WHERE%','%GROUP%','%HAVING%','%ORDER%','%LIMIT%','%UNION%','%COMMENT%'),
            array(
                $this->parseTable($options['table']),
                $this->parseDistinct(isset($options['distinct'])?$options['distinct']:false),
                $this->parseField(!empty($options['fields'])?$options['fields']:'*'),
                $this->parseJoin(!empty($options['join'])?$options['join']:''),
                $this->parseWhere(!empty($options['where'])?$options['where']:''),
                $this->parseGroup(!empty($options['group'])?$options['group']:''),
                $this->parseHaving(!empty($options['having'])?$options['having']:''),
                $this->parseOrder(!empty($options['order'])?$options['order']:''),
                $this->parseLimit(!empty($options['limit'])?$options['limit']:''),
                $this->parseUnion(!empty($options['union'])?$options['union']:''),
                $this->parseComment(!empty($options['comment'])?$options['comment']:'')
            ),$sql);
        return $sql;
    }


    public function update($option){

        $sql   = 'UPDATE '
            .$this->parseTable($option['table'])
            .$this->parseSet($option['update'])
            .$this->parseWhere(!empty($option['where'])?$option['where']:'')
            .$this->parseOrder(!empty($option['order'])?$option['order']:'')
            .$this->parseLimit(!empty($option['limit'])?$option['limit']:'');

       $result = $this->query($sql);

       return $result;        
    }


    public function delete($option){

        $sql   = 'DELETE FROM'
            .$this->parseTable($option['table'])
            .$this->parseWhere(!empty($option['where'])?$option['where']:'');

       $result = $this->query($sql);

       return $result;        
    }


    public function parseTable($tables){

    	if(is_string($tables)){

    		return $tables;
    	}

    }


    public function parseDistinct($distinct){


    }

    public function parseField($field){

    	return $field;
    }

    public function parseJoin($join){

        if(is_string($join)){


            return ' '.$join;
        }
    }

    public function parseWhere($where){

    	if(is_string($where) && $where != ''){

    		return ' WHERE '.$where;

    	} elseif (is_array($where)) {

    		$wheres = ' WHERE 1';
    			
    		foreach ($where as $key => $value) {
    			
    			if(is_numeric($value)){

    				$wheres.=' AND `'.$key.'` = '.$value;

    			} else{

    				$wheres.=' AND `'.$key.'` like "'.$value.'"';

    			}

    		}
    		return $wheres;

    	} else{

            return '';
        }

    }

    public function parseGroup($group){

        $str = '';

        if(is_array($group)){

            $group_all = implode(',', $group);

            $str .= 'GROUP BY '.$group_all;

        } elseif(is_string($group) && $group !=''){

            $str.=' GROUP BY '.$group;

        }

        return $str;

    }

    public function parseHaving($having){


    }

    public function parseOrder($order){

    	if(is_string($order) && $order !=''){

    		return ' ORDER BY '.$order;

    	} elseif (is_array($order)) {
    			
    		$array = array();

    		foreach ($order as $key => $value) {
    				
    		    if(is_numeric($key)) {
                    $array[] =  $value;
                }else{
                    $array[] =  $key.' '.$value;
                }

    		}

    		$order   =  implode(',',$array);

    		return ' ORDER BY '.$order;

    	} else{

            return $order;
        }

    }

    public function parseLimit($limit){


        return !empty($limit)?   ' LIMIT '.$limit.' ':'';
    }

    public function  parseUnion($union){



    }

    public function parseComment($comment){


    }


    public function add($data,$options,$replace = false){

        if(is_array($data)){

            foreach($data as $k=>$v){

                $fields[] = '`'.$k.'`';

                $values[]= '"'.$v.'"';
            }

           $sql = ($replace?'REPLACE':'INSERT').' INTO '.$this->parseTable($options['table']).' ('.implode(',', $fields).') VALUES ('.implode(',', $values).')';

           $this->query($sql);

           $last_id = mysql_insert_id();

           return $last_id;
        }

    }


    public function query($sql) {  

        
        $this->result = mysql_query($sql, self::$link);

        //echo $sql.'<br />';

        log_write($sql, $this->log_file, 'SQL');

        if (!$this->result) {
            throw new MysqlException;
        }
    }  


    public function fetchall_assoc() {
        $retval = array();
        while ($row = $this->fetch_assoc()) {
            $retval[] = $row;
        }
        return $retval;
    }

     public function fetch_assoc() {
        return mysql_fetch_assoc($this->result);
    }

}
?>