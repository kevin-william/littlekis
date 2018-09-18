<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once '../sistema/database/Interfaces/IConnection.php';
require_once '../sistema/database/Models/mysql/MysqlConnectionFactory.php';
require_once '../sistema/database/Models/mysql/ConnectionParams.php';
require_once '../sistema/exceptions/ConnectionException.php';

use kis\sistema\database\models\mysql\MysqlConnectionFactory;
use kis\sistema\database\models\mysql\MysqlConnectionParams;

$cp = new MysqlConnectionParams();
$cp->setDatabase("littlekis")
        ->setHost("127.0.0.1")
        ->setSenha("root")
        ->setUsuario("root");

$cf = new MysqlConnectionFactory($cp);

try {
    $connection = $cf->getConnection();
} catch (Exception $e) {
    echo $e->getMessage();
}

if(isset($connection)){
    var_dump($connection);
}



