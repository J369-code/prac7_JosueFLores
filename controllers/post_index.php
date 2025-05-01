<?php
require_once '../models/Post.php';

$postModel = new Post();
$posts = $postModel->getAll();

require_once '../views/post_list.php';
