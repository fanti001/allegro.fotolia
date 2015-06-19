<?php
class obraz {
	public $image;
	public $size = array();
	public $width;
	public $height;
	
	public function resize_obrazek($katalog,$plik,$thumbs){
		$image = imagecreatefromjpeg($katalog.'\\'.$plik);
		$size = getimagesize ($katalog.'\\'.$plik);		
		if ($size[1]<$size[0]){
				$new_width = 400;
				$new_height = intval($size[1] * $new_width /$size[0]);
			} else{
				$new_height = 400;
				$new_width = intval($size[0] * $new_height /$size[1]);
			}
		$image_new = imagecreatetruecolor($new_width, $new_height);
		$this->m_W = $new_width;
		$this->m_H = $new_height;
		imagecopyresized($image_new, $image, 0, 0, 0, 0, $new_width, $new_height,$size[0], $size[1]);
		imagejpeg($image_new, $thumbs.$plik, 90);
		imagedestroy($image_new);
		imagedestroy($image);
		return; 
	}
	
	public function zmiana_nazwy_pliku($katalog, $plik, $destination, $symbol){

$image = imagecreatefromjpeg($katalog.'\\'.$plik);   
	$tablica = explode(".",$plik);
    $nazwa = $tablica[1];                      // mam nazwe pliku bez rozszerzenia
	$rozszerzenie = $tablica[1];             // mam rozszerzenie
    $plik ='_'.time(null).rand().'.'.$rozszerzenie;
    //    echo '<pre>';
    //    print_r($plik);
    //    echo  '</pre>';
imagejpeg($image, $destination.$plik, 90);
    return;	
	} 
    
	public function scan($path) {
		$dir = scandir(	$path);
		$obrazki = array();
		foreach ($dir as $item) {
			if ($item == '.' || $item == '..')
				continue;
			if (is_dir($path.$item))
				$obrazki = array_merge($obrazki, $this->scan($path.$item.'\\'));
			else
				$obrazki[] = $this->info_obrazek($path.$item);
		}
		return $obrazki;
	}

	private function find_orginal($miniatura) {
		foreach ($this->PATH_orginaly as $dir) {
			if (is_file($dir.$miniatura))
				return $dir;
		}
		return false;
	}

	private function info_obrazek($plik) {
		$big_obraz = getimagesize ($plik, $info);
	//	if (!$miniatura)
	//		return false;
		$obraz = new obraz();
		$obraz->katalog   = dirname($plik);
		$obraz->plik      = basename($plik);
		$obraz->kategoria = basename($obraz->katalog);
		$obraz->W       = $big_obraz[0];
		$obraz->H       = $big_obraz[1];
		
		if(isset($info['APP13'])) {
			$iptc = iptcparse($info['APP13']);
			if (isset($info["APP13"])) {
				$obraz->IPTC_caption      = trim(@$iptc["2#120"][0]);
				$obraz->IPTC_graphic_name = trim(@$iptc["2#005"][0]);
				$obraz->IPTC_keywords     = @$iptc["2#025"];
				$obraz->IPTC_photo_source = trim(@$iptc["2#115"][0]);
			}
		}
		$obraz->m_W       = 100;
		$obraz->m_H       = 100;
		return $obraz;
	}
}