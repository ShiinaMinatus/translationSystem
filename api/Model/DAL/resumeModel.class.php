<?php

class resumeModel extends ActiveRecord {

    public $table_name = 'resume';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars;
        }
    }
    

}

?>