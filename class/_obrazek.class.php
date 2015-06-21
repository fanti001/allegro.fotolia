<?php

class obrazek extends DB {
	public $id;
	public $nazwa;
	public $katalog;
	public $plik;
	public $obrazki;
	public $orginal_file_path;
	public $kategoria;
	public $W;
	public $H;
	public $m_W;
	public $m_H;
	public $IPTC_caption;
	public $IPTC_graphic_name;
	public $IPTC_keywords;
	public $IPTC_photo_source;
	public $exists = false;
	protected $TABLE = 'grafiki';


	private $PATH_orginaly = array(
		'G:\galeria\FOTOLIA\\',
		'G:\galeria\Shutterstock\\',
		'G:\galeria\MM\\',
		'G:\galeria\Panele\\'
	);
	
	public function __construct($id=false) {
		parent::__construct();
		if ($id) {
			$this->get($id);
		}
	}
	
	public function get_kategoria_all($id_kategorii) {
		return $this->get_all('kategoria='.intval($id_kategorii));
		$kategorie = array();
		$this->result = self::$DB->query('SELECT t1.* FROM '.$this->TABLE.' t1, '.$this->TABLE.'_kategorie t2 WHERE t1.fotolia_id=t2.fotolia_id AND t2.kategoria='.intval($id_kategorii)) or die('Blad: '.self::$DB->error);
		return $this->result->num_rows;
	}
	public function get_obrazki_all($id_kategorii) {
            $obrazki = array();
            $result = self::$DB->query('SELECT * FROM `grafiki` WHERE `kategoria`='.intval($id_kategorii)) or die('Blad: '.self::$DB->error);  
 
	while ($obrazki[] = $result->fetch_assoc());
		array_pop($obrazki);
	return $obrazki;
	}
        
	public function get($id) {
		$id = intval($id);
		$this->exists = false;
		$result = self::$DB->query('SELECT * FROM '.$this->TABLE.' WHERE id='.$id) or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_assoc()) {
			$this->exists = true;
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
		}
	}
	
	public function get_all($where='1') {
		$kategorie = array();
		$this->result = self::$DB->query('SELECT t1.* FROM '.$this->TABLE.' t1, '.$this->TABLE.'_kategorie t2 WHERE t1.fotolia_id=t2.fotolia_id AND '.$where) or die('Blad: '.self::$DB->error);
		return $this->result->num_rows;
	}
	
	public function get_all_next() {
		if ($row = $this->result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
			return true;
		}
		return false;
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

	public function info_obrazek($plik) {
		$miniatura = getimagesize ($plik, $info);
	//	if (!$miniatura)
	//		return false;
		$obrazek = new obrazek();
		$obrazek->katalog   = dirname($plik);
		$obrazek->plik      = basename($plik);
		$obrazek->kategoria = kategoria::folder2id(basename($obrazek->katalog));
		$obrazek->m_W       = $miniatura[0];
		$obrazek->m_H       = $miniatura[1];
		
		if(isset($info['APP13'])) {
			$iptc = iptcparse($info['APP13']);
			if (isset($info["APP13"])) {
				$obrazek->IPTC_caption      = trim(@$iptc["2#120"][0]);
				$obrazek->IPTC_graphic_name = trim(@$iptc["2#005"][0]);
				$obrazek->IPTC_keywords     = @$iptc["2#025"];
				$obrazek->IPTC_photo_source = trim(@$iptc["2#115"][0]);
			}
		}
		$obrazek->orginal_file_path = $this->find_orginal($obrazek->plik);
		
		$oryginal = getimagesize($obrazek->orginal_file_path.$obrazek->plik);
		$obrazek->W       = $oryginal[0];
		$obrazek->H       = $oryginal[1];
		return $obrazek;
	}
	
	public function ustaw_kategorie($id_kategorii) {
		if ($this->id)
			self::$DB->query('UPDATE '.$this->TABLE.' SET kategoria='.intval($id_kategorii).' WHERE id='.$this->id) or die('Blad: '.self::$DB->error);
	}

	public function add() {
		return self::$DB->query("INSERT INTO ".$this->TABLE." SET nazwa='".addslashes($this->nazwa)."', katalog='".addslashes($this->katalog)."', plik='".addslashes($this->plik)."', kategoria='".addslashes($this->kategoria)."',  W='".$this->W."',  H='".$this->H."',  m_W='".$this->m_W."',  m_H='".$this->m_H."', IPTC_caption='".addslashes($this->IPTC_caption)."', IPTC_graphic_name='".addslashes($this->IPTC_graphic_name)."', IPTC_photo_source='".addslashes($this->IPTC_photo_source)."'") or die('Blad: '.self::$DB->error);
	}

	public function is_present($plik) {
		return $this->get_all("plik='".$plik."'");
	}
	
	public function delete() {
		return self::$DB->query('DELETE FROM '.$this->TABLE.' WHERE id='.intval($this->id)) or die ('Blad: '.$this->DB->error);
	}
}

