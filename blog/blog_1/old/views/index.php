<?php require_once './views/partials/header.php'; ?>

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Album example</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
      <a href="#" class="btn btn-primary">Main call to action</a>
      <a href="#" class="btn btn-secondary">Secondary action</a>
    </p>
  </div>
</section>

<div class="album text-muted">
  <div class="container">

    <div class="row">
      <?php foreach ($products as $product) { ?>
        <?php require './views/partials/product_card.php'; ?>
      <?php } ?>
    </div>

  </div>
</div>

<?php require_once './views/partials/footer.php'; ?>
