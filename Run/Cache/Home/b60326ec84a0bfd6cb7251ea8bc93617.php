<?php if (!defined('THINK_PATH')) exit();?>
<style type="text/css">
	body{
		padding: 0;
		margin: 0;
		background: #ffda44;
		/*background: -webkit-radial-gradient(circle, #ffda44, #B99912);
  		background: -moz-radial-gradient(circle, #ffda44, #B99912);*/
	}
  /*.jm_contrainer_bg{
  	background-color: #FFDA44;
  	
  	margin: 0;
  	padding: 0;
  	width: 100%;
  	height: 100%;
  }
  .jm_main{
  	 text-align: center;
  	 vertical-align: middle;
  	 display: block;
  	 margin: 0 auto;
  	 width: 1280px;
  }*/
	.jm_contrainer_bg{
		position:absolute; /*绝对定位*/ 
		top:50%; /*距顶部50%*/ 
		left:50%; 
		margin:-400px 0 0 -640px; /*设定这个div的margin-top的负值为自身的高度的一半,margin-left的值也是自身的宽度的一半的负值.(感觉在绕口令)*/ 
		width:1280px; /*宽为400,那么margin-top为-200px*/ 
		height:800px; /*高为200那么margin-left为-100px;*/ 
		z-index:99; /*浮动在最上层 */ 
	}
	.jm_contrainer_bg .copyright{
		width: 350px;
		height: 48px;
		left: 50%;
		margin-left: -175px;
		position: absolute;
		bottom: 0;
		font-family: "Microsoft YaHei";
		text-align: center;
		color: #3B2103;
		font-size: 14px;
	}
	.jm_contrainer_bg .copyright a{
		color: #3B2103;
		text-decoration: underline;
	}
	.jm_contrainer_bg .copyright a:hover {
		color: #84796C;
	}
</style>
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/company.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/external.min.css" />
<!DOCTYPE html>
<html>
<head>
	<title>白熊求职- 敬请期待</title>

</head>

<body>
	
	<div class="jm_contrainer_bg">
		<div class="jm_bg"></div>
		<img class="jm_main" src="Uploads/Plugin/coomingsoon.png" >
		<div class="copyright">
			<p >©2016深圳找份工作科技有限公司 <a href="http://www.miitbeian.gov.cn/" target="_blank">粤ICP备15039433号</a></p>
		</div>
		
	</div>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76243985-1', 'auto');
  ga('send', 'pageview');


  // localStorage.setItem("jm_login", document.cookie);
//   chrome.runtime.sendMessage({"jm_login", document.cookie}, function(response) {
//     console.log(response.farewell);
// });
</script>
</body>
</html>