<?php
class Database {
    private $host = "localhost";  // Cambia estos valores según tu configuración
    private $db_name = "blog";    // Nombre de la base de datos
    private $username = "root";   // Usuario de la base de datos
    private $password = "";       // Contraseña de la base de datos
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
