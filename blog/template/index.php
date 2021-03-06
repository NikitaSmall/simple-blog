<html>
  <head>
    <title>Blog</title>
  </head>
  <body>
    <div id="users-interactions">
      <?php if(isset($_SESSION['user_email'])) { ?>
        <form method="POST" action="/logout.php">
          <input type="hidden" name="user_id" value="<?php $_SESSION['user_id']; ?>">
          <input type="submit" value="Logout!">
        </form>
        <a href="/index.php?r=/post/create">Create post</a>
      <?php } else { ?>
        <a href="/register.php">Register</a>
        <a href="/login.php">Login</a>
        <strong>Login to create post!</strong>
      <?php }?>
    </div>
    <div id="content">
      <?php foreach ($posts as $post) { ?>
        <div>
          <h2>
            <?php echo $post->title; ?>
          </h2>
          <h4>
            <?php echo $post->user_email; ?>
            -
            <?php echo $post->date(); ?>
            -
            comments number: <?php echo $post->comments_number; ?>
          </h4>
          <div>
            Preview:
            <div>
              <?php echo $post->preview(); ?>
            </div>
            Read the full post <a href="/index.php?r=/post&id=<?php echo $post->id; ?>">here</a>
          </div>
          <h5>
            <form method="post" action="/index.php?r=/post/delete">
              <input type="hidden" name="id" value="<?php echo $post->id; ?>">
              <input type="submit" value="delete post!">
            </form>
          </h5>
        </div>
      <?php } ?>
    </div>
  </body>
</html>
