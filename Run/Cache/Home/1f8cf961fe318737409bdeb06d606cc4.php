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

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/company.css" />

	
  
	<div id="container">
	    
		
<script defer id="_lgpassport_" data-css-site="0" data-css-popup="0" src="/Public/Home/js/company/passport.js" onload="passportInit()"></script>
<script type="text/javascript">
	function passportInit(){
		//noticeInit();
	}
</script>

<input type="hidden" value="1" id="pageNo"/>
<input type="hidden" value="1" id="totalPageCount"/>

<div class="sidebar">
  <div class="mr_myresume_r">
    <div class="jllfnav"> 
    <?php if(!$cur_top_nav['post']){ ?>
    <a class="nav1 cur2" href="/Company/interview.html">简历管理</a> 
    <a class="nav2" href="/Company/createPost.html">发布职位</a>
    <?php }elseif($cur_top_nav['post']){ ?>
    <a class="nav1 " href="/Company/interview.html">简历管理</a> 
    <a class="nav2 cur1" href="/Company/createPost.html">发布职位</a>
    <?php } ?>
      <div class="clr"></div>
    </div>
  </div>
  <dl class="company_center_aside">
  	<?php if($job_info){ ?>
  		<dt><?php echo ($job_info["zhiwei_mingcheng"]); ?></dt>
  	<?php }else{ ?>
    	<dt>我收到的简历</dt>
    <?php } ?>
    
    <dd  <?php if($type == 'unhandle'): ?>class="current"<?php endif; ?> > <a  href="/Company/interview/type/unhandle/job_id/<?php echo ($job_id); ?>">待处理简历</a> <span class="dn unHandle"></span> </dd>
    <!-- 需要根据后台的接口做调整 -->
    <dd <?php if($type == 'prepare'): ?>class="current"<?php endif; ?> > <a href="/Company/interview/type/prepare/job_id/<?php echo ($job_id); ?>">待沟通简历</a> <span class="dn goutong"></span> </dd>
    <dd <?php if($type == 'arranged'): ?>class="current"<?php endif; ?> > <a href="/Company/interview/type/arranged/job_id/<?php echo ($job_id); ?>">已安排面试</a> <span class="dn prepare"></span> </dd>
    <dd <?php if($type == 'refuselist'): ?>class="current"<?php endif; ?> > <a href="/Company/interview/type/refuselist/job_id/<?php echo ($job_id); ?>">不合适简历</a> <span class="dn unTreate"></span></dd>
    <dd  <?php if($type == 'autoFilter'): ?>class="btm current"<?php else: ?>class="btm"<?php endif; ?> > <a  href="/Company/interview/type/autoFilter/job_id/<?php echo ($job_id); ?>">自动过滤简历</a> <span class="dn autoFilter"></span> </dd>
  </dl>
  <!--我的邀请  -->
  
  
  <?php if($job_info){ ?>
  		<dl class="company_center_aside">
  			<a href="/Company/interview/">查看全部职位的简历>></a>
  		</dl>
  	<?php }else{ ?>
    	<dl class="company_center_aside">
		    <dt>我发布的职位</dt>
		    <dd  <?php if($type == 'Publish'): ?>class="current"<?php endif; ?> > <a href="/Company/positions/type/Publish">有效职位</a> </dd>
		    <dd <?php if($type == 'Expired'): ?>class="current"<?php endif; ?> > <a href="/Company/positions/type/Expired">已下线职位</a> </dd>
		</dl>
    <?php } ?>
  
  
  
  
  
  <!-- 待沟通，待处理，自动过滤，采用json调用的--> 
  <script>
	$(function(){
		PASSPORT.util.rpc({
	        url:rctx+"Company/queryTipsNums/jid/<?php echo ($job_id); ?>",
	        succ:function(result){
	    		if(result.state == "1"){
	    			var data = result.content.data;
	    			if(data.unHandleNum > 0){
	    				$(".unHandle").text(data.unHandleNum).removeClass("dn");
	    			}else{
	    				$(".unHandle").text("").addClass("dn");
	    			}
	    			if(data.autoFilterNum > 0){
	    				$(".autoFilter").text(data.autoFilterNum).removeClass("dn");
	    			}else{
	    				$(".autoFilter").text(data.autoFilterNum).addClass("dn");
	    			}
	    			if(data.deliverCount > 0){
	    				$(".deliverCount").text(data.deliverCount).removeClass("dn");
	    			}else{
	    				$(".deliverCount").text(data.deliverCount).addClass("dn");
	    			}
	    			if((data.showNum > 0 || data.showNum == 0 ) && data.limitNum > 0  ){
	    				$(".goutong").text( data.showNum +'/'+ data.limitNum ).removeClass("dn");
	    			}else{
	    				$(".goutong").text( data.showNum +'/'+ data.limitNum).addClass("dn");
	    			}
	    			
	    			if(data.unTreateNum > 0){
	    				$(".unTreate").text(data.unTreateNum).removeClass("dn");
	    			}else{
	    				$(".unTreate").text(data.unTreateNum).addClass("dn");
	    			}
	    			
	    			if(data.prepareNum > 0){
	    				$(".prepare").text(data.prepareNum).removeClass("dn");
	    			}else{
	    				$(".prepare").text(data.prepareNum).addClass("dn");
	    			}
	    			
	    		}else{
	    			alert(message);
	    		};
	    	},
	        fail:function(data){
	            console.log('fail:' + data);
	        }
	    });
	}); 
	
	
	/* jQuery.ajax({
	    url:"http://xxxx/plus/getVipTip.json",
	    dataType: 'jsonp',
	    jsonp: 'jsoncallback'
	}).done(function (response) {
	    callback && callback(response);
	});  */
	
	</script> 
  
  
