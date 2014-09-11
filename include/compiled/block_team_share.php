<?php if($team['id'] && false){?>
暂时屏蔽
<div class="ishare c3">
        <ul>
          <li>分享给好友购买</li>
		  <!--<li><a class="i_im" href="javascript:void(0);" id="deal-share-im-line" onclick="jQuery('.deal-share-<?php echo $team['id']; ?>').toggle();">MSN/QQ</a></li>-->
          <li><a class="i_sina" href="<?php echo share_sina($team); ?>" target="_blank">新浪微博</a></li>
          <li><a class="i_qzone" onclick="window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href));return false;" href="javascript:void(0);">QQ空间</a></li>
          <li><a class="i_renren" href="<?php echo share_renren($team); ?>" target="_blank">人人</a></li>
          <li><a class="i_qq" href="<?php echo share_tencent($team); ?>" target="_blank">腾讯微博</a></li>
          <li><a class="i_kaixin" href="<?php echo share_kaixin($team); ?>" target="_blank">开心</a></li>
          <li><a class="i_douban" href="<?php echo share_douban($team); ?>" target="_blank">豆瓣</a></li>
		  <!--<li><a class="i_email" href="<?php echo share_mail($team); ?>" id="deal-buy-mailto">邮件</a></li>-->
        </ul>
        <span class="fx flt1"></span><span class="fx frt1"></span>
      </div>
	  
<?php }?>
