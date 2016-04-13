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


<link rel="stylesheet" type="text/css"  href="/Public/Home/css/company.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/external.min.css" />
<script type="text/javascript" src="/Public/Home/js/timeCountDown.js"></script>
<script type="text/javascript" src="/Public/Home/js/additional-methods.js"></script>
<script type="text/javascript" src="/Public/Home/js/company/jobs.js"></script>
<script type="text/javascript" src="/Public/Home/js/company/spsd.js"></script>

<script type="text/javascript" src="/Public/Home/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.jscrollpane.min.js"></script>
<style type="text/css">
.jp-container{width:100%;height:280px;position:relative;float:left;}
.jspTrack{ background:none !important;}
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
  
    <div class="clearfix">
      <div class="w640">
        <div class="c_detail">
        
          <div class="c_logo" style="background-color:#fff;"> 
             <div href="#" id="logoShow" >
              <?php if($info['logo']){ ?> 
                 <img class="myclogo" src="<?php echo ($info["logo"]); ?>" width="220" height="220" alt="公司logo"/>
              <?php }else{ ?> 
                 <img src="/Public/Home/images/com_logo.gif" width="220" height="220" alt="公司logo"/>
             <?php } ?> 
            </div>
		  </div>
			
          <div class="c_box companyName">
          
            <h2 title="<?php echo ($info["company_short_name"]); ?>"><?php if($info['company_short_name'])echo $info['company_short_name'];else echo $info['company_name']; ?></h2>
            
            <?php if($info['isv']==2){ ?>
            	<em class='valid'></em>
            <?php }else{ ?>
	            <em></em>            
	            <!-- 如果通过验证,上边的em标签添加css，例：<em class='valid'></em> --> 
	            <span class="va dn">未认证企业</span>
            <?php } ?>
            
<!-- 收藏&微信 /// 收藏成功后的css样式:cursc /// --> 
        <div class="myscwx rt">
           
           <?php if($cuser_type){}elseif(!in_array($info['com_id'],$cids)){ ?>
           	<div class="shoucang" title="添加收藏" onclick="return user_collection(<?php echo ($info["com_id"]); ?>,1,2,1)"></div>
           <?php }else{ ?>
           	<div class="shoucang cursc" title="取消收藏" onclick="return user_collection(<?php echo ($info["com_id"]); ?>,0,2,1)"></div>
           <?php } ?>
           
          <div class="jd_share">
                <span class="dn" id="share_jd">分享到微信</span>
                <div class="jd_share_success">
                <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" />
                </div>
            </div>
        </div> 
                 
            <div class="clear"> </div>
            <h1 class="fullname" title="<?php echo ($info["company_name"]); ?>"><?php echo ($info["company_name"]); ?></h1>
            <div class="cominfo2">
                 <font>地点</font><span id="didian"><?php echo ($info["company_city"]); ?></span>
                 <font>规模</font><span id="guimu"><?php echo ($info["guimu"]); ?></span>
                 <font>公司性质</font><span id="gongsixz" style="padding:0"><?php echo ($gongsi_xingzhi[$info['gongsi_xingzhi']]); ?></span>
               <div class="clr"></div>
                 <div><font>行业</font><span id="hangye"><?php echo ($info["hangye"]); ?></span></div>
                 <div class="clr"></div>
                 <div><font>主页</font><a id="mygourl" href="http://<?php echo ($info["web_url"]); ?>" target="_blank" style="color:#ac6198"><span id="zhuye"><?php echo ($info["web_url"]); ?></span></a></div>
               <div class="clr"></div>
            </div>
            
            
            
            <div class="clear oneword"> 
              <img src="/Public/Home/images/quote_l.png" width="17" height="15"/>&nbsp; 
              <span><?php echo ($info["descri"]); ?></span> &nbsp;<img src="/Public/Home/images/quote_r.png" width="17" height="15"/> 
            </div>
            
            <div class="mybiaoqian">
              <ul class="reset clearfix" id="hasLabels" style="overflow:auto">
              	<?php if($info['tags']){ $tags = explode(",",$info['tags']); foreach( $tags as $k=>$v){ echo '<li><span>'.$v.'</span></li>'; } } ?>
              </ul>
            </div>
            
            
          </div>
          
          <div class="clear"> </div>
        </div>
        
        
        <div class="c_breakline"></div>
        
