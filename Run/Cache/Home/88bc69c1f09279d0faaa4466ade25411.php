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


<link rel="stylesheet" type="text/css" href="/Public/Home/css/popup.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/external.min.css"/>

<script type="text/javascript">
var ctx = "<?php echo (WEB_URL); ?>";
var ctx_new = "<?php echo (WEB_URL); ?>";
var rctx = "<?php echo (WEB_URL); ?>";
var pctx = "<?php echo (WEB_URL); ?>";

</script>

<div class="w960 mt30">
    <div class="w640">
      <dl class="job_detail">
        <dt class="clearfix join_tc_icon">
          <h1 title="<?php echo ($info["zhiwei_mingcheng"]); ?>"><?php echo ($info["zhiwei_mingcheng"]); ?></h1>

       		<?php if($cuser_type){ ?>
            
	            <?php if($info['uid']==$myinfo['uid']){ ?>
	            	<a class="job_edit2" href="/Company/createPost/jid/<?php echo ($info["jid"]); ?>" ></a>	            
	            <?php } ?>
            
            <?php }else{ ?>
             
             <?php if($my_collect){ ?>
             	<div  class="jd_collection collected" onclick="return user_collection(<?php echo ($info["jid"]); ?>,0,1,1)">
             <?php }else{ ?>
             	<div  class="jd_collection" onclick="return user_collection(<?php echo ($info["jid"]); ?>,1,1,1)">
             <?php } ?>
                   
             </div>
            
            <!-- 举报按钮 -->
            <a href="javascript:;" class="report_button <?php if($my_report)echo 'collected'; ?>">
            <span class="dn" id="report_jd">举报职位</span>
            </a>
            
            <?php } ?>
            
            <!-- 分享至微信 -->
            <div class="jd_share">
                <span class="dn" id="share_jd">分享到微信</span>
                <div class="jd_share_success">
                <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" />
                </div>
            </div>

    

        </dt>
        <dd class="job_request">
         <span>地点&nbsp;<em><?php echo ($info["gongzuo_chengshi"]); ?></em></span> <span>起薪&nbsp;<em><?php echo ($info["yuexin_min"]); ?>k-<?php echo ($info["yuexin_max"]); ?>k</em></span> 
         <span>经验&nbsp;<em><?php echo ($info["gongzuo_jingyan"]); ?></em> </span> <span> 学历&nbsp;<em><?php echo ($info["xueli"]); ?></em></span> <span>性质&nbsp;<em><?php echo ($info["gongzuo_xingzhi"]); ?></em></span><br />
          职位诱惑：<em><?php echo ($info["zhiwei_youhuo"]); ?></em>
          <div class="f14 mt10">发布时间：<?php echo (getlongtimespace($info["addtime"])); ?>前发布</div>
        </dd>
        <dd class="job_bt">
          <h3 class="description">职位描述</h3>
          <!-- <p><strong>岗位职责：</strong></p> -->
          <?php echo ($info["descrip"]); ?>
        </dd>


<!--
===================   阿丁查阅  =====================

立即申请，里面的id链接，3个参数分别对应三个状态。

如果多份简历，选择简历：selectResume
就一份简历，直接发送：yseResume
没有简历：noResume

