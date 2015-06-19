<?php
require('libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
$PATH = '../galeria/';
$dir = scandir($PATH);
array_splice($dir,0,3);

$smarty->assign('foldery',$dir);
$smarty->display('index.tpl');