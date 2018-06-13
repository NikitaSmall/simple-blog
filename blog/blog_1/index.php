<?php
  session_start();
  require_once './models/post.php';

  $posts = getPosts();

  require_once './templates/main.php';
