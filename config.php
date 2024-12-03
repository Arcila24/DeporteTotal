<?php
// Obtener las credenciales desde las variables de entorno de Railway
$DB_HOST = getenv('DB_HOST');        // Dirección del servidor de base de datos
$DB_USER = getenv('DB_USER');    // Usuario de la base de datos
$DB_PASSWORD = getenv('DB_PASSWORD');// Contraseña de la base de datos
$DB_NAME = getenv('DB_NAME');      // Nombre de la base de datos
$DB_PORT = getenv('DB_PORT');        // Puerto de la base de datos

// Verificar si las variables de entorno están disponibles
if (!$DB_HOST || !$DB_USER || !$DB_PASSWORD || !$DB_NAME || !$DB_PORT) {
    die("Faltan variables de entorno para la conexión a la base de datos.");
}

// Asegurarse de que el puerto sea un número entero
$DB_PORT = (int)$DB_PORT;

// Crear la conexión
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME, $DB_PORT);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos.";
?>
