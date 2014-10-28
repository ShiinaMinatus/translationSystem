<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-28 16:38:43
         compiled from "C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24095544f561360cba3-58470913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '222b9cb058f1d3262dd00f489b138728f806db02' => 
    array (
      0 => 'C:/xampp/htdocs/translationSystem/website/Lib/User/Tpl/User/register.tpl',
      1 => 1414485512,
    ),
  ),
  'nocache_hash' => '24095544f561360cba3-58470913',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_math')) include 'C:\xampp\htdocs\translationSystem\website\Config\Smarty\libs\plugins\function.math.php';
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>注册</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
        <script src = "<?php echo $_smarty_tpl->getVariable('MasterDirUrl')->value;?>
/uploadify/jquery.uploadify.min.js?ver=<?php echo smarty_function_math(array('equation'=>rand(125,324)),$_smarty_tpl->smarty,$_smarty_tpl);?>
" type = "text/javascript" ></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('MasterDirUrl')->value;?>
/uploadify/uploadify.css" />
    </head>
    <body>
        <div style="margin: 0 auto;width: 1200px;margin-top:  100px;">
            <form action="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/userRegister" method="post">
                <div><span>用户名：</span><input id="userNmae" name="userName"style="margin-left: 32px;" type="text" value="" placeholder="请输入用户名"></div><br>
                <div><span>密码：</span><input id="password" name="password" style="margin-left: 48px;" type="password" value="" placeholder="请输入密码"></div><br>
                <div><span>重复密码：</span><input id="rePassword" name="rePassword" style="margin-left: 16px;" type="password" value="" placeholder="请输入密码"></div><br>
                <div>
                    <span>性别：</span>
                    <select name="gender" style="margin-left: 40px;" >
                        <option value="1">男</option>
                        <option value="2">女</option>
                    </select>
                </div><br>
                <div><span>电子邮箱：</span><input id="mail" name="mail" style="margin-left: 16px;" type="email" value="" placeholder="请输入邮箱"></div><br>
                <div><span>手机号码：</span><input id="phone" name="phone" style="margin-left: 16px;" type="tel" value="" placeholder="请输入手机号码"></div><br>
                <div>
                    <span>身份证照片：</span>                        
                    <div>
                        <input id="upload_0" class="inputUploads"  type="file" multiple="multiple" />
                        <input id="uploadUrlCardId" type="hidden" name="cardPhoto" value="">
                    </div>

                    <div id='upload_img1'></div>

                </div>
                <div>
                    <span>英语证书：</span>
                    <div>
                        <input id="upload_1" class="inputUploads"  type="file" multiple="multiple" />
                        <input id="certificatePhoto" type="hidden" name="certificatePhoto" value="">
                    </div>

                    <div id='upload_img2'></div>
                </div>
                <div><button id="registerBut">注册</button></div>
            </form>
            <input type="hidden" id="masterDir" value="<?php echo $_smarty_tpl->getVariable('MasterDirUrl')->value;?>
">
        </div>
    </body>
    <script>
        $("#registerBut").click(function () {
            var alertFlag = false;
            var alertText = "";
            if ($("#userNmae").val() == "") {
                alertFlag = true;
                alertText += "用户名不能为空";
            }
            if ($("#password").val() == "") {
                alertFlag = true;
                alertText += "\r\n密码不能为空";
            }
            if ($("#password").val() != $("#rePassword").val()) {
                alertFlag = true;
                alertText += "\r\n密码与重复密码两次输入不一致";
            }
            if ($("#mail").val() == "") {
                alertFlag = true;
                alertText += "\r\n邮箱不能为空";
            }
            if ($("#phone").val() == "") {
                alertFlag = true;
                alertText += "\r\n邮箱不能为空";
            }
            if ($("#uploadUrlCardId").val() == "" || $("#certificatePhoto").val() == "") {
                alertFlag = true;
                alertText += "\r\n身份证件与证书必须上传";
            } else if ($("#upload_img1").html() == "" || $("#upload_img2").html() == "") {
                alertFlag = true;
                alertText += "\r\n身份证件与证书必须上传";
            }
            if (alertFlag) {
                alert(alertText);
                return false;
            }
        });
        URLstring = $("#masterDir").val();
        $('#upload_0').uploadify({
            'swf': URLstring + '/uploadify/uploadify.swf',
            'uploader': URLstring + '/uploadify/uploadify_group.php',
            'formData': {
                'objectid': 'upload_0',
                'session_id': '<?php echo $_smarty_tpl->getVariable('session_id')->value;?>
'
            },
            'onUploadSuccess': function (file, data, response) {
                if (data == "code2") {
                    alert("上传图片失败，图片格式必须为jpg或者jpge格式");
                } else if (data == "code1") {
                    alert("上传图片失败，由于微信限制图片大小必须小于5M");
                } else {
                    var json = eval("(" + data + ")");
                    $('#uploadUrlCardId').val(json['fileName']);

                    if (json['path'] != '') {

                        $('#upload_img1').html("");
                        $('#upload_img1').append('<img src="' + json['path'] + '" style="width:200px; height:150px;">')


                    }
                }

            }
        });
        $('#upload_1').uploadify({
            'swf': URLstring + '/uploadify/uploadify.swf',
            'uploader': URLstring + '/uploadify/uploadify_group.php',
            'formData': {
                'objectid': 'upload_1',
                'session_id': '<?php echo $_smarty_tpl->getVariable('session_id')->value;?>
'
            },
            'onUploadSuccess': function (file, data, response) {
                $("#errorMessageDiv").hide();
                if (data == "code2") {
//                    $("#errorMessageDiv").show();
//                    $("#errorMessage").html("上传图片失败，图片格式必须为jpg或者jpge格式");
                    alert("上传图片失败，图片格式必须为jpg或者jpge格式");
                } else if (data == "code1") {
//                    $("#errorMessageDiv").show();
//                    $("#errorMessage").html("上传图片失败，由于微信限制图片大小必须小于64k");
                    alert("上传图片失败，由于微信限制图片大小必须小于5M");
                } else {
                    var json = eval("(" + data + ")");
                    $('#certificatePhoto').val(json['fileName']);


                    if (json['path'] != '') {

                        $('#upload_img2').html("");
                        $('#upload_img2').append('<img src="' + json['path'] + '" style="width:200px; height:150px;">')


                    }
                }

            }
        });
    </script>
</html>
