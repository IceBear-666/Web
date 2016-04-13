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
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/list.css"/>

<script type="text/javascript">
$(window).scroll(function() {		
		if($(window).scrollTop() >= 50){
			$('#toptool').addClass('mgotop');
		}else{    
			$('#toptool').removeClass('mgotop');

		}  
	});
</script>
<div id="toptool" class="setop">

<table class="soubox"  width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="96">
    <div id="mycity" class="mcity">
     <em><?php if(empty($_GET[city])){echo '全国';}elseif($_GET['city']=="不限"){echo '全国';}else{echo $_GET[city];} ?></em>
     <div class="licity dn">
       <a href="javascript:">不限</a>
        <?php $cnum = count($city_list);$ci=0;foreach($city_list as $k=>$v){ $ci++; ?>
       		<a href="javascript:" class="<?php showsx('city',$v['name']) ?>" ><?php echo ($v["name"]); ?></a>
        <?php } ?>
     </div>
  </div>
  </td>
  
    <form  id="searchForm" name="searchForm" action="/Jobs/index.html" method="get">
      <td>
        <input type="text" class="stxt" id="search_input" id="kd_input" name = "kd"  tabindex="1" value="<?php echo ($kd); ?>"  placeholder="搜索你感兴趣的职位"  />
        <input type="hidden" name="city" id="cityInput" value="<?php echo $_GET['city'] ?>"/>
      </td>
     
     <td width="50">
      <input type="submit" class="sbtn" id="search_button" value="搜索" />
     </td>
     
    </form>  
  </tr>
</table>
     
</div>



<div class="mbbox2">
 

    <!-- 职位列表开始-->
     <div class="listjob">
       <ul id="data_list">
       
       <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
         <a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>">
         
           <img src="<?php echo ($v["logo"]); ?>" />
           
           <div class="info">
               <div>
                 <h5><?php echo ($v["company_short_name"]); ?></h5> <i <?php if($v['isv']==2)echo 'class="cur"'; ?> ></i>
               </div>
               <div class="clr"><?php echo ($v["zhiwei_mingcheng"]); ?></div>
               <span><?php echo ($v["gongzuo_chengshi"]); ?></span>
           </div>
           
           <div class="shenq">
              <div class="colac"><?php echo ($v["yuexin_min"]); ?>-<?php echo ($v["yuexin_max"]); ?>k</div>
              <div class="mgzjy"><?php echo ($v["gongzuo_jingyan"]); ?></div>
            </div>
            
           <div class="clr"></div> 
         </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>   
       
       <?php if(!$list)echo '<div class="nocenter"><span><img src="/Public/Home/images/empty.png" />未找到符合要求的记录</span></div>'; ?>
          

       </ul>
     </div>
     <!-- 职位列表结束-->
     
     
<table class="mbottol bgf9" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="javascript:" id="get_more_data">加载更多</a></td>
  </tr>
</table>
  <div class="fttool">
    <a href="/?viewTools=mobile">移动版</a><i>·</i><a href="/?viewTools=pc">电脑版</a><i>·</i><a id="mbgotop" href="javascript:">回到顶部</a>
 </div>
<div class="txtct pdt10 col999 f12"><?php echo C('COPYRIGHT');?> </div>


     <!-- 翻页
    <div class="Pagination"></div>
    -->

   </div>

<div class="clr" style="height:50px;"></div>

</div>



<input value="<?php echo ($city); ?>" id="wap_city" type="hidden" />
<input value="<?php echo ($kd); ?>" id="wap_kd"  type="hidden"/>
<input value="<?php echo ($currPage); ?>" id="wap_cpage"  type="hidden"/>
<input value="<?php echo ($page_count); ?>" id="wap_tpage"  type="hidden"/>


<script type="text/javascript" src="/Public/Home/js/core.min.js"></script>

<script>
$("#mbgotop").click(function(){$("html,body").animate({scrollTop :0}, 300);return false;});
</script>

<script type="text/javascript">
  $('#mycity em').click(function(event){
	  $('.licity').show();
	  event.stopPropagation();
  });
</script>


