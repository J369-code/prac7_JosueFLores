<?php
require_once '../models/Comment.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = new Comment();
    $comment->response = $_POST['response'];
    $comment->post_id = $_POST['post_id'];
    $comment->user_id = $_POST['user_id'];
    $comment->create();

    header('Location: comment_index.php?post_id=' . $comment->post_id);
    exit;
}
?>
