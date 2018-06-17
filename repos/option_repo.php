<?php

class OptionRepo
{
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
