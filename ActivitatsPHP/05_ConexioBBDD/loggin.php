<?php

    $host = 'db';
    $userDatabase = 'root';
    $passDatabase = '1234';
    $mydatabase = 'activitatBBDD';

    $nomIn = $_POST["nomIn"];
    $contrasenyaIn = $_POST["contrasenyaIn"];

    $conn = new mysqli($host, $userDatabase, $passDatabase, $mydatabase);

    $sql = "SELECT nom, contrasenya, edat FROM USUARIS WHERE nom='" . $nomIn . "' LIMIT 1";

    $result = $conn->query($sql);

    if (!$result){

        echo (" ERROR!");

    }else {

        $row = $result->fetch_array();
        if ($row["nom"] == $nomIn && $row["contrasenya"] == $contrasenyaIn) {

            session_start();
            $_SESSION['username'] = $nomIn;
            header('location: index.php');

        } else {
            session_start();
            session_destroy();
            header('location: index.html');

        }
    }
    
?>