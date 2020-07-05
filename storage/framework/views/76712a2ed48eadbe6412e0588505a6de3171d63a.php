

<?php $__env->startSection('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">WebERP</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">

    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>
                        <?php if(isset($gross_income_today[0]->cost)): ?>
                            <?php echo e($gross_income_today[0]->cost); ?>

                        <?php else: ?>
                            0
                        <?php endif; ?>

                    </h3>

                    <p>Gross Income Today</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money-check-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                        <?php if(isset($gross_expense_today[0]->cost)): ?>
                            <?php echo e($gross_expense_today[0]->cost); ?>

                        <?php else: ?>
                            0
                        <?php endif; ?>
                    </h3>

                    <p>Gross Expense Today</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>
                        <?php if(isset($count_pending_delivery_supplies)): ?>
                            <?php echo e($count_pending_delivery_supplies); ?>

                        <?php endif; ?>
                    </h3>

                    <p>Purchased Delivery Pendings</p>
                </div>
                <div class="icon">
                    <i class="fas fa-truck"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>
                        <?php if(isset($count_client_dues)): ?>
                            <?php echo e($count_client_dues); ?>

                        <?php endif; ?>
                    </h3>

                    <p>Client Dues</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

</section>



<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daily Reporting</h3>

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
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true">Stock Counts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false">Due Clients</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-pending-delivery-tab" data-toggle="pill"
                                href="#custom-tabs-four-pending-delivery" role="tab" aria-controls="custom-tabs-four-pending-delivery"
                                aria-selected="false">Purchased Delivery Pendings</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">

                            <table id="desc_second_column2" class="table table-bordered table-striped text-center">
                                <thead>
                                    
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $stock_counts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock_count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e($stock_count->item_name); ?> </td>
                                            <td> <?php echo e($stock_count->qty); ?> </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">

                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    
                                    <tr>
                                        <th>Client</th>
                                        <th>Debt Cost</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $client_dues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client_due): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e($client_due->name_long); ?> </td>
                                            <td> <?php echo e($client_due->debt_cost); ?> </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Client</th>
                                        <th>Debt Cost</th>
                                    </tr>
                                </tfoot>
                            </table>
                          
                        </div>
                    
                        <div class="tab-pane fade" id="custom-tabs-four-pending-delivery" role="tabpanel"
                            aria-labelledby="custom-tabs-four-pending-delivery-tab">

                            <table id="example3" class="table table-bordered table-striped text-center">
                                <thead>
                                
                                    <tr>
                                        <th>Supplier</th>
                                        <th>Cost</th>
                                        <th>Quantity</th>
                                        <th>Purchased Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $pending_delivery_supplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pending_delivery_supply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e($pending_delivery_supply->item_name); ?> </td>
                                            <td> <?php echo e($pending_delivery_supply->cost); ?> </td>
                                            <td> <?php echo e($pending_delivery_supply->quantity); ?> </td>
                                            <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($pending_delivery_supply->purchased_date))); ?> </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Supplier</th>
                                        <th>Cost</th>
                                        <th>Quantity</th>
                                        <th>Purchased Date</th>
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
    <!-- /.card -->

</section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/main_dashboard.blade.php ENDPATH**/ ?>