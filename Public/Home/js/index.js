<script language="JavaScript" type="text/javascript"> 

    $(document).ready(function(){
        $("#companyaffix").affix({
            offset: { 
                top: 180 
            }
        });
        
       
    });
	
	/**
	 * �ղ�
	 */
	$('.keep').click(function () {
        //alert(11111);
        var wid =$(this).attr('wid');
        var keepUP = $(this).next();
       var msg ='';
        $.post(URL,{ wid : wid}, function(data){
             //alert('data');
           if (data == 1) {
                msg = '�ղسɹ�';
           }
            
           if (data == -1) {
                msg = '���ղ�';
           }

            if (data == 0) {
                msg = '�ղ�ʧ��';
            }
            keepUP.html(msg).fadeIn();
                setTimeout(function () {
                keepUP.fadeOut();
            }, 3000);
          
        },'json');
       
	});
	
     $(".jd_col").bind("mouseover",
      function() {
          var a = $(this).find("span#collection_jd");
          $(this).addClass("collection_hover"),
          $(this).hasClass("collected") ? (a.text("���ղ�"), a.removeClass("dn")) : (a.text("�ղ�"), a.removeClass("dn"))
      }),
      $(".jd_col").bind("mouseout",
      function() {
          $(this).find("span#collection_jd").addClass("dn"),
          $(this).removeClass("collection_hover")
      });
      $(".jd_col").bind("mouseover",
      function() {
          var a = $(this).find("i.collection_jd_trangle");
          a.removeClass("dn")
      }),
      $(".jd_col").bind("mouseout",
      function() {
          $(this).find("i.collection_jd_trangle").addClass("dn"),
          $(this).removeClass("collection_hover")
        });

      
    $('.chooseworkcat :input').labelauty();
    $("#choosebox").fancybox({
        helpers : {
            overlay : {
                locked: false,
                css : {
                    'background' : 'rgba(152, 147, 194, 0.9)',
                    'overlayOpacity'    : 0.9
                }
            }
        }
    });
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</script> 