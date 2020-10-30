<head>
  <title>Monthly Sales Income Report</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<style>
#body tr:nth-child(even) {
  background-color: #c1c7d0;
}

#body tr td {
  border: 1px solid black;
}

#body tr th {
  border: 1px solid black;
}

#body th {
  background-color: #c1c7d0;
}

.text-center {
  text-align: center;
}

@page  {
  margin-top: 2%;
  margin-bottom: 5%;
}

#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}

.page-number:before {
  content: "Page "counter(page);
}
</style>

<body style="font-family: sans-serif">


  <div>
    <table style="width: 100%;border-collapse: collapse; text-align: center;">
      <thead>

      </thead>
    </table>
    <table id="body" style="width: 100%;border-collapse: collapse; text-align: center;">
      <thead>
        <tr>
          <td colspan="6" style="border:none;">
            <table style="width: 100%;border-collapse: collapse; text-align: center;">
              <?php echo $__env->make('partials.pdf.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </table>
          </td>
        </tr>

        <tr>
          <th colspan="6"
            style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px">
            Sales VS. Purchases
          </th>
        </tr>

        <tr>
          <th colspan="6" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>Purchase Date</th>
          <th>Delivery #</th>
          <th>Item</th>
          <th>Purchase Quantity</th>
          <th>Sold Quantity</th>
          <th>Unsold Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $total_purchase_qty = 0;
          $total_sold_qty = 0;
          $total_unsold_qty = 0;
        ?>
        <?php $__currentLoopData = $result_print; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_sales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <?php echo e($purchase_sales->purchase_date ? date('m/d/Y', strtotime($purchase_sales->purchase_date)) : ''); ?>

          </td>
          <td><?php echo e($purchase_sales->dr_no); ?></td>
          <td><?php echo e($purchase_sales->item_name); ?></td>
          <td><?php echo e($purchase_sales->purchase_qty); ?></td>
          <td><?php echo e($purchase_sales->sold_qty); ?></td>
          <td><?php echo e($purchase_sales->unsold_qty); ?></td>
        </tr>
        <?php 
          $total_purchase_qty += $purchase_sales->purchase_qty;
          $total_sold_qty += $purchase_sales->sold_qty;
          $total_unsold_qty += $purchase_sales->unsold_qty;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td colspan="3"></td>
          <td><b>Total Quantity:</b> <?php echo e($total_purchase_qty); ?></td>
          <td><b>Total Quantity:</b> <?php echo e($total_sold_qty); ?></td>
          <td><b>Total Quantity:</b> <?php echo e($total_unsold_qty); ?></td>
        </tr>
      </tbody>
    </table>
  </div>



</body><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/analytics/sales_pdf/purchases_vs_sales.blade.php ENDPATH**/ ?>