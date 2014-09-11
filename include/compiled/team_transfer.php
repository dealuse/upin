<?php include template("header");?>

<div class="wrap">
    <div class="uleft c3" id="uleft_ev56">
<h2 id="uctit">用户中心</h2>
<h3>交易管理</h3>
<ul>
  <?php echo current_account('null'); ?>
</ul>
<h3>咨询与售后</h3>
<ul>
  <li class="cur"><a href="/feedback/suggest.php">咨询/投诉</a></li>
  <li><a href="/feedback/seller.php">商务合作</a></li>
  <li><a href="/team/comments.php">买家点评</a></li>
</ul>
</div>    <div class="uright" id="uright_ev56">
    <div class="utit">
      <ul>
        <li><a href="/account/myask.php">我的答疑</a></li>
        <?php echo current_ask('transfer', $id); ?>
     </ul>
      <h2>求购转让</h2>
    </div>
    <div class="uc_acon">
      <div class="uc_aconr c3">
        <h3>用户帮助</h3>
        <ul>
          <?php echo current_help('null'); ?>
        </ul>
      </div>
      <div class="uc_aconl ucon">
				<?php if(is_login()){?>
      <h2>信息发布</h2>
					<form id="consult-add-form" method="post" action="/ajax/team.php?action=ask&id=<?php echo $team['id']; ?>">
					<input type="hidden" id="parent_id" value="<?php echo $parent_id; ?>"/>
        <ul class="my_qa">
            <li>
                <textarea  name="content" id="consult-content" maxlength="500" class="i_textarea"></textarea><br/>
                            </li>
            <li>
						<input type="hidden" name="type" value="transfer" />
                <input type="button" class="input input42" value="提交" name="commit" />
            </li>
                    </ul>
      </form>
			
					<div id="consult-add-succ"  class="tips2" style="display:none;"><p>您的信息已成功提交，客服MM很快就会回复的，稍等一会儿再来看吧。</p><p><a href="/team.php?id=<?php echo $team['id']; ?>">返回本团购</a>，或<a id="consult-add-more" href="javascript:void(0);">还有其他问题？</a></p></div>
				<?php } else { ?>
					<div class="tips2"><p>请先<a href="/account/login.php?r=<?php echo $currefer; ?>">登录</a>或<a href="/account/signup.php">注册</a>再提问</p></div>
				<?php }?>
      </div>
    <div class="clear"></div>
    </div>
    
	
    <ul class="qa_list qa_list1">
					<?php if(is_array($asks)){foreach($asks AS $one) { ?>
					<li id="ask-entry-<?php echo $one['id']; ?>" >
            <p class="asker"><a name="qa<?php echo $one['user_id']; ?>"></a><span><?php echo Utility::HumanTime($one['create_time']); ?></span><strong><?php echo $users[$one['user_id']]['username']; ?></strong></p>
            <p class="askcon"><?php echo $one['content']; ?></p>
                                                                        <div class="anscon"><p><span><?php echo $INI['system']['abbreviation']; ?>回复：</span>  <?php echo $one['comment']; ?></p></div>
                        <!--<p id="answer_state_<?php echo $one['id']; ?>"><span>www.ev56.com</span></p>-->
                                                       </li>
					<?php }}?>
          </ul>
    

					<div  class="class_quick_fm"><?php echo $pagestring; ?></div>	
  </div>
  <div class="clear"></div>
</div>
<?php include template("footer");?>
