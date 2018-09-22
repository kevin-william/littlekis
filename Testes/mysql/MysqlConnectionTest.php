<?php

namespace kis\projeto\Testes;

use kis\sistema\database\models\mysql\MysqlConnectionParams;
use kis\sistema\database\models\mysql\MysqlConnectionFactory;
use kis\sistema\interfaces\ITeste;

class MysqlConnectionTest implements ITeste {

    private function connectionParamsBuilder() {
        $connectionParams = new MysqlConnectionParams();
        return $connectionParams
                        ->setUsuario("root")
                        ->setSenha("root")
                        ->setDatabase("littlekis")
                        ->setHost("127.0.0.1");
    }

    private function mysqlConnectionFactoryGetInstance() {
        return new MysqlConnectionFactory();
    }

    private function getMysqlConnection() {
        $mcf = $this->mysqlConnectionFactoryGetInstance();
        return $mcf->getConnection($this->ConnectionParamsBuilder());
    }

    public function executarTestes() {
        $this->getMysqlConnection();
    }

}
