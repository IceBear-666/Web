<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta charset="UTF-8">

<title><?php if($page_title) echo $page_title;else echo C('WEB_SITE_TITLE'); ?> </title>
<meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>">
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>">

<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/reset.css" />

<script type="text/javascript" src="/Public/Home/js/jquery.1.10.1.min.js" ></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lib.mobile.js"></script>
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

<style type="text/css">
#wizard {font-size:12px;height:320px;width:320px;overflow:hidden;position:relative;-moz-border-radius:5px;-webkit-border-radius:5px;}
#wizard .items{width:20000px; clear:both; position:absolute;}
#wizard .right{float:right;}
.page{width:318px;float:left; height: 300px;}
.btn_nav {padding: 20px}
.jm-register-page{float:left;}
.ziliao_box .adbtn {width: 45% !important; background: #FFDA44 !important;}
.ziliao_box .adbtn:hover{background: #ac6198 !important;}
</style>

<div class="mbbox mt10">
     <div class="ziliao_box"> 
   <form  action="/Resume/basicPost" method="post">
  <div id="wizard">
  
    <div class="items ">
      <div class="page ziliaofm">
              <input type="text" id="mr_name"  name="mr_name" value="<?php echo ($myinfo["realname"]); ?>"  placeholder="姓名" /> 
             
              <div class="xzsex"> 
                <span>性别</span>
                <input type="radio" id="radio-1-1" name="sex[]" class="regular-radio"  /><label for="radio-1-1">男</label>&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="radio" id="radio-1-2" name="sex[]" class="regular-radio" /><label for="radio-1-2">女</label>
              </div>
              <input type="text" id="phone"  name="phone" value="<?php echo ($myinfo["phone"]); ?>"  placeholder="联系电话" />
              <input type="text" id="email"  name="email" value="<?php echo ($myinfo["email"]); ?>"  placeholder="邮箱"  />
              <br/><br/>
                 
               <p class="btn_nav" style="align:center">
                  <input type="button" class="next right mybtn f20 adbtn" value="下一步&raquo;"  />
                  <span class="error" style="display:none;" id="beErrorOne">请将信息填写完整！</span> 
               </p>
            </div>
      
          <div class="page ziliaofm">
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

               <br/><br/>
               <div class="btn_nav">
                  <input type="button" class="prev mybtn f20 adbtn" value="&laquo;上一步" />
                  <input type="submit" id="submitzl" class="mybtn f20 adbtn" style="float:right"  value="完成" /> 
                  <span class="error" style="display:none;" id="beError"></span> 
               </div>
            </div>
             
          <div class="clr"></div>
      
    </div>
  </div>
</form><br />
</div></div>
<!-- 
<div class="mbbox mt10">

	   <div class="ziliao_box"> 
       
	    <form  action="/Resume/basicPost" method="post">
        
           <div class="ziliaofm">

            <div class="jm-register-page">
              <input type="text"  name="mr_name" value="<?php echo ($myinfo["realname"]); ?>"  placeholder="姓名" /> 
             
              <div class="xzsex"> 
                <span>性别</span>
                <input type="radio" id="radio-1-1" name="sex[]" class="regular-radio"  /><label for="radio-1-1">男</label>&nbsp;&nbsp;&nbsp;&nbsp;
			         <input type="radio" id="radio-1-2" name="sex[]" class="regular-radio" /><label for="radio-1-2">女</label>
              </div>
              <input type="text"  name="phone" value="<?php echo ($myinfo["phone"]); ?>"  placeholder="联系电话" />
              <input type="text"  name="email" value="<?php echo ($myinfo["email"]); ?>"  placeholder="邮箱" class="nobtm" />
              <div class="btn_nav">
                  <input type="button" class="next right" value="下一步&raquo;" />
               </div>
            </div> 
            <div class="jm-register-page">  
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
               <div class="btn_nav">
                  <input type="button" class="prev" style="float:left" value="&laquo;上一步" />
               </div>
             </div> 
        </div>
         
	      <span class="error" style="display:none;" id="beError"></span> 
          <div class="clr"></div>
	     <input type="submit" id="submitzl" class="mybtn f20 adbtn"  value="完成" /> 
       <p><br/><br/></p>
	    </form> 
      
        
    
    
    
	   </div> 
       
     
    
  </div> 
 -->
<script type="text/javascript" src="/Public/Home/js/scrollable.js" ></script>
<script type="text/javascript">
$(function(){
  $("#wizard").scrollable({
      onBeforeSeek:function(event,i){ //验证表单 
          if(i==1){ 
              var user = $("#mr_name").val(); 
              if(user==""){ 
                  
                  $("#beErrorOne").show(); 
                  return false; 
              }
              var user = $("#phone").val(); 
              if(user==""){ 
                 
                  $("#beErrorOne").show(); 
                  return false; 
              }
              var user = $("#email").val(); 
              if(user==""){ 
                 
                  $("#beErrorOne").show(); 
                  return false; 
              } 

              if(!document.getElementById("radio-1-1").checked  && !document.getElementById("radio-1-2").checked){
                
                  $("#beErrorOne").show(); 
                  return false;
              }
             
          } else {
            $("#beErrorOne").hide(); 
          }
      } 
  });
  
});
</script>
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
    				
    				window.location.href = "http://www.jobsminer.cc/User/checkLogin?callback=jmLogin.checkLoginCallback";
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