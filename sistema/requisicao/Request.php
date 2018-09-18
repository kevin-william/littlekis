<?php

#"mfw\projeto\controllers\\" . $this->model_name . "_controller";

namespace kis\sistema\requisicao;

class Request {

    private $model_name;
    private $function_name;
    private $parametros;
    private $dataCriacao;

    public function __construct($model_name, $function_name, $parametros) {
        $this->model_name = $model_name;
        $this->function_name = $function_name;
        $this->parametros = $parametros;
    }

    public function getModel_name() {
        return $this->model_name;
    }

    public function getFunction_name() {
        return $this->function_name;
    }

    public function getParametros() {
        return $this->parametros;
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function setModel_name($model_name) {
        $this->model_name = $model_name;
    }

    public function setFunction_name($functionName) {
        $this->function_name = $functionName;
    }

    public function setParametros($parametros) {
        $this->parametros = $parametros;
    }

    public function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }

    public function getControllerName() {
        
        return "kis\projeto\controllers\\" . $this->model_name . "_controller";
    }

}
