<?php

session_start();

require_once './models/user.php';

if (empty($_POST)) {
  require_once './template/register.php';
  exit(0);
}

$userModel = new UserModel();

if ($userModel->getUserByEmail($_POST['email'])) {
  echo 'user exists!';
} else {
  $userModel->create($_POST['email'], $_POST['password']);
  header('location: /');
}
