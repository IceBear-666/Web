<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="UTF-8">

<title><?php if($page_title) echo $page_title;else echo C('WEB_SITE_TITLE'); ?> </title>
<meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>">
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>">
<meta name="baidu-site-verification" content="tPqpxinOFC" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/reset.css" />
<link rel="shortcut icon" type="image/ico" href="/favicon.ico">

<script type="text/javascript" src="/Public/Home/js/jquery.1.10.1.min.js" ></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lib.min.js"></script>

<script src="/Public/Home/js/ajaxfileupload.js" type="text/javascript"></script>

<!--New delete-->

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/external.min.css" />
<script type="text/javascript" src="/Public/Home/js/company/jobs.js"></script>        
<script type="text/javascript" src="/Public/Home/js/company/company.js"></script>         
<script type="text/javascript" src="/Public/Home/js/core.min.js"></script> 
<script type="text/javascript" src="/Public/Home/js/popup.js"></script> 
<!--New delete-->

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
//var ctx = "";

var ctx = "<?php echo (WEB_URL); ?>";
var rctx = "<?php echo (WEB_URL); ?>";
var pctx = "<?php echo (WEB_URL); ?>";

/* var frontLogin = "http://www.xxxxx.com/frontLogin.do";
var frontLogout = "http://www.xxxxx.com/frontLogout.do";
var frontRegister = "http://www.xxxxx.com/frontRegister.do"; */

</script>

<style type="text/css">
  
  .index_downlaod{
    font-size: 16px;
    width: 120px;
    height: 36px;
    line-height: 36px;
    border-radius: 20px;
    background-color: #fff;
    padding: 10px 30px;
  }
  .header .index_donwload_container {
    float: right;
    width: 125px;
    padding-top: 12px;
  }
</style>
</head>


<body>
<div id="body">

<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header">
        <div class="w960">
          <div class="logo"><a <?php echo ($cur_top_nav["plugin"]); ?> href="/index.html"><img src="/Public/Home/images/logo.png" /></a></div>
          
          
          <?php if(is_login()): if(getUsersSession('type')==1){ ?>
          
          	<!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/info.html">我的公司</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Company/interview.html">简历管理</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div> -->
            <div class="nav">
              <a  href="/Company/companylist.html">名企网申</a>
              <a  href="#">求职百科</a>
              <a  href="#">求职资讯</a>
              <a  href="/Plugin/plugin.html">求职助手</a>
               <!--  <a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a> -->
                 <!--  <a <?php echo ($cur_top_nav["install"]); ?> href="/Install/install.html">安装教程</a>
                <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a> -->
              </div>
          		
          	<?php }else{ ?> 
          	
          		<!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a><a <?php echo ($cur_top_nav["collections"]); ?> href="/User/collections.html">我的收藏</a></div>  -->
              <div class="nav">
              <a  href="/Company/companylist.html">名企网申</a>
              <a  href="#">求职百科</a>
              <a  href="#">求职资讯</a>
              <a  href="/Plugin/plugin.html">求职助手</a>
               <!-- <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
                <a <?php echo ($cur_top_nav["install"]); ?> href="/Install/install.html">安装教程</a>
                <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/companylist.html">网申时间表</a>
                <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a>
                 <a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a> -->
              </div>
          		
          	<?php } ?>
          
          	<div class="login">
                <ul class="top-right">
                 
                  <?php if(getUsersSession('type')==0){ ?>
                    <li><?php var_dump($myinfo)?></li>
                    <li><a  href="/Resume/myresume.html">网申简历</a></li>
                    <li><a  href="#">我的收藏</a></li>
                    <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                  <?php } ?>
                </ul>
          <!--   <div class="index_donwload_container"> -->
         
              
	          	<!--  <div class="icous">
                    <div class="inusnav">
                      <em></em>
                      <?php if(getUsersSession('type')==0){ ?>

                      <a href="/User/delivery.html">投递管理</a>
                      <?php } ?>
                      <a href="/User/index.html">账号设置</a>
                      <a href="<?php echo U('User/logout');?>">退出</a>
                    </div>
                </div>  -->
               <!--  <a href="#plugindownload" class="index_downlaod inline cboxElement" title="请选择你当前的浏览器（更多浏览器正在努力开发中）">立即下载</a> -->
	          </div>
          
          <?php else: ?>
          
	          <!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div> -->

            <div class="nav">
            
              <a href="/Company/companylist.html">名企网申</a>
              <a href="#">求职百科</a>
              <a href="#">求职资讯</a>
              <a href="/Plugin/plugin.html">求职助手</a>
              <!-- <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
              <a <?php echo ($cur_top_nav["install"]); ?> href="/Install/install.html">安装教程</a>
              <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/companylist.html">网申时间表</a>
              <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a> -->
            </div>

	          <div class="login"> 
            <!-- <div class="index_donwload_container"> -->
	         <!--  <a href="#plugindownload" class="index_downlaod inline cboxElement" title="请选择你当前的浏览器（更多浏览器正在努力开发中）">立即下载</a> -->
  	          <ul class="top-nologin">
               <!--  <li><a  href="<?php echo U('User/login');?>">登录</a></li>  -->
               <a id="various1" href="#inline1" href="<?php echo U('User/login');?>">登录</a>
                <li><a href="<?php echo U('User/register');?>">注册</a></li> 
                <li><a  href="/Resume/myresume.html">网申简历</a></li>
                <li><a  href="#">我的收藏</a></li>
              </ul>
            
	          </div><?php endif; ?> <div class="clr"></div>
          
          </div>
         
        </div>
      
	</div>