class fotolia_obrazek extends obrazek {
	private $api;
	public $fotolia_id;
	public $thumbnail_url;
	public $license_M;
	public $licenses_price;
	public $licenses_details;
	public $lastupdate;

	public function __construct($id=false) {
		$this->TABLE = 'fotolia_grafiki';
		parent::__construct($id);
	}
	
	public function get($id) {
		$id = intval($id);
		$result = self::$DB->query('SELECT * FROM '.$this->TABLE.' WHERE fotolia_id='.$id) or die('Blad: '.self::$DB->error);
		$this->exists = false;
		if ($row = $result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
			$this->exists = true;
		}
	}

	public function setAPI($api) {
		$this->api = $api;
	}

	private function update($val) {
		$this->license_M = $this->W = $this->H = 0;
		$this->licenses_price = $this->licenses_details = '';

		$this->IPTC_photo_source = $this->fotolia_id;
		$this->thumbnail_url = $val['thumbnail_url'];
		$this->m_W           = (int) $val['thumbnail_width'];
		$this->m_H           = (int) $val['thumbnail_height'];
		foreach($val['licenses'] as $license) {
			$this->licenses_price .= $license['name'].':'.$license['price'].'|';
			if ($license['name'] == 'M')
				$this->license_M = (int) $license['price'];
		}
		foreach($val['licenses_details'] as $license_name=>$license) {
			$this->licenses_details .= $license_name.':'.$license['width'].'x'.$license['height'].'|';
			if ($license['width']>$this->W) {
				$this->W = (int) $license['width'];
				$this->H = (int) $license['height'];
			}
		}
		$this->lastupdate = time();
		self::$DB->query('INSERT INTO '.$this->TABLE.' SET m_W='.$this->m_W.', m_H='.$this->m_H.', W='.$this->W.', H='.$this->H.', license_M='.$this->license_M.', thumbnail_url="'.addslashes($this->thumbnail_url).'", licenses_price="'.addslashes(substr($this->licenses_price, 0, -1)).'", licenses_details="'.addslashes(substr($this->licenses_details, 0, -1)).'", IPTC_photo_source="'.addslashes($this->IPTC_photo_source).'", lastupdate='.$this->lastupdate.', fotolia_id='.$this->fotolia_id.' ON DUPLICATE KEY UPDATE m_W='.$this->m_W.', m_H='.$this->m_H.', W='.$this->W.', H='.$this->H.', license_M='.$this->license_M.', thumbnail_url="'.addslashes($this->thumbnail_url).'", licenses_price="'.addslashes(substr($this->licenses_price, 0, -1)).'", licenses_details="'.addslashes(substr($this->licenses_details, 0, -1)).'", IPTC_photo_source="'.addslashes($this->IPTC_photo_source).'", lastupdate='.$this->lastupdate) or die('Blad: '.self::$DB->error);
	}

	public function update_from_fotolia($obrazki) {
		if (!is_array($obrazki) || !$this->api)
			return false;
		
		$api = new Fotolia_Api($this->api);
		try {
			$ret = $api->getBulkMediaData($obrazki, 400);
		} catch (Exception $exc) {}

		foreach ($ret as $this->fotolia_id=>$val) {
			$this->update($val);
		}
	}

	public function update_single_from_fotolia($obrazek) {
		if (empty($obrazek) || !$this->api)
			return false;
		$api = new Fotolia_Api($this->api);
		if ($ret = $api->getMediaData($obrazek, 400)) {
			$this->fotolia_id = $obrazek;
			$this->update($ret);
		}
	}

	public function add() {
		return self::$DB->query("INSERT INTO ".$this->TABLE." SET nazwa='".addslashes($this->nazwa)."', katalog='".addslashes($this->katalog)."', plik='".addslashes($this->plik)."', kategoria='".addslashes($this->kategoria)."',  W='".$this->W."',  H='".$this->H."',  m_W='".$this->m_W."',  m_H='".$this->m_H."', IPTC_caption='".addslashes($this->IPTC_caption)."', IPTC_graphic_name='".addslashes($this->IPTC_graphic_name)."', IPTC_photo_source='".addslashes($this->IPTC_photo_source)."'") or die('Blad: '.self::$DB->error);
	}

}

