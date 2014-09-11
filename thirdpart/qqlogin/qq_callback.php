<?php

require_once("comm/config.php");
require_once("comm/utils.php");

function qq_callback() {
    //debug
    //print_r($_REQUEST);
    //print_r($_SESSION);

    if ($_REQUEST['state'] == $_SESSION['state']) { //csrf
        $token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
                . "client_id=" . $_SESSION["appid"] . "&redirect_uri=" . urlencode($_SESSION["callback"])
                . "&client_secret=" . $_SESSION["appkey"] . "&code=" . $_REQUEST["code"];

        $response = get_url_contents($token_url);
        if (strpos($response, "callback") !== false) {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response = substr($response, $lpos + 1, $rpos - $lpos - 1);
            $msg = json_decode($response);
            if (isset($msg->error)) {
                echo "<h3>error:</h3>" . $msg->error;
                echo "<h3>msg  :</h3>" . $msg->error_description;
                exit;
            }
        }

        $params = array();
        parse_str($response, $params);

        //debug
        //print_r($params);
        //set access token to session
        $_SESSION["access_token"] = $params["access_token"];
    } else {
        echo("The state does not match. You may be a victim of CSRF.");
    }
}

function get_openid() {
    $graph_url = "https://graph.qq.com/oauth2.0/me?access_token="
            . $_SESSION['access_token'];

    $str = get_url_contents($graph_url);
    if (strpos($str, "callback") !== false) {
        $lpos = strpos($str, "(");
        $rpos = strrpos($str, ")");
        $str = substr($str, $lpos + 1, $rpos - $lpos - 1);
    }
    $user = json_decode($str);
    if (isset($user->error)) {
        echo "<h3>error:</h3>" . $user->error;
        echo "<h3>msg  :</h3>" . $user->error_description;
        exit;
    }

    //debug
    //echo("Hello " . $user->openid);
    //set openid to session
    $_SESSION["openid"] = $user->openid;
}

//QQ登录成功后的回调地址,主要保存access token
qq_callback();

//获取用户标示id
get_openid();

//获取用户信息
function get_user_info() {
    $get_user_info = "https://graph.qq.com/user/get_user_info?"
            . "access_token=" . $_SESSION['access_token']
            . "&oauth_consumer_key=" . $_SESSION["appid"]
            . "&openid=" . $_SESSION["openid"]
            . "&format=json";

    $info = get_url_contents($get_user_info);
    $arr = json_decode(
            preg_replace_callback(
                    array('/\\\x(\w{2})/i'), create_function('$matches', 'return chr(intval(base_convert($matches[1],16,10)));'
                    ), $info), true);
    print_r($arr["nickname"]);
    //$arr["nickname"] = htmlspecialchars($arr["nickname"],ENT_QUOTES,'UTF-8');
    //print_r($arr["nickname"]);
    return $arr;
}

//获取用户基本资料
$arr = get_user_info();
//if(get_magic_quotes_gpc()){
// $arr["nickname"] = stripslashes($arr["nickname"]);
//}
$msg = '尊敬的QQ用户：' . $arr["nickname"] . '欢迎您登录优品会.';
//$arr = $viewinfo_array;
//注册与判断登陆
//die('QQ登录正在维护中，请稍候再试....');
if (!$_SESSION["openid"] || !$arr["nickname"]) {
//	print_r($arr);
//	exit();
    var_dump($_SESSION["openid"]);
    Session::Set('error', '获取QQ帐号失败!请稍后重试!');
    Utility::Redirect(get_loginpage(WEB_ROOT . '/account/login.php'));
}
$sns = $_SESSION["openid"];
//SNS有了直接登录
$exist_user = Table::Fetch('user', $sns, 'sns'); //查找数据库中是否有相同的sns存在
if ($exist_user) {
    Session::Set('user_id', $exist_user['id']); //登录
    Session::Set('notice', "尊敬的{$arr["nickname"]}，欢迎您通过腾讯QQ账户回到优品会！");
    ZCredit::Login($exist_user['id']);
    Utility::Redirect(get_loginpage(WEB_ROOT . '/')); //跳转
}

//用户姓名是否重复并确定用户名
$prompt_name = $arr["nickname"];
$exist_user = Table::Fetch('user', $prompt_name, 'username'); //查看此用户名是否被用
while (!empty($exist_user)) {//如果存在，随机生成数字后缀
    $prompt_name = $arr["nickname"] . '_' . rand(1000, 9999);
    $exist_user = Table::Fetch('user', $prompt_name, 'username');
}

//用户信箱自动生成
$prompt_email = rand(100000, 666666) . '@q_login.com';
$exist_user = Table::Fetch('user', $prompt_email, 'email'); //查看此邮件名是否被用
while (!empty($exist_user)) {//如果存在，随机生成数字后缀
    $prompt_email = rand(100000, 666666) . '@q_login.com';
    $exist_user = Table::Fetch('user', $prompt_email, 'email');
}

//用户性别字段处理
$user_gender = $arr["gender"] == '男' ? 'M' : 'F';

//准备写入的数据
$new_user_arr = array('username' => $prompt_name,
    'realname' => $prompt_name,
    'email' => $prompt_email,
    'password' => rand(10000000, 99999999),
    'gender' => $user_gender,
    'sns' => $sns,
    'snsfrom' => 'QQ',
);
if ($user_id = ZUser::Create($new_user_arr, true)) {
    Session::Set('user_id', $user_id); //登录
    Session::Set('notice', "尊敬的{$arr["nickname"]}，欢迎您使用腾讯QQ账户登录优品会！");
    Utility::Redirect(get_loginpage(WEB_ROOT . '/')); //跳转
} else {
    Session::Set('error', '数据库出错,注册失败,请稍后重试!');
    Utility::Redirect(get_loginpage(WEB_ROOT . '/account/login.php')); //跳转
}
//echo '<br><br>session<br>';
//print_r($_SESSION);
/* echo "<script>window.close();</script>"; */
?>
