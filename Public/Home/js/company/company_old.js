$(function(){
	//统计到职位详情的来源脚本 add by Vee ｜2014-7-3
//	$('#jobList a').click(function(e){
//		e.preventDefault();
//		var href=$(this).attr("href");
//		window.location.href=href+"?source=company"; //公司详情页
//	});
	//end
	//要过期职位提示
   	$('.tipExpire .expire_close').bind('click',function(){
   		var count = $.cookie('showExpriedCompanyHome');
   		$.cookie('showExpriedCompanyHome',count-1);
   		$(this).parent('.tipExpire').hide();
   	});
   	
	/**************************************************************************
	 * B & C 端 公司详情页
	 * 
 	 * 取消编辑公司标签
 	 */
   	
 	//$.cookie('labels', $('#hasLabels').html());
   	/*nancy add companyLabels*/
 	var companyLabels = $('#hasLabels').html();
	$('#cancelLabels').click(function(){
		/*add nancy*/
		$('#label').val('');
		$('#addLabels').hide();
		$('.c_box h3').hide();
		$('#hasLabels li').each(function(){
			$(this).find('i').remove();
		});
		$('#hasLabels').on('mouseenter','li',function(){
			$(this).css({marginRight:'18px',cursor:'default'});
		});
		$('#hasLabels').append('<li class="link">编辑</li>');
		$('#hasLabels').empty().append(companyLabels);
		$(this).parents('.c_detail').removeClass('c_detail_bg');
	});
	/***************************
 	 * 保存编辑公司标签
 	 */
	$('#saveLabels').click(function(){
		/**add nancy**/
		if($.trim($('#label')).length!==0){$('#label').val('');}
		/**end nancy**/
		var labels = [];
		var _this = $(this);
		$('#hasLabels li').each(function(){
			labels.push($(this).children('span').text());
		});
		var companyId = $('#companyId').val();
		$.ajax({
        	type:'POST',
        	data: {companyId:companyId,labels:labels.join()},
        	url:ctx+'Company/saveTag'
        }).done(function(result) {
        	result = $.parseJSON( result );
        	if(result.success){
        		$('#addLabels').hide();
        		$('.c_box h3').hide();
        		$('#hasLabels li').each(function(){
        			$(this).find('i').remove();
        		});
        		$('#hasLabels').on('mouseenter','li',function(){
        			$(this).css({marginRight:'18px',cursor:'default'});
        		});
        		$('#hasLabels').append('<li class="link">编辑</li>');
        		companyLabels = $('#hasLabels').html();
        		_this.parents('.c_detail').removeClass('c_detail_bg');
       		}else{
				alert("保存失败");
        	}
        });
	});
	/***************************
 	 * 编辑标签
 	 */
	$('#hasLabels').on('click','.link',function(){
		/**add nancy**/
		//判断IE浏览器版本
		if(navigator.userAgent.indexOf("MSIE")>0)  
		{   		     
		    if(navigator.userAgent.indexOf("MSIE 7.0")>0 || navigator.userAgent.indexOf("MSIE 8.0")>0 || navigator.userAgent.indexOf("MSIE 9.0")>0 )  
		    {  
		    	var placeholder = $('#label').attr('placeholder');
				$('#label').val(placeholder).css('color','#777777');
		    }   		    
		}
		
		$('#changeLabels').trigger('click');
		$('.c_detail').addClass('c_detail_bg');
		$('#addLabels').show();
		$('.c_box h3').show();
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

	/***************************
 	 * 删标签
 	 */
	$('#hasLabels').on('click','li i',function(){
		$(this).parent().remove();
		/*var labelVal = $(this).prev('span').text();
		var _this = $(this);
		var companyId = $('#companyId').val();
		$.ajax({
			type:'post',
			url: ctx+'/companyLabel/removeOneLabelToCompany.json',
			data:{companyId:companyId,label:labelVal},
			dataType: 'json'
		}).success(function (result) {
			if(result.success){
				_this.parent().remove();
			}else{
				alert(result.msg);
			}
		});*/
	});
	
	/***************************
 	 * 选标签
 	 */
	$('#addLabels ul').on('click','li',function(){
		/*if(!$(this).hasClass('curr')){
			$(this).addClass('curr');
			var labelVal = $(this).text();
			var judge = true;
			$('#hasLabels li').each(function(){
				if($(this).children('span').text() == labelVal){
					alert("此标签已存在，请重新输入");
					judge = false;
				}
			});
			if(judge){
				$('#hasLabels').append('<li><span>'+labelVal+'</span><i>x</i></li>');
			}
		}*/
		/**add nancy**/
		var judge = true;
		var labelVal = $(this).text();
		if(!$(this).hasClass('curr')){
			$(this).addClass('curr');
			$('#hasLabels li').each(function(){
				if($(this).children('span').text() == labelVal){
					judge = false;
					return judge;
				}
			});
		}else{
			$('#hasLabels li').each(function(){
				if($(this).children('span').text() == labelVal){
					judge = false;
					return judge;
				}
			});			
		}
		if(judge){
			$('#hasLabels').append('<li><span>'+labelVal+'</span><i>x</i></li>');
		}else{
			alert("此标签已存在，请重新输入");
		}
		/**end nancy**/
	});
	
	/***************************
 	 * 贴标签
 	 */
	$('#add_label').bind('click',function(){
		var _label = $('#label');
		var labelVal = $.trim(_label.val());
		var judge = true;
		if( labelVal.length<=6 && labelVal.length > 0){
			$('#hasLabels li').each(function(){
				if($('span',this).text() == labelVal){
					judge = false;
				}
			});
			if(judge){
				$('#hasLabels').append('<li><span>'+labelVal+'</span><i>x</i></li>');
			}else{
				alert('此标签已存在，请重新输入');
			}
			_label.val('');
		}else{
			alert("请输入1-6字的自定义标签");
			/*alert("请输入1-6个字的公司标签");*/
		}
	});
	
	/***************************
 	 * enter键贴标签
 	 */
	$('#label').keydown(function(e){
		if(e.which == 13){
			$('#add_label').trigger('click');
		}
	});
	
	/***************************
	* 标签换一换
	*/
	var pageNo = 1;
	$('#changeLabels').click(function(){
		
		$.ajax({
        	type:'POST',
        	url:ctx+'Company/changeLabels',
        	data: {pageNo:pageNo,pageSize:12}
        }).done(function(result) {
			
        	if(result !=''){result = $.parseJSON( result );
        		var str = '';
        		for(var label in result.content){
					str += '<li>'+result.content[label]+'</li>';
        		};
        		$('#addLabels ul').html(str);
				
       		}else{
				alert("保存失败");
        	}
        }); 
		//alert('2222');
		pageNo++;
	}); //end #changeLabels
	
	
	/***************************
	 * 公司产品展示滚动条样式
	 */
	$('.scroll-pane').jScrollPane();
	
	
	/***************************
	 * B 端 公司详情页 可编辑
	 * 
 	* 添加创始人
 	* 编辑创始人
 	* 删除创始人
 	*/
	$('#Member').on("click",".c_add", function(){
		if($("#Member .member_wrap").length<3){
			var memberWrap = $(this).parents('#Member').find(".member_wrap").first().clone();
			
			$(".member_info:nth-child(1)",memberWrap).addClass("dn");
			$(".member_info:nth-child(2) input[type!='submit'],.member_info:nth-child(2) textarea",memberWrap).val("");
			$(".member_info:nth-child(2) .word_count",memberWrap).children('span').text(500);
			$(".member_info:nth-child(2) img",memberWrap).attr("src","");
			$(".member_info:nth-child(2) .portraitShow",memberWrap).hide();
			$(".member_info:nth-child(2) .portraitNo",memberWrap).show();
			$(".member_info:nth-child(2)",memberWrap).removeClass("dn");
			$(".member_info:nth-child(3)",memberWrap).addClass("dn");
			$(memberWrap).appendTo("#Member dd");
			
			$("#Member .member_wrap").each(function(i){
				$(this).find("input[type='file']").attr("id","profiles"+i);
			});
		}
		
		if($("#Member .member_wrap").length>=3){
			$("#Member .c_add").hide();
		}

		$('.memberForm', memberWrap).validate({
			//onkeyup: false,
	    	//focusCleanup:true,
	    	//onfocusout:false,
			//onsubmit:true,
	        rules: {
	        	myfiles: {
	        		required: false
	    	   	},
	        	name:{
	        		required: false,
	        		specialchar:true,
	        		checkNum:true,
	        		rangeLenStr:[1,10]
	        	},
	        	position:{
	        		required:false,
	        		specialchar: true,
	    	    	checkNum:true,
	        		maxlenStr:30
	        	},
	    	   	weibo: {
	    	   		required:false,
	    	   		checkUrlNot:true,
	    	    	maxlength:80
	    	   	},
	    	   	remark: {
	    	   		/*required:false,
	    	    	minlength: 10,
	    	    	maxlength:500*/
	    	   		required: false,
	    	   		checkNum: true,
	    	   		rangeLenStr:[10,500]
	    	   	}
	        },
	    	messages: {
	    		name:{
	    			specialchar:"请输入真实的创始人姓名",
	        		checkNum:"请输入真实的创始人姓名",
	        		rangeLenStr:"请输入真实的创始人姓名"
	    		},
	    		position:{
	    			specialchar: "请输入真实的当前职位",
	    	    	checkNum:"请输入真实的当前职位",
	        		maxlenStr:"请输入真实的当前职位"
	    		},
	    		weibo: {
	    			checkUrlNot:"请输入真实的新浪微博地址",
	    	    	maxlength:"请输入80字符以内的网址"
	    	   	},
	    	   	remark: {
	    	    	/*minlength:"请输入10-500字的个人简介",
	    	    	maxlength:"请输入10-500字的个人简介"*/
	    	   		checkNum: "请输入有效的个人简介",
	    	   		rangeLenStr:"请输入10-500字的个人简介"
	    	   	}
	    	},
	   	   	submitHandler:function(form){
	   	   		var companyId = $('#companyId').val();
	   	   		var leaderId = $('.leader_id',form).val();
	   	   		var photo = $('.leaderInfos',form).val();
	   	   		var name = $('input[name="name"]', form).val() != '请输入创始人姓名' ? $('input[name="name"]', form).val() : '';
	   	   		var position = $('input[name="position"]', form).val() != '请输入创始人当前职位' ? $('input[name="position"]', form).val() : '';
	   	   		var weibo = $.trim($('input[name="weibo"]', form).val()) != '请输入创始人新浪微博地址' ? $.trim($('input[name="weibo"]', form).val()) : '';
		   	 	if(weibo != '' && weibo.substring(0,7) != 'http://'){
		   	   		weibo = 'http://' + weibo;
				}
	   	   		var remark = $('textarea[name="remark"]', form).val() != '请输入创始人个人简介' ? $('textarea[name="remark"]', form).val() : '';
	   	   		var resubmitToken = $('#resubmitToken').val();
	   	   		memberWrap = $(form).parents(".member_wrap");
	   	   		$(form).find(":submit").attr("disabled", true);
	    		$.ajax({
	            	type:'POST',
	            	url:ctx+'Company/saveLeaderInfo',
	            	data:{
	            		companyId:companyId,
						id:leaderId,
	            		photo:photo,
	            		name:name,
	            		position:position,
	            		weibo:weibo,
	            		remark:remark,
	            		resubmitToken:resubmitToken
	            	},
	            	dataType:'json'
	            }).success(function(result) {
            		if(null != result.resubmitToken && '' != result.resubmitToken){
	            		$('#resubmitToken').val(result.resubmitToken);
	            	}
	            	if(result.success){
	        			$(".member_info:nth-child(1)",memberWrap).addClass("dn");
	        			
	        			$(".member_info:nth-child(2)",memberWrap).addClass("dn");
		        		$(".member_info:nth-child(2) .leader_id",memberWrap).val(result.content.id);
	        			
	            		$(".member_info:nth-child(3) img",memberWrap).attr("src",ctx+'/'+result.content.photo);
	            		if(result.content.weibo != ''){
	            			$(".member_info:nth-child(3) .m_name",memberWrap).html(result.content.name+'<a href="'+result.content.weibo+'" class="weibo" target="_blank"></a>');
	            		}else{
	            			$(".member_info:nth-child(3) .m_name",memberWrap).html(result.content.name);
	            		}
	            		$(".member_info:nth-child(3) .m_position",memberWrap).html(result.content.position);
	            		$(".member_info:nth-child(3) .m_intro",memberWrap).html(result.content.remark);
	            		$(".member_info:nth-child(3)",memberWrap).removeClass("dn");
	            		if($("#Member .member_wrap").length>=3){
	            			$("#Member .c_add").hide();
	            		}else{
	            			$("#Member .c_add").show();
	            		}
	            	}else{
	            		if($('.member_wrap').length == 1){
	            			$(".member_info:nth-child(1)",memberWrap).removeClass("dn");
	            			$(".member_info:nth-child(2)",memberWrap).addClass("dn");
	            			$(".member_info:nth-child(2) input[type!='submit'], .member_info:nth-child(2) textarea",memberWrap).val("");
	            			$(".member_info:nth-child(3)",memberWrap).addClass("dn");
	            			$("#Member .c_add").hide();
	            		}else{
	            			$(memberWrap).remove();
	            			$("#Member .c_add").show();
	            		}
		    		}
	            	$(form).find(":submit").attr("disabled", false);
	            });
	    	}
	    });
	});
	
	$('#Member').on("click",".member_edit", function(){
		//add nancy
		$('.newMember .memberForm span.error').hide();
		//end nancy
		var memberWrap = $(this).parents(".member_wrap");
		var m_intro = $(".member_info:nth-child(3) .m_intro",memberWrap).html();
		if(m_intro){
			m_intro =  $.trim(m_intro.replace(/<br>/gi,''));
		}
		$('#Member .c_section .c_add').removeClass('dn');
		$(".member_info:nth-child(2) textarea",memberWrap).val(m_intro);
		$(".member_info:nth-child(2) .word_count",memberWrap).children('span').text(500-$(".member_info:nth-child(2) textarea",memberWrap).val().length);
		$(".member_info:nth-child(2)",memberWrap).removeClass("dn");
		$(".member_info2:nth-child(1)",memberWrap).addClass("dn");
		$(".member_info:nth-child(3)",memberWrap).addClass("dn");
	});
	
/*	$('#Member .c_section .member_edit').bind('click',function(){
		//$(this).parent('.reported_info').addClass('dn');
		$('#Member .c_section .c_add').removeClass('dn');
		Report.addReport();
	});*/
	
	$('#Member').on("click",".member_delete", function(){
		if(confirm('确定要删除该创始人吗？')){
			var leaderId = $(this).next().val();
			var memberWrap = $(this).parents(".member_wrap");
			if(leaderId==""){
				if($("#Member .member_wrap").length<=1){
					$(".member_info:nth-child(1)",memberWrap).removeClass("dn");
					$(".member_info:nth-child(2)",memberWrap).addClass("dn");
					$(".member_info:nth-child(2) input[type!='submit'], .member_info:nth-child(2) textarea",memberWrap).val("");
					$(".member_info:nth-child(2) img",memberWrap).attr("src","");
					$(".member_info:nth-child(2) .portraitShow",memberWrap).hide();
					$(".member_info:nth-child(2) .portraitNo",memberWrap).show();
					$(".member_info:nth-child(3)",memberWrap).addClass("dn");
					$("#Member .c_add").hide();
				}else{
					$(memberWrap).remove();
					$("#Member .c_add").show();
				}
			}else{
				$.ajax({
		        	type:'POST',
		        	url:ctx+'/cl/delLeaderInfo.json',
		        	data:{
		        		leaderId:leaderId
		        	},
		        	dataType:'json'
		        }).success(function(result) {
		    		if($("#Member .member_wrap").length<=1){
		    			$(".member_info:nth-child(1)",memberWrap).removeClass("dn");
		    			$(".member_info:nth-child(2)",memberWrap).addClass("dn");
		    			$(".member_info:nth-child(2) input[type!='submit'], .member_info:nth-child(2) textarea",memberWrap).val("");
		    			$(".member_info:nth-child(2) img",memberWrap).attr("src","");
						$(".member_info:nth-child(2) .portraitShow",memberWrap).hide();
						$(".member_info:nth-child(2) .portraitNo",memberWrap).show();
		    			$(".member_info:nth-child(3)",memberWrap).addClass("dn");
						$("#Member .c_add").hide();
		    		}else{
		    			$(memberWrap).remove();
						$("#Member .c_add").show();
		    		}
	
		    		$("#Member .member_wrap").each(function(i){
						$(this).find("input[type='file']").attr("id","profiles"+i);
					});
		    		
		        });
			}
		}	
	}); 
	
	//countdown
	/*$('#Member .memberForm').on('keyup','.s_textarea',function(){*/
	/**edit nancy**/
	$('#Member').on('keyup','.memberForm .s_textarea',function(){
		//textCounter('productProfile', '', 500);
		 var field = $(this);
		 /*if (field.val().length > 500) {
			 field.val(field.val().substring(0, 500));
		 } else {
			 field.next('.word_count').children('span').text(500 - field.val().length);
		 }*/
		 /**add nancy**/
		 var len = $.trim(field.val()).length;
		if (len > 500) {
			 field.val(field.val().substring(0, 500));
		 }else if($(this).siblings('span').length>0 &&( len>10 || len==10)){
			 $(this).siblings('span').hide();
		 }else if($(this).siblings('span').length>0 && len <10 ){
			 $(this).siblings('span').show();
		 }else{
			 field.next('.word_count').children('span').text(500 - len);
		 }
		 /**end nancy**/
	});
	
	/***************************
 	* 添加创始人验证
 	*/
 	$('.memberForm').each(function(){
 		
	 	$(this).validate({
	 		onkeyup: false,
	    	//focusCleanup:true,
	 		 /*rules: {
	 			myfiles: {
	        		required: false
	    	   	},
	    	   	name:{
	        		required:false
	        	},
	        	position:{
	        		required:false
	        	},
	    	   	weibo: {
	    	   		required:false,
	    	   		checkUrlNot:true,
	    	    	maxlength:80
	    	   	},
	    	   	remark: {
	    	   		required:false,
	    	    	minlength: 10,
	    	    	maxlength:500
	    	   	}
	         },
	     	messages: {
	     		weibo: {
	     			checkUrlNot:"请输入真实的新浪微博地址",
	    	    	maxlength:"请输入80字符以内的网址"
	     	   	},
	     	   	remark: {
	     	    	minlength:"请输入10-500字的个人简介",
	     	    	maxlength:"请输入10-500字的个人简介"
	     	   	}
	     	}*/
	 		rules: {
	        	myfiles: {
	        		required: false
	    	   	},
	        	name:{
	        		/*required:false*/
	        		required: false,
	        		specialchar:true,
	        		checkNum:true,
	        		maxlenStr:10
	        	},
	        	position:{
	        		required:false,
	        		specialchar: true,
	    	    	checkNum:true,
	        		maxlenStr:30
	        	},
	    	   	weibo: {
	    	   		required:false,
	    	   		checkUrlNot:true,
	    	    	maxlength:80
	    	   	},
	    	   	remark: {
	    	   		/*required:false,
	    	    	minlength: 10,
	    	    	maxlength:500*/
	    	   		required: false,
	    	   		checkNum: true,
	    	   		maxlenStr:500
	    	   	}
	        },
	    	messages: {
	    		name:{
	    			specialchar:"请输入真实的创始人姓名",
	        		checkNum:"请输入真实的创始人姓名",
	        		maxlenStr:"请输入真实的创始人姓名"
	    		},
	    		position:{
	    			specialchar: "请输入真实的当前职位",
	    	    	checkNum:"请输入真实的当前职位",
	        		maxlenStr:"请输入真实的当前职位"
	    		},
	    		weibo: {
	    			checkUrlNot:"请输入真实的新浪微博地址",
	    	    	maxlength:"请输入80字符以内的网址"
	    	   	},
	    	   	remark: {
	    	    	/*minlength:"请输入10-500字的个人简介",
	    	    	maxlength:"请输入10-500字的个人简介"*/
	    	   		checkNum: "请输入有效的个人简介",
	    	   		maxlenStr:"请输入10-500字的个人简介"
	    	   	}
	    	},
	    	submitHandler:function(form){
	   	   		var companyId = $('#companyId').val();
	   	   		var leaderId = $('.leader_id',form).val();
	   	   		var photo = $('.leaderInfos',form).val();
	   	   		var name = $('input[name="name"]', form).val() != '请输入创始人姓名' ? $('input[name="name"]', form).val() : '';
	   	   		var position = $('input[name="position"]', form).val() != '请输入创始人当前职位' ? $('input[name="position"]', form).val() : '';
	   	   		var weibo = $.trim($('input[name="weibo"]', form).val()) != '请输入创始人新浪微博地址' ? $.trim($('input[name="weibo"]', form).val()) : '';
		   	 	if(weibo != '' && weibo.substring(0,7) != 'http://'){
		   	   		weibo = 'http://' + weibo;
				}
	   	   		var remark = $('textarea[name="remark"]', form).val() != '请输入创始人个人简介' ? $('textarea[name="remark"]', form).val() : '';
	   	   		var memberWrap = $(form).parents(".member_wrap");
	   	   		var resubmitToken = $('#resubmitToken').val();
	   	   		$(form).find(":submit").attr("disabled", true);
	    		$.ajax({
	            	type:'POST',
	            	url:ctx+'Company/saveLeaderInfo',
	            	data:{
	            		companyId:companyId,
	    				id:leaderId,
	            		photo:photo,
	            		name:name,
	            		position:position,
	            		weibo:weibo,
	            		remark:remark,
	            		resubmitToken:resubmitToken
	            	},
	            	dataType:'json'
	            }).success(function(result) {
            		if(null != result.resubmitToken && '' != result.resubmitToken){
	            		$('#resubmitToken').val(result.resubmitToken);
	            	}
	            	if(result.success){
	        			$(".member_info:nth-child(1)",memberWrap).addClass("dn");
	        			
	        			$(".member_info:nth-child(2)",memberWrap).addClass("dn");
		        		$(".member_info:nth-child(2) .leader_id",memberWrap).val(result.content.id);
	        			
	            		$(".member_info:nth-child(3) img",memberWrap).attr("src",ctx+'/'+result.content.photo);
	            		if(result.content.weibo != ''){
	            			$(".member_info:nth-child(3) .m_name",memberWrap).html(result.content.name+'<a href="'+result.content.weibo+'" class="weibo" target="_blank"></a>');
	            		}else{
	            			$(".member_info:nth-child(3) .m_name",memberWrap).html(result.content.name);
	            		}
	            		$(".member_info:nth-child(3) .m_position",memberWrap).html(result.content.position);
	            		$(".member_info:nth-child(3) .m_intro",memberWrap).html(result.content.remark);
	            		$(".member_info:nth-child(3)",memberWrap).removeClass("dn");
	            		if($("#Member .member_wrap").length>=3){
		            		$("#Member .c_add").hide();
	            		}else{
	            			$("#Member .c_add").show();
	            		}
	            	}else{
	            		if($('.member_wrap').length == 1){
	            			$(".member_info:nth-child(1)",memberWrap).removeClass("dn");
	            			$(".member_info:nth-child(2)",memberWrap).addClass("dn");
	            			$(".member_info:nth-child(2) input[type!='submit'], .member_info:nth-child(2) textarea",memberWrap).val("");
	            			$(".member_info:nth-child(3)",memberWrap).addClass("dn");
	            			$("#Member .c_add").hide();
	            		}else{
	            			$(memberWrap).remove();
	            			$("#Member .c_add").show();
	            		}
	            	}
	            	$(form).find(":submit").attr("disabled", false);
	            });
	    	}
	    });

 	}); 
	
	
 	/***************************
 	* 添加产品
 	* 编辑产品
 	* 删除产品
 	*/
	$('#Product').on("click",".product_add", function(){
		if($("#Product .product_wrap").length<3){
			var productWrap = $(this).parents(".product_wrap").clone();
			
			$("dl:nth-child(1)",productWrap).addClass("dn");
			$("dl:nth-child(2) input[type!='submit'],dl:nth-child(2) textarea",productWrap).val("");
			$("dl:nth-child(2) .word_count",productWrap).children('span').text(500);
			$("dl:nth-child(2) .productShow img",productWrap).attr("src","");
			$("dl:nth-child(2) .productShow",productWrap).hide();
			$("dl:nth-child(2) .productNo",productWrap).show();
			$("dl:nth-child(2)",productWrap).removeClass("dn");
			$("dl:nth-child(3)",productWrap).addClass("dn");
			$(productWrap).appendTo("#Product");
			
			$("#Product .product_wrap").each(function(i){
				$("input[type='file']",this).attr("id","myfiles"+i);
			});
		}

		if($("#Product .product_wrap").length>=3){
			$(".product_add").addClass("dn");
		}
		$('.productForm', productWrap).validate({
			onkeyup: false,
	    	//focusCleanup:true,
			onfocusout:false,
			onsubmit:true,
	        rules: {
	        	myfiles: {
	        		required: false
	    	   	},
	        	product: {
	        		required: false,
	        		checkNum:true,
	    	    	specialchar:true,
	        		/*maxlenStr:10*/
	    	    	rangeLenStr:[1,10]
	    	   	},
	    	   	productUrl: {
	    	    	required: false,
	    	    	checkUrlNot:true,
	    	    	maxlength:120
	    	   	},
	    	   	productProfile: {
	    	    	required: false,
	    	    	/*minlength: 10,
	    	    	maxlength:500*/
	    	    	checkNum:true,
	    	    	specialchar:true,
	    	    	rangeLenStr:[10,500]
	    	   	}
	        },
	    	messages: {
	    		product: {
	    			checkNum:"请输入有效的产品名称",
	    			specialchar:"请输入有效的产品名称",
	    			rangeLenStr:"请输入1-10字的产品名称"
	    	   	},
	    	   	productUrl: {
	    	   		checkUrlNot:"请输入有效的产品主页或产品下载地址",
	    	    	maxlength:"请输入120字符以内的网址"
	    	   	},
	    	   	productProfile: {
	    	    	/*minlength:"请输入10-500字的产品简介",
	    	    	maxlength:"请输入10-500字的产品简介"*/
	    	   		checkNum:"请输入有效的产品简介",
	    	   		specialchar:"请输入有效的产品简介",
	    	   		rangeLenStr:"请输入10-500字的产品简介"
	    	   	}
	    	},
	   	   	submitHandler:function(form){
	   	   		var companyId = $('#companyId').val();
	   	   		var productId = $('.product_id',form).val();
	   	   		var productPicUrl = $('.productInfos',form).val();
	   	   		var product = $('input[name="product"]', form).val() != '请输入产品名称' ? $('input[name="product"]', form).val() :'';
	   	   		var productUrl = $.trim($('input[name="productUrl"]', form).val()) != '请输入产品网址' ? $.trim($('input[name="productUrl"]', form).val()) :'';
		   	   	if(productUrl != '' && productUrl.substring(0,7) != 'http://'){
		   	   		productUrl = 'http://' + productUrl;
		   	   	}
	   	   		var productProfile = $('textarea[name="productProfile"]', form).val() != '请简短描述该产品定位、产品特色、用户群体等' ? $('textarea[name="productProfile"]', form).val() :'';
	   	   		var resubmitToken = $('#resubmitToken').val();
	   	   		productWrap = $(form).parents(".product_wrap");
	   	   		$(form).find(":submit").attr("disabled", true);
	   	   		$.ajax({
	            	type:'POST',
	            	url:ctx+'/cp/saveCompanyProduct.json',
	            	data:{
	            		companyId:companyId,
	    	   	   		id:productId,
	            		type:1,
	            		productPicUrl:productPicUrl,
	            		product:product,
	            		productUrl:productUrl,
	            		productProfile:productProfile,
	            		resubmitToken:resubmitToken
	            	},
	            	dataType:'json'
	            }).success(function(result) {
            		if(null != result.resubmitToken && '' != result.resubmitToken){
	            		$('#resubmitToken').val(result.resubmitToken);
	            	}
	            	if(result.success){
	        			$("dl:nth-child(1)",productWrap).addClass("dn");
	        			
	        			$("dl:nth-child(2)",productWrap).addClass("dn");
		        		$("dl:nth-child(2) .product_id",productWrap).val(result.content.id);
	        			
	            		$("dl:nth-child(3) img",productWrap).attr("src",ctx+'/'+result.content.productPicUrl);
	            		$("dl:nth-child(3) .cp_intro a",productWrap).attr("href",result.content.productUrl);
	            		$("dl:nth-child(3) .cp_intro a",productWrap).html(result.content.product);
	            		$("dl:nth-child(3) .jspPane > div",productWrap).html(result.content.productProfile);
	            		$("dl:nth-child(2) textarea",productWrap).text(result.content.productProfile);
	            		$("dl:nth-child(3)",productWrap).removeClass("dn");
	            		$('.scroll-pane').jScrollPane();
	            	}else{
	            		if($('.product_wrap').length == 1){
	            			$("dl:nth-child(1)",productWrap).removeClass("dn");
			    			$("dl:nth-child(2)",productWrap).addClass("dn");
			    			$("dl:nth-child(2) input[type!='submit'], dl:nth-child(2) textarea",productWrap).val("");
			    			$("dl:nth-child(2) textarea",productWrap).text('');
			    			$("dl:nth-child(3)",productWrap).addClass("dn");
	            		}else{
	            			$(".product_add").removeClass("dn");
	            			$(productWrap).remove();
	            		}
	            		
	            	}
	            	$(form).find(":submit").attr("disabled", false);
	            });
	    	}
	    });
	});
	$('#Product').on("click",".product_edit", function(){
		//add nancy
		$('.newProduct .productForm span.error').hide();
		//end nancy
		var productWrap = $(this).parents(".product_wrap");
		var p_intro = $("dl:nth-child(2) textarea",productWrap).text();
		if(p_intro){
			p_intro =  $.trim(p_intro.replace(/<br \/>/gi,''));
		}
		/**nancy 注释掉**/
		//$("dl:nth-child(2) textarea",productWrap).val(p_intro);
		$("dl:nth-child(2) .word_count",productWrap).children('span').text(500-$("dl:nth-child(2) textarea",productWrap).val().length);
		$("dl:nth-child(2)",productWrap).removeClass("dn");
		$("dl:nth-child(1)",productWrap).addClass("dn");
		$("dl:nth-child(3)",productWrap).addClass("dn");
	});
	$('#Product').on("click",".product_delete", function(){
		
		if(confirm('确定要删除该条产品信息吗？')){
			var productId = $(this).next().val();
	    	var productWrap = $(this).parents(".product_wrap");
			if(productId==""){
				if($("#Product .product_wrap").length<=1){
					var val = $("dl:nth-child(2) input[type!='submit']").val();
					$("dl:nth-child(1)",productWrap).removeClass("dn");
					$("dl:nth-child(2)",productWrap).addClass("dn");
					$("dl:nth-child(2) input[type!='submit'], dl:nth-child(2) textarea",productWrap).val("");
					$("dl:nth-child(3)",productWrap).addClass("dn");
				}else{
					$(productWrap).remove();
				}
			}else{
				$.ajax({
		        	type:'POST',
		        	url:ctx+'/cp/delProductInfo.json',
		        	data:{
		        		productId:productId
		        	},
		        	dataType:'json'
		        }).success(function(result) {
		    		if($("#Product .product_wrap").length<=1){
		    			$("dl:nth-child(1)",productWrap).removeClass("dn");
		    			$("dl:nth-child(2)",productWrap).addClass("dn");
		    			$("dl:nth-child(2) input[type!='submit'], dl:nth-child(2) textarea",productWrap).val("");
		    			$("dl:nth-child(2) textarea",productWrap).text('');
		    			$("dl:nth-child(2) .productShow img",productWrap).attr("src","");
		    			$("dl:nth-child(2) .productShow",productWrap).hide();
		    			$("dl:nth-child(2) .productNo",productWrap).show();
		    			$("dl:nth-child(3)",productWrap).addClass("dn");
		    		}else{
		    			$(productWrap).remove();
		    		}
		    		
		        });
			}
			$(".product_add").removeClass("dn");
	
			$("#Product .product_wrap").each(function(i){
				$("input[type='file']",this).attr("id","myfiles"+i);
			});
		}
	});
	
	//countdown
	/*$('#Product .productForm').on('keyup','.s_textarea',function(){alert(111);*/
	/**edit nancy**/
	$('#Product').on('keyup',' .productForm .s_textarea',function(){
		//textCounter('productProfile', '', 500);		
		 var field = $(this);
		 var len = $.trim(field.val()).length ;
		 /*if ($.trim(field.val()).length > 500) {
			 field.val($.trim(field.val()).substring(0, 500));
		 } else {
			 field.next('.word_count').children('span').text(500 - $.trim(field.val()).length);
		 }*/
		 /**add nancy**/
		if (len > 500) {
			 field.val(field.val().substring(0, 500));
		 }else if($(this).siblings('span').length>0 &&( len>10 || len==10)){
			 $(this).siblings('span').hide();
		 }else if($(this).siblings('span').length>0 && len <10 ){
			 $(this).siblings('span').show();
		 }else{
			 field.next('.word_count').children('span').text(500 - len);
		 }
		 /**end nancy**/
	});
	
	/***************************
 	* 编辑公司产品验证
 	*/
 	$('.productForm').each(function(){
	 	$(this).validate({
	 		onkeyup: false,
	    	//focusCleanup:true,
	        rules: {
	        	myfiles: {
	        		required: false
	    	   	},
	    	   	product: {
	        		required: false,
	        		checkNum:true,
	        		specialchar:true,
	        		rangeLenStr:[1,10]
	    	   	}, 
	    	   	productUrl: {
	    	    	/*required: false,
	    	    	checkUrlNot:true,
	    	    	maxlength:80*/
	    	   		required: false,
	    	    	checkUrlNot:true,
	    	    	maxlength:120
	    	   	},
	    	   	productProfile: {
	    	    	/*required: false,
	    	    	minlength: 10,
	    	    	maxlength:500*/
	    	   		required: false,
	    	    	checkNum:true,
	    	    	specialchar:true,
	    	    	rangeLenStr:[10,500]
	    	   	}
	        },
	    	messages: {
	    		product: {
	    			checkNum:"请输入有效的产品名称",
	    			specialchar:"请输入有效的产品名称",
	    			rangeLenStr:"请输入1-10字的产品名称"
	    	   	},
	    	   	productUrl: {
	    	   		checkUrlNot:"请输入有效的产品主页或产品下载地址",
	    	    	maxlength:"请输入120字符以内的网址"
	    	   	},
	    	   	productProfile: {
	    	    	/*minlength:"请输入10-500字的产品简介",
	    	    	maxlength:"请输入10-500字的产品简介"*/
	    	   		checkNum:"请输入有效的产品简介",
	    	   		specialchar:"请输入有效的产品简介",
	    	   		rangeLenStr:"请输入10-500字的产品简介"
	    	   	}
	    	},
	   	   	submitHandler:function(form){
	   	   		var companyId = $('#companyId').val();;
	   	   		var productId = $('.product_id',form).val();
	   	   		var productPicUrl = $('.productInfos', form).val();
	   	   		var product = $('input[name="product"]', form).val() != '请输入产品名称' ? $('input[name="product"]', form).val() :'';
	   	   		var productUrl = $.trim($('input[name="productUrl"]', form).val()) != '请输入产品网址' ? $.trim($('input[name="productUrl"]', form).val()) :'';
		   	   	if(productUrl != '' && productUrl.substring(0,7) != 'http://'){
		   	   		productUrl = 'http://' + productUrl;
		   	   	}
	   	   		var productProfile = $('textarea[name="productProfile"]', form).val() != '请分段详细描述公司简介、企业文化等' ? $('textarea[name="productProfile"]', form).val() :'';
	   	   		var resubmitToken = $('#resubmitToken').val();
	   	   		var productWrap = $(form).parents(".product_wrap");
	   	   		$(form).find(":submit").attr("disabled", true);
	    		$.ajax({
	            	type:'POST',
	            	url:ctx+'/cp/saveCompanyProduct.json',
	            	data:{
	            		companyId:companyId,
	    	   	   		id:productId,
	            		type:1,
	            		productPicUrl:productPicUrl,
	            		product:product,
	            		productUrl:productUrl,
	            		productProfile:productProfile,
	            		resubmitToken:resubmitToken
	            	},
	            	dataType:'json'
	            }).success(function(result) {
            		if(null != result.resubmitToken && '' != result.resubmitToken){
	            		$('#resubmitToken').val(result.resubmitToken);
	            	}
	            	if(result.success){
	        			$("dl:nth-child(1)",productWrap).addClass("dn");
	        			
	        			$("dl:nth-child(2)",productWrap).addClass("dn");
		        		$("dl:nth-child(2) .product_id",productWrap).val(result.content.id);
	        			
	            		$("dl:nth-child(3) img",productWrap).attr("src",ctx+'/'+result.content.productPicUrl);
	            		$("dl:nth-child(3) .cp_intro a",productWrap).attr("href",result.content.productUrl);
	            		$("dl:nth-child(3) .cp_intro a",productWrap).html(result.content.product);
	            		$("dl:nth-child(3) .jspPane > div",productWrap).html(result.content.productProfile);
	            		$("dl:nth-child(2) textarea",productWrap).text(result.content.productProfile);
	            		$("dl:nth-child(3)",productWrap).removeClass("dn");
	
	            		$('.scroll-pane').jScrollPane();
	            	}else{
	            		if($('.product_wrap').length == 1){
	            			$("dl:nth-child(1)",productWrap).removeClass("dn");
			    			$("dl:nth-child(2)",productWrap).addClass("dn");
			    			$("dl:nth-child(2) input[type!='submit'], dl:nth-child(2) textarea",productWrap).val("");
			    			$("dl:nth-child(2) textarea",productWrap).text('');
			    			$("dl:nth-child(3)",productWrap).addClass("dn");
	            		}else{
	            			$(productWrap).remove();
	            		}
	            	}
	            	$(form).find(":submit").attr("disabled", false);
	            });
	    	}
	    });

 	});//end 
	
	
	/***************************************************************************
 	 * 编辑公司信息-右上角
 	 */
	$('#editCompanyDetail').click(function(){
		$(this).hide();
		$('.c_detail').addClass('c_detail_bg');
		$('.c_box .oneword').hide();
		$('.editDetail').show();
	});
	
	/***************************
 	 * 取消编辑公司信息
 	 */
	$('#cancelDetail').click(function(){
		$('#editCompanyDetail').show();
		$('.c_box .oneword').show();
		$('.editDetail').hide();
		if($('#addLabels').css('display') == 'none'){
			$('.c_detail').removeClass('c_detail_bg');
		}
	});
	/***************************
 	 * 保存 编辑公司信息
 	 */
		$('#companyFeatures').focus(function(){
			$('span.error').hide();
		})
		$("#editDetailForm").validate({
			onkeyup: false,
	    	//focusCleanup:true,
	        rules: {
	        	companyShortName: {
	    	    	required: true,
	    	    	specialchar:true,
	    	    	maxlenStr:40
	        	},
	        	companyFeatures: {
	    	    	required: true,
	    	    	/*minlength:5,
	    	    	maxlength:50*/
	    	    	checkNum:true,
	    	    	rangeLenStr:[5,50]
	    	   	}
	        },
	    	messages: {
	    		companyShortName: {
	    			required: "请输入公司简称",
	    			specialchar:"请输入有效的公司简称，如：拉勾",
	    	   		maxlenStr:"请输入40字以内的公司简称"
	        	},
	    		companyFeatures: {
	    			required: "请输入5-50字的一句话介绍",
	    	    	/*minlength:"请输入5-50字的一句话介绍",
	    	    	maxlength:"请输入5-50字的一句话介绍"*/
	    			checkNum:"请输入有效的一句话介绍",
	    			rangeLenStr:"请输入5-50字的一句话介绍"
	    	   	}
	    	},
    	   	submitHandler:function(form){
    	   		var companyId = $('#companyId').val();
    	   		var companyFeatures = $('#companyFeatures').val() != $('#companyFeatures').attr("placeholder") ? $('#companyFeatures').val() :'';
    	   		var companyShortName = $('#companyShortName').val() != $('#companyShortName').attr("placeholder") ? $('#companyShortName').val() :'';
				
				var companySize = $('#companySize').val() != $('#companySize').attr("placeholder") ? $('#companySize').val() :'';
				var gongsi_xingzhi = $('#gongsi_xingzhi').val() != $('#gongsi_xingzhi').attr("placeholder") ? $('#gongsi_xingzhi').val() :'';
				var city = $('#city').val() != $('#city').attr("placeholder") ? $('#city').val() :'';
				var companyUrl = $('#companyUrl').val() != $('#companyUrl').attr("placeholder") ? $('#companyUrl').val() :'';
				var select_category = $('#select_category').val() != $('#select_category').attr("placeholder") ? $('#select_category').val() :'';
				var positionType =  $('#select_category').val() != $('#positionType').attr("placeholder") ? $('#positionType').val() :'';
				
    	   		$(form).find(":submit").attr("disabled", true);
    	   		$.ajax({
	            	type:'POST',
	            	url:ctx+'Company/saveProfile',
	            	data:{
	            		companyId:companyId,
	            		companyShortName:companyShortName,
	            		companyFeatures:companyFeatures,
						companySize:companySize,
						gongsi_xingzhi:gongsi_xingzhi,
						city:city,
						companyUrl:companyUrl,
						select_category:select_category,
						positionType:positionType,
	            	},
	            	dataType:'json'
	            }).success(function(result) {
	            	if(result.success){
	            		if(result.content.companyShortName != ''){
	            			$('.c_box h2').text(result.content.companyShortName);
	            			$('.c_box h2').attr("title",result.content.companyShortName);
	            			/*$('.c_box h1.fullname').show()*/
	            			$('.c_box h1.fullname').css('display','block');//bug69参数验证
	            		}else{
	            			$('.c_box h2').text($('.c_box h1.fullname').text());
	            			$('.c_box h2').attr("title",$('.c_box h1.fullname').attr("title"));
	            			$('.c_box h1.fullname').hide();
	            		}
	            		$('.oneword span').text(result.content.companyFeatures);
	            		if($('#addLabels').css("display") == 'none'){
	            			$('.editDetail').hide();
	            			$('#editCompanyDetail').show();
	            			$('.c_detail').removeClass('c_detail_bg');
	            			$('.c_box .oneword').show();
	            		}else{
	            			$('.editDetail').hide();
	            			$('#editCompanyDetail').show();
	            			$('.c_box .oneword').show();
	            		}
	            	}else{
						$('#beError').text(result.msg).show();
	            	}
	            	$(form).find(":submit").attr("disabled", false);
	            });
	    	}
	    });
	
/***************************
 * 添加公司照片
 */	
 
	$('#comvimg').on('click','#editIntro,#addIntro',function(){
		//add nancy		
		$('.newIntro #companyDesForm span.error').hide();
		// end nancy
		var profileWrap = $(this).parents('.profile_wrap');
		var c_intro = $("dl:nth-child(3) .c_intro",profileWrap).html();
		if(c_intro){
			c_intro =  $.trim(c_intro.replace(/<br>/gi,'\r\n'));
		}
		$("dl:nth-child(2) textarea",profileWrap).val(c_intro);
		$("dl:nth-child(2) .word_count",profileWrap).children('span').text(1000-$.trim($("dl:nth-child(2) textarea",profileWrap).val()).length);
		$("dl:nth-child(1)",profileWrap).hide();
		$("dl:nth-child(2)",profileWrap).show();
		$("dl:nth-child(3)",profileWrap).hide();
		
	}); 
	
    /* 取消公司照片*/		
	$('#delcomvimg').bind('click',function(e){
		
		var profileWrap = $(this).parents(".profile_wrap");		
		if($('.c_intro' , profileWrap).html() == ''){
			$("dl:nth-child(1)",profileWrap).show();
			$("dl:nth-child(2)",profileWrap).hide();
			$("dl:nth-child(3)",profileWrap).hide();
		}else {
			$("dl:nth-child(1)",profileWrap).hide();			
			var oldVal = $("dl:nth-child(3)",profileWrap).find('.c_intro').text();
			$("dl:nth-child(2)",profileWrap).find('#companyProfile').val(oldVal);
			$("dl:nth-child(2)",profileWrap).hide();
			$("dl:nth-child(3)",profileWrap).show();
		}
	});



	
/***************************
 * 添加公司视频
 */	
 
	$('#comvideo').on('click','#editIntro,#addIntro',function(){
		//add nancy		
		$('.newIntro #companyDesForm span.error').hide();
		// end nancy
		var profileWrap = $(this).parents('.profile_wrap');
		var c_intro = $("dl:nth-child(3) .c_intro",profileWrap).html();
		if(c_intro){
			c_intro =  $.trim(c_intro.replace(/<br>/gi,'\r\n'));
		}
		$("dl:nth-child(2) textarea",profileWrap).val(c_intro);
		$("dl:nth-child(2) .word_count",profileWrap).children('span').text(1000-$.trim($("dl:nth-child(2) textarea",profileWrap).val()).length);
		$("dl:nth-child(1)",profileWrap).hide();
		$("dl:nth-child(2)",profileWrap).show();
		$("dl:nth-child(3)",profileWrap).hide();
		
	}); 
	
    /* 取消公司照片*/		
	$('#delcomvideo').bind('click',function(e){
		
		var profileWrap = $(this).parents(".profile_wrap");		
		if($('.c_intro' , profileWrap).html() == ''){
			$("dl:nth-child(1)",profileWrap).show();
			$("dl:nth-child(2)",profileWrap).hide();
			$("dl:nth-child(3)",profileWrap).hide();
		}else {
			$("dl:nth-child(1)",profileWrap).hide();			
			var oldVal = $("dl:nth-child(3)",profileWrap).find('.c_intro').text();
			$("dl:nth-child(2)",profileWrap).find('#companyProfile').val(oldVal);
			$("dl:nth-child(2)",profileWrap).hide();
			$("dl:nth-child(3)",profileWrap).show();
		}
	});
	
/***************************
 * 添加公司介绍
 */
	$('.newIntro #companyProfile').bind('keyup',function(){
		if(1000-$('.newIntro .word_count ').find('span').html()>20 || 1000-$('.newIntro .word_count ').find('span').html()==20){
			$('.newIntro span.error').hide();
		};
	})
	$('#Profile').on('click','#editIntro,#addIntro',function(){
		//add nancy		
		$('.newIntro #companyDesForm span.error').hide();
		// end nancy
		var profileWrap = $(this).parents('.profile_wrap');
		var c_intro = $("dl:nth-child(3) .c_intro",profileWrap).html();
		if(c_intro){
			c_intro =  $.trim(c_intro.replace(/<br>/gi,'\r\n'));
		}
		$("dl:nth-child(2) textarea",profileWrap).val(c_intro);
		$("dl:nth-child(2) .word_count",profileWrap).children('span').text(1000-$.trim($("dl:nth-child(2) textarea",profileWrap).val()).length);
		$("dl:nth-child(1)",profileWrap).hide();
		$("dl:nth-child(2)",profileWrap).show();
		$("dl:nth-child(3)",profileWrap).hide();
		
	});
	
	
	$('#companyDesForm').submit(function(){
		if($('textarea',this).val() == $('textarea',this).attr('placeholder')){
			$('textarea',this).val("");
		}
	}).validate({
		onkeyup: false,
    	//focusCleanup:true ,
		onfocusout:false,
		onsubmit:true,
        rules: {
    	   	companyProfile: {
    	    	required: false,
    	    	/*rangeLen: [20,1000]*/
    	    	rangeLenStr:[10,1000]
    	   	}
        },
    	messages: {
    		companyProfile: {
    			/*rangeLen:"请输入20-1000字的公司介绍"*/
    			rangeLenStr:"请输入10-1000字的公司介绍"
    	   	}
    	},
	   	submitHandler:function(form){
	   		var companyId = $('#companyId').val();
	   		var companyProfile = $.trim($('#companyProfile').val()) != $('#companyProfile').attr('placeholder') ?  $.trim($('#companyProfile').val()) : '';
	   		var profileWrap = $(form).parents(".profile_wrap");
	   		companyProfile = companyProfile.replace(/\r\n/g,'<br />');
	   		companyProfile = companyProfile.replace(/\n/g,'<br />');
	   		$(form).find(":submit").attr("disabled", true);
	   		$.ajax({
            	type:'POST',
            	url:ctx+'Company/saveContent',
            	data:{
            		companyId:companyId,
            		companyProfile:companyProfile
            	},
            	dataType:'json'
            }).success(function(result) {            	
            	if(result.success){
            		if(result.content == ''){
            			$("dl:nth-child(1)",profileWrap).show();
            			$("dl:nth-child(2) textarea",profileWrap).val("");
            			$("dl:nth-child(2)",profileWrap).hide();
            			$("dl:nth-child(3) .c_intro",profileWrap).html("");
            			$("dl:nth-child(3)",profileWrap).hide();
            		}else{
            			$("dl:nth-child(1)",profileWrap).hide();
            			var remark = result.content;
            			if(remark){
            				remark =  $.trim(remark.replace(/<br \/>/gi,''));
						}
            			$("dl:nth-child(2) textarea",profileWrap).val(remark);
            			$("dl:nth-child(2)",profileWrap).hide();
            			$("dl:nth-child(3) .c_intro",profileWrap).html(result.content);
            			$("dl:nth-child(3)",profileWrap).show();
            		}
            	}else{
            		alert(result.msg);
            	}
            	$(form).find(":submit").attr("disabled", false);
            });
    	}
    });
	
	//countdown
	$('#companyProfile').bind('keyup',function(){
		//textCounter('companyProfile', '', 1000);
		 /**add nancy**/
		var field = $(this);
		var len = $.trim(field.val()).length;
		if ($.trim(field.val()).length > 1000) {
			 field.val(field.val().substring(0, 1000));
		 }else if($(this).siblings('span').length>0 &&( len>20 || len==20)){
			 $(this).siblings('span').hide();
		 }else if($(this).siblings('span').length>0 && len <20 ){
			 $(this).siblings('span').show();
		 }else{
			 field.next('.word_count').children('span').text(1000 - len);
		 }
		 /**end nancy**/
	});

	/***************************
 	* 取消公司介绍
 	*/	 
	/*$('#companyProfile').blur(function(){
		$(this).validate({ ignore: "ignore" });
	})*/
	$('#companyDesForm').click(function(e){
		e.stopPropagation(); 
	})
	$('#delProfile').bind('click',function(e){
		
		var profileWrap = $(this).parents(".profile_wrap");		
		if($('.c_intro' , profileWrap).html() == ''){
			$("dl:nth-child(1)",profileWrap).show();
			$("dl:nth-child(2)",profileWrap).hide();
			$("dl:nth-child(3)",profileWrap).hide();
		}else {
			$("dl:nth-child(1)",profileWrap).hide();			
			var oldVal = $("dl:nth-child(3)",profileWrap).find('.c_intro').text();
			$("dl:nth-child(2)",profileWrap).find('#companyProfile').val(oldVal);
			$("dl:nth-child(2)",profileWrap).hide();
			$("dl:nth-child(3)",profileWrap).show();
		}
		/**nancy TODO**/
		/*if($('#companyProfile').val() == '' || $('.c_intro' , profileWrap).html() == ''){
			$("dl:nth-child(1)",profileWrap).show();
			$("dl:nth-child(2)",profileWrap).hide();
			$("dl:nth-child(3)",profileWrap).hide();
		}else if($('.c_intro' , profileWrap).html() != ''){
			$("dl:nth-child(1)",profileWrap).hide();			
			var oldVal = $("dl:nth-child(3)",profileWrap).find('.c_intro').text();
			$("dl:nth-child(2)",profileWrap).find('#companyProfile').val(oldVal);
			$("dl:nth-child(2)",profileWrap).hide();
			$("dl:nth-child(3)",profileWrap).show();
		}*/
		
	});
	/***************************
 	* 删除公司介绍
 	*/
	/*$('#delProfile').bind('click',function(){
		var companyId = $('#companyId').val();
   		var companyProfile = '';
   		var profileWrap = $(this).parents(".profile_wrap");
		$.ajax({
        	type:'POST',
        	url:ctx+'/c/saveCompanyProfile.json',
        	data:{
        		companyId:companyId,
        		companyProfile:companyProfile
        	},
        	dataType:'json'
        }).success(function(result) {
        	if(result.success){
    			$("dl:nth-child(1)",profileWrap).show();
    			$("dl:nth-child(2) textarea",profileWrap).val("");
    			$("dl:nth-child(2)",profileWrap).hide();
    			$("dl:nth-child(3) .c_intro",profileWrap).val("");
    			$("dl:nth-child(3)",profileWrap).hide();
        	}else{
				alert(result.msg);
        	}
        });
	});*/
	
	/***************************
 	* 编辑公司信息(右侧)
 	*/
	$('#editTags').click(function(){
		$('#c_tags_show').hide();
		$('#c_tags_edit').show();
	});
	$('#tagForms').validate({
		/*onkeyup: false,
		focusCleanup:true,*/
        rules: {
        	city: {
    	    	required: true,
    	    	checkCity:true,
    	    	maxlenStr:10
    	   	},
    	   	industryField: {
    	    	required: true
    	   	},
    	   	companySize: {
    	    	required: true
    	   	},
    	   	companyUrl: {
    	    	required: true,
    	    	checkUrl:true,
    	    	maxlength:120
    	   	}
        },
    	messages: {
    		city: {
    	    	required: "请输入公司所在城市，如：北京",
    	    	/*maxlength:"请输入20字符以内的公司地址"*/
    	    	maxlenStr:"请输入有效的公司所在城市，如：北京"
    	   	},
    	   	industryField: {
    	    	required: "请选择公司行业领域"
    	   	},
    	   	companySize: {
    	    	required: "请选择公司规模"
    	   	},
    	   	companyUrl: {
    	    	required: "请输入公司网址，如：www.lagou.com",
    	    	checkUrl:"请输入有效的公司网址",
    	    	maxlength:"请输入120字符以内的网址"
    	   	}
    	},
    	errorPlacement:function(label, element){
    		if(element.attr("type") == "hidden"){
    			label.insertAfter($(element).parent());
    		}else{
    			label.insertAfter(element);
    		}
    	},
	   	submitHandler:function(form){
	   		var companyId = $('#companyId').val();
	   		var city = $('#city',form).val();
	   		var industryField = $('#industryField',form).val();
	   		var companySize = $('#companySize',form).val();
	   		var companyUrl = $('#companyUrl',form).val();
			var gongsi_xingzhi = $('#gongsi_xingzhi',form).val();
	   		/*if(companyUrl.substring(0,7) != 'http://'){
	   			companyUrl = 'http://' + companyUrl;
			}*/
	   		$(form).find(":submit").attr("disabled", true);
    		$.ajax({
            	type:'POST',
            	url:ctx+'/cd/saveProfileBaseInfo.json',   
            	data:{
            		companyId:companyId,
            		city:city,
            		industryField:industryField,
            		companySize:companySize,
					gongsi_xingzhi:gongsi_xingzhi,
            		companyUrl:companyUrl
            	},
            	dataType:'json'
            }).success(function(result) {
            	if(result.success){
            		$('#city',form).val(city);
            		$('#industryField',form).val(industryField);
            		$('#companySize',form).val(companySize);
					$('#comxingzhi',form).val(gongsi_xingzhi);
            		$('#companyUrl',form).val(companyUrl);
            		$('#comCity',form).val(city);
            		$('#comInd',form).val(industryField);
            		$('#comSize',form).val(companySize);
            		$('#comUrl',form).val(companyUrl);
            		if(companyUrl.indexOf('http://') != -1 || companyUrl.indexOf('https://') != -1){
            			$('#c_tags_show table').html('<tr><td>地点</td><td>'+result.content.city+'</td></tr>'+
                                '<tr><td>领域</td><td>'+result.content.industryField+'</td></tr>'+
                                '<tr><td>规模</td><td>'+result.content.companySize+'</td></tr>'+
								 '<tr><td>公司性质</td><td>'+result.content.gongsi_xingzhi+'</td></tr>'+
                                '<tr><td>主页</td><td><a href="'+result.content.companyUrl+'" target="_blank">'+result.content.companyUrl+'</a></td></tr>');
        	   		}else{
        				$('#c_tags_show table').html('<tr><td>地点</td><td>'+result.content.city+'</td></tr>'+
                                '<tr><td>领域</td><td>'+result.content.industryField+'</td></tr>'+
                                '<tr><td>规模</td><td>'+result.content.companySize+'</td></tr>'+
								 '<tr><td>公司性质</td><td>'+result.content.gongsi_xingzhi+'</td></tr>'+
                                '<tr><td>主页</td><td><a href="http://'+result.content.companyUrl+'" target="_blank">'+result.content.companyUrl+'</a></td></tr>');
        			}
            		$('#c_tags_show').show();
            		$('#c_tags_edit').hide();
            	}else{
            		if(result.msg == '' ||result.msg == null || result.msg == undefined ){
            			alert("保存失败");
            		}else{
            			alert(result.msg);
            		}
            		
            	}
            	$(form).find(":submit").attr("disabled", false);
            });
    	}
    });

	
	/*************************************
	 * select框 
	 * */
	$(document).click(function(){
		/*var industry = [];
		if($('#box_ind li.current').length > 2){
			alert('行业领域最多可选2个');
		}else{
			$('#box_ind li.current').each(function(){
				industry.push($(this).text());
			});
			if(industry.join() == ''){
				$('#select_ind').val('请选择行业领域');
			}else{
				$('#select_ind').val(industry.join());
			}
			$('#industryField').val(industry.join());
			$('#box_ind').hide();
		}*/
		$('#box_sca').hide();
		$('#box_sca2').hide();
		$('#box_fin').hide();
		$('#stageform .selectBoxShort').hide();
		//$('#select_ind').removeClass('select_tags_focus');
		$('#select_fin').removeClass('select_tags_focus');
		$('#select_sca').removeClass('select_tags_focus');
	});
	
	/***************************
 	 * 选行业(不能选)
 	 */
	/*$('#select_ind').bind('click',function(e){
		e.stopPropagation();
		$(this).addClass('select_tags_focus');
		$('#select_fin').removeClass('select_tags_focus');
		$('#select_sca').removeClass('select_tags_focus');
		$('#box_ind').show();
		$('#box_sca').hide();
		$('#box_fin').hide();
	});
	$('#box_ind').on('click','ul li',function(e){
		e.stopPropagation();
		var industry = [];
 		if($(this).hasClass('current')){
			$(this).removeClass('current');
			$('#box_ind li.current').each(function(){
 				industry.push($(this).text());
 			});
	    	$('#select_ind').val(industry.join());
			$('#industryField').val(industry.join());
		}else{
			if($(this).siblings('li.current').length == 0){
	 			$(this).addClass('current');
	 			industry.push($(this).text());
	 			$('#select_ind').val(industry.join());
	 			$('#industryField').val(industry.join());
	 		}else if($(this).siblings('li.current').length == 1){
	 			$(this).addClass('current');
	 			$('#box_ind li.current').each(function(){
	 				industry.push($(this).text());
	 			});
		    	$('#select_ind').val(industry.join()).removeClass('select_tags_focus');
	 			$('#industryField').val(industry.join());
	   	 		$('#box_ind').hide();
	 		}else if($(this).siblings('li.current').length >= 2){
	 			alert('行业领域最多可选2个');
	 		}
		}
	});*/
	
	/***************************
 	 * 选规模
 	 */
	$('#select_sca').bind('click',function(e){
		e.stopPropagation();
		$(this).addClass('select_tags_focus');
		$('#select_ind').removeClass('select_tags_focus');
		$('#box_sca').show();
		$('#box_fin').hide();
		$('#stageform .selectBoxShort').hide();
		$('#box_ind').hide();
	});
	$('#box_sca').on('click','ul li',function(e){
		e.stopPropagation();
		var sca = $(this).text();
		$('#select_sca').val(sca).removeClass('select_tags_focus');
		$('#companySize').val(sca);
		$('#box_sca').hide();
	});
	
	$('#box_fin,#box_sca').bind('click',function(e){e.stopPropagation();});
	
   /***************************
 	 * 选性质
 	 */
	$('#select_sca2').bind('click',function(e){
		e.stopPropagation();
		$(this).addClass('select_tags_focus');
		$('#select_ind').removeClass('select_tags_focus');
		$('#box_sca2').show();
		$('#box_fin').hide();
		$('#stageform .selectBoxShort').hide();
		$('#box_ind').hide();
	});
	$('#box_sca2').on('click','ul li',function(e){
		e.stopPropagation();
		var sca = $(this).text();
		var sca2 = $(this).attr('xzid');
		$('#select_sca2').val(sca).removeClass('select_tags_focus');
		$('#gongsi_xingzhi').val(sca2);
		$('#box_sca2').hide();
	});
	
  /***************************
   * 选视频来源
   */
	$('#select_sca3').bind('click',function(e){
		e.stopPropagation();
		$(this).addClass('select_tags_focus');
		$('#select_ind').removeClass('select_tags_focus');
		$('#box_sca3').show();
		$('#box_fin').hide();
		$('#stageform .selectBoxShort').hide();
		$('#box_ind').hide();
	});
	$('#box_sca3').on('click','ul li',function(e){
		e.stopPropagation();
		var sca = $(this).text();
		var sca3 = $(this).attr('xzid');
		$('#select_sca3').val(sca).removeClass('select_tags_focus');
		$('#laiyuan').val(sca3);
		$('#box_sca3').hide();
	});
	
	$('#box_fin,#box_sca2').bind('click',function(e){e.stopPropagation();});
	
	/****************************
	 * 取消修改右侧features
	 * */
	$('#cancelFeatures').click(function(){
		var form = $(this).parents('#tagForms');
		var comCity = $('#comCity',form).val();
		var comInd = $('#comInd',form).val();
		var comFin = $('#comFin',form).val();
		var comSize = $('#comSize',form).val();
		var comUrl = $('#comUrl',form).val();
		$('#city',form).val(comCity);
		$('#select_ind',form).val(comInd);
		$('#industryField',form).val(comInd);
		$('#companySize',form).val(comSize);
		$('#select_sca',form).val(comSize);
		$('#companyUrl',form).val(comUrl);
		$('#c_tags_edit').hide();
		$('#c_tags_show').show();
	});
	
	/***************************
 	 * 选融资
 	 */
	var cancelButton = null;
	$(".c_stages").on("click","#select_fin",function(e){
		e.stopPropagation();
		/*$(this).addClass('select_tags_focus');
		$('#select_ind').removeClass('select_tags_focus');
		$('#select_sca').removeClass('select_tags_focus');*/
		$('#box_fin').show();
/*		$('#stagesList .selectBoxShort').hide();*/
		$('#box_sca').hide();
		$('#box_ind').hide();
	})	
	$('.c_stages #stageform #box_fin').on('click','li',function(event){
		event.stopPropagation();
		var _this = $(this);
		loop(_this);
	});
	function loop(ele){
		var fin = ele.text();
		var ul = ele.parents("div.stageSelect").next("ul#stagesList");
		$('#select_fin').val(fin);//.removeClass('select_tags_focus');
		$('#financeStage').val(fin);
		var val = $("#select_fin").val();
		$('#box_fin').hide();
		if(val == "未融资" || val == "上市公司" || val == "不需要融资"){
			ul.hide();
		}else{
			ul.show();
			var index = ele.index() + 1;
			ul.find("li").remove();
			ele.prevAll().addBack().slice(1,index).each(function(i){
				var str = $('#cloneInvest').html();
				ul.append('<li>'+str+'</li>');
				ul.find("li").eq(index-1).remove();
				var txt = $(this).text()
				ul.find("li").eq(i).find("input[type='button']").val(txt);
				ul.find("li").eq(i).find("input[type='hidden']").val(txt);
				ul.find("li").eq(i).find("input[type='text']").attr("name",'stageorg'+i);
			})
		}
	}
	
	 /*****************************
	* 选择发展阶段和投资机构
	*/
	var stageForm = null;
	$('.c_stages .c_edit').bind('click',function(){
		submitStage()
		$(this).hide();
		$('.c_stages .stageshow').hide();
		stageForm = $('.c_stages #stageform').clone();
		$('#stageform #stagesList').find("li").each(function(i){
			if($(this).find("input[type='hidden']").val() == ""){
				$(this).remove();
			}
		})
		if(cancelButton != null){
			$("#cancelStages").remove();
			$("#stageform").find("input[type='submit']").after(cancelButton);
		}
		$('.c_stages #stageform').show();
		$('#box_sca').hide();
		$("#stagesList>li").each(function(i){
			$(this).find("input[type='text']").attr("name",'stageorg'+i);
		})
		if($(".stageshow li").eq(1).text() == ""){
			var num = $('#select_fin').val() ;
			var li = $('#box_fin ul').find("li");
			var ul = $("ul#stagesList");
			$.each(li,function(index,item){
				if(num == "未融资" || num == "上市公司" || num == "不需要融资"){
					ul.hide();
				}else if(num == $(this).text()){
					ul.show();
					var index = index + 1;
					ul.find("li").remove();
					$(this).prevAll().addBack().slice(1,index).each(function(i){
						var str = $('#cloneInvest').html();
						ul.append('<li>'+str+'</li>');
						ul.find("li").eq(index-1).remove();
						var txt = $(this).text()
						ul.find("li").eq(i).find("input[type='button']").val(txt);
						ul.find("li").eq(i).find("input[type='hidden']").val(txt);
						ul.find("li").eq(i).find("input[type='text']").attr("name",'stageorg'+i);
					})
				}
			})
		}
	});
	
	$('.c_stages').on('click','.select_invest',function(e){
		e.stopPropagation();
		$('#box_sca').hide();
		/*$(this).parents('li').siblings().children('.selectBoxShort').hide();
		$(this).siblings('.selectBoxShort').show();*/
	});
	/*$('.c_stages').on('click','.selectBoxShort li',function(e){
		e.stopPropagation();
		var invest = $(this).html();
		var _li = $(this).parents('li');
		$('.select_invest,.select_invest_hidden',_li).val(invest);
		$(this).parents('.selectBoxShort').hide(); 
	 });*/
	/*$('.c_stages').on('change','.select_invest',function(){
		var str = $('#cloneInvest').html();
		$('#stagesList').append('<li>'+str+'</li>');
	});*/
	
	//发展阶段和投资机构 submit

function submitStage(){	
	$('.c_stages #stageform').validate({
		onkeyup: false,
    	/*focusCleanup:true*/
        rules: {
        	stageorg0: {
        		required: false,
        		/*maxlength:200*/
        		maxlenStr:50
    	   	}, 
	        stageorg1: {
	        	required: false,
	        	maxlenStr:50
	        },
	        stageorg2: {
	        	required: false,
	        	maxlenStr:50
	        },
	        stageorg3: {
	        	required: false,
	        	maxlenStr:50
	        },
	        stageorg4: {
	        	required: false,
	        	maxlenStr:50
	        }
        },
    	messages: {
    		stageorg0: {
    	    	/*maxlength:"请输入200字以内的投资机构"*/
    			maxlenStr:"请输入50字以内的投资机构"
    	   	},
	        stageorg1: {
				maxlenStr:"请输入50字以内的投资机构"
		   	},
		   	stageorg2: {
				maxlenStr:"请输入50字以内的投资机构"
		   	},
		   	stageorg3: {
				maxlenStr:"请输入50字以内的投资机构"
		   	},
		   	stageorg4: {
				maxlenStr:"请输入50字以内的投资机构"
		   	}
    	},
    	errorPlacement: function(error, element) {  
		    error.appendTo(element.parent()); 
		},
    	submitHandler:function(form){
	/*$('.c_stages').on('click','.btn_small',function(){
		var form = $(this).parents('#stageform');*/
    		$(form).find(":submit").attr("disabled", true);
    		var financeStage = $('#financeStage').val();
			var stages ='';
			var stage1,org1;
			stages += '[';
			$('#stagesList > li').each(function(i){
				stage1 = $(this).children('input[name="select_invest_hidden"]').val();
				org2 = $(this).children('input[type="text"]').val() != $(this).children('input[type="text"]').attr('placeholder') ? $(this).children('input[type="text"]').val() : "";
				var org1 = $.trim(org2);
				if(i == $('#stagesList > li').length-1){
					stages += '{"stage":"'+stage1+'","org":"'+org1 + '"}';
				}else{
					stages += '{"stage":"'+stage1+'","org":"'+org1 + '"},';
				}
			});
			if($("#financeStage").val() == "未融资" || $("#financeStage").val() == "上市公司" || $("#financeStage").val() == "不需要融资"){
				stages = "" ;
			}
			stages += ']';
			var resubmitToken = $('#resubmitToken').val();
			$.ajax({
				type:'POST',
	        	data: {
	        		financeStage:financeStage,
	        		stages:stages,
	        		resubmitToken:resubmitToken
	        	},
	        	url:ctx+'/c/saveStage.json',
            	dataType:'json' 
			}).done(function(result) {
        		if(null != result.resubmitToken && '' != result.resubmitToken){
            		$('#resubmitToken').val(result.resubmitToken);
            	}
	        	if(result.success){
	        		$('.c_stages .stageshow li').eq(0).children('span').html(result.msg);
	        		if(result.msg == "未融资" || result.msg == "上市公司" || result.msg == "不需要融资"){
	        			$('.c_stages .stageshow>li').eq(1).remove();
	        		}else{
	        			if(result.content != ''){
		        			if($('.c_stages .stageshow li').length == 1){
		            			$('.c_stages .stageshow').append('<li>投资机构：<span>'+result.content+'</span></li>');
		            		}else{
		            			$('.c_stages .stageshow li').eq(1).children('span').html(result.content);
		            		}
		        		}else{
		        			$('.c_stages .stageshow').html('<li>目前阶段：<span class="c5">'+result.msg+'</span></li>');
		        		}
	        		}	
	        		cancelButton = null;
	        		$(form).hide();
	        		$('.c_stages .stageshow').show();
	        		$('.c_stages .c_edit').show();
	        	}else{
	        		alert("保存失败");
	        	}
	        	$(form).find(":submit").attr("disabled", false);
	        });
    	}
	});
}
	
	/****************************
	 * 取消修改右侧发展阶段和投资机构
	 * */
	$('#cancelStages').on('click',function(){
		var stageWrapper = $(this).parents('.c_stages');
		cancelButton = $(this).clone(true);
		stageWrapper.children('dd').find('form').remove();
		stageWrapper.children('dd').append(stageForm);
		$('.c_stages .stageshow').show();
		$('.c_stages .c_edit').show();
		$('#stageform #box_fin').on('click','li',function(event){
			event.stopPropagation();
			var _this = $(this);
			loop(_this);
		});
		submitStage();
	});
	
	
	/***************************
 	 * 上传头像背景变色
 	 */
	$('.new_portrait').on('mouseenter','input',function(){
		$('.portrait_upload').css('backgroundColor','#7e9597');
	});
	$('.new_portrait').on('mouseleave','input',function(){
		$('.portrait_upload').css('backgroundColor','#93b7bb');
	});
	
	
	/***************************
 	 * textarea文本域字数控制
 	 */
	/*$('textarea[name="companyProfile"]').keyup(function(){
		textCounter(companyProfile, word_count, 1000);
	});
	$('textarea[name="remark"]').keyup(function(){
		textCounter(remark, word_count, 500);
	});
	$('textarea[name="productProfile"]').keyup(function(){
		textCounter(productProfile, word_count, 500);
	});*/
	
	/***************
	 * 公司深度报道 
	 ***************/
	//add nancy
	$('#Reported').on('click',' .reportForm input',function(){
		$(this).next('span.error').hide();
	});
	var Report = {
			obj : $('#Reported'),
			addReport:function(){
					var newReport = this.obj.find('.newReport').children('li').clone();
					this.obj.find('ul.reset').append(newReport).removeClass('dn');
					
					$('.reportForm',newReport).validate({
						onkeyup: false,
				    	focusCleanup:true,
				    	focusInvalid:false,
				        rules: {
				        	articleTitle: {
				        		required: true,
				        		specialchar:true,
				        		checkNum:true,
				        		maxlenStr:50
				    	   	},
				    	   	articleUrl: {
				        		required: true,
				        		checkUrl:true,
				        		maxlength:500
				    	   	} 
				        },
				    	messages: {
				    		articleTitle: {
				        		required: "请输入文章标题",
				        		specialchar:"请输入有效的文章标题",
				        		checkNum:"请输入有效的文章标题",
				        		maxlenStr:"请输入50字以内的文章标题"
				    	   	},
				    	   	articleUrl: {
				        		required: "请输入文章链接",
				        		checkUrl:"请输入有效的文章链接",
				        		maxlength:"请输入500字符以内的文章链接"
				    	   	} 
				    	},
				    	submitHandler:function(form){
				    		var articleTitle = $('input[name="articleTitle"]',form).val() != $('input[name="articleTitle"]',form).attr('placeholder') ? $('input[name="articleTitle"]',form).val() :'';
				    		var articleUrl = $('input[name="articleUrl"]',form).val() != $('input[name="articleUrl"]',form).attr('placeholder') ? $('input[name="articleUrl"]',form).val() :'';
				    		var articleId = $('.article_id',form).val();
				    		var companyId = $('#companyId').val();
				    		var resubmitToken = $('#resubmitToken').val();
				    		$(form).find(":submit").attr("disabled", true);
				    		$.ajax({
								url:ctx+'Company/articleSave',
								type:'POST',
					        	data: {
					        		title:articleTitle,
					        		url:articleUrl,
					        		id:articleId,
					        		companyId:companyId,
					        		resubmitToken:resubmitToken
					        	},
				            	dataType:'json'
							}).done(function(result) {
				        		if(null != result.resubmitToken && '' != result.resubmitToken){
				            		$('#resubmitToken').val(result.resubmitToken);
				            	}
					        	if(result.success){
					        		var content = result.content;
					        		var title = '';
					        		var url = '';
					        		if(content.url.substring(0,7) != 'http://'){
				        				url = 'http://' + content.url;
				    				}else{
				    					url = content.url;
				    				}
					        		
					        		title = content.title;
					        		
					        		$(form).siblings('a.article').html(title).attr({href:url,title:content.title});
					        		$('.article_id',form).val(content.id);
					        		$(form).addClass('dn').siblings('a').show();
					        		$(form).children('.btn_cancel_s').addClass('report_delete').removeClass('report_cancel').text('删除');
								}else{
									alert(result.msg);
					        	}
					        	$(form).find(":submit").attr("disabled", false);
							});
				    	}
					});
			},
			editReport:function(o){
				var report = o.siblings('a.article').attr('title');
				var url = o.siblings('a.article').attr('href');
				o.siblings('form').children('input').eq(0).val(report);
				o.siblings('form').children('input').eq(1).val(url);
				o.hide().siblings('a').hide().siblings('form').removeClass('dn');
			},
			delReport:function(o){
				var reportObj = this.obj;
				var articleId = o.siblings('.article_id').val();
				$.ajax({
					url:ctx+'/article/del.json',
					type:'POST',
		        	data: {
		        		id:articleId
		        	}
				}).done(function(result) {
		        	if(result.success){
		        		o.parent('form').parent('li').remove();
		        		if(reportObj.find('ul.reset').children('li').length == 0){
		        			reportObj.find('.c_add').addClass('dn');
		        			reportObj.find('ul.reset').addClass('dn').siblings('.reported_info').removeClass('dn');
		        		}else{
		        			reportObj.find('.c_add').removeClass('dn');
		        		}
		        	}else{
		        		console.log(result.msg);
		        	}
				});
			}
	};
	$('#Reported .c_reported .c_add').bind('click',function(){
		if(Report.obj.find('ul.reset').children('li').length<4){
			Report.addReport();
		}else if(Report.obj.find('ul.reset').children('li').length=4){
			Report.addReport();
			$(this).addClass('dn');
		}else{
			$(this).addClass('dn');
		}
	});
	$('#Reported .c_reported .report_edit').bind('click',function(){
		$(this).parent('.reported_info').addClass('dn');
		$('#Reported .c_reported .c_add').removeClass('dn');
		Report.addReport();
	});
	

	
	$('#Reported').on('click','ul .c_edit',function(){
		Report.editReport($(this));
	});
	$('#Reported').on('click','ul .report_delete',function(){
		if(confirm('确定要删除此条报道吗？')){
			Report.delReport($(this));
		}
	});
	$('#Reported').on('click','ul .report_cancel',function(){
		$(this).parent('form').parent('li').remove();
		if(Report.obj.find('ul.reset').children('li').length == 0){
			Report.obj.find('.c_add').addClass('dn');
			Report.obj.find('ul.reset').addClass('dn').siblings('.reported_info').removeClass('dn');
		}else{
			Report.obj.find('.c_add').removeClass('dn');
		}
	});
	
	$('.reportForm').each(function(){
		$(this).validate({
			onkeyup: false,
	    	focusCleanup:true,
	        /*rules: {
	        	articleTitle: {
	        		required: true,
	        		specialchar:true,
	        		checkNum:true
	    	   	},
	    	   	articleUrl: {
	        		required: true,
	        		checkUrl:true
	    	   	} 
	        },
	    	messages: {
	    		articleTitle: {
	        		required: "请输入文章标题",
	        		specialchar:"请输入有效的文章标题",
	        		checkNum:"请输入有效的文章标题"
	    	   	},
	    	   	articleUrl: {
	        		required: "请输入文章链接",
	        		checkUrl:"请输入有效的文章链接"
	    	   	} 
	    	}*/
	    	rules: {
	        	articleTitle: {
	        		required: true,
	        		specialchar:true,
	        		checkNum:true,
	        		maxlenStr:50
	    	   	},
	    	   	articleUrl: {
	        		required: true,
	        		checkUrl:true,
	        		maxlength:500
	    	   	} 
	        },
	    	messages: {
	    		articleTitle: {
	        		required: "请输入文章标题",
	        		specialchar:"请输入有效的文章标题",
	        		checkNum:"请输入有效的文章标题",
	        		maxlenStr:"请输入50字以内的文章标题"
	    	   	},
	    	   	articleUrl: {
	        		required: "请输入文章链接",
	        		checkUrl:"请输入有效的文章链接",
	        		maxlength:"请输入500字符以内的文章链接"
	    	   	} 
	    	},
	    	submitHandler:function(form){
	    		var articleTitle = $('input[name="articleTitle"]',form).val() != $('input[name="articleTitle"]',form).attr('placeholder') ? $('input[name="articleTitle"]',form).val() :'';
	    		var articleUrl = $('input[name="articleUrl"]',form).val() != $('input[name="articleUrl"]',form).attr('placeholder') ? $('input[name="articleUrl"]',form).val() :'';
	    		var articleId = $('.article_id',form).val();
	    		var companyId = $('#companyId').val();
	    		var resubmitToken = $('#resubmitToken').val();
	    		$(form).find(":submit").attr("disabled", true);
	    		$.ajax({
					url:ctx+'Company/articleSave',
					type:'POST',
		        	data: {
		        		title:articleTitle,
		        		url:articleUrl,
		        		id:articleId,
		        		companyId:companyId,
		        		resubmitToken:resubmitToken
		        	},
	            	dataType:'json'
				}).done(function(result) {
	        		if(null != result.resubmitToken && '' != result.resubmitToken){
	            		$('#resubmitToken').val(result.resubmitToken);
	            	}
		        	if(result.success){
		        		var content = result.content;
		        		var title = '';
		        		var url = '';
		        		if(content.url.indexOf('http://') != -1 || content.url.indexOf('https://') != -1){
	        				url =  content.url;
	    				}else{
	    					url = 'http://' + content.url;
	    				}
	        			title = content.title;
		        	
		        		$(form).siblings('a.article').html(title).attr({href:url,title:content.title});
		        		$('.article_id',form).val(content.id);
		        		$(form).addClass('dn').siblings('a').show();
		        	}else{
		        		console.log(result.msg);
		        	}
		        	$(form).find(":submit").attr("disabled", false);
				});
	    	}
		});
	});
	
});


/*****************************
 * 上传公司logo
 * */
function img_check(obj,action_url,companyId,id)
{
	var logo = obj.value;

	this.AllowExt='.jpg,.gif,.jpeg,.png,.pjpeg';//img format(,.pjpeg)
	this.FileExt=logo.substr(logo.lastIndexOf(".")).toLowerCase();
	
	if(this.AllowExt != 0 && this.AllowExt.indexOf(this.FileExt)==-1)//judge file format
	{
		errorTips("只支持jpg、gif、png、jpeg格式，请重新上传");
	}else{
		$.ajaxFileUpload ({
			url: action_url,
			secureuri:false,
			fileElementId:id,
			data:{companyId:companyId,logo:logo},
			dataType: 'text',
			success: function (jsonStr) {
				var result = eval('(' + jsonStr + ')');
				if(result.success){
					$('#logoShow img').attr("src",ctx+'/'+result.content);
					$('#logoNo').hide();
					$('#logoShow').show();
				}
				else{
					$('#logo_error').text(result.msg).show();
				}
			}
		});//end of ajax
		
	}
}

/***************************
* 上传产品图片格式验证 ajax提交 
*/
var productFlag = 1;
function product_check(obj,action_url,imgNo,imgShow,type,imgUrl)
{
	if( productFlag == 2 ){
		return false;
	}
	productFlag = 2;
	var uploadP = $(obj).parents(".new_product");

	this.AllowExt='.jpg,.jpeg,.gif,.png,.pjpeg';//img format(,.pjpeg)
	this.FileExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();	
	
	if(this.AllowExt != 0 && this.AllowExt.indexOf(this.FileExt)==-1)//judge file format
	{
		errorTips("只支持jpg、jpeg、gif、png格式，请重新上传");
	}else{
		$.ajaxFileUpload ({
			url: action_url,
			secureuri:false,
			fileElementId:obj.id,
			data:{type:3},
			dataType: 'text',
			success: function (data) {
				productFlag = 1;
				if(data != ''){
					$('.'+imgUrl, uploadP).val(data);
					$('.'+ imgShow + ' img', uploadP).attr("src",ctx+'/'+data);
					$('.' + imgNo, uploadP).hide();
					$('.'+ imgShow, uploadP).show();
				}
				else{
					productFlag = 1;
					$(".errorTips").click(function(){
	   	 				errorTips("上传失败，请重新上传");
	   	 			});
				}
			}
		})//end of ajax
	}
}

/***************************
* 上传创始人图片格式验证 ajax提交 
*/
var  memberFlag = 1;
function member_check(obj,action_url,imgNo,imgShow,type,imgUrl)
{
	if(memberFlag == 2){
		return false;
	}
	memberFlag = 2;
	var uploadP = $(obj).parents(".new_portrait");

	this.AllowExt='.jpg,.jpeg,.gif,.png,.pjpeg';//img format(,.pjpeg)
	this.FileExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();	
	
	if(this.AllowExt != 0 && this.AllowExt.indexOf(this.FileExt)==-1)//judge file format
	{
		errorTips("只支持jpg、jpeg、gif、png格式，请重新上传");
	}else{
		$.ajaxFileUpload ({
			url: action_url,
			secureuri:false,
			fileElementId:obj.id,
			data:{type:7},
			dataType: 'text',
			success: function (data) {
				memberFlag = 1;
				if(data != ''){
					$('.'+imgUrl, uploadP).val(data);
					$('.'+ imgShow + ' img', uploadP).attr("src",ctx+'/'+data);
					$('.' + imgNo, uploadP).hide();
					$('.'+ imgShow, uploadP).show();
				}
				else{
					memberFlag = 1;
					$(".errorTips").click(function(){
	   	 				errorTips("上传失败，请重新上传");
	   	 			});
				}
			}
		})//end of ajax
	}
}


/***************************
* 上传封面图片格式验证 ajax提交 
*/
var  memberFlag = 1;
function member_check2(obj,action_url,imgNo,imgShow,type,imgUrl)
{
	if(memberFlag == 2){
		return false;
	}
	memberFlag = 2;
	var uploadP = $(obj).parents(".vdfengmian");

	this.AllowExt='.jpg,.jpeg,.gif,.png,.pjpeg';//img format(,.pjpeg)
	this.FileExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();	
	
	if(this.AllowExt != 0 && this.AllowExt.indexOf(this.FileExt)==-1)//judge file format
	{
		errorTips("只支持jpg、jpeg、gif、png格式，请重新上传");
	}else{
		$.ajaxFileUpload ({
			url: action_url,
			secureuri:false,
			fileElementId:obj.id,
			data:{type:7},
			dataType: 'text',
			success: function (data) {
				memberFlag = 1;
				if(data != ''){
					$('.'+imgUrl, uploadP).val(data);
					$('.'+ imgShow + ' img', uploadP).attr("src",ctx+'/'+data);
					$('.' + imgNo, uploadP).hide();
					$('.'+ imgShow, uploadP).show();
				}
				else{
					memberFlag = 1;
					$(".errorTips").click(function(){
	   	 				errorTips("上传失败，请重新上传");
	   	 			});
				}
			}
		})//end of ajax
	}
}

