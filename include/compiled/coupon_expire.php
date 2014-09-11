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
                <ul class="wrapper"><?php echo current_coupon_sub('expire'); ?>
                </ul>
      <h2>我的<?php echo $INI['system']['couponname']; ?></h2>
    </div>
    <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="400">项目名称</th><th width="100" nowrap><?php echo $INI['system']['couponname']; ?>编号</th><th width="100" nowrap>过期日期</th></tr>
					<?php if(is_array($coupons)){foreach($coupons AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a></td>
							<td><?php echo $one['id']; ?></td>
							<td><?php echo date('Y-m-d', $one['expire_time']); ?></td>
						</tr>	
					<?php }}?>
						<tr><td colspan="3"><?php echo $pagestring; ?></td></tr>
                    </table>
			</div>
            <div id="bfd_ap"></div>
				</div>
    
  </div>
  <div class="clear"></div>
</div>
<?php include template("footer");?>
