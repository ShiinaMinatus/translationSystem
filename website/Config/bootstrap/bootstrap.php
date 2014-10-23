<?php

class website {

    public function __construct() {

        session_start();

        $host = $_SERVER['HTTP_HOST'];

        /**
         * 判断 访问的网址  如为localhost的时 加载本地配置文件 其他加载服务器匹配页面
         */
        if ($host != 'localhost') {


            include_once 'defined_server.php';

        } else {

            include_once 'defined.php';
        }
        /**
         * 引入扩展函数库
         */
        include_once 'extends.php';


        include_once 'Action.php';

        /**
         * 载入 路由 规则
         */
        include_once 'Dispatcher.class.php';
    }

    public function run() {


        /**
         * 加载Model以及DB层
         */
        $file_path = array('Config' => array('DB'),'Model','Plug');

        foreach ($file_path as $fileKey => $fileValue) {

            include_path_file($fileValue, $fileKey);
        }
        


    
        /**
         * 处理URL 以及 执行Action
         */
        $this->initializationWebsiteUrl();
    }

    private function initializationWebsiteUrl() {

        $Parameter = 0;

        /**
         * 路由处理
         */
        $url = new Dispatcher();

        /**
         * 加载该来源中 控制层文件
         */


        if ($this->fileExists(LIB . MODULE_DIR . '/Controllers/' . MODULE_NAME_CONTROLLER . '.class.php')) {

            include_once LIB . MODULE_DIR . '/Controllers/' . MODULE_NAME_CONTROLLER . '.class.php';

            if (class_exists(MODULE_NAME_CONTROLLER)) {

                /**
                 * 实例化类
                 */
                $className = MODULE_NAME_CONTROLLER;

                $module = new $className();


                if ($module && method_exists($module, ACTION_NAME)) {

                    /**
                     * 执行方法
                     */
                    call_user_func(array(&$module, ACTION_NAME));


                } else {


                    $Parameter = 1;
                }
            }
        } else {

            $Parameter = 1;
        }

    }

    private function fileExists($file) {

        if (file_exists($file)) {

            return true;
        } else {

            return false;
        }
    }

}

?>
