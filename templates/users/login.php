<?php require './templates/partials/header.php'; ?>

<form method="POST" action="/users/login">
  <div class="form-group">
    <input type="email" name="email" placeholder="User's email" class="form-control">
  </div>

  <div class="form-group">
    <input type="password" name="password" placeholder="User's password" class="form-control">
  </div>

  <input type="submit" value="Login!" class="btn btn-default">
</form>

<?php require './templates/partials/footer.php'; ?>
