<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace kis\sistema\database\models\mysql;

class MysqlConnectionParams {

    private $host;
    private $usuario;
    private $senha;
    private $database;
    private $porta;
    private $socket;

    public function getHost() {
        return $this->host;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getDatabase() {
        return $this->database;
    }

    public function getPorta() {
        return $this->porta;
    }

    public function getSocket() {
        return $this->socket;
    }

    public function setHost($host) {
        $this->host = $host;
        return $this;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
        return $this;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

    public function setDatabase($database) {
        $this->database = $database;
        return $this;
    }

    public function setPorta($porta) {
        $this->porta = $porta;
        return $this;
    }

    public function setSocket($socket) {
        $this->socket = $socket;
        return $this;
    }

    public function toString() {
        return " (Usuario: " . $this->usuario
                . ") (DataBase: " . $this->database
                . " ) (Host: " . $this->host . ")";
    }

}
