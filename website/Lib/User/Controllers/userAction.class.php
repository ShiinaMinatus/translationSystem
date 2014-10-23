<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserAction extends Action {

    //首页d
    function userLogin() {
        $data['password'] = $_REQUEST['password'];
        $data['userName'] = $_REQUEST['userName'];
        $re = transferData("http://localhost/translationSystem/api/user/userLogin", "post", $data);
        $reValue = json_decode($re, true);
        if ($reValue == 1) {
            $this->display();
        } else {
            $this->display('userManger');
        }
    }

    function userRegister() {
        $mail['mail'] = $_POST['mail'];
        $reMail = transferData("http://localhost/translationSystem/api/user/isSetMail", "post", $mail);
        $reMail = json_decode($reMail, true);

        if ($reMail) {
            $returnValue = 3;
        } else {

            $re = transferData("http://localhost/translationSystem/api/user/userRegister", "post", $_POST);
            $reValue = json_decode($re, true);
            if ($reValue > 0) {
                $returnValue = 1;
            } else {
                $returnValue = 2;
            }
        }
        $this->assign("addFruit", $returnValue);
        $this->display();
    }

    function adminManger() {
        $reValue = transferData("http://localhost/translationSystem/api/user/checkUserAll", "post", "");
        $reValue = json_decode($reValue, true);
        $this->assign("checkUser", $reValue);
        $this->display();
    }

}
