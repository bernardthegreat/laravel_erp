

<?php $__env->startSection('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Revenue
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/revenue">Revenue</a></li>
                    <li class="breadcrumb-item active">Payments</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Payments
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
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true">Debts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false">Paid</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">


                            <table id="example2" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Sold Date</th>
                                        <th>Client</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(is_null($sale->paid_on)): ?>
                                    
                                    <tr>
                                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($sale->created_at))); ?> </td>
                                        <td> <?php echo e($sale->client_name); ?> </td>
                                        <td> <?php echo e($sale->item_name); ?> </td>
                                        <td> <?php echo e($sale->dr_no); ?> </td>
                                        <td> 

                                            <div class="btn-group">
                                                <a class="btn btn-danger btn-sm process_payment_btn" href="#"
                                                    data-dr-number="<?php echo e($sale->dr_no ?? ''); ?>"
                                                    data-invoice-number="<?php echo e($sale->invoice_no ?? ''); ?>"
                                                    data-url="<?php echo e(route('process_payment')); ?>"
                                                    data-toggle="modal"
                                                    data-target="#modal-default" data-placement="top"
                                                    data-placement="top" rel="tooltip" title="Mark as Paid DR # <?php echo e($sale->invoice_no); ?>"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-money-bill-alt">
                                                    </i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sold Date</th>
                                        <th>Client</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                        <th> </th>
                                    </tr>
                                </tfoot>
                            </table>


                          

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">

                            
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Sold Date</th>
                                        <th>Client</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!is_null($sale->paid_on)): ?>
                                    <tr>
                                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($sale->created_at))); ?> </td>
                                        <td> <?php echo e($sale->client_name); ?> </td>
                                        <td> <?php echo e($sale->item_name); ?> </td>
                                        <td> <?php echo e($sale->dr_no); ?> </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sold Date</th>
                                        <th>Client</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                    </tr>
                                </tfoot>
                            </table>


                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>


            <div class="modal fade modal-process-payment" id="modal-default">
                <form method="post" action="" id="process-payment">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Pay DR #<span id="data-dr-number-view"> </span> </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                    <?php echo csrf_field(); ?>
                                    
                                    <input type="hidden" id="data-invoice-number">
                                    <input type="hidden" id="data-dr-number" name="dr_no">
                                    <label for="payment_date"> Paid on </label>
                                    <div class="form-group">
                                        <div class="input-group date" id="payment_date" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                            value="<?php echo date('m/d/Y h:i:s A'); ?>"
                                            autocomplete="off" value="" 
                                            name="paid_on" data-target="#payment_date" data-placement="top" rel="tooltip" title="Click the icon on the right side to display the calendar" data-original-title="Click the icon on the right side to display the calendar">
                                            <div class="input-group-append" data-target="#payment_date" data-toggle="datetimepicker">
                                                <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>


                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Pay</button>
                            </div>

                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                <!-- /.modal-dialog -->
                </form>
            </div>
            <!-- /.modal -->




        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<!-- Main content -->

<script>
    $(document).ready(function () {

        $('.process_payment_btn').click(function () {
            var invoice_number = $(this).attr('data-invoice-number');
            var dr_number = $(this).attr('data-dr-number');
            var receive_url = $(this).attr('data-url');

            $("#data-invoice-number").attr("value", invoice_number);
            $("#data-dr-number").attr("value", dr_number);
            $("#data-dr-number-view").html(dr_number);
            $("#process-payment").attr("action", receive_url);


        });

        $('#modal-receive-purchase').on('shown.bs.modal', function () {
            $('#dr_no').focus();
        });

        $('[rel="tooltip"]').tooltip({
            trigger: "hover"
        });

        $(".delete").on("click", function () {
            return confirm("Do you want to delete this?");
        });
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/sales/payments.blade.php ENDPATH**/ ?>