<?php

class resumeUserDocumentModel extends ActiveRecord {

    public $table_name = 'resume_user_document';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars['education_name'];
        }
    }

}

?>