</div>

<script type="text/javascript" src="/Public/Home/js/jquery.1.10.1.min.js" ></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lib.min.js"></script>

<script src="/Public/Home/js/ajaxfileupload.js" type="text/javascript"></script>

<!--New delete-->

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/external.min.css" />
<script type="text/javascript" src="/Public/Home/js/company/jobs.js"></script>        
<script type="text/javascript" src="/Public/Home/js/company/company.js"></script>         
<script type="text/javascript" src="/Public/Home/js/core.min.js"></script> 
<script type="text/javascript" src="/Public/Home/js/popup.js"></script> 
<!-- <link rel="stylesheet" type="text/css"  href="/Public/Home/css/reg.css" />
 -->
<!--  <link rel="stylesheet" type="text/css" href="/Public/Home/css/loginformstyle.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/animate-custom.css" /> -->

<script type="text/javascript" src="/Public/Home/js/jquery.fancybox.pack.js"></script> 
<link rel="stylesheet" type="text/css" href="/Public/Home/css/jquery.fancybox.css" />
<style type="text/css">
    #loginWarpper {
        padding: 20px 35px;
    }
    #loginWarpper a{
        color: #482929;
        text-decoration: none;
    }
    #loginWarpper .login_logo{
       margin:  auto 0;
    }
    input.pupbtn{
        /*width: 100% !important;*/
        background-color: #e5e5e5;
        width: 370px;
        height: 42px;
        padding: 0 10px;
        margin: 10px 0;
        color: #482929;
        border:0px;
    }

    #loginForm input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
        background-color: #e5e5e5 !important;
        -webkit-box-shadow: 0 0 0px 1000px #e5e5e5 inset; 
        color: #482929;
    }

    #submitLogin {
        width: 100%;
        padding: 12px 0;
        margin: 10px 0 20px 0;
    }
</style>

