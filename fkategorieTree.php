<?php
require('libs/Smarty.class.php');
//require './config.php';
$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
$smarty->cache_lifetime = 120;
require './config.php';
require './obrazek.class.php';
require './fotolia-api.php';

$kategoria = new fotolia_kategoria(intval(@$_GET['kat'])); // pobranie kategorii wg numeru
if (!$kategoria->id)
	$kategoria = new fotolia_kategoria(1); // pobranie alternatywnej kategorii
$smarty->assign('kategoria', $kategoria);
$fotolia_proxy = new fotolia_proxy();
$ret = $fotolia_proxy->getObrazki($kategoria->get_all_ids());
foreach ($ret as $key=>$val) {
	$obrazki[$val['id']] = array('id'=>$val['fotolia_id'], 'url'=>$val['thumbnail_url']);
}
$smarty->assign('obrazki', $obrazki);

$smarty->assign('id_prefix', 'F_');

$smarty->assign('szukaj_wiecej', true);

if (in_array($kat, array(15, 23), true)) {
	$smarty->display('kategorieTree'.$kat.'.tpl');
} else {
	$smarty->display('kategorieTree.tpl');
}