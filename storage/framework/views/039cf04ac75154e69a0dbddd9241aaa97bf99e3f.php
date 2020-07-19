<head>
  <title>Statement of Account</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<style>
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

.table-breakdown tr th {
  border-top: 0.5px solid black;
  border-bottom: 0.5px solid black;
}

.table-breakdown tr td {
  padding: 10px;
}

.table-breakdown tr:nth-child(even) {
  background-color: #c1c7d0;

}
</style>

<?php 
    $border = 0;
?>

<body style="font-family: sans-serif">

  <table style="width:100%;border-collapse: collapse;" border="<?php echo $border; ?>">
    <tr>
      <td width="50%"> <img src="<?php echo e(asset('img/company.jpeg')); ?>" width="180px" height="80px"> </td>
      <td width="50%" valign="top" style="text-align: right;"> Date: <?php echo date('m/d/Y'); ?> </td>
    </tr>
  </table>

  <table style="width:100%;border-collapse: collapse;" border="<?php echo $border; ?>">
    <tr>
      <td width="40%">
        From
        <br>
        <strong>Huat-Hok Rice Trading, Inc.</strong><br>
        Address: 1082 Del Monte Avenue, Quezon City <br>
        Phone #: (02) 750-37473 <br>
        Cellphone #: 09228808104 / 0178958156
      </td>
      <td valign="top">
        To
        <br>
        <strong><?php echo e($break_downs[0]->client_name); ?></strong><br>
        Address: <?php echo e($break_downs[0]->address); ?><br>
        Contact #: <?php echo e($break_downs[0]->contact_no); ?> <br>
        Status: 
        <?php if(isset($break_downs[0]->paid_on)): ?>
          <span style="font-weight:bold; color:green">PAID</span>
        <?php else: ?> 
          <span style="font-weight:bold; color:red">NOT PAID</span>
        <?php endif; ?>
      </td>
    </tr>
  </table>

  <table width="100%" style="border-collapses: collapse">
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>

  <table class="table-breakdown" style="width:100%;border-collapse: collapse;text-align:center;"
    border="<?php echo $border; ?>">
    <thead>
      <tr>
        <th colspan="8" style="border: none;">
          <h3> Statement of Account </h3>
        </th>
      </tr>
      <tr>
        <th colspan="8" style="border: none;background:none;"> &nbsp; </th>
      </tr>
      <tr>
        <th style="padding:5px;">#</th>
        <th>DR #</th>
        <th>Quantity</th>
        <th>Item</th>
        <th>Additional Fee</th>
        <th>Discount</th>
        <th>Date Sold</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="font-size: 8px"> &nbsp; </td>
      </tr>
      <?php
      $total = 0;
      $number = 1;
      ?>
      <?php $__currentLoopData = $break_downs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_down): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td>
          <?php
          echo $number++;
          ?>
        </td>
        <td><?php echo e($break_down->dr_no); ?></td>
        <td><?php echo e($break_down->qty); ?></td>
        <td><?php echo e($break_down->name_long); ?></td>
        <td><?php echo e($break_down->addl_fee); ?></td>
        <td><?php echo e($break_down->discount); ?></td>
        <td><?php echo e(date('m/d/Y h:i:s A', strtotime($break_down->created_at))); ?></td>
        <td>
          <?php echo e($break_down->cost); ?>

          <?php ($total += $break_down->cost); ?>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

  <table width="100%" style="border-collapses: collapse">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>

  <table style="width:100%;border-collapse: collapse;text-align:center;" border="<?php echo $border; ?>">
    
    <tr>
      <td colspan="3"></td>
    </tr>
    <tr>
      <td width="69%"> &nbsp; </td>
      <th width="15%">Total:</th>
      <td style="border-bottom: 1px solid black"><?php echo number_format($total, 2); ?></td>
    </tr>
  </table>
</body><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/sales/statement_of_account_print.blade.php ENDPATH**/ ?>