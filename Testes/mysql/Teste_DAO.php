<?php

namespace kis\projeto\DAO;

use kis\sistema\interfaces\DAO;

class Teste_DAO extends DAO {
    
    public function exibindoSchema() {
        return $this->getSchema();
    }
}

