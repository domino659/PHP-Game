<?php

class Archer extends Human {

    public function __construct($data)
    {
        parent::__construct($data);
        parent::setPv(100);
        parent::setAttack(30);
        parent::setDefence(5);
    }
}
