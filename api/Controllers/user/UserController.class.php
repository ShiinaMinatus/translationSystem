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
        $checkUserData['user_gender'] = $_POST['gender'];
        $checkUserData['user_mail'] = $_POST['mail'];
        $checkUserData['user_id_card_photo'] = $_POST['cardPhoto'];
        $checkUserData['user_certificate_photo'] = $_POST['certificatePhoto'];
        $array = $resumeBLL->addCheckUser($checkUserData);
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

}

?>