</div>
<!-- end .sidebar -->


	    <!-- end .sidebar --> 
	    
	    
	    <div class="content">
	      <dl class="company_center_content">
	        <dt>
	        	<?php if($list == ''): ?><h1> <em></em> <?php echo ($stitle); ?>职位 </h1>
	        	<?php else: ?>
	        		<h1> <em></em> <?php echo ($stitle); ?>职位 <span>（共<i id="positionNumber" style="color:#fff;font-style:normal"><?php echo ($total); ?></i>个）</span></h1><?php endif; ?>
	          
	        </dt>
	        <dd>
	        
	        	<?php if($list == ''): if($all_count == 0): ?><div class="addnew"> 你还没有发布职位呢<br>
			            	发布需要的人才信息，让伯乐和千里马尽快相遇……<br>
			            	<a href="<?php echo (WEB_URL); ?>Company/createPost">+发布新职位</a>
					   </div>
	        		<?php else: ?>
	        		
                         <div class="nocenter"><span><img src="/Public/Home/images/empty.png" />你已经没有<?php echo ($stitle); ?>的职位了哦<</span></div>
						<div class="unHandle_links">
	                      	<div>共发布<span><?php echo ($all_count); ?></span>个职位 </div>
	                      	<a href="<?php echo (WEB_URL); ?>Company/positions/type/Publish">有效职位（<?php echo ($Publish_count); ?>）</a> 
							<a href="<?php echo (WEB_URL); ?>Company/positions/type/Expired">已下线职位（<?php echo ($Expired_count); ?>）</a>
							<!-- <a href="<?php echo (WEB_URL); ?>Company/positions/type/yet">待审核职位（<?php echo ($count_2); ?>）</a>
							<a href="<?php echo (WEB_URL); ?>Company/positions/type/fail">未通过审核职位（<?php echo ($count_3); ?>）</a> -->
						</div><?php endif; ?>
				   
			    <?php else: ?>
			    
			    	<form id="searchForm">
			            <input type="hidden" name="type" value="Publish">
			            
			            <ul class="reset my_jobs">
			            
			              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($v["jid"]); ?>">
				                <h3> <a href="<?php echo (WEB_URL); ?>Jobs/info/id/<?php echo ($v["jid"]); ?>" title="Android" target="_blank"><?php echo ($v["zhiwei_mingcheng"]); ?></a> <span>[<?php echo ($v["gongzuo_chengshi"]); ?>]</span> </h3>
				                <span class="receivedResumeNo"><a href="<?php echo (WEB_URL); ?>Company/interview/type/unhandle/job_id/<?php echo ($v["jid"]); ?>">应聘简历(<?php echo (getapplycount($v["jid"])); ?>)</a></span>
				                <div><?php echo ($v["gongzuo_xingzhi"]); ?> / <?php echo ($v["yuexin_min"]); ?>k-<?php echo ($v["yuexin_max"]); ?>k / <?php echo ($v["gongzuo_jingyan"]); ?> / <?php echo ($v["xueli"]); ?></div>
				                <div class="c9">
								      <?php if($type == 'Expired'): ?>下线时间： <?php echo (showday($v["offline_time"])); ?>
								      <?php else: ?>
								      	<?php if($v['refresh_time']){ ?>
								      	 	刷新时间： <?php echo (showday($v["refresh_time"])); ?>
								      	<?php }else{ ?>
								      	 	发布时间： <?php echo (showday($v["job_addtime"])); ?>
								      	<?php } endif; ?>
				                </div>
				                <div class="links">
				                	<?php if($type == 'Expired'): ?><a href="<?php echo (WEB_URL); ?>Company/createPost/jid/<?php echo ($v["jid"]); ?>/from/expired" class="job_edit" >再发布</a> 
															                	
									<?php elseif($type == 'Publish'): ?>
									
										<?php if($v['refresh_time'] && time()-$v['refresh_time']<7*3600*24){ ?>
										
				                		<a href="javascript:void(0)" class="job_refreshed">已刷新<span>每个职位7天内只能刷新一次</span></a> 
				                		
				                		<?php }else{ ?>
				                		
				                		<a href="javascript:void(0)" class="job_refresh">刷新<span>每个职位7天内只能刷新一次</span></a> 
				                		
				                		<?php } ?>
				                		
					                	<a href="<?php echo (WEB_URL); ?>Company/createPost/jid/<?php echo ($v["jid"]); ?>" class="job_edit" target="_blank">编辑</a> 
					                	<a href="javascript:void(0)" class="job_offline">下线</a><?php endif; ?>
				                	
				                	<a href="javascript:void(0)" class="job_del">删除</a> 
				                </div>
				              </li><?php endforeach; endif; else: echo "" ;endif; ?>
			              
			            </ul>
			        </form><?php endif; ?>          
			  
	        </dd>
	        
	        
	      </dl>
	    </div>
	    <!-- end .content --> 
	    

		<!-- 删除操作的核心js -->    
		<script type="text/javascript" src="/Public/Home/js/company/job_list.min.js"></script> 
		<script>
		$('.jc_publisher_tip a.jc_pt_close').bind('click',function(){
		    var jc_publisher_tip = $(this).parent();
		    jc_publisher_tip.slideUp(200);
		});
		</script>
		    
		<script>
		
		/* $(function(){
			PASSPORT.util.rpc({
		        url:rctx+"/recruitment/queryTipsNums.json",
		        succ:function(result){
		    		if(result.state == "1"){
		    			var data = result.content.data;
		    			if(data.unHandleNum > 0){
		    				$(".unHandle").text(data.unHandleNum).removeClass("dn");
		    			}else{
		    				$(".unHandle").text("").addClass("dn");
		    			}
		    			if(data.autoFilterNum > 0){
		    				$(".autoFilter").text(data.autoFilterNum).removeClass("dn");
		    			}else{
		    				$(".autoFilter").text(data.autoFilterNum).addClass("dn");
		    			}
		    			if(data.deliverCount > 0){
		    				$(".deliverCount").text(data.deliverCount).removeClass("dn");
		    			}else{
		    				$(".deliverCount").text(data.deliverCount).addClass("dn");
		    			}
		    			if((data.showNum > 0 || data.showNum == 0 ) && data.limitNum > 0  ){
		    				$(".goutong").text( data.showNum +'/'+ data.limitNum ).removeClass("dn");
		    			}else{
		    				$(".goutong").text( data.showNum +'/'+ data.limitNum).addClass("dn");
		    			}
		    		}else{
		    			alert(message);
		    		};
		    	},
		        fail:function(data){
		            console.log('fail:' + data);
		        }
		    });
		});  */
		</script>
	   
	    

	</div>	    
  	<!-- end #container -->
  
