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