<?php

namespace kis\sistema\helpers;

use kis\sistema\database\models\mysql\MysqlCRUD;
use kis\sistema\helpers\exceptions\ConnectionException;
use kis\sistema\Core;

class Database_helper {

    private static $ICRUD = array();

    public static function getICRUD($schemaName) {
        return self::getICRUDInArray($schemaName);
    }

    private static function getICRUDInArray($schemaName) {
        echo 'passei aqui 1 <br>';
        if (self::isThisSchemaInArray($schemaName)) {
            echo 'passei aqui 2 <br>';
            return self::$ICRUD[$schemaName];
        } elseif (self::isThisSchemaInConfig($schemaName)) {
            echo 'passei aqui 3 <br>';
            $dbConfig = self::getDatabaseConfig($schemaName);
            echo 'passei aqui 4 <br>';
            $crud = new MysqlCRUD($dbConfig->minimo_conexao, $dbConfig->connection_params);
            echo 'passei aqui 1 <br>';
            self::$ICRUD[$schemaName] = $crud;
            return $crud;
        } else {
            throw new ConnectionException("Não existe configuração para o seguinte Schema: " . $schemaName);
        }
    }

    private static function isThisSchemaInArray($schemaName) {
        foreach (self::$ICRUD as $key => $icrud) {
            if ($schemaName == $key) {
                return TRUE;
            }
        }
        return false;
    }

    private static function isThisSchemaInConfig($schemaName) {
        $config = json_decode(Core::getConfig());
        $mysqlDB = $config->db->mysql;
        foreach ($mysqlDB as $db) {
            if ($db->schema == $schemaName) {
                return TRUE;
            }
        }
        return FALSE;
    }

    private static function getDatabaseConfig($schemaName) {
        $serverConfig = json_decode(Core::getConfig());
        $mysqlDB = $serverConfig->db->mysql;
        foreach ($mysqlDB as $dbConfig) {
            if ($dbConfig->schema == $schemaName) {
                return $dbConfig;
            }
        }
        return FALSE;
    }
    public static function startConnections(){
        $config = json_decode(Core::getConfig());
        $mysqlDB = $config->db->mysql;
        foreach ($mysqlDB as $db) {
            $crud = new MysqlCRUD($db->minimo_conexao, $db->connection_params);
            self::$ICRUD[$db->schema] = $crud;
        }        
    }

}
