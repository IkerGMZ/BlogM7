<?php
require_once 'models/post.php';

class PostController {
    private $post;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->post = new Post($db);
    }

    public function createPost($data) {
        $this->post->user_id = $data['user_id'];
        $this->post->title = $data['title'];
        $this->post->content = $data['content'];
        if ($this->post->create()) {
            echo "Publicación creada correctamente.";
        } else {
            echo "Error al crear la publicación.";
        }
    }

    public function listPosts() {
        $posts = $this->post->read();
        include 'views/post/list.php';
    }
}
?>
