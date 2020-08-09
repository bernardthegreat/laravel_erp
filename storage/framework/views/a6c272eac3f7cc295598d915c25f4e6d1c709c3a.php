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
          <td colspan="12" style="border:none;"> 
            <table style="width: 100%;border-collapse: collapse; text-align: center;">
              <?php echo $__env->make('partials.pdf.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </table>
          </td>
        </tr>
        <tr>
          <th colspan="12"
            style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px">
            Monthly Sales Income Report
          </th>
        </tr>

        <tr>
          <th colspan="12" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>DR #</th>
          <th>Client</th>
          <th>Item</th>
          <th>Cost</th>
          <th>Discount</th>
          <th>Additional Fee</th>
          <th>Quantity</th>
          <th>Total Cost</th>
          <th>Paid Date</th>
          <th>Sold Date</th>
          <th>Sold By</th>
          <th>Payment Method</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $result_print; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($sale->delivery_no); ?></td>
          <td><?php echo e($sale->client_name); ?></td>
          <td><?php echo e($sale->item_name); ?></td>
          <td><?php echo e($sale->cost); ?></td>
          <td><?php echo e($sale->discount); ?></td>
          <td><?php echo e($sale->additional_fee); ?></td>
          <td><?php echo e($sale->quantity); ?></td>
          <td><?php echo e($sale->total_cost); ?></td>
          <td>
            <?php echo e($sale->paid_on ? date('m/d/Y', strtotime($sale->paid_on)) : ''); ?>

          </td>
          <td>
            <?php echo e(date('m/d/Y', strtotime($sale->added_on))); ?>

          </td>
          <td><?php echo e($sale->added_by); ?></td>
          <td><?php echo e($sale->description); ?></td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>



</body><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/analytics/sales_pdf/monthly_sales_income.blade.php ENDPATH**/ ?>