<?php
date_default_timezone_set("America/Guayaquil");
if(isset($_POST)){
    //creamos la sesion
    if (!isset($_SESSION)) {
        session_start();
    }
    //incluimos la conexion
    include_once '../../../conexion/conexion.php';
    //obtenemos datos
    $idAlumno= isset($_POST['idAlumno']) ? $_POST['idAlumno'] : $idDocente = false;
    
    // $hora = isset($_POST['hora']) ? $_POST['hora'] : $hora = false;
    date_default_timezone_set('America/Guayaquil');  
    $fecha = date('Y-m-d');
    $hora = date('h:i:s', time()); 
    $status = 'PRESENTE';
    $estado = "1";
    // echo "ID: " . $idAlumno . "<br>";
    // echo "Fecha: " . $fecha . "<br>";
    // echo "Hora: " . $hora . "<br>";

    $query = "UPDATE tb_asistencia_alumno set hora = '$hora',fecha = '$fecha', status ='$status' WHERE idAlumno = '$idAlumno' and fecha = '$fecha'";

    $resultado = mysqli_query($conexion, $query);
    //preguntamos si el registro contiene datos
    if ($resultado) {
        echo "<script>alert('Asistencia Registrada');
        window.location='../../../view/asistencia/alumno/view.registrar-asistencia-alumno.php'</script>";
    } else {
        echo "<script>alert('No se pudo Registrar Asistencia');
        window.location='../../../view/asistencia/alumno/view.registrar-asistencia-alumno.php'</script>";
    }
    //cerramos la conexion
    $conexion->close();
}

?>