<?php
require_once 'config.php'; // Conexión a la base de datos

// Inicializamos las variables
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenemos los datos del formulario
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error_message = "Por favor, llene todos los campos.";
    } else {
        // Preparamos la consulta SQL para evitar inyecciones
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email); // Vinculamos el parámetro
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verificamos la contraseña
            if (password_verify($password, $row['password'])) {
                session_start();
                // Almacenamos el ID y el email del usuario en la sesión
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];

                // Redirigimos a la página de productos
                header('Location: producto.html');
                exit;
            } else {
                $error_message = "Contraseña incorrecta.";
            }
        } else {
            $error_message = "El email no está registrado.";
        }
        $stmt->close(); // Cerramos la consulta preparada
    }
}

$conn->close(); // Cerramos la conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="shortcut icon" href="./producto/icono.jpg" type="image/x-icon">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h1>Inicio de sesión</h1>
    <form action="iniciar_sesion.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <!-- Mostramos el mensaje de error si existe -->
    <div id="error-message" style="color: red;"><?php echo htmlspecialchars($error_message); ?></div>
    <button><a href="registro.php" class="button">Registrarse</a></button>
</div>
</body>
</html>
