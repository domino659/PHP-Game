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
     * @return mixed
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * @param mixed $pv
     */
    public function setPv($pv)
    {
        $this->pv = $pv;
    }

    /**
     * @return mixed
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * @param mixed $attack
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param mixed $defence
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;
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