{include file="header.tpl"}


<div class="container">
	<div class="row">	
		<div class="col-lg-12 text-center">		
			<h5>Dostępne foldery:<h5>	
{foreach $foldery as $folder}
{$folder} - -
{/foreach}
	<form class="form form-control" action="foldery.php" method="get" style="height: 60px; border: 0px solid black; box-shadow: 0 0 0;">
		<input type="text" name="folder" class="input">
		<button type="submit" class="btn btn-primary btn-info ">przeglądaj zdjęcia</button>
	</form>
</div></div>			
	<div class="container">
	<div class="row">	
			<div class="col-lg-11">
	<h3>../galeria/{$katalog}</h3>
			</div>

{foreach $obrazy as $obraz}

		<div class="thumbnail-item thumbnail"  style="width: 23%; float: left;">
			<a href="#"><img src="../galeria/{$katalog}/{$obraz->plik}" class="thumbnail" width="110px" alt=""></a>
		<div class="caption">{$obraz->plik}</div> 
			<div class="tooltip_a">
				<img src="../galeria/{$katalog}/{$obraz->plik}" alt="">
				<div class="caption">{$obraz->plik}</div>
			</div>
		</div>

{/foreach}			
</div>
</div>
</div>

{literal}

{/literal}



{include file="footer.tpl"}
