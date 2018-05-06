<?php

  require_once './models/post.php';

  if(empty($_POST)) {
    require_once './templates/form.php';
    exit();
  }

  $newPost = [
    'title' => $_POST['title'],
    'meta' => $_POST['meta'],
    'text' => $_POST['text']
  ];

  addNewPost($newPost);

  header('location: /');
