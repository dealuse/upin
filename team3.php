<?php


require_once(dirname(__FILE__). '/app.php');
$id = abs(intval($_GET['id']));
$now = strtotime(date('Y-m-d')) + (3600 * 6);
$cacheKey = "team_view_{$id}";
$team = Cache::Get($cacheKey);
if ($team === FALSE) {
$teamSql = "SELECT 
t.id AS id,
t.`city_id` AS city_id,
t.`class_area` AS class_area,
t.`class_bizarea` AS class_bizarea,
t.`class_group` AS class_group,
t.`class_sub` AS class_sub,
t.`product` AS product,
t.`product_ind` AS product_ind,
t.`title` AS title,
t.`market_price` AS market_price,
t.`team_price` AS team_price,
t.`now_number` AS now_number,
t.`pre_number` AS pre_number,
t.`max_number` AS max_number,
t.`class_type` AS class_type,
t.`image` AS image,
t.`partner_id` AS partner_id,
t.`delivery` AS delivery,
t.`end_time` AS end_time,
t.`begin_time` AS begin_time,
tp.`title` AS ptitle,
tp.`longlat` AS longlat,
tp.`long` AS 'long',
tp.`lat` AS lat,
tp.`address` AS address,
tp.`address_info` AS address_info,
tp.`traffic_info` AS traffic_info,
tp.`phone` AS phone,
td.`detail` AS detail,
td.`detail_partner` AS detail_partner,
td.`detail_table` AS detail_table,
td.`notice` AS notice,
td.`systemreview` AS systemreview
FROM
team t 
LEFT JOIN team_detail td 
ON td.`id` = t.`id` 
LEFT JOIN partner tp 
ON tp.`id` = t.`partner_id` 
WHERE t.id = {$id} ";
$team = DB::GetQueryResult($teamSql, true);
if (!$team) {
easylog('T404', 'TEAM404', $id);
redirect(WEB_ROOT . '/');
exit;
}
Cache::Set($cacheKey, $team, 0, 20);
}
if ($team['delivery'] == 'express') {
$_GaPageView = "_gaq.push(['_trackPageview','/index/view/{$team['id']}/{$city['ename']}/express']);\n";
} else {
$_GaPageView = "_gaq.push(['_trackPageview','/index/view/{$team['id']}/{$city['ename']}/local']);\n";
}
Session::Set('loginpage', $_SERVER['REQUEST_URI']);
if ($_GET['sessionkey'] && $_GET['tn'] && $_GET['ijinshan_uid']) {
$_SESSION['is_duba'] = array(
'sessionkey' => $_GET['sessionkey'],
'tn' => $_GET['tn'],
'ijinshan_uid' => $_GET['ijinshan_uid']
);
}
$click_from = $_GET['f'] ? $_GET['f'] : null;
if ($click_from) {
Session::Set('click_from_indb', $click_from);
}
if ($_GET['tn'] && $_GET['baiduid']) {
Session::Set('from_baidu', array('tn' => $_GET['tn'], 'baiduid' => $_GET['baiduid']));
Session::Set('is_baidu', '1');
}


