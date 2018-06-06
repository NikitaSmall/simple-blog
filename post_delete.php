<?php

session_start();

require_once './models/post.php';

if (!isset($_SESSION['user_id'])) {
  header('location: /');
  exit(0);
}

if (!empty($_POST)) {
  $postModel = new PostModel();

  $post = $postModel->getById($_POST['id']);
  if ($post && $post['user_id'] == $_SESSION['user_id']) {
    $postModel->delete($_POST['id']);
  }
}

header('location: /');
