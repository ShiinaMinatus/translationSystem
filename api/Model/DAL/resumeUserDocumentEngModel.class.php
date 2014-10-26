<?php

class resumeUserDocumentEngModel extends ActiveRecord {

    public $table_name = 'resume_user_document_eng';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars['education_name'];
        }
    }

    public function addResumeUserDocumentEng($userInfoArray) {

        return $this->add($userInfoArray);
    }

    public function checkDocumentResumeEng($id) {

        $this->where("resume_id='$id'")->select();
        return $this;
    }

}

?>