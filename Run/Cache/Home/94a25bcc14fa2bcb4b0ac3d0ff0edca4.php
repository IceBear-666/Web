<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta charset="UTF-8">

<title><?php if($page_title) echo $page_title;else echo C('WEB_SITE_TITLE'); ?> </title>
<meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>">
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>">

<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/reset.css" />

<script type="text/javascript" src="/Public/Home/js/jquery.1.10.1.min.js" ></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lib.mobile.js"></script>
<script src="/Public/Home/js/ajaxfileupload.js" type="text/javascript"></script>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
//var ctx = "";

var ctx = "<?php echo (WEB_URL); ?>";
var rctx = "<?php echo (WEB_URL); ?>";
var pctx = "<?php echo (WEB_URL); ?>";

/* var frontLogin = "http://www.xxxxx.com/frontLogin.do";
var frontLogout = "http://www.xxxxx.com/frontLogout.do";
var frontRegister = "http://www.xxxxx.com/frontRegister.do"; */

</script>


</head>


<body>

<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header">
          <a class="golevel" href="#"></a>
          <div class="logo"><a href="/index.html"><img src="/Public/Home/images/logo.png" /></a></div>
          <a class="gohome" href="<?php if(getUsersSession('type')==1) echo '/user/';else echo'/'; ?>"></a>
          <div class="clr"></div>
        </div>
        
        
      
	</div>

