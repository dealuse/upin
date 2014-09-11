<?php include template("header");?>
<style type="text/css">
    .jiameng_img{ background: url(/static/img/woshou.png) no-repeat; width: 48px ;height:27px;margin: 5px 0px;}
    .jiameng{padding: 5px 25px 0px 20px ; line-height: 36px; margin: 15px 0px; height: 35px; color: #fff !important;  background:#c0392b;  -moz-box-shadow:2px 2px 10px #828282; -webkit-box-shadow:2px 2px 10px #828282; box-shadow:2px 2px 10px #828282;-moz-border-radius:1em; -webkit-border-radius:1em; border-radius:1em;}
    .jiameng:hover{filter: Alpha(opacity=80);  -moz-opacity:0.7;opacity:0.7;   }
    .wrap2 p a{height: 40px;}
</style>
<div class="wrap2" id="citylist">
    <p class="wrapper">
        <?php if($_GET['m'] == 'auto'){?>
        <strong class="wrapper">
            <span>进入</span>
            <a href="/<?php echo $city['ename']; ?>"><?php echo $city['name']; ?>站</a>
        </strong>
        <?php }?>
        <strong>热门城市：</strong>
           <a href="/">温哥华</a>
</p>

<div class="clist">

    <header class="wrapper">
        <h2 class="cb">按城市拼音首字母选择</h2>
    </header>
    <?php if(is_array($cities)){foreach($cities AS $letter=>$ones) { ?>
    <div class="wrapper">
        <span><?php echo $letter; ?></span>
        <ul class="inline">
            <?php if(is_array($ones)){foreach($ones AS $one) { ?>
            <li>
                <?php
                $hotcityarr=array('北京','长沙','延安','成都','广州','哈尔滨','济南','南京','青岛','泉州','上海','深圳','天津','武汉','西安','郑州','大连','杭州','太原','重庆','无锡','北海','鹤壁','枣庄','汉中','渭南','安康','榆林','兴平','商洛','菏泽','南平','扬州','滕州','济南','哈密','韩城','汉阴县','合阳县','旬阳县','建瓯','南郑县','勉县','丹凤','神木县','邻水县');
                if(in_array($one['name'],$hotcityarr)){
                ?>
                <a href="/city.php?ename=<?php echo $one['ename']; ?>"><b style="font-size: 13px; color: red"><?php echo $one['name']; ?></b></a>
                <?php }else{ ?>
                <a href="/city.php?ename=<?php echo $one['ename']; ?>"><?php echo $one['name']; ?></a>
                <?php } ?>
            </li>
            <?php }}?>
        </ul>
    </div>
    <?php }}?>

</div>
<div class="clear"></div>
</div>
<section class="friend-link">
    <div class="fl-nav"><strong>友情链接</strong></div>
    <ul>
        <?php if(is_array($friendlink)){foreach($friendlink AS $index=>$one) { ?>
        <?php if(in_array(0,explode(',', $one['cityid'])) ){?>
        <li>
            <a href="<?php echo $one['url']; ?>" title="<?php echo $one['title']; ?>" target="_blank" style="padding-left:0px; padding-right:20px;"><?php echo $one['title']; ?></a>
        </li>
        <?php }?>
        <?php }}?>
    </ul>
    <div style="clear: both"></div>
</section>
<?php include template("footer");?>

