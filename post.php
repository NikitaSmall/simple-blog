<?php

session_start();

require_once './models/post.php';

$postModel = new PostModel();
$post = $postModel->getById($_GET['id']);

require_once './template/post.php';
