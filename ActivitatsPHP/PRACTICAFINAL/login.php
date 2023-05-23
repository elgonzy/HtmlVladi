<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Establecer conexión con la base de datos
    $conn = new mysqli('localhost', 'root', '', 'gestFin');
    if ($conn->connect_error) {
        die('Error al conectar a la base de datos: ' . $conn->connect_error);
    }

    // Consulta SQL para obtener el usuario
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Credenciales válidas, iniciar sesión y redirigir al usuario a la página principal
        session_start();
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        // Credenciales inválidas, mostrar mensaje de error
       header('Location: index.html');
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
