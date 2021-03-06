<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserAction extends Action {

    //首页d
    function userLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data['password'] = $_REQUEST['password'];
            $data['userName'] = $_REQUEST['userName'];
            $re = transferData(API_URL . "user/userLogin", "post", $data);

            $reValue = json_decode($re, true);
            if ($reValue == 1) {
                $this->assign("userError", "用户名或密码错误");
                $this->display();
            } else {

                $_SESSION["userId"] = $reValue['id'];
                $_SESSION["userName"] = $reValue['user_name'];
                if ($reValue["loginType"] == 1) {
                    $postData["id"] = $reValue['id'];
                    $reAuthority = transferData(API_URL . "user/userAuthority", "post", $postData);
                    $reAuthority = json_decode($reAuthority, true);
                    isLogin();
                    $this->assign("authority", $reAuthority);
                    $this->assign("userInfo", $reValue);
                    $this->display('userManger');
                } else if ($reValue["loginType"] == 2) {
                    $_REQUEST['registerType'] = 2;

                    if ($reValue['user_mail_type'] == 0) {
                        $this->assign("addFruit", 2);
                        $this->register();
                    } else if ($reValue['user_info_type'] == 0) {
                        $this->assign("addFruit", 3);
                        $this->register();
                    } else if ($reValue['user_is_check'] == 0) {
                        $this->assign("addFruit", 4);
                        $this->register();
                    }
                }
            }
        } else {
            $this->display();
        }
    }

    function register() {
        if ($_REQUEST["registerType"] == 1 || !isset($_REQUEST["registerType"])) {
            $this->assign("addFruit", 1);
        }

        $this->display("register");
    }

    function getCode() {
        getCode();
    }

    function checkRegisterCode() {
        $checkCode = $_REQUEST['checkCode'];
        $checkCode = strtolower($checkCode);
        $localCheckCode = $_SESSION['code'];
        $localCheckCode = strtolower($localCheckCode);
        if ($checkCode == $localCheckCode) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    function checkUserActivation() {
        $data["id"] = $_GET["userId"];
        $reValue = transferData(API_URL . "user/checkUserActivation", "post", $data);
        $reValue = json_decode($reValue, true);
        if ($reValue) {
//            $this->assign("activationValue", "恭喜你账号激活成功，请完善您的个人信息");
            $this->assign("userId", $_GET["userId"]);
            $_REQUEST['registerType'] = 2;
            $this->assign("addFruit", 3);
            $this->register();
        } else {
            $this->assign("activationValue", "账号激活失败，请联系管理员");
            $this->display();
        }
    }

    function userRegister() {
        $regeditType = $_REQUEST['regestType'];

        $mail['mail'] = $_POST['mail'];
        $reMail = transferData(API_URL . "user/isSetMail", "post", $mail);
        $reMail = json_decode($reMail, true);

        if (!$reMail) {
            $returnValue = "error3";
        } else {

            $re = transferData(API_URL . "user/userRegister", "post", $_POST);
            $reValue = json_decode($re, true);
            if ($reValue > 0) {
                $returnValue = 2;
            } else {
                $returnValue = "error2";
                $this->assign("addFruit", $returnValue);
                $this->display("userRegister");
                die;
            }
        }
        $this->assign("addFruit", $returnValue);
        $this->display("register");
    }

    function UserFillInformation() {
        $_POST["id"] = $_GET["userId"];
        $reValue = transferData(API_URL . "user/fillUserInformation", "post", $_POST);
        $reValue = json_decode($reValue, true);
        if ($reValue) {
            $_REQUEST['registerType'] = 3;
            $this->assign("addFruit", 4);
            $this->register();
        } else {
            $this->assign("addFruit", "数据提交失败");
            $this->display("userRegister");
        }
    }

    function adminManger() {
        $reValue = transferData(API_URL . "user/checkUserAll", "post", "");
        $reValue = json_decode($reValue, true);
        $this->assign("checkUser", $reValue);
        $this->display();
    }

    function singleCheckUserInfo() {
        if (empty($_GET["userId"])) {
            $reValue = "error";
        } else {
            $userId = $_GET["userId"];
            $data["id"] = $userId;
            $reValue = transferData(API_URL . "user/getCheckUserById", "post", $data);
            $reValue = json_decode($reValue, true);
        }
        $this->assign("checkUser", $reValue);
        $this->display();
    }

    function addUser() {
        if (empty($_GET["userId"])) {
            $reValue = "error2";
            $this->assign("errorReturn", $reValue);
            $this->display('errorPage');
        } else {
            $userId = $_GET["userId"];
            $data["id"] = $userId;
            $reValue = transferData(API_URL . "user/checkUserToUser", "post", $data);
            $reValue = json_decode($reValue, true);
            $returnValue = transferData(API_URL . "user/checkUserAll", "post", "");
            $returnValue = json_decode($returnValue, true);
            $this->assign("checkUser", $returnValue);
            $this->display('adminManger');
        }
    }

    function rejectUser() {
        $reValue = transferData(API_URL . "user/rejectCheckUser", "post", $_POST);
        $reValue = json_decode($reValue, true);
        if ($reValue) {
            $returnValue = transferData(API_URL . "user/checkUserAll", "post", "");
            $returnValue = json_decode($returnValue, true);
            $this->assign("checkUser", $returnValue);
            $this->assign("printMessage", "您已经成功驳回邮箱为" . $_POST['mail'] . ",ID为" . $_POST['id'] . " 的用户的审核申请");
            $this->display('adminManger');
        } else {
            $this->assign("activationValue", "驳回失败，请联系管理员");
            $this->display('checkUserActivation');
        }
    }

    function userSetting() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            isLogin();
            $data["oldPassword"] = $_POST["oldPassword"];
            $data["newPassword"] = $_POST["newPassword"];
            $data["id"] = $_SESSION["userId"];
            $returnValue = transferData(API_URL . "user/passwordChange", "post", $data);
            $returnValue = json_decode($returnValue, true);
            if ($returnValue == "code1") {
                $errorMessage = "密码错误";
            } else if ($returnValue == "code2") {
                $errorMessage = "修改成功";
            } else {
                $errorMessage = "发生未知错误";
            }
            $this->assign("errorMessag", $errorMessage);
            $this->display();
        } else {
            $this->display();
        }
    }

    function managerPage() {
        isLogin();
        $postData["id"] = $_SESSION['userId'];
        $reAuthority = transferData(API_URL . "user/userAuthority", "post", $postData);
        $reAuthority = json_decode($reAuthority, true);
        $reValue = transferData(API_URL . "user/userSingleInfo", "post", $postData);
        $reValue = json_decode($reValue, true);
        $this->assign("userInfo", $reValue);

        $this->assign("authority", $reAuthority);
        $this->display('userManger');
    }

    function findPasswordByPhone() {

        $this->display();
    }

    function findPasswordByMail() {
        $this->display();
    }

    function checkUserPhone() {
        $postData['phone'] = $_REQUEST['phone'];
        $rePhoneType = transferData(API_URL . "user/isSetPhone", "post", $postData);
        $rePhoneType = json_decode($rePhoneType, true);
        $returnValue = "";
        if ($rePhoneType) {
            $returnValue = "true";
            $PhoneType = transferData(API_URL . "user/getCheckCode", "post", $postData);
            $PhoneType = json_decode($rePhoneType, true);
        } else {
            $returnValue = "false";
        }
        echo $returnValue;
    }

    function checkUserMail() {
        $postData['mail'] = $_REQUEST['mail'];
        $rePhoneType = transferData(API_URL . "user/isSetMail", "post", $postData);
        $rePhoneType = json_decode($rePhoneType, true);
        $returnValue = "";
        if ($rePhoneType) {
            $returnValue = "true";
        } else {
            $returnValue = "false";
        }
        echo $returnValue;
    }

    function checkCode() {
        $postData['phone'] = $_REQUEST['phone'];
        $postData['code'] = $_REQUEST['code'];
        $rePhoneType = transferData(API_URL . "user/checkCodeAndPhone", "post", $postData);
        $rePhoneType = json_decode($rePhoneType, true);
        $returnValue = "";
        if ($rePhoneType) {
            $returnValue = "true";
        } else {
            $returnValue = "false";
        }
        echo $returnValue;
    }

    function checkMailMessage() {
        $postData['mail'] = $_REQUEST['mail'];
        $reMail = transferData(API_URL . "user/isSetMail", "post", $postData);
        $reMail = json_decode($reMail, true);
        $returnValue = "";

        if ($reMail) {
            $returnValue = "true";
        } else {
            $returnValue = "false";
        }
        echo $returnValue;
    }

    function setNewPassWordByPhone() {
        $postData['phone'] = $_POST['phone'];
        $rePhoneType = transferData(API_URL . "user/getUserMessageByPhone", "post", $postData);
        $rePhoneType = json_decode($rePhoneType, true);
        $this->assign("userId", $rePhoneType ["id"]);
        $this->assign("userPassword", $rePhoneType ["user_password"]);
        $this->display('setNewPassWord');
    }

    function setNewPassWordByMail() {
        $postData['mail'] = $_REQUEST['mail'];

        $rePhoneType = transferData(API_URL . "user/getUserMessageByMail", "post", $postData);

        $rePhoneType = json_decode($rePhoneType, true);
        var_dump($_REQUEST);
        $this->assign("userId", $rePhoneType ["id"]);
        $this->assign("userPassword", $rePhoneType ["user_password"]);
        $this->display('setNewPassWord');
    }

    function sendResertPasswrodMail() {
        $postData['mail'] = $_REQUEST['mail'];
        $text = "点击下方连接以进入重置密码界面<br>" . "<a href='" . WebSiteUrl . "user/setNewPassWordByMail?mail=" . $_REQUEST['mail'] . "'>" . WebSiteUrl . "user/setNewPassWordByMail?mail=" . $_REQUEST['mail'] . "</a>";
        $postData['mainText'] = $text;
        $rePhoneType = transferData(API_URL . "user/postResetPassWordMail", "post", $postData);
        $rePhoneType = json_decode($rePhoneType, true);
        $this->display();
    }

    function changeUserPassWord() {
        $data["oldPassword"] = $_POST["oldPassword"];
        $data["newPassword"] = $_POST["newPassword"];
        $data["id"] = $_POST["id"];

        $returnValue = transferData(API_URL . "user/passwordChange", "post", $data);
        $returnValue = json_decode($returnValue, true);
        if ($returnValue == "code1") {
            $errorMessage = "密码错误";
        } else if ($returnValue == "code2") {
            $errorMessage = "修改成功,<a href='" . WebSiteUrl . "user/userlogin'>返回</a>登入界面";
        } else {
            $errorMessage = "发生未知错误";
        }
        $this->assign("errorMessag", $errorMessage);
        $this->display();
    }

    function findPasswrd() {
        $this->display();
    }

}
