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


<script type="text/javascript">
var ctx = "<?php echo (WEB_URL); ?>";
var ctx_new = "<?php echo (WEB_URL); ?>";
var rctx = "<?php echo (WEB_URL); ?>";
var pctx = "<?php echo (WEB_URL); ?>";
</script>

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/company.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/external.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/popup.css"/>
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/upload.css" />
<script type="text/javascript" src="/Public/Home/js/timeCountDown.js"></script>
<script type="text/javascript" src="/Public/Home/js/additional-methods.js"></script>
<script type="text/javascript" src="/Public/Home/js/company/jobs.js"></script>
<script type="text/javascript" src="/Public/Home/js/company/spsd.js"></script>
<script type="text/javascript" src="/Public/Home/js/swfupload.js"></script>
<script type="text/javascript" src="/Public/Home/js/handlers.js"></script>

<script type="text/javascript" src="/Public/Home/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.jscrollpane.min.js"></script>
<style type="text/css">
.jp-container{width:100%;height:280px;position:relative;float:left;}
.jspTrack{ background:none !important;}
.ui-slider-horizontal .ui-slider-handle{ top:-8px;}
</style>

<!--后台给出的变量天数》0-->
<script>
    var cd = {
            $: function(id){
                return document.getElementById(id);    
            },
            futureDate: -6857648427,
            obj: function(){
                return {
                    sec: cd.$("activity_minute"),
                    mini: cd.$("activity_hour"),
                    hour: cd.$("activity_day")
                }
            }
        };
        fnTimeCountDown(cd.futureDate, cd.obj());

</script>


