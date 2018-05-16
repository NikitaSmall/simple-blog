<html>
  <head>
    <title>Todo</title>
  </head>
  <body>
    <div id="user">
      <?php if (isset($_SESSION['user'])) { ?>
        Hello, <?php echo $_SESSION['user']; ?>

        <form method="POST" action="/logout.php">
          <input type="hidden" name="login" value="<?php echo $_SESSION['user']; ?>">
          <input type="submit" value="Logout">
        </form>
      <?php } else { ?>
        <a href="/register.php">Register</a>
        <a href="/login.php">Login</a>
      <?php }?>
    </div>
    <?php if (isset($_SESSION['user'])) { ?>
      <ul>
        <?php foreach ($todoModel->getTodos() as $i => $todo) { ?>
          <li>
            <?php if ($todo['status']) { echo '<s>'; } ?>
              <?php echo $todo['text']; ?>
            <?php if ($todo['status']) { echo '</s>'; } ?>
          </li>
          <form method="post" action="status.php">
            <input type="hidden" name="index" value="<?php echo $i; ?>">
            <input type="submit" value="Change status!">
          </form>
        <?php } ?>
      </ul>
    <?php } ?>

    <form method="post" action="/">
      <input type="text" name="text">
      <input type="submit" value="add todo">
    </form>
  </body>
</html>
