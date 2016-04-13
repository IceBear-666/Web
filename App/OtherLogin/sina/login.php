<?php
header("Content-type:text/html;charset=utf-8");
session_start();

include_once( './api/config.php' );
include_once( './api/saetv2.ex.class.php' );
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );

if(!empty($_POST['submit'])){
	$mysqli = new mysqli('localhost','root','','test');
	$username = $_POST['username'];
	$password = MD5($_POST['password']);
	$sql = "select * from `user` where `username` = '$username' and `password` = '$password'";
	$query = $mysqli->query($sql);
	$row = $query->fetch_array();
	if ($row[0]){
		$_SESSION['id'] = $row['id'];
		header("Location:user.php");
	}else{
		echo "用户名或密码错误";
	}
}

?>
<form method="post">
用户：<input type="text" name="username" /><br/>
密码：<input type="password" name="password" />
<input type="submit" name="submit" value="登录" />&nbsp;<a href="<?php echo $code_url ?>">新浪微博登录</a>
</form>