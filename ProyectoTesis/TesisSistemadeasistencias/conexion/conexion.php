<?php
// definir el nombre del host
$hostname = 'localhost';
// definir el nombre de la base de datos
$database = 'bd_tesis';
// definir el nombre del ususario de la base de datos
$username = 'root';
// definir la clave de la base de datos
$password = '';
// instancio mi objeto de conexion
$conexion = new mysqli($hostname, $username, $password, $database);
//defino una condicion en el caso el servidor no este disponible
if ($conexion->connect_errno) {
    die("fallo al conectar la base de datos: (" . $conectar->mysqli_connect_errno() . ")" . $conectar->mysqli_connect_errno());
} else {
    // echo "Hola por si acaso";
}
//inicar sesion
if (!isset($_SESSION)) {
    session_start();
}
