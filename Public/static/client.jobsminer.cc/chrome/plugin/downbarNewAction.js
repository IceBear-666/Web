    console.log('console show js');
    KISSY.add("wltaodwonbar", 
    function(a, b) {
        var bS = function(left, top, width, msg, times) {
            try {
                var delay = 200;
                var bL = (times != 0);
                var times = times;
                var bQ = KISSY.one(".wltao-downbar-tooltip");
                if (bQ) bQ.remove();
                KISSY.one('body').append('<div class="wltao-downbar-tooltip" style="background-color:#18b4f0;color:White;border:1px;position:fixed;left:100px;top:20px;padding:5px;font-size:12px;width:100px;line-height:16px;z-index:9999;_position:absolute;_top:expression(eval(document.body.scrollTop+20));">' + msg + '.</div>');
                var bk = KISSY.one(".wltao-downbar-tooltip");
                bk.css("left", left);
                bk.css("top", top);
                bk.css("width", width);
                var ct = 0;
                bk.show();
                var id = setInterval(function() {
                    if (bL) {
                        times = times - delay;
                        if (times < 0) {
                            //bk.fadeOut("slow", function() {
                                bk.remove();
                            //});
                        }
                    }
                    ct = ct + 1;
                    ct = ct % 8;
                    dotMsg = '.';
                    for (var i = 1; i <= ct; i++) {
                        dotMsg = dotMsg + ".";
                    }
                    bk.html(msg + dotMsg);
                }, delay);
            } catch (err) {console.log('err');};
        }
        bS.prototype.hide = function() {
            try {
                var bk = KISSY.one(".wltao-downbar-tooltip");
                //bk.fadeOut("slow", function() {
                    bk.remove();
                //});
            } catch (err) {};
        };
        function c(){
        }
        function d(a1){
            if(a1 == "false"){
                KISSY.one('#wltao-downbar').css({'height':'0px'});
                var hideleft = 50 + parseInt((320 - 75)*100/(document.width || document.body.scrollWidth));
                var str = '{"width":"92px","margin-left":"0px","left":"' + hideleft +  '%","height":"28px","position":"fixed","bottom":"-4px"}'
                KISSY.one('#wltao-downbar-hide').removeClass('hidden').css(JSON.parse(str)).addClass('show');

            }else{
                
                KISSY.one('#wltao-downbar-hide').removeClass("show").addClass('hidden');
                KISSY.one('#wltao-downbar-show').removeClass("hidden").addClass("show");
                KISSY.one('#wltao-downbar').css({'width':'640px','margin-left':'-320px','left':'50%','height':'28px'});
            }
            //KISSY.one('#wltao-downbar-hide').removeClass('hidden').css({'width':'92px','margin-left':'0px','left':offset.left-68.5,'height':'28px','position':'fixed','bottom':'-4px'}).addClass('show');
            //KISSY.one('#wltao-downbar-hide').removeClass('show').addClass('hidden');
            var c = KISSY.one('#wltao-downbar-show');
            c.delegate("click", "#wltao-downbar-logo", function () {
                window.open("http://www.walatao.com/blog/");
            });

            //整页翻译
            var d = KISSY.one('#wltao-downbar-show');
            d.delegate("click", "#wltao-downbar-allfanyi", function () {
                var allfanyiLi = KISSY.one("#wltao-downbar-allfanyi");
                if( allfanyiLi.attr("alt") == "点击后将对当前网站进行全文翻译" ){
                    allfanyiLi.attr("alt", "点击后将停止对当前网站的全文翻译");
                    fyShow = 1;
                    allfanyiLi.children('.wltao-downbar-btn').children().attr('src','http://js.client.walatao.com/v6/godimage/downbar-onqwfy.png');
                    f( allfanyiLi );
                }else if( allfanyiLi.attr("alt") == "点击后将停止对当前网站的全文翻译" && !fyShow ){
                    allfanyiLi.attr("alt", "点击后将对当前网站进行全文翻译");
                    allfanyiLi.children('.wltao-downbar-btn').children().attr('src','http://js.client.walatao.com/v6/godimage/downbar-qwfy.png');
                    g(allfanyiLi);
                }
            });

            //句子翻译
            var d = KISSY.one('#wltao-downbar-show');
            d.delegate("click", "#wltao-downbar-fanyi", function () {
                var allfanyiLi = KISSY.one("#wltao-downbar-fanyi");
                if( allfanyiLi.attr("alt") == "点击打开单句翻译功能" ){
                    allfanyiLi.attr("alt", "点击关闭单句翻译功能");
                    allfanyiLi.children('.wltao-downbar-btn').children().attr('src','http://js.client.walatao.com/v6/godimage/downbar-onjzfy.png');
                    KISSY.one(".xfk").show()
                }else{
                    allfanyiLi.attr("alt", "点击打开单句翻译功能");
                    allfanyiLi.children('.wltao-downbar-btn').children().attr('src','http://js.client.walatao.com/v6/godimage/downbar-jzfy.png');
                    KISSY.one(".xfk").hide();
                }
            });

            //到手价格
            //实现逻辑在wltaoGoodPrice.jd();

            //广告逻辑
            if(KISSY.one("#wltao-downbar-widget-6")){
                xS("google1","dhooo1",18,3000,10,1);
                da = 1;
            }else{
                da = 0;
            }

            
            //展开，隐藏
            var a = KISSY.one('#wltao-downbar-show');
            //if(!a.hasClass('hidden') && a){
                a.delegate("click", "#wltao-downbar-hid-btn-id", function () {
                    wltao_tools.setBackgroundLocalStore({
                         isShowDownBar: "false"
                    });
                    var offset = KISSY.one("#wltao-downbar-show-a").offset();
                    //KISSY.one('#wltao-downbar-show #wltao-downbar-hid-btn-id').removeClass("dtHover");
                    //向下缩小
                    var anim = new KISSY.Anim('#wltao-downbar',{'height':'0px'},0.5,KISSY.Easing.easeNone,function(){
                        //a.removeClass('show').addClass('hidden');
                        //KISSY.one('#wltao-downbar').css({'width':'36px','margin-left':'0px','left':offset.left-11.5,'height':'35px'});
                        KISSY.one('#wltao-downbar-hide').removeClass('hidden').css({'width':'92px','margin-left':'0px','left':offset.left-68.5,'height':'28px','position':'fixed','bottom':'-4px'}).addClass('show');
                        //KISSY.one(".jx-bar-button-tooltip") && KISSY.one(".jx-bar-button-tooltip").html(KISSY.one("#wltao-downbar-hide #wltao-downbar-hid-btn-id").attr("alt"));
                    });
                    anim.run();
                });
            //}
             var b = KISSY.one('#wltao-downbar-hide');
            //if(!b.hasClass('hidden') && b){
                b.delegate("click", "#wltao-downbar-hid-btn-id", function ( event ) {
                    wltao_tools.setBackgroundLocalStore({
                         isShowDownBar: "true"
                    });
                    b.removeClass('show').addClass('hidden');
                    if( da ){
                        var width = '640px';
                        var marginleft = '-320px';
                    }else{
                        var width = '300px';
                        var marginleft = '-150px';
                    }

                    var anim = new KISSY.Anim('#wltao-downbar',{'width':width,'margin-left':marginleft,'left':'50%','height':'28px'},0.5,KISSY.Easing.easeNone,function(){
                        //a.removeClass('hidden').addClass('show');
                        b.removeClass('show').addClass('hidden');
                        /*if(KISSY.one(".downbartitle")){
                            KISSY.one(".downbartitle").remove();
                        }
                        var hoverLi = KISSY.one("#wltao-downbar-show #wltao-downbar-hid-btn-id");
                        if( hoverLi.hasClass("dtHover") ){
                            var html = '<div style="position: fixed; bottom:28px;display:none;z-index: 99999;" class="downbartitle"><div id="jx-ttip-id" style="float: left;  opacity: 0.8;"><div class="jx-bar-button-tooltip">'+hoverLi.attr("alt")+'</div><div class="jx-tool-point-dir-down"></div></div></div>';
                            KISSY.one('body').append(html);
                            var left = hoverLi.offset().left + hoverLi.outerWidth()/2 - KISSY.one(".downbartitle").width()/2 + "px";
                            KISSY.one(".downbartitle").css("left",left).show();
                        }*/
                        
                        //KISSY.one(".jx-bar-button-tooltip").html(KISSY.one("#wltao-downbar-show #wltao-downbar-hid-btn-id").attr("alt"));
                    });
                    anim.run();
                });
            //}

            var e = KISSY.all('#wltao-downbar');
            var hoverLi = "", liLater = "", hoverLiTitle = "";

            KISSY.use("node",function(S,Node){ 
                var $=Node.all;       
                $("#wltao-downbar li").on("mouseenter", function(event){
                    hoverLi = $(this);
                    if( hoverLi && !hoverLi.hasClass(".noalt") && hoverLi.attr("alt") ){
                        /*if( hoverLi.attr("data-stat") == "web.downbar.show" && hideclick ){
                            return;
                        }*/
                        $(this).addClass("dtHover");
                        var liPos = hoverLi.offset();
                        if( KISSY.one(".downbartitle") ){
                            KISSY.one(".downbartitle").remove();
                        }
                        var html = '<div style="position: fixed; bottom:28px;display:none;z-index: 2147483647;" class="downbartitle"><div id="jx-ttip-id" style="float: left;  opacity: 0.8;"><div class="jx-bar-button-tooltip">'+hoverLi.attr("alt")+'</div><div class="jx-tool-point-dir-down"></div></div></div>';
                        KISSY.one('body').append(html);
                        var left = liPos.left + hoverLi.outerWidth()/2 - KISSY.one(".downbartitle").width()/2 + "px";
                        KISSY.one(".downbartitle").css("left",left).show();

                        hoverLiTitle = hoverLi.attr("alt");
                        var i = 0;
                        liLater = KISSY.later(function() {
                            if( hoverLi && hoverLi.attr("alt") != hoverLiTitle ){
                                hoverLiTitle = hoverLi.attr("alt");
                                KISSY.one(".jx-bar-button-tooltip") && KISSY.one(".jx-bar-button-tooltip").html(hoverLi.attr("alt"));
                            }
                        }, 100, true, null);
                        e.halt();
                    }
                });
                $("#wltao-downbar li").on("mouseleave", function(event){
                    if( hoverLi && !hoverLi.hasClass(".noalt") ){
                        $(this).removeClass("dtHover");
                        liLater.cancel();
                        hoverLiTitle = "";
                        hoverLi = "";
                        KISSY.one(".downbartitle") && KISSY.one(".downbartitle").remove();
                    }
                });
            });
        }
        function e(a, a1) {
            c(),
            d(a1)
        }
        //全文翻译
        function f ( allfanyiLi ){
            /*var scriptInsert = document.createElement("script");
            scriptInsert.src = "http://labs.microsofttranslator.com/bookmarklet/default.aspx?f=js&to=zh-chs";
            document.body.appendChild(scriptInsert);*/
            bk = new bS('47%', 20, 150, "正在加载全文翻译", 10000);
            KISSY.getScript('http://js.client.walatao.com/global/translate.js',{ success : function(){
                h();
            } , error : function(){ 
                bk.hide();
                allfanyiLi.attr("alt", "点击后将对当前网站进行全文翻译");
                fyShow = 0;
            }, timeout  : 10 });
        }
        function g ( allfanyiLi ) {
            //KISSY.Node.all('#MSTTExitLink').fire('click');
            document.getElementById('MSTTExitLink').click();
        }
        function h () {
            //KISSY.Node.all('#MSTTExitLink').fire('click');
            try
            {
                if( document.getElementById('MicrosoftTranslatorToolbar').style.display != 'none' ){
                    setTimeout( function(){
                        bk.hide();
                        fyShow = 0;
                    },50);
                }else if( fyShow == 0 ){

                }else{
                    setTimeout(function()
                    {
                         h()
                    },100);  
                }
            }
            catch(_)
            {
                setTimeout(function()
                {
                     h()
                },100);
            }
        }

        function xS(A,B,C,D,E,F){ 

            var $=function (id){return document.getElementById(id)},Y=+!!F; 
            (A=$(A)).appendChild((B=$(B)).cloneNode(true)); 
            (function (){ 
            var m=A.scrollTop%C?(E||0):D; 
            A.scrollTop=[0,B.offsetHeight][Y]==A.scrollTop?[B.offsetHeight-1,1][Y]:(A.scrollTop+[-1,1][Y]); 
			var sleepTs = m <= E ? m : (firstTs ? 10000:m);
            setTimeout(arguments.callee, sleepTs);
			if(sleepTs == 10000)firstTs = false;
			
            })() 
            return arguments.callee; 
        } 


        var bk = '';
            da = 0,
            downbartitleRemove = 0,
            fyShow = 0;
		var firstTs = true;
		function dbar(){
		
		}
        return e
    },
    {
        requires: ["overlay", "node"]
    })

