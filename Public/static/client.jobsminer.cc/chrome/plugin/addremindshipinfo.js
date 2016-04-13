KISSY.add("autoAddTracker_r", function(a, b, c, d){
    function showGetTrackerInfoTip(left, top, width, msg, times, cb, notneeddot) {
            try {
                var delay = 200;
                var bL = (times != 0);
                var times = times;
                var bQ = KISSY.one(".wltao-addtracker-getinfo-tooltip");
                if (bQ) bQ.remove();
                KISSY.one('body').append('<div class="wltao-addtracker-getinfo-tooltip" style="border-radius:3px; background-color:#18b4f0;color:White;border:1px;position:fixed;left:100px;top:20px;padding:5px;font-size:12px;width:100px;line-height:16px;z-index:9999;_position:absolute;_top:expression(eval(document.body.scrollTop+20));">' + msg + '.</div>');
                var bk = KISSY.one(".wltao-addtracker-getinfo-tooltip");
                bk.css("left", left);
                bk.css("top", top);
                bk.css("width", width);
                var ct = 0;
                bk.show();
                var id = setInterval(function() {
                    if (bL) {
                        times = times - delay;
                        if (times < 0) {
                                bk.remove();
                                KISSY.later(function(){
                                	clearInterval(id);
                                	cb();
                                });
                        }
                    }
                    ct = ct + 1;
                    ct = ct % 8;
                    var dotMsg = '';
                    if(!notneeddot)
                    {
                    	dotMsg = '.';
                    	for (var i = 1; i <= ct; i++) {
                        	dotMsg = dotMsg + ".";
                    	}
                    }	
                    bk.html(msg + dotMsg);
                }, delay);
            } catch (err) {console.log('err');};
        }



	var html = '<div   class="wltao_autu_tracker_{{index}} wltao_font wltao_tips wltao_triangle wltao_triangle_{{website}} {{triangle}} {{foldStatus}}" style="left:{{left}}px; top:{{top}}px;display:none;"><div class="wltao_tips_title wltao-stat" data-stat="web.stock.remind"><span class="wltao_tips_left">瓦拉淘运单跟踪</span><span class="wltao_tips_right"><a class="wltao_autu_tracker_{{index}}_a wltao-stat" data-stat="autoaddtracker-add" style="font-size:10px;line-height:32px;color:#ddd;TEXT-DECORATION:underline" href="javascript:void(0);" target="view_window">{{text}}</a></span></div></div>';
    var hdlg = {
        draggable: !0,
        elCls: "wltao_dialog wltao_font",
        prefixCls: "wltao-ks-",
        headerContent: "瓦拉淘运单跟踪",
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


	var dlg_html = '<div class="wltao_add_tracker_dlg" ' + 
						'<div style="margin: 12px 8px;"' + 
							'<span>境外物流：</span>'  + 
							'<span class="wltao_add_tracker_dlg_c" style="left:60px"></span>' +
						'</div>' +
						'<div   style="margin: 12px 8px;">' + 
							'<span>境外物流运单号：</span>'  + 
							'<span style="left:60px">' +
							     '<input type="text" placeholder="请输入运单号" class="wltao_add_tracker_dlg_n wltao_input" style="width:180px;margin-left: 26px;">' +
							'</span>' +
						'</div>' +
						'<div style="margin: 12px 8px;">' + 
							'<span>转运公司：</span>'  + 
							'<span class="wltao_add_tracker_dlg_z"  style="left:60px"></span>' +
						'</div>' +
						'<div style="margin: 12px 8px;">' + 
							'<span>添加备注：</span>'  + 
							'<span   style="left:60px">' + 
							    '<input type="text" placeholder="添加备注（限16个汉字）"  class="wltao_add_tracker_dlg_b wltao_input" style="width:180px;margin-left: 62px;"/>' +
							'</span>' +
						'</div>' +	
						'<div>' + 
							' <button class="wltao_auto_add_tracker_btn wltao_auto_add_tracker_cancel_btn wltao-stat" data-stat="autoaddtracker-cancel" style="margin-left:62px;width:60px">取消</button>' +	
							' <button class="wltao_auto_add_tracker_btn wltao_auto_add_tracker_submit_btn wltao-stat" data-stat="autoaddtracker-commit" style="margin-left:20px;width:60px">确认添加</button>' +	
						'</div>' +	
					'</div>';		

	var s_dlg_info = {};

	function newdlg(){
		   var db = {
                	width: 320,
                	height:260,
                	elCls: "wltao_dialog wltao_font wltao_auto_addtracker_elCls",
                	mask: !1,
                	bodyContent:dlg_html
                };
            db = KISSY.merge(hdlg, db);
            var g = new d.Dialog(db);
            g.show();
            s_dlg_info["dlg"] = g;
      
            var s1 = new b.Select({
                prefixCls: "wltao-",
                width: 176,
                srcNode: ".wltao_add_tracker_dlg_c",
                menuAlign: {
                    offset: [0, -1]
                },
                menuCfg: {
                    width: 176
                }
            });
            s_dlg_info["s1"] = s1;

            var shipC = foreignShipCompanyList;
            for(var i = 0; i < shipC.length; i++){
            	s1.addItem(new b.Option({
                	value: shipC[i].kdvalue,
                	prefixCls: "wltao-",
                	content: shipC[i].kdname
                }));
            }
        	s1.render();
            var s2 = new b.Select({
                prefixCls: "wltao-",
                width: 176,
                srcNode: ".wltao_add_tracker_dlg_z",
                menuAlign: {
                    offset: [0, -1]
                },
                menuCfg: {
                    width: 176
                }
            });

           
            for(var i = 0; i < shipCompanyList.length; i++){
            	s2.addItem(new b.Option({
                	value: shipCompanyList[i].kdvalue,
                	prefixCls: "wltao-",
                	content: shipCompanyList[i].kdname
                }));
            }
            s2.render();
            s_dlg_info["s2"] = s2;		

            KISSY.one(".wltao_auto_add_tracker_cancel_btn").on('click', function(){
            	g.hide();
            });

            KISSY.one(".wltao_auto_add_tracker_submit_btn").on('click', function(){
            	 console.log('here');
            	 var s1 = s_dlg_info.s1;
            	 var s2 = s_dlg_info.s2;
            	 if(s1.get('selectedIndex') == 0){
            	 	KISSY.one('.wltao_add_tracker_dlg_c').addClass('focus_boder');
            	 	return;
            	 }
            	 if(s2.get('selectedIndex') == 0){
            	 	KISSY.one('.wltao_add_tracker_dlg_z').addClass('focus_boder');
            	 	return;
            	 } 
            	 if(KISSY.one(".wltao_add_tracker_dlg_n").attr('value') == ''){
            	 	KISSY.one('.wltao_add_tracker_dlg_n').addClass('focus_boder');
            	 	return;
            	 }

            	 var shipcompany = s1.get('content');
            	 var zycompany = s2.get('content');
            	 var shipnumber = KISSY.one(".wltao_add_tracker_dlg_n").val();
            	 var bz = KISSY.one(".wltao_add_tracker_dlg_b").val();

				 var msg =	{
                        orderNum: 1,
                        time: new Date().getTime(),
                        trackRemark: bz,
                        shipComp: s1.get('value'),
                        shipNum: shipnumber,
                        shipStatus: "",
                        shipStatusText: "",
                        shipStatusShort: "",
                        transComp:s2.get('value'),
                        transCompStatus: "",
                        transShipNum: "尚未出单号",
                        transShipComp: "尚未出单号",
                        transShipNumTrue: "false",
                        transShipStatus: "",
                        transShipStatusText: "",
                        transShipStatusShort: "",
                        shipStatusRemind: bz,
                        iswltaoke: "false",
						transCompanyName:zycompany
                    };

                wltao_tools.getMessageFromBackground({operate:"addTrackerInfo", data:msg}, function(ccc){
                	 
                	checkmodifystatus(shipnumber, s_dlg_info["clickTarget"], true);
                })
                
            });

        	KISSY.one("body").on("click", 
        		function(a) {
		           	 var b = KISSY.one(a.target);
		           	 if(b && b.hasClass("wltao_auto_add_tracker_submit_btn")){

		           	 }else{
						KISSY.one('.wltao_add_tracker_dlg_c').removeClass('focus_boder');
            	 		KISSY.one('.wltao_add_tracker_dlg_n').removeClass('focus_boder');
            	 	    KISSY.one('.wltao_add_tracker_dlg_z').removeClass('focus_boder');
		           	 }

        		});            
	}

	function initdlg(foreign_ship_c_idx, trans_ship_c_idx, forein_ship_number, user_reminder){
			if(!s_dlg_info["dlg"]){
				newdlg();
			}
         
         	var s2 = s_dlg_info["s2"]
        	s2.set("selectedIndex", trans_ship_c_idx);

        	var s1 = s_dlg_info["s1"];
        	s1.set("selectedIndex", foreign_ship_c_idx);

        	var g = s_dlg_info["dlg"];
        	
        	KISSY.one(".wltao_add_tracker_dlg_b").attr('value', user_reminder);
        	KISSY.one(".wltao_add_tracker_dlg_n").attr('value', forein_ship_number);
        	g.show();
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
			KISSY.one(".wltao_autu_tracker_" + o.index).hide();
		}else{
			!KISSY.one(".wltao_quick_order_report_" + o.index) && KISSY.one(".wltao_autu_tracker_" + o.index).show();
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

	function f(a, o){
			var btn = a;
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

			KISSY.one(".wltao_autu_tracker_" + o.index + "_a").on('click', function(b){
				s_dlg_info["clickTarget"] =	KISSY.one(b.currentTarget);
				var foreign_ship = '';
				var tracker_num = '';
				var ship_phone = '';
				try{
					var foreign = JSON.parse(btn.one('.a-declarative') && btn.one('.a-declarative').attr('data-show-tracking-details'));
					 
					foreign_ship = foreign[0].ajaxParams.carrierID;
					tracker_num = foreign[0].ajaxParams.trackingNum;
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
					 
				}catch(err){}
				

				var l = ship_phone.length;
				if(l > 8)ship_phone = ship_phone.substr(l - 8);
				

				var tans_ship_company = window.Wla_wltao.wltal_shipphone ? window.Wla_wltao.wltal_shipphone[ship_phone]:null;
                tans_ship_company = tans_ship_company['company'];
                
				var tans_ship_company_idx = get_trans_ship_idx(tans_ship_company);
				var forein_ship_idx = get_foreign_ship_idx(foreign_ship);
                
				if(forein_ship_idx != 0 && tracker_num != '' && tans_ship_company_idx != 0){
					showGetTrackerInfoTip(500, 100, 220, '瓦拉淘正在努力检测运单信息中',500, function(){
							showGetTrackerInfoTip(500, 100, 160, '瓦拉淘成功检测到订单信息',700, function(){
								initdlg(forein_ship_idx,tans_ship_company_idx, tracker_num,'');
							},1);
						});
				}else{
					showGetTrackerInfoTip(500, 100, 220, '瓦拉淘正在努力获取运单信息',500, function(){
							showGetTrackerInfoTip(500, 100, 270, '瓦拉淘未检测到完整订单信息,需手工填写',900, function(){
								initdlg(forein_ship_idx,tans_ship_company_idx, tracker_num,'');
							}, 1);
						});					
				}
			})			

			var foreign = JSON.parse(btn.one('.a-declarative') && btn.one('.a-declarative').attr('data-show-tracking-details'));
			var tracker_num = foreign[0].ajaxParams.trackingNum;	

			checkmodifystatus(tracker_num, KISSY.one(".wltao_autu_tracker_" + o.index + "_a"));


	}

 
	function checkmodifystatus(track_number , currentTarget, needshowtip){
			/// 修改文字

			var msg =	{
                        shipNum: track_number,
                    };
            wltao_tools.getMessageFromBackground({operate:"queryTrackerInfo", data:msg}, function(ccc){
                	ccc = typeof ccc == "object" ? ccc : JSON.parse(ccc);
                	(currentTarget).text(ccc.success ? '已添加' : '添加');

                	s_dlg_info["dlg"]  && s_dlg_info["dlg"].hide();
                	needshowtip && showGetTrackerInfoTip(500, 100, 290, '添加成功,可点击右上角插件图标到运单跟踪里查看',900, function(){
								
							}, 1);
                	
                })					

	}

	function h(){
		var btnArr = KISSY.all(".a-button-stack");
		for(var i = 0; i < btnArr.length; i++){
			var btn = KISSY.one(btnArr[i]);

			if( !btn.one('.track-package-button') || JSON.parse(btn.one('.a-declarative') && btn.one('.a-declarative').attr('data-show-tracking-details'))[0] == undefined || !btn.one('.track-package-button').hasClass("a-button-primary") )
				continue;
			var a = {};
			a.width = btn.width();
			a.height = btn.height();


			
			var o = {};
			o.triangle = "left",
			o.text = "添加",
			o.pos = "top";	
			o.index = i;
			var e1 = btn.offset();
			o.left = e1.left + 200,o.top = e1.top ;
			wltao_tools.generateTemplateHtml(html, o, function(a){
			 	KISSY.one("body").append(a);
			 	f(btn, o);
			 });
            i++;
		}

			
	}
	initshipcompany();
	;
	return h;
},
{
    requires: ["menubutton", "mu",  "overlay"]
});