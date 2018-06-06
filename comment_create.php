<?php

  require_once './models/comment.php';

  session_start();

  if (!isset($_SESSION['user_id'])) {
    header('location: /');
    exit(0);
  }

  if (!empty($_POST)) {
    $commentModel = new CommentModel();
    $commentModel->create($_POST['body'], $_POST['post_id'], $_SESSION['user_id']);

    header('location: /post.php?id=' . $_POST['post_id']);
  }
