<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TranslationAction extends Action {

    //首页d
    function allTranslationList() {
        $reValue = transferData(API_URL."resume/AllResume", "post", "");
        $reValue = json_decode($reValue, true);
        $this->assign("translationList", $reValue);
        $this->display();
    }

    function getMission() {
        isLogin();
        $translationId = $_REQUEST['translationId'];
        $resumeId = $_REQUEST['resumeId'];
        $userId = $_SESSION["userId"];
        $relevanceData['userId'] = $userId;
        $relevanceData['resumeStateId'] = $translationId;
        $relevanceData['createTime'] = time();
        $relevanceValue = transferData(API_URL."resume/relevanceResume", "post", $relevanceData);
        $relevanceValue = json_decode($relevanceValue, true);
        if ($relevanceValue > 0) {
            $changeData['resumeStateId'] = $translationId;
            $changeData['resumeType'] = 1;
            $changeValue = transferData(API_URL."resume/changeResumeState", "post", $changeData);
            $changeValue = json_decode($changeValue, true);
            if ($changeValue) {
                $resumeData['ResumeId'] = $resumeId;

                $resumeValues = transferData(API_URL."resume/getTranslationResumeMessage", "post", $resumeData);
                $resumeValues = json_decode($resumeValues, true);
                $this->assign("resumeValue", $resumeValues);
                $this->display();
            }
        }
    }

    function submitEnglishResume() {
        $resumeData ["resumeId"] = $_REQUEST ["resumeId"];
        $resumeData ["nameEng"] = $_REQUEST ["nameEng"];
        $resumeData ["professional_skill"] = $_REQUEST ["professional_skill"];
        $resumeData ["social_practice"] = $_REQUEST ["social_practice"];
        $resumeData ["honor"] = $_REQUEST ["honor"];
        $resumeData ["self_evaluation"] = $_REQUEST ["self_evaluation"];
        $resumeValues = transferData(API_URL."resume/addEngResumeMessage", "post", $resumeData);
        $resumeValues = json_decode($resumeValues, true);
        if ($resumeValues == "true") {
            $RetrunValue = "您的简历翻译已被提交，请耐心等待结果";
        } else {
            $RetrunValue = "您的简历翻译提交时发生错误，请联系管理员";
        }
        $this->assign("resumeValue", $RetrunValue);
        $this->display();
    }

}
