<?php if (!defined('THINK_PATH')) exit(); if($show_header > 0): ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户绑定-<?php echo ($webConfig['title']); ?></title>
<meta name="keywords" content="<?php echo ($webConfig['keywords']); ?>" />
<meta name="description" content="<?php echo ($webConfig['desc']); ?>" />

<base href="<?php echo (WEB_URL); ?>" />

<link rel="stylesheet"  href="/Public/Css/login.css" type="text/css"/>

<script type="text/javascript" src="/Public/Js/prototype.js"></script>
<script type="text/javascript" src="/Public/Js/Base.js"></script>
<script type="text/javascript" src="/Public/Js/mootools.js"></script>
<script type="text/javascript" src="/Public/Js/ThinkAjax.js"></script>

<SCRIPT LANGUAGE="JavaScript">
<!--
var PUBLIC	 =	 '/Public';
ThinkAjax.image = [	 '/Public/Images/loading2.gif', '/Public/Images/ok.gif','/Public/Images/update.gif' ]
ThinkAjax.updateTip	=	'注册中～';

function regHandle(data,status){
	if (status==1)
	{
		$('result').innerHTML	=	'<span style="color:blue"><IMG SRC="/Public/images/ok.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="" align="absmiddle" > 登录成功！3 秒后跳转～</span>';
		$('form1').reset();
		window.location = '/Home/Users/';
	}
}

function keydown(e){
	var e = e || event;
	if (e.keyCode==13)
	{
		ThinkAjax.sendForm('form1','/Home/Public/checkReg/',regHandle,'result');
	}
}
function fleshVerify(){ 
	//重载验证码
	var timenow = new Date().getTime();
	$('verifyImg').src= '/Home/Public/verify/'+timenow;
}
if ( window != top){  window.top.location =window.location;}  

//-->
</SCRIPT>


<style>


#ulpanel {
    margin: 10px auto 0;
    width: 340px;
}

.submitwarning {
    background: none repeat scroll 0 0 #ffffff;
      text-align: left;
}
#userlogin{height: 550px;}

</style>

</head>
<body style="background:#f1f1f1;"><?php endif; ?>



<div id="userlogin">
  <div id="ulpanel">
    <form action="" method="post" name="myform" id="form1">
      <p id="ul-s1"><span id="ul-s2">完善个人信息</span></p>
      
      <p id="ul-s4">输入昵称</p>
      <p>
        <input type="text" placeholder="昵称" name="nickname" class="inputnone inputtxt2" autocomplete="off" value="<?php echo ($nickname); ?>" />
      </p>
      
      <p id="ul-s4">输入密码</p>
      <p>
        <input type="password" class="inputnone inputtxt2" name="password" autocomplete="off" placeholder="密码"/>
      </p>
      
      <p id="ul-s4">输入确认密码</p>
      <p>
        <input type="password" class="inputnone inputtxt2" name="password2" autocomplete="off" placeholder="确认密码"/>
      </p>
      
      <!-- <p id="ul-s4">输入邮箱</p>
      <p>
        <input type="text" placeholder="邮箱" name="email" class="inputnone inputtxt2" autocomplete="off" value="" />
      </p>
      
      <p id="ul-s4">选择性别</p>
      <p style="height:30px; line-height:30px;">
        <input type="radio" name="sex" class="inputnone" value="1" checked/> 男 &nbsp; 
      	<input type="radio" name="sex" class="inputnone" value="2" /> 女 &nbsp; 
      </p>
      
      <p id="ul-s4">验证码</p>
      <p style="height:32px; line-height:32px;">
      	
        <input type="text" class="inputnone inputtxt2" style="width:100px; float:left;height:30px; line-height:30px;margin:0 10px 0 0;" name="code" autocomplete="off" placeholder="验证码"/>
        &nbsp; 
        <IMG id="verifyImg" SRC="/Home/Public/verify/" onclick="fleshVerify()" BORDER="0" ALT="点击刷新验证码" style="cursor:pointer" align="middle">
      </p> -->
      
      <div id="ul-s5" style="margin-top: 15px;height:45px; line-height:45px;">
        <table>
        <tr>
        <td style="width:130px;">
        <input type="button" id="sendlogin" class="inputnone" value=" 提 交 " onclick="ThinkAjax.sendForm('form1','/Home/Public/checkReg',regHandle,'result')" />
        </td>
        <td>
        <span class="submitwarning" id="result" ></span>
      	</td>
      	</tr>
      	</table>
      </div>
      <input type="hidden" value="1" name="ajax">
      <input type="hidden" value="<?php echo ($accesstoken); ?>" name="accesstoken">
    </form>
  </div>
  <div id="ulline"></div>
  <div class="clear"></div>
  

</div>


<?php if($show_header > 0): ?></body>
</html><?php endif; ?>