<?php


//微信账号配置
function getWxConfig($appid){
    $arr = array(
        "cwxu"=>array(//C http://www.www.com/Wx/index/hash/cwxu
            'appid'=>"wxf7d4480ea26c9dd3",
            'apps'=>'56270120161c3bfe9f98f085ef36faf8',
            'yid'=>'gh_9b78323d7106',
            'aeskey'=>'iB74HJ5EmkIAaDVZf8mWI7mE3sZwgDYqsNjxCz0XvkY',
            'token'=>'aqer74by4yi7i47NJ1gd3',
            'name'=>'Jobsminer服务号',
        ),
        "bwxu"=>array(//B
            'appid'=>"6c9dd3",
            'apps'=>'888181f0713',
            'yid'=>'gh_9666',
            'aeskey'=>'000000ZwgDYqsNjxCz0XvkY',
            'token'=>'aqer74by4yi7i47NJ1gd3',
            'name'=>'Jobsminer订阅号',
        ),
    );
    return $arr[$appid];
}


function customError($msg,$type="error"){
    print_test($msg);
    exit();
}

function getHidePhone($mobile,$view_contact=0){
    
    if($view_contact==0){
        return substr($mobile, 0,7)."****";
    }
    return $mobile;
}

function getHideEmail($email,$view_contact=0){

    if($view_contact==0){
        $arr = explode("@", $email);
        return "**********@".$arr[1];
    }
    return $email;
}

//获取邮件发送模板(激活邮件除外)
function getSendEmailTpl($id,$data=array()){
	$info = M("email_tpl")->where(array('tid'=>$id))->find();
	if(!$info){
		return false;
	}

	//$title = "来自jobsminer邮件";
	$date = date("Y-m-d");
	$title = $info['title'];
	$tpl = $info['content'];
	$tpl = str_replace("{date}",$date,$tpl);
	foreach ($data as $k=>$v){
	    
	    if( ($id==4 || $id==7) && !$v){
	        if($k=="xueli" || $k=="xuexiao"){
	            $tpl = str_replace('<p>毕业院校：{xueli} · {xuexiao}</p>',"",$tpl);
	        }
	        else if($k=="zhiwei" || $k=="gongsi"){
	            $tpl = str_replace('<p>最近工作：{zhiwei} · {gongsi}</p>',"",$tpl);
	        }
	        else if($k=="status" ){
	            $tpl = str_replace('<p>目前状态：{status}</p>',"",$tpl);
	        }
	        else $tpl = str_replace('{'.$k.'}',$v,$tpl);
	    }
	    else $tpl = str_replace('{'.$k.'}',$v,$tpl);
		
		$title = str_replace('{'.$k.'}',$v,$title);
	}

	return array("title"=>$title,"content"=>$tpl);
}