class kategoria extends DB {
	public $id;
	public $nazwa;
	public $folder;
	public $status;
	public $priorytet;
	protected $obrazek;
	protected $TABLE = 'kategorie';
	
	
	public function __construct($id=false) {
		parent::__construct();
		if ($id) 
			return $this->get($id);
		return false;
	}
	
	public function get($id) {
		$id = intval($id);
		$result = self::$DB->query('SELECT * FROM '.$this->TABLE.' WHERE id='.$id) or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
			return true;
		} else {
			$this->id = false;
			return false;
		}
	}
	
	public function get_all($where='status=1') {
		$kategorie = array();
		$result = self::$DB->query('SELECT * FROM '.$this->TABLE.' WHERE '.$where.' ORDER BY priorytet DESC, nazwa') or die('Blad: '.self::$DB->error);
		while ($kategorie[] = $result->fetch_object());
		array_pop($kategorie);
		return $kategorie;
	}
	
	public function get_obrazki_all() {
		if (empty($this->id))
			return false;
		$this->obrazek = new fotolia_obrazek();
		return $this->obrazek->get_all('kategoria='.$this->id);
	}
	
	public function get_obrazki_all_next() {
		if (!$this->obrazek->get_all_next()) 
			return false;
		return $this->obrazek;
	}
	
	public function folder2id($name) {
		$result = self::$DB->query('SELECT id FROM '.$this->TABLE.' WHERE folder="'.addslashes($name).'"') or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_row())
			return $row[0];
		return false;
	}
}

class fotolia_kategoria extends kategoria {
	public $fotolia_words;
	public $fotolia_filters;

	public function __construct($id=false) {
		$this->TABLE = 'fotolia_kategorie';
		parent::__construct($id);
	}

	public function get_all_ids() {
		$ret = array();
		if (empty($this->id))
			return false;
		$result = self::$DB->query('SELECT fotolia_id FROM fotolia_grafiki_kategorie WHERE kategoria='.intval($this->id)) or die('Blad: '.self::$DB->error);
		while ($row = $result->fetch_row()) {
			$ret[] = $row[0];
		}
		return $ret;
	}
    //******* dodawanie obrazków w kategorii *****
    public function add_kategoria_grafiki($fotolia_id, $kategoria){
        self::$DB->query("INSERT INTO fotolia_grafiki_kategorie SET kategoria=".intval($kategoria)." fotolia_id=".intval($fotolia_id))or die('Blad: '.self::$DB->error);
    }
    //********************************************
    public function get_obrazki_all() {
		if (empty($this->id))
			return false;
		$this->obrazek = new fotolia_obrazek();
		return $this->obrazek->get_all('t2.kategoria='.$this->id);
	}
	
	public function update_from_fotolia($id_obrazkow) {
		$this->obrazek->update_from_fotolia($id_obrazkow);
	}

	public function setAPI($api) {
		$this->obrazek->setAPI($api);
	}
}

class fotolia_proxy extends DB {
	private $api = 'FA0Rk7oT5QO4d9rotn4f6agJkefZJa5P';
	public $fotolia_id;
	public $thumbnail_url;
	public $license_M;
	public $licenses_price;
	public $licenses_details;
	public $lastupdate;

	public $id;
	public $nazwa;
	public $katalog;
	public $plik;
	public $obrazki;
	public $orginal_file_path;
	public $kategoria;
	public $W;
	public $H;
	public $m_W;
	public $m_H;
	public $IPTC_caption;
	public $IPTC_graphic_name;
	public $IPTC_keywords;
	public $IPTC_photo_source;
	public $exists = false;

	private $result;
	
	public function __construct($id=false) {
		require_once './class/fotolia-api.class.php';
		$this->TABLE = 'fotolia_grafiki';
		parent::__construct();
		if ($id) {
			$this->get($id);
		}
	}

        /**
         * 
         * @param array $obrazki
         * @param boolean $start
         * @return array
         */
	function getObrazki($obrazki, $start=true) {
		$return = $obrazkiWbazie = array();
		if (!is_array($obrazki))
			return false;
		foreach ($obrazki as $val) {
			if (preg_match('/^\d+$/', $val))
				$newObrazki[] = $val;
		}
		if (empty($newObrazki))
			return false;
		$this->get_all('fotolia_id IN ('.implode(',', $newObrazki).')');
		while ($this->get_all_next()) { // pobranie z bazy info o wszystkich obrazkach z fotolia_grafiki
			$return['F_'.$this->fotolia_id] = (array) $this; // zwracamy nawet jak stare
			if ($this->lastupdate>(time()-(30*24*3600))) { // jezeli nie starsze niz 30 dni to zbedna aktualizacja
				$obrazkiWbazie[] = $this->fotolia_id;
			}
		}
		$obrazki_do_aktualizacji = array_diff($obrazki, $obrazkiWbazie);
		if (!empty($obrazki_do_aktualizacji) && $start) {
			$this->update_from_fotolia($obrazki_do_aktualizacji);
			$return = array_merge($return, $this->getObrazki($obrazki_do_aktualizacji, false)); // jezeli odswiezone to tu nadpiszemy
		}
		return $return;
	}

