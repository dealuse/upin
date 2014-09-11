<?php include template("header");?>
<div id="main">
<div class="listerouter">
<div class="lister">
<div id="recent-deals">
					<?php if(is_array($goods)){foreach($goods AS $index=>$one) { ?>
  															<dl class="tuanitem">
				<dt>
					<a href="/credit/ajax.php?id=<?php echo $one['id']; ?>&action=exchange" class="ajaxlink" ask="确定使用<?php echo $one['score']; ?>点积分兑换<?php echo $one['title']; ?>吗？"  ><img width="294" heigth="184" alt="<?php echo $one['title']; ?>" title="<?php echo $one['title']; ?>" src="<?php echo team_image($one['image']); ?>" /></a>
										
								<i class="localmask"></i>
								<div class="local" title="<?php echo $team_partner['title']; ?>">
									所需积分：<?php echo $one['score']; ?>积分
								</div>

								
								<i class="new" title="积分兑换"></i>
				</dt>
				<dd class="des">
					<h2>
						<a  id="teamsecondurl<?php echo $one['id']; ?>" href="/credit/ajax.php?id=<?php echo $one['id']; ?>&action=exchange" class="ajaxlink" ask="确定使用<?php echo $one['score']; ?>点积分兑换<?php echo $one['title']; ?>吗？"  title="<?php echo $one['title']; ?>" class="c_b">
							<span class="c_r">&nbsp;</span>
							<?php echo mb_strimwidth($one['title'],0,86,'...'); ?>
						</a>
					</h2>
				<div class="gobuy">
				<a href="/credit/ajax.php?id=<?php echo $one['id']; ?>&action=exchange" class="ajaxlink golook" ask="确定使用<?php echo $one['score']; ?>点积分兑换<?php echo $one['title']; ?>吗？" class="golook">马上兑换</a>
										<span class="nprice"><?php echo $one['score']; ?>积分</span>
				</div>
				</dd>
				<dd class="btmbar">
					<span class="oprice">已兑：<strong class="old"><?php echo $one['consume']; ?></strong></span>
										<span class="savemoney">限兑：<strong class="discount"><?php echo $one['per_number']; ?></strong></span>
											<span class="ordernums">存量：<b><?php echo $one['number']-$one['consume']; ?></b></span>
									</dd>
				<dd class="shadow"></dd>
				</dl>				
		  												
	<?php }}?>				
</div>		  																
		  																
		  																
		    <div class="clear"></div>
</div>
					<div  class="class_quick_fm"><?php echo $pagestring; ?></div>
	

</div>
</div>

<?php include template("footer");?>