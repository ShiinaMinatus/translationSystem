<?php

/**
 * 模版基类
 */
class Action {

    public $smarty;
    public $display_page;
    public $dir_name;
    public $smarty_dir;
    public $tVar;
    public $userOpenId;
    public $requset;

    public function __construct() {

        if (!empty($_SESSION['user']['user_id']) && $_SESSION['user']['user_id'] > 0) {

            $this->assign('whether_login', 1);


            $this->assign('userInfo', $_SESSION['user']);
        } else {

            $this->assign('whether_login', 0);
        }
    }

    private function initView() {

        if (!$this->smarty) {

            // 载入  smarty 文件
            require_once ROOT_DIR . '/Config/bootstrap/smarty.php';

            $this->smarty = $smarty;

            if (!empty($this->display_page)) {
                
            } else {

                $this->display_page = ACTION_NAME;
            }

            if (!empty($this->dir_name)) {

                $this->smarty_dir = $this->dir_name;
            } else {

                $this->smarty_dir = MODULE_DIR;
            }

            $dir = LIB . MODULE_DIR . '/Tpl/' . $this->smarty_dir . '/';


            $this->smarty->template_dir = $dir;
        }

        if ($this->tVar) {

            $this->smarty->assign($this->tVar);
        }
    }

    protected function setDir($dir) {

        $this->dir_name = $dir;
    }

    protected function fetch($tpl) {


        $this->initView();

        if (!empty($tpl)) {

            $page = $tpl . '.tpl';
        } else {

            $page = $this->display_page . '.tpl';
        }

        return $this->smarty->fetch($page);
    }

    protected function display($page = '') {


        $this->initView();


        if (!file_exists($this->smarty->template_dir)) {

            mkdir($this->smarty->template_dir);

            chmod($this->smarty->template_dir, 0777);
        }


        if (!empty($page)) {

            $displayPage = $page;
        } else {

            $displayPage = $this->display_page;
        }

        if (!file_exists($this->smarty->template_dir . $displayPage . '.tpl')) {

            fopen($this->smarty->template_dir . $displayPage . '.tpl', "w+");

            chmod($this->smarty->template_dir . $displayPage . '.tpl', 0777);
        }


        $this->smarty->assign('websiteUrl', WebSiteUrl);


        $this->smarty->assign('WebSiteUrlPublic', WebSiteUrlPublic);
        $this->smarty->assign('MasterDirUrl', MasterDirUrl);


        $this->smarty->assign('WebSiteUrlEN', WebSiteUrlEN);

        $this->smarty->assign('Photo_Url', PHOTO_URL);
        $this->smarty->assign('ApiUrl', API_URL);

        $this->smarty->display($displayPage . '.tpl');
    }

    public function assign($name, $value = '') {

        if (is_array($name)) {

            $this->tVar = array_merge($this->tVar, $name);
        } else {

            $this->tVar[$name] = $value;
        }
    }

    public function errorDisplay($errorArray) {

        if (!empty($errorArray['error']) && is_array($errorArray['error'])) {
            
        }
    }

    public function jsJump($url) {

        exit('<script>window.location.href="' . $url . '";</script>');
    }

    public function aasdasf() {

        echo 'aaaaa';
    }

}

?>