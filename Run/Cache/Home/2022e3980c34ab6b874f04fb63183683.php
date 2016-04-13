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


<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/company.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/popup.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/external.min.css"/>
<script type="text/javascript" src="/Public/Home/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="/Public/Home/js/timeCountDown.js"></script>
<script type="text/javascript" src="/Public/Home/js/additional-methods.js"></script>
<script type="text/javascript" src="/Public/Home/js/callTimeCountDown.js"></script>
<style>
#colorbox {
	width: 88% !important;
}
</style>

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



<?php if($type=="mianshi"){ ?>

<style>#comfooter{ display:none;}</style>
	<div class="tilhed">
	   <a class="golevel" href="/User"></a>
	   <div class="mbtitle">面试管理</div>
	   <a class="gohome" href="/User"></a>
	</div>
	
	<table class="sctab" width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td width="50%"><a href="/Company/interview/type/mianshi/isover/2.html" <?php if($isover == '2'): ?>class="cur"<?php endif; ?>>将面试</a></td>
	    <td><a  href="/Company/interview/type/mianshi/isover/1.html" <?php if($isover == '1'): ?>class="cur"<?php endif; ?>>已面试</a></td>
	  </tr>
	</table>
	
	<div class="mbbox mt14">
	    
		
	<!-- 面试板块 --> 
    
       <?php if(!$list){ ?>
	        	<div class="nocenter"><span><img src="/Public/Home/images/empty.png" />未找到符合要求的记录</span></div>
        <?php }else{ ?>
	 
     <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="zwyuan">               	       
                  <table class="myjianli" width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                  
                    <?php $last_edu = getUserLastEdu($v['uid']); $last_work = getUserLastWork($v['uid']); $forward_record = getForwardRecord($v['aid']); ?>
                    
                    <tr>
	                <td><i class="zwico1"></i><?php echo ($v["interviewTime"]); ?>  </td>
	              </tr>
	        
	              <tr>
	                <td class="toplk resume_header2">
	                <a href="<?php echo (WEB_URL); ?>Jobs/info/id/<?php echo ($v["jid"]); ?>" title="<?php echo ($v["zhiwei_mingcheng"]); ?>"><?php echo ($v["zhiwei_mingcheng"]); ?></a>
	                  <?php if($type!="autoFilter" && $type!="refuselist"){ ?>
		                    <a href="javascript:;" class="star <?php if($v['biaoshi']) echo 'collect'; ?>"  data-deliverId="<?php echo ($v["aid"]); ?>"></a>
		              <?php } ?>
	                  </td>
	              </tr>
	              
	              <tr>
	                <td class="botlk">
	                <?php if($v['rid']){ ?>
	                	<a href="/Resume/downResume/id/<?php echo ($v["rid"]); ?>"><?php echo ($v["realname"]); ?>线下简历</a>
	                <?php }else{ ?>
	                	<a href="/User/resumePreview/uid/<?php echo ($v["uid"]); ?>/aid/<?php echo ($v["aid"]); ?>"><?php echo ($v["realname"]); ?>在线简历</a>
	                <?php } ?>
	                	
	                </td>
	              </tr>
	              
	              <tr>
	                <td><i class="zwico1"></i><?php echo ($last_edu["schoolName"]); ?> · <?php echo ($last_edu["professional"]); ?> · <?php echo ($last_edu["education"]); ?>  </td>
	              </tr>
	              
	              <tr>
	                <td><i class="zwico4"></i><?php echo ($v["workyear"]); ?></td>
	              </tr>
	              
	              <tr>
	                <td class="botlk1"><i></i><?php echo ($v["email"]); ?></td>
	              </tr>
	              
	              <tr>
	                <td class="botlk2"><i></i><?php echo ($v["phone"]); ?></td>
	              </tr>
	              
	              
	              
	              </table>
                  
	              
	      </div><?php endforeach; endif; else: echo "" ;endif; ?>
                  
	              
	           <?php } ?>  
               
	      
	</div>


<?php }else if($type=="noread"){ ?>

<style>#comfooter{ display:block;}</style>
	<div class="tilhed">
	   <a class="golevel" href="/User"></a>
	   <div class="mbtitle">未读简历</div>
	   <a class="gohome" href="/User"></a>
	</div>
	
	<table class="sctab" width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td width="50%"><a href="/Company/interview/type/noread/sn/2.html" <?php if($sn == '2'): ?>class="cur"<?php endif; ?>>职位</a></td>
	    <td><a  href="/Company/interview/type/noread/sn/1.html" <?php if($sn == '1'): ?>class="cur"<?php endif; ?>>时间</a></td>
	  </tr>
	</table>
	
	<div class="mbbox mt14">
	
		<?php if(!$list){ ?>
	        <div class="nocenter"><span><img src="/Public/Home/images/empty.png" />未找到符合要求的记录</span></div>
        <?php }else{ ?>
	
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; $last_edu = getUserLastEdu($v['uid']); $last_work = getUserLastWork($v['uid']); $forward_record = getForwardRecord($v['aid']); ?>
	           
	           
			   <?php if($sn=="1"){ ?>
			
			
				<!-- 时间 -->  
			  <div class="zwyuan">
			    <table class="myjianli" border="0" cellpadding="0" cellspacing="0" width="100%">
			      <tbody>
			        <tr>
			          <td class="toplk" colspan="2"><a href="<?php echo (WEB_URL); ?>Jobs/info/id/<?php echo ($v["jid"]); ?>" title="Android"><?php echo ($v["zhiwei_mingcheng"]); ?></a> <a href="javascript:;" class="star " data-deliverid="<?php echo ($v["aid"]); ?>"></a></td>
			        </tr>
			        <tr>
			          <td class="botlk" colspan="2"><a href="/User/resumePreview/uid/<?php echo ($v["uid"]); ?>/aid/<?php echo ($v["aid"]); ?>"><?php echo ($v["realname"]); ?></a></td>
			        </tr>
			        <tr>
			          <td colspan="2"><i class="zwico1"></i><?php echo ($last_edu["schoolName"]); ?> · <?php echo ($last_edu["professional"]); ?> · <?php echo ($last_edu["education"]); ?> </td>
			        </tr>
			        <tr>
			          <td style="border-bottom:none; border-right:1px solid #ddd;" width="65%"><i class="zwico4"></i><?php echo ($v["edu"]); ?></td>
			          <td style="border-bottom:none; cursor:pointer;" class="colac" align="center"><div class="look_resume_link"> <span data-flag="flag" data-deliverid="<?php echo ($v["aid"]); ?>">查看联系方式 </span> </div></td>
			        </tr>
			      </tbody>
			    </table>
			  </div>
			
			
			<?php }else{ ?>
		
					
			<!-- 职位 -->
			  <div class="zwyuan">
			    <table class="myzhiwei" width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td class="toplk" colspan="2"><a href="<?php echo (WEB_URL); ?>Jobs/info/id/<?php echo ($v["jid"]); ?>" ><?php echo ($v["zhiwei_mingcheng"]); ?></a></td>
			      </tr>
			      <tr>
			        <td><i class="zwico1"></i><?php echo ($v["city"]); ?></td>
			        <td><i class="zwico2"></i><?php echo ($v["workyear"]); ?></td>
			      </tr>
			      <tr>
			        <td><i class="zwico3"></i><?php echo ($v["yuexin_min"]); ?>k-<?php echo ($v["yuexin_max"]); ?>k </td>
			        <td><i class="zwico4"></i><?php echo ($last_edu["education"]); ?></td>
			      </tr>
			      <tr>
			        <td class="botlk" colspan="2"><a href="<?php echo (WEB_URL); ?>Company/interview/type/unhandle/jid/<?php echo ($v["jid"]); ?>"><?php echo (getapplycount($v["jid"])); ?>简历</a></td>
			      </tr>
			    </table>
			  </div>
		  
		  
		  	<?php } endforeach; endif; else: echo "" ;endif; ?>
	  
	  <?php } ?>  
	  
	</div>
	



<?php }elseif($job_info){ ?>

<style>#comfooter{ display:none;}</style>

	<div class="tilhed"> <a class="golevel" href="/Company/positions/type/Publish.html"></a>
	  <div class="mbtitle"><?php echo ($job_info["zhiwei_mingcheng"]); ?></div>
	  <a class="gohome" href="/User"></a>
	</div>
	
	
	<div class="jisfenjl"><i></i><?php echo (getapplycount($job_info["jid"])); ?>份简历</div>


	<div class="mbbox mt14">
	    
	    
	    <?php if(!$list){ ?>
	                  
	        <div class="nocenter"><span><img src="/Public/Home/images/empty.png" />未找到符合要求的记录</span></div>
	                  
             <?php }else{ ?>
                  
                
                  
                    <?php $last_edu = getUserLastEdu($v['uid']); $last_work = getUserLastWork($v['uid']); $forward_record = getForwardRecord($v['aid']); ?>
                    
	             <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="zwyuan">               
				        <table class="myjianli" width="100%" border="0" cellspacing="0" cellpadding="0">
				        
				              <tr>
				                <td class="toplk resume_header2" colspan="2">
				                <a href="<?php echo (WEB_URL); ?>Jobs/info/id/<?php echo ($v["jid"]); ?>" title="<?php echo ($v["zhiwei_mingcheng"]); ?>"><?php echo ($v["zhiwei_mingcheng"]); ?></a>
				                  <?php if($type!="autoFilter" && $type!="refuselist"){ ?>
					                    <a href="javascript:;" class="star <?php if($v['biaoshi']) echo 'collect'; ?>"  data-deliverId="<?php echo ($v["aid"]); ?>"></a>
					              <?php } ?>
				                  </td>
				              </tr>
				              
				              <tr>
				                <td class="botlk" colspan="2">
				                 <a href="/User/resumePreview/uid/<?php echo ($v["uid"]); ?>/aid/<?php echo ($v["aid"]); ?>"><?php echo ($v["realname"]); ?></a>
				                </td>
				              </tr>
				              
				              <tr>
				                <td colspan="2"><i class="zwico1"></i><?php echo ($last_edu["schoolName"]); ?> · <?php echo ($last_edu["professional"]); ?> · <?php echo ($last_edu["education"]); ?> </td>
				              </tr>
				              
				              
				              
				              <?php if(!$v['view_contact']){ ?>       
	        
	        
	        					<tr>
				                <td width="65%" style="border-bottom:none; border-right:1px solid #ddd;"><i class="zwico4"></i><?php echo ($v["edu"]); ?></td>
				            	<td align="center" style="border-bottom:none; cursor:pointer;" class="colac">
				                  <?php if($v['status']=="-1"){ ?>
				                  		<div  class="nolook_phone" > 
				                  		  <span data-flag="flag">未查看联系方式 </span>
				               		    </div>
				                  	<?php }else{ ?>				                  		
				               		    
				               		    <div  class="look_resume_link" > 
				                  		  <span data-flag="flag" data-deliverId = "<?php echo ($v["aid"]); ?>">查看联系方式 </span> 
				               		    </div>										
				               		    
				                  	<?php } ?>
				             	</td>
				              	</tr>
				              
        							
       
							  <?php }else{ ?>     
									  
									<tr>
									  
									   <td><i class="zwico4"></i><?php echo ($v["workyear"]); ?></td>
									 </tr>
									 <tr>
									   <td class="botlk1"><i></i><?php echo ($v["email"]); ?></td>
									 </tr>
									 <tr>
									   <td class="botlk2"><i></i><?php echo ($v["phone"]); ?></td>
									 </tr>
									  
								<?php } ?> 
				         </table>
				      </div><?php endforeach; endif; else: echo "" ;endif; ?>
              
	    
	    <?php } ?>
	
	         
	    
	</div>


<?php }else{ ?>

<!-- 简历管理 -->
<style>#comfooter{ display:none;}</style>

	<div class="tilhed"> <a class="golevel" href="/User"></a>
	  <div class="mbtitle">简历管理</div>
	  <a class="gohome" href="/User"></a>
	</div>
	
	
	<table class="sctab" width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td width="33.3%"><a href="/Company/interview/type/unhandle" 
	      <?php if($type == 'unhandle'): ?>class="cur"<?php endif; ?>
	      >待处理</a></td>
	    <td width="33.3%"><a  href="/Company/interview/type/prepare" 
	      <?php if($type == 'prepare'): ?>class="cur"<?php endif; ?>
	      >待沟通</a></td>
	    <td><a <?php if($type == 'ismark'): ?>class="cur"<?php endif; ?> href="/Company/interview/type/ismark">已收藏</a></td>
	  </tr>
	</table>
	
	
	<div class="mbbox mt14">

	  <?php if(!$list){ ?>
	  
	  	<div class="nocenter"><span><img src="/Public/Home/images/empty.png" />未找到符合要求的记录</span></div>
	  
	  <?php }else{ ?>
	  
		  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; $last_edu = getUserLastEdu($v['uid']); $last_work = getUserLastWork($v['uid']); $forward_record = getForwardRecord($v['aid']); ?>
		    <div class="zwyuan">
		      <table class="myjianli" width="100%" border="0" cellspacing="0" cellpadding="0">
		        <tr>
		          <td class="toplk resume_header2" colspan="2"><a href="<?php echo (WEB_URL); ?>Jobs/info/id/<?php echo ($v["jid"]); ?>" title="<?php echo ($v["zhiwei_mingcheng"]); ?>"><?php echo ($v["zhiwei_mingcheng"]); ?></a>
		            <?php if($type!="autoFilter" && $type!="refuselist"){ ?>
		            <a href="javascript:;" class="star <?php if($v['biaoshi']) echo 'collect'; ?>"  data-deliverId="<?php echo ($v["aid"]); ?>"></a>
		            <?php } ?></td>
		        </tr>
		        <tr>
		          <td class="botlk" colspan="2"><a href="/User/resumePreview/uid/<?php echo ($v["uid"]); ?>/aid/<?php echo ($v["aid"]); ?>"><?php echo ($v["realname"]); ?></a></td>
		        </tr>
		        <tr>
		          <td colspan="2"><i class="zwico1"></i><?php echo ($last_edu["schoolName"]); ?> · <?php echo ($last_edu["professional"]); ?> · <?php echo ($last_edu["education"]); ?> </td>
		        </tr>
		        
		        <?php if(!$v['view_contact']){ ?>       
			        
			        <tr>
			          <td width="65%" style="border-bottom:none; border-right:1px solid #ddd;"><i class="zwico4"></i><?php echo ($v["edu"]); ?></td>
			          <td align="center" style="border-bottom:none; cursor:pointer;" class="colac"><?php if($type=="refuselist"){ ?>
			            <div  class="nolook_phone" > <span data-flag="flag">未查看联系方式 </span> </div>
			            <?php }else{ ?>
			            <div  class="look_resume_link" > <span data-flag="flag" data-deliverId = "<?php echo ($v["aid"]); ?>">查看联系方式 </span> </div>
			            <?php } ?></td>
			        </tr>    
			        
				<?php }else{ ?>     
				  
				  <tr>
				   <td><i class="zwico4"></i><?php echo ($v["workyear"]); ?></td>
				 </tr>
				 <tr>
				   <td class="botlk1"><i></i><?php echo ($v["email"]); ?></td>
				 </tr>
				 <tr>
				   <td class="botlk2"><i></i><?php echo ($v["phone"]); ?></td>
				 </tr>
				  
				<?php } ?>      
		           
		        
		      </table>
		    </div><?php endforeach; endif; else: echo "" ;endif; ?>
		  
		  
		  <?php } ?>
	  
	  
	  
	</div>

<!-- 简历管理弹出层 -->

<div id="tantan_tip" class="tantan" style="display:none;">
  <span></span>
  <a id="ttmsg" href="javascript:"></a>
</div>


<script>
//$.cookie('tip_contact_show',"", { expires: -1 });
function show_tip_tc(){

	if($.cookie('tip_contact_show')){
		top.location.href = top.location.href;
		window.location.reload();
		return true;
	}
	else{
		$("#tantan_tip").show();
		/* setTimeout(function(){
			$("#tantan_tip").fadeOut(1000)
			},3000
		); */
		
		var SysSecond=3;
		var InterValObj;
			
		
		//将时间减去1秒，计算天、时、分、秒
		function SetRemainTime() {
		     if (SysSecond > 0) {
		       SysSecond = SysSecond - 1;
		       
		     }
		     else {
		    	 $("#tantan_tip").hide();
		         window.clearInterval(InterValObj);
		         
		         top.location.href = top.location.href;
				 window.location.reload();
		         return true;
		     }
		}
		
		$(document).ready(function() {
		    //SysSecond = 3; //这里获取倒计时的起始时间

		    InterValObj = window.setInterval(SetRemainTime, 1000); //间隔函数，1秒执行
		});	
		
	}
	   
	
}




$("#ttmsg").click(function(){
   $(this).addClass('cur');
   $.cookie('tip_contact_show','1',{expires:24*3600*30});
})
</script>

<?php } ?>











	  
<!-- 待沟通模板，需要套程序 

