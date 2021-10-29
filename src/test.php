<?php
    spl_autoload_register(function ($className) {
        require $className . '.php';
    });
?>

<?php
    function php_func(){
        $human_name = $_POST['human_name'];
        $human_class = $_POST['human_class'];
        $request = new HumanManager();
        $request->addHuman($human_name, 100, 20, 10, $human_class, state);
        $request->getAll();
    }
    php_func();

?>
