<?php


// el nom que te actualment el fitxer en el servidor. No és el nom original, és un nom aleatori
echo ('nom temporal: '.$_FILES['fitxer']['tmp_name']);

// si volem saber el tipus de fitxer, ho tenim amb la següent funció
echo ('tipus: '.$_FILES['fitxer']['type']);

//si volem saber el tamany del fitxer:
echo ('Tamany: '.$_FILES['fitxer']['size']);

//si volem saber el nom original del fitxer (el nom que te el fitxer en el nostre disc dur)
echo ('nom original: '.$_FILES['fitxer']['tmp_name']);

//això ho fem servir per comprovar l'extensió del fitxer. 
if(!strpos($_FILES['fitxer']['name'],".pdf"))
    echo("no");

//preparem una variable amb la ruta final juntament amb el nom que tindra el fitxer    
$destinacio= "./arxius/".$_FILES['fitxer']['name'];
echo $destinacio;
$cadena =str_replace(' ', '', $destinacio);
echo("<p>".$cadena."</p>");

//movem el fitxer i al mateix temps comprovem que s'ha fet de manera correcte
// la comanda de moure el fitxer el que fa és moure el fitxer temporal $_FILES['fitxer']['tmp_name'] a la ruta que hem generat en el punt previ $cadena
if(move_uploaded_file($_FILES['fitxer']['tmp_name'],$cadena))
    echo("pujat ok");
    else
    echo("pujat ko");

?>