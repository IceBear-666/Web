<?php
namespace Home\Controller;
use User\Api\UserApi;


class PublicController extends UserController {
    
	private $ctime ;
	private $imgpath;
	
	function __construct(){
		parent::__construct();
		$this->ctime = time();
		
	}
	
	//取消绑定
	function cancelotherLogin(){
	    $type = addslashes($_GET['type']);
	    $uid = is_login();
	    if(!$uid){
	        $this->redirect("/User/login");
	        exit;
	    }
	    if($type=='qq'){
	        $save = array(
	            'qq_open_id'=>'',
	            'qq_name'=>'',
	            'qq_bind_time'=>'',
	        );
	    }
	    else if($type=='wx'){
	        $save = array(
	            'wx_open_id'=>'',
	            'wx_name'=>'',
	            'wx_bind_time'=>'',
	        );
	    }
	    else if($type=='sina'){
	        $save = array(
	            'sina_open_id'=>'',
	            'sina_name'=>'',
	            'sina_bind_time'=>'',
	        );
	    }
	    else $this->error("参数无效","/User/");
	    
	    M("member")->where(array("uid"=>$uid))->save($save);
	    
	    $this->success("取消成功!","/User/");
	    
	}
	
	
	
	
	// 第三方登录页面
	public function otherLogin() {
		$type = addslashes($_GET['type']);
		if($type=='qq'){
		    session_start();
			require_once WEB_PATH.'/App/OtherLogin/qq/API/qqConnectAPI.php';
			$qc = new \QC();//'',''
			
			//print_test($qc);
			
			$qc->qq_login();
				
			exit();
		}
		else if($type=='sina'){
			
			session_start();
			
			require_once( WEB_PATH.'/App/OtherLogin/sina/api/config.php' );
			require_once( WEB_PATH.'/App/OtherLogin/sina/api/saetv2.ex.class.php' );
			$o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );
			$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
			//exit($code_url);
			header("Location:".$code_url);
			exit("...");
			
		}
		else if($type=='wx'){
		    session_start();
		    require_once( WEB_PATH.'/App/OtherLogin/wx/config.php');
		    //require_once( WEB_PATH.'/App/OtherLogin/wx/weixin.php');
		    
		    //$o = new oauthWX( WX_AKEY , WX_SKEY );
		    $state = md5(date("Ymd"));
		    $code_url = "https://open.weixin.qq.com/connect/qrconnect?appid=".WX_AKEY."&redirect_uri=".urlencode(WX_CALLBACK_URL)."&response_type=code&scope=snsapi_login&state=".$state."#wechat_redirect";
		    	
		    header("Location:".$code_url);
		    exit("...");
		    		    	
		}
		else $this->error("参数无效");
	}
	
	//回调  qq
	public function callBack(){
	    
		require_once WEB_PATH.'/App/OtherLogin/qq/API/qqConnectAPI.php';
				
		$qc = new \QC();
		$cb = $qc->qq_callback(); //验证回调   值跟token一样
		if(!$cb){
		    $this->error("页面已过时，请重新登录。",WEB_URL."User/login");
		}
		
		$access_token = $qc->get_access_token();
		$openid = $qc->get_openid();
		if(!$openid){
		    $this->error("页面已过时，请重新登录",WEB_URL."User/login");
		}
		//echo $cb." - ". $access_token . " - " .$openid;exit;
		
		$qc = new \QC($cb,$openid);
		
		$user_qq = $qc->get_user_info();
		
		if($user_qq['ret'] == 0){
									
			//$this->print_test($user_qq);
				
			//检查是否已经绑定过 'bind_from'=>"qq",
			$check = M("member")->where(array('qq_open_id'=>$openid))->find();
			if($check&&$check['uid']>0){
			
			    $Member = D('Member');
		        if($Member->login($check['uid'])){
		            
		            if($_SESSION['go_to_url']){
		                $gotourl = $_SESSION['go_to_url'];
		                unset($_SESSION['go_to_url']);
		            }
		            else $gotourl = WEB_URL;
		            	
		            $this->redirect($gotourl);
		        }
		        else $this->error("登陆失败，请稍后再试。");			    
				
			
			}
			else{
			    
			    $_SESSION['other_login_type'] = "qq";
			    $_SESSION['qq_access_token'] = $access_token;
			    $_SESSION['qq_uid'] = $openid;
			    $_SESSION['qq_nickname'] = $user_qq['nickname'];			    
			    
			    $_SESSION['qq_user_info'] = $user_qq;
			    	
			    $data = array(
			        'show_nav'=>1,
			        'show_foot'=>0,
			        'nickname'=>$_SESSION['qq_nickname'],
			        'accesstoken'=>md5($_SESSION['other_login_type']."+".$_SESSION['qq_uid']),
			        'is_callback'=>1,
			        'login_type'=>"qq",
			    );
			    $this->assign($data);
			    $this->display("User/guanlian");			    
			
			}			
			
		}
		else{
			$this->error("服务器繁忙，请稍后再试。",WEB_URL."User/login");
		}
		
		exit("");
	}
	
	//
	public function callBack_sina(){
		//session_start();
		
		require_once( WEB_PATH.'/App/OtherLogin/sina/api/config.php' );
		require_once( WEB_PATH.'/App/OtherLogin/sina/api/saetv2.ex.class.php' );
		
		$o = new \SaeTOAuthV2(WB_AKEY , WB_SKEY);
		
		//print_test($_REQUEST);
		
		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = WB_CALLBACK_URL;
			try {
			    
			    
				$token = $o->getAccessToken( 'code', $keys ) ;	
				
				//throw new \Exception($token);
				
			}
			catch (Exception  $e) 
			{
			    //throw new Exception();
				/* Array
				(
						[access_token] => 2.00MGT2WCne6pBD4e637c8ecbRtHZED
						[remind_in] => 157679999
						[expires_in] => 157679999
						[uid] => 2310225164
				) */
			    $this->redirect("User/login");
			    exit;
			}
		}
		else {
		    $this->redirect("User/login");
		    exit;
		}
				
		
		if ($token) {
			//$_SESSION['token'] = $token;
			//setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
			$api = "https://api.weibo.com/2/users/show.json?uid=".$token['uid']."&appkey=".appkey;
			//$user_sina = $o->show_user_by_id($token['uid']);
			$user_sina = $o->get($api);
			
			
			//$this->print_test($user_sina);
			
			//检查是否已经绑定过 'bind_from'=>"sina",
			$check = M("member")->where(array('sina_open_id'=>$token['uid']))->find();
			if($check&&$check['uid']>0){

				$Member = D('Member');
		        if($Member->login($check['uid'])){
		            
		            if($_SESSION['go_to_url']){
		                $gotourl = $_SESSION['go_to_url'];
		                unset($_SESSION['go_to_url']);
		            }
		            else $gotourl = WEB_URL;
		            	
		            $this->redirect($gotourl);
		        }
		        else $this->error("登陆失败，请稍后再试。");
					
				
			}
			else{
				
				$_SESSION['other_login_type'] = "sina";
				$_SESSION['sina_access_token'] = $token['access_token'];
				$_SESSION['sina_uid'] = $token['uid'];
				$_SESSION['sina_nickname'] = $user_sina['screen_name'];
				
				
				$_SESSION['sina_user_info'] = $user_sina;
					
				$data = array(
					'show_nav'=>1,
				    'show_foot'=>0,
					'nickname'=>$_SESSION['sina_nickname'],
					'accesstoken'=>md5($_SESSION['other_login_type']."+".$_SESSION['sina_uid']),
					'is_callback'=>1,
					'login_type'=>"sina",
				);
				$this->assign($data);
				$this->display("User/guanlian");
				
			}		
			
			exit("");
		}
		else{
			$this->error("页面已超时，请重新登录。",WEB_URL."/User/login");
			exit();
		}
		
	}
	
	
	//微信回调
	public function callBack_wx(){
	    
	    $state = md5(date("Ymd"));
	    
	    $new_state = $_REQUEST['state'];
	    $code = $_REQUEST['code'];
	    
	    if($code){
	        require_once( WEB_PATH.'/App/OtherLogin/wx/config.php');
	        require_once( WEB_PATH.'/App/OtherLogin/wx/weixin.php');
	        $weixin = new \Weixin(WX_AKEY,WX_SKEY);	        
	        
	    }
	    else $this->error("登录失败，请重试。",WEB_URL."/User/login");
	    
	
	    $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".WX_AKEY."&secret=".WX_SKEY."&code=".$code."&grant_type=authorization_code";
        
	    $res = $weixin->https_request($url);//调用SDK方法获取到res 从中可以得到openid
        $res=(json_decode($res, true));//转换成array 方便调用openid
       
        //print_test($res);
        
        if($res['openid']){
            $row=$weixin->get_user_info($res['openid'],$res['access_token']);
            
            //print_test($row);
            
            if($row['errcode']){
                $_SESSION['last_a_t'] = NULL;
                $_SESSION['last_a_t_time'] = NULL;
                $this->error("信息读取失败，请重试。",WEB_URL."/User/login");
            }            
            
            $check = M("member")->where(array('wx_open_id'=>$res['openid']))->find();
            if($check&&$check['uid']>0){
            
                $Member = D('Member');
		        if($Member->login($check['uid'])){
		            
		            if($_SESSION['go_to_url']){
		                $gotourl = $_SESSION['go_to_url'];
		                unset($_SESSION['go_to_url']);
		            }
		            else $gotourl = WEB_URL;
		            	
		            $this->redirect($gotourl);
		        }
		        else $this->error("登陆失败，请稍后再试。");
            
            }
            else{
            
                $_SESSION['other_login_type'] = "wx";
                $_SESSION['wx_access_token'] = $res['access_token'];
                $_SESSION['wx_uid'] = $res['openid'];
                $_SESSION['wx_nickname'] = $row['nickname'];
            
                $_SESSION['wx_user_info'] = $row;
            
                $data = array(
                    'show_header'=>1,
                    'show_foot'=>0,
                    'nickname'=>$_SESSION['wx_nickname'],
                    'accesstoken'=>md5($_SESSION['other_login_type']."+".$_SESSION['wx_uid']),
                    'is_callback'=>1,
                    'login_type'=>"wx",
                );
                $this->assign($data);
                $this->display("User/guanlian");
            
            }
            
            
        }
        else $this->error("页面已超时，请重新登录。",WEB_URL."/User/login");
        
	}
	
	// 用户注册检测
    public function checkReg() {
    	$isbind = 0;
    	if(isset($_SESSION[$_SESSION['other_login_type'].'_uid'])&&isset($_SESSION['other_login_type'])){
    		$accesstoken_new = md5($_SESSION['other_login_type']."+".$_SESSION[$_SESSION['other_login_type'].'_uid']);
    		if($accesstoken_new==$_POST['resubmitToken']){
    			$isbind = 1;
    		}
    	}
    	$_POST['username'] = $_POST['email'];
    	//print_r($_SESSION);exit;
    	if(!$isbind){
    		
    		/* if(empty($_POST['username'])) {
    			$this->error('请输入正确的用户名！');
    		}
    		if(strlen($_POST['username'])<3) {
    			$this->error('用户名不能少于三位！');
    		}
    		
    		if(strlen($_POST['nickname'])<3) {
    		 $this->error('昵称不能少于三位！');
    		} 
    		 
    		if( !preg_match("/^[a-zA-Z]{1}[a-zA-Z0-9_]{1,15}[a-zA-Z0-9_]{1}$/",trim($_POST['username']) ) ) {
    			$this->error('用户名只能以字母开头，后跟字母、数字或下划线。');
    		}*/
    		
    		if (empty($_POST['email'])){
    			$this->error('请输入常用邮箱地址！');
    		}
    		elseif ( !eregi("^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$",$_POST['email']) ){
    			$this->error('邮箱地址格式有误！');
    		}
    		
    		
    	}
    	
		/* if(empty($_POST['nickname'])) {
			$this->error('请输入昵称！');
		} */    	
		
		if (empty($_POST['password'])  ){//|| empty($_POST['password2'])
    		$this->error('请输入登录密码！');
    	}
		elseif ( strlen($_POST['password'])<6 || strlen($_POST['password'])>16 ){
    		$this->error('密码长度必须在6-16位！');
    	}
		/* elseif ( $_POST['password'] != $_POST['password2'] ){
    		$this->error('两次密码不一致！');
    	} */
    	
    	
    	if(!$isbind){
    	
    		
    		/* elseif (empty($_POST['agree'])){
    		 $this->error('需同意本站协议方可注册！');
    		} */
    		
    		/* if( !$_POST['code'] ){
    			$this->error('请输入验证码！');
    		}
    		elseif($_SESSION['verify'] != md5($_POST['code'])) {
    			$this->error('验证码错误！');
    		} */
    	
    	}
    	else{
    		//$_POST['username'] = $_SESSION['other_login_type']."_".$_SESSION[$_SESSION['other_login_type'].'_uid'];
    	}
		   	
    	
    	$mode = M("member");
    	$authInfo   =  $mode->where(array("username"=>$_POST['username']))->find();    	
    	if($authInfo) {
    		$this->error('该用户名已存在，请更换！');
    	}else {
			
    		if(!$isbind){
    			$authInfo   =  $mode->where(array("email"=>$_POST['email']))->find();
    			if($authInfo){
    				$this->error('Email已存在，请更换！');
    			}
    		}
    		
			
    		//注册入库  
			$code = getUserCode();
    		$data = array(
				'username'=>addslashes($_POST['username']),
    			'nickname'=>'',
				'email'=>addslashes($_POST['email']),
    			'code'=>$code,
    			'pwd'=>md5(md5($_POST['password']).$code),
				'type'=>intval($_POST['type']),
				'reg_time'=>time(),
				'reg_ip'=>getIp(),
				'status'=>0,				
    			'pic'=>'',//Public/Images/user_header.gif
    			
			);
    		
    		$email_key = md5($data['pwd'].$data['reg_time']);
    		$data['email_send_time'] = $data['reg_time'];
    		$data['email_key'] = $email_key;
    		
    		if($isbind){
    			$data['bind_from'] = $_SESSION['other_login_type'];
    			$data['bind_time'] = time();
    			
    			$bind_info = $_SESSION[$_SESSION['other_login_type'].'_user_info'];
    			
    			if($data['bind_from']=="qq"){
    				$data['qq_open_id'] = $_SESSION[$_SESSION['other_login_type'].'_uid'];
    				if($bind_info['figureurl_2']){
    					$data['pic'] = $bind_info['figureurl_2'];
    				}
    				else if($bind_info['figureurl_qq_2']){
    					$data['pic'] = $bind_info['figureurl_qq_2'];
    				}
    				else {
    					$data['pic'] = $bind_info['figureurl_qq_1'];
    				}
    				$data['gender'] = $bind_info['gender']=="女"?2:1;
    				
    				$data['access_token'] = $_SESSION[$_SESSION['other_login_type'].'_access_token'];
    				
    			}
    			else if($data['bind_from']=="sina"){    			
    				$data['sina_open_id'] = $_SESSION[$_SESSION['other_login_type'].'_uid'];
	    			$data['access_token'] = $_SESSION[$_SESSION['other_login_type'].'_access_token'];
	    				    			
	    			$data['province'] = intval($bind_info['province']);
	    			$data['city'] = intval($bind_info['city']);
	    			$data['address'] = $bind_info['location'];
	    			if($bind_info['profile_image_url'])$data['pic'] = $bind_info['profile_image_url'];
	    			$data['sign'] = $bind_info['description'];
	    			$data['gender'] = $bind_info['gender']=="m"?1:2;	    			
    			
    			}
    			
    			unset($_SESSION[$_SESSION['other_login_type'].'_user_info']);
    			
    		}
    		
    		if($data['type']==0){
    			$data['status'] = 1;
    		}
    		
    		if($lastInsId = $mode->add($data)){
    			
    			unset($_SESSION[$_SESSION['other_login_type'].'_access_token']);
    			unset($_SESSION[$_SESSION['other_login_type'].'_uid']);
    			unset($_SESSION['other_login_type']);
    			
    			$_SESSION['uid'] = $lastInsId;
    			$_SESSION['username'] = $_SESSION['email'] = $data['username'];
    			$_SESSION['status'] = 0;
    			$_SESSION['type'] = $data['type'];
    			
    			$_SESSION[C('USER_AUTH_KEY')]	=	md5($_SESSION['uid']."_m_".$_SESSION['username']);
								
    			//添加详细表
    			M("member_info")->add( array('uid'=>$lastInsId) );
    			
				//发送注册邮件
				//SendMail($_POST['email'],"钢铁侠网欢迎你",'感谢你注册为呼闪会员，轻松找人，就用<a href="http://www.hushan.so" target="_bank">呼闪</a>!');
    			$email_link = WEB_URL."Users/docheckEmail/?key=".$email_key;
    			
    			if($data['type']==0){
    				sendById(3,$_SESSION['email'],$email_link);
    			}
    			
    			$this->success('恭喜你，注册成功！',"/Users/checkEmail");
    			
			} else {
				$this->error('很遗憾，注册失败，请稍后再试。');
			}
    	}
    }     
    
    public function test(){
        $this->display("User/guanlian");
    }

    public function header() {
    	$user = getUsersSession();
    	
    	
	    $this->uid = $user['uid'];
	    $this->status = $user['status'];
	    $this->type = $user['type'];
	    $this->nickname = $user['nickname'];
	    $this->username = $user['username'];
	    $this->email = $user['email'];
	    $this->user_status = $user['user_status'];
	    $myinfo = $this->getUsersInfoById($this->uid);
	    $this->assign("user",$user);
	    $this->assign("myinfo",$myinfo);
	    $this->display();
    }
    
}

?>