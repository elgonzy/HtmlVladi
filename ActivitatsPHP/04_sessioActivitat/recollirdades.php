<?php

$user = $_POST["user"];
$contrasenya = $_POST["psw"];



if ($user=="Adri" && $contrasenya=="1234") {

   session_start();
   $_SESSION['userName']=$user;
   header('location: index.php');


}else
{
    header('location: index.html');
}



?>