	public function get($id) {
		$id = intval($id);
		$result = self::$DB->query('SELECT * FROM '.$this->TABLE.' WHERE fotolia_id='.$id) or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
			$this->exists = true;
			return true;
		}
		$this->exists = false;
		return false;	
	}

	public function get_all($where='1') {
		$kategorie = array();
		$this->result = self::$DB->query('SELECT * FROM '.$this->TABLE.' WHERE '.$where) or die('Blad: '.self::$DB->error);
		return $this->result->num_rows;
	}
	
	public function get_all_next() {
		if ($row = $this->result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
			return true;
		}
		return false;
	}
	
	public function delete() {
		return self::$DB->query('DELETE FROM '.$this->TABLE.' WHERE id='.intval($this->id)) or die ('Blad: '.$this->DB->error);
	}
	

	public function setAPI($api) {
		$this->api = $api;
	}

	private function update($val) {
		$this->license_M = $this->W = $this->H = 0;
		$this->licenses_price = $this->licenses_details = '';
		$this->nazwa         = $val['title'];
		$this->IPTC_photo_source = $this->fotolia_id;
		$this->thumbnail_url = $val['thumbnail_url'];
		$this->m_W           = (int) $val['thumbnail_width'];
		$this->m_H           = (int) $val['thumbnail_height'];
		foreach($val['licenses'] as $license) {
			$this->licenses_price .= $license['name'].':'.$license['price'].'|';
			if ($license['name'] == 'M')
				$this->license_M = (int) $license['price'];
		}
		foreach($val['licenses_details'] as $license_name=>$license) {
			$this->licenses_details .= $license_name.':'.$license['width'].'x'.$license['height'].'|';
			if ($license['width']>$this->W) {
				$this->W = (int) $license['width'];
				$this->H = (int) $license['height'];
			}
		}
		$this->lastupdate = time();
		self::$DB->query('INSERT INTO '.$this->TABLE.' SET nazwa="'.addslashes($this->nazwa).'", m_W='.$this->m_W.', m_H='.$this->m_H.', W='.$this->W.', H='.$this->H.', license_M='.$this->license_M.', thumbnail_url="'.addslashes($this->thumbnail_url).'", licenses_price="'.addslashes(substr($this->licenses_price, 0, -1)).'", licenses_details="'.addslashes(substr($this->licenses_details, 0, -1)).'", IPTC_photo_source="'.addslashes($this->IPTC_photo_source).'", lastupdate='.$this->lastupdate.', fotolia_id='.$this->fotolia_id.' ON DUPLICATE KEY UPDATE m_W='.$this->m_W.', m_H='.$this->m_H.', W='.$this->W.', H='.$this->H.', license_M='.$this->license_M.', thumbnail_url="'.addslashes($this->thumbnail_url).'", licenses_price="'.addslashes(substr($this->licenses_price, 0, -1)).'", licenses_details="'.addslashes(substr($this->licenses_details, 0, -1)).'", IPTC_photo_source="'.addslashes($this->IPTC_photo_source).'", lastupdate='.$this->lastupdate) or die('Blad: '.self::$DB->error);
	}

	public function update_from_fotolia($obrazki) {
		if (!is_array($obrazki) || !$this->api)
			return false;
		$api = new Fotolia_Api($this->api);
		try {
			$ret = $api->getBulkMediaData($obrazki, 400);
		} catch (Exception $exc) {}
		foreach ($ret as $this->fotolia_id=>$val) {
			$this->update($val);
		}
	}

	public function update_single_from_fotolia($obrazek) {
		if (empty($obrazek) || !$this->api)
			return false;
		$api = new Fotolia_Api($this->api);
		try {
			if ($ret = $api->getMediaData($obrazek, 400)) {
				$this->fotolia_id = $obrazek;
				$this->update($ret);
			}
		} catch (Exception $exc) {}
		
	}

	public function licenses() {
		static $size = array('XS'=>120000, 'S'=>480000, 'M'=>1900000, 'L'=> 3700000, 'XL'=>7800000, 'XXL'=>15000000);
		$area = $this->W*$this->H;
		$return = array();
		foreach (explode('|', $this->licenses_price) as $val) {
			if (preg_match('/^([A-Z]+):(\d+)$/', $val, $match) && $match[1] != 'X') {
				$return[$match[1]]['price'] = $match[2];
			}
		}
		if ($this->licenses_details) {
			foreach (explode('|', $this->licenses_details) as $val) {
				if (preg_match('/^([A-Z]+):(\d+)x(\d+)$/', $val, $match) && $match[1] != 'X') {
					$return[$match[1]]['w'] = $match[2];
					$return[$match[1]]['h'] = $match[3];
					$return[$match[1]]['area'] = $match[2]*$match[3];
				}
			}
		} else {
			foreach (array_reverse($size) as $key=>$val) {
				if (!empty($return[$key]) && $area>$val) {
					if (empty($juzmaxbyl)) {
						$juzmaxbyl = true;
						$return[$key]['w'] = $this->W;
						$return[$key]['h'] = $this->H;
						$return[$key]['area'] = $this->W*$this->H;
					} else {
						$factor = sqrt($val/$area);
						$return[$key]['w'] = round($factor*$this->W);
						$return[$key]['h'] = round($factor*$this->H);
						$return[$key]['area'] = $return[$key]['w']*$return[$key]['h'];
					}
				}
			}
		}
		return $return;
	}

}

