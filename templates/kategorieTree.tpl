
{include file="header.tpl"}

<div class="content">
<h3>fotoGaleria - kategoria    {$kategoria->nazwa}</h3>
<p>Świat fotografii wskazanego motywu został otwarty. Wybierz zdjęcie, naciśnij i zmień wymiary według własnego uznania, następnie dokonaj wyboru materiału na którym ma być wydrukowana Twoja wymarzona fototapeta.</p>
</div> 
<div class="content" style=" margin-top: 10px;">
{foreach $obrazki as $obrazek}
<div class="post">
		<div class="thumbnail-item">
			<a href="buy.php?id={$id_prefix}{$obrazek['id']}"><img src="{$obrazek['url']}" class="thumbnail" width="110px" alt=""></a>
			<div class="tooltip_a">
				<img src="{$obrazek['url']}" alt="">
			</div>

		
		</div>
</div>
{/foreach}

</div>

{include file="footer.tpl"}
