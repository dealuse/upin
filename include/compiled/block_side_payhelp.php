<div class="sbox">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="cardcode">
		<?php 
		$INI['system']['siteame'] = '优品会';
		; ?>
			<h3>需要帮助？</h3>
			<a href="javascript:void(0);" id="noonlinebank" class="clicklink">没有Paypal如何购买？</a>
			<p id="noonlinebank-t" class="act" style="display: block;">
				请选择Paypal支付，在打开的页面上点击 Don't have a PayPal account? 输入信用卡和个人信息，完成付款后，回到之前的页面，点击”我已完成付款“，就可以了，下一次可以使用同样的个人信息直接登录Paypal，免去注册。
			</p>
			<a href="javascript:void(0);" id="nopay" class="clicklink">付款后，<?php echo $INI['system']['siteame']; ?>订单仍显示"未付款"怎么办？</a>
			<p id="nopay-t" class="act">
				可能是由于支付的数据没有即时传输，请您不要担心，稍后刷新页面查看。如较长时间仍显示未付款，可联系<?php echo $INI['system']['siteame']; ?>客服(604-655-8658)为您解决。
			</p>
			<a href="javascript:void(0);" id="payfaild" class="clicklink">Paypal支付失败怎么办？</a>
			<p id="payfaild-t" class="act">
				如有由于网络中断，或页面过期、超时、错误等问题导致支付失败，请先确认是否已经扣款，如未扣款可尝试再支付一次。或者，您可以联系您的银行查看一下是否信用卡无效。
			</p>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>