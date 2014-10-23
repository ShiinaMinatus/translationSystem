<?php

class website {

    public function __construct() {

        /**
         * 初始化 加载配置文件
         */
        include_once 'defined.php';
        
        /**
         * 初始化 加载配置文件
         */
        include_once 'database.php';
        /**
         * 引入扩展函数库
         */
        include_once 'extends.php';
        /**
         * 载入 路由 规则
         */
        include_once 'Dispatcher.class.php';
    }

    public function run() {
        /**
         * 
         */
        $file_path = array('Config' => array('DB'),'Model'=>array('DAL','BLL'));



        foreach ($file_path as $fileKey => $fileValue) {

            include_path_file($fileValue, $fileKey);
        }
        
        $this->initialization();

       
    }

   
    
    
    private function setDatabase(){
        
        if(!empty($_ENV['database'])){
            
            $databaseInfo = $_ENV['database'][SOURCE];
            
            if(!empty($databaseInfo)){
                  
                defined('DBNAME') or define('DBNAME', $databaseInfo['dbname']);

                defined('USER') or define('USER', $databaseInfo['username']);

                defined('PASSWORD') or define('PASSWORD', $databaseInfo['password']);

                defined('DBHOST') or define('DBHOST',$databaseInfo['host']);
              
            } else{
                
                echoErrorCode(106);
            }
           
        }
        
    }

    private function initialization() {
        /**
         * 路由处理
         */
        $url = new Dispatcher();

      

        R(MODULE_URL, MODULE_DIR_NAME);

        
    }

}

?>
