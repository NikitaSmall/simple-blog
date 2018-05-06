<?php

function getPosts()
{
  $postString = file_get_contents('./models/posts.txt');
  if (strlen($postString) == 0) {
    return [];
  }

  return unserialize($postString);
}

function getPost($index)
{
  $posts = getPosts();
  if (count($posts)-1 < $index) {
    return null;
  }

  return $posts[$index];
}

function addNewPost($newPost)
{
  $posts = getPosts();
  $posts[] = $newPost;

  $postString = serialize($posts);

  file_put_contents('./models/posts.txt', $postString);
}
