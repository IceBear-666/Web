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

<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/popup.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/external.min.css"/>

<script type="text/javascript">
var ctx = "<?php echo (WEB_URL); ?>";
var ctx_new = "<?php echo (WEB_URL); ?>";
var rctx = "<?php echo (WEB_URL); ?>";
var pctx = "<?php echo (WEB_URL); ?>";

</script>

    <div class="tilhed">
       <a class="golevel" href="/Company/info/id/<?php echo ($info["uid"]); ?>"></a>
       <div class="mbtitle">职位详情</div>
       <a class="gohome" href="<?php if(getUsersSession('type')==1) echo '/user/';else echo'/'; ?>"></a>
    </div>

<div class="mbbox2">

 <div class="mbinfo">
 
   <div class="mbintil">
      <h1 title="<?php echo ($info["zhiwei_mingcheng"]); ?>"><?php echo ($info["zhiwei_mingcheng"]); ?></h1>
      <!-- 收藏 -->     
      <?php if($cuser_type){ }else{ ?>
      
            <?php if($my_collect){ ?>
             	<div  class="jd_collection collected" onclick="return user_collection(<?php echo ($info["jid"]); ?>,0,1,1)">
             <?php }else{ ?>
             	<div  class="jd_collection" onclick="return user_collection(<?php echo ($info["jid"]); ?>,1,1,1)">
             <?php } ?>
               </div>
               
        <?php } ?>
       <!-- end 收藏 -->
    </div>
 
 
   <div class="minfo2">
         <dd class="job_request">
         
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="33.3%"><span class="minfo1"><em><?php echo ($info["gongzuo_chengshi"]); ?></em></span> </td>
            <td width="33.3%"><span class="minfo2"><em><?php echo ($info["yuexin_min"]); ?>k-<?php echo ($info["yuexin_max"]); ?>k</em></span> </td>
            <td width="33.3%"><span class="minfo3"><em><?php echo ($info["xueli"]); ?></em></span></td>
          </tr>
          <tr>
            <td><span class="minfo4"><em><?php echo ($info["gongzuo_xingzhi"]); ?></em></span></td>
            <td><span class="minfo5"><em><?php echo ($info["gongzuo_jingyan"]); ?></em> </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><span class="minfo6"><em><?php echo ($info["zhiwei_youhuo"]); ?></em></span></td>
          </tr>
        </table>

        </dd>
        
        <div class="infocom">
           <a href="/Company/info/id/<?php echo ($info["uid"]); ?>">
            <img src="<?php echo ($info["logo"]); ?>" alt="<?php echo ($info["company_name"]); ?>" />
              <div class="sping lf">
                 <div><h5><?php echo ($info["company_short_name"]); ?></h5> <i <?php if($company['isv']==2)echo 'class="cur"'; ?> ></i></div>
                 <div class="clr"><em>“</em><?php echo ($info["descri"]); ?><em>”</em></div>
                 <span><?php echo ($info["hangye"]); ?></span>
               </div>
            <div class="clr"></div>
          </a>
         
       </div>
           
        <dd class="job_bt">
          <div class="bgf9" style="padding:2px 0px;"><h3 class="description">职位描述</h3></div>
          <!-- <p><strong>岗位职责：</strong></p> -->
          <div style="padding:16px;"><?php echo ($info["descrip"]); ?></div>
        </dd>
   </div>
 
 </div>
 
      <div class="shenqing clr" id="show_resume_status">
         
         	<?php if($myinfo && $myinfo['type']>0){ ?>
         	
         	<?php }else{ ?>
         	
	         	<?php if($my_apply){ ?>
					<a href="javascript:;" class="infobtn1 ljsq">已投递</a>
				<?php }elseif(!$myinfo){ ?>
					<a class="inline infobtn ljsq rt"  href="#yseResume" title="简投递历" >立即申请</a>
				<?php }elseif( count($myinfo['offline_resume'])>1 || ($myinfo['offline_resume'] && $myinfo['is_finish']==1 ) ){ ?>	
					<a class="inline infobtn ljsq rt"  href="#selectResume" title="简投递历" >立即申请</a>
				<?php }elseif($myinfo['offline_resume'] || $myinfo['is_finish']==1){ ?>
					<a class="inline infobtn ljsq rt"  href="#selectResume" title="简投递历" >立即申请</a>					
				<?php }else{ ?>
					<a class="inline infobtn ljsq rt"  href="#noResume" title="简投递历" >立即申请</a>					
				<?php } ?>
			
			<?php } ?>
           
         </div>

       
