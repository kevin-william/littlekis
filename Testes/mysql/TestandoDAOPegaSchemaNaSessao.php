<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once '../sistema/interfaces/DAO.php';

require_once '../sistema/helpers/Database_helper.php';
require_once '../sistema/Core.php';

require_once '../sistema/database/Interfaces/ICRUD.php';
require_once '../sistema/database/Interfaces/IConnection.php';
require_once '../sistema/database/Models/mysql/ConnectionPool.php';
require_once '../sistema/database/Models/mysql/MysqlCRUD.php';
require_once '../sistema/database/Models/mysql/MysqlConnection.php';

//require_once '../sistema/helpers/File_handler.php';
//require_once '../sistema/helpers/exceptions/File_handler_exception.php';
require_once '../sistema/helpers/exceptions/Connection_exception.php';

require_once '../Testes/Teste_DAO.php';

use kis\projeto\DAO\Teste_DAO;

session_start();
session_destroy();
session_reset();
//$_SESSION['schema']= "cep";

$dao = new Teste_DAO();
echo ($dao->exibindoSchema());


