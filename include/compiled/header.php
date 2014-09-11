<?php include template("html_header");?>

<article id="topNav">
    <div class="container fs12">
        <ul class="inline-block fl">
            <li class="mail">
                <a href="/subscribe.php">邮件订阅</a>
            </li>
            <li class="phone">
                <a id="verify-coupon-id" href="javascript:;"><?php echo $INI['system']['couponname']; ?>验证</a>
            </li>
            <li class="phone">
                <a href="javascript:;" onclick="return X.misc.locale();">简繁转换</a>
            </li>
        </ul>
        <ul class="inline-block fr">
            <?php if($login_user){?>
            <li id="login-1" class="wrapper"><span class="fl">您好,<?php echo mb_substr($login_user['username'],0,15);; ?></span><i class="level-111"></i></li>
            <li id="login-2">
                <a href="/order/index.php">[我的优品会]</a>
            </li>
            <li id="login-3">
                <a href="/account/logout.php">[退出]</a>
            </li>
            <?php } else { ?>
            <li id="login-1">您好,欢迎您来到优品会</li>
            <li id="login-2">
                <a href="/account/login.php">登录</a>
            </li>
            <li id="login-3">
                <a href="/account/loginup.php">免费注册</a>
            </li>
            <?php }?>
            <li class="addFavorite">
                <a href="#" title="<?php echo $INI['system']['sitename']; ?>" rel="nofollow" onclick="jQuery.addFavorite('<?php echo $INI['system']['wwwprefix']; ?>', '<?php echo $INI['system']['sitename']; ?>'); return false;">收藏我们</a>
            </li>
            <li class="help pr">
                <a id="help" href="/help/tour.php" target="_blank">帮助中心</a>
                <ul>
                    <li>
                        <a href="/help/tour.php" target="_blank">如何团购</a>
                    </li>
                    <li>
                        <a href="/help/faqs.php" target="_blank">常见问题</a>
                    </li>
                    <li>
                        <a href="/feedback/suggest.php" target="_blank">意见反馈</a>
                    </li>
                    <li>
                        <a href="/feedback/seller.php" target="_blank">商务合作</a>
                    </li>
                </ul>
            </li>
            <li class="call">
                <a>604-655-8658</a>
            </li>
            <!--
            <li class="last weibo">
                <a href="http://weibo.com/u/2797879823" target="_blank">加关注</a>
            </li>
            -->
        </ul>
    </div>
</article>
<header id="header">
    <div class="container">
        <!--LOGO-->
        <a href="/index.php"><h1 class="fl">优品会</h1></a>
        <!--城市-->
        <div class="fl">
            <h2>温哥华</h2>
            <a href="/city.php">[切换城市]</a>
        </div>
        <section class="search fl">
            <form class="wrapper mb5" action="/subscribe.php" method="GET">
                <input id="text1" autocomplete="off" value="" name="email" style="float:left;border-color:#ff6f00;height:26px;width:300px;" type="text" placeholder="请输入email地址" datatype="email" required="true" >
                <input type="hidden" name="city_id" value="<?php echo $city['id']; ?>">
                <!--
                <select style="float:left;width:80px;border-color:#ff6f00;height:32px;" name="city_id" class="f-city"><?php echo Utility::Option(Utility::OptionArray($allcities, 'id', 'name'), $city['id']); ?></select>      
                -->         
                <input id="search" type="submit" value="订阅" style="border-radius:3px;margin-left:5px;">
                <div class="search-list">
                    <ul></ul>
                </div>
            </form>
  </section>
        <!--帐户-->
        <ul class="inline-block user fr">
            <li>
                <a class="myAP" href="/order/index.php">我的优品会</a>
                <div class="user_box box fs12">
                    <div class="wrapper login" id="login-bottom-1">
                        <?php if($login_user){?>
                        <p class="fl"><strong>您好,<?php echo mb_substr($login_user['username'],0,15);; ?></strong></p>
                        <a class="fl" style="margin-left: 10px;" href="/account/logout.php">[退出]</a>
                        <?php } else { ?>
                        <p class="fl">您好！请</p>
                        <a class="fl" href="/account/login.php">登录</a>
                        <a class="fl" style="margin-left: 10px;" href="/account/loginup.php">[注册]</a>
                        <?php }?>
                    </div>
                    <ul class="block list fl">
                        <li>
                            <a href="/coupon/index.php">我的优惠券&gt;</a>
                        </li>
                         <li>
                            <a href="/order/index.php">我的订单&gt;</a>
                        </li>
                        <li>
                            <a href="/credit/index.php">账户余额&gt;</a>
                        </li>
                        <li class="last">
                            <a href="/credit/charge.php">余额充值&gt;</a>
                        </li>                                        
                    </ul>
                    <div class="lately hide">
                        <div class="wrapper"><p class="fl">最近浏览的商品：</p></div>
                        <ul class="inline-block" id="item-history"></ul>
                    </div>
                </div>
            </li>
            <li class="hide">
                <a class="myPoints button" href="/user/points/">优品会积分</a>
            </li>
        </ul>
    </div>
</header>
<nav id="mainNav">
    <div class="container">
        <ul class="inline-block fl" id="menuOfUl">
            <li<?php echo $classon['index']; ?>><a href="/index.php"><span>首页</span></a></li>
            <li<?php echo $classon['mall']; ?>><a href="/team/index.php"><span>全部团购</span></a></li>
        </ul>
    </div>
</nav>
<?php if($session_notice=Session::Get('notice',true)){?>
<div class="mtips" style="position:relative;" id="successTips"><p><?php echo $session_notice; ?></p><em class="close" onclick="hidetips();">close</em></div>
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
<div class="mtips" style="position:relative;" id="errorTips"><p><?php echo $session_notice; ?></p><em class="close" onclick="hidetips();">close</em></div>
<?php }?>
<section id="content" class="container">