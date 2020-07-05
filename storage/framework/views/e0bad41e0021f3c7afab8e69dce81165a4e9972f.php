

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Client Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo e($clients->name_long); ?></li>
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

                        <h3 class="profile-username text-center"><?php echo e($clients->name_long); ?> </h3>

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
                

            <div class="card card-danger card-tabs">

                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                            href="#custom-tabs-four-home" role="tab"
                                            aria-controls="custom-tabs-four-home" aria-selected="true">Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-payments-tab" data-toggle="pill"
                                            href="#custom-tabs-four-payments" role="tab"
                                            aria-controls="custom-tabs-four-payments" aria-selected="false">Payments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-debts-tab" data-toggle="pill"
                                            href="#custom-tabs-four-debts" role="tab"
                                            aria-controls="custom-tabs-four-debts" aria-selected="false">Debts</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-soa-tab" data-toggle="pill"
                                            href="#custom-tabs-four-soa" role="tab"
                                            aria-controls="custom-tabs-four-soa" aria-selected="false">SOA</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-home-tab">

                                        <form role="form" method="post" action="<?php echo e(route('clients.update', $clients->id )); ?>">

                                            <div class="card-body">

                                                <div class="form-group">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <label for="name_short">Name Short</label>
                                                    <input type="text" class="form-control" name="name_short" id="name_short"
                                                        value="<?php echo e($clients->name_short); ?>" placeholder="Name Short">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name_long">Name Long</label>
                                                    <input type="text" class="form-control" name="name_long" id="name_long"
                                                        value="<?php echo e($clients->name_long); ?>" placeholder="Name Long">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="payment_term">Terms</label>
                                                    <input type="text" class="form-control" name="payment_term" id="payment_term"
                                                        value="<?php echo e($clients->payment_term); ?>" placeholder="Terms">
                                                </div>

                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" name="address" id="address"
                                                        value="<?php echo e($clients->address); ?>" placeholder="Address">
                                                </div>

                                                <div class="form-group">
                                                    <label for="contact_no">Contact #</label>
                                                    <input type="text" class="form-control" name="contact_no" id="contact_no"
                                                        value="<?php echo e($clients->contact_no); ?>" placeholder="Contact #">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-payments" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-payments-tab">
                                    

                                        <table id="example1" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sold Date</th>
                                                    <th>Invoice #</th>
                                                    <th>Item</th>
                                                    <th>Paid Date</th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($payment->created_at))); ?> </td>
                                                    <td> <?php echo e($payment->invoice_no); ?> </td>
                                                    <td> <?php echo e($payment->name_long); ?> </td>
                                                    <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($payment->paid_on))); ?></td>
                                                    
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-danger btn-sm"
                                                                href=""
                                                                data-placement="top" rel="tooltip"
                                                                title=""
                                                                data-original-title="Edit">
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
                                                    <th>Sold Date</th>
                                                    <th>Invoice #</th>
                                                    <th>Item</th>
                                                    <th>Paid Date</th>
                                                    <th> </th>
                                                </tr>
                                            </tfoot>
                                        </table>


                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-four-debts" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-debts-tab">


                                        <table id="table_without_search1" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sold Date</th>
                                                    <th>Items</th>
                                                    <th>DR #</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $total_qty = 0; 
                                                    $total_debts = 0; 
                                                ?>
                                                <?php $__currentLoopData = $debts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($debt->created_at))); ?> </td>
                                                    <td> <?php echo e($debt->name_long); ?> </td>
                                                    <td> <?php echo e($debt->invoice_no); ?> </td>
                                                    <td> <?php echo e($debt->qty); ?> </td>
                                                    <td> <?php echo e($debt->cost); ?></td>
                                                    <td> 
                                                        <div class="btn-group">
                                                            <a class="btn btn-danger btn-sm" href=""
                                                                data-placement="top" rel="tooltip" title="Edit"
                                                                data-original-title="Edit">
                                                                <i class="fa fa-edit">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>

                                                <?php 
                                                    $total_qty += $debt->qty;
                                                    $total_debts += $debt->cost;
                                                ?>
                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo e($total_qty); ?></td>
                                                    <td><?php echo e(number_format($total_debts,2)); ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-danger btn-sm"
                                                                href="<?php echo e(route('generate_billing_statement', $clients->id)); ?>" data-placement="top"
                                                                rel="tooltip" title="Bill <?php echo e($clients->name_short); ?>">
                                                                <i class="fa fa-money-bill">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Sold Date</th>
                                                    <th>Items</th>
                                                    <th>DR #</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th> </th>
                                                </tr>
                                                
                                            </tfoot>
                                        </table>

                                    </div>


                                    <div class="tab-pane fade" id="custom-tabs-four-soa" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-soa-tab">


                                        <table id="example2" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sold Date</th>
                                                    <th>Items</th>
                                                    <th>DR #</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $total_qty = 0; 
                                                    $total_debts = 0; 
                                                ?>
                                                <?php $__currentLoopData = $soa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($account->created_at))); ?> </td>
                                                    <td> <?php echo e($account->name_long); ?> </td>
                                                    <td> <?php echo e($account->invoice_no); ?> </td>
                                                    <td> <?php echo e($account->qty); ?> </td>
                                                    <td> <?php echo e($account->cost); ?></td>
                                                    <td> 
                                                        <div class="btn-group">
                                                            <a class="btn btn-danger btn-sm" href=""
                                                                data-placement="top" rel="tooltip" title="Edit"
                                                                data-original-title="Edit">
                                                                <i class="fa fa-edit">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>

                                                <?php 
                                                    $total_qty += $account->qty;
                                                    $total_debts += $account->cost;
                                                ?>
                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo e($total_qty); ?></td>
                                                    <td><?php echo e(number_format($total_debts,2)); ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-danger btn-sm"
                                                                href="<?php echo e(route('generate_billing_statement', $clients->id)); ?>" data-placement="top"
                                                                rel="tooltip" title="Bill <?php echo e($clients->name_short); ?>">
                                                                <i class="fa fa-money-bill">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Sold Date</th>
                                                    <th>Items</th>
                                                    <th>DR #</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th> </th>
                                                </tr>
                                                
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>



                    

                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.card -->





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/clients/edit.blade.php ENDPATH**/ ?>