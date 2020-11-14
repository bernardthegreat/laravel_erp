<head>
  <title>Sales Vs. Purchases Report</title>
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
          <td colspan="5" style="border:none;">
            <table style="width: 100%;border-collapse: collapse; text-align: center;">
              <?php echo $__env->make('partials.pdf.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </table>
          </td>
        </tr>

        <tr>
          <th colspan="5"
            style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px">
            Sales Vs. Purchases Report
          </th>
        </tr>

        <tr>
          <th colspan="5" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>Item Name</th>
          <th>Purchase Quantity</th>
          <th>Purchase Total Cost</th>
          <th>Sold Quantity</th>
          <th>Sale Total Cost</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $total_purchase_qty = 0;
          $total_sold_qty = 0;
          $total_overall_purchase_cost = 0;
          $total_sale_cost = 0;
        ?>
        <?php $__currentLoopData = $result_print; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale_purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($sale_purchase->purchase_qty > 0): ?>
        <tr>
          <td><?php echo e($sale_purchase->item_name); ?></td>
          <td><?php echo e($sale_purchase->purchase_qty); ?></td>
          <td><?php echo e($sale_purchase->purchase_total_cost); ?></td>
          <td><?php echo e($sale_purchase->sold_qty); ?></td>
          <td><?php echo e($sale_purchase->sale_total_cost); ?></td>
        </tr>
        <?php 
          $total_purchase_qty += $sale_purchase->purchase_qty;
          $total_pcost =  str_replace(',', '', $sale_purchase->purchase_total_cost);
          $total_overall_purchase_cost += $total_pcost;
          $total_sold_qty += $sale_purchase->sold_qty;
          $total_scost =  str_replace(',', '', $sale_purchase->sale_total_cost);
          $total_sale_cost += $total_scost;
        ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td></td>
          <td><b>Total Quantity:</b> <?php echo e($total_purchase_qty); ?></td>
          <td><b>Total Cost:</b> <?php echo e(number_format($total_overall_purchase_cost, 2)); ?></td>
          <td><b>Total Quantity:</b> <?php echo e($total_sold_qty); ?></td>
          <td><b>Total Cost:</b> <?php echo e(number_format($total_sale_cost, 2)); ?></td>
        </tr>
      </tbody>
    </table>
  </div>



</body><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/analytics/sales_pdf/sales_vs_purchases.blade.php ENDPATH**/ ?>