

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Utilities
        </h1>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Utilities</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo e(route('utilities.store')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="input-group mb-3">
                    <select id="items" name="utility_type_id" class="custom-select" style="width: 100px;"
                      data-placement="right" rel="tooltip" title="Utility Type">
                      <?php $__currentLoopData = $utility_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utility_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($utility_type->id); ?>">
                        <?php echo e($utility_type->name_long); ?>

                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="cost" class="form-control" placeholder="Cost" autocomplete="off" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="remarks" class="form-control" placeholder="Month Coverage" autocomplete="off">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                    </div>
                  </div>                  
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-default2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Utility Types</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo e(route('utility_types.store')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="input-group mb-3">
                    <input type="text" name="name_long" class="form-control" placeholder="Name" autocomplete="off"
                      required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-bolt"></span>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
          <li class="breadcrumb-item active">Utilities</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <div class="card-tools btn-group">
          <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-default"
            data-placement="top" rel="tooltip" title="Add Utility">
            <i class="fa fa-plus"> </i>
          </button>
          <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-default2"
            data-placement="top" rel="tooltip" title="Add Utility Types">
            <i class="fa fa-bolt"> </i>
          </button>
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
      <div class="row">
        <div class="col-sm-7">
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th colspan="4"> Utilities </th>
              </tr>
              <tr>
                <th>Utility Type</th>
                <th>Cost</th>
                <th>Coverage</th>
                <th>Creation Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $utilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td> <?php echo e($utility->utility_types->name_long); ?> </td>
                <td> <?php echo e($utility->cost); ?> </td>
                <td> <?php echo e($utility->remarks); ?> </td>
                <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($utility->created_at))); ?> </td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('utilities.edit', $utility->id)); ?>"
                      data-placement="top" rel="tooltip" title="Edit <?php echo e($utility->utility_types->name_long); ?>"
                      data-original-title="Edit">
                      <i class="fa fa-edit">
                      </i>
                    </a>
                    <a class="btn btn-danger btn-sm delete" href="<?php echo e(route('utilities.soft_delete', $utility->id)); ?> "
                      data-placement="top" rel="tooltip" title="Delete <?php echo e($utility->utility_types->name_long); ?>"
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
                <th>Utility Type</th>
                <th>Cost</th>
                <th>Coverage</th>
                <th>Creation Date</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-sm-5">
          <table id="example2" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th colspan="4"> Utilities Types </th>
              </tr>
              <tr>
                <th>Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $utility_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utility_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td> <?php echo e($utility_type->name_long); ?> </td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('utility_types.edit', $utility_type->id)); ?>"
                      data-placement="top" rel="tooltip" title="Edit <?php echo e($utility_type->name_long); ?>"
                      data-original-title="Edit">
                      <i class="fa fa-edit">
                      </i>
                    </a>
                    <a class="btn btn-danger btn-sm delete"
                      href="<?php echo e(route('utility_types.soft_delete', $utility_type->id)); ?> " data-placement="top"
                      rel="tooltip" title="Delete <?php echo e($utility_type->name_long); ?>" data-original-title="soft ">
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
                <th>Name</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/utilities/index.blade.php ENDPATH**/ ?>