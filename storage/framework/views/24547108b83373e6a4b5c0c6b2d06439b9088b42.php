

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Billing Statement</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/clients">Clients</a></li>
                    <li class="breadcrumb-item active">Billing Statement</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="<?php echo e(asset('img/company.jpeg')); ?>" width="180px" height="80px">
                                <small class="float-right">Date: <?php echo date('m/d/Y'); ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Huat-Hok Rice Trading, Inc.</strong><br>
                                Address: 1082 Del Monte Avenue, Quezon City <br>
                                Phone #: (02) 750-37473 <br>
                                Cellphone #: 09228808104 / 0178958156
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?php echo e($clients->name_long); ?></strong><br>
                                Address: <?php echo e($clients->address); ?><br>
                                Contact #: <?php echo e($clients->contact_no); ?>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <!-- <b>Invoice #007612</b><br> -->
                            <!-- <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Payment Due:</b> 2/22/2014<br>
                            <b>Account:</b> 968-34567 -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>DR #</th>
                                        <th>Qty</th>
                                        <th>Item</th>
                                        <th>Additional Fee</th>
                                        <th>Discount</th>
                                        <th>Date Sold</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                                    <?php $__currentLoopData = $break_downs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_down): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($break_down->dr_no); ?></td>
                                        <td><?php echo e($break_down->qty); ?></td>
                                        <td><?php echo e($break_down->name_long); ?></td>
                                        <td><?php echo e($break_down->addl_fee); ?></td>
                                        <td><?php echo e($break_down->discount); ?></td>
                                        <td><?php echo e(date('m/d/Y h:i:s A', strtotime($break_down->created_at))); ?></td>
                                        <td>
                                            <?php echo e($break_down->cost); ?>

                                            <?php 
                                              $total += $break_down->cost * $break_down->qty; 
                                            ?>
                                        </td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <!-- <p class="lead">Payment Methods:</p>
                            <img src="../../dist/img/credit/visa.png" alt="Visa">
                            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                            <img src="../../dist/img/credit/american-express.png" alt="American Express">
                            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                handango imeem
                                plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p> -->
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                            <div class="table-responsive">
                                <table class="table">
                                    
                                    <tr>
                                        <th>Total:</th>
                                        <td><?php echo number_format($total, 2); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a> -->
                            <a href="/sales/print_bill/<?php echo e($clients->id); ?>" target="_blank"class="btn btn-success float-right" 
                                 data-placement="top" rel="tooltip" title="Bill"><i
                                    class="far fa-credit-card"></i>
                                Print Billing Statement
                            </a>
                            <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button> -->
                        </div>

                    

                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    $(document).ready(function () {

        $('#modal-default').on('shown.bs.modal', function () {
            $('#invoice_no').focus();
        });

    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/sales/bill_client.blade.php ENDPATH**/ ?>