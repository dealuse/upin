<?php include template("biz_html_header");?>
<script type="text/javascript" src="/static/js/xheditor/xheditor.js"></script>
<div id="hdw">
	<div id="hd">
		<div id="logo"><a href="/index.php" class="link" target="_blank"><img src="/static/css/i/logo.gif" /></a></div>
		<div class="guides">
			<div class="city">
				<h2>商户后台</h2>
			</div>
		</div>
		<ul class="nav cf"><?php echo current_biz(); ?><?php if(is_partner()){?><li><a id="verify-coupon-id" href="javascript:;">消费登记</a></li><?php }?></ul>
		<?php if(is_partner()){?>
		<div class="logins">
			<ul class="links">
				<li class="username" style="color:#ffffff">欢迎您，<?php echo $login_partner['title']; ?>！</li>
				<li class="logout"><a href="/biz/logout.php">退出</a></li>
			</ul>
			<div class="line islogin"></div>
		</div>
		<?php }?>
	</div>
</div>

<?php if($session_notice=Session::Get('notice',true)){?>
<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">关闭</span></div></div> 
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">关闭</span></div></div> 
<?php }?>
<div style="padding:5px 10px;color: black;font-weight: bold;font-size: 12px; margin:5px auto;text-align: center; width:925px;border: black 2px solid; background:#FC3">亲爱的优品会商家,自2012年12月4日起,本系统已取消券密码,并将券编号由9位升至12位,您验证时只需输入券号即可.谢谢您的配合!</div>