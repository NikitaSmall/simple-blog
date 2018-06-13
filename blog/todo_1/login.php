<?php

session_start();

require_once './models/user.php';

if (empty($_POST)) {
  require_once './views/login.php';
  exit();
}

$user = new User();

if ($user->login($_POST['login'], $_POST['password'])) {
  $_SESSION['user'] = $_POST['login'];
}

header('location: /');
