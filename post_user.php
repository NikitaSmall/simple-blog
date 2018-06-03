<?php

session_start();

require_once './models/post.php';

$postModel = new PostModel();
$posts = $postModel->getAllByUserId($_GET['user_id']);

require_once './template/posts.php';
