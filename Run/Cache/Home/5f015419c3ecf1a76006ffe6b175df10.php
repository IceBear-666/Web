<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="UTF-8">

<title><?php if($page_title) echo $page_title;else echo C('WEB_SITE_TITLE'); ?> </title>
<meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>">
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>">

<link rel="stylesheet" type="text/css"  href="/Public/Home/css/common.css" />
<link rel="stylesheet" type="text/css"  href="/Public/Home/css/reset.css" />
<link rel="shortcut icon" type="image/ico" href="/favicon.ico">

<script type="text/javascript" src="/Public/Home/js/jquery.1.10.1.min.js" ></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lib.min.js"></script>

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
<div id="body">

<?php if($show_nav == 1): ?><div class="num_box">
	<div class="num" id="num_00">
    
      <div class="header">
        <div class="w960">
          <div class="logo"><a href="/index.html"><img src="/Public/Home/images/logo.gif" /></a></div>
          
          
          <?php if(is_login()): if(getUsersSession('type')==1){ ?>
          
          		<div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/info.html">我的公司</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Company/interview.html">简历管理</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div>
          		
          	<?php }else{ ?>
          	
          		<div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["resume"]); ?> href="/Resume/myresume.html">我的简历</a><a <?php echo ($cur_top_nav["collections"]); ?> href="/User/collections.html">我的收藏</a></div>
          		
          		
          	<?php } ?>
          
          	<div class="login">
	          	<div class="icous">
                    <div class="inusnav">
                      <em></em>
                      <?php if(getUsersSession('type')==0){ ?>
                      <a href="/User/delivery.html">投递管理</a>
                      <?php } ?>
                      <a href="/User/index.html">账号设置</a>
                      <a href="<?php echo U('User/logout');?>">退出</a>
                    </div>
                </div>
	          </div>
          
          <?php else: ?>
          
	          <div class="nav"><a <?php echo ($cur_top_nav["job"]); ?> href="/Jobs/index.html">职位</a><a <?php echo ($cur_top_nav["company"]); ?> href="/Company/index.html">公司</a><a <?php echo ($cur_top_nav["video"]); ?> href="/Video/index.html">宣讲会</a><a <?php echo ($cur_top_nav["post"]); ?> href="/Company/createPost.html">发布职位</a></div>
	          <div class="login">
	          
	          <a class="sty"  href="<?php echo U('User/login');?>">登录</a><a class="sty" href="<?php echo U('User/register');?>">注册</a>
	          </div><?php endif; ?>
          
          </div>
          <div class="clr"></div>
        </div>
      
	</div>

</div><?php endif; ?>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/popup.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/external.min.css"/>
<script type="text/javascript" src="/Public/Home/js/additional-methods2.js"></script>

<div class="w960 mt30">


<!-- 左侧开始 -->
<div class="lw240 usnav">
    <a href="/User/index.html" class="iunav1 <?php echo ($left_menu["index"]); ?>">账号绑定</a>
    <a href="/User/index.html?type=pwd" class="iunav2 <?php echo ($left_menu["pwd"]); ?>">修改密码</a> 
    
    <?php if(getUsersSession('type')==1){ ?>
    <a href="/User/template.html" class="iunav3 <?php echo ($left_menu["template"]); ?>">修改通知面板</a>
    <a href="/User/index.html?type=email" class="iunav4 <?php echo ($left_menu["email"]); ?>">修改接收简历</a>
    <?php } ?>
</div>


