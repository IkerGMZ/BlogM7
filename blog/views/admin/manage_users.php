<?php
// Incluir la base de datos y la clase User
require_once '../../config/database.php';
require_once '../../models/user.php';

// Crear una instancia de la clase Database
$database = new Database();
$dbConnection = $database->getConnection(); // Obtener la conexión a la base de datos

// Crear una instancia de la clase User y pasarle la conexión
$user = new User($dbConnection);

// Aquí puedes continuar con el resto del código para manejar los usuarios
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <link rel="stylesheet" href="../../styleGeneral.css">
</head>
<body>
    <header>Gestión de Usuarios</header>
    <nav>
        <ul>
            <li><a href="../home/index.php">Inicio</a></li>
            <li><a href="../user/profile.php">Perfil</a></li>
            <li><a href="../admin/manage_users.php">Gestionar Publicaciones</a></li>
            <li><a href="../utils/logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <div class="container">
        <!-- Aquí puedes agregar el contenido para gestionar usuarios -->
        <div class="card">
            <h2>Gestionar Usuarios</h2>
            <!-- Aquí puedes agregar el formulario o listado de usuarios -->
        </div>
    </div>
</body>
</html>
