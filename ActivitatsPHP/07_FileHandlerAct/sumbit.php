<?php 
    // Configuración de la conexión
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "filehandler");

    // Datos del formulario
    $username = $_POST['username'];
    $usersurname = $_POST['usersurname'];
    $birthdate = $_POST['birthdate'];
    $number_phone = $_POST['number_phone'];
    $cp = $_POST['cp'];

    // Datos de los archivos del formulario
    $photoURL = "./assets/img/".$_FILES['photo']['name'];
    $photoURL = str_replace(" ","",$photoURL);

    $cvURL = "./assets/img/".$_FILES['cv']['name'];
    $cvURL = str_replace(" ","",$cvURL);
    
    
    // Validación de archivos
    $status = true;
    if ($_FILES['photo']['type'] != 'image/jpeg' && $_FILES['photo']['type'] != 'image/png') {
    
        echo "El archivo de la foto debe ser de tipo JPEG o PNG";
    
    } else if ($_FILES['cv']['type'] != 'application/pdf') {
    
        echo "El archivo del CV debe ser de tipo PDF";
    
    } else {
        // Verifica si se subieron los archivos correctamente
        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photoURL)) {
            echo "Error al subir el archivo de la foto";
            $status = false;
        } else if (!move_uploaded_file($_FILES['cv']['tmp_name'], $cvURL)) {
            echo "Error al subir el archivo del CV";
            $status = false;
        } 

    }

    // Crea la conexión
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verifica si la conexión falló
    if (!$conn) {
        echo "Conexión fallida: " . mysqli_connect_error();
    }

    // Crea la consulta SQL
    $sql = "INSERT INTO users (username, usersurname, birthdate, number_phone, cp, photoURL, cvURL)
            VALUES ('$username', '$usersurname', '$birthdate', '$number_phone', '$cp', '$photoURL', '$cvURL')";

    // Ejecuta la consulta
    if($status){
        $result = mysqli_query($conn, $sql);
    }
    // Verifica si la consulta falló
    if (!$result) {
        die("Consulta fallida: " . mysqli_error($conn));
    }

    // Cierra la conexión
    mysqli_close($conn);
?>
