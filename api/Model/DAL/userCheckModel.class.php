<?php

class userCheckModel extends ActiveRecord {

    public $table_name = 'user_check_list';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('id = ' . $id)->select();


            return $this->vars;
        }
    }

    public function addUserInfo($userInfoArray) {
        return $this->add($userInfoArray);
    }

    public function seachAll() {
        $this->select();
        return $this->vars_all;
    }

    public function deleteInfo($id) {
        return $this->delete("where id='$id'");
    }

    public function updateInfo($id, $data) {
        return $this->where('id = ' . $id)->save($data);
    }

    public function getCheckUserByMail($mail) {
        $this->where("user_mail ='$mail'")->select();
        return $this;
    }

    public function getCheckUserByNameAndPassword($userName, $password) {
        $this->where("user_mail='" . $userName . "' and user_password='" . $password . "'")->select();
        return $this;
    }

}

?>