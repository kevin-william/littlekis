<?php

$path = "/var/www/littlekis/";

require_once $path.'sistema/database/Interfaces/IConnection.php';
require_once $path.'sistema/database/Models/mysql/MysqlConnectionPool.php';
require_once $path.'sistema/database/Models/mysql/MysqlConnectionFactory.php';
require_once $path.'sistema/database/Models/mysql/MysqlConnectionParams.php';
require_once $path.'sistema/exceptions/ConnectionException.php';

