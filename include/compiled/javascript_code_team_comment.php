<script type="text/javascript">
    $(function() {
        commentPage(null, true);
        $.getJSON('/team_new/commentCount.php?team_id=' + teamId, function(res) {
            if (res.total <= 0) {
                $('#v2-comment').html('<div class="item-details-discuss-nocomment">本单暂无评价!</div>');
            } else {
                $('#v2-comment-point').text(res.average);
                $('#v2-comment-point-dis').css({width: res.average_display + '%'});
                $('#v2-comment-count').text(res.total);
                $('#v2-comment-grade-A-dis').css({width: res.grade_display.A + '%'});
                $('#v2-comment-grade-B-dis').css({width: res.grade_display.B + '%'});
                $('#v2-comment-grade-C-dis').css({width: res.grade_display.C + '%'});
                $('#v2-comment-grade-D-dis').css({width: res.grade_display.D + '%'});
                $('#v2-comment-grade-E-dis').css({width: res.grade_display.E + '%'});
                $('#v2-comment-grade-A').text(res.grade.A + '人');
                $('#v2-comment-grade-B').text(res.grade.B + '人');
                $('#v2-comment-grade-C').text(res.grade.C + '人');
                $('#v2-comment-grade-D').text(res.grade.D + '人');
                $('#v2-comment-grade-E').text(res.grade.E + '人');
            }
        })
    })
</script>