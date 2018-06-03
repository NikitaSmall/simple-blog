<?php

require_once './models/base_model.php';

class PostModel extends BaseModel
{
  public function getAll()
  {
    $res = $this->conn->query('SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date
                               FROM posts AS p
                               JOIN users AS u ON u.id = p.user_id');
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($title, $body, $userId)
  {
    $stmt = $this->conn->prepare('INSERT INTO posts (title, body, user_id) VALUES (?, ?, ?)');
    $stmt->execute([$title, $body, $userId]);
  }

  public function delete($id)
  {
    $stmt = $this->conn->prepare('DELETE FROM posts WHERE id = ?');
    $stmt->execute([$id]);
  }

  public function getById($id)
  {
    $stmt = $this->conn->prepare('SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date
                                  FROM posts AS p
                                  JOIN users AS u ON u.id = p.user_id
                                  WHERE p.id = ?');
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getAllByUserId($userId)
  {
    $stmt = $this->conn->prepare('SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date
                                  FROM posts AS p
                                  JOIN users AS u ON p.user_id = u.id
                                  WHERE p.user_id = ?');
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