</div><?php endif; ?>

   
    
 <div class="w760 mt40">
   
   <div class="qa_header">
        <div class="page">

            <img src="/Public/Home/images/qa.png" class="qa_logo" />

            <div class="selector_wap clearfix">
                <div class="selector selector_employee">我在找工作</div>
                <div class="selector selector_employer active">我在招人</div>

                <div class="border"></div>
            </div>
        </div>
    </div>
    
   <div class="qa_content page">
	<div class="qa_wap qa_employee_wap">
    
		<div class="qa clearfix">
			<div class="q clearfix">
				<div class="q_icon">
				</div>
				<div class="q_content">
                       投递成功后，对简历的修改是否会影响之前的投递？
					<span class="arrow_wap">
					<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
					<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
					</span>
				</div>
			</div>
			<div class="a clearfix">
				<div class="a_icon">
				</div>
				<div class="a_content">
                        不会影响。HR看到的简历，是你投递时的状态。
				</div>
			</div>
		</div>
        
        
		<div class="qa clearfix">
			<div class="q clearfix">
				<div class="q_icon">
				</div>
				<div class="q_content">
                        是否可以重复投递同一职位？
					<span class="arrow_wap">
					<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
					<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
					</span>
				</div>
			</div>
			<div class="a clearfix">
				<div class="a_icon">
				</div>
				<div class="a_content">
                        不可以。
				</div>
			</div>
		</div>
        
        
		<div class="qa clearfix">
			<div class="q clearfix">
				<div class="q_icon">
				</div>
				<div class="q_content">
                       我的建立是否会被其他公司看到？
					<span class="arrow_wap">
					<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
					<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
					</span>
				</div>
			</div>
			<div class="a clearfix">
				<div class="a_icon">
				</div>
				<div class="a_content">
                        只有你投递的公司才能看到你的简历。
				</div>
			</div>
		</div>
        
        
		<div class="qa clearfix">
			<div class="q clearfix">
				<div class="q_icon">
				</div>
				<div class="q_content">
                       可以直接得到HR的联系方式吗？
					<span class="arrow_wap">
					<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
					<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
					</span>
				</div>
			</div>
			<div class="a clearfix">
				<div class="a_icon">
				</div>
				<div class="a_content">
                      不可以。
				</div>
			</div>
		</div>
		
	</div>
    
    
	<div class="qa_wap qa_employer_wap">
		<div class="qa_zr_frt" style="display:block;">
        
			<div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                        【注册、登录】我如何注册企业账号？注册后如何发布职位？是否收费？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                      1. 在首页右上角点击注册；选择“招人”，按照流程填写信息即可。<br />
                      2. 已经登录的账号，在右上角的用户名中，选择“我要招人”，按照流程填写信息即可。<br />
                      3. 企业方在找份工作注册、发布职位、接收简历，均为免费。

					</div>
				</div>
			</div>
            
            
            
			<div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                        【注册、登录】什么是企业邮箱？没有怎么办？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                        企业邮箱是指，以你公司域名为后缀的邮箱。只要公司有域名，腾讯、网易、搜狐等网站都有提供企业邮箱服务。如果没有企业邮箱，是不能开通招聘的。并且，没有其他途径可以开通。
					</div>
				</div>
			</div>
            
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                        【注册、登录】开通招聘时，一直没有收到验证邮件，怎么办？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       首先检查一下邮箱填写是否有误，其次检查一下垃圾箱中是否有拦截。如依旧存在问题，请使用接收验证邮箱给service@josminer.cc发一封邮件，写明“未收到验证邮件”，我们会为你重新发送。
					</div>
				</div>
			</div>
            
            
			<div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                       【注册、登录】可以修改、注销我用来登录的邮箱账号吗？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                        不可以。注册邮箱账号等于登录名字。
					</div>
				</div>
			</div>
            
            
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                      【注册、登录】忘记了登录账号怎么办？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       发邮件至service@josminer.cc，写明公司全称、接收简历的企业邮箱，我们会帮你查找。
					</div>
				</div>
			</div>
            
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                      【公司信息填写、修改】如何修改公司全称？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                      请用接收简历的企业邮箱发送邮件至service@josminer.cc，修改前是什么、修改后是什么，我们将为你修改。另外，公司全称如果修改幅度过大，需要提供营业执照和公司变更证明。
					</div>
				</div>
			</div>
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                     【公司信息填写、修改】如何修改公司领域？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       请用接收简历的企业邮箱发送邮件至service@josminer.cc，写明公司全称，及需要修改成什么领域。我们将为你修改。
					</div>
				</div>
			</div>
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                      【公司信息填写、修改】如何修改接收简历的邮箱？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       “账号设置”中有“修改常用邮箱”选项，可修改常用邮箱。如企业邮箱变更，请用原企业邮箱发送邮件至service@josminer.cc，写明修改后邮箱地址，我们将为你修改。
					</div>
				</div>
			</div>
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                      【公司信息填写、修改】我的公司信息为什么有多个？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       乔麦网上的公司信息都是由企业方自行创建的。如果你或你同事在注册时没有选择已有的公司信息而自行创建，就会出现多个公司信息。你可以用接收简历的企业邮箱，发送邮件至service@josminer.cc申请合并公司信息。
					</div>
				</div>
			</div>
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                      【职位发布】我发布的职位能刷新吗？怎样刷新？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                      每个职位每七天可以刷新一次。进入你账号中的“我发布的职位”，在“有效职位”中，进行刷新操作。
					</div>
				</div>
			</div>
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                     【职位发布】我发布的职位可以保留多久？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       如一个职位在两个月内没有任何刷新、编辑的操作，该职位将会下线。下线前一周，你会收到邮件提醒。
					</div>
				</div>
			</div>
            
            
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                     【职位发布】我没发布过的职位，为什么会有职位在我的公司信息下出现？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       我们是允许同一个公司信息下用多个账号存在的。如你没有发布过，说明是你公司同事发布的。如对此职位有疑问，你也可以用接收简历的企业邮箱，发送邮件至service@josminer.cc，附上职位链接，我们可以帮你查找发布该职位的企业邮箱地址。
					</div>
				</div>
			</div>
            
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                     【职位发布】我刚发布的职位怎么搜索不到？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       刚发布的职位，在15-20分钟后能搜索到。
					</div>
				</div>
			</div>
            
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                     【职位发布】我想发布的职位，没有相应的职位类别可选，怎么办？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                      1. 查看有无相近类别可选。选择相似类别。<br />
                      2.或将你要发布职位的名称、岗位职责以邮件形式发送至service@josminer.cc，我们将进行评估，以完善我们的职位类别。

					</div>
				</div>
			</div>
            
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                     【简历接收】查看、下载收到的简历，需要付费吗？
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       免费。
					</div>
				</div>
			</div>
            
            
            <div class="qa clearfix">
				<div class="q clearfix">
					<div class="q_icon">
					</div>
					<div class="q_content">
                     商务合作
						<span class="arrow_wap">
						<img src="/Public/Home/images/up.png" class="arrow_up" alt="隐藏"/>
						<img src="/Public/Home/images/down.png" class="arrow_down" alt="展开"/>
						</span>
					</div>
				</div>
				<div class="a clearfix">
					<div class="a_icon">
					</div>
					<div class="a_content">
                       请发送邮件至bd@jobsminer.cc，写明合作事项，我们会有专人处理。
					</div>
				</div>
			</div>
            
            
            
		</div>
	</div>
</div>
   
 </div>
  
