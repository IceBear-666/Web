<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta charset="UTF-8">
<title>简历预览</title>


<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/reset.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/myresume.css"/>
<script type="text/javascript" src="/Public/Home/js/jquery.1.10.1.min.js" ></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lib.min.js"></script>
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

    <div class="tilhed2">
       <a class="golevel" href="/User"></a>
       <div class="mbtitle">我的简历</div>
       <a class="gohome" href="/"></a>
    </div>
    
<table class="qhjianli" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><a class="cur" href="/Resume/myresume.html">在线</a></td>
    <td><a href="/Resume/otherResume.html">附件</a></td>
  </tr>
</table>
    
<div class="mr_created mbbox">
  <div>
  
    <div id="mr_mr_head">
          <div class="mr_top_bg" id="baseinfo">
           <img id="userpic"  src='<?php if($info["pic"] != '' ): echo ($info["pic"]); else: ?>/Public/Home/images/default_headpic.png<?php endif; ?>'  alt="头像" class="mr_headimg"/> 
          </div>
          
          <div class="txtct pdt10 f16 mt30"><?php echo ($info["realname"]); ?></div>
          
      </div>
      
    <div class="metil mt10">基本资料</div>
      <div class="infopl">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="76" class="col999">最高学历：</td>
            <td><?php echo ($info["edu"]); ?></td>
          </tr>
          <tr>
            <td class="col999">工作年限：</td>
            <td><?php echo ($info["workyear"]); ?></td>
          </tr>
          <tr>
            <td class="col999">所在城市：</td>
            <td><?php echo ($info["city"]); ?></td>
          </tr>
          <tr>
            <td class="col999">联系电话：</td>
            <td><?php echo ($info["phone"]); ?></td>
          </tr>
          <tr>
            <td class="col999">联系邮箱：</td>
            <td><?php echo ($info["email"]); ?></td>
          </tr>
        </table>

    </div>
    
    
    <div class="metil mt10">工作经历</div>   
    <div class="infopl">
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <?php if(is_array($exp_list)): $i = 0; $__LIST__ = $exp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td class="col999"><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></td>
          </tr>
          <tr>
            <td><?php echo ($v["companyName"]); ?></td>
          </tr>
          <tr>
            <td class="col999"><?php echo ($v["positionName"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
    </div>  
    
    
    
     <div class="metil mt10">教育经历</div>   
    <div class="infopl">
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php if(is_array($edu_list)): $i = 0; $__LIST__ = $edu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td class="col999"><?php echo ($v["endYear"]); ?>年毕业</td>
          </tr>
          <tr>
            <td><?php echo ($v["schoolName"]); ?></td>
          </tr>
          <tr>
            <td class="col999"><?php echo ($v["education"]); ?> · <?php echo ($v["professional"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
    </div>  
    
    
    
     <div class="metil mt10">项目经验</div>   
    <div class="infopl">
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php if(is_array($pro_list)): $i = 0; $__LIST__ = $pro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td class="col999"><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></td>
          </tr>
          <tr>
            <td>项目名称：<?php echo ($v["projectName"]); ?></td>
          </tr>
          <tr>
            <td class="col999">我的职责：<?php echo ($v["positionName"]); ?></td>
          </tr>
          <tr>
            <td style="padding-bottom:10px; padding-left:15px;"><?php echo ($v["projectRemark"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
    </div> 
    
    
    
    
    <div class="metil mt10">作品展示</div> 
     <div class="infopl">
      <?php if(is_array($work_list)): $i = 0; $__LIST__ = $work_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="mr_wo_show">
                  <div class="mr_self_site"> 
                    <a class="mr_self_sitelink" href="<?php echo ($v["url"]); ?>" target="_blank"> <?php echo ($v["url"]); ?> </a> 
                  </div>
                  <div class="mr_wo_preview">
                    <p><?php echo ($v["workName"]); ?></p>
                  </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
     </div>  
    


    
    
    <div class="metil mt10">技能评价</div> 
     <div id="skillsAssess"  class="infopl">
     
       <div class="mr_moudle_content">
           <div class="me_skill_list">
              
            <?php foreach($skill_list as $kk=>$vv){ ?>
                <div class="mr_skill_con" data-grade="<?php echo ($vv["skillPercent"]); ?>" data-skill-id="<?php echo ($vv["sid"]); ?>">
                    <span class="mr_skill_name" title="<?php echo ($vv["skillName"]); ?>"><?php echo ($vv["skillName"]); ?></span>
                    <span class="mr_skill_plan"><em></em></span>
                    <span class="mr_skill_delete"></span>
                    <span class="mr_skill_level"><?php echo ($vv["masterLevel"]); ?></span>
                    <i class="mr_skill_circle"><em><?php echo ($vv["masterLevel"]); ?></em></i>
                </div>
            <?php } ?>

            </div>
         </div>
     </div>
     
     
 
 
   <div class="metil mt10">自我描述</div> 
   <div class="infopl">
      <div style="padding-left:14px; line-height:22px;">
      <?php echo ($info["remark"]); ?>
     </div>
   </div>
   
 
 <!-- 自定义 -->        
	<?php if($custom_model){ ?>   
      <div class="metil mt10"><?php echo ($custom_model["titleName"]); ?></div> 
   <div class="infopl">
      <div style="line-height:22px;">
      <?php echo ($custom_model["titleContent"]); ?>
     </div>
   </div>
 <?php } ?>    
   
 
        <div class="bgf9 txtct f16" style="padding:10px 0px; margin:10px 0px;"> <?php echo ($info["workstatus"]); ?></div>
          
        
    
    
  </div>
</div>

</div>
<div class="h20"></div>
<!--end #previewWrapper--> 

    <script type="text/javascript" src="/Public/Home/js/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script> 
    <script>
	// 设置全局变量
	window.globals =  {
		resumeId: '<?php echo ($info["uid"]); ?>',
		initRatio: '<?php echo ($info["resume_score"]); ?>',
		token: '3ad1ea0ea3794947ade65710418b25bd',
		refreshTime: '<?php echo ($info["update_time"]); ?>',
		skillScore: '<?php echo ($info["score_jineng"]); ?>',
		projectExperienceScore: '<?php echo ($info["score_xiangmu"]); ?>',
		workShowScore: '<?php echo ($info["score_zuopin"]); ?>',
		//expectJobsScore: '<?php echo ($info["score_qiwang"]); ?>',
		myRemarkScore: '<?php echo ($info["score_ziwo"]); ?>',
		hasProjectExperiences: true,
		hasWorkShows: false,
		hasSelf: true,
		//hasExpectJobs: true,
		hasSkillEvaluates: true,
		hasUserDefines: true,
		personIdFlag:'',
		qrImgSrc:'/Public/qr/qrcode.jpg?qrSource=myResume',
		isOpenResume:'<?php echo ($info["isOpenMyResume"]); ?>',
		isFirstOpen:false
	};
	</script> 
    <script type="text/javascript" src="/Public/Home/js/common.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/json.min.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/jquery-migrate-1.1.1.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/jquery-ui-1.8.custom.min.js"></script> 
    
    <script type="text/javascript" src="/Public/Home/js/jquery.cropzoom.js"></script> 
    <script type="text/javascript" src="/Public/Home/js/components.js?v=1.5.6_2015051318"></script> 
    <script type="text/javascript" src="/Public/Home/js/new_myresume.js"></script> 
    
</body>
</html>