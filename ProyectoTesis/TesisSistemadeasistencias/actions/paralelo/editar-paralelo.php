<?php
//  var_dump($_POST);

 if ($_POST) {
    $idParalelo = $_POST["idParalelo"]; 
    //creamos la sesion
    if (!isset($_SESSION)) {
        session_start();
    }

    //variables para registrar
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : $descripcion = false;
    $estado = "1";

    //Array para almacenar errores
    $errores = array();
    /*
    *  Validamos Campos correcto(vacios) 
    */

    //Validar tipo_persona
    if (!$descripcion == "") {
        $descripcion_valido = true;
    } else {
        $descripcion_valido = false;
        $errores['descripcion'] = 'Debes ingresar una descripcion';
    }
    
    /*
    *  Validamos los Errores, caso contrario Damos acceso al Sistema
    */
    //Guardamos las variables de sesion
    if (count($errores) == 0) {
        $_SESSION['errores'] = 'Registro Correcto';
        //***************************************************************************************
        //incluimos la conexion
        include_once '../../conexion/conexion.php';
        $descripcion = $_POST['descripcion'];
        $estado = "1";
        
        $query = "UPDATE tb_paralelo SET descripcion='$descripcion'
                WHERE idParalelo ='$idParalelo'";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            echo "<script>alert('Registro Actualizado');
                window.location='../../view/paralelo/view.mostrar-paralelo.php'</script>";
            // echo "Registro actualizado";
        } else {
            // echo "Error al Actualizar";
            echo "<script>alert('Error al Actualizar');
                window.location='../../view/paralelo/view.mostrar-paralelo.php'</script>";
        }
        //cerramos la conexion
        $conexion->close();
        //***************************************************************************************
    } else {
        //mostramos los errores
        $_SESSION['errores'] = $errores;
        // echo "Error con errores campos vacios";
        header('Location: ../../view/paralelo/view.mostrar-paralelo.php');
    //     echo "<script>alert('Complete el campo descripcion');
    //         window.location='../view/categoria.php'</script>";
    }
}
