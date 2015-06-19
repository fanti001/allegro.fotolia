<?php
require('libs/Smarty.class.php');
//require './config.php';
$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
require './config.php';
require './obrazek.class.php';

$kat = intval(@$_GET['kat']);
if ($kat<0 || $kat>24)
	$kat = 1;

$kategoria = new kategoria($kat);
$kategoria->get_obrazki_all();

$obrazki = array();
while ($obrazek = $kategoria->get_obrazki_all_next()) {
	$obrazki[$obrazek->id] = array('id'=>$obrazek->id, 'url'=>'galeria/'.$kategoria->folder.'/'.$obrazek->plik);
}
$smarty->assign('kategoria', $kategoria);	  
$smarty->assign('obrazki',   $obrazki);
$smarty->assign('id_prefix',   '');	
$smarty->assign('szukaj_wiecej', false);

if (in_array($kat, array(15, 23), true)) {
	$smarty->display('kategorieTree_1.tpl');
	} else {
	$smarty->display('kategorieTree.tpl');
	}