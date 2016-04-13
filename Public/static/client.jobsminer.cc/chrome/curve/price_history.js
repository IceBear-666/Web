KISSY.add("wltaoPriceTrend", 
function(a, b) {
    var asinid_price_history_dic = {};
    function c(a) {
        var b,
        c,
        d,
        e,
        f;
        return b = new Date(a),
        c = b.getFullYear(),
        d = b.getMonth() + 1,
        e = b.getDate(),
        f = b.getHours(),
         (d > 9 ? "": "0") + d + "月" + (e > 9 ? "": "0") + e + "日:"+(f > 9 ? "": "0") + f + "时";
    }
    function d(a) {
        var b = a ? new Date(a) : new Date,
        c = new Date(b.getFullYear(), b.getMonth(), b.getDate());
        return c.getTime()
    }
    function e(a) {
        var b,
        c;
        var a1 = new Array();
        for (b = 0; b < a.length; b++) for (var e in a[b]) c = e.split("-"),
        3 !== c.length ? a.splice(b--, 1) : (a1[b] = new Array() ,a1[b][0] = new Date(parseInt(c[0], 10), parseInt(c[1], 10) - 1, parseInt(c[2], 10)).getTime(), a1[b][1] = a[b][e]);
        var f = d((new Date).getTime());
 
        a1.length > 0 && f > a1[a1.length - 1][0] && a1.push({
            0: f,
            1: a1[a1.length - 1][1]
        });
        for (var g = f - 5184e6, h = a1.length - 1; h >= 0 && a1[h][0] != g; h--) if (a1[h][0] < g) {
            var i = {
                0: g,
                1: a1[h][1]
            };
            a1.splice(0, h + 1),
            a1.unshift(i);
            break
        }

        return a1;
    }
    function f(a) {
        var b,
        d,
        f,
        g,
        h,
        i;
     
 
        if (a = e(a), f = a.length) {
       
            for (g = a[f - 1][0], h = g - 5184e6, b = 0; b < a.length; b++) if (i = a[b][0], !(h > i)) {
                if (i > h && 0 !== b) {
                    i = h,
                    d = [[c(h)], [a[b - 1][1]]];
                    break
                }
                d = [[c(a[b][0])], [a[b][1]]],
                b++;
                break
            }
            for (; b < a.length; b++) i += 864e5,
            a[b][0] && (d[1].push(a[b][0] !== i ? a[--b][1] : a[b][1]), d[0].push(c(i)));
            return d
        }
    }
    function g(a, b) {
        var c,
        d;
        if (a && a[1]) for (var e = a[1], f = 0; f < e.length; f++)(!c || parseFloat(e[f]) > parseFloat(c)) && (c = e[f]),
        (!d || parseFloat(e[f]) < parseFloat(d)) && (d = e[f]);
        var g = KISSY.one(b);
        c && d && g.html('<span>60天内最高价：</span><span style="color:red">' + wltao_get_price_symbol() + c + '</span>，最低价：<span style="color:green">' + wltao_get_price_symbol() + d + '</span>');

        if(a && a[1] && a[1].length > 11){
            var e = a[1];
            var price_desc = "平稳";
            var now = parseFloat(e[e.length -1]);
             
            for(var i = e.length - 2, cnt = 0; i >=0 && cnt < 10; cnt++,i--){
                 
                if(parseFloat(e[i]) < now){
                    price_desc = "上涨";
                    break;
                }else if(parseFloat(e[i]) > now){
                    price_desc = "下降";
                    break;
                }
            }
   

            if(now == d && now < c)price_desc = "最低";
            //KISSY.one("#wltao_single_price .wltao_tips_topdiv .wltao_price_trend").css("margin-left","0px");
            //KISSY.one("#wltao_single_price .wltao_tips_topdiv .wltao_tips_pricetrend>span:eq(1)").text(price_desc);

        }
                
    }
    function basef(a){
        var c,
        d;
        if (a && a[1])
        {
            for (var e = a[1], f = 0; f < e.length; f++)(!c || parseFloat(e[f]) < parseFloat(c)) && (c = e[f]),(!d || parseFloat(e[f] )< parseFloat(d)) && (d = e[f]);

            if(c > 1)return parseInt(c - 1);
        } 

        return 0;
    }

    function change(a, base){
        var b = a ;
        if (a && a[1])
        {
            for (var e = a[1], f = 0; f < e.length; f++)b[1][f] -= base;
        } 
        return b;
    }

    function draw_curve(c, d, e, v_base){
		//不画图，执行回调
 		if(isDraw == 0) {
 			var data = e[0] || (e["amazon"][0] && e["amazon"]) || e["new"];
//console.log(e);
			cbFun && cbFun(priceOverAll(data));
			return ;
		}
	
        var x_mid = 15;
        var x_length = 60 - 1;
        if(e && !e["ts"] && e[0] && e[0].length > 0 && e[0].length != 60){
            x_mid =  parseInt( (e[0].length + 2) / 4);
            x_mid = x_mid > 0 ? x_mid : 1;
            x_length = e[0].length - 1;
        }else{
            x_mid = parseInt( (e["ts"].length + 2) / 3);
            x_mid = x_mid > 0 ? x_mid : 1;
            x_length = e["ts"].length - 1;
        }


        var h = "#f59b00",
        i = 52,
        j = 30,
        k = 306,
        l = 100;
        var img_json = {
            anim:true,
            renderTo: c,
            canvasAttr: {
                x: i,
                y: j,
                width: k,
                height: l
            },
            points: {
                attr: {
                    r: 0,
                    type: "auto",
                    "stroke-width":"2px"
                },
                hoverAttr: {
                    r: 4,
                    stroke: h,
                    "stroke-width": 1,
                    fill: "#fff",
                    type: "circle"
                }
            },
            line:{
                attr:{
                    "stroke-width":"2px"
                },
                hoverAttr:{
                    "stroke-width":"2px"
                }
            },
            colors: [{
                DEFAULT: h
            },{
                DEFAULT: "#18b4f0"
            }],
            xGrids: {
                isShow: !1
            },
            yGrids: {
                isShow: !0,
                css: {
                    border: "1px solid"
                }
            },
            yLabels: {
                css: {
                    marginLeft: "-6px",
                    "font-family": "Microsoft Yahei",
                    "font-size": "10px"
                },
                template:function(a, b){
                    return  parseFloat(b) + (v_base ? parseInt(v_base) : 0);
                }
            },
            xLabels: {
                css: {
                    marginTop: "8px",
                    marginLeft: "-5px",
                    "font-family": "Arial",
                    "font-size": "10px"
                },
                template: function(a, b) {
                    
                    if(a % x_mid == 0 || a == x_length){
                        var lll = b.indexOf(":");
                        if(lll != -1){
                            return b.substr(0, lll);
                        }
                        return b;
                    }
                    else{
                        return "";
                    }
                }
            },
            lineType: "straight",
            xAxis: {
                text: e[0]
            },
            comparable: !0,
            series: [{
                isShow:!0,
                text: "价格",
                data: e[1]
            }],
            tip: {
                css: {
                    padding: "2px 5px",
                    "border-radius": "1px",
                    "font-size": "11px",
                    background: "#fff",
                    "border-width": "1px",
                    color: h
                },
                alignX: "center",
                alignY: "bottom",
                offset: {
                    x: 0,
                    y: -15
                },
                template: function(a) {
                    var rt = '';
                    for(var i5 = 0; i5 < a.datas.length; i5 ++){
                        if(a.datas[i5].text == "第三方卖家"){
                            rt += ( '<div style="color:#18b4f0;line-height:18px;padding:0px">'  + a.datas[i5].text + "：" + wltao_get_price_symbol() +(parseFloat(a.datas[i5].y) + parseInt(v_base)) + '</div>' )
                        }
                        else{
                            rt += ( '<div style="color:#f59b00;line-height:18px;padding:0px">' +  a.datas[i5].text + "：" + wltao_get_price_symbol() +(parseFloat(a.datas[i5].y) + parseInt(v_base)) + '</div>' ) ;
                        }
 
                    }

                    return rt;
                }
            }
        };

        KISSY.one("#wltao_single_price .wltao_detail_price_trend") && KISSY.one("#wltao_single_price .wltao_detail_price_trend").append('<div style="position: absolute;top: 90px; left: 112px;"><img src="http://open.walatao.com/global/mizushirushi.png"></img></div>')
        if(e["ts"]){

            img_json.xAxis.text = e["ts"];
            img_json.series = [];
            img_json.colors = [];
            if(e["max_amazon_price"] && e["max_amazon_price"] > 0){
                img_json.colors.push({DEFAULT:h});
                img_json.series.push({"isShow":!0,"text":"亚马逊自营", "data":e["amazon"]});
            }

            if(e["max_new_price"] && e["max_new_price"] > 0){
                img_json.colors.push({DEFAULT:"#18b4f0"});
                img_json.series.push({"isShow":!0,"text":"第三方卖家", "data":e["new"]});
            }

            var lowest = 0;
            if(e["lowest_amazon_price"] == 0)
                lowest = e["lowest_new_price"];
            else if(e["lowest_new_price"] == 0)
                lowest = e["lowest_amazon_price"];
            else
                lowest = e["lowest_amazon_price"] > e["lowest_new_price"] ? e["lowest_new_price"] : e["lowest_amazon_price"];

            var highest = 0;
            if(e["max_amazon_price"] == 0)
                highest = e["max_new_price"];
            else if(e["max_new_price"] == 0)
                highest = e["max_amazon_price"];
            else
                highest = e["max_amazon_price"] > e["max_new_price"] ? e["max_amazon_price"] : e["max_new_price"];

            var g = KISSY.one(d);
            var days = parseInt( e["time_length"] / 86400000 );
            g.html('<span>' + (days + 1) + '天内最高价：</span><span style="color:red">' + wltao_get_price_symbol() + highest + '</span>，最低价：<span style="color:green">' + wltao_get_price_symbol() + lowest + '</span>');
        }else{

        }

        var m = new b(img_json);
        var n = m.getPaper();
        for(var ka = 0,kc = 0; ka < k && kc <= 10; ka+= (k)/10,kc++){
        n.lineY(ka + i, j, l).css({
            "border-left": "1px solid #ccc"
        })
        }
        n.lineY(k + i, j, l).css({
            "border-left": "1px solid #ccc"
        });     
        var o = null;
        m.on("stockChange", 
        function(a) {
            null != o && (o.remove(), o = null);
            var b = a.x,
            c = 50;
            a.x < i + c && (b = i + c),
            a.x > k + i - c && (b = k + i - c);
            if(KISSY.UA.ie){
                o = n.text(b, l + j, '<div style="border:1px solid;margin-top:2px;border-radius:3px;padding:3px 5px;color:#fff;background:#666;font-size:11px;">日期:' + a.dataInfo.x + "</div>")
            }else{
                o = n.text(b, l + j, '<div style="border:1px solid;margin-top:2px;border-radius:3px;padding:3px 5px;color:#fff;background:#666;font-size:11px;margin-left:-50px">日期:' + a.dataInfo.x + "</div>")
            }
        }),
        m.on("paperLeave", 
        function() {
            null != o && (o.remove(), o = null)
        })        
    }


    function h(a, c, d) {
 
        var e = f(a);
        g(e, d);
        var v_base = basef(e);
        e = change(e, v_base);

        draw_curve(c, d, e, v_base);
    }



    function k(a) {
        var b = "https://dyn.keepa.com/pricehistory.png?asin=" + a + "&domain=" + (window.location.host == "www.amazon.de" ? "de" : (window.location.host == "www.amazon.co.jp" ? "jp" : "com") )+ "&width=382&height=180";
        var c = new Image;
        return c.src = b,
        b
    }
    var has_load_curve = false;
    function l(a) {
        function b(b) {
            var c = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
            try {
                var d = "object" == typeof b ? b: JSON.parse(b);
                if (!d || 0 != d.resultCode) throw new Error("Call Wala Price Trend Data Error!");
                c.html('<div id="wltao_wl34tao_trend"></div><div class="wltao_wl34tao_text"></div>');
                h(d.data.price_curve, "#wltao_wl34tao_trend", ".wltao_wl34tao_text")
            } catch(f) {
                c.html('<img class="wltao_camel_img" src="' + k(a) + '" />')
            }
        }

        if(!has_load_curve){
            if(wltao_get_remote_js("ydcureve")){
                KISSY.io.get(window.Wla_wltao.config.extraUrl + wltao_get_remote_js("ydcureve"), function(za){
                    try{
                        eval(za);
                    }catch(cde){
                        console.log("eval erroor ydcurve");
                    }

                    KISSY.use("ydprice_remote_curve", function(a, c){
                        c(b);
                     });                    
                });
                has_load_curve = true;
                return;
            }
        }
        else{
                KISSY.use("ydprice_remote_curve", function(a, c){
                    c(b);
                });             
        }
    }

    function sixpm_curve(ga){
        try{
            if(!wltao_is_sixpm()) 
                ga.html('<div class="wltao_trend_empty">暂时没有数据</div>');

            KISSY.io.get('http://js.client.walatao.com/global/get_price_history.php?link=' + encodeURI(location.href), function(a){
                try{
                    var b = typeof a == "object" ? a : JSON.parse(a);
                    if(b.result == 0){
                        var c = typeof b.curve == "object" ? b.curve : JSON.parse(b.curve);
                        if(c.length == 0){
                             ga.html('<div class="wltao_trend_empty">暂时没有数据</div>');
                         }else{
                            var d = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
                            d.html('<div id="wltao_wl34tao_trend"></div><div class="wltao_wl34tao_text"></div>');
                            h(c, "#wltao_wl34tao_trend", ".wltao_wl34tao_text")
                         }
                    }else{
                        ga.html('<div class="wltao_trend_empty">暂时没有数据</div>');
                    }
                }catch(err){
                    
                }
            })
        }catch(err){

        }
    }

    function parse_data(aa){
        var last_amazon_price = 0;
        var last_new_price = 0;
        var max_amazon_price = 0;
        var max_new_price = 0;
        var lowest_amazon_price = 0;
        var lowest_new_price = 0;
        var first_nonzero_amazon_price = 0;
        var first_nonzero_new_price = 0;
        var time_length = 0;
        
        var e = {};
        e["ts"] = [];
        e["ots"] = [];
        e["amazon"] = [];
        e["new"] = [];

        if(aa.length == 0)
            return e;

     
        for(var i = 0 ; i < aa.length; i++){
            var a = aa[i];
            var _u =  ((a["time"] ^ 512468) * 3600 + (new Date(2013, 0, 1)["getTime"]() / 1000) - 3600*8 ) * 1000;


            e["ts"].push(c(_u));
            e["ots"].push(_u);
            var price =  parseFloat( a["price"] ) ;
            var newprice = parseFloat( a["newprice"] ) ;

            if(price && price > 0){
                last_amazon_price = price;
                if(price > max_amazon_price)
                    max_amazon_price = price;

                if(lowest_amazon_price ==0 || price < lowest_amazon_price)
                    lowest_amazon_price = price;

                if(first_nonzero_amazon_price == 0)
                    first_nonzero_amazon_price = price;
            }

            if(newprice > 0){
                last_new_price = newprice;

                if(newprice > max_new_price)
                    max_new_price = newprice;

                if(lowest_new_price == 0 || lowest_new_price > newprice)
                    lowest_new_price = newprice;

                if(first_nonzero_new_price == 0)
                    first_nonzero_new_price = newprice;
            }

            e["amazon"].push(last_amazon_price);
            e["new"].push(last_new_price);
        }

        // 修正数据，必须是非0， 非0数据 用附近数据修补;
        for(var i = 0 ; i < e["ts"].length; i++){
            if(max_amazon_price > 0  && e["amazon"][i] == 0)
                e["amazon"][i] = first_nonzero_amazon_price;

            if(max_new_price > 0 && e["new"][i] == 0)
                e["new"][i] = first_nonzero_new_price;
        }




        var now = new Date().getTime();
        var s60days_ago = now - (86400*1000) * 60;
        var s60days_ago_amazon_price = e["amazon"][0];
        var s60days_ago_new_price = e["new"][0];
        var all_size = aa.length;
        var size = aa.length;
        if(size > 0 && (now - e["ots"][size - 1]) > 10 * 3600 * 1000 ){
            e["amazon"].push(e["amazon"][e["amazon"].length - 1]);
            e["ts"].push(c(now));
            e["new"].push(e["new"][e["new"].length - 1]);
            e["time_length"] = now - e["ots"][0];
            e["ots"].push( now);
        }

        for(var i = 0 ; i < all_size; i++){
            if(e["ots"][i] < s60days_ago){
                s60days_ago_amazon_price = e["amazon"][i];
                s60days_ago_new_price = e["new"][i];
                e["ts"].splice(i, 1);
                e["amazon"].splice(i, 1);
                e["new"].splice(i, 1);
                e["ots"].splice(i, 1);
                all_size--;
                i--;
            }else{
                break;
            }
        }


        var f  = {};
        f["ts"] = [];
        f["ots"] = [];
        f["amazon"] = [];
        f["new"] = [];

        all_size = e["ts"].length;
        var last_time = s60days_ago;
        for(var i  = 0; i < all_size ; i++){
            var ts = e["ots"][i];
            var days = ( ts - last_time)/(86400000);
            var index = i;
            for(var j  = 1 ; j < days ; j+= 6){
                f["ts"].push( c(last_time + 86400000 * j) );
                f["ots"].push(last_time + 86400000 * j);
                f["amazon"].push(s60days_ago_amazon_price);
                f["new"].push(s60days_ago_new_price);
            }
            f["ts"].push(e["ts"][i]);
            f["ots"].push(e["ots"][i]);
            f["amazon"].push(e["amazon"][i]);
            f["new"].push(e["new"][i]);
            last_time = e["ts"][i];
            s60days_ago_amazon_price = e["amazon"][i];
            s60days_ago_new_price = e["new"][i];
        }


        for(var i = 0 ; i < f["ts"].length; i++){
            var price =  f["amazon"][i]  ;
            var newprice = f["new"][i]  ;
            if(price && price > 0){
                
                if(price > max_amazon_price)
                    max_amazon_price = price;

                if(lowest_amazon_price ==0 || price < lowest_amazon_price)
                    lowest_amazon_price = price;;
            }

            if(newprice > 0){
                if(newprice > max_new_price)
                    max_new_price = newprice;

                if(lowest_new_price == 0 || lowest_new_price > newprice)
                    lowest_new_price = newprice;
            }            
        }


        var size = f["ts"].length;
        if(size > 0){
            f["time_length"] = now - f["ots"][0];
        }

        f.max_amazon_price = max_amazon_price;
        f.lowest_amazon_price = lowest_amazon_price;
        f.max_new_price = max_new_price;
        f.lowest_new_price = lowest_new_price;

        var lowest = 0;
        if(1){
            
            if(e["lowest_amazon_price"] == 0)
                lowest = f["lowest_new_price"];
            else if(e["lowest_new_price"] == 0)
                lowest = f["lowest_amazon_price"];
            else
                lowest = f["lowest_amazon_price"] > f["lowest_new_price"] ? f["lowest_new_price"] : f["lowest_amazon_price"];      

            if(lowest > 1)
                lowest =  parseInt(lowest - 1);
            else
                lowest = 0;

            for(var i = 0 ; i < f["ts"].length; i++){
                if(f["amazon"][i]  > 0)
                     f["amazon"][i] -= lowest;
                if(f["new"][i] > 0)
                     f["new"][i] -= lowest;
            }
        }  

        f.base = lowest;

        return f;
    }
    function wltao_history_cur_country(){
        if(window.location.host == "www.amazon.de"){
            return "DE";
        }
        else if(window.location.host == "www.amazon.co.jp"){
            return "JP";
        }
        return "US";
    }
    var yht_timer_id = null;
    function amz_history(b11){
        clearTimeout(yht_timer_id);
        if(asinid_price_history_dic[b11]){
            var c1 = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
            if(c1)
                c1.html('<div id="wltao_wl34tao_trend"></div><div class="wltao_wl34tao_text"></div>');
            draw_curve("#wltao_wl34tao_trend", ".wltao_wl34tao_text", asinid_price_history_dic[b11], asinid_price_history_dic[b11].base);
            return;
        }

        var asin = b11 + 'oathe'; 
        var yht_asin =  faultylabs.MD5(asin).substr(8, 16);
        if(yht_asin.length == 16){
            yht_timer_id = setTimeout(function(){
                var a = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
                a.html('<div class="wltao_trend_empty">暂时没有数据</div>');
            }, 6e3);

            var country = wltao_history_cur_country();
            var url = "http://ph.ehtao.net/" + country + "/" + yht_asin.substr(14,2) + "/" + yht_asin;
            KISSY.io.get(url, function(a, z){
                try{
                    clearTimeout(yht_timer_id);
                    if(z != "success")
                    {
                        throw new Error("get price curve error..");
                    }

                    var b = typeof a == "object" ? a: JSON.parse(a);
                    var e = parse_data(b);
                    if( (!e.max_amazon_price && !e.max_new_price) || (e.max_amazon_price == 0 && e.max_new_price == 0) ){
                        throw new Error("Call et Price Trend Data Error!");
                    }else{
                        asinid_price_history_dic[b11] = e;
                        var c1 = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
                        if(c1)
                            c1.html('<div id="wltao_wl34tao_trend"></div><div class="wltao_wl34tao_text"></div>');
                        draw_curve("#wltao_wl34tao_trend", ".wltao_wl34tao_text", e, e.base);
                    }
                }catch(err){
                    var a = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
                    //a.html('<img class="wltao_camel_img" src="' + k(b11) + '" />');
                    a.html('<div class="wltao_trend_empty">暂时没有数据</div>');
                }
            },undefined, undefined, undefined,function(a, b, c){
                 console.log("error ouce");
                 clearTimeout(yht_timer_id);
                 var a = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
                 a.html('<div class="wltao_trend_empty">暂时没有数据</div>');
            })
        }else{
             clearTimeout(yht_timer_id);
             a.html('<div class="wltao_trend_empty">暂时没有数据</div>');
        }
    }

    function m(b){
        var a = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
        if(wltao_is_sixpm()){
            other_curve(a);
        }
		else if( KISSY.inArray(window.location.host, supprtSites) ){
			other_curve(a);
		}
        else{
            try{
                //if(window.location.host == "www.amazon.de"  || window.location.host == "www.amazon.co.jp")
                    //throw new Error("not amazon.com");
                if( b && b != '')
                    amz_history(b);
            }catch(err){
                a.html('<img class="wltao_camel_img" src="' + k(b) + '" />')
            }
           //l(b);
        }
          
    }


    var call_timer = null,
		isDraw = 1,		//是否需要画图
		cbFun = null;
		
    function n(draw, cb){
		isDraw = draw===0 ? 0 : 1;
		if( typeof cb!== 'undefined') cbFun = cb;
		if(isDraw == 0) {
			data();
			return ;
		}
	
        var a = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
        if(!a)
            return;
		a && a.html('<img class="wltao_trend_loading" src="http://js.client.walatao.com/v9/godimage/loading.gif" />');        
//        clearTimeout(call_timer);
//        call_timer = setTimeout(function(){
            wltao_bridge_interface.init();
            /*wltao_bridge_interface.register_asin_change_cb(function(){
                m(wltao_bridge_interface.get_current_asinid());
            });*/

            m(wltao_bridge_interface.get_current_asinid());
//        }, 300);
    }
	
	
	//获取数据，不画图
	function data(){
		wltao_bridge_interface.init();
		m(wltao_bridge_interface.get_current_asinid());
	}
	
	//计算价格总趋势
	function priceOverAll(a){
//return a;
		var highest, lowest;
        if (a && a[1]) for (var e = a[1], f = 0; f < e.length; f++)(!highest || parseFloat(e[f]) > parseFloat(highest)) && (highest = e[f]),
        (!lowest || parseFloat(e[f]) < parseFloat(lowest)) && (lowest = e[f]);
		
		var price_desc = "same",
			e = a;
		var now = parseFloat(e[e.length -1]);
		var ctnMax = e.length > 11 ? 10 : e.length-1;
	 
		for(var i = e.length - 2, cnt = 0; i >=0 && cnt < ctnMax; cnt++,i--){             
			if(parseFloat(e[i]) < now){
				price_desc = "up";
				break;
			}
			else if(parseFloat(e[i]) > now){
				price_desc = "down";
				break;
			}			
		}
		if(now == lowest && now < highest) price_desc = "low";
		return price_desc;
	}

	
	var supprtSites = ['www.iherb.com', 'www.drugstore.com', 'www.ashford.com', 'www.gnc.com', 'www.jomashop.com', 'shop.nordstrom.com', 'www.6pm.com', 'item.rakuten.co.jp', 'www.joesnewbalanceoutlet.com', 'www.lushjapan.com', 'www1.macys.com'];//,'www.victoriassecret.com'
	function other_curve(ga){
		var getpriceUrl = 'http://js.client.walatao.com/global/get_price_history.php';
		if( !KISSY.inArray(window.location.host, supprtSites) ) {
			ga.html('<div class="wltao_trend_empty">暂时没有数据</div>');
			return ;
		}
		KISSY.io.get( getpriceUrl+'?link=' + encodeURIComponent(location.href), function(a){
			try{
				var b = typeof a == "object" ? a : JSON.parse(a);
				if(b.result == 0){
					var c = typeof b.curve == "object" ? b.curve : JSON.parse(b.curve);
					if(c.length == 0){
						 ga.html('<div class="wltao_trend_empty">暂时没有数据</div>');
					 }else{
						var d = KISSY.one("#wltao_single_price .wltao_detail_price_trend");
						d.html('<div id="wltao_wl34tao_trend"></div><div class="wltao_wl34tao_text"></div>');
						drawC(c, "#wltao_wl34tao_trend", ".wltao_wl34tao_text")
					 }
				}else{
					ga.html('<div class="wltao_trend_empty">暂时没有数据</div>');
				}
			}catch(err){
				
			}
		});
    }
	
	
	/********** Added 20150106***********/
	function drawC(a, c, d) {
		var baseTs = 1417605107;
        var e = changeCurveData(a, baseTs);
        g(e, d);
        var v_base = basef(e);	
        e = change(e, v_base);
        draw_curve(c, d, e, v_base);
    }
	
	function changeCurveData(a, baseTs) {
//		console.log('changeCurveData@@@@@@@@@@@@@');
//		console.log(a);
		
		var ret = [], priceInfo = a;
 			ret[0] = [];
			ret[1] = [];
		var len = a.length,
			item,
			item_ts,
			item_price;
		
		var nowTime = parseInt( (new Date).getTime()/1000 );
		
		for(var i=0; i<len; i++){	
			item = priceInfo[i];
	
 			item_ts = item.tm*3600;
			item_price = item.pi;
			
			ret[0].push( format_ts((item_ts + baseTs) * 1000) );
			ret[1].push( item_price );
	
 			if( i+1<len && a[i+1].tm - item_ts > 3600*24 ){
				ret[0].push( format_ts( (item_ts + baseTs + 3600*24) * 1000) );
				ret[1].push( item_price );
			}
			//最后一条与当前时间对比
			if( i==len-1 && (nowTime - (item_ts + baseTs) > 3600) ){
				ret[0].push( format_ts(nowTime * 1000) );
				ret[1].push( item_price );
			}
		}
		
		//console.log(ret);
		return ret;
    }
	
	
	function format_ts(ts){
		Date.prototype.Format = function (fmt) { //author: meizz 
		var o = {
			"M+": this.getMonth() + 1, //月份 
			 "d+": this.getDate(), //日 
			 "h+": this.getHours(), //小时 
			 "m+": this.getMinutes(), //分 
			 "s+": this.getSeconds(), //秒 
			 "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
			 "S": this.getMilliseconds() //毫秒 
		};
		if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
		for (var k in o)
		if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
		 return fmt;
		}
		return  new Date(ts).Format("MM-dd hh点");
	}
	
    return n;

},
{
    requires: ["gallery/kcharts/1.2/linechart/index"]
});