<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TaskAction extends Action {

    //首页d
    function getAllTask() {
        $reValue = transferData("http://localhost/translationSystem/api/task/getAllTask", "post", "");
        $reValue = json_decode($reValue, true);
        $this->assign("taskList", $reValue);
        $this->display();
    }

}
