<?php

namespace kis\sistema\database\models\mysql;

use kis\sistema\database\models\mysql\MysqlConnectionFactory;
use mysqli;

class MysqlConnectionPool {

    private $pool = array();
    private $mysqlConnectionFactory;
    private $minConnections;
    public $freeConnections;

    public function __construct($minConnections, MysqlConnectionFactory $cf) {
        $this->minConnections = $minConnections;
        $this->mysqlConnectionFactory = $cf;
        $this->CriarMinimoDeConexoes();
    }

    private function CriarMinimoDeConexoes() {
        while ($this->minConnections > count($this->pool)) {
            $mysqlConnection = $this->getConnection();
            array_push($this->pool, $mysqlConnection);
        }
        $this->freeConnections = $this->minConnections;
    }

    public function getConnection() {
        if ($this->freeConnections == 0) {
            $mysqlConnection = $this->mysqlConnectionFactory->getConnection();
            return $mysqlConnection;
        } else {
            $this->freeConnections--;
            return array_pop($this->pool);
        }
    }

    public function closeConnection(mysqli $mysqlCon) {
        $this->freeConnections++;
        array_push($this->pool, $mysqlCon);
    }

}
