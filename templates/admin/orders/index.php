<?php require_once './templates/partials/header.php'; ?>


<h2>Orders:</h2>

<div>
  <table class="table">
    <?php foreach ($orders as $order) { ?>
      <tr>
        <td>
          <a href="/admin/orders/details?order_id=<?php echo $order->id; ?>">
            #<?php echo $order->id; ?>
          </a>
        </td>
        <td>
          <?php echo $order->status(); ?>
        </td>
        <td>
          <?php echo $order->total; ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>

<?php require_once './templates/partials/footer.php'; ?>
