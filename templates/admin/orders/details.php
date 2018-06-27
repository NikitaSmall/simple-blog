<?php require_once './templates/partials/header.php'; ?>


<h2>Order details:</h2>
  #<?php echo $order->id ?>,
  address <?php echo $order->address ?>,
  status: <?php echo $order->status() ?>
<div>

</div>

<div>
  <table class="table">
    <thead>
      <tr>
        <th>
          Product's name
        </th>
        <th>
          Option's name
        </th>
        <th>
          Amount
        </th>
        <th>
          Option's price
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($lineItems as $lineItem) { ?>
        <tr>
          <td>
            <?php echo $lineItem->product_title; ?>
          </td>
          <td>
            <?php echo $lineItem->option_title; ?>
          </td>
          <td>
            <?php echo $lineItem->amount; ?>
          </td>
          <td>
            <?php echo $lineItem->price; ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php require_once './templates/partials/footer.php'; ?>
