<?php include template("header");?>
<div class="wrap2">
    <div class="utit2">
        <h2>快速注册<span>已有<?php echo $INI['system']['sitename']; ?>账户？请直接<a href="/account/login.php">登录</a></span></h2>
    </div>
    <div class="uleft2 ul3">
        <div class="ucon login">
            <form id="signup-user-form" method="post" autocomplete="off"
                  action="/account/signup.php" class="validator">
                <ul class="buy_form">
                    <li><label for="signup-email-address">Email</label> <input
                            type="text" size="30" name="email" id="signup-email-address"
                            class="i_text" value="<?php echo $_POST['email']; ?>" require="true"
                            datatype="email|ajax" url="<?php echo WEB_ROOT; ?>/ajax/validator.php"
                            vname="signupemail" msg="Email格式不正确|Email已经被注册"
                            infomsg="推荐 QQ邮箱"
                            />
                        <div class="signupTip">请输入真实有效邮箱以便于密码找回,不会公开</div></li>
                    <li><label for="signup-username">用户名</label> <input
                            type="text" size="30" name="username" id="signup-username"
                            class="i_text" value="<?php echo $_POST['username']; ?>" datatype="require|limitb|ajax"
                            require="true" min="4" max="16" maxLength="16"
                            url="<?php echo WEB_ROOT; ?>/ajax/validator.php" vname="signupname"
                            msg="用户名不能为空|用户名长度4-16|用户名已经被使用"
                            infomsg="4-16个字符,一个汉字为两个字符"/></li>
                    <?php if(option_yes('mobilecode')){?>
                    <li><label for="signup-password-confirm">手机号码</label> <input
                            type="text" size="30" name="mobile" id="signup-mobile"
                            class="i_text"
                            require="<?php echo option_yes('needmobile')?'true':'require'; ?>"
                            datatype="mobile|ajax" url="<?php echo WEB_ROOT; ?>/ajax/validator.php"
                            vname="signupmobile" msg="手机号码不正确|手机号码已经被注册" />
                        <div class="signupTip">手机号码是我们联系您的最重要方式，并用于<?php echo $INI['system']['couponname']; ?>的短信通知</div>
                    </li>
                    <?php }?>
                    <li><label for="signup-password">密码</label> <input
                            type="password" size="30" name="password" id="signup-password"
                            class="i_text" require="true" min="6" datatype="require"
                            infomsg="6-16个字符,字母、数字、符号任意组合"
                            msg="请输入密码"/>
                        <div class="signupTip">6-16个字符</div></li>
                    <li><label for="signup-password-confirm">确认密码</label> <input
                            type="password" size="30" name="password2"
                            id="signup-password-confirm" class="i_text" require="true"/></li>
                    <input type="hidden" name="city_id"
                           value="<?php echo $ctiy_idsv = $city['id']?$city['id']:5; ?>" />

					<?php if(option_yes('verifyregister')){?>
					<li><label for="feedback-email-address">验证码</label> <input
						type="text" size="30" name="vcaptcha" id="signup-mobile"
						class="i_text i_yanz" require="true" datatype="require|limitc"
						min="4" max="4" style="text-transform: uppercase;" /> <img
						src="/captcha.php" title="看不清楚，点击更换" 
						onclick="X.misc.captcha(this);" style="cursor: pointer;vertical-align: top;width:96px;height: 32px" />
						<div class="signupTip">请输入图片中的验证码</div></li>
					<?php }?>
					</li>
					<li class="i_font12"><label for="subscribe"></label> <input
						tabindex="3" type="checkbox" value="1" name="subscribe"
						id="subscribe" class="f-check" checked="checked" /> 订阅每日最新团购信息</li>
					<li><label></label> <input type="submit" value="注册"
						name="commit" id="signup-submit" class="input input42" /></li>
				</ul>
			</form>
		</div>
	</div>
	<div class="uright2">
		<h3>
			已有<?php echo $INI['system']['abbreviation']; ?>账户？
		</h3>
		<p>
			<a href="/account/login.php" class="zhuce">点击登录</a>
		</p>

        <ul class="sns_login_ul sns_login_ul_side">
            <li class="tip">您也可以通过以下帐号登录:</li>
            <?php if($INI['alipay']['alifast'] == 'Y' || false){?>
            <li class="alipay_login"><a title="支付宝" href="/alifast/auth_authorize.php"></a></li>
            <?php }?>
            <li class="sina_login"><a title="新浪微博" href="/thirdpart/sina/login.php"></a></li>
            <li class="qq_login"><a title="QQ" href="/thirdpart/qqlogin/qq_login.php"></a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<?php include template("footer");?>
