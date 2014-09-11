<?php include template("header");?>

<div class="wrap new-order ask">
    <div class="fl" style="width:700px">
        <div class="uleft c3" id="uleft_ev56">
            <ul>
                <?php echo current_account('/team/ask.php'); ?>
            </ul>
        </div>
        <div class="uright" id="uright_ev56">
            <div class="utit">
                <h2>团购答疑</h2>
            </div>
            <div class="uc_acon">
                <ul class="uc_acon_ul mb20">
                    <li class="wrapper">
                        <h2>有问题请按一下步骤操作：</h2>
                    </li>
                    <li class="wrapper">
                        <span>订单出库前您可以登录" </span>
                        <a target="_blank" href="/order/index.php">优品会订单中心</a>
                        <span>"查询<b>优品会券编号</b></span>
                    </li>
                </ul>
                <div class="uc_aconl ucon">
                    <?php if(is_login()){?>
                    <h2>
                        如上述操作仍无法解决您遇到的困难，请填写以下表格后点击"提交"按钮
                    </h2>
                    <form id="consult-add-form" method="post" onsubmit="return false;"
                          action="/ajax/team.php?action=ask&id=<?php echo $team['id']; ?>">
                        <input type="hidden" id="parent_id" value="<?php echo $parent_id; ?>" />
                        <ul class="my_qa">
                            <li class="wrapper">
                                <label>接收者:</label>
                                <span>优品会客服中心</span>
                            </li>
                            <li class="wrapper">
                                <label><font color="red">*</font>问题描述:</label>
                                <textarea name="content" id="consult-content" maxlength="500" style="width: 400px" class="i_textarea" datatype="require" require="true"></textarea>
                            </li>
                            <li class="wrapper">
                                <div>
                                    <label>验证码</label>
                                    <input type="text" size="30" name="vcaptcha" id="signup-mobile" class="i_text i_yanz" require="true" datatype="require|limitc"min="4" max="4" style="text-transform: uppercase;" />
                                    <img src="/captcha.php" title="看不清楚，点击更换" onclick="X.misc.captcha(this);" style="cursor:pointer;vertical-align:top;height:32px" />
                                </div>
                                <div class="signupTip">请输入图片中的验证码</div>
                            </li>
                            <li class="wrapper">
                                <input type="hidden" name="team_id" value="<?php echo $team['id']; ?>" />
                                <input type="hidden" name="type" value="ask" />
                                <input type="button" class="input input42" value="提交"  id="addAsk"/>
                            </li>
                        </ul>
                    </form>

                    <div id="consult-add-succ" class="tips2" style="display: none;">
                        <p>您的问题已成功提交，客服MM很快就会回复的，稍等一会儿再来看吧。</p>
                        <p>
                            <a href="/team.php?id=<?php echo $team['id']; ?>">返回本团购</a>，或<a
                                id="consult-add-more" href="javascript:void(0);">还有其他问题？</a>
                        </p>
                    </div>
                    <?php } else { ?>
                    <div class="tips2">
                        <p>
                            请先<a href="/account/login.php?r=<?php echo $currefer; ?>">登录</a>或<a
                                href="/account/signup.php">注册</a>再提问
                        </p>
                    </div>
                    <?php }?>
                </div>
                <div class="clear"></div>
            </div>


            <ul class="qa_list qa_list1">
                <?php if(!$asks){?>
                <p>您还未提出任何相关产品问题。</p>
                <?php }?>
                <?php if(is_array($asks)){foreach($asks AS $one) { ?>
                <li id="ask-entry-<?php echo $one['id']; ?>">
                    <p class="asker">
                        <a name="qa<?php echo $one['user_id']; ?>"></a><span><?php echo Utility::HumanTime($one['create_time']); ?></span><strong><?php echo $users[$one['user_id']]['username']; ?></strong>
                    </p>
                    <p class="askcon"><?php echo $one['content']; ?></p>
                    <div class="anscon">
                        <p>
                            <span><?php echo $INI['system']['abbreviation']; ?>回复：</span> <?php echo $one['comment']; ?>
                        </p>
                    </div> <!--<p id="answer_state_<?php echo $one['id']; ?>"><span>www.ev56.com</span></p>-->
                </li>
                <?php }}?>
            </ul>


            <div class="class_quick_fm mt10"><?php echo $pagestring; ?></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include template("footer");?>
<script type="text/javascript">
                        jQuery('#addAsk').click(function() {
                            if ($('form:last').validateForm())
                                jQuery('#consult-add-form').ajaxSubmit({
                                    'success': function(data) {
                                        var obj = eval('(' + data + ')');
                                        X.json(obj);
                                    }
                                });
                            return false;
                        });
</script>