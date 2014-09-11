<?php 
    $ask_con = array('length(comment)>0','display' => 'Y');
    $ask_count = Table::Count('ask', $ask_con);
    $asks = DB::LimitQuery('ask', array('condition'=>$ask_con, 'size'=>3, 'order'=>'ORDER BY id DESC'));
; ?>

<div class="rbox b15" id="questions">
    <h3><a class="tousu" href="/feedback/suggest.php" title="我要投诉建议">投诉建议</a>答疑转让</h3>
    <ul class="wzlist c3">
        <li class="dytit" style="margin-right:5px;"><a href="/team/ask.php?id=<?php echo $team['id']; ?>">查看全部(<?php echo $ask_count; ?>)</a><a href="/team/ask.php?id=<?php echo $team['id']; ?>#post" class="ico guest">我要提问</a><a href="/team/transfer.php?id=<?php echo $team['id']; ?>" class="ico guest">求购转让</a></li>
        <?php if(is_array($asks)){foreach($asks AS $one) { ?>
        <?php
        $askExp = "/(1[3584]{1}[0-9])[0-9]{4}([0-9]{4})/i";
        $one['content'] = preg_replace($askExp,'$1****$2',$one['content']);
        ?>
        <li><a href="/team/ask.php?id=<?php echo $team['id']; ?>#ask-entry-<?php echo $one['id']; ?>" title="<?php echo $one['content']; ?>"><?php echo htmlspecialchars(mb_substr($one['content'],0,30,'UTF-8')); ?>...</a></li>
        <?php }}?>
    </ul>
</div>