<?php
if (empty($_GET['id']))
	exit();
require_once './fotolia-api.php';

$api = new Fotolia_Api('FA0Rk7oT5QO4d9rotn4f6agJkefZJa5P');
$ret = $api->getMediaData((int)$_GET['id'], 400);
if (preg_match('#^https?://#', $ret['thumbnail_url'])) {
	$fp = fopen($ret['thumbnail_url'], 'rb');
	header("Content-Type: image/jpeg");
	fpassthru($fp);
}
exit;