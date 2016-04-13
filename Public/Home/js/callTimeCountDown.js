var callFnTimeCountDown = function(d, o, disRender){
	var f = {
		zero: function(n){
			var n = parseInt(n, 10);
			if(n > 0){
				if(n <= 9){
					n = "0" + n;	
				}
				return String(n);
			}else{
				return "00";	
			}
		},
		dv: function(){
			//var future = new Date(d), now = new Date();
			var dur = Math.round(d / 1000) /*+ future.getTimezoneOffset() * 60*/, pms = {
				sec: "00",
				mini: "00",
				hour: "00",
				day: "00",
				month: "00",
				year: "0"
			};
			if(dur > 0){
				pms.sec = f.zero(dur % 60);
				pms.mini = Math.floor((dur / 60)) > 0? f.zero(Math.floor((dur / 60)) % 60) : "00";
				pms.hour = Math.floor((dur / 3600)) > 0? f.zero(Math.floor((dur / 3600)) % 24 + (Math.floor((dur / 86400)) % 30)*24) : "00";
				pms.day = Math.floor((dur / 86400)) > 0? f.zero(Math.floor((dur / 86400)) % 30) : "00";
				pms.month = Math.floor((dur / 2629744)) > 0? f.zero(Math.floor((dur / 2629744)) % 12) : "00";
				pms.year = Math.floor((dur / 31556926)) > 0? Math.floor((dur / 31556926)) : "0";
			}
			return pms;
		},
		ui: function(){
			var displayRender = function(df , v){
				return df!=undefined ? df(v) : v;
			};
			if(o.sec){
				o.sec.innerHTML = displayRender(disRender, f.dv().sec);
			}
			if(o.mini){
				o.mini.innerHTML = displayRender(disRender, f.dv().mini);
			}
			if(o.hour){
				o.hour.innerHTML = displayRender(disRender, f.dv().hour);
			}
			/*if(o.day){
				o.day.innerHTML = f.dv().day;
			}
			if(o.month){
				o.month.innerHTML = f.dv().month;
			}
			if(o.year){
				o.year.innerHTML = f.dv().year;
			}*/
			d = d-1000;
			if(d>0){
				setTimeout(f.ui, 1000);
			}
		}
	};	
	
	f.ui();
};