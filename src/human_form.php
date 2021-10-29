<?php
    spl_autoload_register(function ($className) {
        require $className . '.php';
    });
?>

<?php
    function php_func(){
        $human_name = $_POST['human_name'];
        $human_class = $_POST['human_class'];
        $human_pv = $_POST['human_pv'];
        $human_atk = $_POST['human_atk'];
        $human_defense = $_POST['human_defense'];
        $request = new HumanManager();
        $request->addHuman($human_name, $human_pv, $human_atk, $human_defense, $human_class, false);
    }
    php_func();
?>
