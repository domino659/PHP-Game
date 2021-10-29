<?php
spl_autoload_register(function ($className) {
require $className . '.php';
});

$request = new HumanManager();
$humans = $request->getAll();
// var_dump($humans);
// var_dump($humans[0]['class']);
//$request->getOne(3);
//$request->addHuman('Zeremy', 100, 20, 10, 'Zerem', false);
//$request->addHuman('Sammy', 10, 2, 1, 'Sammy', true);
//$request->removeHuman(23)
//var_dump($human);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GamePhp</title>
  </head>
  <body>
    <pre id="human_list">
    <?php
        foreach($humans as $human) {
            print($human->getName());
            print($human->getpv());
            print($human->getAttack());
            print($human->getDefence());
            ?><br><?php
        } ?>
    </pre>
    <div class="container fill">
        <form action="index.php">
            <label>Create your hero</label>
            <input type="text" name="Name" id="human_name" placeholder="Name" required>
            <select name="class" id="human_class" required>
                <option value="">Pick your class</option>
                <option value="Warrior">Warrior</option>
                <option value="Archer">Archer</option>
                <option value="Tank">Tank</option>
                <option value="Magician">Magician</option>
            </select>
            <button id="human_form" type="submit" value="Create">Create</button>
        </form>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    human_form = document.querySelector("#human_form");
    human_form.addEventListener("click", function(human_form){

        human_form.preventDefault();

        var human_name = $('#human_name').val();
        var human_class = $('#human_class').val();
        var human_pv = 0;
        var human_defense = 0;
        var human_atk = 0;
        switch(human_class){
            case "Warrior" : human_pv = 150; human_atk = 30; human_defense = 10; break;
            case "Archer" : human_pv = 100; human_atk = 30; human_defense = 5; break;
            case "Tank" : human_pv = 200; human_atk = 10; human_defense = 20; break;
            case "Magician" : human_pv = 100; human_atk = 20; human_defense = 5; break;
        }

        if (human_name != "" && human_class != ""){
            $.ajax({
                type: 'post',
                url: 'human_form.php',
                data: {
                    human_name: human_name,
                    human_class: human_class,
                    human_pv: human_pv,
                    human_defense: human_defense,
                    human_atk: human_atk,
                },
                success: function(data) { 
                    human_list = document.querySelector('#human_list')
                    char = document.createElement("pre")
                    switch(human_class){
                        case "Warrior" : char.textContent = human_name+" "+human_class+" "+human_pv+" "+human_atk+" "+human_defense; break;
                        case "Archer" : char.textContent = human_name+" "+human_class+" "+human_pv+" "+human_atk+" "+human_defense; break;
                        case "Tank" : char.textContent = human_name+" "+human_class+" "+human_pv+" "+human_atk+" "+human_defense; break;
                        case "Magician" : char.textContent = human_name+" "+human_class+" "+human_pv+" "+human_atk+" "+human_defense; break;
                    }
                    human_list.appendChild(char)
                }
            });
        }
    });
</script>