<script>
$(function(){
	
	$("#get_more_data").click(function(){
		var wap_tpage = parseInt($("#wap_tpage").val());
		var wap_cpage = parseInt($("#wap_cpage").val())+1;
		if(wap_tpage<wap_cpage){
			alert("加载完毕");
    		return false;
		}
		$.ajax({
	        type:"POST",
	        url:ctx +"Jobs/jsonList",
	        data:{city:$("#wap_city").val(),kd:$("#wap_kd").val(),pn:wap_cpage},
	        dataType:'json',
	        beforeSend:function(){
	        },          
	        success:function(data){
	        	//data = $.parseJSON( data );
	        	     	
	        	
	            if(data.success){
	            	var list_data = data.list;
	            	var list_str = '';
	            	if(list_data.length==0){
	            		alert("加载完毕");
	            		return false;
	            	}
	            	for (var i in list_data){
	            		var temp = list_data[i];
	            		var isv='';
	            		if(temp.isv==2){
	            			isv = 'class="cur"';
	            		}
	            		list_str += '<li>'+
	            	         '<a href="/Jobs/info/id/'+temp.jid+'">'+	                    
	                    '<img src="'+temp.logo+'" />'+	                    
	                    '<div class="info">'+
	                        '<div>'+
	                          '<h5>'+temp.company_short_name+'</h5> <i '+isv+' ></i>'+
	                        '</div>'+
	                        '<div class="clr">'+temp.zhiwei_mingcheng+'</div>'+
	                        '<span>'+temp.gongzuo_chengshi+'</span>'+
	                    '</div>'+
	                    
	                    '<div class="shenq">'+
	                       '<div class="colac">'+temp.yuexin_min+'-'+temp.yuexin_max+'k</div>'+
	                       '<div class="mgzjy">'+temp.gongzuo_jingyan+'</div>'+
	                     '</div>'+
	                     
	                    '<div class="clr"></div> '+
	                  '</a>'+
	                 '</li>';
	            	}
	            	$("#wap_cpage").val(wap_cpage);
	            	$("#wap_city").val(data.city);
	            	$("#wap_kd").val(data.kd);
	            	$("#kd_input").val(data.kd);
	            	$("#data_list").append(list_str);
	            }
	            else {
	            	alert(data.message);
	            	        	
	            
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
	            alert("加载失败，请稍后再试");
	            return false;
	        }        
	     });
		
		
	})
	
	
	
	/***************************
 	 * 分页
 	
 	 
 	 <?php if($totalRows>0){ ?>
 	 
	 var getpn='<?php echo $currPage; ?>';
	 $('.Pagination').pager({
	      currPage: getpn,//阿丁，这里获取地址栏参数
	      pageNOName: "pn",
	      form: "searchForm",
	      pageCount: <?php echo ($page_count); ?>,
	      pageSize:  <?php echo ($listRows); ?>
	});
	 
	<?php } ?>
 */
 
	$(".workplace dd").not('.more').children('a').click(function(){
		var cityVal = $(this).text();
		var cityjob = $('#box_expectCity').attr("data-cityjob");
		if(cityjob == 'true'){
			return true;
		}else{
			$('#lc').val(1);
			editForm("cityInput" , cityVal);
			return false;
		}
	});

	$("#box_expectCity dd a").click(function(){
		var cityjob = $('#box_expectCity').attr("data-cityjob");
		var cityVal = $(this).text();
		if(cityjob == 'true'){
			return true;
		}else{
			$('#lc').val(1);
			editForm("cityInput" , cityVal);
			return false;
		}
	});

	$('#options dd div').click(function(){
		var firstName = $(this).parents('dl').children('dt').text();
		var fn = $.trim(firstName);
		//alert(fn);
		if (fn=="月薪范围"){
			editForm("yxInput" , $(this).html());
		}
		else if(fn=="工作经历"){
			editForm("gjInput" , $(this).html());
		}
		else if(fn=="学历要求"){
			editForm("xlInput" , $(this).html());
		}
		else if(fn=="工作性质"){
			editForm("gxInput" , $(this).html());
		}
		else if(fn=="公司性质"){
			editForm("gsInput" , $(this).attr("gsid"));
		}
	});




	$('#box_job ul li').click(function(){
		var mynum = $(this).parents('ul').index()+1;
		editForm("hyInput" , $(this).find('em').html());
		editForm("sjInput" , mynum);
		editForm("zwInput" , "");
		editForm("bigInput" ,'');
	});
	
	$('#bigid li').click(function(){
		var mynum = $(this).index()+1;
		editForm("sjInput" , mynum);
	});
	
	$('#bigid li').click(function(){
		editForm("bigInput" , $(this).find('em').html());
		editForm("hyInput" ,'');
	});

	 $('#box_jobcate dd div').click(function(){
		 //editForm("zwInput" , $(this).html());
		  editForm("zwInput" , $(this).attr("zwid"));
	});
	 $('#mycity a').click(function(){
		 editForm("cityInput" , $(this).html());
	});
	 $('#paixu a').click(function(){
		 editForm("pxInput" , $(this).find('i').html());
	});



	$('.selected').delegate('.select_remove','click',function(event){
		var firstName = $(this).siblings('strong').text();
		var fn = $.trim(firstName);
		if (fn=="月薪范围")
			editForm("yxInput" , "");
		else if(fn=="工作经历")
			editForm("gjInput" , "");
		else if(fn=="学历要求")
			editForm("xlInput" , "");
		else if(fn=="工作性质")
			editForm("gxInput" , "");
		else if(fn=="公司性质")
			editForm("gsInput" , "");
		else if(fn=="职位")
			editForm("zwInput" , "");
	    else if(fn=="领域"){
			editForm("bigInput" , "");
			editForm("sjInput" , "");
		}
	    else if(fn=="行业"){
			editForm("hyInput" , "");
			editForm("sjInput" , "");
		}
	});



	//end


    //展示类数据接口
    (function($){
        var resList = $('.hot_pos').children('li');
        var arr = [];
        resList.each(function(){
            var me = $(this);
            arr.push( me.attr('data-jobId'));
        });
        var z = Math.random();
        var jids = arr.join(',');
        var v = $('#version').val();
        var currUrl = encodeURIComponent( document.URL );
        var params = {
            v:v,
            dl:currUrl,
            jids:jids,
            z:z
        }
        postoA(params);
    })(jQuery)
});

function editForm(inputId,inputValue){
	$("#"+inputId).val(inputValue);
	var keyword = $.trim($('#search_input').val());
	var reg =  /[`~!@\$%\^\&\*\(\)_<>\?:"\{},\/;'[]]/ig;
	var re = /#/g;
	var r = /./g;
	var kw = keyword.replace(reg," ");
	if(kw == ''){
		$('#searchForm').attr('action','?/Jobs/index.html').submit();
	}else{
		kw = kw.replace(re,'井');
		kw = kw.replace(r,'。');
		$('#searchForm').attr('action','?/Jobs/index.html?kw='+kw).submit();
	}
	//$("#searchForm").submit();
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