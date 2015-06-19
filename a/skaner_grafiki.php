<?php
//error_reporting(2047);
set_time_limit(0);
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

require ('./config.php');
require ('./obrazek.class.php');

$PATH = 'D:\xampp\htdocs\Allegro-Kamedia\galeria/';

$obrazek = new obrazek();
$FOLDER = 'mosty/';
$PATH .= $FOLDER;
print_r($PATH);
$obrazki = $obrazek->scan($PATH);

foreach($obrazki as $obrazek) {
echo '.';
/*	$mysql->query("INSERT INTO grafiki SET nazwa='".addslashes($obrazek->nazwa)."', katalog='".addslashes($obrazek->katalog)."', plik='".addslashes($obrazek->plik)."', kategoria='".addslashes($obrazek->kategoria)."',  W='".$obrazek->W."',  H='".$obrazek->H."',  m_W='".$obrazek->m_W."',  m_H='".$obrazek->m_H."', IPTC_caption='".addslashes($obrazek->IPTC_caption)."', IPTC_graphic_name='".addslashes($obrazek->IPTC_graphic_name)."', IPTC_photo_source='".addslashes($obrazek->IPTC_photo_source)."'") or die('Blad: '.$mysql->error);
*/
}


/*print_r($obrazki);*/