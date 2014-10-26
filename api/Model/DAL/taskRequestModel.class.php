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

        return $this->add($Array);
    }

    public function getTaskInfoWithUserAndTask($taskId, $userId) {
        $this->where("task_id ='$taskId' and user_id='$userId'")->select();


        return $this;
    }

}

?>