<?php require_once './templates/partials/header.php'; ?>


<form method="post" action="/orders">
  <?php if (empty($_SESSION[BaseController::$userSessionField])) { ?>
    <input type="email" name="email" placeholder="customer's mail">
  <?php } ?>

  <input type="text" name="address" placeholder="Enter your address">
  <input type="submit" value="Submit order">
</form>

<?php require_once './templates/partials/footer.php'; ?>