-->
		
		
         <div class="clr" id="show_resume_status">
         
         	<?php if($myinfo && $myinfo['type']>0){ ?>
         	
         	<?php }else{ ?>
         	
	         	<?php if($my_apply){ ?>
					<a href="javascript:;" class="mybtn3 ljsq rt">已投递</a>
				<?php }elseif(!$myinfo){ ?>
					<a class="inline mybtn1 ljsq rt"  href="#yseResume" title="简历投递">立即申请</a>
				<?php }elseif( count($myinfo['offline_resume'])>1 || ($myinfo['offline_resume'] && $myinfo['is_finish']==1 ) ){ ?>	
					<a class="inline mybtn1 ljsq rt"  href="#selectResume" title="简历投递">立即申请</a>	
				<?php }elseif($myinfo['offline_resume'] || $myinfo['is_finish']==1){ ?>
					<a class="inline mybtn1 ljsq rt"  href="#selectResume" title="简历投递">立即申请</a>					
				<?php }else{ ?>
					<a class="inline mybtn1 ljsq rt"  href="#noResume" title="简历投递">立即申请</a>					
				<?php } ?>
			
			<?php } ?>
           
         </div>
         
       <div class="clr"> </div>
       </dl>

    </div>




 <!-- 右侧开始-->
    <div class="w280">
      <dl class="job_company">
        <dt class="bgf9 pt10">
          <a href="/Company/info/id/<?php echo ($info["uid"]); ?>" target="_blank">
            <img src="<?php echo ($info["logo"]); ?>" alt="<?php echo ($info["company_name"]); ?>" />
            <h2><?php echo ($info["company_short_name"]); ?></h2>
          </a>

          <div class="clr"></div>
          <ul>
            <li><span>领域</span>&nbsp; <?php echo ($info["hangye"]); ?></li>
            <li><span>规模</span>&nbsp; <?php echo ($info["guimu"]); ?></li>
            <li><span>企业性质</span>&nbsp;  <?php echo ($gongsi_xingzhi[$info['gongsi_xingzhi']]); ?></li>
            <li> <span>主页</span>&nbsp;  <a href="http://<?php echo ($info["web_url"]); ?>" target="_blank" title="<?php echo ($info["web_url"]); ?>" rel="nofollow"><?php echo ($info["web_url"]); ?></a> </li>
          </ul>
        </dt>

        <dd class="bgf9 mt20">
         <h4>工作地址</h4>
          <span><?php echo ($info["gongzuo_dizhi"]); ?></span>
          <div id="smallmap"></div>
          <a href="javascript:;" id="mapPreview">查看完整地图</a>
        </dd>

      </dl>

      <!-- 相似模块 -->
      <?php if($same_list){ ?>
      <div class="mylike bgf9 mt20">
        <div class="til">
          <h4>相似职位</h4>
        </div>

        <ul>

			<?php if(is_array($same_list)): $i = 0; $__LIST__ = $same_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
             <a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>"><img src="<?php echo ($v["logo"]); ?>" alt="<?php echo ($v["company_name"]); ?>" />
             <div class="info"><span><?php echo ($v["zhiwei_mingcheng"]); ?></span><span class="colzi"><?php echo ($v["yuexin_min"]); ?>k-<?php echo ($v["yuexin_max"]); ?>k</span><span><?php echo ($v["company_short_name"]); ?></span></div>
             </a>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>

          <div class="clr"></div>
        </ul>

    </div>
    <?php } ?>
    
    <!--end .content_r-->

  <input type="hidden" value="<?php echo md5($info['uid']); ?>" name="userid" id="userid" />
  <input type="hidden" value="1" name="type" id="resend_type" />
  <input type="hidden" value="<?php echo ($info["jid"]); ?>"  id="jobid" />
  <input type="hidden" value="<?php echo ($info["uid"]); ?>"  id="companyid" />
  <input type="hidden" value="<?php echo ($info["lng"]); ?>" id="positionLng" />
  <input type="hidden" value="<?php echo ($info["lat"]); ?>" id="positionLat" />
  <div id="tipOverlay" ></div>



