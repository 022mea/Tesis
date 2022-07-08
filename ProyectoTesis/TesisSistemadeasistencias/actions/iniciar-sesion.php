<?php
/*
 *  Validamos el formulario de inicio de sesion
 */
//  var_dump($_POST);

//Validamos llegada de los datos que viajan mediante el metodo POST
if ($_POST) {
    //creamos la sesion
    if (!isset($_SESSION)) {
        session_start();
    }else{
        session_destroy();
    }

    $usuario = isset($_POST['correo']) ? $_POST['correo'] : $usuario = false;
    $password = isset($_POST['password']) ? $_POST['password'] : $password = false;
    //Array para almacenar errores
    $errores = array();
    /*
    *  Validamos Campos correcto(vacios) 
    */
    //Validar usuario
    if (!empty($usuario)) {
        $usuario_valido = true;
    } else {
        $usuario_valido = false;
        $errores['correo'] = 'El Correo esta vacio';
    }

    //Validar contraseña
    if (!empty($password)) {
        $password_valido = true;
    } else {
        $password_valido = false;
        $errores['password'] = 'La Contraseña esta vacía.';
    }

    /*
    *  Validamos los Errores, caso contrario Damos acceso al Sistema
    */
    //Guardamos las variables de sesion
    if (count($errores) == 0) {
        
        //ingresamos al sistema
        $_SESSION['errores'] = 'Campos Correctos';
        //***************************************************************************************
        //VALIDAMOS LAS CREDENCIALES PARA ACCEDER AL SISTEMA
        //importamos la conexion
        include('../conexion/conexion.php');

        $usuario = $_POST['correo'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tb_usuario WHERE correo='$usuario' AND password='$password'";
        $query = mysqli_query($conexion, $sql);

        if ($resultado = mysqli_fetch_array($query)) {
            //ingreso correcto

            $_SESSION['usuario_logeado'] = $errores;
            header("Location: ../view/menu.php");            
        } else {
            // echo 'Usuario o contraseña incorrectos';
            $errores['incorrecto'] = 'Usuario o contraseña incorrectos';
            $_SESSION['errores'] = $errores;
            echo "<script>alert('Usuario o contraseña incorrectos');
            window.location='../view/login.php'</script>";
            // var_dump($_SESSION['errores'], 'incorrecto');
        }
        // Finalmente, destruir la sesión. 
        // session_destroy();
        //***************************************************************************************
    } else {
        //mostramos los errores
        $_SESSION['errores'] = $errores;
        // $_SESSION['incorrecto'] = $errores2;
        header('Location: ../view/login.php');
    }
}
