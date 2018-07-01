<?php

class Flash
{
  public static function add($message)
  {
    $_SESSION['flash'][] = $message;
  }

  public static function get()
  {
    $messages = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $messages;
  }
}