<!------------------------------------- 弹窗lightbox  ----------------------------------------->
  <div style="display:none;"> 
  
  
  	<?php if(!$myinfo){ ?>
  	
	  	<!-- 未登陆 -->
	    <div id="yseResume" class="popup" style=" height:90px; text-align:center;">
	      <div class="jd_delivery">
	        <p class="f16">系统检测到你还没有登陆，如果已经登陆请刷新当前页面。</p>
	         <a href="/User/login/?ref=/Jobs/info/id/<?php echo ($info["jid"]); ?>" class="btn f16 report_cancel" id="goto_login">确定</a>
	      </div>
	    </div>
	    <!--/#yseResume    $myinfo['offline_resume'] &&-->
	    
	<?php }elseif( count($myinfo['offline_resume'])>1 || ( $myinfo['offline_resume'] && $myinfo['is_finish']==1 ) ){ ?>
	
		<!-- 选择简历 -->
	    <div id="selectResume" class="popup" style="height:190px; overflow:visible;">
	      <form id="basicInfoForm" method="post" style="width:360px; margin:0 auto;">
	        
	          <table width="100%" border="0" cellspacing="10" cellpadding="0" class="f16">
	            
	            <tr>
	              <td><i class="bitian">*</i>选择简历</td>
	              <td>
	              
	                  <input type="hidden" name="resume_id" id="gongsi_xingzhi" value="" >
	                  <input type="button" class="myselect toudi_sel" id="select_sca" value="选择一份简历" >
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
	              <td width="100"><i class="bitian">*</i>联系电话</td>
	              <td><input type="text" class="mytxt1 f14" style="width:200px;" id="myphone" name="tel" value="<?php echo ($myinfo["phone"]); ?>"/></td>
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
	    <!--/#infoBeforeDeliverResume-->
	
	<?php }elseif( $myinfo['offline_resume'] || $myinfo['is_finish']==1){ ?>
	
		<!-- 选择简历 -->
	    <div id="selectResume" class="popup" style="height:190px; overflow:visible;">
	      <form id="basicInfoForm" method="post" style="width:360px; margin:0 auto;">
	        
	          <table width="100%" border="0" cellspacing="10" cellpadding="0" class="f16">
	            
	            <tr>
	              <td><i class="bitian">*</i>选择简历</td>
	              <td>
	              
	                  <input type="hidden" name="resume_id" id="gongsi_xingzhi" value="" >
	                  <input type="button" class="myselect toudi_sel" id="select_sca" value="选择一份简历" >
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
	              <td width="100"><i class="bitian">*</i>联系电话</td>
	              <td><input type="text" class="mytxt1 f14" style="width:200px;" id="myphone" name="tel" value="<?php echo ($myinfo["phone"]); ?>"/></td>
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
	    <!--/#infoBeforeDeliverResume-->
	
	<?php }else{ ?>
	
		<!-- 投递时，一个简历都没有弹窗 -->
	    <div id="noResume" class="popup" style="height:140px; line-height:26px;">
	      <table width="100%">
	        <tr>
	          <td class="f18 c5" align="center">你还没有可以投递的简历呢</td>
	        </tr>
	        <tr>
	          <td class="c5" align="center">请上传附件简历或填写在线简历后再投递吧~</td>
	        </tr>
	        <tr>
	          <td align="center">
	            <a class="btn mt20" href="/Resume/myresume" target="_blank" rel="nofollow">完善简历</a>
	            </td>
	        </tr>
	      </table>
	    </div>
	    <!--/#noResume-->
	
	<?php } ?>
  
  	<!-- 投简历成功 -->
	    <div id="yseResume" class="popup" style=" height:90px; text-align:center;">
	      <div class="jd_delivery">
	        <p class="f16">简历已经成功投递出去了，请静候佳音！</p>
	         <a href="javascript:" class="btn f16 report_cancel" id="cancelDetail">确定</a>
	      </div>
	    </div>
	<!--/#yseResume-->

    <!-- 举报弹窗 -->
    <div style="display:none;">
      <div id="reportbox" class="popup" style="height:370px;width:455px;">
        <div class="report_detail">
          <h2>若你发现本职位存在违规现象，欢迎举报。</h2>
          <form id="report_submit" action="javascript:;">
            <table class="report_content">
              <tbody>
                <tr>
                  <td>举报原因：</td>
                  <td class="select_box">
                  <input type="hidden" name="report_reason" data-key="0" id="report_reason_hidden" value/>
                    <input id="report_reason" type="button" value="请选择举报原因"/>
                    <div class="reason_content">
                      <ul>
                        <li value="1">薪资不真实</li>
                        <li value="2">工作经验或学历要求不真实</li>
                        <li value="3">公司信息不真实</li>
                        <li value="4">其他</li>
                      </ul>
                    </div>
                    <a class="report_select"><em></em></a></td>
                </tr>
                <tr>
                  <td>详情描述：</td>
                  <td><textarea id="problem_txt" name="content"  maxlength="1000" placeholder="请您描述问题详情，以便我们帮您核实情况。"></textarea></td>
                </tr>
                <tr>
                  <td></td>
                  <td class="report_last">
                     <span class="report_txt">还可输入<b>500</b>字&nbsp;&nbsp;&nbsp;</span>
                   </td>
                </tr>
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input class="sure_submit" id="report_submit" type="submit" value="确认提交"/></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
    <!-- end -->

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



    <!--地图弹窗-->
    <div id="baiduMap" class="popup" style="padding-bottom:0px;">
      <div id="allmap"></div>
    </div>
    <!--/#baiduMap-->

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
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3d6a9f4b807441569414b01eecc20959"></script>
  <script type="text/javascript">
    //百度地图API功能
    var sMap = new BMap.Map("smallmap");
    sMap.enableScrollWheelZoom(true);

    if($('#positionLat').val() && $('#positionLng').val()){
      var sPoint = new BMap.Point($('#positionLng').val(),$('#positionLat').val());
      sMap.centerAndZoom(sPoint,12);
      sMap.addOverlay(new BMap.Marker(sPoint));              // 将标注添加到地图中

    }else{
      // 创建地址解析器实例
      var sMyGeo = new BMap.Geocoder();
      // 将地址解析结果显示在地图上,并调整地图视野
      sMyGeo.getPoint("<?php echo ($info["gongzuo_dizhi"]); ?>", function(sPoint){
        if (sPoint) {
          sMap.centerAndZoom(sPoint, 16);
          sMap.addOverlay(new BMap.Marker(sPoint));
        }
      }, "<?php echo ($info["gongzuo_dizhi"]); ?>");
    }

    /*弹窗大地图*/
    var map = new BMap.Map("allmap");
    map.addControl(new BMap.NavigationControl());
    map.addControl(new BMap.MapTypeControl());
    map.addControl(new BMap.OverviewMapControl());
    map.enableScrollWheelZoom(true);
    // 创建地址解析器实例
    var gc = new BMap.Geocoder();
    $(function(){
      $('#mapPreview').bind('click',function(){
        $.colorbox({inline:true, href:"#baiduMap",title:"上班地址"});
        var address = "<?php echo ($info["gongzuo_dizhi"]); ?>";
        var city = "<?php echo ($info["gongzuo_chengshi"]); ?>";
        var lat = $('#positionLat').val();
        var lng = $('#positionLng').val();
          map.setCurrentCity(city);
          map.setZoom(12);
        if(lat && lng){
          var p = new BMap.Point(lng, lat);
          var marker = new BMap.Marker(p);  // 创建标注
          map.addOverlay(marker);              // 将标注添加到地图中
          setTimeout(function(){
            map.centerAndZoom(p, 15);
          },1000);
          map.setCenter(p);
          map.setZoom(15);
          var sContent =
            "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>"+city+"</h4>" +
            "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>"+address+"</p>" +
            "</div>";
           var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
          //图片加载完毕重绘infowindow
          marker.openInfoWindow(infoWindow);
        }else{
          gc.getPoint(address, function(point){
              if (point) {
                  var p = new BMap.Point(point.lng, point.lat);
                var marker = new BMap.Marker(p);  // 创建标注
                map.addOverlay(marker);              // 将标注添加到地图中
                setTimeout(function(){
                  map.centerAndZoom(p, 15);
                },1000);
                map.setZoom(14);
                var sContent =
                  "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>"+city+"</h4>" +
                  "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>"+address+"</p>" +
                  "</div>";
                 var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
                //图片加载完毕重绘infowindow
                marker.openInfoWindow(infoWindow);
              }
          }, city);
        }


      });

    });
</script>


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
	  
	  
    /* $(this).unbind("mouseover");
    $(this).unbind("mouseout");
    $(this).find("span#report_jd").addClass("dn") ;
    $(this).removeClass("report_hover");
    $(this).addClass("reported");           
    var jobid = $('#jobid').val();
    $.ajax({
      type:'POST',
      url:ctx+'User/report',
      dataType:'json',
      data:{
        fId:jobid,
        fType:2
      } 
    }).done(function(result){
    	//alert(result.msg);
      if(result.success){
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
      }else{
        $.colorbox({inline:true, href:$("div#has_report"),title:"举报该职位"});
      }
    })   */
    
    
  });
  

</script>

	

  <div class="clear"></div>
</div>
<!-- end #container -->
</div>
<!-- end #body -->

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