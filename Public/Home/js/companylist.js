    $(document).ready(function(){
        checkusercat();
        function checkusercat(){
            var a = <?php echo json_encode($user_cat)?>;
            //var c = a.length;
            //alert(c);
            if (a == null) {
                $("#choosebox").click();
            }   
        }
        //$('.choose-btn').click(function(){
        $("div").delegate(".choose-btn","click",function(){ 
        var checked = $("input[name='company_cat[]']:checked");
        var num = checked.length;
        
        if (num>0) {
            var company_cat = $("input[name='company_cat[]']:checked").serialize();
            $.ajax({
                url: ctx + "Company/userCompanyCat",
                type: "post",
                data: company_cat,
                success: function (result) {
                    location.reload();
                }
            });
        }else{
            alert("至少选择一项");
            $('#chooseworkcat span.tip').css('color','red');
            return false;
        }
        
    }); 

    (function() {
      [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
        new CBPFWTabs( el );
      });
    })();
        // $("#companyaffix").affix({
        //     offset: { 
        //         top: 180 
        //     }
        // });
        
        // $(".jm_companylist_l .nav li").click(function(){
        //     $(this).addClass("active").siblings().removeClass("active")
        // });


        //  $("ul.top-cat li a").click(function(){
        //     $(this).addClass("active").siblings().removeClass("active")
        // });

       // $('[data-spy="scroll"]').each(function () {
       //    var $spy = $(this).scrollspy('refresh')
       //  })

       // $("#myScrollspy").scrollspy();

       // $(".jm_companylist_l .nav li").first().addClass("active");

       // window.onload=function(){
       //  $(".jm_companylist_l .nav li").last().removeClass("active");
       // }
    });
	$("div").delegate(".jobCollection","click",function(){ 
      var cid =$(this).attr('cid');
        var keepUP = $(this).children('span');
        var obj=$(this).parent();
        var msg ='';

        $.ajax({
          type:"POST",
          url:ctx + "Company/keep",
          data:{
          cid: cid,
        },
          success:function(data) {
            //alert(data);
            if (data != 0 && data != -1) {
                msg = '取消收藏';
                obj.children('div').attr('kid',data);
                obj.children('div').addClass('collected').removeClass('jobCollection');
           }
            
           if (data == -1) {
                msg = '已收藏';
           }

            if (data == 0) {
                msg = '收藏失败';
            }

            keepUP.html(msg).removeClass('dn');

          }
        });
        return false;
    }); 

	$("div").delegate(".collected","click",function(){ 
    //$('.collected').click(function(){
        var kid =$(this).attr('kid');
        var keepCancel = $(this).children('span');
        var obj=$(this).parent();
        var msg ='';

        $.ajax({
          type:"POST",
          url:ctx + "Company/cancelKeep",
          data:{
          kid: kid,
        },
          success:function(data) {
            //alert(data);
            if (data == 1) {
                msg = '收藏';
                obj.children('div').addClass('jobCollection').removeClass('collected');
           }
            
           if (data == -1) {
                msg = '已取消';
           }

            if (data == 0) {
                msg = '取消失败';
            }

            keepCancel.html(msg).removeClass('dn');
  
          }
        });
        return false;
      });

	
     $(".jd_col").bind("mouseover",
      function() {
          var a = $(this).find("span.collection_jd");
          $(this).addClass("collection_hover"),
           a.removeClass("dn")
         // $(this).hasClass("collected") ? (a.text("已收藏"), a.removeClass("dn")) : (a.text("收藏"), a.removeClass("dn"))
      }),
      $(".jd_col").bind("mouseout",
      function() {
          $(this).find("span.collection_jd").addClass("dn"),
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
                closeClick: false,
                locked: false,
                css : {
                    'background' : 'rgba(152, 147, 194, 0.9)',
                    'overlayOpacity'    : 0.9
                }
            }

        }


    });
	