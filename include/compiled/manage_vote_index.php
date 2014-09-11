<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="help">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_vote('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>首页 </h2>
				</div>
                <div class="sect">
					<div class="wholetip clear"><h3>反馈数据</h3></div>
					<div style="margin:0 20px;">
						<p>今日接受调查人次：<?php echo $vote_feedback_today_count; ?></p>
						<p>全部接受调查人次：<?php echo $vote_feedback_all_count; ?></p>
					</div>

					<div class="wholetip clear"><h3>问题数据</h3></div>
					<div style="margin:0 20px;">
						<p>正在调查问题数：<?php echo $vote_question_show_count; ?></p>
						<p>全部调查问题数：<?php echo $vote_question_all_count; ?></p>
					</div>
				</div>
			</div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
