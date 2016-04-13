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
 

<script type="text/javascript">
var ctx = "<?php echo (WEB_URL); ?>";
var ctx_new = "<?php echo (WEB_URL); ?>";
var rctx = "<?php echo (WEB_URL); ?>";
var pctx = "<?php echo (WEB_URL); ?>";

/* var frontLogin = "http://www.lagou.com/frontLogin.do";
var frontLogout = "http://www.lagou.com/frontLogout.do";
var frontRegister = "http://www.lagou.com/frontRegister.do"; */
</script>


<link rel="stylesheet" type="text/css" href="/Public/Home/css/myresume.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/tailoring.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/external.min.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/popup.css"/>

<script type="text/javascript" src="/Public/Home/js/timeCountDown.js"></script> 
<script type="text/javascript" src="/Public/Home/js/additional-methods.js"></script> 

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


<div id="body"> 
  
  <!-- 数据展示类接口需要版本号 -->
  <input type="hidden" id="version" value="1.5.6_2015051318">
  
  <div id="container">
    <input type="hidden" id="isShowDefault" value="1" />
    <div class="clearfixs mr_created">
      <div class="mr_myresume_l">
        <div id="mr_mr_head">
          <div class="mr_top_bg" id="baseinfo"> <img id="userpic"  src='<?php if($info["pic"] != '' ): echo ($info["pic"]); else: ?>/Public/Home/images/default_headpic.png<?php endif; ?>'  width="117" height="117" alt="头像" class="mr_headimg"/> <img src="/Public/Home/images/shadow_tx.png" alt="" class="shadow"/>
            <input type="file" class="mr_headfile" id="up_txpic" name="headPic" onchange="myresumeCommon.utils.imageUpload(this,myresumeCommon.requestTargets.photoUpload,uploadPhoto.upSucc,uploadPhoto.upFail);" title="支持jpg、jpeg、gif、png格式，文件小于10M" />
          </div>
          <div class="mr_baseinfo">
            <div class="mr_p_myname mr_w604 clearfixs"> <span class="mr_name" id="txt_realname"><?php echo ($info["realname"]); ?></span> </div>
            <div class="mr_head_l  mr_w604">
                <div class="mr_title"> <span class="mr_title_l" style="width:200px;"></span><span class="mr_title_c"> 基本信息 <em class="colac">（必填）</em></span><span class="mr_title_r"></span> </div>
              </div>
             <div class="h10"></div>
            <div class="mr_p_info mr_infoed mr_w604 clearfixs <?php if(!$info['realname']){echo 'dn';} ?>">
              <div class="info_t"> 
              <span class="base_info"><i></i><em class="s"></em><em class="x"><?php echo ($info["birthday"]); ?>年出生 · <?php if($info["sex"] == 2): ?>女<?php else: ?>男<?php endif; ?> · <?php echo ($info["edu"]); ?> · <?php echo ($info["workyear"]); ?>· <?php echo ($info["englishname"]); ?></em></span> 
              <input name="name" value="<?php echo ($info["workyear"]); ?>" />
              </div>
              <div class="info_b"> <span class="dizhi"><i></i><em data-id="0" title="<?php echo ($info["city"]); ?>"><?php echo ($info["city"]); ?></em></span> <span class="mobile"><i></i><em title="<?php echo ($info["phone"]); ?>"><?php echo ($info["phone"]); ?></em></span> <span class="email"><i></i><em title="<?php echo ($info["email"]); ?>"><?php echo ($info["email"]); ?></em></span> </div>
              
              <span class="mr_edit mr_head_r mr_edit_on dn" data-birthday="<?php echo ($info["birthday"]); ?>"  data-sex='<?php if($info["sex"] == 2): ?>女<?php else: ?>男<?php endif; ?>' data-xl="<?php echo ($info["edu"]); ?>" data-gzjy="<?php echo ($info["workyear"]); ?>" data-city="<?php echo ($info["city"]); ?>" data-mobile="<?php echo ($info["phone"]); ?>" data-email="<?php echo ($info["email"]); ?>" data-realname="<?php echo ($info["realname"]); ?>"><i></i><em>编辑</em></span> </div>
            
            <form id="olinfoForm">
              <div class="mr_info_edit mr_info_on <?php if($info['realname']){echo 'dn';} ?>">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabuinfo">
                  <tr>
                    <td class="pt10"><label>姓名</label></td>
                    <td width="190"><div class="mr_name_edit">
                        <input type="text" id="mr_name" name="mr_name" class="ed_name valid" autocomplete="off" value="<?php echo ($info["realname"]); ?>">
                      </div></td>
                    <td>&nbsp;</td>
                    <td class="pt10"><label>出生年份</label></td>
                    <td valign="top">
                    <div class="form_wrap  normal_s" style="*z-index:5;">
                        <input id="mr_year" name="mr_year" type="button" class="mr_button" value="<?php if($info['birthday'])echo $info['birthday'];else echo '1990'; ?>"/>
                        <i class="mr_sj"></i>
                        <div class="xl_list dn">
                          <ul class="ul_year">
                            <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                          </ul>
                        </div>
                      </div></td>
                  </tr>
                  <tr>
                    <td class="pt10"><label>性别</label></td>
                    <td valign="top">
                    <div class="clearfixs mr_year_se"> 
                      <span class="mr_man fl"><i></i><em>男</em></span> 
                      <span class="mr_women fl"><i></i><em>女</em></span> 
                    </div>
                     <div>
                      <input id="myysex" name="myysex" type="hidden" value="" />
                      </div>
                    </td>
                    <td>&nbsp;</td>
                    <td class="pt10"><label>最高学历</label></td>
                    <td valign="top"><div class="form_wrap normal_s" style="*z-index:4;">
                        <input id="xl" name="xl" type="button" class="mr_button" value="<?php echo ($info["edu"]); ?>"/>
                        <i class="mr_sj"></i>
                        <div class="xl_list dn">
                          <ul class="ul_xl">
                            <li>大专</li>
                            <li>本科</li>
                            <li>硕士</li>
                            <li>博士</li>
                            <li>其他</li>
                          </ul>
                        </div>
                      </div></td>
                  </tr>
                  
                  <tr>
                    <td class="pt10"><label>邮箱</label></td>
                     <td valign="top">
                      <div class="xw_input_div email_s">
                        <input id="mr_email" name="mr_email" class="mr_btn" value="<?php echo ($info["email"]); ?>"/>
                      </div>
                      </td>
                    <td>&nbsp;</td>
                    <td class="pt10"><label>毕业学校</label></td>
                    <td valign="top">
                      <div class="xw_input_div mr_click_flag">
                        <input id="byxy" name="byxy"  class="mr_btn" value="<?php echo ($info["byxy"]); ?>"/>
                      </div>
                      </td>
                  </tr>
                  
                  <tr>
                    <td class="pt10"><label>城市</label></td>
                    <td valign="top">
                       <div class="xw_input_div email_s">
                        <input id="szcs" name="szcs"  class="mr_btn" value="<?php echo ($info["city"]); ?>"/>
                      </div></td>
                    <td>&nbsp;</td>
                    
                    <td class="pt10"><label>所学专业</label></td>
                    <td valign="top">
                      <div class="xw_input_div mr_click_flag">
                        <input id="zhuanye" name="zhuanye"  class="mr_btn" value="<?php echo ($info["zhuanye"]); ?>"/>
                      </div></td>
                  </tr>
                  
                  <tr>
                    <td class="pt10"><label>手机</label></td>
                    <td valign="top">
                    <div class="xw_input_div mobile_s">
                        <input id="mr_mobile" name="mr_mobile" class="mr_btn" value="<?php echo ($info["phone"]); ?>"/>
                      </div></td>
                    <td>&nbsp;</td>
                    <td class="pt10"><label>工作年龄</label></td>
                    <td valign="top">
                      <div class="form_wrap normal_s" style="*z-index:3;">
                        <input id="gznx" name="gznx" type="button" class="mr_button" value="<?php echo ($info["workyear"]); ?>"/>
                        <i class="mr_sj"></i>
                        <div class="xl_list dn">
                          <ul class="ul_gznx">
                          	<li>应届毕业生</li>
                            <li>在校学生</li>
                            <li>1年</li>
                            <li>2年</li>
                            <li>3年</li>
                            <li>4年</li>
                            <li>5年</li>
                            <li>6年</li>
                            <li>7年</li>
                            <li>8年</li>
                            <li>9年</li>
                            <li>10年</li>
                            <li>10年以上</li>
                          </ul>
                        </div>
                      </div></td>
                  </tr>
                  <tr>
                    <td class="pt10"><label>英文名</label></td>
                    <td valign="top">
                       <div class="xw_input_div email_s">
                        <input id="english_name" name="english_name"  class="mr_btn" value="<?php echo ($info["english_name"]); ?>"/>
                      </div></td>
                    <td>&nbsp;</td>
                    
                    <td class="pt10"><label></label></td>
                    <td valign="top">
                      <div class="xw_input_div mr_click_flag">
                        <input id="zhuanye" name=""  class="mr_btn" value=""/>
                      </div></td>
                  </tr>

                   <tr>
                    <td class="pt10"><label>身高</label></td>
                    <td valign="top">
                       <div class="xw_input_div email_s">
                        <input id="height" name="height"  class="mr_btn" value="<?php echo ($info["height"]); ?>"/>
                      </div></td>
                    <td>&nbsp;</td>
                    
                    <td class="pt10"><label>体重</label></td>
                    <td valign="top">
                      <div class="xw_input_div mr_click_flag">
                        <input id="weight" name="weight"  class="mr_btn" value="<?php echo ($info["weight"]); ?>"/>
                      </div></td>
                  </tr>

                   <tr>
                    <td class="pt10"><label>固定电话</label></td>
                    <td valign="top">
                       <div class="xw_input_div email_s">
                        <input id="tel" name="tel"  class="mr_btn" value="<?php echo ($info["tel"]); ?>"/>
                      </div></td>
                    <td>&nbsp;</td>
                    
                    <td class="pt10"><label>微信</label></td>
                    <td valign="top">
                      <div class="xw_input_div mr_click_flag">
                        <input id="wx_name" name="wx_name"  class="mr_btn" value="<?php echo ($info["wx_name"]); ?>"/>
                      </div></td>
                  </tr>
                   <tr>
                    <td class="pt10"><label>微博</label></td>
                    <td valign="top">
                       <div class="xw_input_div email_s">
                        <input id="sina_name" name="sina_name"  class="mr_btn" value="<?php echo ($info["sina_name"]); ?>"/>
                      </div></td>
                    <td>&nbsp;</td>
                    
                    <td class="pt10"><label>QQ</label></td>
                    <td valign="top">
                      <div class="xw_input_div mr_click_flag">
                        <input id="qq_name" name="qq_name"  class="mr_btn" value="<?php echo ($info["qq_name"]); ?>"/>
                      </div></td>
                  </tr>
                   <tr>
                    <td class="pt10"><label>证件类型</label></td>
                    <td valign="top">
                       <div class="xw_input_div email_s">
                        <input id="idcardtype" name="idcardtype"  class="mr_btn" value="<?php echo ($info["idcardtype"]); ?>"/>
                      </div></td>
                    <td>&nbsp;</td>
                    
                    <td class="pt10"><label>证件号码</label></td>
                    <td valign="top">
                      <div class="xw_input_div mr_click_flag">
                        <input id="idcard" name="idcard"  class="mr_btn" value="<?php echo ($info["idcard"]); ?>"/>
                      </div></td>
                  </tr>
                  
                </table>
                <div class="mr_ope">
                  <input type="submit" class="mr_save" value="保存" />
                  <a href="javascript:;" class="mr_cancel" data-birthday="<?php echo ($info["birthday"]); ?>"  data-sex='<?php if($info["sex"] == 2): ?>女<?php else: ?>男<?php endif; ?>' data-xl="<?php echo ($info["edu"]); ?>" data-gzjy="<?php echo ($info["workyear"]); ?>" data-city="<?php echo ($info["city"]); ?>" data-mobile="<?php echo ($info["phone"]); ?>" data-email="<?php echo ($info["email"]); ?>" data-realname="<?php echo ($info["realname"]); ?>">取消</a> </div>
              </div>
            </form>
          </div>
        </div>
        
               
        
        <div class="mr_content">       
        
        
          <div id="workExperience" class="item_container_target">
            <div class="mr_moudle_head clearfixs mr_w604">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c"> 工作经历 </span><span class="mr_title_r"></span> </div>
              </div>
              <div class="mr_head_r"> <i></i><em>添加</em> </div>
              <div class="clr h10"></div>
              <div class="clr colac txtct <?php if($exp_list)echo 'dn'; ?>" id="show_no_resume">（*如果要使用在线简历，请完善工作经历和教育经历）</div>
            </div>
            <div class="mr_moudle_content mr_w604">
              <form class="jobExpForm dn" id="addJobForm">
                <div class="mr_add_work">
                  <label>公司</label>
                  <div class="mr_input_div mr_click_flag">
                    <input class="mr_btn companyName" id="companyName" name="companyName"/>
                  </div>
                  <label>职位</label>
                  <div class="mr_input_div mr_click_flag">
                    <input class="mr_btn autoPosition" id="positionName" name="positionName"/>
                  </div>
                  <label>在职时间</label>
                  <div class="clearfixs mr_time_area">
                    <div class="mr_timed_div mr_sta_time fl"> <i class="mr_sj"></i>
                      <input type="button" class="mr_btn"/>
                      <input type="hidden" id="startTime" name="startTime"/>
                      <div class="mr_calendar_ym clearfixs dn">
                        <ul class="mr_year">
                        	<?php $year = getYear(1990,'',1); ?>
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
                      <input type="hidden" id="endTime" name="endTime"/>
                      <div class="mr_calendar_ym clearfixs dn">
                        <ul class="mr_year">
                        <?php $year = getYear(1990,'',1); ?>
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
                  </div>
                  <label>工作内容</label>
                  <div id="mr_job_mce" class="mr_click_flag wrap_editor">
                    <textarea class="tinymce" id="jobContent" name="jobContent" style="width:520px;height:148px;"></textarea>
                  </div>
                  <div class="mr_ope clearfixs">
                    <input type="submit" class="mr_save" value="保存" />
                    <a href="javascript:;" class="mr_cancel">取消</a> </div>
                </div>
              </form>
              
              <div  class="mr_empty_add <?php if($exp_list){echo 'dn';} ?> " > <i></i><span> 添加工作经历 </span> </div>
                            
              
              <div class="list_show">
              
              	<?php if($exp_list){ ?>
                <div class="mr_jobe_list">
                  
                  <?php if(is_array($exp_list)): $i = 0; $__LIST__ = $exp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="clearfixs">
                    <div class="mr_content_l clearfixs">
                      <div class="l2">
                        <h4><?php echo ($v["companyName"]); ?></h4>
                        <span><?php echo ($v["positionName"]); ?></span> </div>
                    </div>
                    <div class="mr_content_r">
                      <div class="mr_edit mr_c_r_t" data-expid="<?php echo ($v["id"]); ?>" data-logo="<?php echo ($v["companyLogo"]); ?>" data-comname="<?php echo ($v["companyName"]); ?>" data-posname="<?php echo ($v["positionName"]); ?>" data-startime="<?php echo ($v["startDate"]); ?>" data-endtime="<?php echo ($v["endDate"]); ?>" data-content="<?php echo ($v["workContent"]); ?>"> <i></i><em>编辑</em> </div>
                      <span><?php echo ($v["startDate"]); ?></span><span> — </span><span><?php echo ($v["endDate"]); ?></span>
					</div>
                  </div>
                  
                  <div  class="<?php if(!$v['workContent']){echo 'dn';} ?> mr_content_m" ><?php echo ($v["workContent"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
                  
                </div>
                <?php } ?>
                
              </div>              
              
            </div>
          </div>
          
          
          
          
          <div id="educationalBackground" class="item_container_target">
            <div class="mr_moudle_head clearfixs mr_w604">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">教育经历</span><span class="mr_title_r"></span> </div>
              </div>
              <div class="mr_head_r"> <i></i><em>添加</em> </div>
              <div class="clr h10"></div>
              <div class="clr colac txtct <?php if($edu_list)echo 'dn'; ?>" id="show_no_edu">（*如果要使用在线简历，请完善工作经历和教育经历）</div>
            </div>
            <div class="mr_moudle_content mr_w604">
              <form class="eduExpForm dn" id="addEduForm">
                <!-- <input type="hidden" id="eduId" name="eduId" value="" /> -->
                <div class="mr_add_work">
                  <label>学校名称</label>
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
                  </div>
                  <div class="mr_ope clearfixs">
                    <input type="submit" class="mr_save" value="保存" />
                    <a href="javascript:;" class="mr_cancel">取消</a> </div>
                </div>
              </form>
              
              <div  class="mr_empty_add <?php if($edu_list){echo 'dn';} ?>" > <i></i><span>添加教育经历</span> </div>
              
              <div class="list_show">
              
              	<?php if($edu_list){ ?>
              <?php if(is_array($edu_list)): $i = 0; $__LIST__ = $edu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="clearfixs mb46 mr_jobe_list">
                
                	
                  <div class="mr_content_l">
                    <div class="l2">
                      <h4><?php echo ($v["schoolName"]); ?></h4>
                      <span><?php echo ($v["education"]); ?> · <?php echo ($v["professional"]); ?></span> </div>
                  </div>
                  <div class="mr_content_r">
                    <div class="mr_edit mr_c_r_t" data-eduid="<?php echo ($v["id"]); ?>" data-schoolname="<?php echo ($v["schoolName"]); ?>" data-edu="<?php echo ($v["education"]); ?>" data-pro="<?php echo ($v["professional"]); ?>" data-date="<?php echo ($v["endYear"]); ?>"> <i></i><em>编辑</em> </div>
                    
                    <span><?php echo ($v["endYear"]); ?>年毕业</span>
					</div>
					
					
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php } ?>
                
              </div>
              
            </div>
          </div>
          
          
          
          <div id="projectExperience"  class="item_container_target <?php if(!$pro_list){echo 'dn';} ?>" >
            <div class="mr_moudle_head clearfixs mr_w604">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">项目经验</span><span class="mr_title_r"></span> </div>
              </div>
              <div class="mr_head_r"> <i></i><em>添加</em> </div>
            </div>
            <div class="mr_moudle_content mr_w604">
              <form class="proExpForm dn" id="addProForm">
                <!--addProForm js赋值  -->
                <div class="mr_add_work">
                  <label>项目名称</label>
                  <div class="mr_input_div mr_click_flag">
                    <input class="mr_btn" id="projectName" name="projectName"/>
                  </div>
                  <label>你的职责</label>
                  <div class="mr_input_div mr_click_flag">
                    <input class="mr_btn" id="thePost" name="thePost"/>
                  </div>
                  <label>项目起止时间</label>
                  <div class="clearfixs mr_time_area">
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
                  </div>
                  <label>项目描述</label>
                  <div id="mr_job_mce" class="mr_click_flag mr_time_area wrap_editor">
                    <textarea class="tinymce" style="width:520px;height:148px;" id="proDescript" name="proDescript"></textarea>
                  </div>
                  <label>项目链接（若有）</label>
                  <div class="mr_input_div mr_click_flag  mr_prolink">
                    <input class="mr_btn" id="pro_link" name="pro_link" value=""/>
                  </div>
                  <div class="mr_ope clearfixs">
                    <input type="submit" class="mr_save" value="保存" />
                    <a href="javascript:;" class="mr_cancel">取消</a> </div>
                </div>
              </form>
              
              <div class="mr_empty_add  <?php if($pro_list){echo 'dn';} ?> "> <i></i><span>添加项目经验</span> </div>
              
              <div class="list_show">
              
              <?php if($pro_list){ ?>
              <?php if(is_array($pro_list)): $i = 0; $__LIST__ = $pro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="mr_jobe_list" data-id="<?php echo ($v["id"]); ?>" >
                  <div class="clearfixs">
                    <div class="mr_content_l">
                      <div class="l2"> 
                        <a href="<?php echo ($v["projectUrl"]); ?>" class="projectTitle" target="_blank"><span></span><?php echo ($v["projectName"]); ?></a>
                        <p><?php echo ($v["positionName"]); ?></p>
                      </div>
                    </div>
                    <div class="mr_content_r">
                      <div class="mr_edit mr_c_r_t"> <i></i><em>编辑</em> </div>
                      <span><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></span> </div>
                  </div>
                  <div  class="mr_content_m" >
                    <p><?php echo ($v["projectRemark"]); ?></p>                    
                  </div>
                  <!-- <p><?php echo ($v["projectUrl"]); ?></p> -->
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                
                <?php } ?>
                
                
              </div>
            </div>
          </div>
          
          
       <!----------- go作品展示 ------------->
          <div id="worksShow"  class="item_container_target  <?php if(!$work_list){echo 'dn';} ?>" >
            <div class="mr_moudle_head clearfixs mr_w604">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">作品展示</span><span class="mr_title_r"></span> </div>
              </div>
              <div class="mr_head_r"> <i></i><em>添加</em> </div>
            </div>
            <div class="mr_moudle_content mr_w604">
              <div id="worksshowForms" class="mr_worksshow_forms dn"> 
              
              
              <form id="addWorksShowUploadForm" class="add_worksshow_form dn">
					<div class="mr_add_work mr_addwork_online">
						<div class="mr_worksshow_tab">
							<span class="mr_wst_upimage ">上传图片</span>
							<span class="mr_wst_uponline">在线作品</span>
						</div>
						<!-- 图片上传区域 -->
						<div class="mr_worksshow_upimage">
							<div>
								<i></i>
								<span>上传作品图片</span>
							</div>
							<input type="hidden" class="work-pic-hidden" name="workPicHidden">
							<input type="file" onchange="myresumeCommon.utils.imageUpload( this, myresumeCommon.requestTargets.workUpload, worksShowOperator.addUploadSucc, worksShowOperator.addUploadFail );" title="目前仅支持10MB以内的PNG/JPG/JPEG/GIF图片" name="workPic" id="worksshowUp" class="worksshow_up">
							<img class="worksshow_img" alt="" src="" id="worksshowUpShow">
						</div>
						<label>作品标题</label>
						<div class="mr_input_div mr_click_flag">
							<input name="workTitle" id="workUploadTitle" class="mr_btn">
						</div>
						<label>作品描述</label>
						<div class="mr_click_flag wrap_editor" id="workImagesDesc">
							<textarea style="width: 520px; height: 148px; display: none;" name="workDescribe" id="workImagesDescContent" class="tinymce" aria-hidden="true"></textarea><span role="application" aria-labelledby="workImagesDescContent_voice" id="workImagesDescContent_parent" class="mceEditor defaultSkin"><span class="mceVoiceLabel" style="display:none;" id="workImagesDescContent_voice">富文本域</span><table cellspacing="0" cellpadding="0" role="presentation" id="workImagesDescContent_tbl" class="mceLayout" style="width: 520px; height: 148px;"><tbody><tr role="presentation" class="mceFirst"><td class="mceToolbar mceLeft mceFirst mceLast" role="toolbar"><div aria-labelledby="workImagesDescContent_toolbargroup_voice" role="group" id="workImagesDescContent_toolbargroup" tabindex="-1"><span role="application"><span style="display:none;" class="mceVoiceLabel" id="workImagesDescContent_toolbargroup_voice">工具栏</span><table align="" cellspacing="0" cellpadding="0" tabindex="-1" role="presentation" class="mceToolbar mceToolbarRow1 Enabled" id="workImagesDescContent_toolbar1" aria-disabled="false" aria-pressed="false"><tbody><tr><td class="mceToolbarStart mceToolbarStartButton mceFirst"><span><!-- IE --></span></td><td style="position: relative" class="ulolBorder"><a title="项目列表" aria-labelledby="workImagesDescContent_bullist_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_bullist" href="javascript:;" id="workImagesDescContent_bullist" role="button" tabindex="-1" aria-pressed="false"><span class="mceIcon mce_bullist"></span><span id="workImagesDescContent_bullist_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">项目列表</span></a></td><td style="position: relative" class="ulolBorder"><a title="编号列表" aria-labelledby="workImagesDescContent_numlist_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_numlist" href="javascript:;" id="workImagesDescContent_numlist" role="button" tabindex="-1" aria-pressed="false"><span class="mceIcon mce_numlist"></span><span id="workImagesDescContent_numlist_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">编号列表</span></a></td><td class="mceToolbarEnd mceToolbarEndButton mceLast"><span><!-- IE --></span></td></tr></tbody></table></span></div><a onfocus="tinyMCE.getInstanceById('workImagesDescContent').focus();" title="转到工具按钮 - Alt-Q，转到编辑器 - Alt-Z，转到元素路径 - Alt-X。" accesskey="z" href="#"><!-- IE --></a></td></tr><tr class="mceLast"><td class="mceIframeContainer mceFirst mceLast"><iframe frameborder="0" id="workImagesDescContent_ifr" src="javascript:&quot;&quot;" allowtransparency="true" title="富文本域按 ALT-F10 定位到工具栏.按 ALT-0 获取帮助。" style="width: 100%; height: 125px; display: block;"></iframe></td></tr></tbody></table></span>
						</div>
						<div class="mr_ope clearfixs">
							<input type="submit" value="保存" class="mr_save">
							<a class="mr_cancel" href="javascript:;">取消</a>	
		   	 			</div>								
					</div>
				</form>
              
                
                <!-- 新增在线作品的foram -->
                <form class="add_worksshow_form" id="addWorksShowOnlineForm">
                  <div class="mr_add_work mr_addwork_image">
                    <div class="mr_worksshow_tab"> <span class="mr_wst_uponline selected">在线作品</span> </div>
                    <div class="mr_wo_show">
                      <div class="mr_self_site">
                        <div class="mr_self_sitelink"> www.jobsminer.cc </div>
                      </div>
                      <div class="mr_wo_preview">
                        <p>这里是你的作品描述</p>
                      </div>
                    </div>
                    <label>作品地址</label>
                    <div class="mr_input_div mr_click_flag">
                      <input class="mr_btn" id="workOnlineUrl" name="url" placeholder="例：www.jobsminer.cc，不需要带“http://”"/>
                    </div>
                    <label>作品描述</label>
                    <div id="workOnlineDesc" class="mr_click_flag wrap_editor">
                      <textarea class="tinymce" id="workOnlineDescContent" name="workDescribeOnline" style="width:520px;height:148px;"></textarea>
                    </div>
                    <div class="mr_ope clearfixs">
                      <input type="submit" class="mr_save" value="保存">
                      <a href="javascript:;" class="mr_cancel">取消</a> </div>
                  </div>
                </form>
                
              </div>
              
              <div class="mr_empty_add addgrey <?php if($work_list){echo 'dn';} ?> "> <i></i><span>展示我的作品</span> </div>
              
              <!-- 在线作品 -->
              <div class="mr_work_online">
              
              	<?php if($work_list){ ?>
              	<?php if(is_array($work_list)): $i = 0; $__LIST__ = $work_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="mr_wo_show" data-type="online" data-id="<?php echo ($v["id"]); ?>">
                  <div>
                    <div class="mr_edit mr_c_r_t"> <i></i><em class="mr_edit_text" data-type="online">编辑</em> </div>
                  </div>
                  <div class="mr_self_site"> 
                    
                    <a class="mr_self_sitelink" href="http://<?php echo ($v["url"]); ?>" target="_blank"> <?php echo ($v["url"]); ?> </a> </div>
                  <div class="mr_wo_preview">
                    <p><?php echo ($v["workName"]); ?></p>
                  </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php } ?>
                
              </div>
              
              <div class="mr_work_upload"> </div>
              
              
            </div>
          </div>
          
          
<!-- 自我描述 -->
          <div id="selfDescription"  class="item_container_target  <?php if(!$info['remark']){echo 'dn';} ?>" >
            <div>
              <div class="mr_moudle_head clearfixs mr_w604">
							<div class="mr_head_l">
								<div class="mr_title">
									<span class="mr_title_l"></span><span class="mr_title_c">自我描述</span><span class="mr_title_r"></span>
								</div>
							</div>
							<div class="mr_head_r">
								<i></i><em>编辑</em>
							</div>
				</div>
                        
                
                <div class="mr_moudle_content clearfixs mr_w604">
							<form id="upSelfForm" class="dn">
								<div class="mr_add_work">
									<div class="self_tip">
										<h3>提供几个思路，试着从这些点描述自己：</h3>
										<p>
											· 你认为值得称道的工作细节；<br>
											· 你曾经克服过的最大挑战；<br>
											· 你在找工作时最看重的方面；<br>
											· 你曾经引以为豪的个人项目或者事迹；<br>
											· 如果你是一位团队领导者，说说你的管理哲学以及独到的行业见解<br>
											· 其它你认为能展示你优势的事情
										</p>
									</div>
									<label>自我描述</label>
									<div id="mr_job_mce" class="mr_click_flag wrap_editor">
										<textarea class="tinymce" style="width:520px;height:148px;" id="self" name="self_des"></textarea>
									</div>
									<div class="mr_ope clearfixs">
										<input type="submit" class="mr_save" value="保存" />
										<a href="javascript:;" class="mr_cancel">取消</a>	
						  	 		</div>										
								</div>							
							</form>
							 <div class="mr_empty_add dn" <?php if(!$info['remark'])echo 'style="display: block;"'; ?> > <i></i><span>更新自我描述</span> </div>
							
							 <div class="self_des_list clearfixs " <?php if(!$info['remark'])echo 'style="display: none;"'; ?>>
								<div style="width:24px;">
								</div>	
								<div class="mr_self_r">
									<?php echo ($info["remark"]); ?>
								</div>	
							</div>
					</div>
                        
                        
              </div>
          </div>
  
          
          
<!-- 期望工作 -->          
          <div id="expectJob"  class="item_container_target dn" >
            <div>
              <div class="mr_moudle_head clearfixs mr_w604">
                <div class="mr_head_l">
                  <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">期望工作</span><span class="mr_title_r"></span> </div>
                </div>
                <div class="mr_head_r" data-city="<?php if($info['expect_city']) echo $info['expect_city'];else echo '北京'; ?>"> <i></i><em>编辑</em> </div>
              </div>
              <div class="mr_moudle_content clearfixs mr_w604">
                <form class="expJobForm dn" id="upExpJobForm">
                  <!--addProForm js赋值  -->
                  <div class="mr_add_work">
                    <label>期望职位</label>
                    <div class="clearfixs exp_job_mb">
                      <div class="mr_expinput_div mr_click_flag">
                        <input class="mr_btn autoPosition" type="text" id="expjobName" name="expjobName" value="<?php echo ($info["position_name"]); ?>"/>
                      </div>
                      <div class="mr_exp_type normal_s"> <i class="mr_sj"></i>
                        <input type="button" class="mr_btn"  name="exp_job_type" value="<?php echo ($info["position_type"]); ?>"/>
                        <div class="xl_list  dn">
                          <ul class="ul_exptype">
                            <li>全职</li>
                            <li>兼职</li>
                            <li>实习</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <label><span>期望城市</span><span class="label_yx">期望月薪</span></label>
                    <div class="clearfixs exp_job_mb">
                      <div class="city_s mr_job_city fl"> <i class="mr_sj"></i>
                        <input type="button" class="mr_btn" name="jobCity" value="<?php echo ($info["expect_city"]); ?>"/>
                        <div class="xl_list dn">
                        
                          <div class="mr_selCity">
                            <ul class="reset mr_province">
                            
                              <li><span>热门城市</span>
                                <ul class="reset dn">
                                	<?php if(is_array($hotcity)): $i = 0; $__LIST__ = $hotcity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="mr_on"><?php echo ($v["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                              </li>
                              
                              <?php if(is_array($province_city)): $i = 0; $__LIST__ = $province_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li> <span><?php echo ($v["name"]); ?></span>
		                                <ul class="reset dn">
		                                
		                                  <?php if(is_array($v["sub"])): $sn = 0; $__LIST__ = $v["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($sn % 2 );++$sn;?><li <?php if($sn==1)echo 'class="mr_on"'; ?> ><?php echo ($vv["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
		                                  
		                                </ul>
		                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                              
                              
                            </ul>
                            
                          </div> 
                          
                          
                        </div>
                      </div>
                      <div class="mr_pay_div normal_s fl"> <i class="mr_sj"></i>
                        <input type="button" name="monthpay" class="mr_btn" value="<?php echo ($info["salarys"]); ?>"/>
                        <div class="xl_list dn">
                          <ul class="ul_pay">
                            <li>2k以下</li>
                            <li>2k-5k</li>
                            <li>5k-10k</li>
                            <li>10k-15k</li>
                            <li>15k-25k</li>
                            <li>25k-50k</li>
                            <li>50k以上</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <label>补充说明（若有）</label>
                    <div id="mr_job_mce" class="mr_click_flag mr_time_area wrap_editor">
                      <textarea class="tinymce" style="width:520px;height:148px;" id="expJobDes" name="expJobDes"><?php echo ($info["expect_memo"]); ?></textarea>
                    </div>
                    <div class="mr_ope clearfixs">
                      <input type="submit" class="mr_save" value="保存" />
                      <a href="javascript:;" class="mr_cancel">取消</a> </div>
                  </div>
                </form>
                
                <div  class="mr_empty_add <?php if($info['expect_city']){echo'dn';} ?> "  > <i></i><span>更新期望工作</span> </div>
                
                <div class="expectjob_list">
                  <input id="expHideId" type="hidden" value="0" />
                  <div class="mr_job_info" data-id="0">
                    <ul class="clearfixs">
                      <li  class="mr_name_li <?php if(!$info['position_name']) echo 'dn'; ?>"  ><i></i><span class="mr_job_name" title="<?php echo ($info["position_name"]); ?>"><?php echo ($info["position_name"]); ?></span></li>
                      <li  class="mr_jobtype_li <?php if(!$info['position_type']) echo 'dn'; ?>" ><i></i><span class="mr_job_type" title="<?php echo ($info["position_type"]); ?>"><?php echo ($info["position_type"]); ?></span></li>
                      <li  class="mr_city_li <?php if(!$info['expect_city']) echo 'dn'; ?> " ><i></i><span class="mr_job_adr" title="<?php echo ($info["expect_city"]); ?>"><?php echo ($info["expect_city"]); ?></span></li>
                      <li  class="mr_jobrange_li <?php if(!$info['salarys']) echo 'dn'; ?>" ><i></i><span class="mr_job_range" title="<?php echo ($info["salarys"]); ?>"><?php echo ($info["salarys"]); ?></span></li>
                    </ul>
                  </div>
                  <div class="mr_job_des dn"> <i class="mr_job_t"></i> <i class="mr_job_b"></i>
                    <div class="mr_expjob_content"><?php echo ($info["expect_memo"]); ?></div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          
          
          <div id="skillsAssess"  class="item_container_target  <?php if(!$skill_list){echo 'dn';} ?>" >
            <div>
              <div class="mr_moudle_head clearfixs mr_w604">
                <div class="mr_head_l">
                  <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">技能评价</span><span class="mr_title_r"></span> </div>
                </div>
                <div class="mr_head_r"> <i></i><em>编辑</em> </div>
              </div>
              <div class="mr_moudle_content mr_w604">
              
                <div class="mr_empty_add dn" <?php if(!$skill_list)echo 'style="display:block;"'; ?> > <i></i><span>展示我的技能</span> </div>
                <div class="me_skill_list">
                
                <?php if($skill_list){ ?>
                
	                <?php foreach($skill_list as $kk=>$vv){ ?>
	                  <div class="mr_skill_con" data-grade="<?php echo ($vv["skillPercent"]); ?>" data-skill-id="<?php echo ($vv["sid"]); ?>"> <span class="mr_skill_name" title="<?php echo ($vv["skillName"]); ?>"><?php echo ($vv["skillName"]); ?></span> <span class="mr_skill_plan"> <em></em> </span> <span class="mr_skill_delete"></span> <span class="mr_skill_level"><?php echo ($vv["masterLevel"]); ?></span> <i class="mr_skill_circle"><em><?php echo ($vv["masterLevel"]); ?></em></i> </div>
	                 <?php } ?>
                 
                 <?php }else{ ?>
                 	<!-- <div class="mr_skill_con" data-grade="10" data-skill-id="0"> <span class="mr_skill_name" title="输入技能名称">输入技能名称</span> <span class="mr_skill_plan"> <em></em> </span> <span class="mr_skill_delete"></span> <span class="mr_skill_level">了解</span> <i class="mr_skill_circle"><em>了解</em></i> </div> -->
                 <?php } ?>
                 
                </div>
                <div class="mr_skill_add mr_skill_add_button" ><span>添加一行</span></div>
                
                <div class="mr_skill_add mr_skill_opera">
                  <div class="mr_ope clearfixs"> <span class="error" style="display:none;">error</span>
                    <input type="submit" class="mr_save" value="保存">
                    <a href="javascript:;" class="mr_cancel">取消</a> </div>
                </div>
              </div>
            </div>
          </div>
          
          
          <div id="customBlock"   class=" item_container_target <?php if(!$custom_model){echo 'dn';} ?>" >
            <div>
            
              <div class="mr_moudle_head clearfixs mr_w604">
                <div class="mr_head_l">
                  <div class="mr_title"> <span class="mr_line_tl"></span>
                    <div class="cust_title"> <span><?php if($custom_model){echo $custom_model['titleName'];}else echo '自定义标题'; ?></span> </div>
                  </div>
                </div>
                <div class="mr_head_r"> <i></i><em>编辑</em> </div>
              </div>
              
              <div class="mr_moudle_content mr_w604">
              
                <div class="mr_empty_add <?php if($custom_model)echo 'dn'; ?>"  > <i></i><span>DIY你的板块</span> </div>
                
                <form class="dn" id="upCustomForm">
                  <div class="mr_add_work">
                    <label>自定义标题</label>
                    <div class="clearfixs mr_input_div mr_click_flag mr_prolink">
                      <input class="mr_btn" type="text" id="titleName" name="titleName" autocomplete="off"/>
                    </div>
                    <label>内容</label>
                    <div id="mr_job_mce" class="mr_click_flag mr_time_area wrap_editor">
                      <textarea class="tinymce" style="width:520px;height:148px;" id="customCon" name="customCon"></textarea>
                    </div>
                    <div class="mr_ope clearfixs">
                      <input type="submit" class="mr_save" value="保存" />
                      <a href="javascript:;" class="mr_cancel">取消</a> </div>
                  </div>
                </form>
                
                <div class="mr_content_cus">
                	<?php if($custom_model){ ?>
		                <input type="hidden" value="<?php echo ($custom_model["titleName"]); ?>" id="customTitleName">
		                <input type="hidden" value="<?php echo ($custom_model["id"]); ?>" id="customId">
		                <div data-id="<?php echo ($custom_model["id"]); ?>" class="custom_list"><p><?php echo ($custom_model["titleContent"]); ?></p>
		                </div>
	                <?php } ?>
                </div>
                
              </div>
              
            </div>
          </div>
          
          
          <div class="mr_self_state">
            <div class="form_wrap mr_self_s active">
              <input id="self_state" name="self_state" type="button" class="mr_button" value="<?php if($info['workstatus'])echo $info['workstatus'];else echo '我是应届毕业生'; ?>"/>
              <i class="mr_sj"></i>
              <div class="xl_list dn">
                <ul class="ul_self_state">
                  <li>我目前已离职，可快速到岗</li>
                  <li>我目前正在职，正考虑换个新环境</li>
                  <li>我暂时不想找工作</li>
                  <li>我是应届毕业生</li>
                </ul>
              </div>
            </div>
          </div>
          
          
          
        </div>
      </div>
      
      
      <div class="mr_myresume_r">
      
      
        <div class="mr_r_nav">
         <div class="clearfixs jllfnav">
            <a class="nav1 cur1" href="/Resume/myresume.html">在线简历</a>
            <a class="nav2" href="/Resume/otherResume.html">附件简历<em><?php echo ($resumeCount); ?></em></a>
            <a class="nav3" href="/User/delivery.html">投递管理</a>
          </div>
        </div>
        
        
        <div   class="mr_upload" <?php if($otherResume)echo 'dn'; ?>  ><a class="inline" href="#uploadFile" title="上传附件简历">上传附件简历</a> </div>
        
        
        
        <div class="scroll_fix">
          <div class="mr_integrity">
            <div class="mr_top clearfixs"> <span class="mr_tip_l"><em class="mr_tip">简历完整度：</em><em class="mr_bfb"><?php echo ($info["resume_score"]); ?>%</em></span> <a class="mr_tip_r" target="_blank" href="/Resume/resumePreview.html">预览简历</a> </div>
            <div class="mr_integrity_m">
              <div class="mr_solid"></div>
              <div class="mr_dashed"></div>
            </div>
          </div>
          <div class="mr_module">
					<ul>
						<li class="active md_flag" data-md="baseinfo">
							<a class="clearfixs">
								<i class="mr_base_i"></i>
								<span class="mr_m_name">基本信息</span><em class="colac">（必填）</em>
							</a>
						</li>
						<li data-md="workExperience" class="md_flag">
							<a class="clearfixs">
								<i class="mr_works_i"></i>
								<span class="mr_m_name"> 工作经历  </span>
							</a>
						</li>
						<li data-md="educationalBackground"  class="md_flag">
							<a class="clearfixs">
								
								<i class="mr_edu_i"></i>
								<span class="mr_m_name">教育经历</span>
							</a>
						</li>
						<li data-md="projectExperience"  class="m_hide <?php if($pro_list){echo 'md_flag';}else{echo 'dn';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_del"></span>
								<i class="mr_project_i"></i>
								<span class="mr_m_name">项目经验</span>
							</a>
						</li>
						<li data-md="worksShow"  class="m_hide <?php if($work_list){echo 'md_flag';}else{echo 'dn';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_del"></span>
								<i class="mr_production_i"></i>
								<span class="mr_m_name">作品展示</span>
							</a>
						</li>
						<li data-md="selfDescription"  class="m_hide <?php if($info['remark']){echo 'md_flag';}else{echo 'dn';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_del"></span>						
								<i class="mr_self_i"></i>
								<span class="mr_m_name">自我描述</span>
							</a>
						</li>
<!--				<li data-md="expectJob"  class="dn m_hide" >
							<a class="clearfixs">
								<span class="mr_hide_del"></span>						
								<i class="mr_hopework_i"></i>
								<span class="mr_m_name">期望工作</span>
							</a>
						</li>-->
						<li data-md="skillsAssess"  class="m_hide <?php if($skill_list){echo 'md_flag';}else{echo 'dn';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_del"></span>						
								<i class="mr_skill_i"></i>
								<span class="mr_m_name">技能评价</span>
							</a>
						</li>	
						<li data-md="customBlock"  class="m_hide <?php if($custom_model){echo 'md_flag';}else{echo 'dn';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_del"></span>						
								<i class="mr_moudle_i"></i>
								<span class="mr_m_name">自定义板块</span>
							</a>
						</li>					
						<!--<li class="mr_module_add">
							<a>
								<span class="mr_hide_addic"></span>
								<i class="mr_addmd_i"></i>
								<span class="mr_m_name">添加板块</span>
							</a>
						</li>-->
						<li data-md="projectExperience"  class="hide_md <?php if($pro_list){echo 'mr_hide';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_addic"></span>
								<i class="mr_project_i"></i>
								<span class="mr_m_name">项目经验</span>
							</a>
						</li>
						<li data-md="worksShow"  class="hide_md <?php if($work_list){echo 'mr_hide';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_addic"></span>
								<i class="mr_production_i"></i>
								<span class="mr_m_name">作品展示</span>
							</a>
						</li>
						<li data-md="selfDescription"  class="hide_md <?php if($info['remark']){echo 'mr_hide';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_addic"></span>						
								<i class="mr_self_i"></i>
								<span class="mr_m_name">自我描述</span>
							</a>
						</li>
<!--			<li data-md="expectJob"  class="hide_md dn" >
							<a class="clearfixs">
								<span class="mr_hide_addic"></span>						
								<i class="mr_hopework_i"></i>
								<span class="mr_m_name">期望工作</span>
							</a>
						</li>-->
						<li data-md="skillsAssess"  class="hide_md <?php if($skill_list){echo 'mr_hide';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_addic"></span>						
								<i class="mr_skill_i"></i>
								<span class="mr_m_name">技能评价</span>
							</a>
						</li>	
						<li data-md="customBlock"  class="hide_md <?php if($custom_model){echo 'mr_hide';} ?>" >
							<a class="clearfixs">
								<span class="mr_hide_addic"></span>						
								<i class="mr_moudle_i"></i>
								<span class="mr_m_name">自定义板块</span>
							</a>
						</li>
					</ul>
				</div>
        </div>
        <!--通过button 设置disable的思路控制按钮是否控制事件解绑与恢复
			<input type="button" style="width:100px;height:20px;background-color: #000;" id="a"/>
			<input type="button" style="width:100px;height:20px;background-color: #999;" onclick="alert(2);" disabled="disabled" />--> 
      </div>
      
      
      
    </div>
    
    
    <div id="sns_hide" style="display:none;">
      <div class="form_wrap mr_sns_m"> <i class="sns8"></i> <em class="mr_no"></em> <a href="javascript:;" class="sns_del"></a>
        <input type="text" id="sns8" name="sns8" class="mr_button" />
      </div>
    </div>
    
    
    <div id="job_update_hide" class="dn">
      <form class="jobExpForm" id="">
        <input id="mr_expid" type="hidden" value="" />
        <div class="mr_add_work">
          <label>公司</label>
          <div class="mr_input_div mr_click_flag">
            <input class="mr_btn companyName"  name="companyName"/>
          </div>
          <label>职位</label>
          <div class="mr_input_div mr_click_flag">
            <input class="mr_btn autoPosition"  name="positionName"/>
          </div>
          <label>在职时间</label>
          <div class="clearfixs mr_time_area">
            <div class="mr_timed_div mr_sta_time fl"> <i class="mr_sj"></i>
              <input type="button" class="mr_btn"/>
              <input type="hidden" name="startTime"/>
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
            <div class="mr_timed_div mr_end_time fl"> <i class="mr_sj"></i>
              <input type="button" class="mr_btn"/>
              <input type="hidden" name="endTime"/>
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
          </div>
          <label>工作内容</label>
          <div id="mr_job_mce" class="mr_click_flag wrap_editor">
            <textarea class="tinymce_replace" style="width:520px;height:148px;" id="mce_jason" name="jobContent"></textarea>
          </div>
          <div class="mr_ope clearfixs">
            <div class="mr_delete">
              <div class="mr_delete_pop dn">
                <p>确定删除本条信息？</p>
                <div> <span data-id="" class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
              </div>
              <span>删除本条</span> </div>
            <input class="mr_save" type="submit" value="保存" />
            <a href="javascript:;" class="mr_cancel">取消</a> </div>
        </div>
      </form>
    </div>
    
    
    
    <!--教育经历修改框  -->
    <div id="edu_update_hide" class="dn">
      <form class="eduExpForm" id="">
        <input type="hidden" id="eduId" name="eduId" value="" />
        <div class="mr_add_work">
          <label>学校名称</label>
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
          </div>
          <div class="mr_ope clearfixs">
            <div class="mr_delete">
              <div class="mr_delete_pop dn">
                <p>确定删除本条信息？</p>
                <div> <span data-id="" class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
              </div>
              <span>删除本条</span> </div>
            <input type="submit" class="mr_save" value="保存" />
            <a href="javascript:;" class="mr_cancel">取消</a> </div>
        </div>
      </form>
    </div>
    
    
    
    <!-- 项目经验 -->
    <div id="pro_update_hide" class="dn">
      <form class="proExpForm" id="">
        <!--upProForm js赋值  -->
        <div class="mr_add_work">
          <label>项目名称</label>
          <div class="mr_input_div mr_click_flag">
            <input class="mr_btn" id="projectName" name="projectName"/>
          </div>
          <label>你的职责</label>
          <div class="mr_input_div mr_click_flag">
            <input class="mr_btn" id="thePost" name="thePost"/>
          </div>
          <label>项目起止时间</label>
          <div class="clearfixs mr_time_area">
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
          </div>
          <label>项目描述</label>
          <div id="mr_job_mce" class="mr_click_flag mr_time_area wrap_editor">
            <textarea class="tinymce_replace" style="width:520px;height:148px;" id="mce_jason" name="mce_jason"></textarea>
          </div>
          <label>项目链接（若有）</label>
          <div class="mr_input_div mr_click_flag mr_prolink">
            <input class="mr_btn" id="yourDuty" name="pro_link"/>
          </div>
          <div class="mr_ope clearfixs">
            <div class="mr_delete">
              <div class="mr_delete_pop dn">
                <p>确定删除本条信息？</p>
                <div> <span class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
              </div>
              <span>删除本条</span> </div>
            <input type="submit" class="mr_save" value="保存" />
            <a href="javascript:;" class="mr_cancel">取消</a> </div>
        </div>
      </form>
    </div>
    
    
    
    <div id="del_hide_tip" class="dn">
      <div class="mr_md_del">
        <div class="mr_tip_div"> <span class="mr_ic">?</span><span class="mr_del_tip">确定删除本条信息？</span> </div>
        <p> 删除后，该模块将不在简历中出现；<br>
          同时，该模块内已经填写的信息将被删除 </p>
        <div class="mr_btn_area"> <span class="mr_del_btn">删除</span><span class="mr_del_cel">取消</span> </div>
      </div>
    </div>
    
    
    
    <!-- 作品展示 --> 
    <!-- 上传图片的form -->
    <form class="add_worksshow_form dn" id="addWorksShowUploadFormUpdate">
      <div class="mr_add_work mr_addwork_online">
        <div class="mr_worksshow_tab"> <span class="mr_wst_uponline disabled">在线作品</span> </div>
        <!-- 图片上传区域 -->
        <div class="mr_worksshow_upimage"> 
          <!--
			<input type="hidden" name="workPicHidden" class="work-pic-hidden" />
			-->
          <input type="file" class="worksshow_up" id="worksshowUpUpdate" name="workPic" title="目前仅支持10MB以内的PNG/JPG/JPEG/GIF图片" onchange="myresumeCommon.utils.imageUpload( this, myresumeCommon.requestTargets.workUpload, worksShowOperator.addUploadSucc, worksShowOperator.addUploadFail );" />
          <img id="worksshowUpUpdateShow" src="" alt="" class="worksshow_img" /> </div>
        <label>作品标题</label>
        <div class="mr_input_div mr_click_flag">
          <input class="mr_btn" id="workUploadTitleUpdate" name="workTitle"/>
        </div>
        <label>作品描述</label>
        <div id="workImagesDescUpdate" class="mr_click_flag wrap_editor">
          <textarea class="tinymce-update" id="workImagesDescContentUpdate" name="workDescribe" style="width:520px;height:148px;"></textarea>
        </div>
        <div class="mr_ope clearfixs">
          <div class="mr_delete">
            <div class="mr_delete_pop dn">
              <p>确定删除本条信息？</p>
              <div> <span class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
            </div>
            <span>删除本条</span> </div>
          <input type="submit" class="mr_save" value="保存">
          <a href="javascript:;" class="mr_cancel">取消</a> </div>
      </div>
    </form>
    
    
    
    <!-- 新增在线作品的foram -->
    <form class="add_worksshow_form dn" id="addWorksShowOnlineFormUpdate">
      <div class="mr_add_work mr_addwork_image">
        <div class="mr_worksshow_tab"> <span class="mr_wst_uponline selected">在线作品</span> </div>
        <div class="mr_wo_show">
          <div class="mr_self_site">
            <div class="mr_self_sitelink"> </div>
          </div>
          <div class="mr_wo_preview"> </div>
        </div>
        <label>作品地址</label>
        <div class="mr_input_div mr_click_flag">
          <input class="mr_btn" id="workOnlineUrlUpdate" name="url"/>
        </div>
        <label>作品描述</label>
        <div id="workOnlineDescUpdate" class="mr_click_flag wrap_editor">
          <textarea class="tinymce-update" id="workOnlineDescContentUpdate" name="workDescribeOnline" style="width:520px;height:148px;"></textarea>
        </div>
        <div class="mr_ope clearfixs">
          <div class="mr_delete">
            <div class="mr_delete_pop dn">
              <p>确定删除本条信息？</p>
              <div> <span class="mr_del_ok">删除</span> <span class="mr_del_cancel">取消</span> </div>
            </div>
            <span>删除本条</span> </div>
          <input type="submit" class="mr_save" value="保存">
          <a href="javascript:;" class="mr_cancel">取消</a> </div>
      </div>
    </form>
    
    
    
    <div id="del_hide_tip" class="dn">
      <div class="mr_md_del">
        <div class="mr_tip_div"> <span class="mr_ic">?</span><span class="mr_del_tip">确定删除本条信息？</span> </div>
        <p> 删除后，该模块将不在简历中出现；<br>
          同时，该模块内已经填写的信息将被删除 </p>
        <div class="mr_btn_area"> <span class="mr_del_btn">删除</span><span class="mr_del_cel">取消</span> </div>
      </div>
    </div>
    
    
    
    <div style="display:none">
      <div class="popup" id="cropimageContainer" style="overflow:hidden;width:360px;height:470px;">
        <div id="">
          <div class="crop">
            <div id="cropzoom_container" style="overflow:hidden;"></div>
            <div class="page_btn">
              <input type="button" class="btn" id="cropimageEnsure" value="确定" />
              <input type="button" class="cancel" id="cropimageRestore" value="取消" />
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    
    
    
    <div style="display:none">
      <div class="popup" id="uploadImages" style="overflow:hidden;width:360px;height:470px;">
        <div class="crop">
          <div id="cropzoom_container" style="overflow:hidden;"></div>
          <div class="page_btn">
            <input type="button" class="btn" id="crop" value="确定" />
            <input type="button" class="cancel" id="restore" value="取消" />
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    
    
    
    <div style="display:none">
      <div class="popup" id="uploadLogos" style="overflow:hidden;width:360px;height:470px;">
        <div class="crop">
          <div id="cropzoom_container" style="overflow:hidden;"></div>
          <div class="page_btn">
            <input type="button" class="btn" id="crop" value="确定" />
            <input type="button" class="cancel" id="restore" value="取消" />
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    
    
    
    <!-------------------------------------弹窗lightbox ----------------------------------------->
    <div style="display:none;"> 
      <!-- 上传简历 -->
      <div id="uploadFile" class="popup" style="padding-bottom:10px;">
        <table width="100%">
          <tr>
            <td align="center"><form>
                <a href="javascript:void(0);" class="btn_addPic"> <span>选择上传文件</span>
                <input tabindex="3" title="支持word、pdf格式文件，大小不超过10M" size="3" name="newResume" id="resumeUpload" 
	                        class="filePrew" type="file" onchange="file_check(this,'/Resume/updateMyResume','resumeUpload')" />
                </a>
              </form></td>
          </tr>
          <tr>
            <td align="left">支持word、pdf格式文件<br />
              文件大小需小于10M</td>
          </tr>
          <tr>
            <td align="left" style="color:#dd4a38; padding-top:10px;">注：若从其它网站下载的word简历，请将文件另存为.docx格式后上传</td>
          </tr>
          <tr>
            <td align="center"><img src="/Public/Home/images/loading.gif" height="24" id="loadingImg" style="visibility: hidden;" alt="loading" /></td>
          </tr>
        </table>
      </div>
      <!--/#uploadFile--> 
      
      <!-- 简历上传成功 -->
      <div id="uploadFileSuccess" class="popup">
        <h4>简历上传成功！</h4>
        <table width="100%">
          <tr>
            <td align="center"><p>你可以将简历投给你中意的公司了。</p></td>
          </tr>
          <tr>
            <td align="center"><a href="javascript:top.location.reload();" class="btn_s">确&nbsp;定</a></td>
          </tr>
        </table>
      </div>
      <!--/#uploadFileSuccess--> 
      
      <!-- 没有简历请上传 -->
      <div id="deliverResumesNo" class="popup">
        <table width="100%">
          <tr>
            <td align="center"><p class="font_16">你还没有简历，请先上传一份</p></td>
          </tr>
          <tr>
            <td align="center"><form>
                <a href="javascript:void(0);" class="btn_addPic"> <span>选择上传文件</span>
                <input title="支持word、pdf、ppt、txt、wps格式文件，大小不超过10M" size="3" name="newResume" id="resumeUpload1" 
	                        class="filePrew" type="file" onchange="file_check(this,'/User/updateMyResume','resumeUpload1')" />
                </a>
              </form></td>
          </tr>
          <tr>
            <td align="center">支持word、pdf格式文件，大小不超过10M</td>
          </tr>
        </table>
      </div>
      <!--/#deliverResumesNo--> 
      
      <!-- 上传附件简历操作说明-重新上传 -->
      <div id="fileResumeUpload" class="popup">
        <table width="100%">
          <tr>
            <td><div class="f18 mb10">请上传标准格式的word简历</div></td>
          </tr>
          <tr>
            <td><div class="f16"> 操作说明：<br />
                打开需要上传的文件 - 点击文件另存为 - 选择.docx - 保存 </div></td>
          </tr>
          <tr>
            <td align="center"><a  class="inline btn" href="#uploadFile" title="上传附件简历">重新上传</a></td>
          </tr>
        </table>
      </div>
      <!--/#fileResumeUpload--> 
      
      
      <!-- 上传附件简历操作说明-重新上传 -->
      <div id="fileResumeUploadSize" class="popup">
        <table width="100%">
          <tr>
            <td><div class="f18 mb10">上传文件大小超出限制</div></td>
          </tr>
          <tr>
            <td><div class="f16"> 提示：<br />
                单个附件不能超过10M，请重新选择附件简历！ </div></td>
          </tr>
          <tr>
            <td align="center"><a  class="inline btn" href="#uploadFile" title="上传附件简历">重新上传</a></td>
          </tr>
        </table>
      </div>
      <!--/#deliverResumeConfirm--> 
      
    </div>
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
    <script type="text/javascript" src="/Public/Home/js/new_myresume.js"></script> 
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