<?php

require_once './config.php';

class UserModel
{
  protected $conn;

  const CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  public function __construct()
  {
    $this->conn = new PDO("mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME,
                          Config::DB_USER, Config::DB_PASS);
    $this->conn->exec("set names utf8");
  }

  public function create($email, $password)
  {
    $salt = self::generateSalt();
    $preparePassword = self::preparePassword($password, $salt);

    $stmt = $this->conn->prepare("INSERT INTO users (email, password, salt) VALUES (?, ?, ?)");
    $stmt->execute([$email, $preparePassword, $salt]);
  }

  public function getUser($email, $password)
  {
    $user = $this->getUserByEmail($email);

    if ($user && self::preparePassword($password, $user['salt']) == $user['password']) {
      return $user;
    }

    return false;
  }

  private static function generateSalt()
  {
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring .= self::CHARS[rand(0, strlen(self::CHARS))];
    }
    return $randstring;
  }

  private static function preparePassword($password, $salt)
  {
    return hash('sha256', $password . $salt);
  }

  public function getUserByEmail($email)
  {
    $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
