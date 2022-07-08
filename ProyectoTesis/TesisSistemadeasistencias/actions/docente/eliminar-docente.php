<?php

//  incluimos la conexion
include_once '../../conexion/conexion.php';

$idDocente = $_POST['id_docente_eliminar'];
$query = "DELETE FROM tb_docente WHERE idDocente = '$idDocente'";
$resultados = mysqli_query($conexion, $query);

if ($resultados) {
    // header('Location: ../index.php');
    echo "<script>alert('Docente eliminado');
            window.location='../../view/docente/view.mostrar-docente.php'</script>";
} else {
    echo "<script>alert('Error al eliminar');
            window.location='../../view/docente/view.mostrar-docente.php'</script>";
}

?>