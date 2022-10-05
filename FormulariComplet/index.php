<?php

include_once("./inc/funcions.inc");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari complet </title>
</head>

<body>

    <?php
        
        $religions = array("CristianoSIUU" , "Judio" , "Vladimista" , "Negrata");
        $hobbies = array("Pajillero" , "Otaku", "Mobil" , "Cotxes" , "tractor" , "pages" , "drogadicte" , "alcoholic");
        $edat = array("entre 0 i 30" , "entre 31 i 50" , "entre 51 i 60" , "entre 61 i 90");


    ?>

    <h1>Formulari complet</h1>

    <form action="recolliDades.php" method="post">

    <label for="name">Nombre: </label>
    <input type="text" name="name" id="name">

    <label for="secondName">Apellido: </label>
    <input type="text" name="secondName" id="secondName">
    <?php
    
    doSelectFromArray($hobbies);
    doSelectFromArray($edat);
    
    ?>
    <label for="weight">Pes: </label>
    <input type="text" name="weight" id="weight">
    <label for="men">Home: </label>
    <input type="radio" name="sex" id="men" value="men">
    <label for="women">Dona: </label>
    <input type="radio" name="sex" id="women" value="women">
    <?php
    
        doCheckboxFromArray($religions);

    ?>

    <input type="submit" value="enviar">
    <input type="button" value="borrar formulario">

    </form>

</body>

</html>