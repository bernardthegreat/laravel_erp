

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Revenue
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/revenue">Revenue</a></li>
                    <li class="breadcrumb-item active">Update Revenue</li>
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
                Update Revenue
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

            <form role="form" method="post" action="<?php echo e(route('sales.update', $sales->id)); ?>">

                <div class="card-body">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <label for="code">Sales #</label>
                        <input type="text" class="form-control" name="code" id="code"
                            value="<?php echo e($sales->code); ?>" autocomplete="off" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name_long">Client</label>
                        <select name="supplier_id" class="custom-select" id="supplier_id">
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($client->id); ?>" <?php echo e(( $client->id == $sales->client_id) ? 'selected' : ''); ?>>
                                <?php echo e($client->name_long); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name_long">Purchase</label>
                        <select name="supplier_id" class="custom-select" id="supplier_id">
                            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($purchase->id); ?>" <?php echo e(( $purchase->id == $sales->purchase_id) ? 'selected' : ''); ?>>
                                <?php echo e($purchase->code); ?> / <?php echo e($purchase->dr_no); ?> 
                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        
                        <label for="cost">Cost</label>
                        <input type="text" class="form-control" name="cost" id="cost"
                            value="<?php echo e($sales->cost); ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="cost">Quantity</label>
                        <input type="text" class="form-control" name="quantity" id="quantity"
                            value="<?php echo e($sales->quantity); ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="text" class="form-control" name="discount" id="discount"
                            value="<?php echo e($sales->discount); ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="addl_fee">Additional Fee</label>
                        <input type="text" class="form-control" name="addl_fee" id="addl_fee"
                            value="<?php echo e($sales->addl_fee); ?>" autocomplete="off">
                    </div>
                    
                    <label for="paid_on">Paid Date</label>
                    <div class="input-group date" id="receive_date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                            value="<?php if(isset($sales->paid_on)): ?><?php echo e(date('m/d/Y h:i:s A', strtotime($sales->paid_on))); ?><?php endif; ?>"
                            autocomplete="off" value="" 
                            name="paid_on" data-target="#receive_date" 
                            data-placement="top" rel="tooltip" 
                            title="Click the icon on the right side to display the calendar" 
                            data-original-title="Click the icon on the right side to display the calendar">

                            <div class="input-group-append" data-target="#receive_date" data-toggle="datetimepicker">
                                <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                            </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>

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

        $(".delete").on("click", function () {
            return confirm("Do you want to delete this?");
        });
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/sales/edit.blade.php ENDPATH**/ ?>