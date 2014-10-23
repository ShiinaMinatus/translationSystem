<?php

class taskBLL {

    public function seachAllTask() {
        $taskModel = new taskListModel();
        $taskModel->select();
        return $taskModel->vars_all;
    }

}

?>