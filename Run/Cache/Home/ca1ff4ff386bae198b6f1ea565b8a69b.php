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
          <div class="logo"><a <?php echo ($cur_top_nav["plugin"]); ?> href="/index.html"><img src="/Public/Home/images/xunlu_nav_logo.png" /></a></div>
          
          
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
 

<script type="text/javascript">
var ctx = "<?php echo (WEB_URL); ?>";
var ctx_new = "<?php echo (WEB_URL); ?>";
var rctx = "<?php echo (WEB_URL); ?>";
var pctx = "<?php echo (WEB_URL); ?>";

/* var frontLogin = "http://www.lagou.com/frontLogin.do";
var frontLogout = "http://www.lagou.com/frontLogout.do";
var frontRegister = "http://www.lagou.com/frontRegister.do"; */
</script>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/testresume.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/css/tabstyles.css" />

<link rel="stylesheet" type="text/css" href="/Public/Home/css/flat-ui.min.css" />
<!-- <link rel="stylesheet" type="text/css" href="/Public/Home/css/fontscss.css" /> -->
<link rel="stylesheet" type="text/css" href="/Public/Home/css/jBox.css" />


<script src="/Public/Home/js/modernizr.custom.js"></script>
<script src="/Public/Home/js/flat-ui.min.js"></script>
<script src="/Public/Home/js/flat-application.js"></script>
<script type="text/javascript" src="/Public/static/think.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="/Public/Home/css/myresume.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/tailoring.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/external.min.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/popup.css"/>
 -->
 <script type="text/javascript" src="/Public/Home/js/timeCountDown.js"></script> 
<script type="text/javascript" src="/Public/Home/js/timeCountDown.js"></script> 
<script type="text/javascript" src="/Public/Home/js/additional-methods.js"></script> 
<!-- <script type="text/javascript" src="/Public/Home/js/application.js"></script> 
 -->
 <script type="text/javascript" src="/Public/Home/js/jBox.js"></script> 
<script>
  /* function callback(response) {
      if(response.success==true&&response.state==1){
          $("#nowrap").parent().addClass('plus-vip');
          $('#accountSetting')[0].href="http://hr.lagou.com/baseinfo/accountDetail.html";
      }
  }
    jQuery.ajax({
        url:"http://hr.lagou.com/plus/getVipTip.json",
        dataType: 'jsonp',
        jsonp: 'jsoncallback'
    }).done(function (response) {
        callback && callback(response);
    }); */
</script> 

<!--后台给出的变量天数》0--> 
<script>
    var cd = {
            $: function(id){
                return document.getElementById(id);    
            },
            futureDate: -5768647956,
            obj: function(){
                return {
                    sec: cd.$("activity_minute"),
                    mini: cd.$("activity_hour"),
                    hour: cd.$("activity_day")
                }
            }
        };
        fnTimeCountDown(cd.futureDate, cd.obj());
</script>
<style type="text/css">
  .mr_up_grey {
    cursor: default;
    padding: 5px;
    color: #ccc;
    text-align: center;
  }
  .progressbar{
    width: 240px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.6);
  }
</style>

<div id="body"> 
  
  <!-- 数据展示类接口需要版本号 -->
  <input type="hidden" id="version" value="1.5.6_2015051318">
  
  <div id="container">
  
    <input type="hidden" id="isShowDefault" value="1" />
    <div class="clearfixs mr_created container" id="tab1">
        <div class="section-top">
            <div class="section-top-container" id="section-top-container">
                <div>
                    <a class="lt-title" >一键闪填</a>
                    <a class="rt-title" href="<?php echo U('Resume/customize');?>">｜&nbsp;&nbsp;&nbsp;开放性问题(OQ)</a>
                    <div class="triangle-up-1"></div>
                </div>
                <div class="rt-progress">
                <span class="complete">完整度：</span>
                  <div class="progress" id="progress-allresume" style=" width: 170px; ">
                    <div class="progress-bar" style=" width:<?php $allnum = 170*$alllist[1]/$alllist[0]; echo sprintf("%.2f", $allnum);?>px"></div>
                    <span class="counter" style="left:70px"><?php echo "$alllist[1]/$alllist[0]";?></span>
                  </div>

                  <div class="progress lowUse" id="progress-emptyresume" style=" width: 65px; ">
                    <div class="progress-bar" style="width: <?php $lownum= 65*$low_num[1]/$low_num[0]; echo sprintf("%.2f", $lownum);?>px"></div><span class="counter" style="left:12px;"><?php echo "$low_num[1]/$low_num[0]";?></span>
                  </div>
                  <div class="blank lowUse"></div>
                </div>
            </div>
        </div>
    <section>
      <div class="tabs tabs-style-underline">
      <div class="resumebg-left" id="resumebg-left">
      <div class="resume-button">
         <!--  <button class="btn btn-block btn-resume"><span class="icon-resume icon-eyes">预览</span></button>
          <button class="btn btn-resume"><span class="icon-resume icon-check">保存</span></button>       -->   
           <a class="btn btn-resume" href="/Resume/myResumePreview.html">预览</a>
          <button class="btn btn-resume">保存</button>         
      </div>
        <nav>
          <ul>
            <li><a href="#su1" class="icon-resume icon-home"><span>基本信息</span><span class="countNum" id="infoNum"><?php print_r(count(array_filter($resume_info[0])))?>/<?php print_r(count($resume_info[0]))?></span></a></li>
            <li id="section-edu" ><a href="#section-underline-2" class="icon-resume icon-gift"><span>教育信息</span><span class="countNum" id="eduNum"><?php $edu_num= count($edu_list);for ($i=0; $i < $edu_num ; $i++) { $edu_arr[$i] = count(array_filter($edu_list[$i])); } $edu_num =$edu_num*3; $edu_arr = array_sum($edu_arr);print_r($edu_arr-$edu_num);?>/<?php $edu_tnum = count($edu_list, true); $edu_tarr = 9*count($edu_list); print_r($edu_tnum-$edu_tarr);?></span></a></li>
            <li id="section-work"><a href="#section-underline-3" class="icon-resume icon-upload"><span>工作经历</span><span class="countNum" id="jobNum"><?php $exp_num= count($exp_list);for ($i=0; $i < $exp_num ; $i++) { $exp_arr[$i] = count(array_filter($exp_list[$i])); } $exp_num =$exp_num*2; $exp_arr = array_sum($exp_arr);print_r($exp_arr-$exp_num);?>/<?php $exp_tnum = count($exp_list, true); $exp_tarr = 6*count($exp_list); print_r($exp_tnum-$exp_tarr);?></span></a></li>
            <li id="section-pro"><a href="#section-underline-4" class="icon-resume icon-coffee"><span>项目经历</span><span class="countNum" id="proNum"><?php $pro_num= count($pro_list);for ($i=0; $i < $pro_num ; $i++) { $pro_arr[$i] = count(array_filter($pro_list[$i])); } $pro_num =$pro_num*2; $pro_arr = array_sum($pro_arr);print_r($pro_arr-$pro_num);?>/<?php $pro_tnum = count($pro_list, true); $pro_tarr = 6*count($pro_list); print_r($pro_tnum-$pro_tarr);?> 
            </span></a></li>
             <li id="section-certi"><a href="#section-underline-5" class="icon-resume icon-certificate"><span>已获证书</span><span class="countNum" id="certiNum"><?php $certificate_num= count($certificate_list);for ($i=0; $i < $certificate_num ; $i++) { $certificate_arr[$i] = count(array_filter($certificate_list[$i])); } $certificate_num =$certificate_num*1; $certificate_arr = array_sum($certificate_arr);print_r($certificate_arr-$certificate_num);?>/<?php $certificate_tnum = count($certificate_list, true); $certificate_tarr = 2*count($certificate_list); print_r($certificate_tnum-$certificate_tarr);?></span></a></li>
            <li id="section-schpra"><a href="#section-underline-6" class="icon-resume icon-config"><span>在校实践</span><span class="countNum" id="schpraNum"><?php $practice_num= count($practice_list);for ($i=0; $i < $practice_num ; $i++) { $practice_arr[$i] = count(array_filter($practice_list[$i])); } $practice_num =$practice_num*2; $practice_arr = array_sum($practice_arr);print_r($practice_arr-$practice_num);?>/<?php $practice_tnum = count($practice_list, true); $practice_tarr = 6*count($practice_list); print_r($practice_tnum-$practice_tarr);?></span></a></li>
            <li id="section-schclub"><a href="#section-underline-7" class="icon-resume icon-schclub"><span>社团经历</span><span class="countNum" id="schclubNum"><?php $schoolclub_num= count($schoolclub_list);for ($i=0; $i < $schoolclub_num ; $i++) { $schoolclub_arr[$i] = count(array_filter($schoolclub_list[$i])); } $schoolclub_num =$schoolclub_num*1; $schoolclub_arr = array_sum($schoolclub_arr);print_r($schoolclub_arr-$schoolclub_num);?>/<?php $schoolclub_tnum = count($schoolclub_list, true); $schoolclub_tarr = 2*count($schoolclub_list); print_r($schoolclub_tnum-$schoolclub_tarr);?></span></a></li>
            <li id="section-schaw"><a href="#section-underline-8" class="icon-resume icon-schawards"><span>获奖经历</span><span class="countNum" id="schawardNum"><?php $schoolawards_num= count($schoolawards_list);for ($i=0; $i < $schoolawards_num ; $i++) { $schoolawards_arr[$i] = count(array_filter($schoolawards_list[$i])); } $schoolawards_num =$schoolawards_num*1; $schoolawards_arr = array_sum($schoolawards_arr);print_r($schoolawards_arr-$schoolawards_num);?>/<?php $schoolawards_tnum = count($schoolawards_list, true); $schoolawards_tarr = 2*count($schoolawards_list); print_r($schoolawards_tnum-$schoolawards_tarr);?></span></a></li>
             <li id="section-"><a href="#section-underline-9" class="icon-resume icon-language"><span>语言能力</span></a></li>
           
             <li id="section-train"><a href="#section-underline-10" class="icon-resume icon-training"><span>培训经历</span><span class="countNum" id="trainingNum"><?php $trainingexperience_num= count($trainingexperience_list);for ($i=0; $i < $trainingexperience_num ; $i++) { $trainingexperience_arr[$i] = count(array_filter($trainingexperience_list[$i])); } $trainingexperience_num =$trainingexperience_num*1; $trainingexperience_arr = array_sum($trainingexperience_arr);print_r($trainingexperience_arr-$trainingexperience_num);?>/<?php $trainingexperience_tnum = count($trainingexperience_list, true); $trainingexperience_tarr = 2*count($trainingexperience_list); print_r($trainingexperience_tnum-$trainingexperience_tarr);?></span></a></li>
             <li id="section-otherinfo"><a href="#section-underline-11" class="icon-resume icon-otherinfo"><span>其他信息</span><span class="countNum" id="otherinfoNum"><?php print_r(count(array_filter($otherinfo_list[0]))-1)?>/<?php print_r(count($otherinfo_list[0])-1)?></span></a></li>
          </ul>
        </nav>
                </div>
        <div class="content-wrap">
          <div class="swich-container">
            <!--   <input type="checkbox" checked data-toggle="switch" id="info-switch" onchange="checkChange()"  data-on-text="全部" data-off-text="高频"/> -->

               <div class="switch-resume switch-yellow">
                <input type="radio" class="switch-input" name="resume-checked" value="high" id="high" checked="">
                <label for="high" class="switch-label switch-label-off">高频</label>
                <input type="radio" class="switch-input" name="resume-checked" value="all" id="all">
                <label for="all" class="switch-label switch-label-on">全部</label>
                <span class="switch-selection"></span>
              </div>
          </div>
          <section id="su1">
            
<div class="baseinfo-top">
  <h3>基本信息</h3>
