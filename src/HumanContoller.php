<!--Manager logique-->
<?php
spl_autoload_register(function ($className) {
    require $className . '.php';
});

class HumanController
{

}
