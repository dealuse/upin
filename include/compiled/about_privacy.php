<?php include template("header");?>

<div class="wrap new-order">
  <div class="fl" style="width:700px">
    <div class="uleft c3" id="uleft_ev56">
        <h2 id="abouttit" class="hide"><a href="/about/us.php">关于我们</a></h2>
        <ul><?php echo current_about('privacy'); ?></ul>
    </div>
    <div class="uright" id="uright_ev56">
      <div class="acon">      
        <div class="sect"><?php echo $page['value']; ?></div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<?php include template("footer");?>
