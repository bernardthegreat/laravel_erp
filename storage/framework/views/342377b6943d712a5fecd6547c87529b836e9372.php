

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Clients
        </h1>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header ">
                <h4 class="modal-title">Add Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo e(route('clients.create')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="input-group mb-3">
                    <input type="text" name="name_long" class="form-control" placeholder="Name" autocomplete="off"
                      required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="address" class="form-control" placeholder="Address" autocomplete="off">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="contact_no" class="form-control" placeholder="Contact No."
                      autocomplete="off">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="number" name="payment_term" class="form-control" placeholder="Payment Term"
                      autocomplete="off" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
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
      </div>
      <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Clients</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#modal-default"
          data-placement="top" rel="tooltip" title="Add Client">
          <i class="fa fa-plus"> </i>
        </button>
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="card card-danger card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home"
                role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile"
                role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Has Debt</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
              aria-labelledby="custom-tabs-four-home-tab">
              <table id="asc_first_column1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Name Long</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Creation Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td> <?php echo e($client->name_long); ?> </td>
                    <td> <?php echo e($client->address); ?> </td>
                    <td> <?php echo e($client->contact_no); ?> </td>
                    <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($client->created_at))); ?> </td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger btn-sm" href="<?php echo e(route('clients.edit', $client->id)); ?>"
                          data-placement="top" rel="tooltip" title="Edit <?php echo e($client->name_short); ?>"
                          data-original-title="Edit">
                          <i class="fa fa-edit">
                          </i>
                        </a>
                        <a class="btn btn-danger btn-sm delete" href="<?php echo e(route('clients.soft_delete', $client->id)); ?> "
                          data-placement="top" rel="tooltip" title="Delete <?php echo e($client->name_short); ?>"
                          data-original-title="soft ">
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
                    <th>Name Long</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Creation Date</th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
              aria-labelledby="custom-tabs-four-profile-tab">
              <table id="asc_first_column2" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Name Long</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Creation Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($client->has_debt == 1): ?>
                  <tr>
                    <td> <?php echo e($client->name_long); ?> </td>
                    <td> <?php echo e($client->address); ?> </td>
                    <td> <?php echo e($client->contact_no); ?> </td>
                    <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($client->created_at))); ?> </td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger btn-sm" href="<?php echo e(route('generate_billing_statement', $client->id)); ?>"
                          data-placement="top" rel="tooltip" title="Bill <?php echo e($client->name_short); ?>">
                          <i class="fa fa-credit-card">
                          </i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?php echo e(route('clients.edit', $client->id)); ?>"
                          data-placement="top" rel="tooltip" title="Edit <?php echo e($client->name_short); ?>"
                          data-original-title="Edit">
                          <i class="fa fa-edit">
                          </i>
                        </a>
                        <a class="btn btn-danger btn-sm delete" href="<?php echo e(route('clients.soft_delete', $client->id)); ?> "
                          data-placement="top" rel="tooltip" title="Delete <?php echo e($client->name_short); ?>"
                          data-original-title="soft ">
                          <i class="fa fa-trash">
                          </i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Name Long</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Creation Date</th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/clients/index.blade.php ENDPATH**/ ?>