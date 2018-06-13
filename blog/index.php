<?php

  session_start();

  require_once './repos/post.php';
  require_once './repos/comment.php';

  require_once './controllers/post.php';

  require_once './router.php';

  $route = (isset($_GET['r'])) ? $_GET['r'] : '/';

  $router = new Router($route);
  $router->serve();
