<?php include template("header");?>

<div class="wrap">
<div class="uleft c3" id="uleft_ev56">
    <h2 id="helptit"><a href="/help/tour.php">帮助中心</a></h2>
    <ul><?php echo current_help('zuitu'); ?></ul>
</div>

  <div class="uright" id="uright_ev56">
    <div class="utit">
      <h2><?php echo $INI['system']['abbreviation']; ?>是什么</h2>
    </div>
    <div class="acon">      
      <div class="sect"><?php echo $page['value']; ?></div>
      
    </div>
  </div>
  <div class="clear"></div>
  <a href="#header" id="gotop">返回顶部</a>
</div>
<?php include template("footer");?>
