<html>
  <head>
    <title>
      Blog - add post
    </title>
  </head>
  <body>
    <form method="POST" action="/add_post.php">
      <input type="text" name="title" placeholder="Enter post's title">
      <input type="text" name="meta" placeholder="Enter post's additional info">
      <textarea name="text" placeholder="Post content"></textarea>

      <input type="submit" value="submit a new post">
    </form>
  </body>
</html>
