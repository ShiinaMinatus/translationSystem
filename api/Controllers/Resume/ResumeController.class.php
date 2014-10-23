<?php



class ResumeController {


        public function save(){

                $resumeBLL = new resumeBLL();

                $resumeBLL->saveUserResume($_REQUEST);

                $array['resume'] = $resumeBLL;

                AssemblyJson( $array, 1 );

        }


        public function getData() {


                header( "Content-type:text/html;charset=utf-8" );


                $majorBLL = new majorBLL();

                $array['major'] = $majorBLL->getMajor();


                $interestBLL = new interestBLL();

                $array['interest'] = $interestBLL->getInfo();


                AssemblyJson( $array, 1 );
        }

        /**
         * 获取性别 和  热门行业  根据系对应的id 和  兴趣id
         */

        public function  get_sex_industry(){


                $majorId = $_REQUEST['majorId'];

                $interestId = $_REQUEST['interestId'];

                if(!empty($majorId) && !empty($interestId)){

                    $resume = new resumeBLL();

                    $array['industry'] =  $resume->getUserIndustryByMajorId($majorId);

                    $array['sex'] = $resume->getUserSexByInterestId($interestId,'sex',$majorId);


                    AssemblyJson( $array, 1 );

                }

        }

        /**
         * 根据教育id 和 工作经验id  获取用户的个人评价
         */

        public function get_user_self(){

            $education_id = $_REQUEST['education_id'];

            $work_experience_id = $_REQUEST['work_experience_id'];

            $tag_id = $_REQUEST['tag_id'];

            if(!empty($education_id) && !empty($work_experience_id) && !empty($tag_id)){

                $selfBLL = new selfBLL();

                $selfArray = $selfBLL->getUserSelf($education_id,$work_experience_id,$tag_id,'self');

                $array['self'] = $selfArray;

                 AssemblyJson( $array, 1 );


            }

        }


        /**
         * 预览
         */

        public function preview(){


                $user_id = $_REQUEST['user_id'];

                $template_id = $_REQUEST['template_id'];

                if(!empty($user_id) && !empty($template_id)){

                        $userBLL = new userBLL();

                        $userBLL->checkUserExsit($user_id);


                        if(!empty($userBLL->user_id) && $userBLL->user_id > 0){

                                /**
                                 * 获取用户填写的简历内容
                                 */

                                $resumeBLL = new resumeBLL();

                                $array = $resumeBLL->getUserResume($userBLL->user_id,$template_id);


                                $templateBLL = new templateBLL();

                                $templateBLL->tempalte_replate($array['info'],$array['template']);
                        }
                }

        }



}

?>
