<?php /*%%SmartyHeaderCode:15215151825390830f2a3855-87186006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf3ce5a41c899eb02f43087296411bc1e51f8fdd' => 
    array (
      0 => './templates/zamowienia.tpl',
      1 => 1399829184,
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
  'nocache_hash' => '15215151825390830f2a3855-87186006',
  'variables' => 
  array (
    'kategorie' => 0,
    'kat' => 0,
    'id_ostatnie_zam' => 0,
    'zamowienie' => 0,
    'kadr' => 0,
    'obraz' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5390830f33b5c2_35659709',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5390830f33b5c2_35659709')) {function content_5390830f33b5c2_35659709($_smarty_tpl) {?><!DOCTYPE html>
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
normalne
<div class="container">
	<div class="row">	
        <div class="col-lg-2 text-left">
       <ul> tabela - kategorie
                
            <li><a href="baza.php?kat=23">kuchnia id=23</a></li>   
                 
            <li><a href="baza.php?kat=5">dla dzieci id=5</a></li>   
                 
            <li><a href="baza.php?kat=8">kuchnia 2 id=8</a></li>   
                 
            <li><a href="baza.php?kat=2">budowle id=2</a></li>   
                 
            <li><a href="baza.php?kat=22">ciekawe id=22</a></li>   
                 
            <li><a href="baza.php?kat=1">grafiki id=1</a></li>   
                 
            <li><a href="baza.php?kat=7">kawa id=7</a></li>   
                 
            <li><a href="baza.php?kat=6">kosmos id=6</a></li>   
                 
            <li><a href="baza.php?kat=19">krajobrazy id=19</a></li>   
                 
            <li><a href="baza.php?kat=9">kwiaty id=9</a></li>   
                 
            <li><a href="baza.php?kat=10">merlin id=10</a></li>   
                 
            <li><a href="baza.php?kat=11">miasta id=11</a></li>   
                 
            <li><a href="baza.php?kat=12">mosty id=12</a></li>   
                 
            <li><a href="baza.php?kat=3">natura id=3</a></li>   
                 
            <li><a href="baza.php?kat=13">ogień id=13</a></li>   
                 
            <li><a href="baza.php?kat=14">owoce id=14</a></li>   
                 
            <li><a href="baza.php?kat=15">panoramy id=15</a></li>   
                 
            <li><a href="baza.php?kat=16">pojazdy id=16</a></li>   
                 
            <li><a href="baza.php?kat=21">spa id=21</a></li>   
                 
            <li><a href="baza.php?kat=17">sport id=17</a></li>   
                 
            <li><a href="baza.php?kat=18">uliczki id=18</a></li>   
                 
            <li><a href="baza.php?kat=20">zwierzęta id=20</a></li>   
                </ul>
        </div>
		
        <div class="col-lg-10 text-center">		
			<h4>ilość zamówień 1124</h4>
<a href="zamowienia.php?id=-1"><< prev</a> <a href="zamowienia.php?id=1"> next>></a>              
                        
 <form class="form form-control" action="zamowienia.php" method="get" style="height: 60px; border: 0px solid black; box-shadow: 0 0 0;">
		<input type="text" name="id" class="input">
		<button type="submit" class="btn btn-primary btn-info ">zobacz zamówienie</button>
		<input type="hidden" id="x1" name="kadr" value="">
		<input type="hidden" id="y1" name="kadr" value="<br />
<b>Notice</b>:  Undefined offset: 1 in <b>/home/fanti/allegro.kamedia.pl/a/templates_c/cf3ce5a41c899eb02f43087296411bc1e51f8fdd.file.zamowienia.tpl.cache.php</b> on line <b>63</b><br />
">
		<input type="hidden" id="x2" name="kadr" value="<br />
<b>Notice</b>:  Undefined offset: 2 in <b>/home/fanti/allegro.kamedia.pl/a/templates_c/cf3ce5a41c899eb02f43087296411bc1e51f8fdd.file.zamowienia.tpl.cache.php</b> on line <b>65</b><br />
">
		<input type="hidden" id="y2" name="kadr" value="<br />
<b>Notice</b>:  Undefined offset: 3 in <b>/home/fanti/allegro.kamedia.pl/a/templates_c/cf3ce5a41c899eb02f43087296411bc1e51f8fdd.file.zamowienia.tpl.cache.php</b> on line <b>67</b><br />
"> 
             	</form>
		
			<div class="col-lg-7">
			<div class="thumbnail"  style="width: 100%; float: left;">
			<a href="#"><img src="../galeria//" class="" alt="" id="photo"></a>
		<div class="caption"> id= szer_min wys_min</div> 
			</div>
			<div>
				
			  id obrazu =  plik = <br>
			  szer_orginału = wys_orginału =<br>
			  katalog ../galeria/<br>
			  kategoria = 			
			</div>
			</div>
			<div class="col-lg-5">
			<h3>zamówienie = </h3>
                        
			<h4 class="text-danger">login </h4>
			ip      <br>
			email  <br>
			materiał <br>
			szerokość  cm<br>
			wysokość  cm<br>
			kadr <br>
			efekt <br>
			obraz id <br>
			</div>
		</div>	
</div>
</div>



<script type="text/javascript">
$(window).load(function(){
	var ias = $('#photo').imgAreaSelect({ 
		show: true,
		instance: true,
		handles: true,
		onSelectEnd: size2crop 
	});
	size2crop();
	
		function size2crop() {
			var x1 = $('input#x1').val();
			var y1 = $('input#y1').val();
			var x2 = $('input#x2').val();
			var y2 = $('input#y2').val();
		ias.setSelection(x1, y1, x2, y2, true);
		ias.setOptions({
		});
		ias.update();
	}
	
});	

</script>




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
</html><?php }} ?>