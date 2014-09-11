<?php

require_once(dirname(__FILE__) . '/config.php');
require_once(dirname(__FILE__) . '/saetv2.ex.class.php');
$o = new SaeTOAuthV2(WB_AKEY, WB_SKEY);
if (isset($_REQUEST['code'])) {
    $keys = array();
    $keys['code'] = $_REQUEST['code'];
    $keys['redirect_uri'] = WB_CALLBACK_URL;
    try {
        $token = $o->getAccessToken('code', $keys);
    } catch (OAuthException $e) {
        Session::Set('error', '抱歉!系统异常出错:'.$e->getMessage().',请稍后登录重试!');
        Utility::Redirect(get_loginpage(WEB_ROOT . '/account/login.php')); //跳转
    }
    if ($token) {
        $c = new SaeTClientV2(WB_AKEY, WB_SKEY, $token['access_token']);
        $uid = $c->get_uid();
        $uid = $uid['uid'];
        $userInfo = $c->show_user_by_id($uid);
        $localSnsCode = 'sina_' . $userInfo['idstr'];
        $existUser = Table::Fetch('user', $localSnsCode, 'sns');
        if ($existUser) {
            Session::Set('user_id', $existUser['id']);
            ZCredit::Login($existUser['id']);
            Session::Set('notice', "尊敬的{$existUser['username']}，欢迎您通过新浪微博回到优品会!");
            Utility::Redirect(get_loginpage(WEB_ROOT . '/'));
        } else {
            $checkUserName = Table::Fetch('user', $userInfo['name'], 'username');
            while ($checkUserName) {
                $userInfo['name'] = $userInfo['name'] . rand(1000, 9999);
                $checkUserName = Table::Fetch('user', $userInfo['name'], 'username');
            }
            $userRandEmail = rand(10000000, 99999999) . '@sinalogin.com';
            $existEmail = Table::Fetch('user', $userRandEmail, 'email');
            while ($existEmail) {
                $userRandEmail = rand(10000000, 99999999) . '@sinalogin.com';
                $existEmail = Table::Fetch('user', $userRandEmail, 'email');
            }
            $userGender = $userInfo['gender'] == 'm' ? 'M' : 'F';
            $newUser = array(
                'username' => $userInfo['name'],
                'realname' => $userInfo['name'],
                'email' => $userRandEmail,
                'password' => rand(10000000, 99999999),
                'gender' => $userGender,
                'sns' => $localSnsCode
            );
            if ($userId = ZUser::Create($newUser, true)) {
                Session::Set('user_id',$userId);
                Session::Set('notice', "尊敬的{$newUser['username']}，欢迎您使用新浪微博登录优品会！");
                Utility::Redirect(get_loginpage(WEB_ROOT . '/'));
            } else {
                print_r($newUser);exit;
                Session::Set('error', '抱歉!系统异常出错002,请稍后登录重试!');
                Utility::Redirect(get_loginpage(WEB_ROOT . '/account/login.php')); //跳转
            }
        }
    } else {
        Session::Set('error', '抱歉!系统异常出错001,请稍后登录重试!');
        Utility::Redirect(get_loginpage(WEB_ROOT . '/account/login.php')); //跳转
    }
}