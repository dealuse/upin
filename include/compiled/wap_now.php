<?php include template("wap_header");?>

<?php $notice = Session::Get('notice', true); ?>
<?php if($notice){?>
<p class='n'><?php echo $notice; ?></p>
<?php }?>
<?php $error = Session::Get('error', true); ?>
<?php if($error){?>
<p class='n'><?php echo $error; ?></p>
<?php }?>

<nav class="nav top_fix">
  <!-- <a href="javascript:;" class="class" id="class"><span>全部分类</span><i class="arrow"></i></a>
   <ul class="class_outer" id="class_outer">
   	<li><a href="#">全部分类</a></li>
   	<li><a href="#">酒店</a></li>
   	<li><a href="#">电影</a></li>
   	<li><a href="#">旅游</a></li>
   	<li><a href="#">购物</a></li>
   	<li><a href="#">休闲娱乐</a></li>
   	<li><a href="#">生活服务</a></li>
   </ul>
   <div class="search">
   	<input type="text" >
   	<a href="javascript:;" class="submit"></a>
   </div>-->
   <a href="javascript:;" class="area">温哥华</a>
   <?php if($login_user_id){?>
   <a href="my.php" class="me"></a>	
	<?php } else { ?>
   <a href="login.php" class="login_wap">登陆</a>	
   <?php }?>
</nav>
<article class="main">
	<?php if(is_array($teams)){foreach($teams AS $team) { ?>
		<!--{if $team}-->
			<div>
				<a href="team.php?id=<?php echo $team['id']; ?>" class="dl">
					<img src="<?php echo team_image($team['image'], true); ?>" />
					<ul class="dd">
						<li class="title"><?php echo mb_substr($team['title'],0,10);; ?></li>
						<li class="desc"><?php echo mb_substr($team['title'],0,28);; ?></li>
						<li class="price"><strong><?php echo $currency; ?><?php echo moneyit($team['team_price']); ?></strong> 
							<del><?php echo $currency; ?><?php echo moneyit($team['market_price']); ?></del> 
							<span><?php echo $team['now_number']; ?>人已买</span></li>
					</ul>
				</a>
			</div>		
	<?php }}?>
	
			
		<div class="page clearF">
			<!--
			<a href="javascript:;" class="pre">上一页</a>
			<a href="javascript:;" class="next">下一页</a>
		-->
			<a href="#" class="top">返回顶部</a>
		</div>
	</article>

	<script type="text/javascript" src="../static/theme/wap_default/js/jquery1.10.2.min.js"></script>
	<script type="text/javascript">
		$(function(){
			var clazz=$("#class"),class_outer=$("#class_outer");
			clazz.click(function(){
				clazz.hasClass("focus")?function(){
					clazz.removeClass("focus");
					class_outer.slideUp("fast");
					clazz.blur();
				}():function(){
					clazz.addClass("focus");
					class_outer.slideDown("fast");
				}();
				return false;
			});
			class_outer.find("li").click(function(){				
				$(clazz).find("span").text($(this).text());				
			});
			$("body").click(function(){
				clazz.removeClass("focus");
				class_outer.slideUp("fast");
				clazz.blur();				
			});				
		});
	</script>

<?php include template("wap_footer");?>
