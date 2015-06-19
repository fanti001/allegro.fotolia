<?php
require('libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;

//$smarty->assign('path',$web_PATH);	  
$smarty->display('aranzacje.tpl');
?>