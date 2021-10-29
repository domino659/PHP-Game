<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class HumanManager
{
    public $statEntity = [];

    public function getAll()
    {
        $arena = [];
        $requeteSql = "SELECT * FROM human";
        $connexion = new Bdd();
        $result = $connexion->request($requeteSql);
        foreach ($result as $human) {
            $statEntity = [$human['name'], $human['pv'], $human['attack'], $human['defence'], $human['state']];
            //var_dump($statEntity);
            switch ($human['class']) {
                case 'Warrior':
                    array_push($arena, new Warrior($statEntity));
                    break;
                case 'Archer':
                    array_push($arena, new Archer($statEntity));
                    break;
                case 'Tank':
                    array_push($arena,  new Tank($statEntity));
                    break;
                case 'Magician':
                    array_push($arena, new Magician($statEntity));
                    break;
            }
        }
        return $arena;
    }

    public function getOne($id)
    {
        $requeteSql = "SELECT * FROM human WHERE id = $id";
        $connexion = new Bdd();
        return $connexion->request($requeteSql);
    }

    public function addHuman($name, $pv, $attack, $defence, $class, $state) {
        $requeteSql = "INSERT INTO human (name, pv, attack, defence, class, state) Values (:name, :pv, :attack, :defence, :class, :state)";
        $connexion = new Bdd();
        $insert = $connexion->dbConnect()->prepare( $requeteSql );
        $insert->execute(array(
                'name' => $name,
                'pv' => $pv,
                'attack' => $attack,
                'defence' => $defence,
                'class' => $class,
                'state' => $state
        ));
    }

    public function removeHuman($id) {
        $requeteSql = "DELETE FROM human WHERE id = $id";
        $connexion = new Bdd();
        return $connexion->request($requeteSql);
    }
}
