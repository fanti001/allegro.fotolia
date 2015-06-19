<?php /*%%SmartyHeaderCode:18097994145392e4e5ab5877-03752208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1393346270,
      2 => 'file',
    ),
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1393346270,
      2 => 'file',
    ),
    '3a4f6f0d327fc7bc3ea86f63906a1bf934ca50c7' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1393365518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18097994145392e4e5ab5877-03752208',
  'variables' => 
  array (
    'foldery' => 0,
    'folder' => 0,
    'katalog' => 0,
    'obrazy' => 0,
    'obraz' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5392e4e5b011c9_98727749',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5392e4e5b011c9_98727749')) {function content_5392e4e5b011c9_98727749($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<title>Panel Administracyjny - Allegro.Kamedia.pl</title>
<meta name="description" content="Fototapeta na wymiar drukowana z twoich zdjęć lub zdjęć z banku zdjęć">
<meta name="keywords" content="fototapeta, fototapeta kuchenna,fototapety laminowane, druk na życzenie, obrazy na płótnie twojego zdjęcia" >
<meta name="author" content="Kamedia.pl" >
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css"  href="css/base.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="css/tooltip.css">
		<link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.imgareaselect.pack.js"></script>
		<script type="text/javascript" src="js/tooltip.js"></script>
  		<script type="text/javascript" src="js/bootstrap.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function(){
	});
</script>    
<script type="text/javascript">    
	$('.dropdown-toggle').dropdown()
</script>
			

</head>

<body>
	<div class="container" style="height: 10px;"><div class="panel">Panel administracyjny</div></div>
	
<div id="wraper">  
	<div class="menu" style="width: 393px;"> 
    <ul >
        <li><a href="foldery.php"> ../galeria</a></li>
		<li><a href="baza.php"> baza</a></li>	
		<li><a href="zamowienia.php">zamówienia</a></li>
        <li><a href="http://allegro.pl/listing/user/listing.php?us_id=27640620"> aukcje</a></li>
    </ul>
</div>		
    <div id="logo"><a href="index.php"><img src="images/logo.png" alt="logo kamedia"></a></div>

<img src="images/gwiazdki.jpg" alt="gwiazdki">


<div class="container">
	<div class="row">	
		<div class="col-lg-12 text-center">		
			<h5>Dostępne foldery:<h5>	
CUSTOM - -
abstrakcje - -
budowle - -
cialo - -
ciekawe - -
dinozaury - -
dzieci - -
kawa - -
kosmos - -
kuchenne - -
kwiaty - -
merlin - -
miasta - -
mosty - -
ogien - -
owoce - -
panele - -
panoramy - -
pojazdy - -
rabenda - -
spa - -
sport - -
test.jpg - -
test.png - -
uliczki - -
widoki - -
zielenina - -
zwierzatka - -
	<form class="form form-control" action="foldery.php" method="get" style="height: 60px; border: 0px solid black; box-shadow: 0 0 0;">
		<input type="text" name="folder" class="input">
		<button type="submit" class="btn btn-primary btn-info ">przeglądaj zdjęcia</button>
	</form>
</div></div>			
	<div class="container">
	<div class="row">	
			<div class="col-lg-11">
	<h3>../galeria/</h3>
			</div>

			
</div>
</div>
</div>







<div class="content" style="margin-top: 10px;">	  
<div id="tel" style="float: left; width: 270px; margin-left: 10px;">
	<p style="float: right; text-align: right;font-size: 12px;">
        <i class="icon-volume-up" style="margin-right: 20px;"></i><span class="text-info"  ><strong>Kontakt telefoniczny</strong></span><br>
				pon.- pt. w godzinach 9:00 - 17:00<br>
				tel. 517 895 092
	</p>
</div>

<div id="e_mail" style="float: left; width: 250px; margin-right: 10px;">
	<p style="float: right; text-align: right; font-size: 12px;">
			<a title="" href="mailto:info@kamedia.pl"><i class="icon-envelope" style="margin-right: 20px;"></i></a><span class="text-info" ><strong>Napisz do nas</strong></span><br>
			odpowiemy jak najszybciej<br>
			na każde Twoje pytanie
	</p>		
</div>

</div>

</div>
<div id="bottom" >
<div id="copyright" style="float: contour; margin-top: 30px">	Copyright © 2012 Kamedia.pl </div>
</div>
</body>
</html>
<?php }} ?>