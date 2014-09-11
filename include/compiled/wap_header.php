<!DOCTYPE html>
<html lang="zn-cn">
	<head>
		<meta charset="utf-8">		
		<?php if(!$pagetitle||$request_uri=='index'){?>
		<title><?php echo $INI['system']['sitename']; ?> - <?php echo $INI['system']['sitetitle']; ?>|<?php echo $city['name']; ?>购物|<?php echo $city['name']; ?>团购|<?php echo $city['name']; ?>打折</title>
	<?php } else { ?>
		<title><?php echo $pagetitle; ?> | <?php echo $INI['system']['sitename']; ?> - <?php echo $INI['system']['sitetitle']; ?> |<?php echo $city['name']; ?>购物|<?php echo $city['name']; ?>团购|<?php echo $city['name']; ?>打折<?php echo $INI['system']['subtitle']; ?></title>
	<?php }?>
		<meta name="description" content="<?php echo $INI['system']['sitetitle']; ?>|<?php echo $city['name']; ?>购物|<?php echo $city['name']; ?>团购|<?php echo $city['name']; ?>打折" />
		<meta name="keywords" content="<?php echo $INI['system']['sitename']; ?>, <?php echo $city['name']; ?>, <?php echo $city['name']; ?><?php echo $INI['system']['sitename']; ?>，<?php echo $city['name']; ?>购物，<?php echo $city['name']; ?>团购，<?php echo $city['name']; ?>打折，团购，打折，精品消费，购物指南，消费指南" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">	
		<link rel="shortcut icon" href="../favicon.ico" />		
		<link rel="stylesheet" media="screen"  href="../static/theme/wap_default/css/style_mobile.css" />
	</head>
	<body>
		<a name="top" id="top"></a>	