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

    // Obtener los gastos del usuario dentro del rango de fechas especificado
    $sql = "SELECT * FROM gastos WHERE username = '$username' AND fecha >= '$fecha_inicio' AND fecha <= '$fecha_fin'";
} else {
    // Obtener los gastos del usuario para el mes actual
    $current_month = date('Y-m');
    $sql = "SELECT * FROM gastos WHERE username = '$username' AND DATE_FORMAT(fecha, '%Y-%m') = '$current_month'";
}

$result = $conn->query($sql);
$conn->close();

// Generar el informe en formato PDF
require('assets/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página personalizada
    function Header()
    {
        // Título del informe
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Informe de Gastos - Mes Actual', 0, 1, 'C');
        $this->Ln(5);
    }
    
    // Pie de página personalizado
    function Footer()
    {
        // Número de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . ' / {nb}', 0, 0, 'C');
    }
}

// Crear un nuevo PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Agregar contenido al informe
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'ID', 1);
$pdf->Cell(50, 10, 'Categoría', 1);
$pdf->Cell(40, 10, 'Monto', 1);
$pdf->Cell(50, 10, 'Fecha', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);


// Cerrar la conexión a la base de datos

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['id'], 1);
        $pdf->Cell(50, 10, $row['categoria'], 1);
        $pdf->Cell(40, 10, $row['monto'], 1);
        $pdf->Cell(50, 10, $row['fecha'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(180, 10, 'No se encontraron gastos para el mes actual.', 1, 1, 'C');
}
$_SESSION['pdf'] = $pdf;

$pdf->Output('Informe_Gastos_Mes_Actual.pdf', 'D');

?>
