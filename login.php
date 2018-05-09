<?php

session_start();

require_once './models/user.php';

if (empty($_POST)) {
  require_once './templates/login.php';
  exit();
}

if (checkUser($_POST['login'], $_POST['password'])) {
  $_SESSION['user'] = 'admin';
  header('location: /');
} else {
  header('location: /login.php');
}
