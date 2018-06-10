<?php

session_start();

require_once './repos/user.php';

if (empty($_POST)) {
  require_once './template/register.php';
  exit(0);
}

if (UserRepo::getUserByEmail($_POST['email'])) {
  echo 'user exists!';
} else {
  UserRepo::create($_POST['email'], $_POST['password']);
  header('location: /');
}
