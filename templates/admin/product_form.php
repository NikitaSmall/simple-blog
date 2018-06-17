<?php require './templates/partials/header.php'; ?>

<form method="POST" action="/admin/products">
  <div class="form-group">
    <input type="text" name="title" placeholder="Product's title" class="form-control">
  </div>
  <textarea class="form-control" id="desc" name="desc" placeholder="Product's description"></textarea>

  <input type="submit" value="Create Product!" class="btn btn-default">
</form>

<script>tinymce.init({ selector:'#desc' });</script>

<?php require './templates/partials/footer.php'; ?>
