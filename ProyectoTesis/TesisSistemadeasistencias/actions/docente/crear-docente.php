<?php
//  var_dump($_POST);
date_default_timezone_set("America/Guayaquil");
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
        
        $query = "INSERT INTO tb_docente(nombres, apellidos, correo, cedula, idCurso, idParalelo, estado) VALUES('$nombres','$apellidos','$correo','$cedula','$id_curso','$id_paralelo','$estado')";

        $fecha = date('Y-m-d');
        $resultado = mysqli_query($conexion, $query);
        $id_registro = mysqli_insert_id($conexion);

        

        $query_2 = "INSERT INTO tb_asistencia_docente ( idDocente,fecha, estado) VALUES ( '$id_registro','$fecha', '1')";
        $resultado = mysqli_query($conexion, $query_2);

        //preguntamos si el registro contiene datos
        if ($resultado) {
            echo "<script>alert('Se Registro Exitosamante');
                                window.location='../../view/docente/view.mostrar-docente.php'</script>";
        } else {
            echo "<script>alert('No se pudo registrar');
            window.location='../../view/docente/view.crear-docente.php'</script>";
        }
        //cerramos la conexion
        $conexion->close();
        //***************************************************************************************
    } else {
        //mostramos los errores
        $_SESSION['errores'] = $errores;
        // echo "Error con errores campos vacios";
        header('Location: ../../view/docente/view.crear-docente.php');
    //     echo "<script>alert('Complete el campo descripcion');
    //         window.location='../view/categoria.php'</script>";
    }
}
