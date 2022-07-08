<?php
 //incluimos la conexion
 include_once '../../conexion/conexion.php';

$idCurso = $_POST['id_curso_eliminar'];
$query = "DELETE FROM tb_curso WHERE idCurso = '$idCurso'";
$resultados = mysqli_query($conexion, $query);

if ($resultados) {
    // header('Location: ../index.php');
    echo "<script>alert('Curso eliminado');
            window.location='../../view/curso/view.mostrar-curso.php'</script>";
} else {
    echo "<script>alert('Error al eliminar');
            window.location='../../view/curso/view.mostrar-curso.php'</script>";
}


?>