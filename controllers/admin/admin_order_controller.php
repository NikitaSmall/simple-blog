<?php

class AdminOrderController extends BaseController
{
  public static function getOrders()
  {
    $orders = OrderRepo::getAll();
    require_once './templates/admin/orders/index.php';
  }

  public static function orderDetails()
  {
    $orderId = $_GET['order_id'];

    $order = OrderRepo::getById($orderId);
    $lineItems = OrderRepo::getByOrderId($orderId);

    require_once './templates/admin/orders/details.php';
  }
}
