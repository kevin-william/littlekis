<?php

namespace kis\sistema\helpers;

use kis\sistema\helpers\exceptions\File_handler_exception;

abstract class File_handler {

    public static function getJSON($path) {
        if (file_exists($path)) {
            return file_get_contents($path);
        } else {            
            throw new File_handler_exception("Não foi possível abrir o arquivo solicitado");
        }
    }

}
