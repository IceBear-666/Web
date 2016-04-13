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

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/company.css" />

<div class="tilhed">
   <a class="golevel" href="/User"></a>
   <div class="mbtitle">我的职位</div>
   <a class="gohome" href="/user"></a>
</div>

<div class="mbbox mt14">  


<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="zwyuan">
    <table class="myzhiwei" width="100%" border="0" cellspacing="0" cellpadding="0">
    
          <tr>
            <td class="toplk" colspan="2"><a href="<?php echo (WEB_URL); ?>Jobs/info/id/<?php echo ($v["jid"]); ?>" title="Android"><?php echo ($v["zhiwei_mingcheng"]); ?></a></td>
          </tr>
          <tr>
            <td><i class="zwico1"></i><?php echo ($v["gongzuo_chengshi"]); ?></td>
            <td><i class="zwico2"></i><?php echo ($v["gongzuo_jingyan"]); ?></td>
          </tr>
          <tr>
            <td><i class="zwico3"></i><?php echo ($v["yuexin_min"]); ?>k-<?php echo ($v["yuexin_max"]); ?>k </td>
            <td><i class="zwico4"></i><?php echo ($v["xueli"]); ?></td>
          </tr>
          <tr>
            <td class="botlk" colspan="2">
              <a href="<?php echo (WEB_URL); ?>Company/interview/type/all/job_id/<?php echo ($v["jid"]); ?>"><?php echo (getapplycount($v["jid"])); ?>简历</a>
            </td>
          </tr>
    
     </table>
 </div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>