<?php
//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', 1);;
set_time_limit(0);
require ('../config.php');
require ('class_obraz.php');
require ('../obrazek.class.php');

require('libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$kategoria = new kategoria();

$kategorie = $kategoria->get_all();
$smarty->assign ('kategorie', $kategorie);

$zamowienie = new zamowienie();
$ilosc_zam = $zamowienie->zlicz();
$id_ostatnie_zam = $ilosc_zam->num_rows;

$id_zam = (intval(@$_GET['id']));
if(empty($id_zam))
	$id_zam = intval ($id_ostatnie_zam);


$zamowienie->get($id_zam);
$id_obrazu = $zamowienie->id_obrazu;
$kadr = $zamowienie->kadr;

$lista_zamowien = new zamowienie();
$login = $zamowienie->login;
$lista = $lista_zamowien->get_lista($login);

$find = ") (";
$replace = ",";
$kadr = str_replace($find , $replace , $kadr);
$find = ")";
$replace = "";
$kadr = str_replace($find , $replace , $kadr);
$find = "(";
$replace = "";
$kadr = str_replace($find , $replace , $kadr);
$find = ",";

$kadr = explode(",", $kadr);

$obraz = new obrazek();
$obraz->get($id_obrazu);

$smarty->assign('kadr', $kadr );
$smarty->assign('id_ostatnie_zam', $id_ostatnie_zam );
$smarty->assign('obraz', $obraz );
$smarty->assign('zamowienie', $zamowienie);
$smarty->assign('lista', $lista);
if($obraz->kategoria == 23){
	$smarty->display('zamowienia_panele.tpl');
}
if($obraz->kategoria == 15){
	$smarty->display('zamowienia_panoramy.tpl');
} 

	$smarty->display('zamowienia.tpl');
