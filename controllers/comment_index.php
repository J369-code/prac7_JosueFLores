<?php
require_once '../models/Comment.php';

$comments = new Comment();
$commentsList = $comments->getByPost($_GET['post_id']);
include '../views/comment_list.php';
?>
