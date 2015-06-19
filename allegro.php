<?php
require('libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;

$smarty->cache_lifetime = 120;
	
$fartuchy = array(
	1 => 'Black fire',
	2 => 'Charyzmatyczny New York',
	3 => 'Cienka linia',
	4 => 'Delikatny maj',
	5 => 'Fantazyjna czerwień',
	6 => 'Fioletowy czar',
	7 => 'Gwiazda Polarna',
	8 => 'Głębia oceanu',
	9 => 'Intensywna zieleń',
	10 => 'Kasztanowy ład',
	11 => 'Kwiecista panorama',
	12 => 'Lawendowy szał',
	13 => 'Limonkowe witaminy',
	14 => 'Magnetyczny Londyn',
	15 => 'Niebiański spokój',
	16 => 'Nierozerwalny duet',
	17 => 'Nostalgicznie',
	18 => 'Ogniste papryczki',
	19 => 'Orientalne przyprawy',
	20 => 'Orzeźwiające siostry cytryn',
	21 => 'owocowe plastry',
	22 => 'Owocowy miszmasz',
	23 => 'Pastelowy raj',
	24 => 'Piorunująca czerwień',
	25 => 'Soczyste limonki',
	26 => 'Wakacyjne wspomnienia',
	27 => 'Zakręcone owoce',
	28 => 'świat trawy'
);
$smarty->assign('wzory',$fartuchy);
$smarty->display('allegro/fauna.tpl');