<?php
require_once '../../conexion/conexion.php';
include "../../includes/redireccion_2.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos-cursos3.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="./view.mostrar-curso.php">
                    <!-- Navbar -->
                    <img src="../../img/logo.png" alt="logo" width="60px" srcset="" class="img_logo">
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
    <!-- <h2>Panel de Profesor</h2> -->
    <div class="col-xl-10 offset-xl-1">
        <form action="../../actions/curso/editar-curso.php" name="formulario" method="POST">
            <div class="divider d-flex align-items-center my-1">
                <h2 class="text-center fw-bold mx-3 mb-0">Editar Curso</h2>
            </div>

            <?php 
                $idCurso = $_GET["idCurso"]; 
                
                $salida1 = "";

                $sql = "SELECT idCurso, descripcion, estado
                    FROM tb_curso
                    WHERE idCurso = $idCurso";
                $result = $conexion->query($sql);
                //preguntamos si el registro contiene datos
                if ($result->num_rows > 0) {
                    while ($mostrar = $result->fetch_assoc()) {
                        $salida1 .= '
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label campos" for="form3Example3">Descripcion:</label>
                                            <input type="text" name="descripcion" value="'.$mostrar['descripcion'].'" id="descripcion" autocomplete="off" class="form-control descripcion form-control-lg"
                                            placeholder="Ingrese descripcion" />                                                  
                                            <input type="text" name="idCurso" id="idCurso" hidden value="'.$mostrar['idCurso'].'" class="form-control descripcion form-control-lg"
                                            placeholder="idCurso" />        
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                        ';
                    }
                    } else {
                        echo 'Error al mostrar datos del docente';
                    }
                    //presentamos los datos y cerramos la conexion
                    echo $salida1;
                    // $conexion->close();
            ?>       
           
              
            <div class="form-outline mb-4">
            </div>
            
            <div class="text-center text-lg-start mt-4 pt-2">
                <button 
                    type="submit" 
                    class="btn btn-primary btn-lg" 
                    style="padding-left: 2.5rem; padding-right: 2.5rem;"
                    id="miBoton">
                    Guardar
                </button>
                <a href='./view.mostrar-curso.php' class='btn btn-lg btn-danger'>CANCELAR</a>
                <script src="../../js/curso/validar-curso.js"></script>
        </form>
    </div>
</body>
</html>