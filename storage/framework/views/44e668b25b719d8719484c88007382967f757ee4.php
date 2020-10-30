

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Employee Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/employees">Employees</a></li>
          <li class="breadcrumb-item active"><?php echo e($employees->first_name); ?> <?php echo e($employees->middle_name); ?>

            <?php echo e($employees->last_name); ?> <?php echo e($employees->name_suffix); ?></li>
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
            <h3 class="profile-username text-center"> <?php echo e($employees->first_name); ?> <?php echo e($employees->middle_name); ?>

              <?php echo e($employees->last_name); ?> <?php echo e($employees->name_suffix); ?> </h3>
            <p class="text-muted text-center"> <?php echo e($employees->contact_no); ?> </p>
          </div>
        </div>
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Salary Rates</h3>
              <div class="card-tools">
                <a class="btn btn-danger btn-sm" href="#" 
                  data-toggle="modal"
                  data-target="#modal-salary-rates"
                  data-placement="top" rel="tooltip" title="Edit Salary Rate of <?php echo e($employees->fullname); ?>"
                >
                  <i class="fa fa-plus">
                  </i>
                </a>
              </div>
            </div>
            <div class="card-body mb-4" style="height:600px; overflow-y:auto;">
              <table class="table table-bordered table-striped text-center">
                <?php $__currentLoopData = $salary_rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary_rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th>
                    Hourly Fee.: <?php echo e($salary_rate->hourly_fee); ?> <br>
                  </th>
                  <td>
                    Created: <?php echo e(date('m/d/Y h:i:s A', strtotime($salary_rate->created_at))); ?>

                  </td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('employees.edit_salary_rates', $salary_rate->id)); ?>"
                        data-placement="top" rel="tooltip" title="Edit Salary Rate"
                        data-original-title="Edit">
                        <i class="fa fa-edit">
                        </i>
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
              <?php echo e($employees->first_name); ?> <?php echo e($employees->middle_name); ?>

              <?php echo e($employees->last_name); ?> <?php echo e($employees->name_suffix); ?>

            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <form role="form" method="post" action="<?php echo e(route('employees.update', $employees->id )); ?>">
              <div class="form-group">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="" value="<?php echo e($employees->first_name); ?>"
                  placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" name="middle_name" id="" value="<?php echo e($employees->middle_name); ?>"
                  placeholder="Middle Name">
              </div>
              <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="" value="<?php echo e($employees->last_name); ?>"
                  placeholder="Last Name">
              </div>
              <div class="form-group">
                <label for="prefix">Name Suffix</label>
                <input type="text" class="form-control" name="name_suffix" id="Name Suffix" value="<?php echo e($employees->name_suffix); ?>"
                  placeholder="Prefix" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="prefix">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo e($employees->address); ?>"
                  placeholder="Address" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="prefix">Contact #</label>
                <input type="text" class="form-control" name="contact_no" id="contact_no"
                  value="<?php echo e($employees->contact_no); ?>" placeholder="Contact #" autocomplete="off">
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
              Payroll
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Hours Worked</th>
                  <th>Cost</th>
                  <th>Coverage</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $payrolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td> <?php echo e($payroll->hours_worked); ?></td>
                  <td> <?php echo e($payroll->cost); ?></td>
                  <td> <?php echo e(date('m/d/Y', strtotime($payroll->from_date))); ?> -
                    <?php echo e(date('m/d/Y', strtotime($payroll->to_date))); ?> </td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-danger btn-sm" href="<?php echo e(route('get_payslip', $payroll->id)); ?>" target="_blank"
                        data-placement="top" rel="tooltip" title="Print Payslip of <?php echo e($employees->first_name); ?> "
                        data-original-title="">
                        <i class="fa fa-print">
                        </i>
                      </a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Hours Worked</th>
                  <th>Cost</th>
                  <th>Coverage</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <div class="modal fade modal-process-payment" id="modal-salary-rates">
          <form method="post" action="<?php echo e(route('employees.add_salary_rates', $employees->id )); ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Salary Rate </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="data-employee-id" name="employee_id" value="<?php echo e($employees->id); ?>">
                    <div class="input-group mb-3">
                      <input type="number" name="hourly_fee" id="hourly_fee" class="form-control"
                          placeholder="Hourly Fee" autocomplete="off" required>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-money-bill"></span>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="data-salaryrate-url" class="btn btn-danger" onClick="">Save Salary Rate</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/employees/edit.blade.php ENDPATH**/ ?>