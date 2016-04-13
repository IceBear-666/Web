var ExpressInputWidget = (function() {

    var inited = false, baseData, currentItem, onlyInputPanel, clickCallBack, autoClose, timeout = 0, currentPage = [0, 0, 0, 0, 0, 0, 0], index = 0;
    var siteName = window.location.host.substring(window.location.host.length - 2);
    var strVar = "";
        strVar += "<link rel=\"stylesheet\" href=\"https://js.client.walatao.com/common/css/expressInputPanel.css\" />";
        strVar += "<div id=\"expressInputPanel\">";
        strVar += "    <div class=\"tips\">";
        strVar += "        <i class=\"close\"><\/i>";
        strVar += "        <div class=\"title_widget clearfix\">";
        strVar += "            <i><\/i>";
        strVar += "            <span>重要提示<\/span>";
        strVar += "        <\/div>";
        strVar += "        <div class=\"content_widget clearfix\">";
        strVar += "            <span>如需转运，全部填写信息均需使用在转运公司注册后显示的内容<\/span>";
        strVar += "            <a id=\"expressCompany\" href=\"javascript: void(0);\" >选择转运公司<\/a>";
        strVar += "            <a id=\"expressInfo\" href=\"http://we.walatao.com/topic/%E8%BD%AC%E8%BF%90%E5%85%AC%E5%8F%B8\" target=\"_blank\" >选择指南<\/a>";
        strVar += "        <\/div>";
        strVar += "    <\/div>";
        strVar += "    <div id=\"inputPanel\">";
        strVar += "        <div class=\"info\">点击跳转至转运公司网站<i class=\"close\"><\/i><\/div>";
        strVar += "        <div class=\"title_widget\">";
        strVar += "            <ul class=\"clearfix\">";
        strVar += "                <li class=\"cur\" data-link=\"hot\">热门<\/li>";
        strVar += "                <li data-link=\"A-E\">A-E<\/li>";
        strVar += "                <li data-link=\"F-J\">F-J<\/li>";
        strVar += "                <li data-link=\"K-O\">K-O<\/li>";
        strVar += "                <li data-link=\"P-T\">P-T<\/li>";
        strVar += "                <li data-link=\"U-Z\">U-Z<\/li>";
        strVar += "                <li data-link=\"other\">0-9<\/li>";
        strVar += "            <\/ul>";
        strVar += "        <\/div>";
        strVar += "        <div class=\"content_widget\">";
        strVar += "            <ul class=\"clearfix\">";
        strVar += "            <\/ul>";
        strVar += "            <a class=\"page prevPage grey\" page=\"-1\" href=\"javascript: void(0);\" >上一页</a><a class=\"page nextPage\" page=\"1\" href=\"javascript: void(0);\" >下一页</a>";
        strVar += "        <\/div>";
        strVar += "    <\/div>";
        strVar += "<\/div>";

    var init = function(_config, _onlyInputPanel) {
        if(inited) {
            openPanel();
            return;
        }
        var showPos = _config.showPos, left = _config.left || 0, top = _config.top;
        clickCallBack = _config.callback || {};
        autoClose = _config.autoClose || false;
        onlyInputPanel = typeof _onlyInputPanel !== 'undefined' ? _onlyInputPanel : true;
        if(!showPos) return false;
        ($(showPos).css('position') !== 'absolute' || $(showPos).css('position') !== 'fixed') && $(showPos).css('position', 'relative');
        $(showPos).append(strVar);
        $('#expressInputPanel').css('left', left || 0).css('top', top || 0);
        !onlyInputPanel && $('#expressInputPanel .tips').show();
        if(_config.inputPanel) { $('#expressInputPanel .tips').hide(); }
        if(_config.needInput !== undefined && _config.needInput === false) $('#expressInputPanel #inputPanel').hide(); 
        if(_config.needTitle !== undefined && _config.needTitle === false) $('#expressInputPanel #inputPanel .info').hide();
        inited = true;
        if(window.localStorage.getItem('walataoExpressBaseData_' + siteName)) {
            try{
                baseData = JSON.parse(window.localStorage.getItem('walataoExpressBaseData_' + siteName));
                
            } catch(e) {
                baseData = eval('(' + window.localStorage.getItem('walataoExpressBaseData_' + siteName) + ')');
            }
            
            timeout = baseData.timeout;
            if(new Date().getTime() - timeout > 1800000) {
                requestExpress();
            } else {
                bindBaseData();
            }
        } else {
            requestExpress();
        }
        bindEvent();
    };

    var openPanel = function() {
        $('#expressInputPanel #inputPanel').show();
    };

    var closePanel = function() {
        $('#expressInputPanel #inputPanel').hide();
    };

    var togglePanel = function() {
        $('#expressInputPanel #inputPanel').toggle();
    };

    var closeWidget = function() {
        $('#expressInputPanel').hide();
    };

    var requestExpress = function() {
        var url = 'https://api.walatao.com/wlt.php?a=compslist&site=' + window.location.host;

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                baseData = data;
                baseData.timeout = new Date().getTime();
                window.localStorage.setItem('walataoExpressBaseData_' + siteName, JSON.stringify(baseData));
                bindBaseData();
                console.log('request express success!');
            }
        });
    };

    var requestCallBack = function(data) {
        console.log(data);
    };

    var bindBaseData = function(data) {
        var i, l, str = '';
        currentItem = $('#inputPanel .title_widget li.cur').attr('data-link');
        if(baseData.data[currentItem] === undefined) {
            $('#inputPanel .content_widget ul').html('<li>暂无数据</li>');
            return;
        }
        $('#expressInputPanel #inputPanel .content_widget a.page')[baseData.data[currentItem].length > 15 ? 'show' : 'hide']();
        $.each(baseData.data[currentItem].subArray(currentPage[index] * 15, (currentPage[index] + 1) * 15), function(idx, it) {
            str += '<li><a href="http://go.walatao.com/jump.php?id=' + (new KISSY_Base64()).encode(encodeURI(it.website)) + '" target="_blank" title="' + it.name + '" >' + (/.*[\u4e00-\u9fa5]+.*$/.test(it.name) && it.name.length > 6 ? it.name.substring(0, 5) + '...' : it.name.length > 10 ? it.name.substring(0, 10) + '...' : it.name) + '</a></li>';
        });
        $('#inputPanel .content_widget ul').html(str);
        typeof clickCallBack === 'function' && $('#inputPanel .content_widget li a').off('click').on('click', function() {
            clickCallBack(baseData.data[currentItem][currentPage[index] * 15 + $(this).parent().index()]);
            autoClose && closeWidget();
            return false;
        });
        changeBtn();
    };

    var bindEvent = function() {
        $('#expressCompany').off('click').on('click', function() {
            $('#inputPanel').toggle();
        });
        $('#expressInputPanel .tips .close').off('click').on('click', function() {
            $('#expressInputPanel').hide();
        });
        $('#expressInputPanel #inputPanel .close').off('click').on('click', function() {
            $('#expressInputPanel #inputPanel').hide();
        });
        $('#expressInputPanel #inputPanel .title_widget li').off('click').on('click', function() {
            $('#expressInputPanel #inputPanel .title_widget li').removeClass('cur');
            $(this).addClass('cur');
            index = $(this).index();
            bindBaseData();
        });
        $('#expressInputPanel #inputPanel .content_widget a.page').off('click').on('click', function() {
            changePage(+$(this).attr('page'));
        });
    };

    var changePage = function(_num) {
        var maxPage = Math.floor(baseData.data[currentItem].length / 15);
        if(currentPage[index] === 0 && _num === -1) return;
        if(currentPage[index] === maxPage && _num === 1) return;
        currentPage[index] = Math.max(Math.min(currentPage[index] += _num, maxPage), 0);
        bindBaseData();
        changeBtn();
    };

    var changeBtn = function() {
        var maxPage = Math.floor(baseData.data[currentItem].length / 15);
        if(currentPage[index] === maxPage) {
            $('#inputPanel .content_widget a.page.nextPage').addClass('grey');
            $('#inputPanel .content_widget a.page.prevPage').removeClass('grey');
        } else if(currentPage[index] === 0) {
            $('#inputPanel .content_widget a.page.prevPage').addClass('grey');
            $('#inputPanel .content_widget a.page.nextPage').removeClass('grey');
        }
    };

    var expressComps = {
        'usps'  :   'USPS',
        'fedex' :   'Fedex',
        'ups'   :   'UPS',
        'dhl'   :   'DHL(国际)',
        'dhlde' :   'DHL(德国)',
        'bpost' :   '比利时邮政',
        'apex'  :   '易客满(美亚直邮)',
        'yama'  :   '日本黑猫(Yamato)',
        'jpost' :   '日本邮便',
        'sagawa':   '日本佐川急便',
        'seino' :   '日本西浓运输',
        'ontrac':   'ONTRAC'
    };

    return {
        init: init,
        openPanel: openPanel,
        closePanel: closePanel,
        togglePanel: togglePanel,
        expressComps: expressComps
    };
})();

