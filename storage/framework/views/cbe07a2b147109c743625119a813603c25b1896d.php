

<?php $__env->startSection('content'); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>
          Revenue
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Revenue</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <div class="card-tools btn-group">
          <a href="<?php echo e(route('point_of_sale')); ?>" class="btn btn-danger btn-flat"
            data-placement="top" rel="tooltip" title="Sell">
            <i class="fa fa-dollar-sign"> </i>
          </a>
          <a href="<?php echo e(route('payments')); ?>" class="btn btn-danger btn-flat" data-placement="top" rel="tooltip"
            title="Process Payment">
            <i class="fa fa-money-bill-alt"> </i>
          </a>
        </div>
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th>Sold Date</th>
            <th>Client</th>
            <th>Item</th>
            <th>DR #</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($sale->added_on))); ?> </td>
            <td> <?php echo e($sale->client_name); ?> </td>
            <td> <?php echo e($sale->item_name); ?> </td>
            <td> <?php echo e($sale->delivery_no); ?> </td>
            <td> <?php echo e($sale->cost); ?> </td>
            <td> <?php echo e($sale->quantity); ?> </td>
            <td>

              <div class="btn-group">
                <a class="btn btn-danger btn-sm" href="<?php echo e(route('sales.edit', $sale->sale_id)); ?>" data-placement="top"
                  rel="tooltip" title="Edit <?php echo e($sale->client_name); ?>" data-original-title="Edit">
                  <i class="fa fa-edit">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm delete" href="<?php echo e(route('sales.delete', $sale->sale_id)); ?>" data-placement="top"
                  rel="tooltip" title="Delete sale for <?php echo e($sale->client_name); ?>">
                  <i class="fa fa-trash">
                  </i>
                </a>
              </div>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Sold Date</th>
            <th>Client</th>
            <th>Item</th>
            <th>DR #</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th> </th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/sales/index.blade.php ENDPATH**/ ?>