<?php
spl_autoload_register(function ($className) {
require $className . '.php';
});

$request = new HumanManager();
$humans = $request->getAll();
//$request->getOne(3);
//$request->addHuman('Zeremy', 100, 20, 10, 'Zerem', false);
//$request->addHuman('Sammy', 10, 2, 1, 'Sammy', true);
//$request->removeHuman(23)
$human = new Warrior('Sammy');
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
        for ($i=0; $i<count($humans); $i++) {
            print($humans[$i]['id']);
            print($humans[$i]['name']);
            print($humans[$i]['pv']);
            print($humans[$i]['attack']);
            print($humans[$i]['defence']);
            print($humans[$i]['class']);
            ?><br><?php
        } ?>
    </pre>
    <pre>
        <?php
        print($human->getName());
        print($human->getpv());
        print($human->getAttack());
        print($human->getDefence());
        ?></><br>
    </pre>
    <div class="container fill">
        <form action="index.php">
            <label>Create your hero</label>
            <input type="text" name="Name" id="human_name" placeholder="Name" required>
            <select name="class" id="human_class" required>
                <option value="">Pick your class</option>
                <option value="warrior">Warrior</option>
                <option value="archer">Archer</option>
                <option value="tank">Tank</option>
                <option value="magician">Magician</option>
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

        if (human_name != "" && human_class != ""){
            $.ajax({
                type: 'post',
                url: 'test.php',
                data: {
                    human_name: human_name,
                    human_class: human_class,
                },
                success: function(data) { 
                    human_list = document.querySelector('#human_list')
                    char = document.createElement("pre")
                    char.textContent = human_name+" "+human_class+" 100 20 10"
                    human_list.appendChild(char)
                }
            });
        }
    });
</script>