<?php

namespace kis\sistema\helpers;

class Auth {

    public function createTolken() {
        $v1 = md5(uniqid(rand(), true));
        $v2 = md5(uniqid(rand(), true));
        $v3 = md5($v1 . $v2);
        $array = array(
            "t1" => $v1,
            "t2" => $v2,
            "t3" => $v3);
        return $array;
    }    

}