<div id="content">
    <div style="display: none;">
        <div id="inline1" style="width:460px;height:330px;overflow:auto;">
            <div  id="loginWarpper" class="popup" >
             <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="">
                    <div class="login_wrapper"> 
                        <div class="login_logo"> 
                            <a href="/"><img src="/Public/Home/images/uslogo.png" /></a>
                        </div> 

                        <input type="hidden" id="resubmitToken" value="" /> 
                        <div class=""> 
                        <form id="loginForm" class="loginForm" action="<?php echo U('User/logintest');?>" method="post">
                         <input class="pupbtn" type="text" id="email" name="email" value="" tabindex="1" placeholder="请输入登录邮箱地址" /> 
                         <input class="pupbtn" type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20"/> 
                         <span class="error" style="display:none;" id="beError"></span> 
                          <div class="clr"></div>

                         <input type="submit" id="submitLogin" class="mybtn"  value="登录" /> 
                         <input type="hidden" id="callback" name="callback" value="" /> 
                         <input type="hidden" id="authType" name="authType" value="" /> 
                         <input type="hidden" id="signature" name="signature" value="" /> 
                         <input type="hidden" id="timestamp" name="timestamp" value="" /> 
                        <div>
                            <div style="float:left"><a href="/User/findPassword" class="rt" >忘记密码？</a> </div>
                            <div style="float:right">
                                <a id="test_reg" href="<?php echo U('User/register');?>" >没有帐号？立即注册></a>
                            </div>
                            <div class="clear"></div> 
                        </div>

                        </form> 
                      
                       </div> 
                       <div class="login_box_btm"></div> 
                 
                    </div>
                    
                </div>
            </div> 
        </div>
    
    </div>


    
</div>
<div style="text-align:center;clear:both">
</div>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#various1").fancybox({
            helpers : {
                overlay : {
                    css : {
                        'background' : 'rgba(255, 215, 50, 0.9)',
                        'overlayOpacity'    : 0.9
                    }
                }
            }
        });
        // $("#test_reg").fancybox({
        //     helpers : {
        //         overlay : {
        //             css : {
        //                 'background' : 'rgba(255, 215, 50, 0.9)',
        //                 'overlayOpacity'    : 0.9
        //             }
        //         }
        //     }
        // });
    });
    var login_from = "<?php echo $_GET[md]; ?>";
        $(document)
            .ajaxStart(function(){
                $("#submitLogin").addClass("log-in").attr("disabled", true);
            })
            .ajaxStop(function(){
                $("#submitLogin").removeClass("log-in").attr("disabled", false);
            });


        $("#loginForm").submit(function(){
            $("#beError").hide();
            var self = $(this);
            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;

            function success(data){
                if(data.status){
                    if(login_from == "min"){
                        window.close(); 
                        parent.location.reload();
                    }
                    else window.location.href = data.url;
                } else {
                    //self.find(".Validform_checktip").text(data.info);
                    $("#beError").show();
                    $("#beError").text(data.info);
                    //刷新验证码
                    //$(".reloadverify").click();
                }
            }
        });

        $(function(){
            var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
        });
    </script>

<script type="text/javascript" src="/Public/Home/js/query.1.10.1.min.js"></script> 
<script type="text/javascript" src="/Public/Home/js/bootstrap.min.js"></script> 
	  