<script src="/Public/Home/js/qa.js" type="text/javascript"></script>
      
<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>
<div style="height:60px;"></div>
<div class="clr"></div>


    <?php if(is_login()): if(getUsersSession('type')==1){ ?>
                  
              <div id="comfooter">
                  <a  <?php echo ($cur_top_nav["noread"]); ?> href="/Company/interview/type/noread">未读简历</a><!-- <?php echo ($cur_top_nav["noread"]); ?> -->
                  <a  <?php echo ($cur_top_nav["user"]); ?> href="/User/">个人中心</a><!-- <?php echo ($cur_top_nav["user"]); ?> -->
              </div>
          
          <?php }else{ ?>
          
              
              <div id="footer">
                  <a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/">职位</a>
                  <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/">公司</a>
                  <a <?php echo ($cur_top_nav["user"]); ?> id="mwode" href="/User/">我的</a>
              </div>
              
         <?php } ?>
         
      <?php else: ?>   
         <div id="footer">
                  <a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/">职位</a>
                  <a <?php echo ($cur_top_nav["company"]); ?> href="/Company/">公司</a>
                  <a <?php echo ($cur_top_nav["user"]); ?> id="mwode" href="/User/">我的</a>
         </div><?php endif; ?>

<?php } endif; ?>

<script type="text/javascript">
/* $(function(){
	$(".picbig").each(function(i){
		var cur = $(this).find('.img-wrap').eq(0);
		var w = cur.width();
		var h = cur.height();
	   $(this).find('.img-wrap img').LoadImage(true, w, h,'{IMG_PATH}msg_img/loading.gif');
	});
}) */

//$("#user_collection_btn").click(function(){ 
    
function user_collection(id,type,flag,refresh){	
    //flag:1职位2公司3宣讲会
    //type：0取消1收藏
    
    //$("#btn_collect").attr('disabled',"true");
    
    if(!id || !flag){
        alert("参数无效");
        //$("#btn_add").removeAttr("disabled");
        return false;
    }
    if(type!=0 && type!=1 ){
    	alert("参数无效");
        //$("#btn_add").removeAttr("disabled");
        return false;
    }
    
    $.ajax({
        type:"POST",
        url:ctx +"User/collectAdd",
        data:{id:id,type:type,flag:flag},
        dataType:'json',
        beforeSend:function(){
        },          
        success:function(data){
        	//data = $.parseJSON( data );
            if(data.success){
                alert(data.msg);
                if(refresh){
                	window.location.reload();
                }
                return false;
            }
            else {
            	alert(data.message);
            	if(data.content.do_type==-1){
            		window.location.href="/User/login/?ref=/Jobs/info/id/<?php echo ($info["jid"]); ?>";
            	}
            	
            
            }
            return false;
            //$("#btn_collect").removeAttr("disabled");  
        }   ,
        //调用执行后调用的函数
        complete: function(XMLHttpRequest, textStatus){
        	//$("#btn_collect").removeAttr("disabled");
        	//return false;
        },
        //调用出错执行的函数
        error: function(){
        	//$("#btn_collect").removeAttr("disabled");
            alert("收藏失败，请稍后再试");
            return false;
        }        
     });
    
}
      
//});


</script>

<script>
$(".icous").hover(function(){$(this).find(".inusnav").slideDown(200);},function(){$(this).find(".inusnav").slideUp(50);});
</script>
<script>
	// 关闭
	//3s tips消失
	var global = {}
	global.email = "<?php echo C($Think.session.email);?>";
	global.usertoken = $.cookie('user_trace_token');
</script>

<script>
	$(document).click(function(){
		$(".ft_share").removeClass('share_open2');
		$(".ft_share").removeClass("share_click2");
		$(".ft_share").removeClass("share_hover2");
		$(".licity").hide();
	});
	//微信分享
	$('.ft_share').click(function(event){
		$(this).unbind("mouseover");
		$(this).unbind("mouseout");
		if($(this).hasClass("share_open2")){
			$(this).removeClass('share_open2');
			$(this).removeClass("share_click2");
			$(this).removeClass("share_hover2");
		}else{
			$(this).addClass('share_open2');
			$(this).addClass("share_click2");	
			$(this).find("span#share_jd2").addClass("dn") ;
		}
		/*$(this).find("span#share_jd2").addClass("dn") ;*/
		event.stopPropagation();	
	});
</script>
<script> 
with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~ (-new Date() / 36e5)]; 
</script>
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>

</body>
</html>