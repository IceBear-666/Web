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
<div id="body">

<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header">
        <div class="w960">
          <div class="logo"><a href="/index.html"><img src="/Public/Home/images/logo.gif" /></a></div>
          
          
          <?php if(is_login()): if(getUsersSession('type')==1){ ?>
          
          		<div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/info.html">我的公司</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Company/interview.html">简历管理</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div>
          		
          	<?php }else{ ?>
          	
          		<div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a><a <?php echo ($cur_top_nav["collections"]); ?> href="/User/collections.html">我的收藏</a></div>
          		
          		
          	<?php } ?>
          
          	<div class="login">
	          	<div class="icous">
                    <div class="inusnav">
                      <em></em>
                      <?php if(getUsersSession('type')==0){ ?>
                      <a href="/User/delivery.html">投递管理</a>
                      <?php } ?>
                      <a href="/User/index.html">账号设置</a>
                      <a href="<?php echo U('User/logout');?>">退出</a>
                    </div>
                </div>
	          </div>
          
          <?php else: ?>
          
	          <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div>
	          <div class="login">
	          
	          <a class="sty"  href="<?php echo U('User/login');?>">登录</a><a class="sty" href="<?php echo U('User/register');?>">注册</a>
	          </div><?php endif; ?>
          
          </div>
          <div class="clr"></div>
        </div>
      
	</div>

</div><?php endif; ?>

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/company.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/popup.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/external.min.css"/>
<script type="text/javascript" src="/Public/Home/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="/Public/Home/js/timeCountDown.js"></script>
<script type="text/javascript" src="/Public/Home/js/additional-methods.js"></script>
<script type="text/javascript" src="/Public/Home/js/callTimeCountDown.js"></script>

