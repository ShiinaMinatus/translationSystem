<?php /* Smarty version Smarty-3.0-RC2, created on 2014-10-22 10:04:13
         compiled from "/web/www/project/website/Lib/Home/Tpl/Home/_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12341918675447109d76aeb7-50549746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71b747799dc6d339e5b9a10f1bfc0f9e153ee6e4' => 
    array (
      0 => '/web/www/project/website/Lib/Home/Tpl/Home/_header.tpl',
      1 => 1413880718,
    ),
  ),
  'nocache_hash' => '12341918675447109d76aeb7-50549746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
       <!-- ==============================================
        MAIN NAV
        =============================================== -->

<style>

.tdStyle{
    padding-left: 30px; cursor: pointer;
    padding-top: 60px;

    /*border: solid 1px red;*/
}

.tdStyle:hover{
    padding-left: 30px; cursor: pointer;
    color: rgb(210,12,72);
    padding-top: 60px;

}


.navbar li{
    padding-left: 12px;
}

</style>
<div>
        <div id="main-nav" class="navbar navbar-fixed-top">
            <div class="container">
            
                <div class="navbar-header" style="
height: 88px;
width: 300px;
margin-left: 66px;">

<img class="site-logo" style="width: 170px;
height: 110px;" src="<?php echo $_smarty_tpl->getVariable('WebSiteUrlPublic')->value;?>
/assets/amc/logo.png" alt="logo" />
                    
                </div>


<!--                         -->

                <div id="site-nav" style=" border-bottom: solid 1px #000;
width: 88.5%;
margin-left: 66px;" class="navbar-collapse collapse">

                    <div style=" border-bottom: solid 2px #000;
width: 100%;
height: 135px;">
                    <table style="font-size: 14px;margin-left: auto; margin-right: 52px;height: 120px;" >
                        <tr>
                        <td class="tdStyle" onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/buyTickets"'>购买门票</td>
                        <td class="tdStyle"  onclick='window.location.href="http://weibo.com/u/5190508584"'>关注我们</td>

                        <?php if ($_smarty_tpl->getVariable('whether_login')->value==0){?>
                            
                            <td class="tdStyle" onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/userCenter"'>登录/</td>

                            <td class="tdStyle" style="padding-left: 0px;" onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/register"'>注册</td>

                            <?php }else{ ?>

                             <td class="tdStyle" onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/user/userCenter"'><?php echo $_smarty_tpl->getVariable('userInfo')->value['user_email'];?>
</td>

                            <?php }?>
                            <td class="tdStyle"><a href='<?php echo $_smarty_tpl->getVariable('WebSiteUrlEN')->value;?>
'>EN</a></td>
                        
                        </tr>
                        </table>

                    </div>

                    <ul class="nav navbar-nav navbar-right" style="width: 1112px;
height: 55px;
margin-right: -44px;
margin-top: -4px;}">
                        <li class="sr-only">
                            <a href="#home" class="scrollto">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/index" class="scrollto">首页</a>                            
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/spaceShow" target="view_window">空间介绍</a>
                        </li>

                        <li>
                            <a class="zhanlan colorStyle" href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/showDetail" onmouseover='$("#homeDiv").css("display","block")'onmouseout='$("#homeDiv").css("display","none")' >展览</a>

                                   <div onmouseover='$("#homeDiv").css("display","block")' onmouseout='$("#homeDiv").css("display","none")' class="zhanlan" id='homeDiv'style='position: absolute;
top: 100%;
left: 0;
z-index: 1000;
display: none;
float: left;
min-width: 110px;
padding: 2px 0;
list-style: none;
font-size: 14px;
background-color: #fff;
border: 1px solid #ccc;
border: 1px solid rgba(0,0,0,.15);
border-radius: 4px;

-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
box-shadow: 0 6px 12px rgba(0,0,0,.175);
background-clip: padding-box;
}'>

                                <ul style='padding:0; margin-left: -7px'>

                                    <li style=' height: 20px; background: transparent;

border: 2px solid transparent;'><span style='cursor: pointer;width:100%;display: inline-block;' onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/oldShow"' >过去的展览</span></li>

                                     <li style=' height: 20px;background: transparent;

border: 2px solid transparent;'><span style='cursor: pointer;width:100%;display: inline-block;' onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/showDetail"' >现在的展览</span></li>

                                     <li style=' height: 20px;background: transparent;
border: 2px solid transparent;'><span style='cursor: pointer;width:100%;display: inline-block;' onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/timeShow"' >即将的展览</span></li>

                                </ul>

        </div>

                        </li>

                        <li>
                           <!--  <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/newsPost" target="view_window">公共项目</a> -->

                            <a class="zhanlan colorStyle" href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/newsPost" target="view_window" onmouseover='$("#publicDiv").css("display","block")'onmouseout='$("#publicDiv").css("display","none")' >公共项目</a>

                                   <div onmouseover='$("#publicDiv").css("display","block")' onmouseout='$("#publicDiv").css("display","none")' class="zhanlan" id='publicDiv'style='position: absolute;
top: 100%;
z-index: 1000;
display: none;
float: left;
min-width: 110px;
padding: 2px 0;

list-style: none;
font-size: 14px;

background-color: #fff;
border: 1px solid #ccc;
border: 1px solid rgba(0,0,0,.15);
border-radius: 4px;

-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
box-shadow: 0 6px 12px rgba(0,0,0,.175);
background-clip: padding-box;
}'>

                                <ul  style='padding:0'>

                                     <li style=' height: 20px;background: transparent;
border: 2px solid transparent;'><span style='cursor: pointer;width:100%;display: inline-block;' onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/index"' >工作坊</span></li>

                                     <li style=' height: 20px;background: transparent;
border: 2px solid transparent;'><span style='cursor: pointer;width:100%;display: inline-block;' onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/index"' >现场演出</span></li>

                                     <li style=' height: 20px;background: transparent;
border: 2px solid transparent;'><span style='cursor: pointer;width:100%;display: inline-block;' onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/index"' >会员活动</span></li>

                                    <li style=' height: 20px; background: transparent;
border: 2px solid transparent;'><span style='cursor: pointer;width:100%;display: inline-block;' onclick='window.location.href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/index"' >讲座与论坛</span></li>


                                </ul>

        </div>




                        </li>





                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/artist" target="view_window">艺术家</a>
                        </li>

                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/artShop" target="view_window">艺术商店</a>
                        </li>


<!--                         <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/about" target="view_window">公司简介</a>
                        </li> -->

                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/about" target="view_window" >联系我们</a>
                        </li>

                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('websiteUrl')->value;?>
/home/addUs" target="view_window" >加入我们</a>
                        </li>
                    </ul>
                </div><!--End navbar-collapse -->
                
            </div><!--End container -->
            
        </div><!--End main-nav -->

</div>

<script>
    $(function(){

        $("#homeDiv").mouseout(function(event) {
            /* Act on the event */
            $("#homeDiv").hide();
        });

    })


</script>

<style>
    
  #aboutDiv ul li span:hover, #homeDiv ul li span:hover{

    background-color: #f5f5f5;
    color: #262626;
    text-decoration: none;

  }  

</style>
