<?php
namespace index;
use assets\PHP\utils\Base;
require_once 'assets\PHP\Base.php';
session_start();
    
    $base = new Base; // Instanciamos la clase base donde tengo metodos para gestionar cosas base de la actividad
    
    $username = $_SESSION['username'];
    echo $username;
    echo "::";
    echo $base -> getobraById($_POST['index']);
    echo "::";
    echo $base -> getMaxIndex();        
   