$(function(){
	
	/*bindEmail*/
	/**没有进行帐号绑定的时候，如果点击logo离开，出现弹窗**/
	var leaveTip = "";
	var isLeave = true;
	/**判断是否为账号绑定页的提示**/
	var oLeaveFlagType = $("#leaveFlagType");
	if (oLeaveFlagType && oLeaveFlagType.val() == "0") {
	    leaveTip = "你还未完成绑定，确认要离开该页面吗？";
	} else {
	    leaveTip = "内容还未保存，确认离开该页面吗？";
	}
	
	window.onbeforeunload = function() {
	    if (isLeave) {
	        return;
	    } else {
	        return leaveTip;
	    }
	};
	
	var oauthType = $('#oauthType').val();
	var credentialTypeName = getCredentialTypeName(oauthType);
	$('.oauthTypeClass').html(credentialTypeName);
	
	
	/***************************
	 * 注册激活页: 重新发送验证邮件
	 */
	$('#thirdBind_resend').click(function() {
	    var recordCode = $('#recordCode').val();
	    $.ajax({
	        data: {
	            recordCode: recordCode
	        },
	        type: 'POST',
	        url: ctx + '/account/resendBindActive.json'
	    }).done(function(result) {
	        if (result.state == 1) {
	            $.colorbox({
	                inline: true,
	                href: $("#resend_success"),
	                title: "验证邮件发送成功"
	            });
	        } else if(result.state == 401) {
	            alert("该页面已失效，请重新登录后操作");
	        }else {
	        	alert("重发出现异常");
	        }
	    });
	});
	
	$('#confirmLeave').click(function(){
		isLeave = false;
	});
	
	/*判断是否有帐号*/
	$('.user_firstMainContent').css({"padding-bottom":"10px"});
	$('#user_selectAccount form').click(function(){
		var this_form = $(this);
		var _this = this_form.find("label");
		$('#user_selectAccount form').removeClass("user_accountform_active");
		_this.addClass('checked').parent('form').addClass("user_accountform_active");
		_this.addClass('checked').parent('form').siblings('form').children('label').removeClass('checked');		
		_this.siblings('div').slideDown(300);
		this_form.siblings('form').children('div').slideUp(300);
		if(_this.siblings('div:has("ul")').length>0){
			$('.user_warn').hide();
		}else{
			$('.user_warn').show();
		}
	});	
	

	/*解决placeholder和value的颜色问题（默认为一致，需求为不一致）*/
	function placeholderSupportUserBind() {
	    return 'placeholder' in document.createElement('input');
	}
	function placeholderFnUserBindFn(){
		if(!placeholderSupportUserBind()){   
		    $('[placeholder]').focus(function() {
		        var input = $(this);
		        if (input.val() == input.attr('placeholder')) {
		            input.val('');
		            input.removeClass('placeholder');
		            input.css('color','#333');
		        }else{
		        	input.css('color','#333');
		        }
		    }).blur(function() {
		        var input = $(this);
		        if (input.val() == '' || input.val() == input.attr('placeholder')) {
		            input.addClass('placeholder');
		            input.val(input.attr('placeholder'));
		            input.css('color','#999');
		        }
		    }).blur();
		}
		
		 //样式初始化
	    if ($('[placeholder]').value === "") {
	    	$('[placeholder]').value = $('[placeholder]').attr('placeholder'); 
	    }
	}
	placeholderFnUserBindFn();
	/*单选按钮 选择用户类型  招人还是找工作*/
	$('.register_radio li').click(function(){		
		$(this).children('input').attr('checked',true);			
		$(this).siblings().children('input').removeAttr('checked');	
		$(this).addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();	
		$("#user_regBindForm").validate().element($(this).find('input'));		
	});
	/*解决同时出现两个错误提示*/
	$('#user_LoginEmail,#user_hasLoginEmail,#user_hasLoginPassword,#user_LoginPassword').focus(function(){
		$('#noLagouAccount_beError').hide();
		$('#hasLagouAccount_EmailBeError').hide();
		$('#hasLagouAccount_beError').hide();
		$('#hasNoAccount_beError').hide();
	});	
	/*验证绑定帐号表单  已有帐号*/
	
	var password ;
    var SALT = 'veenike';
    
	$('#user_bindForm').validate({
		/*onkeyup: false,
    	focusCleanup:true,*/
    	rules: {
    	   	email: {
    	    	required: true,
    	    	email: true,
    	    	maxlength:100
    	   	},
    	   	password: {
    	    	required: true,
    	    	rangelength: [6,16]
    	   	}
    	},
    	messages: {
    	   	email: {
    	    	required: "请输入登录邮箱地址",
    	    	email: "请输入有效的邮箱地址，如：icebear@icebear.com",
    	    	maxlength:"请输入100字以内的邮箱地址"
    	   	},
    	   	password: {
    	    	required: "请输入密码",
    	    	rangelength: "请输入6-16位密码，字母区分大小写"
    	   	}
    	},
    	errorPlacement:function(label, element){
    		if(element.attr("type") == "radio"){
    			label.insertAfter($(element).parents('ul')).css('marginTop','-20px');
    		}else if(element.attr("type") == "checkbox"){
    			label.insertAfter($(element).parent()).css('clear','left');
    			$('#user_saveRegAccount').css('margin-top','20px');
    		}else{
    			label.insertAfter(element);
    		};		    		   		
    	},
    	submitHandler:function(form){
    		isLeave = true;
    		var email = $('#user_hasLoginEmail').val();    		 
    		//var password = $('#user_hasLoginPassword').val();
    		password = $('#user_hasLoginPassword').val();
            //password = md5(password);
	        //password = md5(SALT + password + SALT);
            
    		var oauthType = $('#oauthType').val();
    		var token = $('#token').val();
    		var type=$('#user_HasAccount').attr('value');//默认  0新帐号   1 已有帐号 null当做0	
    		var idCode = $('#idCode').val();   
    		$(form).find(":submit").attr("disabled", true);
    		$.ajax({
    			type:'post',
    			data:{idCode:idCode,
    				  type:type,
    				  confirm:false,
    				  email:email,
    				  password:password,
    				  token:token,
    				  oauthType:oauthType}, //1 是新增 0：旧的
    			url:ctx+'/account/bindOldEmail.json',	    
    			dataType:'json',
    			success:function(result){
    				if(result.state == 1){
    					window.location.href = result.content.data.url;
    				}else if(result.state == 241){
						$('#hasLagouAccount_beError').text('请输入常用邮箱地址').show();
					}else if(result.state == 211){
						$('#hasLagouAccount_beError').text('请输入100字以内的邮箱地址').show();
					}else if(result.state == 221){
						$('#hasLagouAccount_beError').text('请输入有效的邮箱地址，如：vivi@lagou.com').show();
					}else if(result.state == 242){
						$('#hasLagouAccount_beError').text('请输入密码').show();
					}else if(result.state == 212){
						$('#hasLagouAccount_beError').text('请输入6-16位密码，字母区分大小写').show();
					}else if(result.state == 243){
						$('#hasLagouAccount_beError').text('参数错误').show();
					}else if(result.state == 401){
						$('#hasLagouAccount_beError').text('你已经绑定过邮箱账号，不可重复绑定').show();
					}else if(result.state == 402){
						$('#hasLagouAccount_beError').text('密码错误，请重新输入').show();
					}else if(result.state == 403){
						var authInfo = result.content.data.authInfo;
						var credentialTypeName = getCredentialTypeName(authInfo.oauthType);
						var nikeName = authInfo.nikeName;
						$('#accountLogout').hide();
						$('#accountBindType').html('邮箱');
    					$('#user_hasBindAccount').html(email+"帐号已绑定到"+credentialTypeName+"@"+nikeName+"，无法继续绑定");
    					$('#user_loginCurrentAccount').html("登录"+email+"，进入“帐号设置”解除绑定");
    					$('#user_confirmBindTips').html('换个邮箱绑定');
    					$.colorbox({inline:true, href:$("#bindTips"),title:"帐号绑定"});
    					$('#user_confirmBindTips').on('click',function(){
    						isLeave = true;
    						$.colorbox.close();
    						parent.jQuery.colorbox.close();
    					});	    		
					}else if(result.state == 404){
						$('#hasLagouAccount_EmailBeError').html("该帐号未注册，请重新输入或选择“没有拉勾帐号”进行注册").show(); 
					}else if(result.state == 405){// 
						$('#accountLogout').hide();
						$('#accountBindType').html('邮箱');
    					$('#user_hasBindAccount').html(email+"帐号已在拉勾网生成信息，继续绑定会发生信息冲突");
    					$('#user_loginCurrentAccount').html("登录"+email+"，进入“帐号设置”解除绑定");
    					$('#user_confirmBindTips').html('换个邮箱绑定');
    					$.colorbox({inline:true, href:$("#bindTips"),title:"帐号绑定"});
    					$('#user_confirmBindTips').on('click',function(){
    						isLeave = true;
    						$.colorbox.close();
    						parent.jQuery.colorbox.close();
    					});	    
					}else if(result.state == 406){
						$('#hasLagouAccount_beError').html("该页面已失效，请重新登录后操作").show(); 
					}else{
						$('#hasLagouAccount_beError').text('绑定失败').show();
					}
    				$(form).find(":submit").attr("disabled", false);
    			},
    			error:function(){
    				$(form).find(":submit").attr("disabled", false);
    			}			
    		});    		
        }  
	});	

	/*返回修改按钮*/
	$('.user_backReplace').on('click',function(){					
		$.colorbox({inline:true, href:$("#bindReplace"),title:"帐号绑定"});
	});	
	
	/*注册拉勾帐号的表单验证  新帐号*/	
	
	$("#user_regBindForm").validate({  
		rules: {
        	type:{
        		required: true
        	},
	   	   	email: {
	   	    	required: true,
	   	    	email: true,
	   	    	maxlength:100
	   	   	},
	   	   	password: {
	   	    	required: true,
	   	    	rangelength: [6,16]
	   	   	},
	   	   	checkbox:{required:true}
    	},
    	messages: {
    		type:{
        		required:"请选择使用拉勾的目的"
        	},
    	 	email: {
    	    	required: "请输入常用邮箱地址",
    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com",
    	    	maxlength:"请输入100字以内的邮箱地址"
    	   	},
    	   	password: {
    	    	required: "请输入密码",
    	    	rangelength: "请输入6-16位密码，字母区分大小写"
    	   	},
    	   	checkbox: {
    	    	required: "请接受拉勾用户协议"
    	   	}
    	},
    	errorPlacement:function(label, element){
    		if(element.attr("type") == "radio"){console.log(label);
    			label.insertAfter($(element).parents('ul')).css('marginTop','-20px');
    			label.css('marginTop','0px');
				$('.user_registerRadio').css({'margin-top':'-5px','margin-bottom':'5px;'});
				$('.agreeNotice').css('margin-top','14px');
    		}else if(element.attr("type") == "checkbox"){
    			label.insertAfter($(element).parent()).css('clear','left');
    			$('#user_saveRegAccount').css('margin-top','20px');
    		}else{
    			label.insertAfter(element);
    		};	   		
    	},
    	submitHandler:function(form){ 
    		var userType='';
    		var email = $('#user_LoginEmail').val();    		 
    		var password = $('#user_LoginPassword').val();

	        //password = md5(password);
	        //password = md5(SALT + password + SALT);
	        
    		var oauthType = $('#oauthType').val();
    		var token = $('#token').val();
    		var type=$('#user_NoAccount').attr('value');//默认  0新帐号   1 已有帐号 null当做0	
    		/*var userType = $('.register_radio li.current input').val();*///0-个人用户 1-企业用户  null-未选择
    		var showCheckBox = $('#showCheckBox').val();//alert(showCheckBox);
    		if(showCheckBox=='true'){
    			userType = $('.register_radio li.current input').val();
			}else{
				userType = $('#userType').val();
			}
    		$(form).find(":submit").attr("disabled", true);
    		$.ajax({
    			type:'post',
    			data:{type:type,
    				  userType:userType,
    				  email:email,
    				  password:password,
    				  token:token,
    				  oauthType:oauthType},
    			url:ctx+'/account/bindNewEmail.json',	   
    			dataType:'json',
    			success:function(result){
    				if(result.state == 1){
    					window.location.href = result.content.data.url;
    				}else if(result.state == 241){
						$('#noLagouAccount_beError').text('请输入常用邮箱地址').show();
					}else if(result.state == 211){
						$('#noLagouAccount_beError').text('请输入100字以内的邮箱地址').show();
					}else if(result.state == 221){
						$('#noLagouAccount_beError').text('请输入有效的邮箱地址，如：vivi@lagou.com').show();
					}else if(result.state == 242){
						$('#noLagouAccount_beError').text('请输入密码').show();
					}else if(result.state == 212){
						$('#noLagouAccount_beError').text('请输入6-16位密码，字母区分大小写').show();
					}else if(result.state == 243){
						$('#noLagouAccount_beError').text('请选择使用拉勾的目的').show();
					}else if(result.state == 244){
						$('#hasLagouAccount_beError').text('参数错误').show();
					}else if(result.state == 401){
						$('#noLagouAccount_beError').text('该邮箱已被注册，请重新输入或选择“已有帐号”进行绑定').show();
					}else if(result.state == 402){
						$('#noLagouAccount_beError').text('你已经绑定过邮箱账号，不可重复绑定').show();
					}else if(result.state == 403){
						$('#noLagouAccount_beError').text('注册邮箱用户失败').show();
					}else if(result.state == 404){
						$('#noLagouAccount_beError').text('该页面已失效，请重新登录后操作').show();
					}else{
						$('#noLagouAccount_beError').text('绑定失败').show();
					}
    				$(form).find(":submit").attr("disabled", false);
    			},
    			error:function(){
    				$(form).find(":submit").attr("disabled", false);
    			}			
    		});    
    	}
	});
	
	/*** accountBind.html | wrote by vee ***/
	/*弹出确认取消绑定弹窗 */
	$('#cancelQQ').click(function(){
		$.colorbox({inline:true, href:$("#confirmUnbindQQ"),title:"帐号绑定"});		
	});
	/*弹出确认取消绑定弹窗 */
	$('#cancleSina').click(function(){
		$.colorbox({inline:true, href:$("#confirmUnbindSina"),title:"帐号绑定"});
	});
	/*弹出确认取消绑定弹窗 */
	$('#cancleWeixin').click(function(){
		$.colorbox({inline:true, href:$("#confirmUnbindWeixin"),title:"帐号绑定"});
	});
	
	/*弹出确认取消绑定qq弹窗后的确定按钮*/
	$('#user_confirmUnbindQQ').click(function(){
		window.location.href=ctx+'/account/unbindOAuthAccount.html?oauthType=AUTH_TYPE_QQ_WEB';
	});
	/*弹出确认取消绑定微博弹窗后的确定按钮*/
	$('#user_confirmUnbindSina').click(function(){
		window.location.href=ctx+'/account/unbindOAuthAccount.html?oauthType=AUTH_TYPE_WEIBO_WEB';
	});
	/*弹出确认取消绑定微信弹窗后的确定按钮*/
	$('#user_confirmUnbindWeixin').click(function(){
		window.location.href=ctx+'/account/unbindOAuthAccount.html?oauthType=AUTH_TYPE_WEIXIN_UNIONID';
	});
	
	
	/*确认取消绑定的取消按钮，无刷新，直接关闭弹窗*/
	$('#confirmUnbindQQ .cancel,#confirmUnbindSina .cancel,#confirmUnbindWeixin .cancel, #confirm_unbindService .cancel').click(function(){
		$.colorbox.close();
		parent.jQuery.colorbox.close();
	});
	
	$('#bindTips .btn,#bindTips .cancel').bind('click',function(){
		$.colorbox.close();
		parent.jQuery.colorbox.close();
	});
	$('#bindReplace .cancel').bind('click',function(){
		$('#chooseRemainError').html('请选择需要保留的帐号').hide();    
		$.colorbox.close();
		parent.jQuery.colorbox.close();
	});

	
	/**修改密码页面出现的两个错误提示bug 只有Chrome ff**/
	
	//修改密码页面
	$('#oldpassword').focus(function(){
		$('#updatePwd_beError').hide();
	});
	$('#updatePswForm').validate({
        rules: {
        	// oldpassword: {
        	// 	required:true,
    	    // 	rangelength: [6,16]
    	   	// }, 
    	   	// newpassword: {
    	   	// 	required: true,
    	    // 	rangelength: [6,16]
    	   	// },
    	   	comfirmpassword: {
    	   		required: true,
    	   	    equalTo: "#newpassword"
    	   	}
    	},
    	messages: {
        	// oldpassword: {
        	// 	required:"请输入当前密码",
    	    // 	rangelength: "请输入6-16位密码，字母区分大小写"
    	   	// }, 
    	   	// newpassword: {
    	   	// 	required: "请输入新密码",
    	    // 	rangelength: "请输入6-16位密码，字母区分大小写"
    	   	// },
    	   	comfirmpassword: {
    	   		required: "请再次输入新密码",
    	    	equalTo: "两次输入的密码不一致，请重新输入"
    	   	}
    	},
    	submitHandler:function(form){
    		var oldpassword = $('#oldpassword').val();
    		var newpassword = $('#newpassword').val();
    		//var comfirmpassword = $('#comfirmpassword').val();
    		//oldpassword = md5(oldpassword);
	        //oldpassword = md5(SALT + oldpassword + SALT);
	        //newpassword = md5(newpassword);
	        //newpassword = md5(SALT + newpassword + SALT);
	        //comfirmpassword = md5(comfirmpassword);
	        //comfirmpassword = md5(SALT + comfirmpassword + SALT);

    		$.ajax({
    			url:ctx+'User/updatePwd',
    			type:'POST',
    			data:{
    				oldPassword:oldpassword,
    				newPassword:newpassword,
    				//newPassword2:comfirmpassword
    			},
            	dataType:'json'
    		}).done(function(result){
    			if (result.state == 1) {
    				$.colorbox({inline:true, href:$("#updatePassword"),title:"修改密码成功"});
    				setCountdown(4,'updatePassword h4 span',ctx+"User/logout");	//调用倒计时
                } else if (result.state == 203) {
                    $('#updatePwd_beError').text('密码不正确请重新输入').show();
                } else if (result.state == 204) {
                    $('#updatePwd_beError').text('重复密码不一致').show();
                } else if (result.state == 205) {
                	$('#updatePwd_beError').text('登录超时，请重新登录').show();
                }else if (result.state == 500) {
                	 $('#updatePwd_beError').text('网络异常，请刷新重试').show();
                }
    		});
        }  
    });
	
	$('.user_confirmDel').click(function(){
		$.colorbox({inline:true, href:$("#confirm_unbindService"),title:"解除招聘服务"});
	});
	$('#confirm_unbind').click(function(){
		$.ajax({
			url:ctx+'/user/closeService.json',
			type:'POST',
			dataType:'json'
		}).done(function(result){
			if(result.success){
				$.colorbox({inline:true, href:$("#unbindService"),title:"解除招聘服务"});
				setCountdown(4,'unbindService h4 span',ctx+"/corpCenter/bindStep1.html");	//调用倒计时
			}else{
				alert(result.msg);
			}
		});
	});
	//点击登录邮箱跳到另外页面，并且关闭弹窗
	$('#resend_success .btn_s').click(function(){
		$.colorbox.close();
	});
});

function setCountdown(time,id,url){
	var count = setTimeout(function(){$("#"+id).html(time);setCountdown(time-1,id,url)},1000);
	if(time==0){
		clearTimeout(count);
		top.location.href=url;
	}
}
function getCredentialTypeName(credentialType){
	if(credentialType == "AUTH_TYPE_EMAIL_PASSWORD" ){
		return "邮箱";
	}else if(credentialType == "AUTH_TYPE_QQ_WEB"){
		return "QQ";
	}else if(credentialType == "AUTH_TYPE_WEIBO_WEB"){
		return "新浪微博";
	}else if(credentialType == "AUTH_TYPE_WEIXIN_UNIONID"){
		return "微信";
	}
	return credentialType;
}

