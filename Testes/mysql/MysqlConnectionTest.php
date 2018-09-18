<?php

namespace kis\projeto\Testes;

use kis\sistema\database\models\mysql\MysqlConnectionParams;
use kis\sistema\database\models\mysql\MysqlConnection;

class MysqlConnectionTest {

    private $connectionParams;
    private $mysqlConnection;

    private function ConnectionParamsBuilder() {
        $this->connectionParams = new MysqlConnectionParams();
        return $this->connectionParams
                        ->setUsuario("rot")
                        ->setSenha("root")
                        ->setDatabase("littlekis")
                        ->setHost("127.0.0.1");
    }

    private function setMysqlConnection() {
        $this->mysqlConnection = new MysqlConnection($this->ConnectionParamsBuilder());
    }

    public function getMysqlConnection() {
        $this->setMysqlConnection();
        return $this->mysqlConnection;
    }

}
