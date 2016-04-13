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

<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header">
          <a class="golevel" href="#"></a>
          <div class="logo"><a href="/index.html"><img src="/Public/Home/images/logo.png" /></a></div>
          <a class="gohome" href="<?php if(getUsersSession('type')==1) echo '/user/';else echo'/'; ?>"></a>
          <div class="clr"></div>
        </div>
        
        
      
	</div>

</div><?php endif; ?>
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

.yzbox{width:640px;margin:0 auto;color:#5C5C46;font-size:14px;padding-top:80px}

.mymsg{margin-top:40px; background:#fff; padding:60px; line-height:22px;}
.mymsg h2{ display:block; text-align:center; font-weight:normal; font-size:22px; padding-bottom:20px}
.gopw{ font-size:20px; padding:6px 40px;}

input[type="text"],input[type="password"]{border:2px solid #f1f1f1;outline:none; font-size:16px; width: 340px;height: 30px;  padding: 6px 10px; margin-top:10px; transition:border 0.2s ease-in 0s;}
input[type="button"],input[type="submit"]{outline:none;cursor:pointer;border:none;}
input[type="text"]:focus,input[type="password"]:focus{border:2px solid #D3B8CC;}

.pwcnt{ width:420px; margin:0 auto;}
#ueditpw {
    position: absolute;
    right:44px;
    top: 14px;
}

</style>
  
  
<div class="yzbox">
  <div class="login_logo"> <a href="/"><img src="/Public/Home/images/uslogo.png" /></a></div>
  
  
<?php if($type==2){ ?>

<!-- step2 邮箱验证 -->       
      <div class="mymsg">
         <div class="pwcnt" style="min-width:460px;">
	          <div class="pwstep pwstep2"></div>
	          <div class="f18" style="padding:10px 0px 4px;">密码重置邮件已发送至你的邮箱：<font style="color:#ac6198"><?php echo ($email); ?></font></div>
              请在24小时内登录你的邮箱接收邮件，链接激活后可重置密码。 
              <div class="mt30 txtct"><a style="font-weight:normal; text-decoration:none;" class="mybtn gopw" href="<?php echo ($email_link); ?>" target="_blank">登录邮箱验证</a></div>
            </div>
	  </div>




<?php }elseif($type==3){ ?>

<!-- step3 重置密码 -->      
      <div class="mymsg">
         <div class="pwcnt">
	          <div class="pwstep pwstep3"></div>
                 <div class="f18" style="padding:10px 0px 4px;">邮件地址：<font style="color:#ac6198"><?php echo ($email); ?> </font></div>
                 
                <form class="registerform" action="#" method="post" name="forms" id="resetPswForm">   
	              <div class="newpw">
                      <div id="editipt"><input type="password" id="newpassword" class="myipt" name="newpassword"  placeholder="请输入新密码" errormsg="密码为6-20位" nullmsg="请输入新密码" datatype="*6-20"/></div>
                      <div id="ueditpw"><a class="offpw" href="javascript:showps()"></a></div>
                  </div>
                  <div class="mt30 txtct"><input type="submit" class="mybtn gopw" value="确定"></div>
                </form>
                  
            </div>
	  </div>

<?php }else{ ?>


<!-- step1 输入邮箱 -->   
  <div class="mymsg">
         <div class="pwcnt">
	          <div class="pwstep"></div>
	          <form id="findPswForm" method="post">
	            <table width="100%" align="center" class="savePassword">
	                <tr>
	                  <td>
                        <input type="text" name="email" id="email" placeholder="请输入注册时使用的邮箱地址"  maxlength="30">
	                    <span class="error" style="display:none;" id="findPwd_beError"> </span>
                        </td>
	                </tr>
	                
	                <tr>
	                  <td><input type="submit" class="mybtn gopw mt20" value="找回密码"></td>
	                </tr>
	            </table>
	            <input type="hidden" name="type" id="type" value="1">
	          </form>
            </div>
	  </div>
   
   

<?php } ?>
  
  

      



  
  
      
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
	(function(){
		//校验
		$('#findPswForm').validate({
			onkeyup:false, 
			rules: {
				newemail : {
					required:true,
					email:true,
					//forwardEmailFormat:true,
					//forwardSame:true,
					maxlength:100
				}
			},
			messages: {
				newemail: {
					required:"请输入正确格式的接收简历邮箱！",
					email:"请输入正确的邮箱格式",
					//forwardEmailFormat:"邮箱后缀不同，解绑对当前公司的招聘服务才可绑定其他公司邮箱接收简历",
					//forwardSame:"请输入与当前接收简历邮箱不同的邮箱地址",
					maxlength:"请输入正确格式的接收简历邮箱！"
				}
			},
			errorPlacement:function(label, element){
				label.appendTo($(element).parent());
				$(".c_section span.error").css("margin","5px 0 10px 10px");
			},
			submitHandler:function(form){
				var newemail = $("#email").val();
				var type = $("#type").val();
				var obj = {email:newemail,type:type};
				$.ajax({
					 type:'POST',
					 url:ctx+"/User/findPassword/",
					 data:obj,
					 dataType:'json'
				 }).done(function(result){
					if(result.status == "1"){
						//alert("修改成功");
						top.location.href=ctx+"/User/findPassword/type/2/email/"+newemail;
						//top.location.href=ctx+"/baseinfo/receiveEmail/verifyEmail.html?recordId=" + result.content.data.record;
					}else{
						 alert(result.info);
					}
				 });	    		
			}
		});		
		
	})();
	
	
	
	
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
  

      
<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>
<div style="height:60px;"></div>
<div class="clr"></div>


    <?php if(is_login()): if(getUsersSession('type')==1){ ?>
                  
              <div id="comfooter">
                  <a  <?php echo ($cur_top_nav["noread"]); ?> href="/Company/interview/type/noread">未读简历</a><!-- <?php echo ($cur_top_nav["noread"]); ?> -->
                  <a  <?php echo ($cur_top_nav["user"]); ?> href="/User/">个人中心</a><!-- <?php echo ($cur_top_nav["user"]); ?> -->
              </div>
          
          <?php }else{ ?>
          
              
              <div id="footer">
                  <a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/">职位</a>
                  <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/">公司</a>
                  <a <?php echo ($cur_top_nav["user"]); ?> id="mwode" href="/User/">我的</a>
              </div>
              
         <?php } ?>
         
      <?php else: ?>   
         <div id="footer">
                  <a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/">职位</a>
                  <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/">公司</a>
                  <a <?php echo ($cur_top_nav["user"]); ?> id="mwode" href="/User/">我的</a>
         </div><?php endif; ?>

<?php } endif; ?>

<script type="text/javascript">
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
            	alert(data.message);
            	if(data.content.do_type==-1){
            		window.location.href="/User/login/?ref=/Jobs/info/id/<?php echo ($info["jid"]); ?>";
            	}
            	
            
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
		$(".licity").hide();
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

</body>
</html>