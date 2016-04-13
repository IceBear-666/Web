$(document).ready(initTrans);

function initTrans() {
    $("#txtTransInput").keydown(transKeyDown);
    $("#btnTrans").click(translate);
    $("#empty-input-btn").click(emptyInput);
}

function transKeyDown(event) {
    if (event.which == 13) {        //回车key
        translate();
    }
}

function translate() {
    var inputVal = $("#txtTransInput").val();
    if (String(inputVal).length > 4999) {
        alert("你输入的文字过长，不能翻译！");
        return;
    }
    $.getJSON('https://js.client.walatao.com/global/wlt_interface.php?callback=?&action=fanyi',{'word': inputVal}, function( data ){
        var translation = data.trans_result, ad = '';
        if (translation != "" && typeof(translation) != "undefined"){
            ad = translation[0].dst;
        }
        $("#transResult").val(ad);
    });
}

function emptyInput() {
    $("#txtTransInput").val("");
    $("#transResult").val("");
}