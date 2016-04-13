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

<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/list.css" />
<script type="text/javascript" src="/Public/Home/js/jquery.min.js" ></script>
<script>
 window.onload= function(){$("#getht").css("height","");$("#gtetabs").val(1);}
</script>

<script src="/Public/Home/js/slider-pp.min.js"></script>
<!--
如果手机不兼容win时间，就开启监听div
<script type="text/javascript" src="/Public/Home/js/jianting.js"></script>
-->

<div class="tilhed">
   <a class="golevel" href="<?php if(getUsersSession('type')==1) echo '/user/';else echo'/Company'; ?>"></a>
   <div class="mbtitle"> <?php if(getUsersSession('type')==1) echo '我的公司';else echo'公司详情'; ?></div>
   <a class="gohome" href="<?php if(getUsersSession('type')==1) echo '/user/';else echo'/'; ?>"></a>
</div>

<div class="mbbox2">
  
      <div class="infocom" style="position:relative;">
        <img src="<?php echo ($myinfo["logo"]); ?>" alt="<?php echo ($myinfo["company_name"]); ?>" />
          <div class="sping lf">
             <div><h5><?php echo ($myinfo["company_short_name"]); ?></h5> <i <?php if($myinfo['isv']==2)echo 'class="cur"'; ?> ></i></div>
             <div class="clr"><em>“</em><?php echo ($myinfo["descri"]); ?><em>”</em></div>
           </div>
        <div class="clr"></div>
        
          <?php if($cuser_type){}elseif(!in_array($myinfo['uid'],$cids)){ ?>
           	<div class="mbscpos mbcang1" title="添加收藏" onclick="return user_collection(<?php echo ($myinfo["uid"]); ?>,1,2,1)"></div>
           <?php }else{ ?>
           	<div class="mbscpos mbcang2" title="取消收藏" onclick="return user_collection(<?php echo ($myinfo["uid"]); ?>,0,2,1)"></div>
           <?php } ?>
           
   </div>
 
 <table class="mbcmico" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%"><div class="cominfo1"><i></i><?php echo ($myinfo["company_city"]); ?></div></td>
    <td><div class="cominfo2"><i></i><?php echo ($myinfo["hangye"]); ?></div></td>
  </tr>
  <tr>
    <td><div class="cominfo3"><i></i><?php echo ($gongsi_xingzhi[$myinfo['gongsi_xingzhi']]); ?></div></td>
    <td><div class="cominfo4"><i></i><?php echo ($myinfo["guimu"]); ?></div></td>
  </tr>
</table>
      
   
<table class="mbtab1 mt10" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><a id="tabtxt" class="cur" href="javascript:">公司介绍</a></td>
    <td><a id="tabpic" href="javascript:">公司相册</a></td>
  </tr>
</table>   

<div id="getht" style="position:relative;">
<!-- 公司介绍 -->
  <div id="showcinfo"> 
   <div id="cominfo" class="comytxt">
         <span><?php echo ($myinfo["content"]); ?></span>
          <div id="mymr" class="myzkmr">.......</div>
        </div>
        <div id="zhankai" class="zhankai"></div>
  
   </div>



<!-- 公司图片 -->
<?php if($photos){ ?>
<div class="sdpicbox">
    <section id="tgbox" class="vb">
    <div class="touchslider">
          <div class="touchslider-viewport">
                <?php foreach($photos as $k=>$v){ ?>
                    <div class="touchslider-item"><img src="<?php echo ($v["url"]); ?>"></div>
                <?php } ?>
          </div>
             <div class="touchslider-navtag">
              <?php foreach($photos as $k=>$v){ ?>
                    <span class="touchslider-nav-item <?php if($k==0) echo 'touchslider-nav-item-current'; ?>"></span>
                  <?php } ?>
              </div>
    </div>
    </section>
</div>
<?php } ?>

