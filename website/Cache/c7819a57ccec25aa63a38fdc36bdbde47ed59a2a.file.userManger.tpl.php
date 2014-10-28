<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-28 14:15:33
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/userManger.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6112544f348505ab97-52848956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7819a57ccec25aa63a38fdc36bdbde47ed59a2a' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/userManger.tpl',
      1 => 1414476931,
    ),
  ),
  'nocache_hash' => '6112544f348505ab97-52848956',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <title>用户管理</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .divLine{
                display: inline-block;
                width: 30%;
                text-align: center;
            }
            table{
                border-collapse: collapse;
            }
            table tr td{
                border: 1px solid black;
            }
            table tr{
            }
        </style>
    </head>
    <body>
        <div>
            <div id="titleBar" style=" height: 140px;width: 100%">
                <div class="divLine">
                    <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/translation/allTranslationList">任务</a> 
                </div>
                <div class="divLine">
                    <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/userSetting">设置</a>
                </div>
                <div class="divLine">
                    <?php if ($_smarty_tpl->getVariable('authority')->value==1){?>
                        <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/adminManger">管理</a>
                    <?php }?>
                </div>
            </div>
            <div style="width: 400px;margin: 0 auto; text-align: center">
                <table style="border: 1px solid black; text-align: center">
                    <tr><td style="width: 160px">UID</td><td><?php echo $_smarty_tpl->getVariable('userInfo')->value['id'];?>
</td></tr>
                    <tr><td>用户昵称</td><td><?php echo $_smarty_tpl->getVariable('userInfo')->value['user_name'];?>
</td></tr>
                    <tr><td>用户邮箱</td><td><?php echo $_smarty_tpl->getVariable('userInfo')->value['user_mail'];?>
</td></tr>
                    <tr><td>用户手机</td><td><?php echo $_smarty_tpl->getVariable('userInfo')->value['user_phone'];?>
</td></tr>
                    <tr><td>平台币</td><td><?php echo $_smarty_tpl->getVariable('userInfo')->value['user_coin'];?>
</td></tr>

                </table>
            </div>
        </div>
    </body>
</html>
