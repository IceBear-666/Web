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
    <td width="33.3%"><a href="/User/delivery/type/0.html" <?php echo ($amenu[0]); ?>>全部</a></td>
    <td width="33.3%"><a  href="/User/delivery/type/4.html" <?php echo ($amenu[4]); ?>>面试</a></td>
    <td><a <?php echo ($amenu[-1]); ?> href="/User/delivery/type/-1.html">不合适</a></td>
  </tr>
</table>


<div class="mbbox mt14">

<?php if(!$list)echo '<div class="nocenter"><span><img src="/Public/Home/images/empty.png" />暂时没有记录哦~<br />快去投递一个简历吧！</span></div>'; ?>

     <ul class="my_delivery">
     
	     <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; $result = getApplyLog($v['aid'],$v['apply_log']); ?>
	     	
	     	<li>
            <div class="d_item">
                <h2 title="<?php echo ($v["zhiwei_mingcheng"]); ?>"><a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>.html?source=rec"><em><?php echo ($v["zhiwei_mingcheng"]); ?></em><span>（<?php echo ($v["yuexin_min"]); ?>k-<?php echo ($v["yuexin_max"]); ?>k）</span></a></h2>
                <div class="clear">
                </div>
                <a href="/Company/info/id/<?php echo ($v["company_id"]); ?>/.html" target="_blank" class="d_jobname" title="<?php echo ($v["company_name"]); ?>"><?php echo ($v["company_name"]); ?> <span class="col999">[<?php echo ($v["gongzuo_chengshi"]); ?>]</span></a>
                <div class="clear">
                </div>
                <div class="pdt10 col999 f12">
                    <?php echo (showdate($v["addtime"])); ?>
                </div>
                <a href="javascript:;" class="btn_showprogress tdzhankai"><span><?php echo getResumeStatus($v['status'],$v['isread'],$v['view_contact']); ?></span><i></i></a>
            </div>
            
              <div class="progress_status <?php if($_GET['aid']!=$v['aid'])echo 'dn'; ?>">
              
              <?php if($result['step']==1){ ?>
              
              	<ul class="status_steps">                	
                    <li class="status_done status_1">1<em>投递成功</em></li>
                    <li class="status_line status_line_grey"><span></span></li>
                    <li class="status_grey status_2"><span>2</span><em>简历被查看</em></li>
                    <li class="status_line status_line_grey"><span></span></li>
                    <li class="status_grey"><span>3</span><em>待沟通</em></li>
                    <li class="status_line status_line_grey"><span></span></li>
                    <li class="status_grey"><span>4</span><em>面试</em></li>
                </ul>
                <div class="clr h20"></div>
                
              <?php }elseif($result['step']==2){ ?>
              
              	<ul class="status_steps">
                    <li class="status_done status_1">1<em>投递成功</em></li>
                    <li class="status_line status_line_done"><span></span></li>
                    <li class="status_done status_2"><span>2</span><em>简历被查看</em></li>
                    <li class="status_line status_line_grey"><span></span></li>
                    <li class="status_grey"><span>3</span><em>待沟通</em></li>
                    <li class="status_line status_line_grey"><span></span></li>
                    <li class="status_grey"><span>4</span><em>面试</em></li>
                </ul>
               <div class="clr h20"></div>
              
              <?php }elseif($result['step']==3){ ?>
              
              	<ul class="status_steps">
                    <li class="status_done status_1">1<em>投递成功</em></li>
                    <li class="status_line status_line_done"><span></span></li>
                    <li class="status_done status_2"><span>2</span><em>简历被查看</em></li>
                    <li class="status_line status_line_done"><span></span></li>
                    <li class="status_done"><span>3</span><em>待沟通</em></li>
                    <li class="status_line status_line_grey"><span></span></li>
                    <li class="status_grey"><span>4</span><em>面试</em></li>
                </ul>
                <div class="clr h20"></div>
               
               <?php }elseif($result['step']==4){ ?>
              
              	<ul class="status_steps">
                    <li class="status_done status_1">1<em>投递成功</em></li>
                    <li class="status_line status_line_done"><span></span></li>
                    <li class="status_done status_2"><span>2</span><em>简历被查看</em></li>
                    <li class="status_line status_line_done"><span></span></li>
                    <li class="status_done"><span>3</span><em>待沟通</em></li>
                    <li class="status_line status_line_done"><span></span></li>
                    <li class="status_done"><span>4</span><em>面试</em></li>
                </ul>
                <div class="clr h20"></div>     
                
              <?php }elseif($result['step']==10){ ?>              
              	<ul class="status_steps">
                    <li class="status_done status_1">1<em>投递成功</em></li>
                    <li class="status_line status_line_done"><span></span></li>
                    <li class="status_done"><span>2</span><em>不合适</em></li>
                </ul>
                <div class="clr h20"></div>               
              
              <?php } ?>
                
                
                <ul class="status_list">
                   
                   <?php echo ($result["content"]); ?>
                    
                </ul>
                  <a href="javascript:;" class="btn_closeprogress"></a>
                </div>
       		</li><?php endforeach; endif; else: echo "" ;endif; ?>
         
              
     </ul>
            
            
    

    
    
</div>