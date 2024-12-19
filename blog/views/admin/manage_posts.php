<?php
// Incluir la base de datos y la clase Post
require_once '../../config/database.php';
require_once '../../models/post.php';

// Crear una instancia de la clase Database
$database = new Database();
$dbConnection = $database->getConnection(); // Obtener la conexión a la base de datos

// Crear una instancia de la clase Post y pasarle la conexión
$post = new Post($dbConnection);

// Aquí puedes continuar con el resto del código para manejar las publicaciones
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Publicaciones</title>
    <link rel="stylesheet" href="../../styleGeneral.css">
</head>
<body>
    <header>Gestión de Publicaciones</header>
    <nav>
        <ul>
        <li><a href="../home/index.php">Inicio</a></li>
        <li><a href="../user/profile.php">Perfil</a></li>
        <li><a href="../admin/manage_users.php">Admin_Users</a></li>
        <li><a href="../utils/logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <div class="container">
        <!-- Aquí puedes agregar el contenido para gestionar publicaciones -->
        <div class="card">
            <h2>Gestionar Publicaciones</h2>
            <!-- Aquí puedes agregar el formulario o listado de publicaciones -->
        </div>
    </div>
</body>
</html>
