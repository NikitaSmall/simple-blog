<?php

class UserRepo
{
  public static function registerUserAtOrder($email)
  {
    if ($user = self::checkUserByName($email)) {
      return $user;
    }

    self::create($email, self::randPass(), User::ORDER);
    return self::checkUserByName($email);
  }

  public static function create($username, $password, $regType = User::MANUAL)
  {
    $stmt = self::conn()->prepare('INSERT INTO users (username, password, registration_type)
                                   VALUES (?, ?, ?)');

    $hashedPass = md5($password);
    $stmt->execute([$username, $hashedPass, $regType]);
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

  protected static function randPass()
  {
    return Utils::generateSalt();
  }

  protected static function conn()
  {
    return Conn::instance()->getConnection();
  }
}
