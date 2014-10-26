<?php

class majorDetailModel extends ActiveRecord {

    public $table_name = 'major_detail';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars['education_name'];
        }
    }

}

?>