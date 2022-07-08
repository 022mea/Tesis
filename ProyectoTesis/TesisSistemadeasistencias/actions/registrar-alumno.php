<?php
//  var_dump($_POST);

 if ($_POST) {
    //creamos la sesion
    if (!isset($_SESSION)) {
        session_start();
    }

    //variables para registrar
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : $nombres = false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : $apellidos = false;
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : $cedula = false;
    $edad = isset($_POST['edad']) ? $_POST['edad'] : $edad = false;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : $direccion = false;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : $telefono = false;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : $correo = false;
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
    //Validar cedula
    if (!$cedula == "") {
        $cedula_valido = true;
    } else {
        $cedula_valido = false;
        $errores['cedula'] = 'Debes ingresar una cedula';
    }
    //Validar edad
    if (!$edad == "") {
        $edad_valido = true;
    } else {
        $edad_valido = false;
        $errores['edad'] = 'Debes ingresar una edad';
    }
    //Validar direccion
    if (!$direccion == "") {
        $direccion_valido = true;
    } else {
        $direccion_valido = false;
        $errores['edad'] = 'Debes ingresar una direccion';
    }
    //Validar telefono
    if (!$telefono == "") {
        $telefono_valido = true;
    } else {
        $telefono_valido = false;
        $errores['telefono'] = 'Debes ingresar una telefono';
    }
    //Validar correo
    if (!$correo == "") {
        $correo_valido = true;
    } else {
        $correo_valido = false;
        $errores['correo'] = 'Debes ingresar un correo';
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
        include_once '../conexion/conexion.php';
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : $nombres = false;
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : $apellidos = false;
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : $cedula = false;
        $edad = isset($_POST['edad']) ? $_POST['edad'] : $edad = false;
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : $direccion = false;
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : $telefono = false;
        $correo = isset($_POST['correo']) ? $_POST['correo'] : $correo = false;
        $id_curso = isset($_POST['id_curso']) ? $_POST['id_curso'] : $id_curso = false;
        $id_paralelo = isset($_POST['id_paralelo']) ? $_POST['id_paralelo'] : $id_paralelo = false;
        $estado = "1";

    
        
        $query = "INSERT INTO tb_alumno(nombres, apellidos, cedula, edad, direccion, telefono, correo, idCurso, idParalelo, estado) 
        VALUES('$nombres','$apellidos','$cedula','$edad', '$direccion','$telefono','$correo','$id_curso','$id_paralelo','$estado');";

        
        $resultado = mysqli_query($conexion, $query);
        

        //preguntamos si el registro contiene datos
        if ($resultado) {
            echo "<script>alert('Se Registro Exitosamante');
                                window.location='../view/alumno.php'</script>";
        } else {
            echo "<script>alert('No se pudo registrar');
            window.location='../view/alumno.php'</script>";
        }
        //cerramos la conexion
        $conexion->close();
        //***************************************************************************************
    } else {
        //mostramos los errores
        $_SESSION['errores'] = $errores;
        echo "Errores campos vacios";
        // header('Location: ../view/profesor.php');
    //     echo "<script>alert('Complete el campo descripcion');
    //         window.location='../view/categoria.php'</script>";
    }
}
