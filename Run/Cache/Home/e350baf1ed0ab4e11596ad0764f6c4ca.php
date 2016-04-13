<?php if (!defined('THINK_PATH')) exit();?>

<script type="text/javascript" src="/Public/Js/prototype.js"></script>
<script type="text/javascript" src="/Public/Js/Base.js"></script>
<script type="text/javascript" src="/Public/Js/mootools.js"></script>
<script type="text/javascript" src="/Public/Js/ThinkAjax.js"></script>

<SCRIPT LANGUAGE="JavaScript">
<!--
var PUBLIC	 =	 '/Public';
ThinkAjax.image = [	 '/Public/Images/loading2.gif', '/Public/Images/ok.gif','/Public/Images/update.gif' ]
ThinkAjax.updateTip	=	'更新中～';

function updateHandle(data,status){
	if (status==1)
	{
		$('result').innerHTML	=	'<span style="color:blue"><IMG SRC="/Public/images/ok.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="" align="absmiddle" > 登录成功！3 秒后跳转～</span>';
		$('form1').reset();
		window.location = '/Users/';
	}
}


//-->
</SCRIPT>

<style>

#simgarea {
    background: url("<?php echo (WEB_URL); ?>Public/Images/simgarea.jpg") repeat scroll 0 0 rgba(0, 0, 0, 0);
    float: left;
    min-height: 180px;
    width: 280px;
}

div.tagsinput div {
    display: block;
    float: left;
}

div.tagsinput input {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 1px solid rgba(0, 0, 0, 0);
    color: #757575;
    font-size: 13px;
    margin: 0;
    outline: 0 none;
    padding: 8px 5px;
    text-indent: 0;
    width: auto;
}
.pnitem input, .pnitem textarea {
    color: #757575;
    font-family: "微软雅黑",Arial;
}

div.tagsinput div {
    display: block;
    float: left;
}
.tags_clear {
    clear: both;
    height: 0;
    width: 100%;
}

div.tagsinput {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #DBE2E6;
    height: 100px;
    overflow-y: auto;
    padding: 2px;
    width: 300px;
}

#simageupload {
    float: left;
    margin-left: 30px;
    margin-top: 60px;
}

.pnitem {
    color: #757575;
    font-size: 14px;
}



.uploadifive-button {
    background: none repeat scroll 0 0 #9F9F9F;
    color: #FFFFFF;
    height: 40px;
    line-height: 40px;
    text-align: center;
    width: 120px;
}

.uploadifive-button input {
    height: 100%;
}
.pnitem input, .pnitem textarea {
    color: #757575;
    font-family: "微软雅黑",Arial;
}
input {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
}


#postbtn, #removebtn {
    background: none repeat scroll 0 0 #70CA10;
    color: #FFFFFF;
    display: inline-block;
    float: left;
    height: 40px;
    line-height: 40px;
    text-align: center;
    width: 120px;
}

</style>


  
  <div id="somoreitem">
    <div class="automw">
      <div id="smicontent" class="autocw"></div>
    </div>
  </div>
  
  <!--[if lt IE 10]><script type="text/javascript">window.location.href="<?php echo (WEB_URL); ?>update_browser.html";</script><![endif]-->
  
  <div id="container" class="automw">
  
      <div class="contentfw nosoo">
	      <ul id="umnav">
	        <li id="umnactive"><a href="javascript:void(0);">修改资料</a></li>
	        <!-- <li ><a href="javascript:void(0);">修改密码</a></li> -->
	      </ul>
	      
	      
	      <form action="<?php echo (WEB_URL); ?>Users/checkSettings/" method="post" name="myform" id="form1" enctype="multipart/form-data">
	      
	      <div id="postnew" data-id="" data-cid="4">
	        
	        <div class="pnitem" style="  line-height: 40px;">
	          <div class="pnlabel"><span class="inputmust">*</span>用户名</div>
	          <?php echo ($info["username"]); ?>
	        </div>
	        
	        <div class="pnitem">
	          <div class="pnlabel"><span class="inputmust">*</span>昵称</div>
	          <input type="text" value="<?php echo ($info["nickname"]); ?>" name="nickname" autocomplete="off" class="inputtxt" size="20" />
	        </div>
	        
	        <div class="pnitem">
	          <div class="pnlabel"><span class="inputmust">*</span>邮箱</div>
	          <input type="text" value="<?php echo ($info["email"]); ?>" name="email" autocomplete="off" class="inputtxt" size="20" />
	        </div>
	        
	        <div class="pnitem">
	          <div class="pnlabel"><span class="inputmust">*</span>电话</div>
	          <input type="text" value="<?php echo ($info["phone"]); ?>" name="phone" autocomplete="off" class="inputtxt" size="20" />
	        </div>
	        
	        <div class="pnitem">
	          <div class="pnlabel"><span class="inputmust">*</span>地址</div>
	          <input type="text" value="<?php echo ($info["address"]); ?>" name="address" autocomplete="off" class="inputtxt" size="20" />
	        </div>
	        	        
	        <div class="pnitem">
	          <div class="pnlabel"><span class="inputmust">*</span>个性签名</div>
	          <input type="text" value="<?php echo ($info["sign"]); ?>" name="sign" autocomplete="off" class="inputtxt" style="width:850px;"/>
	          <span class="inputmust">* 限100字以内</span>
	        </div>
	        
	        <div id="pnfoot">
	        
	        	<table>
		        <tr>
		        <td style="width:130px;">
		        	<input type="button" id="postbtn" value=" 提　交　 " onclick="ThinkAjax.sendForm('form1','/Home/User/checkSettings',updateHandle,'result')" name="submit_btn">
		        </td>
		        <td>
		        <span class="submitwarning" style="background:#ffffff;" id="result" ></span>
		      	</td>
		      	</tr>
		      	</table>
	          
	        </div>
	      </div>
	      
	      <input type="hidden" value="1" name="ajax">
	      
	      </form>
	      
	  </div>
      
      
      <div class="clear"></div>
      
             
    
  </div>
  
  
  
  