//系统发激活邮件
function sendById($id,$email,$to_uid=0,$data=array()){

	$user = getUsersSession();

	if( !$id || !$email ){
		return '';
	}

	if($id==1){
		if(!$user['uid']){
			return false;
		}
		//分为个人还是企业
		if($user['type']==1){
			$id = 2;
		}
		else if($user['type']==0){
			$id = 1;
		}
		else return 0;

		$res = getSendEmailTpl($id,$data);
	}
	else if($id==3){
		$res = getSendEmailTpl($id,$data);
	}
	else{
		if(!$user['uid']){
			return false;
		}

		if($id==4){//简历投递
			$company_info = getUsersInfo(array("m.uid"=>$to_uid));
			$user_info = getUsersInfo(array("m.uid"=>$user['uid']));

			$job = $data;

			if(!$company_info || !$user_info || !$job){
				return false;
			}

			$last_edu = getUserLastEdu($user['uid']);
			$last_work = getUserLastWork($user['uid']);
			$email = $company_info['email'];

			$content = array(
				'company_name'=>$company_info['company_short_name']?$company_info['company_short_name']:$company_info['company_name'],
				'company_short_name'=>$company_info['company_short_name'],
				'hr_name'=>getEmailName($email),

				'realname'=>$user_info['realname'],
				'sex'=>$user_info['sex']==2?"女":"男",
				'edu'=>$user_info['edu'],
				'workyear'=>$user_info['workyear'],
				'city'=>$user_info['city'],
				'status'=>$user_info['workstatus'],
				'uid'=>$user_info['uid'],
			    
			    //'zhuanye'=>$user_info['zhuanye'],
			    //'byxy'=>$user_info['byxy'],

				'position_name'=>$job['zhiwei_mingcheng'],
			    'aid'=>$job['aid'],

				//'xueli'=>$last_edu['company_name'],
				//'xuexiao'=>$last_edu['education'],
			    
			    'xueli'=>$user_info['edu'],
			    'xuexiao'=>$user_info['byxy'],
			    
				'zhiwei'=>$last_work['positionName'],
				'gongsi'=>$last_work['companyName'],
			);
			$res = getSendEmailTpl($id,$content);
		}
		else return false;

	}

    //echo $email;print_test($res);

	$rs =  SendMail($email,$res['title'],$res['content']);

	if($id==4){
		if($company_info['email']!=$company_info['email_jianli'] && $company_info['email_jianli']){
			$email = $company_info['email_jianli'];
			$content['hr_name'] =getEmailName($email);
			$res = getSendEmailTpl($id,$content);
			SendMail($email,$res['title'],$res['content']);
		}
	}

	return $rs;

	/* $info   =  M('email_tpl')->where(array("tid"=>$id))->find();
	if(!$info){
		return '';
	}
	else{
		$date = date("Y-m-d");
		$info['content'] = str_replace(array('{email}','{link}','{date}'), array($address,$link,$date), $info['content']);

		$rs =  SendMail($address,$info['title'],$info['content']);

		return $rs;
	} */

}

/**********
 * 发送邮件 *
**********/
function SendMail($address,$title,$message,$configarr='')
{
	if(!$configarr) {
		//$configarr = require(DATA_PATH.'webEmail.php');
	}

	if(!SEND_EMAIL){
	    return true;
	}

	$configarr = array(
			'send_name' => C("EMAIL_NAME"),
			'send_pwd' => C("EMAIL_PASSWORD"),
			'send_address' => C("EMAIL_ADDRESS"),
			'send_smtp' => C("EMAIL_SMTP"),
			'reply_name' => C("EMAIL_NAME"),
			'reply_address' => C("EMAIL_ADDRESS"),
	);

	if(!$configarr || !$address || !$title || !$message) {
		return -1;
	}

	require_once(DATA_PATH.'PHPMailer/class.phpmailer.php');

	$mail=new PHPMailer();
	// 设置PHPMailer使用SMTP服务器发送Email
	$mail->IsSMTP();

	$mail->SMTPDebug  = 1;// 关闭SMTP调试功能

	// 设置邮件的字符编码，若不指定，则为'UTF-8'
	$mail->CharSet='UTF-8';

	// 添加收件人地址，可以多次使用来添加多个收件人
	$mail->AddAddress($address);

	// 设置邮件正文
	$mail->Body=$message;

	// 设置邮件头的From字段。
	$mail->From=$configarr['send_address'];

	// 设置发件人名字
	$mail->FromName=$configarr['send_name'];

	// 设置邮件标题
	$mail->Subject=$title;

	// 设置SMTP服务器。
	$mail->Host=$configarr['send_smtp'];

	// 设置为“需要验证”
	$mail->SMTPAuth=true;

	//$mail->Port = 465;

	// 设置用户名和密码。
	$mail->Username=$configarr['send_address'];
	$mail->Password=$configarr['send_pwd'];

	//回复
	$mail->AddReplyTo ( $configarr['reply_address'], $configarr['reply_name'] );
	// 发送 HTML邮件
	$mail->IsHTML (true );

	// 发送邮件。
	$rs = $mail->Send();
	if(!$rs){
		//echo $mail->ErrorInfo;exit;
		//echo 'Mailer Error: ' . $mail->ErrorInfo;
		//exit;
	}
	return  $rs;
}


//获取emall名称
function getEmailName($email=''){

	if(isEmail($email)){
		$arr = explode("@", $email);
		return $arr[0];
	}
	else return '';

}