class koszyk extends DB {
	public $id;
	public $cookie;
	public $dostawa;
	public $zamowienie;
	public $uczas;
	public $czas;
	public $status;
	public $ip;
	public $login;
	public $email;
	public $klient;
	public $faktura;
	public $wysylka;
	public $uwagi;
	public $regulamin_chk;
	public $zgoda_chk;
	public $wartosc;
	public $wartosc_dostawa;    
	public $typ_platnosci;
        public $id_platnosci;
	public $kwota_zaplacona;

    
    private $koszyk_pozycja;

	public function __construct($id=false) {
		parent::__construct();
		if ($id) {
			$this->get($id);
		}
	}

	private function _get($where) { // pobierz koszyk o danym id
		$result = self::$DB->query('SELECT * FROM koszyk WHERE '.$where) or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				if (in_array($key, array('wartosc', 'wartosc_dostawa') , true))
					$this->{$key} = $val/100;
				else
					$this->{$key} = $val;
			return true;
		}
		$this->id = false;
		return false;
	}
       
	public function get($id) { // pobierz koszyk o danym id
		return $this->_get('id='.intval($id));
	}

	public function get_cookie($cookie) { // pobierz koszyk o danym cookie
		return $this->_get('cookie='.intval($cookie));
	}

	public function get_items() { // pobierz wszystkie pozycje biezacego koszyka
		if (!$this->id)
			return false;
		$this->koszyk_pozycja = new koszyk_pozycja();
		$this->koszyk_pozycja->_kp_result = $this->koszyk_pozycja->get_koszyk($this->id);
		return $this->koszyk_pozycja->_kp_result;
	}

	function get_item_next() {
		return $this->koszyk_pozycja->get_item_next();
	}

	public function add() {
		if (empty($this->cookie))
			$this->cookie = time().rand(100000, 999999);
		if (empty($this->uczas))
			$this->uczas = time();
		$this->czas = date("Y-m-d H:i:s", $this->uczas);
		if (empty($this->ip))
			$this->ip = $_SERVER['REMOTE_ADDR'];
		if (self::$DB->query("INSERT INTO koszyk SET ".
			"cookie     = ".intval($this->cookie).", ".
			"dostawa    = ".intval($this->dostawa).", ".
			"zamowienie = ".intval($this->zamowienie).", ".
			"uczas      = ".intval($this->uczas).", ".
			"czas       = '".date('Y-m-d H:i:s', $this->uczas)."', ".
			"status     = ".intval($this->status).", ".	
			"ip         = '".addslashes($this->ip)."', ".
			"login      = '".addslashes($this->login)."', ".
			"email      = '".addslashes($this->email)."',".
			"uwagi      = '".addslashes($this->uwagi)."',".
			"regulamin_chk = ".intval($this->regulamin_chk).",".
			"zgoda_chk  = ".intval($this->zgoda_chk).",".
			"klient     = ".intval($this->klient).", ".
			"faktura    = ".intval($this->faktura).", ".
			"wysylka    = ".intval($this->wysylka))){
			$this->id = self::$DB->insert_id;
			return intval($this->cookie);
		} else {
			die('Blad: '.self::$DB->error);
		}
	}

	public function update() {		
		if (empty($this->id))
			return false;
		self::$DB->query("UPDATE koszyk SET ".
			"cookie        = ".intval($this->cookie).", ".
			"dostawa       = ".intval($this->dostawa).", ".
			"zamowienie    = ".intval($this->zamowienie).", ".
			"status        = ".intval($this->status).", ".
			"login         = '".addslashes($this->login)."', ".
			"email         = '".addslashes($this->email)."', ".
			"uwagi         = '".addslashes($this->uwagi)."',".
			"regulamin_chk = ".intval($this->regulamin_chk).",".
			"zgoda_chk     = ".intval($this->zgoda_chk).",".
			"klient        = ".intval($this->klient).", ".
			"faktura       = ".intval($this->faktura).", ".
			"wysylka       = ".intval($this->wysylka).", ".
			"wartosc       = ".intval($this->wartosc*100).", ".
			"wartosc_dostawa = ".intval($this->wartosc_dostawa*100).", ".
			"typ_platnosci = ".intval($this->typ_platnosci).", ".
			"id_platnosci  = '".addslashes($this->id_platnosci)."', ".
			"kwota_zaplacona = ".intval($this->kwota_zaplacona*100).
			" WHERE id=".intval($this->id)) or die('Blad: '.self::$DB->error);
		return true;
	}

	public function delItem($item_id) {
		if (!$this->id)
			return false;
		$pozycja = new koszyk_pozycja($item_id);

		if ($this->id != $pozycja->id_koszyka)
			return false;
		$pozycja->del();
	}

	public function updateItem($item_id) {
		if (!$this->id)
			return false;
		$pozycja = new koszyk_pozycja($item_id);
		if ($this->id != $pozycja->id_koszyka)
			return false;
		$pozycja->del();
	}

	public function nowa_pozycja($typ) {
		$pozycja = new koszyk_pozycja();
		$pozycja->id_koszyka = $this->id;
		$pozycja->typ        = $typ;
		return $pozycja;
	}
	
	public function zloz_zamowienie() {
		$this->zamowienie = date('ymd').$this->id;
	}
}

