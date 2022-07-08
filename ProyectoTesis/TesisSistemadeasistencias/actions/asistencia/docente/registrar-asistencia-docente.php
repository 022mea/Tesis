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
    $idAsistenciaDocente = isset($_POST['idAsistenciaDocente']) ? $_POST['idAsistenciaDocente'] : $idAsistenciaDocente = false;
    // $hora = isset($_POST['hora']) ? $_POST['hora'] : $hora = false;
    date_default_timezone_set('America/Guayaquil');
    $fecha = date('Y-m-d');  
    $hora = date('h:i:s', time()); 
    $status = 'PRESENTE';
    $estado = "1";
    // echo "ID: " . $idDocente . "<br>";
    // echo "Fecha: " . $fecha . "<br>";
    // echo "Hora: " . $DateAndTime2 . "<br>";

    
    $query = "UPDATE tb_asistencia_docente set hora = '$hora',fecha ='$fecha', status ='$status' WHERE idAsistenciaDocente = '$idAsistenciaDocente' ";


    $resultado = mysqli_query($conexion, $query);

    //preguntamos si el registro contiene datos
    if ($resultado) {
        echo "<script>alert('Asistencia Registrada ');
        window.location='../../../view/asistencia/docente/view.registrar-asistencia-docente.php'</script>";

        // echo "<script>window.location='../../../view/asistencia/docente/view.registrar-asistencia-docente.php'</script>";

    } else {
        echo "<script>alert('No se pudo Registrar Asistencia');
        window.location='../../../view/asistencia/docente/view.registrar-asistencia-docente.php'</script>";
    }
    //cerramos la conexion
    $conexion->close();
}

?>