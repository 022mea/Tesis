<?php
require_once '../../../conexion/conexion.php';
include "../../../includes/redireccion_2.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Docentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../../../css/estilos-asistencia7.css">-->
    
    <link rel="stylesheet" href="../../../css/estilos-nav2.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../../view/asistencia/docente/view.registrar-asistencia-docente.php">
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
                    </ul>
                </div>
            </div>
        </nav>
    </header> 
    <h4>Lista Asistencia Docentes</h4>
    <div class="botones-tabla">
        <form class="crear" target="_blank" action="../../../reportes/reportes-asistencia-docentes.php" method="POST">
            <button class="btn-pdf" type="submit">
                <img class="img-1" src="../../../img/pdf.png" alt="pdf">Reportes en PDF
            </button>
            <input value='<?php  echo $_POST['fecha']?>' hidden name='fechaConsulta' id='fechaConsulta'/>
        </form>
    </div>
    
    <div class="container">
        <table class="table table table-striped table-bordered shadow-lg mt-2" id=tabla-asistencia>
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora ingreso</th>
                    <th scope="col">Estatus</th>                    
                    <th scope="col">Estado</th>                    
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
                    date_default_timezone_set('America/Guayaquil');   
                    $salida = "";
                    $fecha = date('Y-m-d');
                    $sql = "SELECT 	d.idDocente, CONCAT(d.nombres, '' , d.apellidos) AS nombres, d.cedula, a.fecha, a.hora, a.status, a.estado
                    FROM  tb_asistencia_docente AS a, tb_docente AS d
                    WHERE a.idDocente = d.idDocente and a.fecha = '$fecha'
                    GROUP BY d.idDocente;";

                    //amacena consulta para reportes
                    $almacena_query['query1'] = $sql;
                    $_SESSION['query-pdf'] = $almacena_query;

                    $result = $conexion->query($sql);
                    //preguntamos si el registro contiene datos
                    if ($result->num_rows > 0) {
                        $contador=1;
                        while ($mostrar = $result->fetch_assoc()) {
                            $status = $mostrar['status']; 
                            $estado = $mostrar['estado']; 
                            $idDocente = $mostrar['idDocente'];
                            $estado1 = '';
                            if($estado == 1){
                                $estado1 = 'Activo'; 
                            }else if($estado == 0){
                                $estado1 = 'Inactivo';
                            }

                            if($status === 'PRESENTE'){
                                $salida .= "
                                <tr>
                                    <td>
                                        " . $contador. "   
                                    </td>
                                    <th scope='row'>
                                        " . $mostrar['idDocente'] . "
                                        <input value='". $mostrar['idDocente'] . "' hidden name='idDocente' id='idDocente'/> 
                                    </th>
                                    <td>
                                        " . $mostrar['nombres'] . "   
                                    </td>  
                                    <td>
                                        " . $mostrar['cedula'] . "   
                                    </td>           
                                    <td>
                                        " . $mostrar['fecha'] . "  
                                    </td>                                
                                    <td>                                    
                                        " . $mostrar['hora'] . "                                        
                                    </td>  
                                    <td>
                                        <a class='btn btn-success'>Presente</a>                                                  
                                    </td>  
                                    <td>
                                        " . $estado1 ."
                                    </td>                                                                                                                     
                                </tr>";
                            } else {
                                $salida .= "
                                <tr>
                                    <td>
                                        " . $contador. "   
                                    </td>
                                    <th scope='row'>
                                        " . $mostrar['idDocente'] . "
                                        <input value='". $mostrar['idDocente'] . "' hidden name='idDocente' id='idDocente'/> 
                                    </th>
                                    <td>
                                        " . $mostrar['nombres'] . "   
                                    </td>
                                    <td>
                                        " . $mostrar['cedula'] . "   
                                    </td>           
                                    <td>
                                        " . $mostrar['fecha'] . "  
                                    </td>                                
                                    <td>                                    
                                        " . $mostrar['hora'] . "                                        
                                    </td>  
                                    <td>
                                        <a class='btn btn-danger'>Ausente</a>                                                  
                                    </td>  
                                    <td>
                                        " . $estado1 ."
                                    </td>                                                                                                                     
                                </tr>";

                                $contador++;
                            }                            
                        } 
                    }else {
                        echo 'Actualmente no existen docentes registrados';
                    }
                     //presentamos los datos y cerramos la conexion
                    echo $salida;
                    $conexion->close();
                ?>
            </tbody>
        </table>
        <script src="../../../js/asistencia/validar-asistencia.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#tabla-asistencia').DataTable();
    } );
</script>
</html>