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
    <title>Paralelos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos-paralelos2.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../view/menu.php">
                    <!-- Navbar -->
                    <img src="../../img/logo.png" alt="logo" width="40px" srcset="" class="img_logo">
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
    <a href="./view.crear-paralelo.php" class="btn btn-primary mb-1 crear">REGISTRAR PARALELO</a>
    <div class="btn crear2">
        <form class="reporte" target="_blank" action="../../reportes/reportes-paralelos-pdf.php" method="POST">
            <button class="btn-pdf mb-1 btn btn-danger" type="submit">
                <img class="img-1" src="../../img/pdf.png" alt="pdf">Reportes en PDF
            </button>
        </form>
    </div>

    <h4>Listado de paralelos registrados</h4>
    <div class="container">
        <table class="table table table-striped table-bordered shadow-lg mt-4" id="tabla-asistencia">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">ID</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>   <!-- LUEGO CAMBIAR COLOR -->
                <?php
                    //creamos la sesion
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    //Array para almacenar la consulta
                    $almacena_query = array();

                    $salida = "";
                    $sql = "SELECT idParalelo, descripcion, estado 
                    FROM tb_paralelo
                    ";

                    //amacena consulta para reportes
                    $almacena_query['query1'] = $sql;
                    $_SESSION['query-pdf'] = $almacena_query;
 
                    $result = $conexion->query($sql);
                    //preguntamos si el registro contiene datos
                    if ($result->num_rows > 0) {
                        $contador = 1;
                        while ($mostrar = $result->fetch_assoc()) {
                            $estado = $mostrar['estado']; 
                            $idParalelo = $mostrar['idParalelo'];
                            $estado1 = '';
                            if($estado == 1){
                                $estado1 = 'Activo'; 
                            }else if($estado == 0){
                                $estado1 = 'Inactivo';
                            }
                            $salida .= "
                            <tr>
                                <th scope='row'>
                                    " . $contador . " 
                                </th>
                                <th scope='row'>
                                    " . $mostrar['idParalelo'] . " 
                                </th>
                                <td>
                                    " . $mostrar['descripcion'] . "  
                                </td>                                
                                <td>
                                    " . $estado1 . "
                                </td>
                                <td>
                                    <form action='../../actions/paralelo/eliminar-paralelo.php' method='POST'>
                                        <a href='./view.editar-paralelo.php?idParalelo=$idParalelo' class='btn btn-info'>Editar</a>
                                        <input type='hidden' value='$idParalelo' id='id_paralelo_eliminar' name='id_paralelo_eliminar' />
                                        <button type='submit' class='btn btn-danger'>Eliminar</button>
                                    </form>
                                </td>                                                                                                                      
                            </tr>";
                            $contador++;
                        } 
                    }else {
                        echo 'Actualmente no existen paralelos registrados';
                    }
                     //presentamos los datos y cerramos la conexion
                    echo $salida;
                    $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#tabla-asistencia').DataTable();
    } );
</script>
</html>