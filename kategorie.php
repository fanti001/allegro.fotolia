<?php
require_once ('./fotolia-api.php');
require('./libs/Smarty.class.php');
require ('./config.php');
require ('./obrazek.class.php');
$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

$kategoria = new kategoria(); // inicjalizacja z tabeli fotolia_kategorie
$kategorie = $kategoria->get_all(); // pobranie wszystkich kategorii (wg priorytetu)

$smarty->assign('kategorieTree', 'kategorieTree');
$smarty->assign('kategorie', $kategorie);

$smarty->display('kategorie.tpl');
 