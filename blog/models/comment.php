<?php
class Comment {
    private $conn;
    private $table = 'comments';

    public $id;
    public $post_id;
    public $user_id;
    public $content;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un comentario
    public function create() {
        $query = "INSERT INTO " . $this->table . " (post_id, user_id, content) VALUES (:post_id, :user_id, :content)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':content', $this->content);

        return $stmt->execute();
    }

    // Leer todos los comentarios de una publicación
    public function readByPost() {
        $query = "SELECT * FROM " . $this->table . " WHERE post_id = :post_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->execute();
        return $stmt;
    }
}
?>
