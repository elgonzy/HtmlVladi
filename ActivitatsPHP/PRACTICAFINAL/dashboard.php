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

// Consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
    $saldo = $row['saldo'];
    $foto_perfil = $row['foto_perfil'];
} else {
    // No se encontró al usuario
    header('Location: index.html');
    exit;
}

// Obtener los ingresos del mes actual
$currentMonth = date('Y-m');
$ingresos_sql = "SELECT SUM(monto) AS total_ingresos FROM ingresos WHERE username = '$username' AND fecha LIKE '$currentMonth%'";
$ingresos_result = $conn->query($ingresos_sql);
$total_ingresos = 0;

if ($ingresos_result->num_rows === 1) {
    $row = $ingresos_result->fetch_assoc();
    $total_ingresos = $row['total_ingresos'];
}

// Obtener los gastos del mes actual
$gastos_sql = "SELECT SUM(monto) AS total_gastos FROM gastos WHERE username = '$username' AND fecha LIKE '$currentMonth%'";
$gastos_result = $conn->query($gastos_sql);
$total_gastos = 0;

if ($gastos_result->num_rows === 1) {
    $row = $gastos_result->fetch_assoc();
    $total_gastos = $row['total_gastos'];
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GestFinan - Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <h1>Bienvenido, <?php echo $username; ?></h1>
    </nav>
    <img src="<?php echo $foto_perfil; ?>" alt="Foto de perfil"><br>
    <p>Email: <?php echo $email; ?></p>
    <p>Saldo: <?php echo $saldo; ?></p>
    <p>Ingresos del mes: <?php echo $total_ingresos; ?></p>
    <p>Gastos del mes: <?php echo $total_gastos; ?></p>

    <h2>Operaciones</h2>
    <button onclick="location.href='agregar_saldo.php'">Añadir Saldo</button>
    <button onclick="location.href='registrar_gasto.php'">Registrar Gasto</button>
    <button onclick="location.href='registrar_ingreso.php'">Registrar Ingreso</button>

    <h2>Consultas</h2>
    <button onclick="location.href='consultar_gastos.php'">Consultar Gastos</button>
    <button onclick="location.href='consultar_ingresos.php'">Consultar Ingresos</button>

    <footer>
        &copy; <?php echo date('Y'); ?> GestFinan - Todos los derechos reservados.
    </footer>
</body>
</html>
