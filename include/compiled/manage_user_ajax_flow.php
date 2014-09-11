<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:680px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">关闭</span>用户资金流水记录</h3>
	<div style="height:500px; overflow-y:scroll;overflow-x:hidden;">
	<table width="94%" class="coupons-table">
		<tr>
		<th width="150">时间</th>
		<th>详情</th>
		<th width="80">收支</th>
		<th width="80">金额</th>
		</tr>
	<?php if(is_array($flows)){foreach($flows AS $index=>$one) { ?>
		<tr <?php echo $index%2?'':'class="alt"'; ?>>
		<td><?php echo date('Y-m-d H:i', $one['create_time']); ?></td>
		<td valign="middle"><?php echo ZFlow::Explain($one); ?></td>
		<td><?php echo $one['direction']=='income'?'收入':'支出'; ?></td>
		<td valign="middle"><?php echo moneyit($one['money']); ?></td>
		</tr>
	<?php }}?>
	</table>
	</div>
</div>
