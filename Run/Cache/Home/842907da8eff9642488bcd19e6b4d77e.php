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
    width: 120px;
    height: 36px;
    line-height: 36px;
    border-radius: 20px;
    background-color: #fff;
    padding: 10px 25px;
  }
</style>
</head>


<body>
<div id="body">

<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header">
        <div class="w960">
          <div class="logo"><a href="/index.html"><img src="/Public/Home/images/logo.gif" /></a></div>
          
          
          <?php if(is_login()): if(getUsersSession('type')==1){ ?>
          
          	<!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/info.html">我的公司</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Company/interview.html">简历管理</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div> -->
            <div class="nav">
                <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
                <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/install.html">安装教程</a>
                <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/companylist.html">网申时间表</a>
                <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a>
                <a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a>
              </div>
          		
          	<?php }else{ ?> 
          	
          		<!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a><a <?php echo ($cur_top_nav["collections"]); ?> href="/User/collections.html">我的收藏</a></div>  -->
              <div class="nav">
                <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
                <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/install.html">安装教程</a>
                <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/companylist.html">网申时间表</a>
                <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a>
                <a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a>
              </div>
          		
          	<?php } ?>
          
          	<div class="login">
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
                <a href="#plugindownload" class="index_downlaod inline cboxElement">立即下载</a>
	          </div>
          
          <?php else: ?>
          
	          <!-- <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div> -->

            <div class="nav">
              <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/plugin.html">功能介绍</a>
              <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/install.html">安装教程</a>
              <a <?php echo ($cur_top_nav["plugin"]); ?> href="/Plugin/companylist.html">网申时间表</a>
              <a <?php echo ($cur_top_nav["news"]); ?> href="/News/about.html">关于我们</a>
            </div>

	          <div class="login">
	          <a href="#plugindownload" class="index_downlaod inline cboxElement">立即下载</a>
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
    .jm_plugindownload {padding: 20px 50px 50px 50px;}
    .jm_plugindownload p{padding-bottom: 40px;}
    .btn-browser-container {width: 475px; clear: both;}
    .popup{ padding:0;} 
    .btn-browser{ margin: 10px;  padding: 10px 20px 10px 10px;  width: 180px;  height: 40px; line-height: 40px; border: 1px solid #dbdbdb;} 
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
            <p class="f16">请选择你当前的游览器（更多游览器正在努力开发中）</p>
            <div class="btn-browser-container">
                <a class="btn-browser btn-chrome" target="_blank" href="/Plugin/install.html"><span><img src="/Uploads/Plugin/chrome.png"></span>Chrome 游览器</a>
                <a class="btn-browser btn-ie btn-disabled" ><span><img src="/Uploads/Plugin/ie.png"></span>即将上线</a>
            </div>
            <div class="btn-browser-container">
                <a class="btn-browser btn-liebao btn-disabled" ><span><img src="/Uploads/Plugin/liebao.png"></span>即将上线</a>
                <a class="btn-browser btn-360 btn-disabled" ><span><img src="/Uploads/Plugin/360.png"></span>即将上线</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div><?php endif; ?>

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/index.css" />
    <style type="text/css">
       
        h1.jm_plugin_title {
            text-align: center;
            font-size: 30px;
            color: #222222;
        }
        h2.jm_plugin_subtitle {
            font-size: 30px;
            color: #222222;
        }
        p.jm_plugin_subintro {
            font-size: 20px;
            color: #4a4a4a;
        }
        /*.container-text {
            width: 50%;  
            height: 50%;  
            overflow: auto;  
            margin: auto;  
            position: absolute;  
            top: 0; left: 0; bottom: 0; right: 0;  
        }
        */    
        dl.jm_plugin_install dt{
            border-left: 2px solid #8f4c7e;
            /*//padding-left: 15px;*/
            color: #8f4c7e;
            padding: 0 0 0 15px;
            margin: 20px 0 ;
        }
        dl.jm_plugin_install dd {
            padding: 0;
            margin: 0;
        }

        .jm_companylist_l {
            background-color: #f9f9f9;
        }

        .jm_companylist_l h3 {
            font-size: 20px;
            padding: 10px 0 10px 40px;
            font-weight: 500;
        }
        .jm_companylist_l ul {
            list-style: none;
            background-color: #f9f9f9;
        }
        .jm_companylist_l a{
            display: block;
            color: #222222;
            font-size: 15px;
            padding: 14px 0px 14px 40px;
            /*border-left: 4px solid #f9f9f9;*/
        }

        .jm_companylist_l a:hover{
            /*border-left: 4px solid #ac6198;*/
            background: #f6f6f6;
            color: #222222;
        }
        .jm_companylist_r {
            line-height: 30px;
        }
        .jm_companylist_r h3 {
            font-size: 20px;
            padding: 10px 0 20px 0;
        }

        .jm_companylist_container {
            position: relative;
        }
        .jm_companylist_tb {
            width: 100%;
        }
        .jm_companylist_tb tr:first-child(){
            border-top: 4px solid #6492c7;
        }

        .jm_companylist_tb tr
        {       
            height: 50px;
            line-height: 50px;
            background-color: #fff;   
        }
        .jm_companylist_tb tr:nth-child(2n)
        {
            background-color: #f9f9f9;   
        }
        .jm_companylist_tb tr td {padding-left:20px }

        .jm_companylist_section {
            margin-bottom: 50px;
        }
        .jm_inter a {
            color: #6492c7;
        }
        .jm_build a {
            color: #82b547;
        }
        .jm_finance a {
            color: #f5a623;
        }
        .jm_comm a {
            color: #ac6198 ;
        }
        .jm_consumable a {
            color: #f4475c ;
        }
        .icon-inter-title {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: 60px -15px;
            width: 55px;
            height: 45px;
            float: left;  
        }
        .icon-build-title {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -170px -63px;
            width: 55px;
            height: 45px;
            float: left;
        }
       
        .icon-finance-title {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -173px -108px;
            width: 55px;
            height: 45px;
            float: left;
        }
        
         .icon-comm-title {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -171px -152px;
            width: 55px;
            height: 45px;
            float: left;
        }
        
        .icon-consumable-title {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -174px -205px;
            width: 55px;
            height: 45px;
            float: left;
        }
        
        .icon-other-title {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -170px 60px;
            width: 55px;
            height: 45px;
            float: left;
        }
        
        h3.jm_support_title {
            background-color: #f9f9f9;
            padding-left: 20px;
        }
        
        h3.jm_cl_blue {
            border-top: 4px solid #6492c7;
            color: #6492c7;
        }

        h3.jm_cl_green {
            border-top: 4px solid #82b547;
            color: #82b547;
        }
        h3.jm_cl_orange {
            border-top: 4px solid #f5a623;
            color: #f5a623;
        }
        h3.jm_cl_purple {
            border-top: 4px solid #ac6198;
            color: #ac6198;
        }
        h3.jm_cl_red {
            border-top: 4px solid #f4475c;
            color: #f4475c;
        }
        h3.jm_cl_darkgreen {
            border-top: 4px solid #53b09b;
            color: #53b09b;
        }
        .active .nav_cl_blue {
            background-color: #6492c7 !important;
            color: #fff !important;
        }
        .active .nav_cl_green {
            background-color: #82b547 !important;
            color: #fff !important;
        }
        .active .nav_cl_orange {
            background-color: #f5a623 !important;
            color: #fff !important;
        }
        .active .nav_cl_purple {
            background-color: #ac6198 !important;
            color: #fff !important;
        }
        .active .nav_cl_red {
            background-color: #f4475c !important;
            color: #fff !important;
        }
        .active .nav_cl_darkgreen {
            background-color: #53b09b !important;
            color: #fff !important;
        }
        .jm_companylist_l .affix {
            width: 240px;
            top: 20px;
            position: fixed;
        }
        .jm_companylist_l .affix-top {
            top:200px;
        }
        .active {
            background-color: #6492c7;
            color: #fff;
        }
        .jm_companylist_l ul.nav li {
            position: relative;
        }
        .icon-inter {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: 145px -6px;
            width: 55px;
            height: 45px;
            float: left;
        }
        .active .icon-inter {
            background-position: -10px -6px;
        }
        .icon-build {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -86px -55px;
            width: 55px;
            height: 45px;
            float: left;
        }
        .active .icon-build {
            background-position: -10px -55px;
        }
        .icon-finance {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -86px -100px;
            width: 55px;
            height: 45px;
            float: left;
        }
        .active .icon-finance {
            background-position: -10px -100px;
        }
         .icon-comm {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -86px -145px;
            width: 55px;
            height: 45px;
            float: left;
        }
        .active .icon-comm {
            background-position: -10px -145px;
        }
        .icon-consumable {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -86px -195px;
            width: 55px;
            height: 45px;
            float: left;
        }
        .active .icon-consumable {
            background-position: -10px -195px;
        }
        .icon-other {
            background-image: url(/Uploads/Plugin/icons.png);
            background-position: -86px 73px;
            width: 55px;
            height: 45px;
            float: left;
        }
        .active .icon-other {
            background-position: -10px 73px;
        }
        .active .nav_cl_blue .triangle-blue{
            height: 20px;
            position: absolute;
            right: -7px;
            width: 13px;
            top: 15px;
            z-index: -1;
            background-image: url(/Uploads/Plugin/triangle-blue.png);
        }
        .active .nav_cl_darkgreen .triangle-darkgreen{
            height: 20px;
            position: absolute;
            right: -7px;
            width: 13px;
            top: 15px;
            z-index: -1;
            background-image: url(/Uploads/Plugin/triangle-darkgreen.png);
        }
        .active .nav_cl_green .triangle-green{
            height: 20px;
            position: absolute;
            right: -7px;
            width: 13px;
            top: 15px;
            z-index: -1;
            background-image: url(/Uploads/Plugin/triangle-green.png);
        }
        .active .nav_cl_orange .triangle-orange{
            height: 20px;
            position: absolute;
            right: -7px;
            width: 13px;
            top: 15px;
            z-index: -1;
            background-image: url(/Uploads/Plugin/triangle-orange.png);
        }
        .active .nav_cl_purple .triangle-purple{
            height: 20px;
            position: absolute;
            right: -7px;
            width: 13px;
            top: 15px;
            z-index: -1;
            background-image: url(/Uploads/Plugin/triangle-purple.png);
        }
        .active .nav_cl_red .triangle-red{
            height: 20px;
            position: absolute;
            right: -7px;
            width: 13px;
            top: 15px;
            z-index: -1;
            background-image: url(/Uploads/Plugin/triangle-red.png);
        }
        .text-disabled {
            color: #9b9b9b;

        }

        </style>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="10" style="position: relative;">
<div class="w960 mt30 jm_companylist_container">
    <div class="lw240 jm_companylist_l affix-top" id="myScrollspy">
        <nav id="companyaffix">
        <ul class="nav nav-tabs nav-stacked" >
            <li class="active"><i class="icon-inter"></i><a class="nav_cl_blue" href="#section-1">互联网/游戏/软件<i class="triangle-blue"></i></a></li>
            <li><i class="icon-build"></i><a class="nav_cl_green" href="#section-2">房地产/建筑/物业<i class="triangle-green"></i></a></li>
            <li><i class="icon-finance"></i><a class="nav_cl_orange" href="#section-3">金融<i class="triangle-orange"></i></a></li>
            <li><i class="icon-comm"></i><a class="nav_cl_purple" href="#section-4">电子/通信/硬件<i class="triangle-purple"></i></a></li>
            <li><i class="icon-consumable"></i><a class="nav_cl_red" href="#section-5">消费品<i class="triangle-red"></i></a></li>
            <!-- <li><i class="icon-other"></i><a class="nav_cl_darkgreen" href="#section-6">其他<i class="triangle-darkgreen"></i></a></li> -->
        </ul>
        </nav>
    </div>

    <div class="rw680">
    
        <!-- 浏览器列表开始-->
        <div class="jm_companylist_r" style="margin:0;position: relative;">
            <div id="section-1" class="jm_companylist_section jm_inter">
            <h3 class="jm_support_title jm_cl_blue"><i class="icon-inter-title"></i>互联网/游戏/软件</h3>
            <table class="jm_companylist_tb">
                <tr>
                    <td width="220">4399</td>
                    <td width="220"><a target="_blank" href="http://web.4399.com/campus/">web.4399.com/campus</a></td>
                    <td width="240">已开始 (10月9日 截止)</td>
                </tr>
                <tr>
                    <td>欢聚时代</td>
                    <td><a target="_blank" href="http://hr.yy.com/">hr.yy.com</a></td>
                    <td >已开始 (10月10日 截止)</td>
                </tr>
                <tr>
                    <td>网易游戏</td>
                    <td><a target="_blank" href="http://campus.163.com/#/home">campus.163.com/#/home</a></td>
                    <td >已开始 (10月15日 截止)</td>
                </tr>
                <tr>
                    <td>搜狗</td>
                    <td><a target="_blank" href="http://jobs.sogou.ourats.com/">jobs.sogou.ourats.com</a></td>
                    <td >已开始 (10月15日 截止)</td>
                </tr>
                 <tr>
                    <td>平安科技</td>
                    <td><a target="_blank" href="http://www.dajie.com/corp/1035665/joinus">www.dajie.com/corp/1035665/joinus</a></td>
                    <td >已开始 (10月23日 截止)</td>
                </tr>
                 <tr>
                    <td>完美世界</td>
                    <td><a target="_blank" href="http://campus.wanmei.com/">campus.wanmei.com</a></td>
                    <td >已开始 (12月31日 截止)</td>
                </tr>
                <tr>
                    <td>京东</td>
                    <td><a target="_blank" href="http://campus.jd.com/">campus.jd.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>猎豹移动</td>
                    <td><a target="_blank" href="http://hr.cmcm.com/campus">hr.cmcm.com/campus</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>豆瓣</td>
                    <td><a target="_blank" href="http://jobs.douban.com/campus/">jobs.douban.com/campus</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>新浪</td>
                    <td><a target="_blank" href="http://career.sina.com.cn/">career.sina.com.cn</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>百度</td>
                    <td><a target="_blank" href="http://talent.baidu.com/">talent.baidu.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>搜狐</td>
                    <td><a target="_blank" href="http://hr.sohu.com/">hr.sohu.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>去哪儿</td>
                    <td><a target="_blank" href="http://star.qunar.com/">star.qunar.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>爱奇艺</td>
                    <td><a target="_blank" href="http://campus.iqiyi.com/">campus.iqiyi.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>美团</td>
                    <td><a target="_blank" href="http://campus.meituan.com/">campus.meituan.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>大众点评</td>
                    <td><a target="_blank" href="http://campus.dianping.com">campus.dianping.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>奇虎360</td>
                    <td><a target="_blank" href="http://campus.360.cn/">campus.360.cn</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>淘米</td>
                    <td><a target="_blank" href="http://campus.taomee.com/2016/position.html#meishu_au">campus.taomee.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>巨人网络</td>
                    <td><a target="_blank" href="http://campus.51job.com/ztgame/">campus.51job.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>搜房网</td>
                    <td><a target="_blank" href="http://campus.fang.com/index.html">campus.fang.com</a></td>
                    <td >已开始</td>
                </tr>
                <tr>
                    <td>阿里</td>
                    <td><a target="_blank" href="http://hr.yy.com/">hr.yy.com</a></td>
                    <td class="text-disabled">已截止</td>
                </tr>
            </table>
            </div>
            <div id="section-2" class="jm_companylist_section jm_build">
            <h3 class="jm_support_title jm_cl_green"><i class="icon-build-title"></i>房地产/建筑/物业</h3>
            <table class="jm_companylist_tb">
                <tr>
                    <td width="220">万达集团</td>
                    <td width="220"><a target="_blank" href="http://job.wanda.com.cn/">job.wanda.com.cn</a></td>
                    <td width="240">已开始</td>
                </tr>
                <tr>
                    <td>龙湖集团</td>
                    <td><a target="_blank" href="http://www.zhaopin.longfor.com/AddResume.aspx?flag=0">www.zhaopin.longfor.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>龙湖地产</td>
                    <td><a target="_blank" href="http://www.zhaopin.longfor.com/AddResume.aspx?flag=0">www.zhaopin.longfor.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>华润置地</td>
                    <td><a target="_blank" href="http://careers.crland.com.hk/">careers.crland.com.hk</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>万科集团</td>
                    <td><a target="_blank" href="http://vankejob.zhiye.com/xyzp">vankejob.zhiye.com</a></td>
                    <td>已开始</td>
                </tr>
            </table>
            </div>
            <div id="section-3" class="jm_companylist_section jm_finance">
            <h3 class="jm_support_title jm_cl_orange"><i class="icon-finance-title"></i>金融</h3>
            <table class="jm_companylist_tb">
                <tr>
                    <td width="220">招商银行</td>
                    <td width="220"><a target="_blank" href="http://career.cmbchina.com/">career.cmbchina.com</a></td>
                    <td width="240">已开始 (10月18日 截止)</td>
                </tr>
                <tr>
                    <td>渣打银行</td>
                    <td><a target="_blank" href="https://www.sc.com/graduates/">www.sc.com</a></td>
                    <td>已开始 (10月18日 截止)</td>
                </tr>
                <tr>
                    <td>德勤</td>
                    <td><a target="_blank" href="http://www2.deloitte.com/">www2.deloitte.com</a></td>
                    <td>已开始 (10月25日 截止)</td>
                </tr>
                <tr>
                    <td>平安银行</td>
                    <td><a target="_blank" href="http://job.pingan.com/">job.pingan.com</a></td>
                    <td>已开始 (12月31日 截止)</td>
                </tr>
                <tr>
                    <td>中国平安</td>
                    <td><a target="_blank" href="http://job.pingan.com/searchSchoolJob.screen;jsessionid=WL3chJBR7vLJs914tZJQwGfXXQSMb75zzWhkt9zFxsTkwLSN82Dr!-1344171356?rmSession=advancedSearchPagedData&jobChannel=50">job.pingan.com</a></td>
                    <td>已开始 (12月31日 截止)</td>
                </tr>
                <tr>
                    <td>J.P.Morgan</td>
                    <td><a target="_blank" href="http://careers.jpmorgan.com/careers">careers.jpmorgan.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>毕马威</td>
                    <td><a target="_blank" href="https://hr.kpmg.com.cn/AppForm/ApplicationForm/graduates/login.aspx">hr.kpmg.com.cn</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>汇丰银行</td>
                    <td><a target="_blank" href="http://campus.51job.com/hsbc/">campus.51job.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>华泰</td>
                    <td><a target="_blank" href="http://job.htsc.com.cn/recruitment/html/html/_/xzym">job.htsc.com.cn</a></td>
                    <td>已开始</td>
                </tr>
            </table>
            </div>
            <div id="section-4" class="jm_companylist_section jm_comm">
            <h3 class="jm_support_title jm_cl_purple"><i class="icon-comm-title"></i>电子/通信/硬件</h3>
            <table class="jm_companylist_tb">

                <tr>
                    <td width="220">英特尔</td>
                    <td width="220"><a target="_blank" href="http://intel2016.hirede.com/CareerSite/IntelIndex">intel2016.hirede.com</a></td>
                    <td width="240">已开始 (10月7日 截止)</td>
                </tr>
                <tr>
                    <td>三星（中国）</td>
                    <td><a target="_blank" href="http://www.dearsamsung.com.cn/">www.dearsamsung.com.cn</a></td>
                    <td>已开始 (10月11日 截止)</td>
                </tr>
               <tr>
                    <td>联想中国</td>
                    <td><a target="_blank" href="http://career.lenovo.com.cn/default.shtml">career.lenovo.com.cn</a></td>
                    <td>已开始 (10月11日 截止)</td>
                </tr>
                <tr>
                    <td>海信集团</td>
                    <td><a target="_blank" href="http://hisense.zhiye.com">hisense.zhiye.com</a></td>
                    <td>已开始 (11月5日 截止)</td>
                </tr>
                <tr>
                    <td>中国移动</td>
                    <td><a target="_blank" href="http://job.10086.cn/">job.10086.cn</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>华为</td>
                    <td><a target="_blank" href="http://career.huawei.com/recruitment/">career.huawei.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>微软</td>
                    <td><a target="_blank" href="http://www.joinms.com/cn_c/index.html">www.joinms.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>思科</td>
                    <td><a target="_blank" href="http://www.cisco.com/web/about/ac40/about_cisco_careers_home.html">www.cisco.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>酷派</td>
                    <td><a target="_blank" href="http://campus.coolpad.com/index.php?c=schoolRecruitment&f=jobPosition">campus.coolpad.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>京东方</td>
                    <td><a target="_blank" href="http://campus.boe.com/zwsq">campus.boe.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>大唐电信</td>
                    <td><a target="_blank" href="http://www.xingtangzp.com/">www.xingtangzp.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>创维集团</td>
                    <td><a target="_blank" href="http://campus.coolpad.com/index.php?c=schoolRecruitment&f=jobPosition">campus.coolpad.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>创维集团</td>
                    <td><a target="_blank" href="http://xyzp.skyallhere.com/">xyzp.skyallhere.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>中兴</td>
                    <td><a target="_blank" href="http://job.zte.com.cn/newjob/cn/xyzp/">job.zte.com.cn</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>oppo</td>
                    <td><a target="_blank" href="http://campus.oppo.com/">campus.oppo.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>阿尔卡特朗讯</td>
                    <td><a target="_blank" href="http://campus.chinahr.com/2015/pages/alcatellucent2015/flow.asp">campus.chinahr.com</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>恒生电子</td>
                    <td><a target="_blank" href="http://job.ahau.edu.cn/zxzpxx/68683.htm">job.ahau.edu.cn</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>环旭电子</td>
                    <td><a target="_blank" href="http://campus.51job.com/usi/job.htm">campus.51job.com/usi</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>TP-LINK</td>
                    <td><a target="_blank" href="http://hr.tp-link.com.cn/">hr.tp-link.com.cn</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>中国电信</td>
                    <td><a target="_blank" href="http://hr.gdtel.com.cn/forward_companyView.html?id=1">hr.gdtel.com.cn</a></td>
                    <td class="text-disabled">已截止</td>
                </tr>
               
            </table>
            </div>
            <div id="section-5" class="jm_companylist_section jm_consumable">
            <h3 class="jm_support_title jm_cl_red"><i class="icon-consumable-title"></i>消费品</h3>
            <table class="jm_companylist_tb">
                <tr>
                    <td width="220">高露洁</td>
                    <td width="220"><a target="_blank" href="http://campus.51job.com/colgate2016/2-2.htm">campus.51job.com/colgate2016</a></td>
                    <td width="240">已开始 (10月18日 截止)</td>
                </tr>
                <tr>
                    <td>强生</td>
                    <td><a target="_blank" href="http://loading.dajie.com/jnj/index.html">loading.dajie.com/jnj</a></td>
                    <td >已开始 (10月20日 截止)</td>
                </tr>
                <tr>
                    <td>可口可乐管培生</td>
                    <td><a target="_blank" href="http://campus.chinahr.com/2016/pages/cocacola2016/index.html">campus.chinahr.com/2016</a></td>
                    <td>已开始 (10月25日 截止)</td>
                </tr>
                <tr>
                    <td>雀巢</td>
                    <td><a target="_blank" href="http://campus.51job.com/nestle/job.htm">campus.51job.com/nestle</a></td>
                    <td>已开始 (12月31日 截止)</td>
                </tr>
                <tr>
                    <td>苏宁</td>
                    <td><a target="_blank" href="http://campus.51job.com/suning/">campus.51job.com/suning</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>联合利华</td>
                    <td><a target="_blank" href="http://campus.chinahr.com/2016/pages/unilever/index.asp">campus.chinahr.com/2016/pages/unilever</a></td>
                    <td>已开始</td>
                </tr>
                <tr>
                    <td>宝洁</td>
                    <td><a target="_blank" href="http://china.pgcareers.com/">china.pgcareers.com</a></td>
                    <td>已开始</td>
                </tr>
            </table>
            </div>
           <!--  <div id="section-6" class="jm_companylist_section">
            <h3 class="jm_support_title jm_cl_darkgreen"><i class="icon-other-title"></i>其他</h3>
            <table class="jm_companylist_tb">
                <tr>
                     <td width="220">腾讯</td>
                    <td width="220">www.tengxun.com</td>
                    <td width="240">已开始（11月01日截止）</td>
                </tr>  
            </table>
            </div> -->
        </div>
        <!-- 职位列表结束-->
    </div>
    <div class="clr"></div>
</div>
</body>
<script language="JavaScript" type="text/javascript"> 

    $(document).ready(function(){
        $("#companyaffix").affix({
            offset: { 
                top: 50 
            }
        });
        
        $(".jm_companylist_l .nav li").click(function(){
            $(this).addClass("active").siblings().removeClass("active")
        });

       // $('[data-spy="scroll"]').each(function () {
       //    var $spy = $(this).scrollspy('refresh')
       //  })

       // $("#myScrollspy").scrollspy();

       // $(".jm_companylist_l .nav li").first().addClass("active");

       // window.onload=function(){
       //  $(".jm_companylist_l .nav li").last().removeClass("active");
       // }
    });
    
</script> j
<script type="text/javascript" src="/Public/Home/js/query.1.10.1.min.js"></script> 
<script type="text/javascript" src="/Public/Home/js/affix.js"></script> 
<script type="text/javascript" src="/Public/Home/js/scrollspy.js"></script>  
<!-- <script type="text/javascript" src="/Public/Home/js/bootstrap.min.js"></script>  --> 

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
           <a href="/News/about.html" target="_bank">关于我们</a><a  target="_bank" href="/News/help.html">帮助中心</a><a href="/?viewTools=mobile">移动版</a>
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