<!-- 右侧开始 -->    
<div class="rw680">

	<input type="hidden" value="1" id="hasSidebar" />

	<div class="usinfo">
		<h2>通知模板设置</h2>
		<div class="clr"></div>
		<div class="temxx"></div>
		
		<?php if($type=="refuse"){ ?> 
		
			<input type="hidden" id="noticeType" value="1" />
		
			<dl class="comtemplate">
             <dd class="notice_dd unqualified">
              <div class="notice_con">
              
                <ul class="clearfixs notice_head">
                  <li><a href="/User/template.html?type=interview">面试通知模板</a></li>
                  <li class="bordernone"><span class="line"></span></li>
                  <li class="active"><a href="/User/template.html?type=refuse">不合适通知模板</a></li>
                </ul>
                
                <div class="notice_main">
                  <div class="notice_add"> <span href="javascript:;" id="addTmp"><i>+</i>添加模板 (<?php echo ($count); ?>/5)</span> </div>
                  
                  
                  <!-- <div class="template_list"  data-temid="61352">
                    <div class="list_head">
                      <div class="list_head_m clearfixs">
                        <div class="list_head_l fl"> <strong>系统模版</strong><span class="default show_inline">默认模板</span> </div>
                        <div class="list_head_r fr"> <span  class="updateTmp" id="updateTmp"  data-temid="61352">修改</span><span>|</span><a href="javascript:;"  class="delTmp" data-temid="61352">删除</a> </div>
                      </div>
                    </div>
                    <div class="list_con">
                      <ul>
                        <li> <span class="tip"> 非常荣幸收到你的简历，招聘方经过评估，认为你与该职位的条件不太匹配，无法进入面试阶段。相信更好的机会一定还在翘首期盼着你，赶快调整心态，做好充足的准备重新出发吧！ </span> </li>
                      </ul>
                    </div>
                  </div> -->
                  
                  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="template_list"  data-temid="<?php echo ($v["tid"]); ?>">
	                    <div class="list_head">
	                      <div class="list_head_m clearfixs">
	                        <div class="list_head_l fl"> <strong><?php echo ($v["title"]); ?></strong>
	                        
	                        <?php if($v['isdefault']){ ?>
	                        
	                        <span class="default show_inline">默认模板</span> 
	                        
	                        <?php }else{ ?>
	                        
	                        <a data-temid="<?php echo ($v["tid"]); ?>" class="set_default show_inline" href="javascript:;" style="display: none;">设为默认模板</a>
	                        
	                        <?php } ?>
	                        
	                        </div>
	                        <div class="list_head_r fr"> <span  class="updateTmp" id="updateTmp"  data-temid="<?php echo ($v["tid"]); ?>">修改</span><span>|</span><a href="javascript:;"  class="delTmp" data-temid="<?php echo ($v["tid"]); ?>">删除</a> </div>
	                      </div>
	                    </div>
	                    <div class="list_con">
	                      <ul>
	                        <li> <span class="tip"><?php echo ($v["content"]); ?> </span> </li>
	                      </ul>
	                    </div>
	                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
                  
                  
                  <!-- <div class="template_list"  data-temid="118429">
                    <div class="list_head">
                      <div class="list_head_m clearfixs">
                        <div class="list_head_l fl"><strong>不合适1</strong><a href="javascript:;" class="set_default show_inline" data-temid="118429">设为默认模板</a></div>
                        <div class="list_head_r fr"> <span  class="updateTmp" id="updateTmp"  data-temid="61352">修改</span><span>|</span><a href="javascript:;"  class="delTmp" data-temid="61352">删除</a> </div>
                      </div>
                    </div>
                    <div class="list_con">
                      <ul>
                        <li> <span class="tip"> 非常荣幸收到你的简历，招聘方经过评估，认为你与该职位的条件不太匹配，无法进入面试阶段。相信更好的机会一定还在翘首期盼着你，赶快调整心态，做好充足的准备重新出发吧！ </span> </li>
                      </ul>
                    </div>
                  </div> -->
                  
                  
                  
                </div>
              </div>
            </dd>

          </dl>
		
		<?php }else{ ?>   
		
			<input type="hidden" id="noticeType" value="0" />
		
			<dl class="comtemplate">
              <dd class="notice_dd interview">
              <div class="notice_con">
                  <ul class="clearfixs notice_head">
                      <li class="active"><a href="/User/template.html?type=interview">面试通知模板</a></li>
                      <li class="bordernone"><span class="line"></span></li>
                      <li><a href="/User/template.html?type=refuse">不合适通知模板</a></li>
                  </ul>
                  
                 <div class="notice_main">
                 
                      <div class="notice_add">
                          <span id="addTmp"><i>+</i>添加模板 (<?php echo ($count); ?>/5)</span>
                      </div>
                      
                      
                      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="template_list" data-temid="<?php echo ($v["tid"]); ?>">
                         <div class="list_head">
                             <div class="list_head_m clearfixs">
                                 <div class="list_head_l fl">
                                     <strong><?php echo ($v["title"]); ?></strong>
                                     
                                     <?php if($v['isdefault']){ ?>
	                        
			                        <span class="default show_inline">默认模板</span> 
			                        
			                        <?php }else{ ?>
			                        
			                        <a data-temid="<?php echo ($v["tid"]); ?>" class="set_default show_inline" href="javascript:;" style="display: none;">设为默认模板</a>
			                        
			                        <?php } ?>
	                        
                                 </div>
                                 <div class="list_head_r fr">
                                     <span class="updateTmp" id="updateTmp" data-temid="<?php echo ($v["tid"]); ?>">修改</span><span>|</span><a href="javascript:;" class="delTmp" data-temid="<?php echo ($v["tid"]); ?>">删除</a>
                                 </div>
                             </div>
                         </div>
                         <div class="list_con">
                             <ul>
                                 <li><label>面试地点 ：</label><span><?php echo ($v["link_address"]); ?></span></li>
                                 <li><label>联系人 ：</label><span><?php echo ($v["link_name"]); ?></span></li>
                                 <li><label>联系电话 ：</label><span><?php echo ($v["link_phone"]); ?></span></li>
                                 <li><span class="tip"><?php echo ($v["content"]); ?></span></li>
                             </ul>
                         </div>
                     </div><?php endforeach; endif; else: echo "" ;endif; ?>
                     
                      
                      <!-- <div class="template_list" data-temid="113609">
                          <div class="list_head">
                              <div class="list_head_m clearfixs">
                                  <div class="list_head_l fl">
                                      <strong>通知1</strong><span class="default show_inline">默认模板</span>
                                  </div>
                                  <div class="list_head_r fr">
                                      <span class="updateTmp" id="updateTmp" data-temid="113609">修改</span><span>|</span><a href="javascript:;" class="delTmp" data-temid="113609">删除</a>
                                  </div>
                              </div>
                          </div>
                          <div class="list_con">
                              <ul>
                                  <li><label>面试地点 ：</label><span>腾讯科技大厦</span></li>
                                  <li><label>联系人 ：</label><span></span></li>
                                  <li><label>联系电话 ：</label><span>18588235006</span></li>
                                  <li><span class="tip"></span></li>
                              </ul>
                          </div>
                      </div> -->
                      
                      <!-- <div class="template_list" data-temid="113615">
                          <div class="list_head">
                              <div class="list_head_m clearfixs">
                                  <div class="list_head_l fl">
                                      <strong>模板一</strong><a href="javascript:;" class="set_default show_inline" data-temid="113615">设为默认模板</a>
                                  </div>
                                  <div class="list_head_r fr">
                                      <span class="updateTmp" id="updateTmp" data-temid="113615">修改</span><span>|</span><a href="javascript:;" class="delTmp" data-temid="113615">删除</a>
                                  </div>
                              </div>
                          </div>
                          <div class="list_con">
                              <ul>
                                  <li><label>面试地点 ：</label><span>腾讯科技大厦</span></li>
                                  <li><label>联系人 ：</label><span>lee</span></li>
                                  <li><label>联系电话 ：</label><span>18789900000</span></li>
                                  <li><span class="tip">带上简历</span></li>
                              </ul>
                          </div>
                      </div> -->
                      
                      
                  </div>
              </div>
              </dd>
          </dl>
		
		<?php } ?>   
		
		
          
       </div>
       
    </div>
    
    <!-- 右侧结束 -->
    
    <?php if($type=="refuse"){ ?>     

	<div id="add_template">
		<form id="addForm">
			<div class="add_div">
			    <ul>
			    	<li><label for="tmpname"><span class="bitian">*</span>模板名</label><input type="text" id="tmpname" name="tmpname"  placeholder="15个字以内，不会发送给用户，仅用来选择模板使用" /></li>
			    	<li><label></label><textarea id="tmpTip" name="tmpTipRefuse"></textarea></li>
			    	<li class="margin0"><label></label><a href="javascript:;" class="save_a"><input class="save" type="submit" value="保存模板"/></a><a href="javascript:;" id="cancel" class="cancel">取消添加</a></li>
			    </ul>								
			</div>
		</form>
	</div>
	
	<?php }else{ ?>     
	
	
	<div id="add_template">
		<form id="">
			<div class="add_div">
			    <ul>                                                         
			    	<li><label for="tmpname"><span class="bitian">*</span>模板名</label><input type="text" id="tmpname" name="tmpname" placeholder="15个字以内，不会发送给用户，仅用来选择模板使用" /></li>
			    	<li><label for="site">面试地点</label><input type="text" id="site" name="site" /></li>
			    	<li><label for="linkman">联系人</label><input type="text" id="linkman" name="linkman"/></li>
			    	<li><label for="mobile">联系电话</label><input type="text" id="mobile" name="mobile" /></li>
			    	<li><label for="tmpTip" class="labelCon">补充内容</label><textarea id="tmpTip" name="tmpTip"></textarea></li>
			    	<li class="margin0"><label></label><a href="javascript:;" class="save_a"><input class="save" type="submit" value="保存模板"/></a><a href="javascript:;" id="cancel" class="cancel"></a></li>
			    </ul>								
			</div>
		</form>
	</div>
	
	
    <?php } ?>  
    
           
