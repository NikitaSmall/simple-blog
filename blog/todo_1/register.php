<?php

  session_start();

  require_once './models/user.php';

  if (empty($_POST)) {
    require_once './views/register.php';
    exit();
  }


  $user = new User();
  $user->save($_POST['login'], $_POST['password']);

  header('location: /');
