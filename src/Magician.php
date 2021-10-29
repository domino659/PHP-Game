<?php

class Magician extends Human
{

    public function __construct($data)
    {
        parent::__construct($data);
        parent::setPv(100);
        parent::setAttack(20);
        parent::setDefence(5);
    }

    public function bolt(Human $target)
    {
        $newPv = $target->getPv() - ($this->getAttack()*2 - $target->getDefence()/2);
        if ($newPv > $target->getPv()) {
            return;
        }
        $target->setPv($newPv);
    }

    public function sleep(Human $target)
    {

    }

}