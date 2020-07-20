

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

<!--
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sell</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo e(route('insert_sale')); ?>">
          <?php echo csrf_field(); ?>
          <div class="input-group mb-3">
            <select name="client_id" class="custom-select" id="client_id" data-placement="right" rel="tooltip"
              title="Clients">
              <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($client->id); ?>"><?php echo e($client->name_long); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="input-group mb-3">
            <select name="item_id" class="custom-select" id="item_id" data-placement="right" rel="tooltip"
              title="Items">
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($item->item_id); ?>"><?php echo e($item->item_name); ?> -- <?php echo e($item->qty); ?> <?php echo e($item->unit); ?>/s in stock </em>
              </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="order_qty" class="form-control" placeholder="Quantity" autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-money-bill-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="discount" class="form-control" placeholder="Discount" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-money-bill-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="additional_fee" class="form-control" placeholder="Additional Fee"
              autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-money-bill-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="dr_no" class="form-control" placeholder="DR #" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-money-bill-alt"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="invoice_no" class="form-control" placeholder="Invoice #" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-money-bill-alt"></span>
              </div>
            </div>
          </div>
          <?php
          $user = auth()->user();
          ?>
          <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user->id); ?>" class="form-control"
            autocomplete="off">
          <div class="input-group mb-3">
            <textarea class="form-control" rows="3" name="remarks" id="remarks" placeholder="Remarks"></textarea>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
-->

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
            <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($sale->created_at))); ?> </td>
            <td> <?php echo e($sale->client_name); ?> </td>
            <td> <?php echo e($sale->item_name); ?> </td>
            <td> <?php echo e($sale->dr_no); ?> </td>
            <td> <?php echo e($sale->cost); ?> </td>
            <td> <?php echo e($sale->qty); ?> </td>
            <td>

              <div class="btn-group">
                <a class="btn btn-danger btn-sm" href="<?php echo e(route('sales.edit', $sale->id)); ?>" data-placement="top"
                  rel="tooltip" title="Edit <?php echo e($sale->client_name); ?>" data-original-title="Edit">
                  <i class="fa fa-edit">
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