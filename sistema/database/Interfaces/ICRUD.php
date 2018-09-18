<?php

namespace kis\sistema\database\interfaces;

interface ICRUD {

    public function insert($query);

    public function update($query);

    public function get($query);

    public function delete($query);
}
