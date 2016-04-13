
function wltaoAmazonBridge() {
	function b(a) {
		window.postMessage('{"wltao_asin": "' + a + '"}', location.href)
	}
	var c, d = function() {
			var a;
			if (DetailPage) a = DetailPage.StateController.getState().current_asin;
			else if (goTwisterCore) a = goTwisterCore.getSelectedASIN();
			else return;
			b(a)
		},
		e = function(a) {
			b(a.current_hovered_asin)
		},
		f = 0;
	c = function() {
		var a = !1;
		if ("undefined" != typeof DetailPageFramework && DetailPageFramework.registerCallback) {
				DetailPageFramework.registerFeatureConfig("wltao", {
					dataType: "atf",
					priority: "high",
					suppressDefaultBehavior: !0
				});
				DetailPageFramework.registerCallback("asin_select", "wltao", d);
				//DetailPageFramework.registerCallback("swatch_hover", "wltao", e);
				try {
					twisterController && (twisterController.model.state.setCurrentASINbackup = twisterController.model.state.setCurrentASIN, twisterController.model.state.setCurrentASINHook = function(a) {
						try{
							a && b(a);
						}catch(err){
							 
						}
						return twisterController.model.state.setCurrentASINbackup(a)
					}, twisterController.model.state.setCurrentASIN = twisterController.model.state.setCurrentASINHook)
				} catch (h) {
					a = !0
				}
		} else a = !0;

		a && 20 > f++ && setTimeout(c, 1E3)
	};
	c();
	setInterval(function(){
		try {
			DetailPage && DetailPage.StateController.getState().current_asin && b(DetailPage.StateController.getState().current_asin)
		} catch (g) {
		}
	}, 1e3)
}
wltaoAmazonBridge();