<!-- 内容切换 -->        
        <div class="slideTxtBox">
        
         <div class="hd">
            <ul>
            	 <?php if($photos || $video || $info['content']){ ?>
                 <li id="mytt1" class="on">公司介绍</li>
                 <?php } ?>
                 
                 <?php if($cuser_type==1){}else{ ?>
	                 <?php if($xjh_video){ ?>
	                 <li id="mytt2">宣讲会</li>
	                 <?php } ?>
	                 <?php if($xjh_word){ ?>
	                 <li id="mytt3">宣讲会日程</li>
	                 <?php } ?>
                 <?php } ?>
            </ul>
        </div>
        
    <div class="bd">
    
    	<?php if($photos || $video || $info['content']){ ?>
    
    	<ul class="wh">
           <!-- 公司图片开始 -->
           <?php if($photos){ ?>
                <div class="comfocus">
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
                </div>
                <script>
                 $(".sPrev,.sNext").show();
                 $(".comfocus").slide({ titCell:".num ul" , mainCell:".tihspic" , effect:"left",prevCell:".sPrev",nextCell:".sNext", autoPlay:false, delayTime:800 ,interTime:4000,autoPage:"<a></a>" });
                </script>
              <?php } ?>
                 
              <!-- 公司视频开始 -->
              <?php if($video){ ?>
              <div class="comifpt">
                     <div class="videovw">
                         <?php if(!$video['thumb']){ ?>   
                                  <a class="inline" href="#showmyvideo" title="<?php echo ($video["title"]); ?>"><i class="vvplay"></i><img class="icovd" width="130" height="60" src="/Public/Home/images/icovd.gif" /></a>
                         <?php }else{ ?>
                                 <a class="inline" href="#showmyvideo" title="<?php echo ($video["title"]); ?>"><i class="vvplay"></i><img class="icovd" src="<?php echo ($video["thumb"]); ?>" width="130" height="60" /></a>
                         <?php } ?> 
                        
                        <div class="info lf">
                          <h4><?php echo ($video["title"]); ?></h4>
                          <em><?php echo (showday($video["addtime"],"Y/m/d")); ?></em>
                        </div>
                      </div>
               </div>
               <?php } ?>
               
             <div style="display:none;"> 
             <style>.popup{ padding:0;}</style>
              <div id="showmyvideo" class="popup" style="<?php if($video['type']=='腾讯视频'){ echo 'width:710px; text-align:center; height:370px; padding-top:4px; overflow:hidden;';}else{echo 'padding:4px 6px;';} ?> ">
                  <iframe frameborder="0" width="700" height="400" src="<?php echo ($video["url"]); ?>" allowfullscreen></iframe>
              </div>
           </div>
              
              <!-- 公司介绍开始 -->
              <div class="comtxtinfo">
               <div class="h20"></div>
                  <?php echo ($info["content"]); ?>
              </div>
        </ul>
        
        <?php } ?>
        
        
        <?php if($cuser_type==1){}else{ ?>
        
        
        <?php if($xjh_video){ ?>
        <ul class="wh">
             <div class="videoxjlt">
                 <div id="jp-container1" class="jp-container1" style="height:328px; position:relative;">
                 
                      <ul>
                      
                      <?php if(is_array($xjh_video)): $k = 0; $__LIST__ = $xjh_video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li <?php if($k%2== '1'): ?>class="bgfff"<?php endif; ?> >
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
        <?php } ?>
        
        
        <?php if($xjh_word){ ?>
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
                        <td class="xjpl"  width="160"><span><b><?php echo ($v["date_ymd"]); ?></b>(周<?php echo getWeekName($v['date_ymd']); ?>)</span></td>
                        <td width="60"><?php echo ($v["date_time"]); ?></td>
                        <td>
                          <?php echo (getplacebyid($v["cid"])); ?>，<?php echo ($v["school"]); ?>，<br />
                          <?php echo ($v["address"]); ?>
                        </td>
                        <td>
                        <?php if($cuser_type){}elseif(!in_array($v['vid'],$vcids)){ ?>
			           	<a class="mystaradd" href="javascript:void(0);" title="添加收藏" onclick="return user_collection(<?php echo ($v["vid"]); ?>,1,3,1)"></a>
			           <?php }else{ ?>
			           	<a class="mystar" href="javascript:void(0);" title="取消收藏" onclick="return user_collection(<?php echo ($v["vid"]); ?>,0,3,1)"></a>
			           <?php } ?>
                        
                        </td>
                     </tr><?php endforeach; endif; else: echo "" ;endif; ?>                      
                     

                 </table>
	      </div>	

     </div>
        </ul>
        <script type="text/javascript" src="/Public/Home/js/scrollbar.js"></script>  
        <?php } ?>
        
        
        <?php } ?>
        
        
    </div>
    
