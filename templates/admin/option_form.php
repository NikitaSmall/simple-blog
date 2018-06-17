<?php require './templates/partials/header.php'; ?>

<form method="POST" action="/admin/options">
  <div class="form-group">
    <input type="text" name="title" placeholder="Option's title" class="form-control">
  </div>
  <textarea class="form-control" id="desc" name="desc" placeholder="Option's description"></textarea>

  <div class="form-group">
    <input type="number" name="amount" placeholder="Option's amount" class="form-control">
  </div>

  <div class="form-group">
    <input type="number" name="price" placeholder="Option's price" class="form-control">
  </div>

  <select name="product_id">
    <?php foreach ($products as $product) { ?>
      <option value="<?php echo $product->id; ?>">
        <?php echo $product->title; ?>
      </option>
    <?php } ?>
  </select>

  <input type="submit" value="Create Option!" class="btn btn-default">
</form>

<script>tinymce.init({ selector:'#desc' });</script>

<?php require './templates/partials/footer.php'; ?>
