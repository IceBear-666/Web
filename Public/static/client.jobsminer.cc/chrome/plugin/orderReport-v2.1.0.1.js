KISSY.add("quickOrderReport", function(a, b, c, d){
	var html = '<div   class="wltao_quick_order_report_{{index}} wltao_font wltao_tips wltao_triangle wltao_triangle_{{website}} {{triangle}} {{foldStatus}}" style="left:{{left}}px; top:{{top}}px;display:none;"><div class="wltao_tips_title wltao_quick_order_report"><span class="wltao_tips_left"><a class="wltao_quick_order_report_{{index}}_a wltao-stat" data-stat="web.quick.order.report.click" style="font-size:10px;line-height:32px;color:#ddd;TEXT-DECORATION:underline" href="javascript:void(0);" target="view_window">预报到{{tran_company}}</a><i></i></span></div><div class="wltao_quick_order_report_tip" style="left: -305px; top: -36px; z-index: 20000; visibility: visible;"><div class="ks-contentbox ">瓦拉淘专属运单一键预报功能，点击此功能将为您的购买项目自动填写转运公司的预报单</div></div></div>';
	var htmlNew = '<span class="a-button-inner wltao_quick_order_report_{{index}} wltao_triangle_{{website}} {{triangle}} {{foldStatus}}" style="background: #18b4f0;"><a href="javascript:void(0);" class="a-button-text wltao_quick_order_report_{{index}}_a wltao-stat" role="button" style="color: #ffffff;" data-stat="web.quick.order.report.click">预报到{{tran_company_name}}</a></span>';
	
    var hdlg = {
        draggable: !0,
        elCls: "wltao_dialog wltao_font",
        prefixCls: "wltao-ks-",
        headerContent: "瓦拉淘运单一键预报",
        bodyContent: '<div class="wltao_empty_auto_addtracker_div"></div>',
        mask: !1,
        closeAction: "hide",
        align: {
            overflow: {
                adjustX: 1,
                adjustY: 1
            },
            offset: [0, -70],
            points: ["cc", "cc"]
        },
        aria: !0
    };

    var shipCompanyList = null;
    var foreignShipCompanyList =  [{"kdname":"请选择境外物流", "kdvalue":"wlzy"},{ "kdname":"USPS", "kdvalue":"usps"}, {"kdname":"UPS", "kdvalue":"ups"}, {"kdname" :"Fedex", "kdvalue" :"fedex"}, {"kdname" : "美国DHL", "kdvalue" : "dhl"}];
    function initshipcompany(){
        var z1 =  window.Wla_wltao.wltal_kuaigenzong ;
        var z2 =  window.Wla_wltao.wltal_shipphone; 
        var smap = Array();
        shipCompanyList = Array();
        shipCompanyList.push({"kdname" : "请选择转运公司", "kdvalue" : "wlzy"});
        if(z1 && z1.supportlist){
            for(var i = 0; i < z1.supportlist.length; i++){
                smap[z1.supportlist[i].kdname] = z1.supportlist[i].kdvalue;
            }
        }

        smap['其它'] = 'wlzy';
        var count = 0;
        for(var key in smap){
            shipCompanyList.push({"kdname":key, "kdvalue":smap[key]});
        }
    }

	function g(a){
		var ret = "";
		for(var i  = 0; i < a.length; i++){
			if(a.charAt(i) <'0' || a.charAt(i) > '9')
				continue;
			ret += a.charAt(i);
		}
		return ret;
	}

	var s_index = 0;
	function showorhide(dd, o){
		if(dd.css("visibility") != "visible"){
			KISSY.one(".wltao_quick_order_report_" + o.index).hide();
		}else{
			KISSY.one(".wltao_quick_order_report_" + o.index).show();
		}
	}	

	function get_trans_ship_idx(tran_company){
		for(var i = 1; i  < shipCompanyList.length; i++){
			if(shipCompanyList[i].kdname == tran_company){
				return i;
			}
		}
		return 0;
	}

	function get_foreign_ship_idx(ship_company){
        if('SMARTPOST' == ship_company)
            ship_company = 'Fedex';
		for(var i = 1; i < foreignShipCompanyList.length; i++){
			if(foreignShipCompanyList[i].kdname == ship_company ){
				return i;
			}
		}
		return 0;
	}

	function f(a, o, cr){
        var btn = a;
        var DOM = KISSY.DOM,Event = KISSY.Event;
        //showorhide(btn.one('.track-package-button'), o);
        var old = btn.one('.track-package-button').css("visibility");
        setInterval(function(a){
            try{
                 var newstate = btn.one('.track-package-button').css("visibility");
                 if(newstate != old){
                    showorhide(btn.one('.track-package-button'), o);    
                 }
                 old = newstate;
            }catch(err){}
        }, 500); 

		Event.on(".wltao_quick_order_report_" + o.index + " i",'mouseenter mouseleave', function(e) {
            DOM.toggleClass(".wltao_quick_order_report_" + o.index,"enter");
            /*if( KISSY.one(".wltao_quick_order_report_" + o.index).hasClass("enter") ){
                var reportDiv = KISSY.one(".wltao_quick_order_report_" + o.index);
                var reportOffset = reportDiv.offset();
                reportDiv.one(".wltao_quick_order_report_tip").css({"top":reportOffset.top - 45});
            }*/
        });

		KISSY.one(".wltao_quick_order_report_" + o.index + "_a").on('click', function(b){
			var tracker_num = cr[2];
            if( !tracker_num ){
                var aDiv = KISSY.one(this).parent().parent().parent().all('.wltao-stat');
                for( var i = 0; i < aDiv.length; i++ ){
                    if(KISSY.one(aDiv[i]).html() == '跟踪该运单' ){
                        var newinfo = KISSY.one(aDiv[i]).attr('data-stat');
                        newinfo = 'amazon.usa.orderlist.track.btn&trackinfo=fedex__633980319886__zyb'.split('trackinfo=')[1]; 
                        newinfo = newinfo.split('__');
                        tracker_num = newinfo[1];
                        cr[5] = newinfo[0];
                        break;
                    }
                }
            }
			var ship_phone = cr[3];
			try{
				var item = btn.parent().parent().parent().parent().parent().parent();
                var phone = item.one('[data-a-popover]').attr('data-a-popover');   
                phone = JSON.parse(phone);
                var h = phone.inlineContent;
                var inputHtml = {}, currencyArr = {'￥':'108.49','eur':'1.2888','$':'1'};
                inputHtml.foreignShip = cr[5];
                inputHtml.LASTNAME = KISSY.trim((h.match(new RegExp("displayAddressFullName\"\>([^<]*)[\<?]?"))[1]).split(' ')[1]);
                inputHtml.shipNum = tracker_num;
                var warehouseArr = window.Wla_wltao.wltal_shipphone ? window.Wla_wltao.wltal_shipphone[ship_phone]:null;
                inputHtml.warehouse = warehouseArr ? encodeURIComponent(warehouseArr['warehouse']) : '';
                inputHtml.itemList = [];
                if( item.all('.shipment.a-box').length > 1 ){
                    var itemName = btn.parent().parent().parent().parent().parent().all(".a-fixed-left-grid .a-col-right");
                    inputHtml.allPrice = '';
                }else{
                    var itemName = item.all(".a-fixed-left-grid .a-col-right");
                    var singlePrice = KISSY.trim(item.one('.order-info .a-span2 span.value').html()).replace(/[^0-9.,]+/ig,"").replace(',','.');
                    var currency = currencyArr[KISSY.trim(item.one('.order-info .a-span2 span.value').html().replace(/[^a-z￥$]+/ig,"").toLowerCase())];
                    inputHtml.allPrice = singlePrice*currency;
                    if( itemName.length == 1 ){
                        singlePrice = singlePrice*currency;
                    }else{
                        var singlePrice = '';
                    }
                }
                
                for (var i = 0; i < itemName.length; i++) {
                    var namehtml = KISSY.trim(KISSY.one(itemName[i]).one('.a-link-normal').html()).toLowerCase().split("of");
                    if( !isNaN(namehtml[0]) ){
                        var name = namehtml[1] ? namehtml[1] : namehtml[0];
                        var num = namehtml[1] ? namehtml[0] : 1;
                    }else{
                        var name = namehtml.join("of");
                        var num = 1;
                    }
                    
                    inputHtml.itemList[i] = {};
                    inputHtml.itemList[i].itemclass = '';
                    inputHtml.itemList[i].name = encodeURIComponent(KISSY.trim(name).replace("/\'/ig","\\'"));
                    inputHtml.itemList[i].singlePrice = singlePrice;
                    inputHtml.itemList[i].currency = 'dolar';
                    inputHtml.itemList[i].num = KISSY.trim(num);
                }
                inputHtml = JSON.stringify(inputHtml);
                console.log(inputHtml);
                wltao_tools.setBackgroundLocalStore({"wala_autoAddReceipt":inputHtml});
                //localStorage.wala_autoAddReceipt = inputHtml;
                if( cr[4] != '转运四方' && cr[4] != '笨鸟快递' ){
                    window.open(warehouseArr["url"]);
                }else{
                    var qor = DOM.create('<form>', { 
                        method: 'post',
                        id : '4px',
                        action: warehouseArr["url"],
                        style : 'display:none;',
                        target: '_blank'
                    });
                    KISSY.one('body').append(qor);
                    KISSY.one('#4px').html('<input value=' + inputHtml + ' name="wlInfo" id="wlInfo" /><input type="submit" id="su" value="提交" class="bg s_btn">');
                    if(document.all) {
                        document.getElementById("su").click();
                    }
                    // 其它浏览器
                    else {
                        var e = document.createEvent("MouseEvents");
                        e.initEvent("click", true, true);
                        document.getElementById("su").dispatchEvent(e);
                    }
                    KISSY.one('#4px').remove();
                }
			}catch(err){}
		})			
	}

 
	function checkQuickReport( a, o ){
        var btn = a;
        var foreign_ship = '';
        var tracker_num = '';
        var ship_phone = '';
        var tans_ship_company = '', tans_ship_company_idx = '', forein_ship_idx = '';
        try{
            var foreign = btn.one('.a-declarative') && btn.one('.a-declarative').attr('data-show-tracking-details');
            if( foreign ){
                foreign = JSON.parse( foreign );
                foreign_ship = foreign[0].ajaxParams.carrierID;
                tracker_num = foreign[0].ajaxParams.trackingNum;
                forein_ship_idx = get_foreign_ship_idx(foreign_ship);
            }
            var phone = '';             
            phone = btn.parent('.shipment').siblings('.order-info').one('[data-a-popover]').attr('data-a-popover');   
            phone = JSON.parse(phone);
            var h = phone.inlineContent;
            var a = h.indexOf('Phone:');
			a = a<0 ? h.indexOf('電話番号：') : a;
            if(a > 0){
                a = h.substr(a + 6);
                var b = a.indexOf('<');
                if(b > 0){
                    a = a.substr(0,b);
                    ship_phone = g(a);  
                }
            }
            var l = ship_phone.length;
            if(l > 8)ship_phone = ship_phone.substr(l - 8);
            tans_ship_company = window.Wla_wltao.wltal_shipphone ? window.Wla_wltao.wltal_shipphone[ship_phone]:null;
            tans_ship_company = tans_ship_company['company'];
            tans_ship_company_idx = get_trans_ship_idx(tans_ship_company);
        }catch(err){}
        

        
        
        
        if(tans_ship_company != null){
            //查询物流轨迹
            var k = [];
            k.push(forein_ship_idx);
            k.push(tans_ship_company_idx);
            k.push(tracker_num);
            k.push(ship_phone);
            k.push(tans_ship_company);
            k.push(foreign_ship);
            return  k;
        }else{
            return 0;         
        }
	}

	function h(){
		var btnArr = KISSY.all(".a-button-stack");
        var boxArr = KISSY.all(".a-box-group");
        var rowArr = KISSY.all(".a-box-group .a-row");
        for(var i = 0; i < btnArr.length; i++){
			var btn = KISSY.one(btnArr[i]);
            if( !btn.one('.a-button-primary')  ){
                continue;
            }
            var showQuickReport = checkQuickReport( btn, i );
			if( !showQuickReport )
				continue;
            var a = {};
            a.width = btn.width();
            a.height = btn.height();

            var o = {};
            o.triangle = "left",
            o.text = "预报",
            o.pos = "top";  
            o.index = i;
            var e1 = btn.offset();
            o.left = e1.left + 200,o.top = e1.top ;
            o.tran_company = showQuickReport[4];
			o.tran_company_name = o.tran_company.length > 4 ? o.tran_company.substr(0, 4)+'...' : o.tran_company;
            wltao_tools.generateTemplateHtml(htmlNew, o, function(a){
				KISSY.one("#wltao-report-button-span-"+(i/2)).append(a).css('display', 'inline-block');
				f(btn, o, showQuickReport);
            });
            if( o.tran_company == "转运四方" ){
                var isHttps =  'https:' == document.location.protocol ? false : true;
                if( isHttps ){
                    var urlHeader = 'http://';
                }else{
                    var urlHeader = 'https://';
                }
                KISSY.io.get( urlHeader + "js.client.walatao.com/v9/svr/get_tracking.php?action=4px&DeliveryOrderNo=" + showQuickReport[2] + "&Index=" + i, function(a){
                    b = JSON.parse(a);
                    if( b.ResponseCode == 10000 ){
                        KISSY.one(".wltao_autu_tracker_" + b.Index).css("display",'block');
                        return 0;
                    }else{
                        KISSY.one(".wltao_quick_order_report_" + b.Index).css("display",'block');
                        KISSY.Stat("click=web.quick.order.report.show");
                    }
                });
            }else if( o.tran_company != null ){
                KISSY.one(".wltao_quick_order_report_" + i).css("display",'block');
                KISSY.Stat("click=web.quick.order.report.show");
            }
            i++;
		}
	}
	initshipcompany();
	;
	return h;
},
{
    requires: ["menubutton", "mu",  "overlay"]
}),
KISSY.add("autoAddReceipt", function(a, b, c){
     
    function d( e ){
        wltao_tools.getMessageFromBackground({
            operate: "getLocalStorage",
            data: {"key":"wala_autoAddReceipt"}
        },function(z){
			try{
				var a = typeof z === "object" && z.value ? JSON.parse(z.value) : {};
				call(e,a);
			}catch(e){}
        });
        
    }
    
    function call(functionName, arg) { 
        showmsgs[functionName](arg); 
    } 
    var showmsgs = { 
        zhuanyunbang: function (a) { 
            f(a);
        },
        uszcn: function (a) {
            g(a);
        },
        haidaibao: function (a) {
            h(a);
        },
        birdex: function (a) {
            i(a);
        },
        sfbuy: function (a) {
            j(a);
        }
    }

    function f(arg){
        var a = KISSY.all("#addform-house_id option"),
            b = KISSY.all("#addform-express_id option")
        ;
        for (var i = a.length - 1; i >= 0; i--) {
            if( a[i].innerText == decodeURIComponent(arg.warehouse) ){
                KISSY.one("#addform-house_id").val(a[i].value);
                break;
            }
        };
        for (var i = b.length - 1; i >= 0; i--) {
            if( b[i].innerText.toLowerCase() == arg.foreignShip.toLowerCase() ){
                KISSY.one("#addform-express_id").val(b[i].value);
                KISSY.one("#addform-express_no").val(arg.shipNum);
                break;
            }
        };
        //arg.allPrice && KISSY.one("#ctl00_MainHolder_pricetb").val( new Number(arg.allPrice*6.1196).toFixed(2) );
        //var html = '';
        for (var i = 0; i < arg.itemList.length; i++) {
            if( !KISSY.all(".tbl-newPackage tbody tr")[i+1] ){
                KISSY.one(".link-add").attr("id","wl_click")
                document.getElementById('wl_click').click();
            }
            var tr = KISSY.one(KISSY.all(".tbl-newPackage tbody tr")[i+1]);
            tr.one(".ipt-name").val(decodeURIComponent(arg.itemList[i].name));
            tr.one(".ipt-brand").val(decodeURIComponent(arg.itemList[i].name).split(" ")[0]);
            tr.one(".ipt-count").val(arg.itemList[i].num);
            if( arg.itemList[i].singlePrice != ''){
                tr.one(".ipt-price").val( arg.itemList[i].singlePrice );
            }
        };
        KISSY.one("#ctl00_MainHolder_goodsNametb").val(html);
    }

    function g(arg){
        var a = KISSY.all("#inbound_warehouse_id"),
            b = KISSY.all(".express_select option")
        ;
        for (var i = a.length - 1; i >= 0; i--) {
            if( a[i].innerText == decodeURIComponent(arg.warehouse) ){
                KISSY.one("#inbound_warehouse_id").val(a[i].value);
                break;
            }
        };
        for (var i = b.length - 1; i >= 0; i--) {
            if( b[i].innerText.toLowerCase() == arg.foreignShip.toLowerCase() ){
                KISSY.one(".express_select").val(b[i].value);
                KISSY.one("#inbound_express_tracking_number").val(arg.shipNum);
                break;
            }
        };
        var html = '';
        for (var i = arg.itemList.length - 1; i >= 0; i--) {
            if( !KISSY.all("#inbound_item_list tbody tr")[i] ){
                KISSY.one(".add_item_button").attr("id","wl_click")
                document.getElementById('wl_click').click();
            }
            var tr = KISSY.one(KISSY.all("#inbound_item_list tbody tr")[i]);
            tr.one(".item_name").val(decodeURIComponent(arg.itemList[i].name));
            tr.one(".item_brand").val(decodeURIComponent(arg.itemList[i].name).split(" ")[0]);
            tr.one(".item_amount").val(arg.itemList[i].num);
            if( arg.itemList[i].singlePrice != ''){
                tr.one(".item_unit_price").val( arg.itemList[i].singlePrice );
            }
        };
        KISSY.one("#ctl00_MainHolder_goodsNametb").val(html);
    }

    function h(arg){
        
        if( KISSY.one("#YuBao") || KISSY.one("#YuBao").css('display') == 'none' ){
            KISSY.one(".btn-info").attr("id","wl_click")
            document.getElementById('wl_click').click();
        }
        setInterval(function(){
            if( KISSY.one("#YuBao") && KISSY.one("#YuBao").css('display') != 'none' ){
                var a = KISSY.all("#inbound_warehouse_id"),
                    b = KISSY.all(".pop_con select option")
                ;
                for (var i = b.length - 1; i >= 0; i--) {
                    if( b[i].innerText.toLowerCase() == arg.foreignShip.toLowerCase() ){
                        KISSY.one(".pop_con select").val(b[i].value);
                        KISSY.one("#overpackages").val(arg.shipNum);
                        break;
                    }
                };
            }
        },500);
    }

    function i(arg){
        for (var i = arg.itemList.length - 1; i >= 0; i--) {
            if( !KISSY.all("#tabProduct .new")[i] ){
                KISSY.one(".Additional a").attr("id","wl_click")
                document.getElementById('wl_click').click();
            }
            KISSY.one("#txtDeliveryCode").val(arg.shipNum);
            var tr = KISSY.one(KISSY.all("#tabProduct .new")[i]);
            tr.one("input[name=productname]").val(decodeURIComponent(arg.itemList[i].name));
            tr.one("input[name=count]").val(arg.itemList[i].num);
            if( arg.itemList[i].singlePrice != ''){
                tr.one("input[name=price]").val( arg.itemList[i].singlePrice );
            }
        };
    }

    function j(arg){
        var a = KISSY.all("#3_container li"),
            b = KISSY.all("#2_container li")
        ;
        for (var i = a.length - 1; i >= 0; i--) {
            if( a[i].innerText == decodeURIComponent(arg.warehouse) ){
                KISSY.one("#3_input").val(a[i].innerText);
                break;
            }
        };
        for (var i = b.length - 1; i >= 0; i--) {
            if( b[i].innerText.toLowerCase() == arg.foreignShip.toLowerCase() ){
                KISSY.one("#2_input").val(b[i].innerText);
                KISSY.one("#trackingNo").val(arg.shipNum);
                break;
            }
        };
        /*for (var i = arg.itemList.length - 1; i >= 0; i--) {
            if( !KISSY.all("#tabProduct .new")[i] ){
                KISSY.one(".Additional a").attr("id","wl_click")
                document.getElementById('wl_click').click();
            }
            var tr = KISSY.one(KISSY.all("#tabProduct .new")[i]);
            tr.one("input[name=productname]").val(decodeURIComponent(arg.itemList[i].name));
            tr.one("input[name=count]").val(arg.itemList[i].num);
            if( arg.itemList[i].singlePrice != ''){
                tr.one("input[name=price]").val( arg.itemList[i].singlePrice );
            }
        };*/
    }

    return d;
},
{
    requires: ["menubutton", "mu",  "overlay"]
});



