<?php
// blog/index.php

require_once 'config/database.php';
require_once 'controllers/homeController.php';
require_once 'controllers/userController.php';

// Obtener la página solicitada
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Router básico
switch ($page) {
    case 'home':
        $homeController = new HomeController();
        $homeController->index();
        break;

    case 'profile':
        $userController = new UserController();
        $userController->profile();
        break;

    default:
        echo "Página no encontrada.";
        break;
}
?>
