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

// Consulta SQL para obtener el saldo actual del usuario
$sql = "SELECT saldo FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $saldo_actual = $row['saldo'];
} else {
    // No se encontró al usuario
    header('Location: dashboard.php');
    exit;
}

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el saldo a agregar
    $saldo_agregado = $_POST['saldo'];

    // Validar y procesar el saldo a agregar (Aquí puedes agregar tu lógica de validación y actualización del saldo)
    // Por simplicidad, este ejemplo solo suma el saldo ingresado al saldo actual del usuario
    $nuevo_saldo = $saldo_actual + $saldo_agregado;

    // Actualizar el saldo en la base de datos
    $update_sql = "UPDATE users SET saldo = '$nuevo_saldo' WHERE username = '$username'";
    if ($conn->query($update_sql) === TRUE) {
        // Redirigir al usuario al dashboard con el saldo actualizado
        $_SESSION['success_message'] = 'Saldo agregado correctamente.';
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Error al actualizar el saldo: ' . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GestFinan - Agregar Saldo</title>
</head>
<body>
    <nav>
        <h1>Agregar Saldo</h1>
    </nav>
    <?php
    ?>
    <form action="agregar_saldo.php" method="POST">
        <label for="saldo">Saldo a agregar:</label>
        <input type="number" id="saldo" name="saldo" required><br>
        <input type="submit" value="Agregar Saldo">
    </form>
</body>
</html>
