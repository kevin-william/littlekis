<?php

namespace kis\sistema\database\models\mysql;

use kis\sistema\database\interfaces\IConnection;
use kis\exceptions\ConnectionException;
use mysqli;

class MysqlConnectionFactory implements IConnection {

    private $connectionParams;

    public function __construct(MysqlConnectionParams $connectionParams) {
        $this->connectionParams = $connectionParams;
    }

    public function getConnection() {
        $connection = new mysqli(
                $this->connectionParams->getHost(), $this->connectionParams->getUsuario(), $this->connectionParams->getSenha(), $this->connectionParams->getDatabase());
        if (mysqli_connect_errno() > 0) {
            throw new ConnectionException("Não foi possível se conectar com os seguintes parêmetros: " . $this->connectionParams->toString());
        }

        return $connection;
    }

    public function closeConnection(mysqli $conexao) {
        mysqli_close($conexao);
    }

}
