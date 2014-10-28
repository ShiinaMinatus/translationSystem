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
        <form method="post" action="{$websiteUrl}/user/setNewPassWordByPhone" id="phoneForm">
            <div><span>请输入手机号：</span><input id="phone" name="phone" value="" type="tel">       
                <button id="checkPhoneNumber" type="button">
                    获取验证码
                </button>
            </div>


            <div><span>请输入验证码：</span><input id="code" name="code"  value="" disabled="true" type="tel"></div>
            <button id="checkCode" type="button" disabled="true">
                确认
            </button>
        </form>
        <input type="hidden" id="masterDir" value="{$MasterDirUrl}">
    </body>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script>
        URLstring = $("#masterDir").val();
        $("#checkPhoneNumber").click(function () {
            if ($("#phone").val() == "") {
                alert("手机号码不能为空");
                return  false;
            }
            $.post(
                    URLstring + "/website/user/checkUserPhone",
                    {
                        phone: $("#phone").val()
                    },
            function (rData) {
                if (rData == "true") {
                    alert("验证码已发送");
                    $("#code").removeAttr("disabled");
                    $("#checkCode").removeAttr("disabled");
                }
                else {
                    alert("填写的内容无效或者手机号码错误");
                }
            });
        });
        $("#checkCode").click(function () {
            if ($("#code").val() == "") {
                alert("验证码不能为空");
                return  false;
            }
            $.post(
                    URLstring + "/website/user/checkCode",
                    {
                        phone: $("#phone").val(),
                        code: $("#code").val()
                    },
            function (rData) {
                if (rData == "true") {

                    $("#phoneForm").submit();
                }
                else {
                    alert("填写的内容无效或者验证码错误");
                }
            });
        });
    </script>
</html>
