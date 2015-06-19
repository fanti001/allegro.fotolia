<?php
session_start();
require('libs/Smarty.class.php');
require_once('phpmailer/class.phpmailer.php');
require './config.php';
require './obrazek.class.php';


function pobierz_tapete($material) {
	global $CONF_tapeta;
	return !empty($CONF_tapeta[$material]) ? $CONF_tapeta[$material] : false;
}


function pobierz_tapete_cust($material) {
	global $CONF_tapeta_cust;
	return !empty($CONF_tapeta_cust[23][$material]) ? $CONF_tapeta_cust[23][$material] : false;	
}


function select_license($licenses, $obraz, $potwierdzenie) {
	$w_zoom = $obraz->m_W/abs($potwierdzenie['Sx2']-$potwierdzenie['Sx1']);   
	$h_zoom = $obraz->m_H/abs($potwierdzenie['Sy2']-$potwierdzenie['Sy1']);   
	$zoom = $w_zoom < $h_zoom ? $w_zoom : $h_zoom;   
	foreach($licenses as $license) {
		if ($zoom*12*$potwierdzenie['w'] < $license['w'] && $zoom*12*$potwierdzenie['h'] < $license['h']) {
			break;
		}
	}
	return $license;
}


$smarty = new Smarty;
$smarty->force_compile = true;
$smarty->caching = false;
//$smarty->debugging = true;

$material = intval(@$_POST["material"]);
if (intval($_POST['panorama']) =='0'){
if (!($TAPETA = pobierz_tapete($material)))
	die('Error: '.__LINE__);
}else{
if (!($TAPETA = pobierz_tapete_cust($material)))
	die('Error: '.__LINE__);	
}
$zamowienie    = new zamowienie();
$potwierdzenie = array();
$potwierdzenie['w']                 = intval($_POST["w"]);
$potwierdzenie['h']                 = intval($_POST["h"]);
$potwierdzenie['Sx1']               = intval($_POST["Sx1"]);
$potwierdzenie['Sy1']               = intval($_POST["Sy1"]);
$potwierdzenie['Sx2']               = intval($_POST["Sx2"]);
$potwierdzenie['Sy2']               = intval($_POST["Sy2"]);

if (!empty($_POST["id_obrazu"]) && preg_match('/^\d+$/', $_POST["id_obrazu"])) {
	$potwierdzenie['id_obrazu'] = $_POST["id_obrazu"];
	$potwierdzenie['custom']    = false;
} elseif (!empty($_POST["id_obrazu"]) && preg_match('/^F_(\d+)$/', $_POST["id_obrazu"], $match)) {
	$potwierdzenie['id_obrazu'] = $match[1];
	$potwierdzenie['custom']    = false;
} elseif (!empty($_SESSION['custom_img_name']) && preg_match('/^[a-z0-9_.]+$/i', $_SESSION['custom_img_name']) && is_file('./galeria/CUSTOM/'.$_SESSION['custom_img_name'])) {
	$potwierdzenie['id_obrazu'] = 0;
	$potwierdzenie['custom']    = $_SESSION['custom_img_name'];
	$licencja = 0;
} else
	die(__LINE__.' Brak obrazu');

if ($_POST["katalog"]=='fotolia' && $potwierdzenie['id_obrazu']) {
	$fotolia_proxy = new fotolia_proxy();
	$obraz = $fotolia_proxy->getObrazki(array($potwierdzenie['id_obrazu']));
	$obraz = (object) $obraz[$match[0]];
	if (empty($obraz))
		die('Error: '.__LINE__);
	$obraz->license = !empty($obraz->license_M) ? $obraz->license_M : 20;// zabezpieczamy przed brakiem licencji M
	if (empty($CONF_Mlicense)) {
		$lic = select_license($fotolia_proxy->licenses(), $obraz, $potwierdzenie);
		$licencja = $lic['price'];
	} else
		$licencja = $obraz->license_M;
}


////////////////////////////////////////////////////////////////////////////////////////


$zamowienie->powierzchnia_rzeczywista = $potwierdzenie['powierzchnia'] = floor($potwierdzenie['w'] * $potwierdzenie['h'] /100)/100;

