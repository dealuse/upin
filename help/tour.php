<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$page = Table::Fetch('page', 'help_tour');
$pagetitle = '如何团购';
include template('help_tour');
