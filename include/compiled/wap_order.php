<?php include template("wap_header");?>
<h2>我的订单</h2>
<p><a href="myorder.php">已付款</a>&nbsp;|&nbsp;<a href="myorder.php?s=unpay">未付款</a></p>
<h2>订单详情</h2>
<p>项目名称：<a href="team.php?<?php echo $team['id']; ?>"><?php echo $team['title']; ?></a></p>
<p>订单编号：<?php echo $order['id']; ?></p>
<p>下单时间：<?php echo date('Y-m-d H:i',$order['create_time']); ?></p>
<h2>订购情况</h2>
<p>项目单价：<?php echo moneyit($order['price']); ?></p>
<p>购买数量：<?php echo $order['quantity']; ?></p>
<p>代金券抵：<?php echo moneyit($order['card']); ?></p>
<p>快递费用：<?php echo $express?moneyit($team['fare']):0; ?></p>
<p>总计费用：<?php echo moneyit($order['origin']); ?></p>

<h2>发货情况</h2>

<?php if($team['delivery']=='coupon'){?>
<table cellspacing="0" cellpadding="0" border="0" class="data-table">
    <tr>
        <td align="right"><?php echo $INI['system']['couponname']; ?>：</th>
        <td class="other-coupon"><?php if(empty($coupons)){?><?php echo $INI['system']['couponname']; ?>将在团购成功后，由系统自动发放<?php }?><?php if(is_array($coupons)){foreach($coupons AS $one) { ?><p><?php echo $one['id']; ?> - <?php echo $one['secret']; ?></p><?php }}?></td>
    </tr>
    <tr>
        <td align="right">使用方法：</th>
        <td>至商家消费时，请出示<?php echo $INI['system']['couponname']; ?>，配合商家验证券的编号及密码</td>
    </tr>
</table>
<?php } else if($team['delivery']=='express') { ?>
<table cellspacing="0" cellpadding="0" border="0" class="data-table">
    <tr>
        <td align="right">快递：</td>
	<?php if($order['express_id']){?>
        <td><?php echo $option_express[$order['express_id']]; ?>：<?php echo $order['express_no']; ?></td>
	<?php } else { ?>
        <td class="other-coupon">请耐心等待发货</td>
	<?php }?>
    </tr>
    <tr>
        <td align="right">收件人：</td>
        <td><?php echo $order['realname']; ?></td>
    </tr>
    <tr>
        <td align="right">收件地址：</td>
        <td><?php echo $order['address']; ?></td>
    </tr>
    <tr>
        <td align="right">手机号码：</td>
        <td><?php echo $order['mobile']; ?></td>
    </tr>
</table>
<?php } else if($team['delivery']=='pickup') { ?>
<table cellspacing="0" cellpadding="0" border="0" class="data-table">
    <tr>
        <td align="right">自取：</td>
        <td class="other-coupon"></td>
    </tr>
    <tr>
        <td align="right">取货地址：</td>
        <td><?php echo $team['address']; ?></td>
    </tr>
    <tr>
        <td align="right">联系电话：</td>
        <td><?php echo $team['mobile']; ?></td>
    </tr>
</table>
<?php }?>

<?php include template("wap_footer");?>
