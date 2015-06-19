<!DOCTYPE html>
<html>
<head>
<title>Kamedia.pl</title>
<meta name="description" content="Fototapeta na wymiar drukowana z twoich zdjęć lub zdjęć z banku zdjęć">
<meta name="keywords" content="fototapeta, fototapeta kuchenna,fototapety laminowane, druk na życzenie, obrazy na płótnie twojego zdjęcia" >
<meta name="author" content="Tapeciarnia" >
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="X-UA-Compatible" content="IE=8">
		<link type="text/css"  href="http://allegro.kamedia.pl/css/base.css" rel="stylesheet" media="screen">
		<link type="text/css"  href="http://allegro.kamedia.pl/css/menu.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="http://allegro.kamedia.pl/css/form.css" type="text/css" media="screen">
</head>

<body>
	
<div id="wraper">
<div style="width: 800px;">	
<!--<div id="header">-->
<div id="logo_header" style="float: left;">
<a href="http://allegro.kamedia.pl/index.php" ><img src="http://allegro.kamedia.pl/images/logo.png" width="180px" alt="logo"></a>
</div>
</div>

<div id="e-mail" style="clear: left; width: 800px; padding-top: 20px; text-align: left;">
<h1>Witaj {$potwierdzenie['login']} !</h1><br>
<img src={$potwierdzenie['kadr']} align='right'>
Dziękujemy za zainteresowanie naszą ofertą.
<br><br>
Właśnie skonfigurowałeś swoją fototapetę 
{if $potwierdzenie['id_obrazu']}
<p class="dane" >nr {$potwierdzenie['id_obrazu']} </p>
{/if}
o następujących parametrach:<br>
- szerokość:<p class="dane" >{$potwierdzenie['w']} cm</p><br>
- wysokość: <p class="dane" >{$potwierdzenie['h']} cm</p><br>

- wybrany materiał: <p class="dane" >{$potwierdzenie['material']}</p><br>
- efekt kolorystyczny: <p class="dane" >{$potwierdzenie['efekt']}</p><br>

Cena za fototapetę: <p class="dane" >{$potwierdzenie['cena_tapeta']} zł</p><br>

<br>
Aby dokonać zakupu, przejdź proszę na poniższą aukcję Allegro:<br>
<a href="{$potwierdzenie['aukcja']}" target="new">{$potwierdzenie['material']}</a><br>
i zakup na niej <p class="dane" >{$potwierdzenie['szt']} szt.</p>
 <br><br>

{if ($potwierdzenie['klej'])}
	{if ($potwierdzenie['klej_selected'])}
		Pamiętałeś o kleju do tapety.<br/>
	{else}
		Chcesz kupić klej bez dodatkowych kosztów transportu?<br/>
	{/if}

Właściwy klej (<b>{$potwierdzenie['klej_nazwa']}</b>) nabędziesz na aukcji:<br>
<a href="{$potwierdzenie['klej_aukcja']}" target="new">{$potwierdzenie['klej_aukcja']}</a><br>

{/if}<br>
<p> Do ceny należy doliczyć koszty transportu.<br> 
Przy zapłacie przez Allegro (PayU) lub przelewem na nasze konto, opłata za dostawę (kurier DPD) wynosi 20 zł, 
a przesyłka kurierska za pobraniem kosztuje 30 zł.<br>
Przy zakupach na naszych aukcjach płacisz tylko raz za przesyłkę.</p>
<br>
<p class="dane" > Jeżeli potrzebujesz pomocy albo wyjaśnienia zadzwoń do nas 518 452 666.</p><br>
<br>
</div>


<div id="stopka" style="clear: left; width: 800px; font-size: small;">
Copyright © 2012 kamedia.pl Treść powyższej strony jest chroniona na mocy praw autorskich. Kopiowanie całości lub części zabronione.
</div>
</div>
</body>
</html>


