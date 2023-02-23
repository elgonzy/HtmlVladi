<?php 

namespace assets\PHP\utils;

class Base {
    
    // Configuración de la conexión
    const DB_HOST="localhost";
    const DB_USER="root";
    const DB_PASS="";
    const DB_NAME="act_fetch";

    public function test_connection()
    {
        echo '<div>true</div>';
    }

    public function getImageFromURL($imgUrl)
    {
        
        $imagePath = './assets/img/';
        $imageData = file_get_contents($imgUrl);
        $imageName = basename($imgUrl);
        $destinationFile = $imagePath . $imageName;
        file_put_contents($destinationFile, $imageData);
        
        return $destinationFile;

    }

    public function updateImageInBBDD($id, $destinationFile)
    {
        // sql syntax para updatear la foto del negrata dictador
        $sql = "UPDATE dictadors SET foto = '$destinationFile' WHERE id = '$id';";
        
        // Crea la conexión
        $conn = mysqli_connect($this::DB_HOST, $this::DB_USER, $this::DB_PASS, $this::DB_NAME);

        // Verifica si la conexión falló
        if (!$conn) {
            echo "Conexión fallida: " . mysqli_connect_error();
        }
        
        //ejecuta la consulta 
        $result = mysqli_query($conn,$sql);

        if (!$result) {
            die("Consulta fallida: ". mysqli_error($conn));
        }

        return  $result;
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
    
    // utils in dictadors only 

    private $dictadorsData;
    
    public function getDictadorById($id)
    {
        if (!isset($this -> dictadorsData)) {
            
            // sql syntax para obtener los datos de un dictador en concreto
            $sql = "SELECT * FROM dictadors;";
            
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
                die("Consulta fallida: " . mysqli_error($conn));
            }
            
            // Guarda todos los datos en una variable privada de la clase
            $this->dictadorsData = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            // Libera la memoria del resultado de la consulta
            mysqli_free_result($result);
        }

        if (array_key_exists($id, $this->dictadorsData)) {
            
            // Obtener el registro deseado
            $dictador = $this->dictadorsData[$id];
                    
            $html = "<div>";
            $html .= "<div class='dictador-info' >Nombre: ".$dictador['nom']."</div>";
            $html .= "<div class='dictador-info' >Nacionalidad: ".$dictador['nacionalitat']."</div>";
            $html .= "<div class='dictador-info' >Año de muerte: ".$dictador['any_mort']."</div>";
            $html .= "<div id='dictador-img' >Foto: <img src='".$dictador['foto']."'></div>";
            $html .= "</div>";
            
        }else {
            
            $html = "<div><p>No se ha podido obtener los datos de dictador</p></div>";
            
        }
        
        
        return $html;
    }
    
    // devuelve maxIndex para js
    // si no se ejecuta primero getDictators esta funcion no devuelve nada
    public function getMaxIndex()
    {   
        if (isset($this -> dictadorsData)) {

            return count($this -> dictadorsData);

        }
        
    }
    
}