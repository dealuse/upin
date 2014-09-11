<?php include template("header");?>

<div class="wrap2">
  <div class="uleft2">
    <div class="utit">
      <h2>提供团购信息</h2>
    </div>
    <div class="ucon login">
      <h3>特别欢迎优质商家提供团购信息。</h3>
      <br />
	  <form id="feedback-user-form" method="post" action="/feedback/seller.php" class="validator">
      <ul>
        <li>
          <label for="feedback-fullname">您的称呼</label>
		  <input type="text" size="30" name="title" id="feedback-fullname" class="i_text" value="<?php echo $login_user['username']; ?>" require="true" datatype="require" />
        </li>
        <li>
           <label for="feedback-email-address">联系方式</label> <input type="text" size="30" name="contact" id="feedback-email-address" class="i_text" value="<?php echo $login_user['email']; ?>" require="true" datatype="require" /><div class="i_tips"><em></em>请留下您的手机、QQ号或邮箱，方便联系</div>
        </li>
        <li>
          <label>团购信息：</label><textarea cols="30" rows="5" name="content" id="feedback-suggest" class="i_textarea" require="true" datatype="require"></textarea>
        </li>
		<?php if(option_yes('verifyregister')){?>
		<li><label>验证码</label>
			 <input
						type="text" size="30" name="vcaptcha" id="signup-mobile"
						class="i_text i_yanz" require="true" datatype="require|limitc"
						min="4" max="4" style="text-transform: uppercase;" /> <img
						src="/captcha.php" title="看不清楚，点击更换" 
						onclick="X.misc.captcha(this);" style="cursor: pointer;vertical-align: top;width:96px;height: 32px" />
						<div class="signupTip">请输入图片中的验证码</div>
		</li>
		<?php }?>
        <li>
          <label></label><input  class="input input42" value="提  交"  name="commit" id="feedback-submit" type="submit"/>
        </li>
      </ul>
	  </form>
    </div>
  </div>
  <div class="uright2" style="margin-right:0;">
    <p><img src="/static/theme/ev56_58/css/img/shangjia.png" width="197" height="614" /></p>
    
  </div>
  <div class="clear"></div>
</div>
<!---contentEnd--->
<?php include template("footer");?>
