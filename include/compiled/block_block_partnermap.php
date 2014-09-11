<?php if($partner['longlat']){?>
<div id="container" style="position:absolute;border:solid 1px #ccc;"></div>
<?php 
$llArr = explode(',',$partner['longlat']);
$partner['location'] = strip_tags($partner['location']);
$partner['location'] = str_replace('位置信息：','',$partner['location']);
$partner['location'] = str_replace("\n\r",'',$partner['location']);
$partner['location'] = str_replace("\r\n",'',$partner['location']);
; ?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
<script type='text/javascript' src='http://api.map.baidu.com/tuan/v1.0/groupPurchase.js'></script>
<script type='text/javascript'>
 var poiData = [{
	 lng:<?php echo $llArr[1]; ?>, 
	 lat:<?php echo $llArr[0]; ?>, 
	 title:"<?php echo $partner['title']; ?>", 
	 tel:"<?php echo $partner['phone']; ?>", 
	 address:"<?php echo $partner['address']; ?>"
	 }];
//初始化团购控件
var gp = new BMapGP.GroupPurchase("container",{
    //启用附近公交/地铁路线功能 
    enableRouteInfo:false,
    //启用从这里来/到这里去 公交路线搜索功能 
    enableRouteSearchBox: false,
    //是否启用展开第一个结果 
    selectFirstResult: true,
    //地图类型 JS_MAP为js类型地图，STATIC_MAP为静态图, IFRAME_MAP为嵌入IFRAME类型
    type: JS_MAP,
    //地图缩放级别，如果多点情况，插件会自动缩放级别，将所有点显示在视野内
    zoom: 14,
    //地图大小 
    mapSize:{width:203 ,height:329},
    pois:poiData
});
//设置商家详情的高度，如果不调用此方法，则为自动延伸状态 
//gp.setRouteInfoHeight(600);
</script>
<?php }?>