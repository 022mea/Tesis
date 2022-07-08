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
    <title>Registrar Paralelo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos-paralelos2.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="./view.mostrar-paralelo.php">
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
        <form  name="formulario" id='loginform' method="POST">
            <br>
            <div class="divider d-flex align-items-center my-1">
                <h2 class="text-center fw-bold mx-3 mb-0">Registrar Paralelo</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label campos" for="form3Example3">Descripcion:</label>
                            <input type="text" name="descripcion" id="descripcion" autocomplete="off" class="form-control descripcion form-control-lg"
                            placeholder="Ingrese descripcion" />                
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
                    name='loginBtn' 
                    id='loginBtn'>
                    Guardar
                </button>
                <a href='./view.mostrar-paralelo.php' class='btn btn-lg btn-danger'>CANCELAR</a>
                <script src="../../js/paralelo/validar-paralelo1.js"></script>              
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#loginform').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '../../actions/paralelo/crear-paralelo.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        var jsonData = JSON.parse(response);        
                        // user is logged in successfully in the back-end
                        // let's redirect
                        if (jsonData.success == "1") {
                            alert('¡Paralelo Registrado!');
                           location.href = '../../view/paralelo/view.mostrar-paralelo.php';
                        } else {
                            alert('!Error al Registrar Paralelo!');
                        }
                    }
                });
            });
        });
    </script>    
</body>
</html>