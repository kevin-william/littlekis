<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

$path = "/var/www/littlekis/";

require_once $path.'sistema/interfaces/ITeste.php';
require_once $path.'Testes/mysql/RequiresMysqlCon.php';
require_once $path.'Testes/mysql/MysqlConnectionPoolTest.php';
require_once $path.'Testes/ExecutarTestes.php';



use kis\testes\ExecutarTestes;
use kis\testes\MysqlConnectionPoolTest;



$cp = new MysqlConnectionPoolTest();

$teste = new ExecutarTestes();
$teste->adicionarTeste($cp)
        ->executarTestes();




