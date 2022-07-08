<?php

if(isset($_POST)){
    //creamos la sesion
    if (!isset($_SESSION)) {
        session_start();
    }
    //incluimos la conexion
    include_once '../../../conexion/conexion.php';
    //obtenemos datos
    $idDocente = isset($_POST['idDocente']) ? $_POST['idDocente'] : $idDocente = false;
    $fecha = date('Y-m-d');
    // $hora = isset($_POST['hora']) ? $_POST['hora'] : $hora = false;
    date_default_timezone_set('America/Toronto');  
    $hora = date('h:i:s', time()); 
    $estado = "1";
    // echo "ID: " . $idDocente . "<br>";
    // echo "Fecha: " . $fecha . "<br>";
    // echo "Hora: " . $DateAndTime2 . "<br>";

    $query = "INSERT INTO tb_asistencia_docente(idDocente, fecha, hora, estado) VALUES('$idDocente','$fecha','$hora','$estado')";

    $resultado = mysqli_query($conexion, $query);
    //preguntamos si el registro contiene datos
    if ($resultado) {
        echo "<script>alert('Asistencia Registrada');
        window.location='../../../view/asistencia/docente/view.registrar-asistencia-docente.php'</script>";
    } else {
        echo "<script>alert('No se pudo Registrar Asistencia');
        window.location='../../../view/asistencia/docente/view.registrar-asistencia-docente.php'</script>";
    }
    //cerramos la conexion
    $conexion->close();
}

?>