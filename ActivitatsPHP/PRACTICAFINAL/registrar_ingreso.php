<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

// Obtener el nombre de usuario de la sesión
$username = $_SESSION['username'];

// Establecer conexión con la base de datos
$conn = new mysqli('localhost', 'root', '', 'gestFin');
if ($conn->connect_error) {
    die('Error al conectar a la base de datos: ' . $conn->connect_error);
}

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $categoria = $_POST['categoria'];
    $monto = $_POST['monto'];
    $fecha = $_POST['fecha'];

    // Insertar el ingreso en la base de datos
    $insert_sql = "INSERT INTO ingresos (username, categoria, monto, fecha) VALUES ('$username', '$categoria', '$monto', '$fecha')";
    if ($conn->query($insert_sql) === TRUE) {
        $_SESSION['success_message'] = 'Ingreso registrado correctamente.';
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Error al registrar el ingreso: ' . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GestFinan - Registrar Ingreso</title>
</head>
<body>
    <h1>Registrar Ingreso</h1>

    <form action="registrar_ingreso.php" method="POST">
        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required><br>
        <label for="monto">Monto:</label>
        <input type="number" id="monto" name="monto" step="0.01" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br>
        <input type="submit" value="Registrar Ingreso">
    </form>
</body>
</html>
