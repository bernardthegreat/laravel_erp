

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
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('img/avatar.png')); ?>"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"> <?php echo e($employees->first_name); ?> <?php echo e($employees->middle_name); ?>

                            <?php echo e($employees->last_name); ?> <?php echo e($employees->name_suffix); ?> </h3>

                        <!-- <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Total Sales</b> <a class="float-right">1,322</a>
                            </li>
                        </ul> -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
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
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="card card-danger card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                            href="#custom-tabs-four-home" role="tab"
                                            aria-controls="custom-tabs-four-home" aria-selected="true">Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                            href="#custom-tabs-four-profile" role="tab"
                                            aria-controls="custom-tabs-four-profile" aria-selected="false">Payroll</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-salary-rate-tab" data-toggle="pill"
                                            href="#custom-tabs-four-salary-rate" role="tab"
                                            aria-controls="custom-tabs-four-salary-rate" aria-selected="false">Salary Rate</a>
                                    </li>                                    
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-home-tab">

                                        <form role="form" method="post"
                                            action="<?php echo e(route('employees.update', $employees->id )); ?>">

                                            <div class="card-body">

                                                <div class="form-group">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" id=""
                                                        value="<?php echo e($employees->first_name); ?>" placeholder="First Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle_name">Middle Name</label>
                                                    <input type="text" class="form-control" name="middle_name" id=""
                                                        value="<?php echo e($employees->middle_name); ?>" placeholder="Middle Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" id=""
                                                        value="<?php echo e($employees->last_name); ?>" placeholder="Last Name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="prefix">Name Suffix</label>
                                                    <input type="text" class="form-control" name="prefix" id="prefix"
                                                        value="<?php echo e($employees->prefix); ?>" placeholder="Prefix"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="prefix">Address</label>
                                                    <input type="text" class="form-control" name="address" id="address"
                                                        value="<?php echo e($employees->address); ?>" placeholder="Address"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="prefix">Contact #</label>
                                                    <input type="text" class="form-control" name="contact_no"
                                                        id="contact_no" value="<?php echo e($employees->contact_no); ?>"
                                                        placeholder="Contact #" autocomplete="off">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-profile-tab">

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
                                                    <td> <?php echo e(date('m/d/Y', strtotime($payroll->from_date))); ?> - <?php echo e(date('m/d/Y', strtotime($payroll->to_date))); ?> </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-danger btn-sm"
                                                                href="<?php echo e(route('get_payslip', $payroll->id)); ?>"
                                                                target="_blank"
                                                                data-placement="top" rel="tooltip"
                                                                title="Print Payslip of <?php echo e($employees->first_name); ?> "
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

                                    <div class="tab-pane fade" id="custom-tabs-four-salary-rate" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-salary-rate-tab">

                                        <table id="desc_second_column2" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Hourly Fee</th>
                                                    <th>Creation Date</th>
                                                    <th>Update Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $__currentLoopData = $salary_rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary_rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($salary_rate->hourly_fee); ?></td>
                                                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($salary_rate->created_at))); ?> </td>
                                                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($salary_rate->updated_at))); ?> </td>
                                                        
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Hourly Fee</th>
                                                    <th>Creation Date</th>
                                                    <th>Update Date</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.card -->





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/employees/edit.blade.php ENDPATH**/ ?>