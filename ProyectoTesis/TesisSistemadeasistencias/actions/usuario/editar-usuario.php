<?php
date_default_timezone_set("America/Guayaquil");
//  var_dump($_POST);
$idUsuario = $_POST["idUsuario"]; 
 if ($_POST) {
    //creamos la sesion
    if (!isset($_SESSION)) {
        session_start();
    }

   //variables para registrar
   $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : $nombres = false;
   $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : $apellidos = false;
   $correo = isset($_POST['correo']) ? $_POST['correo'] : $correo = false;
   $password = isset($_POST['password']) ? $_POST['password'] : $password = false;
   $id_tipo_usuario = isset($_POST['id_tipo_usuario']) ? $_POST['id_tipo_usuario'] : $id_tipo_usuario = false;
   $estado = "1";

   //Array para almacenar errores
   $errores = array();
   /*
   *  Validamos Campos correcto(vacios) 
   */

   //Validar nombre
   if (!$nombres == "") {
       $nombres_valido = true;
   } else {
       $nombres_valido = false;
       $errores['nombres'] = 'Debes ingresar los nombres';
   }
   //Validar apellidos
   if (!$apellidos == "") {
       $apellidos_valido = true;
   } else {
       $apellidos_valido = false;
       $errores['apellidos'] = 'Debes ingresar los apellidos';
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
       $cedula_valido = false;
       $errores['password'] = 'Debes ingresar una contraseña';
   }
   //Validar id_tipo_usuario
   if (!$id_tipo_usuario == 0) {
       $id_tipo_usuario_valido = true;
   } else {
       $id_tipo_usuario_valido = false;
       $errores['id_tipo_usuario'] = 'Debes seleccionar un tipo de usuario';
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
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : $nombres = false;
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : $apellidos = false;
        $correo = isset($_POST['correo']) ? $_POST['correo'] : $correo = false;
        $password = isset($_POST['password']) ? $_POST['password'] : $password = false;
        $id_tipo_usuario = isset($_POST['id_tipo_usuario']) ? $_POST['id_tipo_usuario'] : $id_tipo_usuario = false;
        $estado = "1";

        $query = "UPDATE tb_usuario SET nombre='$nombres',apellido='$apellidos',correo='$correo',
                password='$password',idTipoUsuario='$id_tipo_usuario' 
                WHERE idUsuario ='$idUsuario'";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            echo "<script>alert('Registro Actualizado');
                window.location='../../view/usuario/view.mostrar-usuario.php'</script>";
            // echo "Registro actualizado";
        } else {
            // echo "Error al Actualizar";
            echo "<script>alert('Error al Actualizar');
                window.location='../../view/usuario/view.mostrar-usuario.php'</script>";
        }

        //***************************************************************************************
    } else {
        //mostramos los errores
        $_SESSION['errores'] = $errores;
        // echo "Error con errores campos vacios";
        header('Location: ../../view/usuario/view.mostrar-usuario.php');
    //     echo "<script>alert('Complete el campo descripcion');
    //         window.location='../view/categoria.php'</script>";
    }
}