</div>
<!-- <link rel="stylesheet" type="text/css" href="/Public/Home/css/component.css" />
<script src="/Public/Home/js/modernizr-1.custom.js"></script> -->
<div>
	<form id="olinfoForm">
        <div class="myr_info_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
                <tr>
                    <th class="pt10"><label>姓名</label></th>
                    <td>
	                    <div class="myr_input_div_l">
	                        <input type="text" id="mr_name" name="mr_name" class="ed_name valid form-control" autocomplete="off" value="<?php echo ($info["realname"]); ?>">
	                    </div>
                    </td>
                </tr>
                 <tr class="lowUse">

                    <th class="pt10"><label>英文名</label><span class="lowFreqency">低频</span></th>
                    <td>
                      <div class="myr_input_div_l">
                          <input type="text" id="english_name" name="english_name" class="ed_name valid form-control" autocomplete="off" value="<?php echo ($info["english_name"]); ?>">
                      </div>
                    </td>
                </tr>
                <tr>
                    <th class="pt10"><label>性别</label></th>
                    <td>
	                    <div class="myr_radio">
	                        <label class="radio">
					            <input type="radio" name="sex" id="sex1" value="男" data-toggle="radio" class="custom-radio" <?php if($info["sex"] == "1"): ?>checked=""<?php endif; ?> ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
					            男
					         </label>
					         &nbsp;&nbsp;
					         <label class="radio">
					            <input type="radio" name="sex" id="sex2" value="女" data-toggle="radio" class="custom-radio"
					            <?php if($info["sex"] == "2"): ?>checked=""<?php endif; ?>
					            ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
					            女
					          </label>
					          <input id="myysex" name="myysex" type="hidden" value="<?php echo ($info["sex"]); ?>">
	                    </div>
                    </td>
                </tr>
                <tr>
                    <th class="pt10"><label>身高</label></th>
                    <td>
	                    <div class="myr_input_div_s">
	                        <input type="text" id="height" name="height" class="valid form-control" autocomplete="off" value="<?php echo ($info["height"]); ?>"><span class="sticker">cm</span> 
	                    </div>
                    </td>
                </tr>
				        <tr>
                    <th class="pt10"><label>体重</label></th>
                    <td >
                      <div class="myr_input_div_s">
                        <input id="weight" name="weight"  class="form-control" value="<?php echo ($info["weight"]); ?>"/><span class="sticker">kg</span>
                        </div>
                    </td>
              	</tr>
				        <tr>
                    <th class="pt10"><label>电子邮件</label></th>
                     <td >
                      <div class="myr_input_div_l email_s">
                        <input id="mr_email" name="mr_email" class="form-control" value="<?php echo ($info["email"]); ?>"/>
                      </div>
                      </td>
                </tr>
                <tr>
                    <th class="pt10"><label>手机号</label></th>
                    <td >
                    <div class="myr_input_div_l mobile_s">
                        <input id="mr_mobile" name="mr_mobile" class="form-control" value="<?php echo ($info["phone"]); ?>"/>
                      </div></td>
                </tr>
                 <tr>
                    <th class="pt10"><label>固定电话</label></th>
                    <td >
                       <div class="myr_input_div_l email_s">
                        <input id="tel" name="tel"  class="form-control" value="<?php echo ($info["tel"]); ?>"/>
                      </div></td>
                </tr> 
                
                  <tr class="lowUse">
                    <th class="pt10"><label>QQ</label><span class="lowFreqency">低频</span></th>
                    <td >
                       <div class="myr_input_div_l email_s">
                        <input id="qq_name" name="qq_name"  class="form-control" value="<?php echo ($info["qq_name"]); ?>"/>
                      </div></td>
                </tr> 
                  <tr class="lowUse">
                    <th class="pt10"><label>微信</label><span class="lowFreqency">低频</span></th>
                    <td >
                       <div class="myr_input_div_l email_s">
                        <input id="wx_name" name="wx_name"  class="form-control" value="<?php echo ($info["wx_name"]); ?>"/>
                      </div></td>
                </tr> 
                  <tr class="lowUse">
                    <th class="pt10"><label>微博</label><span class="lowFreqency">低频</span></th>
                    <td >
                       <div class="myr_input_div_l email_s">
                        <input id="sina_name" name="sina_name"  class="form-control" value="<?php echo ($info["sina_name"]); ?>"/>
                      </div></td>
                </tr> 
                 <tr class="lowUse">
                    <th class="pt10"><label>个人主页</label><span class="lowFreqency">低频</span></th>
                    <td >
                       <div class="myr_input_div_l email_s">
                        <input id="profile" name="profile"  class="form-control" value="<?php echo ($info["profile"]); ?>"/>
                      </div></td>
                </tr> 
                <tr>
                <th class="pt10"><label>证件类型</label></th>

              	<td >
                  <div class="myr_input_div_l form_wrap normal_s" style="*z-index:3;">
                    <input id="idcardtype" name="idcardtype" type="button" class="mr_button form_select" value="<?php echo ($info["idcardtype"]); ?>"/>
                    <i class="mr_sj"></i>
                    <div class="xl_list dn">
                      <ul class="ul_zjlx">
                      	<li>身份证</li>
                        <li>护照</li>
                        <li>香港永久居民身份证</li>
                        <li>香港非永久居民身份证</li>
                        <li>澳门永久居民身份证</li>
                        <li>澳门非永久居民身份证</li>
                        <li>台胞证</li>
                        <li>军官证</li>
                      </ul>
                    </div>
                  </div></td>
                </tr>
                <tr>
                    <th class="pt10"><label>证件号码</label></th>
                    <td >
                      <div class="myr_input_div_l mr_click_flag">
                        <input id="idcard" name="idcard"  class="form-control" value="<?php echo ($info["idcard"]); ?>"/>
                      </div>
                    </td>
                </tr>
        				<tr>
        					<th class="pt10"><label>出生日期</label></th>
                      <td >
                       <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button" value="<?php echo ($info["birthday"]); ?>" readonly class="text input date" placeholder="选择时间" name="birthday"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
               
                      </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><label>国籍</label><span class="lowFreqency">低频</span></th>
                    <td >
                      <div class="myr_input_div_l mr_click_flag">
                        <input id="national" name="national"  class="form-control" value="<?php echo ($info["national"]); ?>"/>
                    </div></td>
                </tr>
        				<tr>
                    <th class="pt10"><label>籍贯</label></th>
                    <td >
                     <!--  <div class="myr_input_div_l mr_click_flag">
                        <input id="nativeplace" name="nativeplace"  class="form-control" value="<?php echo ($info["nativeplace"]); ?>"/>
                    </div> -->
                     <div class="form-item">
                    
                      <div class="controls select_wrap">
                        <select name="nativeplace"  id="provincelist" onchange="setnativecity(this)">
                          <option value="0">--选择省--</option>
                        
                        </select>
                        &nbsp;&nbsp;
                        <select name="nativeplace_city"   id="nativeplace_city">
                          <option value="0">--选择市--</option>
                         
                        </select>
                      </div>
                  </div>

                <!--    <div class="myr_input_div_l form_wrap normal_s" style="*z-index:3;">
                   <input id="nativeplace" name="nativeplace"  class="form-control" value="<?php echo ($info["nativeplace"]); ?>"/>
                    <i class="mr_sj"></i>
                    <div class="xl_list dn">
                      <ul class="ul_nativeplace" id="provincelist">
                        <li>--选择省--</li>
                      </ul>
                    </div>
                  </div> -->
                    </td>
                </tr>
                <tr>
                
                    <th class="pt10"><label>民族</label></th>
                    <td >
                    
                <div class="form_wrap normal_s" style="*z-index:4;">
                    <input id="nation" name="nation" type="button" class="mr_button" value="<?php echo ($info["nation"]); ?>"/>
                    <i class="mr_sj"></i>
                    <div class="xl_list dn">
                      <ul class="ul_nation">
                        <?php if(is_array($nationdata)): $i = 0; $__LIST__ = $nationdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo ($vo["nation"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        
                      </ul>
                    </div>
                  </div>
                    </td>
                </tr>
                <tr>
                
                    <th class="pt10"><label>政治面貌</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                     <input id="politicalstatus" name="politicalstatus" type="button" class="mr_button"   class="form-control" value="<?php echo ($info["politicalstatus"]); ?>"/>
                    <i class="mr_sj"></i>
                    <div class="xl_list dn">
                      <ul class="ul_politicalstatus">
                        <li>中共党员</li>
                        <li>中共预备党员</li>
                        <li>共青团员</li>
                        <li>群众</li>
                        <li>九三学社</li>
                        <li>中国民主同盟</li>
                        <li>中国民主建国会</li>
                        <li>中国民主促进会</li>
                        <li>中国国民党革命委员会</li>
                        <li>中国农工民主党</li>
                        <li>中国致公党</li>
                        <li>台湾民主自治同盟</li>
                        <li>中华全国工商业联合会</li>
                        <li>无党派民主人士</li>
                        <li>其它</li> 
                      </ul>
                    </div>
                  </div>
                    </td>
                </tr>
				        <tr>
                    <th class="pt10"><label>婚姻状况</label></th>
                    <td>
	                    <div class="myr_radio">
	                        <label class="radio">
        					            <input type="radio" name="marital" id="maritalstatus1" value="未婚" data-toggle="radio" class="custom-radio" 
        								<?php if($info["maritalstatus"] == "未婚"): ?>checked=""<?php endif; ?> 
        					            ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
        					            未婚
        					         </label>
        					         &nbsp;&nbsp;
        					         <label class="radio">
        					            <input type="radio" name="marital" id="maritalstatus2" value="已婚" data-toggle="radio"  class="custom-radio"
        								<?php if($info["maritalstatus"] == "已婚"): ?>checked=""<?php endif; ?>
        					            ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
        					            已婚
        					          </label>
                             &nbsp;&nbsp;
        					          <label class="radio">
        					            <input type="radio" name="marital" id="maritalstatus3" value="离婚" data-toggle="radio"  class="custom-radio"
        								<?php if($info["maritalstatus"] == "离婚"): ?>checked=""<?php endif; ?>
        					            ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
        					            离婚
        					          </label>
        					          <input id="mymaritalstatus" name="maritalstatus" type="hidden" value="<?php echo ($info["maritalstatus"]); ?>">
        	                    </div>
                            </td>
                        </tr>
        				<tr>
                <th class="pt10"><label>现居住城市</label></th>
                <td >
                  <!--  <div class="myr_input_div_l email_s">
                    <input id="live_city" name="live_city"  class="form-control" value="<?php echo ($info["live_city"]); ?>"/>
                  </div> -->
                    <div class="form-item">
                    
                      <div class="controls select_wrap">
                          <select name="live_city"  id="live_city" onchange="setlivecity(this)">
                          <option value="0">--选择省--</option>
                        </select>
                        &nbsp;&nbsp;
                        <select name="live_city_city"   id="live_city_city">
                          <option value="0">--选择市--</option>
                        </select>
                      </div>
                  </div>
                </td>
               </tr>
               <tr>
                <th class="pt10"><label>联系地址</label></th>
                <td >
                   <div class="myr_input_div_l email_s">
                    <input id="live_address" name="live_address"  class="form-control" value="<?php echo ($info["live_address"]); ?>"/>
                  </div></td>
               </tr>
                <tr>
                <th class="pt10"><label>邮政编码</label></th>
                <td >
                  <div class="myr_input_div_l mr_click_flag">
                    <input id="zip" name="zip"  class="form-control" value="<?php echo ($info["zip"]); ?>"/>
                  </div></td>
            </tr>
            <tr class="lowUse">
                <th class="pt10"><label>家庭地址</label><span class="lowFreqency">低频</span></th>
                <td >
                   <div class="myr_input_div_l email_s">
                    <input id="contact_address" name="contact_address"  class="form-control" value="<?php echo ($info["contact_address"]); ?>"/>
                  </div></td>
               </tr>
              <tr>
          		<th class="pt10"><label>最高学历</label></th>
                <td >
				
                <div class="form_wrap normal_s" style="*z-index:4;">
                    <input id="edu" name="edu" type="button" class="mr_button" value="<?php echo ($info["edu"]); ?>"/>
                    <i class="mr_sj"></i>
                    <div class="xl_list dn">
                      <ul class="ul_xl">
                      	<li>博士研究生</li>
            						<li>EMBA</li>
            						<li>MBA</li>
            						<li>MPA</li>
            						<li>硕士研究生</li>
            						<li>双学士</li>
            						<li>大学本科-一本</li>
            						<li>大学本科-二本</li>
            						<li>大学本科-三本</li>
            						<li>大学专科</li>
            						<li>中专</li>
            						<li>技校/职高</li>
            						<li>高中</li>
            						<li>初中及以下</li>
            						<li>其他</li>
            						<li>无</li>
                      </ul>
                    </div>
                  </div>
                 <!--  <select class="form-control select select-primary" data-toggle="select">
		            <option value="大专">大专</option>
		            <option value="1">本科</option>
		            <option value="2">硕士</option>
		            <option value="3">博士</option>
		            <option value="4" selected>其他</option>
		          </select> -->
                </td>
            </tr>
             <tr>
          		<th class="pt10"><label>教育类型</label></th>
                <td >
				
                <div class="form_wrap normal_s" style="*z-index:4;">
                    <input id="edu_type" name="edu_type" type="button" class="mr_button" value="<?php echo ($info["edu_type"]); ?>"/>
                    <i class="mr_sj"></i>
                    <div class="xl_list dn">
                      <ul class="ul_jylx">
                        <li>全日制统分统招</li>
        						<li>海外留学</li>
        						<li>成人教育</li>
        						<li>定向</li>
        						<li>非定向</li>
        						<li>委培</li>
        						<li>自费</li>
        						<li>其他</li>
                      </ul>
                    </div>
                  </div>
                 <!--  <select class="form-control select select-primary" data-toggle="select">
		            <option value="大专">大专</option>
		            <option value="1">本科</option>
		            <option value="2">硕士</option>
		            <option value="3">博士</option>
		            <option value="4" selected>其他</option>
		          </select> -->
                </td>
            </tr>
              
           <tr>
				<th class="pt10"><label>预计毕业时间</label></th>
                <td >
                   <div class="form-item ">
                      <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                      <div class="form_wrap  normal_s controls">
                          <input type="button" class="mr_button" value="<?php echo ($info["graduate_time"]); ?>" readonly class="text input date" placeholder="选择时间" name="graduate_time"  data-date-format="yyyy-mm-dd">
                          <span class="add-on"><i class="icon-remove"></i></span>
                          <span class="add-on"><i class="icon-calendar"></i></span>
                          <i class="mr_sj"></i>
                          </div>
                      </div> 
                  </div>

            <!--     <div class="form_wrap  normal_s" style="*z-index:5;">
                    <input id="mr_year" name="mr_year" type="button" class="mr_button" value="<?php if($info['graduate_time'])echo $info['graduate_time'];else echo '1990'; ?>"/>
                    <i class="mr_sj"></i>
                    <div class="xl_list dn">
                      <ul class="ul_year">
                        <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                      </ul>
                    </div>
                  </div> -->
                </td>
          	</tr>

			     <tr>
                <th class="pt10"><label>入学前户口所在地</label></th>
                <td >
                  <!-- <div class="myr_input_div_l mr_click_flag">
                    <input id="hukou_city" name="hukou_city"  class="form-control" value="<?php echo ($info["hukou_city"]); ?>"/>
                  </div> -->

                  <div class="form-item">
                      <div class="controls select_wrap">
                          <select name="hukou_city"  id="hukou_city" onchange="sethukoucity(this)">
                          <option value="0">--选择省--</option>
                        </select>
                        &nbsp;&nbsp;
                        <select name="hukou_city_city"   id="hukou_city_city">
                          <option value="0">--选择市--</option>
                        </select>
                      </div>
                  </div>
                  </td>
              </tr>

              <tr>
                <th class="pt10"><label>当前户口所在地</label></th>
                <td >
                  <!-- <div class="myr_input_div_l mr_click_flag">
                    <input id="hukou_city_now" name="hukou_city_now"  class="form-control" value="<?php echo ($info["hukou_city_now"]); ?>"/>
                  </div> -->
                    <div class="form-item">
                      <div class="controls select_wrap">
                          <select name="hukou_city_now"  id="hukou_city_now" onchange="sethukounowcity(this)">
                          <option value="0">--选择省--</option>
                        </select>
                        &nbsp;&nbsp;
                        <select name="hukou_city_now_city"   id="hukou_now_city">
                          <option value="0">--选择市--</option>
                        </select>
                      </div>
                  </div>
                  </td>
              </tr>


            <tr>
                <th class="pt10"><label>期望工作城市</label></th>
                <td >
                 <!--  <div class="myr_input_div_l mr_click_flag">
                    <input id="expect_city" name="expect_city"  class="form-control" value="<?php echo ($info["expect_city"]); ?>"/>
                  </div> -->
                   <div class="form-item">
                      <div class="controls select_wrap">
                          <select name="expect_city"  id="expect_city" onchange="setexpectcity(this)">
                          <option value="0">--选择省--</option>
                        </select>
                        &nbsp;&nbsp;
                        <select name="expect_city_city"   id="expect_city_city">
                          <option value="0">--选择市--</option>
                        </select>
                      </div>
                  </div>
                  </td>
              </tr>
               <tr>
                <th class="pt10"><label>紧急联系人</label></th>
                <td >
                  <div class="myr_input_div_l mr_click_flag">
                    <input id="contact_name" name="contact_name"  class="form-control" value="<?php echo ($info["contact_name"]); ?>"/>
                  </div>
                  </td>
              </tr>
                 <tr>
                <th class="pt10"><label>紧急联系人电话</label></th>
                <td >
                  <div class="myr_input_div_l mr_click_flag">
                    <input id="contact_phone" name="contact_phone"  class="form-control" value="<?php echo ($info["contact_phone"]); ?>"/>
                  </div>
                  </td>
              </tr>
               <tr>
                <th class="pt10"><label>家庭成员-姓名</label></th>
                <td >
                  <div class="myr_input_div_l mr_click_flag">
                    <input id="fm_name" name="fm_name"  class="form-control" value="<?php echo ($info["fm_name"]); ?>"/>
                  </div>
                  </td>
              </tr>
               <tr>
                <th class="pt10"><label>家庭成员-关系</label></th>
                <td >
                  <div class="myr_input_div_l mr_click_flag">
                    <input id="fm_relation" name="fm_relation"  class="form-control" value="<?php echo ($info["fm_relation"]); ?>"/>
                  </div>
                  </td>
              </tr>
                <tr>
                <th class="pt10"><label>家庭成员-联系电话</label></th>
                <td >
                  <div class="myr_input_div_l mr_click_flag">
                    <input id="fm_phone" name="fm_phone"  class="form-control" value="<?php echo ($info["fm_phone"]); ?>"/>
                  </div>
                  </td>
              </tr>
               <tr>
                <th class="pt10"><label>家庭成员-工作单位</label></th>
                <td >
                  <div class="myr_input_div_l mr_click_flag">
                    <input id="fm_work" name="fm_work"  class="form-control" value="<?php echo ($info["fm_work"]); ?>"/>
                  </div>
                  </td>
              </tr>
				      <tr>
                <th class="pt10"><label>家庭成员-职位</label></th>
                <td >
                  <div class="myr_input_div_l mr_click_flag">
                    <input id="fm_position" name="fm_position"  class="form-control" value="<?php echo ($info["fm_position"]); ?>"/>
                  </div>
                  </td>
              </tr>
         

            </table>
        </div>  
        <div class="btn-group">
        <!-- <button class="progress-button mr_save" data-style="fill" data-horizontal>Submit</button> -->
            <input type="submit" class="btn-resumeac mr_save" value="保存" />
            <input type=button value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitInfoFrom(); tonext();">
            <!-- <a href="javascript:" class="btn-resumeac mr_next" id="next" >下一步</a> -->
        </div>
      
        
        
    </form>
</div>
<script src="/Public/Home/js/classie.js"></script>
<!-- <script src="/Public/Home/js/progressbutton.js"></script>
<script>
[].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
        new ProgressButton( bttn, {
        callback : function( instance ) {
            var progress = 0,
            interval = setInterval( function() {
            progress = Math.min( progress + Math.random() * 0.1, 1 );
            instance._setProgress( progress );

            if( progress === 1 ) {
                instance._stop(1);
                clearInterval( interval );
            }
            }, 20 );
        }
        } );
});
</script> -->
<script type="text/javascript">


  function submitInfoFrom(){
    $('#olinfoForm').submit();
  }
  $(document).ready(function() {
      $(".form_oldatetime").datetimepicker({

          format: "yyyy-mm-dd",
          language: 'zh-CN',
          weekStart: 1,
          todayBtn:  1,
          autoclose: 1,
          todayHighlight: 1,
          startView: 2,
          minView: 2,
          forceParse: 0

      });


   });   

    </script>
 <script type="text/javascript">

        Think.setValue("pid", <?php echo ((isset($info["id"]) && ($info["id"] !== ""))?($info["id"]): 0); ?>);
        Think.setValue("status", <?php echo ((isset($listinfo["status"]) && ($listinfo["status"] !== ""))?($listinfo["status"]): 0); ?>);
        Think.setValue("ishot", <?php echo ((isset($listinfo["ishot"]) && ($listinfo["ishot"] !== ""))?($listinfo["ishot"]): 0); ?>);

        var cprovince = <?php echo ($info["nativeplace"]); ?>;
        var ccity = <?php echo ($info["nativeplace_city"]); ?>;
        var live_city = <?php echo ($info["live_city"]); ?>;
        var live_city_city = <?php echo ($info["live_city_city"]); ?>;
        var hukou_city =<?php echo ($info["hukou_city"]); ?>;
        var hukou_city_city = <?php echo ($info["hukou_city_city"]); ?>;
        var hukou_city_now =<?php echo ($info["hukou_city_now"]); ?>;
        var hukou_city_now_city = <?php echo ($info["hukou_city_now_city"]); ?>;
        var expect_city =<?php echo ($info["expect_city"]); ?>;
        var expect_city_city =<?php echo ($info["expect_city_city"]); ?>;
        var addressarr = <?php echo ($city_arr); ?>;
        addressarr = eval(addressarr);
        function setprovince() {
          var html = '';
          for(var key in addressarr) {
            if(addressarr[key]['pid']==1){
              html += '<option class="optionstyle" value="'+addressarr[key].aid+'">'+addressarr[key].name+'</option>';
              //html += '<li>'+addressarr[key].name+'</li>';
            }
          }
          $("#provincelist").html(html);
          $("#live_city").html(html);
          $("#hukou_city").html(html);
          $("#hukou_city_now").html(html);
          $("#expect_city").html(html);

        }

        function setnativecity(vv) {
          var html = '';
          var v ='';
          if(isNaN(vv)){
            v = $(vv).val();
          }
          else v = vv;

          if(addressarr[v]){
            var cityarr = addressarr[v]['sub'];
            for(var k in cityarr) {
              html += '<option value="'+k+'">'+cityarr[k].name+'</option>';
            }
          }
          $("#nativeplace_city").html(html);
        }

        function setlivecity(vv) {
          var html = '';
          var v ='';
          if(isNaN(vv)){
            v = $(vv).val();
          }
          else v = vv;

          if(addressarr[v]){
            var cityarr = addressarr[v]['sub'];
            for(var k in cityarr) {
              html += '<option value="'+k+'">'+cityarr[k].name+'</option>';
            }
          }
          
          $("#live_city_city").html(html);
        }

        function sethukoucity(vv) {
          var html = '';
          var v ='';
          if(isNaN(vv)){
            v = $(vv).val();
          }
          else v = vv;

          if(addressarr[v]){
            var cityarr = addressarr[v]['sub'];
            for(var k in cityarr) {
              html += '<option value="'+k+'">'+cityarr[k].name+'</option>';
            }
          }

          $("#hukou_city_city").html(html);
        }
        function sethukounowcity(vv) {
          var html = '';
          var v ='';
          if(isNaN(vv)){
            v = $(vv).val();
          }
          else v = vv;

          if(addressarr[v]){
            var cityarr = addressarr[v]['sub'];
            for(var k in cityarr) {
              html += '<option value="'+k+'">'+cityarr[k].name+'</option>';
            }
          }

          $("#hukou_now_city").html(html);
        }
        function setexpectcity(vv) {
          var html = '';
          var v ='';
          if(isNaN(vv)){
            v = $(vv).val();
          }
          else v = vv;

          if(addressarr[v]){
            var cityarr = addressarr[v]['sub'];
            for(var k in cityarr) {
              html += '<option value="'+k+'">'+cityarr[k].name+'</option>';
            }
          }

          $("#expect_city_city").html(html);
        }

        setprovince();

        $("#provincelist").val(cprovince);
        $("#live_city").val(live_city);
        $("#hukou_city").val(hukou_city);
        $("#hukou_city_now").val(hukou_city_now);
        $("#expect_city").val(expect_city);
       
        var obj = $("#provincelist").val();
        setnativecity(obj);

        var obj = $("#live_city").val();
        setlivecity(obj);

        var obj = $("#hukou_city").val();
        sethukoucity(obj);

        var obj = $("#hukou_city_now").val();
        sethukounowcity(obj);

        var obj = $("#expect_city").val();
        setexpectcity(obj);


        $("#nativeplace_city").val(ccity);
        $("#live_city_city").val(live_city_city);
        $("#hukou_city_city").val(hukou_city_city);
        $("#hukou_now_city").val(hukou_city_now_city);
        $("#expect_city_city").val(expect_city_city);

