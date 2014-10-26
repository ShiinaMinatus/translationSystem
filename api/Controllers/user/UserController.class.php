<?php

class UserController {

    public function userLogin() {
        $resumeBLL = new userBLL();

        $userName = $_REQUEST["userName"];
        $password = $_REQUEST["password"];

        $array = $resumeBLL->loginInfo($userName, $password);
        AssemblyJson($array, 1);
    }

    public function userRegister() {
        $resumeBLL = new userBLL();
        $checkUserData['user_name'] = $_POST['userName'];
        $checkUserData['user_password'] = $_POST['password'];
        $checkUserData['user_phone'] = $_POST['phone'];
        $checkUserData['user_gender'] = $_POST['gender'];
        $checkUserData['user_mail'] = $_POST['mail'];
        $checkUserData['user_id_card_photo'] = $_POST['cardPhoto'];
        $checkUserData['user_certificate_photo'] = $_POST['certificatePhoto'];
        $array = $resumeBLL->addCheckUser($checkUserData);

        if ($array > 0) {
            $mailText = "请点击下方连接以激活账户：<br>" .
                    "http://localhost/translationSystem/website/user/checkUserActivation?userId=$array";
            sendMail($checkUserData['user_mail'], "447850861@qq.com", "13917276351a", $mailText, "验证邮件");
        }
        AssemblyJson($array, 1);
    }

    public function isSetMail() {
        $resumeBLL = new userBLL();
        $array = $resumeBLL->seachBymail($_POST["mail"]);
        AssemblyJson($array, 1);
    }

    public function checkUserAll() {
        $resumeBLL = new userBLL();
        $array = $resumeBLL->seachAllCheckUser();
        AssemblyJson($array, 1);
    }

    public function getCheckUserById() {
        $resumeBLL = new userBLL();
        if (empty($_POST['id'])) {
            $array = 0;
        } else {
            $userid = $_POST['id'];
            $array = $resumeBLL->seachSingleCheckUserById($userid);
        }

        AssemblyJson($array, 1);
    }

    public function checkUserToUser() {
        if (empty($_POST['id'])) {
            $array = 0;
        } else {
            $resumeBLL = new userBLL();
            $array = $resumeBLL->addUser($_POST['id']);
        }
        AssemblyJson($array, 1);
    }

    public function test() {
        sendMail("1806172629@qq.com", "447850861@qq.com", "13917276351a", "11112223333", "验证邮件");
    }

    public function checkUserActivation() {

        $id = $_POST["id"];
        $data["user_mail_type"] = 1;
        $resumeBLL = new userBLL();
        $array = $resumeBLL->updateCheckUser($id, $data);
        AssemblyJson($array, 1);
    }

    public function rejectCheckUser() {
        $id = $_POST["id"];
        $mailText = $_POST["rejectContext"];
        $mailAddress = $_POST["mail"];
        $data["user_is_check"] = 1;
        $resumeBLL = new userBLL();
        $array = $resumeBLL->updateCheckUser($id, $data);
        sendMail($mailAddress, "447850861@qq.com", "13917276351a", "驳回理由：<br>" . $mailText . "<br> 如有异议请联系管理员", "审核未通过");
        AssemblyJson($array, 1);
    }

    public function userAuthority() {
        $resumeBLL = new userBLL();
        $array = $resumeBLL->authoritySearch($_POST['id'], 1);
        AssemblyJson($array, 1);
    }

    public function passwordChange() {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST["newPassword"];
        $id = $_POST['id'];

        $resumeBLL = new userBLL();
        $passwordType = $resumeBLL->checkUserPasswprd($id, $oldPassword);

        if ($passwordType > 0) {
            $data['user_password'] = $newPassword;
            $passwordNow = $resumeBLL->updateUser($id, $data);
            if ($passwordNow) {
                $array = "code2"; //成功
            } else {
                $array = "code3"; //错误
            }
        } else {
            $array = "code1"; //密码错误
        }
        AssemblyJson($array, 1);
    }

    public function isSetPhone() {
        $phone = trim($_POST['phone']);
        $resumeBLL = new userBLL();
        $array = $resumeBLL->seachByPhone($phone);
        AssemblyJson($array, 1);
    }

    public function getCheckCode() {
        $phone = trim($_POST['phone']);
        $resumeBLL = new userBLL();
        $array = $resumeBLL->addCheckCode($phone);
        AssemblyJson($array, 1);
    }

    public function checkCodeAndPhone() {
        $phone = trim($_POST['phone']);

        $code = trim($_POST['code']);

        $resumeBLL = new userBLL();
        $isSetCode = $resumeBLL->seachCheckCode($phone, $code);
        if ($isSetCode > 0) {
            $array = TRUE;
        } else {
            $array = FALSE;
        }
        AssemblyJson($array, 1);
    }

    public function getUserMessageByPhone() {
        $phone = trim($_POST['phone']);
        $resumeBLL = new userBLL();
        $array = $resumeBLL->getUserInfoByPhone($phone);
        AssemblyJson($array, 1);
    }

    public function getUserMessageByMail() {

        $mail = trim($_POST['mail']);
        $resumeBLL = new userBLL();
        $array = $resumeBLL->getUserInfoBymail($mail);
        AssemblyJson($array, 1);
    }

    public function postResetPassWordMail() {
        $mailText = $_POST["mainText"];
        $mailAddress = $_POST["mail"];
        sendMail($mailAddress, "447850861@qq.com", "13917276351a", $mailText, "重置密码");
    }

}

?>
