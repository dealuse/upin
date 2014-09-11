<?php 
$others_team_id = abs(intval($team['id']));
$others_city_id = abs(intval($city['id']));

    $today = strtotime(date('Y-m-d'));
    $cond = array(
            "id <> '$others_team_id'",
            'team_type' => 'normal',
            "begin_time <= $today",
            "end_time > $today",
            );
    /* 数据库匹配多个城市订单,前者按照多城市搜索,后者兼容旧字段city_id搜索 */
    $cond[] = "((city_ids like '%@$others_city_id@%' or city_ids like '%@0@%') or city_id in(0,$others_city_id))";

    $order = 'ORDER BY sort_order DESC, begin_time DESC, id DESC';
    /* normal team */
    $others = DB::LimitQuery('team', array(
                'condition' => $cond,
                'order' => $order,
                ));

; ?>
<?php if($others){?>
<div class="rbox b15" id="plist" style="width:263px;">
    <h3 style="font-size:20px;width:233px;">今日其它团购</h3>
    <ul>
        <?php $index=0; ?>
        <?php if(is_array($others)){foreach($others AS $one) { ?>
        <li style="padding-left:25px;">
            <h2 style="overflow: hidden; height: 180px;">
                <a style=" font:14px/1.2 微软雅黑;" id="othersfirsturl<?php echo $one['id']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>">
                    <?php if($one['image']){?>
                    <img class="index-item-img" src="/static/v2/img/border.gif" data-original="<?php echo team_image($one['image'],true); ?>" width="210" height="131" alt="<?php echo $one['title']; ?>"/>
                    <?php }?><?php echo mb_substr($one['title'],0,29,'utf-8'); ?></a></h2>
            <p><a id="otherssecondurl<?php echo $one['id']; ?>" href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" >去看看</a><span>&yen;<?php echo moneyit($one['team_price']); ?></span>&nbsp;&nbsp;&nbsp;原价<del><?php echo $one['market_price']; ?></del></p>
        </li>
        <?php }}?>
    </ul>
</div>
<?php }?>