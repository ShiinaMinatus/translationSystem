<?php

class resumeEngModel extends ActiveRecord {

    public $table_name = 'resume_eng';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars['education_name'];
        }
    }

    public function addResumeEng($userInfoArray) {

        return $this->add($userInfoArray);
    }

    public function checkResumeEng($id) {

        $this->where("resume_id='$id'")->select();
        return $this;
    }

}

?>