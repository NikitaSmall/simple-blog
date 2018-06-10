<?php

session_start();

require_once './repos/post.php';

$posts = PostRepo::getAllByUserId($_GET['user_id']);

require_once './template/posts.php';