</div>
<input id="gtetabs" type="hidden" value="1" /> 
    
        
    <style>
	.jobtil{ padding-bottom:6px;}
	</style>  
    
     <dd class="job_bt mt20">
          <div class="bgf9" style="padding:2px 0px;"><h3 class="description">招聘职位</h3></div>
     </dd>  
        
      <!-- 职位列表开始-->
     <div class="listjob">
       <ul>
       
       <?php if(is_array($joblist)): $i = 0; $__LIST__ = $joblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
         <a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>">
           
           <div class="info">
               <div class="jobtil f16"><?php echo ($v["zhiwei_mingcheng"]); ?></div>
               <span class="lf"><?php echo ($v["gongzuo_chengshi"]); ?></span>
               <div class="mgzjy2 lf"><?php echo ($v["gongzuo_jingyan"]); ?></div>
           </div>
           
           <div class="shenq">
              <div class="colac"><?php echo ($v["yuexin_min"]); ?>-<?php echo ($v["yuexin_max"]); ?>k</div>
              
            </div>
            
           <div class="clr"></div> 
         </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>   
       

       </ul>
     </div>
     <!-- 职位列表结束-->
 <table class="mbottol bgf9" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a id="mbgotop" href="javascript:">回到顶部</a></td>
    <td class="bgfff" width="1"></td>
    <td><a href="javascript:">加载更多</a></td>
  </tr>
</table>
<div class="txtct pdt10 col999 f12"><?php echo C('COPYRIGHT');?> </div>    
                
<script>
$("#mbgotop").click(function(){$("html,body").animate({scrollTop :0}, 300);return false;});
</script>

<script>

$("#tabpic").click(function(){
        $("#tabtxt").removeClass('cur');
	    $(this).addClass("cur");
		$("#showcinfo").addClass('vb');
		$("#tgbox").removeClass('vb');
		$("#gtetabs").val(2);
		$("#getht").height($(".sdpicbox img").height()+20);
		//$(".sdpicbox").height($(".sdpicbox img").height());
});

$("#tabtxt").click(function(){
        $("#tabpic").removeClass('cur');
	    $(this).addClass("cur");
		$("#tgbox").addClass('vb');
		$("#showcinfo").removeClass('vb');
		$("#gtetabs").val(1);
		$("#getht").css("height","");
});


$("#zhankai").click(function(){
        $("#cominfo").toggleClass("highlight");
		$("#mymr").toggleClass("dn");
	    $(this).toggleClass("zkcur");
});
	
	

    var mygao1 = $("#cominfo span").height();
	if(mygao1>=180){
		$("#cominfo").height(180);
			$("#zhankai").show();
		$("#mymr").show();
	}else{
		$("#cominfo").height(mygao);
		$("#zhankai").hide();
		$("#mymr").hide();
	}


	
		
jQuery(function($) {
	$(window).resize(function(){
		
	var mygao = $("#cominfo span").height();
	var gtetabs = $("#gtetabs").val();
	if(gtetabs==2){
	  setTimeout(function(){
        $("#getht").height($(".sdpicbox").height());
      },300);
	}else{
		$("#getht").css("height","");
	}
	//alert(mygao);
	
	if(mygao>=180){
		$("#cominfo").height(180);
		$("#zhankai").show();
		$("#mymr").removeClass('dn');
	}else{
		$("#cominfo").height(mygao);
		$("#zhankai").hide();
		$("#cominfo").removeClass('highlight');
		$("#zhankai").removeClass('zkcur');
		$("#mymr").addClass('dn');
	}
	
	
	var width=$('#tgbox').width();
		$('.touchslider-item a').css('width',width);
		$('.touchslider-viewport').css('height',340*(width/640));
		$('.touchslider-viewport img').css('height',340*(width/640));
	}).resize();	
	$(".touchslider").touchSlider({mouseTouch: true, autoplay:false});

});
</script> 


<style>#comfooter{ display:none;}</style>
      
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