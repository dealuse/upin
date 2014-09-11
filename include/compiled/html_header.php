<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta property="wb:webmaster" content="9b128aa801c6858b" />
        <?php if($newSeo){?>
        <title><?php echo $newSeo['title']; ?></title>
        <?php } else if(!$pagetitle||$request_uri=='index') { ?>
        <title><?php echo $INI['system']['sitename']; ?> - <?php echo $INI['system']['sitetitle']; ?>|<?php echo $city['name']; ?>购物|<?php echo $city['name']; ?>团购|<?php echo $city['name']; ?>打折</title>
        <?php } else { ?>
        <title><?php echo $pagetitle; ?> | <?php echo $INI['system']['sitename']; ?> - <?php echo $INI['system']['sitetitle']; ?> |<?php echo $city['name']; ?>购物|<?php echo $city['name']; ?>团购|<?php echo $city['name']; ?>打折<?php echo $INI['system']['subtitle']; ?></title>
        <?php }?>
        <?php if($newSeo){?>
        <meta name="description" content="<?php echo $newSeo['description']; ?> " />
        <?php } else if($seo_description) { ?>
        <meta name="description" content="<?php echo $seo_description; ?>" />
        <?php } else if($team) { ?>
        <meta name="description" content="<?php echo mb_strimwidth(strip_tags($team['title'] .', '. $team['summary'] .', '. $team['systemreview']), 0, 320); ?>" />
        <?php } else { ?>
        <meta name="description" content="团购,最有保障的团购网站-<?php echo $INI['system']['sitename']; ?>。每天团购：餐厅、酒吧、KTV、SPA、美发店、瑜伽馆、电影、洗车、手机数码、家居日用、服装服饰等团购。电 话:400-696-0223" />
        <?php }?>
        <?php if($newSeo){?>
        <meta name="keywords" content="<?php echo $newSeo['keywords']; ?>" />
        <?php } else if($seo_keyword) { ?>
        <meta name="keywords" content="<?php echo $seo_keyword; ?>" />
        <?php } else { ?>
        <meta name="keywords" content="<?php echo $INI['system']['sitename']; ?>" />
        <?php }?>
        <link href="<?php echo $INI['system']['wwwprefix']; ?>/feed.php?ename=<?php echo $city['ename']; ?>" rel="alternate" title="订阅更新" type="application/rss+xml" />
        <link rel="shortcut icon" href="/ico/favicon.ico" />
        <link rel="stylesheet" href="/static/theme/ev56_58/css/base.1_1.css" />
        <link rel="stylesheet" href="/static/v2/css/aipintuan.1_3.css" />
        <link rel="stylesheet" href="/static/v2/css/siteMap.css" />

        <!--[if (gte IE 6)&(lte IE 8)]>
            <script src="/static/v2/js/nwmatcher-1.2.5.js"></script>
            <script src="/static/v2/js/selectivizr-1.0.2-min.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="/static/v2/js/html5shiv.js"></script>
            <script src="/static/v2/js/pie-1.0.0.js"></script>
        <![endif]-->
        </head>
        <body class="<?php echo $request_uri=='index'?'bg-alt':'newbie'; ?>">
            <div id="pagemasker"></div>
            <div id="dialog"></div>