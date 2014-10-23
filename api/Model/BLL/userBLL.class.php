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
            $userinfo = $userCheck->addUserInfo($userInfoArray);
            return $userinfo;
        } else {
            return "error";
        }
    }

    public function addUser($checkUserId) {
        $userCheck = new userCheckModel();
        $checkUserData = $userCheck->getNameById($checkUserId);
        $userDal = new userModel();
        $userId = $checkUserData['id'];
        unset($checkUserData['id']);

        $addValue = $userDal->addUserInfo($checkUserData);
        if ($addValue > 0) {
            $addValue = $userCheck->deleteInfo($userId);
        }
        return $addValue;
    }

    public function seachBymail($mail) {
        $userDal = new userModel();
        $userinfo = $userDal->getUserByMail($mail);
        return $userinfo->vars_number > 0;
    }

    public function seachAllCheckUser() {
        $userCheck = new userCheckModel();

        $userCheck->where("user_mail_type='1' and user_is_check='0'")->select();
        return $userCheck->vars_all;
    }

    public function seachSingleCheckUserById($id) {
        $userCheck = new userCheckModel();
        return $userCheck->getNameById($id);
    }

    public function updateCheckUser($id, $data) {
        $userCheck = new userCheckModel();
        $a = $userCheck->updateInfo($id, $data);
        return $a;
    }

    public function authoritySearch($id, $authorityId) {
        $authority = new authorityModel();
        $authority->where("user_id='$id' and authority_type='$authorityId'")->select();
        return $authority->vars_number;
    }

    public function checkUserPasswprd($id, $password) {
        $user = new userModel();

        $user->where("id = '$id' and user_password='$password'")->select();
        return $user->vars_number;
    }

    public function updateUser($id, $data) {
        $user = new userModel();
        $a = $user->updateInfo($id, $data);
        return $a;
    }

}

?>