</script>

          </section>
          <section id="section-underline-2">
            <link rel="stylesheet" type="text/css" href="/Public/Home/css/schoolselect.css">
<div class="baseinfo-top">
  <h3>教育经历</h3>
</div>
<div id="educationalBackground" class="item_container_target">
  <div class="list_show">

    <?php if($edu_list){ ?>
            <div class="clearfixs mb46 mr_jobe_list">
            <table>
              <tr><th width="200px">学校</th><th width="200px">学历</th><th width="200px">专业</th><th width="200px">编辑</th></tr>
               <?php if(is_array($edu_list)): $i = 0; $__LIST__ = $edu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["schoolName"]); ?></td><td><?php echo ($v["education"]); ?></td><td><?php echo ($v["professional"]); ?></td><td><div style="cursor: pointer;" class="mr_edit mr_c_r_t" data-eduid="<?php echo ($v["id"]); ?>" data-schoolname="<?php echo ($v["schoolName"]); ?>" data-edu="<?php echo ($v["education"]); ?>" data-pro="<?php echo ($v["professional"]); ?>" data-date="<?php echo ($v["endYear"]); ?>" data-startdate="<?php echo ($v["startYear"]); ?>" data-schoolcity="<?php echo ($v["school_city"]); ?>" data-degree="<?php echo ($v["degree"]); ?>" data-academy="<?php echo ($v["academy"]); ?>" data-major="<?php echo ($v["major"]); ?>" data-gpa="<?php echo ($v["gpa_score"]); ?>" data-prorank="<?php echo ($v["professional_ranking"]); ?>" data-classrank="<?php echo ($v["class_ranking"]); ?>" data-prodes="<?php echo ($v["professional_describe"]); ?>" data-tutorname="<?php echo ($v["tutor_name"]); ?>" data-tutorphone="<?php echo ($v["tutor_phone"]); ?>"> <i></i><em>编辑</em> </div></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            </div>
        <?php } ?>
    </div>
<div class="mr_moudle_head clearfixs">
    <div class="mr_moudle_content" id="edu_update">
      <form class="eduExpForm" id="addEduForm">
         <div class="myr_info_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
                <tr>
                    <th class="pt10"><label>学校</label></th>
                    <td>
                    <div class="myr_input_div_l">
                      <input type="text" id="schoolName"  name="schoolName"  placeholder="请点击选择学校" class="form-control"  readonly />
                      <div id="proSchool" class="provinceSchool">
                          <div class="title"><span>请选择学校</span></div>
                          <div class="proSelect">
                              <select></select>
                              <span>如没找到选择项，请选择其他手动填写</span>
                              <input type="text" />
                          </div>
                          <div class="schoolList">
                              <ul></ul>
                          </div>
                          <div class="button">
                            <a href="javascript:selectschool();">确定</a>
                            <a href="javascript:closeschool();">取消</a>
                          </div>
                      </div> 
                    </div> 
                    </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><label>学校所在城市</label><span class="lowFreqency">低频</span></th>
                    <td>
                      <div class="form-item">
                    
                      <div class="controls select_wrap">
                        <select name="school_city"  id="school_city" onchange="setschoolcity(this)">
                          <option value="0">--选择省--</option>
                        
                        </select>
                        &nbsp;&nbsp;
                        <select name="school_city_city"   id="school_city_city">
                          <option value="0">--选择市--</option>
                         
                        </select>
                      </div>
                  </div>
                    </td>
                </tr>
                <tr>
                  <th class="pt10"><label>学历</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="degree_text" />
                      <input type="button" class="mr_button"  name="degree_val"/>
                      <div class="xl_list dn">
                        <ul class="ul_edubg">
                          <li>博士研究生</li>
                          <li>EMBA</li>
                          <li>MBA</li>
                          <li>MPA</li>
                          <li>硕士研究生</li>
                          <li>双学士</li>
                          <li>大学本科-一本</li>
                          <li>大学本科-二本</li>
                          <li>大学本科-三本</li>
                          <li>大学专科</li>
                          <li>中专</li>
                          <li>技校/职高</li>
                          <li>高中</li>
                          <li>初中及以下</li>
                          <li>其他</li>
                          <li>无</li>

                        </ul>
                      </div>
                    </div>
                    </div>
                    </td>
                </tr>
                 <tr>
                  <th class="pt10"><label>学位</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="degree_t" />
                      <input type="button" class="mr_button"  name="degree" id="degree" />
                      <div class="xl_list dn">
                        <ul class="ul_degree">
                          <li>博士</li>
                          <li>MPA</li>
                          <li>EMBA</li>
                          <li>MBA</li>
                          <li>硕士</li>
                          <li>双学士</li>
                          <li>学士</li>
                          <li>其他</li>
                          <li>无</li>
                        </ul>
                      </div>
                    </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <th class="pt10"><label>院系</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="academy" class="form-control">
                      </div>
                    </td>
                </tr>
                 <tr>
                    <th class="pt10"><label>专业</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="positionName" class="form-control" >
                      </div>
                    </td>
                </tr>
                <tr>
                  <th class="pt10"><label>入学时间</label></th>
                    <td >   
                      <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="startYear"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>      
                    <!-- <div class="form_wrap normal_s" style="*z-index:4;">
                      <div class="mr_timed_div normal_s fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="startYear_text" />
                      <input type="button" class="mr_button"  class="mr_btn" onchange="validateChange(this);" name="startYear"/>
                      <div class="xl_list dn">
                        <ul class="ul_eduy">
                          <?php $year = getYear(1990,2017,1); ?>
                          <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                      </div>
                    </div>
                    </div> -->
                    </td>
                </tr>
                <tr>
                  <th class="pt10"><label>毕业时间</label></th>
                    <td>    
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="graduate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>        
                  <!--   <div class="form_wrap normal_s" style="*z-index:4;">
                      <div class="mr_timed_div normal_s fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="graduate_text" />
                      <input type="button" class="mr_button" onchange="validateChange(this);" name="graduate"/>
                      <div class="xl_list dn">
                        <ul class="ul_eduy">
                          <?php $year = getYear(1990,2017,1); ?>
                          <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                      </div>
                    </div>
                    </div> -->
                    </td>
                </tr>
                <tr>
                    <th class="pt10"><label>主修课程</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="major" class="form-control">
                      </div>
                    </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><label>GPA(4分制)</label><span class="lowFreqency">低频</span></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="gpa_score" class="form-control">
                          <span class="tipright icon-resume icon-business_bulb" title="GPA(4分制)"></span>
                      </div>

                    </td>

                </tr>
                <tr>
                  <th class="pt10"><label>所在专业排名</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="professional_ranking_text" />
                      <input type="button" class="mr_button" name="professional_ranking" id="proferank" />
                      <div class="xl_list dn">
                        <ul class="ul_proferank">
                          <li>前5%<li>前10%</li><li>前20%</li><li>前30%</li><li>前40%</li><li>前50%</li><li>前60%</li><li>前70%</li><li>前80%</li><li>其他</li>
                        </ul>
                      </div>
                    </div>
                    </div>
                    </td>
                </tr>
                 <tr>
                  <th class="pt10"><label>班级排名</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="class_ranking_text" />
                      <input type="button" class="mr_button" name="class_ranking" id="classrank" />
                      <div class="xl_list dn">
                        <ul class="ul_classrank">
                          <li>前5%<li>前10%</li><li>前20%</li><li>前30%</li><li>前40%</li><li>前50%</li><li>前60%</li><li>前70%</li><li>前80%</li><li>其他</li>
                        </ul>
                      </div>
                    </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <th class="pt10"><label>专业描述</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="professional_describe" class="form-control" >
                          <span class="tipright icon-resume icon-business_bulb" title="专业描述专业 描述专业描述专业描述专业描述"></span>
                      </div>
                    </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><label>导师姓名</label><span class="lowFreqency">低频</span></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="tutor_name" class="form-control" >
                      </div>
                    </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><label>导师联系方式</label><span class="lowFreqency">低频</span></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="tutor_phone" class="form-control">
                      </div>
                    </td>
                </tr>
            </table>
   
        </div>

       <div class="btn-group">
            <input type="submit" class="btn-resumeac mr_save" value="保存" />
            <input type="button" value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitEduFrom(); tonext();">
            <!-- <a href="javascript:" class="btn-resumeac mr_next" id="next" >下一步</a> -->
        </div>
               
       
         <!--  <div class="mr_ope clearfixs">
            <input type="submit" class="mr_save" value="保存" />
            <a href="javascript:;" class="mr_cancel">取消</a> </div> -->
        </div>
      </form>
   <!--    <div class="mr_head_l">
          <div class="mr_head_r "> <i></i><em>再添加一项</em> </div>
        
      </div>     -->  
</div>
</div>
 
<script type="text/javascript">
  $(document).ready(function() {
  

  $('.tipright').jBox('Tooltip', {
    position: {
      x: 'right',
      y: 'center'
    },
    width:150,
    outside: 'x' // Horizontal Tooltips need to change their outside position
  });
  
 
});
</script>
<script type="text/javascript">
  function submitEduFrom(){
  $('#addEduForm').submit();
  }
  function closeschool(){
    $("div[class='provinceSchool']").hide();
  }
  function selectschool(){
    var selectPro = $("div[class='proSelect'] select").val();
    if("99"==selectPro){
      $("#schoolName").val($("div[class='proSelect'] input").val());
    }
    $("div[class='provinceSchool']").hide();
  }
   $(document).ready(function() {
      $(".form_oldatetime").datetimepicker({
          format: "yyyy-mm-dd",
          language: 'zh-CN',
          weekStart: 1,
          todayBtn:  1,
          autoclose: 1,
          todayHighlight: 1,
          startView: 2,
          minView: 2,
          forceParse: 0
      });
   });  


</script>
<script type="text/javascript" src="/Public/Home/js/school.js"></script>
<script type="text/javascript">
$(function(){
  //province;
  //proSchool;
  //学校名称 激活状态
  $("#schoolName").focus(function(){
    var top = $(this).position().top+$(this).height()+2;
    var left = $(this).position().left;
    $("div[class='provinceSchool']").css({top:top,left:left});
    $("div[class='provinceSchool']").show();
  });
  //初始化省下拉框
  var provinceArray = "";
  var provicneSelectStr = "";
  for(var i=0,len=province.length;i<len;i++){
    provinceArray = province[i];
    provicneSelectStr = provicneSelectStr + "<option value='"+provinceArray[0]+"'>"+provinceArray[1]+"</option>"
  } 
  $("div[class='proSelect'] select").html(provicneSelectStr);
  //初始化学校列表
  var selectPro = $("div[class='proSelect'] select").val();
  var schoolUlStr = "";
  var schoolListStr = new String(proSchool[selectPro]);
  var schoolListArray = schoolListStr.split(",");
  var tempSchoolName = "";
  for(var i=0,len=schoolListArray.length;i<len;i++){
    tempSchoolName = schoolListArray[i];
    if(tempSchoolName.length>13){
    schoolUlStr = schoolUlStr + "<li class='DoubleWidthLi' title="+schoolListArray[i]+">"+schoolListArray[i]+"</li>"
    }else {
    schoolUlStr = schoolUlStr + "<li>"+schoolListArray[i]+"</li>"
    }
  }
  $("div[class='schoolList'] ul").html(schoolUlStr);
  //省切换事件
  $("div[class='proSelect'] select").change(function(){
    if("99"!=$(this).val()){
    $("div[class='proSelect'] span").show();
    $("div[class='proSelect'] input").hide();
    schoolUlStr = "";
    schoolListStr = new String(proSchool[$(this).val()]);
    schoolListArray = schoolListStr.split(",");
    for(var i=0,len=schoolListArray.length;i<len;i++){
      tempSchoolName = schoolListArray[i];
      if(tempSchoolName.length>13){
      schoolUlStr = schoolUlStr + "<li class='DoubleWidthLi' title="+schoolListArray[i]+">"+schoolListArray[i]+"</li>"
      }else {
      schoolUlStr = schoolUlStr + "<li>"+schoolListArray[i]+"</li>"
      }
    }
    $("div[class='schoolList'] ul").html(schoolUlStr);
    }
    else {
    $("div[class='schoolList'] ul").html("<span class='entertext'>请在输入框内手动输入学校！</span>");
    $("div[class='proSelect'] span").hide();
    $("div[class='proSelect'] input").show();
    }
  });
  //学校列表mouseover事件
  $("div[class='schoolList'] ul li").live("mouseover",function(){
    $(this).css("background-color","#6f3400");
  });
  //学校列表mouseout事件
  $("div[class='schoolList'] ul li").live("mouseout",function(){
    $(this).css("background-color","");
  });
  //学校列表点击事件
  $("div[class='schoolList'] ul li").live("click",function(){
    $("#schoolName").val($(this).html());
    $("div[class='provinceSchool']").hide();
  });
  //按钮点击事件
  // $("div[class='button'] button").live("click",function(){
  //   var flag = $(this).attr("flag");
  //   if("0"==flag){
  //   $("div[class='provinceSchool']").hide();
  //   }else if("1"==flag){
  //   var selectPro = $("div[class='proSelect'] select").val();
  //   if("99"==selectPro){
  //     $("#schoolName").val($("div[class='proSelect'] input").val());
  //   }
  //   $("div[class='provinceSchool']").hide();
  //   }
  // });

});
</script>
 <script type="text/javascript">
        var addressarr = <?php echo ($city_arr); ?>;
      //  var cprovince = <?php echo ($info["nativeplace"]); ?>;
        //var ccity = <?php echo ($info["nativeplace_city"]); ?>;
        addressarr = eval(addressarr);
        function setprovince() {
          var html = '';
          for(var key in addressarr) {
            if(addressarr[key]['pid']==1){
              html += '<option class="optionstyle" value="'+addressarr[key].aid+'">'+addressarr[key].name+'</option>';
              //html += '<li value="'+addressarr[key].aid+'">'+addressarr[key].name+'</li>';
            }
          }
          $("#school_city").html(html);
        }

        function setschoolcity(vv) {
          var html = '';
          var v ='';
          if(isNaN(vv)){
            v = $(vv).val();
          }
          else v = vv;
          if(addressarr[v]){
            var cityarr = addressarr[v]['sub'];
            for(var k in cityarr) {
              html += '<option value="'+k+'">'+cityarr[k].name+'</option>';
              //html += '<li>'+cityarr[k].name+'</li>';
            }
          }
          $("#school_city_city").html(html);
        }
        setprovince();
       // $("#school_city").val(cprovince);
        var obj = $("#school_city").val();
        setschoolcity(obj);
        //$("#school_city_city").val(ccity);