/* 商家关联查询 */
$cacheKey = "team_partner_other_item_{$id}";
$partnerItem = Cache::Get($cacheKey);
if ($partnerItem === FALSE) {
$partnerItem = DB::LimitQuery('team', array(
'condition' => array(
'partner_id' => $team['partner_id'],
'id <> ' . $team['id'],
"begin_time<{$now} AND end_time>{$now}"
),
'select' => 'id,product,product_sms,team_price,market_price,now_number,pre_number',
'order' => 'ORDER BY sort_order DESC',
'size' => 10
));
Cache::Set($cacheKey, $partnerItem, 0, 60 * 5);
}
//分类下其他商品
$cacheKey = "team_other_{$id}";
$otherTeam = Cache::Get($cacheKey);
if ($otherTeam === FALSE) {
$otherTeam = DB::LimitQuery('team', array(
'condition' => array(
'id <> ' . $team['id'],
"begin_time<{$now} AND end_time>{$now}",
"class_group" => $team['class_group'],
'city_id' => $team['city_id']
),
'select' => 'id,product,team_price,market_price,now_number,image',
'size' => 10,
'order' => 'ORDER BY sort_order DESC'
));
Cache::Set($cacheKey, $otherTeam, 0, 3600 * 10);
}
#得到最后一个商品的ID
if ($otherTeam) {
$position = count($otherTeam) - 1;
$position = ($position < 0) ? 0 : $position;
$lastOtherTeam = $otherTeam[$position]['id'];
}
//city切换
if ($team['city_id'] != 0) {
if ($team['city_id'] != $city['id']) {
$city = cookie_city(array('id' => $team['city_id']));
$city = Table::Fetch('category', $city['id']);
}
}
//新旧文案过滤
$seacher = array('detail', 'detail_partner', 'detail_table', 'notice', 'systemreview');
foreach ($seacher as $one) {
$team[$one] = str_replace('src="http://guanli.aipintuan.com/static/team', 'src="' . $INI['system']['imgprefix'] . '/static/team', $team[$one]);
$team[$one] = str_replace('src="http://dl.aipintuan.com/static/team', 'src="' . $INI['system']['imgprefix'] . '/static/team', $team[$one]);
$team[$one] = str_replace('src="http://static.aipintuan.com/static/team', 'src="' . $INI['system']['imgprefix'] . '/static/team', $team[$one]);
$team[$one] = str_replace('src="http://www.aipintuan.com/static/team', 'src="' . $INI['system']['imgprefix'] . '/static/team', $team[$one]);
}
$map['s'] = '<p style="text-align:center;background-color:#FF8A00;color:#FF8A00;">';
$map['s2'] = '<p style="text-align:center;color:#ff8a00;background-color:#ff8a00;">';
$map['s3'] = '<p style="text-align:center;background-color:#ff8a00;color:#ff8a00;">';
$map['ims'] = '<img src="http://p0.foodtuan.com/static';
$map['imsh'] = '<img src="http://static.aipintuan.com/static';
$map['h'] = '<p style="text-align:center;background-color:#FF8A00;color:#FF8A00;display:none;">';
$team['detail'] = str_replace($map['s'], $map['h'], $team['detail']);
$team['detail'] = str_replace($map['s2'], $map['h'], $team['detail']);
$team['detail'] = str_replace($map['s3'], $map['h'], $team['detail']);
$team['detail'] = str_replace($map['ims'], $map['imsh'], $team['detail']);
$team['notice'] = str_replace('<p><br/></p>', '', $team['notice']);
$team['systemreview'] = str_replace('分享更多', ' <span style="display:none;">分享更多', $team['systemreview']);
$team['systemreview'] = str_replace('团购信息', ' </span>团购信息', $team['systemreview']);
//商家过滤
$team['ptitle'] = mb_substr($team['ptitle'], 1);


