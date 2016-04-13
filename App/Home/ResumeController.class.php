<?php
namespace Home\Controller;
use User\Api\UserApi;
#use Common\Api\ImageResize;
/**
 * 与我的资料、简历完善、公司资料有关
 */
class ResumeController extends UserController {
    
    function __construct(){
        parent::__construct();
        $this->assign("cur_top_nav",array("resume"=>'class="current"') );
    }

      //缓存
    public function cache(){

        $data = $all = $hot = $temp = array();
        $list = M("School")->where(array('status'=>1))->group("cid")->select();
        foreach ($list as $k=>$v){

            $sub = array();//,'status'=>1
            $slist = M("School")->where(array('cid'=>$v['cid']))->order("sort asc,sid asc")->select();
            foreach ($slist as $kk=>$vv){

                $all[$vv['sid']] = $sub_temp = array(
                    'sid'=>$vv['sid'],
                    'cid'=>$vv['cid'],
                    'name'=>$vv['name'],
                    'status'=>$vv['status'],
                    'type'=>$vv['type'],                    
                    'ishot'=>$vv['ishot'],
                    'sort'=>$vv['sort'],
                );

                $sub[$vv['sid']] = $sub_temp;

                if($vv['ishot']){
                    $hot[$vv['sid']] = $sub_temp;
                }

            }

            $data[$v['cid']] = array(
                'cid'=>$v['cid'],
                'pid'=>$v['pid'],
                'name'=>getPlaceById($v['cid']),
                'sub'=>$sub,
            );

        }

        //F("webCategory",$data);

        $filename       =   DATA_PATH . 'citySchool.php';
        $str='<?php return ' . var_export($data,true) . '; ?>';
        file_put_contents($filename, $str);

        $filename       =   DATA_PATH . 'AllSchool.php';
        $str='<?php return ' . var_export($all,true) . '; ?>';
        file_put_contents($filename, $str);

        $filename       =   DATA_PATH . 'hotSchool.php';
        $str='<?php return ' . var_export($hot,true) . '; ?>';
        file_put_contents($filename, $str);

        $this->success('缓存成功！');
    }

	
    //完善个人信息或企业信息
    public function basic() {
        $this->redirect(WEB_URL.'User/myresume');
    }
    
    //完善个人信息或企业信息
    public function myresume() {
 
        $this->checkUser() ;
        $uid = $this->uid;
		
		$this->assign(array(
            'otherResume'=>getMyUploadResume($this->uid),
            'resumeCount'=>getResumeCount($this->uid),
        ));
		
    
        $myinfo = $this->getUsersInfoById($uid);        	
        if(!$uid||!$myinfo){
            $this->error("请勿非法访问！",WEB_URL."User/login");
        }
        else if($myinfo['type']==1){
            $this->redirect("/Company/cinfo");
            exit;
        }
        $type = intval($_GET['type']);
        $maps = array();
        $uid = $this->uid;
         
        $info = $myinfo;//$this->getUsersInfoById($uid);
        if(!$info){
            $this->error("请勿非法访问");
        }
         
        $model = M("resume");
        $map = array('uid'=>$uid);        
         
        /* if($type==2){
            //我收到的简历
            $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
    	} */
        
        //我的简历
        $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        
        $rili = getYMD(1960,2000);
        $year = getYear(1960,2000);
        //rsort($year);
         
        if(!$info['resume_name']){
            $info['resume_name'] = $info['realname']."的简历";
        }
         
        $province_city = require DATA_PATH.'/province_city.php';
        $hotcity = require DATA_PATH.'/hotcity.php';
        
        $info['resume_score'] = getResumeScore($info);

        //print_test(getMyUploadResume($uid));
        
        $array = array(
            'info'=>$info,
            'exp_list'=>getUsersWorkExperience($uid),
            'edu_list'=>getUsersEduExperience($uid),
            'pro_list'=>getUsersProExperience($uid),
            'work_list'=>getUsersWorks($uid),
            'skill_list'=>getUsersSkill($uid),
            'custom_model'=>getUserDefine($uid),
            'step_info'=>getResumeStepNext($info),
            'otherResume'=>getMyUploadResume($uid),

            'list'=>$list,
            "year"=>$year,
            "month"=>$rili[2],
            "day"=>$rili[3],
			"c_menu"=>array("resume"=>'class="current"'),
			'is_sub'=>M("Subscribe")->where(array('uid'=>$uid))->count(),
            
            'province_city'=>$province_city,
            'hotcity'=>$hotcity,
	   );
        
       // print_test($array);
       
        $this->assign($array);
        
        if($myinfo['type']==1){
             
            /* $this->assign("c_menu",array("company"=>'class="current"'));
            $this->assign('myinfo',$myinfo);
            $this->display("step1"); */
        
        }
        else{
             
            $this->display();
        
        }
    
    }

    public function myResumePreview() {
        $this->checkUser();
        $uid = $this->uid;
        
        $this->assign(array(
            'otherResume'=>getMyUploadResume($this->uid),
            'resumeCount'=>getResumeCount($this->uid),
        ));
        
    
        $myinfo = $this->getUsersInfoById($uid);            
        if(!$uid||!$myinfo){
            $this->error("请勿非法访问！",WEB_URL."User/login");
        }
        else if($myinfo['type']==1){
            $this->redirect("/Company/cinfo");
            exit;
        }
        $type = intval($_GET['type']);
        $maps = array();
        $uid = $this->uid;
         
        $info = $myinfo;//$this->getUsersInfoById($uid);
        if(!$info){
            $this->error("请勿非法访问");
        }
         
        $model = M("resume");
        $map = array('uid'=>$uid);        
         
        /* if($type==2){
            //我收到的简历
            $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        } */
        
        //我的简历
        $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        
        $rili = getYMD(1960,2000);
        $year = getYear(1960,2000);
        //rsort($year);
         
        if(!$info['resume_name']){
            $info['resume_name'] = $info['realname']."的简历";
        }
         
        $province_city = require DATA_PATH.'/province_city.php';
        $hotcity = require DATA_PATH.'/hotcity.php';
        
        $info['resume_score'] = getResumeScore($info);

        //print_test(getMyUploadResume($uid));
        
        $array = array(
            'info'=>$info,
            'exp_list'=>getUsersWorkExperience($uid),
            'edu_list'=>getUsersEduExperience($uid),
            'pro_list'=>getUsersProExperience($uid),
            'work_list'=>getUsersWorks($uid),
            'skill_list'=>getUsersSkill($uid),
            'custom_model'=>getUserDefine($uid),
            'step_info'=>getResumeStepNext($info),
            'otherResume'=>getMyUploadResume($uid),
            'practice_list'=>getSchoolPractice($uid),
            'schoolclub_list'=>getUsersSchoolClub($uid),
            'schoolawards_list'=>getUsersSchoolAwards($uid),
            'certificate_list'=>getUsersCertificate($uid),
            'training_list'=>getUsersTrainingExperience($uid),
            'otherinfo_list'=>getUsersotherInfo($uid),
            'resume_info'=>getUsersResumeInfo($uid),

            'list'=>$list,
            "year"=>$year,
            "month"=>$rili[2],
            "day"=>$rili[3],
            "c_menu"=>array("resume"=>'class="current"'),
            'is_sub'=>M("Subscribe")->where(array('uid'=>$uid))->count(),
            
            'province_city'=>$province_city,
            'hotcity'=>$hotcity,
       );

        $all_num =array();
        $low_num = array();
        $alllist = getUsersAllInfo($uid);
        $low_num = getUsersEmptyInfo($uid);
        $this->assign('low_num',$low_num);
        $this->assign('alllist',$alllist);
       // print_test($array);
    
        $this->assign($array);
        $nationdata =M('Nation')->select();
        $this->assign('nationdata',$nationdata);
        $this->assign('city_arr',getAddress("json","all"));

        $sid  = I('get.sid',1); $this->assign('listinfo', array('pid'=>0,"cid"=>0,"status"=>1));
        if($myinfo['type']==1){
             
            /* $this->assign("c_menu",array("company"=>'class="current"'));
            $this->assign('myinfo',$myinfo);
            $this->display("step1"); */
        
        }
        else{
             
            $this->display('myResumePreview');
        }
        
        
    }

