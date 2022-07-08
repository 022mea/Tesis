<?php 

 //creamos la sesion
 if (!isset($_SESSION)) {
  session_start();
}else{
  session_start();
}

if(!isset($_SESSION['curso_paralelo'])){
  session_destroy();
}else{
  session_destroy();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos-login.css">
</head>
<body>
  <div class="login">
    <section class="vh-80 container-padre">
      <div class="container h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-4 container-img">
            <img src="../img/clases.png" class="img-login">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-5 offset-xl-1 container-datos">
            <form action="../actions/iniciar-sesion.php" method="post">
              <div class="divider d-flex align-items-center my-4">
                <h2 class="text-center fw-bold mx-3 mb-0">Login</h2>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="correo" name="correo" class="form-control form-control-lg"
                  placeholder="ejemplo@ejemplo.com" />
                <label class="form-label campos" for="form3Example3">Correo</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" id="password" name="password" class="form-control form-control-lg"
                  placeholder="Ingresa contraseña" />
                <label class="form-label campos" for="form3Example4">Contraseña</label>
              </div>

              <!-- <div class="d-flex justify-content-between align-items-center">
                <a href="#!" class="text-body">¿Olvidastes tu contraseña?</a>
              </div> -->

              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;">INICIAR SESION</button>
                <!-- <p class="small fw-bold mt-2 pt-1 mb-0">¿Ya tienes una cuenta?<a href="./register.php"
                    class="link-danger">¡REGISTRATE!</a></p> -->
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-2 px-2 px-xl-5 bg-primary container-copy">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
          Copyright © 2020. Todos los derechos reservados. <br> UNIDAD EDUCATIVA "ROSA OLGA VILLACRES LOZANO"
        </div>
      </div>
    </section>
  </div>
</body>
</html>