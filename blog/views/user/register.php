<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/user.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role = 'user'; // Rol predeterminado

    try {
        // Conectar a la base de datos
        $db = (new Database())->getConnection();
        $userModel = new User($db);

        // Registrar el usuario
        if ($userModel->register($username, $password, $role)) {
            $_SESSION['success'] = "Usuario registrado correctamente. Ahora puedes iniciar sesión.";
            header("Location: login.php");
            exit;
        } else {
            $_SESSION['error'] = "No se pudo registrar el usuario. Inténtalo de nuevo.";
        }
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }
}

// Mostrar la vista de registro
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Registro</title>
</head>
<body>
    <div class="register-container">
        <h1>Registro</h1>

        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrar</button>
        </form>

        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
