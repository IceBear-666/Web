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

<script type="text/javascript" src="/Public/Home/js/company/spsd.js"></script>
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/xuanjiang.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/list.css" />




<!-- 视频开始 -->
<div class="xjfsbg">
   <div class="w960">
       <div style="height:500px; overflow:hidden;"><!-- &tiny=0&auto=0 -->
         <iframe frameborder="0" width="960" height="496" src="<?php echo ($info["url"]); ?>" allowfullscreen></iframe>
       </div>
    </div>
</div>
 <!-- 视频结束 --> 
 
 
 


<div class="w960 bgf9">

<div class="xjsinfo">
  <h2>宣讲会简介</h2>
  <div class="clr"></div>
 
  
  <div class="lfinfo">
  
  	<?php if($company["logo"] != ''): ?><img src="<?php echo ($company["logo"]); ?>" alt="<?php echo ($company["company_name"]); ?>" style="width:120px;height:120px;">
	<?php else: ?>
		<img src="/Public/Home/images/logo_default.png" alt="<?php echo ($company["company_name"]); ?>" style="width:120px;height:120px;"><?php endif; ?>
	
      <div class="mininfo">
        <span>
           <div class="lf"><?php echo ($company_short_name); ?></div>
           <i <?php if($company['isv']==2)echo 'class="cur"'; ?> ></i> <!-- 如果企业通过认证，给<i>标签添加：class="cur" -->
         </span>
        <em><?php echo ($company["company_name"]); ?></em>
        <div id="cominfo" class="comytxt">
        <?php echo (strip_tags($info["content"])); ?>
          <div id="mymr" class="myzkmr">.......</div>
        </div>
        <div id="zhankai" class="zhankai"></div>
      </div>
      <div class="clr"></div>
  </div>
 
 
 <?php if($info['attach']){ ?>
  <div class="rtinfo">
    <font>没有时间看视频？</font>
    <a href="<?php echo ($info['attach']); ?>" target="_blank">文字版宣讲会</a>
  </div>
  <?php } ?>
  
  
  <div class="clr"></div>
</div>


<!-- 相关推荐开始 -->
<div class="ztmbox">
   <div class="xtjtil">相关推荐</div>
		<div class="picScroll-left">
			<div class="bd">
            <a class="next"></a>
            <a class="prev"></a>
				<ul class="picList">
                
                
                <?php if(is_array($the_same)): $i = 0; $__LIST__ = $the_same;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                      <em><?php echo ($v["related"]); ?></em><i></i>
                      <div class="dianji"><?php echo ($v["hits"]); ?></div>
                      <div class="shijian"><?php echo ($v["shichang"]); ?></div>
                         <a class="max" href="/Video/info/id/<?php echo ($v["vid"]); ?>"><img src="<?php echo ($v["thumb"]); ?>" /></a>
                      <div class="xjinfo">
                         <a class="xjtil lf" href="/Video/info/id/<?php echo ($v["vid"]); ?>"><?php echo ($v["title"]); ?></a>
                         <div class="xjdata rt"><?php echo (showday($v["addtime"],"d/m")); ?></div>
                      </div>
                   </li><?php endforeach; endif; else: echo "" ;endif; ?>  
                   
                   
				</ul>
			</div>
		</div>
</div>
<script type="text/javascript">
		jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",vis:4});
</script>
<!-- 相关推荐结束 -->
 

<!-- 评论开始 --> 
<div class="xjmsg">
   <h2>发表评论</h2>
    <form class="registerform" action="/Video/addReview" method="post" >
      <textarea id="content" placeholder="发表你的真知灼见，说不定被HR看上噢~" datatype="*2-200" nullmsg="请填写评论内容" errormsg="2-200字噢~"/></textarea>
      <div class="tolmsg rt"><input type="button" id="btn_add" class="mybtn1 f16" value="确认发表" /></div>
   		<input id="vid" value="<?php echo ($info["vid"]); ?>" type="hidden">
   </form>
    <div class="clr"></div>
</div>
 
   <div class="listmsg">
     <ul>
     
	     <?php if(is_array($view_list)): $i = 0; $__LIST__ = $view_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
	         <div class="msgtop"><span><?php if($v['niming'])echo '匿名';else echo $v['realname']; ?> </span><em><?php echo (showday($v["addtime"])); ?></em></div>
	         <div><?php echo ($v["content"]); ?></div>
	       </li><?php endforeach; endif; else: echo "" ;endif; ?>
       
     </ul>
   </div>
   
     <div class="h20"></div>   
       <!-- 翻页-->
       <?php echo ($page); ?>
  <div class="h20"></div>  
  
 </div>




<script>
$(function(){
    $("#zhankai").click(function(){
        $("#cominfo").toggleClass("highlight");
		$("#mymr").toggleClass("dn");
	    $(this).toggleClass("zkcur");
    });
});
</script> 
<script>
   $(document).ready(function(){
   $(".max").hover(function() {
	$(this).css({'z-index' : '10'});
	$(this).find('img').addClass("hover").stop()
	.animate({marginTop: '-10px', marginLeft: '-10px', width: '220px', height: '120px',}, 300);
	} , function() {
	$(this).css({'z-index' : '0'});
	$(this).find('img').removeClass("hover").stop()
	.animate({marginTop: '0', marginLeft: '0',width: '200px', height: '100px', }, 300);
	});
  });
</script>

<script type="text/javascript" src="/Public/Home/js/Validform_v5.3.2_min.js"></script>   
<script type="text/javascript">
$(function(){	
	$(".registerform:eq(0)").Validform({
		tiptype:3,
		showAllError:true,

	});
});



$("#btn_add").click(function(){ 
    
    var content = $("#content").val();
    var vid = $("#vid").val();
    
    $("#btn_add").attr('disabled',"true");
    
    if(content==''){
        alert("内容不能为空");
        $("#btn_add").removeAttr("disabled");
        return false;
    }
    
    $.ajax({
        type:"POST",
        url:ctx +"Video/addReview",
        data:{content:content,vid:vid},
        dataType:'json',
        beforeSend:function(){
        },          
        success:function(data){
        	//data = $.parseJSON( data );
            if(data.status==1){
            	
                $("#content").val("");	
                alert(data.info);
                window.location.reload();
            }
            else alert(data.info);
            $("#btn_add").removeAttr("disabled");  
        }   ,
        //调用执行后调用的函数
        complete: function(XMLHttpRequest, textStatus){
        	$("#btn_add").removeAttr("disabled");
        },
        //调用出错执行的函数
        error: function(){
        	$("#btn_add").removeAttr("disabled");
            alert("评论失败，请稍后再试");
        }        
     });

      
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