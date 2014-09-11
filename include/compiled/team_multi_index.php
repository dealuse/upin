<?php include template("header");?>
<?php if($REAL_LINK_GLOBAL['V3']){?>
<?php if($hideBigNav){?>
<?php include template("team_index/nav/index");?>
<?php } else { ?>
<?php include template("team_v3/nav");?>
<?php }?>
<?php } else { ?>
<?php include template("top_index_banner");?>
<!--{//include team_index/nav/index}-->
<?php }?>
<section id="list" class="mt10 fl">
    <!--ItemList-->
    <ul class="inline">
        <?php 
        $startingToday = strtotime(date('Y-m-d')); 
        $i = 0;
        $includeScript[] = 'team_index_lazyload';
        ?>
        <?php if(is_array($teams)){foreach($teams AS $tindex=>$item) { ?>
        <?php
        $hotArea = FALSE;
        if($item['class_bizarea']>0){
        $_hotArea = v2Func::getArea($item['city_id'],$item['class_bizarea']);
        $hotArea[] = $_hotArea['name'];
        }
        if($item['class_area']>0){
        $_hotArea = v2Func::getArea($item['city_id'],$item['class_area']);
        $hotArea[] = $_hotArea['name'];
        }
        $cutTime = $startingToday - $item['begin_time'];
        $i++;
        ?>
        <?php if($i<=50){?>
        <li>
            <?php } else if($i>50 && $i<=76) { ?>
        <li class="item-lazyload-step1" style="display: none">
            <?php } else { ?>
        <li class="item-lazyload-step2" style="display: none">
            <?php }?>
            <a class="img" href="/team.php?id=<?php echo $item['id']; ?>" target="_blank" title="<?php echo $item['title']; ?>" >
                <?php if($hotArea){?>
                <p class="v2-hotarea">商圈：<?php echo implode(',',$hotArea);; ?></p>
                <?php }?>
                <?php if($tindex <= 1){?>
                <img src="<?php echo team_image($item['image']); ?>" target="_blank" title="<?php echo $item['product']; ?>" alt="<?php echo $item['product']; ?>团购">
                <?php } else { ?>
                <img class="index-item-img" src="/static/v2/img/border.gif" data-original="<?php echo team_image($item['image']); ?>" target="_blank" title="<?php echo $item['title']; ?>" alt="<?php echo $item['title']; ?>">
                <?php }?>
            </a>
            <a class="des" href="/team.php?id=<?php echo $item['id']; ?>" target="_blank" title="<?php echo $item['title']; ?>">
                <h3><?php echo mb_substr($item['product'],0,16);; ?></h3>
                <p><?php echo $item['product_ind']; ?></p>
            </a>
            <p class="price wrapper">
                <span class="fl"><strong>&#36;<em><?php echo $item['team_price']; ?></em></strong><i>&#36;<?php echo $item['market_price']; ?></i></span>
                <span class="fr"><strong><?php echo $item['now_number']; ?></strong>人已购买</span>
            </p>
            <?php if($item['city_id'] > 0){?>
            <?php if($cutTime <= 0 && $item['sched_num'] <= 1 && $item['reservation'] == 0){?>
            <i class="today_no"></i>
            <?php } else if($cutTime <= 0 && $item['reservation'] != 0 && $item['sched_num'] <= 1) { ?>
            <i class="today"></i>
            <?php } else if($item['reservation'] == 0) { ?>
            <i class="no"></i>
            <?php }?>
            <?php } else { ?>
            <?php if($cutTime <= 0 && $item['sched_num'] <= 1){?>
            <i class="today"></i>
            <?php }?>
            <?php }?>
        </li>
        <?php }}?>
    </ul>
    <?php echo $pagestring; ?>
</section>

<aside id="side" class="fr mt10">
    <!--aipintuanCommitment-->
    
    <?php if($city['name'] == '鹤壁' || $city['name'] == '枣庄' || $city['name'] == '延安' || $city['name'] == '瑞安' || $city['name'] == '汉中'){?>
    <section class="box fs12">
        <div id="bannerFocus2" style="word-wrap:normal">
            <ul class="pic">
                <li>
                    <a href="/about/job.php" target="_blank">
                        <img src="/static/v2/img/zhaopin.jpg">
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <?php }?> 
    <?php if($city['name'] == '郑州' || $city['name'] == '西安' || $city['name'] == '济南' || $city['name'] == '鹤壁' || $city['name'] == '枣庄' || $city['name'] == '延安'){?>
    <section class="box fs12">
        <div id="bannerFocus" style="word-wrap:normal">
            <ul class="pic">
                <?php if($city['name'] == '郑州' ){?> 
                <li>
                    <a href="/hebi">
                        <img src="/static/v2/img/banner2.jpg">
                    </a>
                </li>
                <?php }?>
                <?php if($city['name'] == '西安'){?>
                <li>
                    <a href="/yanan">
                        <img src="/static/v2/img/banner3.jpg">
                    </a>
                </li>
                <?php }?>
                <?php if($city['name'] == '济南'){?> 
                <li>
                    <a href="/zaozhuang">
                        <img src="/static/v2/img/banner4.jpg">
                    </a>
                </li>
                <?php }?> 
                <?php if($city['name'] == '鹤壁' || $city['name'] == '枣庄' || $city['name'] == '延安' || $city['name'] == '瑞安' || $city['name'] == '汉中'){?>
                <li>
                    <a href="/account/refer.php" target="_blank">
                        <img src="/static/v2/img/fiveyuan.jpg">
                    </a>
                </li>
                <?php }?>
            </ul>
        </div>
    </section>
    <?php }?>
    <?php include template("ad/right_index_banner");?>
<?php include template("block_side_weibo");?>
<iframe width="265" height="450" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=265&height=450&fansRow=2&ptype=0&speed=0&skin=5&isTitle=0&noborder=1&isWeibo=1&isFans=0&uid=5264226494&verifier=fe6b9300&dpc=1"></iframe>

    <!--userHelp-->
    <?php include template("block_kefu");?>
    <!--LocationSitePoint-->
    <!--siteInfo-->
    <section class="info box fs12">
        <ul class="block">
            <li class="info-1">
                <a href="/about/job.php">
                    <p class="title">招贤纳士</p>
                    <p>点击查看招聘职位&gt;&gt;</p>
                </a>
            </li>
            <li class="info-2">
                <a href="/team/ask.php">
                    <p class="title">意见反馈</p>
                    <p>有您的建议，我们才能更好&gt;&gt;</p>
                </a>
            </li>
            <li class="info-3">
                <a href="/feedback/seller.php">
                    <p class="title">商务合作</p>
                    <p>想组织团购活动么？&gt;&gt;</p>
                </a>
            </li>
        </ul>
    </section>
    <!--基于全网历史的推荐 畅销-->
    <?php include template("ad/right_guess_like");?>

</aside>
<div style="clear: both;"></div>
<section class="friend-link">
    <script language="javascript">
        function woaicssq(num) {
            for (var id = 1; id <= 4; id++)
            {
                var MrJin = "woaicss_con" + id;
                var Tab = "tab" + id;
                if (id == num) {
                    document.getElementById(MrJin).style.display = "block";
                    document.getElementById(Tab).className = "tab1";
                } else {
                    document.getElementById(MrJin).style.display = "none";
                    document.getElementById(Tab).className = "tab2";
                }
            }
            if (num == 1)
                document.getElementById("woaicsstitle").className = "woaicss_title woaicss_title_bg1";
            if (num == 2)
                document.getElementById("woaicsstitle").className = "woaicss_title woaicss_title_bg2";
            if (num == 3)
                document.getElementById("woaicsstitle").className = "woaicss_title woaicss_title_bg3";
            if (num == 4)
                document.getElementById("woaicsstitle").className = "woaicss_title woaicss_title_bg4";
        }
    </script>

    <div class="slideTxtBox">
        <div class="hd" id="woaicsstitle">
            <ul>
                <li id="tab1" class="tab1"><a href="javascript:viod(0);"  onclick="woaicssq(1)">友情链接</a>

                </li>
           </ul>	
        </div>
        <div class="bd" >
            <ul  id="woaicss_con1" style="display:block;">
                <br />
                <?php if(is_array($friendlink)){foreach($friendlink AS $index=>$one) { ?>
                <li>
                    <a href="<?php echo $one['url']; ?>" title="<?php echo $one['title']; ?>" target="_blank" style="padding-left:0px; padding-right:20px;"><img src="<?php echo $one['logo']; ?>" alt="<?php echo $one['title']; ?>" /></a>
                </li>
                <?php }}?>
                
                </ul>

            </ul>
        </div>
    </div>

    <div style="clear: both"></div>
</section>
<?php include template("footer");?>