$potwierdzenie['powierzchnia']      = ($potwierdzenie['powierzchnia'] >1) ? $potwierdzenie['powierzchnia'] : 1;
$potwierdzenie['login']             = @$_POST["login"];
$potwierdzenie['email']             = @$_POST["email"];
$potwierdzenie['efekt']             = (preg_match('#^(grayscale|sepia)/[a-z0-9_]+/[a-z0-9_\-]+(\.jpe?g)?$#i', $_POST["efekt"], $match)) ? $match[1] : 'pełny kolor';
$potwierdzenie['material']          = $TAPETA[0];
$potwierdzenie['cena_jednostkowa']  = $TAPETA[1];
$potwierdzenie['aukcja']            = $CONF_aukcje[$material];
$potwierdzenie['aukcja_kalkulator'] = $CONF_kalkulator;
//$potwierdzenie['licencja']          = $licencja;
$potwierdzenie['klej_selected']     = !empty($_POST['klej']);
$potwierdzenie['klej']              = $TAPETA[2];
$potwierdzenie['klej_nazwa']        = $TAPETA[3];
$potwierdzenie['klej_aukcja']       = $CONF_aukcje_klej[$TAPETA[2]];
$potwierdzenie['cena_klej']         = $TAPETA[4];
//$potwierdzenie['cena_licencja']     = intval($potwierdzenie['licencja']*$CONF_cena_kredytu);
$potwierdzenie['cena_tapeta']       = intval($potwierdzenie['powierzchnia']*$TAPETA[1]);
//$potwierdzenie['cena_tapeta']       = intval($potwierdzenie['powierzchnia']*$TAPETA[1] + $potwierdzenie['cena_licencja']);
$potwierdzenie['cena']              = $potwierdzenie['cena_tapeta']; 
$potwierdzenie['szt']               = intval($potwierdzenie['cena']/$potwierdzenie['cena_jednostkowa']*10);

if ($potwierdzenie['w']<10 || $potwierdzenie['w']>999 || $potwierdzenie['h']<10 || $potwierdzenie['h']>999)
	die('Error: '.__LINE__.' Nieproprawny wymiar tapety');

$zamowienie->powierzchnia = $potwierdzenie['powierzchnia'];
$zamowienie->login        = $potwierdzenie['login'];
$zamowienie->email        = $potwierdzenie['email'];
$zamowienie->w            = $potwierdzenie['w'];
$zamowienie->h            = $potwierdzenie['h'];
$zamowienie->id_obrazu    = $potwierdzenie['id_obrazu'];
$zamowienie->custom       = $potwierdzenie['custom'];
$zamowienie->material     = $potwierdzenie['material'];
$zamowienie->cena_klej    = $potwierdzenie['cena_klej'];
$zamowienie->kadr         = '('.$potwierdzenie['Sx1'].','.$potwierdzenie['Sy1'].') ('.$potwierdzenie['Sx2'].','.$potwierdzenie['Sy2'].')';
$zamowienie->efekt        = $potwierdzenie['efekt'];
$zamowienie->cena_tapeta  = $potwierdzenie['cena_tapeta'];
$zamowienie->add();



if (preg_match('/^F_\d+$/', $_POST['id_obrazu'])) {
	$kategoria->folder = 'fotolia';
	$obraz->plik = 'F_'.$zamowienie->id_obrazu;
} elseif ($potwierdzenie['id_obrazu']) {
	$obraz   = new obrazek($potwierdzenie['id_obrazu']);
	$kategoria = new kategoria($obraz->kategoria);
} elseif (!empty($zamowienie->custom)) {
	$kategoria->folder = 'CUSTOM';
	$obraz->plik = 'm_'.$zamowienie->custom;
} else
	die(__LINE__.' Brak obrazu');

$mail = new PHPMailer();
$mail->PluginDir = "phpmailer/";
$mail->From = "info@kamedia.pl";
$mail->FromName = "Allegro kamedia konfigurator Fototapet";
$mail->Host = "ALT3.ASPMX.L.GOOGLE.COM";
$mail->Mailer = "smtp";
$mail->Username = "info@kamedia.pl";
$mail->Password = "agzeara001";
$mail->SMTPAuth = false;
$mail->Port = 25;
$mail->SetLanguage("pl", "phpmailer/language/");
$mail->CharSet = "UTF-8";

$mail->AddAddress($potwierdzenie['email']);		// ADRESAT
$mail->IsHTML(true);							// send as HTML

$mail->Subject = "Wiadomość z konfiguratora Allegro.Kamedia.pl";

$tmpKadrName = tempnam(sys_get_temp_dir(), 'kadr_');
$kadrURL = "http://allegro.kamedia.pl/img_effect.php?file=".urlencode($kategoria->folder.'/'.$obraz->plik)."&crop=".$potwierdzenie['Sx1'].",".$potwierdzenie['Sy1'].",".$potwierdzenie['Sx2'].",".$potwierdzenie['Sy2']."&effect=".urlencode($potwierdzenie['efekt']).'&border=1';
$potwierdzenie['kadr'] = $kadrURL;

file_put_contents($tmpKadrName, file_get_contents($kadrURL));

$mail->AddEmbeddedImage($tmpKadrName, 'kadr', '', 'base64', 'image/jpeg');
$smarty->assign('potwierdzenie', $potwierdzenie);

if ($CONF_sendEmailOnOrder == TRUE){
    $body  = $smarty->fetch('wysylka.tpl');

if (empty($_POST['miodek'])) {
		
	$mail->AltBody = $body;										
	$mail->MsgHTML($body);
	$mail->Send();
	
	$mail->ClearAllRecipients();
	$mail->AddAddress('info@kamedia.pl');		// do nas
	$mail->IsHTML(true);						// send as HTML
	
	$mail->MsgHTML('<p>Zapytanie:<br/><pre>'.print_r($_REQUEST, 1).'</pre>'.$body);	
	$mail->Send();
}
}
 

unlink($tmpKadrName);

$smarty->display('e-mail.tpl');
