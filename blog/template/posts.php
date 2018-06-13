<html>
  <head>
    <title>
      Posts by user
    </title>
  </head>
  <body>
    <div id="content">
      <?php foreach ($posts as $post) { ?>
        <div>
          <h2>
            <?php echo $post->title; ?>
          </h2>
          <h4>
            <?php echo $post->user_email; ?>
            -
            <?php echo $post->date; ?>
          </h4>
          <div>
            <?php echo $post->preview(20); ?>
            Read the whole post <a href="/post.php?id=<?php echo $post->id; ?>">here</a>
          </div>
          <h5>
            <form method="post" action="/post_delete.php">
              <input type="hidden" name="id" value="<?php echo $post->id; ?>">
              <input type="submit" value="delete post!">
            </form>
          </h5>
        </div>
      <?php } ?>
    </div>
  </body>
</html>
