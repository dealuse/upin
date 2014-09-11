<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
require_once(dirname(dirname(__FILE__)) . '/MailChimp.php');

if ( $_POST ) {
	//verify_captcha('verifyregister', WEB_ROOT . '/account/signup.php');
	$u = array();
	$u['username'] = strval($_POST['username']);
	$u['password'] = strval($_POST['password']);
	$u['email'] = strval($_POST['email']);
	$u['city_id'] = isset($_POST['city_id']) 
		? abs(intval($_POST['city_id'])) : abs(intval($city['id']));
	$u['mobile'] = strval($_POST['mobile']);

	if ( $_POST['subscribe'] || true ) { 
		ZSubscribe::Create($u['email'], abs(intval($u['city_id']))); 
		$MailChimp = new \Drewm\MailChimp(MC_KEY);
		$result = $MailChimp->call('lists/subscribe', array(
                'id'                => '9a249e7984',
                'email'             => array('email' => $u['email']),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            ));

	}
	if ( ! Utility::ValidEmail($u['email'], true) ) {
		Session::Set('error', 'Email地址为无效地址');
		redirect(get_loginpage('signup.php'));
	}
	if ($_POST['password2']==$_POST['password'] && $_POST['password']) {
		if ( option_yes('emailverify') || option_yes('mobilecode') ) { 
			$u['enable'] = 'N'; 
		}
        if ( option_yes('emailverify')) { 
			$u['emailable'] = 'N'; 
		}
		if ( $user_id = ZUser::Create($u) ) {
			ZCredit::Register($user_id);
			if ( option_yes('emailverify') ) {
				mail_sign_id($user_id);
				Session::Set('unemail', $_POST['email']);
				redirect( WEB_ROOT . '/account/signuped.php');
			}else if ( option_yes('mobilecode') && !option_yes('emailverify')){
                                $user['id'] = $user_id;
			        die(include template('account_signmobile'));  
			}
                          else {
				ZLogin::Login($user_id);
				redirect(get_loginpage('index.php'));
			}
		} else {
			$au = Table::Fetch('user', $_POST['email'], 'email');
			if ( $au ) {
				Session::Set('error', '注册失败，Email已被使用');
			} else {
				Session::Set('error', '注册失败，用户名已被使用');
			}
		}
	} else {
		Session::Set('error', '注册失败，密码设置有问题');
	}
}

$pagetitle = '注册';
include template('wap_register');
