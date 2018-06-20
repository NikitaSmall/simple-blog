<?php

class ProductRepo
{
  public static function getAll()
  {
    $res = self::conn()
      ->query('SELECT p.id, p.title, p.description,
        (SELECT image FROM options WHERE product_id = p.id ORDER BY id ASC LIMIT 1) as image,
        (SELECT id FROM options WHERE product_id = p.id ORDER BY id ASC LIMIT 1) as option_id
FROM products as p');

    return $res->fetchAll(PDO::FETCH_CLASS, 'Product');
  }

  public static function getBaseProductsInfo()
  {
    $res = self::conn()->query('SELECT id, title FROM products');
    return $res->fetchAll(PDO::FETCH_CLASS, 'Product');
  }

  public static function create($title, $desc)
  {
    $stmt = self::conn()->prepare('INSERT INTO products (title, description) VALUES (?, ?)');
    $stmt->execute([$title, $desc]);
  }

  protected static function conn()
  {
    return Conn::instance()->getConnection();
  }
}
