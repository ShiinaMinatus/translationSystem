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

}

?>