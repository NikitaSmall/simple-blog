<?php

session_start();

if (!empty($_POST)) {
  unset($_SESSION['user_id']);
  unset($_SESSION['user_email']);
}

header('location: /');
