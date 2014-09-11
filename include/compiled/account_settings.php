<?php include template("header");?>

<div class="wrap new-order">
    <div class="fl" style="width:700px">
        <div class="uleft c3" id="uleft_ev56">
            <h2 id="uctit" style="display:none">用户中心</h2>
            <h3 style="display:none">交易管理</h3>
            <ul class="wrapper">
                <li style="height: 0;display: none;"><img src="/static/theme/ev56_58/css/img/express.png" style="position: relative;left: 95px;top: 9px;"></li>
                <?php echo current_account('/account/settings.php'); ?></ul>
            <h3 style="display:none">咨询与售后</h3>
            <ul style="display:none">
                <li><a href="/feedback/suggest.php">咨询/投诉</a></li>
                <li><a href="/feedback/seller.php">商务合作</a></li>
                <li><a href="/team/comments.php">买家点评</a></li>
            </ul>
            <a class="faq" href="/help/faqs.php" target="_blank" style="display:none">常见问题&gt;&gt;</a>
        </div>  <div class="uright" id="uright_ev56">
            <div class="utit">
                <ul>
                    <li class="current"><a href="/account/settings.php">帐户设置</a></li>
                    <li><a href="/credit/index.php">交易记录</a></li>
                    <li><a href="/credit/charge.php">账户充值</a></li>
                </ul>
                <h2>账户设置</h2>
            </div>
            <div class="sect">
                <form id="settings-form" method="post" action="/account/settings.php" enctype="multipart/form-data" class="validator">
                    <div class="wholetip clear"><h3>1、基本信息</h3></div>
                    <div class="field email">
                        <label>Email</label>
                        <input type="text" size="30" name="email" id="settings-email-address" class="f-input <?php echo $readonly['email']; ?>" <?php echo $readonly['email']; ?> value="<?php echo $login_user['email']; ?>" />
                    </div>
                    <div class="field">
                        <label>头像</label>
                        <?php if($login_user['avatar']){?>
                        <img src="<?php echo user_image($login_user['avatar']); ?>" style="float:left;margin-top:-10px;margin-right:10px;"/>
                        <?php }?>
                        <input type="file" size="30" name="upload_image" id="settings-avatar" class="f-input" />
                        <span class="hint">请上传 512KB 以内的个人肖像图片</span>
                    </div>
                    <div class="field username">
                        <label>用户名</label>
                        <input type="text" size="30" name="username" id="settings-username" class="f-input <?php echo $readonly['username']; ?>" value="<?php echo $login_user['username']; ?>" require="true" datatype="limit" min="2" max="16" maxLength="16" <?php echo $readonly['username']; ?> />
                    </div>
                    <div class="field password">
                        <label>当前密码</label>
                        <input type="password" size="30" name="oldpassword" id="settings-password-old" class="f-input" require="true" datatype="require" />
                        <span class="hint">修改帐户设置请输入当前密码</span>
                    </div>
                    <div class="field password">
                        <label>更改密码</label>
                        <input type="password" size="30" name="password" id="settings-password" class="f-input" />
                        <span class="hint">如果您不想修改密码，请保持空白</span>
                    </div>
                    <div class="field password">
                        <label>确认密码</label>
                        <input type="password" size="30" name="password2" id="settings-password-confirm" class="f-input" />
                    </div>
                    <div class="field password">
                        <label>性别</label>
                        <select name="gender" class="f-city"><?php echo Utility::Option($option_gender, $login_user['gender']); ?></select>
                    </div>
                    <div class="wholetip clear"><h3>2、联系信息</h3></div>
                    <div class="field mobile">
                        <label>手机号码</label>
                        <input type="text" size="30" name="mobile" id="settings-mobile" class="number" value="<?php echo $login_user['mobile']; ?>" require="<?php echo option_yes('needmobile')?'true':'require'; ?>" datatype="mobile"   msg="手机格式不对" <?php echo $login_user['mobilecode']=='yes'?'readonly':''; ?>/><span class="inputtip">手机号码是我们联系您最重要的方式，请准确填写</span>
                    </div>
                    <div class="field password">
                        <label>QQ</label>
                        <input type="text" size="30" name="qq" id="settings-qq" class="number" value="<?php echo $login_user['qq']; ?>" />
                    </div>
                    <div class="field city">
                        <label>所在城市</label>
                        <select name="city_id" class="f-city"><?php echo Utility::Option(Utility::OptionArray($allcities, 'id', 'name'), $login_user['city_id']); ?><option value='0'>其他</option></select>
                    </div>
                    <div class="wholetip clear"><h3>3、派送信息</h3></div>
                    <div class="field username">
                        <label>真实姓名</label>
                        <input type="text" size="30" name="realname" id="settings-realname" class="f-input" value="<?php echo $login_user['realname']; ?>" />
                        <span class="hint">真实姓名请与有效证件姓名保持一致，便于收取物品</span>
                    </div>

                    <div class="clear"></div>
                    <div class="act">
                        <input type="submit" value="更改" name="commit" id="settings-submit" class="formbutton"/>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="new-order-right fr">
        <?php include template("usercenter/block_userinfo");?>
    </div>
    <div class="clear"></div>
</div>
<?php include template("footer");?>
