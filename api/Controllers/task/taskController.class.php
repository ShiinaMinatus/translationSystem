<?php

class taskController {

    public function getAllTask() {
        $taskBll = new taskBLL();
        $array = $taskBll->seachAllTask();
        AssemblyJson($array, 1);
    }

    public function getSqlLog() {
        $dirPath = "/Logs/SQL";
        $array = readDirFile($dirPath);
        echo $array;
     //   AssemblyJson($array, 1);
        
    }

}
