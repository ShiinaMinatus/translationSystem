<?php

class userBLL {

    public function loginInfo($userName, $password) {

        $userDal = new userModel();
        $userinfo = $userDal->getUserByNameAndPassword($userName, $password);
        $array = array();
        if ($userinfo->vars_number < 1) {
            $array = 1;
        } else {
            $array = $userinfo->vars;
        }
        return $array;
    }

    public function addCheckUser($userInfoArray) {
        if (is_array($userInfoArray)) {
            $userCheck = new userCheckModel();
            return $userinfo = $userCheck->addUserInfo($userInfoArray);
        } else {
            return "error";
        }
    }

    public function seachBymail($mail) {
        $userDal = new userModel();
        $userinfo = $userDal->getUserByMail($mail);
        return $userinfo->vars_number > 0;
    }

    public function seachAllCheckUser() {
        $userCheck = new userCheckModel();

        $userCheck->select();
        return $userCheck->vars_all;
    }

}

?>