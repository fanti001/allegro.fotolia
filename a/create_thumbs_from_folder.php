<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);;
set_time_limit(0);
require ('config.php');
require ('class_obraz.php');
require ('obrazek.class.php');

$PATH = 'E:\\';
//$PATH = 'Z:\Allegro.Kamedia.pl\brakujace zdjecia\\';
$symbol = 'panele';
$ORYGINAL_FOLDER = $PATH.$symbol.'\\';
$Rename_FOLDER = $ORYGINAL_FOLDER.'rename\\';
$THUMBS_FOLDER = $ORYGINAL_FOLDER.'thumbs\\';
$FOLDER = $symbol.'\\';

//print_r($PATH.$FOLDER);
//$dir = scandir($PATH.$FOLDER);
//print_r($dir); 

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