<div id="body">


  <div id="container"> 
  
    <!-- <script src="http://www.lagou.com/flash/Scripts/swfobject_modified.js" type="text/javascript"></script> -->
    
    <div class="clearfix">
      <div class="w640">
        <div class="c_detail">
        
          <div class="c_logo" style="background-color:#fff;"> 
           <input type="file" class="mr_headfile" id="up_txpic" name="headPic" onchange="myresumeCommon.utils.imageUpload(this,myresumeCommon.requestTargets.photoUpload,uploadPhoto.upSucc,uploadPhoto.upFail);" title="支持jpg、jpeg、gif、png格式，文件小于10M" />
               <a href="#" id="logoShow">
               <?php if($myinfo['logo']){ ?> 
                 <img id="userpic" src="<?php echo ($myinfo["logo"]); ?>" width="220" height="220" alt="公司logo" class="mr_headimg"/>
               <?php }else{ ?> 
                 <img id="userpic" src="/Public/Home/images/com_logo.gif" width="220" height="220" alt="公司logo" class="mr_headimg"/>
               <?php } ?> 
               <span>上传公司Logo<br/>
                尺寸：220*220px <br />
                大小：小于5M</span> </a>
               <?php if(!$myinfo['logo']){ ?>
                  <div id="logoerr"><span class="error1">请上传公司logo</span></div>
                <?php } ?> 
		  </div>
			
          <div class="c_box companyName">
          
            <h2 title="<?php echo ($myinfo["company_short_name"]); ?>"><?php if($myinfo['company_short_name'])echo $myinfo['company_short_name'];else echo $myinfo['company_name']; ?></h2>
            
            <?php if($myinfo['isv']==2){ ?>
            	<em class='valid'></em>
            <?php }else{ ?>
	            <em></em>            
	            <!-- 如果通过验证,上边的em标签添加css，例：<em class='valid'></em> --> 
	            <span class="va dn">未认证企业</span> <a id="shenqrz" href="/Company/auth.html" class="applyC dn" target="_blank">申请认证</a>
            <?php } ?>
            
            <div class="clear"> </div>
            <h1 class="fullname" title="<?php echo ($myinfo["company_name"]); ?>"><?php echo ($myinfo["company_name"]); ?></h1>
            <div class="cominfo2">
                 <font>城市</font><span id="didian"><?php echo ($myinfo["company_city"]); ?></span>
                 <font>规模</font><span id="guimu"><?php echo ($myinfo["guimu"]); ?></span>
                 <font>公司性质</font><span id="gongsixz" style="padding:0"><?php echo ($gongsi_xingzhi[$myinfo['gongsi_xingzhi']]); ?></span>
               <div class="clr"></div>
                 <div><font>行业</font><span id="hangye"><?php echo ($myinfo["hangye"]); ?></span></div>
                 <div class="clr"></div>
                 <div><font>主页</font><a id="mygourl" href="http://<?php echo ($myinfo["web_url"]); ?>" target="_blank" style="color:#ac6198"><span id="zhuye"><?php echo ($myinfo["web_url"]); ?></span></a></div>
               <div class="clr"></div>
            </div>
            <form id="editDetailForm" class="clear editDetail dn">
              <p class="company-tip"> 如需修改公司全称，请发邮件至service@jobsminer.cc</p>
              <input type="text" class="mt14" id="companyShortName" name="companyShortName" value="<?php echo ($myinfo["company_short_name"]); ?>" placeholder="请输入公司简称"/>
              <input type="text" class="mt14" id="companyFeatures" name="companyFeatures" value="<?php echo ($myinfo["descri"]); ?>" maxlength="50" placeholder="一句话描述公司优势，核心价值，限50字"/>
              
              <span id="beError" style="display:none" class="error"></span>
              <table style="margin-top:10px;">
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="40" valign="top" style="padding-top:12px;">城市</td>
                        <td width="156" valign="top"><input type="text" style="width:110px;" id="city" name="city" value="<?php echo ($myinfo["company_city"]); ?>" placeholder="请输入地点" /></td>
                        <td width="40" valign="top" style="padding-top:12px;">规模</td>
                        <td valign="top"><input type="hidden" name="companySize" id="companySize" value="<?php echo ($myinfo["guimu"]); ?>">
                          <input type="button" class="select_tags" id="select_sca" value="<?php echo ($myinfo["guimu"]); ?>"  placeholder="选择企业规模">
                          <div id="box_sca" class="selectBox dn">
                            <ul class="reset">
                              <li >少于15人</li><!-- class="current" -->
                              <li>15-50人</li>
                              <li>50-150人</li>
                              <li>150-500人</li>
                              <li>500-2000人</li>
                              <li>2000人以上</li>
                            </ul>
                          </div></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td height="10"></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="10" valign="top" style="padding-top:12px;">性质</td>
                  <td>
                          <input type="button" class="select_tags2" id="select_sca2" value="<?php if(!$myinfo['gongsi_xingzhi'])echo '选择企业性质';else echo $gongsi_xingzhi[$myinfo['gongsi_xingzhi']]; ?>" >
                          <input type="hidden" name="gongsi_xingzhi" id="gongsi_xingzhi" value="<?php echo $myinfo['gongsi_xingzhi']; ?>" >
                          <div id="box_sca2" class="selectBox2 dn">
                            <ul class="reset">
                              	<?php foreach($gongsi_xingzhi as $kk=>$vv){ ?>
                              	<li xzid="<?php echo ($kk); ?>"><?php echo ($vv); ?></li>
                              	<?php } ?>
                              </volit>
                            </ul>
                          </div></td>
                </tr>
                <tr>
                  <td height="10"></td>
                  <td></td>
                </tr>
                <tr>
                  <td width="38" valign="top" style="padding-top:12px;">行业</td>
                  <td>
                    
                    <input type="hidden" name="hangye_id" value="<?php echo ($myinfo["hangye_id"]); ?>" id="hangye_id" />
                    <input type="button" class="selectr select_sca4"  id="select_category"  value="<?php if($myinfo['hangye'])echo $myinfo['hangye'];else echo '请选择行业领域'; ?>"  />
                    <input type="hidden" name="positionType" value="<?php echo ($myinfo["hangye"]); ?>" id="positionType" />
                    <div id="box_job" class="dn">
                    
	                    <?php if(is_array($hangye_lingyu)): $i = 0; $__LIST__ = $hangye_lingyu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
	                        <dt><?php echo ($v["title"]); ?></dt>
	                        <dd>
	                          <ul class="reset job_main">
	                            <?php if(is_array($v["sub"])): $i = 0; $__LIST__ = $v["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li id="<?php echo ($vv["id"]); ?>"><?php echo ($vv["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
	                          </ul>
	                        </dd>
	                      </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                      

                    </div></td>
                </tr>
                <tr>
                  <td height="10"></td>
                  <td></td>
                </tr>
                <tr>
                  <td>主页</td>
                  <td><input type="text" style="width:316px;" id="companyUrl" name="companyUrl" value="<?php echo ($myinfo["web_url"]); ?>" placeholder="请输入网址"></td>
                </tr>
              </table>
              <input type="hidden" value="<?php echo ($myinfo["company_city"]); ?>" id="comCity">
              <input type="hidden" value="<?php echo ($myinfo["hangye"]); ?>" id="comInd">
              <input type="hidden" value="<?php echo ($myinfo["guimu"]); ?>" id="comSize">
              <input type="hidden" value="<?php echo ($myinfo["web_url"]); ?>" id="comUrl">
              <input type="hidden" name="companyId" id="companyId" value="<?php echo ($myinfo["uid"]); ?>"/>
              
           
            
            
            
           
            
<!--编辑标签-->          
            <div class="mybiaoqian">
              <h3 class="dn">已选择标签</h3>
              <ul class="reset clearfix" id="hasLabels" style="overflow:auto">
              	<?php if($myinfo['tags']){ $tags = explode(",",$myinfo['tags']); foreach( $tags as $k=>$v){ echo '<li><span>'.$v.'</span></li>'; } } ?>
                <li class="link clr">+添加标签</li>
              </ul>
              <div id="addLabels" class="dn"> <a href="javascript:void(0)" class="change" id="changeLabels">换一换</a>
                <input type="hidden" id="labelPageNo" value="1"/>
                <input type="submit" id="add_label" class="fr" value="贴上"/>
                <input type="text" class="label_form fr" id="label" name="label" placeholder="添加自定义标签"/>
                <div class="clear"> </div>
                <ul class="reset clearfix">
                	
                </ul>
              </div>
            </div>
           
           
            
            <div class="clr pdt10">
                <input type="submit" class="mybtn2 f16" id="saveDetail" value="保存"/>
                <a href="#" class="mybtn2s f16" id="cancelDetail">取消</a> 
             </div>
 </form>  
           
<!-- 一句话 -->              
         <div class="clear oneword"> 
              <img src="/Public/Home/images/quote_l.png" width="17" height="15"/>&nbsp; <span><?php echo ($myinfo["descri"]); ?></span> &nbsp;<img src="/Public/Home/images/quote_r.png" width="17" height="15"/> 
         </div>
         
<!-- 显示标签 -->         
         <div id="mybiaoq" class="mybiaoqian">
              <ul class="reset clearfix" id="hasLabels2" style="overflow:auto">
              	<?php if($myinfo['tags']){ $tags = explode(",",$myinfo['tags']); foreach( $tags as $k=>$v){ echo '<li><span>'.$v.'</span></li>'; } } ?>
              </ul>
            </div>
           
</div>
          
          <a href="javascript:void(0);" id="editCompanyDetail" class="c_edit2" title="编辑基本信息"></a>
          <div class="clear"> </div>
        </div>
<input id="mypdtag" type="hidden" value="" />
       
        
        <div class="c_breakline"></div>
        <div class="slideTxtBox">
          <div class="hd">
            <ul>
                <li id="mytt1" >公司介绍</li>
                <?php if($cuser_type==1){}else{ ?>
                <li id="mytt2">宣讲会</li>
                <li id="mytt3">宣讲会日程</li>
                <?php } ?>
            </ul>
          </div>
          <div class="bd">
            <ul class="wh">
            

              
    <!---- 公司图片开始 ----->
    	<script type="text/javascript">
		
		var path='/Public/Home';
		var url='/index.php/Index';
		var upmax='20';
	    </script>
		<script type="text/javascript">
                var swfu;
                window.onload = function () {
                    swfu = new SWFUpload({
                        upload_url: "/index.php/Index/uploadImg",
                        post_params: {"PHPSESSID": "<?php echo session_id();?>"},
                        file_size_limit : "5 MB",
                        file_types : "*.jpg;*.png;*.gif;*.bmp",
                        file_types_description : "JPG Images",
                        file_upload_limit : "20",
                        file_queue_error_handler : fileQueueError,
                        file_dialog_complete_handler : fileDialogComplete,
                        upload_progress_handler : uploadProgress,
                        upload_error_handler : uploadError,
                        upload_success_handler : uploadSuccess,
                        upload_complete_handler : uploadComplete,
                        button_image_url : "",
                        button_placeholder_id : "spanButtonPlaceholder",
                        button_width: 150,
                        button_height: 36,
                        button_text : '<span class="spanButtonPlaceholder">选择照片上传</span>',
                        button_text_style : '.spanButtonPlaceholder { font-family:Microsoft YaHei; font-size: 16px; color:#ffffff; } ',
                        button_text_top_padding: 6,
                        button_text_left_padding: 26,
                        button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
                        button_cursor: SWFUpload.CURSOR.HAND,			
                        flash_url : "/Public/Home/flash/swfupload.swf",
                        custom_settings : {
                            upload_target : "divFileProgressContainer"
                        },				
                        debug: false
                    });
                };
        </script>
          <div id="comvimg">
              <div class="profile_wrap"> 
               <?php if(!$photos){ ?>
                
              <!--无图片 -->
                  <dl class="c_section1">
                    <dd>
                      <div class="addnew addico1"> 丰富的图片可以让申请者更加了解您公司多彩的一面哦！<br />
                       需要免费拍照服务可以邮件我们service@jobsminer.cc<br />
                        <a href="javascript:void(0)" id="addIntro">+添加公司照片</a> </div>
                    </dd>
                      <div class="comfgx"></div> 
                  </dl>
                  
                  
              <!--上传图片-->
              <dl id="uppic" class="c_section1 newIntro dn">
                 <dd>     
                  <form action="" method="post">
                      <div>
                         <div class="myupnav">
                             <div class="uploadbtn lf"><span id="spanButtonPlaceholder"></span></div>
                             <div class="info rt">尺寸：640*220px，每张照片限制为5M，可上传20张。</div>
                             <div class="clr"></div>
                         </div>
                           
                          <div id="divFileProgressContainer"></div>
                          <div id="thumbnails">
                              <ul id="pic_list"></ul>
                              <div class="clr"></div>
                          </div>
                      </div>
                      <input type="hidden" name="s" id="cphotos" value=""/>
                      <input type="button" id="company_pic_btn"  class="mybtn2 f16" value="提交" />
                      <a href="javascript:void(0)" class="mybtn2s f16" id="delcomvimg">取消</a>
                  </form>
                </dd>
              </dl>
                  
              <?php }else{ ?>
              
             <!--有图片-->
             
               <div class="comfocus">
                  <a href="javascript:void(0);" id="bteditpic" class="c_edit2" title="编辑基本信息"></a>
                    <ul class="tihspic">
                         <?php foreach($photos as $k=>$v){ ?>
                               <li><img src="<?php echo ($v["url"]); ?>"></li>
                        <?php } ?>
                    </ul>
                    <a class="sNext" href="javascript:void(0)"></a>
                    <a class="sPrev" href="javascript:void(0)"></a>
                    <div class="num">
                        <ul></ul>
                    </div>
                     <div class="clr"></div>
                </div>
                <script>
                 $(".sPrev,.sNext").show();
                 $(".comfocus").slide({ titCell:".num ul" , mainCell:".tihspic" , effect:"left",prevCell:".sPrev",nextCell:".sNext", autoPlay:false, delayTime:800 ,interTime:4000,autoPage:"<a></a>" });
                </script>
    
              
             <!--编辑-->
              <dl id="editpic" class="c_section1 dn">
              <dd>
                <form method="post">
                      <div>
                         <div class="myupnav">
                             <div class="uploadbtn lf"><span id="spanButtonPlaceholder"></span></div>
                             <div class="info rt">尺寸：640*220px，每张照片限制为5M，可上传20张。</div>
                             <div class="clr"></div>
                         </div>
                           
                         <div id="divFileProgressContainer"></div>  
                         <div id="thumbnails">
                             <ul id="pic_list">
                                <?php foreach($photos as $k=>$v){ ?>
                                  <li>
                                    <img src="<?php echo ($v["url"]); ?>" class="myimg">
                                    <img dataid="<?php echo ($v["pid"]); ?>"  class="button" src="/Public/Home/images/fancy_close.png">
                                  </li>
                                <?php } ?>
                             </ul>
                               <div class="clr"></div>
                         </div>
                       </div>
                       
                    
                    <input type="hidden" name="s" id="cphotos" value=""/>
                    <input type="button" id="company_pic_btn"  class="mybtn2 f16" value="提交" />
                     <a href="javascript:top.location.reload();" class="mybtn2s f16" id="qxbjpic">取消</a><font class="f12">（删除图片后点取消即可）</font>
                 </form>
                 </dd>
                  <div class="comfgx"></div> 
              </dl> 
              
			  <script>
			  
			   $("#bteditpic").click(function(){ 
				   $(".comfocus").addClass('dn');
				   $("#editpic").removeClass('dn');
				 });
		
				 
			  $("img.button").click(function(){  
                  $(this).parent().remove();
                  var pid = $(this).attr("dataid");
                  if(!pid) {
                	  alert("操作无效，请刷新页面重试");
                	  return false;
                  }
					
                  $.ajax({
			            type:"POST",
			            url:ctx +"Company/delPhotos",
			            data:{id:pid},
			            datatype: "json",
			            success:function(data){
			            	if(data.status==1){
			            		alert(data.info);   
				            	//window.location.reload();
			            	}
			            	else alert(data.info);      
			            }   ,
			            complete: function(XMLHttpRequest, textStatus){
			            },
			            //调用出错执行的函数
			            error: function(){
			                alert("保存失败，请稍后再试");
			            }        
			         });
	                
                });
              </script> 
              
             <?php } ?>

              <input type="hidden" id="getphoto" value="<?php if(!$photos){echo '1';}else{echo '2';} ?>"/>

           </div>
        </div>
            
            
            <script>
            	$("#company_pic_btn").click(function(){ 
            		
            		var cphotos = $("#cphotos").val();
            		$("#company_pic_btn").attr('disabled',"true");
            		
            		if(cphotos==''){
            			alert("请选择要上传的图片");
            			$("#company_pic_btn").removeAttr("disabled");
            			return false;
            		}
					
  			   		$.ajax({
			            //提交数据的类型 POST GET
			            type:"POST",
			            //提交的网址
			            url:ctx +"Company/savePhotos",
			            //提交的数据
			            data:{cphotos:cphotos},
			            //返回数据的格式
			            datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
			            //在请求之前调用的函数
			            beforeSend:function(){
			            	//$("#msg").html("logining");
			            },
			            //成功返回之后调用的函数            
			            success:function(data){
			            	if(data.status==1){
			            		$("#divFileProgress").hide();
				            	$("#cphotos").val("");	
				            	window.location.reload();
			            	}
			            	else alert(data.info);
			            	$("#company_pic_btn").removeAttr("disabled");
			           		//$("#msg").html(decodeURI(data));           
			            }   ,
			            //调用执行后调用的函数
			            complete: function(XMLHttpRequest, textStatus){
			               //alert(XMLHttpRequest.responseText);
			               //alert(textStatus);
			                //HideLoading();
			            	$("#company_pic_btn").removeAttr("disabled");
			            },
			            //调用出错执行的函数
			            error: function(){
			            	$("#company_pic_btn").removeAttr("disabled");
			                alert("保存失败，请稍后再试");
			            }        
			         });

          			  
            	});
            </script>
        
            
              
       <!-- 公司视频开始 -->
              <div id="comvideo">
                <div class="profile_wrap"> 
                
                  <!--无视频 -->
                  <dl id="vdadd" class="c_section1 <?php if($video) echo 'dn'; ?>">
                    <dd>
                      <div class="addnew addico2"> 公司宣传视频、媒体报道等视频都将大大提高获取优秀人才的机会哦！<br />
                      需要免费拍照服务可以邮件我们service@jobsminer.cc<br />
                        <a href="javascript:void(0)" id="addIntro">+添加公司视频</a> </div>
                    </dd>
                  </dl>
                  
                  <!--发布视频 -->
                  <dl id="vdfom" class="c_section1 newIntro dn">
                    <dd>
                      <form id="comviedo_Form" method="post">
                      
                        <table style="margin-left:30px;" class="f16" width="100%" border="0" cellspacing="10" cellpadding="0">
                        
                          <tr>
                            <td width="130">视频标题</td>
                            <td><input type="text" style="width:340px;" id="video_title" name="video_title" value="<?php echo ($video["title"]); ?>" placeholder="请输入视频标题"></td>
                          </tr>
                          
                          
                          
                          
                          
                          <tr>
                            <td>视频（tpye）</td>
                            <td>
                                
                                <input type="button"  class="select_tags3" name="vide_from" id="select_sca3" value="<?php if($video['type']) echo $video['type'];else echo '选择视频来源'; ?>"  placeholder="选择视频来源">
                                <div id="box_sca3" class="selectBox3 dn">
                                  <ul class="reset">
                                    <li>优酷视频</li>
                                    <li>土豆视频</li>
                                    <li>腾讯视频</li>
                                  </ul>
                                </div>
                                <font class="f12">&nbsp;&nbsp;现已支持优酷、土豆、腾讯视频</font>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>视频地址（url）</td>
                            <td><input type="text"  style="width:340px;" id="video_url" name="video_url" value="<?php echo ($video["url"]); ?>" placeholder="复制视频网站的通用代码"></td>
                          </tr>
                          
                       <tr><td height="10"></td><td></td></tr> 
                          
                          <tr>
                            <td colspan="2"> 
                            
			                <div class="vdfengmian">
			                     <div class="portrait_fm portraitNo"> <span>更换视频封面</span> </div>
			                     <div  class="portraitShow <?php if(!$video[thumb]) echo 'dn'; ?>"> <img id="video_img" src="<?php echo ($video["thumb"]); ?>"  width="130" height="60" /> <span>更换视频封面</span> </div>
			                     <input type="file" id="vdfmup01"  name="myfiles" onchange="member_check2(this,'/Company/uploadImage','portraitNo','portraitShow','type','video_thumb');" title="支持jpg、jpeg、gif、png格式，文件小于5M" value="" />
			                     <input type="hidden" class="type" name="type" value="7" />
			                     <input type="hidden" class="video_thumb" value="<?php echo ($video["thumb"]); ?>" name="video_thumb" id="video_thumb" />
			                </div>
                      
                              <font class="f12">*更换封面图片请上传不大于2M，130*60px的图片，<br />
                                如果没有合适的封面上传会默认统一的封面。</font>
                            </td>
                          </tr>
                          
                          
                        <tr><td height="10"></td><td></td></tr>
                          
                           <tr>
                            <td colspan="2"> 
                               <input class="submit_video mybtn2 f16" type="button" value="保存" />
                             <?php if(!$video){ ?>   
                                <a href="javascript:void(0)" class="mybtn2s f16" id="delcomvideo">取消</a>
                             <?php }else{ ?>
                                 <a href="javascript:void(0)" delvid="<?php echo ($video["vid"]); ?>" class="mybtn2s f16" id="delvideo">删除</a>
                                 <a href="javascript:void(0)" class="mybtn2s f16" style=" padding:8px" id="vdedit">取消</a>
                                 <a href="javascript:void(0)" class="mybtn2s f16 dn" style=" padding:8px" id="vddel">取消</a>
                             <?php } ?> 
                             
                            </td>
                          </tr>
                          
                        </table>

                       
                      </form>
                    </dd>
                  </dl>
                  
                  <!--有视频-->
                  <dl id="vdshow" class="c_section1 <?php if(!$video) echo 'dn'; ?>">
                    <dd>
                      <div class="videovw">
                         <?php if(!$video['thumb']){ ?>   
                                  <a class="inline" href="#showmyvideo" title="<?php echo ($video["title"]); ?>"><i class="vvplay"></i><img class="icovd" src="/Public/Home/images/icovd.gif" /></a>
                         <?php }else{ ?>
                                 <a class="inline" href="#showmyvideo" title="<?php echo ($video["title"]); ?>"><i class="vvplay"></i><img class="icovd" src="<?php echo ($video["thumb"]); ?>" width="130" height="60" /></a>
                         <?php } ?> 
                        
                        <div class="info lf">
                          <h4><?php echo ($video["title"]); ?></h4>
                          <em><?php echo (showday($video["addtime"],"Y/m/d")); ?></em>
                        </div>
                      </div>
                      <a href="javascript:void(0)" class="c_edit" id="editIntro" title="编辑视频"></a> 
                    </dd>
                  </dl>
                  <input type="hidden" id="getvideo" value="<?php if(!$video){echo '1';}else{echo '2';} ?>"/>
                </div>
              </div>
              
           <div style="display:none;"> 
            <style>.popup{ padding:0;}</style>
              <div id="showmyvideo" class="popup" style="<?php if($video['type']=='腾讯视频'){ echo 'width:710px; text-align:center; height:370px; padding-top:4px; overflow:hidden;';}else{echo 'width:700px;padding:4px 6px;';} ?> ">
                  <iframe frameborder="0" width="700" height="400" src="<?php echo ($video["url"]); ?>" allowfullscreen></iframe>
              </div>
           </div>

	 <script>
	   $(".videovw a").hover(
	      function(){
		     $(".vvplay").show();
		  },function(){
			 $(".vvplay").hide();
	    })
        $(".submit_video").click(function(){ 
            
            var video_thumb = $("#video_thumb").val();
            var video_from = $("#select_sca3").val();
            var video_url = $("#video_url").val();
            var video_title = $("#video_title").val();
            
            $(".submit_video").attr('disabled',"true");
            
            if(video_title==''){
                alert("视频标题不能为空");
                $(".submit_video").removeAttr("disabled");
                return false;
            }
			 if(video_from=='选择视频来源'){
                alert("请选择视频来源");
                $(".submit_video").removeAttr("disabled");
                return false;
            }
            if(video_url==''){
                alert("视频地址不能为空");
                $(".submit_video").removeAttr("disabled");
                return false;
            }else if($("#select_sca3").val()=="优酷视频"){
				 if($("#video_url").val().indexOf('player.youku.com')<=0){
				    alert('格式错误！请复制优酷通用代码');
				    $(".submit_video").removeAttr("disabled");
				    return false;
				 }
			}else if($("#select_sca3").val()=="土豆视频"){
				 if($("#video_url").val().indexOf('www.tudou.com')<=0){
				    alert('格式错误！请复制土豆通用代码');
				    $(".submit_video").removeAttr("disabled");
				    return false;
				 }
			}else if($("#select_sca3").val()=="腾讯视频"){
				 if($("#video_url").val().indexOf('v.qq.com')<=0){
				    alert('格式错误！请复制腾讯通用代码');
				    $(".submit_video").removeAttr("disabled");
				    return false;
				 }
			}
	
           
            
            
            $.ajax({
                //提交数据的类型 POST GET
                type:"POST",
                //提交的网址
                url:ctx +"Company/saveVideos",
                //提交的数据
                data:{video_from:video_from,video_thumb:video_thumb,video_title:video_title,video_url:video_url},
                //返回数据的格式
                datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
                //在请求之前调用的函数
                beforeSend:function(){
                    //$("#msg").html("logining");
                },
                //成功返回之后调用的函数            
                success:function(data){
                    if(data.status==1){
                        $("#divFileProgress").hide();
                        $("#video_thumb").val("");	
                        window.location.reload();
                    }
                    else alert(data.info);
                    $(".submit_video").removeAttr("disabled");
                    //$("#msg").html(decodeURI(data));           
                }   ,
                //调用执行后调用的函数
                complete: function(XMLHttpRequest, textStatus){
                   //alert(XMLHttpRequest.responseText);
                   //alert(textStatus);
                    //HideLoading();
                    $(".submit_video").removeAttr("disabled");
                },
                //调用出错执行的函数
                error: function(){
                    $(".submit_video").removeAttr("disabled");
                    alert("保存失败，请稍后再试");
                }        
             });

              
        });
        
    //删除视频
     $("#delvideo").click(function(){  
          var vid = $(this).attr("delvid");
          if(!vid) {
              alert("操作无效，请刷新页面重试");
              return false;
          }

          $.ajax({
                type:"POST",
                url:ctx +"Company/delvideo",
                data:{id:vid},
                datatype: "json",
                success:function(data){
                    if(data.status==1){
                        $("#vdadd").show();
                        $("#vdfom").hide();
                        $("#vdedit").hide();
                        $("#vddel").show();
                        $("#video_title").val("");
                        $("#video_url").val("");
						$("#video_img").attr("src","");
					    $("#video_thumb").val("");
					    $(".portraitShow").addClass("dn");
						
                        //alert(data.info);  
                        //window.location.reload();
                    }
                    else alert(data.info);      
                }   ,
                complete: function(XMLHttpRequest, textStatus){
                },
                //调用出错执行的函数
                error: function(){
                    alert("保存失败，请稍后再试");
                }        
             });
            
        });
        
         $("#vddel").click(function(){  
            $("#vdadd").show();
            $("#vdfom").hide();
          });
          $("#vdedit").click(function(){  
            $("#vdadd").hide();
            $("#vdfom").hide();
            $("#vdshow").show();
          });
    </script>
      
      
              
       <!-- 公司介绍开始 -->
        <div class="comfgx"></div> 
            <div id="Profile">
                <div class="profile_wrap"> 
                
                  <!--无介绍 -->
                  <dl class="c_section1 <?php if($myinfo['content'])echo 'dn'; ?>">
                    <dd>
                      <div class="addnew addico3"> 一篇给力的公司介绍文案是获取优秀人才的第一步！<br />
                        <a href="javascript:void(0)" id="addIntro">+添加公司介绍</a> </div>
                    </dd>
                  </dl>
                  
                  <!--编辑介绍-->
                  <dl class="c_section1 newIntro dn">
                    <dd>
                      <form id="companyDesForm">
                        <textarea id="companyProfile" name="companyProfile" placeholder="请分段详细描述公司简介、企业文化等"><?php echo ($myinfo["content"]); ?></textarea>
                        <div class="word_count fr">你还可以输入 <span>1000</span> 字</div>
                        <div class="clear"></div>
                        <input class="mybtn2 f16" id="submitProfile" type="submit" value="保存" />
                        <a href="javascript:void(0)" class="mybtn2s f16" id="delProfile">取消</a>
                      </form>
                    </dd>
                  </dl>
                  
                  <!--有介绍-->
                  <dl class="c_section1  <?php if(!$myinfo['content'])echo 'dn'; ?>">
                    <dd>
                      <div class="c_intro"><?php echo ($myinfo["content"]); ?></div>
                      <a href="javascript:void(0)" class="c_edit" id="editIntro" title="编辑公司介绍"></a> </dd>
                    </dl>
                    <div class="h20"></div>
                </div>
            </div>
              
     
              
            </ul>
            
            
            <?php if($cuser_type==1){}else{ ?>
            
<!-- 宣讲会列表 -->            
            <ul class="wh">
             <div class="videoxjlt">
                 <div id="jp-container1" class="jp-container1" style="height:328px; position:relative;">
                 
                      <ul>
                      
                      <?php if(is_array($xjh_video)): $k = 0; $__LIST__ = $xjh_video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li <?php if($k%2== '1'): ?>class="bgfff"<?php endif; ?>>
                          <div class="psimg">
                             <a href="/Video/info/id/<?php echo ($v["vid"]); ?>" target="_blank"> <img src="/Public/Home/images/icovd.gif" /></a>
                             <span><?php echo ($v["shichang"]); ?></span>
                           </div>
                           <div class="info lf">
                                <h4><a href="/Video/info/id/<?php echo ($v["vid"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></h4>
                                <em><?php echo ($v["date_ymd"]); ?></em>
                                <i><?php echo ($v["hits"]); ?></i>
                           </div>
                         </li><?php endforeach; endif; else: echo "" ;endif; ?>
                         
                        
                      </ul>
                      
                      
                 </div>	
             </div>
        </ul>
        
        
<!-- 宣讲会日程列表 -->          
        <ul class="wh">
          <div class="xjlist bgf9">
                 <table style="margin-bottom:10px;" width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr class="mtil">
                        <td class="xjpl" width="160">日期</td>
                        <td width="60">时间</td>
                        <td>地点</td>
                        <td  class="xjpr" width="22">&nbsp;</td>
                     </tr>
                   </table>
          <div id="jp-container" class="jp-container">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                     
                     <?php if(is_array($xjh_word)): $k = 0; $__LIST__ = $xjh_word;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr <?php if($k%2== '1'): ?>class="bgfff"<?php endif; ?>>
                        <td class="xjpl" width="160"><span><b><?php echo ($v["date_ymd"]); ?></b>(周<?php echo getWeekName($v['date_ymd']); ?>)</span></td>
                        <td width="60"><?php echo ($v["date_time"]); ?></td>
                        <td>
                          <?php echo (getplacebyid($v["cid"])); ?>，<?php echo ($v["school"]); ?>，<br />
                          <?php echo ($v["address"]); ?>
                        </td>
                        <td><!-- <a class="mystar" href="#" title="取消收藏"></a> --></td>
                     </tr><?php endforeach; endif; else: echo "" ;endif; ?>                  
                     

                 </table>
	         </div>	

         </div>
        </ul>
        
        
        <?php } ?>
        
          </div>
<script type="text/javascript">
	jQuery(".slideTxtBox").slide({effect:"left",trigger:"click",delayTime:0});
	$("#mytt1").click(function(){
		$(".tempWrap").css("height","100%");
	});
	$("#mytt2,#mytt3").click(function(){
		$(".tempWrap").css("height","380px");
	});
</script>
        </div>
        
        <!-- 招聘职位列表开始 -->
     <?php if($joblist){ ?>
        <div style="height:20px; background:#fff;"></div>
        <dl class="c_section">
          <dt>
            <h2>招聘职位</h2>
          </dt>
          <div class="h20"></div>
          <dd>
            <ul class="reset c_jobs" id="jobList">
            
            <?php if(is_array($joblist)): $i = 0; $__LIST__ = $joblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                <a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>.html" target="_blank">
                  <h3><span class="pos" title="<?php echo ($v["zhiwei_mingcheng"]); ?>"><?php echo ($v["zhiwei_mingcheng"]); ?></span> <span>[<?php echo ($v["gongzuo_chengshi"]); ?>]</span> </h3>
                  <div> 月薪：<?php echo ($v["yuexin_min"]); ?>k-<?php echo ($v["yuexin_max"]); ?>k &nbsp;&nbsp;&nbsp; 经验：<?php echo ($v["gongzuo_jingyan"]); ?> &nbsp;&nbsp;&nbsp; 学历要求：<?php echo ($v["xueli"]); ?> </div>
                </a>
                <a href="/Company/createPost/jid/<?php echo ($v["jid"]); ?>"  class="c_edit3" title="编辑招聘信息" target="_blank"></a>
			  </li><?php endforeach; endif; else: echo "" ;endif; ?>  

            </ul>
          </dd>
        </dl>
     <?php } ?>   
        <!-- end #Profile -->
        
        <input type="hidden" id="hasNextPage" name="hasNextPage" value="" />
        <input type="hidden" id="pageNo" name="pageNo" value="" />
        <input type="hidden" id="pageSize" name="pageSize" value="" />
        <div id="flag"></div>
      </div>
      <!-- end .content_l -->
      
      <script>
	    $("#jobList li").hover(function(){
			 $(this).find('a.c_edit3').toggleClass("myshow");;
			});
	  </script>
      
      
      <div class="w280">
        <div id="Member"> 
          
          <!--无创始团队-->
          <dl class="c_section c_member">
            <dt>
              <h2>创始团队</h2>
               <a href="javascript:void(0)" class="c_add <?php if(!$leads)echo 'dn'; ?>" title="添加创始人"></a> </dt>
			</dt>
			
            <dd>
            
            
           <?php if(!$leads){ ?>
              <div class="member_wrap"> 
              
                <!-- 无创始人 -->
                <div class="addnew_right member_info2 ">
					展示公司的领导班子，<br />
                  	提升诱人指数！<br />
                  <a href="javascript:void(0)" class="member_edit">+添加成员</a>
				</div>
				
               
                  <!-- 编辑创始人 -->
                <div class="member_info newMember dn">
                  <form class="memberForm">
                    <div class="new_portrait">
                      <div class="portrait_upload portraitNo"> <span>上传创始人头像</span> </div>
                      <div  class="portraitShow dn"> <img src="" width="120" height="120" /> <span>更换头像</span> </div>
                      <input type="file" id="profiles0" name="myfiles" onchange="member_check(this,'/Company/uploadImage','portraitNo','portraitShow','type','leaderInfos');" title="支持jpg、jpeg、gif、png格式，文件小于5M" value="" />
                      <input type="hidden" class="type" name="type" value="7" />
                      <input type="hidden" class="leaderInfos" name="photo" />
                      <em> 尺寸：120*120px <br />
                      大小：小于5M </em> </div>
                    <input type="text" name="name" value="" placeholder="请输入创始人姓名" />
                    <input type="text" name="position" value="" placeholder="请输入创始人当前职位" />
                    <input type="text" name="weibo" value="" placeholder="请输入创始人新浪微博地址" />
                    <textarea name="remark" maxlength="500" class="s_textarea" placeholder="请输入创始人个人简介"></textarea>
                    <div class="word_count fr">你还可以输入 <span>500</span> 字</div>
                    <div class="clear"></div>
                    <input type="submit" class="mybtn2 f16 btn_small mt10" value="保存" />
                    <a href="javascript:void(0)" class="mybtn2s f16 btn_cancel_s member_delete">删除</a>
                    <input class="leader_id" type="hidden" value="" />
                  </form>
                </div>
                
                <div class="member_info dn"><a href="javascript:void(0)" class="c_edit member_edit" title="编辑"></a>
                      <div class="m_portrait">
                        <img src="" width="120" height="120" alt="" />
                      </div>
                      <div class="m_name"></div>
                      <div class="m_position"></div>
                      <div class="m_intro"></div>
                </div>
                
            
              </div> 
            <?php } ?>
                
                
           <!-- 显示创始人 -->
            <?php if(is_array($leads)): $i = 0; $__LIST__ = $leads;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="member_wrap"> 
               
                <!-- 无创始人 -->
                <div class="addnew_right member_info2 dn">
					展示公司的领导班子，<br />
                  	提升诱人指数！<br />
                  <a href="javascript:void(0)" class="member_edit">+添加成员</a>
				</div>
                
                <div class="member_info newMember dn">
                  <form class="memberForm">
                    <div class="new_portrait">
                      <div class="portrait_upload portraitNo <?php if($v['photo'])echo 'dn'; ?>"> <span>上传创始人头像</span> </div>
                      <div class="portraitShow <?php if(!$v['photo'])echo 'dn'; ?>"> <img src="<?php echo ($v["photo"]); ?>" width="120" height="120" /> <span>更换头像</span> </div>
                      <input type="file"  id="profiles<?php echo ($v['lid']); ?>" name="myfiles" onchange="member_check(this,'/Company/uploadImage','portraitNo','portraitShow','type','leaderInfos');" title="支持jpg、jpeg、gif、png格式，文件小于5M" value="" />
                      <input type="hidden" class="type" name="type" value="<?php echo ($v['lid']); ?>" />
                      <input type="hidden" class="leaderInfos" name="photo" value="<?php echo ($v["photo"]); ?>" />
                      <em> 尺寸：120*120px <br />
                      大小：小于5M </em> </div>
                    <input type="text" name="name" value="<?php echo ($v["name"]); ?>" placeholder="请输入创始人姓名" />
                    <input type="text" name="position" value="<?php echo ($v["position"]); ?>" placeholder="请输入创始人当前职位" />
                    <input type="text" name="weibo" value="<?php echo ($v['weibo']); ?>" placeholder="请输入创始人新浪微博地址" />
                    <textarea name="remark" maxlength="500" class="s_textarea" placeholder="请输入创始人个人简介"><?php echo ($v["remark"]); ?></textarea>
                    <div class="word_count fr">你还可以输入 <span>500</span> 字</div>
                    <div class="clear"></div>
                    <input type="submit" class="mybtn2 f16 btn_small mt10" value="保存" />
                    <a href="javascript:void(0)" class="mybtn2s f16 btn_cancel_s member_delete">删除</a>
                    <input class="leader_id" type="hidden" value="<?php echo ($v['lid']); ?>" />
                  </form>
                </div>
                
                
                <div class="member_info"> <a href="javascript:void(0)" class="c_edit member_edit" title="编辑<?php echo ($v["position"]); ?>"></a>
                  <div class="m_portrait">
                    <div></div>
                    <img src="<?php echo ($v["photo"]); ?>" width="120" height="120" alt="" />
                  </div>
                  
                  <div class="m_name"><?php echo ($v["name"]); ?>
                  	<?php if($v['weibo']){ ?>
                  		<a class="weibo" target="_blank" href="<?php echo ($v['weibo']); ?>"></a>
                  	<?php } ?>
                  </div>
                  <div class="m_position"><?php echo ($v["position"]); ?></div>
                  <div class="m_intro"><?php echo ($v["remark"]); ?></div>
                </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

             
           <!-- end .leader_wrap --> 
              
              
            </dd>
          </dl>
        </div>
        <!-- end #Member --> 
        
        <!--公司深度报道-->
        <div id="Reported"> 
          <!--无报道-->
          <dl class="c_section c_reported">
            <dt>
              <h2>公司报道</h2>
              <a href="javascript:void(0)" class="c_add <?php if(!$articles)echo 'dn'; ?>" title="添加报道"></a> </dt>
            <dd> 
              <!-- 编辑报道 -->
              <ul class="reset">
              	<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
					<a style="" class="article" title="<?php echo ($v["title"]); ?>" target="_blank" href="<?php echo ($v["url"]); ?>"><?php echo ($v["title"]); ?></a> <a title="编辑报道" class="c_edit dn" href="javascript:;" style="display: inline;"></a>
	                  <form class="reportForm dn">
	                    <input type="text" placeholder="请输入文章标题" value="<?php echo ($v["title"]); ?>" name="articleTitle" class="valid">
	                    <input type="text" placeholder="请输入文章链接" value="<?php echo ($v["url"]); ?>" name="articleUrl" class="valid">
	                    <input type="submit" value="保存" class="mybtn2 f16 btn_small mt20">
	                    <a class="mybtn2s f16 btn_cancel_s report_delete" href="javascript:;">删除</a>
	                    <input type="hidden" value="<?php echo ($v["aid"]); ?>" class="article_id">
	                  </form>
	                </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
              
              <!-- 无报道 -->
              <?php if(!$articles){ ?>
              
              <div class="addnew_right reported_info"> 展示外界对公司的深度报道，<br />
                便于求职者了解公司！<br />
                <a href="javascript:void(0)" class="report_edit">+添加报道</a>
			  </div>
			  
			  <?php } ?>
				
              <ul class="newReport dn">
                <li> <a href="#" target="_blank" title="" class="article" style="display:none;"></a> <a href="javascript:;" class="c_edit dn" title="编辑报道"></a>
                  <form class="reportForm">
                    <input type="text" name="articleTitle" value="" placeholder="请输入文章标题" />
                    <input type="text" name="articleUrl" value="" placeholder="请输入文章链接" />
                    <input type="submit" class="mybtn2 f16 btn_small mt20" value="保存" />
                    <a href="javascript:;" class="mybtn2s f16 btn_cancel_s report_cancel">取消</a>
                    <input class="article_id" type="hidden" value="" />
                  </form>
                </li>
              </ul>
              
              
            </dd>
          </dl>
          
          
          <!-- end .c_reported --> 
        </div>
        <!-- end #Reported --> 
        
      </div>
    </div>
    
    <!-------------------------------------弹窗lightbox  ----------------------------------------->
    <div style="display:none;">
      <div id="logoUploader" class="popup" style="width:650px;height:470px;">
        <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="650" height="470">
          <param name="movie" value="/Public/Home/flash/avatar.swf?url=<?php echo (WEB_URL); ?>Company/uploadLogo">
          <param name="quality" value="high">
          <param name="wmode" value="opaque">
          <param name="swfversion" value="111.0.0.0">
          <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
          <param name="expressinstall" value="/Public/Home/flash/expressInstall.swf">
          <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 --> 
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="/Public/Home/flash/avatar.swf?url=<?php echo (WEB_URL); ?>Company/uploadLogo" width="650" height="470">
            <!--<![endif]-->
            <param name="quality" value="high">
            <param name="wmode" value="opaque">
            <param name="swfversion" value="111.0.0.0">
            <param name="expressinstall" value="/Public/Home/flash/expressInstall.swf">
            <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
            <div>
              <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
              <!-- 
              <p><a href="http://www.adobe.com/go/getflashplayer"><img alt="获取 Adobe Flash Player" src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" width="112" height="33" /></a></p>
            	 -->
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
        </object>
      </div>
      <!-- #logoUploader --> 
    </div>
    <!------------------------------------- end -----------------------------------------> 
    
    <script type="text/javascript" src="/Public/Home/js/company/company.js"></script> 
    <script>
var avatar = {};
avatar.uploadComplate = function( data ){
	var result = eval('('+ data +')');
	if(result.success){
		jQuery('#logoShow img').attr("src",ctx+ '/'+result.content);
		$("#logoerr").hide();
		jQuery.colorbox.close();
	}
};
</script> 
    <!-- 添加此段代码的页面：公司列表页面、公司主页【B端和C端】，联系我们、 帮助中心、ua【用户协议】、友情链接--> 
    

  </div>
  <!-- end #container --> 
</div>
<!-- end #body --> 
<script type="text/javascript" src="/Public/Home/js/popup.js"></script> 
<!--copy账号系统的passport.html--> 


<!-- logo上传 -->
    <div style="display:none">
      <div class="popup" id="uploadImages" style="overflow:hidden;width:360px;height:470px;">
        <div class="crop">
          <div id="cropzoom_container" style="overflow:hidden;"></div>
          <div class="page_btn">
            <input type="button" class="btn" id="crop" value="确定" />
            <input type="button" class="cancel" id="restore" value="取消" />
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    
   <script type="text/javascript" src="/Public/Home/js/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script> 
    <script>
	// 设置全局变量
	window.globals =  {};
	
	 u = function() {
		var e, f, g, a = $("#uploadImages"),
			b = a.find("#cropzoom_container"),
			c = a.find("#crop"),
			d = a.find("#restore");
		return c.bind("click", function() {
			e.send(ctx + "Resume/cutHead", "POST", {
				resubmitToken: globals.token
			}, function(a) {
				var b, c, d;
				a = $.parseJSON( a );
				//console.log(a);
				e.showImage.attr("src", ctx + a.content.uploadPath + "?cc=" + Math.random()), $.colorbox.close(), e.showImage = null, null != a.resubmitToken && "" != a.resubmitToken && (globals.token = a.resubmitToken), updateResumeTime(a.content.refreshTime), b = a.content.infoCompleteStatus.score, c = parseInt($.trim($(".mr_bfb").text())), d = amountScore - c + b, updateRatioRM(b, d), $(".shadow").hide(), $(".mr_headfile").hover(function() {
					$(".shadow").show()
				}, function() {
					$(".shadow").hide()
				}), e.restore()
			})
		}), d.bind("click", function() {
			e.restore(), $(".shadow").hide(), $(".mr_headfile").hover(function() {
				$(".shadow").show()
			}, function() {
				$(".shadow").hide()
			}), $.colorbox.close()
		}), f = function(c) {
			var f = $(".mr_headimg"),
				g = ctx +  c.uploadPath;
			$.colorbox({
				inline: !0,
				href: a,
				title: "选择裁剪区域"
			}), myresumeCommon.config.cutImage.image.source = g, myresumeCommon.config.cutImage.image.width = c.srcImageW, myresumeCommon.config.cutImage.image.height = c.srcImageH, myresumeCommon.config.cutImage.selector.w = myresumeCommon.config.userPhotoSelector.width, myresumeCommon.config.cutImage.selector.h = myresumeCommon.config.userPhotoSelector.height, e = b.cropzoom(myresumeCommon.config.cutImage), e.showImage = null, e.showImage = f
		}, g = function() {}, {
			upSucc: f,
			upFail: g
		}
	}(), window.uploadPhoto = u, $("#colorbox").on("click", "#cboxClose", function() {
		"uploadImages" == $(this).siblings("#cboxLoadedContent").children("div").attr("id") && ($(".shadow").hide(), $(".mr_headfile").hover(function() {
			$(".shadow").show()
		}, function() {
			$(".shadow").hide()
		}))
	}), v = function() {
		var e, a = $("#uploadLogos"),
			b = a.find("#cropzoom_container"),
			c = a.find("#crop"),
			d = a.find("#restore"),
			f = function(c, d) {
				var f = $("#" + d).next(".logo_u"),
					g = ctx + "/" + c.uploadPath;
				$.colorbox({
					inline: !0,
					href: a,
					title: "选择裁剪区域"
				}), myresumeCommon.config.cutImage.image.source = g, myresumeCommon.config.cutImage.image.width = c.srcImageW, myresumeCommon.config.cutImage.image.height = c.srcImageH, myresumeCommon.config.cutImage.selector.w = myresumeCommon.config.userPhotoSelector.width, myresumeCommon.config.cutImage.selector.h = myresumeCommon.config.userPhotoSelector.height, e = b.cropzoom(myresumeCommon.config.cutImage), e.showImage = null, e.showImage = f
			},
			g = function() {};
		return c.bind("click", function() {
			$(".jobExpForm").find(":submit").val("上传中").attr("disabled", !0), e.send(ctx + "Resume/cutLogo", "POST", {
				resubmitToken: globals.token
			}, function(a) {
				oMoudle.workId = "", e.showImage.css({
					width: 120,
					height: 120
				}).attr("src", ctx + "/" + a.content + "?cc=" + Math.random()), e.showImage.prev().prev().removeClass("active").addClass("up"), $.colorbox.close(), e.showImage = null, null != a.resubmitToken && "" != a.resubmitToken && (globals.token = a.resubmitToken), $(".jobExpForm").find(":submit").val("保存").attr("disabled", !1), e.restore()
			})
		}), d.bind("click", function() {
			e.restore(), $.colorbox.close()
		}), {
			upSucc: f,
			upFail: g
		}
	}()
	</script> 
    
    <script>
	window.myresumeCommon = window.myresumeCommon || {

	// 请求路径
	requestTargets: {

		//上传头像
		photoUpload : '/Resume/uploadPhoto'
			
	},


    /**
     * 默认配置
     */
    config: {

    	// 用户上传头像的selector的大小
    	userPhotoSelector: {
    		width: 250,
    		height: 250
    	},

    	// 用户上传作品，比例为4:3
    	workShowSelector: {
    		width: 280,
    		height: 210
    	},

    	cutImage: {
		    width: 360,
		    height: 360,
		    bgColor: '#ccc',
		    enableRotation: false,
		    enableZoom: true,
		    selector: {
		        w: 250,
		        h: 250,
		        showPositionsOnDrag: false,
		        showDimetionsOnDrag: false,
		        centered: true,
		        bgInfoLayer: '#fff',
		        borderColor: '#ac6198',
		        animated: false,
		        maxWidth: 358,
		        maxHeight: 358,
		        borderColorHover: '#ac6198'
		    },
		    image: {
		        source: '',
		        // 在上传完图片后，这个必须要设置，width height
		        width: 0,
		        height: 0,
		        minZoom: 10,
		        maxZoom: 300
		    }
		},
    	// 编辑器配置
        tinymce: {
            // Location of TinyMCE script
            script_url: ctx + 'Public/Home/js/tinymce/jscripts/tiny_mce/tiny_mce.js',

            // General options
            theme: "advanced",
            language: "zh-cn",
            plugins: "paste,autolink,lists,style,layer,save,advhr,advimage,advlink,iespell,inlinepopups,preview,media,searchreplace,contextmenu,fullscreen,noneditable,visualchars,nonbreaking",

            // Theme options
            theme_advanced_buttons1: "bullist,numlist",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "none", //定义输入框下方是否显示状态栏，默认不显示
            theme_advanced_resizing: false,
            paste_auto_cleanup_on_paste: true,
            paste_as_text: true,
            auto_cleanup_word: true,
            paste_remove_styles: true,
            contextmenu: "copy cut paste",
            force_br_newlines: true,
            force_p_newlines: false,
            apply_source_formatting: false,
            remove_linebreaks: false,
            convert_newlines_to_brs: true,

            // Example content CSS (should be your site CSS)
            content_css: ctx + "/js/tinymce/examples/css/content.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url: "lists/template_list.js",
            external_link_list_url: "lists/link_list.js",

            // Replace values for the template plugin
            template_replace_values: {
                username: "Some User",
                staffid: "991234"
            },
            onchange_callback: function(editor) {
                tinyMCE.triggerSave();
                var editorContent = tinyMCE.get(editor.id).getContent();
                if (editorContent.length > 20) {
                    $("#" + editor.id).valid();
                }
                /* alert($("#" + editor.id).width());*/
            }
        }

    },

	// 一些工具方法
	utils: {

		imageUpload: function ( targetInput, targetUrl, success, fail ) {

			targetInput = $( targetInput );
			var inputId = targetInput.attr( 'id' );
			var hint = targetInput.attr( 'title' );

			// var dataType = 'json';
			var dataType = 'text';

			var params = { };

			this.AllowExt = '.jpg,.gif,.jpeg,.png,.pjpeg';
			this.FileExt = targetInput.val().substr(targetInput.val().lastIndexOf(".")).toLowerCase();
			if(this.AllowExt != 0 && this.AllowExt.indexOf(this.FileExt) == -1)//judge file format
			{
				errorTips( hint );
				$("input[type = 'file']").val("");
			}else{
				$.ajaxFileUpload ({
					url: targetUrl,
					secureuri: false,
					fileElementId: inputId,
					data: params,
					dataType: dataType,
					// "content":{"srcImageW":650,"srcImageH":346,"uploadPath":"upload/workPic/d7f6a8cb0fd5473193a3ffd021a54838.png"}
					success: function ( rs ) {
						if ( dataType == 'text' )
							rs = $.parseJSON( rs );
						if( rs.success ){
							success && success( rs.content, inputId );
						}
						else{
							fail && fail( 1 );
							errorTips( hint , "上传" );
						}
					},
					error:function(data){
						fail && fail( data );
						errorTips( "上传失败，请重新上传","上传");
					}
				});
			}

		}
	   

	}

};

	</script>
    
    <script type="text/javascript" src="/Public/Home/js/jquery-migrate-1.1.1.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/jquery-ui-1.8.custom.min.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/jquery.cropzoom.js"></script> 
    

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