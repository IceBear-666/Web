function handleFrames() {
    try {
        $.each(Array.prototype.slice.call(window.frames), function(a, b) {
            b.document.body.onclick = function() {
                b.top.document.body.click()
            }
        })
    } catch (a) {}
}
function initMceMr() {
    $("textarea.tinymce") && $("textarea.tinymce").tinymce({
        script_url: ctx + "Public/Home/js/tinymce/jscripts/tiny_mce/tiny_mce.js",
        theme: "advanced",
        language: "zh-cn",
        plugins: "paste,autolink,lists,style,layer,save,advhr,advimage,advlink,iespell,inlinepopups,preview,media,searchreplace,contextmenu,fullscreen,noneditable,visualchars,nonbreaking",
        theme_advanced_buttons1: "bullist,numlist",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "none",
        theme_advanced_resizing: !1,
        paste_auto_cleanup_on_paste: !0,
        paste_as_text: !0,
        auto_cleanup_word: !0,
        paste_remove_styles: !0,
        contextmenu: "copy cut paste",
        force_br_newlines: !0,
        force_p_newlines: !1,
        apply_source_formatting: !1,
        remove_linebreaks: !1,
        convert_newlines_to_brs: !0,
        content_css: ctx + "Public/Home/js/tinymce/examples/css/content.css",
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        },
        onchange_callback: function(a) {
            tinyMCE.triggerSave();
            var b = tinyMCE.get(a.id).getContent();
            if (b.length > 0)
                try {
                    $("#" + a.id).valid()
                } catch (c) {}
        }
    })
}
function initMceMr1() {
    $("textarea.tinymce1") && $("textarea.tinymce1").tinymce({
        script_url: ctx + "Public/Home/js/tinymce/jscripts/tiny_mce/tiny_mce.js",
        theme: "advanced",
        language: "zh-cn",
        plugins: "paste,autolink,lists,style,layer,save,advhr,advimage,advlink,iespell,inlinepopups,preview,media,searchreplace,contextmenu,fullscreen,noneditable,visualchars,nonbreaking",
        theme_advanced_buttons1: "bullist,numlist",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "none",
        theme_advanced_resizing: !1,
        paste_auto_cleanup_on_paste: !0,
        paste_as_text: !0,
        auto_cleanup_word: !0,
        paste_remove_styles: !0,
        contextmenu: "copy cut paste",
        force_br_newlines: !0,
        force_p_newlines: !1,
        apply_source_formatting: !1,
        remove_linebreaks: !1,
        convert_newlines_to_brs: !0,
        content_css: ctx + "Public/Home/js/tinymce/examples/css/content.css",
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        },
        onchange_callback: function(a) {
            tinyMCE.triggerSave();
            var b = tinyMCE.get(a.id).getContent();
            if (b.length > 0)
                try {
                    $("#" + a.id).valid()
                } catch (c) {}
        }
    })
}
function validateChange(a) {
    var b = $(a)
      , 
    c = b.parents("form").validate().element(b);
    c && b.parent().css("margin-bottom", "0")
}
function img_check(o, action_url, id) {
    var _obj = $(o)
      , 
    obj = $("#" + id)
      , 
    oNext = obj.next()
      , 
    oPrev = obj.prev();
    this.AllowExt = ".jpg,.gif,.jpeg,.png,.pjpeg",
    this.FileExt = obj.val().substr(obj.val().lastIndexOf(".")).toLowerCase(),
    0 != this.AllowExt && -1 == this.AllowExt.indexOf(this.FileExt) ? errorTips("请上传jpg、gif、png格式头像，大小不超过2M") : ($("#" + id + "_error").text("").hide(),
    $.ajaxFileUpload({
        url: action_url,
        secureuri: !1,
        fileElementId: id,
        data: {
            companyLogo: obj.val(),
            workId: oMoudle.workId
        },
        dataType: "text",
        success: function(rs) {
            var data, imgSrc;
            oMoudle.workId = "",
            data = eval("(" + rs + ")"),
            data.success ? (imgSrc = ctx + "/" + data.content,
            oPrev.removeClass("active").addClass("up"),
            oNext.css({
                width: 120,
                height: 120
            }).attr("src", imgSrc),
            $("#selfDescription").find(".mr_headimg").attr("src", imgSrc)) : errorTips("上传失败，请重新上传", "上传头像")
        },
        error: function() {
            errorTips("上传失败，请重新上传", "上传头像")
        }
    }))
}
function file_check(obj, action_url, id) {
    var userId;
    return 2 == uploadFlag ? !1 : (uploadFlag = 2,
    $("#loadingImg").css("visibility", "visible"),
    obj = $("#" + id),
    userId = $("#userid").val(),
    this.AllowExt = ".doc,.docx,.pdf",
    this.FileExt = obj.val().substr(obj.val().lastIndexOf(".")).toLowerCase(),
    "" == obj.val() ? ($("#loadingImg").css("visibility", "hidden"),
    !1) : (0 != this.AllowExt && -1 == this.AllowExt.indexOf(this.FileExt) ? (errorTips("只支持word、pdf格式文件，请重新上传"),
    $("#resumeUpload").val(""),
    $("#loadingImg").css("visibility", "hidden"),
    uploadFlag = 1) : $.ajaxFileUpload({
        type: "POST",
        url: action_url,
        secureuri: !1,
        fileElementId: id,
        data: {
            userId: userId
        },
        dataType: "text",
        success: function(jsonStr) {
            var json, isShowDefault;
            uploadFlag = 1,
            json = eval("(" + jsonStr + ")"),
            $("#loadingImg").css("visibility", "hidden"),
            json.success ? ($.ajax({
                url: ctx + "Resume/setDefaultResume",
                type: "POST",
                data: {
                    type: "0"
                }
            }).done(function(a) {
                a = $.parseJSON(a);
                //console.log(a.msg);
                //a.success ? $("#default_resume").val("默认投递：附件简历") : alert(a.msg)
            }),
            $(".mr_uploaded .mr_up_main a").text(json.content.nearbyName).attr("title", "下载" + json.content.nearbyName),
            $(".mr_uploaded .mr_up_main p").text(json.content.time),
            isShowDefault = $("#isShowDefault"),
            "0" == isShowDefault.val() ? $(".mr_uploaded .mr_set_default").hide() : $(".mr_uploaded .mr_set_default").show(),
            $(".mr_uploaded").show(),
            $.colorbox({
                inline: !0,
                href: $("div#uploadFileSuccess"),
                title: "上传附件简历"
            })) : -1 == json.code ? $.colorbox({
                inline: !0,
                href: $("div#fileResumeUpload"),
                title: "附件简历上传失败"
            }) : -2 == json.code ? $.colorbox({
                inline: !0,
                href: $("div#fileResumeUploadSize"),
                title: "附件简历上传失败"
            }) : (uploadFlag = 1,
            errorTips("简历上传失败，请重新上传"),
            $("#loadingImg").css("visibility", "hidden"))
        },
        error: function() {
            errorTips("简历上传失败，请重新上传"),
            $("#loadingImg").css("visibility", "hidden"),
            uploadFlag = 1,
            $(".btn_s").click(function() {
                window.location.reload()
            }),
            $("#colorbox").on("click", "#cboxClose", function() {
                "uploadFile" == $(this).siblings("#cboxLoadedContent").children("div").attr("id") && window.location.reload()
            })
        }
    }),
    void 0))
}
function getStrLen(a) {
    var c, d, b = 0;
    for (c = 0; c < a.length; c++)
        d = a.charCodeAt(c),
        b += isDbcCase(d) ? 1 : 2;
    return b
}
function isDbcCase(a) {
    return a >= 32 && 127 >= a ? !0 : a >= 65377 && 65439 >= a ? !0 : !1
}
function popQR() {
    $.ajax({
        url: ctx + "Public/qr/qrcode.jpg",
        type: "GET"
    }).done(function(a) {
        a.success && $(".dropdown_menu img").attr("src", a.content)
    })
}
function updateRatioRM(a, b) {
    //alert(a);alert(b);
    var d, c = 250 * (a / 100);
    d = 250 * (b / 100),
    $(".mr_solid").animate({
        width: c
    }),
    $(".mr_dashed").animate({
        width: d
    }),
    $(".mr_top .mr_bfb").text(a + "%")
}
function updateResumeTime(a) {
    $(".upResumeTime").text(a)
}
function initTitlePosition() {
    var a = parseInt($("#customBlock .cust_title").width()) / 2;
    $("#customBlock .cust_title").css("margin-left", -parseInt(.65 * a))
}
function switchResumeStatus(a, b, c) {
    $.colorbox.close(),
    $.ajax({
        url: ctx + "/mycenter/openMyResume.json",
        type: "POST",
        async: !1,
        data: {
            openStatus: a
        },
        dataType: "json"
    }).done(function(a) {
        var d, e, f;
        if (clearTimeout(f),
        d = $(".openresume_tip"),
        1 == a.state)
            d.hide(),
            e = $(".succ-fail"),
            1 == a.content.data.openStatus ? (c.eq(0).attr("checked", "checked"),
            $(b).removeClass("toggle-off"),
            e.find("p").text("已开启PLUS"),
            e.show()) : (c.eq(1).attr("checked", "checked"),
            $(b).addClass("toggle-off"),
            e.find("p").text("已关闭PLUS"),
            e.show()),
            f = setTimeout(function() {
                e.stop().hide(),
                openFlag = !0
            }, 3e3);
        else {
            if (405 == a.state)
                return $(".open_resume_notice").show(),
                !1;
            alert(a.message)
        }
    })
}
var amountScore, oMoudle, oMoudleScore, oDelMoudle, oMdScore, uploadFlag, openFlag, toggleHandler, projectTitle = $(".mr_jobe_list .l2 .projectTitle");
projectTitle.each(function() {
    var a = $(this)
      , 
    b = a.width();
    a.find("span").css("left", b + 5)
}),
amountScore = parseInt($.trim($(".mr_bfb").text())),
oMoudle = {
    workId: "",
    eduId: ""
},
oMoudleScore = {
    expectJobsScore: "",
    projectExpScore: "",
    workShowScore: "",
    skillScore: "",
    myRemarkScore: ""
},
oMdScore = {
    expectJobsScore: globals.expectJobsScore,
    skillScore: globals.skillScore,
    projectExpScore: globals.projectExperienceScore,
    workShowScore: globals.workShowScore,
    myRemarkScore: globals.myRemarkScore
},
$(function() {
    function g() {
        var a = $(".mr_job_des .mr_expjob_content")
          , 
        b = /&nbsp/g
          , 
        c = $.trim(a.text()).replace(b, "");
        "" != c && $(".mr_job_des").removeClass("dn")
    }
    function h() {
        $.validator.addMethod("uptextInMce", function(a) {
            var f, c = tinyMCE.get("upjobContent").getContent().replace(/<.*?>/g, ""), 
            d = getStrLen(c), 
            e = 0;
            for (f = 0; d > f; f++)
                a.charCodeAt(f) < 27 || a.charCodeAt(f) > 126 ? e += 2 : e++;
            return 1600 >= e || 0 == e ? !0 : !1
        }, "请输入1600字以内的工作内容"),
        $.validator.classRuleSettings.uptextInMce = {
            uptextInMce: !0
        }
    }
    
    
    function q(a, b, c) {
        var g, d = $("#workExperience .list_show .mr_jobe_list"), 
        e = $("#educationalBackground .list_show .mr_jobe_list"), 
        f = $(".toggle");
        a ? 0 == d.length || 0 == e.length ? (g = "2",
        s(f, c, g)) : r(c) : 0 == e.length ? (g = "2",
        s(f, c, g)) : ($(".openresume_tip").hide(),
        r(c))
    }
    function r(a) {
        globals.isOpenResume = a ? "3" : "0"
    }
    function s(a, b, c) {
        switch ($(".openresume_tip").hide(),
        a.addClass("toggle-off"),
        $(".openresume_tip").hide(),
        globals.isOpenResume = c,
        c) {
        case "2":
            $(".unopen").show();
            break;
        case "3":
            $(".firstset").show()
        }
        globals.isFirstOpen = b;
        var d = a.find("input");
        d.eq(0).attr("checked", "checked")
    }
    function t(a) {
        return a.stopPropagation(),
        !1
    }
    function x(a, b, c, d) {
        var e, f, g;
        if (y(),
        oDelMoudle.parent().parent().removeClass("md_flag").addClass("dn"),
        $("#" + b).addClass("dn"),
        "customBlock" != b) {
            switch (b) {
            case "expectJob":
                globals.hasExpectJobs = !1;
                break;
            case "skillsAssess":
                globals.hasSkillEvaluates = !1;
                break;
            case "selfDescription":
                globals.hasSelf = !1;
                break;
            case "worksShow":
                globals.hasWorkShows = !1
            }
            0 == c ? (e = parseInt($.trim($(".mr_bfb").text())),
            f = amountScore - e,
            g = parseInt(d.content.infoCompleteStatus.score),
            $(".mr_top .mr_bfb").text(g + "%"),
            amountScore = f + g,
            sb(b, 1)) : sb(b, 1)
        } else
            $("#customTitleName").val("");
        $(".hide_md").each(function() {
            var c = $(this).data("md");
            c == b && $(this).addClass("").removeClass("mr_hide")
        }),
        9 == $(".md_flag").length ? $(".mr_module_add").addClass("dn") : $(".mr_module_add").removeClass("dn"),
        a.parents(".mr_md_del").remove()
    }
    function y() {
        switch (d) {
        
        case "addEduForm":
            $("#addEduForm .mr_cancel").trigger("click");
            break;
        case "upEduForm":
            $("#upEduForm .mr_cancel").trigger("click");
            break;
        case "upSchClubForm":
            $("#upSchClubForm .mr_cancel").trigger("click");
            break;    
        
        default:
            return
        }
        mb(),
        d = "",
        f = !1
    }
    function z(a, b) {
        1 == b && y();
        var c = $("#" + a).offset();
        switch (a) {
        
        case "educationalBackground":
            1 == b && $("#educationalBackground .mr_head_r").trigger("click");
        
        default:
            return
        }
        $("body,html").animate({
            scrollTop: c.top
        }, 400, function() {
            $("#" + a).animate({
                borderColor: "#e46a4a"
            }, 300, function() {
                $(this).animate({
                    borderColor: "transparent"
                })
            })
        })
    }
    function A(a, b) {
        if (!a) {
            $(".openresume_tip").hide(),
            $(".unopen").show(),
            $(".toggle").addClass("toggle-off"),
            globals.isOpenResume = "2",
            globals.isFirstOpen = b;
            var c = $(".toggle").find("input");
            c.eq(0).attr("checked", "checked")
        }
    }
    function K(a) {
        a.find("table.mceToolbarRow1 td:nth-child(2)").addClass("ulolBorder"),
        a.find("table.mceToolbarRow1 td:nth-child(3)").addClass("ulolBorder")
    }
    
    function O(a) {
        var c, b = "";
        //for (c = 0; c < a.length; c++) b += '<div class="mr_jobe_list">', b += '	<div class="clearfixs">', b += '		<div class="mr_content_l">', a[c].companyLogo && (b += '			<div class="l1">', b += '				<img src="' + ctx + "/" + a[c].companyLogo + '" alt="公司logo"/>', b += "			</div>"), b += '			<div class="l2">', b += "				<h4>" + a[c].companyName + "</h4>", b += "				<span>" + a[c].positionName + "</span>", b += "			</div>", b += "		</div>", b += '<div class="mr_content_r">', b += '<div class="mr_edit mr_c_r_t" data-expid="' + a[c].id + '" data-logo="' + a[c].companyLogo + '" data-comname="' + a[c].companyName + '" data-posname="' + a[c].positionName + '" data-startime="' + a[c].startDate + '" data-endtime="' + a[c].endDate + '" data-content="' + a[c].workContent + '">', b += "<i></i><em>编辑</em>", b += "</div>", b += "<span>" + a[c].startDate + "</span><span> — </span><span>" + a[c].endDate + "</span>", b += "</div>", b += "</div>", b += '<div class="mr_content_m">' + (a[c].workContent || "") + "</div>", b += "</div>";
        //for (c = 0; c < a.length; c++) b += '<table><tr><th width="200px">工作单位</th><th width="200px">职位</th><th width="200px">时间</th><th width="200px">编辑</th></tr><tr>', b += "<td>"+a[c].companyName+"</td><td>"+a[c].positionName+"</td><td><span>"+a[c].startDate+"</span><span> — </span><span>"+a[c].endDate+"</span></td><td>",b+='<div class="mr_edit mr_c_r_t" data-expid="'+a[c].id+'" data-logo="'+a[c].companyLogo+'" data-comname="'+a[c].companyName+'" data-posname="'+a[c].positionName+'" data-startime="'+a[c].startDate+'" data-endtime="'+a[c].endDate+'" data-content="'+a[c].workContent+'" data-content="'+a[c].jobContent+'" data-companyproperty="'+a[c].company_property+'" data-companysize="'+a[c].company_size+'" data-companycat="'+a[c].company_cat+'" data-workcat="'+a[c].work_cat+'" data-department="'+a[c].department+'" data-workcity="'+a[c].work_city+'" data-salarymonth="'+a[c].salary_month+'" data-reterencename="'+a[c].reterence_name+'" data-reterencerelation="'+a[c].reterence_relation+'" data-reterencecompany="'+a[c].reterence_company+'" data-reterenceposition="'+a[c].reterence_position+'" data-reterencephone="'+a[c].reterence_phone+'" data-reasons="'+a[c].reasons+'">'  ,b+="<i></i><em>编辑</em>" ,b+="</div>", b+="</td>" ,b+="</tr>", b+="</table>";
        for (c = 0; c < a.length; c++)
            b += '<div class="mr_jobe_list">',
            b += '<table><tr><th width="200px">工作单位</th><th width="200px">职位</th><th width="200px">时间</th><th width="200px">编辑</th></tr><tr>',
            b += "<td>" + a[c].companyName + "</td><td>" + a[c].positionName + "</td><td><span>" + a[c].startDate + "</span><span> — </span><span>" + a[c].endDate + "</span></td><td>",
            b += '<div class="mr_edit mr_c_r_t" data-expid="' + a[c].id + '" data-logo="' + a[c].companyLogo + '" data-comname="' + a[c].companyName + '" data-posname="' + a[c].positionName + '" data-startime="' + a[c].startDate + '" data-endtime="' + a[c].endDate + '" data-content="' + a[c].workContent + '" data-content="' + a[c].jobContent + '" data-companyproperty="' + a[c].company_property + '" data-companysize="' + a[c].company_size + '" data-companycat="' + a[c].company_cat + '" data-workcat="' + a[c].work_cat + '" data-department="' + a[c].department + '" data-workcity="' + a[c].work_city + '" data-salarymonth="' + a[c].salary_month + '" data-reterencename="' + a[c].reterence_name + '" data-reterencerelation="' + a[c].reterence_relation + '" data-reterencecompany="' + a[c].reterence_company + '" data-reterenceposition="' + a[c].reterence_position + '" data-reterencephone="' + a[c].reterence_phone + '" data-reasons="' + a[c].reasons + '">',
            b += "<i></i><em>编辑</em>",
            b += "</div>",
            b += "</td>",
            b += "</tr>",
            b += "</table>",
            b += "</div>";
        B.obj.find(".list_show").html(b)
    }
    function Q() {
        P.obj.find(".ul_edubg").on("click", "li", function(a) {
            var b, c;
            a.stopPropagation(),
            b = $(this).parent().parent(),
            b.prev().val($(this).text()),
            b.prev().prev().val($(this).text()),
            b.hide(),
            $(".select_color").removeClass("select_color"),
            c = $(this).parents("form").validate().element(b.prev().prev()),
            c && (b.next().hide(),
            $(this).parents(".mr_timed_div").css("margin-bottom", "0"))
        }),
        P.obj.find(".ul_degree").on("click", "li", function(a) {
            var b, c;
            a.stopPropagation(),
            b = $(this).parent().parent(),
            b.prev().val($(this).text()),
            b.prev().prev().val($(this).text()),
            b.hide(),
            $(".select_color").removeClass("select_color"),
            c = $(this).parents("form").validate().element(b.prev().prev()),
            c && (b.next().hide(),
            $(this).parents(".mr_timed_div").css("margin-bottom", "0"))
        }),
        P.obj.find(".ul_proferank").on("click", "li", function(a) {
            var b, c;
            a.stopPropagation(),
            b = $(this).parent().parent(),
            b.prev().val($(this).text()),
            b.prev().prev().val($(this).text()),
            b.hide(),
            $(".select_color").removeClass("select_color"),
            c = $(this).parents("form").validate().element(b.prev().prev()),
            c && (b.next().hide(),
            $(this).parents(".mr_timed_div").css("margin-bottom", "0"))
        }),
        P.obj.find(".ul_classrank").on("click", "li", function(a) {
            var b, c;
            a.stopPropagation(),
            b = $(this).parent().parent(),
            b.prev().val($(this).text()),
            b.prev().prev().val($(this).text()),
            b.hide(),
            $(".select_color").removeClass("select_color"),
            c = $(this).parents("form").validate().element(b.prev().prev()),
            c && (b.next().hide(),
            $(this).parents(".mr_timed_div").css("margin-bottom", "0"))
        })
    }
    function R() {
        P.obj.find(".ul_eduy").on("click", "li", function(a) {
            var b, c;
            a.stopPropagation(),
            b = $(this).parent().parent(),
            b.prev().val($(this).text()),
            b.prev().prev().val($(this).text()),
            b.hide(),
            $(".select_color").removeClass("select_color"),
            c = $(this).parents("form").validate().element(b.prev().prev()),
            c && (b.next().hide(),
            $(this).parents(".mr_timed_div").css("margin-bottom", "0"))
        })
    }
    function S(a) {
        var b = a;
        $('input[name="schoolName"]', b).val(""),
        $('input[name="positionName"]', b).val(""),
        $('input[name="degree_val"]', b).val(""),
        $('input[name="degree_text"]', b).val(""),
        $('input[name="graduate"]', b).val(""),
        $('input[name="graduate_text"]', b).val(""),
        $('input[name="degree"]', b).val(""),
        $('input[name="professional_ranking"]', b).val(""),
        $('input[name="class_ranking"]', b).val("")
    }
    function T() {
        $("#addEduForm").validate({
            rules: P.rules,
            messages: P.messages,
            errorPlacement: function(a, b) {
                P.errorPlacement(a, b)
            },
            submitHandler: function(a) {
                var b = globals.resumeId
                  , 
                c = $('input[name="schoolName"]', a).val()
                  , 
                d = $('input[name="positionName"]', a).val()
                  , 
                e = $('input[name="degree_val"]', a).val()
                  , 
                f = $('input[name="graduate"]', a).val()
                  , 
                g = globals.token;
                $(a).find(":submit").val("保存中...").attr("disabled", !0),
                $.ajax({
                    url: ctx + "Resume/educationExperience",
                    type: "post",
                    data: {
                        id: b,
                        schoolName: c,
                        professional: d,
                        education: e,
                        endYear: f,
                        resubmitToken: g
                    },
                    dataType: "json"
                }).done(function(b) {
                    var c, d, e, f, g, h, i, j, k;
                    if (b.success) {
                        $("#show_no_edu").hide();
                    }
                    b.success ? (c = b.content.isOpenMyResume,
                    d = $(".toggle"),
                    e = b.content.firstOpen,
                    globals.isFirstOpen = e,
                    c && ($(".openresume_tip").hide(),
                    globals.isFirstOpen ? (globals.isOpenResume = "3",
                    $(".firstset").show()) : globals.isOpenResume = d.hasClass("toggle-off") ? "0" : "1"),
                    W(b),
                    globals.token = b.resubmitToken,
                    S(a),
                    updateResumeTime(b.content.refreshTime),
                    f = b.content.infoCompleteStatus.score,
                    g = parseInt($.trim($(".mr_bfb").text())),
                    h = amountScore - g + f,
                    updateRatioRM(f, h),
                    P.obj.find(".mr_head_r").trigger("click"),
                    i = b.content.educationExperiences,
                    V(i),
                    j = P.obj.find(".mr_empty_add"),
                    j.not(":hidden") && j.hide(),
                    k = $(".mr_module .flag_edu"),
                    k.is(":hidden") || k.addClass("dn")) : alert(b.msg),
                    $(a).find(":submit").val("保 存").attr("disabled", !1)
                })
            }
        })
    }
    function U() {
        $("#upEduForm").validate({
            rules: P.rules,
            messages: P.messages,
            errorPlacement: function(a, b) {
                P.errorPlacement(a, b)
            },
            submitHandler: function(a) {
                var b = globals.resumeId
                  , 
                c = $('input[name="schoolName"]', a).val()
                  , 
                d = $('input[name="positionName"]', a).val()
                  , 
                e = $('input[name="degree_val"]', a).val()
                  , 
                f = $('input[name="graduate"]', a).val()
                  , 
                q = $('input[name="school_city"]', a).val()
                  , 
                h = $('input[name="degree"]', a).val()
                  , 
                i = $('input[name="academy"]', a).val()
                  , 
                j = $('input[name="major"]', a).val()
                  , 
                k = $('input[name="gpa_score"]', a).val()
                  , 
                l = $('input[name="professional_ranking"]', a).val()
                  , 
                m = $('input[name="class_ranking"]', a).val()
                  , 
                n = $('input[name="professional_describe"]', a).val()
                  , 
                o = $('input[name="tutor_name"]', a).val()
                  , 
                p = $('input[name="tutor_phone"]', a).val()
                  , 
                r = $('input[name="startYear"]', a).val()
                  , 
                g = globals.token;
                $(a).find(":submit").val("保存中...").attr("disabled", !0),
                $.ajax({
                    url: ctx + "Resume/educationExperience",
                    type: "POST",
                    data: {
                        id: b,
                        schoolName: c,
                        professional: d,
                        education: e,
                        endYear: f,
                        school_city: q,
                        degree: h,
                        academy: i,
                        major: j,
                        gpa_score: k,
                        professional_ranking: l,
                        class_ranking: m,
                        professional_describe: n,
                        tutor_name: o,
                        tutor_phone: p,
                        startYear: r,
                        resubmitToken: g,
                        eduid: oMoudle.eduId
                    },
                    dataType: "json"
                }).done(function(b) {
                    var c, d, e, f;
                    if (b.success) {
                        $("#show_no_edu").hide();
                    }
                    b.success ? (W(b),
                    globals.token = b.resubmitToken,
                    S(a),
                    updateResumeTime(b.content.refreshTime),
                    c = b.content.infoCompleteStatus.score,
                    d = parseInt($.trim($(".mr_bfb").text())),
                    e = amountScore - d + c,
                    updateRatioRM(c, e),
                    $(".mr_cancel", a).trigger("click"),
                    f = b.content.educationExperiences,
                    V(f)) : alert(b.msg)
                })
            }
        })
    }
    function V(a) {
        var c, b = "";
        //for (c = 0; c < a.length; c++) b += '<div class="clearfixs mb46 mr_jobe_list">', b += '<div class="mr_content_l">', "" != a[c].schoolBadge && (b += '<div class="l1">', b += '<img src="' + ctx + "/" + a[c].schoolBadge + '" />', b += "</div>"), b += '<div class="l2">', b += "<h4>" + a[c].schoolName + "</h4>", b += "<span>" + a[c].education + " · " + a[c].professional + "</span>", b += "</div>", b += "</div>", b += '<div class="mr_content_r">', b += '<div class="mr_edit mr_c_r_t" data-eduid = "' + a[c].id + '" data-schoolname = "' + a[c].schoolName + '" data-edu = "' + a[c].education + '" data-pro = "' + a[c].professional + '" data-date = "' + a[c].endDate + '">', b += "<i></i><em>编辑</em>", b += "</div>", b += 1 == a[c].whetherGraduate ? "<span>" + a[c].endDate + "年毕业</span>" : "<span>" + a[c].endDate + "年毕业( 预计 )</span>", b += "</div>", b += "</div>";
        
        for (c = 0; c < a.length; c++)
            b += '<div class="clearfixs mb46 mr_jobe_list">',
            b += '<table>',
            b += '<tr><th width="200px">学校</th><th width="200px">学历</th><th width="200px">专业</th><th width="200px">编辑</th></tr><tr>',
            b += '<td>' + a[c].schoolName + '</td><td>' + a[c].education + '</td><td>' + a[c].professional + '</td><td>',
            b += '<div class="mr_edit mr_c_r_t" data-eduid="' + a[c].id + '" data-schoolname="' + a[c].schoolName + '" data-edu="' + a[c].education + '" data-pro="' + a[c].professional + '" data-date="' + a[c].endYear + '" data-startdate="' + a[c].startYear + '" data-schoolcity="' + a[c].school_city + '" data-degree="' + a[c].degree + '" data-academy="' + a[c].academy + '" data-major="' + a[c].major + '" data-gpa="' + a[c].gpa_score + '" data-prorank="' + a[c].professional_ranking + '" data-classrank="' + a[c].class_ranking + '" data-prodes="' + a[c].professional_describe + '" data-tutorname="' + a[c].tutor_name + '" data-tutorphone="' + a[c].tutor_phone + '"> <i></i><em>编辑</em> </div></td></tr>',
            b += "</table>",
            b += "</div>";
        P.obj.find(".list_show").html(b)
    }
    
    
    function W(a) {
        var c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s;
        switch ($.trim($(".base_info .j").text()),
        c = $(".ul_shenfen"),
        d = a.content.resume,
        e = a.content.latestWorkExperience,
        f = a.content.latestEducationExperience,
        g = d.userIdentity,
        h = d.workYear,
        i = e ? e.positionName + " · " + e.companyName : "·",
        j = f ? f.professional + " · " + f.schoolName : "·",
        k = $.trim(j),
        l = $.trim(i),
        m = $("span.shenfen"),
        0 == m.length && (m = $("<span></span>").addClass("shenfen"),
        $(".info_t").prepend(m)),
        n = $("<i></i>"),
        g) {
        case 0:
            "应届毕业生" == $.trim(h) ? (o = "·" != k ? $("<em data-id='0' title='" + j + "'>" + j + "</em>") : $("<em data-id='0' title='" + i + "'>" + i + "</em>"),
            m.removeClass("dn").empty(),
            m.append(n).append(o)) : (o = "·" != l ? $("<em data-id='0' title='" + i + "'>" + i + "</em>") : $("<em data-id='0' title='" + j + "'>" + j + "</em>"),
            m.removeClass("dn").empty(),
            m.append(n).append(o)),
            "·" == $.trim(m.text()) && m.addClass("dn");
            break;
        case 1:
            o = "·" != k ? $("<em data-id='1' title='" + j + "'>" + j + "</em>") : $("<em data-id='2' title='" + i + "'>" + i + "</em>"),
            m.removeClass("dn").empty(),
            m.append(n).append(o),
            "·" == $.trim(m.text()) && m.addClass("dn");
            break;
        case 2:
            o = "·" != l ? $("<em data-id='2' title='" + i + "'>" + i + "</em>") : $("<em data-id='1' title='" + j + "'>" + j + "</em>"),
            m.removeClass("dn").empty(),
            m.append(n).append(o),
            "·" == $.trim(m.text()) && m.addClass("dn")
        }
        p = c.find("li[data-id='2']"),
        q = c.find("li[data-id='1']"),
        "·" != l ? p.length > 0 ? p.text(i) : (r = $("<li></li>").attr({
            "data-id": "2",
            title: i
        }).text(i),
        c.append(r)) : p.remove(),
        "·" != k ? q.length > 0 ? q.text(j) : (s = $("<li></li>").attr({
            "data-id": "1",
            title: j
        }).text(j),
        c.append(s)) : q.remove()
    }
    
    function SCV(a) {
        var c, b = "";
        //for (c = 0; c < a.length; c++) b += '<div class="clearfixs mb46 mr_jobe_list">', b += '<div class="mr_content_l">', "" != a[c].schoolBadge && (b += '<div class="l1">', b += '<img src="' + ctx + "/" + a[c].schoolBadge + '" />', b += "</div>"), b += '<div class="l2">', b += "<h4>" + a[c].schoolName + "</h4>", b += "<span>" + a[c].education + " · " + a[c].professional + "</span>", b += "</div>", b += "</div>", b += '<div class="mr_content_r">', b += '<div class="mr_edit mr_c_r_t" data-eduid = "' + a[c].id + '" data-schoolname = "' + a[c].schoolName + '" data-edu = "' + a[c].education + '" data-pro = "' + a[c].professional + '" data-date = "' + a[c].endDate + '">', b += "<i></i><em>编辑</em>", b += "</div>", b += 1 == a[c].whetherGraduate ? "<span>" + a[c].endDate + "年毕业</span>" : "<span>" + a[c].endDate + "年毕业( 预计 )</span>", b += "</div>", b += "</div>";
        
        for (c = 0; c < a.length; c++)
            b += '<div class="clearfixs mb46 mr_jobe_list">',
            b += '<table>',
            b += '<tr><th width="200px">社团名称</th><th width="200px">担任职务</th><th width="200px">专业</th><th width="200px">编辑</th></tr><tr>',
            b += '<td>' + a[c].praCompanyName + '</td><td>' + a[c].practicePosition + '</td><td>' + a[c].professional + '</td><td>',
            b += '<div class="mr_edit mr_c_r_t" data-schoolclubid="' + a[c].id + '" data-pracomname="' + a[c].praCompanyName + '" data-prapos="' + a[c].practicePosition + '" data-pro="' + a[c].professional + '" data-date="' + a[c].endYear + '" data-startdate="' + a[c].startYear + '" data-schoolcity="' + a[c].school_city + '" data-degree="' + a[c].degree + '" data-academy="' + a[c].academy + '" data-major="' + a[c].major + '" data-gpa="' + a[c].gpa_score + '" data-prorank="' + a[c].professional_ranking + '" data-classrank="' + a[c].class_ranking + '" data-prodes="' + a[c].professional_describe + '" data-tutorname="' + a[c].tutor_name + '" data-tutorphone="' + a[c].tutor_phone + '"> <i></i><em>编辑</em> </div></td></tr>',
            b += "</table>",
            b += "</div>";
        P.obj.find(".list_show").html(b)
    }

    function SCU() {
        $("#upSchClubForm").validate({
            rules: SC.rules,
            messages: SC.messages,
            errorPlacement: function(a, b) {
                SC.errorPlacement(a, b)
            },
            submitHandler: function(a) {
                var b = globals.resumeId, 
                 	c = $('input[name="schClubName"]', a).val(), 
		            d = $('input[name="schClubLevel"]', a).val(), 
		            e = $('input[name="positionName"]', a).val(), 
		            f = $('textarea[name="workDes"]', a).val(), 
		            q = $('input[name="startDate"]', a).val(), 
		            h = $('input[name="endDate"]', a).val(), 
                	g = globals.token;
                $(a).find(":submit").val("保存中...").attr("disabled", !0),
                $.ajax({
                    url: ctx + "Resume/schoolClub",
                    type: "POST",
                    data: {
                        id: b,
	            		schClubName: c,
	                    schClubLevel: d,
	                    positionName: e,
	                    workDes: f,
	                    startDate: q,
	                    endDate: h,
                        resubmitToken: g,
                        schoolclubid: oMoudle.schoolclubid
                    },
                    dataType: "json"
                }).done(function(b) {
                    var c, d, e, f;
                    if (b.success) {
                        $("#show_no_edu").hide();
                    }
                    b.success ? (W(b),
                    globals.token = b.resubmitToken,
                    SCS(a),
                    updateResumeTime(b.content.refreshTime),
                    //c = b.content.infoCompleteStatus.score,
                    d = parseInt($.trim($(".mr_bfb").text())),
                    e = amountScore - d + c,
                    updateRatioRM(c, e),
                    $(".mr_cancel", a).trigger("click"),
                    f = b.content.schoolClubs,
                    SCV(f)) : alert(b.msg)
                })
            }
        })
    }

     function SCS(a) {
        var b = a;
        	$('input[name="schClubName"]', b).val(""), 
            $('input[name="schClubLevel"]', b).val(""), 
            $('input[name="positionName"]', b).val(""), 
            $('textarea[name="workDes"]', b).val(""), 
            $('input[name="startDate"]', b).val(""), 
            $('input[name="endDate"]', b).val("")
    }

    function eb(a) {
        var c, b = "";
        //for (c = 0; c < a.length; c++) b += '<div class="mr_jobe_list" data-id="' + a[c].id + '" >', b += '<div class="clearfixs">', b += '<div class="mr_content_l">', b += '<div class="l2">', b += a[c].projectUrl ? '<a class="projectTitle" href="' + a[c].projectUrl + '" target="_blank"><span></span>' + a[c].projectName + "</a>" : '<a class="projectTitle nourl">' + a[c].projectName + "</a>", b += "<p>" + a[c].positionName + "</p>", b += "</div>", b += "</div>", b += '<div class="mr_content_r">', b += '<div class="mr_edit mr_c_r_t">', b += "<i></i><em>编辑</em>", b += "</div>", b += "<span>" + a[c].startDate + " - " + a[c].endDate + "</span>", b += "</div>", b += "</div>", b += '<div class="mr_content_m">' + a[c].projectRemark + "</div>", b += "</div>";
        for (c = 0; c < a.length; c++)
            b += '<div class="mr_jobe_list" data-id="' + a[c].id + '" >',
            b += '<table><tr><th width="200px" class="projectTitle">项目名称</th><th width="200px">职位</th><th width="200px">时间</th><th width="200px">编辑</th></tr><tr>',
            b += '<td>' + a[c].projectName + '</td><td>' + a[c].positionName + '</td><td><span>' + a[c].startDate + '- ' + a[c].endDate + '</span></td><td>',
            b += '<div class="mr_edit mr_c_r_t" data-posiname="' + a[c].positionName + '" data-retername="' + a[c].reterenceName + '" data-pronum="' + a[c].projectNumber + '" data-reterphone="' + a[c].reterencePhone + '" data-produty="' + a[c].projectDuty + '"> ',
            b += '<i></i><em>编辑</em> </div></td></tr></table>',
            b += "</div>";
        
        return b
    }
    function kb() {
        var a = $(".mr_empty_add");
        a.not("hidden").addClass("addgrey"),
        a.bind("click", lb),
        $(".mr_head_r").each(function() {
            $(this).css("cursor", "default");
            var b = $(this).children("em").text();
            "添加" == b ? $(this).addClass("mr_add_grey") : "编辑" == b && $(this).addClass("mr_up_grey")
        }),
        $(".mr_c_r_t").each(function() {
            $(this).css("cursor", "default");
            var b = $(this).children("em").text();
            "添加" == b ? $(this).addClass("mr_add_grey") : "编辑" == b && $(this).addClass("mr_up_grey")
        })
    }
    function lb() {
        return !1
    }
    function mb() {
        var a = $(".mr_empty_add");
        a.not("hidden").removeClass("addgrey"),
        a.unbind("click", lb),
        $(".mr_head_r").each(function() {
            $(this).css("cursor", "pointer");
            var b = $(this).children("em");
            $(this).hasClass("mr_add_grey") ? (b.text("添加"),
            $(this).removeClass("mr_add_grey")) : $(this).hasClass("mr_up_grey") && (b.text("编辑"),
            $(this).removeClass("mr_up_grey"))
        }),
        $(".mr_c_r_t").each(function() {
            $(this).css("cursor", "pointer");
            var b = $(this).children("em");
            $(this).hasClass("mr_add_grey") ? (b.text("添加"),
            $(this).removeClass("mr_add_grey")) : $(this).hasClass("mr_up_grey") && (b.text("编辑"),
            $(this).removeClass("mr_up_grey"))
        }),
        f = !0,
        d = ""
    }
    function sb(a, b) {
        var c = parseInt($.trim($(".mr_bfb").text()))
          , 
        d = 0;
        switch (a) {
        case "expectJob":
            d = parseInt(oMdScore.expectJobsScore),
            oMoudleScore.expectJobsScore = d;
            break;
        case "projectExperience":
            d = parseInt(oMdScore.projectExpScore),
            oMoudleScore.projectExpScore = d;
            break;
        case "worksShow":
            d = parseInt(oMdScore.workShowScore),
            oMoudleScore.workShowScore = d;
            break;
        case "skillsAssess":
            d = parseInt(oMdScore.skillScore),
            oMoudleScore.skillScore = d;
            break;
        case "selfDescription":
            d = parseInt(oMdScore.myRemarkScore),
            oMoudleScore.myRemarkScore = d;
            break;
        default:
            return
        }
        0 == b ? amountScore += d : amountScore -= d,
        amountScore >= 100 && (amountScore = 100),
        c > amountScore && (amountScore = c),
        updateRatioRM(c, amountScore)
    }
    var a, b, c, d, e, f, i, k, n, p, u, v, w, B, C, D, E, G, H, I, J, P, Y, Z, _, ab, bb, fb, gb, hb, ib, jb, nb, ob, pb, qb;
    popQR(),
    a = $("#customTitleName"),
    "" == a.val() ? $("#customBlock .cust_title span").text("自定义标题") : $("#customBlock .cust_title span").text(a.val()),
    9 == $(".md_flag").length ? $(".mr_module_add").addClass("dn") : $(".mr_module_add").removeClass("dn"),
    initTitlePosition(),
    initMceMr(),
    b = globals.initRatio,
    updateRatioRM(b, b),
    c = $(".mr_myresume_r .scroll_fix").offset(),
    $(window).scroll(function() {
        var a = $(window).scrollTop();
        c && c.top <= a ? $(".mr_myresume_r .scroll_fix").addClass("mr_myresume_r_fix") : $(".mr_myresume_r .scroll_fix").removeClass("mr_myresume_r_fix")
    }),
    0 == $(".m_hide").hasClass("dn").length && $(".mr_module_add").hide(),
    d = "",
    e = "",
    f = !0,
    window.onbeforeunload = function() {
        return f ? void 0 : "内容还未保存，确认离开该页面吗？ "
    }
    ,
    g(),
    i = function() {
        var a = $.trim($(this).val());
        "" != a && j(a, ".companyName")
    }
    ,
    $(".mr_created").delegate(".companyName", "keyup", function() {
        myresumeCommon.utils.throttle(i, [], this, 300)
    }),
    k = function() {
        var a = $.trim($(this).val());
        "" != a && l(a, ".autoPosition")
    }
    ,
    $(".mr_created").delegate(".autoPosition", "keyup", function() {
        myresumeCommon.utils.throttle(k, [], this, 300)
    }),
    $(".mr_name_edit .ed_name,.mr_intro_edit .ed_name").bind("click", function(a) {
        a.stopPropagation(),
        $(".select_color").removeClass("select_color"),
        $(this).addClass("select_color")
    }),
    $(".mr_r_nav ul li:first").bind("click", function(a) {
        a.stopPropagation();
        var b = $(this).find("em");
        b.is(":hidden") || b.addClass("dn")
    }),
    $(".mr_sns") && $(".mr_sns a").length > 0 && m(),
    $(".mr_sns").delegate("a", "hover", function() {
        $(this).find("span").toggle()
    }),
    $(".mr_headfile").hover(function() {
        $(".shadow").show()
    }, function() {
        $(".shadow").hide()
    }),
    $(".mr_p_name,.mr_p_info,.mr_p_introduce").hover(function() {
        $(this).addClass("mr_active").find(".mr_edit").removeClass("dn")
    }, function() {
        $(this).removeClass("mr_active").find(".mr_edit").addClass("dn")
    }),
    $(".mr_p_name .mr_edit").bind("click", function() {
        $(".mr_p_name").hide(),
        $("#mr_name").val($(".mr_p_name .mr_name").text()),
        $(".mr_name_edit").removeClass("dn"),
        $("#nameForm").find("input#mr_name")[0].focus(),
        f = !1
    }),
    n = $("input#mr_name"),
    n.on("keyup", function() {
        var a = $.trim(n.val()).length;
        0 == a && $(this).attr("placeholder", "姓名")
    }),
    $(".mr_name_edit .cancel").bind("click", function() {
        $(".mr_p_name").show(),
        $(".mr_name_edit").addClass("dn"),
        f = !0
    }),
    $(".mr_p_introduce .mr_edit").bind("click", function() {
        $(".mr_p_introduce").hide(),
        "0" == $(this).attr("data-type") && $("#mr_intro").val($(".mr_p_introduce .mr_intro").text()),
        $(".mr_intro_edit").removeClass("dn"),
        $("#mr_intro").focus(),
        $("#introduceForm .mroneError").hide(),
        f = !1
    }),
    $(".mr_intro_edit .cancel").bind("click", function() {
        $(".mr_p_introduce").show(),
        $(".mr_intro_edit").addClass("dn"),
        f = !0
    }),
    $(".j").hover(function() {
        var a = $(".birth_span")
          , 
        b = $.trim(a.text())
          , 
        c = $(".j");
        "" != b && "年出生" != b ? (a.removeClass("dn"),
        c.css("cursor", "pointer")) : c.css("cursor", "default")
    }, function() {
        setTimeout(function() {
            var a = $(".birth_span");
            a.addClass("dn")
        }, 90)
    }),
    jQuery.validator.addMethod("truename", function(a, b) {
        var c = /^([a-zA-Z ]+|[一-龥]+)$/;
        return this.optional(b) || c.test(a)
    }, "请输入有效的公司简称"),
    jQuery.validator.addMethod("truename2", function(a, b) {
        var c = /([·`~!@#$^&':;,?~！……&；：。，、？=])/;
        return this.optional(b) || !c.test(a)
    }, "请输入有效的名字"),
    $("#nameForm").validate({
        rules: {
            mr_name: {
                required: !0,
                truename2: !0,
                rangeLenStr: [1, 15]
            }
        },
        messages: {
            mr_name: {
                required: "必填",
                truename2: "格式错误",
                rangeLenStr: "请输入真实姓名"
            
            }
        },
        errorPlacement: function(a, b) {
            a.appendTo($(b).parent()),
            $(".c_section span.error").css("margin", "5px 0 10px 138px")
        },
        submitHandler: function(a) {
            var b = globals.token
              , 
            c = $('input[name="mr_name"]', a).val()
              , 
            d = globals.resumeId;
            c = $.trim(c),
            $(a).find(":submit").val("保存中...").attr("disabled", !0),
            $.ajax({
                url: ctx + "/resume/updateUserName.json",
                type: "POST",
                data: {
                    name: c,
                    id: d,
                    resubmitToken: b
                },
                dataType: "json"
            }).done(function(b) {
                var d, e, g;
                b.success ? (f = !0,
                globals.token = b.resubmitToken,
                $("#nowrap").html(c + "&nbsp;"),
                d = b.content.resume,
                e = d.name,
                $(".mr_name_edit").addClass("dn"),
                $(".mr_name").html(e).parent().show(),
                g = b.content.url,
                $("#body").append("<iframe id='ifr' style='display:none;' src='" + g + "'></iframe>")) : alert(b.msg),
                $(a).find(":submit").val("保 存").attr("disabled", !1)
            })
        }
    }),
    $("#introduceForm").on("keyup", 'input[name="mr_intro"]', function() {
        var a = $(this)
          , 
        b = $.trim(a.val())
          , 
        c = o(b);
        0 == c ? (f = !0,
        a.siblings("span.mroneError").text("必填").show()) : 4 > c ? (f = !0,
        a.siblings("span.mroneError").text("太短了").show()) : c >= 4 && 58 >= c ? a.siblings("span.mroneError").hide() : c > 58 && a.siblings("span.mroneError").text("请输入4-58个字的介绍").show()
    }),
    $("#introduceForm .save").click(function() {
        var d, e, g, h, a = $(this), 
        b = $.trim($("#introduceForm #mr_intro").val()), 
        c = o(b);
        0 == c ? (f = !0,
        a.siblings("span.mroneError").text("必填").show()) : 4 > c ? (f = !0,
        a.siblings("span.mroneError").text("太短了").show()) : c >= 4 && 58 >= c ? (d = $("#introduceForm"),
        e = globals.resumeId,
        g = $('input[name="mr_intro"]', d).val(),
        $(d).find(":submit").val("保存中...").attr("disabled", !0),
        h = globals.token,
        $.ajax({
            url: ctx + "/resume/oneWord.json",
            type: "POST",
            data: {
                oneWord: g,
                resubmitToken: h,
                id: e
            },
            dataType: "json"
        }).done(function(a) {
            var b, c, e, h;
            a.success ? (globals.token = a.resubmitToken,
            $(".mr_intro_edit").addClass("dn"),
            b = $(".mr_intro"),
            b.hasClass("mr_intro_grey") && b.removeClass("mr_intro_grey").addClass("mr_intro_normal"),
            b.text(g).attr("title", g).parent().show(),
            c = a.content.infoCompleteStatus.score,
            e = parseInt($.trim($(".mr_bfb").text())),
            h = amountScore - e + c,
            updateRatioRM(c, h)) : alert(a.msg),
            $(d).find(":submit").val("保 存").attr("disabled", !1),
            f = !0
        })) : c > 58 && a.siblings("span.mroneError").text("请输入4-58个字的介绍").show()
    }),
    $(".mr_created,.mr_uncreate").delegate(".normal_s", "click", function(a) {
        var b, c;
        a.stopPropagation(),
        b = $(this).find(".xl_list"),
        c = b.is(":hidden"),
        $(".xl_list").hide(),
        $(".select_color").removeClass("select_color"),
        c ? ($(this).addClass("select_color"),
        b.show()) : b.hide(),
        C && C.hide(),
        E && E.hide(),
        D && D.hide()
    }),
    $(".mr_created,.mr_uncreate").delegate(".email_s,.mobile_s", "focus", function(a) {
        var b, c;
        a.stopPropagation(),
        b = $(this).find(".xl_list"),
        c = b.is(":hidden"),
        $(".xl_list").hide(),
        $(".select_color").removeClass("select_color"),
        c ? ($(this).addClass("select_color"),
        b.show()) : b.hide(),
        C && C.hide(),
        E && E.hide(),
        D && D.hide()
    }),
    $(".mr_self_state .mr_self_s").bind("click", function(a) {
        a.stopPropagation(),
        $(".form_wrap").removeClass("select_color");
        var b = $(this).find(".xl_list");
        b.is(":hidden") && $(this).addClass("select_color"),
        b.toggle()
    }),
    $(".mr_self_state .mr_self_s").hover(function() {
        $(this).hasClass("active") && $(this).removeClass("active")
    }, function() {
        var a = $(this).find(".xl_list");
        a.is(":hidden") && $(this).addClass("active")
    }),
    $("#mr_mobile,#mr_email").click(function(a) {
        a.stopPropagation(),
        $(".select_color").removeClass("select_color"),
        $(this).parent().addClass("select_color"),
        E.hide()
    }),
    $(".xl_list").bind("click", function(a) {
        a.stopPropagation()
    }),
    $(".mr_my_qr").hover(function() {
        $(this).find("img").attr("src", globals.qrImgSrc),
        $(this).addClass("open")
    }, function() {
        $(this).removeClass("open")
    }),
    $(document).click(function() {
        var a, b, c;
        $(".xl_list").hide(),
        $(".select_color").removeClass("select_color"),
        a = $(".mr_down_tip"),
        a.is(":hidden") || a.addClass("dn"),
        C && C.hide(),
        E && E.hide(),
        D && D.hide(),
        Z && Z.hide(),
        _ && _.hide(),
        ab && ab.hide(),
        bb && bb.hide(),
        G && G.hide(),
        H && H.hide(),
        I && I.hide(),
        J && J.hide(),
        Z && Z.hide(),
        _ && _.hide(),
        b = $(".mr_self_state .mr_self_s"),
        b.hasClass("active") || b.addClass("active"),
        c = $(".set_default_wrap"),
        c.hasClass("active") && c.trigger("click")
    }),
    $(".ul_xl").delegate("li", "click", function() {
        $("#xl").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_zjlx").delegate("li", "click", function() {
        $("#idcardtype").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_jylx").delegate("li", "click", function() {
        $("#edu_type").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_gznx").delegate("li", "click", function() {
        var b, c, a = $(this).text();
        $("#gznx").val(a),
        "应届毕业生" == $.trim(a) ? (b = $(".ul_shenfen li[data-id = '1']"),
        0 != b.length && ($("#shenfen").val(b.text()),
        globals.personIdFlag = "1")) : (c = $(".ul_shenfen li[data-id = '2']"),
        0 != c.length && ($("#shenfen").val(c.text()),
        globals.personIdFlag = "2")),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_year").delegate("li", "click", function() {
        $("#mr_year").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_shenfen").delegate("li", "click", function() {
        $("#shenfen").val($(this).text()),
        globals.personIdFlag = $(this).attr("data-id"),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_self_state").delegate("li", "click", function() {
        var a = globals.token
          , 
        b = $(this).text()
          , 
        c = $(this);
        $.ajax({
            url: ctx + "Resume/updateWorkStatus",
            type: "post",
            data: {
                status: b,
                resumeId: globals.resumeId,
                resubmitToken: a
            },
            dataType: "json"
        }).done(function(a) {
            a.success ? (globals.resubmitToken = a.resubmitToken,
            updateResumeTime(a.content.refreshTime),
            $("#self_state").val(b),
            c.parent().parent().hide(),
            $(".select_color").removeClass("select_color")) : alert(a.msg)
        })
    }),
    $(".mr_year_se .mr_man").bind("click", function() {
        $(this).addClass("active").find("i").addClass("active"),
        $("#myysex").val('1'),
        $(".mr_year_se .mr_women").removeClass("active").find("i").removeClass("active")
    }),
    $(".mr_year_se .mr_women").bind("click", function() {
        $(this).addClass("active").find("i").addClass("active"),
        $("#myysex").val('1'),
        $(".mr_year_se .mr_man").removeClass("active").find("i").removeClass("active")
    }),
    $(".sns_area").delegate('input[id^="sns"]', "click", function(a) {
        a.stopPropagation(),
        $(".select_color").removeClass("select_color"),
        $(this).parent().addClass("select_color")
    }),
    $(".sns_area").delegate(".sns_del", "click", function() {
        var b, a = $(this).parent().find("i").attr("class");
        return a = "." + a,
        $(this).parent().remove(),
        $(".mr_add_m ul .active").removeClass("active"),
        $(".mr_add_m " + a).show(),
        b = $(".sns_area .mr_sns_m"),
        0 == b.length && ($(".mr_add_sns").hide(),
        $(".sns_empty").show()),
        !1
    }),
    $(".mr_add_m li").hover(function() {
        $(this).find("span").show()
    }, function() {
        $(this).find("span").hide()
    }),
    $(".mr_locks").hover(function() {
        $(this).find("em").show()
    }, function() {
        $(this).find("em").hide()
    }),
    $(".mr_add_m ul").delegate("li", "click", function(a) {
        a.stopPropagation(),
        $(this).hasClass("active") ? $(this).removeClass("active") : $(this).addClass("active")
    }),
    $(".mr_add_op .sns_save").bind("click", function(a) {
        a.stopPropagation();
        var b = "";
        return $(".mr_add_m ul .active").each(function() {
            var c = $(this).data("flag")
              , 
            d = "sns" + c;
            b += '<div class="form_wrap mr_sns_m">',
            b += '	<i class="' + d + '"></i>',
            b += '	<em class=""></em>',
            b += '	<a href="javascript:;" class="sns_del"></a>',
            b += '	<input type="text" id="' + d + '" name="' + d + '" data-sns="' + c + '" class="mr_button" />',
            b += "</div>"
        }),
        $(".mr_add_m ul .active").removeClass("active"),
        $(".sns_area").append(b),
        $(".mr_add_m").slideUp("dn"),
        !1
    }),
    $(".mr_add_m").click(function(a) {
        a.stopPropagation()
    }),
    $(".mr_add_op .sns_cancel").bind("click", function(a) {
        return a.stopPropagation(),
        $(".mr_add_m li").removeClass("active"),
        $(".mr_add_m").slideUp("dn"),
        !1
    }),
    $(".sns_add").bind("click", function() {
        12 != $(".sns_area .mr_sns_m").length && ($(".mr_add_m li").show(),
        $(".sns_area i").each(function() {
            var b = $(this).attr("class");
            b = "." + b,
            $(".mr_add_m " + b).hide()
        }),
        $(".mr_add_m").slideToggle(300))
    }),
    $(".sns_add_empty").bind("click", function() {
        12 != $(".sns_area .mr_sns_m").length && ($(".mr_add_m li").show(),
        $(".sns_area i").each(function() {
            var b = $(this).attr("class");
            b = "." + b,
            $(".mr_add_m " + b).hide()
        }),
        $(".mr_add_m").slideToggle(300))
    }),
    $(".sns_area").delegate("input[id^='sns']", "keyup", function() {
        $.trim($(this).val()) && $(this).parent().find("em").removeClass("mr_no").removeClass("mr_ok").addClass("mr_ok")
    }),
    u = function() {
        var e, f, g, a = $("#uploadImages"), 
        b = a.find("#cropzoom_container"), 
        c = a.find("#crop"), 
        d = a.find("#restore");
        return c.bind("click", function() {
            e.send(ctx + "Resume/cutHead", "POST", {
                resubmitToken: globals.token
            }, function(a) {
                var b, c, d;
                a = $.parseJSON(a);
                //console.log(a);
                e.showImage.attr("src", ctx + "/" + a.content.uploadPath + "?cc=" + Math.random()),
                $.colorbox.close(),
                e.showImage = null ,
                null  != a.resubmitToken && "" != a.resubmitToken && (globals.token = a.resubmitToken),
                updateResumeTime(a.content.refreshTime),
                b = a.content.infoCompleteStatus.score,
                c = parseInt($.trim($(".mr_bfb").text())),
                d = amountScore - c + b,
                updateRatioRM(b, d),
                $(".shadow").hide(),
                $(".mr_headfile").hover(function() {
                    $(".shadow").show()
                }, function() {
                    $(".shadow").hide()
                }),
                e.restore()
            })
        }),
        d.bind("click", function() {
            e.restore(),
            $(".shadow").hide(),
            $(".mr_headfile").hover(function() {
                $(".shadow").show()
            }, function() {
                $(".shadow").hide()
            }),
            $.colorbox.close()
        }),
        f = function(c) {
            var f = $(".mr_headimg")
              , 
            g = ctx + c.uploadPath;
            $.colorbox({
                inline: !0,
                href: a,
                title: "选择裁剪区域"
            }),
            myresumeCommon.config.cutImage.image.source = g,
            myresumeCommon.config.cutImage.image.width = c.srcImageW,
            myresumeCommon.config.cutImage.image.height = c.srcImageH,
            myresumeCommon.config.cutImage.selector.w = myresumeCommon.config.userPhotoSelector.width,
            myresumeCommon.config.cutImage.selector.h = myresumeCommon.config.userPhotoSelector.height,
            e = b.cropzoom(myresumeCommon.config.cutImage),
            e.showImage = null ,
            e.showImage = f
        }
        ,
        g = function() {}
        ,
        {
            upSucc: f,
            upFail: g
        }
    }(),
    window.uploadPhoto = u,
    $("#colorbox").on("click", "#cboxClose", function() {
        "uploadImages" == $(this).siblings("#cboxLoadedContent").children("div").attr("id") && ($(".shadow").hide(),
        $(".mr_headfile").hover(function() {
            $(".shadow").show()
        }, function() {
            $(".shadow").hide()
        }))
    }),
    v = function() {
        var e, a = $("#uploadLogos"), 
        b = a.find("#cropzoom_container"), 
        c = a.find("#crop"), 
        d = a.find("#restore"), 
        f = function(c, d) {
            var f = $("#" + d).next(".logo_u")
              , 
            g = ctx + "/" + c.uploadPath;
            $.colorbox({
                inline: !0,
                href: a,
                title: "选择裁剪区域"
            }),
            myresumeCommon.config.cutImage.image.source = g,
            myresumeCommon.config.cutImage.image.width = c.srcImageW,
            myresumeCommon.config.cutImage.image.height = c.srcImageH,
            myresumeCommon.config.cutImage.selector.w = myresumeCommon.config.userPhotoSelector.width,
            myresumeCommon.config.cutImage.selector.h = myresumeCommon.config.userPhotoSelector.height,
            e = b.cropzoom(myresumeCommon.config.cutImage),
            e.showImage = null ,
            e.showImage = f
        }
        , 
        g = function() {}
        ;
        return c.bind("click", function() {
            $(".jobExpForm").find(":submit").val("上传中").attr("disabled", !0),
            e.send(ctx + "Resume/cutLogo", "POST", {
                resubmitToken: globals.token
            }, function(a) {
                oMoudle.workId = "",
                e.showImage.css({
                    width: 120,
                    height: 120
                }).attr("src", ctx + "/" + a.content + "?cc=" + Math.random()),
                e.showImage.prev().prev().removeClass("active").addClass("up"),
                $.colorbox.close(),
                e.showImage = null ,
                null  != a.resubmitToken && "" != a.resubmitToken && (globals.token = a.resubmitToken),
                $(".jobExpForm").find(":submit").val("保存").attr("disabled", !1),
                e.restore()
            })
        }),
        d.bind("click", function() {
            e.restore(),
            $.colorbox.close()
        }),
        {
            upSucc: f,
            upFail: g
        }
    }(),
    window.uploadCompanyLogo = v,
    $(".mr_uploaded").on("click", "a.mr_del", function() {
        confirm("你确定要删除该附件吗？删除后你设置的默认投递简历也将失效") && $.ajax({
            url: ctx + "Resume/delOtherResume",
            type: "GET"
        }).done(function(a) {
            a.success ? ($(".mr_uploaded").hide(),
            $(".mr_upload").show()) : alert(a.msg)
        })
    }),
    $(".mr_module ul").delegate(".md_flag a", "click", function(a) {
        a.stopPropagation(),
        $(".mr_module li").removeClass("active"),
        $(this).parent().addClass("active");
        var b = $(this).parent().data("md");
        z(b, 0)
    }),
    $(".mr_module").unbind("click"),
    $(".mr_module").delegate(".hide_md", "click", function() {
        $(this).addClass("").addClass("mr_hide");
        var a = $(this).data("md");
        $("#" + a).removeClass("dn"),
        "customBlock" == a && initTitlePosition(),
        $(".m_hide").each(function() {
            var c, b = $(this).data("md");
            b == a && ($(this).removeClass("dn").addClass("md_flag"),
            sb(a, 0),
            z(a, 1),
            $(".mr_module li").removeClass("active"),
            $(this).addClass("active"),
            c = $(this).attr("data-md"),
            "customBlock" == $.trim(c) && $("#customBlock .cust_title span").text("自定义标题"),
            initTitlePosition())
        }),
        9 == $(".mr_module ul .md_flag").length ? $(".mr_module_add").addClass("dn") : $(".mr_module_add").removeClass("dn")
    }),
    $(".mr_module_add").mouseover(function() {
        $(this).addClass("dn"),
        $(".hide_md").removeClass("dn"),
        $(".hide_md").mouseover(function() {
            $(".mr_module_add").addClass("dn"),
            $(".hide_md").removeClass("dn")
        })
    })
    /*, $(".hide_md").mouseout(function() {
		$(".mr_module .hide_md").addClass("dn"), $(".mr_module .m_hide").each(function(a) {
			$(this).hasClass("dn") && a++
		}), 9 == $(".md_flag").length ? $(".mr_module_add").addClass("dn") : $(".mr_module_add").removeClass("dn")
	})*/
    ,
    $(".mr_created").on("click", ".mr_md_del", function(a) {
        a.stopPropagation()
    }),
    $(".mr_hide_del").bind("click", function(a) {
        a.stopPropagation(),
        $(".mr_module .mr_md_del").remove(),
        $(this).parent().after($("#del_hide_tip").html()),
        oDelMoudle = $(this)
    }),
    $(".mr_created").on("click", ".mr_md_del .mr_del_cel", function(a) {
        a.stopPropagation(),
        $(this).parents(".mr_md_del").remove()
    }),
    w = !0,
    $(".mr_created").on("click", ".mr_md_del .mr_del_btn", function(a) {
        var b, c, d, e, f, g, h, i, j;
        if (w) {
            switch (a.stopPropagation(),
            $(this).text("删除中"),
            w = !1,
            b = $(this),
            $(this).unbind(),
            c = "",
            d = oDelMoudle.parent().parent().data("md"),
            e = globals.token,
            f = globals.resumeId,
            g = "false",
            d) {
            case "expectJob":
                c = "Resume/delAllExpectJobs",
                g = globals.hasExpectJobs,
                i = $("#expHideId").val(),
                h = {
                    resumeId: f,
                    type: 1,
                    resubmitToken: e,
                    id: i
                },
                gb.clear();
                break;
            case "projectExperience":
                c = "Resume/delAllProject",
                g = globals.hasProjectExperiences,
                h = {
                    resumeId: f,
                    type: 1,
                    resubmitToken: e
                },
                Y.clear();
                break;
            case "selfDescription":
                c = "Resume/intro",
                g = globals.hasSelf,
                h = {
                    resumeId: f,
                    type: 1,
                    resubmitToken: e
                },
                fb.clear();
                break;
            case "worksShow":
                c = "Resume/delAllWorkShow",
                g = globals.hasWorkShows,
                h = {
                    resumeId: f,
                    type: 1,
                    resubmitToken: e
                },
                ib.clear();
                break;
            case "customBlock":
                c = "Resume/delAllUserDefine",
                g = globals.hasUserDefines,
                i = $("#customId").val(),
                h = {
                    resumeId: f,
                    type: 1,
                    resubmitToken: e,
                    id: i
                },
                j = $("#customBlock"),
                j.find(".cust_title span").text("自定义标题"),
                j.find(".custom_list").html("");
                break;
            case "skillsAssess":
                c = "Resume/skillDelAll",
                g = globals.hasSkillEvaluates,
                h = {
                    resumeId: f,
                    type: 1,
                    resubmitToken: e
                },
                jb.clear();
                break;
            default:
                return
            }
            g ? $.ajax({
                url: ctx + c,
                type: "POST",
                data: h,
                dataType: "json"
            }).done(function(a) {
                "expectJob" == d && $("#expHideId").val(""),
                globals.token = a.resubmitToken,
                a.success ? x(b, d, 0, a) : alert(a.msg),
                w = !0
            }) : (x(b, d, 1, 0),
            w = !0)
        }
    }),
    $(".mr_bottom_l").bind("click", function(a) {
        a.stopPropagation();
        var b = $(".mr_down_tip");
        b.is(":hidden") ? b.removeClass("dn") : b.addClass("dn")
    }),
    $(".mr_down_tip li").bind("click", function(a) {
        a.stopPropagation(),
        $(".mr_down_tip").addClass("dn")
    }),
    $(".mr_down_tip li").hover(function() {
        $(".mr_down_tip li.active").removeClass("active"),
        $(this).addClass("active")
    }, function() {
        $(".mr_down_tip li.active").removeClass("active"),
        $(this).removeClass("active")
    }),
    $(".mr_created").delegate(".mr_delete span", "click", function() {
        $(this).prev(".mr_delete_pop").removeClass("dn")
    }),
    $(".mr_created").delegate(".mr_del_cancel", "click", function() {
        "" == e && $(this).parent().parent().addClass("dn")
    }),
    $(".mr_created").delegate(".mr_del_ok", "click", function() {
        var a, b, c, g, h;
        switch (e = "1",
        a = $(this).parents(".mr_moudle_content"),
        b = $(this).parents("form"),
        c = $(".mr_del_ok", b).data("id"),
        g = "",
        d) {
        case "upSchClubForm":
            g = "Resume/delSchClub";
            alert(c);
            alert(b);
            break;
        case "upSchPraForm":
            g = "Resume/delSchPro";
            break;
        case "upJobForm":
            g = "Resume/delExp";
            break;
        case "upEduForm":
            g = "Resume/delEdu";
            break;
        case "upExpJobForm":
            $("#upExpJobForm .mr_cancel").trigger("click");
            break;
        case "upProForm":
            g = myresumeCommon.requestTargets.projectExpDel;
            break;
        default:
            return
        }
        $(this).text("删除中...").attr("disabled", !0),
        h = $(this),
        $.ajax({
            url: ctx + g,
            type: "POST",
            data: {
                id: c,
                resubmitToken: globals.token
            },
            dataType: "json"
        }).done(function(c) {
            var g, i, j, k, l, n, o, p, q, r, s, t;
            if (c.success) {
                switch (null  != c.resubmitToken && "" != c.resubmitToken && (globals.token = c.resubmitToken),
                updateResumeTime(c.content.refreshTime),
                g = c.content.infoCompleteStatus.score,
                i = parseInt($.trim($(".mr_bfb").text())),
                j = amountScore - i + g,
                amountScore = j,
                updateRatioRM(g, j),
                d) {	
                case "upSchPraForm":
                    k = c.content.isOpenMyResume,
                    l = c.content.firstOpen,
                    A(k, l),
                    1 == a.find(".mr_jobe_list").length && (a.find(".mr_empty_add").show(),
                    $.trim($(".base_info .j").text()),
                    ("1" == $(".shenfen em").attr("data-id") || "0" == $(".shenfen em").attr("data-id")) && ($(".mr_infoed .info_t .shenfen").addClass("dn"),
                    $(".mr_p_info .mr_edit_on").attr("data-sf", "")),
                    p = $(".ul_shenfen li[data-id = '1']"),
                    p && p.remove(),
                    o = $(".mr_module .flag_edu"),
                    o.is(":hidden") && o.removeClass("dn")),
                    W(c);
                    break;
                case "upSchClubForm":
               		alert("upSchClubForm");
                    k = c.content.isOpenMyResume,
                    l = c.content.firstOpen,
                    A(k, l),
                    1 == a.find(".mr_jobe_list").length && (a.find(".mr_empty_add").show(),
                    $.trim($(".base_info .j").text()),
                    ("1" == $(".shenfen em").attr("data-id") || "0" == $(".shenfen em").attr("data-id")) && ($(".mr_infoed .info_t .shenfen").addClass("dn"),
                    $(".mr_p_info .mr_edit_on").attr("data-sf", "")),
                    p = $(".ul_shenfen li[data-id = '1']"),
                    p && p.remove(),
                    o = $(".mr_module .flag_edu"),
                    o.is(":hidden") && o.removeClass("dn")),
                    W(c);
                    break;
                case "upJobForm":
                    k = c.content.isOpenMyResume,
                    l = c.content.firstOpen,
                    A(k, l),
                    1 == a.find(".mr_jobe_list").length && (a.find(".mr_empty_add").show(),
                    $.trim($(".base_info .j").text()),
                    ("2" == $(".shenfen em").attr("data-id") || "0" == $(".shenfen em").attr("data-id")) && ($(".mr_infoed .info_t .shenfen").addClass("dn"),
                    $(".mr_p_info .mr_edit_on").attr("data-sf", "")),
                    n = $(".ul_shenfen li[data-id = '2']"),
                    n && n.remove(),
                    o = $(".mr_module .flag_work"),
                    "实习经历" != $.trim($("#workExperience .mr_title_c").text()) && o.is(":hidden") && o.removeClass("dn")),
                    W(c);
                    break;

                case "upEduForm":
                	alert("asdasd");
                    k = c.content.isOpenMyResume,
                    l = c.content.firstOpen,
                    A(k, l),
                    1 == a.find(".mr_jobe_list").length && (a.find(".mr_empty_add").show(),
                    $.trim($(".base_info .j").text()),
                    ("1" == $(".shenfen em").attr("data-id") || "0" == $(".shenfen em").attr("data-id")) && ($(".mr_infoed .info_t .shenfen").addClass("dn"),
                    $(".mr_p_info .mr_edit_on").attr("data-sf", "")),
                    p = $(".ul_shenfen li[data-id = '1']"),
                    p && p.remove(),
                    o = $(".mr_module .flag_edu"),
                    o.is(":hidden") && o.removeClass("dn")),
                    W(c);

                    break;
                case "upExpJobForm":
                    $("#upExpJobForm .mr_cancel").trigger("click");
                    break;
                case "upProForm":
                    $("#upProForm .mr_cancel").trigger("click"),
                    q = c && c.content && c.content.projectExperiences || [],
                    r = eb(q),
                    Y.obj.find(".list_show").html(r),
                    s = $(".mr_jobe_list .l2 .projectTitle"),
                    s.each(function() {
                        var a = $(this)
                          , 
                        b = a.width();
                        a.find("span").css("left", b + 5)
                    }),
                    t = Y.obj.find(".mr_empty_add"),
                    q.length ? (globals.hasProjectExperiences = !0,
                    t.hide()) : (globals.hasProjectExperiences = !1,
                    t.show());
                    break;
                default:
                    return
                }
                mb(),
                d = "",
                f = !0,
                b.prev().remove(),
                b.remove()
            } else
                alert(c.msg);
            e = "",
            h.text("删除").attr("disabled", !1)
        })
    }),
    B = {
        obj: $("#workExperience"),
        clearError: function() {
            this.obj.find("span.error").hide(),
            this.obj.find("input.error").removeClass("error")
        },
        rules: {
            companyName: {
                required: !0,
                maxlenStr: 40
            },
            positionName: {
                required: !0,
                maxlenStr: 30
            },
            startTime: {
                required: !0
            },
            endTime: {
                required: !0
            },
            jobContent: {
                required: !1,
                tinymceLength: [0, 800]
            }
        },
        messages: {
            companyName: {
                required: "必填",
                maxlenStr: "请输入80字以内的公司名称"
            },
            positionName: {
                required: "必填",
                maxlenStr: "请输入60字以内的职位名称"
            },
            startTime: {
                required: "必填"
            },
            endTime: {
                required: "必填"
            },
            jobContent: {
                tinymceLength: "请输入1600字以内的工作内容"
            }
        },
        AddCancel: function() {
            $("#addJobForm").addClass("dn"),
            0 == this.obj.find(".mr_jobe_list").length && this.obj.find(".mr_empty_add").show(),
            mb(),
            this.obj.find(".mr_head_r").removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"),
            d = "",
            f = !0
        },
        UpCancel: function() {
            mb(),
            $("#upJobForm").prev().show(),
            $("#upJobForm").remove(),
            d = "",
            f = !0
        }
    };
    try {
        C = new components.CityWrapper({
            container: $("#olinfoForm .city_s"),
            onchange: function(a, b) {
                b.find(".error").hide()
            },
            beforeShown: function(a) {
                $(document).trigger("click"),
                $(".select_color").removeClass("select_color"),
                a.addClass("select_color")
            },
            afterHide: function(a) {
                a.removeClass("select_color")
            }
        }),
        D = new components.CityWrapper({
            container: $("#upExpJobForm .city_s"),
            onchange: function(a, b) {
                b.find(".error").hide()
            },
            beforeShown: function(a) {
                $(document).trigger("click"),
                $(".select_color").removeClass("select_color"),
                a.addClass("select_color")
            },
            afterHide: function(a) {
                a.removeClass("select_color")
            }
        }),
        E = new components.CityWrapper({
            container: $("#infoForm .city_s"),
            onchange: function(a, b) {
                b.find(".error").hide()
            },
            beforeShown: function(a) {
                $(document).trigger("click"),
                $(".select_color").removeClass("select_color"),
                a.addClass("select_color")
            },
            afterHide: function(a) {
                a.removeClass("select_color")
            }
        })
    } catch (F) {}
    try {
    // G = new components.CalendarWrapper({
    // 	container: $("#addJobForm").find(".mr_timed_div:first"),
    // 	onchange: function(a, b) {
    // 		H.setLeftBoundary(a), b.find(".error").hide()
    // 	},
    // 	beforeShown: function(a) {
    // 		H.hide(), $(".select_color").removeClass("select_color"), a.addClass("select_color"), a.css("zIndex", "2"), a.siblings("div:last").css("zIndex", "1")
    // 	},
    // 	afterHide: function(a) {
    // 		a.removeClass("select_color"), a.css("zIndex", "auto"), a.siblings("div:last").css("zIndex", "auto")
    // 	}
    // }), H = new components.CalendarWrapper({
    // 	container: $("#addJobForm").find(".mr_timed_div:last"),
    // 	onchange: function(a, b) {
    // 		G.setRightBoundary(a), b.find(".error").hide()
    // 	},
    // 	beforeShown: function(a) {
    // 		G.hide(), $(".select_color").removeClass("select_color"), a.addClass("select_color")
    // 	},
    // 	afterHide: function(a) {
    // 		a.removeClass("select_color")
    // 	},
    // 	has2Today: !0
    // })
    } catch (F) {}
    P = {
        obj: $("#educationalBackground"),
        rules: {
            schoolName: {
                required: !0,
                checkNum: !0,
                maxlenStr: 50,
                truename2: !0
            },
            positionName: {
                required: !0,
                checkNum: !0,
                maxlenStr: 50,
                newSpecialChar: !0
            },
            degree_text: {
                required: !0
            },
            graduate_text: {
                required: !0
            }
        },
        messages: {
            schoolName: {
                required: "必填",
                checkNum: "请输入有效的学校名称",
                maxlenStr: "请输入有效的学校名称",
                truename2: "请输入有效的学校名称"
            },
            positionName: {
                required: "必填",
                checkNum: "请输入有效的专业名称",
                maxlenStr: "请输入有效的专业名称",
                newSpecialChar: "请输入有效的专业名称"
            },
            degree_text: {
                required: "必填"
            },
            graduate_text: {
                required: "必填"
            }
        },
        errorPlacement: function(a, b) {
            "hidden" == b.attr("type") ? ($(b).parent().css("margin-bottom", "20px"),
            a.appendTo($(b).parent())) : "button" == b.attr("type") ? a.appendTo($(b).parent()) : a.insertAfter($(b).parent())
        },
        clearError: function() {
            this.obj.find("span.error").hide(),
            this.obj.find("input.error").removeClass("error")
        },
        AddCancel: function() {
            $("#addEduForm").addClass("dn"),
            0 == this.obj.find(".mr_jobe_list").length && this.obj.find(".mr_empty_add").show(),
            mb(),
            this.obj.find(".mr_head_r").removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"),
            d = "",
            f = !0
        },
        UpCancel: function() {
            mb(),
            $("#upEduForm").prev().show(),
            $("#upEduForm").remove(),
            d = "",
            f = !0
        }
    },
    P.obj.delegate(".mr_head_r", "click", function() {
        if (P.clearError(),
        T(),
        "添加" == $(this).children("em").text()) {
            var b = P.obj.find(".mr_empty_add");
            // "" == d && (b.not(":hidden") && b.hide(), 
            $("#upEduForm").addClass("dn"),
            d = "addEduForm",
            f = !1,
            $("#addEduForm").removeClass("dn"),
            kb()
            //$(this).removeClass("mr_add_grey").removeClass("mr_up_grey").addClass("mr_addup_cel").children("em").text("取消"))
        } else
            0 == $("#educationalBackground .mr_jobe_list").length && $("#educationalBackground .mr_empty_add").show(),
            $("#addEduForm").addClass("dn"),
            mb(),
            $(this).removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"),
            d = ""
    }),
    P.obj.delegate(".mr_empty_add", "click", function() {
        $(this).hide(),
        $("#educationalBackground .mr_head_r").trigger("click")
    }),
    P.obj.delegate(".mr_edit", "click", function() {
        var b, c;
        "" == d && (kb(),
        d = "upEduForm",
        f = !1,
        b = "",
        b = $("#edu_update_hide").html(),
        $("#addEduForm").addClass("dn"),
        $(this).parents(".mr_jobe_list").hide().after(b),
        Q(),
        R(),
        $(this).parents(".mr_jobe_list").next().attr("id", "upEduForm"),
        c = $("#upEduForm"),
        $("#eduId", c).val($(this).data("eduid")),
        $(".mr_del_ok", c).attr("data-id", $(this).data("eduid")),
        oMoudle.eduId = $(this).data("eduid"),
        $('input[name="schoolName"]', c).val($(this).data("schoolname")),
        $('input[name="positionName"]', c).val($(this).data("pro")),
        $('input[name="degree_text"]', c).val($(this).data("edu")),
        $('input[name="degree_val"]', c).val($(this).data("edu")),
        $('input[name="graduate_text"]', c).val($(this).data("date")),
        $('input[name="graduate"]', c).val($(this).data("date")),
        $('input[name="startYear"]', c).val($(this).data("startdate")),
        $('input[name="school_city"]', c).val($(this).data("schoolcity")),
        $('input[name="degree"]', c).val($(this).data("degree")),
        $('input[name="academy"]', c).val($(this).data("academy")),
        $('input[name="major"]', c).val($(this).data("major")),
        $('input[name="gpa_score"]', c).val($(this).data("gpa")),
        $('input[name="professional_ranking"]', c).val($(this).data("prorank")),
        $('input[name="class_ranking"]', c).val($(this).data("classrank")),
        $('input[name="professional_describe"]', c).val($(this).data("prodes")),
        $('input[name="tutor_name"]', c).val($(this).data("tutorname")),
        $('input[name="tutor_phone"]', c).val($(this).data("tutorphone")),
        U())
    }),
    P.obj.delegate("#upEduForm .mr_cancel", "click", function() {
        P.UpCancel(),
        $("#addEduForm").removeClass("dn")
    }),
    $("#addEduForm .mr_cancel").bind("click", function() {
        P.AddCancel()
    }),
    $(".ul_edubg").delegate("li", "click", function() {
        $("#degree_val").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_degree").delegate("li", "click", function() {
        $("#degree").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_proferank").delegate("li", "click", function() {
        $("#proferank").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_classrank").delegate("li", "click", function() {
        $("#classrank").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $("#addEduForm").validate({
        rules: P.rules,
        messages: P.messages,
        errorPlacement: function(a, b) {
            P.errorPlacement(a, b)
        },
        submitHandler: function(a) {
            var b = globals.resumeId, 
            c = $('input[name="schoolName"]', a).val(), 
            d = $('input[name="positionName"]', a).val(), 
            e = $('input[name="degree_val"]', a).val(), 
            f = $('input[name="graduate"]', a).val(), 
            q = $('input[name="school_city"]', a).val(), 
            h = $('input[name="degree"]', a).val(), 
            i = $('input[name="academy"]', a).val(), 
            j = $('input[name="major"]', a).val(), 
            k = $('input[name="gpa_score"]', a).val(), 
            l = $('input[name="professional_ranking"]', a).val(), 
            m = $('input[name="class_ranking"]', a).val(), 
            n = $('input[name="professional_describe"]', a).val(), 
            o = $('input[name="tutor_name"]', a).val(), 
            p = $('input[name="tutor_phone"]', a).val(), 
            r = $('input[name="startYear"]', a).val(), 
            g = globals.token;
            $(a).find(":submit").val("保存中...").attr("disabled", !0),
            $.ajax({
                url: ctx + "Resume/educationExperience",
                type: "post",
                data: {
                    id: b,
                    schoolName: c,
                    professional: d,
                    education: e,
                    endYear: f,
                    school_city: q,
                    degree: h,
                    academy: i,
                    major: j,
                    gpa_score: k,
                    professional_ranking: l,
                    class_ranking: m,
                    professional_describe: n,
                    tutor_name: o,
                    tutor_phone: p,
                    startYear: r,
                    resubmitToken: g,
                },
                dataType: "json"
            }).done(function(b) {
                var c, d, e, f, g, h, i, j, k, l, m, n, o, p, r;
                if (b.success) {
                    $("#show_no_edu").hide();
                }
                b.success ? (c = b.content.isOpenMyResume,
                d = $(".toggle"),
                e = b.content.firstOpen,
                globals.isFirstOpen = e,
                c && ($(".openresume_tip").hide(),
                globals.isFirstOpen ? (globals.isOpenResume = "3",
                $(".firstset").show()) : globals.isOpenResume = d.hasClass("toggle-off") ? "0" : "1"),
                W(b),
                globals.token = b.resubmitToken,
                S(a),
                updateResumeTime(b.content.refreshTime),
                f = b.content.infoCompleteStatus.score,
                g = parseInt($.trim($(".mr_bfb").text())),
                h = amountScore - g + f,
                updateRatioRM(f, h),
                P.obj.find(".mr_head_r").trigger("click"),
                i = b.content.educationExperiences,
                V(i),
                j = P.obj.find(".mr_empty_add"),
                j.not(":hidden") && j.hide(),
                k = $(".mr_module .flag_edu"),
                k.is(":hidden") || k.addClass("dn")) : alert(b.msg),
                $(a).find(":submit").val("保 存").attr("disabled", !1)
            })
        }
    }),
    Q(),
    R(),
    P = {
        obj: $("#educationalBackground"),
        rules: {
            schoolName: {
                required: !0,
                checkNum: !0,
                maxlenStr: 50,
                truename2: !0
            },
            positionName: {
                required: !0,
                checkNum: !0,
                maxlenStr: 50,
                newSpecialChar: !0
            },
            degree_text: {
                required: !0
            },
            graduate_text: {
                required: !0
            }
        },
        messages: {
            schoolName: {
                required: "必填",
                checkNum: "请输入有效的学校名称",
                maxlenStr: "请输入有效的学校名称",
                truename2: "请输入有效的学校名称"
            },
            positionName: {
                required: "必填",
                checkNum: "请输入有效的专业名称",
                maxlenStr: "请输入有效的专业名称",
                newSpecialChar: "请输入有效的专业名称"
            },
            degree_text: {
                required: "必填"
            },
            graduate_text: {
                required: "必填"
            }
        },
        errorPlacement: function(a, b) {
            "hidden" == b.attr("type") ? ($(b).parent().css("margin-bottom", "20px"),
            a.appendTo($(b).parent())) : "button" == b.attr("type") ? a.appendTo($(b).parent()) : a.insertAfter($(b).parent())
        },
        clearError: function() {
            this.obj.find("span.error").hide(),
            this.obj.find("input.error").removeClass("error")
        },
        AddCancel: function() {
            $("#addEduForm").addClass("dn"),
            0 == this.obj.find(".mr_jobe_list").length && this.obj.find(".mr_empty_add").show(),
            mb(),
            this.obj.find(".mr_head_r").removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"),
            d = "",
            f = !0
        },
        UpCancel: function() {
            mb(),
            $("#upEduForm").prev().show(),
            $("#upEduForm").remove(),
            d = "",
            f = !0
        }
    },
    P.obj.delegate(".mr_head_r", "click", function() {
        if (P.clearError(),
        T(),
        "添加" == $(this).children("em").text()) {
            var b = P.obj.find(".mr_empty_add");
            // "" == d && (b.not(":hidden") && b.hide(), 
            $("#upEduForm").addClass("dn"),
            d = "addEduForm",
            f = !1,
            $("#addEduForm").removeClass("dn"),
            kb()
            //$(this).removeClass("mr_add_grey").removeClass("mr_up_grey").addClass("mr_addup_cel").children("em").text("取消"))
        } else
            0 == $("#educationalBackground .mr_jobe_list").length && $("#educationalBackground .mr_empty_add").show(),
            $("#addEduForm").addClass("dn"),
            mb(),
            $(this).removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"),
            d = ""
    }),
    P.obj.delegate(".mr_empty_add", "click", function() {
        $(this).hide(),
        $("#educationalBackground .mr_head_r").trigger("click")
    }),
    P.obj.delegate(".mr_edit", "click", function() {
        var b, c;
        "" == d && (kb(),
        d = "upEduForm",
        f = !1,
        b = "",
        b = $("#edu_update_hide").html(),
        $("#addEduForm").addClass("dn"),
        $(this).parents(".mr_jobe_list").hide().after(b),
        Q(),
        R(),
        $(this).parents(".mr_jobe_list").next().attr("id", "upEduForm"),
        c = $("#upEduForm"),
        $("#eduId", c).val($(this).data("eduid")),
        $(".mr_del_ok", c).attr("data-id", $(this).data("eduid")),
        oMoudle.eduId = $(this).data("eduid"),
        $('input[name="schoolName"]', c).val($(this).data("schoolname")),
        $('input[name="positionName"]', c).val($(this).data("pro")),
        $('input[name="degree_text"]', c).val($(this).data("edu")),
        $('input[name="degree_val"]', c).val($(this).data("edu")),
        $('input[name="graduate_text"]', c).val($(this).data("date")),
        $('input[name="graduate"]', c).val($(this).data("date")),
        $('input[name="startYear"]', c).val($(this).data("startdate")),
        $('input[name="school_city"]', c).val($(this).data("schoolcity")),
        $('input[name="degree"]', c).val($(this).data("degree")),
        $('input[name="academy"]', c).val($(this).data("academy")),
        $('input[name="major"]', c).val($(this).data("major")),
        $('input[name="gpa_score"]', c).val($(this).data("gpa")),
        $('input[name="professional_ranking"]', c).val($(this).data("prorank")),
        $('input[name="class_ranking"]', c).val($(this).data("classrank")),
        $('input[name="professional_describe"]', c).val($(this).data("prodes")),
        $('input[name="tutor_name"]', c).val($(this).data("tutorname")),
        $('input[name="tutor_phone"]', c).val($(this).data("tutorphone")),
        U())
    }),
    P.obj.delegate("#upEduForm .mr_cancel", "click", function() {
        P.UpCancel(),
        $("#addEduForm").removeClass("dn")
    }),
    $("#addEduForm .mr_cancel").bind("click", function() {
        P.AddCancel()
    }),
    $(".ul_edubg").delegate("li", "click", function() {
        $("#degree_val").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_degree").delegate("li", "click", function() {
        $("#degree").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_proferank").delegate("li", "click", function() {
        $("#proferank").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_classrank").delegate("li", "click", function() {
        $("#classrank").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $("#addEduForm").validate({
        rules: P.rules,
        messages: P.messages,
        errorPlacement: function(a, b) {
            P.errorPlacement(a, b)
        },
        submitHandler: function(a) {
            var b = globals.resumeId
              , 
            c = $('input[name="schoolName"]', a).val()
              , 
            d = $('input[name="positionName"]', a).val()
              , 
            e = $('input[name="degree_val"]', a).val()
              , 
            f = $('input[name="graduate"]', a).val()
              , 
            q = $('input[name="school_city"]', a).val()
              , 
            h = $('input[name="degree"]', a).val()
              , 
            i = $('input[name="academy"]', a).val()
              , 
            j = $('input[name="major"]', a).val()
              , 
            k = $('input[name="gpa_score"]', a).val()
              , 
            l = $('input[name="professional_ranking"]', a).val()
              , 
            m = $('input[name="class_ranking"]', a).val()
              , 
            n = $('input[name="professional_describe"]', a).val()
              , 
            o = $('input[name="tutor_name"]', a).val()
              , 
            p = $('input[name="tutor_phone"]', a).val()
              , 
            r = $('input[name="startYear"]', a).val()
              , 
            g = globals.token;
            $(a).find(":submit").val("保存中...").attr("disabled", !0),
            $.ajax({
                url: ctx + "Resume/educationExperience",
                type: "post",
                data: {
                    id: b,
                    schoolName: c,
                    professional: d,
                    education: e,
                    endYear: f,
                    school_city: q,
                    degree: h,
                    academy: i,
                    major: j,
                    gpa_score: k,
                    professional_ranking: l,
                    class_ranking: m,
                    professional_describe: n,
                    tutor_name: o,
                    tutor_phone: p,
                    startYear: r,
                    resubmitToken: g,
                },
                dataType: "json"
            }).done(function(b) {
                var c, d, e, f, g, h, i, j, k, l, m, n, o, p, r;
                if (b.success) {
                    $("#show_no_edu").hide();
                }
                b.success ? (c = b.content.isOpenMyResume,
                d = $(".toggle"),
                e = b.content.firstOpen,
                globals.isFirstOpen = e,
                c && ($(".openresume_tip").hide(),
                globals.isFirstOpen ? (globals.isOpenResume = "3",
                $(".firstset").show()) : globals.isOpenResume = d.hasClass("toggle-off") ? "0" : "1"),
                W(b),
                globals.token = b.resubmitToken,
                S(a),
                updateResumeTime(b.content.refreshTime),
                f = b.content.infoCompleteStatus.score,
                g = parseInt($.trim($(".mr_bfb").text())),
                h = amountScore - g + f,
                updateRatioRM(f, h),
                P.obj.find(".mr_head_r").trigger("click"),
                i = b.content.educationExperiences,
                V(i),
                alert(i),
                alert(f),
                j = P.obj.find(".mr_empty_add"),
                j.not(":hidden") && j.hide(),
                k = $(".mr_module .flag_edu"),
                k.is(":hidden") || k.addClass("dn")) : alert(b.msg),
                $(a).find(":submit").val("保 存").attr("disabled", !1)
            })
        }
    }),
    SC = {
        obj: $("#schoolClub"),
        rules: {
            schoolName: {
                required: !0,
                checkNum: !0,
                maxlenStr: 50,
                truename2: !0
            }
        
        },
        messages: {
            schoolName: {
                required: "必填",
                checkNum: "请输入有效的学校名称",
                maxlenStr: "请输入有效的学校名称",
                truename2: "请输入有效的学校名称"
            }
        },
        errorPlacement: function(a, b) {
            "hidden" == b.attr("type") ? ($(b).parent().css("margin-bottom", "20px"),
            a.appendTo($(b).parent())) : "button" == b.attr("type") ? a.appendTo($(b).parent()) : a.insertAfter($(b).parent())
        },
        clearError: function() {
            this.obj.find("span.error").hide(),
            this.obj.find("input.error").removeClass("error")
        },
        AddCancel: function() {
            $("#addSchClubForm").addClass("dn"),
            0 == this.obj.find(".mr_jobe_list").length && this.obj.find(".mr_empty_add").show(),
            mb(),
            this.obj.find(".mr_head_r").removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"),
            d = "",
            f = !0
        },
        UpCancel: function() {
            mb(),
            $("#upSchClubForm").prev().show(),
            $("#upSchClubForm").remove(),
            d = "",
            f = !0
        }
    },
    SC.obj.delegate(".mr_head_r", "click", function() {
        if (SC.clearError(),
        T(),
        "添加" == $(this).children("em").text()) {
            var b = SC.obj.find(".mr_empty_add");
            // "" == d && (b.not(":hidden") && b.hide(), 
            $("#upSchClubForm").addClass("dn"),
            d = "addSchClubForm",
            f = !1,
            $("#addSchClubForm").removeClass("dn"),
            kb()
            //$(this).removeClass("mr_add_grey").removeClass("mr_up_grey").addClass("mr_addup_cel").children("em").text("取消"))
        } else
            0 == $("#schoolClub .mr_jobe_list").length && $("#schoolClub .mr_empty_add").show(),
            $("#addSchClubForm").addClass("dn"),
            mb(),
            $(this).removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"),
            d = ""
    }),
    SC.obj.delegate(".mr_empty_add", "click", function() {
        $(this).hide(),
        $("#schoolClub .mr_head_r").trigger("click")
    }),
    SC.obj.delegate(".mr_edit", "click", function() {
        var b, c;
        "" == d && (kb(),
        d = "upSchClubForm",
        f = !1,
        b = "",
        b = $("#schclub_update_hide").html(),
        $("#addSchClubForm").addClass("dn"),
        $(this).parents(".mr_jobe_list").hide().after(b),
        Q(),
        R(),
        $(this).parents(".mr_jobe_list").next().attr("id", "upSchClubForm"),
        c = $("#upSchClubForm"),
        $("#schoolclubid", c).val($(this).data("schoolclubid")),
        $(".mr_del_ok", c).attr("data-id", $(this).data("schoolclubid")),
        oMoudle.schoolclubid = $(this).data("schoolclubid"),
        $('input[name="schClubName"]', c).val($(this).data("schclubname")),
        $('input[name="schClubLevel"]', c).val($(this).data("schclublevel")),
        $('input[name="positionName"]', c).val($(this).data("posname")),
        $('textarea[name="workDes"]', c).val($(this).data("workdes")),
        $('input[name="startDate"]', c).val($(this).data("startdate")),
        $('input[name="endDate"]', c).val($(this).data("enddate")),
        SCU())
    }),
    SC.obj.delegate("#upSchClubForm .mr_cancel", "click", function() {
        SC.UpCancel(),
        $("#addSchClubForm").removeClass("dn")
    }),
    $("#addSchClubForm .mr_cancel").bind("click", function() {
        SC.AddCancel()
    }),
    $(".ul_schclublevel").delegate("li", "click", function() {
        $("#schClubLevel").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $(".ul_positionname").delegate("li", "click", function() {
        $("#positionName").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),
    $("#addSchClubForm").validate({
        rules: SC.rules,
        messages: SC.messages,
        errorPlacement: function(a, b) {
            SC.errorPlacement(a, b)
        },
        submitHandler: function(a) {
            var b = globals.resumeId, 
            c = $('input[name="schClubName"]', a).val(), 
            d = $('input[name="schClubLevel"]', a).val(), 
            e = $('input[name="positionName"]', a).val(), 
            f = $('textarea[name="workDes"]', a).val(), 
            q = $('input[name="startDate"]', a).val(), 
            h = $('input[name="endDate"]', a).val(), 
            g = globals.token;
            $(a).find(":submit").val("保存中...").attr("disabled", !0),
            $.ajax({
                url: ctx + "Resume/schoolClub",
                type: "post",
                data: {
                    id: b,
                    schClubName: c,
                    schClubLevel: d,
                    positionName: e,
                    workDes: f,
                    startDate: q,
                    endDate: h,
                    resubmitToken: g,
                },
                dataType: "json"
            }).done(function(b) {
                var c, d, e, f, g, h, i, j, k, l, m, n, o, p, r;
                if (b.success) {
                    $("#show_no_edu").hide();
                }
                b.success ? (c = b.content.isOpenMyResume,
                d = $(".toggle"),
                e = b.content.firstOpen,
                globals.isFirstOpen = e,
                c && ($(".openresume_tip").hide(),
                globals.isFirstOpen ? (globals.isOpenResume = "3",
                $(".firstset").show()) : globals.isOpenResume = d.hasClass("toggle-off") ? "0" : "1"),
                W(b),
                globals.token = b.resubmitToken,
                S(a),
                updateResumeTime(b.content.refreshTime),
                g = parseInt($.trim($(".mr_bfb").text())),
                h = amountScore - g + f,
                updateRatioRM(f, h),
                SC.obj.find(".mr_head_r").trigger("click"),
                i = b.content.schoolClubs,
                SCV(i),
                j = SC.obj.find(".mr_empty_add"),
                j.not(":hidden") && j.hide(),
                k = $(".mr_module .flag_edu"),
                k.is(":hidden") || k.addClass("dn")) : alert(b.msg),
                $(a).find(":submit").val("保 存").attr("disabled", !1)
            })
        }
    }),
	SW = {
		obj: $("#schoolAwards"),
		rules: {
			schoolName: {
				required: !0,
				checkNum: !0,
				maxlenStr: 50,
				truename2: !0
			}
		},
		messages: {
			schoolName: {
				required: "必填",
				checkNum: "请输入有效的学校名称",
				maxlenStr: "请输入有效的学校名称",
				truename2: "请输入有效的学校名称"
			}
		},
		errorPlacement: function(a, b) {
			"hidden" == b.attr("type") ? ($(b).parent().css("margin-bottom", "20px"), a.appendTo($(b).parent())) : "button" == b.attr("type") ? a.appendTo($(b).parent()) : a.insertAfter($(b).parent())
		},
		clearError: function() {
			this.obj.find("span.error").hide(), this.obj.find("input.error").removeClass("error")
		},
		AddCancel: function() {
			$("#addSchAwForm").addClass("dn"), 0 == this.obj.find(".mr_jobe_list").length && this.obj.find(".mr_empty_add").show(), mb(), this.obj.find(".mr_head_r").removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"), d = "", f = !0
		},
		UpCancel: function() {
			mb(), $("#upEduForm").prev().show(), $("#upEduForm").remove(), d = "", f = !0
		}
	}, SW.obj.delegate(".mr_head_r", "click", function() {
		if (SW.clearError(), T(), "添加" == $(this).children("em").text()) {
			var b = SW.obj.find(".mr_empty_add");
			// "" == d && (b.not(":hidden") && b.hide(), 
				 $("#upEduForm").addClass("dn"), 
				d = "addSchAwForm", f = !1, $("#addSchAwForm").removeClass("dn"), kb()
				//$(this).removeClass("mr_add_grey").removeClass("mr_up_grey").addClass("mr_addup_cel").children("em").text("取消"))
		} else 0 == $("#schoolAwards .mr_jobe_list").length && $("#schoolAwards .mr_empty_add").show(), $("#addSchAwForm").addClass("dn"), mb(), $(this).removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"), d = ""
	}), SW.obj.delegate(".mr_empty_add", "click", function() {
		$(this).hide(), $("#schoolAwards .mr_head_r").trigger("click")
	}), SW.obj.delegate(".mr_edit", "click", function() {
		var b, c;
		"" == d && (kb(), d = "upEduForm", f = !1, b = "", b = $("#edu_update_hide").html(), $("#addSchAwForm").addClass("dn"), $(this).parents(".mr_jobe_list").hide().after(b), Q(), R(), $(this).parents(".mr_jobe_list").next().attr("id", "upEduForm"), c = $("#upEduForm"), $("#eduId", c).val($(this).data("eduid")), $(".mr_del_ok", c).attr("data-id", $(this).data("eduid")), oMoudle.eduId = $(this).data("eduid"), $('input[name="schoolName"]', c).val($(this).data("schoolname")), $('input[name="positionName"]', c).val($(this).data("pro")), $('input[name="degree_text"]', c).val($(this).data("edu")), $('input[name="degree_val"]', c).val($(this).data("edu")), $('input[name="graduate_text"]', c).val($(this).data("date")), $('input[name="graduate"]', c).val($(this).data("date")),$('input[name="startYear"]', c).val($(this).data("startdate")),$('input[name="school_city"]', c).val($(this).data("schoolcity")), $('input[name="degree"]', c).val($(this).data("degree")), $('input[name="academy"]', c).val($(this).data("academy")) , $('input[name="major"]', c).val($(this).data("major")), $('input[name="gpa_score"]', c).val($(this).data("gpa")), $('input[name="professional_ranking"]', c).val($(this).data("prorank")),$('input[name="class_ranking"]', c).val($(this).data("classrank")), $('input[name="professional_describe"]', c).val($(this).data("prodes")), $('input[name="tutor_name"]', c).val($(this).data("tutorname")), $('input[name="tutor_phone"]', c).val($(this).data("tutorphone")),U())
	}), SW.obj.delegate("#upEduForm .mr_cancel", "click", function() {
		SW.UpCancel(),$("#addSchAwForm").removeClass("dn")
	}), $("#addSchAwForm .mr_cancel").bind("click", function() {
		SW.AddCancel()
	}),$(".ul_awardsType").delegate("li", "click", function() {
        $("#awardsType").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),$(".ul_awardsLevel").delegate("li", "click", function() {
        $("#awardsLevel").val($(this).text()),
        $(this).parent().parent().hide(),
        $(".select_color").removeClass("select_color")
    }),$("#addSchAwForm").validate({
			rules: SW.rules,
			messages: SW.messages,
			errorPlacement: function(a, b) {
				SW.errorPlacement(a, b)
			},
			submitHandler: function(a) {
				var b = globals.resumeId,
					c = $('input[name="awardsName"]', a).val(),
					d = $('input[name="awardsType"]', a).val(),
					e = $('input[name="awardsLevel"]', a).val(),
					f = $('input[name="awardsDate"]', a).val(),
					q = $('textarea[name="awardsDes"]', a).val(),
					
					g = globals.token;
				$(a).find(":submit").val("保存中...").attr("disabled", !0), $.ajax({
					url: ctx + "Resume/schoolAwards",
					type: "post",
					data: {
						id: b,
						awardsName: c,
						awardsType: d,
						awardsLevel: e,
						awardsDate: f,
						awardsDes: q,
						resubmitToken: g,
					},
					dataType: "json"
				}).done(function(b) {
					var c, d, e, f, g, h, i, j, k, l , m, n, o, p, r;
					if(b.success){
						$("#show_no_edu").hide();
					}
					b.success ? (c = b.content.isOpenMyResume, d = $(".toggle"), e = b.content.firstOpen, globals.isFirstOpen = e, c && ($(".openresume_tip").hide(), globals.isFirstOpen ? (globals.isOpenResume = "3", $(".firstset").show()) : globals.isOpenResume = d.hasClass("toggle-off") ? "0" : "1"), W(b), globals.token = b.resubmitToken, S(a), updateResumeTime(b.content.refreshTime), f = b.content.infoCompleteStatus.score, g = parseInt($.trim($(".mr_bfb").text())), h = amountScore - g + f, updateRatioRM(f, h), SW.obj.find(".mr_head_r").trigger("click"), i = b.content.educationExperiences, V(i), j = SW.obj.find(".mr_empty_add"), j.not(":hidden") && j.hide(), k = $(".mr_module .flag_edu"), k.is(":hidden") || k.addClass("dn")) : alert(b.msg), $(a).find(":submit").val("保 存").attr("disabled", !1)
				})
			}
		}),
		ZS = {
		obj: $("#certificate"),
		rules: {
			schoolName: {
				required: !0,
				checkNum: !0,
				maxlenStr: 50,
				truename2: !0
			}
		},
		messages: {
			schoolName: {
				required: "必填",
				checkNum: "请输入有效的学校名称",
				maxlenStr: "请输入有效的学校名称",
				truename2: "请输入有效的学校名称"
			}
		},
		errorPlacement: function(a, b) {
			"hidden" == b.attr("type") ? ($(b).parent().css("margin-bottom", "20px"), a.appendTo($(b).parent())) : "button" == b.attr("type") ? a.appendTo($(b).parent()) : a.insertAfter($(b).parent())
		},
		clearError: function() {
			this.obj.find("span.error").hide(), this.obj.find("input.error").removeClass("error")
		},
		AddCancel: function() {
			$("#addCertificateForm").addClass("dn"), 0 == this.obj.find(".mr_jobe_list").length && this.obj.find(".mr_empty_add").show(), mb(), this.obj.find(".mr_head_r").removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"), d = "", f = !0
		},
		UpCancel: function() {
			mb(), $("#upEduForm").prev().show(), $("#upEduForm").remove(), d = "", f = !0
		}
	}, ZS.obj.delegate(".mr_head_r", "click", function() {
		if (ZS.clearError(), T(), "添加" == $(this).children("em").text()) {
			var b = ZS.obj.find(".mr_empty_add");
			// "" == d && (b.not(":hidden") && b.hide(), 
				 $("#upEduForm").addClass("dn"), 
				d = "addCertificateForm", f = !1, $("#addCertificateForm").removeClass("dn"), kb()
				//$(this).removeClass("mr_add_grey").removeClass("mr_up_grey").addClass("mr_addup_cel").children("em").text("取消"))
		} else 0 == $("#schoolClub .mr_jobe_list").length && $("#schoolClub .mr_empty_add").show(), $("#addCertificateForm").addClass("dn"), mb(), $(this).removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"), d = ""
	}), ZS.obj.delegate(".mr_empty_add", "click", function() {
		$(this).hide(), $("#schoolClub .mr_head_r").trigger("click")
	}), ZS.obj.delegate(".mr_edit", "click", function() {
		var b, c;
		"" == d && (kb(), d = "upEduForm", f = !1, b = "", b = $("#edu_update_hide").html(), $("#addCertificateForm").addClass("dn"), $(this).parents(".mr_jobe_list").hide().after(b), Q(), R(), $(this).parents(".mr_jobe_list").next().attr("id", "upEduForm"), c = $("#upEduForm"), $("#eduId", c).val($(this).data("eduid")), $(".mr_del_ok", c).attr("data-id", $(this).data("eduid")), oMoudle.eduId = $(this).data("eduid"), $('input[name="schoolName"]', c).val($(this).data("schoolname")), $('input[name="positionName"]', c).val($(this).data("pro")), $('input[name="degree_text"]', c).val($(this).data("edu")), $('input[name="degree_val"]', c).val($(this).data("edu")), $('input[name="graduate_text"]', c).val($(this).data("date")), $('input[name="graduate"]', c).val($(this).data("date")),$('input[name="startYear"]', c).val($(this).data("startdate")),$('input[name="school_city"]', c).val($(this).data("schoolcity")), $('input[name="degree"]', c).val($(this).data("degree")), $('input[name="academy"]', c).val($(this).data("academy")) , $('input[name="major"]', c).val($(this).data("major")), $('input[name="gpa_score"]', c).val($(this).data("gpa")), $('input[name="professional_ranking"]', c).val($(this).data("prorank")),$('input[name="class_ranking"]', c).val($(this).data("classrank")), $('input[name="professional_describe"]', c).val($(this).data("prodes")), $('input[name="tutor_name"]', c).val($(this).data("tutorname")), $('input[name="tutor_phone"]', c).val($(this).data("tutorphone")),U())
	}), ZS.obj.delegate("#upEduForm .mr_cancel", "click", function() {
		ZS.UpCancel(),$("#addCertificateForm").removeClass("dn")
	}), $("#addCertificateForm .mr_cancel").bind("click", function() {
		ZS.AddCancel()
	}),$("#addCertificateForm").validate({
			rules: ZS.rules,
			messages: ZS.messages,
			errorPlacement: function(a, b) {
				ZS.errorPlacement(a, b)
			},
			submitHandler: function(a) {
				var b = globals.resumeId,
					c = $('input[name="certificateName"]', a).val(),
					d = $('input[name="getDate"]', a).val(),
					e = $('textarea[name="certificateDes"]', a).val(),
					f = $('input[name="issuing"]', a).val(),
					g = globals.token;
				$(a).find(":submit").val("保存中...").attr("disabled", !0), $.ajax({
					url: ctx + "Resume/certificate",
					type: "post",
					data: {
						id: b,
						certificateName: c,
						getDate: d,
						certificateDes: e,
						issuing: f,
						resubmitToken: g,
					},
					dataType: "json"
				}).done(function(b) {
					var c, d, e, f, g, h, i, j, k, l , m, n, o, p, r;
					if(b.success){
						$("#show_no_edu").hide();
					}
					b.success ? (c = b.content.isOpenMyResume, d = $(".toggle"), e = b.content.firstOpen, globals.isFirstOpen = e, c && ($(".openresume_tip").hide(), globals.isFirstOpen ? (globals.isOpenResume = "3", $(".firstset").show()) : globals.isOpenResume = d.hasClass("toggle-off") ? "0" : "1"), W(b), globals.token = b.resubmitToken, S(a), updateResumeTime(b.content.refreshTime), f = b.content.infoCompleteStatus.score, g = parseInt($.trim($(".mr_bfb").text())), h = amountScore - g + f, updateRatioRM(f, h), ZS.obj.find(".mr_head_r").trigger("click"), i = b.content.educationExperiences, V(i), j = ZS.obj.find(".mr_empty_add"), j.not(":hidden") && j.hide(), k = $(".mr_module .flag_edu"), k.is(":hidden") || k.addClass("dn")) : alert(b.msg), $(a).find(":submit").val("保 存").attr("disabled", !1)
				})
			}
		}),
PX = {
		obj: $("#training"),
		rules: {
			schoolName: {
				required: !0,
				checkNum: !0,
				maxlenStr: 50,
				truename2: !0
			}
		},
		messages: {
			schoolName: {
				required: "必填",
				checkNum: "请输入有效的学校名称",
				maxlenStr: "请输入有效的学校名称",
				truename2: "请输入有效的学校名称"
			}
		},
		errorPlacement: function(a, b) {
			"hidden" == b.attr("type") ? ($(b).parent().css("margin-bottom", "20px"), a.appendTo($(b).parent())) : "button" == b.attr("type") ? a.appendTo($(b).parent()) : a.insertAfter($(b).parent())
		},
		clearError: function() {
			this.obj.find("span.error").hide(), this.obj.find("input.error").removeClass("error")
		},
		AddCancel: function() {
			$("#addTrainingForm").addClass("dn"), 0 == this.obj.find(".mr_jobe_list").length && this.obj.find(".mr_empty_add").show(), mb(), this.obj.find(".mr_head_r").removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"), d = "", f = !0
		},
		UpCancel: function() {
			mb(), $("#upEduForm").prev().show(), $("#upEduForm").remove(), d = "", f = !0
		}
	}, PX.obj.delegate(".mr_head_r", "click", function() {
		if (PX.clearError(), T(), "添加" == $(this).children("em").text()) {
			var b = PX.obj.find(".mr_empty_add");
			// "" == d && (b.not(":hidden") && b.hide(), 
				 $("#upEduForm").addClass("dn"), 
				d = "addTrainingForm", f = !1, $("#addTrainingForm").removeClass("dn"), kb()
				//$(this).removeClass("mr_add_grey").removeClass("mr_up_grey").addClass("mr_addup_cel").children("em").text("取消"))
		} else 0 == $("#schoolClub .mr_jobe_list").length && $("#schoolClub .mr_empty_add").show(), $("#addTrainingForm").addClass("dn"), mb(), $(this).removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"), d = ""
	}), PX.obj.delegate(".mr_empty_add", "click", function() {
		$(this).hide(), $("#schoolClub .mr_head_r").trigger("click")
	}), PX.obj.delegate(".mr_edit", "click", function() {
		var b, c;
		"" == d && (kb(), d = "upEduForm", f = !1, b = "", b = $("#edu_update_hide").html(), $("#addTrainingForm").addClass("dn"), $(this).parents(".mr_jobe_list").hide().after(b), Q(), R(), $(this).parents(".mr_jobe_list").next().attr("id", "upEduForm"), c = $("#upEduForm"), $("#eduId", c).val($(this).data("eduid")), $(".mr_del_ok", c).attr("data-id", $(this).data("eduid")), oMoudle.eduId = $(this).data("eduid"), $('input[name="schoolName"]', c).val($(this).data("schoolname")), $('input[name="positionName"]', c).val($(this).data("pro")), $('input[name="degree_text"]', c).val($(this).data("edu")), $('input[name="degree_val"]', c).val($(this).data("edu")), $('input[name="graduate_text"]', c).val($(this).data("date")), $('input[name="graduate"]', c).val($(this).data("date")),$('input[name="startYear"]', c).val($(this).data("startdate")),$('input[name="school_city"]', c).val($(this).data("schoolcity")), $('input[name="degree"]', c).val($(this).data("degree")), $('input[name="academy"]', c).val($(this).data("academy")) , $('input[name="major"]', c).val($(this).data("major")), $('input[name="gpa_score"]', c).val($(this).data("gpa")), $('input[name="professional_ranking"]', c).val($(this).data("prorank")),$('input[name="class_ranking"]', c).val($(this).data("classrank")), $('input[name="professional_describe"]', c).val($(this).data("prodes")), $('input[name="tutor_name"]', c).val($(this).data("tutorname")), $('input[name="tutor_phone"]', c).val($(this).data("tutorphone")),U())
	}), PX.obj.delegate("#upEduForm .mr_cancel", "click", function() {
		PX.UpCancel(),$("#addTrainingForm").removeClass("dn")
	}), $("#addTrainingForm .mr_cancel").bind("click", function() {
		PX.AddCancel()
	}),$("#addTrainingForm").validate({
			rules: PX.rules,
			messages: PX.messages,
			errorPlacement: function(a, b) {
				PX.errorPlacement(a, b)
			},
			submitHandler: function(a) {
				var b = globals.resumeId,
					c = $('input[name="trainingName"]', a).val(),
					d = $('textarea[name="trainingDes"]', a).val(),
					e = $('input[name="trainingCompany"]', a).val(),
					f = $('input[name="trainingPlace"]', a).val(),
					h = $('input[name="startDate"]', a).val(),
					i = $('input[name="endDate"]', a).val(),
					j = $('input[name="certificateName"]', a).val(),
					g = globals.token;
				$(a).find(":submit").val("保存中...").attr("disabled", !0), $.ajax({
					url: ctx + "Resume/trainingExperience",
					type: "post",
					data: {
						id: b,
						trainingName: c,
						trainingDes: d,
						trainingCompany: e,
						trainingPlace: f,
						startDate: h,
						endDate:i,
						certificateName:j,
						resubmitToken: g,
					},
					dataType: "json"
				}).done(function(b) {
					var c, d, e, f, g, h, i, j, k, l , m, n, o, p, r;
					if(b.success){
						$("#show_no_edu").hide();
					}
					b.success ? (c = b.content.isOpenMyResume, d = $(".toggle"), e = b.content.firstOpen, globals.isFirstOpen = e, c && ($(".openresume_tip").hide(), globals.isFirstOpen ? (globals.isOpenResume = "3", $(".firstset").show()) : globals.isOpenResume = d.hasClass("toggle-off") ? "0" : "1"), W(b), globals.token = b.resubmitToken, S(a), updateResumeTime(b.content.refreshTime), f = b.content.infoCompleteStatus.score, g = parseInt($.trim($(".mr_bfb").text())), h = amountScore - g + f, updateRatioRM(f, h), PX.obj.find(".mr_head_r").trigger("click"), i = b.content.educationExperiences, V(i), j = PX.obj.find(".mr_empty_add"), j.not(":hidden") && j.hide(), k = $(".mr_module .flag_edu"), k.is(":hidden") || k.addClass("dn")) : alert(b.msg), $(a).find(":submit").val("保 存").attr("disabled", !1)
				})
			}
		}),
		OT = {
		obj: $("#otherInfo"),
		rules: {
			schoolName: {
				required: !0,
				checkNum: !0,
				maxlenStr: 50,
				truename2: !0
			}
		},
		messages: {
			schoolName: {
				required: "必填",
				checkNum: "请输入有效的学校名称",
				maxlenStr: "请输入有效的学校名称",
				truename2: "请输入有效的学校名称"
			}
		},
		errorPlacement: function(a, b) {
			"hidden" == b.attr("type") ? ($(b).parent().css("margin-bottom", "20px"), a.appendTo($(b).parent())) : "button" == b.attr("type") ? a.appendTo($(b).parent()) : a.insertAfter($(b).parent())
		},
		clearError: function() {
			this.obj.find("span.error").hide(), this.obj.find("input.error").removeClass("error")
		},
		AddCancel: function() {
			$("#addOtherInfoForm").addClass("dn"), 0 == this.obj.find(".mr_jobe_list").length && this.obj.find(".mr_empty_add").show(), mb(), this.obj.find(".mr_head_r").removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"), d = "", f = !0
		},
		UpCancel: function() {
			mb(), $("#upEduForm").prev().show(), $("#upEduForm").remove(), d = "", f = !0
		}
	}, OT.obj.delegate(".mr_head_r", "click", function() {
		if (OT.clearError(), T(), "添加" == $(this).children("em").text()) {
			var b = OT.obj.find(".mr_empty_add");
			// "" == d && (b.not(":hidden") && b.hide(), 
				 $("#upEduForm").addClass("dn"), 
				d = "addOtherInfoForm", f = !1, $("#addOtherInfoForm").removeClass("dn"), kb()
				//$(this).removeClass("mr_add_grey").removeClass("mr_up_grey").addClass("mr_addup_cel").children("em").text("取消"))
		} else 0 == $("#schoolClub .mr_jobe_list").length && $("#schoolClub .mr_empty_add").show(), $("#addOtherInfoForm").addClass("dn"), mb(), $(this).removeClass("mr_add_grey").removeClass("mr_up_grey").removeClass("mr_addup_cel").children("em").text("添加"), d = ""
	}), OT.obj.delegate(".mr_empty_add", "click", function() {
		$(this).hide(), $("#schoolClub .mr_head_r").trigger("click")
	}), OT.obj.delegate(".mr_edit", "click", function() {
		var b, c;
		"" == d && (kb(), d = "upEduForm", f = !1, b = "", b = $("#edu_update_hide").html(), $("#addOtherInfoForm").addClass("dn"), $(this).parents(".mr_jobe_list").hide().after(b), Q(), R(), $(this).parents(".mr_jobe_list").next().attr("id", "upEduForm"), c = $("#upEduForm"), $("#eduId", c).val($(this).data("eduid")), $(".mr_del_ok", c).attr("data-id", $(this).data("eduid")), oMoudle.eduId = $(this).data("eduid"), $('input[name="schoolName"]', c).val($(this).data("schoolname")), $('input[name="positionName"]', c).val($(this).data("pro")), $('input[name="degree_text"]', c).val($(this).data("edu")), $('input[name="degree_val"]', c).val($(this).data("edu")), $('input[name="graduate_text"]', c).val($(this).data("date")), $('input[name="graduate"]', c).val($(this).data("date")),$('input[name="startYear"]', c).val($(this).data("startdate")),$('input[name="school_city"]', c).val($(this).data("schoolcity")), $('input[name="degree"]', c).val($(this).data("degree")), $('input[name="academy"]', c).val($(this).data("academy")) , $('input[name="major"]', c).val($(this).data("major")), $('input[name="gpa_score"]', c).val($(this).data("gpa")), $('input[name="professional_ranking"]', c).val($(this).data("prorank")),$('input[name="class_ranking"]', c).val($(this).data("classrank")), $('input[name="professional_describe"]', c).val($(this).data("prodes")), $('input[name="tutor_name"]', c).val($(this).data("tutorname")), $('input[name="tutor_phone"]', c).val($(this).data("tutorphone")),U())
	}), OT.obj.delegate("#upEduForm .mr_cancel", "click", function() {
		OT.UpCancel(),$("#addOtherInfoForm").removeClass("dn")
	}), $("#addOtherInfoForm .mr_cancel").bind("click", function() {
		OT.AddCancel()
	}),$("#addOtherInfoForm").validate({
			rules: OT.rules,
			messages: OT.messages,
			errorPlacement: function(a, b) {
				OT.errorPlacement(a, b)
			},
			submitHandler: function(a) {
				var b = globals.resumeId,
					c = $('textarea[name="selfIntro"]', a).val(),
					d = $('textarea[name="skill"]', a).val(),
					e = $('textarea[name="hobbies"]', a).val(),
					f = $('textarea[name="achievement"]', a).val(),
					h = $('textarea[name="profile"]', a).val(),
		
					g = globals.token;
				$(a).find(":submit").val("保存中...").attr("disabled", !0), $.ajax({
					url: ctx + "Resume/otherInfo",
					type: "post",
					data: {
						id: b,
						selfIntro: c,
						skill: d,
						hobbies: e,
						achievement: f,
						profile: h,
						
						resubmitToken: g,
					},
					dataType: "json"
				}).done(function(b) {
					var c, d, e, f, g, h, i, j, k, l , m, n, o, p, r;
					if(b.success){
						$("#show_no_edu").hide();
					}
					b.success ? (c = b.content.isOpenMyResume, d = $(".toggle"), e = b.content.firstOpen, globals.isFirstOpen = e, c && ($(".openresume_tip").hide(), globals.isFirstOpen ? (globals.isOpenResume = "3", $(".firstset").show()) : globals.isOpenResume = d.hasClass("toggle-off") ? "0" : "1"), W(b), globals.token = b.resubmitToken, S(a), updateResumeTime(b.content.refreshTime), f = b.content.infoCompleteStatus.score, g = parseInt($.trim($(".mr_bfb").text())), h = amountScore - g + f, updateRatioRM(f, h), OT.obj.find(".mr_head_r").trigger("click"), i = b.content.educationExperiences, V(i), j = OT.obj.find(".mr_empty_add"), j.not(":hidden") && j.hide(), k = $(".mr_module .flag_edu"), k.is(":hidden") || k.addClass("dn")) : alert(b.msg), $(a).find(":submit").val("保 存").attr("disabled", !1)
				})
			}
		})

}),
uploadFlag = 1,
window.setTimeout(function() {
    handleFrames()
}, 7e3),
openFlag = !0,
toggleHandler = function(a) {
    var b;
    a = a,
    b = $(a).find("input"),
    b.click(function() {
        openFlag && (openFlag = !1,
        "3" != globals.isOpenResume && "2" != globals.isOpenResume && (b.eq(1).is(":checked") ? switchResumeStatus(0, a, b) : switchResumeStatus(1, a, b)))
    }),
    $(a).hover(function() {
        $(".openresume_tip").toggleClass("dn")
    }, function() {
        $(".openresume_tip").toggleClass("dn")
    }),
    $("#openResumeStatus .btn").click(function() {
        switchResumeStatus(0, a, b)
    })
}
,
$(document).ready(function() {
    var a = $(".openresume_tip");
    "3" == globals.isOpenResume && (a.hide(),
    $(".firstset").show()),
    $(".toggle").each(function(a, b) {
        toggleHandler(b)
    }),
    $(".openresume_tip i").bind("click", function(a) {
        a.stopPropagation,
        $(this).parent().hide()
    }),
    $(".toggle").mouseover(function() {
        switch (globals.isOpenResume) {
        case "2":
            $(".unopen").show();
            break;
        case "3":
            $(".firstset").show()
        }
    })
});
