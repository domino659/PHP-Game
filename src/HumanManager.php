<!--Manager Parle a la DB-->
<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class HumanManager
{
    public function getAll()
    {
        $requeteSql = "SELECT * FROM human";
        $connexion = new Bdd();
        return $connexion->request($requeteSql);
    }

    public function getOne($id)
    {
        $requeteSql = "SELECT * FROM human WHERE id = $id";
        $connexion = new Bdd();
        return $connexion->request($requeteSql);
    }

    public function addHuman($name, $pv, $attack, $defence, $class) {
        $requeteSql = "INSERT INTO human (name, pv, attack, defence, class) Values (:name, :pv, :attack, :defence, :class)";
        $connexion = new Bdd();
        $insert = $connexion->dbConnect()->prepare( $requeteSql );
        $insert->execute(array(
                'name' => $name,
                'pv' => $pv,
                'attack' => $attack,
                'defence' => $defence,
                'class' => $class
        ));
    }

    public function removeHuman($id) {
        $requeteSql = "DELETE FROM human WHERE id = $id";
        $connexion = new Bdd();
        return $connexion->request($requeteSql);
    }
}