//console.log('transAddpack is running...');
KISSY.add("transAddpack", function(S, MB, MU, ORDSHIP){
    var DOM = S.DOM, $$ = S.all;

	//海带宝
	var hdb = function(){
		var addPackPop;
		var addLink = '', pack, container, tmp;
		var transcomp = 'hdb', transcompname = '海带宝',
			shipcomp, shipnum, transnum;
		setTimeout(function(){
			var packs = $$('#cup1 table');			
			(function(){
				var ctn = packs.length;
				for(var i=0; i<ctn; i++){						
					pack = $$(packs[i]);
					tmp = $$(pack.children('tr')[2]);
					tmp = $$(tmp.children('td')[1]);
					transnum = tmp.text();									
					addLink = '<div class="mg_l_10 fl"><a href="javascript:void(0);" style="color:red;" class="wltao_trans_hdb_packlink" shipnum="'+transnum+'">使用瓦拉淘跟踪此包裹</a></div>';
					container = S.one(pack.children('.ml20'));
					container.append(addLink);
				}

			})();
		}, 1000);
	}
	
	/** 亚马逊 **/
	var amazon = function(key){
		var isShippedByBtn = function(btn){
			var color_shipped = 'rgb(240, 193, 75)';
				//alert($(btn).css('background-color'));
			return color_shipped == $(btn).css('background-color');
		}
   		var genButton = function(packObj){
 			//var packBtn		=	$('#'+packObj.trackBtnId),
			var packBtn		=	$(packObj.trackBtn),
				packBtnSpan = packBtn.parents('.track-package-button').eq(0);
			if( !isShippedByBtn(packBtnSpan) ) return ;
			
			var	shipment	=	packBtn.parents('.shipment').eq(0),
				idx 		=	$('.track-package-button').parents('.shipment').index(shipment),
				btnStack 	= 	shipment.find('.a-fixed-right-grid-col.a-col-right .a-button-stack'),
				button,	//跟踪物流按钮，一键预报按钮
				link,		//跟踪物流按钮链接
				param,
				base64		=	new KISSY_Base64(),
				proName		=	shipment.find('.a-box-inner .a-fixed-right-grid .a-fixed-left-grid-col').eq(1).text(),
                btnId,
				shipComp;
 			proName 	= 	 $.trim(proName.split(amazonKeyInfo[key]['SOLD'])[0]);
			proName 	= 	 $.trim(proName.split(amazonKeyInfo['usa']['SOLD'])[0]);
	//console.log('----------wltao-orderAjaxShip-v15------', packObj);
			proName 	= 	 proName.replace('商品名：', '').replace('数量：', '');
			shipComp	=	amazonKeyInfo[key]['SHIPCOMPS'][packObj.shipComp] ? amazonKeyInfo[key]['SHIPCOMPS'][packObj.shipComp] : packObj.shipComp;
			param 		= 	'proname=' + encodeURIComponent(proName) + '&shipnum=' + encodeURIComponent(packObj.shipNum) + '&shipcomp=' + shipComp + '&transcomp=' + packObj.transComp + '&transcompname=' + encodeURIComponent(packObj.transCompName);
	//console.log('----------wltao-orderAjaxShip------', param);
			param 		=	base64.encode(param);
			var statinfo = shipComp+'__'+packObj.shipNum+'__'+packObj.transComp;
 			link 		= 	'http://open.walatao.com/coop/trace.php?hash=' + encodeURIComponent(param);
            btnId       =   'wl_track_btn_' + packObj.orderId + packObj.shipmentId;
            button      =   '<span class="a-button wl-track-package-button" style="width: 100px;display: inline-block; margin-right: 5px;" id="'+btnId+'"><span class="a-button-inner" style="background: #18b4f0;"><a class="a-button-text wltao-stat" data-stat="amazon.'+key+'.orderlist.track.btn&trackinfo='+statinfo+'" href="'+link+'" target="_blank" role="button" style="color: #ffffff;">跟踪该运单</a></span></span>';
            $('#'+btnId).size()>0 && $('#'+btnId).remove();
            btnStack.prepend(button);
        }
        
		//一键预报按钮
 		var genReportBtn = function(){
			if( $('#yourOrders').size()<=0 ) return false;
			var shipments	=	$('.track-package-button').parents('.shipment'),
				count		=	shipments.size(),
				btnStack,
                btnId,
				button;
			for(var i=0; i<count; i++){
				btnStack	=	shipments.eq(i).find('.a-fixed-right-grid-col.a-col-right .a-button-stack');
                btnId       =   'wltao-report-button-span-'+(count-i-1);
                button      =   '<span class="a-button wl-track-package-button" id="'+btnId+'" style="width: 115px;display: none; margin-right: 0px;"></span>';
                $('#'+btnId).size()>0 && $('#'+btnId).remove();
                btnStack.prepend(button);
            }
        }
		genReportBtn();
		
		var ordShip = new ORDSHIP(key);
		ordShip.pushCall(genButton, 'track');
		ordShip.ajaxCall(undefined, 'track');
	}
    var showmsgs = {
        'haidaibao'		: 	[hdb],
		'amazon'		: 	[amazon, 'usa'],
		'amazon.co.jp'	: 	[amazon, 'jp'],
		'amazon_hwg'	: 	[amazon, 'ch']
    }
	//亚马逊各国关键词配置
	var amazonKeyInfo 		= 	{
		'usa':	{
			'SOLD'	:	'Sold by',
			'SHIPCOMPS'		:	{}
		},
		'jp':	{
			'SOLD'	:	'販売:',
			'SHIPCOMPS'		:	{
				'yamato'	:	'yama',
				'japan'		:	'jpost'
			}
		},
		'ch':	{
			'SOLD'			:	'卖家:',
			'SHIPCOMPS'		:	{}
		}
	};
	var isAmazonHWG = function(key){
		return key=='amazon' && $('#controlsContainer').text().indexOf('订单')>-1 ? true : false;
	}
	var d = function(key) {
		key = isAmazonHWG(key) ? 'amazon_hwg' : key;
		
		var funcs = showmsgs[key];
		funcs[1] ? funcs[0](funcs[1]) : funcs[0](); 
	}
    return d;
},
{
    requires: ["menubutton", "mu", "wltao-orderAjaxShip-v15"]
});


