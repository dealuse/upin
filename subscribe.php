<?php
require_once(dirname(__FILE__) . '/app.php');
require_once(dirname(__FILE__) . '/MailChimp.php');
$tip = strval($_GET['tip']);

if ( $_POST ) {
	$city_id = abs(intval($_POST['city_id']));
	ZSubscribe::Create($_POST['email'], $city_id);
	$MailChimp = new \Drewm\MailChimp(MC_KEY);
		$result = $MailChimp->call('lists/subscribe', array(
                'id'                => '9a249e7984',
                'email'             => array('email' => $_POST['email']),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            ));
	cookie_city( $city = Table::Fetch('category', $city_id));
	die(include template('subscribe_success'));
}

$pagetitle = '邮件订阅';
include template('subscribe');
