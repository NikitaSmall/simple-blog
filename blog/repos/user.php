<?php

require_once './config/utils.php';

require_once './repos/connection.php';

require_once './models/user.php';

class UserRepo
{
  public static function create($email, $password)
  {
    $salt = Utils::generateSalt();
    $preparePassword = self::preparePassword($password, $salt);

    $stmt = self::connection()->prepare("INSERT INTO users (email, password, salt) VALUES (?, ?, ?)");
    $stmt->execute([$email, $preparePassword, $salt]);
  }

  public static function getUser($email, $password)
  {
    $user = self::getUserByEmail($email);

    if ($user && self::preparePassword($password, $user->salt) == $user->password) {
      return $user;
    }

    return false;
  }

  public static function getUserByEmail($email)
  {
    $stmt = self::connection()->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    return $stmt->fetch();
  }

  private static function preparePassword($password, $salt)
  {
    return hash('sha256', $password . $salt);
  }

  private static function connection()
  {
    return Connection::instance()->getConnection();
  }
}
