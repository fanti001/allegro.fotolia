<?php /*%%SmartyHeaderCode:14666024225392e4ebe3cef1-13151452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aafa06e09b344224ec2b9bfb59d62e1233af36e5' => 
    array (
      0 => './templates/baza.tpl',
      1 => 1393346269,
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
  'nocache_hash' => '14666024225392e4ebe3cef1-13151452',
  'variables' => 
  array (
    'kategorie' => 0,
    'kat' => 0,
    'kategoria' => 0,
    'licznik' => 0,
    'obrazki' => 0,
    'obraz' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5392e4ebea9307_57062982',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5392e4ebea9307_57062982')) {function content_5392e4ebea9307_57062982($_smarty_tpl) {?><!DOCTYPE html>
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
            <h5>Obrazy w kategorii: zwierzęta id=20  obrazków <strong>102</strong><h5>	


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440336725048.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440336725048.jpg id=1517</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440336725048.jpg" alt="">
				<div class="caption">_137440336725048.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440344126998.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440344126998.jpg id=1518</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440344126998.jpg" alt="">
				<div class="caption">_137440344126998.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440346318059.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440346318059.jpg id=1519</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440346318059.jpg" alt="">
				<div class="caption">_137440346318059.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440353626056.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440353626056.jpg id=1520</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440353626056.jpg" alt="">
				<div class="caption">_137440353626056.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440366826639.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440366826639.jpg id=1521</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440366826639.jpg" alt="">
				<div class="caption">_137440366826639.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440369632675.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440369632675.jpg id=1522</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440369632675.jpg" alt="">
				<div class="caption">_137440369632675.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744037026686.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744037026686.jpg id=1523</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744037026686.jpg" alt="">
				<div class="caption">_13744037026686.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440371617143.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440371617143.jpg id=1524</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440371617143.jpg" alt="">
				<div class="caption">_137440371617143.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440378726619.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440378726619.jpg id=1525</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440378726619.jpg" alt="">
				<div class="caption">_137440378726619.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440395820367.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440395820367.jpg id=1526</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440395820367.jpg" alt="">
				<div class="caption">_137440395820367.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440402411081.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440402411081.jpg id=1527</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440402411081.jpg" alt="">
				<div class="caption">_137440402411081.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440404128519.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440404128519.jpg id=1528</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440404128519.jpg" alt="">
				<div class="caption">_137440404128519.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440411424221.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440411424221.jpg id=1529</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440411424221.jpg" alt="">
				<div class="caption">_137440411424221.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744041891657.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744041891657.jpg id=1530</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744041891657.jpg" alt="">
				<div class="caption">_13744041891657.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440427530416.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440427530416.jpg id=1531</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440427530416.jpg" alt="">
				<div class="caption">_137440427530416.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440437432734.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440437432734.jpg id=1532</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440437432734.jpg" alt="">
				<div class="caption">_137440437432734.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744047082724.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744047082724.jpg id=1533</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744047082724.jpg" alt="">
				<div class="caption">_13744047082724.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440480529818.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440480529818.jpg id=1534</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440480529818.jpg" alt="">
				<div class="caption">_137440480529818.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440486514319.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440486514319.jpg id=1535</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440486514319.jpg" alt="">
				<div class="caption">_137440486514319.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440488015617.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440488015617.jpg id=1536</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440488015617.jpg" alt="">
				<div class="caption">_137440488015617.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440495626514.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440495626514.jpg id=1537</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440495626514.jpg" alt="">
				<div class="caption">_137440495626514.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744050519454.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744050519454.jpg id=1538</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744050519454.jpg" alt="">
				<div class="caption">_13744050519454.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440535732677.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440535732677.jpg id=1539</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440535732677.jpg" alt="">
				<div class="caption">_137440535732677.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440539928344.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440539928344.jpg id=1540</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440539928344.jpg" alt="">
				<div class="caption">_137440539928344.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440553920761.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440553920761.jpg id=1541</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440553920761.jpg" alt="">
				<div class="caption">_137440553920761.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440554425535.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440554425535.jpg id=1542</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440554425535.jpg" alt="">
				<div class="caption">_137440554425535.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440569129477.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440569129477.jpg id=1543</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440569129477.jpg" alt="">
				<div class="caption">_137440569129477.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440573531899.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440573531899.jpg id=1544</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440573531899.jpg" alt="">
				<div class="caption">_137440573531899.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744057435494.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744057435494.jpg id=1545</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744057435494.jpg" alt="">
				<div class="caption">_13744057435494.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744059701589.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744059701589.jpg id=1546</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744059701589.jpg" alt="">
				<div class="caption">_13744059701589.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440601826277.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440601826277.jpg id=1547</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440601826277.jpg" alt="">
				<div class="caption">_137440601826277.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744061271923.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744061271923.jpg id=1548</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744061271923.jpg" alt="">
				<div class="caption">_13744061271923.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_1374406141394.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_1374406141394.jpg id=1549</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_1374406141394.jpg" alt="">
				<div class="caption">_1374406141394.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440614325595.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440614325595.jpg id=1550</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440614325595.jpg" alt="">
				<div class="caption">_137440614325595.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744061648873.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744061648873.jpg id=1551</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744061648873.jpg" alt="">
				<div class="caption">_13744061648873.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440616917756.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440616917756.jpg id=1552</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440616917756.jpg" alt="">
				<div class="caption">_137440616917756.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744061885917.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744061885917.jpg id=1553</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744061885917.jpg" alt="">
				<div class="caption">_13744061885917.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_1374406193867.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_1374406193867.jpg id=1554</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_1374406193867.jpg" alt="">
				<div class="caption">_1374406193867.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744062043306.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744062043306.jpg id=1555</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744062043306.jpg" alt="">
				<div class="caption">_13744062043306.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744062297566.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744062297566.jpg id=1556</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744062297566.jpg" alt="">
				<div class="caption">_13744062297566.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744062864740.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744062864740.jpg id=1557</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744062864740.jpg" alt="">
				<div class="caption">_13744062864740.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440633822092.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440633822092.jpg id=1558</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440633822092.jpg" alt="">
				<div class="caption">_137440633822092.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744063548932.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744063548932.jpg id=1559</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744063548932.jpg" alt="">
				<div class="caption">_13744063548932.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440638311111.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440638311111.jpg id=1560</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440638311111.jpg" alt="">
				<div class="caption">_137440638311111.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440638922973.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440638922973.jpg id=1561</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440638922973.jpg" alt="">
				<div class="caption">_137440638922973.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744063968446.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744063968446.jpg id=1562</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744063968446.jpg" alt="">
				<div class="caption">_13744063968446.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440641828592.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440641828592.jpg id=1563</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440641828592.jpg" alt="">
				<div class="caption">_137440641828592.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744065481402.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744065481402.jpg id=1564</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744065481402.jpg" alt="">
				<div class="caption">_13744065481402.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440660815356.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440660815356.jpg id=1565</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440660815356.jpg" alt="">
				<div class="caption">_137440660815356.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440666213026.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440666213026.jpg id=1566</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440666213026.jpg" alt="">
				<div class="caption">_137440666213026.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440666313939.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440666313939.jpg id=1567</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440666313939.jpg" alt="">
				<div class="caption">_137440666313939.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440670116153.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440670116153.jpg id=1568</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440670116153.jpg" alt="">
				<div class="caption">_137440670116153.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440670913269.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440670913269.jpg id=1569</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440670913269.jpg" alt="">
				<div class="caption">_137440670913269.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440725824698.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440725824698.jpg id=1570</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440725824698.jpg" alt="">
				<div class="caption">_137440725824698.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440745929159.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440745929159.jpg id=1571</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440745929159.jpg" alt="">
				<div class="caption">_137440745929159.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440747417795.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440747417795.jpg id=1572</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440747417795.jpg" alt="">
				<div class="caption">_137440747417795.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440789820718.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440789820718.jpg id=1573</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440789820718.jpg" alt="">
				<div class="caption">_137440789820718.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744080335239.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744080335239.jpg id=1574</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744080335239.jpg" alt="">
				<div class="caption">_13744080335239.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744080867429.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744080867429.jpg id=1575</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744080867429.jpg" alt="">
				<div class="caption">_13744080867429.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744081264884.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744081264884.jpg id=1576</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744081264884.jpg" alt="">
				<div class="caption">_13744081264884.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440813426557.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440813426557.jpg id=1577</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440813426557.jpg" alt="">
				<div class="caption">_137440813426557.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_1374408247485.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_1374408247485.jpg id=1578</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_1374408247485.jpg" alt="">
				<div class="caption">_1374408247485.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744082882784.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744082882784.jpg id=1579</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744082882784.jpg" alt="">
				<div class="caption">_13744082882784.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440836030931.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440836030931.jpg id=1580</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440836030931.jpg" alt="">
				<div class="caption">_137440836030931.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744089231961.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744089231961.jpg id=1581</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744089231961.jpg" alt="">
				<div class="caption">_13744089231961.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440892928974.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440892928974.jpg id=1582</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440892928974.jpg" alt="">
				<div class="caption">_137440892928974.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440895921576.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440895921576.jpg id=1583</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440895921576.jpg" alt="">
				<div class="caption">_137440895921576.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_1374408963737.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_1374408963737.jpg id=1584</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_1374408963737.jpg" alt="">
				<div class="caption">_1374408963737.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440896830726.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440896830726.jpg id=1585</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440896830726.jpg" alt="">
				<div class="caption">_137440896830726.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744091092748.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744091092748.jpg id=1586</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744091092748.jpg" alt="">
				<div class="caption">_13744091092748.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440929330863.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440929330863.jpg id=1587</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440929330863.jpg" alt="">
				<div class="caption">_137440929330863.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744093123755.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744093123755.jpg id=1588</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744093123755.jpg" alt="">
				<div class="caption">_13744093123755.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440934632221.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440934632221.jpg id=1589</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440934632221.jpg" alt="">
				<div class="caption">_137440934632221.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440942327620.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440942327620.jpg id=1590</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440942327620.jpg" alt="">
				<div class="caption">_137440942327620.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440952429699.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440952429699.jpg id=1591</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440952429699.jpg" alt="">
				<div class="caption">_137440952429699.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744095435036.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744095435036.jpg id=1592</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744095435036.jpg" alt="">
				<div class="caption">_13744095435036.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440967420381.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440967420381.jpg id=1593</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440967420381.jpg" alt="">
				<div class="caption">_137440967420381.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440984040.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440984040.jpg id=1594</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440984040.jpg" alt="">
				<div class="caption">_137440984040.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440984814054.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440984814054.jpg id=1595</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440984814054.jpg" alt="">
				<div class="caption">_137440984814054.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744098519255.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744098519255.jpg id=1596</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744098519255.jpg" alt="">
				<div class="caption">_13744098519255.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440986323410.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440986323410.jpg id=1597</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440986323410.jpg" alt="">
				<div class="caption">_137440986323410.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440989519564.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440989519564.jpg id=1598</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440989519564.jpg" alt="">
				<div class="caption">_137440989519564.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137440990959.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137440990959.jpg id=1599</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137440990959.jpg" alt="">
				<div class="caption">_137440990959.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441002728468.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441002728468.jpg id=1600</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441002728468.jpg" alt="">
				<div class="caption">_137441002728468.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441010922417.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441010922417.jpg id=1601</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441010922417.jpg" alt="">
				<div class="caption">_137441010922417.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744101577886.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744101577886.jpg id=1602</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744101577886.jpg" alt="">
				<div class="caption">_13744101577886.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744101634591.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744101634591.jpg id=1603</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744101634591.jpg" alt="">
				<div class="caption">_13744101634591.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441024122398.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441024122398.jpg id=1604</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441024122398.jpg" alt="">
				<div class="caption">_137441024122398.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441070817402.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441070817402.jpg id=1605</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441070817402.jpg" alt="">
				<div class="caption">_137441070817402.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441077412927.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441077412927.jpg id=1606</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441077412927.jpg" alt="">
				<div class="caption">_137441077412927.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441082529303.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441082529303.jpg id=1607</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441082529303.jpg" alt="">
				<div class="caption">_137441082529303.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441086130332.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441086130332.jpg id=1608</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441086130332.jpg" alt="">
				<div class="caption">_137441086130332.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441086627397.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441086627397.jpg id=1609</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441086627397.jpg" alt="">
				<div class="caption">_137441086627397.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441231124398.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441231124398.jpg id=1610</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441231124398.jpg" alt="">
				<div class="caption">_137441231124398.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441244725752.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441244725752.jpg id=1611</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441244725752.jpg" alt="">
				<div class="caption">_137441244725752.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441253021946.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441253021946.jpg id=1612</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441253021946.jpg" alt="">
				<div class="caption">_137441253021946.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441253423659.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441253423659.jpg id=1613</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441253423659.jpg" alt="">
				<div class="caption">_137441253423659.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744127383013.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744127383013.jpg id=1614</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744127383013.jpg" alt="">
				<div class="caption">_13744127383013.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744127618001.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744127618001.jpg id=1615</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744127618001.jpg" alt="">
				<div class="caption">_13744127618001.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_13744130851413.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_13744130851413.jpg id=1616</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_13744130851413.jpg" alt="">
				<div class="caption">_13744130851413.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137441313316434.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137441313316434.jpg id=1617</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137441313316434.jpg" alt="">
				<div class="caption">_137441313316434.jpg</div>
			</div>
		</div>


		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/zwierzatka/_137468135830060.jpg" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">_137468135830060.jpg id=2667</div> 
			<div class="tooltip_a">
				<img src="../galeria/zwierzatka/_137468135830060.jpg" alt="">
				<div class="caption">_137468135830060.jpg</div>
			</div>
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