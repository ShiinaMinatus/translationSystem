<?php

class educationBLL {

    public $education_id;
    public $education_name;

    public function info() {

        $array = array();
        
        $educationModel = new educationModel();

        $educationModel->select();

        if ($educationModel->vars_number > 0) {

            foreach ($educationModel->vars_all as $k => $v) {

                $educationObject = new educationBLL();

                $educationObject->education_id = $v['education_id'];

                $educationObject->education_name = $v['education_name'];

                $array[] = $educationObject;
            }
        }

        return $array;
    }

}

?>