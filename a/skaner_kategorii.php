<?php
require('libs/Smarty.class.php');
require './config.php';
require './obrazek.class.php';
$smarty = new Smarty;

$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
error_reporting(E_ALL);
error_reporting(2047);
set_time_limit(0);

if (!isset($_GET['id'])) {
	$id = 'mosty';// retrieve data from an image even if nothing is sent, only useful for the sample
} else {
	$id = $_REQUEST['id'];
	}

$PATH = $PATH . $id .'\\';

$kategoria = new kategoria();
$obrazek   = new obrazek();

$kategorie = $kategoria->get_all();
print_r($kategorie);
/*
foreach ($kategorie as $katObj) {
//	$katObj->id;
	echo iconv('utf-8', 'ISO-8859-1//TRANSLIT', $katObj->nazwa);
	$obrazek->get_all('kategoria=0 AND katalog LIKE "%\\'.iconv('utf-8', 'ISO-8859-1//TRANSLIT', $katObj->nazwa).'"');
	while ($obrazek->get_all_next()) {
		$obrazek->ustaw_kategorie($katObj->id);
	}
}
*/	
$smarty->assign('kategorie',$kategorie);
$smarty->assign('path',$web_PATH);	  
$smarty->display('skaner_kategorii.tpl');