</script>

          </section>
          <section id="section-underline-3">
            <div class="baseinfo-top">
	<h3>工作经历</h3>
</div>
	
<div id="workExperience" class="item_container_target">
   <div class="list_show">
  	<?php if($exp_list){ ?>
    <div class="mr_jobe_list">
            
      <div class="clearfixs">
    	 <table>
        	<tr><th width="200px">工作单位</th><th width="200px">职位</th><th width="200px">时间</th><th width="200px">编辑</th></tr>
          <?php if(is_array($exp_list)): $i = 0; $__LIST__ = $exp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["companyName"]); ?></td><td><?php echo ($v["positionName"]); ?></td><td><span><?php echo ($v["startDate"]); ?></span><span> — </span><span><?php echo ($v["endDate"]); ?></span></td><td>
          <div class="mr_edit mr_c_r_t" data-expid="<?php echo ($v["id"]); ?>" data-logo="<?php echo ($v["companyLogo"]); ?>" data-comname="<?php echo ($v["companyName"]); ?>" data-posname="<?php echo ($v["positionName"]); ?>" data-workcontent="<?php echo ($v["workContent"]); ?>" data-jobContent="<?php echo ($v["jobContent"]); ?>" data-startime="<?php echo ($v["startDate"]); ?>" data-endtime="<?php echo ($v["endDate"]); ?>" data-content="<?php echo ($v["workContent"]); ?>" data-jobcontent="<?php echo ($v["jobContent"]); ?>" data-companyproperty="<?php echo ($v["company_property"]); ?>" data-companysize="<?php echo ($v["company_size"]); ?>" data-companycat="<?php echo ($v["company_cat"]); ?>" data-workcat="<?php echo ($v["work_cat"]); ?>" data-department="<?php echo ($v["department"]); ?>" data-workcity="<?php echo ($v["work_city"]); ?>" data-salarymonth="<?php echo ($v["salary_month"]); ?>" data-reterencename="<?php echo ($v["reterence_name"]); ?>" data-reterencerelation="<?php echo ($v["reterence_relation"]); ?>" data-reterencecompany="<?php echo ($v["reterence_company"]); ?>" data-reterenceposition="<?php echo ($v["reterence_position"]); ?>" data-reterencephone="<?php echo ($v["reterence_phone"]); ?>" data-reasons="<?php echo ($v["reasons"]); ?>">  <i></i><em>编辑</em> </div>
          </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </table>
      </div>
      
    </div>
    <?php } ?>
  </div>   

<div class="mr_moudle_content ">
  <form class="jobExpForm " id="addJobForm">
    <div class="mr_add_work myr_info_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
    		<tr>
              <th class="pt10"><label>工作性质</label></th>
              <td>
                  <div class="myr_radio">
                      <label class="radio">
			            <input type="radio" name="workCat" id="workCat1" value="全职" data-toggle="radio" class="custom-radio"
                  <?php if($info["maritalstatus"] == "全职"): ?>checked=""<?php endif; ?> 
                  ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
			            全职
			         </label>
			         &nbsp;&nbsp;
			         <label class="radio">
			            <input type="radio" name="workCat" id="workCat2" value="实习(全职)" data-toggle="radio"  class="custom-radio"
                   <?php if($info["maritalstatus"] == "实习(全职)"): ?>checked=""<?php endif; ?> 
                  ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
			            实习(全职)
			          </label>
			           <label class="radio">
			            <input type="radio" name="workCat" id="workCat3" value="实习(兼职)" data-toggle="radio" class="custom-radio"
                   <?php if($info["maritalstatus"] == "实习(兼职)"): ?>checked=""<?php endif; ?> 
                   ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>实习(兼职)
			          </label>
			           <label class="radio">
			            <input type="radio" name="workCat" id="workCat4" value="兼职" data-toggle="radio" class="custom-radio"
                   <?php if($info["maritalstatus"] == "兼职"): ?>checked=""<?php endif; ?> 
                   ><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>兼职
			          </label>
                <input id="work_cat" name="work_cat" type="hidden" value="<?php echo ($info["work_cat"]); ?>">
                  </div>
              </td>
          </tr>
          <tr>
              <th class="pt10"><label>工作单位</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="companyName" class="form-control">
                  </div>
              </td>
          </tr>
          <tr>
        		<th class="pt10"><label>单位性质</label></th>
              <td >
              <div class="form_wrap normal_s" style="*z-index:4;">
             	<div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="company_property_text" />
                <input type="button" class="mr_button" name="company_property" id="company_property" />
                <div class="xl_list dn">
                  <ul class="ul_dwxz">
                      <li>外资-欧美</li>
          						<li>外资-非欧美</li>
          						<li>合资-欧美</li>
          						<li>合资-非欧美</li>
          						<li>国企</li>
          						<li>民营公司</li>
          						<li>外企代表处</li>
          						<li>政府机关</li>
          						<li>事业单位</li>
          						<li>非盈利机构</li>
          						<li>上市公司</li>
          						<li>创业公司</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
          </tr>
          <tr>
        		<th class="pt10"><label>公司规模</label></th>
              <td >
              <div class="form_wrap normal_s" style="*z-index:4;">
             	<div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="company_size_text" />
                <input type="button" class="mr_button" name="company_size" id="company_size" />
                <div class="xl_list dn">
                  <ul class="ul_gsgm">
                      <li>少于50人</li>
          						<li>50-149人</li>
          						<li>150-499人</li>
          						<li>500-999人</li>
          						<li>1000-9999人</li>
          						<li>10000人以上</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
          </tr>
          <tr>
        		<th class="pt10"><label>行业类别</label></th>
              <td >
              <div class="form_wrap normal_s" style="*z-index:4;">
             	<div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="company_cat_text" />
                <input type="button" class="mr_button" name="company_cat" id="company_cat" />
                <div class="xl_list dn">
                  <ul class="ul_hylb">
                      <li>少于50人</li>
          						<li>50-149人</li>
          						<li>150-499人</li>
          						<li>500-999人</li>
          						<li>1000-9999人</li>
          						<li>10000人以上</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
          </tr>
           <tr>
              <th class="pt10"><label>工作职位</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="positionName" class="form-control">
                  </div>
              </td>
          </tr>
           <tr>
              <th class="pt10"><label>所在部门</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="department" class="form-control">
                  </div>
              </td>
          </tr>
           <tr>
              <th class="pt10"><label>工作城市</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="work_city" class="form-control">
                  </div>
              </td>
          </tr>
          <tr>
              <th class="pt10"><label>职责描述</label></th>
              <td class="tb_textarea">
                <textarea class="resumetextarea form-control" id="workContent" name="workContent"></textarea>   
                <span class="tiprighttext icon-resume icon-business_bulb" title="GPA(4分制)"></span> 
   			        </td>
          </tr>
           <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>职位月薪(税前)</label></th>
              <td>
                  <div class="form_wrap normal_s" style="*z-index:4;">
                  <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                    <input type="hidden" name="salary_month_text" />
                    <input type="button" class="mr_button" name="salary_month" id="salary_month" />
                    <div class="xl_list dn">
                      <ul class="ul_yuexin">
                        <li>1000以下</li>
                        <li>1000-1499</li>
                        <li>1500-1999</li>
                        <li>2000-2999</li>
                        <li>3000-4499</li>
                        <li>4500-5999</li>
                        <li>6000-7999</li>
                        <li>8000-9999</li>
                        <li>10000-11999</li>
                        <li>12000-14999</li>
                        <li>15000-24999</li>
                        <li>25000以上</li>
                      </ul>
                    </div>
                  </div>
                  </div>
              </td>
          </tr>
          <tr>
              <th class="pt10"><label>在职时间</label></th>
              <td>
                  <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="startTime"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
              </td>
          </tr>
           <tr>
              <th class="pt10"><label>离职时间</label></th>
              <td>
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="endTime"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
              </td>
          </tr>
          
   		<tr>
              <th class="pt10"><label>工作内容</label></th>
              <td class="tb_textarea">
                <textarea class="resumetextarea form-control" id="jobContent" name="jobContent"></textarea>
   			</td>
          </tr>
            <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>离职原因</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reasons" class="form-control">
                  </div>
              </td>
          </tr>
            <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人姓名</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_name" class="form-control">
                  </div>
              </td>
          </tr>
         <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人关系</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_relation" class="form-control">
                  </div>
              </td>
          </tr>
            <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人单位</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_company" class="form-control">
                  </div>
              </td>
          </tr>
            <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人职位</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_position" class="form-control">
                  </div>
              </td>
          </tr>
           <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人联系方式</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_phone" class="form-control">
                  </div>
              </td>
          </tr>
      	</table>
  <!--     	<div class="mr_ope clearfixs">
            <input type="submit" class="mr_save" value="保存" />
            <a href="javascript:;" class="mr_cancel">取消</a> 
        </div> -->
         <div class="btn-group">
            <input type="submit" class="btn-resumeac mr_save" value="保存" />
            <input type=button value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitWorkFrom(); tonext();">
            <!-- <a href="javascript:" class="btn-resumeac mr_next" id="next" >下一步</a> -->
        </div>
       <!--   <div class="mr_head_l">
	        <div class="mr_head_r "> <i></i><em>再添加一项</em> </div>
	        
	    </div>	 -->
	<!--     <div class="mr_moudle_head clearfixs">
		  <div class="mr_head_r"> <i></i><em>添加</em> </div>
		</div> -->
    </div>
  </form>
</div>
</div>
<script type="text/javascript">
  function submitWorkFrom(){
  $('#addJobForm').submit();
  }
</script>
          </section>
          <section id="section-underline-4">
            <div class="baseinfo-top">
	<h3>项目经历</h3>
</div>
<div id="projectExperience"  class="item_container_target" >
  <div class="list_show">
  <?php if($pro_list){ ?>
  
    <div class="mr_jobe_list">
      <div class="clearfixs">
       <table>
        	<tr><th width="200px" class="projectTitle">项目名称</th><th width="200px">职位</th><th width="200px">时间</th><th width="200px">编辑</th></tr>
          <?php if(is_array($pro_list)): $i = 0; $__LIST__ = $pro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["projectName"]); ?></td><td><?php echo ($v["positionName"]); ?></td><td><span><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></span></td><td>
        	<div class="mr_edit mr_c_r_t" data-id="<?php echo ($v["id"]); ?>" data-posiname="<?php echo ($v["positionName"]); ?>" data-retername="<?php echo ($v["reterenceName"]); ?>" data-pronum="<?php echo ($v["projectNumber"]); ?>" data-reterphone="<?php echo ($v["reterencePhone"]); ?>" data-produty="<?php echo ($v["projectDuty"]); ?>" data-protitle="<?php echo ($v["projectName"]); ?>" data-startdate="<?php echo ($v["startDate"]); ?>" data-enddate="<?php echo ($v["endDate"]); ?>" data-proremark="<?php echo ($v["projectRemark"]); ?>" data-dutyremark="<?php echo ($v["dutyRemark"]); ?>" > <i></i><em>编辑</em> </div></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
      </div>
    </div>
    <?php } ?>  
  </div>

	 <div class="mr_moudle_content">
  <form class="proExpForm" id="addProForm">
    <!--addProForm js赋值  -->
    <div class="mr_add_work myr_info_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr><th class="pt10"><label>项目名称</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="projectName" name="projectName" class="form-control">
                    </div>
                </td>
            </tr>
              <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>项目人数</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="projectNumber" name="projectNumber" class="form-control">
                    </div>
                </td>
            </tr>
           
            <tr><th class="pt10"><label>项目描述</label></th>
                <td class="tb_textarea"> 
                   <textarea class="resumetextarea form-control" name="proDescript" style="width:520px;height:148px;"></textarea>
                </td>
            </tr>
             <tr><th class="pt10"><label>项目职位</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="thePost" name="thePost" class="form-control">
                    </div>
                </td>
            </tr>
            <tr><th class="pt10"><label>职责描述</label></th>
                <td class="tb_textarea"> 
                  <textarea class="resumetextarea form-control" name="projectDuty" style="width:520px;height:148px;"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="职责描述"></span> 
                </td>
            </tr>
            <tr style="display:none"><th class="pt10"><label>项目链接（若有）</label></th>
               <td><div class="myr_input_div_l">
                      <input type="hidden" id="pro_link" name="pro_link" class="form-control">
                    </div>
                </td>
            </tr>
             <tr><th class="pt10"><label>项目开始时间</label></th>
               <td>
                <div class="form-item ">
                  <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                  <div class="form_wrap  normal_s controls">
                      <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="startTime"  data-date-format="yyyy-mm-dd">
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-calendar"></i></span>
                      <i class="mr_sj"></i>
                      </div>
                  </div> 
              </div>
               </td>
            </tr>
               <tr><th class="pt10"><label>项目结束时间</label></th>
               <td>
              <div class="form-item ">
                  <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                  <div class="form_wrap  normal_s controls">
                      <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="endTime"  data-date-format="yyyy-mm-dd">
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-calendar"></i></span>
                      <i class="mr_sj"></i>
                      </div>
                  </div> 
              </div>
             
                </td>
            </tr>
              <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>证明人姓名</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="reterenceName" name="reterenceName" class="form-control">
                    </div>
                </td>
            </tr>
              <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>证明人联系方式</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="reterencePhone" name="reterencePhone" class="form-control">
                    </div>
                </td>
            </tr>
          </table>
     <!--   <div class="mr_head_r"> <i></i><em>添加</em> </div> -->
      <div class="mr_ope clearfixs btn-group">
        <input type="submit" class="mr_save btn-resumeac" value="保存" />
        <!-- <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a>  -->
      <input type=button value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitProFrom(); tonext();">
      </div>
    </div>
  </form>

</div>
</div>
<script type="text/javascript">
  function submitProFrom(){
  $('#addProForm').submit();
  }
</script>
          </section>
           <section id="section-underline-5">
              <div class="baseinfo-top">
<h3>证书</h3>
</div>
<div id="certificate" class="item_container_target">
<div class="list_show">
<?php if($certificate_list){ ?>
      <?php if(is_array($certificate_list)): $i = 0; $__LIST__ = $certificate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="clearfixs mb46 mr_jobe_list">
        <table>
          <tr><th width="200px">证书名称</th><th width="200px">获得时间</th><th width="200px">颁发机构</th><th width="200px">编辑</th></tr>
          <tr><td><?php echo ($v["certificateName"]); ?></td><td><?php echo ($v["getDate"]); ?></td><td><?php echo ($v["issuing"]); ?></td><td><div class="mr_edit mr_c_r_t" data-certiid="<?php echo ($v["id"]); ?>" data-certiname="<?php echo ($v["certificateName"]); ?>" data-getdate="<?php echo ($v["getDate"]); ?>" data-issuing="<?php echo ($v["issuing"]); ?>" data-certides="<?php echo ($v["certificateDes"]); ?>"> <i></i><em>编辑</em> </div></td></tr>
        </table>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
      <?php } ?>
    </div>
<div class="mr_moudle_head clearfixs">

  <div class="mr_moudle_content" id="edu_update">
    <form class="eduExpForm" id="addCertificateForm">
      <!-- <input type="hidden" id="eduId" name="eduId" value="" /> -->
       <div class="myr_info_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>证书名称</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="certificateName" class="form-control">
                     <span class="tipright icon-resume icon-business_bulb" title="证书名称"></span> 
                </div>
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>获得时间</label></th>
              <td> 
                <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="getDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
                
              
              </td>
            </tr>
            <tr>
              <th class="pt10"><label>证书描述</label></th>
              <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="certificateDes" style="width:520px;height:148px;"></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="证书描述"></span> 
                </td>
            </tr>
           
             <tr>
              <th class="pt10"><label>颁发机构</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="issuing" class="form-control">
                </div>
              </td>
            </tr>
           
          </table>
        </div>
    
     
         <div class="mr_ope clearfixs btn-group">
          <input type="submit" class="mr_save btn-resumeac" value="保存" />
          <!-- <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> --> 
           <input type=button value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitCertiFrom(); tonext();">
          </div>
      </div>
    </form>
      <div class="mr_head_l">
    <div class="mr_head_r"> <i></i><em>添加</em> </div>
  </div>        
</div>
</div>
  <script type="text/javascript">
  function submitCertiFrom(){
  $('#addCertificateForm').submit();
  }
