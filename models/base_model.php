<?php

require_once './config.php';

class Connection
{
  protected $conn;

  public function __construct()
  {
    $this->conn = new PDO("mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME,
                          Config::DB_USER, Config::DB_PASS);
    $this->conn->exec("set names utf8");
  }

  public function getConnection()
  {
    return $this->conn;
  }
}
