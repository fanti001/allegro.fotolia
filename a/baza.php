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

$kategoria = new kategoria(intval(@$_GET['kat']));
if (!$kategoria->id)
	$kategoria = new kategoria(1);
$smarty->assign('kategoria', $kategoria);

$kategoria->get_obrazki_all();
$i = 0;
$obrazki = array();
while ($obrazek = $kategoria->get_obrazki_all_next()) {
	$obrazki[$obrazek->id] = array('id'=>$obrazek->id, 'katalog'=>$kategoria->folder, 'plik'=>$obrazek->plik);
    $i = $i+1;
}
$smarty->assign('licznik', $i);	  
$smarty->assign('obrazki',   $obrazki);
/*
foreach($obrazki as $obrazek) {	
    $obrazek->kategoria = 15;
    $obrazek->katalog = $symbol;
    print_r($obrazek);
    $obrazek->add();
    }
*/
/*
$obrazek = new obrazek();
$obrazki = $obrazek->scan($PATH.$FOLDER);
foreach($obrazki as $obrazek) {	
	echo '.';
if($obrazek-> is_present($obrazek->plik)== TRUE)
	echo '+';
else {
	$obrazek->kategoria = 23;
    $obrazek->katalog = $symbol;
    print_r($obrazek);
    $obrazek->add();
	echo 'obrazek dodany';
}
    }
 * /
 */
	$smarty->display('baza.tpl');