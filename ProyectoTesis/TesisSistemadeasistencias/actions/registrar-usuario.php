<?php
//  var_dump($_POST);

 if ($_POST) {
    //creamos la sesion
    if (!isset($_SESSION)) {
        session_start();
    }

    //variables para registrar
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : $nombre = false;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : $apellido = false;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : $correo = false;
    $password = isset($_POST['password']) ? $_POST['password'] : $password = false;
    $tipoUsuario = "1";
    $estado = "1";

    //Array para almacenar errores
    $errores = array();
    /*
    *  Validamos Campos correcto(vacios) 
    */

    //Validar nombre
    if (!$nombre == "") {
        $nombre_valido = true;
    } else {
        $nombre_valido = false;
        $errores['nombre'] = 'Debes ingresar los nombres';
    }
    //Validar apellidos
    if (!$apellido == "") {
        $apellido_valido = true;
    } else {
        $apellido_valido = false;
        $errores['apellido'] = 'Debes ingresar los apellidos';
    }
    //Validar correo
    if (!$correo == "") {
        $correo_valido = true;
    } else {
        $correo_valido = false;
        $errores['correo'] = 'Debes ingresar un correo';
    }
    //Validar cedula
    if (!$password == "") {
        $password_valido = true;
    } else {
        $password_valido = false;
        $errores['password'] = 'Debes ingresar una contraseña';
    }

    
    /*
    *  Validamos los Errores, caso contrario Damos acceso al Sistema
    */
    //Guardamos las variables de sesion
    if (count($errores) == 0) {
        $_SESSION['errores'] = 'Registro Correcto';
        //***************************************************************************************
        //incluimos la conexion
        include_once '../conexion/conexion.php';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : $nombre = false;
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : $apellido = false;
        $correo = isset($_POST['correo']) ? $_POST['correo'] : $correo = false;
        $password = isset($_POST['password']) ? $_POST['password'] : $password = false;
        $tipoUsuario = "1";
        $estado = "1";
        
        $query = "INSERT INTO tb_usuario(nombre, apellido, correo, password, idTipoUsuario, estado) VALUES('$nombre','$apellido','$correo','$password','$tipoUsuario','$estado')";

        $resultado = mysqli_query($conexion, $query);
        //preguntamos si el registro contiene datos
        if ($resultado) {
            echo "<script>alert('Se Registro Exitosamante');
                                window.location='../view/login.php'</script>";
            // echo "Se Registro Exitosamante";
        } else {
            echo "<script>alert('No se pudo registrar');
            window.location='../view/register.php'</script>";
            // echo "No se pudo registrar";
        }
        //cerramos la conexion
        $conexion->close();
        //***************************************************************************************
    } else {
        //  var_dump($_POST);
        //mostramos los errores
        $_SESSION['errores'] = $errores;
        // echo "Error con errores campos vacios";
        header('Location: ../view/register.php');
    //     echo "<script>alert('Complete el campo descripcion');
    //         window.location='../view/categoria.php'</script>";
    }
}