class klient extends DB {
	public $id;
	public $imie;
	public $nazwisko;
	public $firma;
	public $ulica;
	public $miejscowosc;
	public $kod;
	public $kraj;
    public $telefon;
    public $email;
    public $dodano;
    public $zgoda_regulamin;
    public $zgoda_marketing;

    public function __construct($id=false) {
		parent::__construct();
		if ($id) {
			$this->get($id);
		}
	}
    
    public function get($id){
        $result = self::$DB->query('SELECT * FROM klienci WHERE id='.intval($id)) or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
			return true;
		}
		$this->id = false;
		return false;
	}

	public function add() {
        $this->time = time();
		if (self::$DB->query("INSERT INTO `klienci` SET `imie` ='".addslashes($this->imie)."', nazwisko='".addslashes($this->nazwisko)."', ulica='".addslashes($this->ulica)."', miejscowosc='".addslashes($this->miejscowosc)."', kod='".addslashes($this->kod)."', firma='".addslashes($this->firma)."', telefon='".addslashes($this->telefon)."', email='".addslashes($this->email)."', dodano=".$this->time )){
			$this->id = self::$DB->insert_id; 
			return $this->id;
		}  else {
			die('Blad: '.self::$DB->error);
		}
	}

	public function update() {
		if (empty($this->id))
			return false;
		self::$DB->query("UPDATE klienci SET imie ='".addslashes($this->imie)."', nazwisko='".addslashes($this->nazwisko)."', ulica='".addslashes($this->ulica)."', miejscowosc='".addslashes($this->miejscowosc)."', kod='".addslashes($this->kod)."', firma='".addslashes($this->firma)."', telefon='".addslashes($this->telefon)."', email='".addslashes($this->email)."' WHERE id=".$this->id ) or die('Blad: '.self::$DB->error);   
		return $this->id;
    }
}       

class koszyk_pozycja extends DB {
	public $id;
	public $id_koszyka;
	public $typ;
	public $symbol;
	public $nazwa;
	public $jednostka;
	public $ilosc;
	public $cenaj;

	public function __construct($id=false) {
		parent::__construct();
		if ($id) {
			$this->get($id);
		}
	}

