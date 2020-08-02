

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Analytics
        </h1>
      </div>
      <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Analytics</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content" >
  <div class="card" id="app">
    <div class="card-header">
      <h3 class="card-title">
        Monthly Analytics
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="<?php echo e(route('get_analytics_listing')); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3">
          <select id="items" name="analytics_id" class="custom-select" style="width: 100px;">
            <?php $__currentLoopData = $analytics_listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option id="<?php echo e($keys); ?>" value="<?php echo e($keys); ?>" <?php echo e(( $analytics_selected == $keys) ? 'selected' : ''); ?>><?php echo e($lists); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <div class="input-group-append">
            <div class="btn-group">
              <button type="submit" class="btn btn-sm btn-danger w-100"><i class="fas fa-search-dollar"> </i></button>
              <?php if($results ?? ''): ?>
                <?php if(count($results) > 0): ?>
                  <a href="<?php echo e($analytics_selected); ?>_print" target="_blank" class="btn btn-sm btn-danger pt-2"><i class="fas fa-print"> </i></a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <?php if($results ?? ''): ?>
          <?php if($analytics_selected == 'monthly_sales_report'): ?>
            <div class="input-group mb-3" style="width:990px; overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped text-center" width="100%">
                <thead>
                  <tr>
                    <!-- <th>Sale #</th> -->
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
                  <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <!-- <td><?php echo e($value->sale_no); ?></td> -->
                    <td><?php echo e($value->delivery_no); ?></td>
                    <td><?php echo e($value->client_name); ?></td>
                    <td><?php echo e($value->item_name); ?></td>
                    <td><?php echo e($value->cost); ?></td>
                    <td><?php echo e($value->discount); ?></td>
                    <td><?php echo e($value->additional_fee); ?></td>
                    <td><?php echo e($value->quantity); ?></td>
                    <td><?php echo e($value->total_cost); ?></td>
                    <td>
                      <?php echo e($value->paid_on ? date('m/d/Y', strtotime($value->paid_on)) : ''); ?>

                    </td>
                    <td>
                      <?php echo e(date('m/d/Y', strtotime($value->added_on))); ?>  
                    </td>
                    <td><?php echo e($value->added_by); ?></td>
                    <td><?php echo e($value->description); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                  <tr>
                    <!-- <th>Sale #</th> -->
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
                </tfoot>
              </table>
            </div>
          <?php elseif($analytics_selected == 'sales_vs_purchases'): ?>
            <div class="input-group mb-3" style="width:990px; overflow-x:auto;">
              <table id="example2" class="table table-bordered table-striped text-center" width="100%">
                <thead>
                  <tr>
                    <th>Sale Date</th>
                    <th>Delivery #</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Selling Cost</th>
                    <th>Sold Quantity</th>
                    <th>Purchase Cost</th>
                    <th>Interest Rate</th>
                    <th>Net Income</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <?php echo e($value->sale_date ? date('m/d/Y', strtotime($value->sale_date)) : ''); ?>

                    </td>
                    <td><?php echo e($value->delivery_no); ?></td>
                    <td><?php echo e($value->client_name); ?></td>
                    <td><?php echo e($value->item_name); ?></td>
                    <td><?php echo e($value->selling_cost); ?></td>
                    <td><?php echo e($value->sold_qty); ?></td>
                    <td><?php echo e($value->purchase_cost); ?></td>
                    <td><?php echo e($value->interest_rate); ?></td>
                    <td><?php echo e($value->net_income); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Sale Date</th>
                    <th>Delivery #</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Selling Cost</th>
                    <th>Sold Quantity</th>
                    <th>Purchase Cost</th>
                    <th>Interest Rate</th>
                    <th>Net Income</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          <?php endif; ?>

        <?php endif; ?>
      </form>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/analytics/index.blade.php ENDPATH**/ ?>