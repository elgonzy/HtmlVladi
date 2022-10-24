<?php

$host = 'db';
$userDatabase = 'root';
$passDatabase = '1234';
$mydatabase = 'my_database';

$userIn = $_POST["user"];
$passwordIn = $_POST["psw"];

$conn = new mysqli($host, $userDatabase, $passDatabase, $mydatabase);

$sql = "SELECT userName, userPassword, edat FROM users";

$result = $conn->query($sql);

if (!$result){

    echo ("ERROR!");

}else {

    if ($result->num_rows == 0)
        echo ("no hi ha resultats");

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_array();
        if ($row["userName"] == $userIn && $row["userPassword"] == $passwordIn) {

            session_start();
            $_SESSION['userName'] = $userIn;
            header('location: index.php');
        
        } else {

            header('location: index.html');
        
        }
    }
}


