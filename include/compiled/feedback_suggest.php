<?php include template("header");?>


<!---content--->
<div class="wrap2">
  <div class="uleft2">
    <div class="utit">
      <h2>意见反馈</h2>
    </div>
    <div class="ucon login">
      <h3>请在这里留下您的宝贵意见，也可以给我们推荐您希望团购的商家。</h3>
	  <form id="feedback-user-form" method="post" action="/feedback/suggest.php" class="validator">
      <ul>
        <li>
          <label for="feedback-fullname">您的称呼</label>
		  <input type="text" size="30" name="title" id="feedback-fullname" class="i_text" value="<?php echo $login_user['username']; ?>" require="true" datatype="require" />
        </li>
        <li>
           <label for="feedback-email-address">联系方式</label> <input type="text" size="30" name="contact" id="feedback-email-address" class="i_text" value="<?php echo $login_user['email']; ?>" require="true" datatype="require" /><div class="i_tips"><em></em>请留下您的 Email 或 QQ 号，方便我们回复</div>
        </li>
        <li>
          <label>内容：</label><textarea cols="30" rows="5" name="content" id="feedback-suggest" class="i_textarea" require="true" datatype="require"></textarea>
        </li>
					<?php if(option_yes('verifyfeedback')){?>
						<?php include template("block_block_captcha");?>
					<?php }?>
        <li>
          <label></label><input  class="input input42" value="提  交"  name="commit" id="feedback-submit" type="submit"/>
        </li>
      </ul>
	  </form>
    </div>
    <br /><br /><br /><br />
  </div>
  <div class="uright2">
	
        <h3>用户帮助</h3>
        <ul>
          <?php echo current_help('null'); ?>
        </ul>
    
    
  </div>
  <div class="clear"></div>
</div>
<!---contentEnd--->
<?php include template("footer");?>
