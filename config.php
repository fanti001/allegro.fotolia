<?php
date_default_timezone_set('Europe/Warsaw');
$CONF_http = 'http://allegro.kamedia.pl';
$CONF_sendEmailOnOrder = TRUE;
ini_set('display_errors', 1);
//error_reporting(E_ALL | E_STRICT);

$CONF_aukcje = array(
	
1=>'http://allegro.pl/fototapeta-fototapety-psy-koty-konie-i5048731254.html',
	
2=>'http://allegro.pl/fototapeta-fototapety-uliczki-producent-i5048730275.html',
	
3=>'http://allegro.pl/fototapeta-kuchenna-fototapety-kuchenne-i5772261405.html',
	
4=>'http://allegro.pl/fototapeta-kuchenna-fototapety-kuchenne-i5772261405.html',
);



$CONF_aukcje_klej = array(
	1=>'',
	2=>'',
);

$CONF_kalkulator = 'http://allegro.pl/fototapeta-fototapety-kalkulator-na-wymiar-i3113689013.html';

$CONF_cena_kredytu = 0;
$CONF_Mlicense = TRUE;

// --- Zmiana nazwy wymaga zmiany również w bazie! ---
$CONF_tapeta = array(
	1=>array('lateksowa 140g',				39, 1, 'METYLAN NORMAL',	14),
	2=>array('lateksowa 212g',				49, 1, 'METYLAN NORMAL',	14),
	3=>array('lateksowa laminowana gloss',	59, 2, 'METYLAN SPECJAL',	32),
	4=>array('lateksowa laminowana matt',	59, 2, 'METYLAN SPECJAL',	32)
);

$CONF_tapeta_cust[23] = array(
	3=>array('lateksowa laminowana gloss',	59, 2, 'METYLAN SPECJAL',	32),
	4=>array('lateksowa laminowana matt',	59, 2, 'METYLAN SPECJAL',	32)
);
// --- ---

$CONF_Fotolia_search_filters = array(
	'content_type:photo'        =>1,
	'content_type:illustration' =>1,
	'content_type:vector'       =>1,
	'content_type:video'        =>0,
	'content_type:all'          =>1,
	'offensive:2'               =>1,
);

if ($_SERVER["HTTP_HOST"] == 'localhost') {
	error_reporting(2047);

global $db;
	class DB_Conf {
		protected static $db_host = 'localhost';
		protected static $db_user = 'user_kamedia';
		protected static $db_pass = 'AgzeArA_001_kamedia';
		protected static $db_base = 'admin_Kamedia_allegro';
	}
	$PATH = 'E:\galeria\\';		//scieżka do galerii
} else {
	$PATH = 'E:\galeria\\';		//scieżka do galerii
	class DB_Conf {
		protected static $db_host = 'localhost';
		protected static $db_user = 'allegro.kamedia';
		protected static $db_pass = '6axUSTwB7WwrpJd6';
		protected static $db_base = 'allegro.kamedia';
	}
}

