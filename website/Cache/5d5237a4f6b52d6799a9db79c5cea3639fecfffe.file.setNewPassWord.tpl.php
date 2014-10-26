<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-25 15:57:38
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/setNewPassWord.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6071544b57f28551f8-56570619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d5237a4f6b52d6799a9db79c5cea3639fecfffe' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/setNewPassWord.tpl',
      1 => 1414223854,
    ),
  ),
  'nocache_hash' => '6071544b57f28551f8-56570619',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <title>重置密码</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <div style="color: red"><?php echo $_smarty_tpl->getVariable('errorMessag')->value;?>
</div>
            <form action="http://localhost/translationSystem/website/user/changeUserPassWord" method="post">
                <div><span>新密码：</span><input id="newPassword" name="newPassword" type="password" value="" placeholder="请输入密码"></div>
                <div><span>重复密码：</span><input id="rePassword" name="rePassword" type="password" value="" placeholder="请输入密码"></div>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
                <input type="hidden" name="oldPassword" value="<?php echo $_smarty_tpl->getVariable('userPassword')->value;?>
">
                <button id="checkBut">确认</button><button type="reset">重置</button>
            </form>
        </div>
    </body>
    <script>
        $("#checkBut").click(function () {
            var alertFlag = false;
            var alertText = "";
            if ($("#newPassword").val() == "") {
                alertFlag = true;
                alertText += "新密码不能为空";
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
