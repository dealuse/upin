<?php include template("header");?>

<div class="wrap new-order">
    <div class="fl" style="width:700px">
        <div class="uleft c3" id="uleft_ev56">
            <h2 id="uctit" style="display:none;">用户中心</h2>
            <h3 style="display:none;">交易管理</h3>
            <ul>
                <?php echo current_account('/order/index.php'); ?>
            </ul>

            <a class="faq" href="/help/faqs.php" target="_blank" style="display:none;">常见问题&gt;&gt;</a>
        </div>  <div class="uright" id="uright_ev56">
            <div class="utit wrapper">
                <h2 class="fl" style="display:block">订单详情</h2>
                <a class="fr" href="/order/index.php" title="返回我的订单" style="margin-top:4px">返回我的订单</a>
            </div>
            <div class="sect">
                <dl class="info-section" id="primary-info">
                    <?php if($order['state'] == 'unpay'){?>
                    <dt>当前订单状态：<em>未付款</em></dt>
                    <dd class="last">
                        <p>请及时付款，不然就被抢光啦！</p>
                        <p class="operation">
                            <a class="small-link-button" href="/order/check/146378214">付款</a>
                            <a class="inline-link order-cancel" href="/order/cancel/146378214">删除</a>
                        </p>
                    </dd>
                    <?php } else if($order['state'] == 'pay') { ?>
                    <?php if($order['rstate'] == 'normal'){?>
                    <dt>当前订单状态：<em>交易成功</em></dt>
                    <dd>
                        <p>您的订单状态正常
                            <?php if(!$order['express_time'] && $team['delivery']=='express'){?>
                            <a href="#" onclick="alert('您的催促发货请求已成功告知工作人员,我们会通知商家尽快为您发货');
                                    $(this).hide();
                                    return false;">催促发货</a>
                            <?php }?>
                        </p>
                    </dd>
                    <?php if(!$order['comment_time']){?>
                    <dd class="last">
                        <p>完成本次评价，可得<span><?php echo intval($order['origin']); ?></span>积分，赶快评价吧！</p>
                        <p class="wrapper mt5">
                            <a href="/order/ajax.php?action=ordercomment&id=<?php echo $order['id']; ?>" class="ajaxlink" title="评价得积分">评价得积分</a>
                        </p>
                    </dd>
                    <?php }?>
                    <?php } else if($order['rstate'] == 'askrefund') { ?>
                    <dt>当前订单状态：<em>申请退款</em></dt>
                    <dd class="last">
                        <p>正在为您办理退款，请稍候！</p>
                        <p>退款原因：<?php echo $order['rereason']; ?></p>
                    </dd>
                    <?php } else if($order['rstate'] == 'norefund') { ?>
                    <dt>当前订单状态：<em>拒绝退款</em></dt>
                    <dd class="last">
                        <p>Sorry!!!您的退款申请审核失败，无法为您办理退款！</p>
                        <p>退款原因：<?php echo $order['rereason']; ?></p>
                        <p>拒绝退款原因:<?php echo $order['norefund_reason']; ?></p>
                    </dd>
                    <?php } else if($order['rstate'] == 'payandrefund') { ?>
                    <dt>当前订单状态：<em>部分退款</em>,累计已退款<em>$<?php echo $order['rmoney']; ?></em></dt>
                    <dd class="last">
                        <p>您的订单已经部分退款！</p>
                        <p>退款原因：<?php echo $order['rereason']; ?></p>
                        <?php if($order['norefund_reason']){?>
                        <p>拒绝退款原因:<?php echo $order['norefund_reason']; ?></p>
                        <?php }?>
                    </dd>
                    <?php }?>
                    <?php } else if($order['state'] == 'refund') { ?>
                    <dt>当前订单状态：<em>退款成功</em>，已退款<em>$<?php echo $order['rmoney']; ?></em>，处理时间<?php echo date('Y-m-d H:i',$order['retime']); ?></dt>
                    <dd class="last">
                        <p><b>退款详情：</b>退款处理成功，已退至您的<a href="/credit/index.php" ><?php echo $INI['system']['sitename']; ?>余额</a>！</p>
                        <p>提现功能已调整至<a href="/credit/index.php" ><?php echo $INI['system']['sitename']; ?>余额</a>页面，您可直接从<a href="/credit/index.php" ><?php echo $INI['system']['sitename']; ?>余额</a>提现</p>
                        <p>退款原因：<?php echo $order['rereason']; ?></p>
                    </dd>
                    <?php }?>

                </dl>
                <?php if($order['state'] == 'pay' && $team['delivery']=='express' ){?>
                <?php
                /*计算当前在第几步*/
                /******第一步******/
                $expressStatus = array();
                $expressStatus[0] = $order['pay_time'];
                /******第二步******/

                if(strtotime('+2 hours 31 seconds',$order['pay_time']) <= time()){/*两个小时以后*/
                $expressStatus[1] = strtotime('+2 hours 931 seconds',$order['pay_time']);
                }
                /******第三步******/
                if(strtotime('+1 days 165 seconds',$order['pay_time']) <= time()){/*12小时以后，状态为正在出库*/
                $expressStatus[2] = strtotime('+1 days 165 seconds',$order['pay_time']);
                }
                /******第四步******/
                if($order['express_time']){
                $expressStatus[3] = $order['express_time'];
                }
                /******第五步******/
                if($order['complate_time']){
                $expressStatus[4] = $order['complate_time'];
                }

                $step = count($expressStatus);
                ?>
                <dl class="express-status-section" >
                    <dd>
                        <ul class="order_satus05 stu<?php echo $step; ?>">
                            <li <?php echo  ( $step > 0)? "class='stuPass'":""; ?>>订单提交成功</li>
                            <li <?php echo  ( $step > 1)? "class='stuPass'":""; ?>>商家配货中</li>
                            <li <?php echo  ( $step > 2)? "class='stuPass'":""; ?>>商家已发货</li>
                            <li <?php echo  ( $step > 3)? "class='stuPass'":""; ?>>商品配送中</li>
                            <li <?php echo  ( $step > 4)? "class='stuPass'":""; ?>>收货完成</li>
                        </ul>
                        <ul class="order_date clearfix">
                            <li>
                                <?php if($expressStatus[0]){?>
                                <p><?php echo date('Y-m-d',$expressStatus[0]); ?><p><p><?php echo date('H:i:s',$expressStatus[0]); ?></p>
                                <?php }?>
                            </li>
                            <li>
                                <?php if($expressStatus[1]){?>
                                <p><?php echo date('Y-m-d',$expressStatus[1]); ?><p><p><?php echo date('H:i:s',$expressStatus[1]); ?></p>
                                <?php }?>
                            </li>
                            <li>
                                <?php if($expressStatus[2]){?>
                                <p><?php echo date('Y-m-d',$expressStatus[2]); ?><p><p><?php echo date('H:i:s',$expressStatus[2]); ?></p>
                                <?php }?>
                            </li>
                            <li>
                                <?php if($expressStatus[3]){?>
                                <p><?php echo date('Y-m-d',$expressStatus[3]); ?><p><p><?php echo date('H:i:s',$expressStatus[3]); ?></p>
                                <?php }?>
                            </li>
                            <li>
                                <?php if($expressStatus[4] && $expressStatus[3]){?>
                                <p><?php echo date('Y-m-d',$expressStatus[4]); ?><p><p><?php echo date('H:i:s',$expressStatus[4]); ?></p>
                                <?php } else if($expressStatus[3] && !$expressStatus[4] ) { ?>
                                <p><a id="expressComplate" class="small-link-button ajaxlink" href="/ajax/order.php?action=orderComplate&id=<?php echo $order[id]; ?>">确认收货</a></p>
                                <?php }?>
                            </li>
                        </ul>
                    </dd>
                    <?php if($order['express_no']){?>
                    <dd>
                        <ul class="schedule" id="express_schedule">
                            <li>
                                <p class="stime"><b>操作时间</b></p>
                                <p class="records"><b>货物跟踪信息</b></p>
                                <p class="operator">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>操作人</b></p>
                            </li>
                            <!-- 加载快递信息 -->

                        </ul>
                        <script type="text/javascript">
                                $(function() {
                                    $('#express_schedule').mask('加载中...');
                                    $.get("/ajax/kuaidi100.php?id=<?php echo $order['express_id']; ?>&no=<?php echo $order['express_no']; ?>&isjson=true", function(expressInfo) {
                                        var expInfo = eval("(" + expressInfo + ")");
                                        var mailNo = expInfo.mailNo;//:快递单号
                                        var expSpellName = expInfo.expSpellName;//:快递公司英文代码
                                        var expTextName = expInfo.expTextName;//:快递公司中文名
                                        var ord = expInfo.ord;
                                        //alert(expInfo.cache);
                                        var $controller = $('#express_schedule');
                                        try {
                                            if (expInfo.status == 0) {
                                                var item = '<li style="color:red;font-weight:bold;">' +
                                                        expInfo.message +
                                                        '</li>';
                                                $controller.append(item);
                                            } else if (expInfo.status > 0 && expInfo.status < 4) {
                                                //正常
                                                var data = expInfo.data;
                                                for (var idx in data) {

                                                    var context = data[idx].context;
                                                    var time = data[idx].time;
                                                    var item = '<li sort="' + idx + '">' +
                                                            '<p class="stime" >' + time + '</p>' +
                                                            '<p class="records" >' + context + '</p>' +
                                                            '<p class="operator" >' + expTextName + '</p>' +
                                                            '</li>';
                                                    $controller.append(item);
                                                }
                                                $controller.find('li[sort]:' + (ord == 'DESC' ? 'first' : 'last')).css('color', 'red').css('font-weight', 'bold');
                                            }
                                        } catch (ex) {
                                            alert(ex.message);
                                        } finally {
                                            $('#express_schedule').unmask();
                                        }

                                    });
                                });
                        </script>
                    </dd>
                    <?php }?>
                </dl>
                <?php }?>
                <dl class="bunch-section">
                    <dt>订单信息</dt>
                    <dd>
                        <ul class="flow-list">
                            <li>订单编号：<strong><?php echo $order['id']; ?></strong></li>
                            <li>下单时间：<span><?php echo date('Y-m-d H:i',$order['create_time']); ?></span></li>
                        </ul>
                        <?php if($order['pay_time']){?>
                        <ul class="flow-list">
                            <li>付款方式：<?php if($order['credit']){?>余额支付 <b><?php echo moneyit($order['credit']); ?></b> 元<?php }?>&nbsp;<?php if($order['service']!='credit'&&$order['money']){?><?php echo $payservice[$order['service']]; ?>支付 <b><?php echo moneyit($order['money']); ?></b> 元<?php }?><?php if($order['card_id']){?>&nbsp;代金券：<b><?php echo moneyit($order['card']); ?></b> 元<?php }?></li>
                            <li>付款时间：<span><?php echo date('Y-m-d H:i',$order['pay_time']); ?></span></li>
                        </ul>
                        <?php }?>
                    </dd>


                    <?php if($team['delivery']=='coupon'){?>
                    <dt><?php echo $INI['system']['couponname']; ?>信息</dt>
                    <dd>
                        <ul class="order-coupon">
                            <li>手机号码：<b><?php echo $order['mobile']; ?></b><a class="ajaxlink ml10" href="/ajax/coupon.php?action=smsresend&id=<?php echo $order['id']; ?>" class="">重发短信</a></li>
                            <li><?php if(empty($coupons)){?><?php echo $INI['system']['couponname']; ?>将在团购成功后，由系统自动发放<?php }?>
                                <?php if(is_array($coupons)){foreach($coupons AS $one) { ?>
                                <p style="margin: 3px 0;background-color: #fffbf2">
                                    <?php if($one['consume'] == 'Y' ){?>
                                    券号：<?php echo $one['id']; ?>&nbsp;&nbsp;已消费<?php echo date('Y-m-d',$one['consume_time']); ?>
                                    <?php } else if($one['consume'] == 'AR' ) { ?>
                                    券号：<?php echo $one['id']; ?>&nbsp;&nbsp;申请退款
                                    <?php } else if($one['consume'] == 'R' ) { ?>
                                    券号：<?php echo $one['id']; ?>&nbsp;&nbsp;已退款<?php echo date('Y-m-d',$one['refund_time']); ?>
                                    <?php } else if(($one['expire_time'] <= time())) { ?>
                                    券号：<?php echo $one['id']; ?>&nbsp;&nbsp;已过期<?php echo date('Y-m-d',$one['expire_time']); ?>
                                    <?php } else if($one['consume'] == 'N') { ?>
                                    券号：<?php echo $one['id']; ?>&nbsp;&nbsp;正常，有效期<?php echo date('Y-m-d',$one['expire_time']); ?>&nbsp;&nbsp;
                                    <?php }?>
                                </p>
                                <?php }}?>
                            </li>
                            <li>使用方法：至商家消费时，请出示<?php echo $INI['system']['couponname']; ?>，配合商家验证<?php echo $INI['system']['couponname']; ?>编号</li>
                        </ul>
                    </dd>
                    <?php } else if($team['delivery']=='voucher') { ?>
                    <dt>商户券信息</dt>
                    <dd>
                        <ul class="order-voucher">
                            <li>手机号码：<b><?php echo $order['mobile']; ?></b></li>
                            <li><?php if(empty($vouchers)){?>商户券将在团购成功后，由系统自动发放<?php }?><?php if(is_array($vouchers)){foreach($vouchers AS $one) { ?><p style="margin: 3px 0;background-color: #fffbf2">商户券：<?php echo $one['code']; ?>&nbsp;&nbsp;<a href="/ajax/coupon.php?action=vouchersms&id=<?php echo $one['id']; ?>" class="ajaxlink">重发短信</a></p><?php }}?></li>
                            <li>使用方法：至商家消费时，请出示商户券编码，商户券直接可抵用</li>
                        </ul>
                    </dd>
                    <?php } else if($team['delivery']=='express') { ?>
                    <dt>配送信息</dt>
                    <dd>
                        <ul class="order-address">

                            <li>收件人：<?php echo $order['realname']; ?></li>
                            <li>收件地址：<?php echo $order['province']; ?> <?php echo $order['city']; ?> <?php echo $order['area']; ?> <?php echo $order['address']; ?></li>
                            <li>邮政编码：<?php echo $order['zipcode']; ?></li>
                            <li>手机号码：<?php echo $order['mobile']; ?></li>
                            <?php if($order['remark']){?>
                            <li>特殊说明：<?php echo htmlspecialchars($order['remark']); ?></li>
                            <?php }?>
                            <?php if($order['pay_time']){?>
                            <li>快递信息：<?php if($order['express_id']&&$order['express_no']){?><?php echo $option_express[$order['express_id']]; ?>：<?php echo $order['express_no']; ?><?php } else { ?>您所购买的商品将会在两个工作日内发货,我们即将上传快递单号,请耐心等待.<?php }?>
                                <?php if(!$order['express_time'] && $team['delivery']=='express'){?>
                                <a href="#" onclick="alert('您的催促发货请求已成功告知工作人员,我们会通知商家尽快为您发货');
                                    $(this).hide();
                                    return false;">催促发货</a>
                                <?php }?>
                            </li>
                            <?php }?>
                        </ul>
                    </dd>
                    <?php } else if($team['delivery']=='pickup') { ?>
                    <dt>上门自提</dt>
                    <dd>
                        <ul class="order-pickup">
                            <li>取货地址：<?php echo $team['address']; ?></li>
                            <li>联系电话：<?php echo $team['mobile']; ?></li>
                        </ul>
                    </dd>
                    <?php }?>
                    <dt>团购信息</dt>
                    <dd>
                        <!-- 商品信息begin -->
                        <table cellspacing="0" cellpadding="0" border="0" class="mtinfo-table">
                            <tr>
                                <th class="left" width="auto">团购项目</th>
                                <th width="50">单价</th>
                                <th width="10"></th>
                                <th width="30">数量</th>
                                <?php if($order['fare'] > 0){?>
                                <th width="10"></th>
                                <th width="30">运费</th>
                                <?php }?>
                                <?php if($order['card_id']){?>
                                <th width="10"></th>
                                <th width="30">代金券</th>
                                <?php }?>
                                <th width="10"></th>
                                <th width="54">支付金额</th>
                            </tr>
                            <tr>
                                <td class="left">
                                    <?php if($team){?>
                                    <a href="/team.php?id=<?php echo $order['team_id']; ?>" title="<?php echo $team['title']; ?>" target="_blank"><?php echo $team['product_ind']; ?></a>
                                    <?php } else { ?>
                                    <font color="red">商品不存在或已下架</font>
                                    <?php }?>
                                </td>
                                <td><span class="money"><?php echo $currency; ?></span><?php echo moneyit($order['price']); ?></td>
                                <td>x</td>
                                <td><?php echo $order['quantity']; ?></td>
                                <?php if($order['fare'] > 0){?>
                                <td>+</td>
                                <td><?php echo $currency; ?></span><?php echo moneyit($order['fare']); ?></td>
                                <?php }?>
                                <?php if($order['card_id']){?>
                                <td>+</td>
                                <td><?php echo $currency; ?></span><?php echo moneyit($order['card']); ?></td>
                                <?php }?>
                                <td>=</td>
                                <td class="total"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($order['origin']); ?></td>
                            </tr>
                        </table>
                        <!-- 商品信息end -->
                    </dd>
                    <?php if($order['condbuy']){?>
                    <dt>商品类型</dt>
                    <dd>
                        <ul >
                            <li><?php echo str_replace("\n","，",str_replace("@","*",$order['condbuy'])); ?></li>
                        </ul>
                    </dd>
                    <?php }?>
                </dl>




            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>
<?php include template("footer");?>
