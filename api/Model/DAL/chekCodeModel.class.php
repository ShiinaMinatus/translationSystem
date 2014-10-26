<?php

class chekCodeModel extends ActiveRecord {

    public $table_name = 'check_code';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('id = ' . $id)->select();


            return $this->vars;
        }
    }

    public function getCodeInfoByPhone($phone) {
        $this->where('user_phone = ' . $phone)->select();
        return $this;
    }

    public function addCode($Array) {

        return $this->add($Array);
    }

    public function updateCode($phone, $data) {
        return $this->where('user_phone = ' . $phone)->save($data);
    }

}

?>