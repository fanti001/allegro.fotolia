<script type="text/javascript">
{$CONF_tapeta}
{literal}
$(window).load(function(){

	for (var klucz in tapeta)
		$('select#m').append($('<option>').text(tapeta[klucz].nazwa).val(klucz));

	var max_szerokosc = parseInt($('input#org_w').val() / 12); 							
	var max_wysokosc  = parseInt($('input#org_h').val() / 12);

	if (max_szerokosc<100 || max_wysokosc<100)	{
		$('input#w').val(max_szerokosc);
		$('input#h').val(max_wysokosc);
	}

	var ias = $('#photo').imgAreaSelect({ 
		show: true,
		instance: true,
		handles: true,
		onSelectEnd: cena
	});

	size2crop();
	cena();

	$('input').keypress(function(event) {
		if (event.keyCode == 13) {
			$(event.target).blur();
			return false;
		}
		return true;
	});

	$("select#m").change(function() {
		var id_kleju = tapeta[$('select#m option:selected').val()].klej_id;
		$('img#klej_img').attr('src', 'images/klej'+id_kleju+'.png');	
		if (id_kleju == 0) {
			$('input#klej').attr('disabled', 'disabled');
		} else
			$('input#klej').attr('disabled', false);
		cena();
	});
	
	$('input#klej').click(cena);

	$("select#efekt").change(function() {
		$("img#photo").attr('src', $('select#efekt option:selected').val());
	});
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	$('input#w').change(function() {
		if ($('input#w').val() > max_szerokosc) {
			alert('Drogi kiencie ze względu na wymiary zdjęcia maksymalna dopuszczalna szerokość fototapety to: '+max_szerokosc+' cm');
			$('input#w').val(max_szerokosc);
			$('input#w').focus();
		}
		size2crop();
		cena();
	});
	
	$('input#h').change(function() {
		if ($('input#h').val() > max_wysokosc) {
			alert('Drogi kiencie ze względu na wymiary zdjęcia maksymalna dopuszczalna wysokość fototapety to: '+max_wysokosc+' cm');
			$('input#h').val(max_wysokosc);
			$('input#h').focus();
		}
		size2crop();
		cena();
	});
	
	function size2crop() {
		var wRatio = $('input#w').val()/max_szerokosc;
		var hRatio = $('input#h').val()/max_wysokosc;
		if (wRatio > hRatio) {
			var x2 = $('input#x2').val();
			var y2 = $('input#h').val()*$('input#x2').val()/$('input#w').val();
			
		} else {
			var x2 = $('input#w').val()*$('input#y2').val()/$('input#h').val()
			var y2 = $('input#y2').val();
		}
		ias.setSelection(0, 0, x2, y2, true);
		ias.setOptions({
			aspectRatio: x2+":"+ y2, 
			minHeight: (12*$('input#h').val()*$('input#y2').val()/$('input#org_h').val()),
			minWidth:  (12*$('input#w').val()*$('input#x2').val()/$('input#org_w').val())
		});
		ias.update();
	}


/////////////////	
	$('#zamawiam').click(function() {
		var selekcja = ias.getSelection();
		$('#Sx1').val(selekcja.x1);
		$('#Sy1').val(selekcja.y1);
		$('#Sx2').val(selekcja.x2);
		$('#Sy2').val(selekcja.y2);
		$('#Sw').val(selekcja.width);
		$('#Sh').val(selekcja.height);
		return true;
	});
/////////////////

	function pole() {
		return $('input#h').val() * $('input#w').val()/10000;
	}

	function cena() {
		
	//	update_license();
		var polev = pole();
		var licencja = $('#oplata_lic').val();
		if (polev < 1)
			polev = 1;
		$('input#cena').val((parseInt( polev * tapeta[$('select#m option:selected').val()].cena)) + parseInt(licencja));	
	}

	function select_license(licenses, crop_w, crop_h, thumbnail_w, thumbnail_h) {
		var w_zoom = thumbnail_w/crop_w;
		var h_zoom = thumbnail_h/crop_h;
		var zoom = w_zoom < h_zoom ? w_zoom : h_zoom;
		for (var license in licenses) {
			if (zoom*12*$('input#w').val() < licenses[license].w && zoom*12*$('input#h').val() < licenses[license].h) {
				break;
			}
		}
		return licenses[license];
	}

	function update_license() {
		if (mode=='custom')
			return true;
		var selekcja = ias.getSelection();
		var license = select_license(licenses, selekcja.width, selekcja.height, $('input#x2').val(), $('input#y2').val());
		$('#oplata_lic').val(license.price*license_value);
		$('#license_type').text(license.name);
	}
});	
{/literal}
</script>