</script>
          </section>
          <section id="section-underline-6">
            <div class="baseinfo-top">
	<h3>在校实践</h3>
</div>
<div id="schoolPractice"  class="item_container_target" >
      <div class="list_show">
      <?php if($practice_list){ ?>
        <div class="mr_jobe_list" >
          <div class="clearfixs">
           <table>
            	<tr><th width="200px">实践单位</th><th width="200px">实践职位</th><th width="200px">时间</th><th width="200px">编辑</th></tr>
              <?php if(is_array($practice_list)): $i = 0; $__LIST__ = $practice_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["praCompanyName"]); ?></td><td><?php echo ($v["practicePosition"]); ?></td><td><span><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></span></td><td>
            	<div class="mr_edit mr_c_r_t" data-schoolpracticeid= "<?php echo ($v["id"]); ?>" data-praposi="<?php echo ($v["practicePosition"]); ?>" data-pracomname="<?php echo ($v["praCompanyName"]); ?>" data-prades="<?php echo ($v["practiceDes"]); ?>" data-startdate="<?php echo ($v["startDate"]); ?>"data-praduty="<?php echo ($v["practiceDuty"]); ?>"data-enddate="<?php echo ($v["endDate"]); ?>" > <i></i><em>编辑</em> </div></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
          </div>
        </div>
        
        <?php } ?>  
      </div>
     
   	 <div class="mr_moudle_content">
      <form class="schPraForm" id="addSchPraForm">
        <!--addProForm js赋值  -->
        <div class="mr_add_work myr_info_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
                <tr><th class="pt10"><label>实践单位</label></th>
                    <td><div class="myr_input_div_l">
	                      <input type="text" id="praCompanyName" name="praCompanyName" class="form-control">
	                    </div>
	                </td>
                </tr>
                 <tr><th class="pt10"><label>实践经历描述</label></th>
                  <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="practiceDes"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="实践经历描述"></span> 
               	</td>
	               
                </tr>
                 <tr><th class="pt10"><label>实践职位</label></th>
                    <td><div class="myr_input_div_l">
	                      <input type="text" id="practicePosition" name="practicePosition" class="form-control">
	                    </div>
	                </td>
                </tr>
                 <tr><th class="pt10"><label>职责描述</label></th>
                 
	                <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="practiceDuty"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="职责描述"></span> 
               	</td>
                </tr>
                 <tr><th class="pt10"><label>项目开始时间</label></th>
                   <td>
                     <div class="form-item ">
		                  <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
		                  <div class="form_wrap  normal_s controls">
		                      <input type="text" class="mr_button" readonly class="text input date" placeholder="选择时间" name="startTime"  data-date-format="yyyy-mm-dd">
		                      <span class="add-on"><i class="icon-remove"></i></span>
		                      <span class="add-on"><i class="icon-calendar"></i></span>
		                      <i class="mr_sj"></i>
		                      </div>
		                  </div> 
		              </div>
                   </td>
                </tr>
                   <tr><th class="pt10"><label>项目结束时间</label></th>
                   <td>
		              <div class="form-item ">
		                  <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
		                  <div class="form_wrap  normal_s controls">
		                      <input type="text" class="mr_button" readonly class="text input date" placeholder="选择时间" name="endTime"  data-date-format="yyyy-mm-dd">
		                      <span class="add-on"><i class="icon-remove"></i></span>
		                      <span class="add-on"><i class="icon-calendar"></i></span>
		                      <i class="mr_sj"></i>
		                      </div>
		                  </div> 
		              </div>
          <!--          <div class="clearfixs mr_time_area">
                    <div class="mr_timed_div mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="button" class="mr_btn"/>
                      <input type="hidden"  name="startTime"/>
                      <div class="mr_calendar_ym clearfixs dn">
                        <ul class="mr_year">
                          <?php $year = getYear(1990,0,1); ?>
                          <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <ul class="mr_month clearfixs">
                          <li><span>1月</span></li>
                          <li><span>2月</span></li>
                          <li class="mr0"><span>3月</span></li>
                          <li><span>4月</span></li>
                          <li><span>5月</span></li>
                          <li class="mr0"><span>6月</span></li>
                          <li><span>7月</span></li>
                          <li><span>8月</span></li>
                          <li class="mr0"><span>9月</span></li>
                          <li class="mb0"><span>10月</span></li>
                          <li class="mb0"><span>11月</span></li>
                          <li class="mr0 mb0"><span>12月</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="mr_timed_div fl"> <i class="mr_sj"></i>
                      <input type="button" class="mr_btn"/>
                      <input type="hidden" name="endTime"/>
                      <div class="mr_calendar_ym clearfixs dn">
                        <ul class="mr_year">
                          <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <ul class="mr_month clearfixs">
                          <li><span>1月</span></li>
                          <li><span>2月</span></li>
                          <li class="mr0"><span>3月</span></li>
                          <li><span>4月</span></li>
                          <li><span>5月</span></li>
                          <li class="mr0"><span>6月</span></li>
                          <li><span>7月</span></li>
                          <li><span>8月</span></li>
                          <li class="mr0"><span>9月</span></li>
                          <li class="mb0"><span>10月</span></li>
                          <li class="mb0"><span>11月</span></li>
                          <li class="mr0 mb0"><span>12月</span></li>
                        </ul>
                      </div>
                    </div>
                  </div> -->
	                </td>
                </tr>
                
              </table>
         
          <div class="mr_ope clearfixs btn-group">
            <input type="submit" class="btn-resumeac mr_save" value="保存" />
            <!-- <a href="javascript:;" class="btn-resumeac mr_cancel">取消</a> --> 
            <input type=button value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitSchProFrom(); tonext();">
          </div>
            <!--  <div class="mr_head_r"> <i></i><em>添加</em> </div> -->
        </div>
      </form>
  
    </div>
  </div>
  <script type="text/javascript">
  function submitSchProFrom(){
  $('#addSchPraForm').submit();
  }
</script>
          </section>
          <section id="section-underline-7">
            <div class="baseinfo-top">
<h3>社团经历</h3>
</div>
<div id="schoolClub" class="item_container_target">
<div class="list_show">

<?php if($schoolclub_list){ ?>
        <div class="clearfixs mb46 mr_jobe_list">
        <table>
          <tr><th width="200px">社团名称</th><th width="200px">担任职务</th><th width="200px">时间</th><th width="200px">编辑</th></tr>
          <?php if(is_array($schoolclub_list)): $i = 0; $__LIST__ = $schoolclub_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["schClubName"]); ?></td><td><?php echo ($v["positionName"]); ?></td><td><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></td><td><div class="mr_edit mr_c_r_t" data-schoolclubid="<?php echo ($v["id"]); ?>" data-schclubname="<?php echo ($v["schClubName"]); ?>" data-posname="<?php echo ($v["positionName"]); ?>" data-schclublevel="<?php echo ($v["schClubLevel"]); ?>" data-enddate="<?php echo ($v["endDate"]); ?>" data-startdate="<?php echo ($v["startDate"]); ?>" data-workdes="<?php echo ($v["workDes"]); ?>"> <i></i><em>编辑</em> </div></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        </div>
      <?php } ?>
    </div>
<div class="mr_moudle_head clearfixs">

  <div class="mr_moudle_content" id="edu_update">
    <form class="eduExpForm" id="addSchClubForm">
      <!-- <input type="hidden" id="eduId" name="eduId" value="" /> -->
       <div class="myr_info_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>社团名称</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="schClubName" class="form-control">
                </div>
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>社团等级</label></th>
              <td>
                <div class="form_wrap normal_s" style="*z-index:4;">
                <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="schclublevel_text" />
                <input type="button" class="mr_button" name="schClubLevel" id="schClubLevel" />
                <div class="xl_list dn">
                  <ul class="ul_schclublevel">
                    <li>团委</li>
                    <li>校学生会</li>
                    <li>学生社团</li>
                    <li>班级</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
            </tr>
            <tr>
              <th class="pt10"><label>担任职务</label></th>
              <td>
                <div class="form_wrap normal_s" style="*z-index:4;">
                <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="positionname_text" />
                <input type="button" class="mr_button" name="positionName" id="positionName" />
                <div class="xl_list dn">
                  <ul class="ul_positionname">
                    <li>学生会主席</li>
                    <li>学生会副主席</li>
                    <li>学生会部长</li>
                    <li>学生会干事</li>
                    <li>班干部</li>
                    <li>班长团支书</li>
                    <li>社团主席</li>
                    <li>社团副主席</li>
                    <li>社团干事</li>
                    <li>其他职务</li>
                    <li>未担任</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
            </tr>
           <tr>
          <th class="pt10"><label>工作职责</label></th>
                  <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="workDes"></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="工作职责"></span> 
                </td>
            </tr>
             <tr>
              <th class="pt10"><label>开始时间</label></th>
              <td>
                <div class="myr_input_div_l">
                  
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="startDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
              </td>
            </tr>
             <tr>
              <th class="pt10"><label>结束时间</label></th>
              <td>
                <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="endDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
              </td>
            </tr>
           
          </table>
        </div>
    
     
        <div class="mr_ope clearfixs btn-group">
          <input type="submit" class="mr_save btn-resumeac" value="保存" />
         <!--  <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> --> 
          <input type=button value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitSchClubFrom(); tonext();">
         </div>
      </div>
    </form>
      <!-- <div class="mr_head_l">
    <div class="mr_head_r"> <i></i><em>添加</em> </div>
  </div> -->        
</div>
</div>
  <script type="text/javascript">
  function submitSchClubFrom(){
  $('#addSchClubForm').submit();
  }
</script>
          </section>
          <section id="section-underline-8">
              <div class="baseinfo-top">
<h3>获奖经历</h3>
</div>
<div id="schoolAwards" class="item_container_target">
<div class="list_show">
<?php if($schoolawards_list){ ?>
      
        <div class="clearfixs mb46 mr_jobe_list">
        <table>
          <tr><th width="200px">获奖名称</th><th width="200px">获奖类型</th><th width="200px">获得时间</th><th width="200px">编辑</th></tr>
          <?php if(is_array($schoolawards_list)): $i = 0; $__LIST__ = $schoolawards_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["awardsName"]); ?></td><td><?php echo ($v["awardsType"]); ?></td><td><?php echo ($v["awardsDate"]); ?></td><td><div class="mr_edit mr_c_r_t" data-schoolawardsid="<?php echo ($v["id"]); ?>" data-awardsname="<?php echo ($v["awardsName"]); ?>" data-awardstype="<?php echo ($v["awardsType"]); ?>" data-awardslevel="<?php echo ($v["awardsLevel"]); ?>" data-awardsdate="<?php echo ($v["awardsDate"]); ?>" data-awardsdes="<?php echo ($v["awardsDes"]); ?>"> <i></i><em>编辑</em> </div></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        </div>
        
      <?php } ?>
    </div>
<div class="mr_moudle_head clearfixs">

  <div class="mr_moudle_content" id="edu_update">
    <form class="eduExpForm" id="addSchAwForm">
      <!-- <input type="hidden" id="eduId" name="eduId" value="" /> -->
       <div class="myr_info_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>获奖名称</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="awardsName" class="form-control">
                </div>
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>获奖类型</label></th>
              <td>
                <div class="form_wrap normal_s" style="*z-index:4;">
                <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="awardsType_text" />
                <input type="button" class="mr_button" name="awardsType" id="awardsType" />
                <div class="xl_list dn">
                  <ul class="ul_awardsType">
                      <li>国际级</li>
                       <li>国家级</li>
                       <li>省市级</li>
                       <li>学校级</li>
                       <li>院系级</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
            </tr>
            <tr>
              <th class="pt10"><label>担任职务</label></th>
              <td>
                <div class="form_wrap normal_s" style="*z-index:4;">
                <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="awardsLevel_text" />
                <input type="button" class="mr_button" name="awardsLevel" id="awardsLevel" />
                <div class="xl_list dn">
                  <ul class="ul_awardsLevel">
                    <li>特等奖</li>
                    <li>一等奖</li>
                    <li>二等奖</li>
                    <li>三等奖</li>
                    <li>其它</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
            </tr>
             <tr>
              <th class="pt10"><label>获奖时间</label></th>
              <td>
                <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="awardsDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
               
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>获奖描述</label></th>
                <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="awardsDes" style="width:520px;height:148px;"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="获奖描述"></span> 
                </td>
            </tr>
          </table>
        </div>
    
     
        <div class="mr_ope clearfixs btn-group">
          <input type="submit" class="mr_save btn-resumeac" value="保存" />
          <!-- <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> --> 
           <input type=button value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitSchAwFrom(); tonext();">
           </div>
      </div>
    </form>
      <div class="mr_head_l">
    <div class="mr_head_r"> <i></i><em>添加</em> </div>
  </div>        
</div>
</div>
  <script type="text/javascript">
  function submitSchAwFrom(){
  $('#addSchAwForm').submit();
  }
</script>
          </section>
           <section id="section-underline-9">
              <link rel="stylesheet" type="text/css" href="/Public/Home/css/schoolselect.css">
<div class="baseinfo-top">
	<h3>教育经历</h3>
</div>
<div id="skillsAssess" class="item_container_target">
  <div class="list_show">
		<?php if($skill_list){ ?>
         
            <div class="clearfixs mb46 mr_jobe_list">
            <table>
            	<tr><th width="200px">学校</th><th width="200px">学历</th><th width="200px">专业</th><th width="200px">编辑</th></tr>
            	 <?php if(is_array($edu_list)): $i = 0; $__LIST__ = $edu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["schoolName"]); ?></td><td><?php echo ($v["education"]); ?></td><td><?php echo ($v["professional"]); ?></td><td><div class="mr_edit mr_c_r_t" data-eduid="<?php echo ($v["id"]); ?>" data-schoolname="<?php echo ($v["schoolName"]); ?>" data-edu="<?php echo ($v["education"]); ?>" data-pro="<?php echo ($v["professional"]); ?>" data-date="<?php echo ($v["endYear"]); ?>" data-startdate="<?php echo ($v["startYear"]); ?>" data-schoolcity="<?php echo ($v["school_city"]); ?>" data-degree="<?php echo ($v["degree"]); ?>" data-academy="<?php echo ($v["academy"]); ?>" data-major="<?php echo ($v["major"]); ?>" data-gpa="<?php echo ($v["gpa_score"]); ?>" data-prorank="<?php echo ($v["professional_ranking"]); ?>" data-classrank="<?php echo ($v["class_ranking"]); ?>" data-prodes="<?php echo ($v["professional_describe"]); ?>" data-tutorname="<?php echo ($v["tutor_name"]); ?>" data-tutorphone="<?php echo ($v["tutor_phone"]); ?>"> <i></i><em>编辑</em> </div></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
                <!--   <div class="mr_content_l">
                    <div class="l2">
                      <h4><?php echo ($v["schoolName"]); ?></h4>
                      <span><?php echo ($v["education"]); ?> · <?php echo ($v["professional"]); ?></span> </div>
                  </div>
                  <div class="mr_content_r">
                    <div class="mr_edit mr_c_r_t" data-eduid="<?php echo ($v["id"]); ?>" data-schoolname="<?php echo ($v["schoolName"]); ?>" data-edu="<?php echo ($v["education"]); ?>" data-pro="<?php echo ($v["professional"]); ?>" data-date="<?php echo ($v["endYear"]); ?>"> <i></i><em>编辑</em> </div>
                    <span><?php echo ($v["endYear"]); ?>年毕业</span>
					</div> -->
            </div>
            
        <?php } ?>
    </div>
<div class="mr_moudle_head clearfixs">
  
    <div class="mr_moudle_content" id="edu_update">
      <form class="eduExpForm" id="addEduForm">
        <!-- <input type="hidden" id="eduId" name="eduId" value="" /> -->
         <div class="myr_info_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
                <tr>
                    <th class="pt10"><label>语言</label></th>
                    <td>
	                    <div class="myr_input_div_l">
	                        <input type="text" name="schoolName" class="ed_name valid form-control">
	                    </div>
                 
                    </td>
                </tr>
         
            </table>
        </div>

              <div class="mr_skill_add mr_skill_add_button" ><span>添加一行</span></div>
                
                <div class="mr_skill_add mr_skill_opera">
                  <div class="mr_ope clearfixs"> <span class="error" style="display:none;">error</span>
                    <input type="submit" class="mr_save" value="保存">
                    <a href="javascript:;" class="mr_cancel">取消</a> </div>
                </div>
               
      
        </div>
      </form>
			
</div>
</div>
 

<script type="text/javascript">
  function submitEduFrom(){
  $('#addEduForm').submit();
  }
  function closeschool(){
    $("div[class='provinceSchool']").hide();
  }
  function selectschool(){
    var selectPro = $("div[class='proSelect'] select").val();
    if("99"==selectPro){
      $("#schoolName").val($("div[class='proSelect'] input").val());
    }
    $("div[class='provinceSchool']").hide();
  }
   $(document).ready(function() {
      $(".form_oldatetime").datetimepicker({

          format: "yyyy-mm-dd",
          language: 'zh-CN',
          weekStart: 1,
          todayBtn:  1,
          autoclose: 1,
          todayHighlight: 1,
          startView: 2,
          minView: 2,
          forceParse: 0

      });

   });  
