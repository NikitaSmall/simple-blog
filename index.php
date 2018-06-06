<?php

  session_start();

  require_once './repos/post.php';

  // $postModel = new PostModel();

  $posts = PostRepo::getAll();

  require_once './template/index.php';
