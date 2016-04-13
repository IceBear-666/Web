<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>_管理后台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo" style="background: url('/Public/Home/images/admin_logo.png') no-repeat;"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>

    <div class="main-title">
        <h2><?php echo isset($info['aid'])?'编辑':'新增';?>宣讲会</h2>
    </div>
    <form action="<?php echo U();?>" method="post" class="form-horizontal">

        <div class="form-item">
            <label class="item-label">标题<span class="check-tips"> </span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="title" value="<?php echo ($info["title"]); ?>">
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">类型<span class="check-tips"></span></label>
            <div class="controls">
                <label class="radio"><input type="radio" <?php if($info['type']==1)echo 'checked'; ?> name="type" value="1">视频</label>
                <label class="radio"><input type="radio" <?php if($info['type']==2)echo 'checked'; ?> name="type" value="2">日程</label>
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">所属公司<span class="check-tips"></span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="company" value="<?php echo ($info["company"]); ?>">
            </div>
        </div>
        
        <div class="form-item">
            <label class="item-label">公司网址<span class="check-tips"></span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="com_url" value="<?php echo ($info["com_url"]); ?>">
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">所属学校<span class="check-tips"></span></label>
            <div class="controls">
				<select name="cid"  id="province" onchange="setcity(this)">
	              <option value="0">--选择城市--</option>
	            </select>
	            &nbsp;&nbsp;
	            <select name="school"   id="city">
	              <option value="0">--选择学校名称--</option>
	            </select>
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">日期/时间<span class="check-tips"></span></label>
            <!-- <div class="controls"> -->
            	<div class="controls input-append date form_datetime" data-date="<?php echo ($info["date_time"]); ?>">
				    <input size="16" type="text" value="<?php echo ($info["date_time"]); ?>" readonly class="text input date" placeholder="选择时间" name="date_time">
				    <span class="add-on"><i class="icon-remove"></i></span>
				    <span class="add-on"><i class="icon-calendar"></i></span>
				</div>
				<!-- <input type="text" class="text input date" placeholder="选择时间" name="date_time"  value="<?php echo ($info["date_time"]); ?>" > -->
            <!-- </div> -->
        </div>

        <div class="form-item">
            <label class="item-label">详细地址<span class="check-tips"></span></label>
            <div class="controls">
				<input type="text" class="text input-large" name="address" value="<?php echo ($info["address"]); ?>">
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">状态<span class="check-tips"></span></label>
            <div class="controls">
                <label class="radio"><input <?php if($info['status']==1)echo 'checked'; ?> type="radio" name="status" value="1">启用</label>
                <label class="radio"><input <?php if($info['status']==0)echo 'checked'; ?> type="radio" name="status" value="0">禁用</label>
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">视频链接<span class="check-tips"> </span></label>
            <div class="controls">
                <input type="text" class="text input-large" style="width:800px;" name="url" value="<?php echo ($info["url"]); ?>">
            </div>
        </div>
        
        <div class="form-item">
            <label class="item-label">时长<span class="check-tips"> </span></label>
            <div class="controls">
                <input type="text" class="text input-small" name="shichang" value="<?php echo ($info["shichang"]); ?>">
            </div>
        </div>
        
        <div class="form-item">
            <label class="item-label">右上角相关公司名<span class="check-tips"> </span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="related" value="<?php echo ($info["related"]); ?>">
            </div>
        </div>
        
        <div class="form-item">
            <label class="item-label">视频封面<span class="check-tips"> </span></label>
            <div class="controls">
                
                <div class="controls">
					<input type="file" id="upload_picture_pic">
					<input type="hidden" name="thumb" id="cover_id_path" value="<?php echo ($info["thumb"]); ?>"/>
					<div class="upload-img-box">
					<?php if(!empty($info["thumb"])): ?><div class="upload-pre-item"><img src="<?php echo ($info['thumb']); ?>"/></div><?php endif; ?>
					</div>
				</div>
	
				<script type="text/javascript">
				//上传图片
			    /* 初始化上传插件 */
				$("#upload_picture_pic").uploadify({
			        "height"          : 30,
			        "swf"             : "/Public/static/uploadify/uploadify.swf",
			        "fileObjName"     : "download",
			        "buttonText"      : "上传图片",
			        "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
			        "width"           : 120,
			        'removeTimeout'	  : 1,
			        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
			        "onUploadSuccess" : uploadPictures,
			        'onFallback' : function() {
			            alert('未检测到兼容版本的Flash.');
			        }
			    });
				function uploadPictures(file, data){
			    	var data = $.parseJSON(data);
			    	var src = '';
			        if(data.status){
			        	$("#cover_id_path").val(data.path);
			        	src = data.url || '' + data.path
			        	$("#cover_id_path").parent().find('.upload-img-box').html(
			        		'<div class="upload-pre-item"><img src="' + src + '"/></div>'
			        	);
			        } else {
			        	updateAlert(data.info);
			        	setTimeout(function(){
			                $('#top-alert').find('button').click();
			                $(that).removeClass('disabled').prop('disabled',false);
			            },1500);
			        }
			    }
				</script>
                
            </div>
        </div>
        
        <div class="form-item">
            <label class="item-label">附件<span class="check-tips"> </span></label>
            <div class="controls">
                <div class="controls">
					<input type="file" id="upload_file_attach">
					<input type="hidden" name="attach" value="<?php echo ($info['attach']); ?>"/>
					<div class="upload-img-box">
						<?php if(isset($info[attach])): ?><div class="upload-pre-file"><span class="upload_icon_all"></span><?php echo ($info['attach']); ?></div><?php endif; ?>
					</div>
					</div>
					<script type="text/javascript">
					//上传图片
				    /* 初始化上传插件 */
					$("#upload_file_attach").uploadify({
				        "height"          : 30,
				        "swf"             : "/Public/static/uploadify/uploadify.swf",
				        "fileObjName"     : "download",
				        "buttonText"      : "上传附件",
				        "uploader"        : "<?php echo U('File/upload',array('session_id'=>session_id()));?>",
				        "width"           : 120,
				        'removeTimeout'	  : 1,
				        "onUploadSuccess" : uploadFile_attach,
				        'onFallback' : function() {
				            alert('未检测到兼容版本的Flash.');
				        }
				    });
					function uploadFile_attach(file, data){
						var data = $.parseJSON(data);console.log(data);
				        if(data.status){
				        	var name = "attach";
				        	$("input[name="+name+"]").val(data.url);
				        	$("input[name="+name+"]").parent().find('.upload-img-box').html(
				        		"<div class=\"upload-pre-file\"><span class=\"upload_icon_all\"></span>" + data.info + "</div>"
				        	);
				        } else {
				        	updateAlert(data.info);
				        	setTimeout(function(){
				                $('#top-alert').find('button').click();
				                $(that).removeClass('disabled').prop('disabled',false);
				            },1500);
				        }
				    }
					</script>
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">内容<span class="check-tips"></span></label>
            <div class="controls">

				<label class="textarea">
                <textarea name="content"><?php echo ($info["content"]); ?></textarea>
                <!-- <?php echo hook('adminArticleEdit', array('name'=>'content','value'=>$info['content']));?> -->
                </label>

            </div>
        </div>

        <div class="form-item">
            <input type="hidden" name="vid" value="<?php echo ((isset($info["vid"]) && ($info["vid"] !== ""))?($info["vid"]):''); ?>">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
        </div>
    </form>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl"> </div>
                <div class="fr"> </div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
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
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script type="text/javascript">
        Think.setValue("status", <?php echo ((isset($info["status"]) && ($info["status"] !== ""))?($info["status"]): 0); ?>);
        //导航高亮
        highlight_subnav('<?php echo U('index');?>');
    </script>


    <link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
	<?php if(C('COLOR_STYLE')=='blue_color') echo '<link href="/Public/static/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">'; ?>
	<link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

	<script type="text/javascript">
	//Think.setValue("status", <?php echo ((isset($info["status"]) && ($info["status"] !== ""))?($info["status"]): 0); ?>);
	//导航高亮
	//highlight_subnav('<?php echo U('index');?>');

	$(".box").hide();
	$("#basic").find(".box").show();

	$(function(){
	   /* $('.date').datetimepicker({
	       format: 'yyyy-mm-dd hh:ii',
	       language:"zh-CN",
	       minView:2,
	       autoclose:true
	   }); */
	   
	    $(".form_datetime").datetimepicker({
	        format: "yyyy-mm-dd hh:ii",
	        autoclose: true,
	        todayBtn: true,
	        startDate: "2015-07-01 00:00",
	        minuteStep: 5
	    });

	   /* $('.time').datetimepicker({
	       format: 'hh:ii',
	       language:"zh-CN",
	       minView:2,
	       autoclose:true
	   }); */
	   showTab();
	});
	</script>
	
	
<script>	
var addressarr = <?php echo ($school_arr); ?>;
var cprovince = <?php echo ($info["cid"]); ?>;
var ccity = <?php echo ($info["sid"]); ?>;

addressarr = eval(addressarr);
function setprovince() {
	var html = '';
	for(var key in addressarr) {
		//if(addressarr[key]['pid']==1){
			html += '<option value="'+addressarr[key].cid+'">'+addressarr[key].name+'</option>';
		//}
	}
	$("#province").html(html);
}

function setcity(vv) {
	var html = '';
	var v ='';
	if(isNaN(vv)){
		v = $(vv).val();
	}
	else v = vv;

	if(addressarr[v]){
		var cityarr = addressarr[v]['sub'];
		for(var k in cityarr) {
			html += '<option value="'+k+'">'+cityarr[k].name+'</option>';
		}
	}

	$("#city").html(html);
}

setprovince();

$("#province").val(cprovince);
var obj = $("#province").val();
setcity(obj);


$("#city").val(ccity);

</script>


</body>
</html>