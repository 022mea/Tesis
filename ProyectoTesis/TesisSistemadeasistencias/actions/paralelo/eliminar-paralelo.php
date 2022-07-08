<?php
 //incluimos la conexion
 include_once '../../conexion/conexion.php';

$idParalelo = $_POST['id_paralelo_eliminar'];
$query = "DELETE FROM tb_paralelo WHERE idParalelo = '$idParalelo'";
$resultados = mysqli_query($conexion, $query);

if ($resultados) {
    // header('Location: ../index.php');
    echo "<script>alert('Paralelo eliminado');
            window.location='../../view/paralelo/view.mostrar-paralelo.php'</script>";
} else {
    echo "<script>alert('Error al eliminar');
            window.location='../../view/paralelo/view.mostrar-paralelo.php'</script>";
}


?>