	private function _get($where) { 
		$res = self::$DB->query('SELECT * FROM koszyk_pozycje k WHERE '.$where) or die('Blad: '.self::$DB->error);
		if ($row = $res->fetch_assoc()) {
			if (in_array($row['typ'], array('grafika'))) {
				$res = self::$DB->query('SELECT * FROM koszyk_pozycje k, koszyk_pozycje_'.$row['typ'].' k2 WHERE k.id=k2.id AND '.$where) or die(__LINE__.' Blad: '.self::$DB->error);
				if (!($row = $res->fetch_assoc())) {
					$this->id = false;
					return false;
				}
			}
			foreach ($row as $key=>$val) {
				if (in_array($key, array('ilosc', 'cenaj') , true))
					$this->{$key} = $val/1000;
				elseif (in_array($key, array('powierzchnia', 'powierzchnia_rzeczywista') , true))
					$this->{$key} = $val/100;
				else
					$this->{$key} = $val;
			}
			return true;
		}
		$this->id = false;
		return false;
	}

	public function get($id) { // pobierz pozycje o danym id
		return $this->_get('k.id='.intval($id));
	}

	public function get_koszyk($id_koszyka) { // pobierz pozycje z koszyka
		$res = self::$DB->query('SELECT DISTINCT typ FROM koszyk_pozycje WHERE id_koszyka='.intval($id_koszyka)) or die('Blad: '.self::$DB->error);
		if (!$res->num_rows)
			return false;
		$query = '';
        $complex_query = array();
		while ($typ = $res->fetch_row()) {
			if (in_array($typ[0], array('grafika')))
				$complex_query[] = 'SELECT k.id, id_koszyka, typ, symbol, nazwa, jednostka, ilosc, cenaj, id_obrazu, custom, w, h, kadr, kolor, lustro, powierzchnia, powierzchnia_rzeczywista, material, laminat FROM koszyk_pozycje k, koszyk_pozycje_'.$typ[0].' k2 WHERE k.id=k2.id AND k.id_koszyka='.$id_koszyka;
			else
				$query = "SELECT id, id_koszyka, typ, symbol, nazwa, jednostka, ilosc, cenaj, '' as id_obrazu, '' as custom, '' as w, '' as h, '' as kadr, '' as kolor, '' as lustro, '' as powierzchnia, '' as powierzchnia_rzeczywista, '' as material, '' as laminat  FROM koszyk_pozycje WHERE typ NOT IN ('grafika') AND id_koszyka=".$id_koszyka;
		}

		foreach ($complex_query as $val) {
			$query .= (!empty($query)) ? ' UNION '.$val : $val;
		}
 		$this->result = self::$DB->query($query) or die('Blad: '.self::$DB->error);
        return $this->result;
	}

	public function get_item_next() { // pobierz kolejną pozycje biezacego koszyka
		if (!$this->_kp_result)
			return false;
		$this->id = false;
		if ($return = $this->_kp_result->fetch_assoc()) {
			foreach ($return as $key=>$val) {
				if (in_array($key, array('ilosc', 'cenaj') , true))
					$return[$key] = $this->{$key} = $val/1000;
				elseif (in_array($key, array('powierzchnia_rzeczywista', 'powierzchnia_rzeczywista') , true))
					$return[$key] = $this->{$key} = $val/100;
				else
					$this->{$key} = $val;
			}
		}
		return $return;
	}

	private function _get_item_next_sub() {
		
	}

	public function add($typ=false) {
		if (!empty($typ))
			$this->typ = $typ;
		if (in_array($this->typ, array('grafika', 'akcesoria'))) {
			if (self::$DB->query('INSERT INTO koszyk_pozycje SET id_koszyka='.intval($this->id_koszyka).", typ='".addslashes($this->typ)."', symbol='".addslashes($this->symbol)."', nazwa='".addslashes($this->nazwa)."', jednostka='".addslashes($this->jednostka)."', ilosc=".intval($this->ilosc*1000).", cenaj=".intval($this->cenaj*1000))){
				$this->id = self::$DB->insert_id;
				if (in_array($this->typ, array('grafika'))) {
					self::$DB->query("INSERT INTO koszyk_pozycje_".$this->typ." SET id=".$this->id.", id_obrazu='".addslashes($this->id_obrazu)."', custom='".addslashes($this->custom)."', w=".intval($this->w).",  h=".intval($this->h).", kadr='".addslashes($this->kadr)."', kolor='".addslashes($this->kolor)."', powierzchnia=".intval($this->powierzchnia*100).", powierzchnia_rzeczywista=".intval($this->powierzchnia_rzeczywista*100).",  material='".addslashes($this->material)."', laminat='".addslashes($this->laminat)."'") or die('Blad: '.self::$DB->error);
				}
				return $this->id;
			}
			die('Blad: '.self::$DB->error);
		}
		die('Blad: '.__LINE__);
	}

