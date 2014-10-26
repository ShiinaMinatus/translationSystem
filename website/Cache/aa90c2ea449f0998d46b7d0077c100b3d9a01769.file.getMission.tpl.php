<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-26 20:46:22
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/Translation/Tpl/Translation/getMission.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16887544ced1ed06f53-79399857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa90c2ea449f0998d46b7d0077c100b3d9a01769' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/Translation/Tpl/Translation/getMission.tpl',
      1 => 1414327563,
    ),
  ),
  'nocache_hash' => '16887544ced1ed06f53-79399857',
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
        <style>
            .trStyle{
                word-break: break-all;
            }
            .textArea{
                width: 520px;
                height: 130px;
            }
        </style>
    </head>
    <body>
        <div>翻译简历 <a style=" margin-left: 25px;" href="http://localhost/translationSystem/website/user/managerPage">返回</a></div>
        <div style="color: red"><?php echo $_smarty_tpl->getVariable('printMessage')->value;?>
</div>
        <div style="width: 100%;">
            <table id="tra" style="width:45%;float: left">
                <tr><td style="width: 100px;">姓名</td><td class=""><?php echo $_smarty_tpl->getVariable('resumeValue')->value['user_name'];?>
</td></tr>
                <tr><td>性别</td><td><?php echo $_smarty_tpl->getVariable('resumeValue')->value['sex_name'];?>
</td></tr>
                <tr><td>毕业院校</td><td><?php echo $_smarty_tpl->getVariable('resumeValue')->value['school_name'];?>
</td></tr>
                <tr><td>专业</td><td><?php echo $_smarty_tpl->getVariable('resumeValue')->value['major_detail_name'];?>
</td></tr>
                <tr><td>最高学历</td><td><?php echo $_smarty_tpl->getVariable('resumeValue')->value['education_name'];?>
</td></tr>
                <tr><td  colspan="2">专业技能</td></tr>
                <tr> <td  colspan="2" class="trStyle"><?php echo $_smarty_tpl->getVariable('resumeValue')->value['professional_skill'];?>
</td></tr>
                <tr><td colspan="2">社会经历</td></tr>
                <tr> <td  colspan="2" class="trStyle"><?php echo $_smarty_tpl->getVariable('resumeValue')->value['social_practice'];?>
</td></tr>
                <tr><td  colspan="2">荣誉奖项</td></tr>
                <tr> <td  colspan="2" class="trStyle"><?php echo $_smarty_tpl->getVariable('resumeValue')->value['honor'];?>
</td></tr>
                <tr><td  colspan="2">自我评价</td></tr>
                <tr> <td  colspan="2" class="trStyle"><?php echo $_smarty_tpl->getVariable('resumeValue')->value['self_evaluation'];?>
</td></tr>
            </table>
            <form method="post" action="http://localhost/translationSystem/website/translation/submitEnglishResume?resumeId=<?php echo $_smarty_tpl->getVariable('resumeValue')->value['resume_id'];?>
">
                <table  style="width: 45%;float: left;margin-left: 50px;">
                    <tr><td style="width: 100px;">姓名</td><td class=""><input name="nameEng"></td></tr>
                    <tr><td>性别</td><td><?php echo $_smarty_tpl->getVariable('resumeValue')->value['sex_name_eng'];?>
</td></tr>
                    <tr><td>毕业院校</td><td><?php echo $_smarty_tpl->getVariable('resumeValue')->value['school_name_eng'];?>
</td></tr>
                    <tr><td>专业</td><td><?php echo $_smarty_tpl->getVariable('resumeValue')->value['major_detail_name_eng'];?>
</td></tr>
                    <tr><td>最高学历</td><td><?php echo $_smarty_tpl->getVariable('resumeValue')->value['education_name_eng'];?>
</td></tr>
                    <tr><td  colspan="2">专业技能</td></tr>
                    <tr> <td  colspan="2" class="trStyle"><textarea name="professional_skill" class="textArea"></textarea></td></tr>
                    <tr><td colspan="2">社会经历</td></tr>
                    <tr> <td  colspan="2" class="trStyle"><textarea name="social_practice" class="textArea"></textarea></td></tr>
                    <tr><td  colspan="2">荣誉奖项</td></tr>
                    <tr> <td  colspan="2" class="trStyle"><textarea name="honor" class="textArea"></textarea></td></tr>
                    <tr><td  colspan="2">自我评价</td></tr>
                    <tr> <td  colspan="2" class="trStyle"><textarea name="self_evaluation" class="textArea"></textarea></td></tr>
                    <tr><td  colspan="2"><button> 提交</button><button style="margin-left: 35px;" type="reset">重置</button></td></tr>
                </table>
            </form>
        </div>
    </body>
</html>
