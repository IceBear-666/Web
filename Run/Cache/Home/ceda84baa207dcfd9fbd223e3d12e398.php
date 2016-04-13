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

<style>
body{font-size:14px;}
a{color:#AC6198; font-weight:bold;}
a:hover{text-decoration: underline;}
.login_logo{ text-align:center; padding-top:40px;}
.yzbtn{ padding:30px 0px 30px 0px;}
.yzbtn a{ background:#AC6198; color:#fff; padding:8px 14px; font-size:15px;}
.yzbtn a:hover{background:#BE83AE; text-decoration:none;}
.zise{ color:#AC6198; font-weight:bold}


.yzbox{width:640px;margin:0 auto;color:#5C5C46;font-size:14px;padding-top:80px}

.fasong{margin-top:60px; background:#fff; padding:30px 10px; line-height:22px;}
.fasong h2{ display:block; font-weight:normal; font-size:18px; padding-bottom:20px}

  
.denglu{margin-top:40px;  background:#fff; padding:30px; line-height:22px;}
.loginurl{ background:#fff; padding:4px; margin:10px 0px; border:1px solid #f30;}
.loginurl a{ color:#555;}

.chenggong{ width:600px; height:350px; background:#666; margin:0 auto; text-align:center;}
.chenggong h2{ display:block; text-align:center; padding:180px 0px 40px 0px; color:#fadc62; font-size:22px;}
.chenggong a{ color:#333; font-size:18px; background:#fadc62; padding:10px 50px;}
.chenggong a:hover{background:#F9CC1C; }
</style>

<div class="tilhed">
   <a class="golevel" href="/user"></a>
   <div class="logo"><a href="/"><img src="/Public/Home/images/logo.png"></a></div>
    <a class="gohome" href="/"></a>
</div>

<div class="mbbox">
  
    
    
    <?php if($type != 'success' ): ?><!-- 发送 -->  
      <div class="fasong">
         <h2> 欢迎来Jobsminer！</h2>
         <div class="gomail">我们给你的邮箱：<span  class="zise"><?php echo ($email); ?></span> 发送了验证邮件，</div>
         <div>请按照链接的提示，在24小时内完成验证，谢谢。</div>
         <div class="yzbtn"><a href="<?php echo ($email_link); ?>" target="_blank">登录邮箱验证</a><a style="background:#eee; color:#333; margin-left:10px;"href="/user/">暂不注册</a></div>
         <div>
            没有收到验证邮件？<a href="javascript:void(0)" id="resend">重新发送</a>
        </div>
        <input type="hidden" value="<?php echo ($userid); ?>" name="userid" id="userid">
      	<input type="hidden" value="0" id="resend_type">
      </div>
      
   <?php else: ?>   
             
       <!-- 验证成功 -->  
       <div class="denglu">
         欢迎加入Jobsminer<br />
         你已经成功验证邮箱：<span class="zise"><?php echo ($email); ?></span><br />
         
          <?php if($user_type==1){ ?>
          
          		<div class="yzbtn"><a href="/Company/createPost.html">发布职位</a></div>
          		
          <?php }else{ ?>
          
          		<div class="yzbtn"><a href="/Resume/myresume.html">完善简历</a></div>
          
          <?php } ?>
          
            <a href="/">先逛逛职位，待会在完善</a>
       </div><?php endif; ?>
      

</div> 


<?php if($type != 'success' ): ?><script>

$('#resend').click(function(event){

  	var userid = $('#userid').val();
  	
	$.ajax({

        type: "POST",
        url: '/User/resendEmail/',
        data: {userid:userid},
        dataType: "json",
        //async:false,

        success: function(json){
        	if(json.status==1){
    			alert("邮件发送成功！");   				

    		}
    		else {
    			alert(json.info);
    			
    		}
        },
        error:function(){
        	alert("服务器繁忙，请稍后再试");
			return false;
        }
    });
	
	return true;

})

</script><?php endif; ?>

  
      
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