</div>

  <input type="hidden" value="<?php echo md5($info['uid']); ?>" name="userid" id="userid" />
  <input type="hidden" value="1" name="type" id="resend_type" />
  <input type="hidden" value="<?php echo ($info["jid"]); ?>"  id="jobid" />
  <input type="hidden" value="<?php echo ($info["uid"]); ?>"  id="companyid" />
  <input type="hidden" value="<?php echo ($info["lng"]); ?>" id="positionLng" />
  <input type="hidden" value="<?php echo ($info["lat"]); ?>" id="positionLat" />
<div id="tipOverlay" ></div>



<!------------------------------------- 弹窗lightbox  ----------------------------------------->

 <style>
   #colorbox{ width:80% !important;}
   .popup{ padding-top:10px;}
 </style>
  
  	<?php if(!$myinfo){ ?>
  	
	  	<!-- 未登陆 -->
        <div style="display:none;"> 
          <div id="yseResume" class="popup" style=" height:90px; text-align:center;">
            <div class="jd_delivery">
              <p class="f16">系统检测到你还没有登陆，如果已经登陆请刷新当前页面。</p>
               <a href="/User/login/?ref=/Jobs/info/id/<?php echo ($info["jid"]); ?>" class="btn f16 report_cancel" id="goto_login">确定</a>
            </div>
          </div>
        </div>
	    <!--/#yseResume    $myinfo['offline_resume'] &&-->
	    
	<?php }elseif( count($myinfo['offline_resume'])>1 || ( $myinfo['offline_resume'] && $myinfo['is_finish']==1 ) ){ ?>
	
		<!-- 选择简历 -->
        <div style="display:none;"> 
	    <div class="popup" id="selectResume">
	      <form id="basicInfoForm" method="post" style="line-height:26px;">
	        
	          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="f16">
	            
	            <tr>
	              <td style="position:relative; padding-bottom:12px;">
	              <i class="bitian">*</i>选择简历<br />

	                  <input type="hidden" name="resume_id" id="gongsi_xingzhi" value="" >
	                  <input type="button" class="toudi_sel" id="select_sca" value="选择一份简历" >
	                  <div id="box_sca" class="myselectbox toudi_selbox dn">
	                    <ul class="reset">
	                    
	                    	<?php if($myinfo['is_finish']==1){ ?>
	                        	<li value="online">我的在线简历</li>
	                        <?php } ?>
	                        
	                        <?php if(is_array($myinfo["offline_resume"])): $i = 0; $__LIST__ = $myinfo["offline_resume"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li value="<?php echo ($vv["oid"]); ?>"><?php echo ($vv["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
	                        
	                    </ul>
	                  </div>
	              
	              </td>
	            </tr>
	            
	            <tr>
	              <td style=" padding-bottom:12px;">
                  <i class="bitian">*</i>联系电话<br />

                  <input class="toudi_tel yuan3"  id="myphone" name="tel" value="<?php echo ($myinfo["phone"]); ?>"/>
                  </td>
	            </tr>
	            
	             <tr><td height="10"></td><td></td></tr>
	            <tr>
	               <td align="center" colspan="2">
	                   <input class="mybtn2 f16" id="fasong" type="submit" value="发送" />
	                   <a href="javascript:" class="mybtn2s f16 report_cancel" id="cancelDetail">取消</a>
	                </td>
	            </tr>
	          </table>
	          
	      </form>
	    </div>
      </div>
	    <!--/#infoBeforeDeliverResume-->
	
	<?php }elseif( $myinfo['offline_resume'] || $myinfo['is_finish']==1){ ?>
	
		<!-- 选择简历 -->
          <div style="display:none;"> 
	    <div id="selectResume" class="popup" style="height:196px; overflow:visible;">
	      <form id="basicInfoForm" method="post" style="line-height:26px;">
	        
	          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="f16">
	            
	            <tr>
	              <td style="position:relative; padding-bottom:12px;">
	              <i class="bitian">*</i>选择简历<br />

	                  <input type="hidden" name="resume_id" id="gongsi_xingzhi" value="" >
	                  <input type="button" class="toudi_sel" id="select_sca" value="选择一份简历" >
	                  <div id="box_sca" class="myselectbox toudi_selbox dn">
	                    <ul class="reset">
	                    
	                    	<?php if($myinfo['is_finish']==1){ ?>
	                        	<li value="online">我的在线简历</li>
	                        <?php } ?>
	                        
	                        <?php if(is_array($myinfo["offline_resume"])): $i = 0; $__LIST__ = $myinfo["offline_resume"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li value="<?php echo ($vv["oid"]); ?>"><?php echo ($vv["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
	                        
	                    </ul>
	                  </div>
	              
	              </td>
	            </tr>
	            
	            <tr>
	              <td style=" padding-bottom:12px;">
                  <i class="bitian">*</i>联系电话<br />

                  <input class="toudi_tel yuan3"  id="myphone" name="tel" value="<?php echo ($myinfo["phone"]); ?>"/>
                  </td>
	            </tr>
	            
	             <tr><td height="4"></td><td></td></tr>
	            <tr>
	               <td align="center" colspan="2">
	                   <input class="mybtn2 f16" id="fasong" type="submit" value="发送" />
	                   <a href="javascript:" class="mybtn2s f16 report_cancel" id="cancelDetail">取消</a>
	                </td>
	            </tr>
	          </table>
	          
	      </form>
	    </div>
        </div>
	    <!--/#infoBeforeDeliverResume-->
	
	<?php }else{ ?>
	
		<!-- 投递时，一个简历都没有弹窗 -->
       <div style="display:none;"> 
	    <div id="noResume" class="popup" style="height:90px; line-height:26px;">
	      <table width="100%">
          <tr><td height="10"></td></tr>
	        <tr>
	          <td class="f18 c5" align="center">你还没有可以投递的简历呢</td>
	        </tr>
	        <tr>
	          <td class="c5" align="center">请前往电脑版完善简历在再投递吧~</td>
	        </tr>
	      </table>
	    </div>
        </div>
	    <!--/#noResume-->
	
	<?php } ?>
  
  	<!-- 投简历成功 -->
      <div style="display:none;"> 
	    <div id="yseResume" class="popup" style=" height:90px; text-align:center;">
	      <div class="jd_delivery">
	        <p class="f16">简历已经成功投递出去了，请静候佳音！</p>
	         <a href="javascript:" class="btn f16 report_cancel" id="cancelDetail">确定</a>
	      </div>
	    </div>
       </div>
	<!--/#yseResume-->



    <!-- 举报提交后的弹窗 -->
    <div style="display:none;">
      <div id="receive_report" class="popup" style="height:150px;">
        <h2 style="text-align:center;">你的举报已经成功提交，我们会尽快核实举报内容，<br />对违规职位绝不姑息。</h2>
        <a href="javascript:;" title="关闭" class="report_cancel">关闭</a> </div>
    </div>
    
    <!-- 重复举报的弹窗 -->
    <div style="display:none;">
      <div id="has_report" class="popup" style="height:110px;">
        <h2 class="mtb10">你已经举报过该职位，不能重复举报。</h2>
        <a href="javascript:;" title="关闭" class="report_cancel">关闭</a>
        <input type="hidden" value="0" />
      </div>
    </div>





  <!------------------------------------- end ----------------------------------------->
  
<script>
$(function(){
   $('#select_sca').bind('click',function(e){
		e.stopPropagation();
		$(this).addClass('select_tags_focus');
		$('#select_ind').removeClass('select_tags_focus');
		$('#box_sca').show();
		$('#box_fin').hide();
		$('#stageform .selectBoxShort').hide();
		$('#box_ind').hide();
	});
	$('#box_sca').on('click','ul li',function(e){
		e.stopPropagation();
		var sca = $(this).text();
		var sca2 = $(this).attr('value');
		$('#select_sca').val(sca).removeClass('select_tags_focus');
		$('#gongsi_xingzhi').val(sca2);
		$('#box_sca').hide();
	});
});	
</script>

<script type="text/javascript" src="/Public/Home/js/popup.js"></script> 
  


<!-- 收藏、举报、微信调用的js -->
<script type="text/javascript" src="/Public/Home/js/job_detail.js"></script> 
<!-- 举报 -->
<script>
  $(".report_button").on("click",function(event){
	  
	  
	  $("#problem_txt").val("");
      $("#problem_txt").attr("placeholder","请您描述问题详情，以便于帮您核实情况。");
      placeholderFn() ;
      $("#report_reason").val("请选择举报原因");
      $("#report_reason_hidden").val("");
      $("#select_box").find("div.reason_content").hide() ;
      $("#report_submit").find("span.error").remove() ;
      $(".reason_content").hide();
      $(".report_txt").find("b").text(500);
      $("#report_reason").css("border-color","#f1f1f1");
      $(".report_select").css("border-color","#f1f1f1");
      $.colorbox({inline:true, href:$("div#reportbox"),title:"举报该职位"});
	  

    
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