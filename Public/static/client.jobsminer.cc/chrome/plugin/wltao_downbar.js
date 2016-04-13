console.log('console show js');
KISSY.add("wltaodownbar", 
function(a, b) {
	var DOM = KISSY.DOM;
	var imgUrl = 'http://js.client.walatao.com/v9/godimage/downbar/';
	var g_has_use = false;
	
	function initbind(){
		var lLink = KISSY.one('#wltao-downbar-clsbar'),
			aLink = KISSY.one('#wltao-downbar-alltrans'),
			wLink = KISSY.one('#wltao-downbar-wordtrans');
		var imgall = KISSY.one('#wltao-downbar-alltrans img'),
			imgword = KISSY.one('#wltao-downbar-wordtrans img');
		var showBar = KISSY.one('#wltao-downbar-show'),
			hiddenBar = KISSY.one('#wltao-downbar-hidden'),
			openBar = KISSY.one('#wltao-downbar-open');
		var transFrame = KISSY.one('#wltao-downbar-wordTrans-frame'),
			clsFrameBtn = KISSY.one('#wltao-downbar-wordTrans-frame .ht_tooltip_title_btn a');
		
		//打开downbar
		openBar.on('click', function(){
			showBar.show();	
			hiddenBar.hide();
			wltao_tools.setBackgroundLocalStore({
				isShowDownBar: "true"
			});
		});
		
		//关闭downbar
//		console.log(lLink);
		lLink.on('click', function(){
			showBar.hide();
			hiddenBar.show();
			wltao_tools.setBackgroundLocalStore({
				isShowDownBar: "false"
			});
		});
		
		//全文翻译	
		aLink.on('click', function(){
			if(window.location.protocol === 'https:') {
				var temp = '<div class="no-all-translate" style="padding: 20px; background: rgba(0,0,0,.5); width: 250px; border-radius: 5px; position: fixed; bottom: 33px; left: 110px;">';
  				temp += '<a href="javascript: void(0);" style="position: absolute; right: 5px; top: 3px; color: #fff;font-family: \'microsoft yahei\';">X</a>';
  				temp += '<h2 style="color: #fff; font-size: 18px;font-family: \'microsoft yahei\'; ">该页面无法全文翻译</h2>';
  				temp += '<h3 style="color: #fff; font-size: 14px;font-family: \'microsoft yahei\'; margin-top: 5px;">可以选择用词句翻译或者划词翻译</h3>';
				temp += '</div>';
				if(!KISSY.one('.no-all-translate')) {
					KISSY.one('#wltao-downbar').append(temp);
					KISSY.one('.no-all-translate a').on('click', function() {
						KISSY.one('.no-all-translate').hide();
					});
				} else {
					KISSY.one('.no-all-translate').show();
				}
			} else {
				if(aLink.attr('title')=='点击进行全文翻译'){
					wltao_tools.translateAllText();
					DOM.attr(imgall, 'src', imgUrl+'bar-all-a.png');
					DOM.attr(aLink, 'title', '点击关闭全文翻译');
				}
				else{
					DOM.attr(aLink, 'title', '点击进行全文翻译');
					DOM.attr(imgall, 'src', imgUrl+'bar-all-b.png');
					document.getElementById('MSTTExitLink').click();
				}
			}
		});
		//单句翻译
		wLink.on('click', function(){		
			if(wLink.attr('title')=='点击打开单句翻译'){
				transFrame.show();
				DOM.attr(imgword, 'src', imgUrl+'bar-word-a.png');
				DOM.attr(wLink, 'title', '点击关闭单句翻译');
			}
			else{
				clsFrameBtn.fire('click');
				DOM.attr(imgword, 'src', imgUrl+'bar-word-b.png');
			}
		});
		//关闭翻译面板
		clsFrameBtn.on('click', function(){
			transFrame.hide();
			DOM.attr(wLink, 'title', '点击打开单句翻译');
			DOM.attr(imgword, 'src', imgUrl+'bar-word-b.png');
		});
		
		isBarOpen(function(isOpen){
			!isOpen && lLink.fire('click');
		});
	}
	
	
	function isBarOpen(cbFun){
		wltao_tools.getMessageFromBackground({
			operate: "getLocalStorage",
			data: {"key":"isShowDownBar"}
		},function(z){
			try{
				var z1  = typeof z === "object" ? z: JSON.parse(z);
				cbFun(z1.value=='false'? 0:1);
			}catch(e){}
		});
	}

	function initbar(){
		if(g_has_use) return ;	
		g_has_use = true;
		
		var fanyiDiv = '<div id="wltao-downbar-wordTrans-frame" class="xfk wltao_triangle bottom" len="501" style="display:none;position: fixed;margin-bottom: 40px;z-index: 99999;left: 10px;bottom: 0px;background-color: #eee; width: 392px; height: 320px;"> <div class="ht_tooltip" len="471" style=""> <div class="ht_tooltip_border" len="374" style=""> <div class="ht_tooltip_main" len="339"> <div class="ht_tooltip_title" len="83" style="padding: 10px; background-color: #28b4ed; position: relative;"> <div class="ht_tooltip_title_text" len="0" style="width: 75px;margin: 0 auto;"><a href="http://fanyi.baidu.com/#auto/zh/" target="_blank"><img src="http://js.client.walatao.com/godimage/baiduTranslation.png"></a></div> <div class="ht_tooltip_title_btn" style="color:#ccc;float: right!important;margin-top: -15px;margin-right: 5px;" len="2" lang="zh-chs"><a style="color: #fff; font-size: 18px; text-decoration: none; position: absolute; right: 10px; top: 5px;">X</a></div> </div> <div class="ht_tooltip_content" len="182" style="height:288px; padding: 10px;"> <iframe src="https://js.client.walatao.com/common/fanyi-amazon.html" class="ht-xfk_iframe" width="388" height="295" frameborder="no" border="0" marginwidth="0" marginheight="0" len="0"></iframe> </div> </div> </div>  </div> </div>';
		
		var downbar = '<style>#wltao-downbar{text-align:left;}#wltao-downbar li{display:inline-block;margin:0px;} #wltao-downbar img{vertical-align:bottom;}}</style><div id="wltao-downbar" style="display:; position:fixed;bottom:0px;height:40px; width:350px; z-index:2147483647; left:20px;" class="wltao-downbar"><div id="wltao-downbar-show"><ul style="margin:0px"><li><a href="http://we.walatao.com/" id="wltao-downbar-logo" target="_blank"><img src="'+imgUrl+'bar-logo-head.png"></a></li><li><a href="javascript:void(0)" id="wltao-downbar-alltrans" title="点击进行全文翻译" data-stat="web.detail.downbar.alltrans" class="wltao-stat"><img src="'+imgUrl+'bar-all-b.png"></a></li><li><a href="javascript:void(0)" id="wltao-downbar-wordtrans" title="点击打开单句翻译" data-stat="web.detail.downbar.wordtrans" class="wltao-stat"><img alt="单句翻译" src="'+imgUrl+'bar-word-b.png"></a></li><li><a href="javascript:void(0)" id="wltao-downbar-clsbar" title="收起" data-stat="web.detail.downbar.close" class="wltao-stat"><img src="'+imgUrl+'bar-logo-tail.png"></a></li></ul></div><div id="wltao-downbar-hidden" style="display:none;style="margin-left:45px""><a href="javascript:void(0)" id="wltao-downbar-open" title="点击打开瓦拉淘工具条" data-stat="web.detail.downbar.open" class="wltao-stat"><img alt="" src="'+imgUrl+'bar-logo.png"/></a></div></div>';
				
		setTimeout(function(){		
			KISSY.one('body').append(downbar + fanyiDiv);
			initbind();
		}, 1000);		
	}
	
	return initbar;
},
{
	requires: ["overlay", "node"]
});
wltao_tools.getMessageFromBackground({
	operate: "getLocalStorage",
	data: {"key": 'isShowDownBar'}
},function(data){
	if(data.value=='true'){
		KISSY.use('wltaodownbar',function(a,b){
			new b();
		});
	}
	return ;
});
