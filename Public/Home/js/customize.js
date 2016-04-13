
    $(document).ready(function() {
      var flag = true;
      gridlist();
      $("#ot-add").click(function(){
        $("#ot-addform").css("display","block");
        $("#ot-add").addClass("hn");
        $(".cbp-vm-options").addClass("hn");
        $("#ot-empty").css("display","none");
        $('.ot-delete').removeAttr('onclick');
        flag = false;
      });

      $("div").delegate(".btn_cancel","click",function(){ 
          cancel();
      }); 
      function cancel(){
        $("#ot-addform").css("display","none");
        // $("#ot-empty").css("display","block");
        $("#ot-add").removeClass("hn");
        $(".cbp-vm-options").removeClass("hn");
         flag = true;
      }
      $('#ot-addform .btn_cancel').click(function(){
        var customid = 0;

        $.ajax({
          type:"POST",
          url:ctx + "Resume/customizecheck",
          data:{
          customid: customid,
        },
          success:function(b) {
            var b = jQuery.parseJSON(b);
            console.log(b);
            //console.log(b.content.customize);
            custom = b.content.customize;
            cancel();
            $('#customize_list').removeClass('dn');
            customlist(custom);
            $("#addCustomForm").get(0).reset(); 
          }
        });
        return false;
      });

      $('#addCustomForm .mr_save').click(function(){
        var customid = $('input[name="customid"]').val();
        var title = $('input[name="title"]').val();
        var content = $('textarea[name="content"]').val();
        $.ajax({
          type:"POST",
          url:ctx + "Resume/customizeedit",
          data:{
          customid: customid,
          title: title,
          content: content,
        },
          success:function(b) {
            var b = jQuery.parseJSON(b);
            //console.log(b);
            //console.log(b.content.customize);
            custom = b.content.customize;
            cancel();
            $('#customize_list').removeClass('dn');
            customlist(custom);
            $("#addCustomForm").get(0).reset(); 
          }
        });
        return false;
      });
       $('#upCustomForm .mr_save').click(function(){
        //submitcustomform();
        var customid = $('#upCustomForm input[name="customid"]').val();
        var title = $('#upCustomForm input[name="title"]').val();
        var content = $('#upCustomForm textarea[name="content"]').val();

        $.ajax({
          type:"POST",
          url:ctx + "Resume/customizeedit",
          data:{
          customid: customid,
          title: title,
          content: content,
        },
          success:function(b) {
            var b = jQuery.parseJSON(b); 
            //console.log(b);
            //console.log(b.content.customize);
            custom = b.content.customize;
            customlist(custom);
            $("#upCustomForm").get(0).reset();
            
          }
        });
        return false;
      });
      $("div").delegate(".ot-delete","click",function(){ 
        if(flag){
          var title =$(this).parent().attr("data-title");
          var customid =$(this).parent().attr("data-customid");
          $(".ot_del_ok").attr("data-id", customid);
          $('.ot_delete_title').text('"'+title+'"');
          $(".ot_delete_pop").removeClass("dn");
        }
      }); 


      $(".ot_delete_pop").delegate(".ot_del_cancel","click",function(){ 
          $(".ot_delete_pop").addClass("dn");
      }); 

      $("#customize_list").delegate(".cbp-vm-title","mouseover",function(){ 
         $(this).toggleClass("ot-current");
      }); 
       $("#customize_list").delegate(".cbp-vm-title","mouseout",function(){ 
       $(this).toggleClass("ot-current");
      }); 

      $("div").delegate(".icon-otedit","click",function(){ 
        if (flag) {
          var customid =$(this).parent().attr("data-customid");
          var title =$(this).parent().attr("data-title");
          var content =$(this).parent().attr("data-content");
          $('#upCustomForm').removeClass('dn');
          $('#upCustomForm input[name="title"]').val(title);
          $('#upCustomForm input[name="customid"]').val(customid);
          $('#upCustomForm textarea[name="content"]').val(content);
          $('#customize_list').addClass('dn');
        }
        
      }); 

        $('#upCustomForm .btn-resumeac').click(function(){
          $('#upCustomForm').addClass('dn');
          $('#customize_list').removeClass('dn');
        });

        $(".ot_delete_pop").delegate(".ot_del_ok", "click", function() {
          
          var customid =$(this).attr("data-id");
          $.ajax({
            type:"POST",
            url:ctx + "Resume/delCustomize",
            data:{
            customid: customid,
          },
            success:function(b) {
              var b = jQuery.parseJSON(b); 
              //console.log(b);
              //console.log(b.content.customize);
              custom = b.content.customize;
              $(".ot_delete_pop").addClass('dn');
              customlist(custom);
            }
          });
        });

    });

    function customlist(a) {
      //console.log(a);

      var c, b = "";
      if (a != "") {
        $('#ot-empty').css('display','none');
        for (c = 0; c < a.length; c++)
        b += '<li class="z_i"><h3 class="cbp-vm-title">' + a[c].title + '<div id="ot-righticon" data-customid="' + a[c].id + '" data-title="' + a[c].title + '"  data-content="' + a[c].content + '"><a class="icon-resume icon-ottrush ot-delete"></a><a class="icon-resume icon-otedit" ></a></div></h3><div class="cbp-vm-details"><pre>' + a[c].content + '</pre></div></li>';
        $('#customize_list').html(b);
      }else if (a == "") {
        $('#ot-empty').css('display','block');
        $('#customize_list').addClass('dn');
      }
    
    }
     