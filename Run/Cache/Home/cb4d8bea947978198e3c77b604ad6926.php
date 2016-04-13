<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>简历预览</title>

<link rel="stylesheet" type="text/css" href="/Public/Home/css/flat-ui.min.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/reset.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/myresumepre.css"/>
<script type="text/javascript" src="/Public/Home/js/jquery.min.js" ></script>
<!-- <script type="text/javascript" src="/Public/Home/js/bootstrap.min.js" ></script> -->
<script type="text/javascript" src="/Public/Home/js/jquery.sticky.js"></script>
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
<!-- link rel="stylesheet" type="text/css" href="/Public/Home/css/testresume.css"> -->

</head>

<body>
<div class="myr_created myr_preview" >

    <div class="myr_w760">
     <div class="myr_header">
      <div id="resumeCompelete">

        <div class="rt-progress">
          <p class="complete">简历完整度：</p>
            <div class="progress" id="progress-allresume" style=" width: 170px; ">
              <div class="progress-bar" style=" width:<?php $allnum = 170*$alllist[1]/$alllist[0]; echo sprintf("%.2f", $allnum);?>px"></div>
              <span class="counter" style="left:70px"><?php echo "$alllist[1]/$alllist[0]";?></span>
            </div>

            <div class="progress lowUseCell" id="progress-emptyresume" style=" width: 65px; ">
              <div class="progress-bar" style="width: <?php $lownum= 65*$low_num[1]/$low_num[0]; echo sprintf("%.2f", $lownum);?>px"></div><span class="counter" style="left:12px;"><?php echo "$low_num[1]/$low_num[0]";?></span>
            </div>
            <div class="blank empty"></div>
        </div>

        <div class="fill-contrainer">
          <div class="myr_radio">
                <label class="radio">
              <input type="radio" name="fill" id="fill1" value="all" data-toggle="radio" class="custom-radio" checked=""><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
              所有
           </label>
           &nbsp;&nbsp;
           <label class="radio">
              <input type="radio" name="fill" id="fill2" value="filled" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
              已填
            </label>
            &nbsp;&nbsp;
             <label class="radio">
              <input type="radio" name="fill" id="fill3" value="empty" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
              未填
            </label>
            <input id="myysex" name="myysex" type="hidden" value="<?php echo ($info["sex"]); ?>">
              </div>
        </div>

        <div class="swich-container">
           <div class="switch-resume switch-yellow">
            <input type="radio" class="switch-input" name="resume-checked" value="high" id="high">
            <label for="high" class="switch-label switch-label-off">高频</label>
            <input type="radio" class="switch-input" name="resume-checked" value="all" id="all" checked="">
            <label for="all" class="switch-label switch-label-on">全部</label>
            <span class="switch-selection"></span>
          </div>
          </div>
      </div>
    </div>
  </div>

  <div class="myr_myresume_l mrcenter">
    <div class="myr_content">
      <div class="myr_w760">
        <div id="myInfo" class="myr_contrainer">
          <h2 class="myr_title">基本资料 <?php print_r(count(array_filter($resume_info[0])))?>/<?php print_r(count($resume_info[0]))?><a href="<?php echo U('testresume');?>" class="myr-font icon-edit"></i></a></h2>
         <!--  <?php var_dump($info)?> -->
          <div class="mr_baseinfo">
            <table class="myr_tb">
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($info['realname'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>姓名: <?php echo ($info["realname"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['birthday'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>出生日期: <?php echo ($info["birthday"]); ?></td>
                <td <?php if(empty($info['sex'])): ?>class="empty"<?php else: ?> class="filled"<?php endif; ?>>性别: <?php echo ($info["sex"]); ?></td>
                <td <?php if(empty($info['height'])): ?>class="empty"<?php else: ?> class="filled"<?php endif; ?>>身高: <?php echo ($info["height"]); ?></td>
                <td <?php if(empty($info['weight'])): ?>class="empty"<?php else: ?> class="filled"<?php endif; ?>>体重: <?php echo ($info["weight"]); ?></td>
                <td <?php if(empty($info['nativeplace'])): ?>class="empty"<?php else: ?> class="filled"<?php endif; ?>>籍贯: <?php echo ($info["nativeplace"]); ?></td>
                <td <?php if(empty($info['nation'])): ?>class="empty"<?php else: ?> class="filled"<?php endif; ?>>民族: <?php echo ($info["nation"]); ?></td>
              </tr>
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($info['phone'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>手机号:<?php echo ($info["phone"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['tel'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>固定电话:<?php echo ($info["tel"]); ?></td>
                <td colspan="3" class="col_3 <?php if(empty($info['email'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>邮件:<?php echo ($info["email"]); ?></td>
                <td <?php if(empty($info['nation'])): ?>class="empty"<?php else: ?>class="filled"<?php endif; ?>>婚姻状况:<?php echo ($info["maritalstatus"]); ?></td>
              </tr>
              <tr class="lowUseRow">
                <td colspan="2" class="col_2 <?php if(empty($info['national'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>国籍: <?php echo ($info["national"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['wx_name'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>微信: <?php echo ($info["wx_name"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['qq_name'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>QQ: <?php echo ($info["qq_name"]); ?></td>
                <td colspan="3" class="col_2 <?php if(empty($info['sina_name'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>微博: <?php echo ($info["sina_name"]); ?></td>
              </tr>
              <tr class="lowUseRow">
                <td colspan="4" class="col_4 <?php if(empty($info['idcardtype'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>证件类型及号码: <?php echo ($info["idcardtype"]); ?>,<?php echo ($info["idcard"]); ?></td>
                <td colspan="5" class="col_3 <?php if(empty($info['profile'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>个人主页: <?php echo ($info["profile"]); ?></td>
              </tr>
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($info['zip'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>邮政编码: <?php echo ($info["zip"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['politicalstatus'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>政治面貌: <?php echo ($info["politicalstatus"]); ?></td>
                <td colspan="5" class="col_2 <?php if(empty($info['live_address'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>联系地址: <?php echo ($info["live_address"]); ?></td>
              </tr>
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($info['live_city'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>现居住城市: <?php echo ($info["live_city"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['hukou_city'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>入学前户口: <?php echo ($info["hukou_city"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['hukou_city_now'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>当前户口: <?php echo ($info["hukou_city_now"]); ?></td>
                <td colspan="3" class="col_2 <?php if(empty($info['expect_city'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>期望工作城市: <?php echo ($info["expect_city"]); ?></td>
              </tr>
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($info['graduate_time'])): ?>mpty"<?php else: ?> filled"<?php endif; ?>>预计毕业时间: <?php echo ($info["graduate_time"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['edu'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>最高学历: <?php echo ($info["edu"]); ?></td>
                <td colspan="5" class="col_5 <?php if(empty($info['edu_type'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>教育类型: <?php echo ($info["edu_type"]); ?></td>
              </tr>
               <tr>
                <td colspan="2" class="col_2 <?php if(empty($info['contact_name'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>紧急联系人: <?php echo ($info["contact_name"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['contact_phone'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>紧急联系电话: <?php echo ($info["contact_phone"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['fm_name'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>家庭成员-姓名: <?php echo ($info["fm_name"]); ?></td>
                <td colspan="3" class="col_3 <?php if(empty($info['fm_work'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>家庭成员-工作单位: <?php echo ($info["fm_work"]); ?></td>
              </tr>
               <tr>
                <td colspan="4" class="col_2 <?php if(empty($info['fm_phone'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>家庭成员-联系电话: <?php echo ($info["fm_phone"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($info['fm_relation'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>家庭成员-关系: <?php echo ($info["fm_relation"]); ?></td>
                <td colspan="3" class="col_3 <?php if(empty($info['fm_position'])): ?>empty"<?php else: ?> filled"<?php endif; ?>>家庭成员-职务: <?php echo ($info["fm_position"]); ?></td>
         
              </tr>
            </table>

          </div>
        </div>

<!-- 教育经历 -->   
        <?php if(!empty($edu_list)): ?><div id="educationalBackground"  class="myr_contrainer">
          <h2 class="myr_title">教育经历 <?php $edu_num= count($edu_list);for ($i=0; $i < $edu_num ; $i++) { $edu_arr[$i] = count(array_filter($edu_list[$i])); } $edu_num =$edu_num*3; $edu_arr = array_sum($edu_arr);print_r($edu_arr-$edu_num);?>/<?php $edu_tnum = count($edu_list, true); $edu_tarr = 9*count($edu_list); print_r($edu_tnum-$edu_tarr);?><a href="<?php echo U('testresume#section-underline-2');?>" class="myr-font icon-edit"></i></a></h2>
           <?php if(is_array($edu_list)): $i = 0; $__LIST__ = $edu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="4" class="col_4 <?php if(empty($v['schoolName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>学校: <?php echo ($v["schoolName"]); ?></td>
                <td colspan="3" class="col_3 <?php if(empty($v['academy'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>院系: <?php echo ($v["academy"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['education'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>学历: <?php echo ($v["education"]); ?></td>
              </tr>
              <tr>
                <td colspan="4" class="col_4 <?php if(empty($v['professional'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>专业: <?php echo ($v["professional"]); ?></td>
                <td colspan="5" class="lowUseCell col_5 <?php if(empty($v['school_city'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>学校所在城市: <?php echo ($v["school_city"]); ?></td>
              </tr>
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($v['startYear'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>入学时间: <?php echo ($v["startYear"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['degree'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>学位: <?php echo ($v["degree"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['endYear'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>毕业时间: <?php echo ($v["endYear"]); ?></td>
                 <td colspan="3" class="col_3 <?php if(empty($v['professional_ranking'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>所在专业排名: <?php echo ($v["professional_ranking"]); ?></td>
              </tr>
              <tr>  
               <td colspan="2" class="col_2 <?php if(empty($v['class_ranking'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>班级排名: <?php echo ($v["class_ranking"]); ?></td>
                <td colspan="2" class="lowUseCell col_2 <?php if(empty($v['tutor_name'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>导师姓名: <?php echo ($v["tutor_name"]); ?></td>
                <td colspan="2" class="lowUseCell col_2 <?php if(empty($v['tutor_phone'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>导师联系方式: <?php echo ($v["tutor_phone"]); ?></td>
                <td colspan="3" class="lowUseCell col_3 <?php if(empty($v['gpa_score'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>GPA(4分制): <?php echo ($v["gpa_score"]); ?></td>
              </tr>
            </table>
            <div class="des-contrainer <?php if(empty($v['major'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['major'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>主修课程:</h5><?php echo ($v["major"]); ?></div>
             <div class="des-contrainer <?php if(empty($v['professional_describe'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['professional_describe'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>专业描述:</h5><?php echo ($v["professional_describe"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?> 

<!-- 工作经历 -->  
        <?php if(!empty($exp_list)): ?><div id="workExperience"  class="myr_contrainer">
          <h2 class="myr_title">工作经历 <?php $exp_num= count($exp_list);for ($i=0; $i < $exp_num ; $i++) { $exp_arr[$i] = count(array_filter($exp_list[$i])); } $exp_num =$exp_num*2; $exp_arr = array_sum($exp_arr);print_r($exp_arr-$exp_num);?>/<?php $exp_tnum = count($exp_list, true); $exp_tarr = 6*count($exp_list); print_r($exp_tnum-$exp_tarr);?><a href="<?php echo U('testresume#section-underline-3');?>" class="myr-font icon-edit"></i></a></h2>
           <?php if(is_array($exp_list)): $i = 0; $__LIST__ = $exp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="3" class="col_3 <?php if(empty($v['companyName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>工作单位: <?php echo ($v["companyName"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['positionName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>工作职位: <?php echo ($v["positionName"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['work_cat'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>工作性质: <?php echo ($v["work_cat"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['work_city'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>工作城市: <?php echo ($v["work_city"]); ?></td>
              </tr>
              <tr>
                <td colspan="3" class="col_3 <?php if(empty($v['department'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>所在部门: <?php echo ($v["department"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['company_property'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>单位性质: <?php echo ($v["company_property"]); ?></td>
                <td colspan="4" class="col_4 <?php if(empty($v['company_size'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>公司规模: <?php echo ($v["company_size"]); ?></td>
              </tr>
              <tr>
                <td colspan="3" class="col_3 <?php if(empty($v['company_cat'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>行业类别: <?php echo ($v["company_cat"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['startDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>开始时间: <?php echo ($v["startDate"]); ?></td>
                <td colspan="4" class="col_4 <?php if(empty($v['endDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>结束时间: <?php echo ($v["endDate"]); ?></td>
              </tr>
              <tr class="lowUseRow">  
               <td colspan="3" class="col_3 <?php if(empty($v['reasons'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>离职原因: <?php echo ($v["reasons"]); ?></td>
                <td colspan="5" class="col_5 <?php if(empty($v['salary_month'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>职位月薪(税前): <?php echo ($v["salary_month"]); ?></td>
                
              </tr>
               <tr class="lowUseRow">  
               <td colspan="2" class="col_2 <?php if(empty($v['reterence_name'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>证明人姓名: <?php echo ($v["reterence_name"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['reterence_company'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>证明人关系: <?php echo ($v["reterence_company"]); ?></td>
                 <td colspan="5" class="col_5 <?php if(empty($v['reterence_company'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>证明人单位: <?php echo ($v["reterence_company"]); ?></td>
              </tr>
               <tr class="lowUseRow">  
               <td colspan="2" class="col_2 <?php if(empty($v['reterence_position'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>证明人职位: <?php echo ($v["reterence_position"]); ?></td>
                <td colspan="5" class="col_5 <?php if(empty($v['reterence_phone'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>证明人联系方式: <?php echo ($v["reterence_phone"]); ?></td>
                
              </tr>
            </table>
            <div class="des-contrainer <?php if(empty($v['workContent'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['workContent'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>职责描述:</h5><?php echo ($v["workContent"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?> 
 <!-- 项目经验 -->   
      <?php if(!empty($pro_list)): ?><div id="projectExperience"  class="myr_contrainer">
          <h2 class="myr_title">项目经历 <?php $pro_num= count($pro_list);for ($i=0; $i < $pro_num ; $i++) { $pro_arr[$i] = count(array_filter($pro_list[$i])); } $pro_num =$pro_num*2; $pro_arr = array_sum($pro_arr);print_r($pro_arr-$pro_num);?>/<?php $pro_tnum = count($pro_list, true); $pro_tarr = 6*count($pro_list); print_r($pro_tnum-$pro_tarr);?> <a href="<?php echo U('testresume#section-underline-4');?>" class="myr-font icon-edit"></i></a></h2>
           <?php if(is_array($pro_list)): $i = 0; $__LIST__ = $pro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="4" class="col_4 <?php if(empty($v['projectName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>项目名称: <?php echo ($v["projectName"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['positionName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>项目职位: <?php echo ($v["positionName"]); ?></td>
                <td colspan="3" class="lowUseCell col_3 <?php if(empty($v['projectNumber'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>项目人数: <?php echo ($v["projectNumber"]); ?></td>
              </tr>
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($v['startDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>开始时间: <?php echo ($v["startDate"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['endDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>结束时间: <?php echo ($v["endDate"]); ?></td>
                <td colspan="2" class="lowUseCell col_2 <?php if(empty($v['reterenceName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>证明人姓名: <?php echo ($v["reterenceName"]); ?></td>
                <td colspan="3" class="lowUseCell col_3 <?php if(empty($v['reterencePhone'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>证明人联系方式: <?php echo ($v["reterencePhone"]); ?></td>
              </tr>
            </table>
            <div class="des-contrainer <?php if(empty($v['projectDuty'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['projectDuty'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>项目职责:</h5><?php echo ($v["projectDuty"]); ?></div>
            <div class="des-contrainer <?php if(empty($v['projectRemark'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['projectRemark'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>项目描述:</h5><?php echo ($v["projectRemark"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?> 
  <!-- 培训经历 --> 
      <?php if(!empty($training_list)): ?><div id="trainingExperience"  class="myr_contrainer">
          <h2 class="myr_title">培训经历 <?php $trainingexperience_num= count($training_list);for ($i=0; $i < $trainingexperience_num ; $i++) { $trainingexperience_arr[$i] = count(array_filter($training_list[$i])); } $trainingexperience_num =$trainingexperience_num*1; $trainingexperience_arr = array_sum($trainingexperience_arr);print_r($trainingexperience_arr-$trainingexperience_num);?>/<?php $trainingexperience_tnum = count($training_list, true); $trainingexperience_tarr = 2*count($training_list); print_r($trainingexperience_tnum-$trainingexperience_tarr);?><a href="<?php echo U('testresume#section-underline-5');?>" class="myr-font icon-edit"></i></a></h2>
           <?php if(is_array($training_list)): $i = 0; $__LIST__ = $training_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="4" class="col_4 <?php if(empty($v['trainingName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>培训名称: <?php echo ($v["trainingName"]); ?></td>
                <td colspan="5" class="col_5 <?php if(empty($v['trainingCompany'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>培训机构: <?php echo ($v["trainingCompany"]); ?></td>
              </tr>
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($v['startDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>开始时间: <?php echo ($v["startDate"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['endDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>结束时间: <?php echo ($v["endDate"]); ?></td>
                <td colspan="2" class="lowUseCell col_2 <?php if(empty($v['trainingPlace'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>培训地点: <?php echo ($v["trainingPlace"]); ?></td>
                <td colspan="3" class="col_3 <?php if(empty($v['certificateName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>获得证书: <?php echo ($v["certificateName"]); ?></td>
              </tr>
            </table>
            <div class="des-contrainer <?php if(empty($v['trainingDes'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['trainingDes'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>培训内容:</h5><?php echo ($v["trainingDes"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?> 
  <!-- 在校实践 -->   
        <?php if(!empty($practice_list)): ?><div id="trainingExperience"  class="myr_contrainer">
          <h2 class="myr_title">在校实践 <?php $practice_num= count($practice_list);for ($i=0; $i < $practice_num ; $i++) { $practice_arr[$i] = count(array_filter($practice_list[$i])); } $practice_num =$practice_num*2; $practice_arr = array_sum($practice_arr);print_r($practice_arr-$practice_num);?>/<?php $practice_tnum = count($practice_list, true); $practice_tarr = 6*count($practice_list); print_r($practice_tnum-$practice_tarr);?><a href="<?php echo U('testresume#section-underline-6');?>" class="myr-font icon-edit"></i></a></h2>
           <?php if(is_array($practice_list)): $i = 0; $__LIST__ = $practice_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="4" class="col_4 <?php if(empty($v['praCompanyName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>实践单位: <?php echo ($v["praCompanyName"]); ?></td>
                <td colspan="5" class="col_5 <?php if(empty($v['practicePosition'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>实践职位: <?php echo ($v["practicePosition"]); ?></td>
              </tr>
              <tr>
                <td colspan="2" class="col_2 <?php if(empty($v['startDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>开始时间: <?php echo ($v["startDate"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['endDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>结束时间: <?php echo ($v["endDate"]); ?></td>
                <td colspan="5" ></td>
              </tr>
            </table>
            <div class="des-contrainer <?php if(empty($v['practiceDuty'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['practiceDuty'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>实践职责:</h5><?php echo ($v["practiceDuty"]); ?></div>
            <div class="des-contrainer <?php if(empty($v['practiceDes'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['practiceDes'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>实践经历描述:</h5><?php echo ($v["practiceDes"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?>                     
<!-- 社团经验 -->    
        <?php if(!empty($schoolclub_list)): ?><div id="schoolClubExperience"  class="myr_contrainer">
          <h2 class="myr_title">社团经验 <?php $schoolclub_num= count($schoolclub_list);for ($i=0; $i < $schoolclub_num ; $i++) { $schoolclub_arr[$i] = count(array_filter($schoolclub_list[$i])); } $schoolclub_num =$schoolclub_num*1; $schoolclub_arr = array_sum($schoolclub_arr);print_r($schoolclub_arr-$schoolclub_num);?>/<?php $schoolclub_tnum = count($schoolclub_list, true); $schoolclub_tarr = 2*count($schoolclub_list); print_r($schoolclub_tnum-$schoolclub_tarr);?><a href="<?php echo U('testresume#section-underline-7');?>" class="myr-font icon-edit"></i></a></h2>  
           <?php if(is_array($schoolclub_list)): $i = 0; $__LIST__ = $schoolclub_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="5" class="col_5 <?php if(empty($v['schClubName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>社团名称: <?php echo ($v["schClubName"]); ?></td>
                <td colspan="4" ></td>
              </tr>
              <tr>
              <td colspan="2" class="col_2 <?php if(empty($v['schClubLevel'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>社团等级: <?php echo ($v["schClubLevel"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['endDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>担任职务: <?php echo ($v["endDate"]); ?></td>
                <td colspan="2" class="col_2 <?php if(empty($v['startDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>开始时间: <?php echo ($v["startDate"]); ?></td>
                <td colspan="3" class="col_2 <?php if(empty($v['endDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>结束时间: <?php echo ($v["endDate"]); ?></td>
              </tr>
            </table>
            <div class="des-contrainer <?php if(empty($v['workDes'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['workDes'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>工作职责:</h5><?php echo ($v["workDes"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?>
  <!-- 获奖经验 -->     
      <?php if(!empty($schoolawards_list)): ?><div id="schoolAwardsExperience"  class="myr_contrainer">
          <h2 class="myr_title">获奖经验 <?php $schoolawards_num= count($schoolawards_list);for ($i=0; $i < $schoolawards_num ; $i++) { $schoolawards_arr[$i] = count(array_filter($schoolawards_list[$i])); } $schoolawards_num =$schoolawards_num*1; $schoolawards_arr = array_sum($schoolawards_arr);print_r($schoolawards_arr-$schoolawards_num);?>/<?php $schoolawards_tnum = count($schoolawards_list, true); $schoolawards_tarr = 2*count($schoolawards_list); print_r($schoolawards_tnum-$schoolawards_tarr);?><a href="<?php echo U('testresume#section-underline-8');?>" class="myr-font icon-edit"></i></a></h2>
           <?php if(is_array($schoolawards_list)): $i = 0; $__LIST__ = $schoolawards_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="4" class="col_4 <?php if(empty($v['awardsName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>获奖名称: <?php echo ($v["awardsName"]); ?></td>
                 <td colspan="5" class="col_5 <?php if(empty($v['awardsType'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>获奖类型: <?php echo ($v["awardsType"]); ?></td>
              </tr>
              <tr>
               <td colspan="4" class="col_4 <?php if(empty($v['awardsDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>获奖时间: <?php echo ($v["awardsDate"]); ?></td>
                 <td colspan="5" class="col_5 <?php if(empty($v['awardsLevel'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>获奖等级: <?php echo ($v["awardsLevel"]); ?></td>
              </tr>
            </table>
            <div class="des-contrainer <?php if(empty($v['awardsDes'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['awardsDes'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>获奖描述:</h5><?php echo ($v["awardsDes"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?>                      
   <!-- 语言能力 -->        
        <div id="langSkillExperience"  class="myr_contrainer">
          <h2 class="myr_title">语言能力<a href="<?php echo U('testresume#section-underline-');?>" class="myr-font icon-edit"></i></a></h2>
           <?php if(is_array($schoolawards_list)): $i = 0; $__LIST__ = $schoolawards_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="4" class="col_4 <?php if(empty($v['awardsName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>大学英语等级: <?php echo ($v["awardsName"]); ?></td>
                 <td colspan="5" class="col_5 <?php if(empty($v['awardsType'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>成绩: <?php echo ($v["awardsType"]); ?></td>
              </tr>
              <tr>
               <td colspan="4" class="col_4 <?php if(empty($v['awardsDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>其他英语考试: <?php echo ($v["awardsDate"]); ?></td>
                 <td colspan="5" class="col_5 <?php if(empty($v['awardsLevel'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>成绩: <?php echo ($v["awardsLevel"]); ?></td>
              </tr>
               <tr>
               <td colspan="3" class="col_3 <?php if(empty($v['awardsDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>其他外语: <?php echo ($v["awardsDate"]); ?></td>
               <td colspan="2" class="col_2 <?php if(empty($v['awardsLevel'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>掌握程度: <?php echo ($v["awardsLevel"]); ?></td>
               <td colspan="2" class="col_2 <?php if(empty($v['awardsLevel'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>听说能力: <?php echo ($v["awardsLevel"]); ?></td>
               <td colspan="2" class="col_2 <?php if(empty($v['awardsLevel'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>读写能力: <?php echo ($v["awardsLevel"]); ?></td>
              </tr>
            </table><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>     
  <!-- 已获证书 -->  
        <?php if(!empty($certificate_list)): ?><div id="certificateExperience"  class="myr_contrainer">
          <h2 class="myr_title">已获证书 <?php print_r(count(array_filter($otherinfo_list[0]))-1)?>/<?php print_r(count($otherinfo_list[0])-1)?><a href="<?php echo U('testresume#section-underline-10');?>" class="myr-font icon-edit"></i></a></h2>    
           <?php if(is_array($certificate_list)): $i = 0; $__LIST__ = $certificate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table class="myr_tb">
              <tr>
                <td colspan="4" class="col_4 <?php if(empty($v['certificateName'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>证书名称: <?php echo ($v["certificateName"]); ?></td>
                 <td colspan="2" class="col_2 <?php if(empty($v['getDate'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>获得时间: <?php echo ($v["getDate"]); ?></td>
                 <td colspan="3" class="col_3 <?php if(empty($v['issuing'])): ?>empty"<?php else: ?>filled"<?php endif; ?>>颁发机构: <?php echo ($v["issuing"]); ?></td>
              </tr>
            </table>
            <div class="des-contrainer <?php if(empty($v['certificateDes'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['certificateDes'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>证书描述:</h5><?php echo ($v["certificateDes"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?>            
  <!-- 其他信息 -->   
        <?php if(!empty($otherinfo_list)): ?><div id="otherInfoExperience"  class="myr_contrainer">
          <h2 class="myr_title <?php if(empty($v['certificateDes'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>其他信息<a href="<?php echo U('testresume#section-underline-11');?>" class="myr-font icon-edit"></i></a></h2>
           <?php if(is_array($otherinfo_list)): $i = 0; $__LIST__ = array_slice($otherinfo_list,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="des-contrainer <?php if(empty($v['selfIntro'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['selfIntro'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>自我评价:</h5><?php echo ($v["selfIntro"]); ?></div>
              <div class="des-contrainer <?php if(empty($v['hobbies'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['hobbies'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>爱好特长:</h5><?php echo ($v["hobbies"]); ?></div>
              <div class="des-contrainer <?php if(empty($v['skill'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['skill'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>其他技能:</h5><?php echo ($v["skill"]); ?></div>
              <div class="des-contrainer <?php if(empty($v['achievement'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['achievement'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>个人成就:</h5><?php echo ($v["achievement"]); ?></div>
              <div class="des-contrainer <?php if(empty($v['profile'])): ?>empty"<?php else: ?>des-filled"<?php endif; ?>><h5 class="sub-title <?php if(empty($v['profile'])): ?>des-empty"<?php else: ?>"<?php endif; ?>>个人简介:</h5><?php echo ($v["profile"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?>  
    </div>
  </div>
  </div>
</div>
</body>
<script type="text/javascript">
function checkChange() {
    var changestatu = 0;
    var rechecked = $("input[name='resume-checked']:checked").val();
      if(rechecked == "all"){
        // $(".lowUseRow").animate({ opacity:1},600,function(){$(this).css({display:"table-row"})});
        // $(".lowUseCell").animate({ opacity:1},600,function(){$(this).css({display:"table-cell"})});
        $(".lowUseRow").fadeIn();
        $(".lowUseCell").fadeIn();
        changestatu = 1;
      }else{
       //  $(".lowUseRow").animate({ opacity:0},600,function(){$(this).css({display:"none"})});
       // $(".lowUseCell").animate({ opacity:0},600,function(){$(this).css({display:"none"})}); 
        $(".lowUseRow").fadeOut();
        $(".lowUseCell").fadeOut();
        changestatu = 2;
      }
      return changestatu;
}
function fillChange() {
      var changestatu =checkChange();
      //alert(changestatu);

      var fill = $("input[name=fill]:checked").val();
      if (changestatu=="1") {
          if(fill == "all"){
            $(".filled").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            $(".des-filled").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            $(".empty").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
       
            // $(".filled").css("display","table-cell");
            // $(".des-filled").css("display","block");
            //$(".empty").animate({ opacity:1},600,function(){$(this).css({disvisibilityplay:"visible"})});
          
            clearHideFill();
          }else if(fill == "filled"){
            // $(".filled").css("display","table-cell");
            // $(".des-filled").css("display","block");
            //  $(".empty").animate({ opacity:0},600,function(){$(this).css({disvisibilityplay:"hidden"})});
            // clearHideFill();
            clearHideFill();
            $(".filled").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            $(".des-filled").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            $(".empty").animate({ opacity:0},600,function(){$(this).css({visibility:"hidden"})});
            hideEmpty();
          }else if (fill == "empty"){
            clearHideFill();
            $(".filled").animate({ opacity:0},600,function(){$(this).css({visibility:"hidden"})});
            $(".des-filled").animate({ opacity:0},600,function(){$(this).css({visibility:"hidden"})});
            $(".empty").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            hideFill();
          }
      }else if (changestatu=="2") {
          if(fill == "all"){
            
            $(".filled").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            $(".des-filled").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            $(".empty").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            clearHideFill();
          }else if(fill == "filled"){
            clearHideFill();
            $(".filled").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            $(".des-filled").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            $(".empty").animate({ opacity:0},600,function(){$(this).css({visibility:"hidden"})});
            hideEmpty();
          }else if (fill == "empty" && changestatu == "2"){
            //alert("emptychangestatu2")
            clearHideFill();
            $(".filled").animate({ opacity:0},600,function(){$(this).css({visibility:"hidden"})});
            $(".des-filled").animate({ opacity:0},600,function(){$(this).css({visibility:"hidden"})});
            $(".empty").animate({ opacity:1},600,function(){$(this).css({visibility:"visible"})});
            hideFill();
            
          }
          $(".lowUseRow").css("display","none");
          $(".lowUseCell").css("display","none");
      }
      
      
}
function hideFill(){
   var changestatu =checkChange();
   $('.myr_tb tr').each(function () {    
        var len ="";
        var counter = 0;
        var classname ="";
        len = $(this).children('td').length;
         $(this).children('td').each(function () {    
            var classname = $(this).attr('class') || '';
              if (classname.indexOf("filled")>=0) {
                counter++;
              } 
         });
         if (len === counter) {
           $(this).fadeOut();
         }else{
          //$(this).css("display","table-row");
         }
      });
    $('.des-contrainer').each(function () { 
        var desclassname = $(this).attr('class') || '';
          if (desclassname.indexOf("filled")>=0) {
            $(this).fadeOut();
          } 
     });
}
function hideEmpty(){
 
   var changestatu =checkChange();
   $('.myr_tb tr').each(function () {    
        var len ="";
        var counter = 0;
        var classname ="";
        len = $(this).children('td').length;
         $(this).children('td').each(function () {    
            var classname = $(this).attr('class') || '';
              if (classname.indexOf("empty")>=0) {
                counter++;
              } 
         });
         if (len === counter) {
           $(this).fadeOut();
         }else{
          //$(this).css("display","table-row");
         }
      });

    $('.des-contrainer').each(function () { 
        var desclassname = $(this).attr('class') || '';
          if (desclassname.indexOf("empty")>=0) {
            $(this).fadeOut();
          } 
     });
}
function clearHideFill(){
  $('.myr_tb tr').each(function () { 
    $(this).css("display","table-row");
  });
  $('.des-contrainer').each(function () { 
    $(this).fadeIn();
  });
}

$(document).ready(function() {
    $("input[name=resume-checked]").click(function(){
      checkChange();
      fillChange();
     });

    $("input[name=fill]").click(function(){
      
      fillChange();
    });

     $("#resumeCompelete").sticky({topSpacing:0});
  });

</script>

</html>