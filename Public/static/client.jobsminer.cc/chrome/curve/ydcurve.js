

KISSY.add("ydprice_remote_curve", function(a){

	function encrypt(a, b, e) {
			    var  zero = ["0", "00", "000", "0000", "00000", "000000", "0000000", "00000000"];
            	var a1= function(a) {
                	var b,
                	c = [];
                	for (b = 0, l = a.length; l > b; b++) c[c.length] = a.charAt(b);
                	return c.reverse().join("")
            	};
            	var to= function(a, c) {
                		var e = "" + (a + 88).toString(16),
                		f = c - e.length;
                		return f > 0 ? zero[f - 1] + e: e
           			 };
                var f,
                g = [];
                for (f = 0, l = a.length; l > f; f++) g[g.length] = to(a.charCodeAt(f), b);
                return e ? a1(g.join("")) : g.join("")
    };

	function  b(){
   			var k = {};
    		var r = ["t=" + document.title, "k=lxsx", "d=ls"];
    		var s = "";
    		var v = encrypt(r.join("^&"), 4, !1);
    		var w = encrypt(location.href, 2, !0);
    		var x = 1900 - w.length;
    		var v = v.length > x ? v.substr(0, x) : v;
    		k.browser = "chrome";
    		k.version = "2.0";
    		k.vendor = "youdao";
    		k.av = "3.0";
    		k.extensionid = "";
    		k.email = "";
    		k.pop = "";
    		k.k = v;
    		k.nl = !0;
    		k.m = w;

    		return k;
	}

	function ex_info(){
		var s = window.Wla_wltao.config.hasstockjs;
		var k = window.Wla_wltao.config.getpricejs;
		var has = s && eval(s);
		var price =  k && eval(k);
		var v = StockAndPriceRemindInfo(price);
		var p = {"stock":has, "info":v.json, "ac_price":price};
		return p;
	}


	function g(cb){
		if(window.location.host != "www.amazon.com"){
			cb(null);
			return;
		}

		var k = b();
		var now = new Date().getTime();
		var key =   "youdaogouwupi" + (now - 2);
		window[key] = function(j){
			var o = {};
			if(j.priceHistory && j.priceHistoryOneYear){
				o.priceHistory = j.priceHistory;
				o.priceHistoryOneYear = j.priceHistoryOneYear;
				o.ex_info = ex_info();
			}
			
			KISSY.io.post("http://js.client.walatao.com/v9/svr/curve/ydpricecurve.php", encodeURIComponent(JSON.stringify(o)), function(l,m)
				{
					cb(l);
				});
		};
		var url = "http://zhushou.huihui.cn/productSense?jsonp=" + key + "&browser=" + k.browser
			+ "&version="+ k.version + "&vendor=" + k.vendor + "&av=" + k.av + "&extensionid=" + k.extensionid 
			+ "&email=" + k.email + "&pop=" + k.pop + "&k=" + k.k + "&nl=" + k.nl + "&m=" + k.m + "&t=" + now;
		KISSY.io.get(url, function(m){
			console.log(m);
		},undefined, undefined, undefined,function(a, b, c){
			if(c && c.responseText){
				eval(c.responseText);
			}
		});
	}

	function ff(cb){
		KISSY.io.get("http://js.client.walatao.com/global/get_amazon_price_history.php?link=" + encodeURIComponent(location.href), function(a){
			var b = typeof a == "object" ? a:JSON.parse(a);
			if(b.curve){
				var curve = JSON.parse(b.curve);
				if(curve.length >= 1){
					var d = {};
					d.resultCode = 0;
					d.msg="成功";
					var e = {};
					e.price_type = 1;
					e.price_curve = curve;
					d.data = e;
					cb(d);
					//{"resultCode":0,"msg":"\u6210\u529f","data":{"price_type":1,"price_curve":[{"2014-10-20":"95.07"},{"2014-11-11":"89.95"}]}}
					return;
				}
			}

			return g(cb);
		})
	}

	return ff;
})