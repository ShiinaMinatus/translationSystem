<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-28 14:25:41
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/userRegister.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2367544f36e5c504d9-97746651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bb0ad550953fe51f9ee190b24fc4e1e3ce0f2c1' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/userRegister.tpl',
      1 => 1413972992,
    ),
  ),
  'nocache_hash' => '2367544f36e5c504d9-97746651',
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
        <?php if ($_smarty_tpl->getVariable('addFruit')->value==1){?>
            <div>恭喜你注册成功，请登陆注册邮箱激活该账号。账号激活后将会自动进入审核流程</div>
        <?php }elseif($_smarty_tpl->getVariable('addFruit')->value==3){?>
            <div>注册失败，已有重复的邮箱存在。</div>
        <?php }else{ ?>
            <div>注册失败，请联系管理员。</div>
        <?php }?>
    </body>
</html>
