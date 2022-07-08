<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../img/escuela2.jpg', 90, 8, 33);
        // $this->Ln(20);
        // $this->Image('../img/bienestar-institucional.png', 150, 10, 50);
        $this->Ln(15);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 10);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70, 10,  utf8_decode('UNIDAD EDUCATIVA "ROSA OLGA VILLACRES LOZANO"'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(5);
        // Movernos a la derecha
        $this->Cell(60);

        $fecha = isset($_POST['fechaConsulta']) ? $_POST['fechaConsulta'] : "vacio";
        // Título
        $this->Cell(70, 10,  utf8_decode('Reporte de Asistencia de Alumnos - Fecha: ' . $fecha), 0, 0, 'C');
        // Salto de línea
        $this->Ln(15);

        /*-----------Encabezado------------*/
        $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 0);
        $this->Cell(70, 10, utf8_decode('Nombres'), 1, 0, 'C', 0);
        $this->Cell(21, 10, utf8_decode('Cedula'), 1, 0, 'C', 0);
        $this->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', 0);
        $this->Cell(30, 10, utf8_decode('Hora'), 1, 0, 'C', 0);
        $this->Cell(40, 10, utf8_decode('Status'), 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 3 cm del final
        $this->SetY(-19);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('__________________________________________________'), 0, 0, 'C');
        // Posición: a 2.5 cm del final
        $this->SetY(-16);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('UNIDAD EDUCATIVA "ROSA OLGA VILLACRES LOZANO"'), 0, 0, 'C');
        // Posición: a 2 cm del final
        $this->SetY(-13);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        
        $this->Cell(0, 10, utf8_decode('Fecha y hora: ') . date('Y-m-d H:m:s'), 0, 0, 'C');
        // Posición: a 1,5 cm del final
        $this->SetY(-10);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// ********************************************************************************
include '../conexion/conexion.php';
if (isset($_SESSION['query-pdf'])) {
    // //funcion de obtener consultas
    function obtenerConsultas($errores, $campo)
    {
        include '../conexion/conexion.php';
        $alerta = '';
        if (isset($errores[$campo]) && !empty($campo)) {
            $alerta =  $errores[$campo];

            $consulta_llega = $alerta;

            /**Traemos la consulta a la base de datos*/
            // require_once '../conexion/conexion.php';
            // $mysqli = new mysqli("localhost", "root", "1234", "itsjbaed_jba");            
            $mysqli = $conexion;
            $consulta = $consulta_llega;

            $resultado = $mysqli->query($consulta);

            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial', '', 8);
            //$pdf->Cell(40, 10, utf8_decode(''));

            /*Ciclo para tarer los datos de la BBDD */
            while ($row = $resultado->fetch_assoc()) {
                $pdf->Cell(10, 10, utf8_decode($row['idAlumno']), 1, 0, 'C', 0);
                $pdf->Cell(70, 10, utf8_decode($row['nombres']), 1, 0, 'C', 0);
                $pdf->Cell(21, 10, utf8_decode($row['cedula']), 1, 0, 'C', 0);
                $pdf->Cell(25, 10, utf8_decode($row['fecha']), 1, 0, 'C', 0);
                $pdf->Cell(30, 10, utf8_decode($row['hora']), 1, 0, 'C', 0);
                $statusValidar = $row['status'];
                if($statusValidar==='PRESENTE'){
                    $pdf->Cell(40, 10, utf8_decode('PRESENTE'), 1, 1, 'C', 0);
                }else{
                    $pdf->Cell(40, 10, utf8_decode('AUSENTE'), 1, 1, 'C', 0);
                }
                // $pdf->Cell(40, 10, utf8_decode($row['status']), 1, 1, 'C', 0);
            }
            $pdf->Output();
        }
        return $alerta;
    }
} else {
    // $consulta_llega = $_SESSION['query-pdf']['query'];
    $consulta_llega = "¡¡Error no llego consulta!!, vuelva a intentar o contacte con el administrador";
    echo "" .  $consulta_llega;
}


if (isset($_SESSION['query-pdf']['query1'])) {
    echo isset($_SESSION['query-pdf']) ? obtenerConsultas($_SESSION['query-pdf'], 'query1') : '¡¡Error al generar el PDF!!, vuelva a intentar o contacte al administrador...';
} else if (isset($_SESSION['query-pdf']['query2'])) {
    echo isset($_SESSION['query-pdf']) ? obtenerConsultas($_SESSION['query-pdf'], 'query2') : '¡¡Error al generar el PDF!!, vuelva a intentar o contacte al administrador...';
} else if (isset($_SESSION['query-pdf']['query3'])) {
    echo isset($_SESSION['query-pdf']) ? obtenerConsultas($_SESSION['query-pdf'], 'query3') : '¡¡Error al generar el PDF!!, vuelva a intentar o contacte al administrador...';
} else if (isset($_SESSION['query-pdf']['query4'])) {
    echo isset($_SESSION['query-pdf']) ? obtenerConsultas($_SESSION['query-pdf'], 'query4') : '¡¡Error al generar el PDF!!, vuelva a intentar o contacte al administrador...';
} else if (isset($_SESSION['query-pdf']['query5'])) {
    echo isset($_SESSION['query-pdf']) ? obtenerConsultas($_SESSION['query-pdf'], 'query5') : '¡¡Error al generar el PDF!!, vuelva a intentar o contacte al administrador...';
} else if (isset($_SESSION['query-pdf']['query6'])) {
    echo isset($_SESSION['query-pdf']) ? obtenerConsultas($_SESSION['query-pdf'], 'query6') : '¡¡Error al generar el PDF!!, vuelva a intentar o contacte al administrador...';
} else {
    echo "¡¡Error!! antes de crear un reporte pase por un filtro";
}
