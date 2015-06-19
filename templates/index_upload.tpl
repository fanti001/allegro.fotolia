{include file="header.tpl"}

<div class="content" style="margin-bottom: 10px;">

	<form enctype="multipart/form-data" method="POST" action="upload.php">
	Plik: <input name="file" type="file" />
	<br />Dozwolone pliki: GIF, JPG, PNG.
	Maksymalny rozmiar: 15MB.<br/>
	<input type="submit" name="upload" value="Wyślij zdjęcie" />
	</form>
</div>
<div class="content">
    <img src="images/ztw.jpg">
</div>
{if (!empty($img_name))}
	<img src="{$img_name}" />
{/if}
{include file="footer.tpl"}

