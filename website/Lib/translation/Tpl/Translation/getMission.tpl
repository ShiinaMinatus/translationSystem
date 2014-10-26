<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .trStyle{
                word-break: break-all;
            }
            .textArea{
                width: 520px;
                height: 130px;
            }
        </style>
    </head>
    <body>
        <div>翻译简历 <a style=" margin-left: 25px;" href="http://localhost/translationSystem/website/user/managerPage">返回</a></div>
        <div style="color: red">{$printMessage}</div>
        <div style="width: 100%;">
            <table id="tra" style="width:45%;float: left">
                <tr><td style="width: 100px;">姓名</td><td class="">{$resumeValue.user_name}</td></tr>
                <tr><td>性别</td><td>{$resumeValue.sex_name}</td></tr>
                <tr><td>毕业院校</td><td>{$resumeValue.school_name}</td></tr>
                <tr><td>专业</td><td>{$resumeValue.major_detail_name}</td></tr>
                <tr><td>最高学历</td><td>{$resumeValue.education_name}</td></tr>
                <tr><td  colspan="2">专业技能</td></tr>
                <tr> <td  colspan="2" class="trStyle">{$resumeValue.professional_skill}</td></tr>
                <tr><td colspan="2">社会经历</td></tr>
                <tr> <td  colspan="2" class="trStyle">{$resumeValue.social_practice}</td></tr>
                <tr><td  colspan="2">荣誉奖项</td></tr>
                <tr> <td  colspan="2" class="trStyle">{$resumeValue.honor}</td></tr>
                <tr><td  colspan="2">自我评价</td></tr>
                <tr> <td  colspan="2" class="trStyle">{$resumeValue.self_evaluation}</td></tr>
            </table>
            <form method="post" action="http://localhost/translationSystem/website/translation/submitEnglishResume?resumeId={$resumeValue.resume_id}">
                <table  style="width: 45%;float: left;margin-left: 50px;">
                    <tr><td style="width: 100px;">姓名</td><td class=""><input name="nameEng"></td></tr>
                    <tr><td>性别</td><td>{$resumeValue.sex_name_eng}</td></tr>
                    <tr><td>毕业院校</td><td>{$resumeValue.school_name_eng}</td></tr>
                    <tr><td>专业</td><td>{$resumeValue.major_detail_name_eng}</td></tr>
                    <tr><td>最高学历</td><td>{$resumeValue.education_name_eng}</td></tr>
                    <tr><td  colspan="2">专业技能</td></tr>
                    <tr> <td  colspan="2" class="trStyle"><textarea name="professional_skill" class="textArea"></textarea></td></tr>
                    <tr><td colspan="2">社会经历</td></tr>
                    <tr> <td  colspan="2" class="trStyle"><textarea name="social_practice" class="textArea"></textarea></td></tr>
                    <tr><td  colspan="2">荣誉奖项</td></tr>
                    <tr> <td  colspan="2" class="trStyle"><textarea name="honor" class="textArea"></textarea></td></tr>
                    <tr><td  colspan="2">自我评价</td></tr>
                    <tr> <td  colspan="2" class="trStyle"><textarea name="self_evaluation" class="textArea"></textarea></td></tr>
                    <tr><td  colspan="2"><button> 提交</button><button style="margin-left: 35px;" type="reset">重置</button></td></tr>
                </table>
            </form>
        </div>
    </body>
</html>
