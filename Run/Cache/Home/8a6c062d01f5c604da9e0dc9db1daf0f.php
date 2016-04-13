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


<script>
 window.onload= function(){
	 var mygethy = $("li[cid='<?php echo $_GET['hy']; ?>'] a").html();
	 var mygetgs = $("li[xzid='<?php echo $_GET['gs']; ?>']").html();
	 <?php if(!empty($_GET['hy'])){ ?>
	   $('#select_category').val(mygethy);
	 <?php } ?>
	  <?php if(!empty($_GET['gs'])){ ?>
	    $('#select_gs').val(mygetgs);
	  <?php } ?>
 };
</script>


<!-- banner开始 -->
<div class="xjfsbg">
   <div class="w960">
    <div class="listfocusxj">
        <ul class="tihspic">
        
        	<?php $adv_arr = getAdvPic(2,5); foreach($adv_arr as $k=>$v){ ?>
        
            <li>
              <div class="xjinfo">
                 <a href="<?php echo ($v["link"]); ?>">
                   		<?php echo ($v["memo"]); ?>
                 </a>
                 <em></em>
               </div>
              <img src="<?php echo ($v["path"]); ?>" />
            </li>
            
            <?php } ?>
            
            
        </ul>
        <a class="prev" href="javascript:void(0)"></a>
        <a class="next" href="javascript:void(0)"></a>
        <div class="num">
            <ul></ul>
        </div>
    </div>
    <script>
          $(".listfocusxj").hover(function(){$(this).find(".prev,.next").fadeTo("show",0.5)},function(){$(this).find(".prev,.next").hide()})
          $(".tihspic li").hover(function(){$(this).find(".xjinfo").fadeTo("show",1)},function(){$(this).find(".xjinfo").fadeTo("show",0)})
          $(".prev,.next").hover(function(){$(this).fadeTo("show",0.8);},function(){$(this).fadeTo("show",0.5);})
          $(".listfocusxj").slide({ titCell:".num ul" , mainCell:".tihspic" , effect:"left", autoPlay:true, delayTime:800 ,interTime:4000,autoPage:"<a></a>" });
     </script>
   
    </div>
</div>
 <!-- banner结束 --> 
 
 
 

 <!-- 搜索开始 -->
