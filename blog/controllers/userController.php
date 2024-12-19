<?php
require_once __DIR__ . '/../models/user.php';

class UserController {
    private $user;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->user = new User($db);
    }

    public function createUser($data) {
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->user->role = $data['role'];
        if ($this->user->create()) {
            echo "Usuario creado correctamente.";
        } else {
            echo "Error al crear el usuario.";
        }
    }

    public function listUsers() {
        $users = $this->user->read();
        include 'views/user/list.php';
    }
}
?>
