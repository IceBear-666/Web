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


 <?php if(getUsersSession('type')==1){ ?>
      <div class="tilhed">
          <div class="logo"><img src="/Public/Home/images/logo.png" /></div>
      </div>
 <?php } ?>
 
 
<div class="mbbox">
 
 <div class="userhome">
 
 <?php if(getUsersSession('type')==1){ ?>

        <div class="out txtrt">
            <a class="colac" href="<?php echo U('User/logout');?>">退出</a>
        </div>
        
        <?php if($info['logo']){ ?> 
           <img class="upic" src="<?php echo ($info["logo"]); ?>" />
        <?php }else{ ?> 
           <img class="upic" src="/Public/Home/images/com_logo.gif" />
        <?php } ?> 
             
        <div class="txtct pdt10 f16"><?php echo ($info["company_short_name"]); ?></div>
          
       </div>
       
      <table class="myhobt1" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#FFDA44"><a href="/Company/cinfo.html" class="mbt1"><i></i>我的公司</a></td>
          <td width="10"></td>
          <td bgcolor="#FFDA44"><a href="/Company/positions/type/Publish.html" class="mbt2"><i></i>我的职位</a></td>
        </tr>
        <tr>
          <td height="10" colspan="3"></td>
        </tr>
        <tr>
          <td bgcolor="#FFDA44"><a href="/Company/interview.html" class="mbt3"><i></i>简历管理</a></td>
          <td></td>
          <td bgcolor="#FFDA44"><a href="/Company/interview/type/mianshi.html" class="mbt4"><i></i>面试管理</a></td>
        </tr>
      </table>
      
  <?php }else{ ?>
  
     <div class="out">
     
      		<?php if($info['check_email']<1){ ?>
            <a id="ttemail" class="lf colac" href="javascript:">验证邮箱</a>
            <?php } ?>
            
            <a class="rt colac" href="<?php echo U('User/logout');?>">退出</a>
            <div class="clr"></div>
        </div>
        <img class="upic"  src='<?php if($info["pic"] != '' ): echo ($info["pic"]); else: ?>/Public/Home/images/default_headpic.png<?php endif; ?>'  width="117" height="117" alt="头像" /> 
        <div class="txtct pdt10 f16"><?php echo ($info["realname"]); ?></div>
          
       </div>
       
      <table class="myhobt" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#FFDA44"><a href="/User/delivery.html" class="mbt1"><i></i>投递记录</a></td>
          <td width="10"></td>
          <td bgcolor="#FFDA44"><a href="/User/myinterview.html" class="mbt2"><i></i>我的面试</a></td>
        </tr>
        <tr>
          <td height="10" colspan="3"></td>
        </tr>
        <tr>
          <td bgcolor="#FFDA44"><a href="/Resume/myresume.html" class="mbt3"><i></i>我的简历</a></td>
          <td></td>
          <td bgcolor="#FFDA44"><a href="/User/collections.html" class="mbt4"><i></i>我的收藏</a></td>
        </tr>
      </table>
      
      
      
<!-- 弹出层验证邮箱 -->

   <div id="tantan_tip" class="temail" style="display:none;">
     <span><em id="costt">x</em></span>
     <h5>邮件已发送，快去验证吧：）</h5>
      未收到验证邮件？垃圾箱找找看~
      <input type="hidden" value="<?php echo ($info["uid"]); ?>" name="userid" id="userid">
      <a id="resend" href="javascript:">重新发送验证邮件</a>
   </div>
   
   <script>
     $("#ttemail").click(function(){
    	 send_check_email(0);
        $("#tantan_tip").show();
     })
	 
	 $("#costt").click(function(){
        $("#tantan_tip").hide();
     })
     
     
     $('#resend').click(function(){
    	 send_check_email(1);
     })
     
     function send_check_email(show){
    	 
    	 var userid = $('#userid').val();
    	  	
    		$.ajax({

    	        type: "POST",
    	        url: '/User/resendEmail/',
    	        data: {userid:userid},
    	        dataType: "json",
    	        //async:false,

    	        success: function(json){
    	        	if(json.status==1){
    	        		if(show==1){
    	    				alert("邮件发送成功！");
    	        		}
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
    		
     }
     
  </script>
  
  
  <?php } ?>

   
   
</div>


 
      
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