<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$teams = current_team($city['id']);
//if (!$team) die(include template('wap_index'));
foreach ($teams as $key => $team) {

	print_r($teams);exit;
}
exit;
die(include template('wap_index'));

$_GET['id'] = abs(intval($team['id']));
die(require_once(dirname(__FILE__) . '/team.php'));
