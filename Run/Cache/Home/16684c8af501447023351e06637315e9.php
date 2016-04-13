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
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/reset.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/myresume.css"/>
<style>
li{ list-style:none;}
</style>
<script>
$(function(){
    $(".btn_showprogress").click(function(){
          $(this).find("i").toggleClass("transform");
		  $(this).parent("div").siblings(".progress_status").slideToggle(200);
    });
});
</script>


<div class="tilhed">
   <a class="golevel" href="/User"></a>
   <div class="mbtitle">投递记录</div>
   <a class="gohome" href="/"></a>
</div>

<table class="sctab" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><a href="/User/myinterview/isover/2.html" <?php echo ($amenu[2]); ?>>将面试</a></td>
    <td><a  href="/User/myinterview/isover/1.html" <?php echo ($amenu[1]); ?>>已面试</a></td>
  </tr>
</table>

 <?php if(!$list)echo '<div class="mbbox mt14"><div class="nocenter"><span><img src="/Public/Home/images/empty.png" />暂时没有记录哦~</span></div></div>'; ?>
            
<table class="mymianshi" width="100%" border="0" cellspacing="0" cellpadding="0">

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; $mianshi_log = $v['apply_log'][0]; if($mianshi_log && $mianshi_log['type']==4){ $ext_data = unserialize($mianshi_log['ext_data']); } ?>
  <tr>
    <td class="onebg"><?php echo (getinterviewdate($v["interviewTime"])); ?><!-- 5月 4日 （周六） 08.30 --></td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td><span><a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>.html?source=rec"><?php echo ($v["zhiwei_mingcheng"]); ?></a></span>（<?php echo ($v["yuexin_min"]); ?>k-<?php echo ($v["yuexin_max"]); ?>k）</td>
  </tr>
  <tr>
    <td><?php echo ($v["company_short_name"]); ?></td>
  </tr>
  <tr>
    <td>姓名：<?php echo ($ext_data["name"]); ?></td>
  </tr>
  <tr>
    <td>地址：<?php echo ($ext_data["address"]); ?></td>
  </tr>
  <tr>
    <td>联系电话：<span><?php echo ($ext_data["phone"]); ?></span></td>
  </tr>
  <tr>
    <td>补充内容：<?php echo ($ext_data["memo"]); ?></td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>  
  
  
  
  
</table>