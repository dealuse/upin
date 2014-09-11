<?php include template("header");?>

<div class="wrap2">
	<div class="utit2">
		<h2>
			登录<span>没有注册？<a href="/account/signup.php">免费注册</a></span>
		</h2>
	</div>
	<div class="uleft2 ul3">

		<div class="ucon login">
			<form id="login-user-form" method="post" action="/account/login.php"  autocomplete="off"
				class="validator">
				<ul>
					<li><label for="login-email-address">帐号</label> <input
						type="text" size="30" name="email" id="login-email-address"
						class="i_text" value="" require="true" datatype="require|limit"
						msg="请输入帐号|请输入正确的邮箱或用户名" min="2" />
						<div class="loginTip">您可用用户名、邮箱登录</div></li>
					<li><label for="login-password">密码</label> <input
						type="password" size="30" name="password" id="login-password"
						class="i_text" require="true" datatype="require" msg="请输入密码" />
						<div id="password_Tip"></div></li>
					<li><label for="autologin">&nbsp;</label><input
						type="checkbox" value="1" name="auto_login" id="autologin"
						class="i_check" checked /> 下次自动登录</li>
					<li><label for=""></label> <input type="submit" value="登录"
						name="commit" id="login-submit" class="input input42" /> <a
						href="/account/repass.php">忘记密码</a></li>
                    <li>
<div style="
    text-align: left;
    width: 350px;
    margin: 0 auto 0 auto;
    border: 1px solid #ccc;
    padding: 2px 0 0 15px;
    background: rgb(255, 242, 200);
    position: relative;
    display: none;
"><img src="http://cdn1.iconfinder.com/data/icons/CrystalClear/16x16/apps/ktip.png" style="
    position: absolute;
    top: 4px;
"><a href="/help.php" target="_blank" style="
    padding-left: 18px;
">优品会关于服务器遭受攻击导致用户无法登录的公告</a></div>
                    </li>

				</ul>
			</form>
		</div>
	</div>
	<div class="uright2">
		<h3>还没有优品会账户？</h3>
		<p class="c9">
			立即<a href="/account/signup.php">注册</a>，仅需<span style="color: #F00">10</span>秒！<br />
			<span style="color: red;">每天都享受超值优惠</span>
		</p>
		<p>
			<a href="/account/signup.php" class="zhuce">点击注册</a>
		</p>

		<ul class="sns_login_ul sns_login_ul_side">
			<li class="tip">您也可以通过以下帐号登录:</li>
			<li class="sina_login"><a title="新浪微博"
				href="/thirdpart/sina/login.php"></a></li>

		</ul>

	</div>
	<div class="clear"></div>
</div>
<?php include template("footer");?>
