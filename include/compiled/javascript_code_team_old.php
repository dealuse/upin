<script type="text/javascript">
    (function(){
        $(window).scroll(function() {
            var scrolls = $(this).scrollTop();
            if (scrolls > 842){
                $(".deal_tools").show();
            } else{
                $(".deal_tools").hide();
            }
        })
        $(function(){
            $('#to_xqlist').click(function(){
                $('body,html').animate({scrollTop: $('.xq').offset().top}, 200);
            })
            $('#to_pingjia').click(function(){
                $('body,html').animate({scrollTop: $(".soll-comment").offset().top-38}, 200);
            })
            $('#to_shouhou').click(function(){
                $('body,html').animate({scrollTop: $("#side-business").offset().top-38}, 200);
            })
            $('#to_shouhou2').click(function(){
                $('body,html').animate({scrollTop: $(".gouwuwuyou").offset().top-38}, 200);
            })
            $("#peisong").click(function() {
                $("div.tab_box").show();
                $("#ev56_main_side").hide();
                $("div.ju-qc-main").hide();
                $("#itemxq").removeClass("cur");
                $(this).addClass("cur");
                $('body,html').animate({scrollTop: $('.xq').offset().top}, 200);
            })
            $("#peisong2").click(function() {
                $("div.tab_box").show();
                $("#ev56_main_side").hide();
                $("div.ju-qc-main").hide();
                $("#itemxq").removeClass("cur");
                $(this).addClass("cur");
                $('body,html').animate({scrollTop: $('.xq').offset().top}, 200);
            })
            $("#itemxq").click(function() {
                $("div.tab_box").hide();
                $("#ev56_main_side").show();
                $("div.ju-qc-main").show();
                $("#peisong").removeClass("cur");
                $(this).addClass("cur");
            })
            $("#to_xqlist").click(function() {
                $("div.tab_box").hide();
                $("#ev56_main_side").show();
                $("div.ju-qc-main").show();
                $("#peisong").removeClass("cur");
                $(this).addClass("cur");
            })
        })
    })()
</script>
<script>
    //var nowDate = <?php echo $now; ?>000;
    //var endDate = new Date(Date.parse("<?php echo date('Y-m-d H:i:s', $team['end_time']); ?>".replace(/-/g,"/")));
    //var remainTime = endDate.getTime()-nowDate;
    var remainTime = <?php echo $diff_time; ?>000;
            window.setInterval(function() {
        remainTime = remainTime - 1000;
        var leftsecond = parseInt(remainTime / 1000);
        var day1 = Math.floor(leftsecond / (60 * 60 * 24));
        var hour = Math.floor((leftsecond - day1 * 24 * 60 * 60) / 3600);
        var minute = Math.floor((leftsecond - day1 * 24 * 60 * 60 - hour * 3600) / 60);
        var second = Math.floor(leftsecond - day1 * 24 * 60 * 60 - hour * 3600 - minute * 60);
        if (day1 > 0) {
            $("#deal-timeleft").html("<i>" + day1 + "</i>天<i>" + hour + "</i>小时<i>" + minute + "</i>分<i>" + second + "</i>秒");
        }
        else {
            if (hour == 0 && minute == 0 && second == 0) {
                $.ajax({
                    type: "GET",
                    url: "/cache/all",
                    async: false,
                    success: function() {
                        setTimeout('window.location.href="/team"', 1000);
                    }
                });
            }
            else {
                $("#deal-timeleft").html("<i>" + hour + "</i>小时<i>" + minute + "</i>分<i>" + second + "</i>秒");
            }
        }
    }, 1000);
</script>
<script type="text/javascript">
    function gotoPage(page, init) {
        var ctimes;
        if (!$("#ctime").val()) {
            ctimes = 0;
        } else {
            ctimes = $("#ctime").val();
        }
        $.getJSON("/team/ajaxtest2.php", {
            page: page,
            id: <?php echo $team['id']; ?>,
            time: ctimes
        }, function(data) {
            if (data.yorno == 1) {
                //$("#COMMENT_RESULT").empty().append('<div style="background: url(\'<?php echo $INI['system']['cdnprefix']; ?>/static/img/nocomments.gif\') no-repeat scroll 0% 0% transparent; height: 56px; margin: 0 auto; color: rgb(102, 102, 102); font-weight: bold; font-size: 19px; padding-left: 65px; padding-top: 20px;width:250px;"> 对不起,暂时没有评论。</div>');
                $("#COMMENT_RESULT").empty();
            } else {
                //渲染，并填充$("#COMMENT_RESULT")
                $temp = $("<ul></ul>");
                $.each(data.one, function(idx, item) {
                    $temp.append("<li><div class='share_content'><p><strong>" + item.username + "</strong></p><p>" + item.comment_content + "</p></div><span>好评</span></li>");
                });
                $temp.find('li:last').addClass('end');
                //添加分页按钮
                $pagerTemp =
                        '<div class="pager1">' +
                        '<a href="javascript:gotoPage(' + (page - 1) + ');">上一页</a>' +
                        '<a href="javascript:gotoPage(' + (page + 1) + ');">下一页</a>' +
                        '</div>';
                $("#COMMENT_RESULT").empty().append($temp).append($pagerTemp);
            }
        });
        if (!init)
            $("html,body").animate({
                scrollTop: $(".point_rank").offset().top - 100
            }, 1000);
    }
    $(function() {
        gotoPage(1, true);
    });
</script>