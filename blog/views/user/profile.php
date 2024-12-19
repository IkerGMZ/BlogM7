<!-- blog/views/user/profile.php -->
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../user/login.php");
    exit;
}

$username = htmlspecialchars($_SESSION['username']);
$role = htmlspecialchars($_SESSION['role']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styleGeneral.css">
    <title>Perfil de Usuario</title>
</head>
<body>
    <div class="container">
        <h1>Bienvenido, <?php echo $username; ?>!</h1>
        <p>Tu rol es: <strong><?php echo $role; ?></strong></p>
        <li><a href="../home/index.php">Inicio</a></li>
        <li><a href="../admin/manage_posts.php">Posts</a></li>
        <li><a href="../admin/manage_users.php">Admin_Users</a></li>
    </div>
</body>
</html>
