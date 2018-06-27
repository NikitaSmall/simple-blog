<?php

class BaseController
{
  public static $userSessionField = 'user';

  protected static function redirect($url)
  {
    header("location: $url");
  }

  public static function ensureSession($field)
  {
    if (!isset($_SESSION[$field])) {
      $_SESSION[$field] = [];
    }
  }

  protected static function getOptionsFromCart()
  {
    $ids = array_keys($_SESSION['cart']);
    $options = OptionRepo::getOptionsForCart($ids);

    foreach ($options as $option) {
      $option->amount = $_SESSION['cart'][$option->id];
    }

    return $options;
  }
}