    public function editresume() {
        $this->checkUser() ;
        $uid = $this->uid;
        
        $this->assign(array(
            'otherResume'=>getMyUploadResume($this->uid),
            'resumeCount'=>getResumeCount($this->uid),
        ));
        
    
        $myinfo = $this->getUsersInfoById($uid);            
        if(!$uid||!$myinfo){
            $this->error("请勿非法访问！",WEB_URL."User/login");
        }
        else if($myinfo['type']==1){
            $this->redirect("/Company/cinfo");
            exit;
        }
        $type = intval($_GET['type']);
        $maps = array();
        $uid = $this->uid;
         
        $info = $myinfo;//$this->getUsersInfoById($uid);
        if(!$info){
            $this->error("请勿非法访问");
        }
         
        $model = M("resume");
        $map = array('uid'=>$uid);        
         
        /* if($type==2){
            //我收到的简历
            $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        } */
        
        //我的简历
        $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        
        $rili = getYMD(1960,2000);
        $year = getYear(1960,2000);
        //rsort($year);
         
        if(!$info['resume_name']){
            $info['resume_name'] = $info['realname']."的简历";
        }
         
        $province_city = require DATA_PATH.'/province_city.php';
        $hotcity = require DATA_PATH.'/hotcity.php';
        
        $info['resume_score'] = getResumeScore($info);

        //print_test(getMyUploadResume($uid));
        
        $array = array(
            'info'=>$info,
            'exp_list'=>getUsersWorkExperience($uid),
            'edu_list'=>getUsersEduExperience($uid),
            'pro_list'=>getUsersProExperience($uid),
            'work_list'=>getUsersWorks($uid),
            'skill_list'=>getUsersSkill($uid),
            'custom_model'=>getUserDefine($uid),
            'step_info'=>getResumeStepNext($info),
            'otherResume'=>getMyUploadResume($uid),
            'practice_list'=>getSchoolPractice($uid),
            'schoolclub_list'=>getUsersSchoolClub($uid),
            'schoolawards_list'=>getUsersSchoolAwards($uid),
            'certificate_list'=>getUsersCertificate($uid),
            'trainingexperience_list'=>getUsersTrainingExperience($uid),
            'otherinfo_list'=>getUsersotherInfo($uid),
            'resume_info'=>getUsersResumeInfo($uid),

            'list'=>$list,
            "year"=>$year,
            "month"=>$rili[2],
            "day"=>$rili[3],
            "c_menu"=>array("resume"=>'class="current"'),
            'is_sub'=>M("Subscribe")->where(array('uid'=>$uid))->count(),
            
            'province_city'=>$province_city,
            'hotcity'=>$hotcity,
       );

        $all_num =array();
        $low_num = array();
        $alllist = getUsersAllInfo($uid);
        $low_num = getUsersEmptyInfo($uid);
        $this->assign('low_num',$low_num);
        $this->assign('alllist',$alllist);
       // print_test($array);
    
        $this->assign($array);
        $nationdata =M('Nation')->select();
        $this->assign('nationdata',$nationdata);
        $this->assign('city_arr',getAddress("json","all"));

        $sid  = I('get.sid',1); $this->assign('listinfo', array('pid'=>0,"cid"=>0,"status"=>1));
        if($myinfo['type']==1){
             
            /* $this->assign("c_menu",array("company"=>'class="current"'));
            $this->assign('myinfo',$myinfo);
            $this->display("step1"); */
        
        }
        else{
             
            $this->display();
        
        }
    }

    public function singletest() {
        $this->checkUser() ;
        $uid = $this->uid;
        
        $this->assign(array(
            'otherResume'=>getMyUploadResume($this->uid),
            'resumeCount'=>getResumeCount($this->uid),
        ));
        
    
        $myinfo = $this->getUsersInfoById($uid);            
        if(!$uid||!$myinfo){
            $this->error("请勿非法访问！",WEB_URL."User/login");
        }
        else if($myinfo['type']==1){
            $this->redirect("/Company/cinfo");
            exit;
        }
        $type = intval($_GET['type']);
        $maps = array();
        $uid = $this->uid;
         
        $info = $myinfo;//$this->getUsersInfoById($uid);
        if(!$info){
            $this->error("请勿非法访问");
        }
         
        $model = M("resume");
        $map = array('uid'=>$uid);        
         
        /* if($type==2){
            //我收到的简历
            $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        } */
        
        //我的简历
        $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        
        $rili = getYMD(1960,2000);
        $year = getYear(1960,2000);
        //rsort($year);
         
        if(!$info['resume_name']){
            $info['resume_name'] = $info['realname']."的简历";
        }
         
        $province_city = require DATA_PATH.'/province_city.php';
        $hotcity = require DATA_PATH.'/hotcity.php';
        
        $info['resume_score'] = getResumeScore($info);

        //print_test(getMyUploadResume($uid));
        
        $array = array(
            'info'=>$info,
            'exp_list'=>getUsersWorkExperience($uid),
            'edu_list'=>getUsersEduExperience($uid),
            'pro_list'=>getUsersProExperience($uid),
            
            'list'=>$list,
            "year"=>$year,
            "month"=>$rili[2],
            "day"=>$rili[3],
            "c_menu"=>array("resume"=>'class="current"'),
            'is_sub'=>M("Subscribe")->where(array('uid'=>$uid))->count(),
            
            'province_city'=>$province_city,
            'hotcity'=>$hotcity,
       );
        
       // print_test($array);
    
        $this->assign($array);
        
        if($myinfo['type']==1){
             
            /* $this->assign("c_menu",array("company"=>'class="current"'));
            $this->assign('myinfo',$myinfo);
            $this->display("step1"); */
        
        }
        else{
             
            $this->display();
        
        }
    }

