<?php

if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['usuario_logeado'])){
    // header("Location: ../index.php");
    header("Location: ../../../view/login.php");
}

?>