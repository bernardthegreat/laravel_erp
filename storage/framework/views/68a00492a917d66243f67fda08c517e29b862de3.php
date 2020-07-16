

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-3">
              <h1>
                  Items
              </h1>
          </div>
          <div class="col-sm-9">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?php echo e(route('items_index')); ?>">Items</a></li>
                  <li class="breadcrumb-item active">Update <?php echo e($items->name_long); ?></li>
              </ol>
          </div>
      </div>
  </div>
</section>

<section class="content">
  <div class="card">
      <div class="card-header">
          <h3 class="card-title">
              Update <?php echo e($items->name_long); ?>

          </h3>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
                  <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                  title="Remove">
                  <i class="fas fa-times"></i></button>
          </div>
      </div>
      <div class="card-body">
          <form role="form" method="post" action="<?php echo e(route('items.update', $items->id)); ?>">
              <div class="card-body">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PATCH'); ?>
                  <div class="form-group">
                      <label for="name_long">Name</label>
                      <input type="text" class="form-control" name="name_long" id="name_long"
                          value="<?php echo e($items->name_long); ?>" autocomplete="off">
                  </div>
                  <div class="form-group">
                      <label for="name_long">Supplier</label>
                      <select name="supplier_id" class="custom-select" id="supplier_id">
                          <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($suppliers->id); ?>" <?php echo e(( $suppliers->id == $items->supplier_id) ? 'selected' : ''); ?>>
                              <?php echo e($suppliers->name_long); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="unit">Unit</label>
                      <input type="text" class="form-control" name="unit" id="unit"
                          value="<?php echo e($items->unit); ?>" autocomplete="off">
                  </div>
                  <div class="form-group">
                      <label for="remarks">Classification</label>
                      <input type="text" class="form-control" name="remarks" id="remarks"
                          value="<?php echo e($items->remarks); ?>" autocomplete="off">
                  </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Submit</button>
              </div>
          </form>
      </div>
  </div>
</section>

<script>
  $(document).ready(function () {
    $('[rel="tooltip"]').tooltip({
        trigger: "hover"
    });

    $(".delete").on("click", function () {
        return confirm("Do you want to delete this?");
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/items/edit.blade.php ENDPATH**/ ?>