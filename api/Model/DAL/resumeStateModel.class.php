<?php

class resumeStateModel extends ActiveRecord {

    public $table_name = 'resume_state';

    public function updateResumeState($id, $data) {
        return $this->where('id = ' . $id)->save($data);
    }

}

?>