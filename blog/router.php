<?php

class Router
{
  public function __construct($route)
  {
    $this->route = $route;
  }

  public function serve()
  {
    switch ($this->route) {
      case '/':
        PostController::index();
        break;
      case '/post':
        PostController::post($_GET);
        break;
      case '/post/create':
        if (empty($_POST)) {
          PostController::createForm();
        } else {
          PostController::create($_POST);
        }
        break;

      case '/post/delete':
        if (!empty($_POST)) {
          PostController::delete($_POST);
        } else {
          header('location: /');
        }
        break;

      default:
        // code...
        break;
    }
  }
}
