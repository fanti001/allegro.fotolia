<div id="search">
	<form method="POST" action="search.php">
	<input type="text" id="qs_result_value" name="words" size="30" onfocus="if (this.value == 'fioletowe kwiaty'){    this.value = ''; }"
	onblur="if ( this.value == ''){ this.value = 'fioletowe kwiaty'; }" value="fioletowe kwiaty">
	<button class="btn btn-info"  type="submit" >szukaj</button>    			
	<input type="hidden" name="action" value="getSearchResults">
	</form>
</div>