<script type="text/javascript">
	   $(".videovw a").hover(
	      function(){
		     $(".vvplay").show();
		  },function(){
			 $(".vvplay").hide();
	    })
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
        <div style="height:20px; background:#fff;"></div>
        <dl class="c_section">
          <dt>
            <h2>招聘职位</h2>
          </dt>
           <div class="h20"></div>
          <dd>
            <ul class="reset c_jobs" id="jobList">
            
            <?php if(is_array($joblist)): $i = 0; $__LIST__ = $joblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li> <a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>.html" target="_blank">
                <h3><span class="pos" title="<?php echo ($v["zhiwei_mingcheng"]); ?>"><?php echo ($v["zhiwei_mingcheng"]); ?></span> <span>[<?php echo ($v["gongzuo_chengshi"]); ?>]</span> </h3>
                <div> 月薪：<?php echo ($v["yuexin_min"]); ?>k-<?php echo ($v["yuexin_max"]); ?>k &nbsp;&nbsp;&nbsp; 经验：<?php echo ($v["gongzuo_jingyan"]); ?> &nbsp;&nbsp;&nbsp; 学历要求：<?php echo ($v["xueli"]); ?> </div>
                </a>
			 </li><?php endforeach; endif; else: echo "" ;endif; ?>  

            </ul>
          </dd>
        </dl>
        
        <!-- end #Profile -->
        
        <input type="hidden" id="hasNextPage" name="hasNextPage" value="" />
        <input type="hidden" id="pageNo" name="pageNo" value="" />
        <input type="hidden" id="pageSize" name="pageSize" value="" />
        <div id="flag"></div>
      </div>
      <!-- end .content_l -->
      
      
      
      
      <div class="w280">
      
      <?php if($leads){ ?>
        <div id="Member"> 
          <!--创始团队-->
          <dl class="c_section c_member">
            <dt>
              <h2>创始团队</h2>
			</dt>
          <dd>
              <div class="member_wrap"> 
              
                <!-- 显示创始人 -->
                <?php if(is_array($leads)): $i = 0; $__LIST__ = $leads;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="member_info">
                      <div class="m_portrait">
                        <div></div>
                        <img src="<?php echo ($v["photo"]); ?>" width="120" height="120" alt="" /></div>
                      <div class="m_name"><?php echo ($v["name"]); ?>
                        <?php if($v['weibo']){ ?>
                            <a class="weibo" target="_blank" href="<?php echo ($v['weibo']); ?>"></a>
                        <?php } ?>
                      </div>
                      <div class="m_position"><?php echo ($v["position"]); ?></div>
                      <div class="m_intro"><?php echo ($v["remark"]); ?></div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                
                
              </div>
              <!-- end .leader_wrap --> 
            </dd>
          </dl>
        </div>
     <?php } ?>
        <!-- end #Member --> 
        
        
   <!--求职礼包-->
         <?php if($qzmj){ ?>
          <dl class="c_section c_reported">
            <dt>
              <h2>求职礼包</h2>
            </dt>
            <dd>
              <ul class="reset">
                 <?php if(is_array($qzmj)): $i = 0; $__LIST__ = $qzmj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["attach_url"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>" class="article1" rel="nofollow"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </dd>
          </dl>
        <?php } ?>   
      
      
        
    <!--公司深度报道-->
         <?php if($articles){ ?>
            <dl class="c_section c_reported">
              <dt>
                <h2>公司报道</h2>
              </dt>
              <dd>
                <ul class="reset">
                  <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="http://<?php echo ($v["url"]); ?>" target="_blank" title="<?php echo ($v["title"]); ?>" class="article" rel="nofollow"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
              </dd>
            </dl>
          <?php } ?>   

        <!-- end #Reported --> 
        <div class="bgf9" style=" padding:16px;">
         <img  width="100%" src="/Public/Home/images/maxewm.gif" />
       </div>
       
      </div>
    </div>

    
<script type="text/javascript" src="/Public/Home/js/company/company.js"></script> 
     
     
  </div>
  <!-- end #container --> 
</div>
<!-- end #body --> 
<script>
	$(document).click(function(){
		$(".jd_share").removeClass('share_open');
		$(".jd_share").removeClass("share_click");
		$(".jd_share").removeClass("share_hover");
	});
	//微信分享
	$('.jd_share').click(function(event){
		$(this).unbind("mouseover");
		$(this).unbind("mouseout");
		if($(this).hasClass("share_open")){
			$(this).removeClass('share_open');
			$(this).removeClass("share_click");
			$(this).removeClass("share_hover");
		}else{
			$(this).addClass('share_open');
			$(this).addClass("share_click");	
			$(this).find("span#share_jd").addClass("dn") ;
		}
		/*$(this).find("span#share_jd").addClass("dn") ;*/
		event.stopPropagation();	
	});
</script>

      
<script type="text/javascript" src="/Public/Home/js/core.min.js"></script> 
<script type="text/javascript" src="/Public/Home/js/popup.js"></script> 
<!--copy账号系统的passport.html--> 

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