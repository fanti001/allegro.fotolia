{include file="header.tpl"}


<div class="container">
	<div class="row">	
        <div class="col-lg-2 text-left">
       <ul> tabela - kategorie
       {foreach $kategorie as $kat}         
            <li><a href="dodaj.php?kat={$kat->id}">{$kat->nazwa} id={$kat->id}</a></li>   
        {/foreach}
        </ul>
        </div>
		
        <div class="col-lg-10 text-center">		
            <h5>Obrazy w kategorii: {$kategoria->nazwa} id={$kategoria->id}  obrazków <strong>{$licznik}</strong><h5>	

{foreach $obrazki as $obraz}

		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/{$obraz.katalog}/{$obraz.plik}" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">{$obraz.plik} id={$obraz.id}</div> 
			<div class="tooltip_a">
				<img src="../galeria/{$obraz.katalog}/{$obraz.plik}" alt="">
				<div class="caption">{$obraz.plik}</div>
			</div>
		</div>

{/foreach}			
</div>
</div>
</div>

{literal}

{/literal}



{include file="footer.tpl"}
