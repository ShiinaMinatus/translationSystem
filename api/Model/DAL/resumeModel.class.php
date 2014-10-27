<?php

class resumeModel extends ActiveRecord {

    public $table_name = 'resume';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars;
        }
    }

    public function addResume($userInfoArray) {

        return $this->add($userInfoArray);
    }

    public function checkResume($id) {

        $this->where("resume_id='$id'")->select();
        return $this;
    }

}

?>