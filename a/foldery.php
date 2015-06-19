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

$PATH = '../galeria/';
$dir = scandir($PATH);
array_splice($dir,0,3);
$smarty->assign('foldery',$dir);


$symbol = $_GET['folder'];
if (in_array($symbol, $dir));
else {
	$symbol='mosty';
}
$ORYGINAL_FOLDER = $PATH.$symbol.'/';
$Rename_FOLDER = $ORYGINAL_FOLDER.'rename/';
$THUMBS_FOLDER = $ORYGINAL_FOLDER.'thumbs/';
$FOLDER = $symbol.'/';

$obraz = new obraz();
$obrazki = $obraz->scan($ORYGINAL_FOLDER);
//foreach($obrazki as $obraz) {	
	//print_r($obraz);
	//echo $obraz->plik;
	//echo '<img src="../galeria/'.$symbol.'/'.$obraz->plik.'">';
	
//    $obraz->zmiana_nazwy_pliku($obraz->katalog, $obraz->plik, $Rename_FOLDER, $symbol);
//	}


/*
// kopiujemy obrazki ze zmiana nazwy do podkatalogu rename
// tworzymy thumbnails w thumbs
$obraz = new obraz();
$obrazki = $obraz->scan($ORYGINAL_FOLDER);
echo 'scanowanie zakończone';
foreach($obrazki as $obraz) {	
    $obraz->zmiana_nazwy_pliku($obraz->katalog, $obraz->plik, $Rename_FOLDER, $symbol);
	} 

// tworzymy thumbnails
$obraz = new obraz();
$obrazki = $obraz->scan($Rename_FOLDER);
echo 'scanowanie zakończone';
foreach($obrazki as $obraz) {	
    $obraz->resize_obrazek($obraz->katalog, $obraz->plik, $THUMBS_FOLDER);
    }
*/
    
// tworzymy baze
/*
$obrazek = new obrazek();
$obrazki = $obrazek->scan($PATH.$FOLDER);
echo 'scanowanie zakończone';
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
	$smarty->assign ('obrazy', $obrazki);
	$smarty->assign ('katalog', $symbol);
	$smarty->display('index.tpl');