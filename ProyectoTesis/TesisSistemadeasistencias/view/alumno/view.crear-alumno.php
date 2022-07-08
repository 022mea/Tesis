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
    <title>Crear Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos-alumnos6.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="./view.mostrar-alumno.php">
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
    <div class="col-xl-10 offset-xl-1">
        <form action="../../actions/alumno/crear-alumno.php" id="formulario" class="formulario" name="formulario" method="POST">
            <div class="divider d-flex align-items-center my-1">
                <h2 class="text-center fw-bold mx-3 mb-0">Registrar Alumno</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Nombres:</label>
                            <input type="text" name="nombres" id="nombres"  class="form-control descripcion form-control-lg"
                            placeholder="Ingrese nombres" />                
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Apellidos:</label>
                            <input type="text" name="apellidos" id="apellidos"  class="form-control descripcion form-control-lg"
                            placeholder="Ingrese apellidos" />                
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Cédula:</label>
                            <input type="text" name="cedula" id="cedula"  class="form-control descripcion form-control-lg"
                            placeholder="Ingrese cedula" />                
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="container">
                <div class="row">                   
                    
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Edad:</label>
                            <input type="number" name="edad" id="edad"  class="form-control descripcion form-control-lg"
                            placeholder="Ingrese Edad" />                
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Dirección:</label>
                            <input type="text" name="direccion" id="direccion"  class="form-control descripcion form-control-lg"
                            placeholder="Ingrese dirección" />                
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono"  class="form-control descripcion form-control-lg"
                            placeholder="Ingrese telefono" />                
                        </div>
                    </div>                  
                    
                </div>
            </div>
            <div class="container">
                <div class="row">
                <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Correo:</label>
                            <input type="text" name="correo" id="correo"  class="form-control descripcion form-control-lg"
                            placeholder="Ingrese correo" />                
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-outline mb-4">
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
                                                <option value=" .$mostrar['idCurso']. ">". $mostrar['descripcion'] ."</option>";
                                        }
                                    }else {
                                        echo 'Errror al mostrar categorias';
                                    }
                                    //presentamos los datos y cerramos la conexion
                                    echo $salida1;
                                    // $conexion->close();
                                ?>
                            </select>              
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
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
                                                <option value=" .$mostrar['idParalelo']. ">". $mostrar['descripcion'] ."</option>";
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
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Jornada</label>
                            <select name="jornada" id="jornada" class="form-select descripcion">
                                <option value="0"  selected>Seleccione una jornada:</option>
                                <option value="matutino">Matutina</option>
                                <option value="vespertino">Vespertina</option>                                
                            </select>             
                        </div>
                    </div>
                </div>
            </div>
              
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
                <a href='./view.mostrar-alumno.php' class='btn btn-lg btn-danger'>CANCELAR</a>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="../../js/alumno/validar-alumno.js"></script>     
        </form>
    </div>

    <br><br><br>
    <br><br><br>
    <br><br><br>

</body>
</html>