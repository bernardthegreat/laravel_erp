

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
          <li class="breadcrumb-item active">Edit Payroll</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        Update Payroll
      </h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      
      <form role="form" method="post" action="<?php echo e(route('employees.payroll_update', $payroll->id)); ?>">

        <div class="card-body">
          <?php echo csrf_field(); ?>
          <?php echo method_field('POST'); ?>

          <div class="form-group">
            <label for="cost">From Date</label>
            <div class="input-group mb-3 date" id="utilities_coverage" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#utilities_coverage"
                name="from_date"
                autocomplete="off"
                data-placement="top" rel="tooltip" 
                value="<?php echo e(date('m/d/Y', strtotime($payroll->from_date))); ?>"
                title="Click the icon on the right side to display the calendar" 
                data-original-title="Click the icon on the right side to display the calendar"
              >
              <div class="input-group-append" data-target="#utilities_coverage" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div> 
          </div>

          <div class="form-group">
            <label for="cost">To Date</label>
            <div class="input-group mb-3 date" id="utilities_to_date" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#utilities_to_date"
                name="to_date"
                autocomplete="off"
                data-placement="top" rel="tooltip" 
                value="<?php echo e(date('m/d/Y', strtotime($payroll->to_date))); ?>"
                title="Click the icon on the right side to display the calendar" 
                data-original-title="Click the icon on the right side to display the calendar"
              >
              <div class="input-group-append" data-target="#utilities_to_date" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div> 
          </div>

          <div class="form-group">
            <label for="cost">Cost</label>
            <input type="number" class="form-control" name="cost" id="cost" value="<?php echo e($payroll->cost); ?>" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="cost">Additional Pay</label>
            <input type="number" class="form-control" name="addl_pay" id="addl_pay" value="<?php echo e($payroll->addl_pay); ?>" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="cost">Deduction</label>
            <input type="number" class="form-control" name="deduction" id="deduction" value="<?php echo e($payroll->deduction); ?>" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="cost">Remarks</label>
            <textarea class="form-control" autocomplete="off" name="remarks"><?php echo e($payroll->remarks); ?></textarea>
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
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/employees/edit_employee_payroll.blade.php ENDPATH**/ ?>