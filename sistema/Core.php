<?php

namespace kis\sistema;

use kis\sistema\requisicao\Request;
use kis\sistema\helpers\File_handler;
use kis\sistema\helpers\Database_helper;

//use kis\projeto\controllers\Usuario_controller;


abstract class Core {

    //private static $ROOT = "/home/financeiroavicres/www/kis/";
    private static $controllers = array();
    private static $serverConfig = null;
    private static $connections;

    public static function execute(Request $request) {
        if (self::$serverConfig == NULL) {
            self::startCoreDependences();
        }
        $controller = $request->getControllerName();
        $controllerInstance = self::getController($controller);
        return $controllerInstance->execute($request);
    }

    public static function coreStart() {
        self::startCoreDependences();
    }

    private static function getController($controllerName) {
        foreach (self::$controllers as $c) {
            if ($c instanceof $controllerName) {
                return $c;
            }
        }
        $c = new $controllerName();

        array_push(self::$controllers, $c);
        return $c;
    }

    private static function startCoreDependences() {
        self::startConnections();
        self::startSession();
        //self::console_log($_SESSION);
        self::setPath();
    }

    public static function console_log($data) {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }

    private static function startSession() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    private static function setPath() {
        $_SESSION['back_dir'] = "/home/financeiroavicres/www/kis";
        $_SESSION['front_dir'] = "/kis";
    }

    private static function startConnections() {
        self::$serverConfig = json_decode(self::getConfig());
        if (isset(self::$serverConfig->db) and self::$serverConfig->db != NULL) {
            self::$connections = Database_helper::startConnections();
        }
    }

//    public static function getPath() {
//        return array("back_dir"=>"/home/financeiroavicres/www/kis",
//                     "front_dir"=>"/kis");
//    }

    public static function getConfig() {
        return '{
    "db":
            {
                "mysql":
                        {
                            "default":
                                    {
                                        "schema": "default",
                                        "minimo_conexao": "2",
                                        "connection_params":
                                                {
                                                    "database": "financeiroavic02",
                                                    "host": "mysql06-farm62.kinghost.net",
                                                    "user": "financei02_add2",
                                                    "password": "avicres01"
                                                }
                                    }
                        }
            },
    "view_engine":
            {
                "dir":
                        {
                            "views": "./projeto/views/",
                            "js": "../../training/projeto/views/fab/assets/js/",
                            "css": "../../training/projeto/views/fab/assets/css/"
                        }
            }
}
';
        //return File_handler::getJSON(self::$ROOT . '/sistema/config.json');
    }

}

//public static function getConnection($connectionName) {
//        if (self::$serverConfig == null) {
//            self::startCoreDependences();
//        }
//        if (self::checkConnectionInConfig($connectionName)) {
//            return self::getInstanceOfConnection($connectionName);
//        }
//    }
//
//    private static function checkConnectionInConfig($connectionName) {
//        $data_bases = self::$serverConfig->db->mysql;
//        foreach ($data_bases as $db) {
//            if ($connectionName == $db->schema) {
//                return true;
//            } else {
//                return FALSE;
//            }
//        }
//    }
//
//    private static function getInstanceOfConnection($connectionName) {
//        foreach (self::$connections as $key => $con) {
//            if ($connectionName == $key) {
//                return $con;
//            }
//        }
//        throw new Connection_exception("Não foi possível encontrar a seguinte conexão: " . $connectionName);
//    }
