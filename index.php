<?php

  session_start();

  require_once './models/post.php';

  $postModel = new PostModel();

  $posts = $postModel->getAll();

  require_once './template/index.php';
