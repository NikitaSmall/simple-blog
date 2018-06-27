<?php require_once './templates/partials/header.php'; ?>


<?php if (!empty($_SESSION[BaseController::$userSessionField])) { ?>
  <form method="post" action="/orders">
    <input type="text" name="address" placeholder="Enter your address">
    <input type="submit" value="Submit order">
  </form>
<?php } else { ?>
  <h2>Please login!</h2>
<?php } ?>

<?php require_once './templates/partials/footer.php'; ?>
