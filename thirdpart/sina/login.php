<?php
require_once(dirname(__FILE__) . '/config.php');
require_once(dirname(__FILE__) . '/saetv2.ex.class.php');
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
redirect($code_url);