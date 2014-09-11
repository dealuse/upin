<?php include template("wap_header");?>

<h2><a href="my.php">账户详情</a>&nbsp;|&nbsp;收支记录</h2>

<?php if(is_array($flows)){foreach($flows AS $index=>$one) { ?>
<table id="order-list" style="margin:5px 0;" cellspacing="1" cellpadding="2" border="0" bgcolor="#999999" width="100%">
	<tr><td bgcolor="#CCCCCC" width="60" nowrap>日期：</td><td bgcolor="#FFFFFF"><?php echo date('Y-m-d H:i', $one['create_time']); ?></td></tr>
	<tr><td bgcolor="#CCCCCC">内容：</td><td bgcolor="#FFFFFF"><?php echo $option_flow[$one['action']]; ?>&nbsp;-&nbsp;<?php if($one['action']=='coupon'){?><?php echo $INI['system']['couponname']; ?>返利<?php } else if($one['action']=='invite') { ?>好友：<?php echo $users[$one['detail_id']]['username']; ?><?php } else if($one['action']=='buy') { ?><a href="team.php?id=<?php echo $one['detail_id']; ?>"><?php echo $teams[$one['detail_id']]['product']; ?></a><?php } else if($one['action']=='refund') { ?><a href="team.php?id=<?php echo $one['detail_id']; ?>"><?php echo $teams[$one['detail_id']]['product']; ?></a><?php } else if($one['action']=='charge') { ?>在线充值<?php } else if($one['action']=='withdraw') { ?>用户提现<?php } else if($one['action']=='store') { ?>线下充值<?php }?></td></tr>
	<tr><td bgcolor="#CCCCCC">收支：</td><td bgcolor="#FFFFFF"><?php echo $one['direction']=='income'?'收入':'支出'; ?></td></tr>
	<tr><td bgcolor="#CCCCCC">金额：</td><td bgcolor="#FFFFFF"><?php echo $currency; ?><?php echo moneyit($one['money']); ?></td></tr>
</table>
<?php }}?>
<table><td><?php echo $pagestring; ?></td></tr></table>

<?php include template("wap_footer");?>
