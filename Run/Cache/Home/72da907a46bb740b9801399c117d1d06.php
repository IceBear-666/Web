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

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/create.css" />
<script type="text/javascript" src="/Public/Home/js/timeCountDown.js"></script>
<script type="text/javascript" src="/Public/Home/js/additional-methods.js"></script>

<!--后台给出的变量天数》0-->
<script>
    var cd = {
            $: function(id){
                return document.getElementById(id);    
            },
            futureDate: -6512378303,
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
        <dt>
          <h1><em></em><?php if($job) echo '编辑';else echo '发布新'; ?>职位</h1>
        </dt>
        <dd> 
          
          <!-- 引导职位发布者填写个人信息 -->
          
          <form id="jobForm" method="post" action="/Comapny/preview.html">
            <input type="hidden" name="id" value="<?php echo ($job["jid"]); ?>" />
            <input type="hidden" name="preview" value="create" />
            <input type="hidden" name="companyId" value="<?php echo ($job["uid"]); ?>" />
            <input type="hidden" name="resubmitToken" value="80c4e1cc6baf4de0a73f1a567b8050cc" />
            <table class="btm">
              <tr>
                <td width="20"><span class="redstar">*</span></td>
                <td width="85">行业领域</td>
                <td><input type="hidden" name="positionType" value="<?php echo ($job["cid"]); ?>" id="positionType" />
                  <input type="button" class="selectr selectr_380" id="select_category" value="<?php if($job['hangye_lingyu']) echo $job['hangye_lingyu'];else echo '请选择行业领域'; ?>"  placeholder="请选择行业领域"  />
                  <div id="box_job" class="dn">
                    <?php if(is_array($webCat)): $i = 0; $__LIST__ = $webCat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
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
                <td width="20"><span class="redstar">*</span></td>
                <td width="85">职位类别</td>
                <td><input type="hidden" name="jobcate" value="<?php echo ($job["zid"]); ?>" id="jobcate" />
                  <input type="hidden" name="nojobcate" value="" id="nojobcate" />
                  <input type="button" class="selectr selectr_380" id="select_jobcate" value="<?php if($job['zhiwei_leibie']) echo $job['zhiwei_leibie'];else echo '请选择职位类别'; ?>"   placeholder="请选择职位类别"  />
                  <div id="box_jobcate" class="boxUpDown boxUpDown_380 dn">
                    <?php if(is_array($webCat)): $i = 0; $__LIST__ = $webCat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><ul>
                        <?php if(is_array($v["zhiwei_leibie"])): $i = 0; $__LIST__ = $v["zhiwei_leibie"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li id="<?php echo ($vv["id"]); ?>"><?php echo ($vv["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                      </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div>
                  <span id="nocate" for="jobcate" generated="true" class="dn">请先选择行业领域</span>
                  <input type="hidden" id="pdnocate" value="no" /></td>
              </tr>
              <tr>
                <td><span class="redstar">*</span></td>
                <td>职位名称</td>
                <td><input type="text" id="positionName" name="positionName" value="<?php echo ($job["zhiwei_mingcheng"]); ?>" placeholder="请输入职位名称，如：产品经理" />
                  <input type="hidden" id="positionThreeType" name="positionThreeType" value="" /></td>
              </tr>
              <tr>
                <td></td>
                <td>所属部门</td>
                <td><input type="text" id="department" name="department" value="<?php echo ($job["suoshu_bumen"]); ?>" placeholder="请输入所属部门" /></td>
              </tr>
            </table>
            <table class="btm">
              <tr>
                <td width="20"><span class="redstar">*</span></td>
                <td width="85">工作性质</td>
                <td><ul class="profile_radio clearfix reset">
                    <li <?php if($job['gongzuo_xingzhi']=="全职")echo 'class="current"'; ?>>全职 <em></em>
                      <input type="radio" <?php if($job['gongzuo_xingzhi']=="全职")echo 'class="valid" checked'; ?> value="全职" name="jobNature"/>
                    </li>
                    <li <?php if($job['gongzuo_xingzhi']=="兼职")echo 'class="current" '; ?>>兼职 <em></em>
                      <input type="radio" <?php if($job['gongzuo_xingzhi']=="兼职")echo 'class="valid"  checked'; ?> value="兼职" name="jobNature"/>
                    </li>
                    <li <?php if($job['gongzuo_xingzhi']=="实习")echo 'class="current" '; ?>>实习 <em></em>
                      <input type="radio" <?php if($job['gongzuo_xingzhi']=="实习")echo 'class="valid"  checked'; ?> value="实习" name="jobNature"/>
                    </li>
                  </ul></td>
              </tr>
              <tr>
                <td><span class="redstar">*</span></td>
                <td>月薪范围</td>
                <!--<h3><span>(最高月薪不能大于最低月薪的2倍)</span></h3> -->
                <td><div class="salary_range">
                    <div>
                      <input type="text" name="salaryMin" id="salaryMin"  value="<?php echo ($job["yuexin_min"]); ?>"  placeholder="最低月薪" />
                      <span>k</span> </div>
                    <div>
                      <input type="text" name="salaryMax" id="salaryMax"  value="<?php echo ($job["yuexin_max"]); ?>"  placeholder="最高月薪" />
                      <span>k</span> </div>
                    <span>只能输入整数，如：9</span> </div></td>
              </tr>
              <tr>
                <td><span class="redstar">*</span></td>
                <td>工作城市</td>
                <td><input type="text" id="workAddress" name="workAddress" value="<?php echo ($job["gongzuo_chengshi"]); ?>" placeholder="请输入工作城市，如：北京" /></td>
              </tr>
            </table>
            <table class="btm">
              <tr>
                <td width="20"><span class="redstar">*</span></td>
                <td width="85">工作经验</td>
                <td><input type="hidden" name="workYear" value="<?php echo ($job["gongzuo_jingyan"]); ?>" id="experience" />
                  <input type="button" class="selectr selectr_380" id="select_experience" value="<?php if($job['gongzuo_jingyan']) echo $job['gongzuo_jingyan'];else echo '请选择工作经验'; ?>"  placeholder="请选择工作经验"  />
                  <div id="box_experience" class="boxUpDown boxUpDown_380 dn">
                    <ul >
                      <li>不限</li>
                      <li>应届毕业生</li>
                      <li>在校学生</li>
                      <li>1年以下</li>
                      <li>1-3年</li>
                      <li>3-5年</li>
                      <li>5-10年</li>
                      <li>10年以上</li>
                    </ul>
                  </div>
                 </td>
              </tr>
              <tr>
                <td><span class="redstar">*</span></td>
                <td>学历要求</td>
                <!--<h3><span>(最高月薪不能大于最低月薪的2倍)</span></h3> -->
                <td><input type="hidden" name="education" value="<?php echo ($job["xueli"]); ?>" id="education" />
                  <input type="button" class="selectr selectr_380" id="select_education" value="<?php if($job['xueli']) echo $job['xueli'];else echo '请选择学历要求'; ?>" placeholder="请选择学历要求"  />
                  <div id="box_education" class="boxUpDown boxUpDown_380 dn">
                    <ul>
                      <li>不限</li>
                      <li>大专</li>
                      <li>本科</li>
                      <li>硕士</li>
                      <li>博士</li>
                    </ul>
                  </div></td>
              </tr>
            </table>
            <table class="btm">
              <tr>
                <td width="20"><span class="redstar">*</span></td>
                <td width="85">职位诱惑</td>
                <td><input type="text" id="positionAdvantage" class="input_520"  name="positionAdvantage" value="<?php echo ($job["zhiwei_youhuo"]); ?>" placeholder="20字描述该职位的吸引力，如：福利待遇、发展前景等" /></td>
              </tr>
              <tr>
                <td><span class="redstar">*</span></td>
                <td>职位描述</td>
                <td><span class="c9 f14">(建议分条描述工作职责等。请勿输入公司邮箱、联系电话及其他外链，否则将自动删除)</span>
                  <textarea class="tinymce" id="positionDetail" name="positionDetail"  placeholder="请输入岗位职责、任职要求等，建议尽量使用短句并分条列出"><?php echo ($job["descrip"]); ?></textarea></td>
              </tr>
              <tr>
                <td><span class="redstar">*</span></td>
                <td>工作地址</td>
                <td><input type="text" id="positionAddress" class="input_520" name="positionAddress" value="<?php echo ($job["gongzuo_dizhi"]); ?>" placeholder="请输入详细的工作地址" />
                  <input type="hidden" id="lng" name="positionLng" value="<?php echo ($job["lng"]); ?>" />
                  <input type="hidden" id="lat" name="positionLat" value="<?php echo ($job["lat"]); ?>" />
                  <div class="work_place f14">我们将在职位详情页以地图方式精准呈现给用户 <a href="javascript:;" id="mapPreview">预览地图</a></div></td>
              </tr>
            </table>
            <table>
              <tr>
                <td width="20"><span class="redstar">*</span></td>
                <td colspan="2"> 接收简历邮箱： <span id="receiveEmailVal"><?php echo ($info["email_jianli"]); ?></span>
                  <input type="hidden" name="email" id="receiveEmail" value="<?php echo ($info["email_jianli"]); ?>" /></td>
              </tr>
              <tr style="display:none;">
                <td width="20"></td>
                <td colspan="2"> 同时简历自动发送至邮箱（仅一个）
                  <input type="text" name="forwardEmail" id="forwardEmail" value="<?php echo ($info["email"]); ?>" />
                  <span class="error" id="beError" style="display:none"></span></td>
              </tr>
              <tr>
                <td width="20"></td>
                <td colspan="2"><input type="submit" class="btn_32" id="jobPreview" value="预览" />
                  <input type="button" class="btn_32" id="formSubmit" value="发布" /></td>
              </tr>
            </table>
          </form>
        </dd>
      </dl>
    </div>
    <!-- end .content --> 
    
    
    
    <!-- old --> 
    <script type="text/javascript" src="/Public/Home/js/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script> 
    <script>
	$(function(){
			
		/***********************************************
		** textarea 编辑器
		*/
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : ctx+'Public/Home/js/tinymce/jscripts/tiny_mce/tiny_mce.js',
	
			// General options
			theme : "advanced",
			language : "zh-cn",
			plugins : "paste,autolink,lists,style,layer,save,advhr,advimage,advlink,iespell,inlinepopups,preview,media,searchreplace,contextmenu,fullscreen,noneditable,visualchars,nonbreaking",
	
			// Theme options
			// theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,|,hr,fullscreen,image",
			theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,hr,fullscreen",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "none",//定义输入框下方是否显示状态栏，默认不显示
			theme_advanced_resizing : false,
			paste_auto_cleanup_on_paste: true,
			paste_as_text: true,
			auto_cleanup_word:true,
			paste_remove_styles: true,
			contextmenu: "copy cut paste",
	        force_br_newlines: true,
	        force_p_newlines: false,
	        apply_source_formatting: false,
	        remove_linebreaks: false,
	        convert_newlines_to_brs: true,
	
			// Example content CSS (should be your site CSS)
			content_css : ctx+"/js/tinymce/examples/css/content.css",
	
			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
	
			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			},
			onchange_callback: function(editor){
		        tinyMCE.triggerSave();
		        var editorContent = tinyMCE.get(editor.id).getContent();
			    if(editorContent.length > 20){
					$("#" + editor.id).valid();
			    }
		    } 
		});
		
		$('#workAddress').focus(function(){
			$('#beError').hide();
		});
	});
	</script> 
    <!-- end old --> 
    
    <script type="text/javascript" src="/Public/Home/js/company/jobs.js"></script> 
    
    
    <link rel="stylesheet" type="text/css"  href="/Public/Home/css/external.min.css" />
<style>

#baiduMap{width:660px!important;height:430px!important;}
#allmap{width:660px!important;height:400px!important;overflow: hidden;margin:0;}
#smallmap{width:280px;height:200px;overflow: hidden;margin:0;}
#mapPreview{margin-left:100px;}
</style>

<!------------------------------------- 弹窗lightbox ----------------------------------------->
<div style="display:none;">
	<!--联系方式弹窗-->	
        <div id="telTip" class="popup" style="height:180px;">
	        <form id="telForm">
	        	<table width="100%">
	            	<tr>
	            		<td align="center" class="f18">留个联系方式方便我们联系你吧！</td>
	            	</tr>
	            	<tr>
	                	<td align="center">
							<input type="text" name="tel" placeholder="请输入你的手机号码或座机号码" maxlength="49" />
							<span id="telError" class="error" style="display:none;"></span>
						</td>
	                </tr>
	                <tr>
	                	<td align="center">
	                		<input class="btn" type="submit" value="提交" />
	                	</td>
	                </tr>
	            </table>
            </form>
        </div><!--/#telTip-->
        
    <!--地图弹窗-->	
        <div id="baiduMap" class="popup">
        	<div class="mb10">点击地图可重新定位公司所在的位置</div>
	        <div id="allmap"></div>
        </div><!--/#baiduMap-->
</div>
<!------------------------------------- end ----------------------------------------->
    

    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=u77bnG3qafFf85j6cQMY1XkT"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3d6a9f4b807441569414b01eecc20959"></script>
	<script type="text/javascript">
//百度地图API功能
var map = new BMap.Map("allmap");
//控件添加
map.addControl(new BMap.NavigationControl());
map.addControl(new BMap.MapTypeControl());
map.addControl(new BMap.ScaleControl());
map.addControl(new BMap.OverviewMapControl());

var point = new BMap.Point(116.331398,39.897445);//初始化坐标点
map.centerAndZoom(point, 15);
/* map.centerAndZoom(, 15); */
map.enableScrollWheelZoom(true);//允许缩放
var gc = new BMap.Geocoder();//地址定位
var local = new BMap.LocalSearch(map, {
	  renderOptions:{map: map}
});
function showInfo(e){
	 map.clearOverlays();//清除所有覆盖物
	 //map.centerAndZoom(new BMap.Point(olng, olat), 11);//重定义中心点
	 //alert(e.point.lng + ", " + e.point.lat);
	 var marker = new BMap.Marker(new BMap.Point(e.point.lng, e.point.lat));  // 创建标注
	 /* marker.addEventListener("mouseup",function(em));
			// marker.setLabel(label);//新坐标-新地址
			 if(rs){
	 				 var sContent =
					"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>"+addComp.province+"</h4>" + 
					"<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>"+rs.address+"</p>" + 
					"</div>";
				 	var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
				 	//图片加载完毕重绘infowindow
			 		marker.openInfoWindow(infoWindow);
	 			}
			
			  $('#lat').val(em.point.lat);
			  $('#lng').val(em.point.lng);
		});
	}); */
	marker.enableDragging();    //可拖拽
	map.addOverlay(marker);     // 将标注添加到地图中
	
	 /////////////////////地址定位
	 var pt = e.point;
	gc.getLocation(pt, function(rs){
	    var addComp = rs.addressComponents;
	    var label = new BMap.Label("我的坐标："+e.point.lng + ", " + e.point.lat+"  我的地址："+addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber,{offset:new BMap.Size(20,-10)});
	 			//marker.setLabel(label);
	 			if(rs){
	 				 var sContent =
					"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>"+addComp.province+"</h4>" + 
					"<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>"+rs.address+"</p>" + 
					"</div>";
				 	var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
				 	//图片加载完毕重绘infowindow
			 		marker.openInfoWindow(infoWindow);
	 			}  
	 			
	 		$('#lat').val(e.point.lat);
			$('#lng').val(e.point.lng);
	});
	
	//////////////////////重置中心点
	 olng = e.point.lng;
	 olat = e.point.lat;
}
map.addEventListener("click", showInfo);//地图点击事件

$(function(){
	$('#mapPreview').bind('click',function(){
		$.colorbox({inline:true, href:"#baiduMap",title:"公司地址"});
		var address = $('#positionAddress').val();
		var city = $('#workAddress').val();
	    map.setCurrentCity(city);
	    map.setZoom(15);
		gc.getPoint(address, function(point){
		  if (point) { 
		    map.centerAndZoom(point, 15);
			map.setZoom(15);
	    	map.setCenter(point);
		   	local.search(address);
		  }
		}, city); 
		/* map.addEventListener("tilesloaded",function(){
	    	map.setZoom(15);
	    }); */
	});
    $('.jc_publisher_tip a.jc_pt_close').bind('click',function(){
        var jc_publisher_tip = $(this).parent();
        jc_publisher_tip.slideUp(200);
    });
});
</script>
	
    <!-- <div class="clear"></div>
    <input id="resubmitToken" value="aa3adcfa3aa34365af954b38e2f3654f" type="hidden">
    <a style="display: none;" id="backtop" title="回到顶部" rel="nofollow"></a>  -->


    
    
    <div class="clear"></div>
    <script>
		// 关闭
		//3s tips消失
		//var global = {}
		//global.email = "quentin@015guan.com";
		//global.usertoken = $.cookie('user_trace_token');
	</script>
	
</div>
  <!-- end #container --> 


<!--
  <script type="text/javascript" src="http://www.lagou.com/js/core.min.js?v=1.5.6_2015052215"></script>
  <script type="text/javascript" src="http://www.lagou.com/js/popup.js?v=1.5.6_2015052215"></script>
  <script type="text/javascript" src="http://www.lagou.com/js/libs/tongji.js?v=1.5.6_2015052215"></script>
  <script type="text/javascript" src="http://www.lagou.com/js/libs/analytics.js?v=1.5.6_2015052215"></script>
--> 

<!--copy账号系统的passport.html--> 
<script type="text/javascript">
	/* function noticeInit(){
        var userId = "996061";
        var urls = {
            //调用B端简历管理nav的数字
            queryTipsNums : "http://hr.lagou.com/recruitment/queryTipsNums.json",
            //调用B端简历管理Notice Tip
            queryNotice : "http://hr.lagou.com/notice/queryNotice.json",
            //调用C端用户的notice数字
            getPushNoticeOfC : "http://www.lagou.com/common/getPushNoticeOfC.json",
            //清空C端用户的notice
            clearPushNoticeOfC : "http://www.lagou.com/common/clearPushNoticeOfC.json",
            //清空B端用户的notice
            clearAll : "http://hr.lagou.com/notice/clearAll.json"
        }
        
                //调用简历管理nav的数字
        PASSPORT.util.rpc({
            params:{},
            url: urls.queryTipsNums,
            succ:function(data){
                if(data.state == "1"){
                    var result = data.content.data;

                    var unhandleNum = $("#navheader b.unhandleNum");
                    if(result.unTreateNum && result.unTreateNum > 99 ){
                        unhandleNum.text("99+");
                    }else if(result.unTreateNum && result.unTreateNum > 0 ){
                        unhandleNum.text(result.unTreateNum);
                    }else{
                        unhandleNum.text("");
                    }
                }
            },
            fail:function(data){
                console.log('fail:' + data);
            }
        });

        //调用简历管理Notice Tip
        PASSPORT.util.rpc({
            params:{userId:userId},
            url:urls.queryNotice,
            succ:function(data){
                var result = data.content.data;
                if(data.state == "1" && result.pushNoticeEntity.isShowPushNotice){
                    var headerNoticeObj = $('#header .wrapper');
                    var counters = result.pushNoticeEntity.counters;
                    var noticeDotObj = $("#noticeDot");
                    var noticePopTip = ['<div id="noticeTip">','<span class="bot"></span>','<span class="top"></span>','<a href="javascript:;" class="closeNT"></a>'];
                    
                    if(counters.WILL_BE_REJECTED && counters.WILL_BE_REJECTED != 0 ){
                        noticePopTip.push('<a href="http://hr.lagou.com/interview/unHandlelist.html?autoRefuseDay=1&nt_flag=0&headTip=1" target="_blank" class="notice_tip" data-type="1"><strong>'+counters.WILL_BE_REJECTED+'</strong> 份简历1天内将被自动回绝！</a>');
                    }
                    if(counters.REJECTED && counters.REJECTED != 0 ){
                        noticePopTip.push('<a href="http://hr.lagou.com/interview/haveRefuselist.html?nt_flag=2" target="_blank" class="notice_tip"  data-type="3">已帮你自动回绝了 <strong>'+counters.REJECTED+'</strong>份简历！</a>');
                    }
                    //弹出tip和红点
                    noticeDotObj.removeClass("dn");
                    headerNoticeObj.append(noticePopTip.join(''));
                    
                    //全部已读
                    $('#noticeTip a.closeNT').click(function(){
                        //与后台交互，消息标识为已读
                        clearNoticeTip(urls.clearAll); 
                    });
                    
                    //B端消息绑定单击事件
                    var notice_tip = $("#noticeTip .notice_tip");
                    notice_tip.bind("click",function(){
                        var _this = $(this);
                        //获取当前点击的消息类型
                        var type = _this.data("type");
                        //告诉后台哪种类型的消息一经被查看
                        PASSPORT.util.rpc({
                            params:{nt:type},
                            url:'http://hr.lagou.com/notice/clear.json',
                            succ:function(data){
                                _this.remove();
                                if($("#noticeTip .notice_tip")){
                                    $('#noticeTip').remove();
                                    noticeDotObj.addClass("dn");
                                }
                            },
                            fail:function(data){
                                 console.log('fail:' + data);
                            }
                        });
                    });
                }
            },
            fail:function(data){
                console.log('fail:' + data);
            }
        });
        
        	}
    
    
    // 全部清空notice
    
    function clearNoticeTip(url){
        PASSPORT.util.rpc({
            params:{},
            url:url,
            succ:function(data){
                $('#noticeTip').remove();
                $("#noticeDot").addClass("dn");
            },
            fail:function(data){
                 console.log('fail:' + data);
            }
        });
    }  */
</script> 
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