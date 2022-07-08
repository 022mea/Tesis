<?php
require_once '../../conexion/conexion.php';
include "../../includes/redireccion_2.php";
header('Content-Type: text/html; charset=ISO-8859-1');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos-alumnos6.css">

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
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <a href="./view.crear-alumno.php" class="btn btn-primary mb-3 crear">REGISTRAR ALUMNO</a>
    <div class="btn crear2">
        <form class="reporte" target="_blank" action="../../reportes/reportes-alumnos-pdf.php" method="POST">
            <button class="btn-pdf mb-1 btn btn-danger" type="submit">
                <img class="img-1" src="../../img/pdf.png" alt="pdf">Reportes en PDF
            </button>
        </form>
    </div>

    <h4>Listado de alumnos registrados</h4>
    <div class="container">
        <table class="table table table-striped table-bordered shadow-lg mt-4" id="tabla-asistencia">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">N&deg;</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">C&eacute;dula</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Direcci&oacute;n</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Paralelo</th>
                    <th scope="col">Jornada</th>
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
                    $sql = "SELECT a.idAlumno, a.nombres, a.apellidos, a.cedula, a.edad, a.direccion, a.correo,  c.descripcion AS curso, p.descripcion as paralelo, a.jornada, a.estado 
                    FROM tb_alumno AS a, tb_curso AS c, tb_paralelo AS p
                     WHERE a.idCurso = c.idCurso AND a.idParalelo = p.idParalelo ORDER BY a.idAlumno;";
                    $result = $conexion->query($sql);

                     //amacena consulta para reportes
                     $almacena_query['query1'] = $sql;
                     $_SESSION['query-pdf'] = $almacena_query;

                    //preguntamos si el registro contiene datos
                    if ($result->num_rows > 0) {
                        while ($mostrar = $result->fetch_assoc()) {
                            $estado = $mostrar['estado']; 
                            $idAlumno = $mostrar['idAlumno'];
                            $estado1 = '';
                            if($estado == 1){
                                $estado1 = 'Activo'; 
                            }else if($estado == 0){
                                $estado1 = 'Inactivo';
                            }
                            $salida .= "
                            <tr>
                                <th scope='row'>
                                    " . $mostrar['idAlumno'] . " 
                                </th>
                                <td>
                                    " . $mostrar['nombres'] . "  
                                </td>
                                <td>
                                    " . $mostrar['apellidos'] . "  
                                </td>
                                <td>
                                    " . $mostrar['cedula'] . "  
                                </td>
                                <td>
                                    " . $mostrar['edad'] . "  
                                </td>
                                <td>
                                    " . $mostrar['direccion'] . "  
                                </td>
                                <td>
                                    " . $mostrar['correo'] . "  
                                </td>
                                <td>
                                    " . $mostrar['curso'] . "  
                                </td>
                                <td>
                                    " . $mostrar['paralelo'] . "  
                                </td>
                                <td>
                                    " . $mostrar['jornada'] . "  
                                </td>
                                <td>
                                    " . $estado1 . "
                                </td>
                                <td>
                                    <form action='../../actions/alumno/eliminar-alumno.php' method='POST'>
                                        <a href='./view.editar-alumno.php?idAlumno=$idAlumno' class='btn btn-info'>Editar</a>
                                        <input type='hidden' value='$idAlumno' id='id_alumno_eliminar' name='id_alumno_eliminar' />
                                        <button type='submit' class='btn btn-danger'>Eliminar</button>
                                    </form>
                                </td>                                                                                                                      
                            </tr>";
                        } 
                    }else {
                        echo 'Actualmente no existen alumnos registrados';
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