<div class="zwyuan">
  <table class="myjianli" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="toplk"><a href="<?php echo (WEB_URL); ?>Jobs/info/id/<?php echo ($v["jid"]); ?>" title="Android"><?php echo ($v["zhiwei_mingcheng"]); ?></a>
        <?php if($type!="autoFilter" && $type!="refuselist"){ ?>
        <a href="javascript:;" class="star <?php if($v['biaoshi']) echo 'collect'; ?>"  data-deliverId="<?php echo ($v["aid"]); ?>"></a>
        <?php } ?></td>
    </tr>
    <tr>
      <td class="botlk"><a href="/User/resumePreview/uid/<?php echo ($v["uid"]); ?>/aid/<?php echo ($v["aid"]); ?>"><?php echo ($v["realname"]); ?></a></td>
    </tr>
    <tr>
      <td><i class="zwico1"></i><?php echo ($last_edu["schoolName"]); ?> · <?php echo ($last_edu["professional"]); ?> · <?php echo ($last_edu["education"]); ?> </td>
    </tr>
    <tr>
      <td><i class="zwico4"></i>应届毕业生</td>
    </tr>
    <tr>
      <td class="botlk1"><i></i>myemail@163.com</td>
    </tr>
    <tr>
      <td class="botlk2"><i></i>13969973911</td>
    </tr>
  </table>
