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

    public function seachSingleById($id) {
        $userDal = new userModel();
        $userDal->where("id= '$id'")->select();
        return $userDal->vars;
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

    public function seachByPhone($phone) {
        $userDal = new userModel();
        $userinfo = $userDal->getUserByPhone($phone);
        return $userinfo->vars_number > 0;
    }

    public function getUserInfoBymail($mail) {
        $userDal = new userModel();
        $userinfo = $userDal->getUserByMail($mail);
        return $userinfo->vars;
    }

    public function getUserInfoByPhone($phone) {
        $userDal = new userModel();
        $userinfo = $userDal->getUserByPhone($phone);
        return $userinfo->vars;
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

    public function authorityValue($id, $authorityId) {
        $authority = new authorityModel();
        $authority->where("user_id='$id' and authority_type='$authorityId'")->select();
        return $authority->vars;
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

    public function seachCheckCode($phone, $code) {
        $user = new chekCodeModel();
        $user->where("user_phone = '$phone' and check_code='$code'")->select();
        return $user->vars_number;
    }

    public function addCheckCode($phone) {
        $code = new chekCodeModel();
        $codeObject = $code->getCodeInfoByPhone($phone);
        $codeNumber = $codeObject->vars_number;
        $max = 9;
        $min = 0;
        $checkCode = rand(1, $max) . rand($min, $max) . rand($min, $max) . rand($min, $max);
        $returnValue = "";
        if ($codeNumber == 1) {
            $data['check_code'] = $checkCode;
            $data['create_time'] = time();
            if ($code->updateCode($phone, $data)) {
                $returnValue = $checkCode;
            } else {
                $returnValue = "error1";
            }
        } else {
            $data['check_code'] = $checkCode;
            $data['create_time'] = time();
            $data['user_phone'] = $phone;
            $addCodeNumber = $code->addCode($data);
            if ($addCodeNumber > 0) {
                $returnValue = $checkCode;
            } else {
                $returnValue = "error2";
            }
        }
        return $returnValue;
    }

}

?>