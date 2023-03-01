<?php
namespace index;
use assets\PHP\utils\Base;
require_once 'assets\PHP\Base.php';
    
    $base = new Base; // Instanciamos la clase base donde tengo metodos para gestionar cosas base de la actividad

    
    if ($base -> doLogin() || isset($_SESSION['username'])) {
        
        header('location: obra.html');
        
    }else {

        session_start();
        session_destroy();
        header('location: index.html');
    
    }