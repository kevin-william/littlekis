<?php

namespace kis\sistema\database\models\mysql;

use kis\sistema\database\interfaces\ICRUD;
use kis\exceptions\ConnectionException;

class MysqlCRUD implements ICRUD {

    private $connectionPool;

    function __construct(MysqlConnectionPool $connectionPool) {
        $this->connectionPool = $connectionPool;
    }

    public function delete($query) {
        $mysqlConnection = $this->connectionPool->getConnection();        
        $result = mysqli_query($mysqlConnection, $query);
        if (!$result) {
            throw new ConnectionException("Não foi possível completar a solicitação. Foi apresentado o seguinte erro: " . mysqli_error($mysqlConnection));
        } else {
            $this->connectionPool->closeConnection($mysqlConnection);
            return $result;
        }
    }

    public function get($query) {
        $mysqlConnection = $this->connectionPool->getConnection();
        mysqli_set_charset($mysqlConnection, 'utf8');
        $result = mysqli_query($mysqlConnection, $query);
        if (!$result) {
            throw new ConnectionException("Não foi possível completar a solicitação. Foi apresentado o seguinte erro: " . mysqli_error($mysqlConnection));
        } else {
            $array = array();
            while ($rs = mysqli_fetch_assoc($result)) {
                array_push($array, $rs);
            }
            $this->connectionPool->closeConnection($mysqlConnection);
            return $array;
        }
    }

    public function insert($query) {
        $mysqlConnection = $this->connectionPool->getConnection();
        mysqli_set_charset($mysqlConnection, 'utf8');
        $result = mysqli_query($mysqlConnection, $query);
        if (!$result) {
            throw new ConnectionException("Não foi possível completar a solicitação. Foi apresentado o seguinte erro: " . mysqli_error($mysqlConnection));
        } else {
            $this->connectionPool->closeConnection($mysqlConnection);
            return mysqli_insert_id($mysqlConnection);
        }
    }

    public function update($query) {
        $mysqlConnection = $this->connectionPool->getConnection();

        mysqli_set_charset($mysqlConnection, 'utf8');
        $result = mysqli_query($mysqlConnection, $query);
        if (!$result) {
            throw new ConnectionException("Não foi possível completar a solicitação. Foi apresentado o seguinte erro: " . mysqli_error($mysqlConnection));
        } else {
            $this->connectionPool->closeConnection($mysqlConnection);
            return $result;
        }
    }

}