<!--后台给出的变量天数》0-->
<script>
    var cd = {
            $: function(id){
                return document.getElementById(id);
            },
            futureDate: '-7680251632',
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
<script defer id="_lgpassport_" data-css-site="0" data-css-popup="0" src="/Public/Home/js/company/passport.js" onload="passportInit()"></script>
<script type="text/javascript">
	function passportInit(){
		//noticeInit();
	}
</script>

<input type="hidden" value="1" id="pageNo"/>
<input type="hidden" value="1" id="totalPageCount"/>

<div class="sidebar">
  <div class="mr_myresume_r">
    <div class="jllfnav"> 
    <?php if(!$cur_top_nav['post']){ ?>
    <a class="nav1 cur2" href="/Company/interview.html">简历管理</a> 
    <a class="nav2" href="/Company/createPost.html">发布职位</a>
    <?php }elseif($cur_top_nav['post']){ ?>
    <a class="nav1 " href="/Company/interview.html">简历管理</a> 
    <a class="nav2 cur1" href="/Company/createPost.html">发布职位</a>
    <?php } ?>
      <div class="clr"></div>
    </div>
  </div>
  <dl class="company_center_aside">
  	<?php if($job_info){ ?>
  		<dt><?php echo ($job_info["zhiwei_mingcheng"]); ?></dt>
  	<?php }else{ ?>
    	<dt>我收到的简历</dt>
    <?php } ?>
    
    <dd  <?php if($type == 'unhandle'): ?>class="current"<?php endif; ?> > <a  href="/Company/interview/type/unhandle/job_id/<?php echo ($job_id); ?>">待处理简历</a> <span class="dn unHandle"></span> </dd>
    <!-- 需要根据后台的接口做调整 -->
    <dd <?php if($type == 'prepare'): ?>class="current"<?php endif; ?> > <a href="/Company/interview/type/prepare/job_id/<?php echo ($job_id); ?>">待沟通简历</a> <span class="dn goutong"></span> </dd>
    <dd <?php if($type == 'arranged'): ?>class="current"<?php endif; ?> > <a href="/Company/interview/type/arranged/job_id/<?php echo ($job_id); ?>">已安排面试</a> <span class="dn prepare"></span> </dd>
    <dd <?php if($type == 'refuselist'): ?>class="current"<?php endif; ?> > <a href="/Company/interview/type/refuselist/job_id/<?php echo ($job_id); ?>">不合适简历</a> <span class="dn unTreate"></span></dd>
    <dd  <?php if($type == 'autoFilter'): ?>class="btm current"<?php else: ?>class="btm"<?php endif; ?> > <a  href="/Company/interview/type/autoFilter/job_id/<?php echo ($job_id); ?>">自动过滤简历</a> <span class="dn autoFilter"></span> </dd>
  </dl>
  <!--我的邀请  -->
  
  
  <?php if($job_info){ ?>
  		<dl class="company_center_aside">
  			<a href="/Company/interview/">查看全部职位的简历>></a>
  		</dl>
  	<?php }else{ ?>
    	<dl class="company_center_aside">
		    <dt>我发布的职位</dt>
		    <dd  <?php if($type == 'Publish'): ?>class="current"<?php endif; ?> > <a href="/Company/positions/type/Publish">有效职位</a> </dd>
		    <dd <?php if($type == 'Expired'): ?>class="current"<?php endif; ?> > <a href="/Company/positions/type/Expired">已下线职位</a> </dd>
		</dl>
    <?php } ?>
  
  
  
  
  
  <!-- 待沟通，待处理，自动过滤，采用json调用的--> 
  <script>
	$(function(){
		PASSPORT.util.rpc({
	        url:rctx+"Company/queryTipsNums/jid/<?php echo ($job_id); ?>",
	        succ:function(result){
	    		if(result.state == "1"){
	    			var data = result.content.data;
	    			if(data.unHandleNum > 0){
	    				$(".unHandle").text(data.unHandleNum).removeClass("dn");
	    			}else{
	    				$(".unHandle").text("").addClass("dn");
	    			}
	    			if(data.autoFilterNum > 0){
	    				$(".autoFilter").text(data.autoFilterNum).removeClass("dn");
	    			}else{
	    				$(".autoFilter").text(data.autoFilterNum).addClass("dn");
	    			}
	    			if(data.deliverCount > 0){
	    				$(".deliverCount").text(data.deliverCount).removeClass("dn");
	    			}else{
	    				$(".deliverCount").text(data.deliverCount).addClass("dn");
	    			}
	    			if((data.showNum > 0 || data.showNum == 0 ) && data.limitNum > 0  ){
	    				$(".goutong").text( data.showNum +'/'+ data.limitNum ).removeClass("dn");
	    			}else{
	    				$(".goutong").text( data.showNum +'/'+ data.limitNum).addClass("dn");
	    			}
	    			
	    			if(data.unTreateNum > 0){
	    				$(".unTreate").text(data.unTreateNum).removeClass("dn");
	    			}else{
	    				$(".unTreate").text(data.unTreateNum).addClass("dn");
	    			}
	    			
	    			if(data.prepareNum > 0){
	    				$(".prepare").text(data.prepareNum).removeClass("dn");
	    			}else{
	    				$(".prepare").text(data.prepareNum).addClass("dn");
	    			}
	    			
	    		}else{
	    			alert(message);
	    		};
	    	},
	        fail:function(data){
	            console.log('fail:' + data);
	        }
	    });
	}); 
	
	
	/* jQuery.ajax({
	    url:"http://xxxx/plus/getVipTip.json",
	    dataType: 'jsonp',
	    jsonp: 'jsoncallback'
	}).done(function (response) {
	    callback && callback(response);
	});  */
	
	</script> 
  
  
</div>
<!-- end .sidebar -->


    <div class="content">
      <div class="content arrange_view">
        <dl class="company_center_content ">
        
          <form id="filterForm" method="get" action="/Company/interview/type/arranged/">
            
            <input type="hidden" id="nowTime" value="<?php echo date('Y-m-d H:i:s'); ?>" />
            <input type="hidden" id="nowTimeYm" value="<?php echo date('Y-m'); ?>" />
            <input type="hidden" id="nowTimeYmDd" value="<?php echo date('Y-m-d'); ?>" />
            
            <input type="hidden" id="d" name="d" value="<?php echo date('Ymd'); ?>" />
            <!-- <input type="hidden" id="totalCount" name="totalCount" value="2" />
            <input type="hidden" id="r" name="r" value="1" />
            <input type="hidden" id="s" name="s" value="15" /> -->
            <input type="hidden" id="q_flag" name="q_flag" value="1" />
            <input type="hidden" id="positionId" name="positionId" value="" />
            
            <dt id="arrange_interview" class="arrange_interview clearfixs"> <em></em>
              <div class="head_l clearfixs">
                <div class="cy"> <i></i>
                  <input id="datetimepicker" type="text"/>
                </div>
                <div class="search">
                  <input type="text" autocomplete="off" id="search" name="keyword" value="<?php echo ($keyword); ?>" placeholder="搜索姓名或应聘职位" />
                  <a id="searchBtn" href="javascript:;"  class="active" ></a> </div>
              </div>
              <div class="head_r"> <span>面试时间 ：</span> 
              <a href="/Company/interview/type/arranged/job_id/0" <?php echo ($itime_str[0]); ?> >不限</a> 
              <a href="/Company/interview/type/arranged/job_id/0/itime/1" <?php echo ($itime_str[1]); ?>>今天及以后</a> 
              <a href="/Company/interview/type/arranged/job_id/0/itime/-1" <?php echo ($itime_str[-1]); ?>>昨天及以前</a> </div>
            </dt>
            <dd> 
              
              <!-- 已安排的简历列表 开始 -->
              <div class="result_wrap">
              
              	<?php $iii = 0; ?>
              	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; $iii ++; ?>
              
                <div class="result_main">
                
                  <div class="result_date">
                    <p><?php echo ($key); ?>/周<?php echo (getweekname($key)); ?></p>
                  </div>
                  
                  <?php if(is_array($v)): $kk = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><div class="result_time clearfixs">
                    <div class="time_l fl"> <span class="time_dot">
                      <label><?php echo ($vv["data"]); ?></label>
                      <?php echo ($vv["time"]); ?> <em></em> 
                      
                      <i class="<?php if($kk!=1 || $iii!=1) echo 'dn'; ?> "></i> 
                      
                      </span> </div>
                    <div class="time_r fr">
                      <ul>
                        <li class="clearfixs">
                          <div class="portrait fl"> <img src="<?php if($vv['pic'])echo $vv['pic'];else echo '/Public/Home/images/company/default_headpic.png'; ?>" alt="<?php echo ($vv['realname']); ?>" /> </div>
                          <div class="con_l fl">
                            <p class="person_p"><span class="person searchFlagN" title="<?php echo ($vv['realname']); ?>"><?php echo ($vv['realname']); ?></span><span class="mobile"><?php echo ($vv['phone']); ?></span></p>
                            <p class="info"><span class="post"><strong>应聘：</strong><em class="searchFlagP" title="<?php echo ($vv['zhiwei_mingcheng']); ?>"><?php echo ($vv['zhiwei_mingcheng']); ?></em></span><span class="publisher" title="<?php echo ($vv['author']['email']); ?>"><strong>发布人：</strong><?php echo (getemailname($vv['author']['email'])); ?></span></p>
                          </div>
                          <div class="con_r fr"> 
                          
						  <?php if(!$vv['rid']){ ?>
						  
                          <a target="_blank" href="/User/resumePreview/uid/<?php echo ($vv["uid"]); ?>/aid/<?php echo ($vv["aid"]); ?>" class="preview" style="margin-right: 0px;"><span>预览简历</span></a>
                          
                          <?php }else{ ?>
                          
                          <!-- <a href="javascript:void(0);" class="download" data-key="d5dcf9807bcaf5973c5bf21e1a792013" data-type="1"><span>下载简历</span></a>  -->
                          <a href="/Resume/downResume/id/<?php echo ($vv["rid"]); ?>/aid/<?php echo ($vv["aid"]); ?>" class="download" ><span>下载简历</span></a> 
                          
                          <?php } ?>
                          
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
                  
                  
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                
                
                <!-- <div class="result_main">
                
                  <div class="result_date">
                    <p>2015-06-01/周二</p>
                  </div>
                  
                  <div class="result_time clearfixs">
                    <div class="time_l fl"> <span class="time_dot">
                      <label>2015-06-05</label>
                      10:00 <em></em> <i class=" dn "></i> </span> </div>
                    <div class="time_r fr">
                      <ul>
                        <li class="clearfixs">
                          <div class="portrait fl"> <img src="images/myresume/default_headpic.png " alt="头像" /> </div>
                          <div class="con_l fl">
                            <p class="person_p"><span class="person searchFlagN" title="贾逸飞">小伟</span><span class="mobile">18588884327</span></p>
                            <p class="info"><span class="post"><strong>应聘：</strong><em class="searchFlagP" title="UI设计师">UI设计师</em></span><span class="publisher" title="quentin@015guan.com"><strong>发布人：</strong>quentin</span></p>
                          </div>
                          <div class="con_r fr"> <a target="_blank" href=" corpResume/resumeView.html?deliverId=9093074 " class="preview"><span>预览简历</span></a><a target="_blank"  href=" javascript:; " class="download" data-key="d5dcf9807bcaf5973c5bf21e1a792013" data-type="1"><span>下载简历</span></a> </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  
                  <div class="result_time clearfixs">
                  
                    <div class="time_l fl"> <span class="time_dot">
                      <label>2015-06-05</label>
                      11:00 <em></em> <i class=" dn "></i> </span>
					</div>
					
                    <div class="time_r fr">
                      <ul>
                        <li class="clearfixs">
                          <div class="portrait fl"> <img src=" images/myresume/default_headpic.png " alt="头像" /> </div>
                          <div class="con_l fl">
                            <p class="person_p"><span class="person searchFlagN" title="贾逸飞">小伟</span><span class="mobile">18588884327</span></p>
                            <p class="info"><span class="post"><strong>应聘：</strong><em class="searchFlagP" title="UI设计师">UI设计师</em></span><span class="publisher" title="quentin@015guan.com"><strong>发布人：</strong>quentin</span></p>
                          </div>
                          <div class="con_r fr"> <a target="_blank" href=" corpResume/resumeView.html?deliverId=9093074 " class="preview"><span>预览简历</span></a><a target="_blank"  href=" javascript:; " class="download" data-key="d5dcf9807bcaf5973c5bf21e1a792013" data-type="1"><span>下载简历</span></a> </div>
                        </li>
                      </ul>
                    </div>
                    
                  </div>
                  
                  
                  <div class="result_time clearfixs">
                  
                    <div class="time_l fl"> <span class="time_dot">
                      <label>2015-06-05</label>
                      09:00 <em></em> <i class="dash_bottom"></i> </span>
					</div>
					
                    <div class="time_r fr">
                      <ul>
                        <li class="clearfixs">
                          <div class="portrait fl"> <img src=" image1/M00/25/F7/CgYXBlVTLeyAS2toAAFK7u9Dpbs417.jpg " alt="头像" /> </div>
                          <div class="con_l fl">
                            <p class="person_p"><span class="person searchFlagN" title="贾逸飞">贾逸飞</span><span class="mobile">18588884327</span></p>
                            <p class="info"><span class="post"><strong>应聘：</strong><em class="searchFlagP" title="网页设计师">网页设计师</em></span><span class="publisher" title="quentin@015guan.com"><strong>发布人：</strong>quentin</span></p>
                          </div>
                          <div class="con_r fr"> <a target="_blank" href=" nearBy/preview.html?deliverId=9460138 " class="preview"><span>预览简历</span></a><a target="_blank"  href=" corpResume/downloadResume?deliverId=9460138 " class="download" data-key="2b2c049907f64906005724c74c03372c" data-type="0"><span>下载简历</span></a> </div>
                        </li>
                      </ul>
                    </div>
                    
                    
                  </div>
                  
                  
                </div> -->
                
                
                
              </div>
              <!-- 已安排的简历列表 结束 --> 
              
            </dd>
          </form>
        </dl>
        <!-- end .company_center_content --> 
      </div>
      <!-- end .content -->
      
      
      <div style="display:none;" id="nowDivHide">
        <div class="now">
          <div></div>
        </div>
      </div>
      
      
      <div style="display:none;"> 
        <!-- 下载简历 -->
        <div id="downloadOnlineResume" class="popup">
          <table width="100%">
            <tr>
              <td class="c5 f18">请选择下载简历格式：</td>
            </tr>
            <tr>
              <td align="center"><a href="" id="htmlDw" class="btn_s">html格式</a> <a href="" id="wordDw" class="btn_s">doc格式</a> <a href="" id="pdfDw" class="btn_s">pdf格式</a></td>
            </tr>
          </table>
        </div>
        <!--/#downloadOnlineResume--> 
      </div>
      
      <!------------------------------------- end -----------------------------------------> 
      <!-- <script type="text/javascript" src="/Public/Home/js/company/plugins/jquery.ui.datetimepicker.min.js"></script>  -->
      <script type="text/javascript" src="/Public/Home/js/company/haveNotice.min.js"></script>
      
      <style>
		/* .ui-timepicker-select{z-index:9999;} */
		#filterForm .Pagination {margin: 50px 0 0 168px;}
		#ui-datepicker-div{overflow:hidden;}
		.ui-datepicker{width:384px;padding:0;border:2px solid #d1d1d1;}
		.ui-datepicker table{}
		.ui-datepicker *{margin:0;padding:0;}
		.ui-datepicker .ui-datepicker-header{height:54px;line-height:54px;border-bottom:1px solid #e8e8e8;padding:0;background-color:#fff;}
		.ui-datepicker .ui-datepicker-title{color:#333;position:absolute;right:40px;top:22px;width:102px;margin:0;line-height:16px;}
		.ui-datepicker-title .ui-datepicker-year{margin-right:7px;}
		.ui-widget-header .ui-icon{width:7px;height:11px;background:url(/Public/Home/images/company/pre_next.png) no-repeat;}
		.ui-icon-circle-triangle-w{background-position:0 -1px;}
		.ui-datepicker .ui-datepicker-prev{left:231px;top:24px;}
		.ui-datepicker .ui-datepicker-next{right:22px;top:24px;}
		.ui-datepicker .ui-datepicker-next,.ui-datepicker .ui-datepicker-prev{width:10px;height:14px;background-color:#fff;}
		.ui-datepicker .ui-datepicker-next:hover,.ui-datepicker .ui-datepicker-prev:hover{background-color:#fff;}
		.ui-datepicker .ui-datepicker-next .ui-icon-circle-triangle-e{background:url(/Public/Home/images/company/pre_next.png) -33px -1px no-repeat;left:0;top:0;right:0;margin:0;padding:0;}
		.ui-datepicker .ui-datepicker-prev .ui-icon-circle-triangle-w{top:0;left:0;top:0;margin:0;padding:0;}
		.ui-datepicker-title span{font-size:16px;}
		.ui-widget-header .picker_icon{position:absolute;left:16px;top:16px;background: url(/Public/Home/images/company/arrange_interview.png) 0 -32px no-repeat;width: 25px;height: 24px;}
		.ui-datepicker th{padding:12px 20px;}
		.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{background-color:#fff;color:#333;}
		.ui-datepicker-calendar td{border:1px solid #ebebeb;border-bottom:none;margin-left:-1px;padding:0;width:54px;height:38px;}
		.ui-datepicker-calendar td a{position:relative;height:38px;padding:0;text-align:left;font-size:12px;padding-left:6px;}
		.ui-datepicker-today a{background-color:transparent!important;}
		.ui-datepicker-calendar td.active{background-color:#019875!important;}
		.ui-datepicker-calendar td.activebr{background-color:#CACACA!important;}
		.ui-datepicker table{margin-bottom:0;}
		.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{background-color:transparent;}
		.ui-state-default .tip_count{position:absolute;left:0;top:0;width:100%;height:38px;line-height:38px;font-size:18px;font-family:"Microsoft Yahei";font-style:italic;text-align:center;font-weight:normal;color:#fff;}
		.ui-datepicker-calendar td{border-left:none;}
		.company_center_content .Pagination {margin: 0 170px;}
		</style>
		


    </div>
    <!-- end .content -->
    
    <input type="hidden" value="" id="noticeCompanyName"/>
    
    
    <!--------------------------------- 弹窗lightbox ----------------------------------------->
    <div style="display:none;"> <!-- //将原来的发送线上面试和线下面试合二为一弹窗 -->
      <div id="hr_noticeInterview" class="popup" style="height:545px;">
        <div class="interview_notice_box" id="interview_notice_box"> <span class="interview_notice_selected interview_notice_offset" name="interview_notice">发面试通知</span> <span class="interview_notice" name="interview_noticed_already">已安排面试</span> </div>
        <div class="hr_con">
          <form id="hr_noticeInterview_form">
            <table width="100%" class="f16">
              <tr>
                <td width="20%" align="right" class="c9">收件人</td>
                <td width="80%"><span id="receiveEmail" class="c9"></span>
                  <input type="text" name="email" value="" readonly class="receiveEmail" /></td>
              </tr>
              <tr>
                <td align="right"><span class="redstar">*</span>主题</td>
                <td><input type="text" name="subject" placeholder="公司：职位名称面试通知" /></td>
              </tr>
              <tr>
                <td align="right"><span class="redstar">*</span>面试时间</td>
                <td><input type="text" name="interTime" id="datetimepicker" readonly /></td>
              </tr>
              <tr class="select_templete">
                <td align="right"><span>可选模板</span></td>
                <td><span class="notice_templete" style="margin-left:0;">
                  <input type="text" name="selectTemplate" readonly id="notice_select_templete" placeholder="系统模板（默认模板）" class="profile_select_265 profile_select_normal"/>
                  </span>
                  <div  class="boxUpDown dn" >
                    <ul class="reset">
                    </ul>
                  </div>
                  <a target="_blank" href="" class="templete_manage">模板管理</a></td>
              </tr>
              <tr>
                <td align="right"><span class="redstar">*</span>面试地点</td>
                <td><input type="text" name="interAdd" /></td>
              </tr>
              <tr>
                <td align="right"><span class="redstar">*</span>联系人</td>
                <td><input type="text" name="linkMan" /></td>
              </tr>
              <tr>
                <td align="right"><span class="redstar">*</span>联系电话</td>
                <td><input type="text" name="linkPhone" /></td>
              </tr>
              <tr>
                <td align="right" valign="top">补充内容</td>
                <td><textarea name="content"></textarea></td>
              </tr>
              <tr align="right">
                <td></td>
                <td class="effect">编辑内容仅针对本次发送，不会影响模板</td>
              </tr>
              <tr>
                <td></td>
                <td><input class="btn" type="submit" value="发送" />
                  <a href="javascript:;" class="emailPreview">预览</a></td>
              </tr>
            </table>
            <input type="hidden" name="name" value="" />
            <input type="hidden" name="positionName" value="" />
            <input type="hidden" name="companyName" value="" />
            <input type="hidden" name="deliverId" id="deliverId"/>
            <input type="hidden" name="forwardKey" id="forwardKey" value=""/>
          </form>
          <div id="hr_checkContact" class="popup">
            <p>如果已通过电话或邮件通知求职者面试，可以将简历标为“已安排面试”，需要您提供面试时间，标记后，简历会进入已安排面试列表，待沟通名额立即释放</p>
            <div id="hr_checkInterview">
              <form id="hr_checkInterviewForm">
                <table width="100%" class="f16">
                  <tr>
                    <td width="20%" class="effect"></td>
                    <td width="80%"></td>
                  </tr>
                  <tr>
                    <td align="right"><span class="redstar">*</span>面试时间</td>
                    <td><input type="text" name="interTime" id="interviewtime" readonly /></td>
                  </tr>
                  <tr>
                    <td align="right"><span class="redstar">*</span>联系人</td>
                    <td><input type="text" name="contactName" id="contactNameInput" /></td>
                  </tr>
                  <tr>
                    <td align="right"><span class="redstar">*</span>联系电话</td>
                    <td><input type="text" name="contactPhone" id="contactPhoneInput" /></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td align="left"><input class="btn" type="submit" value="确认" />
                      <a href="javascript:;" class="cancelPreview">取消</a></td>
                  </tr>
                </table>
              </form>
            </div>
            <!--/#noticeInterview--> 
          </div>
        </div>
        <input type="hidden" name="name" value="" id="" />
        <input type="hidden" name="positionName" value="" />
        <input type="hidden" name="companyName" value="" />
        <input type="hidden" name="deliverId" id="deliverId" />
      </div>
      
      <!--查看联系方式需要填写hr的信息--> 
      
      <!-- 当达到20时，再次点击查看联系方式 -->
      <div id="reached_limit" class="popup" style="overflow:auto;">
        <div><span></span>待沟通简历太多，请先去处理一些吧</div>
        <a href="javascript:;" class="i_konw">我知道了</a> </div>
      <div id="big_reached_limit" class="popup">
        <div><span></span>待沟通简历太多，先去处理一些吧~</div>
        <a href="javascript:;" class="i_konw">我知道了</a> </div>
      <!-- 待定简历到达上限 -->
      
      
      <div id="reachLimit" class="popup">
        <table width="100%" class="f16">
          <tr>
            <td class="f16" align="center"> 待沟通简历数量已达到上限，暂时无法查看~ </td>
          </tr>
          <tr>
            <td align="center"><input class="btn" type="button" value="我知道了" /></td>
          </tr>
        </table>
      </div>
      
      <!-- 简历状态发生改变 -->
      <div id="statusChange" class="popup">
        <table width="100%" class="f16">
          <tr>
            <td class="f16" align="center"> 简历状态已经发生变化，无法进行当前操作~ </td>
          </tr>
          <tr>
            <td align="center"><input class="btn" type="button" value="确定" /></td>
          </tr>
        </table>
      </div>
      
      <!-- 已经安排为线下面试 -->
      <div id="hasOfflineNotice" class="popup" style="width:440px;height:330px;">
        <div>如果已通过电话或邮件通知求职者面试，可以将简历标为“已安排面试”，需要您提供面试时间，标记后，简历会进入已安排面试列表，待定简历名额立即释放</div>
        <form id="hasOfflineNoticeForm">
          <table>
            <tr>
              <td width="20%"><span class="redstar" style="margin-left:0;">*</span></td>
              <td width="20%"><span>面试时间</span></td>
              <td width="60%"><input type="text" id="mianshiYear" name="noticeTime" readonly class="selectr" /></td>
            </tr>
            <tr>
              <td align="right"><span class="redstar">*</span>联系电话</td>
              <td><input type="text" name="linkPhone" id="linkPhone"/></td>
            </tr>
            <tr>
              <td align="right">联系人</td>
              <td><input type="text" name="linkMan" id="linkMan"/></td>
            </tr>
          </table>
          <input type="hidden" id="offlineDeliverId" />
          <div class="confirm_remark">您确认将简历标注为已安排面试吗？</div>
          <div class="noticeTips">注意：如求职者投诉未收到面试通知，核实后，待定名额上限会被永久减1</div>
          <div class="remark_button"> 
            <!-- <a href="javascript:;" class="confirm_remarkBtn" data-flag="data-deliverId">确认</a> -->
            <input type="submit" value="确认" class="confirm_remarkBtn" data-flag="data-deliverId"/>
            <a href="javascript::" class="cancel">取消</a></div>
        </form>
      </div>
      
      <!--预览通知面试弹窗-->
      <div id="noticeInterviewPreview" class="popup">
        <div class="f18">拉勾网：产品经理面试通知 </div>
        <div class="c9">发给：<span>vivi@xxx.com</span></div>
        <div id="emailText"></div>
        <input class="btn fl" type="button" value="提交" />
        <a href="#hr_noticeInterview" class="inline fl" title="通知面试">返回修改</a> </div>
      <!--/#noticeInterviewPreview--> 
      
      <!--通知面试成功弹窗-->
      <div id="noticeInterviewSuccess" class="popup">
        <table width="100%" class="f16">
          <tr>
            <td class="f16" align="center"> 面试通知已发送成功<br />
              该简历已进入“已安排面试”列表 </td>
          </tr>
          <tr>
            <td align="center"><input class="btn" type="button" value="确认" /></td>
          </tr>
        </table>
      </div>
      <!--/#noticeInterviewSuccess--> 
      
      <!--转发简历弹窗-->
      <div id="forwardResume" class="popup">
        <form id="forwardResumeForm">
          <table width="100%" class="f16">
            <tr>
              <td width="20%" align="right" nowrap >收件人</td>
              <td width="80%"><input type="text" name="recipients" id="recipients" placeholder="最多可添加两个邮箱，用“；”隔开" />
                <span class="beError" style="display:none" id="forwardResumeError"></span></td>
            </tr>
            <tr>
              <td align="right">主题</td>
              <td><input type="text" name="title" value="" /></td>
            </tr>
            <tr>
              <td align="right" valign="top">正文</td>
              <td><textarea name="content"></textarea>
                <span class="beError error" style="display:none;"></span></td>
            </tr>
            <tr>
              <td></td>
              <td><input class="btn" type="submit" value="发送" />
                <a href="javascript:;" class="emial_cancel">取消</a></td>
            </tr>
          </table>
          <input type="hidden" name="resumeKey" value="" />
          <input type="hidden" name=forwardKey value="" />
          <input type="hidden" name="positionId" value="" />
          <input type="hidden" name="deliverId" value="" />
          <input type="hidden" name="positionName" value="" />
        </form>
      </div>
      <!--/#forwardResume--> 
      
      <!--转发简历成功弹窗-->
      <div id="forwardResumeSuccess" class="popup">
        <table width="100%" class="f16">
          <tr>
            <td class="f16" align="center">简历转发成功</td>
          </tr>
          <tr>
            <td align="center"><input class="btn" type="button" value="确认" /></td>
          </tr>
        </table>
      </div>
      <!--/#forwardResumeSuccess--> 
      
      <!--确认不合适弹窗-->
      <div id="confirmRefuse" class="popup" style="height:500px;">
        <form id="refuseMailForm">
          <table width="100%">
            <tr>
              <td><div class="refuse_icon">
                  <h3><em></em>确认这份简历不合适吗？</h3>
                  <span>确认后，系统将自动发送不合适通知邮件至用户邮箱</span> </div></td>
            </tr>
            <tr class="select_templete select_templete2">
              <td><span>可选模板</span><span class="selectRefuse">
                <input class="profile_select_265 profile_select_normal" readonly type="text" placeholder="系统模板（默认模板）" id="refuse_select_templete" />
                </span>
                <div class="boxUpDown dn">
                  <ul class="reset">
                  </ul>
                </div>
                <a target="_blank" href="" class="templete_manage">模板管理</a></td>
            </tr>
            <tr>
              <td><textarea name="content">
非常荣幸收到您的简历，在我们仔细阅读您的简历之后，却不得不很遗憾的通知您：
您的简历与该职位的定位有些不匹配，因此无法进入面试。

但您的信息已录入我司人才储备库，当有合适您的职位开放时我们将第一时间联系您，希望在未来我们有机会成为一起拼搏的同事；
再次感谢您投递AAA公司，感谢您对我们的信任；

祝您早日找到满意的工作。
						</textarea></td>
            </tr>
            <tr align="right">
              <td class="effect">编辑内容仅针对本次发送，不会影响模板</td>
            </tr>
            <tr>
              <td><input class="btn" type="submit" value="确认不合适" />
                <a href="javascript:;" class="emial_cancel">取消</a></td>
            </tr>
          </table>
          <input type="hidden" name="deliverId" value="" />
        </form>
      </div>
      <!--/#confirmRefuse--> 
      <!-- 简历管理列表页 查看联系方式 -->
      <div id="checkContact" class="popup" style="height:480px;">
        <p>查看联系方式意味着该候选人的简历已经通过筛选，该候选人会被移动到待沟通简历表中，同时收到通过筛选的通知，您需要在三个工作日内与其进行沟通。</p>
        <p>三日后，您的联系方式将会展示给候选人，同时，他将可以对没有沟通的行为进行举报，这将会使你职位的曝光率受到严重影响。</p>
        <div id="checkInterview">
          <form id="checkInterviewForm">
            <table width="100%" class="f16">
              <tr>
                <td width＝"20%" class="effect"></td>
                <td width＝"80%"></td>
              </tr>
              <tr>
                <td align="right"><span class="redstar">*</span>联系人</td>
                <td><input type="text" name="contactName" id="contactName"/></td>
              </tr>
              <tr>
                <td align="right"><span class="redstar">*</span>联系电话</td>
                <td><input type="text" name="contactPhone" id="contactPhone"/></td>
              </tr>
              <tr>
                <td align="right"><span class="redstar">*</span>联系邮箱</td>
                <td><input type="text" name="contactEmail" id="contactEmail"/></td>
              </tr>
              <tr>
                <td></td>
                <td align="left"><input class="btn" type="submit" value="确认查看"/>
                  <a href="javascript:;" class="cancelLink">取消</a></td>
              </tr>
            </table>
            <input type="hidden" name="name" value=""/>
            <input type="hidden" name="positionName" value=""/>
            <input type="hidden" name="companyName" value=""/>
            <input type="hidden" name="deliverId" data-deliverId=""/>
          </form>
        </div>
        <!--/#noticeInterview--> 
      </div>
      <!--拒绝email成功弹窗-->
      <div id="refuseMailSuccess" class="popup">
        <table width="100%" class="f16">
          <tr>
            <td class="f16" align="center"> 不合适通知已发送成功<br />
              该简历已进入“不合适简历”列表 </td>
          </tr>
          <tr>
            <td align="center"><input class="btn" type="button" value="确认" /></td>
          </tr>
        </table>
      </div>
      <!--/#refuseMailSuccess--> 
    </div>
    
    <!------------------------------------- end -----------------------------------------> 
    <script type="text/javascript" src="/Public/Home/js/jquery.ui.datetimepicker.min.js"></script> 
     
    <script type="text/javascript" src="/Public/Home/js/new_received_resumes.min.js"></script> 
    <script>
//风暴周报名入口
$('.employee_apply').click(function(){
	fengBaoEntrance();
});
//全局对象
var global = {headTip:""};
$(function(){
			
	var resumeLength = $('.resume_lists li').length;
	/* var href = L.trim(ctx);
	if(href.substr(href.length-1)== 'm' ){
		href = href.substr(href.length-10);
	} */
	if(L.cookie('functionMask') == null && resumeLength > 0){
		L('#guide_all').show();
 		L.cookie('functionMask', '1', {expires:365});
	}else{
		L('#guide_all').hide();
		//var cookie = parseInt(L.cookie('functionMask')) + 1;
		//L.cookie('functionMask', '2', options );
	}
	//如果是从右上角消息推送入口跳转过来的，展开过滤条件框
	if(global.headTip == 1 || global.headTip == "1"){
		$('#filter_btn2').trigger("click");
	} 
	
	var parent = $(".message_tip");
	var height = parent.height();
	var timer = null ;
	if(L.cookie('message') == null ){
		parent.show();
		L.cookie('message','msg',{expires:365}) ; 
	}else{
		parent.hide();
	}
	
	$(".message_no").on("click",function(){
		timer = setInterval(function(){
			 if(height >= 15){
		           height -= 5 ;
		           parent.height(height);
		       }else{
		    	   parent.css("visibility","hidden");
		    	   return;
		       }
		},30)
	})
});

</script>
    <div class="clear"></div>
  </div>
  <!-- end #container --> 
</div>
<!-- end #body --> 

<script type="text/javascript" src="/Public/Home/js/core.min.js?v=1.5.6_2015060418"></script> 
<script type="text/javascript" src="/Public/Home/js/popup.min.js?v=1.5.6_2015060418"></script> 
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
           <a href="/News/about.html" target="_bank">关于我们</a><a  target="_bank" href="/News/help.html">帮助中心</a>
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