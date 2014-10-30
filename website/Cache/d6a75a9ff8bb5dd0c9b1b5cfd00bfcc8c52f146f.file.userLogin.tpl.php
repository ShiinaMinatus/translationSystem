<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-29 11:25:06
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/userLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2280654505e12883413-28775344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6a75a9ff8bb5dd0c9b1b5cfd00bfcc8c52f146f' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/userLogin.tpl',
      1 => 1414553105,
    ),
  ),
  'nocache_hash' => '2280654505e12883413-28775344',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
            
            <div style="">
                <h2>用户登入</h2>
                <div style="height: 45px"></div>
                <form action="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/userLogin" method="post">
                    <div style="color: red"><?php echo $_smarty_tpl->getVariable('userError')->value;?>
</div>

                    <div><span>用户名：</span><input id="userNmae" name="userName" type="text" value="" placeholder="请输入用户名"></div>
                    <div style="height: 45px"></div>
                    <div><span>密码：</span><input style="margin-left: 16px;" id="password" name="password" type="password" value="" placeholder="密码"></div>
                    <div style="height: 45px"></div>

                    <div><button>登入</button><a style="font-size: 12px;margin-left: 15px;" href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/register?registerType=1">没有账号？</a>
                        <a style="font-size: 12px;margin-left: 15px;"  href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/findPasswrd">找回密码？</a></div></div>
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
