<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/app.php');
/**
 * PHP SDK for QQ��¼ OpenAPI
 *
 * @version 1.2
 * @author connect@qq.com
 * @copyright ? 2011, Tencent Corporation. All rights reserved.
 */

/**
 * @brief ���ļ���Ϊdemo�������ļ���
 */

/**
 * ��ʽ��Ӫ������رմ�����Ϣ
 * ini_set("error_reporting", E_ALL);
 * ini_set("display_errors", TRUE);
 * QQDEBUG = true  ����������ʾ
 * QQDEBUG = false ��ֹ������ʾ
 * Ĭ�Ͻ�ֹ������Ϣ
 */
define("QQDEBUG", true);
if (defined("QQDEBUG") && QQDEBUG)
{
    @ini_set("error_reporting", E_ALL);
    @ini_set("display_errors", TRUE);
}

/**
 * session
 */
//include_once("session.php");


/**
 * �������б�demo֮ǰ�뵽 http://connect.opensns.qq.com/����appid, appkey, ��ע��callback��ַ
 */
//���뵽��appid
//$_SESSION["appid"]    = yourappid; 
$_SESSION["appid"]    = 1102150978; 

//���뵽��appkey
//$_SESSION["appkey"]   = "yourappkey"; 
$_SESSION["appkey"]   = "zxFjVbfZ9VuG4f0p"; 

//QQ��¼�ɹ�����ת�ĵ�ַ,��ȷ����ַ��ʵ���ã�����ᵼ�µ�¼ʧ�ܡ�
//$_SESSION["callback"] = "http://your domain/oauth/get_access_token.php"; 
$_SESSION["callback"] = "http://www.aipintuan.com/thirdpart/qqlogin/qq_callback.php";

//QQ��Ȩapi�ӿ�.�������
$_SESSION["scope"] = "get_user_info";
//��ʱ����  add_share,list_album,add_album,upload_pic,add_topic,add_one_blog,add_weibo 
//print_r ($_SESSION);
?>
