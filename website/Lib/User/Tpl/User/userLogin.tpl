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
        <div style="width: 85%;margin: 0 auto;margin-top: 15px; ">
            <div style="background-color: red;float: left;width: 30%">leftArea</div>
            <div style="background-color: skyblue;float: left;width: 70%">
                <form action="#" method="post">
                    <div><span>用户名：</span><input id="userNmae" name="userName" type="text" value="" placeholder="请输入用户名"></div>
                    <div><span>密码：</span><input style="margin-left: 16px;" id="password" name="password" type="password" value="" placeholder="密码"></div>
                    <div style="color: red">用户名或密码错误</div>
                    <div><button>登入</button><a style="font-size: 12px;margin-left: 15px;" href="http://localhost/translationSystem/register.html">没有账号？</a></div>
                </form>
            </div>
        </div>
    </body>
</html>
