<?php

require_once './repos/connection.php';

require_once './models/comment.php';

class CommentRepo
{
  public static function getByPostId($postId)
  {
    $stmt = self::connection()
      ->prepare('SELECT c.id, c.body, c.timestamp, u.email
                 FROM comments AS c
                 JOIN users AS u ON c.user_id = u.id
                 WHERE c.post_id = ?
                 ORDER BY c.timestamp ASC');
    $stmt->execute([$postId]);

    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
  }

  public static function create($body, $postId, $userId)
  {
    $stmt = self::connection()
      ->prepare('INSERT INTO comments (body, user_id, post_id) VALUES (?, ?, ?)');
    $stmt->execute([$body, $userId, $postId]);
  }

  public static function delete($id)
  {
    $stmt = self::connection()
      ->prepare('DELETE FROM comments WHERE id = ?');
    $stmt->execute([$id]);
  }

  private static function connection()
  {
    return Connection::instance()->getConnection();
  }
}