<!-- </div> -->
<!-- end #body -->


</div><!-- end #body-->

<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>

<div class="w960">

    <input type="hidden" id="resubmitToken" value="" />
    <a id="backtop" title="回到顶部" rel="nofollow"></a>


    <!--我要反馈按钮-->
    <div id="product-fk">
        <div id="feedback-icon">
        <div class="fb-icon"></div>
        <span>我要反馈</span>
        <em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
        <em class="error dn fk-suc">&nbsp;&nbsp;反馈提交成功！</em>
    </div>
    </div>


    <div id="feedback-con">
        <div class="pfb-pho-close">
            <div class="pfb-pho"></div>
            <div class="pfb-close"></div>
        </div>
        <em class="error dn"><span>你还没填任何反馈呢</span><i></i></em>
        <form id="product-fb">
            <div class="pfb-txt">
                <textarea placeholder="我是jobsminer的产品经理小飞机，如果你在网站使用时遇到问题或者对网站功能有趣的建议，请告诉我！也许过几天你的想法会变成现实哦~（200字以内）" maxlength="200"></textarea>
            </div>
            <div class="pfb-email" style="height:60px;">
                <input type="text" name="email" placeholder="你的邮箱，方便及时给您回复（选填）"/>
                <span class="ensure">确定</span>
            </div>
        </form>
        <input type="hidden" id="login-email" value="quentin@015guan.com">
    </div>

     <script src="/Public/Home/js/core.min.js" type="text/javascript"></script>
