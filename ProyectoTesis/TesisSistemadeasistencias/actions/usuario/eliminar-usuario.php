<?php

//  incluimos la conexion
include_once '../../conexion/conexion.php';

$idUsuario = $_POST['id_usuario_eliminar'];
$query = "DELETE FROM tb_usuario WHERE idUsuario = '$idUsuario'";
$resultados = mysqli_query($conexion, $query);

if ($resultados) {
    // header('Location: ../index.php');
    echo "<script>alert('Usuario eliminado');
            window.location='../../view/usuario/view.mostrar-usuario.php'</script>";
} else {
    echo "<script>alert('Error al eliminar');
            window.location='../../view/usuario/view.mostrar-usuario.php'</script>";
}

?>