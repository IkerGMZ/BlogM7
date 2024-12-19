<?php
class Post {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // Método para crear una publicación
    public function createPost($title, $content) {
        $query = "INSERT INTO posts (title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    // Otros métodos relacionados con las publicaciones (por ejemplo, leer, editar, borrar publicaciones) se pueden agregar aquí.
}
?>
