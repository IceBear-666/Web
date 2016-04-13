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
	 $("ul[cid='<?php echo $_GET['cid']; ?>']").show();
	 $("li[sid='<?php echo $_GET['sid']; ?>']").addClass('cur');
	 $("li[cid='<?php echo $_GET['cid']; ?>']").addClass('cur');
 };
</script>



<div class="w960 mt30">

<!-- 1分类开始 -->
    <div id="xiacity" class="xiacate bgf9">
    
       <ul>
          <h5>华东及华北地区</h5>
          <div class="cate2 lf">
            <?php foreach($area_citys[1] as $k=>$v){ ?>
            <li cid="<?php echo ($v["aid"]); ?>"><?php echo ($v["name"]); ?></li>
            <?php } ?>
          </div>
       </ul>
       
       <ul>
          <h5>华东地区</h5>
          <div class="cate2 lf">
            <?php foreach($area_citys[2] as $k=>$v){ ?>
            <li cid="<?php echo ($v["aid"]); ?>"><?php echo ($v["name"]); ?></li>
            <?php } ?>
          </div>
       </ul>
       
       <ul>
          <h5>华东及中南地区</h5>
            <div class="cate2 lf">
              <?php foreach($area_citys[3] as $k=>$v){ ?>
            <li cid="<?php echo ($v["aid"]); ?>"><?php echo ($v["name"]); ?></li>
            <?php } ?>
           </div>
       </ul>
       
       <ul>
          <h5>西北及西南地区</h5>
           <div class="cate2 lf">
             <?php foreach($area_citys[4] as $k=>$v){ ?>
            <li cid="<?php echo ($v["aid"]); ?>"><?php echo ($v["name"]); ?></li>
            <?php } ?>
          </div>
       </ul>
       
       <div class="clr"></div>
      <img class="ewm" src="/Public/Home/images/ewm.gif" />
    </div>
<!-- 1分类结束 --> 
  
  
<!-- 2分类开始 -->   
     <div id="school" class="xiacate2 dn">
     
     	<?php foreach($area_citys as $k=>$v){ ?>            
            
	       
	       
	       <?php foreach($v as $kk=>$vv){ ?>  
	       
	       <ul cid="<?php echo ($vv['aid']); ?>">
	       
	          <?php foreach($school_arr[$vv['aid']]['sub'] as $kkk=>$vvv){ ?>
	          <li sid="<?php echo ($vvv['sid']); ?>"><?php echo ($vvv['name']); ?></li>
	          <?php } ?>
	          
	       </ul>
	          
	       <?php } ?>   
	          
	       
       
       <?php } ?>
       
       
        <div class="clr"></div>
     </div>
<!-- 2分类结束 --> 


 <!-- 搜索开始 -->
   <div class="clr"></div>
   <div class="rmsou">
   
     <div class="rmqy lf">
         <span class="lf">热门企业：</span>
         <?php if(is_array($company_list)): $i = 0; $__LIST__ = $company_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/Company/info/id/<?php echo ($v["uid"]); ?>" target="_blank"><?php echo ($v["company_short_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
      
     <form id="searchForm" name="searchForm" action="" method="get" >
       
        <input type="hidden" name="sid" id="scInput" value="<?php echo $sid; ?>"/>
       <div class="xjsoubox" style="float:right;">
                <input type="text" class="stxt" name = "keyword"  tabindex="1" value="<?php echo $keyword; ?>"  placeholder="搜索高校或企业名称"  />
                <input type="submit" class="sbtn" value="搜索" />
           <div class="clr"></div>
       </div>
    </form>    
        <div class="clr"></div>
   </div>



 <!-- 线下宣讲列表开始-->
     <div id="xiajlist" class="xiajlist">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr class="mtil">
              <td width="30"></td>
              <td width="160">日期</td>
              <td width="70">时间</td>
              <td width="100">参与企业</td>
              <td width="130">参与学校</td>
              <td>详细地点</td>
              <td width="30">收藏</td>
              <td width="30"></td>
           </tr>
            
            <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr <?php if($k%2== '1'): ?>class="bgf9"<?php endif; ?>>
              <td></td>
              <td><?php echo ($v["date_ymd"]); ?>(周<?php echo getWeekName($v['date_ymd']); ?>)</td>
              <td><?php echo ($v["date_time"]); ?></td>
              <td><a target="_blank" href="/Company/info/id/<?php echo ($v["uid"]); ?>"><?php echo ($v["company"]); ?></a></td>
              <td><a cid="1" sid="2" href="/Video/calendar/?sid=<?php echo ($v["sid"]); ?>"><?php echo ($v["school"]); ?></a></td>
              <td><?php echo ($v["address"]); ?></td>
              <td align="center">
              <?php if(!$cuser_type){ ?>
              	<a <?php if(in_array($v['vid'],$cids))echo 'class="mystar" onclick="return user_collection('.$v['vid'].',0,3,1)" title="取消收藏"';else echo 'class="mystaradd" onclick="return user_collection('.$v['vid'].',1,3,1)" title="加入收藏"'; ?> href="javascript:void(0);" ></a>
              <?php } ?>
              </td>
              <td></td>
           </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          
       </table>

     </div>
   <!-- 线下宣讲列表结束-->
       
       
  <!-- 翻页-->
    <div class="Pagination"></div> 
     
</div>

 

<!-- 地区学校筛选 -->
<script>

 $('#xiacity').on('click','ul li',function(){
	   $("#school").show();
	   var mcity = $(this).attr('cid');
	   $("#school ul[cid="+mcity+"]").show().siblings('ul').hide();
	   $("li[cid="+mcity+"]").addClass('cur').siblings('li').removeClass('cur');
	   $("li[cid="+mcity+"]").addClass('cur').parents('ul').siblings().find("li").removeClass('cur');
	});
	
 $('#school').on('click','ul li',function(){
	   var city = $(this).parent().attr('cid');
	   var schoolid = $(this).attr('sid');
	   editForm("cityInput",city);
	   editForm("scInput",schoolid);
 });
 
 /*  $('#xiajlist').on('click','a',function(){
	   var city2 = $(this).attr('cid');
	   var schoolid2 = $(this).attr('sid');
	   editForm("cityInput",city2);
	   editForm("scInput",schoolid2);
 }); */

</script>  



<script type="text/javascript" src="/Public/Home/js/core.min.js"></script>
<script>
	
/****** 分页开始 ****/
 	<?php if($totalRows>0){ ?>
 	 
	 var getpn='<?php echo $currPage; ?>';
	 $('.Pagination').pager({
	      currPage: getpn,
	      pageNOName: "pn",
	      form: "searchForm",
	      pageCount: <?php echo ($page_count); ?>,
	      pageSize:  <?php echo ($listRows); ?>
	});
	
	<?php } ?>



/****** 响应提交表单 ****/
function editForm(inputId,inputValue){
	$("#"+inputId).val(inputValue);
	var keyword = $.trim($('#search_input').val());
	var reg =  /[`~!@\$%\^\&\*\(\)_<>\?:"\{},\/;'[]]/ig;
	var re = /#/g;
	var r = /./g;
	var kw = keyword.replace(reg," ");
	if(kw == ''){
		$('#searchForm').attr('action','?/xj_xianxia.html').submit();
	}else{
		kw = kw.replace(re,'井');
		kw = kw.replace(r,'。');
		$('#searchForm').attr('action','?/xj_xianxia.html?kw='+kw).submit();
	}
}

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