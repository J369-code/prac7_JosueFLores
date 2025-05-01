<?php
require_once '../models/Post.php';
//Se usa al usario de prueba con el id=1
$user_id = 1;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $post = new Post();
    $post->user_id = $user_id;
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->create();
    header("Location: post_index.php");
    exit();
}

require_once '../views/post_create_form.php';
