{include file="header.tpl"}
panoramy

<div class="container">
	<div class="row">	
        <div class="col-lg-2 text-left">
       <ul> Lista - {$zamowienie->login}
       {foreach $lista as $l}         
         {*   <li><a href="baza.php?kat={$kat->id}">{$kat->nazwa} id={$kat->id}</a></li>   *}
         <li><a href="zamowienia.php?id={$l->id}">{$l->id_obrazu} - {$zamowienie->time|date_format:"%Y-%m-%d"}<br></a></li>
        {/foreach}
        </ul>
        </div>
		
        <div class="col-lg-10 text-center">		
			<h4>ilość zamówień {$id_ostatnie_zam}</h4>
<a href="zamowienia.php?id={$zamowienie->id-1}"><< prev</a> <a href="zamowienia.php?id={$zamowienie->id+1}"> next>></a>                           
                        
    	<form class="form form-control" action="zamowienia.php" method="get" style="height: 60px; border: 0px solid black; box-shadow: 0 0 0;">
		<input type="text" name="id" class="input">
		<button type="submit" class="btn btn-primary btn-info ">zobacz zamówienie</button>
		<input type="hidden" id="x1" name="kadr" value="{$kadr[0]}">
		<input type="hidden" id="y1" name="kadr" value="{$kadr[1]}">
		<input type="hidden" id="x2" name="kadr" value="{$kadr[2]}">
		<input type="hidden" id="y2" name="kadr" value="{$kadr[3]}"> 
		</form>
					<div class="thumbnail"  style="width: 100%; float: left;">
			<a href="#"><img src="../galeria/panoramy/{$obraz->plik}" class="" alt="" id="photo"></a>
		<div class="caption">{$obraz->plik} id={$obraz->id} szer_min{$obraz->m_W} wys_min{$obraz->m_H}</div> 
			</div>
			<div>
			<div class="col-lg-7">

				
			  id obrazu = {$obraz->id} plik = {$obraz->plik}<br>
			  szer_orginału ={$obraz->W} wys_orginału ={$obraz->H}<br>
			  katalog ../galeria/{$obraz->katalog}<br>
			  kategoria = {$obraz->kategoria}			
			</div>
			</div>
			<div class="col-lg-5">
			<h3>zamówienie = {$zamowienie->id}</h3>

                       <h4 class="text-danger">login {$zamowienie->login}</h4>
			ip      {$zamowienie->ip}<br>
			email  {$zamowienie->email}<br>
			materiał {$zamowienie->material}<br>
			szerokość {$zamowienie->w} cm<br>
			wysokość {$zamowienie->h} cm<br>
			kadr {$zamowienie->kadr}<br>
			efekt {$zamowienie->efekt}<br>
			obraz id {$zamowienie->id_obrazu}<br>
			</div>
		</div>	
</div>
</div>


{literal}
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
{/literal}



{include file="footer.tpl"}