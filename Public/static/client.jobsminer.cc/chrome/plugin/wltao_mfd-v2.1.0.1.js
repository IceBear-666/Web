console.log('wltao wltao_mfd.js running!');
var _wlt_mfd_Obj_ = window._wlt_mfd_Obj_ || {};
_wlt_mfd_Obj_ = $.extend(window._wlt_mfd_Obj_, {
	//开启开关
	turnOn: true,
	
	userid: wltao_funs && wltao_funs.getUserId(),
	
	//订单数据
	orderData: {},
	
	//后台交互接口
	svrUrls: {
		'add': 'https://api.walatao.com/tp/?c=mfd&a=add',
		'check': 'https://api.walatao.com/tp/?c=mfd&a=checkOrder',
		'upload': 'https://api.walatao.com/tp/?c=mfd&a=orderShot',
		//白名单查询
		'whitelist': 'https://api.walatao.com/tp/?c=mfd&a=whitelist',
		'uppack': 'https://api.walatao.com/tp/?c=mfd&a=uppack'
	},
	
	//模板管理
	tpl: {
		//上传提示浮层css
		'upload-css': '<style>.wlt_ordershot_tip{width:274px;height:100px;background-color:#28b4ed;border-radius:3;font:14px tahoma,"microsoft yahei","微软雅黑";color:#fff;position:relative;z-index:9999}.wlt_ordershot_tip a{color:#fff}.wlt_ordershot_tip .wlt_ordershot_tip_l{width:60px;height:100%;line-height:100%;text-align:center;float:left}.wlt_ordershot_tip .wlt_ordershot_tip_l .wlt_ordershot_tip_icon{background:url(http://js.client.walatao.com/godimage/wlt_389_480.png) no-repeat;width:37px;height:37px;display:inline-block;margin-top:20px}.wlt_ordershot_tip .wlt_ordershot_tip_l .wlt_ordershot_tip_icon.tip_warn{background-position:-334px -180px}.wlt_ordershot_tip .wlt_ordershot_tip_l .wlt_ordershot_tip_icon.tip_ing{background-position:-334px -226px}.wlt_ordershot_tip .wlt_ordershot_tip_l .wlt_ordershot_tip_icon.tip_ok{background-position:-334px -269px}.wlt_ordershot_tip .wlt_ordershot_tip_l .wlt_ordershot_tip_icon.tip_upload{background-position:-287px -269px}.wlt_ordershot_tip .wlt_ordershot_tip_r{float:left;width:210px;height: 100%;position: relative;}.wlt_ordershot_tip .wlt_ordershot_tip_r .wlt_ordershot_tip_text{margin:22px 3px 12px}.wlt_ordershot_tip .wlt_ordershot_tip_r .wlt_ordershot_tip_btns a{margin:0 10px;text-decoration: underline;}.wlt_ordershot_tip .wlt_ordershot_tip_r .wlt_ordershot_tip_btns{position: absolute;bottom: 15px;left: 20px;}.wlt_ordershot_tip .wlt_ordershot_tip_cls{right:5px;position:absolute;font-style:normal;text-decoration:none;z-index:9999;}</style>',
		
		//上传提示浮层html
		'upload-html': '<div class="wlt_ordershot_tip" id="wlt_ordershot_tip"><a href="javascript:void(0);" class="wlt_ordershot_tip_cls" id="wlt_ordershot_tip_cls"><i>x</i></a><div class="wlt_ordershot_tip_l"><i class="wlt_ordershot_tip_icon tip_warn" id="wlt_ordershot_tip_icon"></i></div><div class="wlt_ordershot_tip_r"><div class="wlt_ordershot_tip_text" id="wlt_ordershot_tip_text"></div><div class="wlt_ordershot_tip_btns" id="wlt_ordershot_tip_btns"></div></div></div>',
		
		'ele': {
			'confirm': {
				'text': '确定上传订单截图？',
				'icon': 'tip_upload',
				'btn': ['确定', '取消']
			},
			'uploading': {
				'text': '正在上传...',
				'icon': 'tip_ing'
			},
			'ok': {
				'text': '上传成功！',
				'icon': 'tip_ok',
				'btn': ['查看截图', '我的密封代']
			},
			'goon_warn': {
				'text': '发现还有未发货商品，是否继续？（建议全部发货后再截图）',
				'icon': 'tip_warn',
				'btn': ['确定', '取消']
			},
			'warn': {
				'text': '',
				'icon': 'tip_warn',
				'btn': ['确定', '取消']
			}
		},
		
		//密封代截图链接css，html
		'shot-link': '<style>.wlt_ordershot_link{width:250px;height:30px;background-color:#c3cfd4;border-radius:3;font:13px tahoma,"microsoft yahei","微软雅黑";color:#fff;position:relative;z-index:9999}.wlt_ordershot_link .wlt_ordershot_link_text{margin:0 10px 0 20px;line-height:30px;float:left}.wlt_ordershot_link a{color:#ff0;margin:0 3px}.wlt_ordershot_link .wlt_ordershot_link_cam i{background:url(http://js.client.walatao.com/godimage/wlt_389_480.png) no-repeat;background-position:-337px -142px;display:inline-block;width:30px;height:28px}</style><div class="wlt_ordershot_link" id="wlt_ordershot_link"><div class="wlt_ordershot_link_text" id="wlt_ordershot_link_text">未有商品发货，暂不可截图</div><div class="wlt_ordershot_link_cam" id="wlt_ordershot_link_cam"><a href="javascript:void(0);"><i></i></a></div></div>',

		'mfd-link': '<style type="text/css">.wlt_order_mfd_tip,.wlt_order_mfd_link{font-size:14px;font-family:"microsoft yahei"}.wlt_order_mfd_link .clearfix:after{visibility:hidden;font-size:0;content:" ";clear:both;height:0}.wlt_order_mfd_tip.mfdTip p{margin:0 0 3px 0;}.wlt_order_mfd_tip{width:340px;height:120px;background:#18b4ed;padding:15px;color:#fff;border-radius:3px;position:absolute;left:510px;bottom:55px;display:none}.wlt_order_mfd_tip.mfdIntro{left:475px;height:90px;bottom:65px;width:100px}.wlt_order_mfd_tip.mfdIntro a{color:#fff;text-decoration:none}.wlt_order_mfd_tip.mfdIntro a:hover{color:#fff100;text-decoration:underline;}.wlt_order_mfd_tip.mfdIntro i{margin:-15px  -6px 0 0;float:right}.wlt_order_mfd_tip .arrow{width:16px;height:16px;background:#18b4ed;transform:rotate(-45deg);position:absolute;left:80px;bottom:-8px}.wlt_order_mfd_tip.mfdIntro .arrow{left:45px}.wlt_order_mfd_link{background:#c3cfd4;width:140px;color:#fff;font-size:16px;height:30px;line-height:30px;margin-top:20px;border-radius:3px;position:absolute;left:480px;top:0}.wlt_order_mfd_link span,.wlt_order_mfd_link .wlt_order_mfd_cam{float:left}.wlt_order_mfd_link span{margin:0 20px}.wlt_order_mfd_link .wlt_order_mfd_cam{background:url(http://js.client.walatao.com/godimage/wlt_389_480.png) no-repeat -337px -142px;width:30px;height:28px;margin-left:10px}.wlt_order_mfd_btnloading{float:left;background:url(http://js.client.walatao.com/godimage/btn_loading.gif) no-repeat;margin-left:50px;width: 30px;height:28px;}.wlt_order_mfd_link .wlt_order_mfd_textlink{color:#fff}</style><div class="wlt_order_mfd_tip mfdIntro"><i><a href="javascript:void(0);">x</a></i><div class=tips><p><a target=_blank href="http://dai.walatao.com/index-begin.html">我是代购</a><br><a target=_blank href="http://dai.walatao.com/">我是买家</a><br><a target=_blank href="http://dai.walatao.com/">随便看看</a></p></div><div class=arrow></div></div><div class="wlt_order_mfd_tip mfdTip"><div class=tips></div><div class=arrow></div></div><div style="position:absolute;left:480px;top:0px;" class=wlt_order_mfd_status><a href="javascript:void(0);">什么是密封代？</a></div><div class=wlt_order_mfd_link><span class="clearfix" style="display:none"><a class=wlt_order_mfd_textlink href="javascript: void(0);">添加到密封代</a></span><i class="wlt_order_mfd_btnloading clearfix"></i><a class="wlt_order_mfd_cam clearfix" href="#" style="display:none" target="_blank"></a></div>',
				
		'shot-tip': '<p>为了保证您的截图信息齐全，请待商品发货后再截图</p>',
		'support-tip': '<p style="margin-bottom: 10px;">密封代暂只支持使用以下转运公司的订单：</p>1.转运四方; 2.转运邦; 3.美速通; 4.笨鸟快递</p></p>5.立夫转运; 6.海淘1号仓; 7.芒果速递; 8.海购丰运</p></p></p>9.易客满; 10.中邮海外购;</p>',
		'login-tip': '<div id="mfd-login-widgets" style="padding: 15px; text-align: center; background: #18b4ed; position: absolute; left: 120px; top: 0; width: 150px;"><a style="margin-right: 15px; color: #fff;" target="_blank" href="http://we.walatao.com/login/">登录</a><a style="color: #fff;" target="_blank" href="http://we.walatao.com/account/register/">注册</a></div>'
	},
	

	//请求服务器
	post: function(url, data, callback){
		$.post(url, data, function(rs){
			typeof callback==='function' && callback(rs);
		});
		return false;
	},
	
	reqGet: function(url, data, callback){
		$.get(url, data, function(rs){
			typeof callback==='function' && callback(rs);
		});
		return false;
	},
	
	//查询请求
	getQuery: function(name){
		return typeof wltao_getQueryString === 'function' ? wltao_getQueryString(name) : (function(name){
				var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
				var r = window.location.search.substr(1).match(reg);
				if (r != null) return unescape(r[2]); return null;
			})(name);
	},
	
	//是否支持的后台
	isSupport: function(){
		var supportSites = {
			'www.amazon.com'	: 	'amazon'//,
			//'www.amazon.co.jp'	: 	'amazon_jp'
		},
		host = location.host;
		this.websiteKey = supportSites[host];
		return supportSites[host] ? true : false;
	},
	
	//支持网站配置
	websiteKey: 'amazon',
	webConfig: {
		'amazon':	{
			'class_orderDlink':	'.a-link-emphasis'
		},
		'amazon_jp':	{
			'class_orderDlink':	'.a-link-normal'
		}
	},
	
	/* 初始化密封代 */
	init: function(){
		var _this = this;
		if( !_this.isSupport() ) return false;
		var _webConfig = _this.webConfig[_this.websiteKey]; 
		//alert(_this.websiteKey);
			
		if( !_wlt_mfd_Obj_.turnOn ) return false;
		
		/* 订单时间转化 */
		var changeOrderTime = function(ordertime){
			var isJP = ordertime.indexOf('年')>-1;
			if( !isJP ){
				var mons = {"January":1,"February":2,"March":3,"April":4,"May":5,"June":6,"July":7,"August":8,"September":9,"October":10,"November":11,"December":12};
				var tmp = ordertime.split(' '),
					month = mons[tmp[0]] ?  mons[tmp[0]] : (new Date().getMonth()+1);
				tmp = tmp[2] + '-' + month + '-' + tmp[1].replace(',', '');
				return Math.floor(new Date(tmp + ' 00:00:00').getTime()/1000);
			}
			else{
				var time = ordertime.replace('年','-').replace('月','-').replace('日','') + ' 00:00:00';
				return Math.floor(new Date(time).getTime()/1000);
			}
		};
		
		/* 获取发货状态 */
		var trackBtnId = '.track-package-button',
			trackBtns = $(trackBtnId);	//跟踪包裹按钮
		var getShipStatus = function(shipments){
			if( !shipments ) return false;
			var color_notship = 'rgb(216, 221, 230)',
				color_shipped = 'rgb(240, 193, 75)';

			//总包裹数量
			var shipNum = shipments.size();
			//总按钮数
			var trackBtnNum;
			//发货包裹数
			var shippedNum = 0;
			var shipBtns = shipments.find(trackBtnId);
			trackBtnNum = shipBtns.size();
			
			var shippedBtns = [];
			for(var i=0;i<trackBtnNum;i++){
				//console.log($(shipBtns[i]).css('background-color'));
				color_shipped == $(shipBtns[i]).css('background-color') &&  (shippedNum++, shippedBtns.push(shipBtns[i]));
			}
			//0：未发货 1：部分发货 2：全发货 3：都已送达
			var stat = shippedNum==0 ? 0 : (trackBtnNum>shippedNum ? 1 : 2),
				stats = ['未有商品发货','部分商品发货','商品已全部发货','商品已送达'];
			//无包裹按钮，则都已送到
			if( trackBtnNum==0 ) stat = 3;
			return {
				'stat':	stat,
				'stat_detail': stats[stat],
				'shippedBtns': shippedBtns
			}
		}

		//按钮是否已发货
		var isShippedByBtn = function(btn){
			var color_notship = 'rgb(231, 233, 236)',
				color_shipped = 'rgb(240, 193, 75)';
				//alert($(btn).css('background-color'));
			return color_shipped == $(btn).css('background-color');
		}
		
		//密封代入口
		var mfdRun = function(){
			//var orderInfoDivs = $('#ordersContainer .order-info');
			var orderInfoDivs = $('.order-info');
			if( !orderInfoDivs.size()>0 ) return false;
			
			/* 定义各个DOM元素 */
			var linkDivs,
				tipDivs,
				tipIntroDivs,
				textLinks,
				statusLinks,
				btnLoadingGifs;
			
			/* 改变添加按钮状态与提示 */
			var changeMfdLink = function(i, t){			
				var textLink = textLinks.eq(i),
					linkDiv = linkDivs.eq(i),
					tipDiv = tipDivs.eq(i),
					tipIntroDiv = tipIntroDivs.eq(i),
					statusLink = statusLinks.eq(i),
					btnLoadingGif = btnLoadingGifs.eq(i);
				var textLinkClass = 'wlt_order_mfd_textlink';
				var ableCss = {'background-color':'#18b4ed'},	//有效css
					disableCss = {'background-color':'#c3cfd4'},	//无效css
					dislinkCss = {'text-decoration':'none','cursor':'default','color':'#888'};
				var shipStatus = getShipStatus(orderInfoDivs.eq(i).siblings('.shipment'));
				
				//悬浮提示
				var linkDivHover = function(){
					linkDiv.hover(
						function(){$(this).siblings('.wlt_order_mfd_tip.mfdTip').show();},
						function(){$(this).siblings('.wlt_order_mfd_tip.mfdTip').hide();}
					);
				}
				
				//初始失效状态
				linkDiv.css(disableCss);
				statusLink.unbind().click(function(){tipIntroDiv.show();});
				textLink.parents('span.clearfix').show();
				btnLoadingGif.hide();
				
				//成功添加后
				if( t==100 ){
					textLink.html('正在添加...').css(dislinkCss);
				}
				//非合作转运公司
				else if( t==0 ){
					textLink.css(dislinkCss);
					tipDiv.find('.tips').html(_this.tpl['support-tip']);
					linkDivHover();
					
					//统计上报
					_this.stat('no_support_show');
				}
				//还未添加，可正常添加
				else if( t==1 ){
					linkDiv.unbind('mouseenter').css(ableCss);
					bindMfdBtns(i);
					
					//统计上报
					_this.stat('add_show');
				}
				//已添加，可截图，有商品发货
				else if( t==2 && shipStatus['stat']!=0 ){
					var link = orderInfoDivs.eq(i).find(_webConfig['class_orderDlink']).attr('href');					
					textLink.replaceWith('<a class="'+textLinkClass+' wltao-stat" href="'+link+'" target="_blank" data-stat="ext_content_mfd_goshot_btn_click">去截图</a>');
					var tmp = linkDiv.unbind('mouseenter').css(ableCss).find('a').attr('href', link).show();
					statusLink.unbind().find('a').css(dislinkCss).text(shipStatus['stat_detail']);
					
					//统计上报
					_this.stat('go_shot_show');
				}
				//已添加，不可截图，没有商品发货
				else if( t==2 && shipStatus['stat']==0 ){
					statusLink.find('a').css(dislinkCss).text(shipStatus['stat_detail']);
					textLink.replaceWith('去截图');
					linkDiv.find('a').show();
					tipDiv.find('.tips').html(_this.tpl['shot-tip']);
					linkDivHover();
					
					//统计上报
					_this.stat('no_ship_show');
				}
				else{
					linkDiv.unbind('mouseenter').css(ableCss).find('a').attr('href', 'http://dai.walatao.com/index-begin.html').attr('target','_blank').show();
					
					//统计上报
					_this.stat('no_open_show');
				}
				return ;
			}
		
			/* 点击事件 */
			var bindMfdBtns = function(idx, stat){
				if( stat==0 ) return;
				textLinks.eq(idx).unbind('click').click(function(){
					var oid = $(this).attr('orderid'),
						orderDataStr,
						addSvrUrl = _this.svrUrls['add'];

					if(_this.userid != 0) {
						orderDataStr = encodeURIComponent(wltao_funs.toJsonStr(_this.orderData[oid]));
						//请求添加
						changeMfdLink(idx, 100);
						var postInfo = {
							uid: _this.userid,
							orderinfo: orderDataStr
						};
						_this.post(addSvrUrl+'&ts='+new Date().getTime(),postInfo,function(rs){
							//统计上报-点击添加次数
							_this.stat('add_click');
							if(rs.errcode==0){
					   			//setTimeout(function(){
									changeMfdLink(idx, 2);
								//}, 1000);
							}else{
								alert(rs.msg);
							}
						});
						return false;
					} else {
						initLogin();
					};
				});
			}

			var initLogin = function() {
				var obj = $('#mfd-login-widgets');
				obj.length > 0 ? obj.show() : $('.wlt_order_mfd_link').append(_this.tpl['login-tip']);
			};
			
			/* 初始化密封代按钮状态 */
			var initStatus = function(){
				//加载初始化按钮
				var orderid, mfdLinkId;
				$.each(orderInfoDivs, function(i, orderDiv){
					var mfdLink = _this.tpl['mfd-link'],
						trackBtn = $(orderDiv).siblings('.shipment').find('.track-package-button'),
						hasTrack = isShippedByBtn(trackBtn);
					//if( !hasTrack ) return false;
					$(orderDiv).find('.a-fixed-right-grid').append(mfdLink);
					//收集订单信息
					orderid = catchOrderInfo(orderDiv);
					mfdLinkId = 'wlt_order_mfd_textlink_'+i;
					$('.wlt_order_mfd_textlink').eq(i).attr('id', mfdLinkId).attr('orderid', orderid);
					(trackBtn.size()<=0||!hasTrack) && ($('.wlt_order_mfd_link').eq(i).hide(), $('.wlt_order_mfd_status').eq(i).hide());
				});
				linkDivs = $('.wlt_order_mfd_link');
				tipDivs = $('.wlt_order_mfd_tip.mfdTip');
				tipIntroDivs = $('.wlt_order_mfd_tip.mfdIntro');
				textLinks = $('.wlt_order_mfd_textlink');
				statusLinks = $('.wlt_order_mfd_status');
				btnLoadingGifs = $('.wlt_order_mfd_btnloading');
				
				//关闭介绍提示事件
				tipIntroDivs.find('a').click(function(){
					$(this).parents('.mfdIntro').hide();
				});
						
				//var ctn = $('.wlt_order_mfd_textlink').size();
				var initUrl = _this.svrUrls['check'], oid, idx, orderinfo;
				var req = function(packObj){
					orderinfo = $('#'+packObj.trackBtnId).parents('.shipment').siblings('.order-info').eq(0);
					idx = $('.order-info').index(orderinfo);
					oid = packObj.orderId;
					//存储物流信息
					catchShipInfo(packObj);
					_this.reqGet(initUrl,{
						uid		: 	_this.userid,
						oid		: 	oid,
						idx		: 	idx,
						trans	: 	packObj.transComp,
						shipComp: 	packObj.shipComp
					},function(rs){
						if(rs.errcode==0){
							var stat = rs.data.mfd_stat, idx = rs.data.idx;
							changeMfdLink(idx, stat);
							bindMfdBtns(idx, stat);
						}else{
							changeMfdLink(idx, 9998);
							console.log('查询失败，订单号：'.oid);
						}
					});
				}
				_this.orderPack.pushCall(req);
				_this.orderPack.ajaxCall();
			}
						
			/* 获取物流提交信息 */
			var catchShipInfo = function(packObj){
				var oid 	= 	packObj.orderId,
					shipId 	= 	packObj.shipmentId;
				$.extend(_this.orderData[oid].ord_packinfo[shipId], {
					shipnum: 	packObj.shipNum,
					shipcomp: 	packObj.shipComp,
					transcomp: 	packObj.transComp
				});
				var comp =  packObj.transComp ? packObj.transComp : packObj.shipComp;
				_this.orderData[oid].ord_shipnum[shipId] = packObj.shipNum + ',' + comp;
				//console.log('----------wltao-orderAjaxShip--------', _this.orderData);
				return ;
			}		
						
			/* 获取订单提交信息 */
			var orderPack_count = $(trackBtnId).parents('.shipment').length-1;
			var catchOrderInfo = function(obj){
				var shipments = $(obj).siblings('.shipment');
				var hasTrack = shipments.find(trackBtnId).size()>0 ? true : false;
				var orderid = $.trim($(obj).find('.a-col-right .a-color-secondary ').eq(1).text()),
					proNum = shipments.find('.a-button-input').size(),
					orderDate = $.trim($(obj).eq(0).find('.a-col-left .a-color-secondary').eq(1).text()),
					packNum = hasTrack ? shipments.size() : 1;
						
				_this.orderData[orderid] = {
					ord_ordertime:	changeOrderTime(orderDate),
					ord_orderid:	orderid,
					ord_dg_uid:		_this.userid,
					ord_addtime:	Math.floor(new Date().getTime()/1000),
					ord_pronum:		proNum,
					ord_packnum:	packNum,
					ord_proinfo:	[],
					ord_packinfo:	{},
					ord_shipnum:	{}
				};
				
				var shipment,
					packProNum,
					title,
					prodPic,
					prodLink,
					packproInfo,
					shipmentId,
					trackBtn;
				
				for(var j=0; j<packNum; j++){
					shipment = $(shipments[j]);
					//shipment = $(trackBtns[j]).parents('.shipment')				
					packProNum = shipment.find('.a-spacing-top-medium .a-spacing-none').size() + shipment.find('.a-spacing-top-medium .a-spacing-base').size();
					//packProNum = shipment.find('.a-button-input').size();
					packproInfo = [];
					for(var i=0; i<packProNum; i++){
						title = $.trim(shipment.find('.a-fixed-right-grid-col .a-fixed-left-grid').eq(i).find('.a-col-right .a-row .a-link-normal').eq(0).text());
						var tmp = shipment.find('.a-fixed-right-grid-col .a-fixed-left-grid').eq(i).find('.a-col-left .a-link-normal');
						prodLink = document.location.origin + tmp.eq(0).attr('href');
						prodPic = tmp.find('img').eq(0).attr('src');
						packproInfo.push({
							title: title,
							prodpic: prodPic,
							prodlink: prodLink
						});
					}
					trackBtn	=	shipment.find(trackBtnId + ' a').eq(0);
					if( trackBtn.size()<=0 ) continue;
					shipmentId 	= 	trackBtn.attr('href').split('orderingShipmentId=');
					if( !shipmentId[1] ) continue;
					shipmentId 	= 	shipmentId[1].split('&')[0];
					_this.orderData[orderid].ord_packinfo[shipmentId] = {
						proinfo: packproInfo
					};
				}
				return orderid;
			};
			
			//初始化密封代按钮状态
			initStatus();
		}
		
		//订单详情页截图
		var screenshotRun = function(){
			var orderDetailDiv = $('#orderDetails');
			if( !orderDetailDiv.size()>0 ) return false;
			
			//订单号
			var orderid = _this.getQuery('orderID');
			//包裹DIV
			var shipments = $('.shipment');		
			//运单状态
			var shipStatus = getShipStatus(shipments),
				shotStatus = shipStatus ? shipStatus['stat'] : 3;
				
			//不同状态上传提示语
			var uploadTipMsg = {
				'1': '发现还有未发货商品，是否继续？（建议全部发货后再截图）',
				'2': '确定上传订单截图？'
			};
			
			//初始化截图按钮状态
			var mfdLinkId = '#wlt_ordershot_link',
				mfdLinkTextId = '#wlt_ordershot_link_text',
				mfdLinkCamId = '#wlt_ordershot_link_cam';
				
			var initShotBtns = function(){
				orderDetailDiv.find('h1').eq(0).append(_this.tpl['shot-link']);
				changeShotLink();
				return;
			}
			
			//改变截图按钮状态
			var changeShotLink = function(){
				if( shotStatus==1 || shotStatus==2 ){
					$(mfdLinkId).css('background-color', '#18b4ed').css('width', '420px');
					$(mfdLinkTextId).html('截图并上传至<a href="http://dai.walatao.com/my.html" target="_blank" class="wlt_ordershot_link_mfd">密封代</a>（价格及收货人姓名会被自动抹去）');
					$(mfdLinkCamId).unbind('click').click(screenShot);	
					//统计上报-可截图
					_this.stat('shot_show');
				}else if( shotStatus==3 ){
					$(mfdLinkId).hide();
				}else{
					$(mfdLinkCamId).unbind('click');
					//统计上报-可截图
					_this.stat('shot_noship_show');
				}
			}
			
			var jcrop_api, screenDomBak = $('body').html();
			//截图事件绑操作
			var screenShot = function(){
				var orderDetailHeight = orderDetailDiv.height(),
					orderDetailWidth = orderDetailDiv.width();
				var offleft, offtop, extraTop=130;
				var orderRect = [
					(offleft = orderDetailDiv.offset().left + 1),
					(offtop = orderDetailDiv.offset().top + extraTop),
					orderDetailWidth + offleft + 2,
					orderDetailHeight + offtop - extraTop
				];
				//马赛克处理关键信息
				hideKeyInfo();
				
				$('body').Jcrop({
					onRelease: function(){}
				},function(){
					jcrop_api = this;
					jcrop_api.disable();
					jcrop_api.animateTo(orderRect);
					
					var popPos = [
						orderRect[0] + (orderRect[2]-orderRect[0])/2,
						orderRect[1] + (orderRect[3]-orderRect[1])/2
					];
					//提示浮层
					popUpload('confirm', {'msg':uploadTipMsg[shotStatus]}, popPos);
				});
			};
		
			//生成截图
			var domHtml = '';
			var generateDom = function(){
				if( domHtml ) return domHtml;
				var headDom, orderDetailDom, html;
				var orderDetailDiv_Bak = orderDetailDiv.clone(), head_Bak = $('head').clone();
 				orderDetailDiv_Bak.children('.a-section.a-spacing-large').eq(0).remove();
				orderDetailDiv_Bak.children('.a-row.a-spacing-large').eq(0).remove();
				orderDetailDiv_Bak.children('h1').eq(0).remove();
				orderDetailDom = orderDetailDiv_Bak.html().replace(/\s+/g, ' ').replace(/[\r\n]/g, '');
				head_Bak.children('script').remove();
				head = head_Bak.html().replace(/\s+/g, ' ').replace(/[\r\n]/g, '');
				domHtml = '<html><head>'+head+'</head><body><div id="a-page"><div id="orderDetails">'+orderDetailDom+'</div></div></body></html>';
				return domHtml;
			}
						
			//马赛克关键信息
			var hideKeyInfo = function(){
				//需要隐藏的元素选择
				var divSeletor = ['.displayAddressUL li:first','.a-col-right .a-span-last','.a-color-price'];
				//处理关键信息-马赛克
				var keyDivs = orderDetailDiv.find(divSeletor.join(',')),
					newCss = {'cssText': 'color:#f00 !important','background-color':'#f00'};
				keyDivs.css(newCss);
			}
			
			//上传截图dom
			var doUpload = function(){
				_this.stat('shot_upload');
				popUpload('uploading');
				var domData = encodeURIComponent(generateDom());
				_this.post(_this.svrUrls['upload'],{
					uid: wltao_funs && wltao_funs.getUserId(),
					orderid: orderid,
					dom: domData
				},function(rs){
					if(rs.errcode==0){
						popUpload('ok', {'link':rs.data.pic});
						_this.stat('shot_upload_succ');
					}
					else{
						var msg = rs.msg;
						var host = location.host;
						rs.errcode!=1 &&popUpload('warn', {'msg':msg});
						rs.errcode==1 &&popUpload('warn', {'msg':msg, 'link':'https://'+host+'/gp/css/order-history/ref=nav_youraccount_orders_first'});
						_this.stat('shot_upload_fail');
					}
				});
				return false;
			}   
			
			//取消上传
			var cancel = function(){
				jcrop_api.destroy();
				document.body = document.createElement('body');
				$('body').append(screenDomBak);
			};
			
			//上传截图浮层构造
			var popUpload = function(type, eleInfo, popPos){
				var ele = _this.tpl['ele'][type],
					jcroppop = $('.jcrop-holder');
				var pop = $('#wlt_ordershot_tip').size();
				if( !jcroppop.size() || !ele ) return false;
				if( !pop ){
					//页面添加提示浮层
					jcroppop.append(_this.tpl['upload-css'] + _this.tpl['upload-html']);
					//浮层定位
					pop = $('#wlt_ordershot_tip');
					popPos && pop.css('left', popPos[0]-pop.width()/2+'px').css('top', popPos[1]-pop.height()/2+'px');
					//绑定按钮事件
					$('#wlt_ordershot_tip_cls').unbind().click(cancel);
				}
				
				var textDiv = $('#wlt_ordershot_tip_text'),
					icon = $('#wlt_ordershot_tip_icon'),
					btnsDiv = $('#wlt_ordershot_tip_btns'),
					text = eleInfo && eleInfo['msg'] ? eleInfo['msg'] : ele['text'],
					iconClass = eleInfo && eleInfo['icon'] ? eleInfo['icon'] : ele['icon'];
					
				textDiv.html(text);
				icon.attr('class', 'wlt_ordershot_tip_icon ' + iconClass);
				btnsDiv.html('');
				var btnsText = eleInfo && eleInfo['btn'] ? eleInfo['btn'] : ele['btn'];
				if( $.isArray(btnsText) && btnsText[0] ){
					for(var i=0; i<btnsText.length; i++)
						btnsDiv.append('<a href="javascript:void(0);">'+btnsText[i]+'</a>');
				}
				
				var extra = eleInfo && eleInfo['link'] ? eleInfo['link'] : false;
				bindBtns(type, btnsDiv, extra);
				return;
			}
			
			//绑定浮层按钮事件
			var bindBtns = function(type, btnsDiv, extra){
				var btns = btnsDiv.find('a');
				if( 'confirm'==type||'goon_warn'==type ){
					//确定按钮
					btns && btns.unbind();
					btns.eq(0) && btns.eq(0).click(doUpload);
					btns.eq(1) && btns.eq(1).click(cancel);
				}
				if( 'warn'==type ){
					//确定按钮
					btns && btns.unbind().click(cancel);
					extra && btns.eq(0).unbind().attr('href', extra).attr('target','_blank');
				}
				if( 'ok'==type ){
					btns && btns.unbind().attr('target','_blank');
					//查看截图
					btns.eq(0) && btns.eq(0).attr('href', extra ? extra : '#');
					//我的密封代
					btns.eq(1) && btns.eq(1).attr('href', 'http://dai.walatao.com/my.html');
				}
			}
			
			//获取物流单号
			var getShipInfo = function(){
				var packInfo 	= {};
				var upPackInfo 	= function(packObj){
					//console.log('----------wltao-orderAjaxShip--------', packObj);
					if( packObj.isShipped ){
						packInfo[packObj.shipmentId] = {shipnum: packObj.shipNum, shipcomp: packObj.shipComp};					
						_this.post(_this.svrUrls['uppack'], {
							uid		: 	wltao_funs.getUserId(),
							orderid	: 	orderid,
							packinfo: 	encodeURIComponent(wltao_funs.toJsonStr(packInfo))
						},function(rs){
							console.log(rs.msg);
						});
					}
				}
				_this.orderPack.pushCall(upPackInfo);
				_this.orderPack.ajaxCall();
			}
			
			getShipInfo();
			
			//初始化截图按钮状态
			initShotBtns();	
		}
		
		//添加密封代DOM入口
		;(function(){
			KISSY.use("wltao-orderAjaxShip", function(a,b){
				_this.orderPack = new b;
			});
			_this.reqGet(_this.svrUrls['whitelist'], {
				uid: _this.userid
			},function(rs){
				if( rs.iswhite ){
					mfdRun();
					screenshotRun();
				}
				else console.log('非密封代白名单用户');
			});
		})();
	},
	
	
	//统计上报
	stat: function(type, extra){
		var _this = this;
		var statPrefix = 'ext_content_mfd_',
			statConfig = {
				//添加按钮展示
				'add_show'			:	statPrefix + 'add_btn_show',
				//去截图按钮展示
				'go_shot_show'		:	statPrefix + 'goshot_btn_show',
				//去截图按钮-点击
				'go_shot_click'		:	statPrefix + 'goshot_btn_click',
				//不支持转运公司
				'no_support_show'	:	statPrefix + 'not_support_show',
				//未开启
				'no_open_show'		:	statPrefix + 'not_open_show',
				//未发货
				'no_ship_show'		:	statPrefix + 'not_ship_show',
				//点击 - 添加
				'add_click'			:	statPrefix + 'add_btn_click',
				//截图按钮-可截图
				'shot_show'			:	statPrefix + 'shot_btn_show',
				//截图按钮-不可截图
				'shot_noship_show'	:	statPrefix + 'shot_noship_btn_show',
				//点击-截图按钮
				'shot_click'		:	statPrefix + 'shot_btn_click',
				//截图-上传次数
				'shot_upload'		:	statPrefix + 'shot_upload_click',
				//截图-上传成功次数
				'shot_upload_succ'	:	statPrefix + 'shot_upload_succ',
				//截图-上传失败次数
				'shot_upload_fail'	:	statPrefix + 'shot_upload_fail'
			};
		var statParam = statConfig[type] ? statConfig[type] : statPrefix+'undefined';
		statParam = extra ? statParam + extra : statParam;
		KISSY.Stat(statParam);
		return ;
	}

});
