<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $product->image; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product->title; ?></h5>
    <p class="card-text"><?php echo $product->description; ?></p>

    <form action="/cart/add" method="POST">
      <input type="hidden" name="id" value="<?php echo $product->option_id; ?>">
      <button data-id="<?php echo $product->option_id; ?>" class="btn btn-primary add-to-cart">Add to cart!</button>
    </form>
  </div>
</div>
