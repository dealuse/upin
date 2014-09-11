<?php
if($_GET['tn'] && $_GET['baiduid']){
Session::Set('from_baidu',array('tn'=>$_GET['tn'],'baiduid'=>$_GET['baiduid']));
Session::Set('is_baidu','1');
}
?>
<?php include template("header");?>
<!--include block_block_banner-->
<?php if($team['close_time']){?>
<div class="mtips"><span class="red">抱歉，您来晚了，该商品团购已经结束!</span>不想错过明天的团购？立刻订阅每日最新团购信息：<a target="_blank" href="/subscribe.php?ename=<?php echo $city['ename']; ?>" >我要订阅</a></div> 
<?php }?>
<?php if($order){?>
<div class="mtips" id="nopayDiv"><span class="red">您已经下过订单，但还没有付款。（<a id="payurl" href="/order/check.php?id=<?php echo $order['id']; ?>">点击付款</a>）</span></div>
<?php }?>

<div class="iwrap"> 
    <!-- 左侧 -->
    <div style="float:left">
        <div class="i_fl" style="float:none;">
            <!-- 商品主介绍 -->
            <div class="main">
                <h2><?php if($team['close_time']==0){?><span class="c2"><a class="deal-today-link" href="/team.php?id=<?php echo $team['id']; ?>">今日团购：</a></span><?php }?><?php echo $team['title']; ?></h2>
                <div class="mmain">
                    <div class="lmain">
                        <table class="discount" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>原价</th>
                                    <th class="discount_border">折扣</th>
                                    <th>节省</th>
                                </tr>
                                <tr>
                                    <td><del>&yen;<?php echo moneyit($team['market_price']); ?></del></td>
                                    <td class="discount_border"><?php echo team_discount($team); ?>折</td>
                                    <td><span class="c2">&yen;<?php echo $discount_price; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php if(($team['state']=='soldout')){?>				

                        <div class="buyinfo">	
                            <p class="buynum">团购已卖光<br/>共有<span class="c2" style="color:#F00; font-size:25px"><?php echo $team['now_number']+$team['pre_number']; ?></span>人购买</p>
                            <p class="timeleft"><span class="savetime"><?php echo $diff_time; ?>000</span>本团购结束时间：<br/><span class="showTime"><?php echo date('Y-m-d', $team['close_time']); ?> <?php echo date('H:i:s', $team['close_time']); ?></span></p>
                            <p class="success s_js">团购已卖光，查看<a href="/team/index.php">其他团购</a></p>
                        </div>
                        <div class="order sold"><span>已卖光</span><em >&yen;<?php echo moneyit($team['team_price']); ?></em></div>
                        <?php } else if($team['close_time']) { ?>				

                        <div class="buyinfo">	
                            <p class="buynum">团购已结束<br/>共有<span class="c2" style="color:#F00; font-size:25px"><?php echo $team['now_number']+$team['pre_number']; ?></span>人购买</p>
                            <p class="timeleft"><span class="savetime"><?php echo $diff_time; ?>000</span>本团购结束于：<br/><span class="showTime"><?php echo date('Y-m-d', $team['close_time']); ?> <?php echo date('H:i:s', $team['close_time']); ?></span></p>
                            <p class="success s_js">团购已结束，查看<a href="/team/index.php">其他团购</a></p>
                        </div>
                        <div class="order end"><span>已结束</span><em >&yen;<?php echo moneyit($team['team_price']); ?></em></div>
                        <?php } else { ?>
                        <div class="buyinfo">
                            <p class="buynum"><span class="c2" style="color:#F00; font-size:25px"><?php echo $team['now_number']+$team['pre_number']; ?></span><span class="yigoumai">人已购买</span><br/><span class="shuliang">数量有限，下单要快哟</span></p>
                            <p class="timeleft"><span id="savetime" class="savetime"><?php echo $diff_time; ?>000</span> 距离本次团购结束还有：<br/><span id="deal-timeleft" class="showTime"><i>加载中...</i></span> </p>
                            <p class="success">团购已成功，可继续购买</p>
                        </div>
                        <div class="order <?php echo $team['begin_time']<time()?'buy':'wait'; ?>">
                            <a <?php echo $team['begin_time']<time()?'href="/team/buy.php?id='.$team['id'].'"':''; ?>>抢购</a>
                            <em >&yen;<?php echo moneyit($team['team_price']); ?></em>
                        </div>
                        <?php }?> 
                    </div>
                    <div class="rmain deal-buy-cover-img" id="team_images"> 
                    <?php if($team['image1']||$team['image2']){?>
                        <div class="mid">
                            <ul>
                                <li class="first"><img src="<?php echo team_image($team['image']); ?>"/></li>
                            <?php if($team['image1']){?>
                                <li><img src="<?php echo team_image($team['image1']); ?>"/></li>
                            <?php }?>
                            <?php if($team['image2']){?>
                                <li><img src="<?php echo team_image($team['image2']); ?>"/></li>
                            <?php }?>
                            </ul>
                            <div id="img_list">
                                <a ref="1" class="active">1</a>
                            <?php $imageindex=1;; ?>
                            <?php if($team['image1']){?>
                                <a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
                            <?php }?>
                            <?php if($team['image2']){?>
                                <a ref="<?php echo ++$imageindex; ?>" ><?php echo $imageindex; ?></a>
                            <?php }?>
                            </div> 
                        </div>
                        <?php } else { ?>
                            <img src="<?php echo team_image($team['image']); ?>" width="440" height="280" />
                        <?php }?>
                    </div>
                    <div class="clear"></div>
                </div>
                <span class="yj lt"></span><span class="yj rt"></span><span class="yj lb"></span><span class="yj rb"></span>
                <?php include template("block_team_share");?>
            </div>
            <!-- 商品主介绍 end --> 
            <!-- 商品详情 -->
            <div class="xq">
                <ul class="xqlist c3">
                    <li class="tab_btn cur"><a>商品详情</a></li>
                    <!--<li class="tab_btn"><a>配送说明</a></li>-->
                </ul>
                <div class="deal_tools" style="display:none;">
                    <ul>
                        <li id="to_xqlist">本单详情</li>
                        <li id="to_pingjia">购买评价</li>
                        <li id="to_shouhou">商家简介</li>
                        <li class="buy_fix">
                            <a href="/team/buy.php?id=<?php echo $team['id']; ?>"></a>
                            <span>&yen;&nbsp;<?php echo moneyit($team['team_price']); ?></span>
                        </li>
                    </ul>
                </div>
                <div class="details wide localteams">
                    <style type="text/css">
                        #ev56_main_side .blk_ev56 img{width: expression(this.width > 600 ? 600: true); max-width: 600px;margin-left:auto; margin-right:auto; display:block}
                    </style>		
                    <div id="ev56_main_side" class="localDetail" class="tab_box">
                        <?php if(trim($team['detail'])){?>
                        <!--<h2 id="detail">本单详情</h2>-->
                        <div class="blk_ev56 detail"><?php echo $team['detail']; ?></div>
                        <?php }?>
                        <?php if(trim(strip_tags($team['systemreview']))){?>							
                        <div class="quote_tit2_div">
                            <ul class="sharecon">
                                <li>分享到 ：</li>
                                <li><a class="i_sina" href="<?php echo share_sina($team); ?>" target="_blank">新浪</a></li>
                                <li><a class="i_qq"  href="<?php echo share_tencent($team); ?>" target="_blank">腾讯</a></li>
                            </ul>
                            <h3 class="quote_tit2"><?php echo $INI['system']['abbreviation']; ?>说</h3>
                        </div>
                        <span id="syscomment">
                            <div class="blk_ev56 review"><?php echo $team['systemreview']; ?></div>
                        </span>
                        <?php }?>
                    </div>
                    <div class="tab_box" style="display:none;">
                        <div class="detail_tab" id="detail_send_tab">
                            <ul>
                                <li class="detail_tabbj"></li>
                            </ul>
                        </div>
                        <div class="detail_send_con">
                            <ul>
                                <li>
                                    <b class="detail_send_pos">快递费用</b>
                                    <span>
                                        <?php echo $express_info[0]; ?>
                                    </span>
                                </li>
                                <li>
                                    <b class="detail_send_ems">默认快递</b>
                                    <span><?php echo $express_info[1]; ?></span>
                                </li>
                                <li>
                                    <b class="detail_send_ran">配送范围</b>
                                    <span><?php echo $express_info[2]; ?></span>
                                </li>
                                <li>
                                    <b class="detail_send_cit">发货城市</b>
                                    <span><?php echo $express_info[3]; ?></span>
                                </li>
                                <li>
                                    <b class="detail_send_tim">发货时间</b>
                                    <span><?php echo $express_info[4]; ?></span>
                                </li>
                                <li>
                                    <b class="detail_send_pro">签收提示</b>
                                    <span><?php echo $express_info[5]; ?></span>
                                </li>
                            </ul>
                        </div>					
                    </div>
                </div>
                <!-- 本地服务，商家地址 -->
                <div class="sidelocal" style="padding: 6px 10px;width: 203px;">
                    <?php include template("daigoudian/locationsite_yanan");?>
                    <?php include template("daigoudian/locationsite_hebi");?>
                    <?php include template("daigoudian/locationsite_ankang");?>
                      <?php include template("daigoudian/locationsite_hanyin");?>
                    <?php include template("daigoudian/locationsite_xingping");?>
                    <div id="side-business" style="word-break: break-all;" class="fs12">
                        <h2><?php echo mb_substr($partner['title'],1); ?></h2>
                        <div><strong>地址：</strong><?php echo $partner['address']; ?></div>
                        <div><strong>联系电话：</strong><?php echo $partner['phone']; ?></div>
                        <div><a href="<?php echo $partner['homepage']; ?>" target="_blank"><?php echo domainit($partner['homepage']); ?></a></div>
                        <div class="mb10"><strong>位置信息：</strong><?php echo str_replace('位置信息：','',$partner['location']); ?></div>
                        <?php include template("block_block_partnermap");?>
                    </div>
                    <script type="text/javascript">document.write('<iframe width="150" height="210" frameborder="0" scrolling="no" src="http://widget.weibo.com/relationship/bulkfollow.php?language=zh_cn&uids=2797879823&wide=1&color=FFFFFF,FFFFFF,FF7E00,666666&showtitle=0&showinfo=1&sense=0&verified=1&count=1&refer=' + encodeURIComponent(location.href) + '&dpc=1"></iframe>')</script>
                </div>
                <!-- 本地服务，商家地址 -->
                <div class="clear"></div>
                <div class="pingjia" style="height: 0px; position: relative; top: -30px;"></div>
                <span class="fx flt"></span>
                <!-- bottom -->
                
                <?php if($team['state']!='soldout' && !$team['close_time']){?>
                <div class="quick-buy">
                    <div class="quick-buy-left">

                        <div class="quick-buy-left-line" >
                            <!-- Baidu Button BEGIN -->
                            <?php if($city['id'] == 355){?>
                            <div id="bdshare" style="display:inline-block;float:none;" 
                                 class="bdshare_t bds_tools get-codes-bdshare" data="{'bdDes':'优品会','text':'<?php echo $team['title']; ?>','title':'<?php echo $team['product']; ?>','url':'/team/<?php echo $team['id']; ?>.html?r=<?php echo $login_user_id; ?>'}">
                                <span class="bds_more">邀请好友首次购买返利5元：</span>
                                <?php } else { ?>
                                <div id="bdshare" style="display:inline-block;float:none;" 
                                     class="bdshare_t bds_tools get-codes-bdshare" data="{'bdDes':'优品会','text':'<?php echo $team['title']; ?>','title':'<?php echo $team['product']; ?>','url':'/team/<?php echo $team['id']; ?>.html'}">
                                    <span class="bds_more">分享到：</span>
                                    <?php }?>
                                    <a class="bds_qzone">QQ空间</a>
                                    <a class="bds_tsina">新浪微博</a>
                                    <a class="bds_tqq">腾讯微博</a>
                                    <a class="bds_renren">人人网</a>
                                    <a class="bds_t163">网易微博</a>
                                </div>

                                <!-- Baidu Button END -->
                            </div>
                        </div>
                        <a class="quick-buy-right" href="/team/buy.php?id=<?php echo $team['id']; ?>"><img src="/static/theme/ev56_58/css/images/quick_buy_btn.png" /></a>

                    </div>
                    <?php }?>
                    <!-- bottom -->
                </div>
                <!-- 商品详情 end -->
            </div>
            <!--include block_side_bottoms-->
            <!--include block_bottom_taoke-->
        </div>
        <!-- 左侧 end --> 
        <div class="i_frr">
            <?php include template("block_side_guanggao");?>
            <?php include template("block_side_chengnuo");?>
            <!--本单答疑--> 
            <?php include template("block_side_ask");?>
            <!--include block_side_taoke-->

        </div>
        <div class="clear"></div>
    </div>

    <?php $includeScript[] = 'team_old'; ?>
    <?php include template("footer");?>
        <script type="text/javascript">

jQuery.ready(function(){
    alert('hi');
});

    </script>
