<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-25 15:40:21
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/findPasswordByPhone.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18651544b53e592ced8-75362131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13d29099105cb26751fc81c8c680b6759c066725' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/findPasswordByPhone.tpl',
      1 => 1414222816,
    ),
  ),
  'nocache_hash' => '18651544b53e592ced8-75362131',
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
        <form method="post" action="http://localhost/translationSystem/website/user/setNewPassWord" id="phoneForm">
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

    </body>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script>
        $("#checkPhoneNumber").click(function () {
            if ($("#phone").val() == "") {
                alert("手机号码不能为空");
                return  false;
            }
            $.post(
                    "/translationSystem/website/user/checkUserPhone",
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
                    "/translationSystem/website/user/checkCode",
                    {
                        phone: $("#phone").val(),
                        code: $("#code").val()
                    },
            function (rData) {
                if (rData == "true") {

                    $("#phoneForm").submit();
                }
                else {
                    alert("填写的内容无效或者手机号码错误");
                }
            });
        });
    </script>
</html>
