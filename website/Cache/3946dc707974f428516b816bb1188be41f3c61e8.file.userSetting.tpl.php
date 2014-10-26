<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-24 06:19:42
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/userSetting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:855054497efed485b0-74270202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3946dc707974f428516b816bb1188be41f3c61e8' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/userSetting.tpl',
      1 => 1414102780,
    ),
  ),
  'nocache_hash' => '855054497efed485b0-74270202',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>用户设置</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <div style="color: red"><?php echo $_smarty_tpl->getVariable('errorMessag')->value;?>
</div>
            <form action="http://localhost/translationSystem/website/user/userSetting" method="post">
                <div><span>旧密码：</span><input id="oldPassword" name="oldPassword" type="password" value="" placeholder="请输入密码"></div>
                <div><span>新密码：</span><input id="newPassword" name="newPassword" type="password" value="" placeholder="请输入密码"></div>
                <div><span>重复密码：</span><input id="rePassword" name="rePassword" type="password" value="" placeholder="请输入密码"></div>
                <button id="checkBut">确认</button><button type="reset">重置</button>
            </form>
        </div>
    </body>
    <script>
        $("#checkBut").click(function () {
            var alertFlag = false;
            var alertText = "";
            if ($("#oldPassword").val() == "" || $("#newPassword").val() == "") {
                alertFlag = true;
                alertText += "新密码或旧密码不能为空";
            }
            if ($("#newPassword").val() != $("#rePassword").val()) {
                alertFlag = true;
                alertText += "\r\n新密码与重复密码两次输入不一致";
            }
            if (alertFlag) {
                alert(alertText);
                return false;
            }
        })
    </script>
</html>