//扩展数组方法
Array.prototype.subArray = function(_beginIdx, _endIdx) {
    var i, l, arr = [];
    if(!_beginIdx && _beginIdx !== 0) return arr;
    if(this.length < _endIdx) _endIdx = this.length;
    for(i = _beginIdx, l = _endIdx || this.length; i < l; i ++) {
        arr.push(this[i]);
    }
    return arr;
};






KISSY.add('wltaoPopup_mfd_1',
function(KS, MU){
	var _MAX_NUM 	= 8,	//最多显示数量
		isMfdUser 	= false,
		isLogin 	= false,
		userid 		= 0,
		orderData 	= [],
		domHtml 	= '',
		isUsed 		= false,
		isLoginUpdate	= false,
		curOrderCtn = 0;	//当前订单数
	//页面元素
	var mfdDiv, contDivs, listDiv, noListDiv, notMfdDiv, loadingDiv, noMfdLoginTip;
	
	//物流状态
	var shipStatus 	=	['未发货', '部分发货', '全部发货', '部分转运', '全部转运'],
		otherOps 	=	['获取物流单号', '订单页截图'];
	
	/** 初始化各个元素 **/
	var initElesAndEvnts = function(){
		KISSY.ready(function(){
			mfdDiv 		= KS.one('#wltao_popup_mfd'),
			contDivs 	= KS.all('.wltao_popup_mfd_cont'),
			listDiv 	= KS.one('#wltao_popup_mfd_list'),
			noListDiv 	= KS.one('#wltao_popup_mfd_nolist'),
			notMfdDiv 	= KS.one('#wltao_popup_mfd_nomfd'),
			loadingDiv 	= KS.one('#wltao_popup_loading'),
			noMfdLoginTip = KS.one('.wltao_popup_mfd_loginlink');
			//console.log(loadingDiv);
			isLogin = checkIsLogin();
			//绑定登录态变化
			KS.one("body").on("loginStatusUpdate", function() {
				check();
				isLogin = checkIsLogin();
				isLoginUpdate && init(true);
				console.log('===loginStatusUpdate==='+isLogin);
			});
			//登录
			KS.all('.wltao_popup_mfd_loginlink').on('click', function(){
				window.wltaoLogin.login();
			});
		});
	}
	
	/** 初始化密封代用户面板 **/
	var initMfd = function(){
		//处理获取订单数据
		var proccessData = function(data, extra){
			if( !KS.isArray(data) ) return {};
			var num = data.length, item;
			var order, orderlist = {orderList:[]},
				addtime, shipstatus, trans_status, orderStatus = 0, otherop, otherop1='', orderlink, picLink,
				piclinkshow,
				orderlinkBase = {
					'100': 'https://www.amazon.com/gp/your-account/order-details/?ie=UTF8&orderID=',
					'101': 'https://www.amazon.co.jp/gp/your-account/order-details/?ie=UTF8&orderID='
				};
			for(var i=0; i<num; i++){
				piclinkshow = 'none',
				item 		= data[i],
				addtime 	= new Date(item.ord_addtime*1000).Format("yyyy-MM-dd hh:mm:ss"),
				orderStatus = item.ord_orderstatus,
				shipstatus 	= shipStatus[orderStatus],
				otherop 	= orderStatus<2 ? otherOps[0] : otherOps[1],
				orderlink 	= orderlinkBase[item.ord_refer] ? orderlinkBase[item.ord_refer] + item.ord_orderid : '#';
				if( item.ord_screenshot_info!='' && orderStatus>=2 ){
					picLink = wltao_tools.toJsonObj(item.ord_screenshot_info);
					picLink = extra ? extra+picLink['shot_picfile'] : '';
					piclinkshow = 'block';
					otherop1	= '查看上次截图';
				}
				order = {
					orderid : 		item.ord_orderid,
					addtime : 		addtime,
					ship_status : 	shipstatus,
					other_op : 		otherop,
					order_link :	orderlink,
					piclink_show :	piclinkshow,
					pic_link :		picLink,
					other_op1 :		otherop1
				};
				orderlist.orderList.push(order);
				curOrderCtn ++;
			}
			//console.log('=====proccessData=======', orderlist);
			return orderlist;
		}
		
		//绑定操作
		var bindOps = function(){
			//删除按钮
			var bindDelBtn = function(){
				KS.one('.wltao_btn_confirm').on('click', function(){
					oid = KS.one(this).attr("oid");
					reqUrl = reqUrlBase + 'uid/' + userid + '/oid/' + oid;
					KS.io.get(reqUrl, function(rs){
						if( rs.errcode==0 ){
							curOrderCtn --;
							KS.one('tr[oid='+oid+']').hide();
							curOrderCtn <= 0 && showNoOrds();
						}
						KS.one("#wltao_del_confirm").remove();
					});
					return false;
				});
			}
			
			var reqUrlBase = 'http://api.walatao.com/tp/index/mfd/del/', oid;
			var tip = '<div id="wltao_del_confirm" style="right:{{right}}px;top:{{top}}px;" class="wltao-clearfix"><div class="wltao_btn_cancel wltao-stat" data-stat="icon.mfd.del_cancel">取消</div><div class="wltao_btn_confirm wltao-stat" data-stat="icon.mfd.del_confirm" oid="{{oid}}">确定</div><div class="wltao_del_text">确定删除这条订单吗？</div></div>';
			KS.Event.delegate("body", "click", ".td_dellink", 
			function(obj) {
				var delDiv = KS.one("#wltao_del_confirm");
				delDiv && delDiv.remove();
				oid = KS.one(obj.target).attr("oid");		
				var d = KS.one(obj.target).offset(),
				f = MU.to_html(tip, {
					oid: oid,
					top: d.top - 22,
					right: KS.one(document).width() - d.left + 10
				});
				KS.one("body").append(f);
				bindDelBtn();
			});
		}		
				
		//密封代列表模板
		;(function(){
			var mfdTpl = window.Wla_wltao.template.popMfdTable,
				reqUrl = 'http://api.walatao.com/tp/index/mfd/orders/page/0/type/-1/ctn/'+_MAX_NUM+'/uid/'+userid;
			//获取密封代订单数据
			KS.io.get(reqUrl, function(rs){
				showLoading(0), contDivs.hide();
				if( rs.errcode!=0 || !rs.data.orders ) showNoOrds();
				else{
					//console.log(rs.data.orders);
					orderData = proccessData(rs.data.orders, rs.data.shot_path_link);
					listDiv.html(domHtml = MU.to_html(mfdTpl, orderData)).show();
					bindOps();
				}
			});
		})();
	}

	/** 无订单面板展示 **/
	var showNoOrds = function(){
		showLoading(0),contDivs.hide();
		noListDiv.show();
	}
	
	/** 展示非密封代用户面板 **/
	var showNoMfd = function(){
		showLoading(0), contDivs.hide();
		notMfdDiv.show();
		!isLogin ? noMfdLoginTip.show() : noMfdLoginTip.hide();
	}
	
	/** 加载中 **/
	var showLoading = function(t){
		t==1 && loadingDiv.show();
		t==0 && loadingDiv.hide();
		return ;
	}
	
	/** 初始化密封代用户面板 **/
	var init = function(isLoginUp){
		if( isUsed && !isLoginUp ) return false;
		//未登录
		if( !isLogin ){
			//console.log('init--没登录');
            KISSY.one('.wltao_popup_mfd_nomfd p').css('display', 'block');
            isUsed = isLoginUpdate = true;
			showNoMfd();
			return false;
		}
		isUsed = isLoginUpdate = true;
        KISSY.one('.wltao_popup_mfd_nomfd p').css('display', 'none');
		//console.log('init--已登录');
		//加载中
		showLoading(1);
		if( (userid = wltao_tools.getUserId())<=0 ) return false;
		//请求检测密封代权限
		var checkMfd = 'http://we.walatao.com/account/ajax/check_auth/?type=mfd&uid=' + userid;
		KS.io.get(checkMfd, function(rs){
			var info = wltao_tools.toJsonObj(rs);
			(isMfdUser = info.result=='1') ? initMfd() : (showLoading(0),showNoMfd());
		});
	}

	var check = function(){
		var chkWhite = 'https://api.walatao.com/tp/?c=mfd&a=whitelist_new';
		KS.io.get(chkWhite, {
			uid: (userid = wltao_tools.getUserId())
		},function(rs){
			if( rs.iswhite )
				KS.one('#wltao_pop_tab_li_mfd').show();
			else
				KS.one('#wltao_pop_tab_li_mfd').hide();
		});
	}
	
	var f = function(){}
	
	//初始化各个元素与事件
	initElesAndEvnts();
	return	KS.augment(f, {
				init: init,
				check: check
			}), f;
},
{
    requires: ['mu']
});


KISSY.ready(function(){
	var a = KISSY,
    b = a.DOM,
    c = (a.Event, a.all);
	c("body").delegate("click", "#wltao_pop_tab_li_mfd", function(){
		KISSY.use("wltaoPopup_mfd_1", function(a,b){var mfd = new b; mfd.init();});
	});
});