</div>

<!------------------------------------- 弹窗lightbox ----------------------------------------->
<div style="display:none;">
	<!-- 删除默认模板  -->
    <div id="deleteDefault" class="popup" style="overflow:auto;">
	    <p class="pop_tip">该模板为默认模板，要先设定其他默认模板后才可以删除哦</p>
	    <div>
	    	<a href="javascript:;" class="del_know" id="del_know">我知道了</a>
	    </div>
    </div>
    <!-- 删除普通模板  -->
    <div id="deleteNormal" class="popup" style="overflow:auto;">
	    <p class="pop_tip">模板删除后将无法恢复，你确认要删除吗？</p>
	    <div class="clearfixs del_label">
	    	<label class="checkbox">
			    <input type="checkbox" />
			    <i style="display: inline;"></i>
			</label>
			<label class="textTip">不再提示</label>
			<a href="javascript:;" class="del_sure" id="del_sure">确定</a>
	    </div>
    </div>    
</div>	
<div style="display:none;">
	<!-- 面试通知模板与不合格模板    防止未保存弹窗 -->
	<div id="templateTip" class="popup" style="overflow:hidden">
		<p class="pop_tip">您当前编辑的内容尚未保存，确定不保存吗？</p>
		<p class="pop_tip txtcenter">
			<a href="javascript:;" class="btn" id="confirm_leave">确定</a>	   
    		<a href="javascript:;" class="cancel" id="cancel_leave">取 消</a>		
    	</p>	
	</div>
