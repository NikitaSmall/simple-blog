<?php

  session_start();

  require_once './models/post.php';

  if (!isset($_SESSION['user'])) {
    header('location: /login.php');
    exit();
  }

  if(!empty($_POST)) {
    deletePost($_POST['id']);
  }

  header('location: /');
