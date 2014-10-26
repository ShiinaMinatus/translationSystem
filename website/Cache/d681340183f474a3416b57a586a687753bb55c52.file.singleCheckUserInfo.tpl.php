<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-24 06:08:44
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/singleCheckUserInfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1724754497c6ced6798-56126174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd681340183f474a3416b57a586a687753bb55c52' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/singleCheckUserInfo.tpl',
      1 => 1414102117,
    ),
  ),
  'nocache_hash' => '1724754497c6ced6798-56126174',
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
            #rejectDiv{
                border: 1px solid black;
                width: 600px;
                height: 450px;
                position: absolute;
                top: 10%;
                left: 30%;
                z-index: 300;
                display: none;
            }
        </style>
    </head>
    <body>
        <form method="post" action="http://localhost/translationSystem/website/user/addUser?userId=<?php echo $_smarty_tpl->getVariable('checkUser')->value['id'];?>
">
            <table>
                <tr><td>昵称:</td><td><?php echo $_smarty_tpl->getVariable('checkUser')->value['user_name'];?>
</td></tr>
                <tr><td>性别:</td>
                    <td>
                        <?php if ($_smarty_tpl->getVariable('checkUser')->value['user_gender']==1){?>
                            男
                        <?php }else{ ?>
                            女
                        <?php }?>
                    </td>
                </tr>
                <tr><td>邮箱:</td><td><?php echo $_smarty_tpl->getVariable('checkUser')->value['user_mail'];?>
</td></tr>
                <tr><td>身份证照片:</td><td><img width="200" height="150"  src="<?php echo $_smarty_tpl->getVariable('Photo_Url')->value;?>
/<?php echo $_smarty_tpl->getVariable('checkUser')->value['user_id_card_photo'];?>
"></td></tr>
                <tr><td>证书照片:</td><td><img width="200" height="150"  src="<?php echo $_smarty_tpl->getVariable('Photo_Url')->value;?>
/<?php echo $_smarty_tpl->getVariable('checkUser')->value['user_certificate_photo'];?>
"></td></tr>
                <tr><td rowspan="2"><button type="submit">通过</button> <button type="button" id="reject">驳回</button></td></tr>
            </table>
        </form>
        <form id="formReject" method="post" action="http://localhost/translationSystem/website/user/rejectUser">       
            <div id="rejectDiv" style="">
                <div style="height: 10px;"></div>
                <div> 驳回理由:</div>
                <textarea id="rejectContext" name="rejectContext" style="width: 594px;height: 365px;margin-left:1px;"></textarea>
                <input type="hidden" id="mail" name="mail" value="<?php echo $_smarty_tpl->getVariable('checkUser')->value['user_mail'];?>
">
                <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->getVariable('checkUser')->value['id'];?>
">
                <button id="rejectEnter" type="button">确定</button>
                <button id="rejectCencal" type="button">取消</button>
            </div>
        </form>
    </body>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script>
        $("#reject").click(function () {
            $("#rejectContext").val("");
            $("#rejectDiv").show();

        });
        $("#rejectCencal").click(function () {
            $("#rejectContext").val("");
            $("#rejectDiv").hide();

        });
        $("#rejectEnter").click(function () {
            if ($("#rejectContext").val() == "") {
                alert("理由不能为空");
                return false;
            }
            var haha = document.getElementById("rejectContext").value;
            haha = haha.replace('<br />', '\r\n');
            haha = haha.replace('<br />', '\r');
            haha = haha.replace('<br />', '\n');
            document.getElementById("rejectContext").value = haha;
            $("#formReject").submit();
        })
    </script>
</html>
