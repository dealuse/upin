<?php include template("header");?>

<div class="wrap2">
  <div class="uleft2">
    <div class="utit">
      <h2>开放接口</h2>
    </div>
    <div class="acon">
      <div class="sect"><?php echo $page['value']; ?></div>
    </div>
  </div>
  <div class="uright2">
    <h3><?php echo $INI['system']['abbreviation']; ?>开放API是什么?</h3>
    <p><?php echo $INI['system']['abbreviation']; ?>开放API，是<?php echo $INI['system']['abbreviation']; ?>为第三方开发者提供访问<?php echo $INI['system']['abbreviation']; ?>数据的REST接口。开发者可以使用<?php echo $INI['system']['abbreviation']; ?>数据，创造新奇有趣的应用程序。</p>
    <h3>使用开放API有什么条款?</h3>
    <p><?php echo $INI['system']['abbreviation']; ?>开放目前在测试期，供开发者测试使用。<?php echo $INI['system']['abbreviation']; ?>保留一切权利。</p>
  </div>
  <div class="clear"></div>
</div>
<?php include template("footer");?>