	public function update() {
		if (in_array($this->typ, array('grafika', 'akcesoria'))) {
			if (self::$DB->query("UPDATE koszyk_pozycje SET typ='".addslashes($this->typ)."', ".
				"symbol = '".addslashes($this->symbol)."', ".
				"nazwa = '".addslashes($this->nazwa)."', ".
				"jednostka = '".addslashes($this->jednostka)."', ".
				"ilosc = ".intval($this->ilosc*1000).", ".
				"cenaj = ".intval($this->cenaj*1000).
				' WHERE id_koszyka='.intval($this->id_koszyka).' AND id='.$this->id)) {
				if ($this->typ=='grafika') {
					self::$DB->query("UPDATE koszyk_pozycje_grafika SET id_obrazu='".addslashes($this->id_obrazu)."', custom='".addslashes($this->custom)."', w=".intval($this->w).",  h=".intval($this->h).", kadr='".addslashes($this->kadr)."', kolor='".addslashes($this->kolor)."', powierzchnia=".intval($this->powierzchnia*100).", powierzchnia_rzeczywista=".intval($this->powierzchnia_rzeczywista*100).",  material='".addslashes($this->material)."', laminat='".addslashes($this->laminat)."' WHERE id=".$this->id) or die('Blad: '.self::$DB->error);
				}
				return true;
			} else 
				die('Blad: '.self::$DB->error);
		}
	}

	public function del() {
		self::$DB->query('DELETE FROM koszyk_pozycje WHERE id='.$this->id.' AND id_koszyka='.$this->id_koszyka) or die('Blad: '.self::$DB->error);
	}
}

class koszyk_wysylki extends DB {
	public $id;
	public $nazwa;
	public $ulica;
	public $miejscowosc;
	public $kod;
    public $dodano;
    
    public function __construct($id=false) {
		parent::__construct();
		if ($id) {
			$this->get($id);
		}
	}
    
    public function get($id){
        $result = self::$DB->query('SELECT * FROM koszyk_wysylki WHERE id='.$id) or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
			return true;
		}
		$this->id = false;
		return false;
	}

        public function add() {
        $this->time = time();
		if (self::$DB->query("INSERT INTO koszyk_wysylki SET nazwa ='".addslashes($this->nazwa)."', ulica='".addslashes($this->ulica)."', miejscowosc='".addslashes($this->miejscowosc)."', kod='".addslashes($this->kod)."', dodano=".addslashes($this->time) )){
			$this->id = self::$DB->insert_id;
			return $this->id;
		}  else {
			die('Blad: '.self::$DB->error);
		}
	}

    public function update() {
		if (empty($this->id))
			return false;
		self::$DB->query("UPDATE `koszyk_wysylki` SET nazwa='".addslashes($this->nazwa)."', ulica='".addslashes($this->ulica)."', miejscowosc='".addslashes($this->miejscowosc)."', kod='".addslashes($this->kod)."' WHERE id=".$this->id ) or die('Blad: '.self::$DB->error);
		return $this->id;
    }
}

class koszyk_faktury extends DB {
	public $id;
	public $nazwa;
	public $ulica;
	public $miejscowosc;
	public $kod;
	public $kraj;
    public $nip;
    public $dodano;

    public function __construct($id=false) {
		parent::__construct();
		if ($id) {
			$this->get($id);
		}
	}
    
    public function get($id){
        $result = self::$DB->query('SELECT * FROM koszyk_faktury WHERE id='.$id) or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
			return true;
		}
		$this->id = false;
		return false;
	}

	public function add() {
		$this->time = time();
		if (self::$DB->query("INSERT INTO `koszyk_faktury` SET `nazwa` ='".addslashes($this->nazwa)."', ulica='".addslashes($this->ulica)."', miejscowosc='".addslashes($this->miejscowosc)."', kod='".addslashes($this->kod)."', nip='".addslashes($this->nip)."', dodano=".addslashes($this->time) )){
			$this->id = self::$DB->insert_id;
			return $this->id;
		}  else {
			die('Blad: '.self::$DB->error);
		}
	}    

    public function update() {
		if (empty($this->id))
			return false;
		self::$DB->query("UPDATE koszyk_faktury SET nazwa ='".addslashes($this->nazwa)."', ulica='".addslashes($this->ulica)."', miejscowosc='".addslashes($this->miejscowosc)."', kod='".addslashes($this->kod)."', nip='".addslashes($this->nip)."' WHERE id=".$this->id ) or die('Blad: '.self::$DB->error); 
		return $this->id;
    }	
}