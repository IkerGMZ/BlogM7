<?php
class User {
    private $conn;
    private $table_name = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo usuario
    public function register($username, $password, $role = 'user') {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO " . $this->table_name . " (username, password, role) VALUES (:username, :password, :role)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':role', $role);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al registrar usuario: " . $e->getMessage());
        }
    }

    // Método para verificar las credenciales de un usuario
    public function verifyUser($username, $password) {
        try {
            $query = "SELECT id, username, password, role FROM " . $this->table_name . " WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si se encontró el usuario y si la contraseña es válida
            if ($user && password_verify($password, $user['password'])) {
                return $user; // Devuelve los datos del usuario si las credenciales son válidas
            } else {
                return false; // Credenciales inválidas
            }
        } catch (PDOException $e) {
            throw new Exception("Error al verificar usuario: " . $e->getMessage());
        }
    }
}
?>
