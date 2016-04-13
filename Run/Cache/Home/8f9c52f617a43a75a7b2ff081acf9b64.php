<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>简历预览</title>


<link rel="stylesheet" type="text/css"  href="/Public/Home/css/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/reset.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/myresume.css"/>
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

<div class="mr_created mr_preview">
  <div class="mr_myresume_l mrcenter">
    <div id="mr_mr_head">
          <div class="mr_top_bg" id="baseinfo"> <img id="userpic"  src='<?php if($info["pic"] != '' ): echo ($info["pic"]); else: ?>/Public/Home/images/default_headpic.png<?php endif; ?>'  width="117" height="117" alt="头像" class="mr_headimg"/> <img src="/Public/Home/images/shadow_tx.png" alt="" class="shadow"/>
          </div>
          <div class="mr_baseinfo"> 
            <div class="mr_p_myname mr_w604 clearfixs"> <span class="mr_name" id="txt_realname"><?php echo ($info["realname"]); ?></span> </div>
            <div class="mr_p_info mr_infoed mr_w604 clearfixs">
              <div class="info_t"> <span class="base_info"><i></i><em class="s"></em><em class="x"><?php echo ($info["birthday"]); ?>年出生 · <?php if($info["sex"] == 2): ?>女<?php else: ?>男<?php endif; ?> · <?php echo ($info["edu"]); ?> · <?php echo ($info["workyear"]); ?></em></span> </div>
              <div class="info_b"> <span class="dizhi"><i></i><em data-id="0" title="<?php echo ($info["city"]); ?>"><?php echo ($info["city"]); ?></em></span> <span class="mobile"><i></i><em><?php echo (gethidephone($info["phone"],$view_contact)); ?></em></span> <span class="email"><i></i><em><?php echo (gethideemail($info["email"],$view_contact)); ?></em></span> </div>
              
              <span class="mr_edit mr_head_r mr_edit_on dn" data-birthday="<?php echo ($info["birthday"]); ?>"  data-sex='<?php if($info["sex"] == 2): ?>女<?php else: ?>男<?php endif; ?>' data-xl="<?php echo ($info["edu"]); ?>" data-gzjy="<?php echo ($info["workyear"]); ?>" data-city="<?php echo ($info["city"]); ?>" data-mobile="<?php echo ($info["phone"]); ?>" data-email="<?php echo ($info["email"]); ?>" data-realname="<?php echo ($info["realname"]); ?>"></span> </div>
            
          </div>
      </div>
        
        
    <div class="mr_content">
      <div class="mr_w604">
      
