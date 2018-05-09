<?php

class Post
{
  private $title; // protected, public
  private $body;

  public function __construct($title, $body)
  {
    $this->title = $title;
    $this->body = $body;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getBody()
  {
    return $this->body;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }

  public function timeToRead()
  {
    $bodyLen = strlen($this->body);
    return $bodyLen / 400;
  }
}

$post = new Post('First post title', 'First post body');

var_dump($post);
$post->setTitle('changed post');
var_dump($post);
$post->setBody('changed text');
var_dump($post);

echo 'time to read for currect post is ' . $post->timeToRead();
