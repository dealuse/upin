<?php include template("header");?>
<style type="text/css">
#maillist .sect{padding:10px 23px 22px;width:auto;height:277px;}
#maillist .enter-address{margin-top:20px;padding:15px 20px 30px;background:#FDFEEE;border:1px solid #F3D3C4;}
#maillist .intro{margin-top:30px;}
#maillist .enter-address-c{float:left;margin-top:22px;font-size:12px;}
#maillist .enter-address-c label{display:block;padding-bottom:5px;}
#maillist .enter-address-c .mail{float:left;width:310px;padding-left:50px;}
#maillist .enter-address-c .f-mail{width:250px;}
#maillist .enter-address-c .city{float:left;width:300px;}
#maillist .enter-address-c .f-city{width:175px;}
#maillist .enter-address-c .f-cityname{width:175px;}
#maillist .enter-address-c span.tip{display:block;padding-top:5px;color:#7C7A7D;}
#maillist .side-pic p{line-height:1;padding-bottom:10px;}
#maillist .succ{padding:10px 0;}
#maillist .unsubscribe{margin-top:20px;}
#maillist .unsubscribe label{display:block;}
#maillist .welcome-notice{padding:0;}
#maillist .welcome-title{color:#c33;font-size:16px;font-weight:bold;}
#maillist .recent-title{margin-top:25px;}
#maillist .recent-title h2{font-size:2em;}
#maillist .welcome .sect{height:auto;}
#maillist .welcome .deals-list{margin-top:15px;}
#maillist .welcome .deals-list li{clear:both;}
#maillist .welcome .deals-list li.last{padding-top:30px;zoom:1;}
#maillist .welcome .pic{float:left;width:215px;margin-right:18px;_display:inline;}
#maillist .welcome .info{float:left;width:410px;}
#maillist .welcome .price{margin-top:10px;*margin-top:6px;padding:5px 15px;background:#E1F4FA;font-size:12px;}
#maillist .welcome .price strong{font-size:14px;}
#maillist .welcome .price strong.count{font-size:16px;}
#maillist .welcome .price strong.count .number{font-size:20px;color:#c33;}
#maillist .welcome .detail{margin-top:8px;color:#666;font-size:12px;}
#maillist .city{padding:24px 0 0 40px}
#maillist select{margin-bottom:0px}
</style>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="maillist">
	<div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content welcome">
				<div class="head">
					 <h2>邮件订阅</h2>
				</div>
                <div class="sect">
					<div class="lead"><h4>把<?php echo $city['name']; ?>每天最新的精品团购信息发到您的邮箱。</h4></div>
					<div class="enter-address">
						<p>立即邮件订阅每日团购信息，不错过每一天的惊喜。</p>
						<div class="enter-address-c">
						<form id="enter-address-form" action="/subscribe.php" method="post" class="validator">
						<div class="mail">
							<label>邮件地址：</label>
							<input id="enter-address-mail" name="email" class="f-input f-mail" type="text" value="<?php echo $login_user['email']; ?>" size="20" require="true" datatype="email" />
							<span class="tip">请放心，我们和您一样讨厌垃圾邮件</span>
						</div>
						<div class="city">
							<select name="city_id" class="f-city"><?php echo Utility::Option(Utility::OptionArray($allcities, 'id', 'name'), $city['id']); ?></select>
							<input id="enter-address-commit" type="submit" class="formbutton" value="订阅" />
						</div>
						</form>
					</div>
					<div class="clear"></div>
				</div>
				<div class="intro">
					<p>每日精品团购包括：</p>
					<p>餐厅、酒吧、KTV、SPA、美发、健身、瑜伽、演出、影院等。</p>
				</div>
			</div>
		</div>
		<div class="box-bottom"></div>
	</div>
</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
