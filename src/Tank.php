<?php

class Tank extends Human {
    private $pv = 200;
    private $attack = 10;
    private $defence = 20;

    public function __construct($data)
    {
        parent::__construct($data);
    }
}