</div><!-- end #body-->

<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>

<div class="w960">

    <input type="hidden" id="resubmitToken" value="" />
    <a id="backtop" title="回到顶部" rel="nofollow"></a>


    <!--我要反馈按钮-->
   <!--  <div id="product-fk">
        <div id="feedback-icon">
        <div class="fb-icon"></div>
        <span>我要反馈</span>
        <em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
        <em class="error dn fk-suc">&nbsp;&nbsp;反馈提交成功！</em>
    </div>
    </div> -->

     <style type="text/css">
     #product-kf {width: 50px;
        height: 50px;
        position: fixed;
        bottom: 80px;
        margin-left: 1000px;
        cursor: pointer;
        z-index: 21;
    }
    #kefu-icon {position: relative;}
    #kefu-icon .fb-icon {width: 30px; height: 30px;  margin: 0 auto; background: url(http://www.jobsminer.cc/Public/Home/images/feedback.png) no-repeat; display: block;}
    #kefu-icon:hover .fb-icon{ background-position: 0px -31px;}
    #kefu-icon:hover span{ color: #F9753E;}
    #kefu-icon span{font-size: 12px; color: #555;/* display: block; width: 60px;position: absolute;left: 0; bottom: -15px;*/}
    #product-fknew{ display: inline-block;}
    #footer .fk-suc{position: absolute; bottom: -20px; left: 0;}
    #footer .abnav{position: relative;}
    </style>
    <div id="product-kf">
        <div id="kefu-icon">
            <div class="fb-icon"></div>
            <span>在线客服</span>
        </div>
    </div> 
    <script type="text/javascript">
         $('#product-kf').bind('click',function(){
                window.open('http://wpa.qq.com/msgrd?v=3&uin=2535357251&site=qq&menu=yes');
         });
    </script>
    
</div>




<div class="clr"></div>
<div id="footer">
	<div class="w960">
         <div class="abnav lf">
            <a href="/News/about.html" target="_bank">关于我们</a><a  target="_bank" href="/News/help.html">帮助中心</a>
            <!-- <a href="/?viewTools=mobile">移动版</a> -->
            <div id="product-fknew">
                <div id="feedback-iconnew">
                    <div class="fb-icon"></div>
                    <a>我要反馈</a>
                    <span></span>
                    <em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
                    <em class="error dn fk-suc">反馈提交成功！</em>
                </div>
            </div>

            <div id="feedback-con">
                <div class="pfb-pho-close">
                    <div class="pfb-pho"></div>
                    <div class="pfb-close"></div>
                </div>
                <em class="error dn"><span>你还没填任何反馈呢</span><i></i></em>
                <form id="product-fb">
                    <div class="pfb-txt">
                        <textarea placeholder="我是jobsminer的产品经理小飞机，如果你在网站使用时遇到问题或者对网站功能有趣的建议，请告诉我！也许过几天你的想法会变成现实哦~（200字以内）" maxlength="200"></textarea>
                    </div>
                    <div class="pfb-email" style="height:60px;">
                        <input type="text" name="email" placeholder="你的邮箱，方便及时给您回复（选填）"/>
                        <span class="ensure">确定</span>
                    </div>
                </form>
                <input type="hidden" id="login-email" value="quentin@015guan.com">
            </div>
            <script src="/Public/Home/js/core.min.js" type="text/javascript"></script>
        </div>
        <div class="bdsharebuttonbox">
           <div class="ft_share">
                <span class="dn" id="share_jd2">分享到微信</span>
                <div class="jd_share_success2">
               <!--  <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" /> -->
               <img src="/images/ebg/code.png">
                </div>
            </div>
            <a href="<?php echo C('SINA_URL');?>" class="bds_tsina" target="_bank" title="分享到新浪微博"></a>
            <a href="<?php echo C('FB_URL');?>" class="bds_fbook" target="_bank" title="分享到Facebook"></a>
         </div>
         <div class="rt"><?php echo C('COPYRIGHT');?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo C("WEB_SITE_ICP"); ?></div>
    </div>
</div>

<?php } endif; ?>

<a href="#0" class="cd-popup-trigger"></a>

<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		 <iframe src="/User/login.html?md=min" frameborder="0" width="650" height="350" scrolling="no"></iframe>
		<a href="#0" class="cd-popup-close img-replace"></a>
	</div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<script type="text/javascript" src="/Public/Home/js/login_min.js"></script>
<script type="text/javascript">
 $('#login_minpop').bind('click',function(){
        $.colorbox({inline:true, href:"#login_min"});
 });
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
            	
            	if(data.content.do_type==-1){
            		//event.preventDefault();
            		//$('.cd-popup').addClass('is-visible');
            		$(".cd-popup-trigger").trigger("click");
            		//$.colorbox({inline:true, href:"#login_min"});
            		//window.location.href="/User/login/?ref=/Jobs/info/id/<?php echo ($info["jid"]); ?>";
            	}
            	else alert(data.message);

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



<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?552852c7a726f8c3ec23f071d05ebe95";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>


</body>
</html>