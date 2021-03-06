<?php

class ResumeController {

    public function AllResume() {
        $resumeBll = new resumeBll();
        $array = $resumeBll->getAllResumeState();
        AssemblyJson($array, 1);
    }

    public function undoneResumeTranslation() {
        $stateType = 1;
        $userId = $_REQUEST["userId"];
        $resumeBll = new resumeBll();
        $array = $resumeBll->getAllResumeStateByState($stateType, $userId);
        AssemblyJson($array, 1);
    }

    public function changeResumeState() {
        $id = $_REQUEST['resumeStateId'];
        $data["resume_type"] = $_REQUEST['resumeType'];
        $resumeBll = new resumeBll();
        $array = $resumeBll->updateResumeStateById($id, $data);
        AssemblyJson($array, 1);
    }

    public function relevanceResume() {
        $id = $_REQUEST['resumeStateId'];
        $data["user_id"] = $_REQUEST['userId'];
        $data["resume_state_id"] = $id;
        $data["task_time"] = $_REQUEST['createTime'];
        $resumeBll = new resumeBll();
        $array = $resumeBll->addTaskQuest($id, $data);
        AssemblyJson($array, 1);
    }

    public function getTranslationResumeMessage() {
        $id = $_REQUEST['ResumeId'];
        $resumeBll = new resumeBll();
        $array = $resumeBll->getSingleTranslationResume($id);
        AssemblyJson($array, 1);
    }

    public function addEngResumeMessage() {
        $resumeId = $_REQUEST ["resumeId"];
        $engName = $_REQUEST ["nameEng"];
        $resumeDocData ["professional_skill"] = $_REQUEST ["professional_skill"];
        $resumeDocData ["social_practice"] = $_REQUEST ["social_practice"];
        $resumeDocData ["honor"] = $_REQUEST ["honor"];
        $resumeDocData ["self_evaluation"] = $_REQUEST ["self_evaluation"];
        $resumeDocData['resume_id'] = $resumeId;
        $resumeBll = new resumeBll();
        $resumeDoc = $resumeBll->addResumeUserDocumentEngValue($resumeId, $resumeDocData);
        $array = "";
        if ($resumeDoc > 0) {
            $resumeValue = $resumeBll->getSingleResume($resumeId);
            if ($resumeValue != NULL) {
                $resumeValue['user_name'] = $engName;
                $resumeEngValue = $resumeBll->addresumeEngValue($resumeId, $resumeValue);
                if ($resumeEngValue > 0) {
                    $data["resume_type"] = 2;
                    $resumeBll->updateResumeStateWithResumeId($resumeId, $data);
                    $array = "true";
                } else {
                    $array = "false";
                }
            } else {
                $array = "false";
            }
        } else {
            $array = "false";
        }
        AssemblyJson($array, 1);
    }

}

?>
