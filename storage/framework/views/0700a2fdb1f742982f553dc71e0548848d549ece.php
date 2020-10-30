

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Employees
        </h1>

      </div>
      <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/employees">Employees</a></li>
          <li class="breadcrumb-item active">Edit Salary Rate</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        Update Salary Rate
      </h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      
      <form role="form" method="post" action="<?php echo e(route('employees.update_salary_rate', $salary_rates->id)); ?>">

        <div class="card-body">
          <?php echo csrf_field(); ?>
          <?php echo method_field('POST'); ?>

          <div class="form-group">
            <label for="dr_no">Hourly Fee</label>
            <input type="text" class="form-control" name="hourly_fee" id="hourly_fee" value="<?php echo e($salary_rates->hourly_fee); ?>" autocomplete="off">
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
$(document).ready(function() {
  $('[rel="tooltip"]').tooltip({
    trigger: "hover"
  });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/employees/edit_salary_rates.blade.php ENDPATH**/ ?>