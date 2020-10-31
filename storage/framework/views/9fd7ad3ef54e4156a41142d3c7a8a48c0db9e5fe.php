

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Employees
                </h1>

                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Register Employees</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="<?php echo e(route('employees.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="input-group mb-3">
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="First Name" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="middle_name" class="form-control"
                                            placeholder="Middle Name" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                            autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="name_suffix" class="form-control"
                                            placeholder="Name Suffix" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="address" class="form-control" placeholder="Address"
                                            autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="contact_no" class="form-control"
                                            placeholder="Contact #" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="remarks" class="form-control" placeholder="Remarks"
                                            autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>



                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <div class="modal fade" id="modal-attendance">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Daily Time Record</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form method="post" action="<?php echo e(route('time_in_and_out')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="input-group mb-3">
                                        <input type="text" name="employee_code" id="employee_code" class="form-control"
                                            placeholder="Employee Code" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-clock"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <table id="example3" class="table table-bordered table-striped text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Fullname</th>
                                                        <th>Time In</th>
                                                        <th>Time Out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($attendance_employee->code); ?> </td>
                                                        <td> <?php echo e($attendance_employee->fullname); ?> </td>
                                                        <td> 
                                                            <?php if(isset($attendance_employee->from_time)): ?>
                                                                <?php echo e(date('h:i:s A', strtotime($attendance_employee->from_time))); ?> 
                                                            <?php endif; ?>
                                                        </td>
                                                        <td> 
                                                            <?php if(isset($attendance_employee->to_time)): ?>
                                                                <?php echo e(date('h:i:s A', strtotime($attendance_employee->to_time))); ?> 
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Fullname</th>
                                                        <th>Time In</th>
                                                        <th>Time Out</th>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </form>


                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <div class="modal fade modal-process-payment" id="modal-payroll">
                    <form method="post" action="" id="data-payroll-url">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Payroll<span id="data-fullname"> </span> </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" id="data-employee-id" name="employee_id">
                                    <div class="form-group">
                                        <label>Payroll Coverage:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="coverage_payroll_date"
                                                class="form-control float-right" id="reservation">
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" name="cost" id="deduction" class="form-control"
                                            placeholder="Cost" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-money-bill"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" name="additional_pay" id="additional_pay" class="form-control"
                                            placeholder="Additional Pay" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-money-bill"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" name="deduction" id="deduction" class="form-control"
                                            placeholder="Deductions" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-money-bill"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                      <textarea name="remarks"  class="form-control" placeholder="Remarks"></textarea>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <table id="" class="table table-bordered table-striped text-center">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Latest Payroll</th>
                                                    </tr>
                                                    <tr>
                                                        <th>From</th>
                                                        <th>To</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td id="data-from-date">  </td>
                                                        <td id="data-to-date"> </td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="data-payslip-url" class="btn btn-danger" onClick="">Process Payroll</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </form>
                </div>
                
            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="card-tools btn-group">
                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal"
                        data-target="#modal-default" data-placement="top" rel="tooltip" title="Register Employee">
                        <i class="fa fa-plus"> </i>
                    </button>

                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal"
                        data-target="#modal-attendance" data-placement="top" rel="tooltip" title="Daily Time Record">
                        <i class="fa fa-clock"> </i>
                    </button>
                </div>
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

            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact #</th>
                        <th>Creation Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($employee->code); ?> </td>
                        <td> <?php echo e($employee->fullname); ?> </td>
                        <td> <?php echo e($employee->address); ?> </td>
                        <td> <?php echo e($employee->contact_no); ?></td>
                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($employee->created_at))); ?> </td>
                        <td>
                            <div class="btn-group">

                                <!-- <a class="btn btn-danger btn-sm btn-payroll" href="#" data-placement="top" rel="tooltip"
                                    title="Payroll for <?php echo e($employee->fullname); ?>" data-original-title="Payroll"
                                    data-toggle="modal" data-target="#modal-payroll"
                                    data-employee-id="<?php echo e($employee->id); ?>" 
                                    data-url="<?php echo e(route('process_payroll')); ?>"
                                    data-payslip-url="window.open('<?php echo e(route('generate_latest_payslip', $employee->id            )); ?>', '_blank')"
                                    data-payroll-from="<?php echo e($employee->from_date ? date('m/d/Y', strtotime($employee->from_date)) : ''); ?>"
                                    data-payroll-to="<?php echo e($employee->to_date ? date('m/d/Y', strtotime($employee->to_date)) : ''); ?>"
                                >
                                    <i class="fa fa-money-check-alt">
                                    </i>
                                </a> -->


                                <a class="btn btn-danger btn-sm btn-payroll" href="#" data-placement="top" rel="tooltip"
                                    title="Payroll for <?php echo e($employee->fullname); ?>" data-original-title="Payroll"
                                    data-toggle="modal" data-target="#modal-payroll"
                                    data-employee-id="<?php echo e($employee->id); ?>" 
                                    data-url="<?php echo e(route('process_payroll')); ?>"
                                    data-payroll-from="<?php echo e($employee->from_date ? date('m/d/Y', strtotime($employee->from_date)) : ''); ?>"
                                    data-payroll-to="<?php echo e($employee->to_date ? date('m/d/Y', strtotime($employee->to_date)) : ''); ?>"
                                >
                                    <i class="fa fa-money-check-alt">
                                    </i>
                                </a>

                                <a class="btn btn-danger btn-sm" href="<?php echo e(route('generate_latest_payslip', $employee->id)); ?>" target="_blank"
                                    data-placement="top" rel="tooltip" title="Print Latest Payslip of <?php echo e($employee->fullname); ?>"
                                    data-original-title="Edit">
                                    <i class="fa fa-print">
                                    </i>
                                </a>

                                <a class="btn btn-danger btn-sm" href="<?php echo e(route('employees.edit', $employee->id)); ?>"
                                    data-placement="top" rel="tooltip" title="Edit <?php echo e($employee->fullname); ?>"
                                    data-original-title="Edit">
                                    <i class="fa fa-edit">
                                    </i>
                                </a>

                                <a class="btn btn-danger btn-sm delete"
                                    href="<?php echo e(route('employees.soft_delete', $employee->id)); ?> " data-placement="top"
                                    rel="tooltip" title="Delete <?php echo e($employee->fullname); ?>" data-original-title="soft ">
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
                        <th>Code</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact #</th>
                        <th>Creation Date</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<script>
    $(document).ready(function () {
        $('[rel="tooltip"]').tooltip({
            trigger: "hover"
        });

        $('#reservation').daterangepicker()

        $(".delete").on("click", function () {
            return confirm("Do you want to delete this?");
        });

        $('.btn-payroll').click(function () {
            var employee_id = $(this).attr('data-employee-id');
            var payroll_url = $(this).attr('data-url');
            var data_payroll_from = $(this).attr('data-payroll-from');
            var data_payroll_to = $(this).attr('data-payroll-to');
            var payslip_url = $(this).attr('data-payslip-url');

            $("#data-employee-id").attr("value", employee_id);
            $("#data-payroll-url").attr("action", payroll_url);
            $("#data-payslip-url").attr("onClick", payslip_url);
            $("#data-from-date").html(data_payroll_from);
            $("#data-to-date").html(data_payroll_to);
        });

        $('#modal-attendance').on('shown.bs.modal', function () {
            $('#employee_code').focus();
        });
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/employees/index.blade.php ENDPATH**/ ?>