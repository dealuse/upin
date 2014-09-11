<?php include template("wap_header");?>
				
			<nav class="nav">
				<a href="index.php" class="back">返回</a>
			   	<div class="position">会员注册</div>			   		   			    
			</nav>

			<section class="login">

				<div class="login_h">
					<a href="login.php" >登录</a> <a href="#" class="active">注册</a>
				</div>
<form action="" method="post">
				<div class="login_input">
					<p class="input_box">
						<b>邮箱</b>
						<input  name="email" type="text" class="input" placeholder="推荐QQ邮箱">
					</p>					
					<p class="input_box">
						<b>用户名</b>
						<input  name="username" type="text" class="input" placeholder="4-16个字符">
					</p>					
					<p class="input_box">
						<b>手机号码</b>
						<input  name="telphone" type="text" class="input" placeholder="用于优惠券的短信通知">
					</p>
					<p class="input_box">
						<b>密码</b>
						<input  name="password" type="password" class="input" placeholder="请输入密码">
					</p>
					<p class="input_box">
						<b>确认密码</b>
						<input  name="password2" type="password" class="input" placeholder="请再次输入密码">
					</p>
				</div>

				<div class="login_btn">
					<input type="submit" value="注 册">
				</div>
</form>
				<div class="login_other">	
					<p class="o_line"><span>其他账号登录</span></p>					
	
				 <!--   <a  href="#" class="qq" title="qq">QQ</a>-->
					<a  href="#" class="sina" title="新浪">新浪登录</a>										
				</div>

			</section>
<?php include template("wap_footer");?>