</div>-->




<input type="hidden" value="<?php echo ($myinfo["company_short_name"]); ?>" id="noticeCompanyName"/>

<!--------------------------------- 弹窗lightbox ----------------------------------------->
<div style="display:none;"> <!-- //将原来的发送线上面试和线下面试合二为一弹窗 -->
  <div id="hr_noticeInterview" class="popup" style=" width:500px;height:545px;">
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
          <td><span>可选模板</span> <span class="selectRefuse">
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
            <td align="left" style="padding-top:12px;"><input class="btn" type="submit" value="确认查看"/>
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
<div class="clear"></div>
<script type="text/javascript" src="/Public/Home/js/core.min.js?v=1.5.6_2015060418"></script> 
<script type="text/javascript" src="/Public/Home/js/popup.min.js?v=1.5.6_2015060418"></script> 
      
<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>
<div style="height:60px;"></div>
<div class="clr"></div>


    <?php if(is_login()): if(getUsersSession('type')==1){ ?>
                  
              <div id="comfooter">
                  <a  <?php echo ($cur_top_nav["noread"]); ?> href="/Company/interview/type/noread">未读简历</a><!-- <?php echo ($cur_top_nav["noread"]); ?> -->
                  <a  <?php echo ($cur_top_nav["user"]); ?> href="/User/">个人中心</a><!-- <?php echo ($cur_top_nav["user"]); ?> -->
              </div>
          
          <?php }else{ ?>
          
              
              <div id="footer">
                  <a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/">职位</a>
                  <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/">公司</a>
                  <a <?php echo ($cur_top_nav["user"]); ?> id="mwode" href="/User/">我的</a>
              </div>
              
         <?php } ?>
         
      <?php else: ?>   
         <div id="footer">
                  <a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/">职位</a>
                  <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/">公司</a>
                  <a <?php echo ($cur_top_nav["user"]); ?> id="mwode" href="/User/">我的</a>
         </div><?php endif; ?>

<?php } endif; ?>

<script type="text/javascript">
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
            	alert(data.message);
            	if(data.content.do_type==-1){
            		window.location.href="/User/login/?ref=/Jobs/info/id/<?php echo ($info["jid"]); ?>";
            	}
            	
            
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
		$(".licity").hide();
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

</body>
</html>