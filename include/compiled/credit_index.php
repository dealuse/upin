<?php include template("header");?>

<div class="wrap new-order">
    <div class="fl" style="width:700px">
        <div class="uleft c3" id="uleft_ev56">
            <h2 id="uctit" style="display:none">用户中心</h2>
            <h3 style="display:none">交易管理</h3>
            <ul class="wrapper">
                <li style="height: 0;display: none;"><img src="/static/theme/ev56_58/css/img/express.png" style="position: relative;left: 95px;top: 9px;"></li>
                <?php echo current_account('/credit/index.php'); ?></ul>
            <h3 style="display:none">咨询与售后</h3>
            <ul style="display:none">
                <li><a href="/feedback/suggest.php">咨询/投诉</a></li>
                <li><a href="/feedback/seller.php">商务合作</a></li>
                <li><a href="/team/comments.php">买家点评</a></li>
            </ul>
            <a class="faq" href="/help/faqs.php" target="_blank" style="display:none">常见问题&gt;&gt;</a>
        </div>  <div class="uright" id="credit">
            <div class="utit">
                <ul>
                    <li><a href="/account/settings.php">帐户设置</a></li>
                    <li class="current"><a href="/credit/index.php">交易记录</a></li>
                    <li><a href="/credit/charge.php">账户充值</a></li>
                </ul>
                <h2>交易记录</h2>
            </div>            
            <div class="sect">
                <div class="credit-title" style="height:54px">
                    <p class="wrapper mb10">
                        <span>当前的账户余额是</span><strong><?php echo moneyit($user['money']); ?></strong><span>元</span><?php if(moneyit($user['money']) > 0){?><a class="withdraw" href="/credit/withdraw.php">&lt;&lt;提现</a><?php }?>
                    </p>
                    <p class="wrapper">
                        <span>充值到<?php echo $INI['system']['abbreviation']; ?>账户，方便抢购！</span>
                        <a href="/credit/charge.php">立即充值</a>
                        <span class="hide">充值卡充值</span>
                        <a id="credit-card-link" class="hide" href="javascript:;">点击输入充值卡密码</a>
                    </p>
                   
                </div>
                <table id="order-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
                    <tr><th width="120">时间</th><th width="auto">详情</th><th width="50">收支</th><th width="70">金额(元)</th></tr>
                    <?php if(is_array($flows)){foreach($flows AS $index=>$one) { ?>
                    <tr <?php echo $index%2?'':'class="alt"'; ?>><td style="text-align:left;"><?php echo date('Y-m-d H:i', $one['create_time']); ?></td><td><?php echo ZFlow::Explain($one); ?></td><td class="<?php echo $one['direction']; ?>"><?php echo $one['direction']=='income'?'收入':'支出'; ?></td><td><?php echo moneyit($one['money']); ?></td></tr>
                    <?php }}?>
                    <tr><td colspan="4"><?php echo $pagestring; ?></td></tr>
                </table>
            </div>

        </div>
    </div>
    <div class="new-order-right fr">
        <!--{//include usercenter/block_userinfo}-->
    </div>
    <div class="clear"></div>
</div>
<?php include template("footer");?>
