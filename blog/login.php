<?php

session_start();

require_once './repos/user.php';

if (!empty($_POST)) {
  $user = UserRepo::getUser($_POST['email'], $_POST['password']);

  if (!$user) {
    echo "user doesn't exist!";
  }

  // $_SESSION['user'] = [];
  // $_SESSION['user']['id'] = $user['id'];
  // $_SESSION['user']['email'] = $user['email'];

  $_SESSION['user_id'] = $user->id;
  $_SESSION['user_email'] = $user->email;
  header('location: /');
} else {
    require_once './template/login.php';
}
