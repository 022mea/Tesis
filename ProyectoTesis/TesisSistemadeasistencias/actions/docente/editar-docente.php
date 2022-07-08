<?php
date_default_timezone_set("America/Guayaquil");
//  var_dump($_POST);
$idDocente = $_POST["idDocente"]; 
 if ($_POST) {
    //creamos la sesion
    if (!isset($_SESSION)) {
        session_start();
    }

    //variables para registrar
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : $nombres = false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : $apellidos = false;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : $correo = false;
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : $cedula = false;
    $id_curso = isset($_POST['id_curso']) ? $_POST['id_curso'] : $id_curso = false;
    $id_paralelo = isset($_POST['id_paralelo']) ? $_POST['id_paralelo'] : $id_paralelo = false;
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
    if (!$cedula == "") {
        $cedula_valido = true;
    } else {
        $cedula_valido = false;
        $errores['cedula'] = 'Debes ingresar una cedula';
    }
    //Validar id_curso
    if (!$id_curso == 0) {
        $id_curso_valido = true;
    } else {
        $id_curso_valido = false;
        $errores['id_curso'] = 'Debes seleccionar un curso';
    }
    //Validar id_paralelo
    if (!$id_paralelo == 0) {
        $id_paralelo_valido = true;
    } else {
        $id_paralelo_valido = false;
        $errores['id_paralelo'] = 'Debes seleccionar un paralelo';
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
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : $cedula = false;
        $id_curso = isset($_POST['id_curso']) ? $_POST['id_curso'] : $id_curso = false;
        $id_paralelo = isset($_POST['id_paralelo']) ? $_POST['id_paralelo'] : $id_paralelo = false;
        $estado = "1";

        $query = "UPDATE tb_docente SET nombres='$nombres',apellidos='$apellidos',correo='$correo',
                cedula='$cedula',idCurso='$id_curso',idParalelo='$id_paralelo' 
                WHERE idDocente ='$idDocente'";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            echo "<script>alert('Registro Actualizado');
                window.location='../../view/docente/view.mostrar-docente.php'</script>";
            // echo "Registro actualizado";
        } else {
            // echo "Error al Actualizar";
            echo "<script>alert('Error al Actualizar');
                window.location='../../view/docente/view.mostrar-docente.php'</script>";
        }

        //***************************************************************************************
    } else {
        //mostramos los errores
        $_SESSION['errores'] = $errores;
        // echo "Error con errores campos vacios";
        header('Location: ../../view/docente/view.mostrar-docente.php');
    //     echo "<script>alert('Complete el campo descripcion');
    //         window.location='../view/categoria.php'</script>";
    }
}
