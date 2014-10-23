<?php

include_once '../Config/bootstrap/defined.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta content="initial-scale=1.0; maximum-scale=4.0; user-scalable=no;" name="viewport">
        <meta name="viewport" content="width=device-width,user-scalable=yes" />
        <link rel="stylesheet" href="<?php echo  TEMPLATEURL ; ?>/css/{$cssFile}">
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body{
                min-width: 320px;
            }
            #main{
                width: 95%;
                margin: 0 auto;
                margin-top: 25px;
            }
            #tableTitle{
                height: 55px;
                margin-bottom: 10px;
                padding-left: 5px;
            }
            .divToLine{
                float: left;
            }
            .titlePic{
                position: absolute;right: 0;top: 15px;
            }
            /*
            此处开始加入css文件
            */

        </style>
    </head>
    <body>
        <div id="main">
            <div id="tableTitle">
                <div class="photoTitle divToLine">
                    <img src="<?php echo  TEMPLATEURL ; ?>/images/titlePhoto.png" width="32" height="40">
                </div>
                <div class="divToLine titleBlock"></div>
                <div class="divToLine titleWord">
                    <span class="titleChineseWord">个人简历</span>
                    <br>
                    <span class="titleEnglishWord">Personal resume</span>
                </div>
                <div class="titlePic">
                    <img src="<?php echo  TEMPLATEURL ; ?>/images/titleRight.png" width="135" height="35">
                </div>
                <div style="clear: both"></div>
            </div>
            <div style="width: 100%;">
                <!--个人概况-->
                <div id="personalProfile">
                    <div class="headBar">
                        <div class="headBlock divToLine"></div>
                        <div class="headTitleBlock divToLine">个人概况</div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="TableTextArea">
                        <div class="lineList1 divToLine">
                            <span class="tableStyle">姓名：</span><span>{user_name}</span>
                            <br>
                            <span class="tableStyle">性别：</span><span>{user_sex}</span>
                            <br>
                            <span class="tableStyle">专业：</span><span>{major_detail}</span>
                            <br>
                        </div>
                        <div class="lineList2 divToLine" style="">
                            <span class="tableStyle">出生年月：</span><span>{user_birthday}</span>
                            <br>
                            <span class="tableStyle">学历：</span><span>{education}</span>
                            <br>


                            <span class="tableStyle">电话：</span><span>{user_phone}</span>
                            <br>
                        </div>
                        <div style="clear: both"></div>
                        <span class="tableStyle">邮箱：</span><span>{user_email}</span>
                        <br>
                        <span class="tableStyle">毕业院校：</span><span>{school}</span>
                        <div class="divToLine" style=""></div>

                    </div>
                </div>
                <div class="itemBlock" style=""></div>
                <!--求职意向-->
                <div id="intension">
                    <div class="headBar">
                        <div class="headBlock divToLine"></div>
                        <div class="headTitleBlock divToLine">求职意向</div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="TableTextArea">
                        <div class="lineList1 divToLine">
                            <span class="tableStyle">工作性质：</span><span>{job_category}</span>
                            <br>
                            <span class="tableStyle">期望薪资：</span><span>{compensation}</span>

                        </div>
                        <div class="lineList2 divToLine">
                            <span class="tableStyle">职位名称：</span><span>{position}</span>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </div>
                <div class="itemBlock" style=""></div>
                <!--获奖情况-->
                <div id="awards">
                    <div class="headBar">
                        <div class="headBlock divToLine"></div>
                        <div class="headTitleBlock divToLine">获奖情况</div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="TableTextArea">
                          {honor}
                    </div>
                </div>
                <div class="itemBlock" style=""></div>
                <!--实习经验-->
                <div id="Internship">
                    <div class="headBar">
                        <div class="headBlock divToLine"></div>
                        <div class="headTitleBlock divToLine">实习经验</div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="TableTextArea">
                         {social_practice}
                    </div>
                </div>
                <div class="itemBlock" style=""></div>
                <!--自我评价-->
                <div id="Internship">
                    <div class="headBar">
                        <div class="headBlock divToLine"></div>
                        <div class="headTitleBlock divToLine">自我评价</div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="TableTextArea" style="line-height: 25px;">
                       {self_evaluation}
                    </div>
                </div>
                <div class="itemBlock" style=""></div>
            </div>
        </div>
    </body>
</html>
