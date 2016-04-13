<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );
$mysqli = new mysqli('localhost','root','','test') or die("connect wrong!");
$sql = "select * from `user` where `access_token` = '{$_SESSION['token']['access_token']}'";
$res = $mysqli->query($sql);
$row = $res->fetch_array();
if (!empty($row['access_token'])){
	$_SESSION['id'] = $row['id'];
    header("Location: ../user.php");
}else{
	 if(!empty($_SESSION['id'])){
	 //进行绑定
	 $sql = "update `user` set `access_token` = '{$_SESSION['token']['access_token']}' where `id`={$_SESSION['id']}";
	 $mysqli->query($sql);
	 header("Location: ../user.php");
	 }else{
	 echo "用户不存在，<a href=\"../login.php\">返回登录页面进行注册</a>";
	 }
}
$res->free();
$mysqli->close();
?>
