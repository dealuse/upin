<?php include template("header");?>

<div class="wrap new-order wrapper">
    <div class="fl" style="width:700px">
        <div class="uleft c3" id="uleft_ev56">
            <ul class="wrapper">
                <?php echo current_account('/coupon/index.php'); ?>
            </ul>
        </div>
        <div class="uright" id="uright_ev56">
            <div class="utit">
                <ul class="wrapper"><?php echo current_coupon_sub($selector); ?>
                </ul>
      <h2>我的<?php echo $INI['system']['couponname']; ?></h2>
    </div>
    <div class="sect">
					<?php if($selector=='index'&&!$coupons){?>
					<div class="notice">目前没有可用的<?php echo $INI['system']['couponname']; ?></div>
					<?php }?>
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="240">项目名称</th><th width="100" nowrap><?php echo $INI['system']['couponname']; ?>编号</th><th width="60" nowrap>密码</th><th width="100" nowrap>有效日期</th><th width="100">操作</th></tr>
					<?php if(is_array($coupons)){foreach($coupons AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a></td>
							<td><?php echo $one['id']; ?></td>
							<td><?php echo $one['secret']; ?></td>
							<td><?php echo date('Y-m-d', $one['expire_time']); ?></td>
							<td>
<!--<a class="ajaxlink" href="/ajax/coupon.php?action=mobile_choice&mid=<?php echo $one['order_id']; ?>&id=<?php echo $one['id']; ?>">短信</a>｜-->
<a href="/coupon/print.php?id=<?php echo $one['id']; ?>" target="_blank">打印</a></td>
						</tr>	
					<?php }}?>
						<tr><td colspan="5"><?php echo $pagestring; ?></td></tr>
                    </table>
			</div>
            <div id="bfd_ap"></div>
				</div>
    
  </div>
  <div class="clear"></div>
</div>
<?php include template("footer");?>