////////////////////////////////////
console.log('wltao-orderAjaxShip-v15 js running...');
KISSY.add("wltao-orderAjaxShip-v15", function(KS){
	var JDom = $;
	var orderInfo_divs	=	JDom('.order-info'),	//订单信息div
		orderCtn		=	orderInfo_divs.size(),	//订单数量
		orderPack		=	{},
		ajaxCallbacks	=	{};
	
	var amazonKey	=	'usa';
	var setKey	=	function(key, keyInfo){
		amazonKey	=	key ? key : 'usa';
		if( key && JDom.isPlainObject(keyInfo) ){
			for(var k in keyInfo)
				amazonKeyInfo[key][k] = keyInfo[k];
		}
	}
	
	var _getQueryString	= function(name) {
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
		var r = window.location.search.substr(1).match(reg);
		if (r != null) return unescape(r[2]); return null;
    }
	
	//亚马逊各国关键词配置
	var amazonKeyInfo 		= 	{
		'usa':	{
			'PHONE_PREFIX'	: 	2,
			'TR_PHONE'		: 	'Phone:',
			'SOLD'			:	'Sold by',
			'TRACK'			:	'Tracking #:',
			'CARRIER'		:	'Carrier:',
			'ORDER'			:	'Order #:',
			'SHIPMENT'		:	'orderingShipmentId=',
            'SHIPMENT_1'    :   'shipmentId='
		},
		'jp':	{
			'PHONE_PREFIX'	: 	3,
			'TR_PHONE'		: 	'電話番号: ',
			'SOLD'			:	'販売:',
			'TRACK'			:	'お問い合わせ伝票番号:',
			'CARRIER'		:	'配送業者:',
			'ORDER'			:	'注文番号:',
			'SHIPMENT'		:	'orderingShipmentId=',
            'SHIPMENT_1'    :   'shipmentId='
		},
		'ch':	{
			'SOLD'			:	'卖家:',
			'PHONE_PREFIX'	: 	2,
			'TR_PHONE'		: 	'电话:',
			'TRACK'			:	'包裹号:',
			'CARRIER'		:	'配送商:',
			'ORDER'			:	'订单号:',
			'SHIPMENT'		:	'orderingShipmentId=',
            'SHIPMENT_1'    :   'shipmentId='
		}
	};
	
	/* 获取转运状态 */
	var _getTrans = function(orderDiv){
		try{
            //console.log('-----wltao-orderAjaxShip---_getTrans1--');
			var shipPhone = orderDiv.find('[data-a-popover]').attr('data-a-popover');
			shipPhone = shipPhone.split(amazonKeyInfo[amazonKey]['TR_PHONE']);
            //console.log('-----wltao-orderAjaxShip---_getTrans2--'+amazonKey, shipPhone);
			shipPhone = shipPhone.length>1 ? shipPhone : shipPhone[0].split(amazonKeyInfo['usa']['TR_PHONE']);
			shipPhone = JDom.trim(shipPhone[1].replace(/-/g, '')).substr(amazonKeyInfo[amazonKey]['PHONE_PREFIX'], 8);	
			var transCompInfo = window.Wla_wltao.wltal_shipphone ? window.Wla_wltao.wltal_shipphone[shipPhone] : null,
				transComp = transCompInfo ? transCompInfo['companyid'] : '',
				transCompName = transCompInfo ? transCompInfo['company'] : '';
			return [transComp, transCompName];
		}catch(e){
			return ['', ''];
		}
	}
	
	/* 获取页面的订单发货情况信息 */
	var getOrderPack = function(pageType){
		var shipments, shipment, shipLinkBtn, shipLink, isShipped, ordShipCtn, shipmentId,
			orderid, transComp, orderInfo_div,trackBtnId,
			i, j;
		if( 'list'===pageType ){
			//if( !JDom.isEmptyObject(orderPack) ) return ;
			for(i=0; i<orderCtn; i++){
				orderInfo_div 	= 	orderInfo_divs.eq(i);
				shipments 			= 	orderInfo_div.siblings('.shipment');
				if( shipments.find('.track-package-button').size()<=0 ) continue;
				orderid 			= 	JDom.trim(orderInfo_div.find('.a-col-right .a-color-secondary').eq(1).text());
				orderPack[orderid] 	= 	{};
				transComp			=	_getTrans(orderInfo_div);
				ordShipCtn 			= 	shipments.size();
				for(j=0; j<ordShipCtn; j++){
					shipment	=	shipments.eq(j),
					shipLinkBtn	=	shipment.find('.track-package-button a');
					if( shipLinkBtn.size()<=0 ) continue;
					shipLink	=	shipLinkBtn.eq(0).attr('href');
					isShipped 	= 	shipLink.indexOf('/') > -1 ? true : false;
                    var tmptmp  =   shipLink.split('orderingShipmentId=').length>1 ? shipLink.split('orderingShipmentId=') : shipLink.split('shipmentId=');
					var idx 	=	!isShipped ? j : tmptmp[1].split('&')[0];
					isShipped && (shipmentId = idx);
					trackBtnId 	= 	shipLinkBtn.eq(0).attr('id');
					//console.log('-----wltao-orderAjaxShip-----getOrderPack---'+orderid+'---'+idx+'---', shipLink.split('orderingShipmentId='));
					orderPack[orderid][idx] = {
						'trackBtnId'	:	trackBtnId,
						'trackBtn'		:	shipLinkBtn.eq(0),
						'isShipped'		:	isShipped,
						'shipLink'		:	shipLink,
						'transComp'		:	transComp[0],
						'transCompName'	:	transComp[1],
						'orderId'		:	orderid,
						'reqFlag'		: 	false,
					}
					//console.log('----------wltao-orderAjaxShip--------', orderPack[orderid][idx]);
				}
			}
		}
		else if( 'detail'===pageType ){
			//if( !JDom.isEmptyObject(orderPack) ) return ;
			shipments	=	JDom('.shipment');
			ordShipCtn 	= 	shipments.size();
			orderid 	= 	_getQueryString('orderID');
 			orderPack[orderid] 	= 	{};
			for(j=0; j<ordShipCtn; j++){
				shipment	=	shipments.eq(j),
				shipLinkBtn	=	shipment.find('.track-package-button a');
				if( shipLinkBtn.size()<=0 ) continue;
				shipLink	=	shipLinkBtn.attr('href');
				isShipped 	= 	shipLink.indexOf('/') > -1 ? true : false;
                var tmp_shipment = shipLink.split(amazonKeyInfo[amazonKey]['SHIPMENT']);
                tmp_shipment = tmp_shipment>1 ? tmp_shipment[1].split('&')[0] : shipLink.split(amazonKeyInfo[amazonKey]['SHIPMENT_1'])[1].split('&')[0];
				var idx 	=	!isShipped ? j : tmp_shipment;
				//isShipped && (shipmentId = shipLink.split(amazonKeyInfo[amazonKey]['SHIPMENT'])[1].split('&')[0]);
                isShipped && (shipmentId = idx);
				orderPack[orderid][idx] = {
					'trackBtnId'	:	shipLinkBtn.attr('id'),
					'isShipped'		:	isShipped,
					'shipLink'		:	shipLink,
/* 					'transComp'		:	transComp[0],
					'transCompName'	:	transComp[1], */
					'orderId'		:	orderid,
					'reqFlag'		: 	false,
				}
			}
		}
		//console.log('----------wltao-orderAjaxShip--------', orderPack);
		return ;
	}
	
	var callbacksApply = function(paramObj, callback, cbKey){
		typeof callback === 'function' && callback(paramObj);
		var callbacks = ajaxCallbacks[cbKey];
		if( callbacks && callbacks.length>0 ){
			for(var f in callbacks){
				typeof callbacks[f] === 'function' && callbacks[f](paramObj);
				//delete ajaxCallbacks[f];
			}
		}
		return ;
	}
	
	/* 异步请求获取页面的订单物流详情 */
	var ajaxPackDetail = function(callback, cbKey){
		if( JDom.isEmptyObject(orderPack) ) return false;
		
		var getShipFromHtml = function(cont){
			var str = cont.replace(/<[^>]+>/g, ''),
				shipNum,
				shipComp,
				orderId,
				shipmentId;
				
			//查找获取运单号
			var tmp = str.split(amazonKeyInfo[amazonKey]['TRACK']);
			shipNum = tmp.length > 1 ? JDom.trim(JDom.trim(tmp[1]).split(' ')[0]) : '';
			
			//查找获取国外快递
			tmp = str.split(amazonKeyInfo[amazonKey]['CARRIER']);
			shipComp = tmp.length > 1 ? JDom.trim(tmp[1]).split(',')[0] : '';
            shipComp = JDom.trim(shipComp.split(' ')[0]).toLowerCase();

			//查找获取订单号
			//tmp = str.split(amazonKeyInfo[amazonKey]['ORDER']);
			//orderId = tmp.length > 1 ? JDom.trim(JDom.trim(tmp[1]).split(' ')[0]) : '';
			tmp = cont.split('orderID=');
			orderId = tmp.length > 1 ? JDom.trim(tmp[1]).split('"')[0] : '';
			//console.log('-----wltao-orderAjaxShip-v15----orderId----', orderId);
			
			//查找获取shipmentid
			tmp = cont.split(encodeURIComponent(amazonKeyInfo[amazonKey]['SHIPMENT']));
            tmp = tmp.length>1 ? tmp : cont.split(amazonKeyInfo[amazonKey]['SHIPMENT']);
            tmp = tmp.length>1 ? tmp : cont.split(encodeURIComponent(amazonKeyInfo[amazonKey]['SHIPMENT_1']));
            tmp = tmp.length>1 ? tmp : cont.split(amazonKeyInfo[amazonKey]['SHIPMENT_1']);
            var tmptmp = escape(unescape(tmp[1]));
			shipmentId = tmp.length > 1 ? JDom.trim(tmptmp).split('%26')[0] : '';
			
			return {shipNum:shipNum, shipComp:shipComp, orderId:orderId, shipmentId:shipmentId};
		}
		
		var packinfo, shipid, oid;
		var _TO = {};
		var cb = function(oid, shipid){
			var id = oid+'-'+shipid;
			if( orderPack[oid][shipid].shipNum ) {
				clearTimeout(_TO[id]);
				//console.log('----wltao-orderAjaxShip-v15------done11-----'+cbKey+'---'+id, orderPack[oid][shipid]['trackBtnId']);
				callbacksApply(orderPack[oid][shipid], callback, cbKey);
			}
			else{
				//console.log('----wltao-orderAjaxShip-v15------done22-----'+cbKey+'---'+id, orderPack[oid][shipid]['trackBtnId']);
				//reqStats[oid][shipid] = orderPack[oid][shipid].shipNum
				_TO[id] = setTimeout(function(){cb(oid, shipid);}, 300);
			}
			return ;
		};
		for(oid in orderPack){
			for(shipid in orderPack[oid]){
				packinfo = orderPack[oid][shipid];
				//没发货不请求
				//if( !packinfo.isShipped ) continue;
				
				//已经有数据，回调不请求
				if( packinfo.reqFlag ){
					cb(oid, shipid);
					continue;
				}
				//console.log('----wltao-orderAjaxShip-v15---done----'+cbKey+'---', orderPack[oid][shipid].trackBtnId);
				orderPack[oid][shipid]['reqFlag'] = true;
				JDom.ajax({
					url: packinfo.shipLink,
					//async: false,
					success: function(cont){
						var tmp = getShipFromHtml(cont);
						var _packobj = orderPack[tmp.orderId][tmp.shipmentId] = KS.merge(orderPack[tmp.orderId][tmp.shipmentId], tmp);
						console.log('----------wltao-orderAjaxShip-v15------ajaxret-----cbKey----', tmp);
						//console.log('----------wltao-orderAjaxShip-v15------ajaxret----'+cbKey+'--');
						callbacksApply(_packobj, callback, cbKey);
					},
					error: function(){}
				});
			}
		}
	}
	
	/* 后台页面类型：订单列表，订单详情 */
	var _getPageType = function(){
		var types = ['list', 'detail'], idx;
		idx = KS.one('#yourOrders') ? 0 : 2;
		idx = KS.one('#orderDetails') ? 1 : idx;
		return types[idx];
	}
	
	/* 添加回调 */
	var pushCall = function(callback, cbKey){
		if( cbKey && !ajaxCallbacks[cbKey] ) ajaxCallbacks[cbKey] = [];
		typeof callback === 'function' && ajaxCallbacks[cbKey].push(callback);
		return ;
	}
	
	var init = function(key, keyInfo){
		var pt = _getPageType();
		amazonKey =	key ? key : 'usa';
	//console.log('----------wltao-orderAjaxShip-v15------amazonKey---------', amazonKey);
		keyInfo && (amazonKeyInfo[key] = keyInfo);
		JDom.isEmptyObject(orderPack) && getOrderPack(pt);
	};
	
	return KS.augment(init,{
		ajaxCall	: 	ajaxPackDetail,
		pushCall	: 	pushCall,
		callbacks	: 	ajaxCallbacks,
		setKey		:	setKey
	}), init;
});
