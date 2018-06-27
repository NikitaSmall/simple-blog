<?php require './templates/partials/header.php'; ?>

<div id="content" class="row justify-content-md-center">
  <div class="col-md-auto">
    Hello world!
  </div>
</div>

<div class="row">
  <?php foreach ($products as $product) { require './templates/partials/product_card.php'; } ?>
</div>

<?php require './templates/partials/footer.php'; ?>

<script>
  $(document).ready(function() {
    $('.add-to-cart').click(function (e) {
      e.preventDefault();

      $.ajax({
        method: 'post',
        url: '/cart/add',
        data: {
          id: this.dataset.id
        }
      }).done(function(res) {
        $('#cart-alert').addClass('show');
      });      
    });

    $('#cart-alert button').click(function() {
      $('#cart-alert').removeClass('show');
    });
  });
</script>

<div id="cart-alert" class="alert alert-warning alert-dismissible fade" role="alert" style="position: fixed; top: 60px; right: 40px;">
  <strong>Your product has been added to cart!</strong>
  <a href="/cart">Proceed to cart</a>
  <button type="button" class="close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