//notice过滤
$nto = '<li><p><strong><span style="color: rgb(255, 0, 0);">温馨提示：未开通网银、支付宝的用户请在09:00-20:00拨打电话15619852352，小宋为您服务。</span>';
$px = '<li style="display:none"><p>';
$team['notice'] = str_replace($nto, $px, $team['notice']);
//经纬度
if ($team['longlat']) {
$longlat = explode(',', $team['longlat']);
}
//剩余时间
$cutTime = formatTime($team['begin_time'], $team['end_time']);
//面包屑
if ($team['class_area']) {
$_temp = v2Func::getArea($team['city_id'], $team['class_area']);
$breadcrumb['area'] = array(
'link' => '/'.$city['ename'].'/cate/all/' . $_temp['ename'],
'name' => $_temp['name']
);
}
if ($team['class_bizarea']) {
if ($team['city_id'] != 0) {
$_temp = v2Func::getArea($team['city_id'], $team['class_bizarea']);
$breadcrumb['bizarea'] = array(
'link' => '/'.$city['ename'].'/cate/all/' . $_temp['ename'],
'name' => $_temp['name']
);
}
}
//修改面包屑之前
//if ($team['delivery'] == 'express') {
// $groupType = 'mall';
//} else {
// $groupType = 'cate';
//}
//if ($team['class_group']) {
// $_temp = v2Func::getGroup($team['class_group']);
// $breadcrumb['group'] = array(
// 'link' => "/{$groupType}/" . $_temp['ename'],
// 'name' => $_temp['name'],
// 'ename' => $_temp['ename']
// );
//}
//if ($team['class_sub']) {
// $_temp = v2Func::getGroup($team['class_sub']);
// $breadcrumb['sub'] = array(
// 'link' => "/{$groupType}/" . $_temp['ename'],
// 'name' => $_temp['name'],
// 'ename' => $_temp['ename']
// );
//}


if ($team['delivery'] == 'express') {
$groupType = 'mall';
} else {
$groupType = $city['ename'].'/cate';
}
if ($team['class_group']) {
$_temp = v2Func::getGroup($team['class_group']);
$breadcrumb['group'] = array(
'link' => "/{$groupType}/" . $_temp['ename'],
'name' => $_temp['name'],
'ename' => $_temp['ename']
);
}
if ($team['class_sub']) {
$_temp = v2Func::getGroup($team['class_sub']);
$breadcrumb['sub'] = array(
'link' => "/{$groupType}/" . $_temp['ename'],
'name' => $_temp['name'],
'ename' => $_temp['ename']
);
}
/* * *
* 
* 关键词：{主标题，除去前面的符号及地点}团购，｛主标题，除去【】符号｝团购，｛城市｝{主标题，除去前面的符号及地点}团购
* 标题：【｛主标题，除去前面的地点及符号｝，副标题第一句话】｛城市｝｛主标题，除去【】符号｝团购｛价格｝元，爱拼团汉中站
* 描述：内容描述（现在的页面描述里面含有爱拼said板块内容，把这个板块内容去掉）
*/
$_seoNoLocalTitle = preg_replace('/\【(.*)\】/', '', $team['product']);
$_seoFirstTitle = '';
$_seoFirstTitleArr = str_replace('，', ',', $team['product_ind']);
$_seoFirstTitleArr = explode(',', $_seoFirstTitleArr);
if (is_array($_seoFirstTitleArr)) {
$_seoFirstTitle = ',' . $_seoFirstTitleArr[0];
}
$_seoNoKuohaoTitle = str_replace(array('【', '】'), '', $team['product']);
$_seoCity = city_list($team['city_id']);
//$seo['title'] ="】{$seoCity}" . str_replace(array('【', '】'), '', $team['product']) . '团购' . $team['team_price'] . "元,爱拼团{$seoCity}站";
$newSeo = array(
'title' => "【{$_seoNoLocalTitle}{$_seoFirstTitle}】{$_seoCity}{$_seoNoKuohaoTitle}团购{$team['team_price']}元,爱拼团{$_seoCity}站",
'keywords' => "{$_seoNoLocalTitle}团购,{$_seoNoKuohaoTitle}团购,{$_seoCity}{$_seoNoLocalTitle}团购",
'description' => $team['title']
);
if ($team['city_id'] > 0) {
$aptSaidLink = '';
$aptSaidLinkGroup1 = array(1, 2, 3);
$aptSaidLinkGroup2 = array(4, 5, 6);
$aptSaidLinkGroup3 = array(7, 8, 9, 0);
$aptSaidLinkLastNum = str_split($team['id'])[count(str_split($team['id'])) - 1];
// if (in_array($aptSaidLinkLastNum, $aptSaidLinkGroup1)) {
// $aptSaidLink = "分享更多<a href=\"/{$city['ename']}\" target=\"_blank\" style=\"color:red;\">{$_seoCity}团购</a>信息";
// } elseif (in_array($aptSaidLinkLastNum, $aptSaidLinkGroup2)) {
// $aptSaidLink = "分享更多<a href=\"{$breadcrumb['group']['link']}\" target=\"_blank\" style=\"color:red;\">{$_seoCity}{$breadcrumb['group']['name']}团购</a>信息";
// } else {
// $aptSaidLink = "分享更多<a href=\"{$breadcrumb['sub']['link']}\" target=\"_blank\" style=\"color:red;\">{$_seoCity}{$breadcrumb['sub']['name']}团购</a>信息";
// }
}


