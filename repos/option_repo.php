<?php

class OptionRepo
{
  public static function getOptionsForCart($ids)
  {
    $len = count($ids);

    if ($len <= 0) {
      return [];
    }

    $in  = str_repeat('?,', count($ids) - 1) . '?';
    $query = 'SELECT o.id, o.image, o.title, p.title AS product_title, o.price
              FROM products as p
              JOIN options as o ON o.product_id = p.id
              WHERE o.id IN (' . $in .')';

    $stmt = self::conn()->prepare($query);
    $stmt->execute($ids);

    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Option');
  }

  public static function create($product_id, $price, $amount, $title, $desc, $image = '')
  {
    $image = ($image == '') ? Utils::placeholder() : $image;
    $stmt = self::conn()
      ->prepare('INSERT INTO options
                 (product_id, price, amount, title, description, image)
                 VALUES (?, ?, ?, ?, ?, ?)');

    $stmt->execute([$product_id, $price, $amount, $title, $desc, $image]);
  }

  public static function getByProductId($product_id)
  {
    $stmt = self::conn()->prepare('SELECT * FROM options WHERE product_id = ?');
    $stmt->execute([$product_id]);

    return $stmt->fetchAll(FETCH_CLASS, 'Option');
  }

  protected static function conn()
  {
    return Conn::instance()->getConnection();
  }
}
