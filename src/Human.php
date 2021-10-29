<!--Représentation du Contenu de la DB-->
<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class Human
{
    private $id;
    private $name;
    private $pv;
    private $attack;
    private $defence;
    private $state = false;

    public function __construct($data)
    {
        if (is_string($data)) {
            $this->hydrate($data);
            $this->name = $data;
        }
        else {
            $this->hydrates($data);
            $this->name = $data[0];
            $this->id = $data[5];
        }
    }

    private function hydrate($data) {
        $method = 'set' . ucfirst($data);
        if (is_callable([$this, $method])) {
            $this->$method($data);
            $this->name = $data;
        }
    }

    private function hydrates(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (is_callable([$this, $method])) {
                $this->$method($value);
                $this->name = $data[0];
            }
        }
    }

    public function attack(Human $target) {
        $newPv = $target->getPv() - ($this->getAttack() - $target->getDefence());
        if ($newPv > $target->getPv()) {
            return;
        }
        $target->setPv($newPv);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return bool
     */
    public function isState()
    {
        return $this->state;
    }

    /**
     * @param bool $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}