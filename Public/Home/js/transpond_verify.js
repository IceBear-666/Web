
/**
 * jason 2014/7/11
 * 转发简历-验证码页面
 */
(function(){
	$(function(){
		//输入框验证
		var code; 
		var element = $("#verify_code");
		keydown(element);
		function keydown(index){
			index.bind("keydown",function(){
				var _this = $(this);
				var value = L.trim(_this.val());
				if(value.length >= 6){
					_this.attr("maxlength","6");
				}
			})
		}	
		element.bind("paste",function(){
			$(this).removeAttr("maxlength");
			$(this).unbind("keydown");
			var timer = null ;
			var _this = $(this);
			timer = setTimeout(function(){
				code = L.trim(_this.val()); 
				_this.val(code);
				keydown(_this);
			},100);		
		})
		//校验
		var flag = true;
		$("#sub").bind("click",function(){
    		//判断是否为空
			code = $("#verify_code").val();
    		if(code.length == 0 || (code.length !=6) || !(/^[0-9]*$/g.test(code))){
    			var htmlTip = "<span class='tipSpan error'>验证码格式错误</span>";
				$(".tipSpan").remove();
				$("#verify_con div").after(htmlTip);    			
    			return false;
    		}
    		//如果输入不为空 继续走流程
    		var getV = L.trim($("#verify_code").val());
			//ajax请求比对验证码
    		L.ajax({
  				 type:'POST',
  				 url:ctx+"Company/checkForwardEmail/",
  				 data:{code:getV,token:$("#token").val()},
  				 dataType:'json'
  			 }).done(function(result){
  				 console.log(result);
  				switch(parseInt(result.state)) 
  				{ 
	  				case 1: 
						top.location.href=ctx+"Company/checkForwardEmail/?token="+$("#token").val();
	  					//top.location.href=rctx+"/forward/showResume.html?forwardKey="+$("#token").val();	  				
	  				break; 
	  				
	  				case 701: 
	  					var lNum = result.content.data.times;
  						if( lNum== 0  ){
  							jumpError();  							
  						}else{
  	  	    				var htmlTip = "<span class='tipSpan error'>验证码错误，还可输入"+lNum+"次</span>";
  	  	    				$(".tipSpan").remove();
  	  	    				$("#verify_con div").after(htmlTip); 							
  						}  		  					
	  				break; 
	  				
	  				case 502: 
	  					jumpError();  	
	  				break; 
	  				
	  				case 301: 
	  					alert("转发记录过期");
	  				break; 
	  				
	  				case 302: 
	  					alert("转发key错误");
	  				break; 
	  				
	  				case 601: 
	  					alert("秘钥格式错误（不为6位，或不为全数字）");
	  				break; 
	  				
	  				case 501:
	  					alert("转发记录不存在");
	  				default:; 
  				}   				 
  			 });   
		});
	});
	//5次错误跳转
	function jumpError(){
		$("#verify_con").hide();
		$(".tip").show();
		var num=4;
		//开启定时器
		var timer = setInterval(function(){
			if(num>0){
				$("#num").text(num);
			}else{
				clearInterval(timer);
				top.location.href=rctx;
			}
			num--;
		},1000);   			
	}
})();