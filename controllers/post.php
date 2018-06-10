<?php

class PostController
{
  public static function index()
  {
    $posts = PostRepo::getAll();
    require_once './template/index.php';
  }

  public static function post($getArray)
  {
    $post = PostRepo::getById($getArray['id']);
    $comments = CommentRepo::getByPostId($getArray['id']);

    require_once './template/post.php';
  }

  public static function createForm()
  {
    require_once './template/post_create.php';
  }

  public static function create($postArray)
  {
    PostRepo::create($postArray['title'], $postArray['body'], $_SESSION['user_id']);
    header('location: /');
  }

  public static function delete($postArray)
  {
    $post = PostRepo::getById($postArray['id']);
    if ($post && $post->user_id == $_SESSION['user_id']) {
      PostRepo::delete($postArray['id']);
    }

    header('location: /');
  }
}
