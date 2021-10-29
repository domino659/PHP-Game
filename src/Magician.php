<?php

class Magician extends Human
{
    private $pv = 100;
    private $attack = 20;
    private $defence = 5;
    private $magie = 40;

    public function __construct($data)
    {
        parent::__construct($data);
    }

    public function bolt(Human $target)
    {
        $newPv = $target->getPv() - ($this->getMagie() - $target->getDefence() / 2);
        if ($newPv > $target->getPv()) {
            return;
        }
        $target->setPv($newPv);
    }

    public function sleep(Human $target)
    {

    }

    /**
     * @return int
     */
    public function getMagie()
    {
        return $this->magie;
    }

    /**
     * @param int $magie
     */
    public function setMagie($magie)
    {
        $this->magie = $magie;
    }
}