</div>




<div class="clr"></div>
<div id="footer">
	<div class="w960">
         <div class="abnav lf">
           <a href="/News/about.html" target="_bank">关于我们</a><a  target="_bank" href="/News/help.html">帮助中心</a>
         </div>
         <div class="bdsharebuttonbox">
           <div class="ft_share">
                <span class="dn" id="share_jd2">分享到微信</span>
                <div class="jd_share_success2">
                <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" />
                </div>
            </div>
            <a href="<?php echo C('SINA_URL');?>" class="bds_tsina" target="_bank" title="分享到新浪微博"></a>
            <a href="<?php echo C('FB_URL');?>" class="bds_fbook" target="_bank" title="分享到Facebook"></a>
         </div>
         <div class="rt"><?php echo C('COPYRIGHT');?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo C("WEB_SITE_ICP"); ?></div>
    </div>
</div>

<?php } endif; ?>




<a href="#0" class="cd-popup-trigger"></a>




<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		 <iframe src="/User/login.html?md=min" frameborder="0" width="650" height="350" scrolling="no"></iframe>
		<a href="#0" class="cd-popup-close img-replace"></a>
	</div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<script type="text/javascript" src="/Public/Home/js/login_min.js"></script>
<script type="text/javascript">
 $('#login_minpop').bind('click',function(){
        $.colorbox({inline:true, href:"#login_min"});
 });
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
            	
            	if(data.content.do_type==-1){
            		//event.preventDefault();
            		//$('.cd-popup').addClass('is-visible');
            		$(".cd-popup-trigger").trigger("click");
            		//$.colorbox({inline:true, href:"#login_min"});
            		//window.location.href="/User/login/?ref=/Jobs/info/id/<?php echo ($info["jid"]); ?>";
            	}
            	else alert(data.message);

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



<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?552852c7a726f8c3ec23f071d05ebe95";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>


</body>
</html>