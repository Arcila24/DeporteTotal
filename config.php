<?php
// Obtén las credenciales de la base de datos desde variables de entorno
$host = getenv('DB_HOST');        // Dirección del servidor de base de datos
$username = getenv('DB_USER');    // Usuario de la base de datos
$password = getenv('DB_PASSWORD');// Contraseña de la base de datos
$dbname = getenv('DB_NAME');      // Nombre de la base de datos
$port = getenv('DB_PORT');        // Puerto de la base de datos

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos.";
?>
