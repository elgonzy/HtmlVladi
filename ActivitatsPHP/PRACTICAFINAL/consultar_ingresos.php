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
if (isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin'])) {
    $fecha_inicio = $_GET['fecha_inicio'];
    $fecha_fin = $_GET['fecha_fin'];

    // Obtener los ingresos del usuario dentro del rango de fechas especificado
    $sql = "SELECT * FROM ingresos WHERE username = '$username' AND fecha >= '$fecha_inicio' AND fecha <= '$fecha_fin'";
} else {
    // Obtener todos los ingresos del usuario
    $current_month = date('Y-m');
    $sql = "SELECT * FROM ingresos WHERE username = '$username' AND DATE_FORMAT(fecha, '%Y-%m') = '$current_month'";
}

$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GestFinan - Consultar Ingresos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   <nav>
        <h1>Consultar Ingresos</h1>    
   </nav>
   <form id="filter-form">
       <label for="fecha_inicio">Fecha de inicio:</label>
       <input type="date" name="fecha_inicio" id="fecha_inicio">
       
       <label for="fecha_fin">Fecha de fin:</label>
       <input type="date" name="fecha_fin" id="fecha_fin">
       
       <button type="button" id="filter-button">Filtrar</button>
       <button type="button" id="download-pdf">Descargar PDF</button>
   </form>
    <table id="ingresos-table">
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
            echo '<tr><td colspan="4">No se encontraron ingresos para el rango de fechas especificado.</td></tr>';
        }
        ?>
    </table>
    <a href="dashboard.php">Volver al Dashboard</a>
    <script>
        $(document).ready(function() {
            // Enviar los datos del formulario mediante Fetch al hacer clic en el botón "Filtrar"
            $('#filter-button').click(function() {
                const fechaInicio = $('#fecha_inicio').val();
                const fechaFin = $('#fecha_fin').val();

                // Redirigir a la página actual con los parámetros de fecha en la URL
                window.location.href = 'consultar_ingresos.php?fecha_inicio=' + fechaInicio + '&fecha_fin=' + fechaFin;
            });

            // Descargar el PDF mediante Fetch
            $('#download-pdf').click(function() {
                const formData = new FormData();
                formData.append('fecha_inicio', $('#fecha_inicio').val());
                formData.append('fecha_fin', $('#fecha_fin').val());

                fetch('download_consultar_ingresos.php', {
                    method: 'POST',
                    body: formData
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.blob();
                    } else {
                        throw new Error('Error al descargar el PDF');
                    }
                })
                .then(function(blob) {
                    var url = URL.createObjectURL(blob);
                    var link = document.createElement('a');
                    link.href = url;
                    link.download = 'Informe_Ingresos.pdf';
                    link.click();
                })
                .catch(function(error) {
                    console.log(error);
                });
            });
        });
    </script>
</body>
</html>
