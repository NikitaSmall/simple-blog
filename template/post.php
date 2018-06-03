<html>
  <head>
    <title>Blog post</title>
  </head>
  <body>
    <div>
      <h3><a href="/">Home</a></h3>
    </div>
    <?php if ($post) { ?>
      <div>
        <h2>
          <?php echo $post['title']; ?>
        </h2>
        <h4>
          <a href="/post_user.php?user_id=<?php echo $post['user_id']; ?>">
            <?php echo $post['user_email']; ?>
          </a>
          -
          <?php echo $post['date']; ?>
        </h4>
        <div>
          <?php echo $post['body']; ?>
        </div>
      </div>
    <?php } else { ?>
      Post is not found.
    <?php } ?>
  </body>
</html>
