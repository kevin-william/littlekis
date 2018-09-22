<?php

namespace kis\sistema\interfaces;

use kis\sistema\helpers\Database_helper;
use kis\sistema\database\interfaces\ICRUD;

abstract class DAO {

    
    protected $ICRUD;

    public function __construct(ICRUD $iCRUD) {
        $this->ICRUD = $iCRUD;
    }
    
    private function setICRUD(){
        $this->ICRUD = Database_helper::getICRUD($this->getSchema());
    }

    protected function getSchema() {
        return $this->schema;
    }
    
    public function setSchema(string $schema){
       $this->schema = $schema;
       $this->setICRUD();
    }
    private function verificarSchemaNaSessao() {
        if(isset($_SESSION['schema'])){
            return true;
        }
        return false;
    }
    
    public function definirSchemaDaSessao() {
        if($this->verificarSchemaNaSessao() and ($this->schema != $_SESSION['schema'])){
            $this->setSchema($_SESSION['schema']);
        }
    }

}
