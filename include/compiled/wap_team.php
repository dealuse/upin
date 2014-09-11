
<?php include template("wap_header");?>

<nav class="nav">
	<a href="index.php" class="back">返回</a>
   	<div class="position">团购详情</div>	
   	 <?php if($login_user_id){?>
   <a href="my.php" class="me"></a>	
	<?php } else { ?>
    <a href="login.php" class="login_wap">登陆</a>
   <?php }?>
</nav>
<article class="detail">
	<div><img src="<?php echo team_image($team['image'], true); ?>" width="100%"></div>
	<div class="buy clearF">
		<strong><?php echo $currency; ?><?php echo moneyit($team['team_price']); ?></strong><del><?php echo $currency; ?><?php echo moneyit($team['market_price']); ?></del>
		<a href="buy.php?id=<?php echo $team['id']; ?>" class="buyBtn">立即购买</a>
	</div>
	<div class="detail_title"><?php echo mb_substr($team['title'],0,16);; ?></div>
	<div class="detail_desc">
		仅售188元！价值348元的的东方明珠含263米上球体+259米世博悬空透明观光廊＋零米大厅老上海蜡像陈列馆+中华号全透明豪华浦江观光游船90分钟+至尊品臻餐食1份（黄浦江游船上最好的套餐.需电话确认餐位）自由行顶级套票一套，节假日通用，午餐晚餐任君选择！美人美食美景，一个都不少！华灯初上，后世博余音绕梁，当黄埔江两岸霓虹闪烁、东方明珠灯光秀配上悠扬的音乐即将奏响华丽的上海之夜。 
	</div>
	<div class="h_info">团购详情</div>
	<div class="h_info_con">
		<div class="remind">
			<span style="color:#2F2F2F;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;">★团购券有效期为：当天买当天即可使用，有效期2014年08月21日至2014年9月30日</span><br>
			<span style="color:#2F2F2F;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;">★团购券过期作废</span><br>
			<span style="color:#2F2F2F;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;">★本次团购不限购，本单不含小费，小费请最低按照团购价的10%支付</span><br>
			<span style="color:#2F2F2F;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;">★不可兑换现金</span><br>
			<span style="color:#2F2F2F;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;">★必须预约，商家电话会在团购购买成功后，在团购卷上显示（本店有大量免费停车位）</span><br>
			<span style="color:#2F2F2F;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;">★地址：#205 1668 WestBroadway,Vancouver , BC, Canada（在Pine Street 和 Fir Street之间，本店有大量免费停车位）</span><br>
			<span style="color:#2F2F2F;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;">★营业时间：11:00am-15:00pm，17:00 pm -22:00pm</span><br>
			<span style="color:#2F2F2F;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;">★更多信息请关注新浪微博</span><br>
		 </div>
		 <p class="info_pic">项目介绍</p>
		 <div class="info_pic_con">
			<p>
			<img alt="" src="http://www.dealuse.com/static/js/kindeditornew/php/../attached/image/20140821/20140821063403_75799.jpg" data-bd-imgshare-binded="1">
			</p>
			<p>
			<img alt="" src="http://www.dealuse.com/static/js/kindeditornew/php/../attached/image/20140821/20140821063447_71419.jpg" data-bd-imgshare-binded="1">
			<img alt="" src="http://www.dealuse.com/static/js/kindeditornew/php/../attached/image/20140821/20140821063448_45251.jpg" data-bd-imgshare-binded="1">
			<img alt="" src="http://www.dealuse.com/static/js/kindeditornew/php/../attached/image/20140821/20140821063449_59831.jpg" data-bd-imgshare-binded="1">
			</p>
		 </div
	<div class="h_info">看了此团购的人也看了</div>
	<div class="relevance">
		<div>
			<a href="#" class="dl">
				<img src="../static/theme/wap_default/images/groups/1.jpg" />
				<ul class="dd">
					<li class="title">国际饭店西饼屋</li>
					<li class="desc">[人民广场]原味蝴蝶酥1份，精致美味，幸福滋味</li>
					<li class="price"><strong>$70.5</strong> <del>$450</del> <span>21人已买</span></li>
				</ul>
			</a>
		</div>			
	
		<div>
			<a href="#" class="dl">
				<img src="../static/theme/wap_default/images/groups/2.jpg" />
				<ul class="dd">
					<li class="title">东方明珠自助游套票</li>
					<li class="desc">[上海]东方明珠+历史陈列馆+浦江游套票，畅玩无限</li>
					<li class="price"><strong>$350</strong> <del>$800</del> <span>231人已买</span></li>
				</ul>
			</a>
		</div>
	
	</div>
	
</article>


<?php include template("wap_footer");?>
