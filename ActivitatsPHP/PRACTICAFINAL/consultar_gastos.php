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

// Obtener los gastos del usuario para el mes actual
$current_month = date('Y-m');
$sql = "SELECT * FROM gastos WHERE username = '$username' AND DATE_FORMAT(fecha, '%Y-%m') = '$current_month'";
$result = $conn->query($sql);

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GestFinan - Consultar Gastos</title>
</head>
<body>
    <h1>Consultar Gastos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Categoría</th>
            <th>Monto</th>
            <th>Fecha</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['categoria'] . '</td>';
                echo '<td>' . $row['monto'] . '</td>';
                echo '<td>' . $row['fecha'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4">No se encontraron gastos para el mes actual.</td></tr>';
        }
        ?>
    </table>

    <a href="dashboard.php">Volver al Dashboard</a>
</body>
</html>
