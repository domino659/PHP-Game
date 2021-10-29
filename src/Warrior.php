<?php

class Warrior extends Human {
    private $pv = 150;
    private $attack = 30;
    private $defence = 10;

    public function __construct($data)
    {
        parent::__construct($data);
    }
}