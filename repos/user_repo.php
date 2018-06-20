<?php

class UserRepo
{
  public static function create($username, $password)
  {
    $stmt = self::conn()->prepare('INSERT INTO users (username, password)
                                   VALUES (?, ?)');

    $hashedPass = md5($password);
    $stmt->execute([$username, $hashedPass]);
  }

  public static function checkUserByName($username) {
    $stmt = self::conn()->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    $user = $stmt->fetch();

    if (is_null($user)) {
      return false;
    } else {
      return $user;
    }
  }

  public static function findUserById($id) {
    $stmt = self::conn()->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

    return $stmt->fetch();
  }

  public static function checkUser($username, $password) {
    $stmt = self::conn()->prepare('SELECT * FROM users
                                   WHERE username = ? AND password = ?');
    $hashedPass = md5($password);

    $stmt->execute([$username, $hashedPass]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

    $user = $stmt->fetch();

    if (is_null($user)) {
      return false;
    } else {
      return $user;
    }
  }

  protected static function conn()
  {
    return Conn::instance()->getConnection();
  }
}
