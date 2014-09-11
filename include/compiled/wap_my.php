<?php include template("wap_header");?>

<h2>账户详情&nbsp;|&nbsp;<a href="myflow.php">收支记录</a></h2>

<p>真实姓名：<?php echo $login_user['realname']; ?></p>
<p>手机号码：<?php echo $login_user['mobile']; ?></p>
<p>账户余额：<?php echo moneyit($login_user['money']); ?>元</p>
<p>积分余额：<?php echo moneyit($login_user['credit']); ?>分</p>
<p>消费次数：<?php echo $consume_times; ?></p>
<p>联系地址：<?php echo $login_user['address']; ?></p>
<p>邮政编码：<?php echo $login_user['zipcode']; ?></p>

<?php include template("wap_footer");?>
