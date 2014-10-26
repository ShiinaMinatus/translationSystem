<?php

class resumeUserInfoModel extends ActiveRecord {

    public $table_name = 'resume_user_info';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars['education_name'];
        }
    }

}

?>