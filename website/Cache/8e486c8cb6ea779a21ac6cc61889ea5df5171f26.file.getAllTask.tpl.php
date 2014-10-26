<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-23 19:10:53
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/Task/Tpl/Task/getAllTask.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183895448e23d1a1208-28307546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e486c8cb6ea779a21ac6cc61889ea5df5171f26' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/Task/Tpl/Task/getAllTask.tpl',
      1 => 1414062651,
    ),
  ),
  'nocache_hash' => '183895448e23d1a1208-28307546',
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
        <div>任务</div>
        <div style="color: red"><?php echo $_smarty_tpl->getVariable('printMessage')->value;?>
</div>
        <table>
            <tr><th >id</th><th>任务名称</th><th>任务简介</th><th>任务奖励</th><th>获取任务</th></tr>
                    <?php  $_smarty_tpl->tpl_vars['userAlls'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('taskList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['userAlls']->key => $_smarty_tpl->tpl_vars['userAlls']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['userAlls']->key;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['userAlls']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['userAlls']->value['task_name'];?>
</td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['userAlls']->value['task_context'];?>

                    </td>
                    <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['userAlls']->value['task_reward'];?>
</td>
                    <td><a href="http://localhost/translationSystem/website/user/singleCheckUserInfo?userId=<?php echo $_smarty_tpl->tpl_vars['userAlls']->value['id'];?>
">获取任务</a></td>
                </tr>
            <?php }} ?>
        </table>
    </body>
</html>