<!-- <div style="display:none;"> 
    <style>
    .clear {clear: both;}
    .jm_plugindownload {padding: 30px 50px;}
    .jm_plugindownload p{padding-bottom: 40px;}
    .btn-browser-container {width: 475px; clear: both;}
    .popup{ padding:0;} 
    .btn-browser{ margin: 10px 0;  padding: 10px 20px 10px 10px;  width: 180px;  height: 40px; line-height: 40px; border: 1px solid #dbdbdb;border-radius: 5px;} 
    .btn-browser span {width: 50px; height: 50px; display: inline-block;}
    .btn-browser span img{vertical-align:middle;}
    .btn-disabled {background-color: #f5f5f5;}
    .btn-chrome{float: left;} 
    .btn-ie{float: right;}  
    .btn-liebao{float: left;} 
    .btn-360{float: right;} 
    
    </style>
    <div id="plugindownload" class="popup" style="">
        <div class="jm_plugindownload">
            <div class="btn-browser-container">
                <a class="btn-browser btn-chrome" target="_blank" href="/Install/install.html"><span><img src="/Uploads/Plugin/chrome.png"></span>Chrome 浏览器</a>
                <a class="btn-browser btn-ie" target="_blank" href="https://ext.chrome.360.cn/webstore/detail/cjbbilalppleefkdldcnjggncniphbjf"><span><img src="/Uploads/Plugin/ie.png"></span>360 安全浏览器</a>
            </div>
            <div class="btn-browser-container">
                <a class="btn-browser btn-liebao btn-disabled"><span><img src="/Uploads/Plugin/liebao.png"></span>即将上线</a>
                <a class="btn-browser btn-360 " target="_blank" href="https://ext.chrome.360.cn/webstore/detail/cjbbilalppleefkdldcnjggncniphbjf"><span><img src="/Uploads/Plugin/360.png"></span>360 极速浏览器</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>  --><?php endif; ?>

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/reg.css" />
<style type="text/css">
*{ padding: 0; margin: 0; }
body{font-size:14px; background:#FADC62; font-family:"Microsoft YaHei";}
a{color:#AC6198; font-weight:bold;}
a:hover{text-decoration: underline;}
.login_logo{ text-align:center; padding-top:40px;}
.yzbtn{ padding:30px 0px 30px 0px;}
.yzbtn a{ background:#AC6198; color:#fff; padding:8px 14px; font-size:15px;}
.yzbtn a:hover{background:#BE83AE; text-decoration:none;}
.zise{ color:#AC6198; font-weight:bold}
.mymsg p{ display:block; font-size:16px; text-align:center; line-height:28px;}

.yzbox{width:640px;margin:0 auto;color:#333;font-size:14px;padding-top:80px}

.mymsg{margin-top:40px; background:#fff; padding:30px 60px 60px 60px; line-height:22px;}
.mymsg h2{ display:block; text-align:center; font-weight:normal; font-size:22px; padding-bottom:20px}
.gopw{ font-size:20px; padding:6px 40px;}

input[type="text"],input[type="password"]{border:2px solid #f1f1f1;outline:none; font-size:16px; width: 294px;height: 30px;  padding: 6px 10px; margin-top:10px; transition:border 0.2s ease-in 0s;}
input[type="button"],input[type="submit"]{outline:none;cursor:pointer;border:none;}
input[type="text"]:focus,input[type="password"]:focus{border:2px solid #D3B8CC;}

.yiyou{ position: absolute; bottom:0px; left:50px;}
.meiyou{ position: absolute; bottom:0px; left:50px;}
.pwcnt{ width:420px; margin:0 auto;}
#ueditpw {
    position: absolute;
    right:100px;
    top: 14px;
}

.mytou{ position:relative; margin:0 auto; height:86px; padding-top:10px;}
.mytou .mytiltxt{ padding-left:16px;}
.mytou .ttil{ display:block; padding-top:3px; padding-bottom:6px;}
.mytou .smtxt{ font-size:15px; color:#999;}
#submitLogin{ float:none; margin:0; width:auto; height:auto; margin-top:30px;}
</style>
  
  
<div class="yzbox">
  <div class="login_logo"> <a href="/"><img src="/Public/Home/images/uslogo.png" /></a></div>
  


<!-- 管理邮箱 -->   
  <div id="nogl" class="mymsg">
  
    <div class="mytou" style=" margin-bottom:10px;">
       <div class="lf"><img style="vertical-align:middle" src="/Public/Home/images/icogl.gif" /></div>
        <div class="mytiltxt lf">
         		<?php if($login_type=="qq"){ ?>
              		 <h2 class="ttil">创建一个email账号，并绑定你现在登陆的QQ </h2>
		              <div class="smtxt">
		              	绑定后，使用QQ或者Email均可以登陆到你现有的账号      
		              </div>
              <?php }elseif($login_type=="wx"){ ?>
             		 <h2 class="ttil">创建一个email账号，并绑定你现在登陆的微信</h2>
		              <div class="smtxt">
		              	绑定后，使用微信或者Email均可以登陆到你现有的账号      
		              </div>
              <?php }else{ ?>
              		<h2 class="ttil">创建一个email账号，并绑定你现在登陆的微博</h2>
		              <div class="smtxt">
		              	绑定后，使用微博或者Email均可以登陆到你现有的账号      
		              </div>              		   
              <?php } ?>
        </div>
        <a class="yiyou" href="javascript:">已有Email账户？立即关联</a>
    </div>
   
         <div class="pwcnt">
	          
	          <form id="registerForm" class="forms" action="/User/register" method="post" name="forms">
	            <table width="100%" align="center" class="savePassword">
                
	                <tr>
	                  <td>
                        <input type="text" name="email" id="email" placeholder="输入你常用的邮箱"  maxlength="30">
	                    <span class="error" style="display:none;" id="findPwd_beError"> </span>
                        <div class="newpw">
                      <div id="editipt"><input type="password" id="newpassword" class="myipt" name="password"  placeholder="请输入新密码" errormsg="密码为6-20位" nullmsg="请输入新密码" datatype="*6-20"/></div>
                      <div id="ueditpw"><a class="offpw" href="javascript:showps()"></a></div>
                     </div>
                        </td>
	                </tr>
                    
                    
                   <tr>
                     <td style="padding-top:10px;">    
                         <ul class="register_radio clearfix">
                            <li id="regjob"> 找工作
                              <input type="radio" value="0" name="type"/>
                            </li>
                            <li id="regcom"> 招人
                              <input type="radio" value="1" name="type"/>
                            </li>
                          </ul>
                      </td>
                    </tr>
                    
	                
	                <tr>
	                  <td>
	                  <input type="hidden" id="web_rule" name="web_rule" value="1"/>
	                  <input type="hidden" name="resubmitToken" value=<?php echo ($accesstoken); ?>>
	                  <span class="error" style="display:none;" id="beError"></span>
	                  <input type="submit" id="submitReg" class="mybtn gopw" value="创建并绑定"></td>
	                </tr>
	            </table>
	            
	            
	          </form>
            </div>
	  </div>
      


<!-- 管理已有邮箱 -->     
      <div id="yiyou" class="mymsg dn">
       
         <div  class="mytou" style=" margin-bottom:10px;">
            <div class="lf"><img style="vertical-align:middle" src="/Public/Home/images/icogl.gif" /></div>
            <div class="mytiltxt lf">
            	
              <?php if($login_type=="qq"){ ?>
              		 <h2 class="ttil">关联一个email账号，并绑定你现在登陆的QQ </h2>
		              <div class="smtxt">
		              	绑定后，使用QQ或者Email均可以登陆到你现有的账号      
		              </div>
              <?php }elseif($login_type=="wx"){ ?>
             		 <h2 class="ttil">关联一个email账号，并绑定你现在登陆的微信</h2>
		              <div class="smtxt">
		              	绑定后，使用微信或者Email均可以登陆到你现有的账号      
		              </div>
              <?php }else{ ?>
              		<h2 class="ttil">关联一个email账号，并绑定你现在登陆的微博</h2>
		              <div class="smtxt">
		              	绑定后，使用微博或者Email均可以登陆到你现有的账号      
		              </div>              		   
              <?php } ?>
              
              
            </div>
             <a class="meiyou" href="javascript:">没有Email账户？立即创建</a>
         </div>
    
           <div class="pwcnt">
           
           <form id="loginForm" action="/User/login" method="post">
	          <input type="text" name="email" id="email" placeholder="输入你已注册的邮箱"  maxlength="30">
              <input type="password" name="password" id="password" placeholder="密码"  maxlength="30">
              <span class="error" style="display:none;" id="beError_bind"></span>
              <input type="submit" id="submitLogin" class="mybtn gopw mt20" value="确认并绑定">
            	<input type="hidden" name="resubmitToken" value=<?php echo ($accesstoken); ?>>
            </form>
            
            </div>
	  </div>
  
  
      
</div>
  
<!-- 眼镜显示隐藏密码 -->
<script language="JavaScript">
	  function showps(){ 
		  if (this.forms.newpassword.type="password") {
			  document.getElementById("editipt").innerHTML="<input type=\"text\" name=\"newpassword\" class=\"myipt\" id=\"newpassword\" placeholder=\"请输入新密码\" errormsg=\"密码为6-20位\" nullmsg=\"请输入新密码\" datatype=\"*6-20\"  value="+this.forms.newpassword.value+">"; 
			  document.getElementById("ueditpw").innerHTML="<a class=\"onpw\" href=\"javascript:hideps()\"></a>"
		  }
	  } 
	  function hideps(){ 
		  if (this.forms.newpassword.type="text") {
			  document.getElementById("editipt").innerHTML="<input type=\"password\" name=\"newpassword\" class=\"myipt\" id=\"newpassword\" placeholder=\"请输入新密码\" errormsg=\"密码为6-20位\" nullmsg=\"请输入新密码\" datatype=\"*6-20\"  value="+this.forms.newpassword.value+">"; 
			  document.getElementById("ueditpw").innerHTML="<a class=\"offpw\" href=\"javascript:showps()\"></a>"
		  } 
	  } 
</script>	

<!-- ==================== 弹窗  ==================== -->

<!-- 修改密码成功 -->
 <div style="display:none;">
    <script type="text/javascript" src="/Public/Home/js/setting.js"></script> 
	<div id="updatePassword" class="popup" style="overflow:hidden">
		<h3>修改密码成功，请重新登录</h3>
		<h4><span>5</span>秒后将自动退出</h4>
		<a href="/User/logout" class="btn">直接退出</a>
	</div>
 </div>
 
 
<script>

$(".yiyou").click(function(){
	$("#yiyou").show();
	$("#nogl").hide();
})
$(".meiyou").click(function(){
	$("#yiyou").hide();
	$("#nogl").show();
})



$(document)
   	.ajaxStart(function(){
   		$("#submitReg").addClass("log-in").attr("disabled", true);
   	})
   	.ajaxStop(function(){
   		$("#submitReg").removeClass("log-in").attr("disabled", false);
   	});


$("#registerForm").submit(function(){
	$("#beError").hide();
	var self = $(this);
	$.post(self.attr("action"), self.serialize(), success, "json");
	return false;

	function success(data){
		if(data.status){
			window.location.href = data.url; //"/Home/User/";//
		} else {
			//self.find(".Validform_checktip").text(data.info);
			$("#beError").show();
			$("#beError").text(data.info);
			//刷新验证码
			//$(".reloadverify").click();
		}
	}
});
  	
$(document)
.ajaxStart(function(){
	$("#submitLogin").addClass("log-in").attr("disabled", true);
})
.ajaxStop(function(){
	$("#submitLogin").removeClass("log-in").attr("disabled", false);
});


$("#loginForm").submit(function(){
	$("#beError_bind").hide();
	var self = $(this);
	$.post(self.attr("action"), self.serialize(), success, "json");
	return false;
	
	function success(data){
		if(data.status){
			window.location.href = data.url;
		} else {
			//self.find(".Validform_checktip").text(data.info);
			$("#beError_bind").show();
			$("#beError_bind").text(data.info);
			//刷新验证码
			//$(".reloadverify").click();
		}
	}
}); 	

$('#resetPswForm').validate({
       rules: {
   	   	newpassword: {
   	   		required: true,
   	    	rangelength: [6,16]
   	   	}
   	},
   	messages: {
       	
   	   	newpassword: {
   	   		required: "请输入新密码",
   	    	rangelength: "请输入6-16位密码，字母区分大小写"
   	   	}
   	},
   	submitHandler:function(form){
   		var newpassword = $('#newpassword').val();    		

   		$.ajax({
   			url:ctx+'User/findPassword/type/3/key/<?php echo ($key); ?>',
   			type:'POST',
   			data:{
   				newPassword:newpassword,
   			},
           	dataType:'json'
   		}).done(function(result){
   			if (result.status == 1) {
   				alert("密码设置成功，请前往登录。");
				top.location.href=ctx+"User/login";
   				//$.colorbox({inline:true, href:$("#updatePassword"),title:"修改密码成功"});
   				//setCountdown(4,'updatePassword h4 span',ctx+"User/lgoin");	//调用倒计时
               } else{
               	 alert(result.info);
               }
   		});
       }  
});	
	
	
</script>
  

</div><!-- end #body-->

<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>

<div class="w960">

    <input type="hidden" id="resubmitToken" value="" />
    <a id="backtop" title="回到顶部" rel="nofollow"></a>


    <!--我要反馈按钮-->
   <!--  <div id="product-fk">
        <div id="feedback-icon">
        <div class="fb-icon"></div>
        <span>我要反馈</span>
        <em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
        <em class="error dn fk-suc">&nbsp;&nbsp;反馈提交成功！</em>
    </div>
    </div> -->

     <style type="text/css">
     #product-kf {width: 50px;
        height: 50px;
        position: fixed;
        bottom: 80px;
        margin-left: 1000px;
        cursor: pointer;
        z-index: 21;
    }
    #kefu-icon {position: relative;}
    #kefu-icon .fb-icon {width: 30px; height: 30px;  margin: 0 auto; background: url(http://www.jobsminer.cc/Public/Home/images/feedback.png) no-repeat; display: block;}
    #kefu-icon:hover .fb-icon{ background-position: 0px -31px;}
    #kefu-icon:hover span{ color: #F9753E;}
    #kefu-icon span{font-size: 12px; color: #555;/* display: block; width: 60px;position: absolute;left: 0; bottom: -15px;*/}
    #product-fknew{ display: inline-block;}
    #footer .fk-suc{position: absolute; bottom: -20px; left: 0;}
    #footer .abnav{position: relative;}
    </style>
    <div id="product-kf">
        <div id="kefu-icon">
            <div class="fb-icon"></div>
            <span>在线客服</span>
        </div>
    </div> 
    <script type="text/javascript">
         $('#product-kf').bind('click',function(){
                window.open('http://wpa.qq.com/msgrd?v=3&uin=2535357251&site=qq&menu=yes');
         });
    </script>
    
</div>




<div class="clr"></div>
<div id="footer">
	<div class="w960">
         <div class="abnav lf">
            <a href="/News/about.html" target="_bank">关于我们</a><a  target="_bank" href="/News/help.html">帮助中心</a>
            <!-- <a href="/?viewTools=mobile">移动版</a> -->
            <div id="product-fknew">
                <div id="feedback-iconnew">
                    <div class="fb-icon"></div>
                    <a>我要反馈</a>
                    <span></span>
                    <em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
                    <em class="error dn fk-suc">反馈提交成功！</em>
                </div>
            </div>

            <div id="feedback-con">
                <div class="pfb-pho-close">
                    <div class="pfb-pho"></div>
                    <div class="pfb-close"></div>
                </div>
                <em class="error dn"><span>你还没填任何反馈呢</span><i></i></em>
                <form id="product-fb">
                    <div class="pfb-txt">
                        <textarea placeholder="我是jobsminer的产品经理小飞机，如果你在网站使用时遇到问题或者对网站功能有趣的建议，请告诉我！也许过几天你的想法会变成现实哦~（200字以内）" maxlength="200"></textarea>
                    </div>
                    <div class="pfb-email" style="height:60px;">
                        <input type="text" name="email" placeholder="你的邮箱，方便及时给您回复（选填）"/>
                        <span class="ensure">确定</span>
                    </div>
                </form>
                <input type="hidden" id="login-email" value="quentin@015guan.com">
            </div>
            <script src="/Public/Home/js/core.min.js" type="text/javascript"></script>
        </div>
        <div class="bdsharebuttonbox">
           <div class="ft_share">
                <span class="dn" id="share_jd2">分享到微信</span>
                <div class="jd_share_success2">
               <!--  <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" /> -->
               <img src="/images/ebg/code.png">
                </div>
            </div>
            <a href="<?php echo C('SINA_URL');?>" class="bds_tsina" target="_bank" title="分享到新浪微博"></a>
            <a href="<?php echo C('FB_URL');?>" class="bds_fbook" target="_bank" title="分享到Facebook"></a>
         </div>
         <div class="rt"><?php echo C('COPYRIGHT');?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo C("WEB_SITE_ICP"); ?></div>
    </div>
</div>

<?php } endif; ?>

<a href="#0" class="cd-popup-trigger"></a>

<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		 <iframe src="/User/login.html?md=min" frameborder="0" width="650" height="350" scrolling="no"></iframe>
		<a href="#0" class="cd-popup-close img-replace"></a>
	</div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<script type="text/javascript" src="/Public/Home/js/login_min.js"></script>
<script type="text/javascript">
 $('#login_minpop').bind('click',function(){
        $.colorbox({inline:true, href:"#login_min"});
 });
/* $(function(){
	$(".picbig").each(function(i){
		var cur = $(this).find('.img-wrap').eq(0);
		var w = cur.width();
		var h = cur.height();
	   $(this).find('.img-wrap img').LoadImage(true, w, h,'{IMG_PATH}msg_img/loading.gif');
	});
}) */

//$("#user_collection_btn").click(function(){

function user_collection(id,type,flag,refresh){
    //flag:1职位2公司3宣讲会
    //type：0取消1收藏

    //$("#btn_collect").attr('disabled',"true");

    if(!id || !flag){
        alert("参数无效");
        //$("#btn_add").removeAttr("disabled");
        return false;
    }
    if(type!=0 && type!=1 ){
    	alert("参数无效");
        //$("#btn_add").removeAttr("disabled");
        return false;
    }

    $.ajax({
        type:"POST",
        url:ctx +"User/collectAdd",
        data:{id:id,type:type,flag:flag},
        dataType:'json',
        beforeSend:function(){
        },
        success:function(data){
        	//data = $.parseJSON( data );
            if(data.success){
                alert(data.msg);
                if(refresh){
                	window.location.reload();
                }
                return false;
            }
            else {
            	
            	if(data.content.do_type==-1){
            		//event.preventDefault();
            		//$('.cd-popup').addClass('is-visible');
            		$(".cd-popup-trigger").trigger("click");
            		//$.colorbox({inline:true, href:"#login_min"});
            		//window.location.href="/User/login/?ref=/Jobs/info/id/<?php echo ($info["jid"]); ?>";
            	}
            	else alert(data.message);

            }
            return false;
            //$("#btn_collect").removeAttr("disabled");
        }   ,
        //调用执行后调用的函数
        complete: function(XMLHttpRequest, textStatus){
        	//$("#btn_collect").removeAttr("disabled");
        	//return false;
        },
        //调用出错执行的函数
        error: function(){
        	//$("#btn_collect").removeAttr("disabled");
            alert("收藏失败，请稍后再试");
            return false;
        }
     });

}

//});


</script>

<script>
$(".icous").hover(function(){$(this).find(".inusnav").slideDown(200);},function(){$(this).find(".inusnav").slideUp(50);});
</script>
<script>
	// 关闭
	//3s tips消失
	var global = {}
	global.email = "<?php echo C($Think.session.email);?>";
	global.usertoken = $.cookie('user_trace_token');
</script>

<script>
	$(document).click(function(){
		$(".ft_share").removeClass('share_open2');
		$(".ft_share").removeClass("share_click2");
		$(".ft_share").removeClass("share_hover2");
	});
	//微信分享
	$('.ft_share').click(function(event){
		$(this).unbind("mouseover");
		$(this).unbind("mouseout");
		if($(this).hasClass("share_open2")){
			$(this).removeClass('share_open2');
			$(this).removeClass("share_click2");
			$(this).removeClass("share_hover2");
		}else{
			$(this).addClass('share_open2');
			$(this).addClass("share_click2");
			$(this).find("span#share_jd2").addClass("dn") ;
		}
		/*$(this).find("span#share_jd2").addClass("dn") ;*/
		event.stopPropagation();
	});
</script>
<script>
with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~ (-new Date() / 36e5)];
</script>
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>



<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?552852c7a726f8c3ec23f071d05ebe95";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>


</body>
</html>