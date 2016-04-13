$(function(){
	/*** 填写联系方式弹窗 ***/
	$('#telForm').validate({
        rules: {
    	   	tel: {
    	    	required: true,
    	    	isTel:true,
    	    	maxlength:30
    	   	}
    	},
    	messages: {
    	   	tel: {
    	    	required: "请输入你的手机号码或座机号码",
    	    	isTel:"请输入正确的手机号或座机号，座机格式如010-62555255或010-6255255-分机号，多个电话用英文逗号隔开",
	    		maxlength:"请输入正确的手机号或座机号，座机格式如010-62555255或010-6255255-分机号，多个电话用英文逗号隔开"
    	   	}
    	},
    	submitHandler:function(form){
    		var tel = $('input[type="text"]',form).val();
    		$(form).find(":submit").attr("disabled", true);
            $.ajax({
            	type:'POST',
            	data:{tel:tel},
            	url:ctx+'/user/addTel.json',
            	dataType: 'json'
            }).done(function(result) {
				if(result.success){
					$.colorbox.close();
				}else{
					$('#telError').text(result.msg).show();
				}
				$(form).find(":submit").attr("disabled", false);
            }); 
        }  
	});
	
	$('#telTip input[type="text"]').focus(function(){$('#telError').hide()});
	
	/*** 单选按钮 选择工作性质 ***/
	$('.profile_radio li input').click(function(){
		$(this).parent('li').siblings('li').removeClass('current');
		$(this).parent('li').addClass('current');
		$("#jobForm").validate().element($(this));
	});
	
	/*** 选择薪水范围 ***/
	$('#salaryMin').focus(function(){
		if($.trim($(this).val()) == ''){
			$(this).prev().text('最低月薪').css({color:'#dddee0'});		
		}
	}).blur(function(){
		if($.trim($(this).val()) == ''){
			$(this).prev().text('最低月薪').css({color:'#777'});	
		}
	}).keyup(function(){
		$(this).prev().text('');			
	});
	$('#salaryMax').focus(function(){
		if($.trim($(this).val()) == ''){
			$(this).prev().text('最高月薪').css({color:'#dddee0'});
		}
	}).blur(function(){
		if($.trim($(this).val()) == ''){
			$(this).prev().text('最高月薪').css({color:'#777'});	
		}
	}).keyup(function(){
		$(this).prev().text('');			
	});
	
		
		
	/*** 选择职位类别 ***/
		$(document).click(function(){
			$('#box_job').hide();
			$('.boxUpDown').hide();
			$('.selectr').removeClass('selectrFocus');
		});
		$('#box_job').bind('click',function(e){e.stopPropagation();});
	
		/*** 选职位名称  //职位名称三级菜单位置 ***/
/*		$('#box_job').on('mouseenter','.job_main li',function(){
			$(this).children('ul').show();
			var sheight = '';
		$('#box_job .job_main').each(function(){
				$(this).children('li').each(function(i){
					sheight = $('#box_job').height() - ($(this).offset().top - $(this).parents('#box_job').offset().top + 32);
					if(sheight < $(this).children('.job_sub').height()){
						if(navigator.userAgent.indexOf("MSIE")>0 && navigator.appVersion.match(/7./i)=="7."){
							$(this).children('.job_sub').css({marginTop:'-30' - $(this).children('.job_sub').height() + 'px'});
						}else{
							$(this).children('.job_sub').css({marginTop:'-44' - $(this).children('.job_sub').height() + 'px'});
						}
					}
				});
			});
		});*/
		
		
		$('#box_job').on('mouseleave','.job_main li',function(){
			$(this).children('ul').hide();
		});
		$('#select_category').bind('click',function(e){
			e.stopPropagation();
			$('.boxUpDown').hide();
			$('.selectr').removeClass('selectrFocus');
			$(this).addClass('selectrFocus');
			$('#box_job').show();
			$('#box_area').hide();
		});
		$('#box_job').on('click','.job_main li',function(e){
			e.stopPropagation();
			//var category = $(this).parent('ul.job_sub').siblings('span').text();
			var category = $(this).text();
			var mynum = $(this).parents('dl').index();
			
			var category_id = $(this).attr("id");
			
			$('#select_category').css("color","#333").val(category).removeClass('selectrFocus');
			 $('#positionType').val(category_id);
			 
			$('#jobcate').val('');
			$('#select_jobcate').val('请选择职位类别');
			$('#box_job').hide();
			$("#jobForm").validate().element('#positionType'); 
			//$("#jobForm").validate().element('#positionName'); 

			$('#box_jobcate ul').eq(mynum).show().siblings('ul').hide();
		    $('#box_jobcate').show();
			$("#pdnocate").val('');
			$('#nocate').removeClass('error'); 
			
		});
/*		$('#box_job').on('click','ul.job_main > li',function(e){
		 	e.stopPropagation();
			var category = $(this).children('span').text();
			$('#select_category').css("color","#333").val(category).removeClass('selectrFocus');
			$('#positionType').val(category);
			$('#positionName').val('');
			$('#box_job').hide();
			placeholderFn();
			$("#jobForm").validate().element( "#positionType" );
		});
		*/
		

		/*职位类别*/
		$('#select_jobcate').bind('click',function(e){
			e.stopPropagation();
			$('.selectr').removeClass('selectrFocus');
			$('#box_job').hide();
			$('.boxUpDown').hide();
			$(this).addClass('selectrFocus');
			if($("#pdnocate").val()=='no'){
		  	    $('#nocate').addClass('error'); 
			}else{
				$(this).siblings('.boxUpDown').show();
				$('#nocate').removeClass('error'); 
			}
		});
		$('#box_jobcate').on('click','ul li',function(e){
			e.stopPropagation();
			var val = $.trim($(this).text());
			
			var jobcate = $.trim($(this).attr("id"));
			
			$(this).parents('#box_jobcate').hide().siblings('#select_jobcate').val(val).css('color','#333').removeClass('selectrFocus');
			
			$(this).parents('#box_jobcate').hide().siblings('#jobcate').val(jobcate);
			
			$('#jobForm').validate().element( $('#jobcate') ); 
		});
		

		
		/*选工作经验*/
		$('#select_experience').bind('click',function(e){
			e.stopPropagation();
			$('.selectr').removeClass('selectrFocus');
			$('#box_job').hide();
			$('.boxUpDown').hide();
			$(this).addClass('selectrFocus');
			$(this).siblings('.boxUpDown').show();
		});
		$('#box_experience').on('click','ul li',function(e){
			e.stopPropagation();
			var val = $.trim($(this).text());
			$(this).parents('#box_experience').hide().siblings('#select_experience').val(val).css('color','#333').removeClass('selectrFocus');
			$(this).parents('#box_experience').hide().siblings('#experience').val(val);
			$('#jobForm').validate().element( $('#experience') ); 
		});
		

		
		/*选工作经验*/
		$('#select_education').bind('click',function(e){
			e.stopPropagation();
			$('.selectr').removeClass('selectrFocus');
			$('#box_job').hide();
			$('.boxUpDown').hide();
			$(this).addClass('selectrFocus');
			$(this).siblings('.boxUpDown').show();
		});
		$('#box_education').on('click','ul li',function(e){
			e.stopPropagation();
			var val = $.trim($(this).text());
			$(this).parents('#box_education').hide().siblings('#select_education').val(val).css('color','#333').removeClass('selectrFocus');
			$(this).parents('#box_education').hide().siblings('#education').val(val);
			$('#jobForm').validate().element( $('#education') ); 
		});
		
	/*** 验证表单和提交*******************************************/
		$("#jobForm input").focus(function(){
			$(this).siblings('span.error').hide();
		})
		$('#jobForm .salary_range input').focus(function(){
			$(this).parents('div.salary_range').siblings('span.error').hide();
		})
		$("#jobForm").submit(function(){
			tinyMCE.triggerSave(true);
			//var content = tinyMCE.activeEditor.getContent(); // get the content
		    //$('#positionDetail').val(content);
			//$('#positionDetail').val();
		}).validate({
			groups: {
	        	salary: "salaryMin salaryMax"
	        },
	        onkeyup: false,
	    	focusCleanup:true,
	        rules: {
	        	positionName: {
	        		required:true,
	        		specialchar:true,
	        		rangeLenStr:[0,30]
	    	   	}, 
	    	   	positionType: {
	    	    	required: true
	    	   	},
				jobcate: {
	    	    	required: true
	    	   	},
	    	   	department: {
	    	   		required: false,
	    	   		specialchar:true,
	    	   		maxlenStr:20
	    	   	},
	    	   	jobNature: {
	    	    	required: true
	    	   	},
	    	   	workAddress: {
	    	   		required: true,
	    	   		/*checkCity:true*/
	    	   		cityAvailable:true,
	    	   		maxlenStr:10
	    	   	},
	    	   	salaryMin: {
	    	   		required: function(){return ($('#salaryMin').val() == '' || $('#salaryMin').val() == $('#salaryMin').attr('placeholder')) && ($('#salaryMax').val() == '' || $('#salaryMax').val() == $('#salaryMax').attr('placeholder'))},
	    	   		digits:true,
	    	   		range:[1,100],
	    	   		salaryRange:true,
	    	   		Dvalue:true
	    	   	},
	    	   	salaryMax: {
	    	   		required:function(){return ($('#salaryMin').val() == '' || $('#salaryMin').val() == $('#salaryMin').attr('placeholder')) && ($('#salaryMax').val() == '' || $('#salaryMax').val() == $('#salaryMax').attr('placeholder'))},
	    	   		digits:true,
	    	   		range:[1,100],
	    	   		salaryRange:true,
	    	   		Dvalue:true
	    	   	},
	    	   	workYear: {
	    	   		required: true
	    	   	},
	    	   	education: {
	    	   		required: true
	    	   	},
	    	   	positionAdvantage: {
	    	   		required: true,
	    	   		specialchar:true,
	    	   		checkNum:true,
	    	   		rangeLenStr:[2,20]
	    	   	},
	    	   	positionDetail: {
	    	   		required: true,
	    	   		textInMce:true,
	    	   		hasEmail:true
	    	   	},
	    	   	positionAddress:{
	    	   		required: true,
	    	   		maxlenStr:150
	    	   	},
	    	   	email:{
	    	   		required: false
	    	   	},
	    	   	forwardEmail:{
	    	   		required:false,
	    	   		email:true,
	    	   		//forwardEmailFormat:true,
	    	   		//forwardSame:true,
	    	   		maxlength:100
	    	   	}
	    	},
	    	messages: {
	    		positionName: {
	    			required:"请输入职位名称，如：产品经理",
	    	   		specialchar:"请输入有效的职位名称",
	    	   		rangeLenStr: "请输入30字以内的职位名称"
	    	   	}, 
	    	   	positionType: {
	    	   		required:"请选择行业领域"
	    	   	},
				 jobcate: {
	    	   		required:"请选择职位类别"
	    	   	},
	    	   	department: {
	    	   		specialchar:"请输入有效的所属部门",
	    	   		maxlenStr:"请输入20字以内的所属部门"
	    	   	},
	    	   	jobNature: {
	    	   		required:"请选择工作性质"
	    	   	},
	    	   	workAddress: {
	    	   		required:"请输入工作城市，如：北京",
	    	   		/*checkCity:"请输入有效的工作城市，如：北京"*/
	    	   		maxlenStr:"请输入有效的工作城市"
	    	   	},
	    	   	salaryMin: {
	    	   		required:"请输入月薪范围，如：2k-4K",
	    	   		digits:"请输入有效的月薪范围，如：9",
	    	   		/*digits:"请输入有效的月薪范围，1K-100K",*/
	    	   		range:"请输入有效的月薪范围，1k-100k",
	    	   		salaryRange:"最高月薪不能大于最低月薪的2倍",
	    	   		Dvalue:"最高月薪需大于最低月薪"
	    	   	},
	    	   	salaryMax: {
	    	   		required:"请输入月薪范围，如：2k-4K",
	    	   		digits:"请输入有效的月薪范围，如：9",
	    	   		range:"请输入有效的月薪范围，1k-100k",
	    	   		salaryRange:"最高月薪不能大于最低月薪的2倍",
	    	   		Dvalue:"最高月薪需大于最低月薪"
	    	   	},
	    	   	workYear: {
	    	   		required:"请选择工作经验要求"
	    	   	},
	    	   	education: {
	    	   		required:"请选择学历要求"
	    	   	},
	    	   	positionAdvantage: {
	    	   		required:"一句话描述该职位的吸引力，如：负责领域、福利待遇等，限20字",
	    	   		specialchar:"请输入有效的职位诱惑信息",
	    	   		checkNum:"请输入有效的职位诱惑信息",
	    	   		rangeLenStr:"请输入2-20字的职位诱惑"
	    	   	},
	    	   	positionDetail: {
	    	   		required:"请输入岗位职责、任职要求等，建议尽量使用短句并分条列出",
	    	   		textInMce:"请输入20-2000字的职位描述",
	    	   		hasEmail:"职位描述不能包含邮箱等联系方式"
	    	   	},
	    	   	positionAddress:{
	    	   		required: "请输入工作地点",
	    	   		maxlenStr:"请输入150字以内的工作地点"
	    	   	},
	    	   	forwardEmail:{
	    	   		email:"请输入正确的邮箱格式",
	    	   		forwardEmailFormat:"请输入与当前接收简历邮箱后缀一致的邮箱地址",
	    	   		forwardSame:"请输入与当前接收简历邮箱不同的邮箱地址",
	    	   		maxlength:"请输入100字以内的邮箱地址"
	    	   	}
	    	},
	    	errorPlacement:function(label, element){
	    		if(element.attr("type") == "hidden" ){
	    			label.appendTo($(element).parent());
	    		}else if( element.attr("type") == "radio"){
	    			label.insertAfter($(element).parents('ul.profile_radio'));
	    		}else if(element.attr("name") == "salaryMin" || element.attr("name") == "salaryMax"){
	    			label.insertAfter($(element).parents('.salary_range'));
	    		}else if(element.is("textarea")){
	    			label.appendTo($(element).parent());
	    		}else{
	    			label.insertAfter($(element));
	    		}
	    	},
	    	invalidHandler: function(form, validator) {
	            if (!validator.numberOfInvalids())
	                return;

	            var top = $(validator.errorList[0].element).offset().top;
	            if(validator.errorList[0].element.name == 'positionType'){
	            	top = 150;
	            }
				else if(validator.errorList[0].element.name == 'jobcate'){
	            	top = 250;
	            }else if(validator.errorList[0].element.name == 'workYear'){
	            	top = 650;
	            }else if(validator.errorList[0].element.name == 'education'){
	            	top = 700;
	            }
	            $('html, body').animate({
	                scrollTop: top
	            }, 400);
	        }  
	    });
		
	/*** check city***********************/ 	
		jQuery.validator.addMethod("cityAvailable",function(value, element) {
				return this.optional(element) || checkCity(value);
			}, "请输入有效的公司所在城市，如：北京"); 
		
	/*** check 职位详情里有没有email***********************/ 	
		jQuery.validator.addMethod("hasEmail", function(value, element,param) {
			if((value.indexOf('@') > 0) && (value.indexOf('.com') > 0 || value.indexOf('.cn') > 0) && ((value.indexOf('.com')-value.indexOf('@')<15 && value.indexOf('.com')-value.indexOf('@')>0) || (value.indexOf('.cn')-value.indexOf('@')<15 && value.indexOf('.cn')-value.indexOf('@')>0)) ){
				return false;
			}else{
				return true;
			}
		}, "职位描述不能包含邮箱，请去掉");
	
	/*** check tinymce***********************/ 	
		$.validator.addMethod("textInMce", function textInMce(value, element){
			var editorContent = tinyMCE.get('positionDetail').getContent().replace(/<.*?>/g,"");
			var textLength = getStrLen(editorContent);
			if(textLength >= 40 && textLength <= 4000){
				return true;
			}else{
				return false;
			}
		}, "请输入20-2000字的职位描述");
		$.validator.classRuleSettings.textInMce= { textInMce: true };
		
		$('#workAddress').focus(function(){
			$('#beError').hide();
		});
		
		/*** check 转发的邮箱格式***********************/ 	
		jQuery.validator.addMethod("forwardEmailFormat", function(value, element,param) {
			var forwardStart = $.trim(value).indexOf('@');
			var forwardEmail = $.trim(value).substring(forwardStart,$.trim(value).length);
			forwardEmail = forwardEmail.toLowerCase();
			var receiveEmailVal = $.trim($('#receiveEmailVal').text());
			var receiveStart = receiveEmailVal.indexOf('@');
			var receiveEmail = receiveEmailVal.substring(receiveStart,receiveEmailVal.length);
			receiveEmail =   receiveEmail.toLowerCase();
			if($.trim(value) != '' && forwardEmail != receiveEmail ){
				return false;
			}else{
				return true;
			}
		}, "请输入与当前接收简历邮箱后缀一致的邮箱地址");
		
		/*** check 转发的邮箱是否与接收邮箱一样***********************/ 	
		jQuery.validator.addMethod("forwardSame", function(value, element,param) {
			var forwardStart = $.trim(value);
			var receiveEmailVal = $.trim($('#receiveEmailVal').text());
			if(forwardStart != '' && forwardStart == receiveEmailVal ){
				return false;
			}else{
				return true;
			}
		}, "请输入与当前接收简历邮箱不同的邮箱地址");
		
	/*job preview*/
	$('#jobPreview').click(function(){
		$('#jobForm').attr({'action':ctx+'Jobs/positionPreview.html','target':'_blank','method':'POST'}).submit();
	});
	
	/**add nancy**/
	$('#forwardEmail').focus(function(){
		$(this).siblings('span').hide();
	});
	
	$('#formSubmit').click(function(){
		ajaxSubmit();
	});
	
	function ajaxSubmit(){
		if( $("#jobForm").valid() ){  
			if($('#department').val() == $('#department').attr('placeholder')){
    			$('#department').val('');
    		}
    		if($('#salaryMin').val() == '' || $('#salaryMin').val() == $('#salaryMin').attr('placeholder')){
    			$('#salaryMin').val('');
    		}
    		if($('#salaryMax').val() == '' || $('#salaryMax').val() == $('#salaryMax').attr('placeholder')){
    			$('#salaryMax').val('');
    		}
    		if($('#positionAddress').val() == $('#positionAddress').attr('placeholder')){
    			$('#positionAddress').val('');
    		}
			var positionType = $('#positionType').val();
			var jobcate = $('#jobcate').val();
			var positionName = $('#positionName').val();
			var positionThreeType = $('#positionThreeType').val();
			var department = $('#department').val();
			var jobNature = $('#jobForm input[name="jobNature"]:checked').val();
			var salaryMin = $('#salaryMin').val();
			var salaryMax = $('#salaryMax').val();
			var workAddress = $('#workAddress').val();
			var workYear = $('#experience').val();
			var education = $('#education').val();
			var positionAdvantage = $('#positionAdvantage').val();
			var positionDetail = $('#positionDetail').val();
			var positionAddress = $('#positionAddress').val();
			var positionLng = $('#lng').val();
			var positionLat = $('#lat').val();
			var email = $('#receiveEmail').val();
			var forwardEmail = $('#forwardEmail').val();
			var id = $('#jobForm input[name="id"]').val();
			var companyId = $('#jobForm input[name="companyId"]').val();
			var resubmitToken = $('#resubmitToken').val();
			$.ajax({
				url:ctx+'Company/savePosition',
				type:'POST',
				data:{
					positionType:positionType,
					jobcate:jobcate,
					positionName:positionName,
					positionThreeType:positionThreeType,
					department:department,
					jobNature:jobNature,
					salaryMin:salaryMin,
					salaryMax:salaryMax,
					workAddress:workAddress,
					workYear:workYear,
					education:education,
					positionAdvantage:positionAdvantage,
					positionDetail:positionDetail,
					positionAddress:positionAddress,
					positionLng:positionLng,
					positionLat:positionLat,
					email:email,
					forwardEmail:forwardEmail,
					id:id,
					companyId:companyId,
					resubmitToken:resubmitToken
				},
				dataType:'json'
			}).done(function(result) {
				if(null != result.resubmitToken && '' != result.resubmitToken){
					$('#resubmitToken').val(result.resubmitToken);
				}
	    		if(result.success){
					console.log(ctx+result.content);
	    			window.location.href=ctx+result.content;
				}else{
					if(result.content != '' && result.content != null){
						window.location.href=ctx+result.content;
					}else{
						$('#beError').html(result.msg).show();	    					
					}
					//$('#beError').html(result.msg).show();	
				}
	        }); 
		}
		else alert("表单验证失败");
	}
});

function checkCity(city){
	var resultVal;
	$.ajax({
		type:'POST',
		async:false,
		url:ctx+"Company/checkCity",
		data:{city:city}
	}).done(function(result){
		result = $.parseJSON( result );
		resultVal = result.success;
	});
	
	return resultVal;
}

/**
 * 函数名：计算字符串长度
 * 函数说明：计算字符串长度，半角长度为1，全角长度为2
 * @param str 字符串
 * @return 字符串长度
 */
function getStrLen(str){
    var len = 0;
    var i;
    var c;
    for (var i=0;i<str.length;i++){
        c = str.charCodeAt(i);
        if (isDbcCase(c)) { //半角
        	len = len + 1;
        } else { //全角
        	len = len + 2;
        }
    }
    return len;
}

/**
 * 函数名：判断字符是全角还是半角
 * 函数说明：判断字符是全角还是半角
 * @param c 字符
 * @return true：半角 false：全角
 */
function isDbcCase(c) {
	// 基本拉丁字母（即键盘上可见的，空格、数字、字母、符号）
	if (c >= 32 && c <= 127) {
    	return true;
	} 
	// 日文半角片假名和符号
	else if (c >= 65377 && c <= 65439) {
		return true;
	}
	return false;
}