<?php
session_start();
require('libs/Smarty.class.php');
//require './config.php';
$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
require './config.php';
require './obrazek.class.php';
require './fotolia-api.php';

define('FOTOLIA_LIMIT', 49);

$kat = 0;
$offset = 0;
$words = '';
$filters = !empty($CONF_Fotolia_search_filters) ? $CONF_Fotolia_search_filters : array();

if (!empty($_POST['words'])) {
	$words   = $_POST['words'];
	$kat     = 0;
} elseif (!empty($_GET['st']) && $_GET['st']>0) {
	$offset  = (intval($_GET['st'])-1)*FOTOLIA_LIMIT;
	$words   = $_SESSION['fotolia_words'];
	$kat     = $_SESSION['fotolia_kat'];
}	

if (!empty($_POST['fotolia_kat'])) {
	$words = '';
	$kat = intval($_POST['fotolia_kat']);
	$kategoria = new fotolia_kategoria($kat);
	if ($kategoria->id) {
		$words = ($kategoria->fotolia_words) ? $kategoria->fotolia_words : $kategoria->nazwa;
		if ($kategoria->fotolia_filters) {
			foreach (explode(',', $kategoria->fotolia_filters) as $val) {
				$t = explode('=', trim($val));
				$filters[$t[0]] = $t[1];
			}
		}
	}
	$_SESSION['fotolia_kat'] = $kategoria->id;
	$smarty->assign('szukaj_wiecej', false);
} elseif (!empty($words)) {
	$kategoria = new fotolia_kategoria($kat);
	$smarty->assign('szukaj_wiecej', false);
} else {
	$kategoria = new fotolia_kategoria($kat);
	$smarty->assign('szukaj_wiecej', true);
}
$_SESSION['fotolia_words'] = $words;
	$search = array(
        'words' => $words,
        'language_id' => Fotolia_Api::LANGUAGE_ID_PL_PL,
        'limit'   => FOTOLIA_LIMIT,
		'offset'  => $offset,
		'filters' => $filters,
    );
//	print_r($search);
	$api = new Fotolia_Api('FA0Rk7oT5QO4d9rotn4f6agJkefZJa5P');
	$ret = $api->getSearchResults($search);

	$nb_results = $ret['nb_results'];
	unset($ret['nb_results']);

	foreach ($ret as $key=>$val) {
		$obrazki[$val['id']] = array('id'=>$val['id'], 'url'=>$val['thumbnail_400_url']);
	}

	$smarty->assign('strona', floor($offset/FOTOLIA_LIMIT)+1);
	$smarty->assign('stron', ceil($nb_results/FOTOLIA_LIMIT));

	$smarty->assign('kategoria', $kategoria);
	$smarty->assign('obrazki',   $obrazki);	
	$smarty->assign('id_prefix',   'F_');	
	$smarty->display('kategorieTree.tpl');