//主页猜您喜欢----销量高的推荐
$option = array(
'condition' => array(
"end_time > UNIX_TIMESTAMP() AND begin_time < UNIX_TIMESTAMP() AND class_type='local' AND city_id={$city['id']} "
),
'select' => 'id,product,product_sms,class_type,image,title,market_price,team_price,now_number,pre_number ,COUNT(DISTINCT partner_id) ',
'group' => ' GROUP BY partner_id',
'order' => 'ORDER BY now_number DESC limit 1,120 ',
);
$allHistoryData = DB::LimitQuery('team', $option);
foreach (array_rand($allHistoryData,6) as $one){
$allHistoryDataTo[] = $allHistoryData[$one];
}


$option1 = array(
'condition' => array(
"end_time > UNIX_TIMESTAMP() AND begin_time < UNIX_TIMESTAMP() AND city_id='0' "
),
'select' => 'id,product,product_sms,class_type,image,title,market_price,team_price,now_number,pre_number ,COUNT(DISTINCT partner_id) ',
'group' => ' GROUP BY partner_id',
'order' => 'ORDER BY now_number DESC limit 30,120 ',
);
$allHistoryData1 = DB::LimitQuery('team', $option1);
foreach (array_rand($allHistoryData1,6) as $one){
$allHistoryDataTo1[] = $allHistoryData1[$one];
}
//主页猜您喜欢 end-----------------------
include(template('team_view/team'));


function formatTime($beginTime, $endTime) {
$time = $endTime - time();
if ($beginTime > time()) {
return '还有' . _formatTime($beginTime - time()) . '开始';
} elseif ($time < 0) {
return '结束于' . date('Y-m-d H:i:s', $endTime);
} elseif ($time > 86400 * 3) {
return '剩余三天以上';
} else {
return '剩余' . _formatTime($time) . '结束';
}
}


function _formatTime($date) {
$dater['day'] = floor($date / 86400);
$dater['hour'] = floor(($date % 86400) / 3600);
$dater['min'] = floor((($date % 86400) % 3600) / 60);
if ($dater['day'] > 0) {
return $outPut = $dater['day'] . '天' . $dater['hour'] . '小时' . $dater['min'] . '分钟';
} else {
return $outPut = $dater['hour'] . '小时' . $dater['min'] . '分钟';
}
}


function hisArtCookies($team) {
$insertData = array(
'i' => $team['id'],
'n' => $team['product'],
'p' => $team['team_price'],
'u' => team_image($team['image'], true)
);
$hisArt = $_COOKIE['itemHistory'];
if ($hisArt) {
$hisArt = json_decode($hisArt, true);
foreach ($hisArt as $key => $one) {
if ($one['i'] == $team['id']) {
unset($hisArt[$key]);
break;
}
}
array_unshift($hisArt, $insertData);
} else {
$hisArt = array();
array_unshift($hisArt, $insertData);
}
while (count($hisArt) > 5) {
array_pop($hisArt);
}
return setCookie('itemHistory', json_encode($hisArt), time() + 365 * 86400, '/', '');
}


hisArtCookies($team);
//include(dirname(dirname(__FILE__)) . '/team_click.php');
?>