<?php

class taskBLL {

    public function seachAllTask() {
        $taskModel = new taskListModel();
        $taskModel->select();
        return $taskModel->vars_all;
    }

    public function dayCheck($taskId, $userId) {
        $taskRequest = new taskRequestModel();
        $taskRequest->where("task_id ='$taskId' and user_id='$userId'")->select();
        if (($taskCount = $taskRequest->vars_number) > 0) {
            
        } else {
            $nowTime = time();
            $data['user_id'] = $userId;
            $data['task_id'] = $taskId;
            $data['task_time'] = $nowTime;
            $responseValue = $taskRequest->addTaskRequest($data);
        }
    }

}

?>