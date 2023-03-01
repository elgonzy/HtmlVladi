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
    
    public function doLogin(){
        
        $sql = "SELECT nom, password FROM USUARIS WHERE nom='" . $_POST['nomIn'] . "' LIMIT 1";

        $result = $this -> query($sql);

        $row = $result->fetch_array();
        if ($row["nom"] == $_POST['nomIn'] && $row["password"] == $_POST['contrasenyaIn']) {

            session_start();
            $_SESSION['username'] = $_POST['nomIn'];
            header('location: obra.html');
            return true;

        } else {
            session_start();
            session_destroy();
            header('location: index.html');
            return false ;

        }

    }

    public function updateImageInBBDD($id, $destinationFile)
    {   
        echo $destinationFile;
        // sql syntax para updatear la foto del negrata obra
        $sql = "UPDATE obra SET foto = '$destinationFile' WHERE idobra = '$id';";
        
        return  $this -> query($sql);;
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

     // utils in examen only 

     private $obraData;
     private $maxIndex;
     
     public function getobraById($id)
     {
         if (!isset($this -> obraData)) {
             
             // sql syntax para obtener los datos de un obra en concreto
             $sql = "SELECT * FROM obra;";
              
             
             // Guarda todos los datos en una variable privada de la clase
             $this->obraData = mysqli_fetch_all($this -> query($sql), MYSQLI_ASSOC);
                     
         }
 
         if (array_key_exists($id, $this->obraData)) {
             
             // Obtener el registro deseado
             $obra = $this->obraData[$id];
                     
             $html = "<div>";
             $html .= "<div class='obra-info' >Titol: ".$obra['titol']."</div>";
             $html .= "<div class='obra-info' >any: ".$obra['any']."</div>";
             $html .= "<div class='obra-info' >Foto: <img id='obra-img' src='".$obra['foto']."'></div>";
             $html .= "</div>";
             
         }else {
             
             $html = "<div><p>No se ha podido obtener los datos de obra</p></div>";
             
         }
         
         return $html;
     }
     
     // devuelve maxIndex para js
     // si no se ejecuta primero getDictators esta funcion no devuelve nada
     public function getMaxIndex()
     {   
         if (isset($this -> obraData)) {
 
             return $this -> maxIndex = count($this -> obraData);
 
         }
         
     }

     public function getId(){

        $sql = "SELECT * FROM obra;";
        
        $result = $this -> query($sql);

        $rows = $result->fetch_array();
        $id = 0;

        if (is_array($rows['idobra'])) {
         
            foreach ($rows['idobra'] as $row ) {
                if ($id < intval($row)) {
                    
                    $id = intval($rows['idobra']);

                }
            }
            
        }else{
  
            $id = intval($rows['idobra']);

        }

        return $id;

     }
 
     public function insertObraInBBDD() {
         $titol = $_POST['titol'];
         $any = $_POST['any'];
         
         $sql = "INSERT INTO obra (titol, any) VALUES ('$titol', $any)";
         
         $this->query($sql);

         $id = $this -> getId();
         
         $this -> uploadPhoto($id);
 
     }
     
 }
