

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo e($clients->name_long); ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/clients">Clients</a></li>
          <li class="breadcrumb-item active"><?php echo e($clients->name_long); ?></li>
        </ol>
      </div>
    </div>
  </div>
</section>


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-danger card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('img/avatar.png')); ?>"
                alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"> <?php echo e($clients->name_long); ?> </h3>
            <p class="text-muted text-center"> <?php echo e($clients->contact_no); ?> </p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Payments</b>
                <?php
                  $total_sales = 0;
                  $total_debts = 0;
                ?>
                <?php $__currentLoopData = $debts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                  $total_debts += $debt->cost;
                  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                  $total_sales += $payment->cost;
                  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a class="float-right">
                  <?php echo e(number_format($total_sales, 2)); ?>

                </a>
              </li>
              <li class="list-group-item">
                <b>Current Debts</b>
                <a class="float-right">
                  <?php echo e(number_format($total_debts, 2)); ?>

                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Statement of Accounts</h3>
          </div>
          <div class="card-body mb-4" style="height:600px; overflow-y:auto;">
            <table class="table table-bordered table-striped text-center">
              <?php $__currentLoopData = $soa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th>
                  DR No.: <?php echo e($account->dr_no); ?> <br>
                  <small>
                    <?php echo e($account->client_name); ?>

                    <br>
                    <?php echo e($account->paid_on ? 'Paid: '.date('m/d/Y h:i:s A', strtotime($account->paid_on)) : ''); ?>

                  </small>
                </th>
                <td>
                  <a href="<?php echo e(route('statement_of_account_print', $account->dr_no)); ?>" target="_blank" 
                    class="btn btn-sm btn-danger"  data-placement="top" rel="tooltip" title=""
                    data-original-title="Statement of Account">
                    <i class="fas fa-money-bill"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Client Information
            </h3>
          </div>
          <form role="form" method="post" action="<?php echo e(route('clients.update', $clients->id )); ?>">
            <div class="card-body">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PATCH'); ?>
              <div class="form-group">
                <label for="name_long">Name Long</label>
                <input type="text" class="form-control" name="name_long" id="name_long" value="<?php echo e($clients->name_long); ?>"
                  placeholder="Name Long">
              </div>
              <div class="form-group">
                <label for="payment_term">Terms</label>
                <input type="text" class="form-control" name="payment_term" id="payment_term"
                  value="<?php echo e($clients->payment_term); ?>" placeholder="Terms">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo e($clients->address); ?>"
                  placeholder="Address">
              </div>
              <div class="form-group">
                <label for="contact_no">Contact #</label>
                <input type="text" class="form-control" name="contact_no" id="contact_no"
                  value="<?php echo e($clients->contact_no); ?>" placeholder="Contact #">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          </form>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Payments
            </h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Sold Date</th>
                  <th>DR #</th>
                  <th>Item</th>
                  <th>Paid Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($payment->created_at))); ?> </td>
                  <td> <?php echo e($payment->dr_no); ?> </td>
                  <td> <?php echo e($payment->name_long); ?> </td>
                  <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($payment->paid_on))); ?></td>
                  <td>
                    <a href="<?php echo e(route('statement_of_account_print', $account->dr_no)); ?>" target="_blank" 
                      class="btn btn-sm btn-danger"  data-placement="top" rel="tooltip" title=""
                      data-original-title="Statement of Account">
                      <i class="fas fa-money-bill"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Sold Date</th>
                  <th>Invoice #</th>
                  <th>Item</th>
                  <th>Paid Date</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Debts
            </h3>
          </div>
          <div class="card-body">
            <table id="table_without_search1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Sold Date</th>
                  <th>Items</th>
                  <th>DR #</th>
                  <th>Quantity</th>
                  <th>Cost</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $total_qty = 0;
                $total_debts = 0;
                ?>
                <?php $__currentLoopData = $debts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($debt->created_at))); ?> </td>
                  <td> <?php echo e($debt->name_long); ?> </td>
                  <td> <?php echo e($debt->invoice_no); ?> </td>
                  <td> <?php echo e($debt->qty); ?> </td>
                  <td> <?php echo e($debt->cost); ?></td>
                  <td>
                    <a href="<?php echo e(route('statement_of_account_print', $account->dr_no)); ?>" target="_blank" 
                      class="btn btn-sm btn-danger"  data-placement="top" rel="tooltip" title=""
                      data-original-title="Statement of Account">
                      <i class="fas fa-money-bill"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Sold Date</th>
                  <th>Items</th>
                  <th>DR #</th>
                  <th>Quantity</th>
                  <th>Cost</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/clients/edit.blade.php ENDPATH**/ ?>