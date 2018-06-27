<?php

class OrderRepo
{
  public static function createOrder($userId, $address, $total)
  {
    $stmt = self::conn()
      ->prepare('INSERT INTO orders (user_id, address, total)
                 VALUES (?, ?, ?)');

    $stmt->execute([$userId, $address, $total]);
    return self::conn()->lastInsertId();
  }

  public static function createLineItem($orderId, $option)
  {
    $stmt = self::conn()
      ->prepare('INSERT INTO line_items (order_id, option_id, amount, price)
                 VALUES (?, ?, ?, ?)');

    $stmt->execute([$orderId, $option->id, $option->amount, $option->price]);
  }

  public static function getAll()
  {
    $res = self::conn()
      ->query('SELECT o.id, u.username, o.status, o.total
               FROM orders AS o
               JOIN users AS u ON u.id = o.user_id');

    return $res->fetchAll(PDO::FETCH_CLASS, 'Order');
  }

  public static function getById($id)
  {
    $stmt = self::conn()
      ->prepare('SELECT o.id, u.username, o.status, o.total, o.address
                 FROM orders AS o
                 JOIN users AS u ON u.id = o.user_id
                 WHERE o.id = ?');

    $stmt->execute([$id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
    return $stmt->fetch();
  }

  public static function getByOrderId($orderId)
  {
    $stmt = self::conn()
      ->prepare('SELECT p.title as product_title, op.title as option_title,
                  li.amount, li.price
                 FROM line_items as li
                 JOIN options as op ON li.option_id = op.id
                 JOIN products as p ON op.product_id = p.id
                 WHERE li.order_id = ?');
    $stmt->execute([$orderId]);

    return $stmt->fetchAll(PDO::FETCH_CLASS, 'LineItem');
  }

  protected static function conn()
  {
    return Conn::instance()->getConnection();
  }
}
