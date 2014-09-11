<?php include template("header");?>

<div class="wrap new-order">
    <div class="fl" style="width:700px">
        <div class="uleft c3" id="uleft_ev56">
            <h2 id="uctit" style="display:none">用户中心</h2>
            <h3 style="display:none">交易管理</h3>
            <ul class="wrapper">
                <li style="height: 0;display: none;"><img src="/static/theme/ev56_58/css/img/express.png" style="position: relative;left: 95px;top: 9px;"></li>
                <?php echo current_account('/account/refer.php'); ?></ul>
            <h3 style="display:none">咨询与售后</h3>
            <ul style="display:none">
                <li><a href="/feedback/suggest.php">咨询/投诉</a></li>
                <li><a href="/feedback/seller.php">商务合作</a></li>
                <li><a href="/team/comments.php">买家点评</a></li>
            </ul>
            <a class="faq" href="/help/faqs.php" target="_blank" style="display:none">常见问题&gt;&gt;</a>
        </div>  <div class="uright" id="uright_ev56">
            <div class="utit">
                <ul>
                    <?php echo current_invite('refer'); ?>
                </ul>
                <h2>我的邀请</h2>
            </div>
            <div class="sect">
                <div class="share-list wrapper">
                    <div class="blk im wrapper">
                        <div class="logo fl">
                            <img src="/static/css/i/logo_qq.gif">
                        </div>
                        <div class="info fr">
                            <h4>这是您的专用邀请链接，请通过 MSN 或 QQ 发送给好友：</h4>
                            <input id="share-copy-text" type="text" value="<?php echo $INI['system']['wwwprefix']; ?>/r.php?r=<?php echo $login_user_id; ?>" size="35" class="f-input" onfocus="this.select()" tip="复制成功，可以通过 MSN 或 QQ 发送给好友了" />
                            <br />
                            <input id="share-copy-button" type="button" value="复制" class="formbutton" />
                        </div>
                    </div>
                    <article class="wrapper">
                        <div class="fl">
                            <img src="/static/v2/img/logo_share.gif" title="分享" alt="分享">
                        </div>
                        <div class="fr wrapper">
                            <?php
                            $url = $INI['system']['wwwprefix'].'/r.php?r='.$login_user_id;
                            $url = urlencode($url);
                            ?>
                            <ul class="inline">
                                <li>
                                    分享到：
                                </li>
                                <li>
                                    <a class="kongjian" target="_blank" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo $url; ?>&title=%e5%91%8a%e8%af%89%e5%a4%a7%e5%ae%b6%e4%b8%80%e4%b8%aa%e5%92%b1%e6%9c%ac%e5%9c%b0%e7%9a%84%e5%9b%a2%e8%b4%ad%e7%bd%91%e7%ab%99%2c%e7%9c%9f%e5%ae%9e%e6%83%a0!">QQ空间</a>
                                </li>
                                <li>
                                    <a class="sina_weibo" target="_blank" href="http://service.weibo.com/share/share.php?url=<?php echo $url; ?>&title=%e5%91%8a%e8%af%89%e5%a4%a7%e5%ae%b6%e4%b8%80%e4%b8%aa%e5%92%b1%e6%9c%ac%e5%9c%b0%e7%9a%84%e5%9b%a2%e8%b4%ad%e7%bd%91%e7%ab%99%2c%e7%9c%9f%e5%ae%9e%e6%83%a0!">新浪微博</a>
                                </li>
                                <li>
                                    <a class="tx_weibo" target="_blank" href="http://share.v.t.qq.com/index.php?c=share&a=index&url=<?php echo $url; ?>&title=%e5%91%8a%e8%af%89%e5%a4%a7%e5%ae%b6%e4%b8%80%e4%b8%aa%e5%92%b1%e6%9c%ac%e5%9c%b0%e7%9a%84%e5%9b%a2%e8%b4%ad%e7%bd%91%e7%ab%99%2c%e7%9c%9f%e5%ae%9e%e6%83%a0!">腾讯微博</a>
                                </li>
                                <li>
                                    <a class="renren" target="_blank" href="http://widget.renren.com/dialog/share?resourceUrl=<?php echo $url; ?>&title=%e5%91%8a%e8%af%89%e5%a4%a7%e5%ae%b6%e4%b8%80%e4%b8%aa%e5%92%b1%e6%9c%ac%e5%9c%b0%e7%9a%84%e5%9b%a2%e8%b4%ad%e7%bd%91%e7%ab%99%2c%e7%9c%9f%e5%ae%9e%e6%83%a0!">人人</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <section class="rule">
                        <header>
                            <p>返利规则</p>
                        </header>
                        <ul>
                            <li>
                                <p>1、符合如下条件，立刻返利5元代金券：</p>
                                <ul>
                                    <li>
                                        a）您的好友点击您的专用邀请链接并注册
                                    </li>
                                    <li>
                                        b）注册后7天内购买当地团购且购买金额不小于5元
                                    </li>
                                    <li>
                                        c）好友购买后且完成消费后（即未退款）
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <p>2、5元代金券：有效期30天，全场通用，无购买金额限制，每订单限用1张代金券</p>
                            </li>
                            <li>
                                <p>3、累计总返利上限200元</p>
                            </li>
                            <li>
                                <p>4、优品会有权取消作弊用户的返利资格。法律范围内，优品会保留本次活动的最终解释权。</p>
                            </li>
                        </ul>
                    </section>
                </div>

                <table cellspacing="0" cellpadding="0" border="0" class="coupons-table">
                    <tr><th width="200">用户</th><th width="200">邀请时间</th><th width="200">状态</th></tr>
                    <?php if(is_array($invites)){foreach($invites AS $index=>$one) { ?>
                    <tr <?php echo $index%2?'':'class="alt"'; ?>><td><?php echo $users[$one['other_user_id']]['username']; ?></td><td><?php echo date('Y年m月d日 H:i', $one['create_time']); ?></td><td><?php echo invite_state($one); ?></td></tr>
                    <?php }}?>
                    <tr><td colspan="3"><?php echo $pagestring; ?></td></tr>
                </table>
            </div>

        </div>
    </div>
    <div class="new-order-right fr">
        <?php include template("usercenter/block_userinfo");?>
    </div>
    <div class="clear"></div>
</div>
<?php include template("footer");?>
