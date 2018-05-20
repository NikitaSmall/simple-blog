<?php

require_once './config.php';

class TodoModel {
  protected $conn;

  private $createStmt;

  public function __construct()
  {
    $this->conn = new PDO("mysql:host=" . Config::DB_HOST .";dbname=" . Config::DB_NAME, Config::DB_USER, Config::DB_PASS);
    $this->conn->exec("set names utf8");

    $this->createStmt = $this->conn->prepare('INSERT INTO todos (description) VALUES (?)');
  }

  public function getAll()
  {
    $res = $this->conn->query("SELECT * FROM todos");
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($desc)
  {
    // $stmt = $this->conn->prepare('INSERT INTO todos (description) VALUES (?)');
    $this->createStmt->execute([$desc]);
  }
}
