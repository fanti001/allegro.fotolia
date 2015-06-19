<?php
session_start();
require('libs/Smarty.class.php');
require './config.php';
require './obrazek.class.php';

$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = false;
$smarty->cache_lifetime = 120;
//print_r($_GET);

if (!empty($_GET['mode']) && $_GET['mode']=='custom' && !empty($_SESSION['custom_img_name'])) {
	$mode = 'custom';
	$obraz = new stdClass();
	$obraz->kategoria = 0;
	$obraz->plik = $obraz->id = $_SESSION['custom_img_name'];
	$obraz->license   = 0; // bez oplaty licencyjnej
	list($obraz->W, $obraz->H) = getimagesize('./galeria/CUSTOM/'.$_SESSION['custom_img_name']);
	list($obraz->m_W, $obraz->m_H) = getimagesize('./galeria/CUSTOM/m_'.$_SESSION['custom_img_name']);
	$miniatura = 'CUSTOM/m_'.$_SESSION['custom_img_name'];
	$kategoria = new stdClass();
	$kategoria->id = 0;
	$kategoria->folder = 'CUSTOM';

	//$smarty->assign('id_prefix', '');
} else
	$mode = 'galeria';
	$id = intval(@$_GET['id']);
	$obraz = new obrazek($id);
	if (empty($obraz->id))
		$obraz = new obrazek(149);
	//$obraz->license = $obraz->license_M;
	$kategoria = new kategoria($obraz->kategoria);
	$miniatura = $kategoria->folder.'/'.$obraz->plik;


if (!empty($CONF_tapeta_cust[$obraz->kategoria])) 
	$CONF_tapeta = $CONF_tapeta_cust[$obraz->kategoria];

$CONF_tapeta_JS = "var mode='$mode';\n";
$CONF_tapeta_JS .= "var tapeta = new Object();\n";
foreach ($CONF_tapeta as $key=>$val) {
	$CONF_tapeta_JS .= "tapeta['$key'] = new Object();\n";
	$CONF_tapeta_JS .= "tapeta['$key'].nazwa = '".$val[0]."';\n";
	$CONF_tapeta_JS .= "tapeta['$key'].cena = ".$val[1].";\n";
	$CONF_tapeta_JS .= "tapeta['$key'].klej_id = '".$val[2]."';\n";
	$CONF_tapeta_JS .= "tapeta['$key'].klej = '".$val[3]."';\n";
	$CONF_tapeta_JS .= "tapeta['$key'].klej_cena = ".$val[4].";\n";
}

if (!empty($licensesArray)) {
	$CONF_tapeta_JS .= "license_value = ".$CONF_cena_kredytu.";\n";
	$CONF_tapeta_JS .= "licenses = new Object();\n";
	foreach ($licensesArray as $key=>$val) {
		$CONF_tapeta_JS .= "licenses['$key'] = new Object();\n";
		$CONF_tapeta_JS .= "licenses['$key'].name = '".$key."';\n";
		$CONF_tapeta_JS .= "licenses['$key'].price = ".$val['price'].";\n";
		$CONF_tapeta_JS .= "licenses['$key'].w = ".$val['w'].";\n";
		$CONF_tapeta_JS .= "licenses['$key'].h = ".$val['h'].";\n";
	}
}

$smarty->assign('mode', $mode);
$smarty->assign('license_price', '0');
$smarty->assign('obraz', $obraz);
$smarty->assign('kategoria', $kategoria);
$smarty->assign('CONF_tapeta', $CONF_tapeta_JS);
$smarty->assign('miniatura', $miniatura);

if ($kategoria->id == 23 || $kategoria->id == 15 ){
	$smarty->display('buy23.tpl');
} else {
	$smarty->display('buy.tpl');
}