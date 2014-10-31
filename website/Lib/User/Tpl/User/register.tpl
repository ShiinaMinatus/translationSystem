<!DOCTYPE html>
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
        <script src = "{$MasterDirUrl}/uploadify/jquery.uploadify.min.js?ver={math equation=rand(125,324)}" type = "text/javascript" ></script>
        <link rel="stylesheet" type="text/css" href="{$MasterDirUrl}/uploadify/uploadify.css" />
        <style>
            body{
                margin: 0;
                padding: 0;

            }
            #bodyDIv{
                margin: 0 auto;width: 1200px;background-color: white;min-height:500px; 
            }
            ul {
                list-style:none;
                margin-left: -40px;
            }
            ul li{
                float: left;
                height: 45px;
                line-height: 45px;
                width: 299px;
                text-align: center;
                border-top: 1px solid #E6E7EA;
                border-bottom:  1px solid #E6E7EA;
                border-left:  1px solid #E6E7EA;
                font-weight: 400;
                color: #bbb;
            }
            .selecLi{
                background-color: #44B549;
                color: white;
            }
            .MainDiv{
                margin-left: 50px;
                margin-top: 30px;
            }
            #registerBut{
                background-color: #44B549;
                border: none;
                color: white;
                width: 120px;
                height: 30px;
            }
            .MainDiv input{
                height: 30px;
                padding-left: 10px
            }
            .MainDiv select{
                height: 30px;
                padding-left: 10px
            }
            .errorDiv{
                color: red; 
                font-size: 12px;
                margin-top: 10px;
                display: none;
                margin-left: 95px;

            }
            #checkCodeImg:hover{
                cursor: pointer;
            }
        </style>
    </head>
    <body style="background:none repeat scroll 0% 0% #E7E8EB;">

        <div style="">
            <iframe frameborder="0" seamless="seamless" src="{$websiteUrl}/titleBanner.html" width="100%" height="100"></iframe>
            <div id="bodyDIv" style="margin-top: 50px">
                <div id="regeditArea">

                    {if $addFruit eq 1}
                        <ul>
                            <li class="selecLi">1 基本信息</li>
                            <li>2 邮箱激活</li>
                            <li>3 信息登记</li>
                            <li>4 等待审核</li>
                        </ul>
                        <div style="clear: both"></div>
                        <form action="{$websiteUrl}/user/userRegister?regestType=1" method="post">
                            <div class="MainDiv">

                                <div><span>电子邮箱：</span><input id="mail" name="mail" style="margin-left: 16px;" type="email" value="" placeholder=" 请输入邮箱"></div>
                                <div id="mailError" class="errorDiv"> 该邮箱已被使用请更换别的邮箱</div>
                                <br>
                                <div><span>密码：</span><input id="password" name="password" style="margin-left: 48px;" type="password" value="" placeholder=" 请输入密码"></div><br>
                                <div><span>重复密码：</span><input id="rePassword" name="rePassword" style="margin-left: 16px;" type="password" value="" placeholder=" 请输入密码"></div><br>
                                <div><span>验证码：</span><input id="checkCode" name="checkCode" style="margin-left: 31px;" type="text" value="" placeholder=" 请输入验证码">
                                    <img id="checkCodeImg" src="{$websiteUrl}/user/getCode" style="    height: 30px;position: relative; top: 10px;">
                                </div>
                                <div id="codeError" class="errorDiv"> 验证码错误</div>
                                <br>
                                <input type="hidden" id="checkMail" value="">
                                <input type="hidden" id="checkCodeInput" value="">
                                <div><button id="registerBut">注册</button></div>
                            </div>
                        {else if $addFruit eq "error3"}
                            <ul>
                                <li class="selecLi">1 基本信息</li>
                                <li>2 邮箱激活</li>
                                <li>3 信息登记</li>
                                <li>4 等待审核</li>
                            </ul>
                            <div style="clear: both"></div>
                            <div class="MainDiv">
                                <div>注册失败，已有重复的邮箱存在。</div>
                            </div>
                        {else if $addFruit eq 2}

                            <ul>
                                <li>1 基本信息</li>
                                <li  class="selecLi">2 邮箱激活</li>
                                <li>3 信息登记</li>
                                <li>4 等待审核</li>
                            </ul>
                            <div style="clear: both"></div>
                            <div class="MainDiv">

                                <form action="{$websiteUrl}/user/userRegister?regestType=0" method="post">

                                    <div>恭喜你注册成功，请登陆注册邮箱激活该账号,并完成内容</div>
                            </div>
                        {else if $addFruit eq 3}
                            <ul>
                                <li>1 基本信息</li>
                                <li  >2 邮箱激活</li>
                                <li class="selecLi">3 信息登记</li>
                                <li>4 等待审核</li>

                            </ul>
                            <div style="clear: both"></div>
                            <div class="MainDiv">
                                <div style="margin-bottom: 15px;">恭喜你账号激活成功，请完善您的个人信息</div>
                                <form action="{$websiteUrl}/user/UserFillInformation?regestType=2&userId={$userId}" method="post">
                                    <div>
                                        <span>性别：</span>
                                        <select name="gender" style="margin-left: 40px;" >
                                            <option value="1">男</option>
                                            <option value="2">女</option>
                                        </select>
                                    </div><br>
                                    <div><span>用户昵称：</span><input id="userNmae" name="userName"style="margin-left: 16px;" type="text" value="" placeholder="请输入用户名"></div><br>
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
                                    <div style="margin-top: 25px;"><button id="registerBut">注册</button></div>
                            </div>
                        {else if $addFruit eq 4}
                            <ul>
                                <li>1 基本信息</li>
                                <li  >2 邮箱激活</li>
                                <li >3 信息登记</li>
                                <li class="selecLi">4 等待审核</li>
                            </ul>
                            <div style="clear: both"></div>
                            <div class="MainDiv">
                                <div>您已经完成注册流程请等待审核。</div>
                            </div>
                        {/if}


                    </form>
                </div>
            </div>
            <input type="hidden" id="masterDir" value="{$MasterDirUrl}">
        </div>
    </body>
    <script>
        URLstring = $("#masterDir").val();
        $("#mail").blur(function () {
            if ($("#mail").val() == "") {
                $("#checkMail").val("false");
                $("#mailError").html("邮箱不能为空");
                $("#mailError").show();
            } else {
                $.post(
                        URLstring + "/website/user/checkMailMessage",
                        {
                            mail: $("#mail").val()
                        },
                function (rData) {

                    if (rData === "true") {
                        $("#checkMail").val("");
                        $("#mailError").hide();
                    }
                    else {
                        $("#checkMail").val("false");
                        $("#mailError").show();
                    }
                });
            }
        });
        $("#checkCode").blur(function () {
            $.post(
                    URLstring + "/website/user/checkRegisterCode",
                    {
                        checkCode: $("#checkCode").val()
                    },
            function (rData) {

                if (rData === "true") {
                    $("#checkCodeInput").val("");
                    $("#codeError").hide();
                }
                else {
                    $("#checkCodeInput").val("false");
                    $("#codeError").show();
                }
            });
        });
        $("#checkCodeImg").click(function () {
            $("#checkCodeImg").attr("src", URLstring + "/website/user/getCode?randomVal=" + Math.random());
        });
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
                alertText += "\r\n手机不能为空";
            }
            if ($("#checkCode").val() == "") {
                alertFlag = true;
                alertText += "\r\n验证码不能为空";
            }
            if ($("#uploadUrlCardId").val() == "" || $("#certificatePhoto").val() == "") {
                alertFlag = true;
                alertText += "\r\n身份证件与证书必须上传";
            } else if ($("#upload_img1").html() == "" || $("#upload_img2").html() == "") {
                alertFlag = true;
                alertText += "\r\n身份证件与证书必须上传";
            }
            if ($("#checkCodeInput").val() == "false") {
                alertFlag = true;
                alertText += "\r\n" + $("#codeError").html();
            }
            if ($("#checkMail").val() == "false") {
                alertFlag = true;
                alertText += "\r\n" + $("#mail").html();
            }
            if (alertFlag) {
                alert(alertText);
                return false;
            }
        });

        $('#upload_0').uploadify({
            'swf': URLstring + '/uploadify/uploadify.swf',
            'uploader': URLstring + '/uploadify/uploadify_group.php',
            'formData': {
                'objectid': 'upload_0',
                'session_id': '{$session_id}'
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
                'session_id': '{$session_id}'
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
