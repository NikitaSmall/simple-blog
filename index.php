<?php

session_start();

require_once './models/todo.php';

$todoModel = new Todo();

if (!empty($_POST)) {
  $todoModel->save($_POST['text']);
}

require_once './views/index.php';
