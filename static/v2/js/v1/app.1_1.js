$(function() {
    $("img.index-item-img").lazyload({
        effect: "fadeIn"
    });
    $('.alertNotice').slideDown(300);
    $('.alertNotice em.close').click(function() {
        $('.alertNotice').slideUp("fast");
    });
    //IE
    if (window.PIE) {
        $('#search,.new-order-right .my-grow section p.wrapper span.wrapper strong,#buyNow').each(function() {
            PIE.attach(this);
        });
    }
    //帮助中心
    $('#help,.help ul').mouseover(function() {
        $(this).siblings('ul').show();
    });
    $('.help ul').mouseover(function() {
        $(this).show();
    });
    $('#help').mouseleave(function() {
        $(this).siblings('ul').hide();
    });
    $('.help ul').mouseleave(function() {
        $(this).hide();
    });
    //我的爱拼
    $('.myAP').mouseover(function() {
        $(this).css('border-bottom', '0');
        $('.user_box').show();
    });
    $('.user_box').mouseover(function() {
        $('.myAP').css('border-bottom', '0');
        $(this).show();
    });
    $('.myAP,.user_box').mouseleave(function() {
        $('.myAP').css('border-bottom', '1px solid #ddd');
        $('.user_box').hide();
    });
    //分类导航
    if ($("#list ul li a.img p").length > 0) {
        $('#list ul li').hover(
                function() {
                    $($(this).find('p.v2-hotarea')).stop().fadeIn(300);
                },
                function() {
                    $($(this).find('p.v2-hotarea')).stop().fadeOut(300);
                }
        );
    }
    //回到顶部
    $("#backToTop").click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 300);
        return false;
    });
    //城市字母
    $(".clist div").mouseover(function() {
        $(this).children("span").css("border-color", "#fe872b").css("background", "#fe872b").css("color", "#fff");
    });
    $(".clist div").mouseleave(function() {
        $(this).children("span").css("border-color", "#e1e1e1").css("background", "#f4f4f4").css("color", "#666");
    });
    //历史浏览
    var strCookie = document.cookie;
    var arrCookie = strCookie.split('; ');
    var historyItem;
    var count = 0;
    for (var i = 0; i < arrCookie.length; i++) {
        var arrHistory = arrCookie[i].split('=');
        if ('itemHistory' == arrHistory[0]) {
            historyItem = eval('(' + decodeURIComponent(arrHistory[1]) + ')');
            for (var key in historyItem) {
                count++;
                if (count == 5) {
                    $('#item-history').append('<li class="last"><a href="/team/' + historyItem[key].i + '.html" title="' + historyItem[key].n + '"><img src="' + historyItem[key].u + '"></a></li>');
                } else {
                    $('#item-history').append('<li><a href="/team/' + historyItem[key].i + '.html" title="' + historyItem[key].n + '"><img src="' + historyItem[key].u + '"></a></li>');
                }
            }
            break;
        }
    }
    //评论检测
    //<div class="mtips alertNotice" style="position:relative;" id="successTips">
    //<em class="close">close</em>
    //</div>
    /*
    $.getJSON('/ajax/CheckComment.php', function(data) {
        if (data.state == 'Y')
            $('#mainNav').after('<div class="mtips alertNotice" style="position:relative;" id="comment-top-msg"></div>');
        $('<p>您的 ' + data.title + ' 还未评价，<a href="/user/comment/">评价即得' + data.sore + '积分奖励</a></p>').appendTo('#comment-top-msg');
        $('<em class="close">close</em>').appendTo('#comment-top-msg').click(function() {
            $('.alertNotice').slideUp("fast");
        });
        $('#comment-top-msg').slideDown(10);
    })
    //未知

    */
    $("li.ulist").hover(function() {
        $(this).addClass('hover');
        $('#uc ul').show();
    }, function() {
        $('#uc ul').hide();
        $(this).removeClass('hover');
    });
});
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 280) {
        $('#backToTop').css('display', 'block');
    }
    if (scroll < 280) {
        $('#backToTop').css('display', 'none');
    }
});
//评论
function commentPage(obj, act) {
    var url = '/team_new/comment.php?team_id=' + teamId;
    if (!act) {
        url = $(obj).attr('url');
        $('body,html').animate({scrollTop: $("#discuss").offset().top}, 400);
    }
    $('#comment-body').html('<img style="margin:0 0 20px 300px;" src="/static/v2/img/comment-loading.gif" />');
    $.getJSON(url, function(res) {
        if (res == 'nocomment') {
            $('#comment-body').html('');
        } else {
            $('#comment-page').html(res.page);
            $('#comment-body').html('');
            var html;
            for (var i in res.comment) {
                if (i == 0) {
                    html = '<li class="first">';
                } else {
                    html += '<li>';
                }
                html += '<p class="wrapper mb5">';
                html += '<span class="discuss-list-username fl wrapper">';
                html += '<span>' + res.comment[i].username + '</span>';
                html += '<span class="discuss-time"> ' + res.comment[i].time + '</span>';
                html += '</span>';
                html += '<span class="wrapper discuss-stars discuss-star' + res.comment[i].grade + '">';
                html += '<span class="discuss-star-1"></span>';
                html += '<span class="discuss-star-2"></span>';
                html += '<span class="discuss-star-3"></span>';
                html += '<span class="discuss-star-4"></span>';
                html += '<span class="discuss-star-5"></span>';
                html += '</span>';
                html += '</p>';
                html += '<p>' + res.comment[i].content + '</p>';
                html += '</li>';
            }
            $('#comment-body').html(html);
        }
    })
}
//百度一站通
function getUserInfo(res) {
    if (res.uid) {
        var uid = res.uid;
        var uname = res.uname;
        var timestamp = res.timestamp;
        var sign = res.sign;
        //alert(uname);
        $.ajax({
            type: "GET",
            url: "/thirdpart/baidu/ajax.php",
            dataType: "json",
            data: "uid=" + uid + "&uname=" + encodeURI(uname) + "&timestamp=" + timestamp + "&sign=" + sign + "&t=" + Math.random(),
            success: function(msg) {
                if (msg.status) {
                    if (msg.status == 'suc') {
                        $('#login-1').html(msg.act01);
                        $('#login-2').html(msg.act02);
                        $('#login-3').html(msg.act03);
                        $('#login-bottom-1').html(msg.actBottom01);
                    } else if (msg.status == 'log') {
                        window.location.href = '/order/index.php';
                    }
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('请求出错!')
            }
        });
    }
}
//关闭提示
function hidetips() {
    jQuery.ajax({
        url: "/ajax/hidetips",
        type: 'post'
    });
    $("#errorTips").hide();
    $("#successTips").hide();
}
//加入收藏
jQuery.addFavorite = function(sURL, sTitle) {
    try {
        window.external.addFavorite(sURL, sTitle);
    } catch (e) {
        try {
            window.sidebar.addPanel(sTitle, sURL, "");
        } catch (e) {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}
//v3导航
$(function() {
    var navTimeA, navTimeB;
    $('#mainNav .v3-mainNav').hover(function() {
        clearTimeout(navTimeA);
        clearTimeout(navTimeB);
        if ($(this).attr('data-lock') == 'locked') {
            return true;
        }
        var obb = this;
        navTimeA = setTimeout(function() {
            $(obb).children('.v3-mainNav-all').addClass('v3-mainNav-all-hover').end().children('section').addClass('hover');
        }, 150)
    }, function() {
        clearTimeout(navTimeA);
        clearTimeout(navTimeB);
        if ($(this).attr('data-lock') == 'locked') {
            navTimeB = setTimeout(function() {
                $('#mainNav .v3-mainNav li.pr').children('div').css('display', 'none');
            }, 380)
            return true;
        }
        var obb = this;
        navTimeB = setTimeout(function() {
            $(obb).children('.v3-mainNav-all').removeClass('v3-mainNav-all-hover').end().children('section').removeClass('hover');
            $('#mainNav .v3-mainNav li.pr').children('div').css('display', 'none');
        }, 380)
    });
    $('#mainNav .v3-mainNav li.pr').mouseover(function() {
        $(this).children('div').css('display', 'block').end().siblings().children('div').css('display', 'none');
    });
    $('#mainNav .v3-mainNav li.pr').mouseout(function() {
        setTimeout(function() {
            $(this).children('div').css('display', 'none');
        }, 380)
    });
    $('#mainNav .v3-mainNav li.pr').hover(function() {
        $(this).children('.v2-mainNav-title').addClass('v2-mainNav-hover');
    }, function() {
        $(this).children('.v2-mainNav-title').removeClass('v2-mainNav-hover');
    });
});
//v3轮播
$(function() {
    var sWidth = $("#focus").width();
    var len = $("#focus ul li").length;
    var index = 0;
    var picTimer;

    var btn = "<div class='btnBg'></div><div class='btn'>";
    for (var i = 0; i < len; i++) {
        btn += "<span></span>";
    }
    btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
    $("#focus").append(btn);
    $("#focus .btnBg").css("opacity", 0.5);

    $("#focus .btn span").css("opacity", 0.4).mouseenter(function() {
        index = $("#focus .btn span").index(this);
        showPics(index);
    }).eq(0).trigger("mouseenter");

    $("#focus .preNext").css("opacity", 0.2).hover(function() {
        $(this).stop(true, false).animate({"opacity": "0.5"}, 300);
    }, function() {
        $(this).stop(true, false).animate({"opacity": "0.2"}, 300);
    });

    $("#focus .pre").click(function() {
        index -= 1;
        if (index == -1) {
            index = len - 1;
        }
        showPics(index);
    });

    $("#focus .next").click(function() {
        index += 1;
        if (index == len) {
            index = 0;
        }
        showPics(index);
    });

    $("#focus ul").css("width", sWidth * (len));

    $("#focus").hover(function() {
        clearInterval(picTimer);
    }, function() {
        picTimer = setInterval(function() {
            showPics(index);
            index++;
            if (index == len) {
                index = 0;
            }
        }, 4000);
    }).trigger("mouseleave");

    function showPics(index) {
        var nowLeft = -index * sWidth;
        $("#focus ul").stop(true, false).animate({"left": nowLeft}, 300);
        $("#focus .btn span").stop(true, false).animate({"opacity": "0.4"}, 300).eq(index).stop(true, false).animate({"opacity": "1"}, 300);
    }
});