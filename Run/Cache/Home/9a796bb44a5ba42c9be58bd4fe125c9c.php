<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="UTF-8">

<title><?php if($page_title) echo $page_title;else echo C('WEB_SITE_TITLE'); ?> </title>
<meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>">
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>">

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/reset.css" />
<link rel="shortcut icon" type="image/ico" href="/favicon.ico">

<script type="text/javascript" src="/Public/Home/js/jquery.1.10.1.min.js" ></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lib.min.js"></script>

<script src="/Public/Home/js/ajaxfileupload.js" type="text/javascript"></script>


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


</head>


<body>
<div id="body">

<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header">
        <div class="w960">
          <div class="logo"><a href="/index.html"><img src="/Public/Home/images/logo.gif" /></a></div>
          
          
          <?php if(is_login()): if(getUsersSession('type')==1){ ?>
          
          		<div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/info.html">我的公司</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Company/interview.html">简历管理</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div>
          		
          	<?php }else{ ?>
          	
          		<div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a><a <?php echo ($cur_top_nav["collections"]); ?> href="/User/collections.html">我的收藏</a></div>
          		
          		
          	<?php } ?>
          
          	<div class="login">
	          	<div class="icous">
                    <div class="inusnav">
                      <em></em>
                      <?php if(getUsersSession('type')==0){ ?>
                      <a href="/User/delivery.html">投递管理</a>
                      <?php } ?>
                      <a href="/User/index.html">账号设置</a>
                      <a href="<?php echo U('User/logout');?>">退出</a>
                    </div>
                </div>
	          </div>
          
          <?php else: ?>
          
	          <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div>
	          <div class="login">
	          
	          <a class="sty"  href="<?php echo U('User/login');?>">登录</a><a class="sty" href="<?php echo U('User/register');?>">注册</a>
	          </div><?php endif; ?>
          
          </div>
          <div class="clr"></div>
        </div>
      
	</div>

</div><?php endif; ?>

<div class="tilhed">
   <div class="mbtitle">完善基本信息</div>
</div>

<div class="mbbox mt10">

	   <div class="ziliao_box"> 
       
	    <form  action="/Resume/basicPost" method="post">
        
           <div class="ziliaofm">
               <input type="text"  name="mr_name" value="<?php echo ($myinfo["realname"]); ?>"  placeholder="姓名" /> 
             
              <div class="xzsex"> 
                <span>性别</span>
                <input type="radio" id="radio-1-1" name="sex[]" class="regular-radio"  /><label for="radio-1-1">男</label>&nbsp;&nbsp;&nbsp;&nbsp;
			    <input type="radio" id="radio-1-2" name="sex[]" class="regular-radio" /><label for="radio-1-2">女</label>
              </div>
               
               <div style="position:relative;">  
                   <div id="sl_zgxl">
                   <input type="hidden" name="highestEducation" id="highestEducation" value="<?php echo ($myinfo["edu"]); ?>">
                    <input type="button" class="slhyly" id="select_gs"  value="<?php if($myinfo['edu'])echo $myinfo['edu'];else echo '最高学历'; ?>">
                    </div>
                    <div id="box_sca2" class="selectBox2 dn">
                      <ul class="reset">
                            <li>大专</li>
                            <li>本科</li>
                            <li>硕士</li>
                            <li>博士</li>
                            <li>其他</li>
                      </ul>
                    </div>
                </div>
                          
               <input type="text"  name="byxy" value="<?php echo ($myinfo["byxy"]); ?>"  placeholder="毕业学校" />
               <input type="text"  name="zhuanye" value="<?php echo ($myinfo["zhuanye"]); ?>"  placeholder="所学专业" />
               <input type="text"  name="liveCity" value="<?php echo ($myinfo["city"]); ?>"  placeholder="所在城市" />
               <input type="text"  name="phone" value="<?php echo ($myinfo["phone"]); ?>"  placeholder="联系电话" />
                <input type="text"  name="email" value="<?php echo ($myinfo["email"]); ?>"  placeholder="邮箱" class="nobtm" />
           </div>
         
	      <span class="error" style="display:none;" id="beError"></span> 
          <div class="clr"></div>
	     <input type="submit" id="submitzl" class="mybtn f20 adbtn"  value="完成" /> 
	    </form> 
      
        
    
    
    
	   </div> 
       
     
    
  </div> 



<script>
	$(document).click(function(){
		$('#select_bg').removeClass('selectrFocus');
		$('#box_sca2').hide();
		$('#sl_zgxl').removeClass('selectrFocus');
	});
	
   /* 选学历*/
	$('#sl_zgxl').bind('click',function(e){
		$('#select_bg').removeClass('selectrFocus');
		e.stopPropagation();
		$(this).addClass('selectrFocus');
		$('#box_sca2').show();
		$('#stageform .selectBoxShort').hide();
	});
	$('#box_sca2').on('click','ul li',function(e){
		e.stopPropagation();
		var sca = $(this).text();
		var sca2 = $(this).attr('xzid');
		$('#select_gs').val(sca);
		$('#highestEducation').val(sca);
		$('.slhyly').css("color","#333");
		$('#sl_zgxl').removeClass('selectrFocus');
		$('#box_sca2').hide();
	});
</script>


	<script type="text/javascript">

    	$(document)
	    	.ajaxStart(function(){
	    		$("#submitzl").addClass("log-in").attr("disabled", true);
	    	})
	    	.ajaxStop(function(){
	    		$("#submitzl").removeClass("log-in").attr("disabled", false);
	    	});


    	$("form").submit(function(){
    		$("#beError").hide();
    		var self = $(this);
    		$.post(self.attr("action"), self.serialize(), success, "json");
    		return false;

    		function success(data){
    			if(data.status){
    				
    				window.location.href = "/User/checkEmail";
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