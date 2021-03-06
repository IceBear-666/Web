<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{font-size:14px; font-family:"Microsoft YaHei";}
a{color:#AC6198; font-weight:bold;}
a:hover{text-decoration: underline;}
.login_logo{ text-align:center; padding-top:40px;}
.yzbtn{ padding:30px 0px 30px 0px;}
.yzbtn a{ background:#AC6198; color:#fff; padding:8px 14px; font-size:15px;}
.yzbtn a:hover{background:#BE83AE; text-decoration:none;}
.zise{ color:#AC6198; font-weight:bold}
.mymsg p{ display:block; font-size:16px; text-align:center; line-height:28px;}

.yzbox{width:640px;margin:0 auto;color:#5C5C46;font-size:14px;padding-top:80px}

.mymsg{margin-top:40px; background:#fff; padding:60px; line-height:22px;}
.mymsg h2{ display:block; text-align:center; font-weight:normal; font-size:22px; padding-bottom:20px}

.mymsg .success{  color:#2DB200;font-size:18px; padding-bottom:10px; }
.mymsg .error{ color:#FF4000; font-size:18px; padding-bottom:10px; }

</style>
</head>
<body style="background:#FADC62;">
<div class="yzbox">
  <div class="login_logo"> <a href="/"><img src="/Public/Home/images/uslogo.png" /></a></div>
  <div class="mymsg">
    <div class="system-message">
      <?php if(isset($message)): ?><h2>系统提示</h2>
        <p class="success"><?php echo($message); ?></p>
        <?php else: ?>
        <h2>系统提示</h2>
        <p class="error"><?php echo($error); ?></p><?php endif; ?>
      <p class="detail"></p>
      <!-- <p class="jump"> 页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait">  -->
          <p class="jump"> 页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait">
      <?php echo($waitSecond); ?></b> </p> 
    </div>
  </div>
</div>

<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>