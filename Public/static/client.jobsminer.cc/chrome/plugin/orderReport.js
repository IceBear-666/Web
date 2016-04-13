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
            phone = btn.parent().parent().parent().parent().parent().parent().one('[data-a-popover]').attr('data-a-popover');   
            phone = JSON.parse(phone);
            var h = phone.inlineContent;
            var a = h.indexOf('Phone:');
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
        var a = KISSY.all("#ctl00_MainHolder_enumIddpl option"),
            b = KISSY.all("#ctl00_MainHolder_shippingNamedpl option")
        ;
        for (var i = a.length - 1; i >= 0; i--) {
            if( a[i].innerText == decodeURIComponent(arg.warehouse) ){
                KISSY.one("#ctl00_MainHolder_enumIddpl").val(a[i].value);
                break;
            }
        };
        for (var i = b.length - 1; i >= 0; i--) {
            if( b[i].innerText.toLowerCase() == arg.foreignShip.toLowerCase() ){
                KISSY.one("#ctl00_MainHolder_shippingNamedpl").val(b[i].value);
                KISSY.one("#ctl00_MainHolder_shippingOrdertb").val(arg.shipNum);
                break;
            }
        };
        arg.allPrice && KISSY.one("#ctl00_MainHolder_pricetb").val( new Number(arg.allPrice*6.1196).toFixed(2) );
        var html = '';
        for (var i = arg.itemList.length - 1; i >= 0; i--) {
            html += decodeURIComponent(arg.itemList[i].name) + ' ' + arg.itemList[i].num + ' ';
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
KISSY.add("transAddpack", function(S, MB, MU){
    var DOM = S.DOM, $$ = S.all;
    function d(e){
//console.log(e+' transAddpack is running...');
        call(e);
		
    }
    
    function call(func) { 
        showmsgs[func](); 
    }
	
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
	
	//美亚
	var amazon = function(){
 		try{
			var trackBtn = ['.track-package-button'], j = 0,
				packDivs = $(trackBtn[j]).parents('.shipment'),
				ctn = packDivs.length,
				buttons = '',
				packDiv,
				btnstack,
				proName = '',
				shipNum = '',
				shipComp = '',
				shipPhone = '',
				transComp = '',
				transCompname = '';
					
			var tmpArr = [], i;			
			for(i=ctn-1; i>=0; i--){
				tmpArr[i] = {};
				try{
					packDiv = packDivs[i];
					proName = $(packDiv).find('.a-box-inner .a-fixed-right-grid .a-fixed-left-grid-col').eq(1).text();
					proName = proName.split('Sold by');
					tmpArr[i]['proName'] = proName = $.trim(proName[0]);
					btnstack = $(packDiv).find('.a-fixed-right-grid-col .a-button-stack');
		
					shipPhone = $(packDiv).siblings("div").find('[data-a-popover]').attr('data-a-popover');
					shipPhone = shipPhone.split('Phone:');
					shipPhone = $.trim($.trim(shipPhone[1]).substr(2,8));
					
					transComp = window.Wla_wltao.wltal_shipphone ? window.Wla_wltao.wltal_shipphone[shipPhone] : null;
					tmpArr[i]['transCompname'] = transCompname = transComp!=undefined ? transComp['company'] : '';
					tmpArr[i]['transComp'] = transComp = transComp!=undefined ? transComp['companyid'] : '';

					buttons = '<span class="a-button wl-track-package-button" id="wltao-track-button-span-'+(ctn-1-i)+'" style="width: 100px;display: inline-block; margin-right: 5px;"><span class="a-button-inner" style="background: #18b4f0;"><a id="wltao-track-package-button-'+i+'" href="javascript:void(0);" class="a-button-text" role="button" style="color: #ffffff;">跟踪该运单</a></span></span>' +
					
					'<span class="a-button wl-track-package-button" id="wltao-report-button-span-'+(ctn-1-i)+'" style="width: 115px;display: none; margin-right: 0px;"></span>';
					
					tmpArr[i]['btnId'] = '#wltao-track-package-button-'+i;
					btnstack.prepend(buttons);
					
					tmpArr[i]['link'] = $(packDiv).find(trackBtn[j]).find('a').attr('href');
					
					//获取订单号
					var tmpdiv = $(packDiv).siblings('.order-info').eq(0);
					tmpArr[i]['orderId'] = $.trim(tmpdiv.find('.a-col-right .a-color-secondary ').eq(1).text())
					
				}
				catch(e){
					console.log(e);
					continue;
				}
			}
			
			//请求获取计算跟踪URL
			var requestHash = function(idx){
				$.ajax({
					url: tmpArr[idx]['link'],
					success: function(cont){
						var str = cont.replace(/<[^>]+>/g, '');
						//查找获取运单号
						var tmp = str.split('Tracking #:');
						if( tmp.length > 1 ){
							tmp = $.trim(tmp[1]);
							tmp = tmp.split(' ');
							shipNum = $.trim(tmp[0]);
						}
						//查找获取国外快递
						tmp = str.split('Carrier:');
						if( tmp.length > 1 ){
							tmp = $.trim(tmp[1]);
							tmp = tmp.split(' ');
							shipComp = $.trim(tmp[0]);
						}
						
						var base64 = new KISSY_Base64();
						var param = 'proname=' + encodeURIComponent(tmpArr[idx]['proName'].substr(0, 50)) + '&shipnum=' + encodeURIComponent(shipNum) + '&shipcomp=' + shipComp + '&transcomp=' + tmpArr[idx]['transComp'] + '&transcompname=' + tmpArr[idx]['transCompname'];
						
						param = base64.encode(param);
						var url = 'http://open.walatao.com/coop/trace.php?hash=' + encodeURIComponent(param);
						$(tmpArr[idx]['btnId']).attr('href', url).attr('target', '_blank');
						
						//包裹运单信息赋值给密封代
 						var oid = tmpArr[idx]['orderId'], pakInfo, packNum;
						if( pakInfo = _wlt_mfd_Obj_.orderData[oid].ord_packinfo ){
							packNum = pakInfo.length;
 							for(var pi=0; pi<packNum; pi++){
								if( undefined!=pakInfo[pi].packid && pakInfo[pi].packid==idx ){
									pakInfo[pi].shipnum = shipNum;
									pakInfo[pi].shipcomp = shipComp;
									pakInfo[pi].transcomp = tmpArr[idx]['transComp'] ? tmpArr[idx]['transComp'] : shipComp;
									_wlt_mfd_Obj_.orderData[oid].ord_shipnum.push(shipNum+','+pakInfo[pi].transcomp);
									break;
								}
							}
						}
						//console.log('----done-----'+idx+'--'+oid, pakInfo);
						iDX--;
					},
					error: function(){}
				});
			}
			
			//循环按钮复制
			var iDX;
 			for(iDX=i=ctn-1; i>=0; i--){
				requestHash(i);
			}
			
		}
		catch(err){
			console.log(err);
		}
	}
	
    var showmsgs = {
        'haidaibao': hdb,
		'amazon': amazon
    }
	
    return d;
},
{
    requires: ["menubutton", "mu", "wltao-popAddPack", "wltaoMFD"]
});