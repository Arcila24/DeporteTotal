<?php
// Obtén las credenciales de la base de datos desde variables de entorno
$host =$_env('host');        // Dirección del servidor de base de datos
$username =$_env('username');    // Usuario de la base de datos
$password =$_env('password');// Contraseña de la base de datos
$dbname =$_env('dbname');      // Nombre de la base de datos
$port =$_env('port');        // Puerto de la base de datos

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos.";
?>
