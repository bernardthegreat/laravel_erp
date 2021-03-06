

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Items
        </h1>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo e(route('items.store')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="input-group mb-3">
                    <select name="supplier_id" class="custom-select" id="supplier_id" data-placement="right"
                      rel="tooltip" title="Suppliers">
                      <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($suppliers->id); ?>"><?php echo e($suppliers->name_long); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="name_long" class="form-control" placeholder="Name" autocomplete="off"
                      required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-box"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="remarks" class="form-control" placeholder="Classification"
                      autocomplete="off">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-box"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="unit" class="form-control" placeholder="Unit" autocomplete="off" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-box"></span>
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
          <li class="breadcrumb-item active">Items</li>
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
          data-placement="top" rel="tooltip" title="Create Item">
          <i class="fa fa-plus"> </i>
        </button>
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th>Supplier</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Classification</th>
            <th>Creation Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td> <?php echo e($item->suppliers->name_long); ?> </td>
            <td> <?php echo e($item->name_long); ?> </td>
            <td> <?php echo e($item->unit); ?> </td>
            <td> <?php echo e($item->remarks); ?> </td>
            <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($item->created_at))); ?> </td>
            <td>
              <div class="btn-group">
                <a class="btn btn-danger btn-sm" href="<?php echo e(route('items.edit', $item->id)); ?>" data-placement="top"
                  rel="tooltip" title="Edit <?php echo e($item->name_long); ?>" data-original-title="Edit">
                  <i class="fa fa-edit">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm delete" href="<?php echo e(route('items.soft_delete', $item->id)); ?> "
                  data-placement="top" rel="tooltip" title="Delete <?php echo e($item->name_long); ?>" data-original-title="soft ">
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
            <th>Supplier</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Classification</th>
            <th>Creation Date</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/items/index.blade.php ENDPATH**/ ?>