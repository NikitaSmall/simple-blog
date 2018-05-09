<?php

  session_start();
  require_once './models/post.php';

  // if (isset($_GET['id'])) {
  //   $postNumber = $_GET['id'];
  // } else {
  //   $postNumber = 0; // header('location: /'); exit();
  // }

  $postNumber = (isset($_GET['id'])) ? $_GET['id'] : 0;

  $post = getPost($postNumber);

  require_once './templates/post.php';
