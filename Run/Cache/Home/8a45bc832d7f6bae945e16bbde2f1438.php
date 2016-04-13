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
<script type='text/javascript'>
  var PUBLIC = '/Public';
  var ROOT = '';
  var uploadUrl = '<?php echo U("Common/uploadFace");?>';
  var sid = '<?php echo session_id();?>'
</script>
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

<script type="text/javascript">
 $(document).ready(function(){
  var uid = $('input[name="jm_login_uid"]').val();
   if (uid) {
    var jm_cookie = document.cookie;
    window.localStorage.setItem("jm_login", jm_cookie);
   }

   $('.header #top-logo').hover( function(){
      $this.toggleClass('icebear-y');
   });

   $('.top_nav .li_p').hover( function(){
      $('#top-logo').toggleClass('icebear-p');
      $('.header').toggleClass('header-p');
   });

   $('.top_nav .li_g').hover( function(){
      $('#top-logo').toggleClass('icebear-g');
      $('.header').toggleClass('header-g');
   });

     $('.top_nav .li_o').hover( function(){
      $('#top-logo').toggleClass('icebear-o');
      $('.header').toggleClass('header-o');
   });

   //   $('.user_nav').hover( function(){
   //    $('.user_nav .user_nav_drop').toggleClass('dn');
   // });
  
 }); 

</script>
</head>


