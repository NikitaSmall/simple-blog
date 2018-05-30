<?php

require_once './models/user.php';

if (!empty($_POST)) {
  $userModel = new UserModel();
  $user = $userModel->getUser($_POST['email'], $_POST['password']);

  if (!$user) {
    echo "user doesn't exist!";
  }

  var_dump($user);
}
