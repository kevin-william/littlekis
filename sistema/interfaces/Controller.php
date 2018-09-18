<?php

namespace kis\sistema\interfaces;

use kis\sistema\requisicao\Request;

abstract class Controller {

    public function execute(Request $request) {
        $metodo = $request->getFunction_name();
        if ($request->getParametros() == NULL) {
            return $this->$metodo();
        } else {
            return $this->$metodo($request->getParametros());
        }
    }

}
