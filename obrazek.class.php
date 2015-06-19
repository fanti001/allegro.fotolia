<?php

class DB extends DB_Conf {
	protected static $DB;

	public function __construct() {
		if (!isset(self::$DB)) {
			self::$DB = new mysqli( parent::$db_host , parent::$db_user , parent::$db_pass , parent::$db_base ) or die('Blad polaczenia danych');
			self::$DB->set_charset('utf8') or die('Blad '.__LINE__.' '.self::$DB->error);
			//$this->DB->query('SET NAMES UTF8') or die('Blad '.__LINE__.' '.$this->DB->error);
		}
	}
}

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
		'E:\galeria\FOTOLIA\rename\\',
		'E:\galeria\SHUTTERSTOCK\rename\\',
		'galeria/MM/rename/',
		'galeria/Panele/rename/',
        'galeria/rabenda\rename/'
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
		$this->result = self::$DB->query('SELECT * FROM grafiki WHERE '.$where) or die('Blad: '.self::$DB->error);
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
		$dir = scandir($path);
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
		$miniatura = getimagesize($plik, $info);
	//	if (!$miniatura)
	//		return false;
		$obrazek = new obrazek();
		$obrazek->katalog   = dirname($plik);
		$obrazek->plik      = basename($plik);
		$obrazek->kategoria = ($obrazek->katalog);
	//	$obrazek->kategoria = kategoria::folder2id(basename($obrazek->katalog));
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
		$this->obrazek = new obrazek();
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



class zamowienie extends DB {

	public $id;
	public $time;
	private $datetime;
	public $status;
	public $ip;
	public $login;
	public $email;
	public $id_obrazu;
	public $material;
	public $w;
	public $h;
	public $kadr;
	public $efekt;
	public $powierzchnia;
	public $powierzchnia_rzeczywista;
	public $cena_tapeta;
	public $cena_klej;
	public $custom;

	public function __construct($id=false) {
		parent::__construct();
		if ($id) {
			$this->get($id);
		}
	}
	
	public function get($id) {
		$id = intval($id);
		$result = self::$DB->query('SELECT * FROM zamowienia WHERE id='.$id) or die('Blad: '.self::$DB->error);
		if ($row = $result->fetch_assoc()) {
			foreach ($row as $key=>$val)
				$this->{$key} = $val;
		}
	}

	public function add() {
		if (empty($this->time))
			$this->time = time();
		if (empty($this->ip))
			$this->ip = $_SERVER['REMOTE_ADDR'];

		if (self::$DB->query("INSERT INTO zamowienia SET time=".intval($this->time).", datetime='".date('Y-m-d H:i:s', $this->time)."', status=".intval($this->status).", ip='".addslashes($this->ip)."', login='".addslashes($this->login)."', email='".addslashes($this->email)."', id_obrazu=".intval($this->id_obrazu).", custom='".addslashes($this->custom)."', material='".addslashes($this->material)."', w=".intval($this->w).",  h=".intval($this->h).", kadr='".addslashes($this->kadr)."', efekt='".addslashes($this->efekt)."', powierzchnia=".intval($this->powierzchnia*100).", powierzchnia_rzeczywista=".intval($this->powierzchnia_rzeczywista*100).", cena_tapeta=".intval($this->cena_tapeta*100).", cena_klej=".intval($this->cena_klej*100))){
			$this->id = self::$DB->insert_id;
			return $this->id;
		} else {
			die('Blad: '.self::$DB->error);
		}
	}
	
	public function zlicz() {
                $num_rows = '0';
		$result = self::$DB->query('SELECT * FROM zamowienia');
		//$num_rows = mysql_num_rows($result);
                $num_rows = $result->num_rows;
		return $result;

		
	}
		
        public function get_lista($login) {
            $login = addslashes($login);
                $list = array();
         	$result = self::$DB->query('SELECT * FROM zamowienia WHERE login="'.$login.'"') or die('Blad: '.self::$DB->error);            
                while ($list[] = $result->fetch_object());
                array_pop($list);
                return $list;
        }
}




