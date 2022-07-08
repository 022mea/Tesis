<?php
//incluimos la conexion
include_once '../../conexion/conexion.php';

$idAlumno = $_POST['id_alumno_eliminar'];

$query = "DELETE FROM tb_alumno WHERE idAlumno = '$idAlumno'";
$resultados = mysqli_query($conexion, $query);

if ($resultados) {
    // header('Location: ../index.php');
    echo "<script>alert('Alumno eliminado');
            window.location='../../view/alumno/view.mostrar-alumno.php'</script>";
} else {
    echo "<script>alert('Error al eliminar');
            window.location='../../view/alumno/view.mostrar-alumno.php'</script>";
}

?>