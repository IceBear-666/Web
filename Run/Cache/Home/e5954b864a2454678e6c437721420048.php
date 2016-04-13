<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="UTF-8">

<title><?php if($page_title) echo $page_title;else echo C('WEB_SITE_TITLE'); ?> </title>
<meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>">
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>">
<meta name="baidu-site-verification" content="tPqpxinOFC" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/reset.css" />
<link rel="shortcut icon" type="image/ico" href="/favicon.ico">

<script type="text/javascript" src="/Public/Home/js/jquery.1.10.1.min.js" ></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lib.min.js"></script>

<script src="/Public/Home/js/ajaxfileupload.js" type="text/javascript"></script>

<!--New delete-->

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/external.min.css" />
<script type="text/javascript" src="/Public/Home/js/company/jobs.js"></script>        
<script type="text/javascript" src="/Public/Home/js/company/company.js"></script>         
<script type="text/javascript" src="/Public/Home/js/core.min.js"></script> 
<script type="text/javascript" src="/Public/Home/js/popup.js"></script> 
<!--New delete-->

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

<style type="text/css">
  
  .index_downlaod{
    font-size: 16px;
    width: 120px;
    height: 36px;
    line-height: 36px;
    border-radius: 20px;
    background-color: #fff;
    padding: 10px 30px;
  }
  .header .index_donwload_container {
    float: right;
    width: 125px;
    padding-top: 12px;
  }
</style>
</head>


<body>
<div id="body">

<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header">
        <div class="w960">
          <div class="logo"><a <?php echo ($cur_top_nav["plugin"]); ?> href="/index.html"><img src="/Public/Home/images/logo.png" /></a></div>
          
          
          <?php if(is_login()): if(getUsersSession('type')==1){ ?>
          
          	<!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/info.html">我的公司</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Company/interview.html">简历管理</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div> -->
            <div class="nav">
                <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
                <a <?php echo ($cur_top_nav["install"]); ?> href="/Install/install.html">安装教程</a>
                <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/companylist.html">网申时间表</a>
                <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a>
               <!--  <a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a> -->
              </div>
          		
          	<?php }else{ ?> 
          	
          		<!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a><a <?php echo ($cur_top_nav["collections"]); ?> href="/User/collections.html">我的收藏</a></div>  -->
              <div class="nav">
                <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
                <a <?php echo ($cur_top_nav["install"]); ?> href="/Install/install.html">安装教程</a>
                <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/companylist.html">网申时间表</a>
                <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a>
                <!-- <a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a> -->
              </div>
          		
          	<?php } ?>
          
          	<!-- <div class="login"> -->
            <div class="index_donwload_container">
            
	          	<!-- <div class="icous">
                    <div class="inusnav">
                      <em></em>
                      <?php if(getUsersSession('type')==0){ ?>
                      <a href="/User/delivery.html">投递管理</a>
                      <?php } ?>
                      <a href="/User/index.html">账号设置</a>
                      <a href="<?php echo U('User/logout');?>">退出</a>
                    </div>
                </div> -->
                <a href="#plugindownload" class="index_downlaod inline cboxElement" title="请选择你当前的浏览器（更多浏览器正在努力开发中）">立即下载</a>
	          </div>
          
          <?php else: ?>
          
	          <!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div> -->

            <div class="nav">
              <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
              <a <?php echo ($cur_top_nav["install"]); ?> href="/Install/install.html">安装教程</a>
              <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/companylist.html">网申时间表</a>
              <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a>
            </div>

	          <!-- <div class="login"> -->
            <div class="index_donwload_container">
	          <a href="#plugindownload" class="index_downlaod inline cboxElement" title="请选择你当前的浏览器（更多浏览器正在努力开发中）">立即下载</a>
	          <!-- <a class="sty"  href="<?php echo U('User/login');?>">登录</a><a class="sty" href="<?php echo U('User/register');?>">注册</a> -->
	          </div><?php endif; ?>
          
          </div>
          <div class="clr"></div>
        </div>
      
	</div>