</script>
<script type="text/javascript" src="/Public/Home/js/school.js"></script>
<script type="text/javascript">
$(function(){
  //province;
  //proSchool;
  //学校名称 激活状态
  $("#schoolName").focus(function(){
    var top = $(this).position().top+$(this).height()+2;
    var left = $(this).position().left;
    $("div[class='provinceSchool']").css({top:top,left:left});
    $("div[class='provinceSchool']").show();
  });
  //初始化省下拉框
  var provinceArray = "";
  var provicneSelectStr = "";
  for(var i=0,len=province.length;i<len;i++){
    provinceArray = province[i];
    provicneSelectStr = provicneSelectStr + "<option value='"+provinceArray[0]+"'>"+provinceArray[1]+"</option>"
  } 
  $("div[class='proSelect'] select").html(provicneSelectStr);
  //初始化学校列表
  var selectPro = $("div[class='proSelect'] select").val();
  var schoolUlStr = "";
  var schoolListStr = new String(proSchool[selectPro]);
  var schoolListArray = schoolListStr.split(",");
  var tempSchoolName = "";
  for(var i=0,len=schoolListArray.length;i<len;i++){
    tempSchoolName = schoolListArray[i];
    if(tempSchoolName.length>13){
    schoolUlStr = schoolUlStr + "<li class='DoubleWidthLi' title="+schoolListArray[i]+">"+schoolListArray[i]+"</li>"
    }else {
    schoolUlStr = schoolUlStr + "<li>"+schoolListArray[i]+"</li>"
    }
  }
  $("div[class='schoolList'] ul").html(schoolUlStr);
  //省切换事件
  $("div[class='proSelect'] select").change(function(){
    if("99"!=$(this).val()){
    $("div[class='proSelect'] span").show();
    $("div[class='proSelect'] input").hide();
    schoolUlStr = "";
    schoolListStr = new String(proSchool[$(this).val()]);
    schoolListArray = schoolListStr.split(",");
    for(var i=0,len=schoolListArray.length;i<len;i++){
      tempSchoolName = schoolListArray[i];
      if(tempSchoolName.length>13){
      schoolUlStr = schoolUlStr + "<li class='DoubleWidthLi' title="+schoolListArray[i]+">"+schoolListArray[i]+"</li>"
      }else {
      schoolUlStr = schoolUlStr + "<li>"+schoolListArray[i]+"</li>"
      }
    }
    $("div[class='schoolList'] ul").html(schoolUlStr);
    }
    else {
    $("div[class='schoolList'] ul").html("<span class='entertext'>请在输入框内手动输入学校！</span>");
    $("div[class='proSelect'] span").hide();
    $("div[class='proSelect'] input").show();
    }
  });
  //学校列表mouseover事件
  $("div[class='schoolList'] ul li").live("mouseover",function(){
    $(this).css("background-color","#6f3400");
  });
  //学校列表mouseout事件
  $("div[class='schoolList'] ul li").live("mouseout",function(){
    $(this).css("background-color","");
  });
  //学校列表点击事件
  $("div[class='schoolList'] ul li").live("click",function(){
    $("#schoolName").val($(this).html());
    $("div[class='provinceSchool']").hide();
  });
  //按钮点击事件
  // $("div[class='button'] button").live("click",function(){
  //   var flag = $(this).attr("flag");
  //   if("0"==flag){
  //   $("div[class='provinceSchool']").hide();
  //   }else if("1"==flag){
  //   var selectPro = $("div[class='proSelect'] select").val();
  //   if("99"==selectPro){
  //     $("#schoolName").val($("div[class='proSelect'] input").val());
  //   }
  //   $("div[class='provinceSchool']").hide();
  //   }
  // });

});
</script>
 <script type="text/javascript">

        // Think.setValue("pid", <?php echo ((isset($info["nativeplace"]) && ($info["nativeplace"] !== ""))?($info["nativeplace"]): 0); ?>);
        // Think.setValue("status", <?php echo ((isset($listinfo["status"]) && ($listinfo["status"] !== ""))?($listinfo["status"]): 0); ?>);
        // Think.setValue("ishot", <?php echo ((isset($listinfo["ishot"]) && ($listinfo["ishot"] !== ""))?($listinfo["ishot"]): 0); ?>);


        var addressarr = <?php echo ($city_arr); ?>;
      //  var cprovince = <?php echo ($info["nativeplace"]); ?>;
        //var ccity = <?php echo ($info["nativeplace_city"]); ?>;

        addressarr = eval(addressarr);
        function setprovince() {
          var html = '';
          for(var key in addressarr) {
            if(addressarr[key]['pid']==1){
              html += '<option class="optionstyle" value="'+addressarr[key].aid+'">'+addressarr[key].name+'</option>';
              //html += '<li value="'+addressarr[key].aid+'">'+addressarr[key].name+'</li>';
            }
          }
          $("#school_city").html(html);
   
        }

        function setschoolcity(vv) {
         
          var html = '';
          var v ='';
          if(isNaN(vv)){
            v = $(vv).val();
          }
          else v = vv;

          if(addressarr[v]){
            var cityarr = addressarr[v]['sub'];
            for(var k in cityarr) {
              html += '<option value="'+k+'">'+cityarr[k].name+'</option>';
              //html += '<li>'+cityarr[k].name+'</li>';
            }
          }

          $("#school_city_city").html(html);
        }


        setprovince();

       // $("#school_city").val(cprovince);

        var obj = $("#school_city").val();
        setcity(obj);



        //$("#school_city_city").val(ccity);

</script>

          </section>
           <section id="section-underline-10">
              <div class="baseinfo-top">
<h3>培训经历</h3>
</div>
<div id="training" class="item_container_target">
<div class="list_show">
<?php if($trainingexperience_list){ ?>
  <div class="clearfixs mb46 mr_jobe_list">
        <table>
          <tr><th width="200px">培训名称</th><th width="200px">培训机构</th><th width="200px">时间</th><th width="200px">编辑</th></tr>
          <?php if(is_array($trainingexperience_list)): $i = 0; $__LIST__ = $trainingexperience_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($v["trainingName"]); ?></td><td><?php echo ($v["trainingCompany"]); ?></td><td><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></td><td><div class="mr_edit mr_c_r_t" data-trainingid="<?php echo ($v["id"]); ?>" data-trainingname="<?php echo ($v["trainingName"]); ?>" data-trainingdes="<?php echo ($v["trainingDes"]); ?>" data-trainingcompany="<?php echo ($v["trainingCompany"]); ?>" data-trainingplace="<?php echo ($v["trainingPlace"]); ?>" data-startdate="<?php echo ($v["startDate"]); ?>" data-enddate="<?php echo ($v["endDate"]); ?>" data-certificatename="<?php echo ($v["certificateName"]); ?>" > <i></i><em>编辑</em> </div></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        </div>
      <?php } ?>
   </div>
<div class="mr_moudle_head clearfixs">

  <div class="mr_moudle_content" id="edu_update">
    <form class="eduExpForm" id="addTrainingForm">
      <!-- <input type="hidden" id="eduId" name="eduId" value="" /> -->
       <div class="myr_info_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>培训名称</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="trainingName" class="form-control">
                </div>
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>培训内容</label></th>
                <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="trainingDes" style="width:520px;height:148px;"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="培训内容"></span> 
                </td>
            </tr>
            <tr>
              <th class="pt10"><label>培训机构</label></th>
              <td>
                <div class="myr_input_div_l">
                 
                    <input type="text" name="trainingCompany" class="form-control">
                </div>
              </td>
            </tr>
           
              <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>培训地点</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="trainingPlace" class="form-control">
                </div>
              </td>
            </tr>

             <tr>
              <th class="pt10"><label>开始时间</label></th>
              <td>
              <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="startDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
               
              </td>
            </tr>
             <tr>
              <th class="pt10"><label>结束时间</label></th>
              <td>
                 <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="endDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
              </td>
            </tr>

            <tr>
              <th class="pt10"><label>获得证书</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="certificateName" class="form-control">
                </div>
              </td>
            </tr>           
          </table>
        </div>
    
     
         <div class="mr_ope clearfixs btn-group">
          <input type="submit" class="mr_save btn-resumeac" value="保存" />
          <!-- <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> --> 
          <input type=button value="保存并下一项"  class="btn-resumeac mr_next" onclick="submitTrainingFrom(); tonext();">
          </div>
      </div>
    </form>
      <div class="mr_head_l">
    <div class="mr_head_r"> <i></i><em>添加</em> </div>
  </div>        
</div>
</div>
  <script type="text/javascript">
  function submitTrainingFrom(){
  $('#addTrainingForm').submit();
  }
</script>
          </section>
           <section id="section-underline-11">
              <div class="baseinfo-top">
<h3>其他信息</h3>
</div>
<div id="otherInfo" class="item_container_target">

<div class="mr_moudle_head clearfixs">

  <div class="mr_moudle_content" id="">
    <form class="eduExpForm" id="addOtherInfoForm">
       <div class="myr_info_list">
      
       <input type="hidden" id="otherinfoid" name="otherinfoid" value="<?php echo ($otherinfo_list[0]["id"]); ?>" /> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>自我评价</label></th>
               <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="selfIntro"><?php echo ($otherinfo_list[0]["selfIntro"]); ?></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="自我评价"></span> 
                </td>
            </tr>
           <tr>
              <th class="pt10"><label>爱好特长</label></th>
                 <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="skill"><?php echo ($otherinfo_list[0]["skill"]); ?></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="爱好特长"></span> 
                </td>
            </tr>
            <tr>
              <th class="pt10"><label>其他技能</label></th>
                <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="hobbies"><?php echo ($otherinfo_list[0]["hobbies"]); ?></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="其他技能"></span> 
                </td>
              
            </tr>      
             <tr>
              <th class="pt10"><label>个人成就</label></th>
              <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="achievement"><?php echo ($otherinfo_list[0]["achievement"]); ?></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="个人成就"></span> 
                </td>
            </tr>
             <tr>
              <th class="pt10"><label>个人简介</label></th>
                 <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="profile"><?php echo ($otherinfo_list[0]["profile"]); ?></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="个人简介"></span> 
                </td>
            </tr>
          </table>
        </div>
    <br/><br/>
     
        <div class="mr_ope clearfixs">
          <input type="submit" class="btn-resumeac mr_save" value="保存" />
          <!-- <a href="javascript:;" class="btn-resumeac mr_cancel">取消</a --></div>
      </div>
    </form>
     <!--  <div class="mr_head_l">
    <div class="mr_head_r"> <i></i><em>添加</em> </div>
  </div>       -->  
</div>
</div>
<br/><br/>
          </section>
          <a href="javascript:" class="prev" id="prev1" style="display: none">
           <!--    <img src="http://demo.litextension.com/le_demo/skin/frontend/default/default/le_itemslider/images/icon-prev.png"> -->
          </a>

          <a href="javascript:" class="next" id="next1" style="display: none">
             <!--  <img src="http://demo.litextension.com/le_demo/skin/frontend/default/default/le_itemslider/images/icon-next.png"> -->
          </a>
        </div><!-- /content -->
      </div><!-- /tabs -->
    </section>
        <div class="clear"></div>
      </div>     
    </div>

   <link rel="stylesheet" type="text/css" href="/Public/Home/css/schoolselect.css">
  <!--教育经历修改框  -->
   <div  class="list_show">
    <div id="edu_update_hide" class="dn">
      <form class="eduExpForm" id="eduExpForm">
        <input type="hidden" id="eduId" name="eduId" value="" />
        <div class="mr_add_work">
         <div class="myr_info_list">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
                <tr>
                    <th class="pt10"><label>学校</label></th>
                    <td>
                     <!--  <div class="myr_input_div_l">
                          <input type="text" name="schoolName" class="ed_name valid form-control">
                      </div> -->
                    <div class="myr_input_div_l">
                      <input type="text" id="schoolName"  name="schoolName"  placeholder="请点击选择学校" class="form-control"  readonly />
                      <div id="proSchool" class="provinceSchool">
                          <div class="title"><span>请选择学校</span></div>
                          <div class="proSelect">
                              <select></select>
                              <span>如没找到选择项，请选择其他手动填写</span>
                              <input type="text" />
                          </div>
                          <div class="schoolList">
                              <ul></ul>
                          </div>
                          <div class="button">
                            <a href="javascript:selectschool();">确定</a>
                            <a href="javascript:closeschool();">取消</a>
                          </div>
                      </div> 
                    </div> 
                    </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>学校所在城市</label></th>
                    <td>
                      <!-- <div class="myr_input_div_l">
                          <input type="text" name="school_city" class="ed_name valid form-control" >
                      </div> -->
                <!--     <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="button" class="mr_button" name="school_city" onchange="setschoolcity(this)"/>
                      <div class="xl_list dn">
                        <ul class="ul_edubg" id="school_city">  
                        </ul>
                      </div>
                    </div>
                    </div>
                     <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="button" class="mr_button" name="school_city_city" />
                      <div class="xl_list dn">
                        <ul class="ul_edubg" id="school_city_city">  
                        </ul>
                      </div>
                    </div>
                    </div> -->
                      <div class="form-item">
                    
                      <div class="controls select_wrap">
                        <select name="school_city"  id="school_city" onchange="setschoolcity(this)">
                          <option value="0">--选择省--</option>
                        
                        </select>
                        &nbsp;&nbsp;
                        <select name="school_city_city"   id="school_city_city">
                          <option value="0">--选择市--</option>
                         
                        </select>
                      </div>
                  </div>
                    </td>
                </tr>
                <tr>
                  <th class="pt10"><label>学历</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="degree_text" />
                      <input type="button" class="mr_button"  name="degree_val"/>
                      <div class="xl_list dn">
                        <ul class="ul_edubg">
                         <li>博士研究生</li>
                          <li>EMBA</li>
                          <li>MBA</li>
                          <li>MPA</li>
                          <li>硕士研究生</li>
                          <li>双学士</li>
                          <li>大学本科-一本</li>
                          <li>大学本科-二本</li>
                          <li>大学本科-三本</li>
                          <li>大学专科</li>
                          <li>中专</li>
                          <li>技校/职高</li>
                          <li>高中</li>
                          <li>初中及以下</li>
                          <li>其他</li>
                          <li>无</li>
                        </ul>
                      </div>
                    </div>
                    </div>
                    </td>
                </tr>
                 <tr>
                  <th class="pt10"><label>学位</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="degree_t" />
                      <input type="button" class="mr_button"  name="degree" id="degree" />
                      <div class="xl_list dn">
                        <ul class="ul_degree">
                           <li>博士</li>
                          <li>MPA</li>
                          <li>EMBA</li>
                          <li>MBA</li>
                          <li>硕士</li>
                          <li>双学士</li>
                          <li>学士</li>
                          <li>其他</li>
                          <li>无</li>
                        </ul>
                      </div>
                    </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <th class="pt10"><label>院系</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="academy" class="form-control">
                      </div>
                    </td>
                </tr>
                 <tr>
                    <th class="pt10"><label>专业</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="positionName" class="form-control" >
                      </div>
                    </td>
                </tr>
                <tr>
                  <th class="pt10"><label>入学时间</label></th>
                    <td >   
                      <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="startYear"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>      
                    <!-- <div class="form_wrap normal_s" style="*z-index:4;">
                      <div class="mr_timed_div normal_s fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="startYear_text" />
                      <input type="button" class="mr_button"  class="mr_btn" onchange="validateChange(this);" name="startYear"/>
                      <div class="xl_list dn">
                        <ul class="ul_eduy">
                          <?php $year = getYear(1990,2017,1); ?>
                          <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                      </div>
                    </div>
                    </div> -->
                    </td>
                </tr>
                <tr>
                  <th class="pt10"><label>毕业时间</label></th>
                    <td>    
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="graduate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>        
                  <!--   <div class="form_wrap normal_s" style="*z-index:4;">
                      <div class="mr_timed_div normal_s fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="graduate_text" />
                      <input type="button" class="mr_button" onchange="validateChange(this);" name="graduate"/>
                      <div class="xl_list dn">
                        <ul class="ul_eduy">
                          <?php $year = getYear(1990,2017,1); ?>
                          <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                      </div>
                    </div>
                    </div> -->
                    </td>
                </tr>
                <tr>
                    <th class="pt10"><label>主修课程</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="major" class="form-control">
                      </div>
                    </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>GPA(4分制)</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="gpa_score" class="form-control">
                          <span class="tipright icon-resume icon-business_bulb" title="GPA(4分制)"></span>
                      </div>

                    </td>

                </tr>
                <tr>
                  <th class="pt10"><label>所在专业排名</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="professional_ranking_text" />
                      <input type="button" class="mr_button" name="professional_ranking" id="proferank" />
                      <div class="xl_list dn">
                        <ul class="ul_proferank">
                          <li>前5%<li>前10%</li><li>前20%</li><li>前30%</li><li>前40%</li><li>前50%</li><li>前60%</li><li>前70%</li><li>前80%</li><li>其他</li>
                        </ul>
                      </div>
                    </div>
                    </div>
                    </td>
                </tr>
                 <tr>
                  <th class="pt10"><label>班级排名</label></th>
                    <td >
                    <div class="form_wrap normal_s" style="*z-index:4;">
                    <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="hidden" name="class_ranking_text" />
                      <input type="button" class="mr_button" name="class_ranking" id="classrank" />
                      <div class="xl_list dn">
                        <ul class="ul_classrank">
                          <li>前5%<li>前10%</li><li>前20%</li><li>前30%</li><li>前40%</li><li>前50%</li><li>前60%</li><li>前70%</li><li>前80%</li><li>其他</li>
                        </ul>
                      </div>
                    </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <th class="pt10"><label>专业描述</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="professional_describe" class="form-control" >
                          <span class="tipright icon-resume icon-business_bulb" title="专业描述专业 描述专业描述专业描述专业描述"></span>
                      </div>
                    </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>导师姓名</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="tutor_name" class="form-control" >
                      </div>
                    </td>
                </tr>
                <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>导师联系方式</label></th>
                    <td>
                      <div class="myr_input_div_l mr_click_flag">
                          <input type="text" name="tutor_phone" class="form-control">
                      </div>
                    </td>
                </tr>
            </table>
        </div>
          <!-- <label>学校名称</label>
          <div class="mr_input_div mr_click_flag">
            <input class="mr_btn" type="text" name="schoolName" />
          </div>
          <label>所学专业</label>
          <div class="mr_input_div mr_click_flag">
            <input class="mr_btn" type="text" name="positionName"/>
          </div>
          <label><span>学历</span><span class="label_by_y">毕业年份</span></label>
          <div class="clearfixs mr_time_area">
            <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
              <input type="hidden" name="degree_text" />
              <input type="button" class="mr_btn" name="degree_val"/>
              <div class="xl_list dn">
                <ul class="ul_edubg">
                  <li>大专</li>
                  <li>本科</li>
                  <li>硕士</li>
                  <li>博士</li>
                  <li>其他</li>
                </ul>
              </div>
            </div> 
            <div class="mr_timed_div normal_s fl"> <i class="mr_sj"></i>
              <input type="hidden" name="graduate_text" />
              <input type="button" class="mr_btn" onchange="validateChange(this);" name="graduate"/>
              <div class="xl_list dn">
                <ul class="ul_eduy">
                  <?php $year = getYear(1990,2017,1); ?>
                  <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
              </div>
            </div> 
          </div>-->
          <div class="mr_ope clearfixs">
            <input type="submit" class="mr_save btn-resumeac" value="保存" />
            <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> 
             <div class="mr_delete" style="margin:30px 0">
              <span class="btn-resumeac mr_del_ok">删除本条</span>
              <!-- <div class="mr_delete_pop dn" style="margin:50px 0 30px 0">
                  <span >确定删除本条信息？</span>
                <div>  
                  <span data-id="" class="btn-resumeac mr_del_ok">删除</span> 
                  <span class="mr_del_cancel btn-resumeac">取消</span> 
                </div>
              </div> -->
             
              </div>
          </div>
        </div>
      </form>
    </div>
