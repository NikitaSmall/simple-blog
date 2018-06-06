<?php

require_once './models/base_model.php';
require_once './models/post.php';

class PostRepo
{

  private static function connection()
  {
    $connObj = new Connection();
    return $connObj->getConnection();
  }

  public static function getAll()
  {
    $res = self::connection()->query('SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date, COUNT(c.id) AS comments_number
                               FROM posts AS p
                               JOIN users AS u ON u.id = p.user_id
                               LEFT JOIN comments AS c ON c.post_id = p.id
                               GROUP BY p.id
                               ORDER BY p.timestamp DESC');
    return $res->fetchAll(PDO::FETCH_CLASS, 'Post');
  }

  public static function create($title, $body, $userId)
  {
    $stmt = $this->conn->prepare('INSERT INTO posts (title, body, user_id) VALUES (?, ?, ?)');
    $stmt->execute([$title, $body, $userId]);
  }

  public static function delete($id)
  {
    $stmt = $this->conn->prepare('DELETE FROM posts WHERE id = ?');
    $stmt->execute([$id]);
  }

  public static function getById($id)
  {
    $stmt = $this->conn->prepare('SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date
                                  FROM posts AS p
                                  JOIN users AS u ON u.id = p.user_id
                                  WHERE p.id = ?');
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function getAllByUserId($userId)
  {
    $stmt = $this->conn->prepare('SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date
                                  FROM posts AS p
                                  JOIN users AS u ON p.user_id = u.id
                                  WHERE p.user_id = ?');
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