</div>

<script type="text/javascript" src="/Public/Home/js/core.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/setting.js"></script> 
<!-- 修改通知核心js -->
<script type="text/javascript" src="/Public/Home/js/noticetemplate.min.js"></script> 
<!-- 修改通知核心js结束 -->


<script type="text/javascript" src="/Public/Home/js/popup.min.js"></script> 


</div><!-- end #body-->

<?php if($show_nav == 1): ?><div class="clear"></div>

<?php if($show_foot!==0){ ?>

<div class="w960">

    <input type="hidden" id="resubmitToken" value="" />
    <a id="backtop" title="回到顶部" rel="nofollow"></a>


    <!--我要反馈按钮-->
    <div id="product-fk">
        <div id="feedback-icon">
        <div class="fb-icon"></div>
        <span>我要反馈</span>
        <em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
        <em class="error dn fk-suc">&nbsp;&nbsp;反馈提交成功！</em>
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




<div class="clr"></div>
<div id="footer">
	<div class="w960">
         <div class="abnav lf">
           <a href="/News/about.html" target="_bank">关于我们</a><a  target="_bank" href="/News/help.html">帮助中心</a>
         </div>
         <div class="bdsharebuttonbox">
           <div class="ft_share">
                <span class="dn" id="share_jd2">分享到微信</span>
                <div class="jd_share_success2">
                <img src="http://seo.zgboke.com/qr/0_1_4_<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>_cdn.png" />
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