wltao_tools.getMessageFromBackground({
        operate: "getLocalStorage",
        data: {"key":"isShowDownBar"}
    },function(z){
         var z1  = typeof z == "object" ? z: JSON.parse(z);
         KISSY.use("wltaodwonbar", 
         function(b, c) {

			function append_anyway(){
			    var html = "<div id='wltao-downbar' style='height:0px;width:640px; margin-left: -320px;z-index:2147483647' class='wltao-downbar' > <div id='wltao-downbar-show'> <ul id='wltao-downbar-widget-0' len='201'> <li alt='关于瓦拉淘助手介绍' len='165' id='wltao-downbar-logo' class='wltao-stat' data-stat='web.downbar.logo'> <img src='http://js.client.walatao.com/v6/godimage/downbar-logo.png'  style='vertical-align: bottom; border: 0px solid rgb(255, 255, 255);'>  </li> </ul> <span class='wltao-downbar-separator-left' len='0'></span> <ul id='wltao-downbar-widget-2' len='206'> <li  alt='点击后将对当前网站进行全文翻译' len='165' id='wltao-downbar-allfanyi' class='wlato-normal wltao-stat' data-stat='web.downbar.allfanyi'> <span class='wltao-downbar-btn' len='135'> <img src='http://js.client.walatao.com/v6/godimage/downbar-qwfy.png'  style='vertical-align: bottom; border: 0px solid rgb(255, 255, 255);'> </span> </li> </ul> <ul id='wltao-downbar-widget-3' len='724'> <li  alt='点击打开单句翻译功能' len='689'  id='wltao-downbar-fanyi' class='wlato-normal wltao-stat' data-stat='web.downbar.fanyi'> <span class='wltao-downbar-btn' len='135'> <img src='http://js.client.walatao.com/v6/godimage/downbar-jzfy.png'  style='vertical-align: bottom; border: 0px solid rgb(255, 255, 255);'> </span> <div class='xfk wltao_triangle bottom' len='501' style='left: -88px; display: none;'> <div class='ht_tooltip' len='471' style='width: 400px;'> <div class='ht_tooltip_border' len='374' style='height: 325px;'> <div class='ht_tooltip_main' len='339'> <div class='ht_tooltip_title' len='83'> <div class='ht_tooltip_title_text' len='0'><a href='http://fanyi.baidu.com/#auto/zh/' target='_blank'><img src='http://js.client.walatao.com/v9/godimage/baiduTranslation.png' /></a></div> <div class='ht_tooltip_title_btn' style='color:#ccc' len='2' lang='zh-chs'>关闭</div> </div> <div class='ht_tooltip_content' len='182'> <iframe src='http://www.walatao.com/actives/fanyi-amazon.html ' class='ht-xfk_iframe' width='388' height='295' frameborder='no' border='0' marginwidth='0' marginheight='0' len='0'></iframe> </div> </div> </div> <div class='ht_down' len='33'> <div class='ht_down_arrow' len='0' style='margin-left: 193px;'></div> </div> </div> </div> </li> </ul> <span class='wltao-downbar-separator-left' len='0'></span> <ul id='wltao-downbar-widget-6' len='201'> <li  len='165' id='wltao-downbar-ad' class='wlato-normal noalt'> <div id='google1' style='width:500px'> <ul id='dhooo1'>  <li alt='瓦拉淘：让海淘变得从未如此简单过,来自腾讯网'><a href='http://go.walatao.com/jump.php?id=aHR0cCUzQSUyRiUyRnNoLnFxLmNvbSUyRmElMkYyMDE0MDkyNiUyRjAyMjExOC5odG0=' target='_blank' class=' wltao-stat' data-stat='web.downbar.ad'>瓦拉淘：让海淘变得从未如此简单过</a></li> <li alt='性能强大！海淘插件：瓦拉淘使用报告,来自聚超值'><a href='http://go.walatao.com/jump.php?id=aHR0cCUzQSUyRiUyRmJlc3QucGNvbmxpbmUuY29tLmNuJTJGc2hhaXd1JTJGNzM5MjcuaHRtbA==' target='_blank' class=' wltao-stat' data-stat='web.downbar.ad'>性能强大！海淘插件：瓦拉淘使用报告</a></li> <li alt='好用的浏览器插件 海淘必备助手,来自买手党'><a href='http://go.walatao.com/jump.php?id=aHR0cCUzQSUyRiUyRnd3dy5tYWlzaG91ZGFuZy5jb20lMkZtZXJjaGFudHMlMkYxNzk=' target='_blank' class=' wltao-stat' data-stat='web.downbar.ad'>好用的浏览器插件  海淘必备助手</a></li> <li alt='瓦拉淘：又一款好用的浏览器海淘插件,来自极客海淘'><a href='http://go.walatao.com/jump.php?id=aHR0cCUzQSUyRiUyRnd3dy4xMjNoYWl0YW8uY29tJTJGdCUyRjM0OTIz' target='_blank' class=' wltao-stat' data-stat='web.downbar.ad'>瓦拉淘：又一款浏览器海淘插件</a></li> <li alt='海淘不用愁！瓦拉淘浏览器插件帮你开启海淘懒人模式,来自太平洋电脑网'><a href='http://go.walatao.com/jump.php?id=aHR0cCUzQSUyRiUyRml0YmJzLnBjb25saW5lLmNvbS5jbiUyRnNvZnQlMkY1MTc1NDUyMy5odG1s' target='_blank' class=' wltao-stat' data-stat='web.downbar.ad'>海淘不用愁！瓦拉淘浏览器插件帮你开启海淘懒人模式</a></li>   </ul> </div> </li> </ul> <span class='wltao-downbar-separator-left' len='0'></span> <ul id='wltao-downbar-hid-con-id' class='wltao-downbar-bar-button-right' len='64'> <li alt='收起海淘助手' len='42' id='wltao-downbar-hid-btn-id' class='wlato-normal wltao-stat' data-stat='web.downbar.hide'><a id='wltao-downbar-show-a' len='0'></a></li> </ul> <span id='wltao-downbar-hid-sep-id' class='wltao-downbar-hide-separator' len='0'></span> </div> <div id='wltao-downbar-hide' class='hidden'> <ul id='wltao-downbar-hid-con-id' class='wltao-downbar-bar-button-right' len='64'> <li alt='展开海淘助手' len='42' id='wltao-downbar-hid-btn-id' class='wlato-normal wltao-stat' data-stat='web.downbar.show'><a id='wltao-downbar-hide-a' len='0'></a></li> </ul> </div> </div>";
				KISSY.one("body").append(html);
				new c('', z1.value);     
				KISSY.Stat("showpinglun=true&downbarShow=" + z1.value);
				return;		
			}

            var    bid  = KISSY.one("#ASIN") ? KISSY.one("#ASIN").attr("value") : "";
            if(bid.length > 0){
                var ss = location.href.split('/');
                var urlid = 'unknown';
                for(var i = 0; i < ss.length; i++){
					var ts = ss[i].split('?');
					for(var j = 0 ; j < ts.length; j++){
						if(ts[j].length == 10 && ts[j].toUpperCase() == ts[j]){
							urlid = ts[j];
							break;
						}
					}
                }
            
                KISSY.io.get("http://js.client.walatao.com/v6/svr/feed/showbatxt.php?id=" + bid + "&urlid=" + urlid, function(a){
                    var r = typeof a == "object" ? a: JSON.parse(a);
                    if(r.adlist.length > 0){
                        var html = "<div id='wltao-downbar' style='height:0px;width:640px; margin-left: -320px;z-index:2147483647' class='wltao-downbar hidden' > <div id='wltao-downbar-show'> <ul id='wltao-downbar-widget-0' len='201'> <li alt='关于瓦拉淘助手介绍' len='165' id='wltao-downbar-logo' class='wltao-stat' data-stat='web.downbar.logo'> <img src='http://js.client.walatao.com/v6/godimage/downbar-logo.png'  style='vertical-align: bottom; border: 0px solid rgb(255, 255, 255);'>  </li> </ul> <span class='wltao-downbar-separator-left' len='0'></span> <ul id='wltao-downbar-widget-2' len='206'> <li  alt='点击后将对当前网站进行全文翻译' len='165' id='wltao-downbar-allfanyi' class='wlato-normal wltao-stat' data-stat='web.downbar.allfanyi'> <span class='wltao-downbar-btn' len='135'> <img src='http://js.client.walatao.com/v6/godimage/downbar-qwfy.png'  style='vertical-align: bottom; border: 0px solid rgb(255, 255, 255);'> </span> </li> </ul> <ul id='wltao-downbar-widget-3' len='724'> <li  alt='点击打开单句翻译功能' len='689'  id='wltao-downbar-fanyi' class='wlato-normal wltao-stat' data-stat='web.downbar.fanyi'> <span class='wltao-downbar-btn' len='135'> <img src='http://js.client.walatao.com/v6/godimage/downbar-jzfy.png'  style='vertical-align: bottom; border: 0px solid rgb(255, 255, 255);'> </span> <div class='xfk wltao_triangle bottom' len='501' style='left: -88px; display: none;'> <div class='ht_tooltip' len='471' style='width: 400px;'> <div class='ht_tooltip_border' len='374' style='height: 325px;'> <div class='ht_tooltip_main' len='339'> <div class='ht_tooltip_title' len='83'> <div class='ht_tooltip_title_text' len='0'><a href='http://fanyi.baidu.com/#auto/zh/' target='_blank'><img src='http://js.client.walatao.com/v9/godimage/baiduTranslation.png' /></a></div> <div class='ht_tooltip_title_btn' style='color:#ccc' len='2' lang='zh-chs'>关闭</div> </div> <div class='ht_tooltip_content' len='182'> <iframe src='http://www.walatao.com/actives/fanyi-amazon.html ' class='ht-xfk_iframe' width='388' height='295' frameborder='no' border='0' marginwidth='0' marginheight='0' len='0'></iframe> </div> </div> </div> <div class='ht_down' len='33'> <div class='ht_down_arrow' len='0' style='margin-left: 193px;'></div> </div> </div> </div> </li> </ul> <span class='wltao-downbar-separator-left' len='0'></span> <ul id='wltao-downbar-widget-6' len='201'> <li  len='165' id='wltao-downbar-ad' class='wlato-normal noalt'> <div id='google1' style='width:500px'> <ul id='dhooo1'>  <li alt='谷歌市场无法访问，手动安装瓦拉淘'><a href='http://www.walatao.com/blog/?p=75' target='_blank' class=' wltao-stat' data-stat='web.downbar.ad'>谷歌市场无法访问，手动安装瓦拉</a></li> <li alt='百通转运攻略'><a href='http://www.walatao.com/blog/?p=50' target='_blank'  class=' wltao-stat' data-stat='web.downbar.ad'>百通转运攻略</a></li> <li alt='国外购物不需要密码吗？'><a href='http://www.walatao.com/blog/?p=42' target='_blank' alt='国外购物不需要密码吗？' class=' wltao-stat' data-stat='web.downbar.ad'>国外购物不需要密码吗？</a></li><li alt='海淘鞋子如何选择尺寸？'><a href='http://www.walatao.com/blog/?p=37' target='_blank' class=' wltao-stat' data-stat='web.downbar.ad'>海淘鞋子如何选择尺寸？</a></li> </ul> </div> </li> </ul> <span class='wltao-downbar-separator-left' len='0'></span> <ul id='wltao-downbar-hid-con-id' class='wltao-downbar-bar-button-right' len='64'> <li alt='收起海淘助手' len='42' id='wltao-downbar-hid-btn-id' class='wlato-normal wltao-stat' data-stat='web.downbar.hide'><a id='wltao-downbar-show-a' len='0'></a></li> </ul> <span id='wltao-downbar-hid-sep-id' class='wltao-downbar-hide-separator' len='0'></span> </div> <div id='wltao-downbar-hide' class='hidden'> <ul id='wltao-downbar-hid-con-id' class='wltao-downbar-bar-button-right' len='64'> <li alt='展开海淘助手' len='42' id='wltao-downbar-hid-btn-id' class='wlato-normal wltao-stat' data-stat='web.downbar.show'><a id='wltao-downbar-hide-a' len='0'></a></li> </ul> </div> </div>";
                        KISSY.one("body").append(html);
                        var h = "";
                        var rp_all = function(a,b,c){if(a.indexOf(b) != -1){a = a.replace(b,c);return rp_all(a,b,c);}else{ return a;}};
                        for(var i = 0; i < r.adlist.length; i++){
                            var t = "<li alt='《"+rp_all(rp_all(decodeURIComponent(r.adlist[i].title), '+', ' '), "'","‘") + "》" + decodeURIComponent(r.adlist[i].from) +"'><a href='" + decodeURIComponent(r.adlist[i].url) +"' target='_blank' class=' wltao-stat' data-stat='web.downbar.ad" + r.adlist[i].type + "'> "+ rp_all(decodeURIComponent(r.adlist[i].title), '+', ' ') +"</a></li>";
                            h += t;
                        }
                        KISSY.one("#wltao-downbar #dhooo1").html(h);
                        new c(a, z1.value);     
                        KISSY.Stat("showpinglun=true&downbarShow=" + z1.value);
						return;
                    }
                    else{
                        KISSY.Stat("showpinglun=false&downbarShow=" + z1.value);
						append_anyway();
                    }			
                })
            }else{
				append_anyway();
			}
    });
});
