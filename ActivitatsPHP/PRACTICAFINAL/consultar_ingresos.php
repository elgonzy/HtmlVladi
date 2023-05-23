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

// Filtrar por fechas si se han enviado los campos del formulario
if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Obtener los ingresos del usuario dentro del rango de fechas especificado
    $sql = "SELECT * FROM ingresos WHERE username = '$username' AND fecha >= '$fecha_inicio' AND fecha <= '$fecha_fin'";
} else {
    // Obtener los ingresos del usuario para el mes actual
    $current_month = date('Y-m');
    $sql = "SELECT * FROM ingresos WHERE username = '$username' AND DATE_FORMAT(fecha, '%Y-%m') = '$current_month'";
}

$result = $conn->query($sql);

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GestFinan - Consultar Ingresos</title>
</head>
<body>
   <nav>
       <h1>Consultar Ingresos</h1>
   </nav>
   
   <form method="POST" action="consultar_ingresos.php">
       <label for="fecha_inicio">Fecha de inicio:</label>
       <input type="date" name="fecha_inicio" id="fecha_inicio">
       
       <label for="fecha_fin">Fecha de fin:</label>
       <input type="date" name="fecha_fin" id="fecha_fin">
       
       <button type="submit">Filtrar</button>
   </form>
   
    <table>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Monto</th>
            <th>Fecha</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['descripcion'] . '</td>';
                echo '<td>' . $row['monto'] . '</td>';
                echo '<td>' . $row['fecha'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4">No se encontraron ingresos para el rango de fechas especificado.</td></tr>';
        }
        ?>
    </table>

    <a href="dashboard.php">Volver al Dashboard</a>
</body>
</html>