</div> 

<script type="text/javascript" src="/Public/Home/js/school.js"></script>


      
    <div id="job_update_hide" class="dn">
      <form class="jobExpForm" id="">
        <input id="mr_expid" type="hidden" value="" />
        <div class="mr_add_work myr_info_list"> 
        <!-- <?php var_dump($exp_list)?> -->
     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
        <tr>
              <th class="pt10"><label>工作性质</label></th>
              <td>
                  <div class="myr_radio">
                      <label class="radio">
                  <input type="radio" name="workCat" id="workCat1" value="全职" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                  全职
               </label>
               &nbsp;&nbsp;
               <label class="radio">
                  <input type="radio" name="workCat" id="workCat2" value="实习(全职)" data-toggle="radio"  class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                  实习(全职)
                </label>
                 <label class="radio">
                  <input type="radio" name="workCat" id="workCat3" value="实习(兼职)" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>实习(兼职)
                </label>
                 <label class="radio">
                  <input type="radio" name="workCat" id="workCat4" value="兼职" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>兼职
                </label>
                <input id="work_cat" name="work_cat" type="hidden" value="<?php echo ($info["work_cat"]); ?>">
                  </div>
              </td>
          </tr>
          <tr>
              <th class="pt10"><label>工作单位</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="companyName" class="form-control">
                  </div>
              </td>
          </tr>
          <tr>
            <th class="pt10"><label>单位性质</label></th>
              <td >
              <div class="form_wrap normal_s" style="*z-index:4;">
              <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="company_property_text" />
                <input type="button" class="mr_button" name="company_property" id="company_property" />
                <div class="xl_list dn">
                  <ul class="ul_dwxz">
                      <li>外资-欧美</li>
                      <li>外资-非欧美</li>
                      <li>合资-欧美</li>
                      <li>合资-非欧美</li>
                      <li>国企</li>
                      <li>民营公司</li>
                      <li>外企代表处</li>
                      <li>政府机关</li>
                      <li>事业单位</li>
                      <li>非盈利机构</li>
                      <li>上市公司</li>
                      <li>创业公司</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
          </tr>
          <tr>
            <th class="pt10"><label>公司规模</label></th>
              <td >
              <div class="form_wrap normal_s" style="*z-index:4;">
              <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="company_size_text" />
                <input type="button" class="mr_button" name="company_size" id="company_size" />
                <div class="xl_list dn">
                  <ul class="ul_gsgm">
                      <li>少于50人</li>
                      <li>50-149人</li>
                      <li>150-499人</li>
                      <li>500-999人</li>
                      <li>1000-9999人</li>
                      <li>10000人以上</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
          </tr>
          <tr>
            <th class="pt10"><label>行业类别</label></th>
              <td >
              <div class="form_wrap normal_s" style="*z-index:4;">
              <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="company_cat_text" />
                <input type="button" class="mr_button" name="company_cat" id="company_cat" />
                <div class="xl_list dn">
                  <ul class="ul_hylb">
                      <li>少于50人</li>
                      <li>50-149人</li>
                      <li>150-499人</li>
                      <li>500-999人</li>
                      <li>1000-9999人</li>
                      <li>10000人以上</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
          </tr>
           <tr>
              <th class="pt10"><label>工作职位</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="positionName" class="form-control">
                  </div>
              </td>
          </tr>
           <tr>
              <th class="pt10"><label>所在部门</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="department" class="form-control">
                  </div>
              </td>
          </tr>
           <tr>
              <th class="pt10"><label>工作城市</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="work_city" class="form-control">
                  </div>
              </td>
          </tr>
          <tr>
              <th class="pt10"><label>职责描述</label></th>
              <td class="tb_textarea">
                <textarea class="resumetextarea form-control" id="workContent" name="workContent"></textarea>   
                <span class="tiprighttext icon-resume icon-business_bulb" title="GPA(4分制)"></span> 
                </td>
          </tr>
           <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>职位月薪(税前)</label></th>
              <td>
                  <div class="form_wrap normal_s" style="*z-index:4;">
                  <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                    <input type="hidden" name="salary_month_text" />
                    <input type="button" class="mr_button" name="salary_month" id="salary_month" />
                    <div class="xl_list dn">
                      <ul class="ul_yuexin">
                        <li>1000以下</li>
                        <li>1000-1499</li>
                        <li>1500-1999</li>
                        <li>2000-2999</li>
                        <li>3000-4499</li>
                        <li>4500-5999</li>
                        <li>6000-7999</li>
                        <li>8000-9999</li>
                        <li>10000-11999</li>
                        <li>12000-14999</li>
                        <li>15000-24999</li>
                        <li>25000以上</li>
                      </ul>
                    </div>
                  </div>
                  </div>
              </td>
          </tr>
          <tr>
              <th class="pt10"><label>在职时间</label></th>
              <td>
                  <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="startTime"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
              </td>
          </tr>
           <tr>
              <th class="pt10"><label>离职时间</label></th>
              <td>
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="endTime"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
              </td>
          </tr>
          
      <tr>
              <th class="pt10"><label>工作内容</label></th>
              <td class="tb_textarea">
                <textarea class="resumetextarea form-control" id="jobContent" name="jobContent"></textarea>
        </td>
          </tr>
            <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>离职原因</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reasons" class="form-control">
                  </div>
              </td>
          </tr>
            <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人姓名</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_name" class="form-control">
                  </div>
              </td>
          </tr>
         <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人关系</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_relation" class="form-control">
                  </div>
              </td>
          </tr>
            <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人单位</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_company" class="form-control">
                  </div>
              </td>
          </tr>
            <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人职位</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_position" class="form-control">
                  </div>
              </td>
          </tr>
           <tr class="lowUse">
              <th class="pt10"><span class="lowFreqency">低频</span><label>证明人联系方式</label></th>
              <td>
                  <div class="myr_input_div_l">
                      <input type="text" name="reterence_phone" class="form-control">
                  </div>
              </td>
          </tr>
        </table>
          <div class="mr_ope clearfixs btn-group">

            <input class="mr_save btn-resumeac" type="submit" value="保存" />
            <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a>
            <br/>
           <div class="mr_delete">
            <!-- <div class="mr_delete_pop dn">
              <p>确定删除本条信息？</p>
              <div> <span data-id="" class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
            </div> -->
            <span class="mr_del_ok btn-resumeac">删除本条</span> 
            </div>
          </div>

        </div>
      </form>
    </div>
    
  <!-- 项目经验 -->
<div  class="list_show">
    <div id="pro_update_hide" class="dn">
      <form class="proExpForm" id="">
        <!--upProForm js赋值  -->
         <input type="hidden" id="projectid" name="projectid" value="" />
        <div class="mr_add_work ">
        <div class="myr_info_list">
		 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr><th class="pt10"><label>项目名称</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="projectName" name="projectName" class="form-control">
                    </div>
                </td>
            </tr>
              <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>项目人数</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="projectNumber" name="projectNumber" class="form-control">
                    </div>
                </td>
            </tr>
           
            <tr><th class="pt10"><label>项目描述</label></th>
                <td class="tb_textarea"> 
                   <textarea class="resumetextarea form-control" name="proDescript" style="width:520px;height:148px;"></textarea>
                </td>
            </tr>
             <tr><th class="pt10"><label>项目职位</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="thePost" name="thePost" class="form-control">
                    </div>
                </td>
            </tr>
            <tr><th class="pt10"><label>职责描述</label></th>
                <td class="tb_textarea"> 
                  <textarea class="resumetextarea form-control" name="projectDuty" style="width:520px;height:148px;"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="职责描述"></span> 
                </td>
            </tr>
            <tr style="display:none"><th class="pt10"><label>项目链接（若有）</label></th>
               <td><div class="myr_input_div_l">
                      <input type="hidden" id="pro_link" name="pro_link" class="form-control">
                    </div>
                </td>
            </tr>
             <tr><th class="pt10"><label>项目开始时间</label></th>
               <td>
                <div class="form-item ">
                  <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                  <div class="form_wrap  normal_s controls">
                      <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="startTime"  data-date-format="yyyy-mm-dd">
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-calendar"></i></span>
                      <i class="mr_sj"></i>
                      </div>
                  </div> 
              </div>
               </td>
            </tr>
               <tr><th class="pt10"><label>项目结束时间</label></th>
               <td>
              <div class="form-item ">
                  <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                  <div class="form_wrap  normal_s controls">
                      <input type="button" class="mr_button" readonly class="text input date" placeholder="选择时间" name="endTime"  data-date-format="yyyy-mm-dd">
                      <span class="add-on"><i class="icon-remove"></i></span>
                      <span class="add-on"><i class="icon-calendar"></i></span>
                      <i class="mr_sj"></i>
                      </div>
                  </div> 
              </div>
             
                </td>
            </tr>
              <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>证明人姓名</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="reterenceName" name="reterenceName" class="form-control">
                    </div>
                </td>
            </tr>
              <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>证明人联系方式</label></th>
                <td><div class="myr_input_div_l">
                      <input type="text" id="reterencePhone" name="reterencePhone" class="form-control">
                    </div>
                </td>
            </tr>
          </table>
          
        
          <div class="mr_ope clearfixs">
            <div class="mr_delete">
              <div class="mr_delete_pop dn">
                 <span >确定删除本条信息？</span>
                <div> <span data-id="" class="mr_del_ok btn-resumeac">删除</span> <span class="mr_del_cancel btn-resumeac">取消</span> </div>
              </div>
              <span class="btn-resumeac">删除本条</span> </div>
            <input type="submit" class="mr_save btn-resumeac" value="保存" />
            <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> 
          </div>
        </div>
        </div>
      </form>
    </div>
    </div>
      <!--教育经历修改框  -->
   <div  class="list_show">
    <div id="schoolpra_update" class="dn">
      <form class="upSchProForm" id="">
        <input type="hidden" id="schoolpracticeId" name="schoolpracticeid" value="" />
        <div class="mr_add_work">
         <div class="myr_info_list">
           <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
                <tr><th class="pt10"><label>实践单位</label></th>
                    <td><div class="myr_input_div_l">
                        <input type="text" id="praCompanyName" name="praCompanyName" class="form-control">
                      </div>
                  </td>
                </tr>
                 <tr><th class="pt10"><label>实践经历描述</label></th>
                  <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="practiceDes"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="实践经历描述"></span> 
                </td>
                 
                </tr>
                 <tr><th class="pt10"><label>实践职位</label></th>
                    <td><div class="myr_input_div_l">
                        <input type="text" id="practicePosition" name="practicePosition" class="form-control">
                      </div>
                  </td>
                </tr>
                 <tr><th class="pt10"><label>职责描述</label></th>
                 
                  <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="practiceDuty"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="职责描述"></span> 
                </td>
                </tr>
                 <tr><th class="pt10"><label>项目开始时间</label></th>
                   <td>
                     <div class="form-item ">
                      <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                      <div class="form_wrap  normal_s controls">
                          <input type="text" class="mr_button" readonly class="text input date" placeholder="选择时间" name="startTime"  data-date-format="yyyy-mm-dd">
                          <span class="add-on"><i class="icon-remove"></i></span>
                          <span class="add-on"><i class="icon-calendar"></i></span>
                          <i class="mr_sj"></i>
                          </div>
                      </div> 
                  </div>
                   </td>
                </tr>
                   <tr><th class="pt10"><label>项目结束时间</label></th>
                   <td>
                  <div class="form-item ">
                      <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                      <div class="form_wrap  normal_s controls">
                          <input type="text" class="mr_button" readonly class="text input date" placeholder="选择时间" name="endTime"  data-date-format="yyyy-mm-dd">
                          <span class="add-on"><i class="icon-remove"></i></span>
                          <span class="add-on"><i class="icon-calendar"></i></span>
                          <i class="mr_sj"></i>
                          </div>
                      </div> 
                  </div>
          <!--          <div class="clearfixs mr_time_area">
                    <div class="mr_timed_div mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="button" class="mr_btn"/>
                      <input type="hidden"  name="startTime"/>
                      <div class="mr_calendar_ym clearfixs dn">
                        <ul class="mr_year">
                          <?php $year = getYear(1990,0,1); ?>
                          <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <ul class="mr_month clearfixs">
                          <li><span>1月</span></li>
                          <li><span>2月</span></li>
                          <li class="mr0"><span>3月</span></li>
                          <li><span>4月</span></li>
                          <li><span>5月</span></li>
                          <li class="mr0"><span>6月</span></li>
                          <li><span>7月</span></li>
                          <li><span>8月</span></li>
                          <li class="mr0"><span>9月</span></li>
                          <li class="mb0"><span>10月</span></li>
                          <li class="mb0"><span>11月</span></li>
                          <li class="mr0 mb0"><span>12月</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="mr_timed_div fl"> <i class="mr_sj"></i>
                      <input type="button" class="mr_btn"/>
                      <input type="hidden" name="endTime"/>
                      <div class="mr_calendar_ym clearfixs dn">
                        <ul class="mr_year">
                          <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <ul class="mr_month clearfixs">
                          <li><span>1月</span></li>
                          <li><span>2月</span></li>
                          <li class="mr0"><span>3月</span></li>
                          <li><span>4月</span></li>
                          <li><span>5月</span></li>
                          <li class="mr0"><span>6月</span></li>
                          <li><span>7月</span></li>
                          <li><span>8月</span></li>
                          <li class="mr0"><span>9月</span></li>
                          <li class="mb0"><span>10月</span></li>
                          <li class="mb0"><span>11月</span></li>
                          <li class="mr0 mb0"><span>12月</span></li>
                        </ul>
                      </div>
                    </div>
                  </div> -->
                  </td>
                </tr>
                
              </table>
        </div>
         
            <div class="mr_ope clearfixs">
           
              <input type="submit" class="mr_save btn-resumeac" value="保存" />
              <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a>
               <div class="mr_delete">
            <!--   <div class="mr_delete_pop dn">
                <p>确定删除本条信息？</p>
                <div> <span data-id="" class="mr_del_ok ">删除</span> <span class="mr_del_cancel">取消</span> </div>
              </div> -->
              <span  data-id="" class="mr_del_ok btn-resumeac">删除本条</span> </div> 
            </div>
        </div>
      </form>
    </div>
