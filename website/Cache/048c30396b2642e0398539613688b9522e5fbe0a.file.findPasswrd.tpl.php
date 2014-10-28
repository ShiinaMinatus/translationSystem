<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-28 14:25:57
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/findPasswrd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19799544f36f586d1a5-37451336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '048c30396b2642e0398539613688b9522e5fbe0a' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/findPasswrd.tpl',
      1 => 1414378861,
    ),
  ),
  'nocache_hash' => '19799544f36f586d1a5-37451336',
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
        <div style="height: 180px;"></div>
        <div style="width: 60%;margin: 0 auto;text-align: center">
            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/findPasswordByMail"><button style="width: 50%">邮箱找回</button></a>
            <div style="height: 100px;"></div>
            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/findPasswordByPhone"> <button style="width: 50%">手机找回</button></a>
        </div>
    </body>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
</html>
