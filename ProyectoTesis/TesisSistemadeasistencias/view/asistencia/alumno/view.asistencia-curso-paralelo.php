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
    <title>Lista Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../css/estilos-asistencia7.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="./view.select.php">
                    <!-- Navbar -->
                    <img src="../../../img/logo.png" alt="logo" width="60px" srcset="" class="img_logo">
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
    <br>   
    <h4>
        Registrar Asistencia | Listado de Alumnos 
        <?php
            //creamos la sesion
            if (!isset($_SESSION)) {
                session_start();
            }
  
            //Array para almacenar la consulta
            $curso_paralelo = array();

            if (isset($_SESSION['curso_paralelo'])) {
                // echo "aca <br>";
                // echo "Nada  hacer..... <br>";

                function obtenerConsultas($errores, $campo) {
                    $alerta = "";
                    if (isset($errores[$campo]) && !empty($campo)) {
                        $alerta =  $errores[$campo];
                        // echo "Pasa if $alerta  :c<br>";
                    }else{
                        // echo "Error por aqui <br>";
                    }
                    return $alerta;
                }

                // echo "Alerta: "  . obtenerConsultas($_SESSION['curso_paralelo'], 'curso') . "<br>";

                if (isset($_SESSION['curso_paralelo']['curso'])) {
                    $idCurso = isset($_SESSION['curso_paralelo']) ? obtenerConsultas($_SESSION['curso_paralelo'], 'curso') : '¡¡Error al obtener idCurso!!';
                    // echo "idCurso: " . $idCurso . "<br>";
                }
                if (isset($_SESSION['curso_paralelo']['paralelo'])) {
                    $idParalelo = isset($_SESSION['curso_paralelo']) ? obtenerConsultas($_SESSION['curso_paralelo'], 'paralelo') : '¡¡Error al obtener idParalelo!!';
                    // echo "idParalelo: " . $idParalelo . "<br>";
                }
                if (isset($_SESSION['curso_paralelo']['jornada'])) {
                    $jornada = isset($_SESSION['curso_paralelo']) ? obtenerConsultas($_SESSION['curso_paralelo'], 'jornada') : '¡¡Error al obtener la jornada!!';
                    // echo "idParalelo: " . $idParalelo . "<br>";
                }

                // $idCurso = isset($_POST['id_curso']) ? $_POST['id_curso'] : $idCurso = false;
                // $idParalelo = isset($_POST['id_paralelo']) ? $_POST['id_paralelo'] : $idParalelo = false;
            }else{
                // echo "aki <br>";
                $idCurso = isset($_POST['id_curso']) ? $_POST['id_curso'] : $idCurso = false;
                $idParalelo = isset($_POST['id_paralelo']) ? $_POST['id_paralelo'] : $idParalelo = false;
                $jornada = isset($_POST['jornada']) ? $_POST['jornada'] : $jornada = false;
            }            
            
            // //amacena el curso y el paralelo en la Sesion
            $curso_paralelo['curso'] = $idCurso;
            $curso_paralelo['paralelo'] = $idParalelo;
            $curso_paralelo['jornada'] = $jornada;
            $_SESSION['curso_paralelo'] = $curso_paralelo;

            // var_dump($curso_paralelo);
            
             $paralelo = "";

             if($idParalelo == "A"){
                $paralelo = "A";
             }else if($idParalelo == "B"){
                $paralelo = "B";
             }else if($idParalelo == "C"){
                $paralelo = "C";
             }

             echo " $idCurso $paralelo jornada $jornada";
        ?>
    
    </h4>
   
    <!-- Aqui hacer los cambios necesarios para que funcione -->
    <form class="btn btn-primary mb-3 crear"  action="./view.lista-asistencia-alumno-filtro.php" method="POST">
       <?php

        // require_once './funciones.php';
        function obtenerId($errores, $campo) {
            $alerta = "";
            if (isset($errores[$campo]) && !empty($campo)) {
                $alerta =  $errores[$campo];
                // echo "Pasa if $alerta  :c<br>";
            }else{
                // echo "Error por aqui <br>";
            }
            return $alerta;
        }

       ?>
        <!-- <input value='<?php //echo $_POST['id_curso']; ?>' hidden name='idCursoEnviar' id='idCursoEnviar'/> -->
        <input value='<?php echo $idCurso = isset($_SESSION['curso_paralelo']) ? obtenerId($_SESSION['curso_paralelo'], 'curso') : $_POST['id_curso']; ?>' hidden name='idCursoEnviar' id='idCursoEnviar'/>

        <!-- <input value='<?php //echo $_POST['id_paralelo'] ?>' hidden name='idParaleloEnviar' id='idParaleloEnviar'/> -->
        <input value='<?php echo  $idParalelo = isset($_SESSION['curso_paralelo']) ? obtenerId($_SESSION['curso_paralelo'], 'paralelo') : $_POST['id_paralelo']; ?>' hidden name='idParaleloEnviar' id='idParaleloEnviar'/>
        <input value='<?php echo  $jornada = isset($_SESSION['curso_paralelo']) ? obtenerId($_SESSION['curso_paralelo'], 'jornada') : $_POST['jornada']; ?>' hidden name='jornadaEnviar' id='jornadaEnviar'/>
        <button class="btn btn-primary" type="submit">
            LISTA DE ASISTENTES
        </button>        
    </form>

    <!-- <a href="./view.lista-asistencia-alumno-filtro.php" class="btn btn-primary mb-3 crear">LISTA DE ASISTENTES</a> -->
    <div class="container">        
        <table class="table table table-striped table-bordered shadow-lg mt-2">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">N&deg;</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">C&eacute;dula</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>                    
                </tr>
            </thead>
            <tbody>   
                <?php  
                    //Variables 
                    $registroDiario = 0;
                    $fecha = date('Y-m-d');
                    // $fecha = "2022-02-24";
                    $sqlComprobacion = "SELECT fecha FROM tb_asistencia_alumno WHERE fecha = '$fecha'";
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
                        $sqlAlumno = "SELECT * FROM tb_alumno;";
                        $idDocenteRegistro = 0;
                        $fecha = date('Y-m-d');
                        $estado = "1";
                        $result1 = $conexion->query($sqlAlumno);
                        //preguntamos si el registro contiene datos
                        if ($result1->num_rows > 0) {
                            while ($mostrar1 = $result1->fetch_assoc()) {
                                $idAlumnoRegistro = $mostrar1['idAlumno'];
                                $sqlInsertAsistencia = "INSERT INTO tb_asistencia_alumno(idAlumno, fecha, hora, status, estado) VALUES('$idAlumnoRegistro','$fecha',NULL,NULL,'$estado')";
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
                    
                    if($_POST){
                        $idCurso = isset($_POST['id_curso']) ? $_POST['id_curso'] : $idDocente = false;
                        $idParalelo = isset($_POST['id_paralelo']) ? $_POST['id_paralelo'] : $idDocente = false;
                        $jornada = isset($_POST['jornada']) ? $_POST['jornada'] : $jornada = false;
                        // echo $idCurso . "<br>";
                        // echo $idParalelo . "<br>";
                    }else{
                        // $idCurso = 2;
                        // $idParalelo = 2;


                        // if (isset($_SESSION['curso_paralelo']['curso'])) {
                        //     $idCurso = isset($_SESSION['curso_paralelo']) ? obtenerConsultas2($_SESSION['curso_paralelo'], 'curso') : '¡¡Error al obtener idCurso!!';
                        //     // echo "idCurso: " . $idCurso . "<br>";
                        // }
                        // if (isset($_SESSION['curso_paralelo']['paralelo'])) {
                        //     $idParalelo = isset($_SESSION['curso_paralelo']) ? obtenerConsultas2($_SESSION['curso_paralelo'], 'paralelo') : '¡¡Error al obtener idParalelo!!';
                        //     // echo "idParalelo: " . $idParalelo . "<br>";
                        // }

                        // //amacena el curso y el paralelo en la Sesion
                        // $curso_paralelo['curso'] = $idCurso;
                        // $curso_paralelo['paralelo'] = $idParalelo;
                        // $_SESSION['curso_paralelo'] = $curso_paralelo;

                        if (isset($_SESSION['curso_paralelo'])) {
                            // echo "Si existen los id <br>";
                            function obtenerConsultas2($errores, $campo) {
                                $alerta = "";
                                if (isset($errores[$campo]) && !empty($campo)) {
                                    $alerta =  $errores[$campo];
                                    // echo "Pasa if $alerta  :c<br>";
                                }else{
                                    // echo "Error por aqui <br>";
                                }
                                return $alerta;
                            }

                            // echo "Alerta: "  . obtenerConsultas2($_SESSION['curso_paralelo'], 'curso') . "<br>";
    
                            if (isset($_SESSION['curso_paralelo']['curso'])) {
                                $idCurso = isset($_SESSION['curso_paralelo']) ? obtenerConsultas2($_SESSION['curso_paralelo'], 'curso') : '¡¡Error al obtener idCurso!!';
                                // echo "idCurso: " . $idCurso . "<br>";
                            }
                            if (isset($_SESSION['curso_paralelo']['paralelo'])) {
                                $idParalelo = isset($_SESSION['curso_paralelo']) ? obtenerConsultas2($_SESSION['curso_paralelo'], 'paralelo') : '¡¡Error al obtener idParalelo!!';
                                // echo "idParalelo: " . $idParalelo . "<br>";
                            }
                            if (isset($_SESSION['curso_paralelo']['jornada'])) {
                                $jornada = isset($_SESSION['curso_paralelo']) ? obtenerConsultas2($_SESSION['curso_paralelo'], 'jornada') : '¡¡Error al obtener jornada!!';
                                // echo "idParalelo: " . $idParalelo . "<br>";
                            }

                        } else{
                            echo "¡¡Error no llegaron los benditos los id!!, vuelva a intentar o contacte con el administrador";
                            // echo "<script>window.location='./view.asistencia-curso-paralelo.php'</script>";
                        }
                    }                   

                    $salida = "";
                    $sql = "SELECT al.idAlumno, CONCAT(al.nombres, ' ', al.apellidos) AS nombres, al.cedula, al.estado, a.status
                    FROM tb_alumno AS al, tb_curso AS c, tb_paralelo AS p, tb_asistencia_alumno AS a
                    WHERE al.idCurso = c.idCurso AND al.idParalelo = p.idParalelo AND al.idAlumno = a.idAlumno 
                    AND a.fecha = '$fecha' AND c.descripcion = '$idCurso' AND p.descripcion = '$idParalelo' AND al.jornada = '$jornada'
                    GROUP BY a.idAlumno
                    ORDER BY al.idAlumno;
                    ";
                    $result = $conexion->query($sql);
                    //preguntamos si el registro contiene datos
                    if ($result->num_rows > 0) {
                        while ($mostrar = $result->fetch_assoc()) {
                            $status = $mostrar['status']; 
                            $estado = $mostrar['estado']; 
                            $idAlumno = $mostrar['idAlumno'];
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
                                date_default_timezone_set('America/Toronto');    
                                $HoraActual = date('h:i:s', time()); 

                                $salida .= "
                                <tr>
                                    <th scope='row'>
                                        " . $mostrar['idAlumno'] . "
                                        <input value='". $mostrar['idAlumno'] . "' hidden name='idAlumno' id='idAlumno'/> 
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
                                        <form action='../../../actions/asistencia/alumno/registrar-asistencia-alumno.php' method='POST'>
                                            <input value='". $mostrar['idAlumno'] . "' hidden name='idAlumno' id='idAlumno'/>
                                            <button type='submit' class='btn btn-success'>GRABAR ASISTENCIA</button>
                                        </form>
                                    </td>                                                                                                                     
                                </tr>";
                            }                            
                        } 
                    }else {
                        echo 'Actualmente no existen alumnos pertenecientes a ese curso y paralelo ';
                    }
                     //presentamos los datos y cerramos la conexion
                    echo $salida;
                    $conexion->close();
      
                ?>
            </tbody>
        </table>
</body>
</html>