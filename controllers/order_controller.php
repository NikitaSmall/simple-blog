<?php

class OrderController extends BaseController
{
  public static function new()
  {
    require_once './templates/orders/new.php';
  }

  public static function create()
  {
    if (empty($_SESSION[BaseController::$userSessionField])) {
      $email = $_POST['email'];
      $user = UserRepo::RegisterUserAtOrder($email);
    } else {
      $user = $_SESSION[BaseController::$userSessionField];
    }

    $address = $_POST['address'];
    $options = self::getOptionsFromCart();

    $total = 0;
    foreach ($options as $option) {
      $total += $option->price * $option->amount;
    }

    $orderId = OrderRepo::createOrder($user->id, $address, $total);

    foreach ($options as $option) {
      OrderRepo::createLineItem($orderId, $option);
    }

    unset($_SESSION['cart']);
    self::redirect('/orders/complete?order_id=' . $orderId);
  }

  public static function confirmation()
  {
    $orderId = $_GET['order_id'];
    require_once './templates/orders/confirmation.php';
  }
}
