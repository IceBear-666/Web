"use strict";

String.prototype.startWith = function (str) {
  if (str === null || str === "" || this.length === 0 || str.length > this.length) {
    return false;
  }

  return this.substr(0, str.length) === str;
}
//得到当前 页面url，判断是由哪个链接来源
var curUrl = document.URL;

//从待处理简历点进进入页面的连接处理，默认我在招人，拉勾简历处理流程
var $qa_new_frttab = $(".qa_new_frttab");
var $qa_new_sndtab = $(".qa_new_sndtab");
var $qa_zr_snd = $(".qa_zr_snd");
var $qa_zr_frt = $(".qa_zr_frt");
var index = curUrl.indexOf("&");
if(index != -1){
  $qa_new_sndtab.addClass('qa_selected');
  $qa_new_frttab.removeClass('qa_selected');
  $qa_zr_snd.show();
  $qa_zr_frt.hide();
  showQa($(".qa_two"));
}else{
  var lastEl= curUrl.charAt(curUrl.length - 1);
  //lastEl为1代表从footer的入口点击默认为我要找工作，为2代表从简历管理入口点击默认为我要招人
  if( lastEl == 1 || lastEl == "l"){
    $('.selector_employee').addClass('active').siblings('.selector_employer').removeClass('active');
    $('.border').css( "left", "0");
    $('.qa_employee_wap').show().siblings('.qa_employer_wap').hide();

  }else if( lastEl == 2 ){
    $('.border').css('left', '130px');
    $qa_zr_frt.show();
    $('.qa_employee_wap').hide().siblings('.qa_employer_wap').show();
  }

}


$('.q_content').each(function () {
  var qContent = $.trim($(this).text());

  if (qContent.startWith('【')) {
    $(this).css({
      paddingLeft: '2px'
    });
  }
});

// 切换我要找工作
$('.selector_employee').click(function () {
  $('.selector').not(this).removeClass('active');
  $(this).addClass('active');

  $('.qa').each(function () {
    hideQa($(this));
  });

  $('.qa_employee_wap').show();
  $('.qa_employer_wap').hide();

  $('.border').animate({
    left: 0
  }, 200);
});

// 切换我要招人
$('.selector_employer').click(function () {
  $('.selector').not(this).removeClass('active');
  $(this).addClass('active');

  $('.qa').each(function () {
    hideQa($(this));
  });

  $('.qa_employer_wap').show();
  $('.qa_employee_wap').hide();
  // if($qa_zr_frt.hasClass("qa_selected")){
  //   $(".qa_zr_frt").show();
  // }else{
  //   $(".qa_zr_snd").show();
  // }
  $('.border').animate({
    left: 130
  }, 200);
});

//我要招人,两个tab切换
$qa_new_frttab.click(function(){
  $qa_zr_snd.hide();
  $qa_zr_frt.show();
  $(this).addClass("qa_selected");
  $qa_new_sndtab.removeClass("qa_selected");
  hideQa($(".qa_two"));
});

$qa_new_sndtab.click(function(){
  $qa_zr_frt.hide();
  $qa_zr_snd.show();
  $(this).addClass("qa_selected");
  $qa_new_frttab.removeClass("qa_selected");
});

// 显示/隐藏Q&A
$('.qa').click(function () {

  $('.qa').not(this).each(function () {
    hideQa($(this));
  });
  
  if ($(this).hasClass('active')) {
    hideQa($(this));
  } else {
    showQa($(this));
  }
});

/**
 * Show .qa element.
 */
function showQa(qa) {
  qa.addClass('active').find('.a').slideDown(150);
}

/**
 * Hide .qa element.
 */
function hideQa(qa) {
  qa.removeClass('active').find('.a').slideUp(150);
}
