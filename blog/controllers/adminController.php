<?php

// blog/controllers/AdminController.php
require_once 'blog/models/user.php';
require_once 'blog/models/post.php';

class AdminController {
    private $user;
    private $post;

    public function __construct() {
        $this->user = new User();
        $this->post = new Post();
    }

    public function manageUsers() {
        // Obtener todos los usuarios
        $users = $this->user->getAll();
        include 'blog/views/admin/manage_users.php';
    }

    public function managePosts() {
        // Obtener todas las publicaciones
        $posts = $this->post->getAll();
        include 'blog/views/admin/manage_posts.php';
    }
}
?>