<?php include template("header");?>

<div class="wrap new-order wrapper">
    <div class="fl" style="width:700px">
        <div class="uleft c3" id="uleft_ev56">
            <ul class="wrapper">
                <?php echo current_account('/order/index.php'); ?>
            </ul>
        </div>
        <div class="uright" id="uright_ev56">
            <div class="utit">
                <ul class="wrapper"><?php echo current_order_index($selector); ?>
                </ul>
                <h2>我的订单</h2>
            </div>
            <div class="sect">
                <?php if($selector=='index' || $selector=='pay' || $selector=='unpay' || $selector=='askrefund' || $selector=='' ){?>
                <table id="orders-list" cellspacing="0" cellpadding="0" border="0"
                       class="coupons-table">
                    <tr>
                        <th width="50">订单号</th>
                        <th width="auto">项目名称</th>
                        <th width="30">数量</th>
                        <th width="60">总价</th>
                        <th width="70">状态</th>
                        <th width="80">操作</th>
                    </tr>
                    <?php if(is_array($orders)){foreach($orders AS $index=>$one) { ?>
                    <?php
                    if(!$teams[$one['team_id']]['title'])
                        continue;
                    ?>
                    <tr <?php echo $index%2?'':'class="alt"'; ?>>
                        <td><?php echo $one['id']; ?></td>
                        <td class="deal">
                            <table class="deal-info">
                                <tbody>
                                    <tr>
                                        <td class="pic"><a href="/team.php?id=<?php echo $one['team_id']; ?>"
                                                           target="_blank" title="<?php echo $teams[$one['team_id']]['title']; ?>">
                                                <img src="<?php echo team_image($teams[$one['team_id']]['image'],true); ?>"
                                                     width="75" height="46">
                                            </a></td>
                                        <td class="text"><a class="deal-title"
                                                            href="/team.php?id=<?php echo $one['team_id']; ?>"
                                                            title="<?php echo $teams[$one['team_id']]['title']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['product_ind']; ?></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td><?php echo $one['quantity']; ?></td>
                        <td>
                            <span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['origin']); ?>
                            <?php if($one['fare'] > 0){?> <br> <span
                                class="delivery-text">含运费: <span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['fare']); ?>
                            </span> <?php }?></td>
                        <td>
                            <?php if($one['state']=='pay'){?>
                            <font color="green">已付款</font>
                            <?php if($one['rstate'] == 'payandrefund'){?><br><font color="red">部分退款</font><?php }?>
                            <?php } else if($teams[$one['team_id']]['close_time']>0) { ?>已过期<?php } else { ?>未付款<?php }?>
                            <br> <a href="/order/view.php?id=<?php echo $one['id']; ?>">详情</a><?php if($one['express_no']){?> | <a href="/order/view.php?id=<?php echo $one['id']; ?>">查快递</a><?php }?>
                        </td>
                        <td class="op">
                            <?php if(($one['state']=='unpay')){?> 
                            <p><a class="small-link-button" href="/order/check.php?id=<?php echo $one['id']; ?>">付款</a></p>
                            <p><a href="/ajax/order.php?action=orderdel&id=<?php echo $one['id']; ?>" class="ajaxlink order-cancel" ask="确定删除本订单？">删除</a></p>
                            <?php } else if($one['state']=='pay') { ?>

                            <?php } else if($one['state']=='refund') { ?> 
                            <p>已退款</p>
                            <?php }?>

                            <p><a href="/team/ask.php?id=<?php echo $one['team_id']; ?>&order_id=<?php echo $one['id']; ?>" >联系客服</a></p>
                        </td>
                    </tr>
                    <?php }}?>
                    <tr>
                        <td colspan="5"><?php echo $pagestring; ?></td>
                    </tr>
                </table>
                <?php }?>
            </div>
            <div id="bfd_ap"></div>
        </div>
    </div>
    <div class="new-order-right fr">
        <?php include template("usercenter/block_userinfo");?>
        <article class="tips">
            <header>
                <p class="title">小提示</p>
            </header>
            <section>
                <p class="title">为什么使用过的订单仍然显示为"未使用"？</p>
                <p class="mb10">订单的使用状态更新可能会有延迟，订单的真实使用状态以实际消费情况为准，敬请谅解。</p>
                <p class="title">哪种订单可以评价？</p>
                <ul>
                    <li>只有已消费过的订单才可以评价，评价可获赠积分！</li>
                    <li>如果团购项目为优惠码，支付成功即可评价（建议消费后再评价）。</li>
                </ul>
            </section>
        </article>
         
    </div>
   
    <div class="clear"></div>
</div>
<script type="text/javascript">
     window["_BFD"] = window["_BFD"] || {};
     _BFD.BFD_INFO = {
          "user_id" : "<?php echo $login_user['id']; ?>", //网站当前用户id，如果未登录就为0或空字符串
          "page_type" : "account" //当前页面全称，请勿修改
     };
</script>
<?php include template("footer");?>
