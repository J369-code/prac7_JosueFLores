<?php
require_once '../models/Comment.php';
$comment = new Comment();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $comment->id = $_POST['id'];
    $post_id = $_POST['post_id'];
    $comment->delete($comment->id);

    header("Location: ../controllers/comment_index.php?post_id=$post_id");
    exit;

}
