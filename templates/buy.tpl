{include file="header.tpl"}

<div class="content">
<form id="coords"  class="form-horizontal" onsubmit="return true;" action="zamowienie.php" method="post">
   		<label><input type="hidden" id="Sx1" name="Sx1" value=""></label>
		<label><input type="hidden" id="Sy1" name="Sy1" value=""></label>
		<label><input type="hidden" id="Sx2" name="Sx2" value=""></label>
		<label><input type="hidden" id="Sy2" name="Sy2" value=""></label>
		<label><input type="hidden" id="Sw" name="Sw" value=""></label>
		<label><input type="hidden" id="Sh" name="Sh" value=""></label>
	
		
		<label><input type="hidden" id="id_obrazu" name="id_obrazu" value="{$obraz->id}"></label>
		<label><input type="hidden" id="x2" name="x2" value="{$obraz->m_W}"></label>
		<label><input type="hidden" id="y2" name="y2" value="{$obraz->m_H}"></label>
		<label><input type="hidden" id="org_w" name="org_w" value="{$obraz->W}"></label>
		<label><input type="hidden" id="org_h" name="org_h" value="{$obraz->H}"></label>
		<label><input type="hidden" id="oplata_lic" name="oplata_lic" value="{$license_price}"></label>
		<label><input type="hidden" id="katalog" name="katalog" value="{$kategoria->folder}"></label>
		<label><input type="hidden" id="plik" name="plik" value="{$obraz->plik}"></label>
		<input type="hidden" name="panorama" value="0">
    <div class="row-fluid">
    <div class="span12">
<button type="button" class="btn span10 offset1 btn-large btn-info" style="margin-top: 10px;">kategoria {$kategoria->nazwa} - obraz id {$obraz->id}</button>
    <div class="row-fluid">
    <div class="span6">
         <h4 class="text-info">Dopasuj wymiary fototapety</h4>
    <div class="input-prepend input-append" style="margin: 5px 10px;">
        <span class="add-on">Szerokość</span>
            <input class="span2 input-mini" id="w" name="w" type="text" value="100" style="width: 40px;">
        <span class="add-on">cm</span>
    </div>
    <div class="input-prepend input-append" style="margin: 5px 10px;">
        <span class="add-on">Wysokość</span>
            <input class="span2 input-mini" id="h" name="h" type="text" value="100" style="width: 40px;">
        <span class="add-on">cm</span>
    </div>

			<img src="galeria/{$miniatura}" id="photo" alt="tapeta"><br>
    </div>
    <div class="span6">
    
    <div class="row-fluid">
        <div class="span5 text-left">
            <h4 class="text-info">5 kroków do tapety</h4>
            <ul class="unstyled" style="margin-top: 70px;">        
                <li><blockquote><p class="text-info">1.wybierz zdjęcie</p>
                 <small>z kategorii</small></blockquote></li>
             <li><blockquote><p class="text-info">2.wpisz wymiary</p>
                 <small>szerokość i wysokość</small></blockquote></li>
             <li><blockquote><p class="text-info">3.wykadruj podgląd</p>
                 <small>przeciągnij myszką</small></blockquote></li>
             <li><blockquote><p class="text-info">4.uzupełnij formularz</p>
                 <small>o materiał, login, email</small></blockquote></li>                 
             <li><blockquote><p class="text-info">5.pobierz podgląd</p>
                 <small>na email</small></blockquote></li>             
          </ul>                                
    </div>
   <div class="span7 text-right">
   <h4 class="text-info">Wybierz rodzaj fototapety</h4>
            <label>
			<select name="material" id="m">
			</select>
            </label>
	
   <h4 class="text-info">Efekt</h4>	
					<select name="efekt" id="efekt" >
						<option selected="selected" value="galeria/{$miniatura}">Wydruk w pełnych kolorach</option>
						<option value="sepia/{$miniatura}">Wydruk w odcieniu brązu - sepia</option>
						<option value="grayscale/{$miniatura}">Wydruk w skali szarości</option>
					</select>
                    
    <div class="control-group" style="margin-top: 10px;">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <input type="text" required="" class="email"  id="email" name="email" placeholder="Email">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label">Login</label>
    <div class="controls">
    <input type="text" required="" id="login" class="required" name="login" placeholder="Login">
    </div>
    </div>
        <div class="miodek">
			<label for="miodek">Jeśli jesteś człowiekiem, pozostaw puste:</label>
			<input type="text" name="miodek" id="miodek">
    	</div>
		
    <div class="input-prepend input-append">
    <span class="add-on" style="height: 30px;">Cena tej fototapety:</span>
    <input class="span2" id="cena" style="width: 100px; text-align: right; height: 40px; color: red; font-size: 36px;" type="text">
    <span class="add-on" style="height: 30px;">PLN</span>
    </div>	
    <p style="margin-top: 30px;"><em>
    Po podaniu loginu, adresu e-mail i kliknięciu "pobierz podgląd" otrzymasz odnośnik do aukcji, na której będziesz mógł dokonać zakupu.
{*Również my otrzymamy te same informacje o tapecie i będziemy mogli bez problemu połączyć zakup na allegro z Twoimi ustawieniami tapety.*}
    </em>
    </p>                
	<button type="submit" id="zamawiam" class="btn btn-navbar btn-large btn-info" style="clear: left; margin: 10px;">Pobierz podgląd</button>  

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</form>
</div>

{include "buy_js.tpl"}

{include file="footer.tpl"}