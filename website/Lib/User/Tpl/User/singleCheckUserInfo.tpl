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
            #rejectDiv{
                border: 1px solid black;
                width: 600px;
                height: 450px;
                position: absolute;
                top: 10%;
                left: 30%;
                z-index: 300;
                display: none;
            }
        </style>
    </head>
    <body>
        <form method="post" action="http://localhost/translationSystem/website/user/addUser?userId={$checkUser.id}">
            <table>
                <tr><td>昵称:</td><td>{$checkUser.user_name}</td></tr>
                <tr><td>性别:</td>
                    <td>
                        {if $checkUser.user_gender eq 1}
                            男
                        {else}
                            女
                        {/if}
                    </td>
                </tr>
                <tr><td>邮箱:</td><td>{$checkUser.user_mail}</td></tr>
                <tr><td>身份证照片:</td><td><img width="200" height="150"  src="{$Photo_Url}/{$checkUser.user_id_card_photo}"></td></tr>
                <tr><td>证书照片:</td><td><img width="200" height="150"  src="{$Photo_Url}/{$checkUser.user_certificate_photo}"></td></tr>
                <tr><td rowspan="2"><button type="submit">通过</button> <button type="button" id="reject">驳回</button></td></tr>
            </table>
        </form>
        <form id="formReject" method="post" action="http://localhost/translationSystem/website/user/rejectUser">       
            <div id="rejectDiv" style="">
                <div style="height: 10px;"></div>
                <div> 驳回理由:</div>
                <textarea id="rejectContext" name="rejectContext" style="width: 594px;height: 365px;margin-left:1px;"></textarea>
                <input type="hidden" id="mail" name="mail" value="{$checkUser.user_mail}">
                <input type="hidden" id="id" name="id" value="{$checkUser.id}">
                <button id="rejectEnter" type="button">确定</button>
                <button id="rejectCencal" type="button">取消</button>
            </div>
        </form>
    </body>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script>
        $("#reject").click(function () {
            $("#rejectContext").val("");
            $("#rejectDiv").show();

        });
        $("#rejectCencal").click(function () {
            $("#rejectContext").val("");
            $("#rejectDiv").hide();

        });
        $("#rejectEnter").click(function () {
            if ($("#rejectContext").val() == "") {
                alert("理由不能为空");
                return false;
            }
            var haha = document.getElementById("rejectContext").value;
            haha = haha.replace('<br />', '\r\n');
            haha = haha.replace('<br />', '\r');
            haha = haha.replace('<br />', '\n');
            document.getElementById("rejectContext").value = haha;
            $("#formReject").submit();
        })
    </script>
</html>
