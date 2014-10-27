<?php

class resumeBll {

    public function getAllResume() {
        $joinString = "resume_user_document on resume.resume_id=resume_user_document.resume_id " .
                "inner join resume_user_info on resume.resume_id=resume_user_info.resume_id "
                . "inner join school on resume_user_info.school_id=school.school_id "
                . "inner join education on resume_user_info.education_id=education.education_id "
//                . "inner join compensation on resume_user_info.compensation_id=compensation.compensation_id" //薪资需求
                . "inner join major_detail on resume_user_info.major_detail_id=major_detail.major_detail_id "
                . "inner join sex on resume.user_sex=sex.sex_id";
        $fieldArray = array("resume.resume_id", "user_phone", "user_name", "sex_name",
            "user_email", "user_birthday", "professional_skill", "social_practice",
            "honor", "self_evaluation", "school_name", "education_name", "major_detail_name",
            "school.school_id", "education.education_id", "major_detail.major_detail_id", "user_sex");
        $resumeModel = new resumeModel();
        $resumeModel->field($fieldArray)->join($joinString, "inner join")->select();
        $resumeVal = $resumeModel->vars_all;
        return $resumeVal;
    }

    public function getAllResumeState() {
        $resumeState = new resumeStateModel();
        $resumeState->join("resume on resume_state.resume_id=resume.resume_id", "inner join")->where("resume_type ='0'")->select();
        return $resumeState->vars_all;
    }

    public function getSingleResume($id) {
        $resume = new resumeModel();
        $resume->where("resume_id ='$id'")->select();
        return $resume->vars;
    }

    //添加翻译用户与简历关系
    public function addTaskQuest($id, $array) {
        $taskRequest = new taskRequestModel();
        $taskRequest->checkTaskRequest($id);
        if ($taskRequest->vars_number > 0) {
            return 1;
        } else {
            return $taskRequest->addTaskRequest($array);
        }
    }

    public function updateResumeStateById($id, $array) {
        $resumeState = new resumeStateModel();
        $resumeState->checkResumeState($id);
        if ($resumeState->vars_number > 0) {
            return true;
        } else {
            return $resumeState->updateResumeState($id, $array);
        }
    }

    public function getSingleTranslationResume($id) {
        $joinString = "resume_user_document on resume.resume_id=resume_user_document.resume_id " .
                "inner join resume_user_info on resume.resume_id=resume_user_info.resume_id "
                . "inner join school on resume_user_info.school_id=school.school_id "
                . "inner join education on resume_user_info.education_id=education.education_id "
//                . "inner join compensation on resume_user_info.compensation_id=compensation.compensation_id" //薪资需求
                . "inner join major_detail on resume_user_info.major_detail_id=major_detail.major_detail_id "
                . "inner join sex on resume.user_sex=sex.sex_id "
                . "inner join school_eng on resume_user_info.school_id=school_eng.school_id "
                . "inner join education_eng on resume_user_info.education_id=education_eng.education_id "
                . "inner join major_detail_eng on resume_user_info.major_detail_id=major_detail_eng.major_detail_id "
                . "inner join sex_eng on resume.user_sex=sex_eng.sex_id";
        $fieldArray = array("resume.resume_id", "user_phone", "user_name", "sex_name",
            "user_email", "user_birthday", "professional_skill", "social_practice",
            "honor", "self_evaluation", "school_name", "education_name", "major_detail_name",
            "school.school_id", "education.education_id", "major_detail.major_detail_id", "user_sex",
            "school_name_eng", "education_name_eng", "major_detail_name_eng", "sex_name_eng");
        $resumeModel = new resumeModel();
        $resumeModel->field($fieldArray)->join($joinString, "inner join")->where("resume.resume_id = '$id'")->select();
        $resumeVal = $resumeModel->vars;
        return $resumeVal;
    }

    public function addResumeUserDocumentEngValue($id, $array) {
        $resumeUserDocumentEng = new resumeUserDocumentEngModel();
        $resumeUserDocumentEng->checkDocumentResumeEng($id);
        if ($resumeUserDocumentEng->vars_number > 0) {
            return 0;
        } else {
            return $resumeUserDocumentEng->addResumeUserDocumentEng($array);
        }
    }

    public function addresumeEngValue($id, $array) {

        $resumeEng = new resumeEngModel();
        $resumeEng->checkResumeEng($id);
        if ($resumeEng->vars_number > 0) {
            return 0;
        } else {
            return $resumeEng->addResumeEng($array);
        }
    }

}
