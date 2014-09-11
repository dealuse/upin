<?php include template("header");?>

<div class="wrap2" style="min-height: 500px;">

    <div class="uleft2"  id="deal-buy">
        <div class="utit">
            <ul class="step step1">
                <li>提交订单</li>
                <li>选择支付方式 </li>
                <li>支付成功</li>
            </ul>
            <h2>
                购买信息<?php if($team['farefree'] == -1){?>&nbsp;(本单免运费)
                <?php } else if($team['farefree']>0) { ?>&nbsp;(<span class="currency"><?php echo $team['farefree']; ?></span>件免运费)<?php }?>
            </h2>
        </div>

        <form action="/team/buy.php?id=<?php echo $team['id']; ?>" method="post" class="validator" id="orderFormJQ" >
            <input id="deal-per-number" value="<?php echo $team['per_number']; ?>" type="hidden" />
            <input id="deal-permin-number" value="<?php echo $team['permin_number']; ?>" type="hidden" />


            <!-- 购物车new : start -->
            <!-- 购物车:begin -->
            <div id="RichCart">
                <table width="100%" border=0 cellspacing=​0 cellpadding=​0>
                    <thead>
                        <tr>
                        <th class="deal-buy-desc" width="50%">项目名称</th>
                    <th class="deal-buy-quantity" width="10%">数量</th>
                    <th class="deal-buy-multi" width="5%"></th>
                    <th class="deal-buy-price" width="15%">价格</th>
                    <th class="deal-buy-equal" width="5%"></th>
                    <th class="deal-buy-total" width="15%">总价</th>
                        </tr>
                <tr>
                    <th class="deal-buy-desc"><?php echo $team['title']; ?></th>
                    <th class="deal-buy-quantity"><input type="text" class="input-text f-input" maxlength="4" name="quantity" value="<?php echo $order['quantity']; ?>" ff="<?php echo abs(intval($team['farefree'])); ?>" id="deal-buy-quantity-input" <?php echo $team['per_number']==1?'readonly':''; ?> /><br /><span style="font-size:12px;color:gray;"><?php if($team['per_number']==0){?>最多9999件<?php } else { ?>最多<?php echo $team['per_number']; ?>件<?php }?></span></th>
                    <th class="deal-buy-multi">x</th>
                    <th class="deal-buy-price"><span class="money"><?php echo $currency; ?></span><span id="deal-buy-price"><?php echo $team['team_price']; ?></span></th>
                    <th class="deal-buy-equal">=</th>
                    <th class="deal-buy-total"><span class="money"><?php echo $currency; ?></span><span id="deal-buy-total"><?php echo $order['quantity']*$team['team_price']; ?></span></th>
                </tr>
                    </thead>

                </table>
            </div>
            <!-- 购物车:end -->
            <?php if($team['delivery']=='express'){?>
            <table width="100%" border="0" cellspacing=​0 cellpadding=0 class="RichCartProduct">
                <thead>
                    <tr>
                        <th class="first">
                <h3>收货地址<?php if($INI['alipay']['aliaddress'] == 'Y' && $_SESSION['ali_token']){?>&nbsp;<a href="/alifast/user_logistics_address_query.php"><img src="/static/css/i/aliaddress.png" /></a><?php }?></h3>
                </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:left;padding:0;margin:0">
                            <div class="field" style="padding:0;margin:5px 0 10px;">
                                <label><font color="red">*</font>街道地址</label>
                                <input type="text" size="60" style="width:450px" name="address" id="settings-address" require="true" datatype="require"  class="i_text"  value="<?php if($userData['address']){?><?php echo $userData['address']; ?> <?php } else { ?><?php echo $login_user['address']; ?><?php }?>" placeholder="路名或街道地址,门牌号" msg="街道信息不能为空">
                            </div>
                            <div class="field" style="padding:0;margin:5px 0 10px;">
                                <label><font color="red">*</font>收货人姓名</label>
                                <input type="text" size="30" name="realname" id="settings-realname" require="true" datatype="require" class="i_text" <?php if($userData['realname']){?>value="<?php echo $userData['realname']; ?>" <?php } else { ?>value="<?php echo $login_user['realname']; ?>"<?php }?> placeholder="真实姓名" msg="收货人不能为空" />
                            </div>
                            <div class="field" style="padding:0;margin:5px 0 10px;">
                                <label><font color="red">*</font>手机号码</label>
                                <input type="text" size="11" name="mobile" id="settings-mobile" require="true" datatype="require|mobile"  class="i_text" <?php if($userData['mobile']){?>value="<?php echo $userData['mobile']; ?>" <?php } else { ?>value="<?php echo $login_user['mobile']; ?>"<?php }?>  maxLength="11" msg="手机号码不能为空|手机号码不正确" /> <!--span class="inputtip">手机号码是我们联系您最重要的方式，请准确填写</span-->
                            </div>
                            <div class="field" style="padding:0;margin:5px 0 10px;">
                                <label>邮政编码</label>
                                <input type="text" size="30" name="zipcode" id="settings-mobile" class="i_text" <?php if($userData['zipcode']){?>value="<?php echo $userData['zipcode']; ?>" <?php } else { ?>value="<?php echo $login_user['zipcode']; ?>"<?php }?>  maxLength="6" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding:0;margin:0">
                            <div class="field" style="padding:0;margin:5px 0 10px;">

                                <label>订单附言</label>
                                <input type="text" name="remark" class="i_text" style="width:450px;" value="<?php echo htmlspecialchars($order['remark']); ?>" placeholder="快递公司由商家根据情况选择，请不要指定。其他要求会尽量协调">

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table border="0" style="margin-top: 20px;width: 100%;">
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td align="right">
                            <?php if($login_user){?>
                            <input type="submit" class="input input1" name="buy" value="提交订单"/>
                            <?php } else { ?>
                            <input id="no-login-btn" type="submit" class="input input1" name="buy" value="提交订单"/>
                            <?php }?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php } else { ?>
            <table border="0" style="margin-top: 20px;width: 100%">
                <tbody>
                    <tr>
                        <td align="right">
                            <?php if($login_user){?>
                            <input type="submit" class="input input1" name="buy" value="提交订单"/>
                            <?php } else { ?>
                            <input id="no-login-btn1" type="submit" class="input input1" name="buy" value="提交订单"/>
                            <?php }?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php }?>            
            <!-- 购物车new : end -->
            <input type="hidden" name="id" value="<?php echo $order['id']; ?>" />
        </form>  
        <div class="clear"></div>   
    </div>

    <div class="uright2" style="padding:0px;">
        <h3 style="padding-top:30px;">账户余额</h3>
        <p>您的账户余额：<span class="money"><?php echo $currency; ?></span><?php echo moneyit($login_user['money']); ?></p>
    </div>
    <div class="clear"></div>
</div>
<?php $includeScript[] = 'team_buy'; ?>
<?php include template("footer");?>