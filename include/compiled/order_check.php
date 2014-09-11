<?php include template("header");?>

<div class="wrap2">
    <div class="uleft2" id="deal-buy" style="min-height: 400px;">
        <div class="utit">
            <ul class="step step2">
                <li>提交订单</li>	
                <li>选择支付方式 </li>
                <li>支付成功</li>
            </ul>
            <h2>购买信息</h2>
        </div>
        <!-- 订单信息begin -->
        <div class="order_check_list">
            <table>
                <tr>
                    <td class="item-name">项目名称：</td>
                    <td class="item-cont"><a title="<?php echo $team['title']; ?>"
                                             href="/team.php?id=<?php echo $team['id']; ?>" target="_blank"><?php echo $team['product']; ?></a></td>
                </tr>
                <?php if(empty($order['condbuy'])){?>
                <tr>
                    <td class="item-name">商品数量：</td>
                    <td class="item-cont"><?php echo $order['quantity']; ?></td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td class="item-name">商品类型：</td>
                    <td class="item-cont"><?php echo str_replace("\n",",",str_replace("@","*",$order['condbuy'])); ?></td>
                </tr>
                <?php }?>
                <?php if($team['delivery'] == 'express'){?>
                <tr>
                    <td class="item-name">配送地址：</td>
                    <td class="item-cont"><?php echo $order['realname']; ?>,<?php echo $order['province']; ?>
                        <?php echo $order['city']; ?> <?php echo $order['area']; ?> <?php echo $order['address']; ?> ,
                        <?php echo $order['zipcode']; ?>,电话:<?php echo $order['mobile']; ?></td>
                </tr>
                <tr>
                    <td class="item-name">特殊说明：</td>
                    <td class="item-cont"><?php echo $order['remark']; ?></td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td class="item-name">您的手机：</td>
                    <td class="item-cont">团购成功后，<?php echo $INI['system']['couponname']; ?>将发送到您的手机：<b><?php echo $order['mobile']; ?></b>,凭该短信去商家消费。
                    </td>
                </tr>
                <?php }?>
                <?php if(time()>strtotime('2013-11-10') && time()<strtotime('2013-11-11 20:01')){?>
                <p style="color:red">凡在双十一 11:00~11:03、17:00~17:02、20:00~20:01 时间段购买的所有本地服务商品，成功下单后会在当前订单金额的基础上立享5折优惠，每件商品仅限购1份哦!（仅限活动城市）</p>
                <?php }?>
                <?php if($deInfo){?>
                <tr>
                    <td colspan="2"><span style="color: red">*恭喜您成功使用双十一优惠券，券号为:<?php echo $deInfo['code']; ?>，本订单已减免5元!</span></td>
                </tr>
                <?php }?>
                <?php if($isDEDay){?>
                <tr>
                    <td colspan="2"><span style="color: red">*凡双11期间成功购买优品会邮购类产品的用户，优品会将会在次日(12日零点)返还5元现金至您优品会余额！</span></td>
                </tr>
                <?php }?>
            </table>
        </div>

        <?php if(false==$credityes){?>
        <p class="pay-total">
            <?php if($deInfo){?>
            <em>还需支付<span class="money"><?php echo $currency; ?><?php echo moneyit($order['origin']-$login_user['money']); ?></span></em>
            = 应付总额<span class="money"><?php echo $currency; ?><?php echo moneyit($order['origin']+5); ?></span>
            - <?php echo $INI['system']['sitename']; ?>余额<span class="money"><?php echo $currency; ?><?php echo moneyit($login_user['money']); ?></span>
            - <span class="money" style="color: red">双十一优惠券<?php echo $currency; ?>5</span>
            <?php } else { ?>
            <em>还需支付<span class="money"><?php echo $currency; ?><?php echo moneyit($order['origin']-$login_user['money']); ?></span></em>
            = 应付总额<span class="money"><?php echo $currency; ?><?php echo moneyit($order['origin']); ?></span>
            - <?php echo $INI['system']['sitename']; ?>余额<span class="money"><?php echo $currency; ?><?php echo moneyit($login_user['money']); ?></span>
            <?php }?>
        </p>
        <p>没有Paypal的账户也可以使用信用卡进行支付，请点击立即支付。</p>
        <?php } else { ?>
        <p class="pay-credit">
            使用<?php echo $INI['system']['sitename']; ?>余额支付：<span class="money"><?php echo $currency; ?><?php echo moneyit($order['origin']); ?></span>
        </p>
        <p class="pay-total">
            <?php if($deInfo){?>
            应付总额<span class="money"><?php echo $currency; ?><?php echo moneyit($order['origin']+5); ?></span><span class="money" style="color: red">(双十一优惠券减免<?php echo $currency; ?>5)</span>
            ,<?php echo $INI['system']['sitename']; ?>余额<span class="money"><?php echo $currency; ?><?php echo moneyit($login_user['money']); ?></span>
            <?php } else { ?>
            应付总额<span class="money"><?php echo $currency; ?><?php echo moneyit($order['origin']); ?></span>
            ,<?php echo $INI['system']['sitename']; ?>余额<span class="money"><?php echo $currency; ?><?php echo moneyit($login_user['money']); ?></span>
            <?php }?>
        </p>

        <?php }?>
        <!-- 订单信息end -->

        <form action="/order/pay.php" method="post" class="validator">
            <?php if(false==$creditonly && false==$credityes &&empty($_SESSION['ali_token'])){?>
            <div class="paytype paytype-list">
                <h3>支付方式</h3>
                <?php if($INI['tenpay']['mid']&&'Y'==$INI['tenpay']['direct']){?>
                <ul id="paybank" class="bank-list">
                    <?php if(is_array($paybank)){foreach($paybank AS $one) { ?>
                    <?php if($one=='POST-NET'){?>
                    <li class="item chinapost"><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $one; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></li>
                    <?php } else { ?>
                    <li class="item"><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $one; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></li>
                    <?php }?>
                    <?php }}?>
                </ul>  
                <?php }?>

                <ul class="typelist xpay-list">
                    <?php if($INI['alipay']['mid']){?>
                    <li class="item"><input id="check-alipay" type="radio" name="paytype" value="alipay" <?php echo $ordercheck['alipay']; ?> /><label for="check-alipay" class="alipay">支付宝交易，推荐淘宝用户使用</label></li>
                    <?php }?>
                    <?php if($INI['tenpay']['mid']){?>
                    <li class="item"><input id="check-tenpay" type="radio" name="paytype" value="tenpay" <?php echo $ordercheck['tenpay']; ?> /><label for="check-tenpay" class="tenpay">财付通交易，推荐拍拍用户使用</label></li>
                    <?php }?>
                    <?php if($INI['sdopay']['mid']){?>
                    <li class="item"><input id="check-sdopay" type="radio" name="paytype" value="sdopay" <?php echo $ordercheck['sdopay']; ?> /><label for="check-sdopay" class="sdopay">盛付通交易，推荐盛大一卡通用户使用</label></li>
                    <?php }?>
                    <?php if($INI['yeepay']['mid']){?>
                    <li class="item"><input id="check-yeepay" type="radio" name="paytype" value="yeepay" <?php echo $ordercheck['yeepay']; ?> /><label for="check-yeepay" class="yeepay">易宝支付，人民币支付网关</label></li>
                    <?php }?>
                    <?php if($INI['bill']['mid']){?>
                    <li class="item"><input id="check-bill" type="radio" name="paytype" value="bill" <?php echo $ordercheck['bill']; ?> /><label for="check-bill" class="bill">快钱交易，助您生活娱乐更加便捷</label></li>
                    <?php }?>
                    <?php if($INI['chinabank']['mid']){?>
                    <li class="item"><input id="check-chinabank" type="radio" name="paytype" value="chinabank" <?php echo $ordercheck['chinabank']; ?> /><label for="check-chinabank" class="chinabank">网银支付交易，支持招商、工行、建行、中行等主流银行</label></li>
                    <?php }?>
                    <?php if($INI['paypal']['mid']){?>
                    <li class="item"><input id="check-paypal" type="radio" name="paytype" value="paypal" checked="checked" /><label for="check-paypal" class="paypal"></label></li>
                    <?php }?>
                    <?php if($INI['cmpay']['mid']){?>
                    <li class="item"><input id="check-cmpay" type="radio" name="paytype" value="cmpay" <?php echo $ordercheck['cmpay']; ?> /><label for="check-cmpay" class="cmpay">手机号就是您的支付账户，中国移动为您提供随时随地随身的支付服务！</label></li>
                    <?php }?>
                    <?php if($INI['gopay']['mid']){?>
                    <li class="item"><input id="check-gopay" type="radio" name="paytype" value="gopay" <?php echo $ordercheck['gopay']; ?> /><label for="check-gopay" class="gopay">国家级电子支付平台，超低费率，安全保证。</label></li>
                    <?php }?>
                </ul>



                <?php if($INI['sdopay']['mid']&&'Y'==$INI['sdopay']['direct']&&'N'==$INI['tenpay']['direct']){?>
                <ul id="paybank" class="bank-list">
                    <?php if(is_array($sdopaybank)){foreach($sdopaybank AS $one=>$sid) { ?>
                    <li class="item"><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $sid; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></li>
                    <?php }}?>
                </ul>  
                <?php }?>

                <?php if($INI['yeepay']['mid']&&'Y'==$INI['yeepay']['direct']&&'N'==$INI['tenpay']['direct']&&'N'==$INI['sdopay']['direct']){?>
                <ul id="paybank" class="bank-list">
                    <?php if(is_array($yeepaybank)){foreach($yeepaybank AS $one=>$pid) { ?>
                    <li class="item"><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $pid; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></li>
                    <?php }}?>
                </ul>  
                <?php }?>
                <?php if($INI['gopay']['mid']&&'Y'==$INI['gopay']['direct']&&'N'==$INI['tenpay']['direct']&&'N'==$INI['sdopay']['direct']&&'N'==$INI['yeepay']['direct']){?>
                <ul id="paybank" class="bank-list">
                    <?php if(is_array($gopaybank)){foreach($gopaybank AS $one=>$gid) { ?>
                    <li class="item"><input id="check-<?php echo $one; ?>" type="radio" name="paytype" value="<?php echo $gid; ?>" /><label for="check-<?php echo $one; ?>" class="<?php echo $one; ?>"></label></li>
                    <?php }}?>
                </ul>  
                <?php }?>

            </div>
            <p class="pay-other">支付<span class="money"><?php echo $currency; ?><?php echo moneyit($order['origin']-$login_user['money']); ?></span></p>
            <?php } else if(false==$creditonly && false==$credityes && $_SESSION['ali_token']) { ?>
            <div class="paytype paytype-list">
                <ul class="typelist">
                    <li class="item"><input id="check-alipay" type="radio" name="paytype" value="alipay" <?php echo $ordercheck['alipay']; ?> /><label for="check-alipay" class="alipay">支付宝交易</label></li>
                </ul>
            </div>
            <?php } else { ?>
            <input type="hidden" name="paytype" value="credit" />
            <?php }?>



            <?php if($credityes || false==$creditonly){?>
            <p class="check-act">
                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>" />
                <input type="hidden" name="team_id" value="<?php echo $order['team_id']; ?>" />
                <input type="hidden" name="cardcode" value="" />
                <input type="hidden" name="quantity" value="<?php echo $order['quantity']; ?>" />
                <input type="hidden" name="address" value="<?php echo $order['address']; ?>" />
                <input type="hidden" name="express" value="<?php echo $order['express']; ?>" />
                <input type="hidden" name="remark" value="<?php echo $order['remark']; ?>" />

            <table border="0" style="width: 100%;">
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td align="right"><input type="submit" value="立即支付" class="input input1" /></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="2" style="padding-top: 5px">
                            <?php if(false==$credityes){?>
                            <!--<input type="button" value="确认订单，以后再付款" class="formbutton" onclick="location.href='index.php';" />-->
                            <?php }?>
                            <a href="/team/buy.php?id=<?php echo $order['team_id']; ?>" style="margin-left:1em;">返回修改订单</a>
                            <?php }?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="uright2" style="margin-right:0">
        <?php include template("block_side_payhelp");?>
    </div>
    <div class="clear"></div>
</div>

<?php include template("footer");?>
<script type="text/javascript">
    jQuery('.clicklink').click(function(){
        $(this).next().toggle();

    });
</script>
