<!DOCTYPE html>

<html>
    <head>
        <title>登入</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
        <style>
            *{
                margin: 0;
                padding: 0
            }
        </style>
    </head>
    <body>
        <div style="width: 85%;margin: 0 auto;margin-top: 215px;text-align: center ">
            {* <div style="background-color: red;float: left;width: 30%">leftArea</div>*}
            <div style="">
                <h2>用户登入</h2>
                <div style="height: 45px"></div>
                <form action="{$websiteUrl}/user/userLogin" method="post">
                    <div style="color: red">{$userError}</div>

                    <div><span>用户名：</span><input id="userNmae" name="userName" type="text" value="" placeholder="请输入用户名"></div>
                    <div style="height: 45px"></div>
                    <div><span>密码：</span><input style="margin-left: 16px;" id="password" name="password" type="password" value="" placeholder="密码"></div>
                    <div style="height: 45px"></div>

                    <div><button>登入</button><a style="font-size: 12px;margin-left: 15px;" href="{$websiteUrl}/user/register?registerType=1">没有账号？</a>
                        <a style="font-size: 12px;margin-left: 15px;"  href="{$websiteUrl}/user/findPasswrd">找回密码？</a></div></div>
        </form>
    </div>
</div>
</body>
<script>
    $("#loginBut").click(function () {
        var alertFlag = false;
        var alertText = "";
        if ($("#userNmae").val() == "" || $("#password").val() == "") {
            alertFlag = true;
            alertText += "用户名或密码不能为空";
        }
        if (alertFlag) {
            alert(alertText);
            return false;
        }
    })
</script>
</html>
