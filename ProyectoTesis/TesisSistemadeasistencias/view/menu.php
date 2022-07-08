<?php  
include "../includes/redireccion.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos-menu6.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <!-- Navbar -->
                    <img src="../img/logo.png" alt="logo" width="60px" srcset="" class="img_logo">
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
    <h2>Control de Asistencia</h2>
        <div class="contenedor">
            <div class="subcontenedor">
                <a href="../view/usuario/view.mostrar-usuario.php">
                    <img src="../img/user.png" class="img-menu" alt="" srcset="">
                    <!-- <button class="boton">Profesor</button> -->
                    <button type="submit" class="btn btn-primary btn-lg boton"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Usuarios</button>
                </a>
                <a class="subcontenedor2" href="./login.php">
                    <button type="submit" class="btn btn-danger btn-lg boton"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Salir</button>
                </a>
            </div>
            <div class="subcontenedor">
                <a  href="../view/docente/view.mostrar-docente.php">
                    <img src="../img/profesor.png" class="img-menu" alt="" srcset="">
                    <!-- <button class="boton">Profesor</button> -->
                    <button type="submit" class="btn btn-primary btn-lg boton"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Docentes</button>
                </a>
                <a class="subcontenedor2" href="../view/asistencia/docente/view.registrar-asistencia-docente.php">
                    <button type="submit" class="btn btn-success btn-lg boton"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Asistencia</button>
                </a>
            </div>
            <div class="subcontenedor">
                <a  href="../view/alumno/view.mostrar-alumno.php">
                    <img src="../img/estudiantes.png" class="img-menu" alt="" srcset="">
                    <!-- <button class="boton">Alumnos</button> -->
                    <button type="submit" class="btn btn-primary btn-lg boton"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Alumnos</button>
                </a>
                <a class="subcontenedor2" href="../view/asistencia/alumno/view.select.php">
                    <button type="submit" class="btn btn-success btn-lg boton"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Asistencia</button>
                </a>
            </div>  
            <div class="subcontenedor">
                <a href="../view/curso/view.mostrar-curso.php">
                    <img src="../img/curso.png" class="img-menu" alt="" srcset="">
                    <!-- <button class="boton">Profesor</button> -->
                    <button type="submit" class="btn btn-primary btn-lg boton"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Curso</button>
                </a>
            </div>
            <div class="subcontenedor">
                <a  href="../view/paralelo/view.mostrar-paralelo.php">
                    <img src="../img/paralelo.png" class="img-menu" alt="" srcset="">
                    <!-- <button class="boton">Alumnos</button> -->
                    <button type="submit" class="btn btn-primary btn-lg boton"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Paralelo</button>
                </a>
            </div>           
        </div>
</body>
</html>