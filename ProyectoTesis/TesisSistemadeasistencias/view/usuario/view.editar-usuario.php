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
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos_docentes3.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="./view.mostrar-usuario.php">
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
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="col-xl-10 offset-xl-1">
        <form action="../../actions/usuario/editar-usuario.php" name="formulario" method="POST">
            <div class="divider d-flex align-items-center my-1">
                    <h2 class="text-center fw-bold mx-3 mb-0">Editar Usuario</h2>                
            </div>
            <?php 
                $idUsuario = $_GET["idUsuario"]; 
                
                $salida1 = "";

                $sql = "SELECT u.idUsuario, u.nombre, u.apellido, u.correo, u.password, tu.descripcion AS tipo_usuario, u.estado 
                    FROM tb_usuario AS u, tb_tipo_usuario AS tu
                    WHERE u.idTipoUsuario = tu.idTipoUsuario AND u.idUsuario = $idUsuario";
                $result = $conexion->query($sql);
                //preguntamos si el registro contiene datos
                if ($result->num_rows > 0) {
                    while ($mostrar = $result->fetch_assoc()) {
                        $salida1 .= '
                        
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label campos" for="form3Example3">Nombres:</label>
                                    <input type="text" name="nombres" id="nombres" value="'.$mostrar['nombre'].'" class="form-control descripcion form-control-lg"
                                    placeholder="Ingrese nombres y apellidos" />                
                                    <input type="text" name="idUsuario" id="idUsuario" hidden value="'.$mostrar['idUsuario'].'" class="form-control descripcion form-control-lg"
                                    placeholder="idUsuario" />                
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label campos" for="form3Example3">Apellidos:</label>
                                    <input type="text" name="apellidos" id="apellidos" value="'.$mostrar['apellido'].'" class="form-control descripcion form-control-lg"
                                    placeholder="Ingrese apellido" />                
                                </div>
                            </div>
                        </div>
                    </div>';

                    $salida1 .= '

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label campos" for="form3Example3">Correo:</label>
                                    <input type="email" name="correo" id="correo" value='.$mostrar['correo'].' class="form-control descripcion form-control-lg"
                                    placeholder="Ingrese correo" />                
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label campos" for="form3Example3">Contraseña:</label>
                                    <input type="text" name="password" id="password" value='.$mostrar['password'].' class="form-control descripcion form-control-lg"
                                    placeholder="Ingrese correo" />                
                                </div>
                            </div>
                        </div>
                    </div>';            
                    
                    //validar dato seleccionado
                    $idTipoUsuario = $mostrar['tipo_usuario'];
                    //....
                    $salida2="";
                    $sql1 = "SELECT * FROM tb_tipo_usuario";
                    $result1 = $conexion->query($sql1);
                    //preguntamos si el registro contiene datos
                    if ($result1->num_rows > 0) {
                        while ($mostrar1 = $result1->fetch_assoc()) {
                            if($idTipoUsuario === $mostrar1['descripcion']){
                                $salida2 .= '<option value=' .$mostrar1['idTipoUsuario']. ' selected>'. $mostrar1['descripcion'] .'</option>';
                            }else{
                                $salida2 .= '<option value=' .$mostrar1['idTipoUsuario']. '>'. $mostrar1['descripcion'] .'</option>';
                            }
                        }
                    }else {
                        echo 'Error al mostrar tipos de usuarios';
                    }

                    $salida1 .= '
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label campos" for="form3Example3">Tipo de Usuario</label>
                                    <select name="id_tipo_usuario" id="id_tipo_usuario" class="form-select descripcion">
                                        <option value="0">Seleccione un tipo de usuario:</option>
                                        ' . $salida2. '
                                    </select>              
                                </div>
                            </div>                            
                        </div>
                    </div>                        
                        ';
                    }
                }else {
                    echo 'Error al mostrar datos del usuario';
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
                <a href='./view.mostrar-usuario.php' class='btn btn-lg btn-danger'>CANCELAR</a>
                <script src="../../js/usuario/validar-usuario.js"></script>
            </div>
        </form>
    </div>

</body>
</html>