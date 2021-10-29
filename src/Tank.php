<?php

class Tank extends Human {

    public function __construct($data)
    {
        parent::__construct($data);
        parent::setPv(200);
        parent::setAttack(10);
        parent::setDefence(20);
    }
}
