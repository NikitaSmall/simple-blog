<?php

session_start();

require_once './models/post.php';

if (!isset($_SESSION['user_id'])) {
  header('location: /');
  exit(0);
}

if (empty($_POST)) {
  require_once './template/post_create.php';
  exit(0);
}

$postModel = new PostModel();

$postModel->create($_POST['title'], $_POST['body'], $_SESSION['user_id']);
header('location: /');
