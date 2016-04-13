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

<div class="tilhed">
   <a class="golevel" href="/User"></a>
   <div class="mbtitle">我的收藏</div>
   <a class="gohome" href="/"></a>
</div>

<table class="sctab" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33.3%"><a href="/User/collections" <?php echo ($lmenu[1]); ?>>职位</a></td>
    <td width="33.3%"><a href="/User/collections/type/2" <?php echo ($lmenu[2]); ?>>公司</a></td>
    <td><a href="/User/collections/type/3" <?php echo ($lmenu[3]); ?>>宣讲会</a></td>
  </tr>
</table>


<!-- ======== 职位收藏开始 ========== -->
<div class="mbbox2">


    <div>

	<?php if($type==2){ ?>
    
    <!-- 公司列表开始-->
     <div class="listjob">
       <ul>
       
       <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
         <a href="/Company/info/id/<?php echo ($v["uid"]); ?>">
         
            <?php if($v["logo"] != ''): ?><img src="<?php echo ($v["logo"]); ?>" alt="<?php echo ($v["company_short_name"]); ?>">
            <?php else: ?>
                <img src="/Public/Home/images/logo_default.png"><?php endif; ?>
           
           <div class="info mconinfo">
               <div>
                 <h5><?php echo ($v["company_short_name"]); ?></h5> <i <?php if($company['isv']==2)echo 'class="cur"'; ?> ></i>
               </div>
               <div class="mcomhy clr"><?php echo ($v["hangye"]); ?></div>
               <span><?php echo ($v["company_city"]); ?></span>
           </div>
           
            <div class="numzhiwei"><?php echo (getcompanyjobsnum($v["com_id"])); ?>个在招职位</div>
            
           <div class="clr"></div> 
         </a>
          <a href="javascript:void(0);" onclick="user_collection(<?php echo ($v["toid"]); ?>,0,2,1)" class="mbqxsc"></a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>   
       
        <?php if(!$list)echo '<div class="mbbox mt10"><div class="nocenter"><span><img src="/Public/Home/images/empty.png" />暂时还没有收藏的公司，快去收藏吧！</span></div></div>'; ?>
          

       </ul>
     </div>

<!-- 公司列表结束-->



	<?php }elseif($type==3){ ?>

  <!-- 宣讲会列表开始-->
      <?php if($list){ ?>
      
           
           <table class="mymianshi" width="100%" border="0" cellspacing="0" cellpadding="0">

                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                    <td class="onebg"><?php echo ($v["date_ymd"]); ?>&nbsp;&nbsp;&nbsp;(周<?php echo getWeekName($v['date_ymd']); ?>)&nbsp;&nbsp;&nbsp;<?php echo ($v["date_time"]); ?><!-- 5月 4日 （周六） 08.30 --></td>
                  </tr>
                  <tr>
                    <td height="8"></td>
                  </tr>
                  <tr>
                    <td style="position:relative;"><span class="colac f16"><?php echo ($v["company_short_name"]); ?></span><a style=" top:4px;" href="javascript:void(0);" onclick="user_collection(<?php echo ($v["toid"]); ?>,0,3,1)" class="mbqxsc"></a></td>
                  </tr>
                  <tr>
                    <td>
                     <?php echo (getplacebyid($v["cid"])); ?>，<?php echo (getschoolbyid($v["sid"])); ?>，<br />
	                 <?php echo ($v["address"]); ?>
                   </td>
                  </tr>
                  <tr>
                    <td height="8"></td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>    
                  
           </table>

         
          <?php }else{ ?>
                   <?php if(!$list)echo '<div class="mbbox mt20"><div class="nocenter"><span><img src="/Public/Home/images/empty.png" />暂时还没有收藏的宣讲会，快去收藏吧！</span></div></div>'; ?>
          <?php } ?>
               
	     <!-- 列表结束-->

	<?php }else{ ?>


         
         
<!-- 职位列表开始-->
     <div class="listjob">
       <ul>
       
       <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
         <a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>">
         
           <img src="<?php echo ($v["logo"]); ?>" />
           
           <div class="info">
               <div>
                 <h5><?php echo ($v["company_short_name"]); ?></h5> <i <?php if($company['isv']==2)echo 'class="cur"'; ?> ></i>
               </div>
               <div class="clr"><?php echo ($v["zhiwei_mingcheng"]); ?></div>
               <span class="lf"><?php echo ($v["gongzuo_chengshi"]); ?></span>
                <div class="mgzjy2 lf"><?php echo ($v["gongzuo_jingyan"]); ?></div>
           </div>
           
           <div class="shenq">
              <div class="colac" style="padding-top:44px;"><?php echo ($v["yuexin_min"]); ?>-<?php echo ($v["yuexin_max"]); ?>k</div>
            </div>
            
           <div class="clr"></div> 
         </a>
         
         <a href="javascript:void(0);" onclick="user_collection(<?php echo ($v["toid"]); ?>,0,1,1)" class="mbqxsc"></a>
         
        </li><?php endforeach; endif; else: echo "" ;endif; ?>   
       
        <?php if(!$list)echo '<div class="mbbox mt10"><div class="nocenter"><span><img src="/Public/Home/images/empty.png" />暂时还没有收藏的职位，快去收藏吧！</span></div></div>'; ?>
          

       </ul>
     </div>
     <!-- 职位列表结束-->
     


	<?php } ?>



    </div>

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