<?php

require_once './fotolia-api.php';
require('./libs/Smarty.class.php');
require './config.php';
require './obrazek.class.php';

$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

$api = new Fotolia_Api('FA0Rk7oT5QO4d9rotn4f6agJkefZJa5P');

$kategoria = new fotolia_kategoria(); // inicjalizacja z tabeli fotolia_kategorie
$kategorie = $kategoria->get_all(); // pobranie wszystkich kategorii (wg priorytetu)

$smarty->assign('kategorieTree', 'fkategorieTree');
$smarty->assign('kategorie', $kategorie);
$smarty->display('kategorie.tpl');
/*
// searching for files
$results = $api->getSearchResults(
    array(
        'words' => 'elefant',
        'language_id' => Fotolia_Api::LANGUAGE_ID_PL_PL,
        'limit' => 10,
    ));
$results_kat1 = $api->getCategories1(11);	
$results_kat2 = $api->getCategories2(11);	
	
//print_r($results);
//$id = $results[0].id;
//$results = $api->getMediaData($id, $thumbnail_size = 110, $language_id = Fotolia_Api::LANGUAGE_ID_EN_US);
//print_r($results);
//printf("Found %d results", $results['nb_results']);

//foreach ($results as $key => $value) {
    // iterating only over numeric keys and silently skip other keys
  //  if (is_numeric($key)) {
  //      printf("matching media ID: %d", $value['id']);
	//	$id = $value['id'];
//		$results = $api -> getMediaData($id, $thumbnail_size = 110, $language_id = 11);
    //}
//}

$smarty->assign('kategorie1', $results_kat1);
$smarty->assign('kategorie2', $results_kat2);
$smarty->assign('wyniki', $results);
$smarty->display('api.tpl');
*/