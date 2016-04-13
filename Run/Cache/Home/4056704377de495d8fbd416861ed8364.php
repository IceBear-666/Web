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

<link rel="stylesheet" type="text/css"  href="/Public/Home/mcss/reg.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/external.min.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/mcss/popup.css"/>
<style>
#xieyi{ height:200px; line-height:24px; margin-bottom:10px; overflow-y:scroll}

</style>
<div class="mbbox">
  <input type="hidden" id="resubmitToken" value=""/>
  <div class="login_box">
  
    <form id="registerForm"  action="/User/register_iframe.html" method="post" name="forms">
    
      <div id="dncom">   
         
           <div class="loginForm">
            <input type="text" id="email" ajaxurl="/member/checkUserEmailUnique.html" errormsg="请填写正确格式的邮箱" nullmsg="请填写邮箱" autocomplete="off" datatype="e" name="email" tabindex="1" placeholder="请输入常用邮箱"/>


            <div style="position:relative;">
               <div id="editipt"> 
                 <input type="password" oncut="return false" onpaste="return false" id="password" name="password" tabindex="2" placeholder="设置密码，不低于6位" errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20"/>
               </div>
               <div id="editpw"><a class="offpw" href="javascript:showps()"></a></div>
             </div>
             
          </div>
          
            <span class="error" style="display:none;" id="beError"></span>
             <div class="clr"></div>
            <label class="registerJianJu" for="checkbox">
              <input type="checkbox" id="web_rule" name="web_rule" checked class="checkbox valid"/>
              我已阅读并同意<a class="colac inline"  href="#xieyi" title="乔麦网用户协议">《乔麦网用户协议》</a> </label>
            <!-- <p>(此账号也可直接登录Jobsminer网站)</p> -->
            <input type="hidden" value="0" name="type"/>
            <input type="submit" id="submitLogin" class="mybtn f20 mt20" value="注 册"/>
            <input type="hidden" id="callback" name="callback" value=""/>
            <input type="hidden" id="authType" name="authType" value=""/>
            <input type="hidden" id="signature" name="signature" value=""/>
            <input type="hidden" id="timestamp" name="timestamp" value=""/>
            
      </div>      
      
    </form>
    
    <div id="noregcom" class="dn">
       <span>目前手机版还没有开放企业端注册哦，</span><br />
       <span class="noreg2">请前往网页版注册吧</span>
    </div>

    <div class="txtct pdt20" style="text-align:left">已有账号？<a class="sty colac"  href="<?php echo U('User/login_iframe');?>">立即登录</a></div>

    <div id="jm_popup_loading" style="position:absolute;  left: 50%; top: 50%; margin-left: -50px; margin-top: -50px;z-index:100; display:none;  background: url(http://www.jobsminer.cc/Public/Home/images/overlay.png) repeat 0 0;">
      <img src="http://www.jobsminer.cc/Public/static/client.jobsminer.cc/godimage/loading.gif">
    </div>
    
    <!-- <a target="_blank" href="http://www.jobsminer.cc/zhushou" style="  width: 80px; height: 33px; border-radius: 2px; background-color: #fff; color: #ac6198; border: 1px solid #ac6198; float: right; line-height: 33px; font-size: 14px; text-align: center;">查看教程</a> -->
  </div>
  
  
  <div class="login_box_btm"></div>
</div>

 <div style="display:none;">
     <div id="xieyi" class="popup">
        <?php echo ($webRule); ?>
        <br />

      </div>
</div>

<!-- <script type="text/javascript" src="/Public/Home/js/jquery.validate.js" ></script>
<script type="text/javascript" src="/Public/Home/js/main.js" ></script>  -->

<script type="text/javascript" src="/Public/Home/js/popup.js"></script>

<!-- 眼镜显示隐藏密码 -->
<script language="JavaScript">
    function showps(){
      if (this.forms.password.type="password") {
        document.getElementById("editipt").innerHTML="<input type=\"text\" name=\"password\" oncut=\"return false\" onpaste=\"return false\"  id=\"password\" placeholder=\"请输入密码\" errormsg=\"密码为6-20位\" nullmsg=\"请填写密码\" datatype=\"*6-20\" tabindex=\"2\" value="+this.forms.password.value+">";
        document.getElementById("editpw").innerHTML="<a class=\"onpw\" href=\"javascript:hideps()\"></a>"
      }
    }
    function hideps(){
      if (this.forms.password.type="text") {
        document.getElementById("editipt").innerHTML="<input type=\"password\" name=\"password\" id=\"password\"  oncut=\"return false\" onpaste=\"return false\" placeholder=\"请输入密码\" errormsg=\"密码为6-20位\" nullmsg=\"请填写密码\" datatype=\"*6-20\" tabindex=\"2\" value="+this.forms.password.value+">";
        document.getElementById("editpw").innerHTML="<a class=\"offpw\" href=\"javascript:showps()\"></a>"
      }
    }
    // $("#registerForm input[type=submit]").unbind("click").bind("click",function(e){
    //   if(!$('.jm-mask').html()){
    //           $('#registerForm').append('<div class="jm-mask"></div>');
    //           $("#jm_popup_loading").show();
    //       }else{
    //           $(".jm-mask,#jm_popup_loading").show();
    //       }
    //   });
</script>


<script type="text/javascript">

  $("#regjob").click(function(){
    $("#email").attr('placeholder','请输入常用邮箱地址');
     $("#dncom").show();
     $("#noregcom").hide();
  })
  $("#regcom").click(function(){
    $("#dncom").hide();
    $("#noregcom").show();
  })

  $(document).ready(function() {
    $(".register_radio li input").click(function() {
      $(this).parent("li").addClass("current").append("<em></em>").siblings().removeClass("current").find("em").remove()
    })

  })

    $(document)
      .ajaxStart(function(){
        $("#submitLogin").addClass("log-in").attr("disabled", true);
      })
      .ajaxStop(function(){
        $("#submitLogin").removeClass("log-in").attr("disabled", false);
      });


    $("form").submit(function(){
      $("#beError").hide();
      var self = $(this);
      $.post(self.attr("action"), self.serialize(), success, "json");
      return false;

      function success(data){
        if(data.status){
          window.location.href = data.url; //"/Home/User/";//
        } else {
          //self.find(".Validform_checktip").text(data.info);
          $("#beError").show();
          $("#beError").text(data.info);
          //刷新验证码
          //$(".reloadverify").click();
        }
      }
    });

  $(function(){
    var verifyimg = $(".verifyimg").attr("src");
           $(".reloadverify").click(function(){
               if( verifyimg.indexOf('?')>0){
                   $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
               }else{
                   $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
               }
           });
  });
</script>

      
<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>
<div style="height:60px;"></div>
<div class="clr"></div>


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