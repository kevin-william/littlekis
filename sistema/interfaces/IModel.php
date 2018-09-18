<?php

namespace kis\sistema\interfaces;

interface IModel {

    public function getModelAsJSON();

    public static function getInstanceByParamiters($parametros);
}
