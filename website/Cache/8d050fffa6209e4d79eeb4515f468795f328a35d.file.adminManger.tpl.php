<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-28 14:11:20
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/adminManger.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6088544f3388dafb51-35378590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d050fffa6209e4d79eeb4515f468795f328a35d' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/adminManger.tpl',
      1 => 1414476674,
    ),
  ),
  'nocache_hash' => '6088544f3388dafb51-35378590',
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
        <title>用户审核</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div><span>用户审核</span><a style=" margin-left: 25px;" href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/managerPage">返回</a>
            <a style=" margin-left: 25px;" href="<?php echo $_smarty_tpl->getVariable('ApiUrl')->value;?>
/task/getSqlLog">SQL日志</a></div>
        <div style="color: red"><?php echo $_smarty_tpl->getVariable('printMessage')->value;?>
</div>
        <table>
            <tr><th >id</th><th>昵称</th><th>性别</th><th>邮箱</th><th>详情</th></tr>
                    <?php  $_smarty_tpl->tpl_vars['userAlls'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('checkUser')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['userAlls']->key => $_smarty_tpl->tpl_vars['userAlls']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['userAlls']->key;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['userAlls']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['userAlls']->value['user_name'];?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['userAlls']->value['user_gender']==1){?>
                            男
                        <?php }else{ ?>
                            女
                        <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['userAlls']->value['user_mail'];?>
</td>
                    <td><a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/singleCheckUserInfo?userId=<?php echo $_smarty_tpl->tpl_vars['userAlls']->value['id'];?>
">详情</a></td>
                </tr>
            <?php }} ?>
        </table>
    </body>
</html>
