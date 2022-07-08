<?php
require_once '../../../conexion/conexion.php';
include "../../../includes/redireccion_2.php";
header('Content-Type: text/html; charset=ISO-8859-1');
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
    <link rel="stylesheet" href="../../../css/estilos-asistencia7.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../../view/menu.php">
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
    <h4>Registrar Asistencia | Listado de docentes</h4>
    <a href="./view.lista-asistencia-docente.php" class="btn btn-primary mb-3 crear">LISTA DE ASISTENTES</a>
    <div class="container">
        
        <table class="table table table-striped table-bordered shadow-lg mt-2" id="tabla-asistencia">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">N&deg;</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">C&eacute;dula</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>                    
                </tr>
            </thead>
            <tbody>   
                <!-- LUEGO CAMBIAR COLOR -->
                <?php  
                    //Variables 
                    $registroDiario = 0;
                    $fecha = date('Y-m-d');
                    // $fecha = "2022-02-24";
                    $sqlComprobacion = "SELECT fecha FROM tb_asistencia_docente WHERE fecha = '$fecha'";
                    $resultado = mysqli_query($conexion, $sqlComprobacion);
                    //preguntamos si el registro contiene datos
                    if ($resultado->num_rows > 0) {
                        $registroDiario = 1;
                        // echo "Hola true: " . $registroDiario . "<br>";
                        // echo $fecha;
                       
                    } else {
                        // echo "Hola false: " . $registroDiario . "<br>";
                        // echo $fecha;
                    }

                    /* 
                    * validamos si el sistama entra por 1era vez al dia, 
                    * se registra asistencia a todos en null, caso contrario no entra en la condicion 
                    * y continua para luego hacer un update de los campos hora y status de la tabla asistencia 
                    */
                    if($registroDiario == 0){
                        $sqlDocente = "SELECT * FROM tb_docente;";
                        $idDocenteRegistro = 0;
                        $fecha = date('Y-m-d');
                        $estado = "1";
                        $result1 = $conexion->query($sqlDocente);
                        //preguntamos si el registro contiene datos
                        if ($result1->num_rows > 0) {
                            while ($mostrar1 = $result1->fetch_assoc()) {
                                $idDocenteRegistro = $mostrar1['idDocente'];
                                $sqlInsertAsistencia = "INSERT INTO tb_asistencia_docente(idDocente, fecha, hora, status, estado) VALUES('$idDocenteRegistro','$fecha',NULL,NULL,'$estado')";
                                $resultado = mysqli_query($conexion, $sqlInsertAsistencia);
                                //preguntamos si el registro contiene datos
                                if ($resultado) {
                                    //CORRECTO
                                    // echo "<script>alert('Asistencia Registrada Aux');
                                    // window.location='./view.registrar-asistencia-docente.php'</script>";
                                } else {
                                    //ERROR
                                    // echo "<script>alert('No se pudo Registrar Asistencia Aux');
                                    // window.location='./view.registrar-asistencia-docente.php'</script>";
                                }
                            }                            
                        }
                    }                  

                    $salida = "";
                    $sql = "SELECT a.idAsistenciaDocente,d.idDocente, CONCAT(d.nombres, ' ', d.apellidos) AS nombres, d.cedula, d.estado, a.status
                    FROM tb_docente AS d, tb_curso AS c, tb_paralelo AS p, tb_asistencia_docente AS a
                    WHERE d.idCurso = c.idCurso AND d.idParalelo = p.idParalelo AND d.idDocente = a.idDocente 
                    GROUP BY a.idDocente
                    ORDER BY d.idDocente;
                    ";
                    $result = $conexion->query($sql);
                    //preguntamos si el registro contiene datos
                    if ($result->num_rows > 0) {
                        $contador = 1;
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
                                //continue
                            } else {
                                //hora
                                date_default_timezone_set('America/Guayaquil');    
                                $HoraActual = date('h:i:s', time()); 

                                $salida .= "
                               <tr>
                                    <td>
                                        " . $contador . "  
                                    </td>  
                                    <th scope='row'>
                                        " . $mostrar['idDocente'] . "
                                        <input value='". $mostrar['idDocente'] . "' hidden name='idDocente' id='idDocente'/> 
                                    </th>
                                    <td>
                                        " . $mostrar['nombres'] . "   
                                        <input value='". $mostrar['nombres'] . "' hidden name='nombres' id='nombres'/> 
                                    </td>          
                                    <td>
                                        " . $mostrar['cedula'] . "  
                                    </td>                                
                                    <td>
                                        " . date('Y-m-d') . "
                                    </td>
                                    <td>
                                        <form action='../../../actions/asistencia/docente/registrar-asistencia-docente.php' method='POST'>
                                        <input value='". $mostrar['idAsistenciaDocente'] . "' hidden name='idAsistenciaDocente' id='idAsistenciaDocente'/> 
                                  
                                        <input value='". $mostrar['idDocente'] . "' hidden name='idDocente' id='idDocente'/>
                                            <button type='submit' class='btn btn-success' id='miBoton'>GRABAR ASISTENCIA</button>
                                        </form>
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
</body>
<script>
    $(document).ready(function() {
        $('#tabla-asistencia').DataTable();
    } );
</script>
</html>