</div>	  
<div style="display:none;"> 
    <style>
    .clear {clear: both;}
    .jm_plugindownload {padding: 30px 50px;}
    .jm_plugindownload p{padding-bottom: 40px;}
    .btn-browser-container {width: 475px; clear: both;}
    .popup{ padding:0;} 
    .btn-browser{ margin: 10px 0;  padding: 10px 20px 10px 10px;  width: 180px;  height: 40px; line-height: 40px; border: 1px solid #dbdbdb;border-radius: 5px;} 
    .btn-browser span {width: 50px; height: 50px; display: inline-block;}
    .btn-browser span img{vertical-align:middle;}
    .btn-disabled {background-color: #f5f5f5;}
    .btn-chrome{float: left;} 
    .btn-ie{float: right;}  
    .btn-liebao{float: left;} 
    .btn-360{float: right;} 
    
    </style>
    <div id="plugindownload" class="popup" style="">
        <div class="jm_plugindownload">
            <div class="btn-browser-container">
                <a class="btn-browser btn-chrome" target="_blank" href="/Install/install.html"><span><img src="/Uploads/Plugin/chrome.png"></span>Chrome 浏览器</a>
                <a class="btn-browser btn-ie" target="_blank" href="https://ext.chrome.360.cn/webstore/detail/cjbbilalppleefkdldcnjggncniphbjf"><span><img src="/Uploads/Plugin/ie.png"></span>360 安全浏览器</a>
            </div>
            <div class="btn-browser-container">
                <a class="btn-browser btn-liebao btn-disabled"><span><img src="/Uploads/Plugin/liebao.png"></span>即将上线</a>
                <a class="btn-browser btn-360 " target="_blank" href="https://ext.chrome.360.cn/webstore/detail/cjbbilalppleefkdldcnjggncniphbjf"><span><img src="/Uploads/Plugin/360.png"></span>360 极速浏览器</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div><?php endif; ?>

<link rel="stylesheet" type="text/css" href="/Public/Home/css/list.css"/>
<script>
/* 显示对应的职位 */
 window.onload= function(){
	 var myindex=$(this).index()+<?php echo $_GET['sj']; ?>;
	 $('#box_jobcate dl dd').eq(myindex).show();}
</script>

<div class="w960 mt30">
   <!-- 左侧菜单开始-->
   <div class="lw240">
     <div class="navbg">
      <h2 class="shownav">行业领域<i class="btnsj <?php if(!empty($_GET['bigid'])){echo 'btnsjhv';}elseif(!empty($_GET['hy'])){echo 'btnsjhv';} ?>"></i></h2>
            <?php geturl('领域','bigid'); ?>
            <?php geturl('行业','hy'); ?>
        <div class="mod-menu <?php if(!empty($_GET['hy'])){echo 'dn';}elseif(!empty($_GET['bigid'])){echo 'dn';} ?>">


          <!-- 一级分类 -->
          <ul id="bigid" class="menu-item">

            <?php if(is_array($hangye_lingyu)): $kk = 0; $__LIST__ = $hangye_lingyu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($kk % 2 );++$kk;?><li><em class="dn"><?php echo ($v["id"]); ?></em><?php echo ($v["title"]); ?></li>

            <?php if($kk==5)echo '<div class="mr-item dn">'; endforeach; endif; else: echo "" ;endif; ?>

            <?php if($kk>4){ ?>

            </div>
            <a class="shownavmr minmr" href="javascript:void(0)">更多<i class="btnsj1"></i></a>

            <?php } ?>

          </ul>


          <!-- 二级分类 -->
         <div id="box_job" class="menu-cont">

         	<?php if(is_array($hangye_lingyu)): $kk = 0; $__LIST__ = $hangye_lingyu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($kk % 2 );++$kk;?><ul>
               <?php if(is_array($v["sub"])): $mm = 0; $__LIST__ = $v["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($mm % 2 );++$mm;?><li><em><?php echo ($m["id"]); ?></em><?php echo ($m["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
               <div class="clr"></div>
             </ul><?php endforeach; endif; else: echo "" ;endif; ?>


          </div>

        </div>

         <h2 class="shownav1 fgxian <?php if(empty($_GET['sj'])) echo 'dn'; ?>">职位<i class="btnsj <?php if(!empty($_GET['zw'])) echo 'btnsjhv'; ?>"></i></h2>
         <?php geturl('职位','zw'); ?>
        <div id="box_jobcate" class="<?php if(!empty($_GET['zw'])) echo 'dn'; ?> <?php if(empty($_GET['sj'])) echo 'dn'; ?>">
          <dl>

           <?php if(is_array($hangye_lingyu)): $kk = 0; $__LIST__ = $hangye_lingyu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><dd>
              <?php if(is_array($vv["zhiwei_leibie"])): $mm = 0; $__LIST__ = $vv["zhiwei_leibie"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($mm % 2 );++$mm;?><div zwid="<?php echo ($m["id"]); ?>"><?php echo ($m["title"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
            </dd><?php endforeach; endif; else: echo "" ;endif; ?>


          </dl>
        </div>


        <div id="options" class="greybg">

          <dl class="<?php showsty('yx','show1'); ?>">
            <dt>月薪范围<em  class="<?php showsty('yx','show2'); ?>"></em></dt>
            <?php geturl('月薪范围','yx'); ?>
            <dd class="<?php showsty('yx') ?>">
              <div>2k以下</div>
              <div>2k-5k</div>
              <div>5k-10k</div>
              <div>10k以上</div>
            </dd>
          </dl>

          <dl class="<?php showsty('gs','show1'); ?>">
            <dt>公司性质<em  class="<?php showsty('gs','show2'); ?>"></em></dt>
            <?php geturl('公司性质','gs'); ?>
            <dd class="<?php showsty('gs') ?>">
              <?php if(is_array($gongsi_xingzhi)): $k = 0; $__LIST__ = $gongsi_xingzhi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div gsid='<?php echo ($k); ?>'><?php echo ($v); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
            </dd>
          </dl>


          <dl class="<?php showsty('xl','show1'); ?>">
            <dt>学历要求<em  class="<?php showsty('xl','show2'); ?>"></em></dt>
            <?php geturl('学历要求','xl'); ?>
            <dd class="<?php showsty('xl') ?>">
              <div>不限</div>
              <div>大专</div>
              <div>本科</div>
              <div>硕士</div>
              <div>博士</div>
            </dd>
          </dl>

         <dl class="<?php showsty('gx','show1'); ?>">
            <dt>工作性质<em  class="<?php showsty('gx','show2'); ?>"></em></dt>
            <?php geturl('工作性质','gx'); ?>
            <dd class="<?php showsty('gx') ?>">
              <div>全职</div>
              <div>兼职</div>
              <div>实习</div>
            </dd>
          </dl>


          <dl class="<?php showsty('gj','show1'); ?>">
            <dt>工作经历<em  class="<?php showsty('gj','show2'); ?>"></em></dt>
            <?php geturl('工作经历','gj'); ?>
            <dd class="<?php showsty('gj') ?>">
				<div>在校学生</div>
              <div>应届毕业生</div>
              <div>1年以下</div>
              <div>1-3年</div>
              <div>3年以上</div>              
            </dd>
          </dl>

        </div>



     </div>
     </div>

  <!-- 右侧列表开始-->
   <div class="rw680">

     <!-- 搜索开始-->
     <div class="soubox">


     <form id="searchForm" name="searchForm" action="/Jobs/index.html" method="get">
        <input type="text" class="stxt" id="search_input" name = "kd"  tabindex="1" value="<?php echo ($kd); ?>"  placeholder="搜索你感兴趣的职位"  />
        <input type="hidden" name="spc" id="spcInput" value="1"/>
        <input type="hidden" name="bigid" id="bigInput" value="<?php echo $_GET['bigid'] ?>"/>
        <input type="hidden" name="pl" id="plInput" value="<?php echo $_GET['pl'] ?>"/>
        <input type="hidden" name="hy" id="hyInput" value="<?php echo $_GET['hy'] ?>"/>
        <input type="hidden" name="zw" id="zwInput" value="<?php echo $_GET['zw'] ?>"/>
        <input type="hidden" name="gj" id="gjInput" value="<?php echo $_GET['gj'] ?>"/>
        <input type="hidden" name="xl" id="xlInput" value="<?php echo $_GET['xl'] ?>"/>
        <input type="hidden" name="yx" id="yxInput" value="<?php echo $_GET['yx'] ?>"/>
        <input type="hidden" name="gs" id="gsInput" value="<?php echo $_GET['gs'] ?>" />
        <input type="hidden" name="gx" id="gxInput" value="<?php echo $_GET['gx'] ?>" />
        <input type="hidden" name="px" id="pxInput" value="<?php echo $_GET['px'] ?>" />
        <input type="hidden" name="sj" id="sjInput" value="<?php echo $_GET['sj'] ?>"/>
        <input type="hidden" name="labelWords" id="labelWords" value="label" />
        <input type="hidden" name="lc" id="lc" value="" />
        <!-- <input type="hidden" name="workAddress" id="workAddress" value=""/> -->
        <input type="hidden" name="city" id="cityInput" value="<?php echo $_GET['city'] ?>"/>
        <!-- <input type="hidden" name="requestId" id="requestId" value=""/> -->
        <input type="submit" class="sbtn" id="search_button" value="搜索" />
    </form>
         <div class="clr"></div>
     </div>

     <div id="mycity" class="shaixuan">
       <span>工作地点：</span>
       
       <a href="#" class="<?php showsx('city','不限');if(!$city)echo ' cur'; ?>">不限</a><em>|</em>

       <?php $cnum = count($city_list);$find=0;$ci=0;foreach($city_list as $k=>$v){ $ci++; if($v['name']==$city)$find=1; ?>
       		<a href="#" class="<?php showsx('city',$v['name']) ?>" ><?php echo ($v["name"]); ?></a><?php if($cnum!=$ci) echo'<em>|</em>'; ?>
       <?php } ?>
       
       <?php if(!$find && $city){ ?>
       <em>|</em><a href="#" class="<?php showsx('city',$city) ?>" ><?php echo ($city); ?></a>
       <?php } ?>
       
       <em>|</em><div id="cityqt" class="cityqt">更多<i class="btnsj btnsjhv"></i></div>
       
       <div class="clr"></div>
       
<!--第三期 其他城市-->  
     
       <div id="morecity" class="morecity dn">
       
	       <?php $cnum = count($city_list_other);$ci=0;foreach($city_list_other as $k=>$v){ $ci++; if(!$find && $city==$v['name']){continue;} ?>
	       		<a href="#" class="<?php showsx('city',$v['name']) ?>" ><?php echo ($v["name"]); ?></a><?php if($cnum!=$ci) echo'<em>|</em>'; ?>
	       <?php } ?>

       </div>
       
     </div>

     <div id="paixu" class="shaixuan">
       <span>排序：</span>
       <a href="#" class="<?php showsx('px','1');if($px<2 )echo ' cur'; ?>"><i>1</i>人气</a><em>|</em>
       <a href="#" class="<?php showsx('px','2') ?>"><i>2</i>最新更新</a>
       <div class="clr"></div>
     </div>


<script>
 $("#cityqt").click(function(){
	    $("#cityqt i").toggleClass("btnsjhv"); //当前按钮样式
		$(".morecity").slideToggle(100).toggleClass("domshow");//需要展开的内容
		return false;
    });
	

$(document).click(function(event){
	if($("#morecity").hasClass("domshow")){
		$("#cityqt i").toggleClass("btnsjhv");
        $(".morecity").slideToggle(100);
		$("#morecity").removeClass("domshow");
		return false;
	}
});
	
	
 </script>
     <!-- 职位列表开始-->
     <div class="listjob">
       <ul>
       
       <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if($key%2==0) echo 'class="bgf9"'; ?> >
           <a href="/Company/info/id/<?php echo ($v["uid"]); ?>" target="_blank"><img src="<?php echo ($v["logo"]); ?>" /></a>
           <div class="info">
             <a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>" target="_blank" class="til"><?php echo ($v["zhiwei_mingcheng"]); ?></a><font class="f16">[<?php echo ($v["gongzuo_chengshi"]); ?>]</font><br />
             月薪：<?php echo ($v["yuexin_min"]); ?>-<?php echo ($v["yuexin_max"]); ?> k&nbsp;&nbsp;&nbsp;经验：<?php echo ($v["gongzuo_jingyan"]); ?>&nbsp;&nbsp;&nbsp;学历要求：<?php echo ($v["xueli"]); ?><br />
             职位诱惑：<?php echo ($v["zhiwei_youhuo"]); ?>
             <span><a class="til" href="/Company/info/id/<?php echo ($v["uid"]); ?>" target="_blank"><?php echo ($v["company_short_name"]); ?></a> - <?php echo ($v["hangye"]); ?></span>
           </div>
           
			<?php if($cuser_type){}else{ ?>
            	<a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>" class="mybtn shenq">申请职位</a>
            <?php } ?>
            
          </li><?php endforeach; endif; else: echo "" ;endif; ?>   
       
       <?php if(!$list)echo '<div class="nocenter"><span><img src="/Public/Home/images/empty.png" />未找到符合要求的记录</span></div>'; ?>
          

       </ul>
     </div>
     <!-- 职位列表结束-->


     <!-- 翻页-->
    <div class="Pagination"></div>

   </div>

<div class="clr" style="height:50px;"></div>

</div>

<script type="text/javascript" src="/Public/Home/js/core.min.js"></script>

<script>
$(function(){
    $(".shownav").click(function(){
		$(this).find("i").toggleClass("btnsjhv");
         $('.mod-menu').slideToggle(200);//需要展开的内容
    });
	 $(".shownav1").click(function(){
		$(this).find("i").toggleClass("btnsjhv");
        $('#box_jobcate').slideToggle(200);//需要展开的内容
    });

	 $(".shownavmr").click(function(){
		$(this).find("i").toggleClass("btnsjhv1");
        $(this).prev().slideToggle(200);//需要展开的内容
		$(".menu-cont").hide();
    });

	$(".shownavmr").hover(function(){
		$(".menu-cont").hide();
		$(".menu-item li").removeClass("mouse-bg");
		$(".mr-item li").removeClass("mouse-bg");
    });
	 $("#options dl dt").click(function(){
		// if($(this).parent().hasClass("slideUp")==''){
		   $(this).children("em").toggleClass("transform");
		   $(this).parent().children("dd").slideToggle(200);
		// }
		
    });

});

</script>

<script type="text/javascript">
$(document).ready(function(){
	var mod_menu=$(".mod-menu");//导航模块区
	var menu=function(){
		var menuItem=$(".menu-item li");//选择导航列表
		var mrItem=$(".mr-item li");//选择导航列表
		menuItem.each(function(){
			var _index=$(this).index();//获取当前选择菜单列表的索引
			$(this).mouseenter(function(){
				var y = $(this).position().top+1;//获取当前鼠标滑过的列表的顶部坐标
				$(".menu-cont").show();
				$(".menu-cont").css("top",y);//需要显示的对应索引内容
				$(this).addClass("mouse-bg").siblings().removeClass("mouse-bg");
				$(".menu-cont>ul").eq(_index).show().siblings().hide();
				mrItem.removeClass("mouse-bg");
			});
		});

		mrItem.each(function(){
			var _index=$(this).index()+5;//获取当前选择菜单列表的索引
			$(this).mouseenter(function(){
				var y = $(this).position().top+1;
				$(".menu-cont").show();
				$(".menu-cont").css("top",y);
				$(this).addClass("mouse-bg").siblings().removeClass("mouse-bg");
				$(".menu-cont>ul").eq(_index).show().siblings().hide();
				$(this).parent().siblings('li').removeClass("mouse-bg");
			});
		});
		/*导航菜单菜单*/
		$(".mod-menu").mouseleave(function(){
			$(".menu-cont").hide();
			menuItem.removeClass("mouse-bg");
		})
	}//展开二级菜单
	menu();//执行展开二级菜单函
});
</script>



<script>
$(function(){
	/***************************
 	 * 分页
 	 */
 	 
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

</div><!-- end #body-->

<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>

<div class="w960">

    <input type="hidden" id="resubmitToken" value="" />
    <a id="backtop" title="回到顶部" rel="nofollow"></a>


    <!--我要反馈按钮-->
   <!--  <div id="product-fk">
        <div id="feedback-icon">
        <div class="fb-icon"></div>
        <span>我要反馈</span>
        <em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
        <em class="error dn fk-suc">&nbsp;&nbsp;反馈提交成功！</em>
    </div>
    </div> -->

     <style type="text/css">
     #product-kf {width: 50px;
        height: 50px;
        position: fixed;
        bottom: 80px;
        margin-left: 1000px;
        cursor: pointer;
        z-index: 21;
    }
    #kefu-icon {position: relative;}
    #kefu-icon .fb-icon {width: 30px; height: 30px;  margin: 0 auto; background: url(http://www.jobsminer.cc/Public/Home/images/feedback.png) no-repeat; display: block;}
    #kefu-icon:hover .fb-icon{ background-position: 0px -31px;}
    #kefu-icon:hover span{ color: #F9753E;}
    #kefu-icon span{font-size: 12px; color: #555;/* display: block; width: 60px;position: absolute;left: 0; bottom: -15px;*/}
    #product-fknew{ display: inline-block;}
    #footer .fk-suc{position: absolute; bottom: -20px; left: 0;}
    #footer .abnav{position: relative;}
    </style>
    <div id="product-kf">
        <div id="kefu-icon">
            <div class="fb-icon"></div>
            <span>在线客服</span>
        </div>
    </div> 
    <script type="text/javascript">
         $('#product-kf').bind('click',function(){
                window.open('http://wpa.qq.com/msgrd?v=3&uin=2535357251&site=qq&menu=yes');
         });
    </script>
    
</div>




<div class="clr"></div>
<div id="footer">
	<div class="w960">
         <div class="abnav lf">
            <a href="/News/about.html" target="_bank">关于我们</a><a  target="_bank" href="/News/help.html">帮助中心</a>
            <!-- <a href="/?viewTools=mobile">移动版</a> -->
            <div id="product-fknew">
                <div id="feedback-iconnew">
                    <div class="fb-icon"></div>
                    <a>我要反馈</a>
                    <span></span>
                    <em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
                    <em class="error dn fk-suc">反馈提交成功！</em>
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
        <div class="bdsharebuttonbox">
           <div class="ft_share">
                <span class="dn" id="share_jd2">分享到微信</span>
                <div class="jd_share_success2">
               <!--  <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" /> -->
               <img src="/images/ebg/code.png">
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