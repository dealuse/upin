<?php include template("header");?>
<style>
    #order-pay{
        width:652px;
    }
    .uright2{float: right;}
</style>
<?php if(is_get()){?>
<div class="mtips" style="position:relative;" id="successTips"><p>此订单尚未完成付款，请重新付款</p><em class="close" onclick="hidetips();">close</em></div>
<?php }?>
<div class="wrap2">
    <div class="uleft2" id="order-pay">
        <div class="utit">
            <ul class="step step2">
                <li>提交订单</li>	
                <li>选择支付方式 </li>
                <li>支付成功</li>
            </ul>
            <h2>应付总额：<strong class="total-money"><?php echo moneyit($total_money); ?></strong> 元</h2>
        </div>



        <div class="sect">
            <div style="text-align:left; margin:10px auto;">
                <?php if($order['service']=='credit'){?>
                <form id="order-pay-credit-form" method="post" sid="<?php echo $order_id; ?>">
                    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
                    <input type="hidden" name="service" value="credit" />
                    <br/>
                    <input type="submit" class="gotopay input input1" value="确定支付" />
                </form>
                <?php } else { ?>
                <?php echo $payhtml; ?>
                <?php }?>
                <br/>
                <div class="back-to-check"><a href="/order/check.php?id=<?php echo $order_id; ?>">&raquo; 返回选择其他支付方式</a></div>
            </div>
        </div>
    </div>
        <!--基于全网历史的推荐 畅销-->
        <?php include template("ad/right_guess_like");?>
      <div class="uright2" style="margin-right:0">
        <?php include template("block_side_payhelp");?>
    </div>      
    <div class="clear"></div>
</div>
<?php include template("footer");?>