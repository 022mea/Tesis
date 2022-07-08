<?php
require_once '../../../conexion/conexion.php';
include "../../../includes/redireccion_2.php";
 //creamos la sesion
 if (!isset($_SESSION)) {
    session_start();
  }
  
  if(isset($_SESSION['curso_paralelo'])){
    // session_destroy();
    unset($_SESSION['curso_paralelo']);
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../css/estilos-alumnos6.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../menu.php">
                    <!-- Navbar -->
                    <img src="../../../img/logo.png" alt="logo" width="40px" srcset="" class="img_logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <p class="texto">UNIDAD EDUCATIVA "ROSA OLGA VILLACRES LOZANO"</p>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="../view/login.php">
                                <img src="../img/cerrar-sesion.png" width="40px" alt="" srcset="">
                            </a>                            
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>  
    <div class="col-xl-10 offset-xl-1">
        <!-- <form action="./view.select.php" id="formulario-curso" class="formulario-curso" name="formulario-curso" method="POST"> -->
        <form action="./view.asistencia-curso-paralelo.php" id="formulario-curso" class="formulario-curso" name="formulario" method="POST">
            <div class="divider d-flex align-items-center my-1">
                <h2 class="text-center fw-bold mx-3 mb-0 mt-3">Generar Asistencia de Alumnos</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-outline mb-2">
                            <label class="form-label campos" for="form3Example3">Curso</label>
                            <select name="id_curso" id="id_curso" class="form-select descripcion">
                                <option value="0"  selected>Seleccione un curso:</option>
                                <?php
                                    $salida1 = "";
                                    $sql = "SELECT * FROM tb_curso";
                                    $result = $conexion->query($sql);
                                    //preguntamos si el registro contiene datos
                                    if ($result->num_rows > 0) {
                                        while ($mostrar = $result->fetch_assoc()) {
                                            $salida1 .= "
                                                <option value='" .$mostrar['descripcion']. "'>". $mostrar['descripcion'] ."</option>";
                                        }
                                    }else {
                                        echo 'Error al mostrar categorias';
                                    }
                                    //presentamos los datos y cerramos la conexion
                                    echo $salida1;
                                    // $conexion->close();
                                ?>
                            </select>              
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-2">
                            <label class="form-label campos" for="form3Example3">Paralelo</label>
                            <select name="id_paralelo" id="id_paralelo" class="form-select descripcion">
                                <option value="0"  selected>Seleccione un paralelo:</option>
                                <?php
                                    $salida1 = "";
                                    $sql = "SELECT * FROM tb_paralelo";
                                    $result = $conexion->query($sql);
                                    //preguntamos si el registro contiene datos
                                    if ($result->num_rows > 0) {
                                        while ($mostrar = $result->fetch_assoc()) {
                                            $salida1 .= "
                                                <option value=" .$mostrar['descripcion']. ">". $mostrar['descripcion'] ."</option>";
                                        }
                                    }else {
                                        echo 'Errror al mostrar paralelos';
                                    }
                                    //presentamos los datos y cerramos la conexion
                                    echo $salida1;
                                    // $conexion->close();
                                ?>
                            </select>             
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-2">
                            <label class="form-label campos" for="form3Example3">Jornada</label>
                            <select name="jornada" id="jornada" class="form-select descripcion">
                                <option value="0">Seleccione una jornada:</option>
                                <option value="matutino">matutino</option>
                                <option value="vespertino">vespertino</option>                                
                            </select>             
                        </div>
                    </div>
                </div>
            </div>              
            <!-- <div class="form-outline mb-4">
            </div>
             -->
            <div class="text-center text-lg-start mt-4 pt-2">
                <button 
                    type="submit" 
                    class="btn btn-primary btn-lg" 
                    style="padding-left: 2.5rem; padding-right: 2.5rem;"
                    id="miBoton">
                    SIGUIENTE
                </button>
                <a href='../../menu.php' class='btn btn-lg btn-danger'>CANCELAR</a>
                <a href='./view.registrar-asistencia-alumno.php' class='btn btn-lg btn-success'>TODOS LOS ALUMNOS</a>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../../../js/seleccion-curso-paralelo5.js"></script>
            </div>     
        </form>
        <hr>
        <form action="./view.lista-asistencia-alumnos-fecha.php" id="formulario-curso" class="formulario-curso" name="formulario" method="POST">
        <!-- <form action="" id="formulario-curso" class="formulario-curso" name="formulario" method="POST"> -->
            <div class="divider d-flex align-items-center my-1">
                <h4 class="text-center fw-bold mx-3 mb-0">Historial de Registro de Asistencias</h4>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label campos" for="form3Example3">Seleccione fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control fecha"/>                
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
                <button 
                    type="submit" 
                    class="btn btn-primary btn-lg" 
                    style="padding-left: 2.5rem; padding-right: 2.5rem;"
                    id="miBotonFecha">
                    SIGUIENTE
                </button>
                <script src="../../../js/seleccion-fecha1.js"></script>
            </div>
        </form>
    </div>
</body>
<!-- <script src="./recargar.js"></script> -->
</html>