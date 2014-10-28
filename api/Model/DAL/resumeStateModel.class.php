<?php

class resumeStateModel extends ActiveRecord {

    public $table_name = 'resume_state';

    public function updateResumeState($id, $data) {
        return $this->where('id = ' . $id)->save($data);
    }

    public function updateResumeStateByResumeId($id, $data) {
        return $this->where('resume_id = ' . $id)->save($data);
    }

    public function addResumeState($userInfoArray) {

        return $this->add($userInfoArray);
    }

    public function checkResumeState($id) {

        $this->where("resume_id='$id' and resume_type not like '0'")->select();
        return $this;
    }

}

?>