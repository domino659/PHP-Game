<?php

class Archer extends Human {
    private $pv = 100;
    private $attack = 30;
    private $defence = 5;

    public function __construct($data)
    {
        parent::__construct($data);
    }
}
