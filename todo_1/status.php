<?php

session_start();

require_once './models/todo.php';

if (isset($_POST)) {
  $todoModel = new Todo();
  $todoModel->changeStatus($_POST['index']);
}

header('location: /');
