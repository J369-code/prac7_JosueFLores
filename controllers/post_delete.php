<?php
require_once '../models/Post.php';


if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $postModel = new Post();
    $postModel->id = $_POST['id'];
    $postModel->delete($postModel->id);
    
    header('Location: post_index.php');
    exit;
    
} else if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $postModel = new Post();
    $postData = $postModel->getFirst($_GET['id']);
    if(!$postData) {
        echo "Post con ID {$_GET['id']} no encontrado.";
        exit;
    }else{
        include '../views/post_delete_form.php';
        exit;
    }
}