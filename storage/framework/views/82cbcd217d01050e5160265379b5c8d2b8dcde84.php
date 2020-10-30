<head>
  <title>Monthly Utilities Report</title>
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
          <td colspan="3" style="border:none;">
            <table style="width: 100%;border-collapse: collapse; text-align: center;">
              <?php echo $__env->make('partials.pdf.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </table>
          </td>
        </tr>

        <tr>
          <th colspan="3"
            style="text-align:center; background: white; border:none; text-transform:uppercase;font-size: 20px">
            Monthly Utilities Report
          </th>
        </tr>

        <tr>
          <th colspan="3" style="text-align:center;background: white; border:none;"> &nbsp; </th>
        </tr>
        <tr>
          <th>Utility</th>
          <th>Cost</th>
          <th>Coverage</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $total_cost = 0;
        ?>
        <?php $__currentLoopData = $result_print; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utilities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($utilities->utility); ?></td>
          <td>
            <?php echo e($utilities->coverage ? date('M Y', strtotime($utilities->coverage)) : ''); ?>

          </td>
          <td><?php echo e($utilities->cost); ?></td>
        </tr>
        <?php 
          $total_cost += $utilities->cost;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td></td>
          <td style="font-weight: bold;">Total</td>
          <td><?php echo number_format($total_cost, 2); ?></td>
        </tr>
      </tbody>
    </table>
  </div>



</body><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/analytics/utilities_pdf/monthly_utilities.blade.php ENDPATH**/ ?>