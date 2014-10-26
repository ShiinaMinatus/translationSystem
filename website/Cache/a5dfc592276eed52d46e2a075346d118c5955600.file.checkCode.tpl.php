<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-25 15:15:44
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/checkCode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:570544b4e2008bac1-56381238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5dfc592276eed52d46e2a075346d118c5955600' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/checkCode.tpl',
      1 => 1414217969,
    ),
  ),
  'nocache_hash' => '570544b4e2008bac1-56381238',
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
        <form method="post" action="http://localhost/translationSystem/website/user/findPasswordByPhone" id="phoneForm">
            <div><span>请输入手机验证码：</span><input id="checkCode" name="checkCode" value="" type="tel"></div>

        </form>
        <button id="checkPhoneNumber">
            确定
        </button>
    </body>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
</html>
