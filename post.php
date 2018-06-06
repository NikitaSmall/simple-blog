<?php

session_start();

require_once './models/post.php';
require_once './models/comment.php';

$postModel = new PostModel();
$post = $postModel->getById($_GET['id']);

$commentModel = new CommentModel();
$comments = $commentModel->getByPostId($_GET['id']);

require_once './template/post.php';
