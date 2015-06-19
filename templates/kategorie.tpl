{include file="header.tpl"}

<div class="content">
    
*- Witamy w fotoGalerii. Poniżej znajdują się kategorie, w których mieści się bogata oferta zdjęć. Proszę nacisnąć na ikonkę z wybranym motywem, by móc przenieść się w świat fotografii o wymarzonej tematyce, aby zmienić wygląd swojego pokoju.
</div>

<div class="content" style=" margin-top: 10px;">
{section name="i" loop=$kategorie}
<div class="post">
		<div class="thumbnail-item">
			<a href="{$kategorieTree}.php?kat={$kategorie[i]->id}"><img src="images/galeria/{$kategorie[i]->folder}/1.jpg" class="img-rounded">
			{$kategorie[i]->nazwa}</a>
		</div>
</div>


{/section}

</div>



{include file="footer.tpl"}