<body>
<div id="body">
<input type="hidden" name="jm_login_uid" value="<?php $user = session('user_auth'); echo $user['uid'];?>" />
<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header <?php echo ($cur_top_nav["company"]); ?> <?php echo ($cur_top_nav["install"]); ?> <?php echo ($cur_top_nav["news"]); ?>">
        <div class="w960">
          <div class="logo">
            <a <?php echo ($cur_top_nav["plugin"]); ?> href="/index.html">
              <div id="top-logo" class="logo icebear-y" /></div>
            </a>
          </div>
          
          
          <?php if(is_login()): if(getUsersSession('type')==1){ ?>
          
          	<!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/info.html">我的公司</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Company/interview.html">简历管理</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div> -->
               <ul class="top_nav">
                <li class="li_p"><a  href="/Company/companylist.html">名企网申</a></li>
                <li class="li_g"><a  href="/install/install.html">安装教程</a></li>
                <li class="li_o"><a href="/News/about.html">关于我们</a></li>
              </ul>
               <!--  <a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a> -->
                 <!--  <a <?php echo ($cur_top_nav["install"]); ?> href="/Install/install.html">安装教程</a>
                <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a> -->
              </div>
          		
          	<?php }else{ ?> 
          	
          		<!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a><a <?php echo ($cur_top_nav["collections"]); ?> href="/User/collections.html">我的收藏</a></div>  -->
              <div class="nav">
               <ul class="top_nav">
                <li class="li_p"><a  href="/Company/companylist.html">名企网申</a></li>
                <li class="li_g"><a  href="/install/install.html">安装教程</a></li>
                <li class="li_o"><a href="/News/about.html">关于我们</a></li>
              </ul>
               <!-- <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
                <a <?php echo ($cur_top_nav["install"]); ?> href="/Install/install.html">安装教程</a>
                <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/companylist.html">网申时间表</a>
                <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a>
                 <a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a> -->
              </div>
          		
          	<?php } ?>
          
          	<div class="login">
            <!-- <?php $user = session('user_auth');var_dump($user) ;?> -->
                <div class="icous"><?php $user = session('user_auth'); echo $user['uid'];?>
                    <div class="inusnav">
                      <em></em>
                      <a href="/User/index.html">设置</a>
                      <a href="<?php echo U('User/logout');?>">登出</a>
                    </div>
                </div> 
                <ul class="top-right">
                 
                  <?php if(getUsersSession('type')==0){ ?>
                    <li><a  href="/Resume/editresume.html">网申简历</a></li>
                    <li><a  href="/User/keep">我的收藏</a></li>
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
            
              <ul class="top_nav">
                <li class="li_p"><a  href="/Company/companylist.html">名企网申</a></li>
                <li class="li_g"><a  href="/install/install.html">安装教程</a></li>
                <li class="li_o"><a href="/News/about.html">关于我们</a></li>
              </ul>
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
                <li><a href="<?php echo U('User/register');?>">注册</a></li> 
                <li><a id="various1" href="#inline1" href="<?php echo U('User/login');?>">登录</a></li>  
                
                <!-- <li><a  href="/Resume/myresume.html">网申简历</a></li>
                <li><a  href="/Collectonlineapp/index">我的收藏</a></li> -->
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
<link rel="stylesheet" type="text/css" href="/Public/Home/css/fontscss.css" />
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
        width: 390px;
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
    @font-face {
      font-family: 'Nucleo Outline';
      src:url('../fonts/nucleo-outline/nucleo-outline.eot');
      src:url('../fonts/nucleo-outline/nucleo-outline.eot') format('embedded-opentype'),
        url('../fonts/nucleo-outline/nucleo-outline.woff2') format('woff2'),
        url('../fonts/nucleo-outline/nucleo-outline.woff') format('woff'),
        url('../fonts/nucleo-outline/nucleo-outline.ttf') format('truetype'),
        url('../fonts/nucleo-outline/nucleo-outline.svg') format('svg');
      font-weight: normal;
      font-style: normal;
    }
    
    .icon-login::before {
        z-index: 10;
        display: inline-block;
        margin: 0 20px 0 20px;
        vertical-align: middle;
        text-transform: none;
        font-weight: normal;
        font-variant: normal;
        font-size: 1.3em;
        font-family: 'Nucleo Outline';
        line-height: 1;
        speak: none;
        -webkit-backface-visibility: hidden;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>

<div id="content">
    <div style="display: none;">
        <div id="inline1" style="width:460px;height:350px;overflow:auto;">
            <div  id="loginWarpper" class="popup" >
             <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="">
                    <div class="login_wrapper"> 
                        <div class="login_logo" style="text-align:center"> 
                            <a href="/"><img src="/Public/Home/images/xunlu_logo.png" /></a>
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
                            <div class="clr"></div> 
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
	  
<div style="display:none;"> 
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
</div><?php endif; ?>

<style type="text/css">
        .w960 {
            width: 960px;
            margin: 0 auto;
            clear: both;
        }
        .w1000 {
            width: 1000px;
            margin: 0 auto;
            clear: both;
        }
        .l460 {
            width: 450px;
            float: left;
            height: 350px;
            position: relative;
        }
        .r460 {
            width: 450px;
            float: right;
            height: 350px;
            position: relative;

        }
        .jm_intro_container {
            height: 380px;
        }
        .jm_plugin_container {
            position: relative;
            height: 535px;
        }
        .jm_plugin_img {
            max-width: 100%;
            vertical-align: middle;

        }
        h1.jm_plugin_title {
            text-align: center;
            font-size: 30px;
            padding: 40px;
            color: #222222;
        }
        h2.jm_plugin_subtitle {
            font-size: 30px;
            padding-left: 60px;
            height: 56px;
            position: relative;
            font-weight: 500;
            line-height: 52px;
            color: #222222;
        }
        p.jm_plugin_subintro {
            font-size: 20px;
            color: #4a4a4a;
        }
        .container-img {
            display: table-cell;
            vertical-align:middle;
            display: table-cell; 
            vertical-align:middle; 
            /*设置水平居中*/ 
            text-align:center; 
            /* 针对IE的Hack */ 
            *display: block; 
            *font-size: 368px;/*约为高度的0.873，200*0.873 约为175*/ 
            *font-family:Arial;/*防止非utf-8引起的hack失效问题，如gbk编码*/ 
            width:460px; 
            height:350px; 
        }
        .container-box {
            width: 100%;  
            height: 50%;  
            overflow: auto;  
            margin: auto;  
            position: absolute;  
            top: 0; left: 0; bottom: 0; right: 0;  
        }
        .jm_plugin_icon {
            position: absolute;
            left: 0;
            top: 0;
            width: 55px;
            height: 47px;
            display: inline-block;

        }
        .icon_flash {
            background-image: url(/Uploads/Plugin/icon.png);
            background-position: 0;
        }
        .icon_mouse {
            background-image: url(/Uploads/Plugin/icon.png);
            background-position: -68px 0;
        }
        .icon_dashboard {
            background-image: url(/Uploads/Plugin/icon.png);
            background-position: 80px 0;
        }
        .jm_plugin_banner {
            height: 480px;
            width: 960px;
            margin: 0 auto;  
            position: relative;       
        }
        .jm_plugin_banner .banner_computer{
            padding: 60px 0;
        }
        .jm_plugin_banner_title {
            position: absolute;
            top: 0;
            width: 960px;
            height: 480px;
        }
        .jm_plugin_banner_title h1{
            position: absolute;
            top: 23%;
            right: 5%;
            font-size: 30px;
            font-weight: 500;
            color: #482929;
            z-index: 5;
        }
        .jm_plugin_banner_title p{
            position: absolute;
            top: 34%;
            right: 2%;
            color: #482929;
            z-index: 5;
            font-size: 20px;
            line-height: 35px;
            text-align: center;
            
        }
        .jm_plugin_banner_overlay {
            width: 100%;
            height: 480px;
            background-color: #ffd733;
            /*opacity: 0.8;*/
            position: absolute;
            bottom: 0;
        }
        .jm_plugin_banner_container {
            position: relative;
            height: 480px;
        }

        .btn-plugin-download{
            position: absolute;
            top: 285px;
            right: 40px;
            color: #fff;
            width: 210px;
            background-color: #6769c9;
            height: 50px;
            line-height: 50px;
            border-radius: 30px;
            text-align: center;
            font-size: 18px;
        }
        .btn-plugin-download:hover{
            color: #fff;
            text-decoration: underline;
        }
        .btn-plugin-view {
            position: absolute;
            top: 43%;
            left: 28%;
            width: 152px;
            height: 44px;
            background-image: url(/Uploads/Plugin/button-view.png);
            z-index: 10;
        }
        .btn-plugin-view:hover{
            background-image: url(/Uploads/Plugin/button-view-hover.png);
        }
        .jm_plugin_linktotimetable {
            width: 229px;
            height: 49px;
            background-image: url(/Uploads/Plugin/button-time.png);
            display: inline-block;
            margin: 25px 0;
        }
        .jm_plugin_hot {
            width: 31px;
            height: 28px;
            background-image: url(/Uploads/Plugin/hot-icon.png);
            margin: 34px 20px;
            display: inline-block;
        }
        a.btn-disabled:hover {cursor: default;color: #555;}

        .pluginbox #cboxContent img {border: 1px solid #B1AFAF;}
        .pluginbox #cboxContent #cboxTitle{ left: 155px;  z-index: 2; line-height:45px; color: #ac6198}
        .pluginbox #cboxContent #cboxCurrent{    left: 0; line-height:45px;}
        .pluginbox #cboxContent #cboxClose {z-index: 3}
        .jm_intro_order{list-style: none;  padding: 60px 0;}
        .jm_intro_order li{    
            position: relative;
            display: inline-block;
            width: 315px;
            height: 100px;}
        .jm_intro_order li span.num{
            width: 48px;
            height: 118px;
            font-size: 100px;
            line-height: 120px;
            font-weight: 600;
            color: #482929;
            font-style: oblique;
            position: absolute;
            top: 0;
            left: 0;}
        .jm_intro_order li p.jm_intro_subtitle{
            height: 32px;
            font-size: 23px;
            letter-spacing: 1px;
            color: #482929;
            position: absolute;
            top: 20px;
            left: 85px;
        }
        .jm_intro_order li p.jm_intro_subtitle span{
            color: #686dc5;
            text-decoration: underline;
        }
        .jm_intro_order li p.jm_intro_content{    
            font-size: 14px;
            letter-spacing: 0.6px;
            color: #aa9c9c;
            position: absolute;
            top: 60px;
            left: 85px;}
        .jm_intro_title{
            font-size: 23px;
            width: 315px;
            padding: 15px 0;
            margin-top: 20px;
            color: #482929;
            letter-spacing: 1px;
            border-bottom: 4px solid #ffd733;
        }
        .yellow-bg {background:#ffd733; }
        .section-img-rt {    
            position: absolute;
            top: 45px;
            right: 0;}
        .section-title-lt h3{
            position: absolute;
            top: 195px;
            left: 0;
        }
        .section-title-lt p{
            position: absolute;
            top: 270px;
            left: 0;
        }
        .section-img-lt {
            position: absolute;
            top: 45px;
            left: 0;
        }
        .section-title-rt h3{
            position: absolute;
            top: 195px;
            right: 0;
        }
        .section-title-rt p{
            position: absolute;
            top: 270px;
            right: 0;
        }
        .jm_plugin_container .subtite{
            font-size: 24px;
            color: #482929;
            font-weight: 600;
        }
        .jm_plugin_container .subcontent{
            font-size: 18px;
            line-height: 30px;
            color: #482929;
            width: 240px;
            word-wrap: break-word;
        }
        .browser-list  {
            list-style: none;
            margin-top: 45px;
        }
        .browser-list li{
            display: inline-block;
            width: 235px;
            height: 225px;
            text-align: center;
            margin-right: 140px;
            border: solid 1px #e5e5e5;
        }
        .browser-list li:hover{
            border: solid 1px #ffd733;
        }
        .browser-list li a{
            display: inline-block;
            width: 235px;
            height: 225px;
        }
         .browser-list li:last-child{
            margin-right: 0;
         }
        .browser-list li .browser-title{display: block; color: #4a4a4a; font-size: 18px; margin-top: 40px;}
        .browser{
            background: url(/Uploads/Plugin/browser.png);
            display: inline-block;
            height: 75px;
            width: 75px;
            margin-top: 35px;
            overflow: hidden;}
        .browser-chrome {
            background-position: -150px -95px;
        }
        .browser-liebao {
            background-position: -375px -95px;
        }
        .browser-jisu {
            background-position: -75px -95px;
        }
        .browser-anquan {
            background-position: 0 -95px;
        }
        .browser-aoyou {
            background-position: -450px -95px;
        }
        .browser-qq{
            background: url(/Uploads/Plugin/qq-browser.png);
            display: inline-block;
            height: 70px;
            width: 66px;
            margin-top: 40px;
            overflow: hidden;
        }
        .dl-icon{
            background: url(/Uploads/Plugin/download-icon.png);
            width: 14px;
            height: 19px;
        }

</style>
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/company.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/external.min.css" />


<div class="jm_plugin_banner_container">
    <div class="jm_plugin_banner_overlay"></div>
    <div class="jm_plugin_banner">
        <img class="banner_computer" src="/Uploads/Plugin/new_computer.png">
        <!-- <a href="#pluginvideo" class="btn btn-plugin-view inline cboxElement"></a> -->
        <p><a class="btn btn-plugin-view helpgroup" href="/Uploads/Plugin/callout.gif" title="轻松召唤小助手"></a></p>
        <p  style="display:none"><a class="helpgroup" href="/Uploads/Plugin/drag.gif" title="如何实现信息拖拽"></a></p>
        <p style="display:none"><a class="helpgroup" href="/Uploads/Plugin/write.gif" title="如何一键填写"></a></p>
        <p style="display:none"><a class="helpgroup" href="/Uploads/Plugin/lock.gif" title="如何锁定界面"></a></p>
        <div class="jm_plugin_banner_title"> 
            <h1>白熊求职助手</h1>
            <p>全新网申体验，专为学生打造<br/>告别繁琐填写，支持百家名企</p>
            <a  class="btn-plugin-download tofooter"><i class="dl-icon"></i>立即下载</a>
        </div>
    </div> 
    
</div>

<div id="chajianintro">
    <div class="w1000 jm_intro_container">
       <h2 class="jm_intro_title">如何开启不一样的网申体验？</h2>
       <ul class="jm_intro_order">
           <li>
               <span class="num">1</span>
               <p class="jm_intro_subtitle">下载助手 > <span class="">安装教程</span></p>
               <p class="jm_intro_content">选择自己常用的浏览器版本，并注册寻鹿网求职帐号。</p>
           </li>
           <li>
               <span class="num">2</span>
               <p class="jm_intro_subtitle">完善简历 > <span>网申简历</span></p>
               <p class="jm_intro_content">繁杂信息只需填写一次，开放性问题记录在自定义项目中随时备用。</p>
           </li>
           <li>
               <span class="num">3</span>
               <p class="jm_intro_subtitle">开始闪填 > <span>网申列表</span></p>
               <p class="jm_intro_content">在网申列表中点击心仪的公司网申，求职助手自动就会出现啦！</p>
           </li>
       </ul>
    </div>

    <div class="yellow-bg">
       <div class="w1000 jm_plugin_container">
            <div class="section-title-lt"> 
                <h3 class="subtite">网申简历，一键闪填</h3>
                <p class="subcontent">完善一次简历，闪填百家名企<br/>现已支持XX家企业网申</p>
            </div>
            <img class="section-img-rt" src="/Uploads/Plugin/profile-img.png">
        </div>
    </div>

    <div class="w1000 jm_plugin_container">
        <img class="section-img-lt" src="/Uploads/Plugin/openq-img.png">
        <div class="section-title-rt"> 
            <h3 class="subtite">开放问题，轻松拖拽</h3>
            <p class="subcontent">填过的开放性问题，只需直接拖拽填写，还有海量题库等你</p>
        </div>
    </div>
    <div class="w1000 jm_plugin_foot_container" id="plugindownload">
        <h2 class="jm_intro_title">选择你常用的游览器版本</h2>
        <ul class="browser-list">
            <li><a href="#"><span class="browser-img browser browser-chrome"></span><span class="browser-title">chrome</span></a></li>
            <li><a><span class="browser-img  browser-qq"></span><span class="browser-title">QQ浏览器</span></a></li>
            <li><a><span class="browser-img browser browser-liebao"></span><span class="browser-title">猎豹浏览器</span></a></li>
        </ul>
        <ul class="browser-list">
            <li><a><span class="browser-img browser browser-jisu"></span><span class="browser-title">360极速浏览器</span></a></li>
            <li><a><span class="browser-img browser browser-anquan"></span><span class="browser-title">360安全浏览器</span></a></li>
            <li><a><span class="browser-img browser browser-aoyou"></span><span class="browser-title">遨游浏览器</span></a></li>
        </ul>
    </div>

</div>


<!-- <script type="text/javascript" src="/Public/Home/js/company/jobs.js"></script>   -->      
<script type="text/javascript" src="/Public/Home/js/company/company.js"></script>         
<script type="text/javascript" src="/Public/Home/js/core.min.js"></script> 
<script type="text/javascript" src="/Public/Home/js/popup.js"></script>   
<!-- <script type="text/javascript" src="/Public/Home/js/jquery.colorbox-help.js"></script>   --> 
<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".helpgroup").colorbox({
            rel:'helpgroup',  
            width:680, 
            height:500,
            loop:false,
            previous:"上一步",
            next:"下一步",
            current:"网申助手教程 {current}/{total} ",
            className:"pluginbox"
        });
    });
</script>   
<script>
$('.tofooter').click(function(){
    $('html,body').animate({scrollTop:$('.jm_plugin_foot_container').offset().top}, 800);
    al
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
     #footer{ position: relative; color: #482929}
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
    #footer .abnav{    position: absolute;top: 18px;left: 50%;margin-left: -130px;}
    #footer .abnav a {color:#482929}
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
    <div class="lf"> <?php echo C('COPYRIGHT');?> </div>
         <div class="abnav center">
            
            <!-- <a  target="_bank" href="/News/help.html">帮助中心</a> -->
            <!-- <a href="/?viewTools=mobile">移动版</a> -->
            <div id="product-fknew">
                <div id="feedback-iconnew">
                    <div class="fb-icon"></div>
                    <a><i class="footer-fb"></i>我要反馈</a>
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
            <a href="/News/about.html" target="_bank"><i class="footer-au"></i>关于我们</a>
            <a class="focusus"><i class="footer-wx"></i>关注我们
                <div id="share_wx">
                     <div class="jd_share_success2">
                   <!--  <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" /> -->
                   <img src="/images/ebg/code.png">
                    </div>
                </div>
            </a>
            <script src="/Public/Home/js/core.min.js" type="text/javascript"></script>
        </div>
        <!-- <div class="bdsharebuttonbox">
           <div class="ft_share">
                <span class="dn" id="share_jd2">分享到微信</span>
                <div class="jd_share_success2">
                <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" />
               <img src="/images/ebg/code.png">
                </div>
            </div>
            <a href="<?php echo C('SINA_URL');?>" class="bds_tsina" target="_bank" title="分享到新浪微博"></a>
            <a href="<?php echo C('FB_URL');?>" class="bds_fbook" target="_bank" title="分享到Facebook"></a>
         </div> -->
         <div class="rt"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo C("WEB_SITE_ICP"); ?></div>
         <div class="clr"></div>
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

$(".focusus").hover(function(){
$('.jd_share_success2').css('visibility','visible');
$('.jd_share_success2').animate({opacity:1});
},function(){
$('.jd_share_success2').css('visibility','hidden');
$('.jd_share_success2').animate({opacity:0});
});

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