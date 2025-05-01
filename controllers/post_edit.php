<?php
require_once '../models/Post.php';

$postModel = new Post();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postModel->title = $_POST['title'];
    $postModel->content = $_POST['content'];
    $postModel->update($_GET['id']);
    header("Location: post_index.php");
    exit();
}

$post = $postModel->getFirst($_GET['id']);

require_once '../views/post_edit_form.php';
