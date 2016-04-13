$(function () {
	
   $('.l-reply,.send').click(function () {
      var username = '';

      if ($(this).attr('class') == 'l-reply') {
         username = $(this).parents('dd').prev().find('a').html();
      }

   	var letterLeft = ($(window).width() - $('#letter').width()) / 2;
	 	var letterTop = $(document).scrollTop() + ($(window).height() - $('#letter').height()) / 2;
		var obj = $('#letter').show().css({
	 		'left' : letterLeft,
	 		'top' : letterTop
	 	});

      obj.find('input[name=name]').val(username);
      obj.find('textarea').focus();
		createBg('letter-bg');
		drag(obj, obj.find('.letter_head'));
   });
   //关闭
   $('.letter-cencle').click(function () {
   		$('#letter').hide();
   		$('#letter-bg').remove();
   });

   /**
    * 删除私信
    */
   $('.ot_delete_pop dn').click(function () {
      var isDel = confirm('确认删除');
      var lid = $(this).attr('lid');
      var lid = $(this).attr('title');
      var obj = $(this).parents('dl');

      if (isDel) {
         $.post(delLetter, {lid : lid}, function (data) {
            if (data) {
               obj.slideUp('slow', function () {
                  obj.remove();
               });
            } else {
               alert('删除失败重请试...');
            }
         }, 'json');
      }
   })
})