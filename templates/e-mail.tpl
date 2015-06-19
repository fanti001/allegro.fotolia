{include file="header.tpl"}

<div id="e-mail" style="padding-top: 20px; text-align: left;">
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
{*
{if $potwierdzenie['powierzchnia'] < 1}
	- powierzchnia: <p class="dane" >1 m<sup>2</sup></p> (minimalna powierzchnia kupowanej fototapety nie może być mniejsza od 1 m<sup>2</sup>)<br>
{else}
	- powierzchnia: <p class="dane" >{$potwierdzenie['powierzchnia']} m<sup>2</sup></p> <br>
{/if}
*}
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
<p class="dane" > Jeżeli potrzebujesz pomocy albo wyjaśnienia zadzwoń do nas518 452 666.</p><br>
<br>
{*{$potwierdzenie['login']} na twoją skrzynke pocztową {$potwierdzenie['email']} wysłaliśmy wiadomość z tymi samymi informacjami.*}

</div>
{include file="footer.tpl"}