<div class="xjsoubg">
 <div class="w960">
    <!-- 搜索开始-->
    <form class="myform" name="searchForm" action="#" method="get" >
     <div class="lf">
          <input type="hidden" name="hy" value="<?php echo $hy; ?>" id="positionType" />
         <div id="select_bg"><input type="button" class="slhyly"  id="select_category"  value="<?php if($hy)echo $hangye_lingyu[$hy]['title'];else echo '行业领域'; ?>"  /></div>
         <div id="box_job" class="dn">
         
         <?php if(is_array($hangye_lingyu)): $kk = 0; $__LIST__ = $hangye_lingyu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($kk % 2 );++$kk;?><dl>
              <dt><?php echo ($v["title"]); ?></dt>
              <dd>
                <ul class="reset job_main">
                  <?php if(is_array($v["sub"])): $mm = 0; $__LIST__ = $v["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($mm % 2 );++$mm;?><li cid="<?php echo ($m["id"]); ?>"><a href="/Video/?hy=<?php echo ($m["id"]); ?>&xz=<?php echo ($xz); ?>&px=<?php echo ($px); ?>"><?php echo ($m["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
              </dd>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>   
            
            
        </div>
    </div>
    
    
    <div class="lf" style="margin-left:14px;">
        <input type="hidden" name="xz" id="gongsi_xingzhi" value="<?php echo $xz; ?>" >
       <div id="select_bg2"><input type="button" class="slhyly" id="select_gs" value="<?php if($xz)echo $gongsi_xingzhi[$xz];else echo '公司性质'; ?>" ></div>
        <div id="box_sca2" class="selectBox2 dn">
          <ul class="reset">
            <?php if(is_array($gongsi_xingzhi)): $k = 0; $__LIST__ = $gongsi_xingzhi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li xzid="<?php echo ($k); ?>" ><a href="/Video/?hy=<?php echo ($hy); ?>&xz=<?php echo ($k); ?>&px=<?php echo ($px); ?>"><?php echo ($v); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            
          </ul>
        </div>
    </div>
    

     <div class="xjsoubox">
              <input type="text" class="stxt" name = "kd"  tabindex="1" value="<?php echo $kd; ?>"  placeholder="搜索你感兴趣公司的宣讲会"  />
              <input type="submit" class="sbtn" value="搜索" />
         <div class="clr"></div>
     </div>
     
     <a class="xjlsbtn" href="/Video/calendar" target="_blank">校园宣讲会行程表</a>
     
  </form>    
     
 </div>
   <div class="clr"></div>
 </div>
<!-- 搜索结束 -->
 

<div class="w960">
    <div class="slidexjbox">
    
      <div class="hd">
        <ul>
          <li <?php if($px==0)echo 'class="on"'; ?>><a href="/Video/index/"  >热门</a></li>
          <li <?php if($px==1)echo 'class="on"'; ?>><a href="/Video/index/px/1"  >最新</a></li>
        </ul>
      </div>
      
      <div class="bd">
      
        <?php if(!$list)echo '<div class="nocenter"><span><img src="/Public/Home/images/empty.png" />未找到符合要求的记录</span></div>'; ?>
        
        <ul>
        
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
              <em><?php echo ($v["related"]); ?></em><i></i>
              <div class="dianji"><?php echo ($v["hits"]); ?></div>
              <div class="shijian"><?php echo ($v["shichang"]); ?></div>
                 <a class="max" href="/Video/info/id/<?php echo ($v["vid"]); ?>" target="_blank"><img src="<?php echo ($v["thumb"]); ?>" /></a>
              <div class="xjinfo">
                 <a class="xjtil lf"  href="/Video/info/id/<?php echo ($v["vid"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a>
                 <div class="xjdata rt"><?php echo (showday($v["addtime"],"Y/d/m")); ?></div>
              </div>
           </li><?php endforeach; endif; else: echo "" ;endif; ?>
           
        </ul>
        
        
      </div>
      
      <script type="text/javascript">jQuery(".slidexjbox").slide({effect:"fade",trigger:"click"});</script> 
    </div>
 
  <div class="h20"></div>   
       <!-- 翻页-->
       <?php echo ($page); ?>
       
  <div class="h20"></div>  
 
      
</div>


<script>
   $(document).ready(function(){
   $(".max").hover(function() {
	$(this).css({'z-index' : '10'});
	$(this).find('img').addClass("hover").stop()
	.animate({marginTop: '-10px', marginLeft: '-10px', width: '320px', height: '170px',}, 300);
	} , function() {
	$(this).css({'z-index' : '0'});
	$(this).find('img').removeClass("hover").stop()
	.animate({marginTop: '0', marginLeft: '0',width: '300px', height: '150px', }, 300);
	});
  });
</script>


<script>
   /* 选行业*/
	$(document).click(function(){
		$('#box_job').hide();
		$('#select_bg').removeClass('selectrFocus');
		$('#box_sca2').hide();
		$('#select_bg2').removeClass('selectrFocus');
	});
		
   $('#select_bg').bind('click',function(e){
		e.stopPropagation();
		$(this).addClass('selectrFocus');
		$('#box_job').show();
		$('#box_sca2').hide();
		$('#select_bg2').removeClass('selectrFocus');
	});
		
	$('#box_job').on('click','.job_main li',function(e){
		e.stopPropagation();
		var category = $(this).text();
		var mycid = $(this).attr('cid');
		var mynum = $(this).parents('dl').index();
		var category_id = $(this).attr("id");
		$('#select_category').val(category);
		$('#positionType').val(mycid);
		$('#select_bg').removeClass('selectrFocus');
		$('#box_job').hide();
	});
</script>

<script>
   /* 选性质*/
	$('#select_bg2').bind('click',function(e){
		$('#box_job').hide();
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
		$('#gongsi_xingzhi').val(sca2);
		$('#select_bg2').removeClass('selectrFocus');
		$('#box_sca2').hide();
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