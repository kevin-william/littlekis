<?php


namespace kis\testes;
use kis\sistema\interfaces\ITeste;

class ExecutarTestes implements ITeste{
    
    private $testes = array();
    
    public function executarTestes() {
        foreach ($this->testes as $teste) {
            $teste->executarTestes();
        }
    }
    
    public function adicionarTeste(ITeste $teste) {
        array_push($this->testes, $teste);
        return $this;
    }

}
