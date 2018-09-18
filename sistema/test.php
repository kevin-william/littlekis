<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
$ROOT = "/var/www/kis/";

//di
//
//$path = dirname(__FILE__).'/config.json';
//echo $path;
//$arquivo = file_get_contents($path);
//echo $arquivo;

echo file_get_contents($ROOT."sistema/config.json");

