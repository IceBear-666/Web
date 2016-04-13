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
      <dl class="company_center_content">
      
        <dt id="autofiletitle">
          <h1> <?php echo ($stitle); ?> <span>（共<?php echo ($total_count); ?>份）</span> </h1>
        </dt>
        
        <dd>
          <form id="filterForm" method="get" action="/Company/interview/type/unhandle">
            <div class="process_instruction">
              <dl style="display:table">
                <dt><img src="/Public/Home/images/company/process_introduction.png" width="74" height="67" alt="处理须知"/></dt>
                <dd>
                
	                <?php if($type=="autoFilter"){ ?>
	                	 系统将自动过滤<span>学历</span>、<!-- <span>城市</span>、 --><span>工作年限</span>不符合 要求的简历 
	                <?php } ?>
	                
                  <div>1）我们会自动帮你回绝<span>7天内未查看联系方式</span>的简历；</div>
                  <div>2）一旦你<span>查看了简历的联系方式</span>，则该简历不受上一条约束；</div>
                  <div class="isVacation"> 
                  
                  <?php if($myinfo['xiujia_fromDate']){ ?>
                  	<a id="hasVacation" href="javascript:;" class="has_holiday"><em></em>已设定休假</a>
                  <?php }else{ ?>
	                  <a class="holiday_how"  href="javascript:;" id="holiday_how"><em></em>
	                  <span>个人休假怎么办</span>
	                  </a>
                  <?php } ?>
                  
                   3）7天时限内如果包含<span>法定节假日，时间会自动顺延~</span></div>
                </dd>
              </dl>
              <div class="select_holiday_time dn" id="select_holiday_time"><span> 休假期间“7天的自动回绝”功能将暂停计时，但一个自然年只可使用一次休假功能，开始时间可选择明天及以后的任意一天，时长不超过15天，休假虽好，可不要贪心哦~</span>
                <div class="holidayBtn"> <a href="javascript:;" class="select_holiday_timeBtn" id="select_holiday_timeBtn">选择休假时间</a> <a href="javascript:;" class="holiday_cancel" id="holiday_cancle">取消</a> </div>
              </div>
              
              <div class="select_holiday_time dn" id="holiday_time">
                <div id="holiday_time_form"> <span>选择休假起止时间</span><!-- <input type="hidden" name="holiday_begintime"/> -->
                  <input type="text" readonly class="selectr" id="holiday_begintime"/>
                  <input type="text" readonly class="selectr" id="holiday_endtime"/>
                  <div  class="holidayBtn"> <a href="javascript:;" class="select_holiday_timeBtn" id="holiday_begintimeBtn">开始休假</a> <a href="javascript:;" class="holiday_cancel" id="cancle_holiday_select">取消</a> </div>
                </div>
              </div>
              
              <div class="select_holiday_time dn" id="confirm_htime">
                <div class="decisiton"> <span class="begin_day">2015.6.25</span>~<span class="end_day">2015.7.8</span> 休假<span class="cha">15</span>天，就这么愉快的决定了吗？ </div>
                <div  class="holidayBtn"> <a href="javascript:;" class="select_holiday_timeBtn" id="happy_decision">愉快决定</a> <a href="javascript:;" class="holiday_cancel" id="cancle_happy_decision">取消</a> </div>
              </div>
              
              <!-- 已经设定休假 -->
              <div class="select_holiday_time dn" id="setVacation">
                <div class="decisiton"> <span class="begin_day"><?php echo ($myinfo["xiujia_fromDate"]); ?></span>~<span class="end_day"><?php echo ($myinfo["xiujia_endDate"]); ?></span>休假 
                <span class="cha"><?php echo ($day); ?></span>天 </div>
                <div class="decisiton vacation_status"> <span>状态：</span> <strong><?php echo ($status); ?></strong> </div>
                <div  class="holidayBtn"> <a href="javascript:;" class="select_holiday_timeBtn" id="cancleVacation">取消休假</a> </div>
              </div>
              
            </div>
            
            
            <div class="filter_actions">
              <label class="checkbox">
                <input type="checkbox" />
                <i></i> </label>
              <span class="mf12">全选</span> 
              
              <?php if($type=="refuselist"){ ?>
              
              	<a id="resumeDelAll" class="mark_nofit" href="javascript:;">删除</a>
              	<!-- <a id="resume_empty" class="mark_nofit" href="javascript:;">清空</a> -->
              	
              <?php }else{ ?>
              
              	<a href="javascript:;" class="mark_nofit" id="resumeRefuseAll">不合适</a>
              
              <?php } ?>
              
              <ul class="filter_btn reset">
              </ul>
            </div>
            <!-- end .filter_actions -->
            
            <div class="filter_options" style="display:block;">
              
              <dl style="padding-top:10px;">
                <input type="hidden" name="defaultCondition" value="true" id="defaultCondition"/>
                <dt>简历状态：</dt>
                <dd> <a  <?php echo ($cflag[0]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=0&jy=<?php echo ($jy); ?>&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>" rel="0">不限</a> 
                <a <?php echo ($cflag[1]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=1&jy=<?php echo ($jy); ?>&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>" rel="1">未阅读</a> 
                <a <?php echo ($cflag[2]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=2&jy=<?php echo ($jy); ?>&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>" rel="2">已阅读</a> 
                <a <?php echo ($cflag[3]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=3&jy=<?php echo ($jy); ?>&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>" rel="3">已转发</a> 
                
                <?php if($type!="autoFilter" && $type!="refuselist"){ ?>
                <a <?php echo ($cflag[4]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=4&jy=<?php echo ($jy); ?>&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>" rel="4">只看标记</a>
                <?php } ?>
                
                  <div class="more_filter">更多筛选&ensp;<i></i></div>
                  <input type="hidden" name="statusFilter" value="-1" />
                </dd>
              </dl>
              
              <dl class="dn">
                <dt>工作经验：</dt>
                <dd> <a   <?php echo ($cjy[0]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=0&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>"  rel="0">不限</a> 
                <a <?php echo ($cjy[1]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=1&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>"  rel="1">应届毕业生</a> 
                <a <?php echo ($cjy[2]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=2&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>"  rel="2">1年以下</a> 
                <a <?php echo ($cjy[3]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=3&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>"  rel="3">1-3年</a> 
                <a <?php echo ($cjy[4]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=4&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>"  rel="4">3-5年</a> 
                <a <?php echo ($cjy[5]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=5&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>"  rel="5">5-10年</a> 
                <a <?php echo ($cjy[6]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=6&xl=<?php echo ($xl); ?>&zd=<?php echo ($zd); ?>"  rel="6">10年以上</a>
                  <input type="hidden" name="workExp" value="0" />
                </dd>
              </dl>
              <dl class="dn">
                <dt>最低学历：</dt>
                <dd> <a  <?php echo ($cxl[0]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=<?php echo ($jy); ?>&xl=0&zd=<?php echo ($zd); ?>" rel="0">不限</a> 
                <a <?php echo ($cxl[1]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=<?php echo ($jy); ?>&xl=1&zd=<?php echo ($zd); ?>" rel="1">大专及以上</a> 
                <a <?php echo ($cxl[2]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=<?php echo ($jy); ?>&xl=2&zd=<?php echo ($zd); ?>" rel="2">本科及以上</a> 
                <a <?php echo ($cxl[3]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=<?php echo ($jy); ?>&xl=3&zd=<?php echo ($zd); ?>" rel="3">硕士及以上</a> 
                <a <?php echo ($cxl[4]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=<?php echo ($jy); ?>&xl=4&zd=<?php echo ($zd); ?>" rel="4">博士及以上</a>
                  <input type="hidden" name="eduCode" value="-1" />
                </dd>
              </dl class="dn">
              <dl class="dn">
                <dt>自动回绝</dt>
                <dd> <a  <?php echo ($czd[0]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=<?php echo ($jy); ?>&xl=<?php echo ($xl); ?>&zd=0" rel="0">不限</a> 
                <a <?php echo ($czd[1]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=<?php echo ($jy); ?>&xl=<?php echo ($xl); ?>&zd=1" rel="3">3天内将自动回绝</a> 
                <a <?php echo ($czd[2]); ?> href="/Company/interview/type/<?php echo ($type); ?>/?flag=<?php echo ($flag); ?>&jy=<?php echo ($jy); ?>&xl=<?php echo ($xl); ?>&zd=2" rel="1">1天内将自动回绝</a>
                  <input type="hidden" name="autoRefuseDay" value="-1" />
                </dd>
              </dl>
              <input type="hidden" id="positionId" name="positionId" value="" />
              <input type="hidden" id="filtera" name="filtera" value=""/>
              <input type="hidden" id="filtera" name="filtera" value=""/>
            </div>
            <!-- end .filter_options -->
            
            
            <!-- <div class="message_tip">
              <p>线上发面试邀请，候选人会收到微信或短信渠道的实时提醒。</p>
              <a href="javascript:;" class="message_no" target="_blank">不再提醒</a>
			</div> -->
			
            <ul class="resume_lists">
              
              <?php if(!$list){ ?>
              

                      <div class="nocenter"><span><img src="/Public/Home/images/empty.png" />未找到符合要求的记录</span></div>
              
              <?php }else{ ?>
              
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; $last_edu = getUserLastEdu($v['uid']); $last_work = getUserLastWork($v['uid']); $forward_record = getForwardRecord($v['aid']); ?>
              	
	              <li data-flag="<?php echo ($v["aid"]); ?>"> 
	              
	                 <span class="resume_header2">
	                   <span class="time"><?php echo (showday($v["addtime"])); ?></span>
	                    <?php if($type!="autoFilter" && $type!="refuselist"){ ?>
	                    <a href="javascript:;" class="star <?php if($v['biaoshi']) echo 'collect'; ?>"  data-deliverId="<?php echo ($v["aid"]); ?>"></a>
	                   	<?php } ?>
	                   <label class="checkbox"><input type="checkbox" /><i></i> </label>
	                    <span class="employee">应聘：<a href="/Jobs/info/id/<?php echo ($v["jid"]); ?>.html" class="employee_position" title="<?php echo ($v["zhiwei_mingcheng"]); ?>"  target="_blank"><?php echo ($v["zhiwei_mingcheng"]); ?></a></span>
	                   <input type="hidden" value="true" id="noEmail_<?php echo ($v["aid"]); ?>"/>
	                 </span>
	                 
	                <div class="resume_show">

						<?php if($v['rid']){ ?>
						
							<a href="/Resume/downResume/id/<?php echo ($v["rid"]); ?>/aid/<?php echo ($v["aid"]); ?>" onclick="return update_contact_status(<?php echo ($v["aid"]); ?>)"  class="resumeImg" target="_blank" title="下载附件简历"> <img src="/Public/Home/images/company/icon_file.jpg" width="69" height="69" /> </a> 
	                	
			                <a href="/Resume/downResume/id/<?php echo ($v["rid"]); ?>/aid/<?php echo ($v["aid"]); ?>" onclick="return update_contact_status(<?php echo ($v["aid"]); ?>)" target="_blank" class="hotspace">
			                <div class="resume_intro" data-flag="<?php echo ($v["aid"]); ?>"> <?php echo ($v["realname"]); ?>/ <?php echo (showsex($v["sex"])); ?>/ <?php echo ($v["workyear"]); ?>/ <?php echo ($v["city"]); ?> <em <?php if(!$v['isread']) echo 'class="read"'; ?>></em><br/>
			                    <br/>
			                    <span>附件简历：点击查看更多信息</span>			                    
			                </div>
		                  </a>
						
						<?php }else{ ?>
						
							<a href="/User/resumePreview/uid/<?php echo ($v["uid"]); ?>/aid/<?php echo ($v["aid"]); ?>" onclick="return update_contact_status(<?php echo ($v["aid"]); ?>)" class="resumeImg" target="_blank" title="预览在线简历"> <img src="<?php if($v['pic'])echo $v['pic'];else echo '/Public/Home/images/company/default_headpic.png'; ?>" width="69" height="69" /> </a> 
	                	
		                  <a href="/User/resumePreview/uid/<?php echo ($v["uid"]); ?>/aid/<?php echo ($v["aid"]); ?>" onclick="return update_contact_status(<?php echo ($v["aid"]); ?>)" target="_blank" class="hotspace">
		                  <div class="resume_intro" data-flag="<?php echo ($v["aid"]); ?>"> <?php echo ($v["realname"]); ?>/ <?php echo (showsex($v["sex"])); ?>/ <?php echo ($v["workyear"]); ?>/ <?php echo ($v["city"]); ?> <em <?php if(!$v['isread']) echo 'class="read"'; ?>></em><br/>
		                    <?php echo ($last_work["positionName"]); ?> · <?php echo ($last_work["companyName"]); ?><br/>
		                    
		                    <?php echo ($last_edu["schoolName"]); ?> · <?php echo ($last_edu["professional"]); ?> · <?php echo ($last_edu["education"]); ?> 
		                    
		                    </div>
		                  </a>
						
						<?php } ?>

						
	                  
	                  
	                  
	                  <?php if($type=="prepare" || $v['view_contact']){ ?>
	                  	<div  class="resume_link look_resume_link" > 
	                  	<a class="phone" title="<?php echo ($v["phone"]); ?>" href="javascript:;"><?php echo ($v["phone"]); ?></a>
	                  	<a title="<?php echo ($v["email"]); ?>" class="resume_color phone" href="javascript:;"><?php echo ($v["email"]); ?></a>
	                  	</div>
	                  <?php }else{ ?>
	                  	
	                  	<?php if($type=="refuselist"){ ?>
	                  		<div  class="resume_link nolook_phone" > 
	                  		<span data-flag="flag">未查看联系方式 </span>
	                  		</div>
	                  	<?php }else{ ?>
	                  		<div  class="resume_link look_resume_link" > 
	                  		<span data-flag="flag" data-deliverId = "<?php echo ($v["aid"]); ?>">查看联系方式 </span> 
	                  		</div>
	                  	<?php } ?>
	                  	
	                  <?php } ?>
	                  
	                  
	                  <?php if($type=="refuselist"){ ?>
	                  
	                  	<div class="resume_fit resume_del2"><a class="resume_del" href="javascript:;">删除</a></div>
	                  
	                  <?php }else{ ?>
	                  
	                  <div class="resume_fit look_resume_fit"> 
	                  
	                       <?php if($type=="prepare"){ ?>
	                       <div class="send_notice2">
		                       <span class="send_interview resume_notice" data-positionname="<?php echo ($v["zhiwei_mingcheng"]); ?>" data-name="<?php echo ($v["realname"]); ?>" data-deliverid="<?php echo ($v["aid"]); ?>" data-email="<?php echo ($v["email"]); ?>">面试</span>
		                   </div>
		                   <?php } ?>
		                   
	                    	<span class="resume_refuse" data-deliverId = "<?php echo ($v["aid"]); ?>">不合适</span> 
	                    	<a href="javascript:;" class="resume_forward" data-resumeName="<?php echo ($v["realname"]); ?>的简历" data-deliverId = "<?php echo ($v["aid"]); ?>" data-positionName = "<?php echo ($v["zhiwei_mingcheng"]); ?>"  data-forwardCount="<?php echo count($forward_record); ?>">转发 
	                    	<?php if($forward_record){echo "(<span> ".count($forward_record)." </span>)";} ?>
	                    	</a>
	                  </div>
	                  
	                  <?php } ?>
	                  
	                  <div class="resume_fit send_notice dn">
	                  <div  class="send_notice2"  > 
	                      <span class="send_interview resume_notice" data-positionName="<?php echo ($v["zhiwei_mingcheng"]); ?>" data-name="<?php echo ($v["realname"]); ?>" data-deliverId="<?php echo ($v["aid"]); ?>"  data-email ="">发面试通知</span> 
	                      <span class="arr click_bf"><em class="dw_tip up_tip"  data-flag="<?php echo ($v["aid"]); ?>"></em></span> </div>
	                   <div class="send_notice_con"> <a href="javascript:;" class="resume_refuse" data-deliverId = "<?php echo ($v["aid"]); ?>">不合适</a> 
	                      <a href="javascript:;" class="resume_forward" data-deliverId = "<?php echo ($v["aid"]); ?>" data-resumeName="<?php echo ($v["realname"]); ?>的简历"  data-positionName="<?php echo ($v["zhiwei_mingcheng"]); ?>"  data-forwardCount="0">转发 </a>
	                   </div>
	                    <div class="send_notice_tips dn">
	                      <div  class="send_notice2">
	                       <span class="send_interview resume_notice" data-positionName="<?php echo ($v["zhiwei_mingcheng"]); ?>" data-name="<?php echo ($v["realname"]); ?>" data-deliverId="<?php echo ($v["aid"]); ?>"  data-email ="<?php echo ($v["email"]); ?>">发面试通知</span>
	                        <span class="arr arr2 click_af"><em class="up_tip" data-flag="<?php echo ($v["aid"]); ?>"></em></span> </div>
	                      <a href="javascript:;" class="has_notice" data-flag="flag"  data-deliverId="<?php echo ($v["aid"]); ?>">已安排面试</a>
	                    </div>
	                  </div>
	                  
	                  <div class="resume_fit resume_fit_forward dn">
	                   <a href="javascript:;" class="resume_forward" data-resumeName="<?php echo ($v["realname"]); ?>的简历"  data-deliverId = "<?php echo ($v["aid"]); ?>" data-positionName="<?php echo ($v["zhiwei_mingcheng"]); ?>"  data-forwardCount="0">转发 </a>
	                 </div>
	                 
	                </div>
	              </li><?php endforeach; endif; else: echo "" ;endif; ?>
              
              
              <?php } ?>
              
            </ul>
            <!-- end .resumeLists -->
            
            <input type="hidden" name="showContract" value="false" id="showContract"/>
          </form>
          <!-- <div class="weixin-box" title="穿越到微信去招聘"></div> --> 
          

          <div class="resume_number" style="display:none;"> <span class="resume_look">2</span> <span class="resume_total">20</span> </div>
        </dd>
      </dl>
      <!-- end .company_center_content --> 
    </div>
    <!-- end .content -->
    
    <input type="hidden" value="<?php echo ($myinfo["company_short_name"]); ?>" id="noticeCompanyName"/>
    
    <!--------------------------------- 弹窗lightbox ----------------------------------------->
    <div style="display:none;"> <!-- //将原来的发送线上面试和线下面试合二为一弹窗 -->
      <div id="hr_noticeInterview" class="popup" style=" width:500px;height:545px;">
        <div class="interview_notice_box" id="interview_notice_box"> 
        <span class="interview_notice_selected interview_notice_offset" name="interview_notice">发面试通知</span> 
        <span class="interview_notice" name="interview_noticed_already">已安排面试</span> </div>
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
                  <a target="_blank" href="/User/template.html" class="templete_manage">模板管理</a></td>
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
          <div id="hr_checkContact" class="popup" style="display:none">
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
                      <a href="javascript:;" class="cancelPreview mybtn2s">取消</a></td>
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
      <!--通知面试弹窗--> 
      <!-- <div id="noticeInterview" class="popup" style="height:545px;">
	    <form id="noticeInterviewForm">
	     	<table width="100%" class="f16">
	         	<tr>
	         		<td width="20%" align="right" class="c9">收件人  </td>
	         		<td width="80%">
	         			<span id="receiveEmail" class="c9"></span>
	         			<input type="text" name="email" value=""  readonly="readonly" class="receiveEmail"/>
	         		</td>
	         	</tr>
	         	<tr>
	             	<td align="right"><span class="redstar">*</span>主题</td>
	             	<td>
						<input type="text" name="subject" placeholder="公司：职位名称面试通知" />
					</td>
	           	</tr>
	           	<tr>
	             	<td align="right"><span class="redstar">*</span>面试时间</td>
	             	<td>
						<input type="text" name="interTime" id="datetimepicker"  readonly="readonly"/>
					</td>
	           	</tr>
	           	<tr class="select_templete">
	             	<td align="right"><span>可选模板</span></td>
	             	<td>
						<span class="notice_templete" style="margin-left:0;"><input type="text" name="selectTemplate" readonly="readonly" id="notice_select_templete" placeholder="系统模板（默认模板）" class="profile_select_265 profile_select_normal"/></span>
						<div class="boxUpDown dn">
			         		<ul class="reset"></ul>
			         	</div>
						<a target="_blank" href="http://hr.lagou.com/templates/InterviewTemplateManagement.html" class="templete_manage">模板管理</a>
					</td>
	           	</tr>
	           	<tr>
	             	<td align="right"><span class="redstar">*</span>面试地点</td>
	             	<td>
						<input type="text" name="interAdd" />
					</td>
	           	</tr>
	           	<tr>
	             	<td align="right">联系人</td>
	             	<td>
						<input type="text" name="linkMan" />
					</td>
	           	</tr>
	           	<tr>
	             	<td align="right"><span class="redstar">*</span>联系电话</td>
	             	<td>
						<input type="text" name="linkPhone" />
					</td>
	           	</tr>
	           	<tr>
	             	<td align="right" valign="top">补充内容</td>
	             	<td>
						<textarea name="content"></textarea>
					</td>
	           	</tr>
	           	<tr align="right"><td></td><td class="effect">编辑内容仅针对本次发送，不会影响模板</td></tr>
	            <tr>
	            	<td></td>
	             	<td>
	             		<input class="btn" type="submit" value="发送" />
	             		<a href="javascript:;" class="emailPreview">预览</a>
	             	</td>
	             </tr>
	         </table>
			<input type="hidden" name="name" value="" />
			<input type="hidden" name="positionName" value="" />
			<input type="hidden" name="companyName" value="" />
			<input type="hidden" name="deliverId" id="deliverId"/>
        </form>
    </div> --><!--/#noticeInterview--> 
      
      <!--预览通知面试弹窗-->
      <div id="noticeInterviewPreview" class="popup">
        <div class="f18">面试通知 </div>
        <div class="c9">发给：<span><?php echo C("JIANLI_EMAIL");?></span></div>
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
      <div id="forwardResume" class="popup" style="height:320px;">
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
                <a href="javascript:;" class="emial_cancel mybtn2s">取消</a></td>
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
      <div id="confirmRefuse" class="popup" style="height:470px;">
        <form id="refuseMailForm">
          <table width="100%">
            <tr>
              <td><div class="refuse_icon">
                  <h3><em></em>确认这份简历不合适吗？</h3>
                  <span>确认后，系统将自动发送不合适通知邮件至用户邮箱</span> </div></td>
            </tr>
            <tr class="select_templete select_templete2">
              <td><span>可选模板</span>
              <span class="selectRefuse">
                <input class="profile_select_265 profile_select_normal" readonly type="text" placeholder="系统模板（默认模板）" id="refuse_select_templete" />
                </span>
                <div class="boxUpDown dn">
                  <ul class="reset">
                  </ul>
                </div>
                <a target="_blank" href="/User/template.html?type=refuse" class="templete_manage">模板管理</a></td>
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
      <div id="checkContact" class="popup" style="height:410px;">
        <p>查看联系方式意味着该候选人的简历已经通过筛选，该候选人会被移动到待沟通简历表中，同时收到通过筛选的通知，您需要在三个工作日内与其进行沟通。</p>
        <p>三日后，您的联系方式将会展示给候选人，同时，他将可以对没有沟通的行为进行举报，这将会使你职位的曝光率受到严重影响。</p>
        <div id="checkInterview">
          <form id="checkInterviewForm">
            <table width="100%" class="f16">
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
                <td align="left" style="padding-top:12px;">
                  <input class="btn" type="submit" value="确认查看"/>
                  <a href="javascript:;" class="cancelLink mybtn2s">取消</a></td>
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
    
    <!------------------------------------- end -------------------------------------><!-------------------------------------弹窗lightbox  ----------------------------------------->
    <!-- <div style="display:none;">
      <div id="weixinQR" class="popup" style="width:500px;*height:220px;">
        <table width="100%">
          <tr class="weixinQR">
            <td><div class="weixin">
                <div class="qr"> <img src="" width="100" height="100" />
                  <div>[仅限本人使用]</div>
                </div>
                <div class="qr_text">
                  <h3>关注微信服务号，可随时获取接收简历的通知 </h3>
                  关注方式：<br />
                  <span>打开微信 </span> <img src="/images/corp/wx1.png" width="30" height="30" /><span> →发现 </span> <img src="http://hr.lagou.com/images/corp/wx2.png" width="31" height="30" /><span> →扫一扫左侧二维码</span> </div>
              </div></td>
          </tr>
          <tr>
            <td align="center"><a href="javascript:;" class="btn_s">我已关注</a> <a href="javascript:;" class="qr_cancel f18">下次再关注</a></td>
          </tr>
        </table>
      </div>
      
    </div> -->
    
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

function update_contact_status(aid){
	if(aid){
		$.ajax({url:"/Company/checkShow/?id="+aid,async:false});
	}
	return true;
}

</script>

<script>
//$.cookie('tip_contact_show',"", { expires: -1 });
function show_tip_tc(){

	top.location.href = top.location.href;
	window.location.reload();
	return true;	   
	
}




$("#ttmsg").click(function(){
   $(this).addClass('cur');
   $.cookie('tip_contact_show','1',{expires:24*3600*30});
})
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