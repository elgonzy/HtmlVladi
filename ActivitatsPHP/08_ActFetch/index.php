<?php

namespace index;
use assets\PHP\utils\Base;
require_once 'assets\PHP\Base.php';
    
    $base = new Base; // Instanciamos la clase base donde tengo metodos para gestionar cosas base de la actividad
    
    // Obtenemos el dictador por id
    echo $base -> getDictadorById($_POST['index']);
    // hacemos un separador para manejar los datos mas facilmente
    echo "::";
    // Obtenemos max index
    echo $base -> getMaxIndex();

    $nom = "";
    if (isset($_POST['nom'])) {
        if ($_POST['nom'] != $nom) {

            $base -> insertDictadorInBBDD();

        }
    }
