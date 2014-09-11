<?php
$g = Growth::GetGrowthListByUserId($login_user_id);
$gLevelNum = Growth::GetGrowthLevelNum($g['val']);
$gNeedVal = Growth::GetNeedVal($g['val']);
$uc = UserCenter::GetSavingMoneyCount($login_user_id);
?>
<article class="my-grow">
    <header>
        <p class="order-myName">Hi,<?php echo $login_user['username']; ?></p>
        <p class="wrapper">
            <span>等级：</span>
            <i class="fl order-myLevel level-<?php echo $gLevelNum; ?>" title="成长值:<?php echo $g['val']; ?>">2</i>
            <a class="fr" href="">如何升级？</a>
        </p>
        <p class="order-myPoints">积分：<em><?php echo $login_user['score']; ?></em></p>
    </header>
    <section>
        <p>成长状态：</p>
        <p class="wrapper">
            <span>V<?php echo $gLevelNum; ?></span>
            <span class="wrapper">
                <strong style="width:<?php echo $g['val']/($gNeedVal+$g['val'])*100; ?>%"><?php echo $g['val']; ?>/<?php echo $gNeedVal+$g['val']; ?></strong>
            </span>
            <span>V<?php echo $gLevelNum+1; ?></span>
        </p>
        <p class="gray">
            还需<?php echo $gNeedVal; ?>点成长值可升至<span class="right-number">V<?php echo $gLevelNum+1; ?></span>会员
            <a href="/user/points/index.php">详情</a>
        </p>
    </section>
    <footer>
        <p>
            你已团购
            <span class="right-number"><?php echo $uc['count']; ?></span>
            份
        </p>
        <p>
            共节省
            <span class="right-number">&yen;<?php echo $uc['sum']; ?></span> 元
        </p>
    </footer>
</article>