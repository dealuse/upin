<?php include template("header");?>
<style>
    #order-pay-return{
        width:648px;
    }
</style>
<div class="wrap2">
    <div class="uleft2" id="order-pay-return">
        <div class="utit">
            <ul class="step step3">
                <li>提交订单</li>	
                <li>选择支付方式 </li>
                <li>支付成功</li>
            </ul>
        </div>
        <div class="sect">
            <h2 style="margin-left: 150px;">您的订单，支付成功了！</h2><br/><br/>
            <p class="info">查看所购项目<a href="/team.php?id=<?php echo $order['team_id']; ?>"><?php echo $team['title']; ?></a></p>
            <?php if($order['express']=='N'){?>
            <div class="coupon-tip">
                <div class="tipped cf">
                    <div class="coupon-status cf">
                        <div class="check">
                            <a class="coupon-see-button" hidefocus="true" href="/order/view.php?id=<?php echo $order['id']; ?>" title="查看我的<?php echo $INI['system']['couponname']; ?>">查看<?php echo $INI['system']['couponname']; ?></a>
                        </div>
                        <p class="tip">凭<?php echo $INI['system']['couponname']; ?>编号，即可去商家处享受超值服务！</p>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <!--基于全网历史的推荐 畅销-->
    <?php include template("ad/right_guess_like");?>
    <div class="clear"></div>
</div>
<!--百分点代码：购买成功页-->
<script type="text/javascript">
    var total = "<?php echo $order['service']; ?>";
    if (total == 'alipay'){
    total = '支付宝';
    }
    if (total == 'tenpay'){
    total = '财付通';
    }
    if (total == 'chinabank'){
    total = '中国银行';
    }
    if (total == 'yeepay'){
    total = '易宝支付';
    }
    if (total == 'gopay'){
    total = '国付宝';
    }
    if (total == 'cmpay'){
    total = '中国移动手机支付';
    }
    if (total == 'credit'){
    total = '优品会余额';
    }
    window["_BFD"] = window["_BFD"] || {};
            _BFD.BFD_INFO = {
            "order_id" : "<?php echo $order['id']; ?>", //当前订单号，如果有拆单等特殊情况现象（一次购买中出现多个订单号）此页面代码不可用，请联系我修改；
                    "order_items" : [["<?php echo $team['id']; ?>", <?php echo $team['team_price']; ?>, <?php echo $order['quantity']; ?>]], //同购物车页
                    "total" : "<?php echo $order['origin']; ?>", //用户实际支付的价格
                    "payment" : total, //支付方式
                    "express" : "", //快递方式
                    "address" : "<?php echo $order['province']; ?><?php echo $order['city']; ?><?php echo $order['area']; ?><?php echo $order['address']; ?><?php echo $order['zipcode']; ?>", //送货地址
                    "mobile" : "<?php echo $order['mobile']; ?>", //手机
                    "name" : "<?php echo $order['realname']; ?>", //收货人姓名
                    "express_price" : "", //快递价格
                    "user_id" : "<?php echo $login_user['id']; ?>", //网站当前用户id，如果未登录就为0或空字符串
                    "page_type" : "payment" //当前页面全称，请勿修改
            };
</script>
<?php include template("footer");?>