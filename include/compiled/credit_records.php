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
                <?php echo current_account('/credit/score.php'); ?></ul>
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
				  <?php echo current_credit_index('records'); ?>
			      </ul>
            </div>
    <div class="sect" id="credit">
					<p class="charge">积分规则：&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;用户注册：+<?php echo abs(intval($INI['credit']['register'])); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;用户登录：+<?php echo abs(intval($INI['credit']['login'])); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;参与团购：+<?php echo abs(intval($INI['credit']['buy'])); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;邀请好友：+<?php echo abs(intval($INI['credit']['invite'])); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;购买返积比例：<?php echo moneyit($INI['credit']['pay']); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;充值返积比例：<?php echo moneyit($INI['credit']['charge']); ?></p>
					<h3 class="credit-title">当前的账户积分是：<strong><?php echo moneyit($login_user['score']); ?></strong></h3>
					<table id="order-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="150">兑换时间</th><th width="auto">详情</th><th width="120">状态</th></tr>
						<?php if(is_array($credits)){foreach($credits AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>><td style="text-align:left;"><?php echo date('Y-m-d H:i', $one['create_time']); ?></td><td><?php echo ZCredit::Explain($one); ?></td><td><?php if(($one['state']=='unpay')){?>未发货<?php } else { ?>已发货<?php }?></td></tr>
						<?php }}?>
						<tr><td colspan="4"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
    
  </div>
  <div class="clear"></div>
	</div>
</div>
<?php include template("footer");?>










<?php include template("header");?>

<div class="wrap">
        <div class="uleft c3" id="uleft_ev56">
<h2 id="uctit">用户中心</h2>
<h3>交易管理</h3>
<ul><?php echo current_account('/credit/score.php'); ?></ul>

<a class="faq" href="/help/faqs.php" target="_blank">常见问题&gt;&gt;</a>
</div>  <div class="uright" id="credit">
    <div class="utit">
      <ul>
	  <?php echo current_credit_index('records'); ?>
      </ul>
      <h2>兑换记录</h2>
    </div>
    <div class="sect">
					<p class="charge">积分规则：&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;用户注册：+<?php echo abs(intval($INI['credit']['register'])); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;用户登录：+<?php echo abs(intval($INI['credit']['login'])); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;参与团购：+<?php echo abs(intval($INI['credit']['buy'])); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;邀请好友：+<?php echo abs(intval($INI['credit']['invite'])); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;购买返积比例：<?php echo moneyit($INI['credit']['pay']); ?>&nbsp;&nbsp;&nbsp;<span>&raquo;</span>&nbsp;充值返积比例：<?php echo moneyit($INI['credit']['charge']); ?></p>
					<h3 class="credit-title">当前的账户积分是：<strong><?php echo moneyit($login_user['score']); ?></strong></h3>
					<table id="order-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="150">兑换时间</th><th width="auto">详情</th><th width="120">状态</th></tr>
						<?php if(is_array($credits)){foreach($credits AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>><td style="text-align:left;"><?php echo date('Y-m-d H:i', $one['create_time']); ?></td><td><?php echo ZCredit::Explain($one); ?></td><td><?php if(($one['state']=='unpay')){?>未发货<?php } else { ?>已发货<?php }?></td></tr>
						<?php }}?>
						<tr><td colspan="4"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
    
  </div>
  <div class="clear"></div>
</div>
<?php include template("footer");?>
