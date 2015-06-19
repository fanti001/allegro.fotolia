<?php
session_start();
require('./libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

if (!empty($_FILES)) {
	if (preg_match('#^image/(png|gif|jpg|jpeg)$#', $_FILES['file']['type'], $match)) {
		$img_name = $match[1].time().'_'.mt_rand(1000, 9999).'.'.$match[1];
		move_uploaded_file($_FILES['file']['tmp_name'], './galeria/CUSTOM/'.$img_name);
		list($w, $h) = getimagesize('./galeria/CUSTOM/'.$img_name);
		$new_w = $w;
		$new_h = $h;
		if ($w>400 || $h>400) {
			if ($w>$h) {
				$new_w = 400;
				$new_h = round($h*($new_w/$w));
			} else {
				$new_h = 400;
				$new_w = round($w*($new_h/$h));
			}
		}
		$im = imagecreatetruecolor($new_w, $new_h);
		if ($match[1] == 'png') {
			if ($sImg = imagecreatefrompng('./galeria/CUSTOM/'.$img_name)) {
				imagecopyresized($im, $sImg, 0, 0, 0, 0, $new_w, $new_h, $w, $h);
				imagepng($im, './galeria/CUSTOM/m_'.$img_name);
			}
		} elseif ($match[1] == 'gif') {
			if ($sImg = imagecreatefromgif('./galeria/CUSTOM/'.$img_name)) {
				imagecopyresized($im, $sImg, 0, 0, 0, 0, $new_w, $new_h, $w, $h);
				imagegif($im, './galeria/CUSTOM/m_'.$img_name);
			}
		} else { // jpg
			if ($sImg = imagecreatefromjpeg('./galeria/CUSTOM/'.$img_name)) {
				imagecopyresized($im, $sImg, 0, 0, 0, 0, $new_w, $new_h, $w, $h);
				imagejpeg($im, './galeria/CUSTOM/m_'.$img_name);
			}
		}
		

		$smarty->assign('img_name', './galeria/CUSTOM/m_'.$img_name);
		$_SESSION['custom_img_name'] = $img_name;
		header('Location: buy.php?mode=custom');
		exit();
	}
}
$smarty->display('index_upload.tpl');