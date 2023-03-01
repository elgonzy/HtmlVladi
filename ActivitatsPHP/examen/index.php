<?php
namespace index;
use assets\PHP\utils\Base;
require_once 'assets\PHP\Base.php';
    
    $base = new Base; // Instanciamos la clase base donde tengo metodos para gestionar cosas base de la actividad

    
    if ($base -> doLogin() || isset($_SESSION['username'])) {
        

        

        $html = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        </head>
        <body>
            <header>
                <nav>
                    <a>".$_SESSION['username']."</a>
                    <a href='./tancarsessio.php'>cerrar sesion</a>
                </nav>
            </header>
        </body>
        </html>";
        
        echo $html;
        
    }else {

        session_start();
        session_destroy();
        header('location: index.html');
    
    }