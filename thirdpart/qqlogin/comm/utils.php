<?php
/**
 * PHP SDK for QQ��¼ OpenAPI
 *
 * @version 1.2
 * @author connect@qq.com
 * @copyright ? 2011, Tencent Corporation. All rights reserved.
 */

/**
 * @brief ���ļ�������OAuth��֤�����л��õ��Ĺ��÷��� 
 */

require_once("config.php");

function do_post($url, $data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($ch, CURLOPT_POST, TRUE); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
    curl_setopt($ch, CURLOPT_URL, $url);
    $ret = curl_exec($ch);

    curl_close($ch);
    return $ret;
}

function get_url_contents($url)
{
//    if (ini_get("allow_url_fopen") == "1")
//        return file_get_contents($url);

//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_URL, $url);
//    $result =  curl_exec($ch);
//    curl_close($ch);
    return file_get_contents($url);

    return $result;
}

?>