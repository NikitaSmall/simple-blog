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

        <div id="comments">
          <?php foreach ($comments as $comment) { ?>
            <div>
              <h4>
                <?php echo $comment['email']; ?>
                -
                <?php echo $comment['timestamp']; ?>
              </h4>
              <div>
                <?php echo $comment['body']; ?>
              </div>
            </div>
          <?php } ?>
          <h3>Add you comment:</h3>
          <form method="post" action="/comment_create.php">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <textarea name="body" placeholder="Write the comment!"></textarea>
            <input type="submit" value="Send the comment!">
          </form>
        </div>
      </div>
    <?php } else { ?>
      Post is not found.
    <?php } ?>
  </body>
</html>
