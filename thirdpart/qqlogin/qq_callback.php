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

//QQ��¼�ɹ���Ļص���ַ,��Ҫ����access token
qq_callback();

//��ȡ�û���ʾid
get_openid();

//��ȡ�û���Ϣ
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

//��ȡ�û���������
$arr = get_user_info();
//if(get_magic_quotes_gpc()){
// $arr["nickname"] = stripslashes($arr["nickname"]);
//}
$msg = '�𾴵�QQ�û���' . $arr["nickname"] . '��ӭ����¼��Ʒ��.';
//$arr = $viewinfo_array;
//ע�����жϵ�½
//die('QQ��¼����ά���У����Ժ�����....');
if (!$_SESSION["openid"] || !$arr["nickname"]) {
//	print_r($arr);
//	exit();
    var_dump($_SESSION["openid"]);
    Session::Set('error', '��ȡQQ�ʺ�ʧ��!���Ժ�����!');
    Utility::Redirect(get_loginpage(WEB_ROOT . '/account/login.php'));
}
$sns = $_SESSION["openid"];
//SNS����ֱ�ӵ�¼
$exist_user = Table::Fetch('user', $sns, 'sns'); //�������ݿ����Ƿ�����ͬ��sns����
if ($exist_user) {
    Session::Set('user_id', $exist_user['id']); //��¼
    Session::Set('notice', "�𾴵�{$arr["nickname"]}����ӭ��ͨ����ѶQQ�˻��ص���Ʒ�ᣡ");
    ZCredit::Login($exist_user['id']);
    Utility::Redirect(get_loginpage(WEB_ROOT . '/')); //��ת
}

//�û������Ƿ��ظ���ȷ���û���
$prompt_name = $arr["nickname"];
$exist_user = Table::Fetch('user', $prompt_name, 'username'); //�鿴���û����Ƿ���
while (!empty($exist_user)) {//������ڣ�����������ֺ�׺
    $prompt_name = $arr["nickname"] . '_' . rand(1000, 9999);
    $exist_user = Table::Fetch('user', $prompt_name, 'username');
}

//�û������Զ�����
$prompt_email = rand(100000, 666666) . '@q_login.com';
$exist_user = Table::Fetch('user', $prompt_email, 'email'); //�鿴���ʼ����Ƿ���
while (!empty($exist_user)) {//������ڣ�����������ֺ�׺
    $prompt_email = rand(100000, 666666) . '@q_login.com';
    $exist_user = Table::Fetch('user', $prompt_email, 'email');
}

//�û��Ա��ֶδ���
$user_gender = $arr["gender"] == '��' ? 'M' : 'F';

//׼��д�������
$new_user_arr = array('username' => $prompt_name,
    'realname' => $prompt_name,
    'email' => $prompt_email,
    'password' => rand(10000000, 99999999),
    'gender' => $user_gender,
    'sns' => $sns,
    'snsfrom' => 'QQ',
);
if ($user_id = ZUser::Create($new_user_arr, true)) {
    Session::Set('user_id', $user_id); //��¼
    Session::Set('notice', "�𾴵�{$arr["nickname"]}����ӭ��ʹ����ѶQQ�˻���¼��Ʒ�ᣡ");
    Utility::Redirect(get_loginpage(WEB_ROOT . '/')); //��ת
} else {
    Session::Set('error', '���ݿ����,ע��ʧ��,���Ժ�����!');
    Utility::Redirect(get_loginpage(WEB_ROOT . '/account/login.php')); //��ת
}
//echo '<br><br>session<br>';
//print_r($_SESSION);
/* echo "<script>window.close();</script>"; */
?>
