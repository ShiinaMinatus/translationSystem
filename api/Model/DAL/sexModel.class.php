<?php

class sexModel extends ActiveRecord {

    public $table_name = 'sex';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars['education_name'];
        }
    }

}

?>