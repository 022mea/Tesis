<?php
//  var_dump($_POST);

 if ($_POST) {
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
        $query = "INSERT INTO tb_curso(descripcion, estado) VALUES('$descripcion','$estado')";

        $resultado = mysqli_query($conexion, $query);
        //preguntamos si el registro contiene datos
        if ($resultado) {
            echo json_encode(array('success' => 1));
            // echo "<script>alert('¡Curso Registrado!');
            // window.location='../../view/curso/view.mostrar-curso.php'</script>";
        } else {
            echo json_encode(array('success' => 0));
            // echo "<script>alert('No se pudo registrar');
            // window.location='../../view/curso/view.crear-curso.php'</script>";
        }
        //cerramos la conexion
        $conexion->close();
        //***************************************************************************************
    } else {
        //mostramos los errores
        $_SESSION['errores'] = $errores;
        // echo "Error con errores campos vacios";
        header('Location: ../../view/curso/view.crear-curso.php');
    //     echo "<script>alert('Complete el campo descripcion');
    //         window.location='../view/categoria.php'</script>";
    }
}