<!-- 工作经历 -->       
        <div id="workExperience">
          <div>
            <div class="mr_moudle_head clearfixs">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c"> 工作经历 </span><span class="mr_title_r"></span> </div>
              </div>
            </div>
            <div class="mr_moudle_content">
              <div class="list_show">
                <div class="mr_jobe_list">
                
                <?php if(is_array($exp_list)): $i = 0; $__LIST__ = $exp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="clearfixs">
                    <div class="mr_content_l">
                        <a class="projectTitle nourl"><?php echo ($v["companyName"]); ?></a>
                        <p><?php echo ($v["positionName"]); ?></p>
                    </div>
                    <div class="mr_content_r"> <span><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></span> </div>
                  </div>
                  
                  <div class=" mr_content_m"><?php echo ($v["workContent"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
                  
                    
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        
<!-- 教育经历 -->         
        <div id="educationalBackground">
          <div>
            <div class="mr_moudle_head clearfixs">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">教育经历</span><span class="mr_title_r"></span> </div>
              </div>
            </div>
         
            
            <div class="mr_moudle_content">            
            
            <?php if(is_array($edu_list)): $i = 0; $__LIST__ = $edu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="clearfixs mb46 mr_jobe_list">
              
              
                <div class="mr_content_l">
                    <h4><?php echo ($v["schoolName"]); ?></h4>
                      <span><?php echo ($v["education"]); ?> · <?php echo ($v["professional"]); ?></span>
                </div>
                <div class="mr_content_r"> <span><?php echo ($v["endYear"]); ?>年毕业</span></div>
              </div>
              
              
            </div><?php endforeach; endif; else: echo "" ;endif; ?>           
            
          </div>
        </div>
        
        
 <!-- 项目经验 -->       
        <div id="projectExperience" class="<?php if(!$pro_list){echo 'dn';} ?>">
          <div>
            <div class="mr_moudle_head clearfixs">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">项目经验</span><span class="mr_title_r"></span> </div>
              </div>
            </div>
            <div class="mr_moudle_content mr_w604">
              <div class="list_show">
              
              <?php if(is_array($pro_list)): $i = 0; $__LIST__ = $pro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="mr_jobe_list" >
                  <div class="clearfixs">
                    <div class="mr_content_l">
                      <div class="l2"> 
                        <a href="<?php echo ($v["projectUrl"]); ?>" class="projectTitle" target="_blank"><span></span><?php echo ($v["projectName"]); ?></a>
                        <p><?php echo ($v["positionName"]); ?></p>
                      </div>
                    </div>
                    <div class="mr_content_r"> <span><?php echo ($v["startDate"]); ?> - <?php echo ($v["endDate"]); ?></span> </div>
                  </div>
                  <div class="mr_content_m">
                     <p><?php echo ($v["projectRemark"]); ?></p>
                  </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                
                
              </div>
            </div>
          </div>
        </div>
        
        
 <!-- 作品展示 -->        
        <div id="worksShow" class="<?php if(!$work_list){echo 'dn';} ?>">
          <div>
            <div class="mr_moudle_head clearfixs">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">作品展示</span><span class="mr_title_r"></span> </div>
              </div>
            </div>
            <div class="mr_moudle_content">
              <div class="mr_work_online">
              
              <?php if(is_array($work_list)): $i = 0; $__LIST__ = $work_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="mr_wo_show">
                  <div>
                    <div class="mr_c_r_t"> &nbsp; </div>
                  </div>
                  <div class="mr_self_site"> 
                    <a class="mr_self_sitelink" href="<?php echo ($v["url"]); ?>" target="_blank"> <?php echo ($v["url"]); ?> </a> 
                  </div>
                  <div class="mr_wo_preview">
                    <p><?php echo ($v["workName"]); ?></p>
                  </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                
                
              </div>
            </div>
          </div>
        </div>
        
 <!-- 自我描述 -->  
        
        <div id="selfDescription" class="<?php if(!$info['remark']){echo 'dn';} ?>">
          <div>
            <div class="mr_moudle_head clearfixs">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">自我描述</span><span class="mr_title_r"></span> </div>
              </div>
            </div>
            <div class="mr_moudle_content clearfixs">
                <div class="mr_self_r">
                    <?php echo ($info["remark"]); ?>
                  </div>
            </div>
          </div>
        </div>
        
        
 
        
<!-- 技能评价 -->       
        <div id="skillsAssess"  class="item_container_target <?php if(!$skill_list){echo 'dn';} ?>" >
          <div>
            <div class="mr_moudle_head clearfixs">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c">技能评价</span><span class="mr_title_r"></span> </div>
              </div>
            </div>
            <div class="mr_moudle_content mr_w604">
              <div class="me_skill_list">
              
              		<?php foreach($skill_list as $kk=>$vv){ ?>
	                  <div class="mr_skill_con" data-grade="<?php echo ($vv["skillPercent"]); ?>" data-skill-id="<?php echo ($vv["sid"]); ?>"> <span class="mr_skill_name" title="<?php echo ($vv["skillName"]); ?>"><?php echo ($vv["skillName"]); ?></span> <span class="mr_skill_plan"> <em></em> </span> <span class="mr_skill_delete"></span> <span class="mr_skill_level"><?php echo ($vv["masterLevel"]); ?></span> <i class="mr_skill_circle"><em><?php echo ($vv["masterLevel"]); ?></em></i> </div>
	                 <?php } ?>
	                 
	                  <!-- <div class="mr_skill_con" data-grade="73" data-skill-id=""> <span class="mr_skill_name" title="php+mysql">php+mysql</span> <span class="mr_skill_plan"> <em></em> </span> <span class="mr_skill_delete"></span> <span class="mr_skill_level">精通</span> <i class="mr_skill_circle"><em>精通</em></i> </div>
	                  <div class="mr_skill_con" data-grade="22" data-skill-id=""> <span class="mr_skill_name" title="div+html">div+html</span> <span class="mr_skill_plan"> <em></em> </span> <span class="mr_skill_delete"></span> <span class="mr_skill_level">基础</span> <i class="mr_skill_circle"><em>基础</em></i> </div>
	                  <div class="mr_skill_con" data-grade="55" data-skill-id=""> <span class="mr_skill_name" title="javascript">javascript</span> <span class="mr_skill_plan"> <em></em> </span> <span class="mr_skill_delete"></span> <span class="mr_skill_level">熟练</span> <i class="mr_skill_circle"><em>熟练</em></i> </div> -->
                </div>
              </div>

          </div>
        </div>
        
        
<!-- 自定义 -->        
	<?php if($custom_model){ ?>    
      <div id="customBlock">
        <div>
          <div class="mr_moudle_head clearfixs">
              <div class="mr_head_l">
                <div class="mr_title"> <span class="mr_title_l"></span><span class="mr_title_c"><?php echo ($custom_model["titleName"]); ?></span><span class="mr_title_r"></span> </div>
              </div>
            </div>
          <div data-id="<?php echo ($custom_model["id"]); ?>" class="custom_list">
             <p><?php echo ($custom_model["titleContent"]); ?></p>
         </div>
        </div>
      </div>
      
       <?php } ?> 
        
    </div>
    
    
      <div class="mr_self_state"> 
        <div class="form_wrap mr_self_s resume_status"> ·&nbsp;<?php echo ($info["workstatus"]); ?>&nbsp;· </div>
      </div>
    </div>
    <div class="mr_bottom_r" id="mr_pre_bot"> <span>© <?php echo ($info["realname"]); ?>  简历更新于<?php echo (showday($info["update_time"])); ?><!-- . <?php echo C('COPYRIGHT');?> --></span> </div>
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