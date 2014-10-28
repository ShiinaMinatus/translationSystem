<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-28 14:25:59
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/findPasswordByMail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8260544f36f7530219-91373170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51f99d622fa7205be9402c1362e9dd6f4e715f06' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/findPasswordByMail.tpl',
      1 => 1414395528,
    ),
  ),
  'nocache_hash' => '8260544f36f7530219-91373170',
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
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="post" action="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/sendResertPasswrodMail" id="phoneForm">
            <div><span>请输入邮箱：</span><input id="mail" name="mail"  value=""  type="tel"></div>
            <button id="checkCode" type="button" >
                确认
            </button>
        </form>
        <input type="hidden" id="masterDir" value="<?php echo $_smarty_tpl->getVariable('MasterDirUrl')->value;?>
">
    </body>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script>
        URLstring = $("#masterDir").val();
        $("#checkCode").click(function () {
            if ($("#mail").val() == "") {
                alert("邮箱不能为空");
                return  false;
            }
            $.post(
                    URLstring + "/website/user/checkUserMail",
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
