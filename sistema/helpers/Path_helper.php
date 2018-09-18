<?php

namespace kis\sistema\helpers;

abstract class Path_helper {

    private static $front_dir = "/kis";
    private static $back_dir = "/home/financeiroavicres/www/kis";

    public static function getFront_dir() {
        return self::$front_dir;
    }

    public static function getBack_dir() {
        return self::$back_dir;
    }

}