</div>  
      <!--教育经历修改框  -->
   <div  class="list_show">
    <div id="schclub_update_hide" class="dn">
      <form class="eduExpForm" id="upSchClubForm">
        <input type="hidden" id="schoolclubid" name="schoolclubid" value="" />
        <div class="mr_add_work">
         <div class="myr_info_list">
         <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>社团名称</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="schClubName" class="form-control">
                </div>
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>社团等级</label></th>
              <td>
                <div class="form_wrap normal_s" style="*z-index:4;">
                <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="schclublevel_text" />
                <input type="button" class="mr_button" name="schClubLevel" id="schClubLevel" />
                <div class="xl_list dn">
                  <ul class="ul_schclublevel">
                    <li>团委</li>
                    <li>校学生会</li>
                    <li>学生社团</li>
                    <li>班级</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
            </tr>
            <tr>
              <th class="pt10"><label>担任职务</label></th>
              <td>
                <div class="form_wrap normal_s" style="*z-index:4;">
                <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="positionname_text" />
                <input type="button" class="mr_button" name="positionName" id="positionName" />
                <div class="xl_list dn">
                  <ul class="ul_positionname">
                    <li>学生会主席</li>
                    <li>学生会副主席</li>
                    <li>学生会部长</li>
                    <li>学生会干事</li>
                    <li>班干部</li>
                    <li>班长团支书</li>
                    <li>社团主席</li>
                    <li>社团副主席</li>
                    <li>社团干事</li>
                    <li>其他职务</li>
                    <li>未担任</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
            </tr>
           <tr>
          <th class="pt10"><label>工作职责</label></th>
                  <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="workDes"></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="工作职责"></span> 
                </td>
            </tr>
             <tr>
              <th class="pt10"><label>开始时间</label></th>
              <td>
                <div class="myr_input_div_l">
                  
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="startDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
              </td>
            </tr>
             <tr>
              <th class="pt10"><label>结束时间</label></th>
              <td>
                <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="endDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
              </td>
            </tr>
           
          </table>
        </div>
          <div class="mr_ope clearfixs">
            
            <input type="submit" class="mr_save btn-resumeac" value="保存" />
            <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> </div>
            <br/>
            <div class="mr_delete">
              <!-- <div class="mr_delete_pop dn">
                <p>确定删除本条信息？</p>
                <div> <span >删除</span> <span class="mr_del_cancel">取消</span> </div>
              </div> -->
              <span data-id="" class="mr_del_ok btn-resumeac">删除本条</span> </div>
        </div>
      </form>
    </div>
</div>  
      <!--教育经历修改框  -->
   <div  class="list_show">
    <div id="schawards_update_hide" class="dn">
      <form class="eduExpForm" id="upSchAwForm">
        <input type="hidden" id="schoolawardsid" name="schoolawardsid" value="" />
        <div class="mr_add_work">
         <div class="myr_info_list">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>获奖名称</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="awardsName" class="form-control">
                </div>
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>获奖类型</label></th>
              <td>
                <div class="form_wrap normal_s" style="*z-index:4;">
                <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="awardsType_text" />
                <input type="button" class="mr_button" name="awardsType" id="awardsType" />
                <div class="xl_list dn">
                  <ul class="ul_awardsType">
                      <li>国际级</li>
                       <li>国家级</li>
                       <li>省市级</li>
                       <li>学校级</li>
                       <li>院系级</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
            </tr>
            <tr>
              <th class="pt10"><label>担任职务</label></th>
              <td>
                <div class="form_wrap normal_s" style="*z-index:4;">
                <div class="mr_timed_div normal_s mr_sta_time fl"> <i class="mr_sj"></i>
                <input type="hidden" name="awardsLevel_text" />
                <input type="button" class="mr_button" name="awardsLevel" id="awardsLevel" />
                <div class="xl_list dn">
                  <ul class="ul_awardsLevel">
                    <li>特等奖</li>
                    <li>一等奖</li>
                    <li>二等奖</li>
                    <li>三等奖</li>
                    <li>其它</li>
                  </ul>
                </div>
              </div>
              </div>
              </td>
            </tr>
             <tr>
              <th class="pt10"><label>获奖时间</label></th>
              <td>
                <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="awardsDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
               
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>获奖描述</label></th>
                <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="awardsDes" style="width:520px;height:148px;"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="获奖描述"></span> 
                </td>
            </tr>
          </table>
        </div>
          <div class="mr_ope clearfixs">
           
            <input type="submit" class="mr_save btn-resumeac" value="保存" />
            <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> 
             <div class="mr_delete">
              <!-- <div class="mr_delete_pop dn">
                <p>确定删除本条信息？</p>
                <div> <span data-id="" class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
              </div> -->
              <span data-id="" class="mr_del_ok btn-resumeac">删除本条</span> </div>
          </div>
        </div>
      </form>
    </div>
</div>  
      <!--教育经历修改框  -->
   <div  class="list_show">
    <div id="certi_update_hide" class="dn">
      <form class="eduExpForm" id="upCertiForm">
        <input type="hidden" id="certificateId" name="certificateId" value="" />
        <div class="mr_add_work">
         <div class="myr_info_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>证书名称</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="certificateName" class="form-control">
                     <span class="tipright icon-resume icon-business_bulb" title="证书名称"></span> 
                </div>
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>获得时间</label></th>
              <td> 
                <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="getDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
                
              
              </td>
            </tr>
            <tr>
              <th class="pt10"><label>证书描述</label></th>
              <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="certificateDes" style="width:520px;height:148px;"></textarea>
                   <span class="tiprighttext icon-resume icon-business_bulb" title="证书描述"></span> 
                </td>
            </tr>
           
             <tr>
              <th class="pt10"><label>颁发机构</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="issuing" class="form-control">
                </div>
              </td>
            </tr>
           
          </table>
        </div>
          <div class="mr_ope clearfixs">
          
            <input type="submit" class="mr_save btn-resumeac" value="保存" />
            <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> </div>
            <br/>
              <div class="mr_delete">
              <!-- <div class="mr_delete_pop dn">
                <p>确定删除本条信息？</p>
                <div> <span data-id="" class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
              </div> -->
              <span data-id="" class="mr_del_ok btn-resumeac">删除本条</span> </div>
              <br/><br/>
        </div>
      </form>
    </div>
</div>  
      <!--教育经历修改框  -->
   <div  class="list_show">
    <div id="training_update_hide" class="dn">
      <form class="eduExpForm" id="trainingForm">
        <input type="hidden" id="trainingid" name="trainingid" value="" />
        <div class="mr_add_work">
         <div class="myr_info_list">
           <table width="100%" border="0" cellspacing="0" cellpadding="0" class="baseinfo">
            <tr>
              <th class="pt10"><label>培训名称</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="trainingName" class="form-control">
                </div>
              </td>
            </tr>
           <tr>
              <th class="pt10"><label>培训内容</label></th>
                <td class="tb_textarea">
                  <textarea class="resumetextarea form-control" name="trainingDes" style="width:520px;height:148px;"></textarea>
                  <span class="tiprighttext icon-resume icon-business_bulb" title="培训内容"></span> 
                </td>
            </tr>
            <tr>
              <th class="pt10"><label>培训机构</label></th>
              <td>
                <div class="myr_input_div_l">
                 
                    <input type="text" name="trainingCompany" class="form-control">
                </div>
              </td>
            </tr>
           
              <tr class="lowUse">
                    <th class="pt10"><span class="lowFreqency">低频</span><label>培训地点</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="trainingPlace" class="form-control">
                </div>
              </td>
            </tr>

             <tr>
              <th class="pt10"><label>开始时间</label></th>
              <td>
              <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="startDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
               
              </td>
            </tr>
             <tr>
              <th class="pt10"><label>结束时间</label></th>
              <td>
                 <div class="myr_input_div_l">
                    <div class="form-item ">
                          <div class="controls input-append date form_oldatetime" data-date="<?php echo ($info["start_time"]); ?>">
                          <div class="form_wrap  normal_s controls">
                              <input type="button" class="mr_button"  readonly class="text input date" placeholder="选择时间" name="endDate"  data-date-format="yyyy-mm-dd">
                              <span class="add-on"><i class="icon-remove"></i></span>
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              <i class="mr_sj"></i>
                              </div>
                          </div> 
                      </div>
                </div>
              </td>
            </tr>

            <tr>
              <th class="pt10"><label>获得证书</label></th>
              <td>
                <div class="myr_input_div_l">
                    <input type="text" name="certificateName" class="form-control">
                </div>
              </td>
            </tr>           
          </table>
        </div>
          <div class="mr_ope clearfixs">
            <input type="submit" class="mr_save btn-resumeac" value="保存" />
            <a href="javascript:;" class="mr_cancel btn-resumeac">取消</a> </div>
            <br/>
             <div class="mr_delete">
              <!-- <div class="mr_delete_pop dn">
                <p>确定删除本条信息？</p>
                <div> <span data-id="" class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
              </div> -->
              <span  data-id="" class="mr_del_ok btn-resumeac">删除本条</span> </div>
        </div>
      </form>
    </div>
</div>   
 
  <script src="/Public/Home/js/cbpFWTabs.js"></script>

  <script>
      $(document).ready(function() {

      $("input[name=resume-checked]").click(function(){
        checkChange();
       });

      $('.tipright').jBox('Tooltip', {
        position: {
          x: 'right',
          y: 'center'
        },
        width:150,
        outside: 'x' // Horizontal Tooltips need to change their outside position
      });
      $('.tiprighttext').jBox('Tooltip', {
        position: {
          x: 'right',
          y: 'center'
        },
        width:150,
        outside: 'x' // Horizontal Tooltips need to change their outside position
      });

        $(".form_oldatetime").datetimepicker({
            format: "yyyy-mm-dd",
            language: 'zh-CN',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0

        });

      //alert(window.location.pathname);
      var realhash = window.location.hash;
      //alert(realhash);
      if (realhash == "#section-underline-2") {
        $("#section-edu").click();
      }else if (realhash == "#section-underline-3") {
         $("#section-work").click();
      }else if (realhash == "#section-underline-4") {
         $("#section-pro").click();
      }else if (realhash == "#section-underline-5") {
         $("#section-certi").click();
      }else if (realhash == "#section-underline-6") {
         $("#section-schpra").click();
      }else if (realhash == "#section-underline-7") {
         $("#section-schclub").click();
      }else if (realhash == "#section-underline-8") {
         $("#section-schaw").click();
      }else if (realhash == "#section-underline-9") {
         $("#section-").click();
      }else if (realhash == "#section-underline-10") {
         $("#section-train").click();
      }else if (realhash == "#section-underline-11") {
         $("#section-otherinfo").click();
      }else{
      }
   }); 
    (function() {
      [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
        new CBPFWTabs( el );
      });
    })();

    var $t=new CBPFWTabs(document.getElementById( 'tab1' ) )
    document.getElementById('prev1').onclick=function(){
        var current=$t.current;
        var count=$t.items.length;
        current--;
        if(current<0) current=count-1;
        $t._show(current);
    };

    document.getElementById('next1').onclick=function(){
        var current=$t.current;
        var count=$t.items.length;
        current++;
        if(current>=count) current=0;
        $t._show(current);
    };

    function tonext(){
       document.getElementById('next1').click();
    }
  </script>

    <!------------------------------------- end -----------------------------------------> 
    
    
    
    <script type="text/javascript" src="/Public/Home/js/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script> 
    <script>
  // 设置全局变量
  window.globals =  {
    resumeId: '<?php echo ($info["uid"]); ?>',
    initRatio: '<?php echo ($info["resume_score"]); ?>',
    token: '3ad1ea0ea3794947ade65710418b25bd',
    refreshTime: '<?php echo ($info["update_time"]); ?>',
    skillScore: '<?php echo ($info["score_jineng"]); ?>',
    projectExperienceScore: '<?php echo ($info["score_xiangmu"]); ?>',
    workShowScore: '<?php echo ($info["score_zuopin"]); ?>',
    //expectJobsScore: '<?php echo ($info["score_qiwang"]); ?>',
    myRemarkScore: '<?php echo ($info["score_ziwo"]); ?>',
    hasProjectExperiences: true,
    hasWorkShows: false,
    hasSelf: true,
    //hasExpectJobs: true,
    hasSkillEvaluates: true,
    hasUserDefines: true,
    personIdFlag:'',
    qrImgSrc:'/Public/qr/qrcode.jpg?qrSource=myResume',
    isOpenResume:'<?php echo ($info["isOpenMyResume"]); ?>',
    isFirstOpen:false
  };
  </script> 
    <script type="text/javascript" src="/Public/Home/js/common.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/json.min.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/jquery-migrate-1.1.1.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/jquery-ui-1.8.custom.min.js"></script> 
    
    <script type="text/javascript" src="/Public/Home/js/jquery.cropzoom.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/components.js?v=1.5.6_2015051318"></script> 
    <script type="text/javascript" src="/Public/Home/js/testresume.js"></script> 
    <!------------------------------------- end ----------------------------------------->
    
    
    
    <div class="clear"></div>
    <script>
    // 关闭
    //3s tips消失
    var global = {}
    global.email = "<?php echo ($info["email"]); ?>";
    global.usertoken = $.cookie('user_trace_token');
  </script>
  
  </div>
  <!-- end #container --> 
  
  
</div>
<!-- end #body --> 

<script type="text/javascript" src="/Public/Home/js/core.min.js"></script> 
<script type="text/javascript" src="/Public/Home/js/popup.js"></script> 


<!--copy账号系统的passport.html--> 
<script type="text/javascript">
var userId = "<?php echo ($info["uid"]); ?>";
  /* function noticeInit(){
        var userId = "969363";
        var urls = {
            //调用B端简历管理nav的数字
            queryTipsNums : "http://hr.lagou.com/recruitment/queryTipsNums.json",
            //调用B端简历管理Notice Tip
            queryNotice : "http://hr.lagou.com/notice/queryNotice.json",
            //调用C端用户的notice数字
            getPushNoticeOfC : "http://www.lagou.com/common/getPushNoticeOfC.json",
            //清空C端用户的notice
            clearPushNoticeOfC : "http://www.lagou.com/common/clearPushNoticeOfC.json",
            //清空B端用户的notice
            clearAll : "http://hr.lagou.com/notice/clearAll.json"
        }
        
             
        //调用C端用户的notice数字
        PASSPORT.util.rpc({
            params:{},
            url: urls.getPushNoticeOfC,
            succ:function(data){
                var result = data.content.data;
                if(data.state == "1"){
                    var headerNoticeObj = $('#header .wrapper');
                    var noticeDotObj = $("#noticeDot");
                    var noticePopTip = ['<div id="noticeTip">','<span class="bot"></span>','<span class="top"></span>','<a href="javascript:;" class="closeNT"></a>'];
                    
                    //推送投递反馈数
                    if(result.isShowPushNotice){
                        var counters = result.pushNoticeEntity.statusList;
                        if(counters && counters[0] >= 0 ){
                            noticePopTip.push('<a href="http://www.lagou.com/mycenter/delivery.html?tag=0&r=0"  class="notice_tip" target="_blank"><strong>'+counters[0]+'</strong>条新投递反馈</a>');

                            //下拉菜单中我投递的职位number
                            $('#noticeNo').attr("href","http://www.lagou.com/mycenter/delivery.html?tag=0&r=0")
                            .children("span").html("("+counters[0]+")").show();
                        }
                    }
         
                    noticePopTip.push('</div>');

                    if(result.isShowPushNotice || result.isShowPlusTips){
                        //弹出tip和红点
                        noticeDotObj.removeClass("dn");
                        headerNoticeObj.append(noticePopTip.join(''));
                    }
                    
                    //全部已读
                    $('#noticeTip a.closeNT').click(function(){
                        //与后台交互，消息标识为已读
                        clearNoticeTip(urls.clearPushNoticeOfC); 
                        $('#noticeNo span').html('').hide();
                    });
                }
            },
            fail:function(data){
                console.log('fail:' + data);
            }
        });
          }
    
    //全部清空notice
    
    function clearNoticeTip(url){
        PASSPORT.util.rpc({
            params:{},
            url:url,
            succ:function(data){
                $('#noticeTip').remove();
                $("#noticeDot").addClass("dn");
            },
            fail:function(data){
                 console.log('fail:' + data);
            }
        });
    } */

</script> 

<script type="text/javascript">
function checkChange() {
     //  var checkbox = document.getElementById('info-switch');//
     // // alert(checkbox.checked);//是否被选中
     //  if(checkbox.checked){
     //    $(".lowUse").css("display","");
     //  }else{
     //    $(".lowUse").css("display","none");
     //  }
    var rechecked = $("input[name='resume-checked']:checked").val();
      if(rechecked == "all"){
        $(".lowUse").css("display","table-row");
      }else{
        $(".lowUse").css("display","none");
      }
}

</script>
    <link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

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