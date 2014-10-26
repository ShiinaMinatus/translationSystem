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
    </head>
    <body>
        <div>翻译简历 <a style=" margin-left: 25px;" href="http://localhost/translationSystem/website/user/managerPage">返回</a></div>
        <div style="color: red">{$printMessage}</div>
        <table>
            <tr><td>姓名</td><td>{$resumeValue.user_name}</td></tr>
            <tr><td>电话</td><td>{$resumeValue.user_phone}</td></tr>
            <tr><td>性别</td><td>{$resumeValue.sex_name}</td></tr>
            <tr><td>毕业院校</td><td>{$resumeValue.school_name}</td></tr>
            <tr><td>专业</td><td>{$resumeValue.电子商务}</td></tr>
            <tr><td>最高学历</td><td>{$resumeValue.education_name}</td></tr>
            <tr><td>姓名</td><td>{$resumeValue.user_name}</td></tr>
            <tr><td>社会经历</td><td>{$resumeValue.social_practice}</td></tr>
            <tr><td>荣誉奖项</td><td>{$resumeValue.honor}</td></tr>
            <tr><td>自我评价</td><td>{$resumeValue.self_evaluation}</td></tr>
        </table>
        <table>

        </table>
    </body>
</html>
