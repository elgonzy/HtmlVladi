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

    // Insertar el gasto en la base de datos
    $insert_sql = "INSERT INTO gastos (username, categoria, monto, fecha) VALUES ('$username', '$categoria', '$monto', '$fecha')";
    if ($conn->query($insert_sql) === TRUE) {
        $_SESSION['success_message'] = 'Gasto registrado correctamente.';
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Error al registrar el gasto: ' . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GestFinan - Registrar Gasto</title>
</head>
<body>
    <nav>
        <h1>Registrar Gasto</h1>
    </nav>
    <?php
    // Mostrar mensajes de éxito o error, si existen
    if (isset($_SESSION['success_message'])) {
        echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    ?>
    <form action="registrar_gasto.php" method="POST">
        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required><br>
        <label for="monto">Monto:</label>
        <input type="number" id="monto" name="monto" step="0.01" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br>
        <input type="submit" value="Registrar Gasto">
    </form>
</body>
</html>
