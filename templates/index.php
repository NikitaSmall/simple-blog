<?php require './templates/partials/header.php'; ?>

<div id="content" class="row justify-content-md-center">
  <div class="col-md-auto">
    Hello world!
  </div>
</div>

<div class="row">
  <?php for($i = 0; $i < 5; $i++) { require './templates/partials/product_card.php'; } ?>
</div>

<?php require './templates/partials/footer.php'; ?>
