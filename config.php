<?php
// Obtén las credenciales de la base de datos desde variables de entorno
$DB_HOST=$_ENV["DB_HOST"];        // Dirección del servidor de base de datos
$DB_USER=$_ENV["DB_USER"];    // Usuario de la base de datos
$DB_PASSWORD=$_ENV["DB_PASSWORD"];// Contraseña de la base de datos
$DB_NAME=$_ENV["DB_NAME"];      // Nombre de la base de datos
$DB_PORT=$_ENV["DB_PORT"];        // Puerto de la base de datos

// Crear la conexión
$db=mysqli_connect("$DB_HOST","$DB_USER","$DB_PASSWORD","$DB_NAME","$DB_PORT");
?>
