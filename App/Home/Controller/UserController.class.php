<?php
// 用户中心

namespace Home\Controller;
use User\Api\UserApi;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController {

    function __construct(){
        parent::__construct();
        $this->assign("cur_top_nav",array("user"=>'class="current"') );
    }


    // 检查用户是否登录
    protected function checkUser($show_error=1) {

        //暂时屏蔽会员中心   一律跳到首页
        //$this->redirect('/Home/Public/'); C('USER_AUTH_KEY')

        if(!$this->uid || $this->user_status<1) {
            if( isWeixinBrowser() ){
                redirect(WEB_URL.'User/login');
                exit;
            }
            else $this->error('你还没有登录，请先登陆。',WEB_URL.'User/login');
        }
        elseif($this->type==0){
            if( $this->status <2 ) {
                if($show_error){
                    $this->error('请先激活您的登录活邮箱。','/User/checkEmail');
                }
                else $this->redirect('/User/checkEmail');
            }
            else if( $this->status == 2 ) {
                if(IS_WAP && in_array(ACTION_NAME, array("myinterview","delivery","collections"))){

                }
                else if(ACTION_NAME!="myresume" && ACTION_NAME!="otherresume" ){
                    if($show_error){
                        $this->error('请先完善你的个人简历。','/Resume/myresume');
                    }
                    else  $this->redirect('/Resume/myresume');
                }
            }
        }
        elseif($this->type==1){
            if( $this->status <2 ) {
	            if( strpos(strtolower(__ACTION__), strtolower("/Home/Company/openzhaopin") ) === false ){
	                if($show_error){
                        $this->error('请先开通招聘服务。','/Company/openzhaopin');
                    }
                    else  $this->redirect('/Company/openzhaopin');
	            }
	        }
	        else if( $this->status <100 ) {
	            if( strpos(strtolower(__ACTION__), strtolower("/Home/Company/cinfo") ) === false ){
	                if($show_error){
                        $this->error('请先完善公司信息。','/Company/cinfo');
                    }
                    else  $this->redirect('/Company/cinfo');
	            }
	        }
        }
        else {
            $this->redirect('/');
        }

        /* if( $this->status == -1 ) {
            $this->error('账号异常请重新登录。',WEB_URL.'User/loginout');
        }
        else  */

        return true;
    }


	/* 注册页面 */
	public function register($username = '', $password = '', $repassword = '', $email = '', $verify = '',$nickname = ''){
        if(!C('USER_ALLOW_REGISTER')){
            $this->error('注册已关闭');
        }

		if(IS_POST){ //注册用户

		 	if(!$_POST['nickname']){
			    $this->error("请输入昵称");
			}

			if(!check_verify($verify)){
				$this->error('验证码输入错误！');
			}
		   

		    if(!$_POST['web_rule']){
		    	$this->error('请先阅读乔麦网用户协议！');
		    }

			/* 检测密码 */
			if($password != $repassword){
				//$this->error('密码和重复密码不一致！');
			}

			// if(!isset($_POST['type'])){
			//     $this->error("请选择使用jobsminer的目的");//$this->showRegError(-6)
			// }

			if(!$_POST['email']){
			    $this->error("请输入正确的邮箱地址");//$this->showRegError(-6)
			}

			if(!$_POST['password']){
			    $this->error("请输入密码");
			}
			elseif(strlen($_POST['password'])<6){
			    $this->error("密码长度不能少于6位");
			}

			if(!$username && !$_POST['username'] && $_POST['email']){
			    $username = rand(100,999)."_".$_POST['email'];
			}
			//$nickname = $_POST['nickname'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$type = intval($_POST['type']);

			if(!isEmail($email)){
			    $this->error("邮箱地址有误，请更换");
			}

			if($type==1 && !checkIsCompanyEmail($email) ){
			    $this->error("请输入有效的企业邮箱地址");
			}

			$isbind = 0;
			if(isset($_SESSION[$_SESSION['other_login_type'].'_uid'])&&isset($_SESSION['other_login_type'])){
			    $accesstoken_new = md5($_SESSION['other_login_type']."+".$_SESSION[$_SESSION['other_login_type'].'_uid']);
			    if($accesstoken_new==$_POST['resubmitToken']){
			        $isbind = 1;
			    }
			}

			//echo $isbind;print_test($_SESSION);

			/* 调用注册接口注册用户 */
            $User = new UserApi;

			$uid = $User->register($username, $password, $email);
			if(0 < $uid){ //注册成功
				//TODO: 发送验证邮件

			    //写入从表
			    $save = array(
			        'uid'=>$uid,
			        'reg_ip'=>get_client_ip(1),
			        'reg_time'=>NOW_TIME,
			        'type'=>$type,
			        'user_status'=>1,
			        //'nickname'=>$nickname,
			    );

			    if($isbind==1){
			        $save[$_SESSION['other_login_type'].'_open_id'] = $_SESSION[$_SESSION['other_login_type'].'_uid'];
			        $save[$_SESSION['other_login_type'].'_name'] = $_SESSION[$_SESSION['other_login_type'].'_nickname'];
			        $save[$_SESSION['other_login_type'].'_bind_time'] = time();
			    }

			    M("member")->add($save,'',1);

			    //unset($_SESSION['token']);
			    session("ot_home",NULL);
			    unset($_SESSION[$_SESSION['other_login_type'].'_uid']);
			    //unset($_SESSION[$_SESSION['other_login_type'].'_nickname']);
			    unset($_SESSION[$_SESSION['other_login_type'].'_token']);
			    unset($_SESSION[$_SESSION['other_login_type'].'_access_token']);
			    unset($_SESSION[$_SESSION['other_login_type'].'_user_info']);
			    unset($_SESSION['other_login_type']);
			    session($_SESSION['other_login_type'].'_user_info',NULL);


			    $this->uid = $uid;
			    $this->user_status = 1;
			    $this->type = $type;

			    addDefaultTpl($this->uid,1);
			    addDefaultTpl($this->uid,2);


			    //$uid2 = $User->login($email, $password,2);

			    $Member = D('Member');
			    if($Member->login($uid)){ //登录用户
			        if($type==1){
			            $u = "/Company/openZhaopin";
			        }
			        else {
			            if(IS_WAP){
			                //$u = '/Resume/wapbasic';
			                $u = '/Resume/wapbasic_iframe';
			            }
			            else $u = '/User/checkEmail';
			        }
			    }
			    else {
			        $u = '/User/login';
			    }

			    //注册成功  发送激活邮件    然后直接登录
			    if($type==0){

			        $this->sendActiveEmail($uid,$email);
			    }

			    $this->success('注册成功！',$u);

			} else { //注册失败，显示错误信息
				$this->error($this->showRegError($uid));
			}

		} else { //显示注册表单
		    if(is_login()){
		        D('Member')->logout();
		    }
		    $this->assign("show_nav",IS_WAP?1:0);
		    $webRule = require_once DATA_PATH."webRule.php";
		    $this->assign("webRule",$webRule);
			$this->display();
		}
	}

	public function registerphone($username = '', $password = '', $repassword = '', $phone = '', $verify = '',$nickname = ''){
 	
			
		if(IS_POST){ //注册用户

			

		 	if(!$_POST['nickname']){
			    $this->error("请输入昵称");
			}

			if($_POST['nickname']){
			$this->redirect('/User/registerphoneverify');
			}
			
		
			// // if(!check_verify($verify)){
			// // 	$this->error('验证码输入错误！');
			// // }
		   

		 //    if(!$_POST['web_rule']){
		 //    	$this->error('请先阅读乔麦网用户协议！');
		 //    }

			// /* 检测密码 */
			// if($password != $repassword){
			// 	//$this->error('密码和重复密码不一致！');
			// }

			// // if(!isset($_POST['type'])){
			// //     $this->error("请选择使用jobsminer的目的");//$this->showRegError(-6)
			// // }

			// if(!$_POST['phone']){
			//     $this->error("请输入正确的手机号");//$this->showRegError(-6)
			// }

			// if(!$_POST['password']){
			//     $this->error("请输入密码");
			// }
			// elseif(strlen($_POST['password'])<6){
			//     $this->error("密码长度不能少于6位");
			// }

			// if(!$username && !$_POST['username'] && $_POST['phone']){
			//     $username = rand(100,999)."_".$_POST['phone'];
			// }
			// //$nickname = $_POST['nickname'];
			// $password = $_POST['password'];
			// $mobile = $_POST['phone'];
			// $type = intval($_POST['type']);

					

			//echo $isbind;print_test($_SESSION);
			// $gotourl = '/User/registerphoneverify';
			// $this->redirect('/User/registerphoneverify');
			// exit;


		} else { //显示注册表单
		    if(is_login()){
		        D('Member')->logout();
		    }
		    $this->assign("show_nav",IS_WAP?1:0);
		    $webRule = require_once DATA_PATH."webRule.php";
		    $this->assign("webRule",$webRule);
			$this->display();
		}
	}

	public function registerphoneverify(){
		

		$this->display();
	}

	public function keep(){
		$this->checkUser();
		$uid = $this->uid;

		$info = M("Olapplication o")
            ->join("  LEFT JOIN  ".C('DB_PREFIX')."category c on o.cid = c.id")
            ->join("  LEFT JOIN  ".C('DB_PREFIX')."keep k on k.cid = o.id")
            ->where("k.uid='$uid'")->field("o.*,c.title ctitle,k.id kid,k.uid kuid")
            ->order('k.id desc')->select();

		// $m = M("Keep");  
		// $uid = $_SESSION['ot_home']['user_auth']['uid'];
		// $count= $m->where(array('uid' =>$uid))->count();// 查询满足要求的总记录数
		// $Page  = new \Think\Page($count,20);
		// $show       = $Page->show();// 分页显示输出
		// $info = $m->table('ez_olapplication a, ez_keep b')
		// ->where('a.id = b.cid')
		// ->order('b.id desc' )
		// ->limit($Page->firstRow.','.$Page->listRows)
		// ->select();
		

		$this->assign('info',$info);
		//$this->assign('page',$show);// 赋值分页输出
		$this->display('sclist');
	}
	
	/**
	 * 取消收藏
	 */
	 /*Public function cancelKeep () {
		$id = $_GET['wid'];
        $m =M("Keep");
        $result = $m->where("wid = {$id}")->delete();
        if($result>0){
            $this->success("成功！");
        }else{
            $this->error("失败！");
        }
    }*/

	 
	Public function cancelKeep () {
		//$kid =$this->$_POST['id'];
		$wid =$_POST['wid'];
		if (M('Keep')->delete($wid)) {
			echo $M->getLastSql();exit;
			M('Olapplication')->where(array('id' => $wid))->setDec('keep');
			echo 1;
		} else {
			echo 0;
		}
	}

	


	/* 注册页面 */
	public function register_iframe($username = '', $password = '', $repassword = '', $email = '', $verify = ''){
        if(!C('USER_ALLOW_REGISTER')){
            $this->error('注册已关闭');
        }
		if(IS_POST){ //注册用户

		    if(C("IS_REG_CODE")){

    			/* 检测验证码 */
    			if(!check_verify($verify)){
    				$this->error('验证码输入错误！');
    			}

		    }

		    if(!$_POST['web_rule']){
		    	$this->error('请先阅读乔麦网用户协议！');
		    }

			/* 检测密码 */
			if($password != $repassword){
				//$this->error('密码和重复密码不一致！');
			}

			if(!isset($_POST['type'])){
			    $this->error("请选择使用jobsminer的目的");//$this->showRegError(-6)
			}

			if(!$_POST['email']){
			    $this->error("请输入正确的邮箱地址");//$this->showRegError(-6)
			}

			if(!$_POST['password']){
			    $this->error("请输入密码");
			}
			elseif(strlen($_POST['password'])<6){
			    $this->error("密码长度不能少于6位");
			}

			if(!$username && !$_POST['username'] && $_POST['email']){
			    $username = rand(100,999)."_".$_POST['email'];
			}

			$password = $_POST['password'];
			$email = $_POST['email'];
			$type = intval($_POST['type']);

			if(!isEmail($email)){
			    $this->error("邮箱地址有误，请更换");
			}

			if($type==1 && !checkIsCompanyEmail($email) ){
			    $this->error("请输入有效的企业邮箱地址");
			}

			$isbind = 0;
			if(isset($_SESSION[$_SESSION['other_login_type'].'_uid'])&&isset($_SESSION['other_login_type'])){
			    $accesstoken_new = md5($_SESSION['other_login_type']."+".$_SESSION[$_SESSION['other_login_type'].'_uid']);
			    if($accesstoken_new==$_POST['resubmitToken']){
			        $isbind = 1;
			    }
			}

			//echo $isbind;print_test($_SESSION);

			/* 调用注册接口注册用户 */
            $User = new UserApi;

			$uid = $User->register($username, $password, $email);
			if(0 < $uid){ //注册成功
				//TODO: 发送验证邮件

			    //写入从表
			    $save = array(
			        'uid'=>$uid,
			        'reg_ip'=>get_client_ip(1),
			        'reg_time'=>NOW_TIME,
			        'type'=>$type,
			        'user_status'=>1,
			    );

			    if($isbind==1){
			        $save[$_SESSION['other_login_type'].'_open_id'] = $_SESSION[$_SESSION['other_login_type'].'_uid'];
			        $save[$_SESSION['other_login_type'].'_name'] = $_SESSION[$_SESSION['other_login_type'].'_nickname'];
			        $save[$_SESSION['other_login_type'].'_bind_time'] = time();
			    }

			    M("member")->add($save,'',1);

			    //unset($_SESSION['token']);
			    session("ot_home",NULL);
			    unset($_SESSION[$_SESSION['other_login_type'].'_uid']);
			    unset($_SESSION[$_SESSION['other_login_type'].'_nickname']);
			    unset($_SESSION[$_SESSION['other_login_type'].'_token']);
			    unset($_SESSION[$_SESSION['other_login_type'].'_access_token']);
			    unset($_SESSION[$_SESSION['other_login_type'].'_user_info']);
			    unset($_SESSION['other_login_type']);
			    session($_SESSION['other_login_type'].'_user_info',NULL);


			    $this->uid = $uid;
			    $this->user_status = 1;
			    $this->type = $type;

			    addDefaultTpl($this->uid,1);
			    addDefaultTpl($this->uid,2);


			    //$uid2 = $User->login($email, $password,2);

			    $Member = D('Member');
			    if($Member->login($uid)){ //登录用户
			        if($type==1){
			            $u = "/Company/openZhaopin";
			        }
			        else {
			            if(IS_WAP){
			                $u = '/Resume/wapbasic_iframe';
			            }
			            else $u = '/User/checkEmail_iframe';
			        }
			    }
			    else {
			        $u = '/User/login';
			    }

			    //注册成功  发送激活邮件    然后直接登录
			    if($type==0){
			        $this->sendActiveEmail($uid,$email);
			    }
			 	// cookie('uid',$uid,24*3600*30);
				// cookie('login',1,24*3600*30);
				// cookie('ez_uid',$uid,24*3600*30);

				if($u != '/Resume/myresume'){
					cookie('gotourl',$u);
				}else{
					cookie('gotourl',null);
				}
			    $this->success('注册成功！',$u);

			} else { //注册失败，显示错误信息
				$this->error($this->showRegError($uid));
			}

		} else { //显示注册表单
		    if(is_login()){
		        D('Member')->logout();
		    }
		    $this->assign("show_nav",IS_WAP?1:0);
		    $webRule = require_once DATA_PATH."webRule.php";
		    $this->assign("webRule",$webRule);
			$this->display();
		}
	}
	
	/* 登录页面 */
	public function login_iframe($username = '', $password = '', $verify = ''){
	    
	    if($_GET['ref']){
	        $_SESSION['go_to_url'] = urlencode($_GET['ref']);
	    }


		if(IS_POST){ //登录验证

		    if(C("IS_LOGIN_CODE")){
    			/* 检测验证码 */
    			if(!check_verify($verify)){
    				$this->error('验证码输入错误！');
    			}
		    }

		    if(!$_POST['email']){
		        $this->error("请输入正确的邮箱地址");
		    }

		    if(!$_POST['password']){
		        $this->error("请输入密码");
		    }

		    $username = $_POST['email'];
		    $password = $_POST['password'];



			/* 调用UC登录接口登录 */
			$user = new UserApi;
			$uid = $user->login($username, $password,2);
			if(0 < $uid){ //UC登录成功
				/* 登录用户 */
				$Member = D('Member');
				if($Member->login($uid)){ //登录用户
					//TODO:跳转到登录前页面

				    $isbind = 0;
				    if(isset($_SESSION[$_SESSION['other_login_type'].'_uid'])&&isset($_SESSION['other_login_type'])){
				        $accesstoken_new = md5($_SESSION['other_login_type']."+".$_SESSION[$_SESSION['other_login_type'].'_uid']);
				        if($accesstoken_new==$_POST['resubmitToken']){
				            $isbind = 1;
				        }
				    }

				    if($isbind==1){
				        $save = array();
				        $save[$_SESSION['other_login_type'].'_open_id'] = $_SESSION[$_SESSION['other_login_type'].'_uid'];
				        $save[$_SESSION['other_login_type'].'_name'] = $_SESSION[$_SESSION['other_login_type'].'_nickname'];
				        $save[$_SESSION['other_login_type'].'_bind_time'] = time();
				        M("member")->where(array("uid"=>$uid))->save($save);

				        session("ot_home",NULL);
				        unset($_SESSION[$_SESSION['other_login_type'].'_uid']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_nickname']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_token']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_access_token']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_user_info']);
				        unset($_SESSION['other_login_type']);
				        session($_SESSION['other_login_type'].'_user_info',NULL);
				    }

				    $last_page = strtolower($_SERVER['HTTP_REFERER']);
					/*if($_SESSION['go_to_url'] && strpos($_SESSION['go_to_url'], strtolower("/login") ) === false && strpos($_SESSION['go_to_url'], strtolower("/logout") ) === false && strpos($_SESSION['go_to_url'], strtolower("/register") ) === false){
					    $gotourl = urldecode($_SESSION['go_to_url']);
					    unset($_SESSION['go_to_url']);
					}
					else if( $isbind==0 && $_SERVER['HTTP_REFERER'] && strpos($last_page, strtolower("/login") ) === false && strpos($last_page, strtolower("/logout") ) === false && strpos($last_page, strtolower("/register") ) === false ){
            	        $gotourl = $_SERVER['HTTP_REFERER'];

            	    }
					else{*/
					    $userinfo = getUsersSession();
					    if($userinfo['type']==1){
					        if ($userinfo['status']<2){
					            $gotourl = '/Company/openZhaopin';
					        }
					        /* else if ($userinfo['status']<100){
					         $gotourl = '/Company/cinfo';
					         } */
					        else $gotourl = '/Company/cinfo';
					    }
					    else {
					        $gotourl = '/Resume/myresume';
					        if( $userinfo['status'] < 2 ) {
					            if(IS_WAP){
					                $gotourl = '/Resume/wapbasic_iframe';
					            }
					            else $gotourl = '/User/checkEmail_iframe';
					        }
					        else if( $userinfo['status'] == 2 ) {
					        	if($userinfo['realname']){
					            	$gotourl = '/Resume/myresume';
					            }else{
					            	$gotourl = '/Resume/wapbasic_iframe';
					            }
					        }
					    }
					//}
					cookie('uid',$uid,24*3600*30);
					cookie('login',1,24*3600*30);
					cookie('ez_uid',$uid,24*3600*30);

					if($gotourl != '/Resume/myresume'){
						cookie('gotourl',$gotourl);
						$this->success('登录成功！',$gotourl);
					}else{
						cookie('gotourl',null);
						$this->success('登录成功！','http://www.jobsminer.cc/User/checkLogin?callback=jmLogin.checkLoginCallback');
					}

				} else {
					$this->error($Member->getError());
				}

			} else { //登录失败
				switch($uid) {
					case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
					case -2: $error = '密码错误！'; break;
					default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
				}
				$this->error($error);
			}

		} else { //显示登录表单

		    if(!$_SESSION['go_to_url'] && $_SERVER['HTTP_REFERER']){
		        $_SESSION['go_to_url'] = $_SERVER['HTTP_REFERER'];
		    }
		    
		    
		    if($_GET['md']=="min"){
		         
		         
		         
		         
		    }
		    else{
		         
		        $cookie_uid = cookie('ez_uid');
		        if($cookie_uid>0 && !$_SESSION['other_login_type'] && !isset($_SESSION[$_SESSION['other_login_type'].'_uid']) ){
		            $Member = D('Member');
		            if($Member->login($cookie_uid)){ //登录用户
		                $last_page = strtolower($_SERVER['HTTP_REFERER']);
		                if($_SESSION['go_to_url'] && strpos($_SESSION['go_to_url'], strtolower("/login") ) === false && strpos($_SESSION['go_to_url'], strtolower("/logout") ) === false && strpos($_SESSION['go_to_url'], strtolower("/register") ) === false){
		                    $gotourl = urldecode($_SESSION['go_to_url']);
		                    unset($_SESSION['go_to_url']);
		                }
		                else if( $_SERVER['HTTP_REFERER'] && strpos($last_page, strtolower("/login") ) === false && strpos($last_page, strtolower("/logout") ) === false && strpos($last_page, strtolower("/register") ) === false ){
		                    $gotourl = $_SERVER['HTTP_REFERER'];
		                }
		                else{
		                    $userinfo = getUsersSession();
		                    if($userinfo['type']==1){
		                        if ($userinfo['status']<2){
		                            $gotourl = '/Company/openZhaopin';
		                        }
		                        /* else if ($userinfo['status']<100){
		                         $gotourl = '/Company/cinfo';
		                         } */
		                        else $gotourl = '/Company/cinfo';
		                    }
		                    else {
		                        $gotourl = '/Resume/myresume';
		                        if( $userinfo['status'] < 2 ) {
		                            $gotourl = '/User/checkEmail';
		                        }
		                        else if( $userinfo['status'] == 2 ) {
		                            $gotourl = '/Resume/myresume';
		                        }
		                    }
		                }
		        
		                $this->redirect($gotourl);
		                exit;
		        
		            }
		        
		        
		        }
		        
		         
		    }


		    $this->assign("show_nav",IS_WAP?1:0);
			$this->display();
		}
	}
	
	/* 登录页面 */
	public function login($username = '', $password = '', $verify = ''){
	    
	    if($_GET['ref']){
	        $_SESSION['go_to_url'] = urlencode($_GET['ref']);
	    }


		if(IS_POST){ //登录验证

		    if(C("IS_LOGIN_CODE")){
    			/* 检测验证码 */
    			if(!check_verify($verify)){
    				$this->error('验证码输入错误！');
    			}
		    }

		    if(!$_POST['email']){
		        $this->error("请输入正确的邮箱地址");
		    }

		    if(!$_POST['password']){
		        $this->error("请输入密码");
		    }

		    $username = $_POST['email'];
		    $password = $_POST['password'];



			/* 调用UC登录接口登录 */
			$user = new UserApi;
			$uid = $user->login($username, $password,2);
			if(0 < $uid){ //UC登录成功
			    
			    
			    //微信绑定检查
			    $is_wx_bind = 0;
			    if( isWeixinBrowser() ){
			        
			        if( !in_array(session("wx_hash"), array("cwxu","bwxu")) ){
			            $this->error("来源无效");
			        }
			        
			        if(!session("wx_openid")){
			            $this->error("授权失败，请重新发起请求");
			        }
			        
			        $check_wxbind = checkUserWxBind(session("wx_openid"));
			        if($check_wxbind){
			            $this->error("您已经成功绑定其他账号，不能再次绑定！");
			        }
			        
			        $wmu = M("member")->where(array('uid'=>$uid))->find();
			        if($wmu){
			            if( $wmu['bind_openid'] ){
			                
			            }
			            else{
			                if( session("wx_hash") == "cwxu" && $wmu['type']!=0 ){
			                    $this->error("当前用户只能绑定Jobsminer服务号");
			                }
			                else if( session("wx_hash") == "bwxu" && $wmu['type']!=1 ){
			                    $this->error("当前用户只能绑定企业服务号");
			                }
			                else{
			                    /* $data['bind_openid'] = session("wx_openid");
			                    $data['bind_status'] = 1; */
			                    $is_wx_bind = 1;
			                }
			            }
			        }
			        else{
			            $this->error("用户绑定失败，请联系管理员");
			        }
			        
			    }
			    
			    
			    
			    
				/* 登录用户 */
				$Member = D('Member');
				if($Member->login($uid)){ //登录用户
					//TODO:跳转到登录前页面

				    $isbind = 0;
				    if(isset($_SESSION[$_SESSION['other_login_type'].'_uid'])&&isset($_SESSION['other_login_type'])){
				        $accesstoken_new = md5($_SESSION['other_login_type']."+".$_SESSION[$_SESSION['other_login_type'].'_uid']);
				        if($accesstoken_new==$_POST['resubmitToken']){
				            $isbind = 1;
				        }
				    }

				    if($isbind==1){
				        $save = array();
				        $save[$_SESSION['other_login_type'].'_open_id'] = $_SESSION[$_SESSION['other_login_type'].'_uid'];
				        $save[$_SESSION['other_login_type'].'_name'] = $_SESSION[$_SESSION['other_login_type'].'_nickname'];
				        $save[$_SESSION['other_login_type'].'_bind_time'] = time();
				        M("member")->where(array("uid"=>$uid))->save($save);

				        session("ot_home",NULL);
				        unset($_SESSION[$_SESSION['other_login_type'].'_uid']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_nickname']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_token']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_access_token']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_user_info']);
				        unset($_SESSION['other_login_type']);
				        session($_SESSION['other_login_type'].'_user_info',NULL);
				    }

				    $last_page = strtolower($_SERVER['HTTP_REFERER']);
					if($_SESSION['go_to_url'] && strpos($_SESSION['go_to_url'], strtolower("/login") ) === false && strpos($_SESSION['go_to_url'], strtolower("/logout") ) === false && strpos($_SESSION['go_to_url'], strtolower("/register") ) === false){
					    $gotourl = urldecode($_SESSION['go_to_url']);
					    unset($_SESSION['go_to_url']);
					}
					else if( $isbind==0 && $_SERVER['HTTP_REFERER'] && strpos($last_page, strtolower("/login") ) === false && strpos($last_page, strtolower("/logout") ) === false && strpos($last_page, strtolower("/register") ) === false ){
            	        $gotourl = $_SERVER['HTTP_REFERER'];

            	    }
					else{
					    $userinfo = getUsersSession();
					    if($userinfo['type']==1){
					        if ($userinfo['status']<2){
					            $gotourl = '/Company/openZhaopin';
					        }
					        /* else if ($userinfo['status']<100){
					         $gotourl = '/Company/cinfo';
					         } */
					        else $gotourl = '/Company/cinfo';
					    }
					    else {
					        $gotourl = '/Resume/myresume';
					        if( $userinfo['status'] < 2 ) {
					            if(IS_WAP){
					            	//$gotourl = '/Resume/wapbasic';
					                $gotourl = '/Resume/wapbasic_iframe';
					            }
					            else $gotourl = '/User/checkEmail';
					        }
					        else if( $userinfo['status'] == 2 ) {
					            $gotourl = '/Resume/myresume';
					        }
					    }
					}

					if($_POST['autoLogin']){

					    cookie('ez_uid',$uid,24*3600*30);
					}
					cookie('uid',$uid,24*3600*30);
					cookie('login',1,24*3600*30);
					cookie('ez_uid',$uid,24*3600*30);

					if($is_wx_bind){
					    $this->success('绑定成功！',888);
					}
					else $this->success('登录成功！',$gotourl);
				} else {
					$this->error($Member->getError());
				}

			} else { //登录失败
				switch($uid) {
					case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
					case -2: $error = '密码错误！'; break;
					default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
				}
				$this->error($error);
			}

		} else { //显示登录表单

		    if(!$_SESSION['go_to_url'] && $_SERVER['HTTP_REFERER']){
		        $_SESSION['go_to_url'] = $_SERVER['HTTP_REFERER'];
		    }
		    
		    
		    if($_GET['md']=="min"){
		         
		         
		         
		         
		    }
		    else{
		         
		        $cookie_uid = cookie('ez_uid');
		        if($cookie_uid>0 && !$_SESSION['other_login_type'] && !isset($_SESSION[$_SESSION['other_login_type'].'_uid']) ){
		            $Member = D('Member');
		            if($Member->login($cookie_uid)){ //登录用户
		                $last_page = strtolower($_SERVER['HTTP_REFERER']);
		                if($_SESSION['go_to_url'] && strpos($_SESSION['go_to_url'], strtolower("/login") ) === false && strpos($_SESSION['go_to_url'], strtolower("/logout") ) === false && strpos($_SESSION['go_to_url'], strtolower("/register") ) === false){
		                    $gotourl = urldecode($_SESSION['go_to_url']);
		                    unset($_SESSION['go_to_url']);
		                }
		                else if( $_SERVER['HTTP_REFERER'] && strpos($last_page, strtolower("/login") ) === false && strpos($last_page, strtolower("/logout") ) === false && strpos($last_page, strtolower("/register") ) === false ){
		                    $gotourl = $_SERVER['HTTP_REFERER'];
		                }
		                else{
		                    $userinfo = getUsersSession();
		                    if($userinfo['type']==1){
		                        if ($userinfo['status']<2){
		                            $gotourl = '/Company/openZhaopin';
		                        }
		                        /* else if ($userinfo['status']<100){
		                         $gotourl = '/Company/cinfo';
		                         } */
		                        else $gotourl = '/Company/cinfo';
		                    }
		                    else {
		                        $gotourl = '/Resume/myresume';
		                        if( $userinfo['status'] < 2 ) {
		                            $gotourl = '/User/checkEmail';
		                        }
		                        else if( $userinfo['status'] == 2 ) {
		                            $gotourl = '/Resume/myresume';
		                        }
		                    }
		                }
		        
		                $this->redirect($gotourl);
		                exit;
		        
		            }
		        
		        
		        }
		        
		         
		    }


		    $this->assign("show_nav",IS_WAP?1:0);
			$this->display();
		}
	}

	/* 退出登录 退出的逻辑为返回退出后的当前页面, 如果当前页面是 我的简历, 我的收藏, 投递管理, 账号设置; 我的公司, 简历管理, 发布职位; 等需要登录后才能打开的页面, 则退出后回到首页. */
	public function logout(){
	    cookie('ez_uid',NULL);
	    $last_page = $goto_page = '';
	    if($_SERVER['HTTP_REFERER']){
	        $last_page = strtolower($_SERVER['HTTP_REFERER']);
	    }
	    //exit($last_page);
	    if($last_page){
	        if( strpos($last_page, strtolower("/cinfo") ) === false
	            && strpos($last_page, strtolower("/company/interview") ) === false
	            && strpos($last_page, strtolower("/company/createpost") ) === false
	            && strpos($last_page, strtolower("/user/index") ) === false
	            && strpos($last_page, strtolower("/user/template") ) === false
	            && strpos($last_page, strtolower("/user/delivery") ) === false
	            && strpos($last_page, strtolower("/user/collections") ) === false
	            && strpos($last_page, strtolower("/resume/myresume") ) === false
	            && strpos($last_page, strtolower("/resume/otherresume") ) === false
	            && strpos($last_page, strtolower("/user/checkemail") ) === false
	            && strpos($last_page, strtolower("/user/resendemail") ) === false
	            && strpos($last_page, strtolower("/user/sendactiveemail") ) === false

	        ){
	            $goto_page = $_SERVER['HTTP_REFERER'];
	        }
	        else $goto_page = WEB_URL;
	    }
	    else $goto_page = WEB_URL;//'User/login';
	    $goto_page = str_replace(".html", "", $goto_page);
	    session_destroy();
	    cookie('uid',NULL);
	    cookie('login',NULL);
		if(is_login()){
		    session(NULL);
		    session("token",NULL);
		    session("ot_home",NULL);
			D('Member')->logout();
			//$this->success('退出成功！', U('User/login'));
			$this->redirect($goto_page);
		} else {
		    session(NULL);
		    session("token",NULL);
		    session("ot_home",NULL);
		    D('Member')->logout();
			$this->redirect($goto_page);
		}
		//print_test($_SESSION);
		exit;
	}

	/* 退出登录 退出的逻辑为返回退出后的当前页面, 如果当前页面是 我的简历, 我的收藏, 投递管理, 账号设置; 我的公司, 简历管理, 发布职位; 等需要登录后才能打开的页面, 则退出后回到首页. */
	public function logout_iframe(){
	    cookie('ez_uid',NULL);
	    $last_page = $goto_page = '';
	    if($_SERVER['HTTP_REFERER']){
	        $last_page = strtolower($_SERVER['HTTP_REFERER']);
	    }
	    //exit($last_page);
	    if($last_page){
	        if( strpos($last_page, strtolower("/cinfo") ) === false
	            && strpos($last_page, strtolower("/company/interview") ) === false
	            && strpos($last_page, strtolower("/company/createpost") ) === false
	            && strpos($last_page, strtolower("/user/index") ) === false
	            && strpos($last_page, strtolower("/user/template") ) === false
	            && strpos($last_page, strtolower("/user/delivery") ) === false
	            && strpos($last_page, strtolower("/user/collections") ) === false
	            && strpos($last_page, strtolower("/resume/myresume") ) === false
	            && strpos($last_page, strtolower("/resume/otherresume") ) === false
	            && strpos($last_page, strtolower("/user/checkemail") ) === false
	            && strpos($last_page, strtolower("/user/resendemail") ) === false
	            && strpos($last_page, strtolower("/user/sendactiveemail") ) === false

	        ){
	            $goto_page = $_SERVER['HTTP_REFERER'];
	        }
	        else $goto_page = WEB_URL;
	    }
	    else $goto_page = WEB_URL;//'User/login';
	    $goto_page = str_replace(".html", "", $goto_page);
	    session_destroy();
	    cookie('uid',NULL);
	    cookie('login',NULL);
		if(is_login()){
		    session(NULL);
		    session("token",NULL);
		    session("ot_home",NULL);
			D('Member')->logout();
			//$this->success('退出成功！', U('User/login'));
			
		} else {
		    session(NULL);
		    session("token",NULL);
		    session("ot_home",NULL);
		    D('Member')->logout();
		}
		//print_test($_SESSION);
		$this->exitJson(1,true,'退出成功！');
		exit;
	}

	/* 验证码，用于登录和注册 */
	public function verify(){
		$config =    array(
		    //'fontSize'    =>    25,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		   // 'useNoise'    =>    false, // 关闭验证码杂点
		    'imageW' => 180,
		    'imageH' => 46
		);
		$verify = new \Think\Verify($config);
		$verify->entry(1);
	
		
	}

	/**
	 * 获取用户注册错误信息
	 * @param  integer $code 错误编码
	 * @return string        错误信息
	 */
	private function showRegError($code = 0){
		switch ($code) {
			case -1:  $error = '用户名长度必须在16个字符以内！'; break;
			case -2:  $error = '用户名被禁止注册！'; break;
			case -3:  $error = '用户名被占用！'; break;
			case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
			case -5:  $error = '邮箱格式不正确！'; break;
			case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
			case -7:  $error = '邮箱被禁止注册！'; break;
			case -8:  $error = '邮箱被占用！'; break;
			case -9:  $error = '手机格式不正确！'; break;
			case -10: $error = '手机被禁止注册！'; break;
			case -11: $error = '手机号被占用！'; break;
			default:  $error = '未知错误';
		}
		return $error;
	}


    //公共跳转页面
    public function message($type=0){
        if(!$type){
            $type = intval($_REQUEST['stype']);
        }
        $tpl = $go = '';
        switch ($type){
            case 1:
                $tpl = "恭喜你，注册成功！";
                $go = "/Home/User/login.html";
                break;

        }
        if(!$tpl){
            header("Location:/index.php");
            exit;
        }
        if($type>0){
            $this->success($tpl,$go);
        }
        else $this->error($tpl);
    }


    //检查城市
    //{"code":0,"success":true,"requestId":null,"msg":null,"resubmitToken":null,"content":null}
    function checkCity(){
        $city = addslashes(trim($_REQUEST['city']));
        if($city){
            $city = str_replace("市", "", $city);
            $check = CheckPlaceName($city);
            if($check){
                $this->exitJson(0,true,'');
            }
            else $this->exitJson(1,false,'城市名有误，请重新输入');
        }
        else $this->exitJson(1,false,'请输入城市名称');
    }
    function customize(){
    	$this->display();
    }

    //简历预览
    function resumePreview($fuid=0,$return=0){

        $myuid = $this->uid;
        if(!$myuid ){
            //$this->error("请先登录","/User/login");
        }

        $isview = intval($_GET['uid']);
        $aid = intval($_GET['aid']);
        $view_contact = 0;
        if($this->type ) {
            $map = array('uid'=>$isview,"company_id"=>$myuid);//,"view_contact"=>1
            if($aid){
                $map['aid'] = $aid;
            }
            if(!$isview){
                $this->error("参数无效","/User/login");
            }
            $check = M("jobs_apply")->where($map)->find();
            if(!$check){
                $this->error("参数无效","/Index/");
            }
            
            if($check['rid']){
                $this->redirect("/Resume/downResume/id/".$check['rid']."/aid/".$check['aid']);
                exit;
            }
            
            $view_contact = $check['view_contact']?1:0;
        }
        else{
            
            if($myuid){
                
                if(!$isview){
                    $isview = $myuid;
                }
                
            }
            else{
                
                if(!$isview){
                    $this->error("参数无效","/User/login");
                }
                
                $map = array('uid'=>$isview);//,"view_contact"=>1
                if($aid){
                    $map['aid'] = $aid;
                }
                
                $check = M("jobs_apply")->where($map)->find();
                if(!$check){
                    $this->error("参数无效","/Index/");
                }
                
                if($check['rid']){
                    $this->redirect("/Resume/downResume/id/".$check['rid']."/aid/".$check['aid']);
                    exit;
                }
                
            }
                       
        	
        }
        
        if(!$isview){
            $this->error("参数无效！",WEB_URL);
        }

        $fuid= $isview;

        $info = $this->getUsersInfoById($fuid);
        if(!$info){
            $this->error("参数无效,不存在该用户！",WEB_URL);
        }

        $array = array(
            'info'=>$info,
            'fuid'=>$fuid,
            'return'=>$return,
            'view_contact'=>$view_contact,
            'isview'=>$isview,
            'aid'=>$aid,
            'downkey'=>md5($myuid.date("Y-m-d").$fuid),
            'exp_list'=>getUsersWorkExperience($fuid),
            'edu_list'=>getUsersEduExperience($fuid),
            'pro_list'=>getUsersProExperience($fuid),
            'work_list'=>getUsersWorks($fuid),
            'skill_list'=>getUsersSkill($fuid),
            'custom_model'=>getUserDefine($fuid),
        );
        $this->assign($array);
        if($return){
            return $this->fetch("/User/resumePreview");
        }
        else $this->display("/User/resumePreview");
    }

    //简历下载
    function downloadResume(){

        $this->checkUser();
        $uid = $this->uid;

        $info = $this->getUsersInfoById($uid);
        if(!$info){
            $this->error("参数无效！",WEB_URL);
        }

        $key = addslashes(trim($_GET['key']));
        $type = intval($_GET['type']);

        $fuid = intval($_GET['uid']);

        $newkey = md5($uid.date("Y-m-d").$fuid);
        if($key!=$newkey || !$type){
            $this->error("请刷新页面重试！");
        }
        else{
            if($type==1){
                //word  http://127.0.0.1:500/Jobs/resumePreview

                //$content = file_get_contents(WEB_URL."Jobs/resumePreview/uid/$fuid");
                $content = $this->resumePreview($fuid,1);

                $fileContent = $this->getWordDocument($content,WEB_URL."Public/");
                /* $fp = fopen("test2.doc", 'w');
                 fwrite($fp, $fileContent);
                fclose($fp); */

                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                $wordStr = '个人简历';
                $fileName = iconv("utf-8", "GBK", $wordStr . '_' . rand(100, 999));
                header("Content-Type: application/doc");
                header("Content-Disposition: attachment; filename=" . $fileName . ".doc");
                echo $fileContent;

            }
            elseif($type==2){
                //html
                $fileContent = $this->resumePreview($fuid,1);

                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                Header("Accept-Ranges: bytes");
                $wordStr = '个人简历';
                $fileName = iconv("utf-8", "GBK", $wordStr . '_' . rand(100, 999));
                //header("Content-Type: application/doc");
                Header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=" . $fileName . ".html");
                echo $fileContent;

                exit();
            }
            else $this->error("请刷新页面重试！");
        }
    }

    function collectOnlineApp(){
    	$this->display();
    }


    //收藏职位
    function collections(){

        if(!$this->uid){
            $this->error("请先登录","/User/login");
        }
        
        if(!IS_WAP){
            $this->checkUser();
        }
        
        $type = intval($_REQUEST['type']);

        if($type==2){//公司
			$map = array(
				'c.uid'=>$this->uid,
				'c.type'=>2,
				//'mf.company_name'=>array('neq',''),
				//'m.type'=>100,
			);
			$list = M("collection")->table(C('DB_PREFIX')."collection c")
			//->join(C('DB_PREFIX')."member m on m.com_id = c.toid","left")
			//->join(C('DB_PREFIX')."ucenter_member um on m.uid = um.id","left")
			->join(C('DB_PREFIX')."company com on com.com_id = c.toid","left")
			->where($map)->field("com.*, c.addtime as ctime,c.toid")->order(" c.addtime desc")->limit('0,100')->select();

			foreach ($list as $kk=>$vv){
			    $list[$kk]['jobs_arr'] = M("jobs")->where(array("com_id"=>$vv['com_id']))->order("jid desc")->limit("0,5")->select();
			}

        }
        elseif($type==3){//宣讲会
        	$map = array(
        		'c.uid'=>$this->uid,
        		'c.type'=>3,
        	);
        	$list = M("collection")->table(C('DB_PREFIX')."collection c")
        	->join(C('DB_PREFIX')."video v on c.toid = v.vid","left")
        	->join(C('DB_PREFIX')."company com on v.com_id = com.com_id","left")
        	//->join(C('DB_PREFIX')."ucenter_member um on m.uid = um.id")
        	->where($map)->field(" c.addtime as ctime,c.toid,com.*,v.*")->order(" c.addtime desc")->limit('0,100')->select();
            foreach ($list as $k=>$v){
                if(!$v['company_name'] && !$v['company_short_name'] && $v['company']){
                    $list[$k]['company_name'] = $list[$k]['company_short_name'] = $v['company'];
                }
            }
        }
        else{
        	//职位
			$type = 1;
			$map = array(
				'c.uid'=>$this->uid,
				'c.type'=>1,
				//'mf.company_name'=>array('neq',''),
				//'m.status'=>100,
			);
			$list = M("collection")->table(C('DB_PREFIX')."collection c")
			->join(C('DB_PREFIX')."jobs j on c.toid = j.jid","left")
			->join(C('DB_PREFIX')."company com on j.com_id = com.com_id","left")
			//->join(C('DB_PREFIX')."member m on j.uid = m.uid","left")
			//->join(C('DB_PREFIX')."ucenter_member um on m.uid = um.id","left")
			->where($map)->field(" c.addtime as ctime,c.toid,j.*,com.* ")->order(" c.addtime desc")->limit('0,100')->select();
        }

        $this->assign("show_foot",IS_WAP?0:1);

        $this->assign("cur_top_nav",array("collections"=>'class="current"') );
        $this->assign( array('list'=>$list,"type"=>$type,"lmenu"=>array($type=>'class="cur"')) );
        $this->display();
    }

    //添加到收藏夹
    function collectAdd(){
        //$this->checkUser();

        if(!$this->uid){
            $this->exitJson(0,false,"请先登录",array("showStts"=>1,'do_type'=>-1,"goto_url"=>"/User/login"));
        }

        if($this->type>0){
            $this->exitJson(0,false,"Hr无收藏服务",array("showStts"=>1));
        }
        //$toid = intval($_REQUEST['toid']);
        $flag = intval($_REQUEST['flag']);//1job2company3video
        $type = intval($_REQUEST['type']);

        $toid = intval($_REQUEST['positionId']);
        if(!$toid){
            $toid = intval($_REQUEST['id']);
        }

        if(!$toid || !$flag){
            $this->exitJson(0,false,"参数无效",array("showStts"=>1));
        }

        if( in_array($flag, array(1,2,3)) && $toid ){

            if($type){

                $data = array(
                    'uid'=>$this->uid,
                    'toid'=>$toid,
                    'type'=>$flag,
                    'addtime'=>time(),
                );
                M("collection")->add($data);
                $this->exitJson(0,true,"收藏成功",array("showStts"=>0));
                //$this->success("操作成功！");
            }
            else{
                M("collection")->where(array("uid"=>$this->uid,"toid"=>$toid,"type"=>$flag))->delete();
                /* $res = array(
                    'info'=>"已取消收藏",
                    'code'=>0,
                    'status'=>true,
                    'url'=>1,
                );
                exit(json_encode($res)); */
                $this->exitJson(0,true,"取消成功！",array("showStts"=>1));
            }

        }
        else $this->exitJson(0,false,"操作失败，请稍后再试",array("showStts"=>1));
    }


    //我要订阅
    function subscribe(){

        $this->checkUser();
        $uid = $this->uid;

        $myinfo = $this->getUsersInfoById($uid);
        if(!$myinfo){
            $this->error('参数无效');
        }

        if(isset($_POST['resubmitToken'])){
            //订阅职位
            $sarr = explode("-", trim($_REQUEST['salary']));
            $data = array(
                'uid'=>$uid,
                'city'=>trim($_REQUEST['city']),
                'email'=>trim($_REQUEST['email']),

                'industryField'=>trim($_REQUEST['industryField']),
                'positionName'=>trim($_REQUEST['positionName']),
                'salary_min'=>str_replace("k", "", $sarr[0]),
                'salary_max'=>str_replace("k", "", $sarr[1]),
                'sendMailPer'=>trim($_REQUEST['sendMailPer']),
                'addtime'=>time(),
                'financeStage'=>trim($_REQUEST['financeStage']),
            );

            $rs = M("subscribe")->add($data,'',true);

            $json = array(
                'code'=>0,
                'success'=>true,
                'msg'=>'',
                'content'=>array('code'=>0),
            );

            exit(json_encode($json));
        }

        $sub = M("subscribe")->where(array('uid'=>$uid))->find();

        $array = array('myinfo'=>$myinfo,'sub'=>$sub);
        $this->assign($array);
        $this->display();

    }

    //取消订阅职位
    function subcancel(){
        $this->checkUser();
        $uid = $this->uid;
        M("subscribe")->where(array('uid'=>$uid))->delete();
        $this->success("取消成功。");
    }

    //获取我所有简历
    function getAllResumes(){

        $this->checkUser();
        $uid = $this->uid;
        $info = $this->getUsersInfoById($uid);
        $arr = array(
            "requestId"=>null,
            "code"=>0,
            "success"=>true,
            "msg"=>"ok",
            "resubmitToken"=>null,
            "content"=>array(
                array(
                    "perfect"=>$info['other_resume']?true:false,
                    "score"=>100,
                    "isDefault"=>$info['default_select']==0?true:false,
                    "name"=>$info['other_resume_name'],
                    "id"=>-1,
                    "type"=>0,
                    "time"=>date("Y-m-d H:i:s",$info['other_resume_time'])
                ),
                array(
                    "perfect"=>true,
                    "score"=>$info['score_jiben']+$info['score_qiwang']+$info['score_jingyan']+$info['score_xiangmu']+$info['score_jiaoyu']+$info['score_miaoshu']+$info['score_zuopin'],
                    "isDefault"=>$info['default_select']==1?true:false,
                    "name"=>$info['resume_name'],
                    "id"=>$info['uid'],
                    "type"=>1,
                    "time"=>$info['update_time']?date("Y-m-d H:i:s",$info['update_time']):"",
                ),
            )

        );

        exit(json_encode($arr));
    }


    //获取我今天投递简历数量
    function getMyTodayJianliCount(){
        $start_time = strtotime(date("Y-m-d"));
        $count = M("Jobs_apply")->where( "uid = '".$this->uid."' and addtime>='$start_time' ")->count();
        return $count;
    }



    //提交投递简历
    function deliverResume(){
        $this->checkUser();
        $jid = intval($_POST['positionId']);
        $remember = intval($_POST['remember']);
        //$type = intval($_POST['type']);
        $resume_id = intval($_POST['resume_id']);
        if(!$resume_id && $_POST['resume_id']!="online" ){
            $this->error("请选择你要投递的简历");
        }

        if( $this->type ){
            $this->error("你当前是企业身份，无法投递简历");
        }

        $tel = trim($_POST['phone']);
        $data = array();
        $time = time();
        $uid = $this->uid;
        if(!$jid){
            $this->error("参数无效");
        }
        else {
            $job = M("jobs")->where(array('jid'=>$jid))->find();
            if(!$job){
                $this->error("参数无效");
            }
            $save = array('uid'=>$uid,'jid'=>$jid);

            $info = M("jobs_apply")->where($save)->find();
            if($info){
                $this->error("该职位你已经投递过简历，请耐心等待回复！");
            }
            else{

                //如果不符合要求的简历   则到自动过滤里面//学历   城市     工作年限
                /* 工作：
                 <li>不限</li>
                 <li>应届毕业生</li>
                 <li>1年以下</li>
                 <li>1-3年</li>
                 <li>3-5年</li>
                 <li>5-10年</li>
                 <li>10年以上</li>

                 <li> 不限 </li>
                 <li> 大专 </li>
                 <li> 本科 </li>
                 <li> 硕士 </li>
                 <li> 博士 </li>
                 */


                /* 用户：
                 <li>大专</li>
                 <li>本科</li>
                 <li>硕士</li>
                 <li>博士</li>
                 <li>其他</li>

                 <li>应届毕业生</li>
                 <li>1年</li>
                 <li>2年</li>
                 <li>3年</li>
                 <li>4年</li>
                 <li>5年</li>
                 <li>6年</li>
                 <li>7年</li>
                 <li>8年</li>
                 <li>9年</li>
                 <li>10年</li>
                 <li>10年以上</li> */

                $status = 0;
                $user = $this->getUsersInfoById($uid);
                if( 1 ){//$user['city']==$job['gongzuo_chengshi']

                    if($job['xueli'] && $job['xueli']!="不限"){

                        if( $job['xueli']=="大专" && in_array($user['edu'], array("其他")) ){
                            $status = -2;
                        }
                        else if( $job['xueli']=="本科" && !in_array($user['edu'], array("本科","硕士","博士")) ){
                            $status = -2;
                        }
                        else if( $job['xueli']=="硕士" && !in_array($user['edu'], array("硕士","博士")) ){
                            $status = -2;
                        }
                        else if( $job['xueli']=="博士" && !in_array($user['edu'], array("博士")) ){
                            $status = -2;
                        }

                    }

                    if($status!=-2){

                        if($job['gongzuo_jingyan']=="不限"){

                        }
                        else if( $job['gongzuo_jingyan']=="应届毕业生" && !in_array($user['workyear'], array("应届毕业生")) ){
                            $status = -2;
                        }
                        else if( $job['gongzuo_jingyan']=="1年以下" && !in_array($user['workyear'], array("应届毕业生","1年","在校学生")) ){
                            $status = -2;
                        }
                        else if( $job['gongzuo_jingyan']=="1-3年" && in_array($user['workyear'], array("应届毕业生","在校学生")) ){
                            $status = -2;
                        }
                        else if( $job['gongzuo_jingyan']=="3-5年" && in_array($user['workyear'], array("1年","2年","应届毕业生","在校学生")) ){
                            $status = -2;
                        }
                        else if( $job['gongzuo_jingyan']=="5-10年" && in_array($user['workyear'], array("3年","4年","1年","2年","应届毕业生","在校学生")) ){
                            $status = -2;
                        }
                        else if( $job['gongzuo_jingyan']=="10年以上" && !in_array($user['workyear'], array("10年以上")) ){
                            $status = -2;
                        }
                    }

                }
                else $status = -2;

                //print_test($job);

                $data = array(
                    'jid'=>$jid,
                    'uid'=>$uid,
                    'addtime'=>$time,
                    'rid'=>$resume_id,
                    'tel'=>$tel,
                    'company_id'=>$job['com_id'],
                    'status'=>$status,
                );
                $aid = M("jobs_apply")->add($data);
                if($aid){

                	//投递成功   发送邮件
                    $job['aid'] = $aid;
                	sendById(4,$user['email'],$job['uid'],$job);


                	addApplyLog($aid,$uid,1,$job['uid'],'');
                }

            }
            $this->success("恭喜你，投递成功！");
        }

    }

    //已经投递简历管理
    function delivery(){

        if(!$this->uid){
            if( isWeixinBrowser() ){
                redirect(WEB_URL.'User/login');
                exit;
            }
            else $this->error("请先登录","/User/login");
        }
        
        if(!IS_WAP){
            $this->checkUser();
        }
        
        $uid = $this->uid;
        $type = intval($_REQUEST['type']);

        $amenu = array($type=>'class="cur"');

        $list = $this->getMyApplyJobs($this->uid,$type);

        //print_test($list);

        $this->assign(array(
            'resumeCount'=>getResumeCount($this->uid),
            'list'=>$list,
            'amenu'=>$amenu,
        ));

        $this->display();
    }

    //我的面试
    function myinterview(){

        if(!$this->uid){
            $this->error("请先登录","/User/login");
        }
        
        if(!IS_WAP){
            $this->checkUser();
        }
        
        $uid = $this->uid;
        $type = 4;


        $over = intval($_REQUEST['isover']);
        $over = $over?$over:1;

        $list = $this->getMyApplyJobs($this->uid,$type,$over);
        $amenu = array($over=>'class="cur"');
        //print_test($list);

        $this->assign(array(
            'resumeCount'=>getResumeCount($this->uid),
            'list'=>$list,
            'amenu'=>$amenu,
        ));

        $this->display("mymianshi");
    }


    //我的职位推荐
    function mlist(){

        $this->checkUser();
        $uid = $this->uid;

        $type=$_REQUEST['type'];
        $list = array();


        $data = array(
            'list'=>$list,
            'type'=>$type,
            'myinfo'=>$this->getUsersInfoById($uid),
        );
        $this->assign($data);
        $this->display();

    }


    //=================用户中心======================


    //显示我的二维码
    public function showQRCode(){

        $url = WEB_URL."Public/qr/2014_448299.jpg";

        $this->success("读取成功",$url);

    }

    /**
        用户中心
     */
    public function index() {

        //$this->redirect("/Resume/myresume");
        if(!is_login()){
            $this->redirect("/User/login");
            exit;
        }

        $type = trim($_REQUEST['type']);
        if($type=="pwd"){

        }
        else if($type=="email"){

        }
        else $type="index";

        $myinfo = $this->getUsersInfoById($this->uid);
        $this->assign(array(
            'info'=>$myinfo,
            'type'=>$type,
            "left_menu"=>array($type=>'cur'),
        ));

        $this->display("");

    }


    //账号设置
    /* public function bind(){
        $this->checkUser();
        $this->assign(array(
            'info'=>$this->getUsersInfoById($this->uid),
            "left_menu"=>array("bind"=>'cur'),
        ));
        $this->display("user_info");
    } */

    /**
     * 修改密码提交
     */
    public function updatePwd(){
        //$this->checkUser() ;
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        if ( IS_POST ) {
            //获取参数
            $uid        =   is_login();
            $oldPassword   =   I('post.oldPassword');
            $newPassword = I('post.newPassword');
            $data['password'] = $newPassword;

            if(!$oldPassword) {
                $this->exitJson(0,false,"请输入原密码",array("state"=>203));
            }
            if(!$data['password']) {
                $this->exitJson(0,false,"请输入新密码",array("state"=>203));
            }

            /* if($data['password'] !== $repassword){
                $this->error('您输入的新密码与确认密码不一致');
            } */

            $Api = new UserApi();
            $res = $Api->updateInfo($uid, $oldPassword, $data);
            if($res['status']){
                $this->exitJson(0,false,"修改成功",array("state"=>1));
            }else{
                $this->exitJson(0,false,$res['info'],array("state"=>203));
                //$this->error($res['info']);
            }
        }else{
            //$this->assign(array("left_menu"=>array("profile"=>'cur'),));
            //$this->display();
            $this->error('参数无效');
        }
    }

    //更新简历邮箱
    function updateEmail(){
        if(!is_login() || !$this->type ){
            $this->exitJson(0,false,$res['info'],array("state"=>203));
        }

        $receiveEmail = trim($_POST['receiveEmail']);
        if(isEmail($receiveEmail)){
            $find = M("member")->where(array("email_jianli"=>$receiveEmail))->find();
            if($find){
                if($find['uid']==$this->uid){
                    $this->exitJson(0,false,"参数无效",array("state"=>302));
                }
                else $this->exitJson(0,false,"参数无效",array("state"=>304));
            }
            else {
                $find = M("ucenter_member")->where(array("email"=>$receiveEmail))->find();
                if($find){
                    if($find['id']==$this->uid){

                    }
                    else $this->exitJson(0,false,"参数无效",array("state"=>304));
                }
            }
            M("member")->where(array("uid"=>$this->uid))->save(array("email_jianli"=>$receiveEmail));
            $this->exitJson(1,true,"",array("state"=>1));
        }
        else $this->exitJson(0,false,"参数无效",array("state"=>203));
    }

    //面试模板  拒绝模板
    public function template(){
        $this->checkUser();
        $type = trim($_REQUEST['type']);
        $map = array(
            'uid'=>$this->uid,
        );
        if($type=="refuse"){
            $map['type'] = "REFUSE_TEMPLATE";
        }
        else {
            $map['type'] = "INTERVIEW_TEMPLATE";
            $type="interview";
        }

        $list = M("notice_tpl")->where($map)->order("isdefault desc ")->select();
        if(!$list){
            if($type=="refuse"){
                addDefaultTpl($this->uid,2);
            }
            else{
                addDefaultTpl($this->uid,1);
            }
        }
        $list = M("notice_tpl")->where($map)->order("isdefault desc ")->select();

        $this->assign(array(
            'info'=>$this->getUsersInfoById($this->uid),
            "left_menu"=>array("template"=>'cur'),
            'type'=>$type,
            "list"=>$list,
            "count"=>count($list),
        ));
        $this->display("template");
    }

    //修改接收简历
    /* public function refuse(){
        $this->checkUser();
        $this->assign(array(
            'info'=>$this->getUsersInfoById($this->uid),
        ));
        $this->display("");
    } */

    // 添加通知模板
    function addInterviewTemplate(){
        if(!is_login()){
            $this->error("请先登录");
        }
        $uid = $this->uid;
        $alis = trim($_POST['alis']);
        $content = trim($_POST['content']);
        $interviewAddress = trim($_POST['interviewAddress']);
        $linkMan = trim($_POST['linkMan']);
        $linkPhone = trim($_POST['linkPhone']);
        $id = intval($_POST['id']);

        if(!$alis){
            $this->exitJson(0,false,"请填写完整",array("state"=>0));
        }

        $template = array(
            "type"=>"INTERVIEW_TEMPLATE",
            "isdefault"=>0,
            "title"=>$alis,
            "content"=>$content,
            "uid"=>$uid,
            "addtime"=>time(),
            "link_address"=>$interviewAddress,
            "link_name"=>$linkMan,
            "link_phone"=>$linkPhone,
        );

        if($id){
            unset($template['uid']);
            unset($template['addtime']);
            unset($template['type']);
            unset($template['isdefault']);
            M("notice_tpl")->where(array("tid"=>$id))->save($template);
        }
        else M("notice_tpl")->add($template);

        $this->exitJson(1,true,"添加成功",array("state"=>1));
    }

    //添加拒绝通知
    function addRefuseTemplate(){
        if(!is_login()){
            $this->error("请先登录");
        }
        $uid = $this->uid;
        $alis = trim($_POST['alis']);
        $content = trim($_POST['content']);
        if(!$alis || !$content){
            $this->exitJson(0,false,"请填写完整",array("state"=>0));
        }
        $id = intval($_POST['id']);
        $template = array(
            "type"=>"REFUSE_TEMPLATE",
            "isdefault"=>0,
            "title"=>$alis,
            "content"=>$content,
            "uid"=>$uid,
            "addtime"=>time(),
            "link_address"=>'',
            "link_name"=>'',
            "link_phone"=>'',
        );
        if($id){
            unset($template['uid']);
            unset($template['addtime']);
            unset($template['type']);
            unset($template['isdefault']);
            M("notice_tpl")->where(array("tid"=>$id))->save($template);
        }
        else M("notice_tpl")->add($template);
        $this->exitJson(1,true,"添加成功",array("state"=>1));

    }

    //删除模板
    function deleteTemplate(){
        $uid = is_login();
        $id = intval($_POST['id']);
        $check = M("notice_tpl")->where(array("uid"=>$uid,"tid"=>$id,"isdefault"=>0))->delete();
        if($check){
            $this->exitJson(1,true,"删除成功",array("state"=>1));
        }
        else $this->exitJson(0,false,"删除失败",array("state"=>0));
    }

    //设置默认的面试模板
    function setDefaultInterviewTemplate(){
        $uid = is_login();
        $id = intval($_POST['id']);
        if(!$uid || !$id){
            $this->exitJson(0,false,"参数无效",array("state"=>0));
        }
        M("notice_tpl")->where(array("uid"=>$uid,"type"=>"INTERVIEW_TEMPLATE"))->save(array("isdefault"=>0));
        M("notice_tpl")->where(array("tid"=>$id,"type"=>"INTERVIEW_TEMPLATE"))->save(array("isdefault"=>1));
        $this->exitJson(1,true,"设置成功",array("state"=>1));
    }

    //设置默认拒绝模板
    function setDefaultRefuseTemplate(){
        $uid = is_login();
        $id = intval($_POST['id']);
        if(!$uid || !$id){
            $this->exitJson(0,false,"参数无效",array("state"=>0));
        }
        M("notice_tpl")->where(array("uid"=>$uid,"type"=>"REFUSE_TEMPLATE"))->save(array("isdefault"=>0));
        M("notice_tpl")->where(array("tid"=>$id,"type"=>"REFUSE_TEMPLATE"))->save(array("isdefault"=>1));
        $this->exitJson(1,true,"设置成功",array("state"=>1));
    }
    public function password() {
    	 $this->display();
    }

      //找回密码
    public function findPassword(){

        if(is_login()){
            D('Member')->logout();
            $this->redirect('User/login');
            exit;
        }
        $type = intval($_REQUEST['type']);

        if($type==2){
            $email = $_REQUEST['email'];
            $email_link = getEmailDomain($email);
            $this->assign("email",$email);
            $this->assign("email_link",$email_link);
        }
        else if($type==3){
            $key = trim($_REQUEST['key']);
            $info = M("member")->where( array("findemail_key"=>$key) )->find();
            if(!$info || $info['findemail_send_time']<time()-3600*24 ){
                $this->error('激活链接错误或是已过期!',"/Index");
            } else if($type==4){
	            $email = $_REQUEST['email'];
	            $email_link = getEmailDomain($email);
	            $this->assign("email",$email);
	            $this->assign("email_link",$email_link);
            }
            else{

                if(IS_POST){
                    $newPassword = $_POST['newPassword'];
                    if(strlen($newPassword)<6){
                        $this->error('密码长度不能少于6位');
                    }
                    
                    //$Api = new UserApi();
                    //$res = $Api->updateInfo($uid, $oldPassword, $data);
                    //print_test($User);
                    //$res = $Api->updatePwd($info['uid'], $newPassword);
                    //exit(UC_AUTH_KEY);
                    $password = $this->user_think_ucenter_md5($newPassword, 'et<XH@x"mqrPjc?MgK:O$42nY`Izs{u>}yd*0+9R');
                    M("ucenter_member")->where(array("id"=>$info['uid']))->save( array("password"=>$password));
                    if(1){
                     
                        $this->success("设置成功，请重新登录。","/User/login");
                    }
                    else $this->error('密码设置失败，请稍后再试!');
                }

                $info = M("ucenter_member")->where( array("id"=>$info['uid']) )->find();
                $this->assign("email",$info['email']);
                $this->assign("key",$key);
            }

        }
        elseif($_POST){

            if($type==1){

                $email = trim($_POST['email']);

                if(!$email){
                    $this->error('请填注册邮箱!');
                }
                elseif(!isEmail($email)){
                    $this->error('邮箱格式不对!');
                }

                $info = M("ucenter_member")->where( array("email"=>$email) )->find();
                if(!$info){
                    $this->error('邮箱不存在!');
                }

                $time = time();
                $code = md5($email.$time );
                $data['findemail_send_time'] = $time;
                $data['findemail_key'] = $code;

                $email_link = WEB_URL."User/findPassword/type/3/?key=".$code;


                $check = sendById(3,$email,0,array("email"=>$email,"link"=>$email_link));
                if($check){
                    M("member")->where(array('uid'=>$info['id']))->save($data);
                    $this->success("邮件发送成功");
                }
                else $this->error('邮件发送失败，请稍后再试!');

            }
        }

        $this->assign(array(
            'show_nav'=>0,
            'type'=>$type,
        ));
        $this->display("findPassword");

    }
    

    //功能介绍
    public function findPassword_iframe(){
        $this->title  =  '功能介绍';    
         if(is_login()){
            D('Member')->logout();
            $this->redirect('User/login');
            exit;
        }
        $type = intval($_REQUEST['type']);

        if($type==2){
            $email = $_REQUEST['email'];
            $email_link = getEmailDomain($email);
            $this->assign("email",$email);
            $this->assign("email_link",$email_link);
        }
        else if($type==3){
            $key = trim($_REQUEST['key']);
            $info = M("member")->where( array("findemail_key"=>$key) )->find();
            if(!$info || $info['findemail_send_time']<time()-3600*24 ){
                $this->error('激活链接错误或是已过期!',"/Index");
            }
            else{

                if(IS_POST){
                    $newPassword = $_POST['newPassword'];
                    if(strlen($newPassword)<6){
                        $this->error('密码长度不能少于6位');
                    }
                    
                    //$Api = new UserApi();
                    //$res = $Api->updateInfo($uid, $oldPassword, $data);
                    //print_test($User);
                    //$res = $Api->updatePwd($info['uid'], $newPassword);
                    //exit(UC_AUTH_KEY);
                    $password = $this->user_think_ucenter_md5($newPassword, 'et<XH@x"mqrPjc?MgK:O$42nY`Izs{u>}yd*0+9R');
                    M("ucenter_member")->where(array("id"=>$info['uid']))->save( array("password"=>$password));
                    if(1){
                     
                        $this->success("设置成功，请重新登录。","/User/login");
                    }
                    else $this->error('密码设置失败，请稍后再试!');
                }

                $info = M("ucenter_member")->where( array("id"=>$info['uid']) )->find();
                $this->assign("email",$info['email']);
                $this->assign("key",$key);
            }

        }
        elseif($_POST){

            if($type==1){

                $email = trim($_POST['email']);

                if(!$email){
                    $this->error('请填注册邮箱!');
                }
                elseif(!isEmail($email)){
                    $this->error('邮箱格式不对!');
                }

                $info = M("ucenter_member")->where( array("email"=>$email) )->find();
                if(!$info){
                    $this->error('邮箱不存在!');
                }

                // $time = time();
                // $code = md5($email.$time );
                // $data['findemail_send_time'] = $time;
                // $data['findemail_key'] = $code;

                //$email_link = WEB_URL."User/findPassword/type/3/?key=".$code;
                $email_link = WEB_URL."User/findPassword/type/3/?key=";


                $check = sendById(3,$email,0,array("email"=>$email,"link"=>$email_link));
                if($check){
                    M("member")->where(array('uid'=>$info['id']))->save($data);
                    $this->success("邮件发送成功");
                }
                else $this->error('邮件发送失败，请稍后再试!');

            }
        }

        $this->assign(array(
            'show_nav'=>0,
            'type'=>$type,
        ));
        

        $this->display('findPassword_iframe');
    }
    
    
    function user_think_ucenter_md5($str, $key = 'ThinkUCenter'){
        return '' === $str ? '' : md5(sha1($str) . $key);
    }
    

    //修改资料
    public function settings() {
        $this->checkUser();

        $uid = $this->uid;

        $info = M("member")->where(array('uid'=>$uid,'user_status'=>1))->find();
        if(!$info){
            $this->error('参数无效');
        }
        $array = array('info'=>$info);
        $this->assign($array);
        $this->display("settings");
    }

    //提交资料修改
    public function checkSettings(){

        $this->checkUser();
        $uid = $this->uid;

        $info = M("member")->where(array('uid'=>$uid,'user_status'=>1))->find();
        if(!$info){
            $this->error('参数无效');
        }

        if ( (!$_POST['nickname'] || strlen($_POST['nickname'])<3) ){
            $this->error('请填写正确的昵称!');
        }

        if ( !$_POST['email'] || !checkEmailOk($_POST['email'])  ){//|| mb_strlen($_POST['email'],"UTF8")<3
            $this->error('请填写正确的邮箱');
        }

        if ( !$_POST['phone'] || !checkTelphoneOk($_POST['phone']) ){
            $this->error('请填写正确的手机号!');
        }

        if ( !$_POST['address'] || strlen($_POST['address'])<5 ){
            $this->error('请填写正确的居住地址!');
        }

        if ( !$_POST['sign']){
            $this->error('请填写个性签名!');
        }
        else if( strlen($_POST['sign']) > 300 ){
            $this->error('个性签名不能超过100字');
        }

        //ruku
        $data = array(
            'nickname' => addslashes(trim($_POST['nickname'])),
            'email'=>addslashes($_POST['email']),
            'phone'=>addslashes($_POST['phone']),
            'address' => addslashes($_POST['address']),
            'sign' => addslashes($_POST['sign']),
            'update_time'=>time(),
        );

        $rs = M("member")->where(array('uid'=>$uid))->save($data);

        if($rs){
            $_SESSION['user_auth']['nickname'] = $data['nickname'];
            //添加操作日志
            //addUsersOptLog(9,"服务者修改资料(uid:".$uid.')','Home',array('for_uid'=>$uid,'for_username'=>$this->username) );
            $this->success('恭喜你，更新成功！');
        }
        else{
            $this->error('很遗憾，更新失败，请稍后再试。');
        }


    }



    //用户中心  日历
    function calendar(){

        $this->checkUser() ;
        $uid = $this->uid;

        $this->assign(array(
            'title' => '用户日历',
            'usersinfo' => $this->getUsersInfoById($uid)
        ));

        $this->display();

    }

    function checkLogin(){
    	$callback = $_GET['callback'];
    	$uid = is_login();
    	if($callback){
    		if($uid){
    			//cookie('uid',$uid,24*3600*30);
    			$userinfo = $this->getUsersInfoById($uid);
    			$gotourl = '/Resume/myresume';
		        if( $userinfo['status'] < 2 ) {
		            if(IS_WAP){
		                $gotourl = '/Resume/wapbasic_iframe';
		            }
		            else $gotourl = '/User/checkEmail_iframe';
		        }
		        else if( $userinfo['status'] == 2 ) {
		        	if($userinfo['realname']){
		            	$gotourl = '/Resume/myresume';
		            }else{
		            	$gotourl = '/Resume/wapbasic_iframe';
		            }
		        }
		        //cookie('login',1,24*3600*30);
    			if($gotourl != '/Resume/myresume'){
    				cookie('gotourl',$gotourl);
    				header("Location:http://www.jobsminer.cc" . $gotourl);
    				exit;
    			}else{
    				echo '<div id="jm_popup_loading" style="position: absolute; left: 50%; top: 50%; margin-left: -50px; margin-top: -50px;z-index:100"> <img src="http://www.jobsminer.cc/Public/static/client.jobsminer.cc/godimage/loading.gif"> </div><div style="display:none;" id="login_iframe_ret">' . json_encode(array('login' => true, 'ot_home_uid' => $uid, 'ot_home_login' => 1, 'ot_home_ez_uid' => $uid )) . '</div>';
    			}
    		}else{
    			/*$content_data = array(
				    'code'=>-1,
				    'success'=>false,
				    'msg'=>"校验失败！",
				    'content'=>array("uid"=>'')
				);
				echo $callback . json_encode($content_data);*/
				cookie('gotourl',null);
				//header("Location:http://www.jobsminer.cc/User/register_iframe.html");
    			header("Location:http://www.jobsminer.cc/User/register_iframe.html");
    			exit;
    		}
    	}else{
	    	$this->exitJson(0,true,"校验成功！",array("uid"=>$uid));	
    	}
    }

    function getBaseinfo(){
    	if(!$this->uid || $this->user_status<1) {
            //$this->error('你还没有登录，请先登陆。',WEB_URL.'User/login');
            $this->exitJson(-1,false,"成功！","");
        }

        $uid = $this->uid;
        $info = $this->getUsersInfoById($uid);
        $this->exitJson(0,true,"成功！",$info);
    }


    function getOtherinfo(){
    	$uid = $this->uid;
    	if(!$this->uid || $this->user_status<1) {
            //$this->error('你还没有登录，请先登陆。',WEB_URL.'User/login');
            $this->exitJson(-1,false,"成功！","");
        }
		/*$type = $_GET['type'];
		if(!$type){
			$this->exitJson(-1,false,"接口参数错误！",array());
		}*/
		/*$this->assign(array(
            'otherResume'=>getMyUploadResume($this->uid),
            'resumeCount'=>getResumeCount($this->uid),
        ));*/
		
    
        $myinfo = $this->getUsersInfoById($uid);        	
        if(!$uid||!$myinfo){
            $this->error("请勿非法访问！",WEB_URL."User/login");
        }


    	$array = array(
            'info'=>$info,
            'exp_list'=>getUsersWorkExperience($uid),
            'edu_list'=>getUsersEduExperience($uid),
            'pro_list'=>getUsersProExperience($uid),
            'work_list'=>getUsersWorks($uid),
            'skill_list'=>getUsersSkill($uid),
            'custom_model'=>getUserDefine($uid,true),
            'step_info'=>getResumeStepNext($info),
            'otherResume'=>getMyUploadResume($uid),
            'practice_list'=>getSchoolPractice($uid),
            'schoolclub_list'=>getUsersSchoolClub($uid),
            'schoolawards_list'=>getUsersSchoolAwards($uid),
            'certificate_list'=>getUsersCertificate($uid),
            'trainingexperience_list'=>getUsersTrainingExperience($uid),
            'otherinfo_list'=>getUsersotherInfo($uid),
            'customize_list'=>getUserCustomize($uid),
            'counter'=>getUsersAllInfo($uid),
            'list'=>$list,
            "year"=>$year,
            "month"=>$rili[2],
            "day"=>$rili[3],
			"c_menu"=>array("resume"=>'class="current"'),
			'is_sub'=>M("Subscribe")->where(array('uid'=>$uid))->count(),
            
            'province_city'=>$province_city,
            'hotcity'=>$hotcity,
	   	);

    	$this->exitJson(0,true,"成功！",$array);	
    }


    function sendXMassage(){
    	 /*
     | Submail message/xsend API demo
     | SUBMAIL SDK Version 2.2 --PHP
     | copyright 2011 - 2015 SUBMAIL
     |--------------------------------------------------------------------------
     */
    
    /*
     |载入 app_config 文件
     |--------------------------------------------------------------------------
     */
    require dirname(__FILE__).'/'."../Common/submail/app_config.php";
	//require "../Common/submail/app_config.php";
    //var_dump(dirname(__FILE__).'/'."../Common/submail/app_config.php");
    //exit();
    /*
     |载入 SUBMAILAutoload 文件
     |--------------------------------------------------------------------------
     */
    
    require_once(dirname(__FILE__).'/'."../Common/submail/SUBMAILAutoload.php");
    require_once(dirname(__FILE__).'/'."../Common/submail/lib/message.php");
    require_once(dirname(__FILE__).'/'."../Common/submail/lib/messagexsend.php");
    //require dirname(__FILE__).'/'."../Common/submail/messagexsend.php";
    
    /*
     |初始化 MESSAGEXsend 类
     |--------------------------------------------------------------------------
     */
    //$submailtest = $this-> SUBMAILAutoload("MESSAGEXsend");
    $submail = new MESSAGEXsend($message_configs);
    
    /*
     |必选参数
     |--------------------------------------------------------------------------
     |设置短信接收的11位手机号码
     |--------------------------------------------------------------------------
     */
    
    $submail->setTo('13265496261');
    
    /*
     |必选参数
     |--------------------------------------------------------------------------
     |设置短信模板ID
     |--------------------------------------------------------------------------
     */
    
    $submail->SetProject('Jobsminer');
    
    /*
     |可选参数
     |--------------------------------------------------------------------------
     |添加文本变量
     |可多次调用
     |--------------------------------------------------------------------------
     */
    
    $submail->AddVar('code','198277');
    
    /*
     |调用 xsend 方法发送短信
     |--------------------------------------------------------------------------
     */
    
    $xsend=$submail->xsend();
    
    
    /*
     |打印服务器返回值
     |--------------------------------------------------------------------------
     */
    
    print_r($xsend);

    }

    // public function logintest() {
    // 	$this->display();
    // }
    /* 登录页面 */
	public function logintest($username = '', $password = '', $verify = ''){
	    
	    if($_GET['ref']){
	        $_SESSION['go_to_url'] = urlencode($_GET['ref']);
	    }


		if(IS_POST){ //登录验证

		    if(C("IS_LOGIN_CODE")){
    			/* 检测验证码 */
    			if(!check_verify($verify)){
    				$this->error('验证码输入错误！');
    			}
		    }

		    if(!$_POST['email']){
		        $this->error("请输入正确的邮箱地址");
		    }

		    if(!$_POST['password']){
		        $this->error("请输入密码");
		    }

		    $username = $_POST['email'];
		    $password = $_POST['password'];



			/* 调用UC登录接口登录 */
			$user = new UserApi;
			$uid = $user->login($username, $password,2);
			if(0 < $uid){ //UC登录成功
			    
			    
			    //微信绑定检查
			    $is_wx_bind = 0;
			    if( isWeixinBrowser() ){
			        
			        if( !in_array(session("wx_hash"), array("cwxu","bwxu")) ){
			            $this->error("来源无效");
			        }
			        
			        if(!session("wx_openid")){
			            $this->error("授权失败，请重新发起请求");
			        }
			        
			        $check_wxbind = checkUserWxBind(session("wx_openid"));
			        if($check_wxbind){
			            $this->error("您已经成功绑定其他账号，不能再次绑定！");
			        }
			        
			        $wmu = M("member")->where(array('uid'=>$uid))->find();
			        if($wmu){
			            if( $wmu['bind_openid'] ){
			                
			            }
			            else{
			                if( session("wx_hash") == "cwxu" && $wmu['type']!=0 ){
			                    $this->error("当前用户只能绑定Jobsminer服务号");
			                }
			                else if( session("wx_hash") == "bwxu" && $wmu['type']!=1 ){
			                    $this->error("当前用户只能绑定企业服务号");
			                }
			                else{
			                    /* $data['bind_openid'] = session("wx_openid");
			                    $data['bind_status'] = 1; */
			                    $is_wx_bind = 1;
			                }
			            }
			        }
			        else{
			            $this->error("用户绑定失败，请联系管理员");
			        }
			        
			    }
			    
			    
			    
			    
				/* 登录用户 */
				$Member = D('Member');
				if($Member->login($uid)){ //登录用户
					//TODO:跳转到登录前页面

				    $isbind = 0;
				    if(isset($_SESSION[$_SESSION['other_login_type'].'_uid'])&&isset($_SESSION['other_login_type'])){
				        $accesstoken_new = md5($_SESSION['other_login_type']."+".$_SESSION[$_SESSION['other_login_type'].'_uid']);
				        if($accesstoken_new==$_POST['resubmitToken']){
				            $isbind = 1;
				        }
				    }

				    if($isbind==1){
				        $save = array();
				        $save[$_SESSION['other_login_type'].'_open_id'] = $_SESSION[$_SESSION['other_login_type'].'_uid'];
				        $save[$_SESSION['other_login_type'].'_name'] = $_SESSION[$_SESSION['other_login_type'].'_nickname'];
				        $save[$_SESSION['other_login_type'].'_bind_time'] = time();
				        M("member")->where(array("uid"=>$uid))->save($save);

				        session("ot_home",NULL);
				        unset($_SESSION[$_SESSION['other_login_type'].'_uid']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_nickname']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_token']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_access_token']);
				        unset($_SESSION[$_SESSION['other_login_type'].'_user_info']);
				        unset($_SESSION['other_login_type']);
				        session($_SESSION['other_login_type'].'_user_info',NULL);
				    }

				    $last_page = strtolower($_SERVER['HTTP_REFERER']);
					if($_SESSION['go_to_url'] && strpos($_SESSION['go_to_url'], strtolower("/login") ) === false && strpos($_SESSION['go_to_url'], strtolower("/logout") ) === false && strpos($_SESSION['go_to_url'], strtolower("/register") ) === false){
					    $gotourl = urldecode($_SESSION['go_to_url']);
					    unset($_SESSION['go_to_url']);
					}
					else if( $isbind==0 && $_SERVER['HTTP_REFERER'] && strpos($last_page, strtolower("/login") ) === false && strpos($last_page, strtolower("/logout") ) === false && strpos($last_page, strtolower("/register") ) === false ){
            	        $gotourl = $_SERVER['HTTP_REFERER'];

            	    }
					else{
					    $userinfo = getUsersSession();
					    if($userinfo['type']==1){
					        if ($userinfo['status']<2){
					            $gotourl = '/Company/openZhaopin';
					        }
					        /* else if ($userinfo['status']<100){
					         $gotourl = '/Company/cinfo';
					         } */
					        else $gotourl = '/Company/cinfo';
					    }
					    else {
					        $gotourl = '/Resume/myresume';
					        if( $userinfo['status'] < 2 ) {
					            if(IS_WAP){
					            	//$gotourl = '/Resume/wapbasic';
					                $gotourl = '/Resume/wapbasic_iframe';
					            }
					            else $gotourl = '/User/checkEmail';
					        }
					        else if( $userinfo['status'] == 2 ) {
					            $gotourl = '/Resume/myresume';
					        }
					    }
					}

					if($_POST['autoLogin']){

					    cookie('ez_uid',$uid,24*3600*30);
					}
					cookie('uid',$uid,24*3600*30);
					cookie('login',1,24*3600*30);
					cookie('ez_uid',$uid,24*3600*30);

					if($is_wx_bind){
					    $this->success('绑定成功！',888);
					}
					else $this->success('登录成功！',$gotourl);
				} else {
					$this->error($Member->getError());
				}

			} else { //登录失败
				switch($uid) {
					case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
					case -2: $error = '密码错误！'; break;
					default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
				}
				$this->error($error);
			}

		} else { //显示登录表单

		    if(!$_SESSION['go_to_url'] && $_SERVER['HTTP_REFERER']){
		        $_SESSION['go_to_url'] = $_SERVER['HTTP_REFERER'];
		    }
		    
		    
		    if($_GET['md']=="min"){
		         
		         
		         
		         
		    }
		    else{
		         
		        $cookie_uid = cookie('ez_uid');
		        if($cookie_uid>0 && !$_SESSION['other_login_type'] && !isset($_SESSION[$_SESSION['other_login_type'].'_uid']) ){
		            $Member = D('Member');
		            if($Member->login($cookie_uid)){ //登录用户
		                $last_page = strtolower($_SERVER['HTTP_REFERER']);
		                if($_SESSION['go_to_url'] && strpos($_SESSION['go_to_url'], strtolower("/login") ) === false && strpos($_SESSION['go_to_url'], strtolower("/logout") ) === false && strpos($_SESSION['go_to_url'], strtolower("/register") ) === false){
		                    $gotourl = urldecode($_SESSION['go_to_url']);
		                    unset($_SESSION['go_to_url']);
		                }
		                else if( $_SERVER['HTTP_REFERER'] && strpos($last_page, strtolower("/login") ) === false && strpos($last_page, strtolower("/logout") ) === false && strpos($last_page, strtolower("/register") ) === false ){
		                    $gotourl = $_SERVER['HTTP_REFERER'];
		                }
		                else{
		                    $userinfo = getUsersSession();
		                    if($userinfo['type']==1){
		                        if ($userinfo['status']<2){
		                            $gotourl = '/Company/openZhaopin';
		                        }
		                        /* else if ($userinfo['status']<100){
		                         $gotourl = '/Company/cinfo';
		                         } */
		                        else $gotourl = '/Company/cinfo';
		                    }
		                    else {
		                        $gotourl = '/Resume/myresume';
		                        if( $userinfo['status'] < 2 ) {
		                            $gotourl = '/User/checkEmail';
		                        }
		                        else if( $userinfo['status'] == 2 ) {
		                            $gotourl = '/Resume/myresume';
		                        }
		                    }
		                }
		        
		                $this->redirect($gotourl);
		                exit;
		        
		            }
		        
		        
		        }
		        
		         
		    }


		    $this->assign("show_nav",IS_WAP?1:0);
			$this->display();
		}
	}


	public function smsMessage(){
		vendor('master.lib.messagexsend');
		
		$message_configs['appid']='11037';
		$message_configs['appkey']='5103f5acb31f69e7245cd8d07fe60151';
		$message_configs['sign_type']='normal';
		$submail=new \MESSAGEXsend($message_configs);
		/*
		 |必选参数
		 |--------------------------------------------------------------------------
		 |设置短信接收的11位手机号码
		 |--------------------------------------------------------------------------
		 */
		
		$submail->setTo('130****3490');
		
		/*
		 |必选参数
		 |--------------------------------------------------------------------------
		 |设置短信模板ID
		 |--------------------------------------------------------------------------
		 */
		
		$submail->SetProject('3njY02');
		
		/*
		 |可选参数
		 |--------------------------------------------------------------------------
		 |添加文本变量
		 |可多次调用
		 |--------------------------------------------------------------------------
		 */
		
		$submail->AddVar('code','198277');
		
		/*
		 |调用 xsend 方法发送短信
		 |--------------------------------------------------------------------------
		 */
		
		$xsend=$submail->xsend();
		
		
		/*
		 |打印服务器返回值
		 |--------------------------------------------------------------------------
		 */
		
		print_r($xsend);
	}
}
