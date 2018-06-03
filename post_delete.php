<?php

session_start();

require_once './models/post.php';

if (!isset($_SESSION['user_id'])) {
  header('location: /');
  exit(0);
}

if (!empty($_POST)) {
  $postModel = new PostModel();
  $postModel->delete($_POST['id']);
}

header('location: /');
