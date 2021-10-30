<?php
spl_autoload_register(function ($className) {
require $className . '.php';
});

$request = new HumanManager();
$humans = $request->getAll();
// var_dump($humans);
//$request->getOne(3);
//$request->removeHuman(23)

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GamePhp</title>
  </head>
  <body>
    <div id="human_list">
    <?php
        foreach($humans as $human) {
            $id = $human->getId();
            ?>
            <p>
                <?php
                print($human->getName());
                print($human->getpv());
                print($human->getAttack());
                print($human->getDefence());
                print(get_class($human));
                ?>
            </p>
            <button class="select" id=<?php echo $id; ?>>Select</button>
            <br><?php
        } ?>
    </div>
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
            <button id="human_form" class="select" type="submit" value="Create">Create</button>
        </form>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    //Ajout personnage dans base de données
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
                    char = document.createElement("p")
                    button = document.createElement("button")
                    button.id = "human_form"
                    button.class = "select"
                    button.type = "submit"
                    button.Create = "Create"
                    button.innerHTML = "Select"
                    switch(human_class){
                        case "Warrior" : char.textContent = human_name+" "+human_class+" "+human_pv+" "+human_atk+" "+human_defense; break;
                        case "Archer" : char.textContent = human_name+" "+human_class+" "+human_pv+" "+human_atk+" "+human_defense; break;
                        case "Tank" : char.textContent = human_name+" "+human_class+" "+human_pv+" "+human_atk+" "+human_defense; break;
                        case "Magician" : char.textContent = human_name+" "+human_class+" "+human_pv+" "+human_atk+" "+human_defense; break;
                    }

                    human_list.appendChild(char)
                    human_list.appendChild(button)
                }
            });
        }
    });
</script>

<script>
    //Gestion bouton choix personnage bagarre
    all_button_select = document.getElementsByClassName("select")
    // all_button_select.foreach{
    //     button.addEventListener("click", function(){
    //         button.class = "selected"
    //     })
    // }
</script>