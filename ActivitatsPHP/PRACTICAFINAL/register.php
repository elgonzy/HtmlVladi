<?php
session_start();

// Establecer conexión con la base de datos
$conn = new mysqli('localhost', 'root', '', 'gestFin');
if ($conn->connect_error) {
    die('Error al conectar a la base de datos: ' . $conn->connect_error);
}

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $saldo = $_POST['saldo'];

    // Verificar si el nombre de usuario ya existe en la base de datos
    $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_username_result = $conn->query($check_username_sql);

    if ($check_username_result->num_rows > 0) {
        $_SESSION['error_message'] = 'El nombre de usuario ya está en uso.';
        header('Location: register.php');
        exit;
    }

    // Verificar si el correo electrónico ya existe en la base de datos
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = $conn->query($check_email_sql);

    if ($check_email_result->num_rows > 0) {
        $_SESSION['error_message'] = 'El correo electrónico ya está en uso.';
        header('Location: register.php');
        exit;
    }

    // Insertar el nuevo usuario en la base de datos
    $insert_sql = "INSERT INTO users (username, password, email, saldo) VALUES ('$username', '$password', '$email', '$saldo')";
    if ($conn->query($insert_sql) === TRUE) {
        $_SESSION['success_message'] = 'Registro exitoso. Inicia sesión para continuar.';
        header('Location: index.html');
        exit;
    } else {
        $_SESSION['error_message'] = 'Error al registrar el usuario: ' . $conn->error;
        header('Location: register.php');
        exit;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GestFinan - Registro</title>
</head>
<body>
    <h1>Registro</h1>
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
    <form action="register.php" method="POST">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="saldo">Saldo inicial:</label>
        <input type="number" id="saldo" name="saldo" step="0.01" required><br>
        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>.</p>
</body>
</html>
