<?php

class taskRequestModel extends ActiveRecord {

    public $table_name = 'task_request';

    public function getTasksById($id) {

        if (!empty($id)) {

            $this->where('task_id = ' . $id)->select();


            return $this->vars;
        }
    }

    public function addTaskRequest($Array) {

        $ras = $this->add($Array);
        return $ras;
    }

    public function checkTaskRequest($id) {

        $this->where("resume_state_id='$id' ")->select();
        return $this;
    }

}

?>