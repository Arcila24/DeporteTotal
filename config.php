<?php
// Obtén las credenciales de la base de datos desde variables de entorno
$host = getenv('host');        // Dirección del servidor de base de datos
$username = getenv('username');    // Usuario de la base de datos
$password = getenv('password');// Contraseña de la base de datos
$dbname = getenv('Dbname');      // Nombre de la base de datos
$port = getenv('port');        // Puerto de la base de datos

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos.";
?>
