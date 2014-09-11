<?php include template("header");?>
<style type="text/css">
.w_filter{margin:10px auto 15px auto;width:978px; border-bottom:solid 1px #E8E8E8;background:#fff;position:relative; height:auto; padding-bottom:10px;}
.dashboard{position:relative;bottom:-2px;z-index:2;_display:inline;margin-left:10px;zoom:1;}
.dashboard ul{float:left;_display:inline;width:100%;}
.dashboard li{float:left;_display:inline;margin-right:4px;font-size:14px;}
.dashboard li a{float:left;height:27px;padding:7px 7px 0 17px;outline:0;}
.dashboard li span{float:left;width:10px;height:34px;}
.dashboard li.current a{font-weight:bold;color:#000;}
.dashboard li.current span{color:#fff;}


#gjc{padding-left: 10px; float:left;}
#jqtgss{margin-left: 10px;margin-top: 10px;height: 37px;}
#jqtgssa{height: 36px; float:left;width:600px;}
#jqtgssa ul{margin-top: 5px;}
#jqtgssb{width: 95px;float:left;margin-top: 5px;}
#jqtgssb .btnrssa{background:url("/static/theme/ev56_58/css/i/buttonssb.gif") no-repeat scroll 0 0 transparent;width:75px;height: 26px;border:0 none;cursor: pointer;margin-top: 5px;}
.hw-input{font-size:12px;padding:2px 3px;border-color:#A3DCEF;border-style:solid;border-width:1px;height: 18px;margin-left: 5px;width: 120px;}
.Wdate{background: url("/static/theme/ev56_58/css/i/datePicker.gif") no-repeat scroll right center #FFFFFF; border: 1px solid #A3DCEF;height: 24px;width: 120px;}
input.formbutton{padding:4px 1em;*padding:5px 1.5em 0;border:2px solid;border-color:#ff6000;background:#ff6f00;color:#fff;letter-spacing:.1em;cursor:pointer;*width:auto;_width:0;*overflow:visible;border-radius:3px;}
#sRlist .pic{position:relative;z-index:1;float:left;_display:inline;zoom:1;}
#sRlist .pic .soldout{position:absolute;z-index:1;right:0;bottom:0;_bottom:-1px;width:122px;height:69px;background-image: none;background:url("/static/theme/ev56_58/css/i/bg-deals-default-soldout.png") no-repeat 0 0;_background:transparent;_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/static/theme/ev56_58/css/i/bg-deals-default-soldout.png");}
#sRlist .pic .soldoutlink{display:block;position:absolute;z-index:2;right:0;bottom:0;width:122px;height:69px;outline:0;text-indent:-999em;}
#sRlist .pic .isopen{position:absolute;z-index:1;right:-13px;bottom:-7px;width:65px;height:65px;background:url("/static/theme/ev56_58/css/i/bg-deals-default-isopen.png") no-repeat 0 0;_background:transparent;_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/static/theme/ev56_58/css/i/bg-deals-default-isopen.png");}
#sRlist .pic .isopenlink{display:block;position:absolute;z-index:2;right:-13px;bottom:-7px;width:65px;height:65px;outline:0;text-indent:-999em;}

#sRlist .pic .seconds_wait{position:absolute;z-index:1;right:-13px;bottom:-7px;width:65px;height:65px;background:url(/static/theme/ev56_58/css/i/bg-deals-seconds_wait.png) no-repeat 0 0;_background:transparent;_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/static/theme/ev56_58/css/i/bg-deals-seconds_wait.png");}
#sRlist .pic .seconds_wait_link{display:block;position:absolute;z-index:2;right:-13px;bottom:-7px;width:65px;height:65px;outline:0;text-indent:-999em;}
#sRlist .pic .seconds_on{position:absolute;z-index:1;right:-13px;bottom:-7px;width:65px;height:65px;background:url(/static/theme/ev56_58/css/i/bg-deals-seconds_on.png) no-repeat 0 0;_background:transparent;_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/static/theme/ev56_58/css/i/bg-deals-seconds_on.png");}
#sRlist .pic .seconds_on_link{display:block;position:absolute;z-index:2;right:-13px;bottom:-7px;width:65px;height:65px;outline:0;text-indent:-999em;}
#sRlist .pic .seconds_off{position:absolute;z-index:1;right:-13px;bottom:-7px;width:65px;height:65px;background:url(/static/theme/ev56_58/css/i/bg-deals-seconds_off.png) no-repeat 0 0;_background:transparent;_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/static/theme/ev56_58/css/i/bg-deals-seconds_off.png");}
#sRlist .pic .seconds_off_link{display:block;position:absolute;z-index:2;right:-13px;bottom:-7px;width:65px;height:65px;outline:0;text-indent:-999em;}

#sRlist .pic img{display:block;}
</style>

	<div class="w2">
<?php if(option_yes('cateteam')){?>
<div class="w_filter">
	<div class="dashboard wrapper" id="dashboard">
		<ul><?php echo current_teamcategory($group_id); ?></ul>
	</div>
</div>
					<div class="clear"></div>	
<?php }?>
	<form method="get">
                                   <div id="jqtgss">
                                        <div id="jqtgssa" class="wrapper mr20">
                	                   <ul>
                	                      <li class="wrapper">
                	                 	<span id="gjc">关键字:</span><input type="text" value="<?php echo $searchName; ?>" class="hw-input" name="searchName">&nbsp;&nbsp;&nbsp;
                		时间范围：<input type="text" value="<?php echo $start_time; ?>" id="start_time" class="Wdate" name="start_time" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/>&nbsp;至&nbsp;
                		<input type="text" value="<?php echo $search_end_time; ?>" class="Wdate" id="end_time" name="end_time" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/>
					      </li>
                	                   </ul>
					 </div> 
                                   <div id="jqtgssb"><input type="submit"
  class="formbutton" value="筛选"></div>
                                        </div>
                                       </form>
	
			<div class="searchRe">
			<div id="sRlist">
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
									<dl class=""><dt class="pic">
								<div class="<?php echo $one['picclass']; ?>"></div><a href="/team.php?id=<?php echo $one['id']; ?>" target="_blank">
						<img height="131" width="210" src="<?php echo team_image($one['image'], true); ?>" alt="<?php echo $one['title']; ?>"></a></dt>
						<dd>
							<h3><a href="/team.php?id=<?php echo $one['id']; ?>" target="_blank"><?php echo mb_strimwidth($one['title'],0,86,'...'); ?></a></h3>
							<p>
								现价：<b class="nprice">&#36;&nbsp;<?php echo moneyit($one['team_price']); ?></b><br>
																<span>原价：&#36;<?php echo moneyit($one['market_price']); ?></span><span>节省：&#36;<?php echo moneyit($one['market_price']-$one['team_price']); ?></span><span>折扣：<b><?php echo team_discount($one); ?></b>折</span><span>购买人数：<b><?php echo $one['now_number']; ?></b>人</span>
																<?php if(option_yes('moneysave')){?><br>共为用户节省:<strong class="count"><?php echo $currency; ?><?php echo moneyit($one['now_number']*($one['market_price']-$one['team_price'])); ?></strong><?php }?><br>
																											时间：<?php echo date('Y年n月j日', $one['begin_time']); ?>
																											
								<a href="/team.php?id=<?php echo $one['id']; ?>" class="golook2" target="_blank">去看看</a>
							</p>
						</dd>
					</dl>
					<?php }}?>
							</div>

		    <div class="clear"></div>
</div>

					<div  class="class_quick_fm"><?php echo $pagestring; ?></div>	
	</div>


<script type="text/javascript" src="/static/js/datepicker/WdatePicker.js"></script>
<?php include template("footer");?>

