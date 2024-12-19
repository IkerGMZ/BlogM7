<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/user.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        // Crear la conexión a la base de datos
        $db = (new Database())->getConnection();

        // Crear una instancia del modelo User
        $userModel = new User($db);

        // Verificar las credenciales del usuario
        $user = $userModel->verifyUser($username, $password);

        if ($user) {
            // Si las credenciales son correctas, guardar información en la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirigir al perfil del usuario
            header("Location: ../views/user/profile.php");
            exit;
        } else {
            // Si las credenciales son incorrectas, establecer un mensaje de error
            $_SESSION['error'] = "Usuario o contraseña incorrectos.";
            header("Location: ../views/user/login.php");
            exit;
        }
    } catch (Exception $e) {
        // Manejo de errores en el sistema
        $_SESSION['error'] = "Error en el sistema: " . $e->getMessage();
        header("Location: ../views/user/login.php");
        exit;
    }
}
?>
