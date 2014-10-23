<?php

class userModel extends ActiveRecord {

    public $table_name = 'user';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('id = ' . $id)->select();


            return $this->vars;
        }
    }

    public function getUserByNameAndPassword($userName, $password) {
        $this->where("user_mail='" . $userName . "' and user_password='" . $password . "'")->select();
        return $this;
    }

    public function addUserInfo($userInfoArray) {

        return $this->add($userInfoArray);
    }

    public function getUserByMail($mail) {
        $this->where("user_mail ='$mail'")->select();
        return $this;
    }

    public function updateInfo($id, $data) {
        return $this->where('id = ' . $id)->save($data);
    }

}

?>