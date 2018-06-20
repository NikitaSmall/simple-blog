<?php require './templates/partials/header.php'; ?>

<div id="content" class="row justify-content-md-center">
  <div class="col-md-auto">
    <table class="table">
      <?php  foreach ($options as $option) { ?>
        <tr>
          <td>
            <?= $option->title ?>
          </td>

          <td id="amount-<?php echo $option->id; ?>">
            <?= $option->amount ?>
          </td>

          <td>
            <form action="/cart/substract" method="POST">
              <input type="hidden" name="id" value="<?php echo $option->id; ?>">
              <button class="btn btn-danger substract-amount" data-id="<?php echo $option->id; ?>">-</button>
            </form>
          </td>

          <td>
            <form action="/cart/add" method="POST">
              <input type="hidden" name="id" value="<?php echo $option->id; ?>">
              <button class="btn btn-primary add-amount" data-id="<?php echo $option->id; ?>">+</button>
            </form>
          </td>

        </tr>
      <?php } ?>
    </table>
  </div>

  <div>
    <form action="/cart/destroy" method="POST">
      <button class="btn btn-danger">Empty the cart!!!</button>
    </form>
  </div>
</div>

<?php require './templates/partials/footer.php'; ?>

<script>
  $(document).ready(function() {
    $('button.add-amount').click(function(event) {
      event.preventDefault();

      $.ajax({
        method: 'post',
        url: '/cart/add',
        data: {
          id: this.dataset.id
        }
      }).done(function(res) {
        const data = JSON.parse(res);
        $('#amount-'+data.id).html(data.amount);
      });
    });

    $('button.substract-amount').click(function(event) {
      event.preventDefault();

      $.ajax({
        method: 'post',
        url: '/cart/substract',
        data: {
          id: this.dataset.id
        }
      }).done(function(res) {
        const data = JSON.parse(res);
        $('#amount-'+data.id).html(data.amount);
      });
    });
  });
</script>
