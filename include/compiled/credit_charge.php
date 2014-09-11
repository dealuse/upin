<?php include template("header");?>
<style type="text/css">
    .typelist .paypal{
        background-image:url(/static/css/i/paypal.png);
        background-repeat: no-repeat;
        height: 70px;
    }
</style>
<div class="wrap new-order">
	<div class="fl" style="width:700px">
        
<div class="uleft c3" id="uleft_ev56">
            <h2 id="uctit" style="display:none">用户中心</h2>
            <h3 style="display:none">交易管理</h3>
            <ul class="wrapper">
                <li style="height: 0;display: none;"><img src="/static/theme/ev56_58/css/img/express.png" style="position: relative;left: 95px;top: 9px;"></li>
                <?php echo current_account('/credit/charge.php'); ?></ul>
            <h3 style="display:none">咨询与售后</h3>
            <ul style="display:none">
                <li><a href="/feedback/suggest.php">咨询/投诉</a></li>
                <li><a href="/feedback/seller.php">商务合作</a></li>
                <li><a href="/team/comments.php">买家点评</a></li>
            </ul>
            <a class="faq" href="/help/faqs.php" target="_blank" style="display:none">常见问题&gt;&gt;</a>
        </div> 
          <div class="uright" id="account-charge">
            <div class="utit">
                <ul>
                    <li><a href="/account/settings.php">帐户设置</a></li>
                    <li><a href="/credit/index.php">交易记录</a></li>
                    <li class="current"><a href="/credit/charge.php">账户充值</a></li>
                </ul>
                <h2>账户充值</h2>
            </div>
    <div class="sect" id="credit">

                    <div class="credit-title" style="height:54px">
                    <p class="wrapper mb10">
                        <span>当前的账户余额是</span><strong><?php echo moneyit($user['money']); ?></strong><span>元</span><?php if(moneyit($user['money']) > 0){?><a class="withdraw" href="/credit/withdraw.php">&lt;&lt;提现</a><?php }?>
                    </p>
                    <p class="wrapper">
                        <span>充值卡充值</span>
                        <a id="credit-card-link" class="hide" href="javascript:;">点击输入充值卡密码</a>
                    </p>
                   
                
               </div>
                    <div class="charge">
                    	<br/>
                        <form id="account-charge-form" action="/order/charge.php" method="post" class="validator">
                            <p>请输入充值金额：</p>
                            <p class="number">
                                $ <input type="text" maxlength="6" class="f-text" name="money" require="true" datatype="money" value="<?php echo $money; ?>" /> （不支持小数，最低$10.）
                            </p>
                            <p id="account-charge-tip" class="tip" style="visibility:hidden;"></p>
                            <div class="choose">
                                <p class="choose-pay-type">请选择支付方式：</p>
                                <ul class="typelist">
								<?php if($_SESSION['ali_token']){?>
								        <li><input id="check-alipay" type="radio" name="paytype" value="alipay" <?php echo $ordercheck['alipay']; ?> /><label for="check-alipay" class="alipay">支付宝交易，推荐淘宝用户使用</label></li>
                                 <?php } else { ?>
									<?php if($INI['paypal']['mid']){?>
										<li><input id="check-paypal" type="radio" name="paytype" value="paypal" checked="checked" /><label for="check-paypal" class="paypal"></label></li>
									<?php }?>
									<?php if($INI['alipay']['mid']){?>
										<li><input id="check-alipay" type="radio" name="paytype" value="alipay" <?php echo $ordercheck['alipay']; ?> /><label for="check-alipay" class="alipay">支付宝交易，推荐淘宝用户使用</label></li>
									<?php }?>
									<?php if($INI['tenpay']['mid']){?>
										<li><input id="check-tenpay" type="radio" name="paytype" value="tenpay" <?php echo $ordercheck['tenpay']; ?> /><label for="check-tenpay" class="tenpay">财付通交易，推荐QQ用户使用</label></li>
									<?php }?>
                                                                                                           <?php if($INI['sdopay']['mid']){?>
										<li><input id="check-sdopay" type="radio" name="paytype" value="sdopay" <?php echo $ordercheck['sdopay']; ?> /><label for="check-sdopay" class="sdopay">盛付通交易，推荐盛大一卡通用户使用</label></li>
									<?php }?>
									<?php if($INI['yeepay']['mid']){?>
										<li><input id="check-bill" type="radio" name="paytype" value="yeepay" <?php echo $ordercheck['bill']; ?> /><label for="check-yeepay" class="yeepay">易宝支付</label></li>
									<?php }?>
									<?php if($INI['bill']['mid']){?>
										<li><input id="check-bill" type="radio" name="paytype" value="bill" <?php echo $ordercheck['bill']; ?> /><label for="check-bill" class="bill">快钱交易</label></li>
									<?php }?>
									<?php if($INI['chinabank']['mid']){?>
										<li><input id="check-chinabank" type="radio" name="paytype" value="chinabank" <?php echo $ordercheck['chinabank']; ?> /><label for="check-chinabank" class="chinabank">支持招商、工行、建行、中行等主流银行的网银支付</label></li>
									<?php }?>
                                                                                                           <?php if($INI['cmpay']['mid']){?>
										<li><input id="check-cmpay" type="radio" name="paytype" value="cmpay" <?php echo $ordercheck['cmpay']; ?> /><label for="check-cmpay" class="cmpay">手机号就是您的支付账户，中国移动为您提供随时随地随身的支付服务！</label></li>
									<?php }?>
                                    <?php if($INI['gopay']['mid']){?>
										<li><input id="check-gopay" type="radio" name="paytype" value="gopay" <?php echo $ordercheck['gopay']; ?> /><label for="check-gopay" class="gopay">国家级电子支付平台，超低费率，安全保证。</label></li>
									<?php }?>
                                </ul>

		<?php if($INI['tenpay']['mid']&&'Y'==$INI['tenpay']['direct']){?>
					<div id="paybank">
						<?php if(is_array($paybank)){foreach($paybank AS $one) { ?>
						<p><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $one; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></p>
						<?php }}?>
					</div>  
		<?php }?>

		<?php if($INI['sdopay']['mid']&&'Y'==$INI['sdopay']['direct']&&'N'==$INI['tenpay']['direct']){?>
					<div id="paybank">
						<?php if(is_array($sdopaybank)){foreach($sdopaybank AS $one=>$sid) { ?>
						<p><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $sid; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></p>
						<?php }}?>
					</div>  
		<?php }?>

		<?php if($INI['yeepay']['mid']&&'Y'==$INI['yeepay']['direct']&&'N'==$INI['tenpay']['direct']&&'N'==$INI['sdopay']['direct']){?>
					<div id="paybank">
						<?php if(is_array($yeepaybank)){foreach($yeepaybank AS $one=>$pid) { ?>
						<p><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $pid; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></p>
						<?php }}?>
					</div>  
		<?php }?>
        <?php if($INI['gopay']['mid']&&'Y'==$INI['gopay']['direct']&&'N'==$INI['tenpay']['direct']&&'N'==$INI['sdopay']['direct']&&'N'==$INI['yeepay']['direct']){?>
					<div id="paybank">
						<?php if(is_array($gopaybank)){foreach($gopaybank AS $one=>$gid) { ?>
						<p><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $gid; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></p>
						<?php }}?>
					</div>  
		<?php }?>
		<?php }?>

		

                            </div>
                            <div class="clear"></div>
                            <p class="commit">
                                <input type="submit" value="确定，去付款" class="formbutton" />

                            </p>
                        </form>
                    </div>
                </div>
    
  </div>
  <div class="clear"></div>
	</div>
</div>
<?php include template("footer");?>
