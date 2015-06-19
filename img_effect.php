<?php
//error_reporting(2047);
function pseudosepia(&$im){
 imagefilter($im,IMG_FILTER_GRAYSCALE);
 imagefilter($im,IMG_FILTER_BRIGHTNESS,-20);
 imagefilter($im,IMG_FILTER_COLORIZE, 75, 55, 40);
}

function grayscale(&$im){
	imagefilter($im, IMG_FILTER_GRAYSCALE);
}

function effect($im, $effect='grayscale') {
	if ($effect== 'sepia')
		pseudosepia($im);
	elseif ($effect== 'grayscale')
		grayscale($im);
}
if (!empty($_GET['file']) && preg_match('#^(([a-z0-9]+)/(_[a-z0-9]+.jpg))$#i', $_GET['file'], $match)) {
		$suffix ='jpg';
			$file ='http://allegro.kamedia.pl/galeria/'.$_GET['file'];	
	$border = intval(@$_GET['border']);
	if ($border<0)
		$border = 0;
	elseif ($border>10)
		$border = 10;

	if ($suffix == 'png') {
		$sImg = imagecreatefrompng($file);
	} elseif ($suffix == 'gif') {
		$sImg = imagecreatefromgif($file);
	} else { // jpg
		$sImg = imagecreatefromjpeg($file);
		}
	if ($sImg) {
		if (!empty($_GET['crop']) && preg_match('/^(\d{1,4}),(\d{1,4}),(\d{1,4}),(\d{1,4})$/', $_GET['crop'] , $match) && $match[3]>$match[1] && $match[4]>$match[2]) {
			$im = imagecreatetruecolor($match[3]-$match[1]+$border*2, $match[4]-$match[2]+$border*2);
			imagecopy($im, $sImg, $border, $border, $match[1], $match[2], $match[3]-$match[1], $match[4]-$match[2]);
		} else
			$im = &$sImg;
		if (!empty($_GET['effect'])) {
			effect($im, @$_GET['effect']);
		}
		header("Content-type: image/jpg");
		imagepng($im);
	}
}	