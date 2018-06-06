<?php

require_once './models/base_model.php';

class CommentModel extends BaseModel
{
  public function getByPostId($postId)
  {
    $stmt = $this->conn->prepare('SELECT c.id, c.body, c.timestamp, u.email
                                  FROM comments AS c
                                  JOIN users AS u ON c.user_id = u.id
                                  WHERE c.post_id = ?
                                  ORDER BY c.timestamp ASC');
    $stmt->execute([$postId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($body, $postId, $userId)
  {
    $stmt = $this->conn->prepare('INSERT INTO comments (body, user_id, post_id) VALUES (?, ?, ?)');
    $stmt->execute([$body, $userId, $postId]);
  }

  public function delete($id)
  {
    $stmt = $this->conn->prepare('DELETE FROM comments WHERE id = ?');
    $stmt->execute([$id]);
  }
}
