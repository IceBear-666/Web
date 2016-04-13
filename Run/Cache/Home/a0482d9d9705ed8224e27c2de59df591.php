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


<body id="login_bg">

<script src="/Public/Js/jquery.1.10.1.min.js?v=<?php echo ($rand); ?>" type="text/javascript"></script>

<script type="text/javascript" src="/Public/Js/jquery.lib.min.js?v=<?php echo ($rand); ?>"></script>
<script type="text/javascript" src="/Public/Js/core.min.js?v=<?php echo ($rand); ?>"></script>

<div class="login_wrapper" style="padding-top: 10px;">
  <div class="login_header"> <a href="<?php echo (WEB_URL); ?>"><img src="/Public/Images/logo_white.png" alt="" height="62" width="285"></a>
    <div id="cloud_s"><img src="/Public/Images/cloud_s.png" alt="cloud" height="52" width="81"></div>
    <div id="cloud_m"><img src="/Public/Images/cloud_m.png" alt="cloud" height="95" width="136"></div>
  </div>
  <input id="resubmitToken" value="" type="hidden">
  <div class="login_box">
    <form id="loginForm">
      <input id="email" name="email" tabindex="1" placeholder="请输入登录邮箱地址" type="text">
      <input id="password" name="password" tabindex="2" placeholder="请输入密码" type="password">
      <span class="error" style="display:none;" id="beError"></span>
      <label class="fl" for="remember">
        <input id="remember" value="" checked="checked" name="autoLogin" type="checkbox">
        记住我</label>
      <a href="<?php echo (WEB_URL); ?>reset.html" class="fr" target="_blank">忘记密码？</a>
      <input id="submitLogin" value="登 &nbsp; &nbsp; 录" type="submit">
      <input id="callback" name="callback" value="" type="hidden">
      <input id="authType" name="authType" value="" type="hidden">
      <input id="signature" name="signature" value="" type="hidden">
      <input id="timestamp" name="timestamp" value="" type="hidden">
    </form>
    <div class="login_right">
      <div>还没有本站帐号？</div>
      <a href="<?php echo (WEB_URL); ?>Public/reg" class="registor_now">立即注册</a>
      <div class="login_others">使用以下帐号直接登录:</div>
      <a href="<?php echo (WEB_URL); ?>Public/otherLogin/type/sina" target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a> <a href="<?php echo (WEB_URL); ?>Public/otherLogin/type/qq" class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a> </div>
  </div>
  <div class="login_box_btm"></div>
</div>
<script type="text/javascript">
$(function(){
	
	$('#email,#password').focus(function(){
   		$('#beError').text('').hide();
   	}); 
	/**add nancy**/
	function immediately(){
		var element = document.getElementById("password");
		if("\v"=="v") {
			element.onpropertychange = webChange;
		}else{
			element.addEventListener("input",webChange,false);//此时的input为添加的oninput事件
		}
		function webChange(){
			$('#beError').text('').hide();
		}
	}
	immediately();
	/**end nancy**/
	//验证表单
	 	$("#loginForm").validate({
	 		/* onkeyup: false,
	 		focusCleanup:true,  */
	        rules: {
	    	   	email: {
	    	    	required: true,
	    	    	email: true,
	    	    	maxlength:100
	    	   	},
	    	   	password: {
	    	    	required: true,
	    	    	rangelength: [6,16]
	    	   	}
	    	},
	    	messages: {
	    	   	email: {
	    	    	required: "请输入登录邮箱地址",
	    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com",
	    	    	maxlength:"请输入100字以内的邮箱地址"
	    	   	},
	    	   	password: {
	    	    	required: "请输入密码",
	    	    	rangelength: "请输入6-16位密码，字母区分大小写"
	    	   	}
	    	},
	    	submitHandler:function(form){
	    		if($('#remember').prop("checked")){
	      			$('#remember').val(1);
	      		}else{
	      			$('#remember').val(null);
	      		}
	    		var email = $('#email').val();
	    		var password = $('#password').val();
	    		var remember = $('#remember').val();
	    		
	    		var callback = $('#callback').val();
	    		var authType = $('#authType').val();
	    		var signature = $('#signature').val();
	    		var timestamp = $('#timestamp').val();
	    		
	    		$(form).find(":submit").attr("disabled", true);
	            $.ajax({
	            	type:'POST',
	            	data:{email:email,password:password,autoLogin:remember, callback:callback, authType:authType, signature:signature, timestamp:timestamp},
	            	url:ctx+'/Public/checkLogin',
	            	dataType: 'json'
	            }).done(function(result) {
					if(result.status){
					 	if(result.url){
							window.location.href=result.url;
	            		}else{
	            			window.location.href=ctx+'/';
	            		} 
					}else{
						$('#beError').text(result.info).show();
					}
					$(form).find(":submit").attr("disabled", false);
	            }); 
	        }  
		});
})
</script>
<div style="display: none;" id="cboxOverlay"></div>
<div style="display: none;" tabindex="-1" role="dialog" class="" id="colorbox">
  <div id="cboxWrapper">
    <div>
      <div style="float: left;" id="cboxTopLeft"></div>
      <div style="float: left;" id="cboxTopCenter"></div>
      <div style="float: left;" id="cboxTopRight"></div>
    </div>
    <div style="clear: left;">
      <div style="float: left;" id="cboxMiddleLeft"></div>
      <div style="float: left;" id="cboxContent">
        <div style="float: left;" id="cboxTitle"></div>
        <div style="float: left;" id="cboxCurrent"></div>
        <button id="cboxPrevious" type="button"></button>
        <button id="cboxNext" type="button"></button>
        <button id="cboxSlideshow"></button>
        <div style="float: left;" id="cboxLoadingOverlay"></div>
        <div style="float: left;" id="cboxLoadingGraphic"></div>
      </div>
      <div style="float: left;" id="cboxMiddleRight"></div>
    </div>
    <div style="clear: left;">
      <div style="float: left;" id="cboxBottomLeft"></div>
      <div style="float: left;" id="cboxBottomCenter"></div>
      <div style="float: left;" id="cboxBottomRight"></div>
    </div>
  </div>
  <div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
</div>
</body>
</html>