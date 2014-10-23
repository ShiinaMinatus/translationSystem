<?php

class taskController {

    public function getAllTask() {
        $taskBll = new taskBLL();
        $array = $taskBll->seachAllTask();
        AssemblyJson($array, 1);
    }

}
