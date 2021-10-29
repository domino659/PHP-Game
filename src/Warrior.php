<?php

class Warrior extends Human {

    public function __construct($data)
    {
        parent::__construct($data);
        parent::setPv(150);
        parent::setAttack(30);
        parent::setDefence(10);
    }
}