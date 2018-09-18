<?php

namespace kis\testes;

use kis\sistema\database\models\mysql\MysqlConnectionFactory;
use kis\sistema\database\models\mysql\MysqlConnectionParams;
use kis\sistema\database\models\mysql\MysqlConnectionPool;
use kis\sistema\interfaces\ITeste;

class MysqlConnectionPoolTest implements ITeste{

    private function TestarPool() {

        $cp = new MysqlConnectionParams();
        $cp->setDatabase("littlekis")
                ->setHost("127.0.0.1")
                ->setSenha("root")
                ->setUsuario("root");
        var_dump($cp);
        $cf = new MysqlConnectionFactory($cp);
        var_dump($cf);
        $cpool = new MysqlConnectionPool(4, $cf);
        $conexoes = array();
        echo "Nº de conexões criadas: " . count($cpool->pool) . "<br>";

        for ($i = 0; $i < 6; $i++) {
            echo "Número de conexões livres: " . $cpool->freeConnections . "<br>";
            array_push($conexoes, $cpool->getConnection());
        }

        foreach ($conexoes as $con) {
            $cpool->closeConnection($con);
        }

        echo "Nº de conexões criadas: " . count($cpool->pool) . "<br>";
    }

    public function executarTestes() {
        echo 'Testando Pool de Conexões: <br>';
        $this->TestarPool();
    }

}
