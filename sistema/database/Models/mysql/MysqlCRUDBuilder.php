<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace kis\sistema\database\models\mysql;

use kis\sistema\database\models\mysql\MysqlConnectionParams;
use kis\sistema\database\models\mysql\MysqlConnectionFactory;
use kis\sistema\database\models\mysql\MysqlCRUD;

class MysqlCRUDBuilder {

    public function icrudGetInstance(int $minimoDeConexoes, MysqlConnectionParams $cp) {
        $cf = $this->getConnectionFactoryInstance($cp);
        $cpool = $this->getConnectionPoolInstance($minimoDeConexoes, $cf);
        return new MysqlCRUD($cpool);
    }

    private function getConnectionFactoryInstance(MysqlConnectionParams $cp) {
        return new MysqlConnectionFactory($cp);
    }

    private function getConnectionPoolInstance(int $minimoDeConexoes, MysqlConnectionFactory $cf) {
        return new MysqlConnectionPool($minimoDeConexoes, $cf)
        ;
    }

}
