<?php include template("wap_header");?>

	<nav class="nav">
		<a href="#" class="back">返回</a>
	   	<div class="position">会员登录</div>		   			    
	</nav>

	<section class="login">

		<div class="login_h">
			<a href="#" class="active">登录</a> <a href="signup.php">注册</a>
		</div>
<form action="" method="post">
		<div class="login_input">
			<p class="input_box">
				<i class="i_user"></i>
				<input  name="username" type="text" class="input" placeholder="手机号/邮箱/用户名">
			</p>
			<p class="input_box">
				<i class="i_psw"></i>
				<input  name="password" type="password" class="input" placeholder="请输入密码">
			</p>
		</div>

		<div class="login_btn">
			<input type="submit" value="登 录">
		</div>
</form>
		<div class="login_other">	
			<p class="o_line"><span>其他账号登录</span></p>					

		  <!--  <a  href="#" class="qq" title="qq">QQ</a>-->
			<a  href="#" class="sina" title="新浪">新浪登录</a>										
		</div>

	</section>

<?php include template("wap_footer");?>
