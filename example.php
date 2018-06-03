<?php

class Animal
{
  public function __construct($voiceObj)
  {
    $this->voiceObj = $voiceObj;
  }

  public function voice()
  {
    return $this->voiceObj->voice();
  }
}

class DogVoice
{
  public function voice()
  {
    return 'bark!';
  }
}

$dogVoice = new DogVoice();

$dog = new Animal($dogVoice);

echo $dog->voice();

class Connection
{
  private $conn;

  public function __construct()
  {
    $this->conn = 'connected!';
  }

  public function getConn()
  {
    return $this->conn;
  }
}

class Model
{
  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function getPosts()
  {
    $res = $this->conn->getConn()->query('SELECT * FROM posts');
    return $res->fetchAll();
  }
}
