<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-28 11:16:01
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/Translation/Tpl/Translation/undoneTranslation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28239544f0a71b18fe0-63856185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d568c24c0b7058d58e5392c0258b07340bd7730' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/Translation/Tpl/Translation/undoneTranslation.tpl',
      1 => 1414466159,
    ),
  ),
  'nocache_hash' => '28239544f0a71b18fe0-63856185',
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
        <title>未完成任务</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>未完成任务 
            <a style=" margin-left: 25px;" href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/managerPage">返回</a>
        </div>
        <div style="color: red"><?php echo $_smarty_tpl->getVariable('printMessage')->value;?>
</div>
        <table>
            <tr><th >任务流水号</th><th>任务发起者</th><th>任务简介</th><th>任务奖励</th><th>继续任务</th></tr>
                    <?php  $_smarty_tpl->tpl_vars['translationAlls'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('translationList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['translationAlls']->key => $_smarty_tpl->tpl_vars['translationAlls']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['translationAlls']->key;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['translationAlls']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['translationAlls']->value['user_name'];?>
</td>
                    <td>
                        将简历从中文翻译成英文
                    </td>
                    <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['translationAlls']->value['resume_coin'];?>
</td>
                    <td><a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/translation/getMission?translationId=<?php echo $_smarty_tpl->tpl_vars['translationAlls']->value['id'];?>
&resumeId=<?php echo $_smarty_tpl->tpl_vars['translationAlls']->value['resume_id'];?>
">继续任务</a></td>
                </tr>
            <?php }} ?>
        </table>
    </body>
</html>
