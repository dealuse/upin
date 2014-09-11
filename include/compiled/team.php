<?php include template("header");?>
<style>
    .item-details-information section img{
        display: block;
    }
    .gxq {margin: 15px 0; margin-left: 10px; }
    #title_font {font-size: 14px !important; }
    .gxq li {float:left;margin: 0px 5px ; padding-bottom: 15px; border-top: 2px solid #F7F7F7; padding-top: 9px; height: 186px;}
    .gxq li p{width:190px; border: 1px solid white; }
    .gxq li p .num_buy{ float: right;}
    .gxq li h4{width:200px;  margin-top: 7px; text-align: left;  letter-spacing: -1px; }
    .gxq li img {width:200px;height:138px ;}
    .gxq em {font-size: 14px; font-weight: 600; color: #D74C00;}
    .gxq B{width:200px; display: inline-block;}
    .fr #focus ul li{width:465px;}


        .captionOrange, .captionBlack
        {
            color: #fff;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }
        .captionOrange
        {
            background: #EB5100;
            background-color: rgba(235, 81, 0, 0.6);
        }
        .captionBlack
        {
            font-size:16px;
            background: #000;
            background-color: rgba(0, 0, 0, 0.4);
        }
        a.captionOrange, A.captionOrange:active, A.captionOrange:visited
        {
            color: #ffffff;
            text-decoration: none;
        }
        a.captionOrange:hover
        {
            color: #eb5100;
            text-decoration: underline;
            background-color: #eeeeee;
            background-color: rgba(238, 238, 238, 0.7);
        }
        .bricon
        {
            background: url(../img/browser-icons.png);
        }


</style>
    <script type="text/javascript" src="/static/js/jquery-1.9.1.min.js"></script>
    <!-- use jssor.slider.mini.js (40KB) or jssor.sliderc.mini.js (32KB, with caption, no slideshow) or jssor.sliders.mini.js (28KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.core.js + jssor.utils.js + jssor.slider.js) -->
    <script type="text/javascript" src="/static/js/jssor.core.js"></script>
    <script type="text/javascript" src="/static/js/jssor.utils.js"></script>
    <script type="text/javascript" src="/static/js/jssor.slider.js"></script>
    <script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: false,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 3,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider2 = new $JssorSlider$("slider2_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$SetScaleWidth(Math.min(parentWidth, 600));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
<article id="breadNav">
    <p>
        您的位置：
        <a href="/">温哥华团购</a><span>&gt;</span>
        <!--<a href="/<?php echo $city['ename']; ?>"><?php echo $city['name']; ?>团购</a><span>&gt;</span> -->
        <?php if(is_array($breadcrumb)){foreach($breadcrumb AS $i=>$one) { ?>
        <!--<a href="/<?php echo $city['ename']; ?><?php echo $one['link']; ?>"><?php echo $one['name']; ?></a><span>&gt;</span>-->
        <a href="<?php echo $one['link']; ?>"><?php echo $one['name']; ?></a><span>&gt;</span>
        <?php }}?>
        <?php echo $team['product']; ?>

    </p>
</article>
<section id="item-details">
    <div class="item-details-show details-block">
        <header>
            <h3 class="ti-5"><?php echo $team['product']; ?></h3>
            <h4><?php echo $team['title']; ?></h4>
        </header>
        <section class="wrapper">
            <div class="fl">
                <p class="item-price yuan tc">
                    <i class="yuan">&#36;</i><span><?php echo $team['team_price']; ?></span>
                </p>
                <p class="tc mt10" style="font-size:">
                    <em><?php echo team_discount($team); ?>&nbsp;折</em>
                    <span style="font-size:16px;">原价</span> <em class="mr8"><i class="yuan">&#36;</i><?php echo $team['market_price']; ?></em>
                    
                </p>
                <?php if($team['max_number']>0 && $team['now_number'] >= $team['max_number']){?>
                <p class="item-buy-botton item-empty">
                    <a href="javascript:alert('本团购已卖光!')"><span>已卖光</span></a>
                </p>
                <?php } else if($team['begin_time'] > time()) { ?>
                <p class="item-buy-botton item-begin">
                    <a href="javascript:alert('本团购还未开始!')"><span>即将开始</span></a>
                </p>
                <?php } else if($team['end_time'] < time()) { ?>
                <p class="item-buy-botton item-over">
                    <a href="javascript:alert('本团购已结束!')"><span>已结束</span></a>
                </p>
                <?php } else { ?>
                <p class="item-buy-botton item-buying">
                    <a href="/team/buy.php?id=<?php echo $team['id']; ?>"><span>抢购</span></a>
                </p>
                <?php }?>
                <p class="item-purchased" style="padding-top:30px;">
                    <?php if($team['begin_time'] > time()){?>
                    <span class="first mb10"><strong>0</strong> 人购买</span>
                    <?php } else { ?>
                    <span class="first mb10" style="font-size:28px;"><strong><?php echo $team['now_number']; ?></strong> 人购买</span>
                    <?php }?>
                    <span><?php echo $cutTime; ?></span>
                </p>
            </div>
            <div class="fr">








<!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider2_container" style="position: relative; top: 0px; left: 0px; width: 595px; height: 369px;  overflow: hidden; ">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 595px; height: 369px;  overflow: hidden;">
 
                                <div>
                                    <img u="image" src="<?php echo team_image($team['image']); ?>" />
                                    <img u="thumb" src="<?php echo team_image($team['image']); ?>" />
                                </div>
                            <?php if($team['image1']){?>
                                <div>
                                    <img u="image" src="<?php echo team_image($team['image1']); ?>" />
                                    <img u="thumb" src="<?php echo team_image($team['image1']); ?>" />
                                </div>
                            <?php }?>
                            <?php if($team['image2']){?>
                                <div>
                                    <img u="image" src="<?php echo team_image($team['image2']); ?>" />
                                    <img u="thumb" src="<?php echo team_image($team['image2']); ?>" />
                                </div>
                            <?php }?>


        </div>
        
        <!-- Arrow Navigator Skin Begin -->
        <style>
            /* jssor slider arrow navigator skin 02 css */
            /*
            .jssora02l              (normal)
            .jssora02r              (normal)
            .jssora02l:hover        (normal mouseover)
            .jssora02r:hover        (normal mouseover)
            .jssora02ldn            (mousedown)
            .jssora02rdn            (mousedown)
            */
            .jssora02l, .jssora02r, .jssora02ldn, .jssora02rdn
            {
                position: absolute;
                cursor: pointer;
                display: block;
                background: url(../img/a02.png) no-repeat;
                overflow:hidden;
            }
            .jssora02l { background-position: -3px -33px; }
            .jssora02r { background-position: -63px -33px; }
            .jssora02l:hover { background-position: -123px -33px; }
            .jssora02r:hover { background-position: -183px -33px; }
            .jssora02ldn { background-position: -243px -33px; }
            .jssora02rdn { background-position: -303px -33px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora02l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora02r" style="width: 55px; height: 55px; top: 123px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->
        
        <!-- ThumbnailNavigator Skin Begin -->
        <div u="thumbnavigator" class="jssort03" style="position: absolute; width: 595px;   height: 60px; left:0px; bottom: 0px;">
            <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>

            <!-- Thumbnail Item Skin Begin -->
            <style>
                /* jssor slider thumbnail navigator skin 03 css */
                /*
                .jssort03 .p            (normal)
                .jssort03 .p:hover      (normal mouseover)
                .jssort03 .pav          (active)
                .jssort03 .pav:hover    (active mouseover)
                .jssort03 .pdn          (mousedown)
                */
                .jssort03 .w, .jssort03 .pav:hover .w
                {
                    position: absolute;
                    width: 60px;
                    height: 30px;
                    border: white 1px dashed;
                }
                * html .jssort03 .w
                {
                    width /**/: 62px;
                    height /**/: 32px;
                }
                .jssort03 .pdn .w, .jssort03 .pav .w { border-style: solid; }
                .jssort03 .c
                {
                    width: 62px;
                    height: 32px;
                    filter:  alpha(opacity=45);
                    opacity: .45;
                    
                    transition: opacity .6s;
                    -moz-transition: opacity .6s;
                    -webkit-transition: opacity .6s;
                    -o-transition: opacity .6s;
                }
                .jssort03 .p:hover .c, .jssort03 .pav .c
                {
                    filter:  alpha(opacity=0);
                    opacity: 0;
                }
                .jssort03 .p:hover .c
                {
                    transition: none;
                    -moz-transition: none;
                    -webkit-transition: none;
                    -o-transition: none;
                }
            </style>
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 62px; HEIGHT: 32px; TOP: 0; LEFT: 0;">
                    <div class=w><ThumbnailTemplate style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate></div>
                    <div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0">
                    </div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- ThumbnailNavigator Skin End -->
    </div>
    <!-- Jssor Slider End -->



            </div>
        </section>

    </div>
    <!--
    <div class="item-details-discuss  details-block mt15">
        
    </div>
    -->
    <?php if($partnerItem){?>
    <!--this partner other items-->
    <div class="item-details-others details-block mt15">
        <header>
            <h3><strong>该商户的其他团购</strong></h3>
        </header>
        <section class="mt15">
            <ul class="block">
                <?php if(is_array($partnerItem)){foreach($partnerItem AS $in=>$one) { ?>
                <li>
                    <a class="wrapper" href="/team/<?php echo $one['id']; ?>.html">
                        <span class="item-details-others-priced"><i class="yuan">&#36;</i><?php echo $one['team_price']; ?></span>
                        <span class="item-details-others-price">原价<i class="yuan">&#36;</i><?php echo $one['market_price']; ?></span>
                        <span class="item-details-others-title"><?php echo $one['product_sms']; ?></span>
                        <span class="item-details-others-purchased"><?php echo $one['now_number']; ?>人购买</span>
                    </a>
                </li>
                <?php }}?>
            </ul>
        </section>
    </div>
    <!-- END -->
    <?php }?>
    <div class="item-details-content details-block mt15" id="item-details-content">
        <header>
            <nav class="wrapper">
                <ul class="inline-block fl">
                    <?php if($team['delivery'] != 'express'){?>
                    <li class="detailsNav-1">
                        <a href="#position">商家位置</a>
                    </li>
                    <?php }?>
                    <li class="detailsNav-2">
                        <a href="#information">本单详情</a>
                    </li>
                    <?php if($team['detail_partner']){?>
                    <li class="detailsNav-3">
                        <a href="#introduce">商家简介</a>
                    </li>
                    <?php }?>
                </ul>
                <a id="Totop" href="javascript:void(0);">
                </a>
                <a id="buyNow" href="/team/buy.php?id=<?php echo $team['id']; ?>">立即抢购</a>
            </nav>
        </header>
        <?php include template("team_view/partner_location");?>


        <div class="item-details-information" id="information">
            <header class="mb15">
                <h3><strong>本单详情</strong></h3>
            </header>
            <section>
                <?php if($team['detail_table']){?>
                <!-- item detail table -->
                <p id="standard-bar">欢乐畅想</p>
                <?php echo $team['detail_table']; ?>
                <!-- END -->
                <?php }?>
                <?php if($city['name'] == '北京'){?>
                <!--温馨提示：2014年1月25日-2014年2月6日购买的电子券产品，全部移至2014年2月7日陆续发送，为此给您带来的不便，请谅解！-->
                <br/>
                <?php }?>
                <?php if($team['notice']){?>
                <!-- item detail notice -->
                <div class="remind">
                    <?php echo $team['notice']; ?>
                </div>
                <!-- END -->
                <?php }?>
                <p id="standard-bar">项目介绍</p>
                <?php if(!$aptSaidLink){?>
                <!--<div><strong>分享更多网购<a href="<?php echo $breadcrumb['group']['link']; ?>" target="_blank" style="color:red"><?php echo $breadcrumb['group']['name']; ?></a>信息</strong></div>-->
                <?php }?>
                <!-- detail -->
                <div style="padding:2px 14px;">
                    <?php echo $team['detail']; ?>
                </div>
                <?php if($team['detail_partner']){?>
                <!-- item detail partner -->
                <div id="introduce">
                    <p id="standard-bar">商家简介</p>
                    <div style="padding:2px 14px;">
                        <?php echo $team['detail_partner']; ?>
                    </div>
                </div>
                <!-- END -->
                <?php }?>
            </section>
        </div>

        <div class="item-details-discuss gxq" >
            <?php if(true){?>

            <section>
                <header class="wrapper">
                    <p class="title wrapper">
                        <span class="fl">您可能感兴趣的团购</span>
                    </p>
                    <div class="wrapper" id="v2-comment">
                        <div class="gather" style=" width:100%;clear: both;height:auto " >
                            <ul class="block gxq">
                                <?php if(is_array($otherTeam)){foreach($otherTeam AS $index=>$one) { ?>
                                <?php if($one['id'] == $lastOtherTeam){?>
                                <li class="last">
                                    <?php } else { ?>
                                <li>
                                    <?php }?>
                                    <a href="/team/<?php echo $one['id']; ?>.html">
                                        <img class="index-item-img" src="/static/v2/img/border.gif" data-original="<?php echo team_image($one['image'],true); ?>" alt="<?php echo $one['product']; ?>">
                                        <h4><?php echo $one['product']; ?></h4>
                                        <p class="wrapper" style="float:right;">
                                            <span class="fl"><strong><em><i class="yuan">&#36;</i><?php echo $one['team_price']; ?></em></strong></span>
                                            <span class="fl">&nbsp;&nbsp;&nbsp;原价<small><?php echo $one['market_price']; ?></small></span>
                                            <!--<span class="fr"><em><?php echo $one['now_number']+$one['pre_number']; ?></em>人已团购</span>-->
                                        </p>
                                    </a>
                                </li>
                                <?php }}?>
                            </ul>
                        </div>
                    </div>
                </header>
            </section>
        </div>


        <div class="item-details-discuss" id="discuss">
            <footer class="wrapper">
                <div class="fl wrapper">
                    <p class="first"><i class="yuan">&#36;</i><?php echo $team['team_price']; ?></p>
                    <p>
                        <span class="first">原价</span>
                        <span><em><i class="yuan">&#36;</i><?php echo $team['market_price']; ?></em></span>
                    </p>
                    <p>
                        <span class="first">折扣</span>
                        <span><?php echo team_discount($team); ?>折</span>
                    </p>
                    <p>
                        <span class="first">已购买</span>
                        <span><?php echo $team['now_number']; ?>人</span>
                    </p>
                </div>

                <?php if($team['max_number']>0 && $team['now_number'] >= $team['max_number']){?>
                <div class="fr wrapper item-empty">
                    <a href="javascript:alert('本团购已卖光!')">已卖光</a>
                </div>
                <?php } else if($team['begin_time'] > time()) { ?>
                <div class="fr wrapper item-begin">
                    <a href="javascript:alert('本团购还未开始!')">即将开始</a>
                </div>
                <?php } else if($team['end_time'] < time()) { ?>
                <div class="fr wrapper item-over">
                    <a href="javascript:alert('本团购已结束!')">已结束</a>
                </div>
                <?php } else { ?>
                <div class="fr wrapper item-buying">
                    <a href="/team/buy.php?id=<?php echo $team['id']; ?>">抢购</a>
                </div>
                <?php }?>
                <div class="cb"></div>
            </footer>
        </div>
    </div>
    <?php if($team['systemreview']){?>
    <div class="item-details-aipinsaid details-block mt15">
        <header class="wrapper">
            <h3 class="fl"><strong>优品会</strong> <small>SAID</small></h3>
            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" style="float:right;margin-top:15px">

                <a class="bds_qzone"></a>
                <a class="bds_tsina"></a>
                <a class="bds_tqq"></a>
                <a class="bds_renren"></a>
                <a class="bds_t163"></a>
                <span class="bds_more" style="line-height: 14px;">更多</span>
            </div>
        </header>
        <section>
            <!--{if $aptSaidLink}-->
            <div style="text-align: right"><strong><?php echo $aptSaidLink; ?></strong></div>
        </section>
        <?php }?>
        <div style="margin:15px auto; width: 658px; padding-bottom: 25px;">
            <?php echo $team['systemreview']; ?>
        </div>
</section>
</div>

<?php }?>

<aside id="item-details-right">
    <!--
    <header class="box ">
        <span style=" font-size: 18px; font-weight: 600; display: inline-block; width: 112%; color: #FF7417 !important;padding: 10px 0px ;  margin-left: -14px; margin-top: -11px; background: #F6F6F6; letter-spacing: 1px ;border-bottom: 1px solid #F4F4F4 ">优品会APP客户端</span>
        <a href="http://m.aipintuan.com/android"><img src="/static/v2/img/APPbig.png" width="220" height="220"></a>
    </header>
-->
    <?php include template("ad/right_index_banner");?>
    <?php include template("block_side_others");?>

</aside>
</section>
<?php $includeScript[]='team_toolfixed' ?>
<?php //$includeScript[]='team_comment'; ?>
<?php //$includeScript[]='team_share'; ?>

<?php include template("footer");?>