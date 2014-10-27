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
        <form method="post" action="{$websiteUrl}/user/sendResertPasswrodMail" id="phoneForm">
            <div><span>请输入邮箱：</span><input id="mail" name="mail"  value=""  type="tel"></div>
            <button id="checkCode" type="button" >
                确认
            </button>
        </form>

    </body>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script>
        $("#checkCode").click(function () {
            if ($("#mail").val() == "") {
                alert("邮箱不能为空");
                return  false;
            }
            $.post(
                    "/translationSystem/website/user/checkUserMail",
                    {
                        mail: $("#mail").val(),
                    },
                    function (rData) {
                        if (rData == "true") {

                            $("#phoneForm").submit();
                        }
                        else {
                            alert("填写的内容无效或者邮箱不存在");
                        }
                    });
        });
    </script>
</html>
