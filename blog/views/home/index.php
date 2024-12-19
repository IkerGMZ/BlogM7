

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../../styleGeneral.css">
</head>
<body>
    <header>
        <h1>Bienvenido al Blog</h1>
        <nav>
            <ul>
                <li><a href="../user/profile.php">Perfil</a></li>
                <li><a href="../admin/manage_posts.php">Posts</a></li>
                <li><a href="../admin/manage_users.php">Admin_Users</a></li>
                <li><a href="../utils/logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Publicaciones</h2>
        <?php
        // Mostrar publicaciones si existen
        if (isset($posts) && is_array($posts)) {
            foreach ($posts as $post) {
                echo "<article>";
                echo "<h3>" . htmlspecialchars($post['title']) . "</h3>";
                echo "<p>" . htmlspecialchars($post['content']) . "</p>";
                echo "</article>";
            }
        } else {
            echo "<p>No hay publicaciones disponibles.</p>";
        }
        ?>
    </main>

    <footer>
        <p>Blog &copy; 2024</p>
    </footer>
</body>
</html>
