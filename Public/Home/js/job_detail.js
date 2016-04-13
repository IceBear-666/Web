//jQuery.noConflict(true);
/**
 * 创建节流函数（即，一个函数可能在短时间内执行好几遍，为了
 * 节约性能，这个函数可以解决这个问题，例如onscroll事件的触发等等）
 * 
 * @param {Function} method 需要节流的函数 
 * @param {Array} args 传入参数列表
 * @param {Object} context 执行上线文
 * @param {Number} delay 执行delay
 * @return {undefined}
 */
function throttle( method, args, context, delay ) {
    context = context == undefined ? null : context;
    method.tId && clearTimeout(method.tId);
    method.tId = setTimeout(function() {
        method.apply(context, args);
    }, (delay ? delay : 140));
}
$(function(){
	//统计到职位详情的来源脚本 add by Vee ｜2014-7-3
//	$('#myRecommend_jd a').click(function(e){
//		e.preventDefault();
//		var href=$(this).attr("href");
//		window.location.href=href+"?source=job_rec"; //职位详情页推荐
//	});
	//end
	
	$('#container').on('click','.btn-no-interest',function(event){
		event.stopPropagation();
//		event.preventDefault();
//		if(event.target==$(this).find('.invi_info_box')[0]){
//			return ;
//		}
		$(this).next('.invi_info_box').toggle();
//		$(this).children('label').val("");
//		var me = $(this);
		
//		if($(this).children('div').is(":visible")==true){
//			$('.invi_info_box').fadeOut(200);
//		}
	})
	$('.inviteCancel').on('drag',function(e){
		e.preventDefault();
	})
	$('.invi_info_box').click(function(ev){
		ev.stopPropagation();
	})
	$(document).click(function (event) {
		event.stopPropagation();
			$('.invi_info_box').fadeOut(200);
	});
	
	$('#container').on('click','.inviteCancel .closetip',function(){
		$(this).parent('div').fadeOut(200);
	})
	
	var me_info = "";
	$(".invi_info_box").on('click','label',function(){
		var me = $(this);
		me_info = me.text();
		var wrapper=me.parent().parent().parent().parent()
		wrapper.find('label').removeClass('seled').addClass('unsel');
		wrapper.find('input:radio').attr('checked',false);
		me.addClass('seled').removeClass('unsel');
		me.prev().attr('checked',true);
		
		if(wrapper.find('.reason').val() != ""){
			wrapper.find('label').removeClass('seled').addClass('unsel');
		}
		
		wrapper.find('.reason').val("");
		me.removeClass('unsel').addClass('seled');
	})

	$('.invi_btn_yes').on('click',function(){
		var me = $(this);
		var _this = $(this).parents('.inviteCancel');
		var checkedvalue = $("input[name='invinfo']:checked").val();
		var _this_parent = $(this).parent().parent();
		var reasoninfo = $.trim(_this_parent.children("input[type='text']").val());
		
		//reasoninfo   输入框信息
		//me_info   单选值

		var reasoninfo_len = reasoninfo.length+(reasoninfo.match(/[^\x00-\xff]/g) ||"").length;
		if(reasoninfo_len > 16){
			$('.err_tip').css('visibility','visible')
		}else if(me_info !== ""){
			invite(_this,me_info,me);
		}else{
			invite(_this,reasoninfo,me);
		}
	})

//	var len=function(s){//获取字符串的字节长度 
//		s=String(s); 
//		return s.length+(s.match(/[^\x00-\xff]/g) ||"").length;//加上匹配到的全角字符长度 
//	}
//	limitDo=function(limit){ 
//		var val=this.value; 
//		if(len(val)>limit){
//			//val=val.substr(0,limit); 
//			while(len(val=val.substr(0,val.length-1))>limit); 
//			this.value=val; 
//			$('.err_tip').show();
//		}else if(len(val) < limit){
//			$('.err_tip').hide();
//		}
//	}
//	$=function(id){return typeof(id)==='string'?document.getElementByClass(class):class;};
	$('.invi_info_box').find('.reason').on('keyup change',function(){
		var me = $(this);
		var _this = $(this).parents('.inviteCancel');
		var _this_parent = $(this).parent().parent();
		var reasoninfo = $.trim(_this_parent.find("input[type='text']").val());
		
		var reasoninfo_len = reasoninfo.length+(reasoninfo.match(/[^\x00-\xff]/g) ||"").length;

		if(reasoninfo_len <= 16){
			$('.err_tip').css('visibility','hidden')
		}else{
			$('.err_tip').css('visibility','visible')
		}
	})
//		$(".reason").onkeyup=function(){}; 

//	function cmd(obj){
//		var len = obj.length;
////	    var len = obj.value.replace(/[^\x00-\xff]/g, "**").length;
//	    if(len >= 16){
//	        alert("自定义填写需在16个字符之内");
//	    }
//	}
//
//	$('.invi_info_box').find('.reason').on('keyup',function(){
//		var me = $(this);
//		var me_info = me.val();
//		cmd(me_info);
//	})

	$("input[type='text']").focus(function(){
		var me = $(this);
		var radio = $(".inviteCancel"); 
		me_info = ""
		me.parent().find('label').addClass('unsel').removeClass('seled');
//		if(!$(':radio[name=invinfo]:checked').length){
//			radio.find("input[name=invinfo]").attr('disabled','disabled');
//		}else{
//			$(this).attr('disabled','disabled');
//		}
	})
//	if($("input[type='text']").val() != ""){
//		console.log(me.val());
//		$('.invi_info_choose').find('label').addClass('unsel').removeClass('seled')
//	}
	$('.popup .filePrew').hover(function(){
		$(this).parent('.btn_addPic').addClass('btn_addPic_hover');
	},function(){
		$(this).parent('.btn_addPic').removeClass('btn_addPic_hover');
	});

	/*** check Mobile***********************/ 	
	jQuery.validator.addMethod("isMobile", function(value, element,param) {
		//var pattern=/(^0{0,1}[13|15|18|14|17]{2}[0-9]{9}$)/;
		var pattern= /(^1[3,4,5,7,8]{1}[0-9]{9}$)/;
		if(pattern.test(value)){ 
			return true; 
		}else{ 
			return false; 
		} 
	}, "请输入正确的手机号");
	
	/*** check特殊字符 ***********************/
	jQuery.validator.addMethod("specialchar", function(value, element) {
		var reg = /^([`~!@$^&':;,?~！……&；：。，、？=])/;
		return this.optional(element) || !reg.test(value);
		}, "请输入有效的公司简称");
	
	/*** 不能全部输入数字**********************/
	jQuery.validator.addMethod("checkNum",function(value, element) {
		var reg = /^[0-9]*$/;//只能输入数字
		return this.optional(element) || !reg.test(value);
		}, "请输入有效的一句话介绍"); 
	
	/************************
	 * 编辑标签
	 */
	$('#hasLabels').on('click','.link',function(){
		
        	$('#addLabel').show();
	        $(this).remove();
			$('#hasLabels li').each(function(){
				$(this).append('<i>x</i>');
			});
			$('#hasLabels').on('mouseenter','li',function(){
				$(this).css({marginRight:'6px',cursor:'pointer'});
			});
			$('#hasLabels').on('mouseleave','li',function(){
				$(this).css({marginRight:'18px',cursor:'pointer'});
			});
		
	});
	
	
	/************************
	 * 删标签
	 */
	$('#hasLabels').on('click','li i',function(){
		var labelVal = $(this).prev('span').text();
		var _this = $(this);
		var companyid = $('#companyid').val();
		$.ajax({
			type:'post',
			url: ctx+'/companyLabel/removeOneLabelToCompany.json',
			data:{companyId:companyid,label:labelVal},
			dataType: 'json'
		}).success(function (result) {
			if(result.success){
				_this.parent().remove();
			}else{
				alert(result.msg);
			}
		});
	});

	/************************
	 * 贴标签
	 */
	$('#add').bind('click',function(){
		var _label = $('#label');
		var labelVal = $.trim(_label.val());
		var companyid = $('#companyid').val();
		var judge = true;
		if( labelVal.length<=6 && labelVal.length > 0){
			$('#hasLabels li').each(function(){
				if($('span',this).text() == labelVal){
					judge = false;
				}
			});
			if(judge){
				$.ajax({
					type:'post',
					url: ctx+'/companyLabel/pasteOneLabelToCompany.json',
					data:{companyId:companyid,label:labelVal},
					dataType: 'json'
				}).success(function (result) {
					if(result.success){
						$('#hasLabels').append('<li><span>'+labelVal+'</span><i>x</i></li>');
					}else{
						alert(result.msg);
					}
				});
				
			}else{
				alert('此标签已存在，请从新输入');
			}
			_label.val('');
		}else{
			alert("请输入1-6字的自定义标签");
		}
	});

	/************************
	 * enter键贴标签
	 */
	$('#label').keydown(function(e){
		if(e.which == 13){
			$('#add').trigger('click');
		}
	});
	
	//投递简历设置2013/9/27
	$('#resumeSetForm a.reUpload').bind('click',function(){
		$('#resumeSetForm span.error').hide();
		$('#reUploadResume1').click();
	});
	
	$('#resumeSendForm a.reUpload').bind('click',function(){
		$('#resumeSendForm span.error').hide();
		$('#reUploadResume2').click();
	});
	var deliverTime;  //10s撤回简历需要传递的参数
	//更改简历form提交
	$('#resumeSetForm').validate({
        rules: {
        	resumeName: {
        		required: true
    	   	}
        },
    	messages: {
    		resumeName: {
        		required: "请选择默认投递的简历"
    	   	}
    	},
    	errorPlacement:function(label, element){
    		label.insertBefore($(element).parent().siblings('.bgPink'));
    	},
    	submitHandler:function(form){
    		var resumeName = $('input[name="resumeName"]:checked',form).val();
    		$(form).find(":submit").attr("disabled", true);
    		$.ajax({
				url:ctx+'/mycenter/resume/setDefaultResume.json',
				type:'POST',
	        	data: {type:resumeName}
			}).done(function(result) {
	        	if(result.success){
	        		top.location.reload();
	        	}else{
					console.log(result.msg);
	        	}
	        	$(form).find(":submit").attr("disabled", false);
			});
    	}
	});
	
	$('#resumeSendForm input[type="checkbox"]').bind('click',function(){
		if($(this).attr('checked')){
			$(this).attr('checked',false);
		}else{
			$(this).attr('checked',true);
		}
	});
	
	
	//投递简历form提交
	$('#resumeSendForm').validate({
        rules: {
        	resumeName: {
        		required: true
    	   	}
        },
    	messages: {
    		resumeName: {
        		required: "请选择默认投递的简历"
    	   	}
    	},
    	errorPlacement:function(label, element){
    		label.insertBefore($(element).parent().siblings('.bgPink'));
    	},
    	submitHandler:function(form){
    		
			var userid = $('#userid').val();
    		var jobid = $('#jobid').val();
    		var resumeName = $('input[name="resumeName"]:checked',form).val();
    		var checkDefault = -1;
    		if($('input[type="checkbox"]',form).attr('checked')){
    			checkDefault = 1;
    		}
    		var resubmitToken = $('#resubmitToken').val();
    		$(form).find(":submit").attr("disabled", true);
    		$.ajax({
    			//url: ctx+'/mycenter/deliverResumeBeforce.json',
    			url: ctx+'/mycenterDelay/deliverResumeBeforce.json',
    			data:{
    				userId:userid,
    				positionId:jobid,
    				type:resumeName,
    				remember:checkDefault,
    				resubmitToken:resubmitToken
    			},
				type:'POST',
            	dataType:'json'
			}).done(function(r) {
				if(null != r.resubmitToken && '' != r.resubmitToken){
					$('#resubmitToken').val(r.resubmitToken);					
				}
	        	if(r.success){
	        		deliverTime = r.content;
	        		// code = 10 简历数达到上限，不可再投
	        		$("#deliverResumesSuccess p.count span.resume_delay_txt").html(r.msg);
	        		if(r.code == 10){
	        			$("#deliverResumesSuccess p.share").removeClass('dn');
	        			//$("#deliverResumesSuccess .drawGGJ").siblings('tr.drawQD').hide();
	        		}
	        		$.colorbox({inline:true, href:$("#deliverResumesSuccess"),title:"投个简历",overlayClose:false});
	        		//如果撤回按钮存在，则走定时器
	        		if( $('#recall').length > 0){
	        			setCountdown( 9 , 'recall_time');
	        		}
	        		
	        	}else{
	        		if(r.code ==7){//投递失败
						errorTipsSet("投递失败：" + r.msg,"投个简历");
					}else if(r.code ==20){//需要二次确认 - 投递的是附件简历 - type=0
						$('#deliverResumeConfirm input[name="type"]').val(0);
						$('#deliverResumeConfirm .msg').html(r.msg);
						$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
					}else if(r.code ==21){//需要二次确认 - 投递的是在线简历 - type=1
						$('#deliverResumeConfirm input[name="type"]').val(1);
						$('#deliverResumeConfirm .msg').html(r.msg);
						$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
					}else if(r.code ==22){//需要弹出信息确认框 - 投递的是附件简历 - type=0
						openProfileBox(0);
					}else if(r.code ==23){//需要弹出信息确认框 - 投递的是在线简历 - type=1
						openProfileBox(1);
					}else if(r.code == 31){
						$('#upperLimit').find('h4').find('i').text( r.msg );
						$.colorbox({inline:true, href:$("#upperLimit"),title:"投个简历"});
					}else{
						errorTips("投递失败：" + r.msg,"投个简历");
					}
	        	}
	        	$(form).find(":submit").attr("disabled", false);
			});
    	}
	});
	
	$('#resumeSendForm label.radio').bind('click',function(){
		if( $(this).children('span').hasClass('red')){
			$('#resumeSendForm .btn_profile_save').attr('disabled','disabled').css('backgroundColor','#a3a3a3');
		}else{
			$('#resumeSendForm .btn_profile_save').removeAttr('disabled').css('backgroundColor','#019875');
		}
	});
	
	$('#resumeSetForm label.radio').bind('click',function(){
		if( $(this).children('span').hasClass('red')){
			$('#resumeSetForm .btn_profile_save').attr('disabled','disabled').css('backgroundColor','#a3a3a3');
		}else{
			$('#resumeSetForm .btn_profile_save').removeAttr('disabled').css('backgroundColor','#019875');
		}
	});
	
	//有两份简历的情况，设置默认投递简历
	$('.resumeShowAll .setDefault').bind('click',function(){
		var type= $(this).attr('rel');
		$.ajax({
			url:ctx+'/mycenter/resume/setDefaultResume.json',
			type:'POST',
        	data: {type:type},
        	dataType:'json'
		}).done(function(result) {
        	if(result.success){
        		top.location.reload();
        	}else{
				console.log(result.msg);
        	}
		});
	});
	
	/*投递职位前填写基本信息*/
	$(document).click(function(){
		$('.boxUpDown').hide().prev('input').removeClass('select_focus');
		$(".jd_share").removeClass('share_open');
		$(".jd_share").removeClass("share_click");
		$(".jd_share").removeClass("share_hover");
		weixin_show();
	});
	
	$('#select_degree').bind('click',function(e){
		e.stopPropagation();
		$('#select_workyear').removeClass('select_focus');
		$('#select_expectCity').removeClass('select_focus');
		$('#box_workyear').hide();
		$('#box_expectCity').hide();
		$(this).addClass('select_focus');
		$('#box_degree').show();
	});
	$('#box_degree').on('click','ul li',function(e){
		e.stopPropagation();
		var val = $(this).text();
		$('#select_degree').val(val).css('color','#333').removeClass('select_focus');
		$('#degree').val(val);
		$('#box_degree').hide(); 
		$(this).parents("#basicInfoForm").validate().element( $('#degree') ); 
	});
	
	$('#select_workyear').bind('click',function(e){
		e.stopPropagation();
		$('#select_degree').removeClass('select_focus');
		$('#select_expectCity').removeClass('select_focus');
		$('#box_degree').hide();
		$('#box_expectCity').hide();
		$(this).addClass('select_focus');
		$('#box_workyear').show();
	});
	$('#box_workyear').on('click','ul li',function(e){
		e.stopPropagation();
		var val = $(this).text();
		$('#select_workyear').val(val).css('color','#333').removeClass('select_focus');
		$('#workyear').val(val);
		$('#box_workyear').hide(); 
		$(this).parents("#basicInfoForm").validate().element( $('#workyear') ); 
	});
	
	$('#select_expectCity').bind('click',function(e){
		e.stopPropagation();
		$('#select_workyear').removeClass('select_focus');
		$('#select_degree').removeClass('select_focus');
		$('#box_workyear').hide();
		$('#box_degree').hide();
		$(this).addClass('select_focus');
		$('#box_expectCity').show();
	});
	$('#box_expectCity').on('click','dl dd span',function(e){
		e.stopPropagation();
		var val = $(this).text();
		$('#select_expectCity').val(val).css('color','#333').removeClass('select_focus');
		$('#expectCity').val(val);
		$('#box_expectCity').hide(); 
		$(this).parents("#basicInfoForm").validate().element( $('#expectCity') ); 
	});
	/*** check 字符长度 区分中英文（输入字符为区间的形式）***********************/ 
	jQuery.validator.addMethod("rangeLenStr", function(value, element,param) {
		//27  esc键  126 ~键
		var len = value.length;
		var reLen = 0;
		for(var i=0;i<len;i++){
			if(value.charCodeAt(i) < 27 || value.charCodeAt(i) > 126){
				reLen += 2; // 全角  
			}else{
				reLen++;
			}
		}
		if((reLen <= 2*param[1] && reLen>= 2*param[0]) || reLen == 0){
			return true; 
		}else{ 
			return false; 
		}
	},"请输入1-40个字符");
	/*** check基本信息页面的姓名 ***********************/
	jQuery.validator.addMethod("truename", function(value, element) {
		var reg = /^([a-zA-Z ]+|[\u4e00-\u9fa5]+)$/;
		return this.optional(element) || reg.test(value);
		}, "请输入有效的公司简称");
	$('#basicInfoForm').validate({
		/*debug: true,*/
        rules: {
        	/*name: {
        		required: true,
        		specialchar:true,
        		checkNum:true,
        		rangelength:[2,20]
    	   	},*/
        	name: {
        		required: true,
        		/*specialchar:true,
        		checkNum:true,*/
        		truename:true,
        		/*rangelength:[2,20]*/
        		rangeLenStr:[1,20]
    	   	},
    	   	degree: {
        		required: true
    	   	},
    	   	workyear: {
        		required: true
    	   	},
    	   	expectCity: {
        		required: true
    	   	},
    	   	tel: {
        		required: true,
        		isMobile:true,
    	    	maxlength:30
    	   	},
    	   	email: {
        		required: true,
        		email:true,
    	    	maxlength:100
    	   	}
        },
    	messages: {
    		/*name: {
        		required: "请输入你的真实姓名",
        		specialchar:"请输入你的真实姓名",
        		checkNum:"请输入你的真实姓名",
        		rangelength:"请输入你的真实姓名"
    	   	},*/
    		name: {
        		required: "请输入你的真实姓名",
        		/*specialchar:"请输入你的真实姓名",
        		checkNum:"请输入你的真实姓名",*/
        		truename:"请输入你的真实姓名",
        		/*rangelength:"请输入你的真实姓名"*/
        		rangeLenStr:"请输入你的真实姓名"
    	   	},
    	   	degree: {
        		required: "请选择最高学历"
    	   	},
    	   	workyear: {
        		required: "请选择工作年限"
    	   	},
    	   	expectCity: {
        		required: "请选择期望工作城市"
    	   	},
    	   	tel: {
    	   		required: "请输入手机号码",
        		isMobile:"请输入有效的手机号码",
    	    	maxlength:"请输入有效的手机号码"
    	   	},
    	   	email: {
        		required: "请输入接收面试通知邮箱",
        		email:"请输入有效的常用邮箱",
    	    	maxlength:"输入100字符以内的邮箱地址"
    	   	}
    	},
    	errorPlacement:function(label, element){
    		if(element.attr("type") == "hidden"){
    			label.appendTo($(element).parent());
    		}else{
    			label.insertAfter(element);
    		}
    	},
    	submitHandler:function(form){
    		var name = $('input[name="name"]',form).val();
    		var degree = $('input[name="degree"]',form).val();
    		var workyear = $('input[name="workyear"]',form).val();
    		var expectCity = $('input[name="expectCity"]',form).val();
    		var tel = $('input[name="tel"]',form).val();
    		var email = $.trim($('input[name="email"]',form).val());
    		var type = $('input[name="type"]',form).val();
			var resume_id = $('input[name="resume_id"]',form).val();
    		var jobid = $('#jobid').val();
    		var resubmitToken = $('#resubmitToken').val();
    		$(form).find(":submit").attr("disabled", true)
    		$.ajax({
				url:ctx+'User/deliverResume',
				type:'POST',
	        	data: {
	        		name:name,
	        		highestEducation:degree,
	        		workYear:workyear,
	        		city:expectCity,
	        		phone:tel,
	        		email:email,
	        		type:type,
	        		positionId:jobid,
	        		deliver:true,
					resume_id:resume_id,
					resubmitToken:resubmitToken
	        	},
            	dataType:'json'
			}).done(function(r) {
	    		/*if(null != r.resubmitToken && '' != r.resubmitToken){
					$('#resubmitToken').val(r.resubmitToken);					
				}*/
	        	if(r.status){
					//$("#deliverResumesSuccess p.share").removeClass('dn');
					//errorTips("简历已经成功投递出去了，请静候佳音！" ,"简历投递成功");
					$.colorbox({inline:true, href:$("div#yseResume"),title:"投个简历",overlayClose:false});
					$("#show_resume_status").html('<a href="javascript:;" class="mybtn3 ljsq rt">已投递</a>');
					/*
	        		deliverTime = r.content;
	        		//add nancy
	        		$("div#deliverResumesSuccess p.count span.resume_delay_txt").html(r.msg);
					if(r.code == 10){
	        			$("#deliverResumesSuccess p.share").removeClass('dn');
	        			//$("#deliverResumesSuccess .drawGGJ").siblings('tr.drawQD').hide();
	        		}
					$.colorbox({inline:true, href:$("div#deliverResumesSuccess"),title:"投个简历",overlayClose:false});
					if( $('#recall').length > 0){
	        			setCountdown( 9 , 'recall_time');
	        		}*/
	        	}else{
					errorTips("投递失败：" + r.info,"投个简历");

					/*
	        		if(r.code ==7){//投递失败
						errorTipsSet("投递失败：" + r.msg,"投个简历");
					}else if(r.code ==20){//需要二次确认 - 投递的是附件简历 - type=0
						$('#deliverResumeConfirm input[name="type"]').val(0);
						$('#deliverResumeConfirm .msg').html(r.msg);
						$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
					}else if(r.code ==21){//需要二次确认 - 投递的是在线简历 - type=1
						$('#deliverResumeConfirm input[name="type"]').val(1);
						$('#deliverResumeConfirm .msg').html(r.msg);
						$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
					}else if(r.code ==22){//需要弹出信息确认框 - 投递的是附件简历 - type=0
						openProfileBox(0);
					}else if(r.code ==23){//需要弹出信息确认框 - 投递的是在线简历 - type=1
						openProfileBox(1);
					}else if(r.code ==31){
						$('#upperLimit').find('h4').find('i').text( r.msg );
						$.colorbox({inline:true, href:$("#upperLimit"),title:"投个简历"});
					}else{
						errorTips("投递失败：" + r.msg,"投个简历");
					}
					*/
	        	}
	        	$(form).find(":submit").attr("disabled", false);
			});
    	}
	});
	
	//二次确认的时候返回修改信息 2013-12-19
	$('#deliverResumeConfirm .edit_field').bind('click',function(){
		var type = $('#deliverResumeConfirm input[name="type"]').val();
		 openProfileBox(type);
	})
	
	//微信扫码
	$('.qr-main').hover(function(){
		$(this).find("img").attr("src",globals.qrImgSrc);
		$(this).addClass('open');
	},function(){		
		$(this).removeClass('open');
	});
	
	
	//微信分享
	$('.jd_share').click(function(event){
		$(this).unbind("mouseover");
		$(this).unbind("mouseout");
		if($(this).hasClass("share_open")){
			$(this).removeClass('share_open');
			$(this).removeClass("share_click");
			$(this).removeClass("share_hover");
			weixin_show();
		}else{
			$(this).addClass('share_open');
			$(this).addClass("share_click");	
			$(this).find("span#share_jd").addClass("dn") ;
		}
		/*$(this).find("span#share_jd").addClass("dn") ;*/
		event.stopPropagation();	
	});
	
	$('.jd_share').bind("mouseover",function(){
		$(this).find("span#share_jd").removeClass("dn") ;
		$(this).addClass("share_hover");
	})
	$('.jd_share').bind("mouseout",function(){
		$(this).find("span#share_jd").addClass("dn") ;
		$(this).removeClass("share_hover");
	})	
	
	function weixin_show(){
		$('.jd_share').bind("mouseover",function(){
			var _this = $(this);
			_this.find("span#share_jd").removeClass("dn") ;
		    _this.addClass("share_hover");
		})
		$('.jd_share').bind("mouseout",function(){
			var _this = $(this);
			_this.find("span#share_jd").addClass("dn") ;
			_this.removeClass("share_hover");
		})
	}
	//
	//有用
	$('.like_record').click(function(){
		var _this = $(this);
		var id = _this.attr('data-id');
		var num = _this.attr('data-no');
		$.ajax({
			url:ctx+'/mycenter/expeUsefulIncrement.json',
			type:'POST',
        	data: {expeId:id,type:1},
        	dataType:'json'
		}).done(function(result) {
        	if(result.success){
        		num++;
        		_this.children('span').text(num);
        	}else{
        		_this.children('i').html(result.msg).fadeIn(200).delay(1500).fadeOut(200);
        	}
		});
	});
	
	//评价更多
	$('.remarkMore').click(function(){
		if($(this).hasClass('toggle_expand')){
			$(this).text('更多').removeClass('toggle_expand').siblings('.remark_content').addClass('dn').siblings('.remark_content_short').removeClass('dn');
		}else{
			$(this).text('收起').addClass('toggle_expand').siblings('.remark_content_short').addClass('dn').siblings('.remark_content').removeClass('dn');
		}
	});
	
	//举报弹窗内容
	function report_show(){
		$(".report_button").removeClass("reported");
		$(".report_button").bind("mouseover",function(){
			var _this = $(this);
			_this.addClass("report_hover");
		    _this.find("span#report_jd").removeClass("dn") ;
		});
		$(".report_button").bind("mouseout",function(){
			var _this = $(this);
			_this.find("span#report_jd").addClass("dn") ;
			_this.removeClass("report_hover");
		});	
	}
	$("#cboxOverlay").click(function(event){
		report_show();
	})

	$('#colorbox').on('click','#cboxClose',function(){
		if($(this).siblings('#cboxLoadedContent').children('div').attr('id') == 'deliverResumesSuccess' || $(this).siblings('#cboxLoadedContent').children('div').attr('id') == 'has_report'){
			 report_show();
		}
	});
	$('#colorbox').on('click','#cboxClose',function(){
		if($(this).siblings('#cboxLoadedContent').children('div').attr('id') == 'deliverResumesSuccess' || $(this).siblings('#cboxLoadedContent').children('div').attr('id') == 'receive_report'){
			 report_show();
		}
	});
	$('#colorbox').on('click','#cboxClose',function(){
		if($(this).siblings('#cboxLoadedContent').children('div').attr('id') == 'deliverResumesSuccess' || $(this).siblings('#cboxLoadedContent').children('div').attr('id') == 'reportbox'){
			 report_show();
		}
	});
	$(".report_cancel").click(function(event){
		report_show();
	})
	$(".report_button").bind("mouseover",function(){
		$(this).addClass("report_hover");
		$(this).find("span#report_jd").removeClass("dn") ;
	});
	$(".report_button").bind("mouseout",function(){
		$(this).find("span#report_jd").addClass("dn") ;
		$(this).removeClass("report_hover");
	});
	$(".select_box").on("click",function(event){
		$("#report_reason").css("border-color","#d3b8cc");
		$(".report_select").css("border-color","#d3b8cc");
		var content = $(this).find("div.reason_content");
		if(content.is(":visible")){
			content.hide() ;
		}else{
			content.show() ;
		}
		event.stopPropagation();
	})
	$(".reason_content ul li").on("click",function(event){
		var num = $(this).attr("value") ;
		$("#report_reason").val($(this).text()) ;
		if($("#report_reason").val() != "请选择举报原因"){
			$("#report_reason").css("color","#333333");		
		}else{
			$("#report_reason").css("color","#A9A9A9");
		}
		$("#report_reason_hidden").val($(this).text());
		$("#report_reason_hidden").attr("data-key",num) ;
		$(this).parents(".reason_content").hide() ;
		$(this).parents("#report_submit").validate().element($('#report_reason_hidden'));
		event.stopPropagation();
	})
	$("#reportbox").on("click",function(){
		$(this).find("div.reason_content").hide();
		$("#report_reason").css("border-color","#f1f1f1");
		$(".report_select").css("border-color","#f1f1f1");
	})
	$("label.checkbox").on("click",function(event){
		if($(this).find("i").is(":visible")){
			$(this).find(":checkbox").attr("checked",false) ;
			$(this).find("i").hide() ;
		}else{
			$(this).find(":checkbox").attr("checked",true) ;
			$(this).find("i").show() ;
		}
		$(".reason_content").hide();
		$("#report_reason").css("border-color","#f1f1f1");
		$(".report_select").css("border-color","#f1f1f1");
		event.stopPropagation();
	})
	
	$("label.checkbox").hover(function(){
		$(this).css("border-color","#91cebe");
	},function(){
		$(this).css("border-color","#e0e0e0");
	})
	$(".anonymous_submit").on("click",function(){
		var label = $(this).prev();
		if(label.find("i").is(":visible")){
			label.find(":checkbox").attr("checked",false) ;
			label.find("i").hide() ;
		}else{
			label.find(":checkbox").attr("checked",true) ;
			label.find("i").show() ;
		}
		$(".reason_content").hide();
		$("#report_reason").css("border-color","#f1f1f1");
		$(".report_select").css("border-color","#f1f1f1");
		event.stopPropagation();
	})
	
	$(".anonymous_submit").hover(function(){
		$("label.checkbox").css("border-color","#91cebe");
	},function(){
		$("label.checkbox").css("border-color","#e0e0e0");
	})
	
	$("label.checkbox>i").on("click",function(){
		$(".reason_content").hide();
		$("#report_reason").css("border-color","#f1f1f1") ;
		$(".report_select").css("border-color","#f1f1f1");
		$(this).hide() ;
		$(this).siblings("input[type='checkbox']").attr("checked",false) ;
	})
	
	$('#problem_txt').on('keyup',function(){
			var txt = $(this);
			 if (txt.val().length > 500) {
				 txt.val(txt.val().substring(0, 500));
			 } else {
				 txt.closest("tr").next().find(".report_txt").find("b").text(500 - txt.val().length);
			 }
		});
	
	$("#problem_txt").on("click focus",function(event){
		$("#report_reason").css("border-color","#f1f1f1");
		$(".report_select").css("border-color","#f1f1f1");
		$(".reason_content").hide();
		event.stopPropagation();
	})
	
	$("#report_submit").validate({
		rules:{
			report_reason : {
				required : true
			},
			content : {
				required : false,
				maxlength:500
			}
		},
		messages:{
			report_reason : {
				required:"请选择举报原因"
			},
			content : {
				maxlength:"请输入500字以内的详情描述"
			}
		},
		errorPlacement: function(error, element) {  
		    error.appendTo(element.parent()); 
		},
		submitHandler:function(form){
			var key = $("#report_reason_hidden").attr("data-key") ;
			var content = $.trim($("#problem_txt").val());
			var type = 0 ;
			if($("label.checkbox").find(":checkbox").attr("checked") == "checked"){
				type = 1;
			}else{
				type = 0;
			}
			var jobid = $('#jobid').val();
			var resubmitToken = $('#resubmitToken').val();
			$.ajax({
				type:'POST',
				url:ctx+'User/report',
				dataType:"json",
		        data:{
		        	content:content,
		        	fId:jobid,
		        	fType:2,
		        	reason:key,
		        	isAnonymous:type,
		        	resubmitToken:resubmitToken
		        } 
			}).done(function(result){//alert(result.msg);
					if(null != result.resubmitToken && '' != result.resubmitToken){
						$('#resubmitToken').val(result.resubmitToken);
					}
					if(result.code == 1){
						//PASSPORT.popup();
						$.colorbox({inline:true, href:$("div#receive_report"),title:"举报该职位"});
					}else{
						
						$.colorbox({inline:true, href:$("div#has_report"),title:"举报该职位"});
					}
					return false;
			})
		}
		
	})
	
	$(".upper_close").on("click",function(){	
		$.colorbox.close();	
	})
	$(".btn_upper").on("click",function(){	
		$.colorbox.close();	
	})

	
	
	$(".report_cancel").on("click",function(){	
		$.colorbox.close();	
	})
	//close collection success tip
	$('.jd_collection_x,.jd_collection_close').click(function(){
		$('#tipOverlay').hide();
		$(this).parent('.jd_collection_success').hide();
		var parents = $(this).parents(".jd_collection");
		fadeInFn(parents);
		return false;
	});
	
	//close collection tip 
	$('.jd_collection_tip .jd_collection_tip_x').click(function(){
		$('#tipOverlay').hide();
		$(this).parent('.jd_collection_tip').hide();
		return false;
	});
	
	//撤回操作   wrote 2014-12-15 by nancy 
	
	var recall = $('#recall');
	
	recall.click(function(){
		var userid = $('#userid').val();
		var jobid = $('#jobid').val();
		var resubmitToken = $('#resubmitToken').val();
		$.ajax({
			url: ctx+'/mycenterDelay/undoDeliverResume.json',
			data:{
				userId:userid,
				positionId:jobid,
				createTime:deliverTime,
				resubmitToken:resubmitToken
			},
			type:'POST',
        	dataType:'json'
		}).done(function(result){
			if(resubmitToken == null || resubmitToken == undefined){
				var resubmitToken = $('#resubmitToken').val();
			}
			if(result.success){
				//弹出简历已经被撤回的弹窗
				$('#deliverResumesSuccess p.count').html('简历已成功撤回。');
				//overlayClose 为true单击遮罩层就可以把ColorBox关闭
				$.colorbox({inline:true, href:$("#deliverResumesSuccess"),title:"投个简历",overlayClose:false});
			}
		})
	});
	
	//设置默认投递简历后的点击投递简历
	
	var setDefaultDeliver_delay = $('#setDefaultDeliver_delay');
	setDefaultDeliver_delay.click(function(){
		var userId = $('#userid').val();
		 var jobId = $('#jobid').val();
		 var force = false;
		 var typeDefault =false;
		 var resubmitToken = $('#resubmitToken').val();
		 var type = null;
		 if(typeDefault){
			 type = $('#deliverResumeConfirm input[name="type"]').val();
		 }
		 $.ajax({
				url: ctx+'/mycenterDelay/deliverResumeBeforce.json ',
				//url: ctx+'/mycenter/deliverResumeBeforce.json',
				type:'POST',
				async:false,
				data:{
					userId:userId,
					positionId:jobId,
					force:force,
					type:type,
					resubmitToken:resubmitToken
				},
	        	dataType:'json'
			}).done(function (r) {
				if(null != r.resubmitToken && '' != r.resubmitToken){
					$('#resubmitToken').val(r.resubmitToken);
				}
				if(r.success){
					deliverTime = r.content;
					//add nancy
					$("#deliverResumesSuccess p.count span.resume_delay_txt").html(r.msg);
					if(r.code == 10){
	        			$("#deliverResumesSuccess p.share").removeClass('dn');
	        			//$("#deliverResumesSuccess .drawGGJ").siblings('tr.drawQD').hide();
	        		}
					$.colorbox({inline:true, href:$("#deliverResumesSuccess"),title:"投个简历",overlayClose:false});
					setCountdown( 9 ,'recall_time');
				}else{
					if(r.code ==7){//投递失败
						errorTipsSet("投递失败：" + r.msg,"投个简历");
					}else if(r.code ==20){//需要二次确认 - 投递的是附件简历 - type=0
						$('#deliverResumeConfirm input[name="type"]').val(0);
						$('#deliverResumeConfirm .msg').html(r.msg);
						$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
					}else if(r.code ==21){//需要二次确认 - 投递的是在线简历 - type=1
						$('#deliverResumeConfirm input[name="type"]').val(1);
						$('#deliverResumeConfirm .msg').html(r.msg);
						$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
					}else if(r.code ==22){//需要弹出信息确认框 - 投递的是附件简历 - type=0
						openProfileBox(0);
					}else if(r.code ==23){//需要弹出信息确认框 - 投递的是在线简历 - type=1
						openProfileBox(1);
					}else if(r.code ==31){
						$('#upperLimit').find('h4').find('i').text( r.msg );
						$.colorbox({inline:true, href:$("#upperLimit"),title:"投个简历"});
					}else{
						errorTips("投递失败：" + r.msg,"投个简历");
					}
				}
			});
	})
	var delayConfirmDeliver = $('#delayConfirmDeliver');
	
	delayConfirmDeliver.click(function(){
		 var userId = $('#userid').val();
		 var jobId = $('#jobid').val();
		 var force = true;
		 var typeDefault =true;
		 var resubmitToken = $('#resubmitToken').val();
		 var type = null;
		 if(typeDefault){
			 type = $('#deliverResumeConfirm input[name="type"]').val();
		 }
		 $.ajax({
				url: ctx+'/mycenterDelay/deliverResumeBeforce.json ',
				//url: ctx+'/mycenter/deliverResumeBeforce.json',
				type:'POST',
				async:false,
				data:{
					userId:userId,
					positionId:jobId,
					force:force,
					type:type,
					resubmitToken:resubmitToken
				},
	        	dataType:'json'
			}).done(function (r) {
				if(null != r.resubmitToken && '' != r.resubmitToken){
					$('#resubmitToken').val(r.resubmitToken);
				}
				if(r.success){
					deliverTime = r.content;
					//add nancy
					$("#deliverResumesSuccess p.count span.resume_delay_txt").html(r.msg);
					if(r.code == 10){
	        			$("#deliverResumesSuccess p.share").removeClass('dn');
	        			//$("#deliverResumesSuccess .drawGGJ").siblings('tr.drawQD').hide();
	        		}
					$.colorbox({inline:true, href:$("#deliverResumesSuccess"),title:"投个简历",overlayClose:false});
					setCountdown( 9 ,'recall_time');
				}else{
					if(r.code ==7){//投递失败
						errorTipsSet("投递失败：" + r.msg,"投个简历");
					}else if(r.code ==20){//需要二次确认 - 投递的是附件简历 - type=0
						$('#deliverResumeConfirm input[name="type"]').val(0);
						$('#deliverResumeConfirm .msg').html(r.msg);
						$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
					}else if(r.code ==21){//需要二次确认 - 投递的是在线简历 - type=1
						$('#deliverResumeConfirm input[name="type"]').val(1);
						$('#deliverResumeConfirm .msg').html(r.msg);
						$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
					}else if(r.code ==22){//需要弹出信息确认框 - 投递的是附件简历 - type=0
						openProfileBox(0);
					}else if(r.code ==23){//需要弹出信息确认框 - 投递的是在线简历 - type=1
						openProfileBox(1);
					}else if(r.code ==31){
						$('#upperLimit').find('h4').find('i').text( r.msg );
						$.colorbox({inline:true, href:$("#upperLimit"),title:"投个简历"});
					}else{
						errorTips("投递失败：" + r.msg,"投个简历");
					}
				}
			});
	
	});
	
	//投递失败后的弹窗确认按钮
	
	$('body').on('click','#uploadFile a.btn_s',function(){
		window.location.reload();
	});
});

function invite(_this,value,me){
//	$.ajax({  
//		   type: "POST",  
//		   url: ctx+'/mycenter/noDisplay.json',  
//		   data: {
//			   positionId:pyPositionId,
//				refuseReason:value
//		   }, 
//		   success: function(result){  
//		     
//		   },
//		   error: function(result){  
//			   alert(result.message);
//		   }  
//	});
	$.ajax({
		url:ctx+'/mycenter/noDisplay.json',
		type:'POST',
		async:true,
		data:{
			positionId:pyPositionId,
			refuseReason:value
		},
		dataType:'json'
	}).done(function(result){
		if(result.state == 1){
			$('.inviteCancel').fadeOut(200);
			$('.collection_link').html('<span style="color:#999">已拒绝</span>');
			var pageNo = parseInt($('#pageNo').val());
			var listLen = $('.my_invitation li').length;
			if(pageNo>1){
				var prevNo;
				if(listLen == 1){
					prevNo = pageNo-1;
				}else{
					prevNo = pageNo;	
				}
				var href = window.location.href;
				var curPage;
				
				href = href.substr(0,href.indexOf('=')+1)+ prevNo;
				window.location.href = href;
			}
//			if(result.content.data.showStts == 0){//表示已经不再显示
//				/*if(lists.length > 1){
//					_this.parents('li').remove();
//				}else{
//					window.location.href=window.location.href;
//				}*/
//			}
		}else{
			alert(result.message);
		}
	});
}
function setCountdown(time,id){
	var count = setTimeout(function(){
			$("#"+id).html(time);
			if(time==0){
				clearTimeout(count);
				$('#deliverResumesSuccess p.count>i').addClass('dn');
			}
			setCountdown(time-1,id);
		},1000);
	
}	
//职位的收藏与取消收藏
var jobCollection = false;
//3月活动
var allMarchCollect = false;
function clickFn(ev,index,ele){
	if(ev.target == ele){
		index.off("click");
		collect(index);
	}
}
$(".jd_collection_page").hover(function(){
	$(this).addClass("page_underline");
},function(){
	$(this).removeClass("page_underline");
})
$('#jobCollection').on("click",function(e){
	var _this = $(this);
	var that = this;
	var span = $(this).find("span#collection_jd");
	span.addClass("dn");
	_this.unbind("mouseover");
	_this.unbind("mouseout");
	/*throttle( clickFn, [ e, _this, that ], null, 500 );*/
	clickFn(e,_this,that);
})


    //3月活动收藏
    $('.allmarch_jd_collect .btn_collect').click(function(){
        if($(this).hasClass('disabled'))
            return false;
        allMarchCollect = true;
        $('#jobCollection').trigger('click');
    });

    $('#collectSuccess .btn').click(function(){
        $.colorbox.close();	                 
    });

$("#login_position").click(function(){
	$(".collect_position").val("collected");
})

$("a.jd_collection").hover(function(){
	var span_collect = $(this).find("span#collection_pos");
	span_collect.removeClass("dn");
},function(){
	var span_collect = $(this).find("span#collection_pos");
	span_collect.addClass("dn");
})
$(".jd_collection").bind("mouseover",function(){
	var span = $(this).find("span#collection_jd");
	$(this).addClass("collection_hover");
	if($(this).hasClass("collected")){
		span.text("已收藏") ;
		span.removeClass("dn") ;
	}else{
		span.text("收藏职位") ;
		span.removeClass("dn") ;
	}
});
$(".jd_collection").bind("mouseout",function(){
	$(this).find("span#collection_jd").addClass("dn") ;	
	$(this).removeClass("collection_hover");
})

function fadeInFn(eve){
	eve.bind("mouseover",function(){
		var _this = $(this);
		var span = _this.find("span#collection_jd");
		_this.addClass("collection_hover");
		if(_this.hasClass("collected")){
			span.text("已收藏") ;
			span.removeClass("dn") ;
		}else{
			span.text("收藏职位") ;
			span.removeClass("dn") ;
		}
	});
	eve.bind("mouseout",function(){
		var _this = $(this);
		_this.find("span#collection_jd").addClass("dn") ;	
		_this.removeClass("collection_hover");
	})
}

var collect_timer = null;
var collect_hide = true;
function showlayer(element){
	clearTimeout(collect_timer);
	element.show();
	collect_hide = false;
}
function hidelayer(element){
	clearTimeout(collect_timer);
	collect_hide = true;
	collect_timer = setTimeout(function(){
         hidelayerreal(element);
     },3000);
}
function hidequik(ele){
	clearTimeout(collect_timer);
	collect_hide = true;
	collect_timer = setTimeout(function(){
		hidelayerreal(ele);
	},500);
}
function hidelayerreal(el){
	var that = $('#jobCollection');
	if(collect_hide != false){
		el.hide();
		fadeInFn(that);
		collect_hide = true;
    }else{
    	el.hide();
    	collect_hide = false;
    }
}
function collect(ele,resubmitToken){
	var type = 0 ;
	var id = $('#jobid').val();
	if(resubmitToken == null || resubmitToken == undefined){
		var resubmitToken = $('#resubmitToken').val();
	}
	var children = ele.children('.jd_collection_success');
	var span = ele.find("span#collection_jd");
	if(ele.hasClass('collected')){
		type = 0;
	}else{
		type = 1;
	};	
		$.ajax({
			url:ctx+'User/collectAdd',
			type:'POST',
			async:false,
			data:{
				positionId:id,
				type:type,
				flag:1,
				resubmitToken:resubmitToken
			},
			dataType:'json'
		}).done(function(result){
			if((null != result.resubmitToken) && ('' != result.resubmitToken)){
				$('#resubmitToken').val(result.resubmitToken);
			}
			if(result.success){
				//取消收藏
				if(result.content.showStts == 1){
					ele.removeClass("collection_hover");
					ele.removeClass('collected');
					children.find("span").text("已取消该收藏，");
					children.find("a.jd_collection_page").text("查看全部收藏") ;
					children.show();
					children.hover(function(){
						var that = $(this);
						showlayer(that);	
					},function(){
						var that = $(this);
						hidequik(that);
					})
					hidelayer(children);					
					jobCollection = false;
                    //3月活动
                    $('.allmarch_jd_collect .btn_collect').removeClass('disabled').html("立即收藏");
				}else{
					//添加收藏
					ele.addClass('collected');
					children.find("span").text("已收藏该职位，");
					children.find("a.jd_collection_page").text("查看全部收藏") ;
					children.show();
					children.hover(function(){
						var that = $(this);
						showlayer(that);	
					},function(){
						var that = $(this);
						hidequik(that);
					})
					hidelayer(children);	
					jobCollection = true;
                    //3月活动
                    if(allMarchCollect){
                        $.colorbox({inline:true, href:$("#collectSuccess"),title:"收藏成功"});
                        allMarchCollect = false;
                    }
                    $('.allmarch_jd_collect .btn_collect').addClass('disabled').html("已收藏");
				}
			}
			if(result.content == null){
				ele.removeClass("collection_hover");
				alert(result.msg);
				fadeInFn(ele);
			}
		$('#jobCollection').on("click",function(e){
			var _this = $(this);
			var that = this;
			var span = _this.find("span#collection_jd");
			span.addClass("dn");
			_this.unbind("mouseover");
			_this.unbind("mouseout");
			throttle( clickFn, [ e, _this, that ], null, 500);
		})
		$(".jd_collection_page").on("click",function(e){
			e.stopPropagation();
		});
	});
};


function popQR(){
	$.ajax({
		url:ctx+"/mycenter/showQRCode",
		type:"GET"
		/*async:false*/
	}).done(function(data){
		if(data.success){
			$('.saoma .drop_l img').attr("src",data.content);
			$('#deliverResumesSuccess .weixinQR .qr img').attr("src",data.content);
			$('#deliverResumesSuccess .weixinQR').removeClass('dn');
		}
	});	
}

function weixin_share(){
	var jobid = $('#jobid').val();
	//当前页面url
	var url = window.location.href ;
	var re=/(http(s)?\:\/\/)?(www\.)?(\w+\:\d+)?(\/\w+)+\.(html)/gi;
	var arr=url.match(re);
	var fullurl = ctx + arr + "?source=weixin";
	
	var img_url = ctx+"/share/qrcode_share.png"+"?code="+jobid+"&qrSource=weixin&"+"flag=jobs&"+"urlEncode="+encodeURIComponent(fullurl);
	$("<img class='weixin_img'/>").appendTo(".jd_share_success");
	$(".weixin_img").attr("src",img_url);
	$(".weixin_img").css({"width":"131","height":"131"});
}

$(".jd_share_success").click(function(event){
	event.stopPropagation();
})

/************************
 * 申请职位
 */
 function sendResume(userId,jobId,force,typeDefault){
	 var resubmitToken = $('#resubmitToken').val();
	 var type = null;
	 if(typeDefault){
		 type = $('#deliverResumeConfirm input[name="type"]').val();
	 }
		$.ajax({
			url: ctx+'/mycenterDelay/deliverResumeBeforce.json ',
			//url: ctx+'/mycenter/deliverResumeBeforce.json',
			type:'POST',
			async:false,
			data:{
				userId:userId,
				positionId:jobId,
				force:force,
				type:type,
				resubmitToken:resubmitToken
			},
        	dataType:'json'
		}).done(function (r) {
			if(null != r.resubmitToken && '' != r.resubmitToken){
				$('#resubmitToken').val(r.resubmitToken);
			}
			if(r.success){
				deliverTime = r.content;
				//add nancy
				$("#deliverResumesSuccess p.count span.resume_delay_txt").html(r.msg);
				if(r.code == 10){
        			$("#deliverResumesSuccess p.share").removeClass('dn');
        			//$("#deliverResumesSuccess .drawGGJ").siblings('tr.drawQD').hide();
        		}
				$.colorbox({inline:true, href:$("#deliverResumesSuccess"),title:"投个简历",overlayClose:false});
				
				if( $('#recall').length > 0 ){
					setCountdown( 9 ,'recall_time');
				}
			}else{
				if(r.code ==7){//投递失败
					errorTipsSet("投递失败：" + r.msg,"投个简历");
				}else if(r.code ==20){//需要二次确认 - 投递的是附件简历 - type=0
					$('#deliverResumeConfirm input[name="type"]').val(0);
					$('#deliverResumeConfirm .msg').html(r.msg);
					$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
				}else if(r.code ==21){//需要二次确认 - 投递的是在线简历 - type=1
					$('#deliverResumeConfirm input[name="type"]').val(1);
					$('#deliverResumeConfirm .msg').html(r.msg);
					$.colorbox({inline:true, href:$("#deliverResumeConfirm"),title:"投递简历确认"});
				}else if(r.code ==22){//需要弹出信息确认框 - 投递的是附件简历 - type=0
					openProfileBox(0);
				}else if(r.code ==23){//需要弹出信息确认框 - 投递的是在线简历 - type=1
					openProfileBox(1);
				}else if(r.code ==31){
					$('#upperLimit').find('h4').find('i').text( r.msg );
					$.colorbox({inline:true, href:$("#upperLimit"),title:"投个简历"});
				}else{
					errorTips("投递失败：" + r.msg,"投个简历");
				}
			}
		});
	
}

function openProfileBox(type){
	$.ajax({
		url: ctx+'/resume/queryConfirmInfo.json',
		data:{type:type},
		dataType: 'json'
	}).done(function (data) {
		if(data.success){
			//弹出个人信息确认 前 补充信息
			$('#basicInfoForm input[name="name"]').val(data.content.name);
			if(data.content.highestEducation){
				$('#basicInfoForm input[name="degree"]').val(data.content.highestEducation);
				$('#basicInfoForm #select_degree').val(data.content.highestEducation).css('color','#333');
			}
			if(data.content.workYear){
				$('#basicInfoForm input[name="workyear"]').val(data.content.workYear);
				$('#basicInfoForm #select_workyear').val(data.content.workYear).css('color','#333');
			}
			if(data.content.city){
				$('#basicInfoForm input[name="expectCity"]').val(data.content.city);
				$('#basicInfoForm #select_expectCity').val(data.content.city).css('color','#333');
			}
			$('#basicInfoForm input[name="tel"]').val(data.content.phone);
			$('#basicInfoForm input[name="email"]').val(data.content.email);
			$('#basicInfoForm input[name="type"]').val(data.content.type);
			//工作年限列表
			var workTimes = '<ul>';
			for(var i=0; i<data.content.workTimes.length; i++){
				workTimes += '<li>'+data.content.workTimes[i]+'</li>';
			}
			workTimes += '</ul>';
			$('#basicInfoForm #box_workyear').html(workTimes);
			//工作城市列表
			var citys = '';
			for(var i=0; i<data.content.citys.length; i++){
				citys += '<dl><dt>'+data.content.citys[i].nameStr+'</dt><dd>';
				for(var j=0; j<data.content.citys[i].cityList.length; j++){
					 citys += '<span>'+data.content.citys[i].cityList[j]+'</span>';
				}
				citys += '</dd></dl>';      			
			}
			$('#basicInfoForm #box_expectCity').html(citys);
			//最高学历列表
			var degreeList = '<ul>';
			for(var i=0; i<data.content.degrees.length; i++){
				degreeList += '<li>'+data.content.degrees[i]+'</li>';
			}
			degreeList += '</ul>';
			$('#basicInfoForm #box_degree').html(degreeList);
			
			$("#basicInfoForm").find('span.error').hide(); 
			
			//弹出个人信息确认框
			$.colorbox({inline:true, href:$("#infoBeforeDeliverResume"),title:"个人信息确认"});	 
		}else{
			alert(data.msg);
		}
	});
 }
 
 //设置了在线简历，但是在线简历不完善 提示
function errorTipsSet(msg){
	$.colorbox({
		html:'<div class="popup" style="width:460px;">'+
				'<table width="100%">'+
					'<tr>'+
						'<td align="center"><h4 class="error_msg" style="width:400px;">'+msg+'</h4></td>'+
					'</tr>'+
					'<tr>'+
						'<td align="center"><a href="'+ctx+'/resume/myresume.html" target="_blank" class="btn_s">马上去完善</a></td>'+
					'</tr>'+
				'</table>'+
			'</div>',
		title:'错误提示'
	});

}
 
 /************************
  * 简历上传功能 （文件）
  */
var uploadFlag = 1;
function file_check(obj,action_url,id,e)
{
	if( uploadFlag == 2 ){
		return false;
	}
	uploadFlag = 2;
	$('#loadingImg').css("visibility","visible");
	var obj = $('#' + id);
	var userId = $('#userid').val();

	this.AllowExt='.doc,.docx,.pdf,.ppt,.pptx,.txt,.wps';
	this.FileExt=obj.val().substr(obj.val().lastIndexOf(".")).toLowerCase();
	
	if(this.AllowExt != 0 && this.AllowExt.indexOf(this.FileExt)==-1)
	{
		if(id == 'reUploadResume1'){
			$('#setResume span.error').show();
		}else if(id == 'reUploadResume2'){
			$('#setResumeApply span.error').show();
		}else{
			errorTips("只支持word、pdf、ppt、txt、wps格式文件，请重新上传");
			$('#loadingImg').css("visibility","hidden");
		}
		uploadFlag = 1;
	}else if(this.FileExt == ''){
	 	return false;
	}else{
		$.ajaxFileUpload ({
			type:'POST',
			url: action_url,
			secureuri:false,
			fileElementId:id,
			data:{userId:userId},
			dataType: 'text',
			success: function (jsonStr) {
				//uploadFlag = 1;
				//**add nancy**//
				$('#setResumeApply span.error').hide();
				$('#resumeSetForm span.error').hide();
				//**end nancy**//
				var json = eval('(' + jsonStr + ')');
				$('#loadingImg').css("visibility","hidden");
				if(json.success){
					var nearbyName = '';
					if(json.content.nearbyName.length>18){
						nearbyName = json.content.nearbyName.substring(0,15)+'...';
					}else{
						nearbyName = json.content.nearbyName;
					}
					$('#resumeSendForm .btn_profile_save').removeAttr('disabled').css('backgroundColor','#019875');
					$('#resumeSetForm .btn_profile_save').removeAttr('disabled').css('backgroundColor','#019875');
					if(id == 'reUploadResume1'){
						$('#setResume .uploadedResume').text(nearbyName).attr('title',json.content.nearbyName).removeClass('red');
						$('#setResume .downloadResume').removeClass('dn').siblings('span').removeClass('dn');
						$('#setResume .reUpload').text('重新上传');
					}else if(id == 'reUploadResume2'){
						$('#setResumeApply .uploadedResume').text(nearbyName).attr('title',json.content.nearbyName).removeClass('red');
						$('#setResumeApply .downloadResume').removeClass('dn').siblings('span').removeClass('dn');
						$('#setResumeApply .reUpload').text('重新上传');
					}else{
						$.colorbox({inline:true, href:$("div#uploadFileSuccess"),title:"上传附件简历"});
					}
				}else{
					//issac 加判断 
					if(json.code==-1){
						$.colorbox({inline:true, href:$("div#fileResumeUpload"),title:"附件简历上传失败"});
					}else if(json.code==-2){
						$.colorbox({inline:true, href:$("div#fileResumeUploadSize"),title:"附件简历上传失败"});
					}else{
						errorTips("简历上传失败，请重新上传");
						$('#loadingImg').css("visibility","hidden");
					}		
						
				} 
                uploadFlag = 1; 
			},
			error:function(err){
				errorTips("简历上传失败，请重新上传");
				$('#loadingImg').css("visibility","hidden");
				uploadFlag = 1;
				$('.btn_s').click(function(){
					window.location.reload();
				});
				$('#colorbox').on('click','#cboxClose',function(){
					if($(this).siblings('#cboxLoadedContent').children('div').attr('id') == 'uploadFile'){
						window.location.reload();
					}
				});
			}
		})//end of ajax
	}
	
} 

//职位详情页相似职位以及猜你喜欢功能的添加  add by Darren ｜2014-7-30
//$(function(){
//
//	init_show_similar();
//	
//	function init_show_similar(){
//		var hasLikePositionList = $('#similarPosition').val();
//		var t;
//		var arr = [];
//
//		if( hasLikePositionList ){
//		    t = 'similar';
//		    var likeList = $('#similarList').find('li');
//		    likeList.each(function(){
//		      var me = $(this);
//
//		      arr.push( me.attr('data-jobId'));
//		    });
//		}
//
//		var jids = arr.join(',');
//		var currUrl = encodeURIComponent( document.URL );
//		var v = $('#version').val();
//		var z = Math.random();
//        var params = {
//            v:v,
//            t:t,
//            dl:currUrl,
//            jids:jids,
//            z:z
//        }
//
//        postoA(params);
//	}
//	
//})
//nancy recommend
$(function(){

	var listItem = $('#similar_current').find('.guess_like_list_item').find('a');

	listItem.hover(function(){

		var me = $(this);

		me.next('.company_info').removeClass('dn');

	},function(){
		var me = $(this);
		me.next('.company_info').addClass('dn');

	});

	$('.position_detail_content .guess_like a').click(function(e){//推荐职位
		e.preventDefault();
		var me = $(this);	
		var cur_href = me.attr('href');
		var cur_index = me.attr('data-index');
		//alert(cur_href+"?source=home_rec&i=home_rec-"+cur_index);
		window.location.href = cur_href+"?source=rec&i=rec-"+cur_index;
	})

	$('.recommend_list a').click(function(e){//推荐职位
                e.preventDefault();
                var me = $(this);
                var cur_href = me.attr('href');
                var cur_index = me.attr('data-index');
                //alert(cur_href+"?source=home_rec&i=home_rec-"+cur_index);
                window.location.href = cur_href+"?source=rec&i=rec-"+cur_index;
        })
	
});