    public function customize(){
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
    
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }

        $Gongkai = M("Gongkai");
        // 按照id排序显示前5条记录
        $arr = $Gongkai->order('id desc')->select();
        $this->arr =   $arr;
        $this->display();


        // $customid = intval($_POST['customid']);
    
        // $data = array(
        //     'title'=>trim($_POST['title']),
        //     'content'=>trim($_POST['content']),
        //     'uid'=>$uid,
        //     //'createTime'=>time(),
        // );
         
        // if( !$data['title'] ){
            
        //     $this->ResumeJson(0,"请填写完整！");
        // }
        // else{
        //     if(!$customid){
        //         $customid = M("Gongkai")->add($data);
        //     }
        //     else {
        //         unset($data['uid']);
        //         unset($data['createTime']);
        //         M("Gongkai")->where( array('uid'=>$uid,'id'=>$customid) )->save($data);
        //     }
        //     return $data;
        //     $this->ResumeJson(1,"更新成功!",'customize');
        // }
        
        /*$m=M("Gongkai");
        $count      = $m->count();
        $Page       = new \Think\Page($count,20);//
        $show       = $Page->show();//
        $arr = $m->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign("arr",$arr);
        $this->assign('page',$show);// 赋值分页输出
        
        $this->display();*/
    }

    public function customizeedit(){
        // $username = $_POST['username'];
        // //正确的用户名由小写字母，数字和下划线组成
        // if(!eregi("^[a-z0-9_]+$", $username)){
        //     echo "用户名格式不正确！".$username;
        // } else {
        //     echo "恭喜，这是合法的用户名！";
        // }
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }
        $customid = intval($_POST['customid']);
        $data = array(
            'title'=>trim($_POST['title']),
            'content'=>trim($_POST['content']),
            //'createTime'=>time(),
        );
         
        if( !$data['title'] ){
            
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$customid){
                $customid = M("Gongkai")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("Gongkai")->where( array('uid'=>$uid,'id'=>$customid) )->save($data);
            }
            return $data;
            //$this->ResumeJson(1,"更新成功!",'customize');
        }
    }

    //完善个人信息或企业信息
    public function testmyresume() {
 
        $this->checkUser() ;
        $uid = $this->uid;
        
        $this->assign(array(
            'otherResume'=>getMyUploadResume($this->uid),
            'resumeCount'=>getResumeCount($this->uid),
        ));
        
        $myinfo = $this->getUsersInfoById($uid);            
        if(!$uid||!$myinfo){
            $this->error("请勿非法访问！",WEB_URL."User/login");
        }
        else if($myinfo['type']==1){
            $this->redirect("/Company/cinfo");
            exit;
        }
        $type = intval($_GET['type']);
        $maps = array();
        $uid = $this->uid;
         
        $info = $myinfo;//$this->getUsersInfoById($uid);
        if(!$info){
            $this->error("请勿非法访问");
        }
         
        $model = M("resume");
        $map = array('uid'=>$uid);        
         
        /* if($type==2){
            //我收到的简历
            $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        } */
        
        //我的简历
        $list = $model->table(C('DB_PREFIX')."resume r")->join(C('DB_PREFIX').
            "member m on r.uid = m.uid")->where("r.uid='$uid' ")->field(" r.*,m.username ")
            ->order(" r.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
        
        $rili = getYMD(1960,2000);
        $year = getYear(1960,2000);
        //rsort($year);
         
        if(!$info['resume_name']){
            $info['resume_name'] = $info['realname']."的简历";
        }
         
        $province_city = require DATA_PATH.'/province_city.php';
        $hotcity = require DATA_PATH.'/hotcity.php';
        
        $info['resume_score'] = getResumeScore($info);

        //print_test(getMyUploadResume($uid));
        
        $array = array(
            'info'=>$info,
            'exp_list'=>getUsersWorkExperience($uid),
            'edu_list'=>getUsersEduExperience($uid),
            'pro_list'=>getUsersProExperience($uid),
            'work_list'=>getUsersWorks($uid),
            'skill_list'=>getUsersSkill($uid),
            'custom_model'=>getUserDefine($uid),
            'step_info'=>getResumeStepNext($info),
            'otherResume'=>getMyUploadResume($uid),
            'list'=>$list,
            "year"=>$year,
            "month"=>$rili[2],
            "day"=>$rili[3],
            "c_menu"=>array("resume"=>'class="current"'),
            'is_sub'=>M("Subscribe")->where(array('uid'=>$uid))->count(),
            
            'province_city'=>$province_city,
            'hotcity'=>$hotcity,
       );
        
       // print_test($array);
        
        $this->assign($array);

        $nationdata=$this->getNation();
        $this->assign('nationdata',$nationdata);
   

        if($myinfo['type']==1){
             
            /* $this->assign("c_menu",array("company"=>'class="current"'));
            $this->assign('myinfo',$myinfo);
            $this->display("step1"); */
        
        }
        else{
             
            $this->display();
        
        }
    
    }

    
    //手机版资料完善
    function wapbasic(){
        
        $uid = $this->uid;
    
        $myinfo = $this->getUsersInfoById($uid);
        if(!$uid||!$myinfo){
            $this->error("请勿非法访问！",WEB_URL."User/login");
        }
        else if($myinfo['type']==1){
            $this->redirect("/Company/cinfo");
            exit;
        }
        
        $this->assign(array(
            'myinfo'=>$myinfo,
        ));
        
            
        $this->display("wapbasic");
    }

    //手机版资料完善
    function wapbasic_iframe(){
        
        $uid = $this->uid;
    
        $myinfo = $this->getUsersInfoById($uid);
        if(!$uid||!$myinfo){
            $this->error("请勿非法访问！",WEB_URL."User/login");
        }
        else if($myinfo['type']==1){
            $this->redirect("/Company/cinfo");
            exit;
        }
        
        $this->assign(array(
            'myinfo'=>$myinfo,
        ));
        
            
        $this->display("wapbasic_iframe");
    }
    
    //完善基本资料
    function basicPost(){
        //$this->checkResumeUserIsLogin();
        //$this->checkUser();
        if( isset($_POST) ){
            if($_GET['access'] == 1){
                $_POST = $_GET;
            }

            $data = array(
                'realname'=>trim($_POST['mr_name']),
                
                'birthday'=>trim($_POST['birthday']),
                
                'sex'=>trim($_POST['sex']),
                'edu'=>str_replace("最高学历", "", trim($_POST['highestEducation']) ),
                'email_jianli'=>trim($_POST['email']),
                
                'city'=>trim($_POST['liveCity']),      
                'zhuanye'=>trim($_POST['zhuanye']),
                'byxy'=>trim($_POST['byxy']),

                'english_name'=>trim($_POST['english_name']), 
                'height'=>trim($_POST['height']), 
                'weight'=>trim($_POST['weight']), 
                'wx_name'=>trim($_POST['wx_name']), 
                'qq_name'=>trim($_POST['qq_name']), 
                'sina_name'=>trim($_POST['sina_name']), 
                'tel'=>trim($_POST['tel']), 
                'profile'=>trim($_POST['profile']), 
                'idcardtype'=>str_replace("证件类型", "", trim($_POST['idcardtype']) ),
                'idcard'=>trim($_POST['idcard']), 

                'zip'=>trim($_POST['zip']),    
                'nativeplace'=>trim($_POST['nativeplace']),   
                'nativeplace_city'=>trim($_POST['nativeplace_city']),   
                   
                'nation'=>trim($_POST['nation']),    
                'national'=>trim($_POST['national']),    
                'politicalstatus'=>trim($_POST['politicalstatus']), 
                'maritalstatus'=>trim($_POST['maritalstatus']),  
                    
                'live_city'=>trim($_POST['live_city']), 
                'live_city_city'=>trim($_POST['live_city_city']),      
                'live_address'=>trim($_POST['live_address']),
                'contact_address'=>trim($_POST['contact_address']),  
                'edu'=>trim($_POST['edu']),   
                'edu_type'=>trim($_POST['edu_type']),   

                'graduate_time'=>trim($_POST['graduate_time']), 
                'hukou_city'=>trim($_POST['hukou_city']), 
                'hukou_city_city'=>trim($_POST['hukou_city_city']), 
                'hukou_city_now'=>trim($_POST['hukou_city_now']), 
                'hukou_city_now_city'=>trim($_POST['hukou_city_now_city']), 
                'expect_city'=>trim($_POST['expect_city']), 
                'expect_city_city'=>trim($_POST['expect_city_city']), 
                'contact_name'=>trim($_POST['contact_name']),    
                'fm_name'=>trim($_POST['fm_name']),    
                'contact_phone'=>trim($_POST['contact_phone']),    
                'fm_relation'=>trim($_POST['fm_relation']),    
                'fm_phone'=>trim($_POST['fm_phone']), 
                'fm_work'=>trim($_POST['fm_work']), 
                'fm_position'=>trim($_POST['fm_position']),      

                'phone'=>trim($_POST['phone']),                
                'workyear'=>trim($_POST['workYear']),              
                'status'=>100,
                //'p_shenfen'=>1,
                'update_time'=>time(),
                'score_jiben'=>getResumeStepScore('score_jiben'),
            );
            if($_POST['zhuanye']){
                $data['zhuanye'] = trim($_POST['zhuanye']);
            }
            if($_POST['byxy']){
                $data['byxy'] = trim($_POST['byxy']);
            }
            if($_POST['workyear']){
                $data['workyear'] = trim($_POST['workyear']);
            }
            if($_POST['workYear']){
                $data['workyear'] = trim($_POST['workYear']);
            }
            if($_POST['mt_ywname']){
                $data['english_name'] = trim($_POST['mt_ywname']);
            }
            if($_POST['mt_biryear']){
                $data['birth_day'] = trim($_POST['mt_biryear']) . '-' .trim($_POST['mt_birmonth']) . '-' .trim($_POST['mt_birday']);
            }
            if($_POST['mr_height']){
                $data['height'] = trim($_POST['mr_height']);
            }
            if($_POST['mt_id']){
                $data['idcard'] = trim($_POST['mt_id']);
            }
            if($_POST['mt_postadd']){
                $data['live_address'] = trim($_POST['mt_postadd']);
            }
            if($_POST['mt_jjlxr']){
                $data['contact_name'] = trim($_POST['mt_jjlxr']);
            }
            if($_POST['mt_jjlxrtel']){
                $data['contact_phone'] = trim($_POST['mt_jjlxrtel']);
            }


            $pic_url = trim($_POST['pic_url']);
            // if($_GET['access'] == 1){
            //     if( !$data['email_jianli'] || !$data['realname'] || !$data['phone']){
            //         $this->ResumeJson(0,"请将信息填写完整！"); 
            //     }
            // }else if( !$data['email_jianli'] || !$data['zhuanye'] || !$data['byxy'] || !$data['realname'] || !$data['city'] || !$data['edu'] || !$data['phone'] || !$data['sex'] ){
            //     //print_test($data);
            //     $this->ResumeJson(0,"请将信息填写完整！"); 
            // }                  
            
            $rs = M("member")->where(array('uid'=>$this->uid))->save($data);
            if($rs) {
                cookie('gotourl',null);
                $_SESSION['user_auth']['status'] = $this->status = 100;
                inputUsersSession("status",100);
                $this->ResumeJson(1,"更新成功！","basic");
                
                $user = new UserApi;
                $uid = $user->login($username, $password,2);
                cookie('uid',$uid,24*3600*30);
                cookie('login',1,24*3600*30);
                cookie('ez_uid',$uid,24*3600*30);
                cookie('gotourl',$gotourl);

            }
            else $this->ResumeJson(0,"很疑惑，资料更新失败，请稍后再试！");
            
            exit;
        }
        else $this->ResumeJson(0,"参数无效"); 
    } 
    
    
    //更新当前工作状态
    function updateWorkStatus(){
        
        if(isset($_POST['status'])){
            $status = trim($_POST['status']);            
            M("member")->where(array('uid'=>$this->uid))->save(array('workstatus'=>$status));             
            $this->ResumeJson(1,"操作成功！");        
        }
        
    }
    
    
    //更新期望工作
    public function expectJobs() {
        $uid = $this->uid;
         
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
         
        $data = array(
            'expect_city'=>trim($_POST['city']),
            'position_name'=>trim($_POST['positionName']),
            'position_type'=>trim($_POST['positionType']),
            'salarys'=>trim($_POST['salarys']),
            'expect_memo'=>trim($_POST['addExplain']),
        );
    
        if( !$data['expect_city'] || !$data['position_name'] || !$data['position_type'] || !$data['salarys'] ){
            //$this->error("请填写完整！");
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            //$data['score_qiwang'] = getResumeStepScore('score_qiwang');
            M("member")->where( array('uid'=>$uid) )->save($data);
    
            $this->ResumeJson(1,"操作成功！",'qiwang');
        }
         
    }
    
    //删除期望工作
    public function delAllExpectJobs(){
    
        $uid = $this->uid;
        if( !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        $data = array(
            'expect_city'=>'',
            'position_name'=>'',
            'position_type'=>'',
            'salarys'=>'',
            'expect_memo'=>'',
        );
        M("member")->where( array('uid'=>$uid) )->save($data);
    
        $this->ResumeJson(1,"删除成功！",'qiwang');
    
    }
    
    //更新技能
    public function skillSave() {
         $uid = $this->uid;
          
         if(!$uid){;
            $this->ResumeJson(0,"请先登陆。");
         }
         
         $skillJson = $_POST['skillJson'];
         $skill_arr = array();
         if($skillJson){
             $skill_arr = json_decode($skillJson,true);
         }
         if(!$skill_arr){
             $this->ResumeJson(0,"请填写完整！");
         }
         
         foreach ($skill_arr as $k=>$v){
             $sid = intval($v['id']);
             $data = array(
                 'skillName'=>trim($v['skillName']),
                 'masterLevel'=>trim($v['masterLevel']),
                 'skillPercent'=>trim($v['skillPercent']),
                 'uid'=>$this->uid,
                 'createTime'=>time(),
             );
             if($sid) {
                 $data['sid']=$sid;
                 $data['updateTime']=time();
                 $rs = M("work_skill")->save($data);
             }
             else {
                 $rs = M("work_skill")->add($data);
             }
             
         }
         
         if($rs){
             $data = array();
             $data['score_jineng'] = getResumeStepScore('score_jineng');
             M("member")->where( array('uid'=>$uid) )->save($data);
         }
         
         $this->ResumeJson(1,"技能评价更新成功!",'jineng');
      
     }
     
     //删除技能
     function skillDel(){
         $uid = $this->uid;
         
         if(!$uid){;
            $this->ResumeJson(0,"请先登陆。");
         }
          
         $sid = $_POST['skillId'];
         if($sid){
             M("work_skill")->where(array('uid'=>$uid,'sid'=>array("in",$sid)))->delete();
             $this->ResumeJson(1,"技能评价删除成功!",'jineng');
         }
         else{
             $this->ResumeJson(0,"参数无效");
         }
     }
     
     //删除全部技能
     function skillDelAll(){
         $uid = $this->uid;
          
         if(!$uid){;
            $this->ResumeJson(0,"请先登陆。");
         }
     
         $resubmitToken = intval($_POST['resubmitToken']);
         if($resubmitToken){
             M("work_skill")->where(array('uid'=>$uid))->delete();
             M("member")->where( array('uid'=>$uid) )->save(array('score_jineng'=>0));
             $this->ResumeJson(1,"技能评价删除成功!",'jineng');
         }
         else{
             $this->ResumeJson(0,"参数无效");
         }
     }
    
    //添加更新工作经验
    public function workExperience() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }  
        $expid = intval($_POST['expid']);
         
        $data = array(
            'companyName'=>trim($_POST['companyName']),
            'positionName'=>trim($_POST['positionName']),
            'startDate'=>trim($_POST['startDate']),
            'endDate'=>trim($_POST['endDate']),
            'isUploadLogo'=>intval($_POST['isUploadLogo']),
            'companyLogo'=>trim($_POST['companyLogo']),
            'jobContent'=>trim($_POST['jobContent']),
            'company_property' =>trim($_POST['company_property']),
            'company_size' =>trim($_POST['company_size']),
            'company_cat' =>trim($_POST['company_cat']),
            'work_cat' =>trim($_POST['work_cat']),
            'department' =>trim($_POST['department']),
            'work_city' =>trim($_POST['work_city']),
            'workContent' =>trim($_POST['workContent']),
            'salary_month' =>trim($_POST['salary_month']),
            'reterence_name' =>trim($_POST['reterence_name']),
            'reterence_relation' =>trim($_POST['reterence_relation']),
            'reterence_company' =>trim($_POST['reterence_company']),
            'reterence_position' =>trim($_POST['reterence_position']),
            'reterence_phone' =>trim($_POST['reterence_phone']),
            'reasons' => trim($_POST['reasons']),
            'uid'=>$uid,
            'createTime'=>time(),
        );
    
        //if( !$data['companyName'] || !$data['positionName'] || !$data['startDate'] || !$data['endDate'] || !$data['workContent'] ){
         if( !$data['companyName'] ){
            //$this->error("请填写完整！");
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$expid){
                $expid = M("work_experience")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("work_experience")->where( array('uid'=>$uid,'id'=>$expid) )->save($data);
            }
    
            if($expid){
                $data = array();
                $data['score_jingyan'] = getResumeStepScore('score_jingyan');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"操作成功！",'jingyan');
        }
    
    }
    
    //删除工作经验
    function delExp(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }   
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
         
        M("work_experience")->where( array('uid'=>$uid,'id'=>$id) )->delete();
         
        $ext = array();
        $check = M("work_experience")->where( array('uid'=>$uid) )->find();
        if(!$check){
            $ext['last'] = 1;
            M("member_info")->where( array('uid'=>$uid) )->save( array('score_jingyan'=>0) );
        }        
         
        $this->ResumeJson(1,"操作成功！",'jingyan',0,$ext);
         
    }
    
    //添加更新教育经验
    public function educationExperience() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
    
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }

        //$data = json_decode(stripslashes($_POST),true);
        //$data = unserialize($_POST);
        // $data = array();
        // $data = array_chunk($_POST, 17);
        // for ($i=0; $i <count($data) ; $i++) { 
           
        $eduid = intval($_POST['eduid']);
    
        $data = array(
            'education'=>trim($_POST['education']),
            'endYear'=>trim($_POST['endYear']),
            'professional'=>trim($_POST['professional']),
            'schoolName'=>trim($_POST['schoolName']),
            'startYear'=>trim($_POST['startYear']),
            'school_city'=>trim($_POST['school_city']),
            'school_city_city'=>trim($_POST['school_city_city']),
            'degree'=>trim($_POST['degree']),
            'academy'=>trim($_POST['academy']),
            'major'=>trim($_POST['major']),
            'gpa_score'=>trim($_POST['gpa_score']),
            'professional_ranking'=>trim($_POST['professional_ranking']),
            'class_ranking'=>trim($_POST['class_ranking']),
            'professional_describe'=>trim($_POST['professional_describe']),
            'tutor_name'=>trim($_POST['tutor_name']),
            'tutor_phone'=>trim($_POST['tutor_phone']),
                       
           // 'reward_punish'=>trim($_POST['reward_punish']),
            'uid'=>$uid,
            'createTime'=>time(),
        );
         
        // if( !$data['schoolName'] ){
            
        //     $this->ResumeJson(0,"请填写完整！");
        // }
        // else{
            if(!$eduid){
                $eduid = M("edu_experience")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("edu_experience")->where( array('uid'=>$uid,'id'=>$eduid) )->save($data);
            }
    
            if($eduid){
                $data = array();
                $data['score_jiaoyu'] = getResumeStepScore('score_jiaoyu');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"教育背景更新成功!",'jiaoyu');
       // }

        //}//for循环
    
    }
    
    //删除教育程度
    function delEdu(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("edu_experience")->where( array('uid'=>$uid,'id'=>$id) )->delete();
         
        $check = M("edu_experience")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_jiaoyu'=>0) );
        }
    
        $this->ResumeJson(1,"操作成功！",'jiaoyu',0,$ext);
    
    }
    
    //添加更新项目经验
    public function projectExperience() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
        
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 

        $projectid = intval($_POST['projectid']);
    
        $data = array(
            // 'startYear'=>trim($_POST['startYear']),
            // 'startMonth'=>trim($_POST['startMonth']),
            // 'endYear'=>trim($_POST['endYear']),
            // 'endMonth'=>trim($_POST['endMonth']),
            
            'startDate'=>trim($_POST['startDate']),
            'endDate'=>trim($_POST['endDate']),
            'dutyRemark'=>trim($_POST['dutyRemark']),
            // 'projectUrl'=>trim($_POST['projectUrl']),
            
            'positionName'=>trim($_POST['positionName']),
            'projectName'=>trim($_POST['projectName']),
            'projectRemark'=>trim($_POST['projectRemark']),

            'projectNumber'=>trim($_POST['projectNumber']),
            'projectDuty'=>trim($_POST['projectDuty']),
            'reterenceName'=>trim($_POST['reterenceName']),
            'reterencePhone'=>trim($_POST['reterencePhone']),
      
            'uid'=>$uid,
            'createTime'=>time(),
        );
    
        if(  !$data['positionName'] || !$data['projectName'] ){
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$projectid){
                $projectid = M("pro_experience")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("pro_experience")->where( array('uid'=>$uid,'id'=>$projectid) )->save($data);
            }
    
            if($projectid){
                $data = array();
                $data['score_xiangmu'] = getResumeStepScore('score_xiangmu');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"项目经验更新成功!",'xiangmu');
        }
    
    }
    
    //删除项目经验
    function delProject(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("pro_experience")->where( array('uid'=>$uid,'id'=>$id) )->delete();
    
        $check = M("pro_experience")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_xiangmu'=>0) );
        }
         
        $this->ResumeJson(1,"删除成功！",'xiangmu',0,$ext);
    
    }
    
    //删除所有项目经验
    public function delAllProject(){
    
        $uid = $this->uid;
        if( !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("pro_experience")->where( array('uid'=>$uid) )->delete();
    
        M("member")->where( array('uid'=>$uid) )->save( array('score_xiangmu'=>0) );
    
        $this->ResumeJson(1,"删除成功！",'xiangmu');
    
    }

    //添加更新在校实践
    public function schoolPractice() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
        
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 

        $schoolpracticeid = intval($_POST['schoolpracticeid']);
    
        $data = array(
           
            'startDate'=>trim($_POST['startTime']),
            'endDate'=>trim($_POST['endTime']),
            'practiceDes'=>trim($_POST['practiceDes']),
            'practicePosition'=>trim($_POST['practicePosition']),
            'practiceDuty'=>trim($_POST['practiceDuty']),
            'praCompanyName'=>trim($_POST['praCompanyName']),
            'uid'=>$uid,
            'createTime'=>time(),
        );
    
        // if(  !$data['praCompanyName'] ){
        //     $this->ResumeJson(0,"请填写完整！");
        // }
        // else{
            if(!$schoolpracticeid){
                $schoolpracticeid = M("school_practice")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("school_practice")->where( array('uid'=>$uid,'id'=>$schoolpracticeid) )->save($data);
            }
    
            if($schoolpracticeid){
                $data = array();
                $data['score_xiangmu'] = getResumeStepScore('score_xiangmu');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"在校实践更新成功!",'zaixiaoshijian');
       // }
    
    }

   
     //删除教育程度
    function delSchPro(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("school_practice")->where( array('uid'=>$uid,'id'=>$id) )->delete();
         
        $check = M("school_practice")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_jiaoyu'=>0) );
        }
    
        $this->ResumeJson(1,"操作成功！",'zaixiaoshijian',0,$ext);
    
    }
         //添加更新社团
    public function schoolClub() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
        
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 

        $schoolclubid = intval($_POST['schoolclubid']);
        $data = array(
            'schoolName' =>trim($_POST['schoolName']),
            'schClubName' =>trim($_POST['schClubName']),
            'schClubLevel' =>trim($_POST['schClubLevel']),
            'positionName' =>trim($_POST['positionName']),
            'workDes' =>trim($_POST['workDes']),
            'startDate' =>trim($_POST['startDate']),
            'endDate' =>trim($_POST['endDate']),

            'uid'=>$uid,
            //'createTime'=>time(),
        );
    
        if(  !$data['schClubName'] ){
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$schoolclubid){
                $schoolclubid = M("school_club")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("school_club")->where( array('uid'=>$uid,'id'=>$schoolclubid) )->save($data);
            }
    
            if($schoolclubid){
                $data = array();
                $data['score_shetuan'] = getResumeStepScore('score_shetuan');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"更新成功!",'shetuan');
        }
    
    }


     //删除教育程度
    function delSchClub(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("school_club")->where( array('uid'=>$uid,'id'=>$id) )->delete();
         
        $check = M("school_club")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_shetuan'=>0) );
        }
    
        $this->ResumeJson(1,"操作成功！",'shetuan',0,$ext);
    
    }


    //添加更新获奖经验
    public function schoolAwards() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
    
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }

        $schoolawardsid = intval($_POST['schoolawardsid']);
    
        $data = array(
            'awardsName'=>trim($_POST['awardsName']),
            'awardsType'=>trim($_POST['awardsType']),
            'awardsLevel'=>trim($_POST['awardsLevel']),
            'awardsDate'=>trim($_POST['awardsDate']),
            'awardsDes'=>trim($_POST['awardsDes']),
        
            'uid'=>$uid,
            //'createTime'=>time(),
        );
         
        if( !$data['awardsName'] ){
            
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$schoolawardsid){
                $schoolawardsid = M("school_awards")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("school_awards")->where( array('uid'=>$uid,'id'=>$schoolawardsid) )->save($data);
            }
    
            if($schoolawardsid){
                $data = array();
                $data['score_huojiang'] = getResumeStepScore('score_huojiang');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"更新成功!",'huojiang');
        }
    
    }
    
    //删除教育程度
    function delSchoolAwards(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("school_awards")->where( array('uid'=>$uid,'id'=>$id) )->delete();
         
        $check = M("school_awards")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_huojiang'=>0) );
        }
    
        $this->ResumeJson(1,"操作成功！",'huojiang',0,$ext);
    
    }

    //添加更新证书
    public function certificate() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
    
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }

        $certificateid = intval($_POST['certificateId']);
    
        $data = array(
            'certificateName'=>trim($_POST['certificateName']),
            'getDate'=>trim($_POST['getDate']),
            'certificateDes'=>trim($_POST['certificateDes']),
            'issuing'=>trim($_POST['issuing']),
           
            'uid'=>$uid,
            //'createTime'=>time(),
        );
         
        if( !$data['certificateName'] ){
            
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$certificateid){
                $certificateid = M("certificate")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("certificate")->where( array('uid'=>$uid,'id'=>$certificateid) )->save($data);
            }
    
            if($certificateid){
                $data = array();
                $data['score_zhengshu'] = getResumeStepScore('score_zhengshu');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"更新成功!",'zhengshu');
        }
    
    }
    
    //删除教育程度
    function delCertificate(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("certificate")->where( array('uid'=>$uid,'id'=>$id) )->delete();
         
        $check = M("certificate")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_jiaoyu'=>0) );
        }
    
        $this->ResumeJson(1,"操作成功！",'zhengshu',0,$ext);
    
    }

        //添加更新证书
    public function trainingExperience() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
    
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }

        $trainingid = intval($_POST['trainingid']);
    
        $data = array(
            'trainingName'=>trim($_POST['trainingName']),
            'trainingDes'=>trim($_POST['trainingDes']),
            'trainingCompany'=>trim($_POST['trainingCompany']),
            'trainingPlace'=>trim($_POST['trainingPlace']),
            'startDate'=>trim($_POST['startDate']),
            'endDate'=>trim($_POST['endDate']),
            'certificateName'=>trim($_POST['certificateName']),
           
            'uid'=>$uid,
            //'createTime'=>time(),
        );
         
        if( !$data['trainingName'] ){
            
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$trainingid){
                $trainingid = M("training_experience")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("training_experience")->where( array('uid'=>$uid,'id'=>$trainingid) )->save($data);
            }
    
            if($trainingid){
                $data = array();
                $data['score_trainingexp'] = getResumeStepScore('score_trainingexp');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"更新成功!",'trainingexp');
        }
    
    }
    
    //删除教育程度
    function delTrainingExperience(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("training_experience")->where( array('uid'=>$uid,'id'=>$id) )->delete();
         
        $check = M("training_experience")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_jiaoyu'=>0) );
        }
    
        $this->ResumeJson(1,"操作成功！",'trainingexp',0,$ext);
    
    }

     //添加更新证书
    public function otherInfo() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
    
        if($_GET['access'] == 1){
            $_POST = $_GET;
        }

        $otherinfoid = intval($_POST['otherinfoid']);
    
        $data = array(
            'selfIntro'=>trim($_POST['selfIntro']),
            'skill'=>trim($_POST['skill']),
            'hobbies'=>trim($_POST['hobbies']),
            'achievement'=>trim($_POST['achievement']),
            'profile'=>trim($_POST['profile']),
            
            'uid'=>$uid,
            //'createTime'=>time(),
        );
         
        if( !$data['selfIntro'] ){
            
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$otherinfoid){
                $otherinfoid = M("other_info")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("other_info")->where( array('uid'=>$uid,'id'=>$otherinfoid) )->save($data);
            }
    
            if($otherinfoid){
                $data = array();
                $data['score_otherinfo'] = getResumeStepScore('score_otherinfo');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"更新成功!",'otherinfo');
        }
    
    }
    
    //删除教育程度
    function delOtherInfo(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("other_info")->where( array('uid'=>$uid,'id'=>$id) )->delete();
         
        $check = M("other_info")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_jiaoyu'=>0) );
        }
    
        $this->ResumeJson(1,"操作成功！",'jiaoyu',0,$ext);
    
    }
    
    
    //添加更新我的作品
    public function workShow() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
    
        $wsid = intval($_POST['wsid']);
    
        $data = array(
            'url'=>trim($_POST['url']),
            'workName'=>trim($_POST['workName']),
             
            'uid'=>$uid,
            'createTime'=>time(),
        );
    
        if( !$data['url'] || !$data['workName'] ){
            //$this->error("请填写完整！");
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$wsid){
                $wsid = M("work_show")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("work_show")->where( array('uid'=>$uid,'id'=>$wsid) )->save($data);
            }
    
            if($wsid){
                $data = array();
                $data['score_zuopin'] = getResumeStepScore('score_zuopin');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"操作成功",'zuopin');
        }
    
    }    
    
    //删除作品
    function workDel(){
    
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("work_show")->where( array('uid'=>$uid,'id'=>$id) )->delete();
    
        $check = M("work_show")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("member")->where( array('uid'=>$uid) )->save( array('score_zuopin'=>0) );
        }
    
        $this->ResumeJson(1,"删除成功！",'zuopin');
    
    }
    
    //删除所有作品
    public function delAllWorkShow(){        
        
        $uid = $this->uid;
        if( !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
        
        M("work_show")->where( array('uid'=>$uid) )->delete();
        
        M("member")->where( array('uid'=>$uid) )->save( array('score_zuopin'=>0) );
        
        $this->ResumeJson(1,"删除成功！",'zuopin');
        
    }    
    
    //添加自定义模块
    public function userDefine() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $defineId = intval($_POST['defineId']);
    
        $data = array(
            'titleName'=>trim($_POST['titleName']),
            'titleContent'=>trim($_POST['titleContent']),             
            'uid'=>$uid,
            'createTime'=>time(),
        );
    
        if( !$data['titleName'] || !$data['titleContent'] ){
            //$this->error("请填写完整！");
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$defineId){
                $defineId = M("custom_model")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("custom_model")->where( array('uid'=>$uid,'id'=>$defineId) )->save($data);
            }

            if($defineId){
                $data = array();
                $data['score_custom'] = getResumeStepScore('score_custom');
                M("member")->where( array('uid'=>$uid) )->save($data);
            }
            $this->ResumeJson(1,"自定义标题更新成功!",'custom');
        }
    
    }


    //删除一个自定义
    function userDefineDel(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("custom_model")->where( array('uid'=>$uid,'id'=>$id) )->delete();
    
        $check = M("custom_model")->where( array('uid'=>$uid) )->find();
        if(!$check){
            M("custom_model")->where( array('uid'=>$uid) )->save( array('score_zuopin'=>0) );
        }
    
        $this->ResumeJson(1,"删除成功！",'custom');
    
    }

    //删除所有自定义
    public function delAllUserDefine(){
    
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("custom_model")->where( array('uid'=>$uid) )->delete();
    
        M("member")->where( array('uid'=>$uid) )->save( array('score_custom'=>0) );
    
        $this->ResumeJson(1,"删除成功！",'custom');
    
    }

    public function userCustomize() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $defineId = intval($_POST['defineId']);
    
        $data = array(
            'title'=>trim($_POST['titleName']),
            'content'=>trim($_POST['titleContent']),             
            'uid'=>$uid,
            'createTime'=>time(),
        );
    
        if( !$data['title'] || !$data['content'] ){
            //$this->error("请填写完整！");
            $this->ResumeJson(0,"请填写完整！");
        }
        else{
            if(!$defineId){
                $defineId = M("gongkai")->add($data);
            }
            else {
                unset($data['uid']);
                unset($data['createTime']);
                M("gongkai")->where( array('uid'=>$uid,'id'=>$defineId) )->save($data);
            }

            // if($defineId){
            //     $data = array();
            //     $data['score_custom'] = getResumeStepScore('score_custom');
            //     M("member")->where( array('uid'=>$uid) )->save($data);
            // }
            $this->ResumeJson(1,"自定义标题更新成功!",'custom');
        }
    
    }

     function userCustomizeDel(){
        if($_GET['access'] == 1){
            $_POST = $_GET;
        } 
        $id = $_POST['id'];
        $uid = $this->uid;
        if( !$id || !$uid ){
            $this->ResumeJson(0,"参数无效！");
        }
    
        M("gongkai")->where( array('uid'=>$uid,'id'=>$id) )->delete();
    
        $check = M("gongkai")->where( array('uid'=>$uid) )->find();
        // if(!$check){
        //     M("gongkai")->where( array('uid'=>$uid) )->save( array('score_zuopin'=>0) );
        // }
    
        $this->ResumeJson(1,"删除成功！",'custom');
    
    }
    
    //添加更新自我描述
    public function intro() {
        $uid = $this->uid;
    
        if(!$uid){
            $this->ResumeJson(0,"请先登陆。");
        }
    
        $type = intval($_POST['type']);        
        
        $data = array(
            'remark'=>trim($_POST['myRemark']),
            'score_ziwo' => getResumeStepScore('score_ziwo'),
        );
    
        if($type==1){//删除
            $data = array(
                'remark'=>'',
                'score_ziwo' =>0,
            );
        }
        elseif( !$data['remark']){
            $this->ResumeJson(0,"请填写完整！");
        }
        
        M("member")->where( array('uid'=>$uid) )->save($data);
        $this->ResumeJson(1,"自我描述更新成功!",'ziwo');
    }     
    
    
    
    //更新简历名称
    function renameResume(){
        $this->checkUser();
        $resumeName = trim($_POST['resumeName']);
         
        if($resumeName){
            $data = array(
                'resume_name'=>$resumeName,
                'update_time'=>time(),
            );
    
            M("member")->where(array('uid'=>$this->uid))->save($data);
    
            $data = array(
                'refreshTime'=>date("Y-m-d H:i:s"),
                'resumeName'=>$resumeName,
            );
            $this->success("更新成功",$data);
        }
        else{
            $this->error("请填写简历名称");
        }
    }
    
    //我的附件简历管理界面
    function otherResume(){
        $this->checkUser();
        
        $uid = intval($_REQUEST['uid']);
        if(!$uid){
            $uid = $this->uid;
        }
        $aid = intval($_REQUEST['aid']);
        
        $info = $this->getUsersInfoById($uid);
        if(!$info){
            $this->error("参数无效,不存在该用户！",WEB_URL);
        }
        
        $this->assign(array(
            'otherResume'=>getMyUploadResume($uid),
            'resumeCount'=>getResumeCount($uid),
            "aid"=>$aid,
            "uid"=>$uid,
            "info"=>$info,
        ));
        
        $this->assign("show_foot",IS_WAP?0:1);
    
        $this->display("otherResume");
    }
    
    //设置默认简历
    function setDefaultResume(){
        $this->checkUser();
        $type = intval($_REQUEST['type']);
        $id = intval($_REQUEST['id']);
    
        if(!$id){
            $id = 1;
        }
    
        if($type==0){
            $map = array('uid'=>$this->uid);
            M("Member")->where($map)->save(array('default_select'=>0));
        }
        else{
            $map = array('uid'=>$this->uid);
            M("Member")->where($map)->save(array('default_select'=>1));
        }
        exit('{"code":0,"success":true,"requestId":"","msg":"操作成功","resubmitToken":"","content":""}');
        //$this->success("设置成功！");
    }
    
    //删除其他简历
    function delOtherResume(){
        $this->checkUser();
        $uid = $this->uid;
    
        $id = intval($_REQUEST['id']);
    
        if(!$id){
            $this->error("参数无效！");
        }
    
        $info = $this->getUsersInfoById($uid);    
        if(!$info){
            $this->error("请勿非法访问！");
        }    
    
        $check = M("resume_offline")->where(array('oid'=>$id,'uid'=>$uid))->delete();
        if($check){
            $data = array(
                'default_select'=>0,
            );
            M("member")->where(array('uid'=>$uid,'default_select'=>$id))->save($data);
        }
    
        $this->redirect("/Resume/otherResume");
        //exit('{"code":0,"success":true,"requestId":"","msg":"删除成功","resubmitToken":"","content":""}');
        $this->success("删除成功！");
    }
    
    //下载其他简历
    function downResume(){
    
        $this->checkUser();
        $uid = $this->uid;
        
        $id = intval($_REQUEST['id']);        
        if(!$id){
            $this->error("参数无效！");
        }
        
        $user = $this->getUsersInfoById($uid);
        if(!$user){
            $this->error("请先登录！","/User/login");
        }
        
        $info = M("resume_offline")->where(array('oid'=>$id))->find();
        if(!$info){
            $this->error("参数无效");
        }
        
        /* if($_GET['aid']){
            $rs = M("jobs_apply")->where(array("aid"=>intval($_GET['aid']),"isread"=>0))->save(array("isread"=>1));
            if($rs){
                addApplyLog($_GET['aid'],$info['uid'],2,$this->uid,'');
            }
        } */
        
        //print_test($info);
        
        $fileContent = file_get_contents(WEB_PATH."".$info['path']);
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        Header("Accept-Ranges: bytes");
        //$wordStr = '个人简历';
        $info['name'] = str_replace(" ", "_", $info['name']);
        $fileName = iconv("utf-8", "GBK", $info['name']);//rand(100, 999)."_".
        //header("Content-Type: application/doc");
        Header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $fileName );
        
        //exit($fileName);
    
        echo $fileContent;
         
        exit();
    
    }
    
    
    //上传简历
    /* Array
     (
     [newResume] => Array
     (
     [name] => 武鸣的简历.doc
     [type] => application/msword
     [tmp_name] => D:\wamp\tmp\php199A.tmp
     [error] => 0
     [size] => 156667
     )
    
     ) */
    /* function updateMyResume(){
        $this->checkUser();
        $uid = $this->uid;
        
        $file = $_FILES['newResume'];
        $file_path = '';
        	
        if($file['error']>0){
            $this->error('上传简历过大，请更换');
        }
        else if($file['size']<1){
            $this->error('请上传的简历');
        }
        	
        if($file['size']>10*1024*1024){
            $this->error('上传的简历不能大于10M');
        }
    
        $this->file_pre = '';
        $info = $this->uploadfiles($this->imgpath);
    
        if($info[0]){
            $file_path = $info[0]['savepath'].$this->file_pre.$info[0]['savename'];
            $file_path = str_replace('./', '', $file_path);
            $data = array(
                'other_resume'=>$file_path,
                'other_resume_name'=>$info[0]['name'],
                'other_resume_time'=>time(),
            );
            M("member")->where(array('uid'=>$uid))->save($data);
            	
            $arr = array(
                "requestId"=>null,
                "code"=>0,
                "success"=>true,
                "msg"=>"上传成功！",
                "resubmitToken"=>null,
                "content"=>array(
                    "perfect"=>false,
                    "score"=>100,
                    "isDefault"=>false,
                    "name"=>$info[0]['name'],
                    "id"=>-1,
                    "type"=>0,
                    "time"=>date("Y-m-d H:i:s",time()),
                    	
                )
                	
            );
            exit(json_encode($arr));
            	
        }
        else $this->error('图像上传失败，请稍后再试!');
    
    } */
    
    
    
    
    

}