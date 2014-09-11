<?php

require_once(dirname(__FILE__) . '/app.php');
require_once('/usr/local/xunsearch/sdk/php/lib/XS.php');
if ($_GET['m'] == 'dropdown') {
    $_GET['puting'] = RemoveXSS($_GET['puting']);
    $puting = trim(strip_tags($_GET['puting']));
    $xs = new XS('apt');
    $search = $xs->search;
    $com = $search->getExpandedQuery($puting);
    if ($com) {
        $com = array(
            'a' => '1',
            'com' => $com
        );
    } else {
        $com = array(
            'a' => '0'
        );
    }
    die(json_encode($com));
}
$_GET['s'] = htmlspecialchars(RemoveXSS($_GET['s']),ENT_QUOTES);
$searchName = isset($_GET['s']) ? trim(strip_tags($_GET['s'])) : false;
if (!$searchName) {
    redirect();
}
if (!$_GET['page'] && !$_SESSION['alert']) {
    $findWord = Table::Fetch('search_keyword', $searchName, 'word');
    if (!$findWord) {
        $table = new Table('search_keyword', $_GET);
        $table->word = $searchName;
        $table->create_time = time();
        $table->Insert(array(
            'word', 'create_time',
        ));
    } else {
        $times = time();
        Table::UpdateCache('search_keyword', $findWord['id'], array('count' => $findWord['count'] + 1, 'create_time' => $times));
    }
}
$total_begin = microtime(true);
$from = date('Ymd', time());
$xs = new XS('apt');
$search = $xs->search;
$search->setFuzzy(true);
$search->setCharset('UTF-8');
$search->setQuery($searchName);
$search->addRange('begin_time', null, $from);
$search->addRange('end_time', $from, null);
$search->setSort('sort_order');
$search->setLimit(1000000);
$docss = $search->search();
$cities = option_category();
foreach ($docss as $one) {
    if ($one['city_id'] != $city['id']) {
        if ($one['city_id'] != 0) {
            $cityList = array_filter(explode('@', $one['city_ids']));
            if (!in_array($city['id'], $cityList)) {
                continue;
            }
        }
    }
    $docs[] = $one;
}
$count = count($docs);
////主页猜您喜欢----销量高的推荐
//$option = array(
//    'condition' => array(
//        "end_time > UNIX_TIMESTAMP() AND begin_time < UNIX_TIMESTAMP() AND class_type='local' AND city_id={$city['id']} "
//    ),
//    'select' => 'id,product,product_sms,class_type,image,title,market_price,team_price,now_number,pre_number ,COUNT(DISTINCT partner_id) ',
//    'group' => ' GROUP BY partner_id',
//    'order' => 'ORDER BY now_number DESC limit 1,120 ',
//);
//$allHistoryData = DB::LimitQuery('team', $option);
//foreach (array_rand($allHistoryData,3) as $one){
//    $allHistoryDataTo[] = $allHistoryData[$one];
//}
//
//$option1 = array(
//    'condition' => array(
//        "end_time > UNIX_TIMESTAMP() AND begin_time < UNIX_TIMESTAMP() AND city_id='0' "
//    ),
//    'select' => 'id,product,product_sms,class_type,image,title,market_price,team_price,now_number,pre_number ,COUNT(DISTINCT partner_id) ',
//    'group' => ' GROUP BY partner_id',
//    'order' => 'ORDER BY now_number DESC limit 100,160 ',
//);
//$allHistoryData1 = DB::LimitQuery('team', $option1);
//foreach (array_rand($allHistoryData1,3) as $one){
//    $allHistoryDataTo1[] = $allHistoryData1[$one];
//}
////主页猜您喜欢 end-----------------------
include template('team_search');

function RemoveXSS($val) {
    // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed  
    // this prevents some character re-spacing such as <java\0script>  
    // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs  
    $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

    // straight replacements, the user should never need these since they're normal characters  
    // this prevents like <IMG SRC=@avascript:alert('XSS')>  
    $search = 'abcdefghijklmnopqrstuvwxyz';
    $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $search .= '1234567890!@#$%^&*()';
    $search .= '~`";:?+/={}[]-_|\'\\';
    for ($i = 0; $i < strlen($search); $i++) {
        // ;? matches the ;, which is optional 
        // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars 
        // @ @ search for the hex values 
        $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val); // with a ; 
        // @ @ 0{0,7} matches '0' zero to seven times  
        $val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val); // with a ; 
    }

    // now the only remaining whitespace attacks are \t, \n, and \r 
    $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
    $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
    $ra = array_merge($ra1, $ra2);

    $found = true; // keep replacing as long as the previous round replaced something 
    while ($found == true) {
        $val_before = $val;
        for ($i = 0; $i < sizeof($ra); $i++) {
            $pattern = '/';
            for ($j = 0; $j < strlen($ra[$i]); $j++) {
                if ($j > 0) {
                    $pattern .= '(';
                    $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                    $pattern .= '|';
                    $pattern .= '|(&#0{0,8}([9|10|13]);)';
                    $pattern .= ')*';
                }
                $pattern .= $ra[$i][$j];
            }
            $pattern .= '/i';
            $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag  
            $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags  
            if ($val_before == $val) {
                // no replacements were made, so exit the loop  
                $found = false;
            }
        }
    }
    return $val;
}

