<?php

require 'Db.class.php';

class ActiveRecord extends Db {

    protected $db;

    public function __construct() {


        $this->db = new Db();
    }

    public function where($where) {

        $this->options['where'] = $where;

        return $this;
    }

    /**
     * 指定查询数量
     * @access public
     * @param mixed $offset 起始位置
     * @param mixed $length 查询数量
     * @return Model
     */
    public function limit($offset, $length = null) {
        if (is_null($length) && strpos($offset, ',')) {
            list($offset, $length) = explode(',', $offset);
        }
        $this->options['limit'] = intval($offset) . ( $length ? ',' . intval($length) : '' );

        return $this;
    }

    /**
     * 
     */
    public function join($join, $method = 'LEFT JOIN') {

        if (is_string($join)) {

            $this->options['join'] = $method . ' ' . $join;
        }

        return $this;
    }

    public function query($sql) {

        if (!empty($sql)) {

            $this->db->query($sql);

            return $this->db->fetchall_assoc();
        }
    }

    /**
     * 获取所有的数据
     */
    public function select($options = array()) {

        $option = $this->_parseOptions($options);

        $result = $this->db->select($option);

        if (!empty($result)) {

            $this->vars = $result[0];

            $this->vars_all = $result[1];

            $this->vars_number = $result[2];
        } else {

            $this->vars_number = 0;
        }
    }

    /**
     *  插入操作
     */
    public function add($data = '') {

        if (is_array($data)) {

            $option = $this->_parseOptions($options);

            return $this->db->add($data, $option);
        }
    }

    /**
     *  保存 
     */
    public function save($update = array()) {

        if (is_array($update)) {

            $this->options['update'] = $update;

            $option = $this->_parseOptions();

            return $this->db->update($option);
        }
    }

    /**
     * 删除
     */
    public function delete() {


        $option = $this->_parseOptions();

        return $this->db->delete($option);
    }

    /**
     * 排序  支持字符串 和 数组的形式
     */
    public function order($orderby) {

        $this->options['order'] = $orderby;

        return $this;
    }

    /**
     *  支持字符串和数组
     */
    public function group($group) {

        $this->options['group'] = $group;

        return $this;
    }


    /**
     * 根据条件来获取 需要的字段  支持array，string
     */

    public function field($field){

        if(is_string($field)){

            $this->options['fields'] = $field;

        } elseif (is_array($field)) {
            
            $this->options['fields'] = implode(',', $field);
        }

        return $this;

    }

    /**
     * 分析表达式
     * @access protected
     * @param array $options 表达式参数
     * @return array
     */
    protected function _parseOptions($options = array()) {
        if (is_array($options))
            $options = @array_merge($this->options, $options);

        if (!isset($options['table'])) {
            // 自动获取表名
            $options['table'] = $this->table_name;
        }

        // 查询过后清空sql表达式组装 避免影响下次查询
        $this->options = array();

        return $options;
    }

}

?>