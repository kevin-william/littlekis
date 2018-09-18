<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

require_once './MysqlConnectionTest.php';
require_once '../sistema/helpers/exceptions/Connection_exception.php';
require_once '../sistema/database/Models/mysql/ConnectionParams.php';
require_once '../sistema/database/Interfaces/IConnection.php';
require_once '../sistema/database/Models/mysql/MysqlConnection.php';

use kis\projeto\Testes\MysqlConnectionTest;
use kis\sistema\helpers\exceptions\ConnectionException;

$mysqlConnectionTest = new MysqlConnectionTest();

try {
    echo 'this? ';
    var_dump($mysqlConnectionTest->getMysqlConnection());
} catch (Exception $exc) {
    echo "This"+$exc->getMessage();
}




