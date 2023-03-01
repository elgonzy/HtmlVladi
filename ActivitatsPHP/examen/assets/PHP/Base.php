<?php 

namespace assets\PHP\utils;

class Base {
    
    // Configuración de la conexión
    const DB_HOST="localhost";
    const DB_USER="daw";
    const DB_PASS="daw2023";
    const DB_NAME="examenbiblioteca";

    public function test_connection()
    {
        echo '<div>true</div>';
    }

    public function query($sql)
    {
        // Crea la conexión
        $conn = mysqli_connect($this::DB_HOST, $this::DB_USER, $this::DB_PASS, $this::DB_NAME);
            
        // Verifica si la conexión falló
        if (!$conn) {
            echo "Conexión fallida: " . mysqli_connect_error();
        }
        
        // Ejecuta la consulta 
        $result = mysqli_query($conn, $sql);
        
        // Verifica si la consulta falló
        if (!$result) {
            return die("Consulta fallida: " . mysqli_error($conn));
        }else {
            return $result;
        }
        // cierro la conn
        $conn->close();
    }

    public function updateImageInBBDD($id, $destinationFile)
    {
        // sql syntax para updatear la foto del negrata dictador
        $sql = "UPDATE dictadors SET foto = '$destinationFile' WHERE id = '$id';";
        
        return  $this -> query($sql);;
    }  

    public function doLogin(){
        
        $sql = "SELECT nom, password FROM USUARIS WHERE nom='" . $_POST['nomIn'] . "' LIMIT 1";

        $result = $this -> query($sql);

        $row = $result->fetch_array();
        if ($row["nom"] == $_POST['nomIn'] && $row["password"] == $_POST['contrasenyaIn']) {

            session_start();
            $_SESSION['username'] = $_POST['nomIn'];
            return true;

        } else {
            session_start();
            session_destroy();
            return false ;

        }

    }

    public function uploadPhoto($id)
    {

        // Datos de los archivos del formulario
        $photoURL = "./assets/img/".$_FILES['photo']['name'];
        $photoURL = str_replace(" ","",$photoURL);
        
        // Validación de archivos
        $status = true;
        if ($_FILES['photo']['type'] != 'image/jpeg' && $_FILES['photo']['type'] != 'image/png') {
        
            echo "El archivo de la foto debe ser de tipo JPEG o PNG";
        
        } else {

            // Verifica si se subieron los archivos correctamente
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photoURL)) {
                echo "Error al subir el archivo de la foto";
                $status = false;
            }
            
        }

        if ($status) {

            $this -> updateImageInBBDD($id,$photoURL);

        }
    }
}