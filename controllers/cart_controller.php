<?php

class CartController extends BaseController
{
  public static function index()
  {
    $options = self::getOptionsFromCart();
    require_once './templates/cart.php';
  }

  public static function add()
  {
    $optionId = $_POST['id'];

    if (!isset($_SESSION['cart'][$optionId])) {
      $_SESSION['cart'][$optionId] = 0;
    }

    $_SESSION['cart'][$optionId] += 1;

    echo json_encode([
      'id' => $optionId,
      'amount' => $_SESSION['cart'][$optionId]
    ]);
  }

  public static function substract()
  {
    $optionId = $_POST['id'];

    if (!isset($_SESSION['cart'][$optionId])) {
      self::redirect('/cart');
      return;
    }

    $_SESSION['cart'][$optionId] -= 1;

    if ($_SESSION['cart'][$optionId] == 0) {
      unset($_SESSION['cart'][$optionId]);
    }

    echo json_encode([
      'id' => $optionId,
      'amount' => $_SESSION['cart'][$optionId]
    ]);
  }

  public static function destroy()
  {
    unset($_SESSION['cart']);
    self::redirect('/cart');
  }
}
