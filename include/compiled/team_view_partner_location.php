<?php if($team['delivery'] != 'express'){?>
<div id="position" class="item-details-position">
    <header class="mb15">
        <h3><strong>商家位置</strong></h3>
    </header>
    <section class="wrapper">
        <iframe width="330" height="240" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=<?php echo $partner['address']; ?>&key=AIzaSyCvIKNrZ2WuGQsiCgaUHr-ZjHQ-EqE_XGc"></iframe>
        <div class="item-details-position-addr fr wd330">
            <header>
                <h4><strong><?php echo $team['ptitle']; ?></strong></h4>
            </header>
            <section class="fs12 mt10 wrapper">
                <?php if($partner['address']){?>
                <p class="wrapper">
                    <span>地址：</span>
                    <span class="wrapper">
                        <span><?php echo $partner['location']; ?></span>
                        <a class="fl" href="" style="display:none">查看地图</a>
                    </span>
                    <br>
                </p>
                <?php }?>
                <?php if($team['address_info']){?>
                <p class="wrapper">
                    <span>标志：</span>
                    <span class="wrapper">
                        <span><?php echo $team['address_info']; ?></span>
                    </span>
                    <br>
                </p>
                <?php }?>
                <?php if($team['traffic_info']){?>
                <p class="wrapper">
                    <span>乘车：</span>
                    <span class="wrapper">
                        <span><?php echo $team['traffic_info']; ?></span>
                    </span>
                    <br>
                </p>
                <?php }?>
                <?php if($partner['phone']){?>
                <p class="wrapper">
                    <span>电话：</span>
                    <span class="wrapper">
                        <span><?php echo $partner['phone']; ?></span>
                    </span>
                </p>
                <?php }?>
            </section>
        </div>
        <div class="cb"></div>
    </section>
</div>
<?php }?>