

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Orders
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('purchases.index')); ?>">Orders</a></li>
                    <li class="breadcrumb-item active">Update Order</li>
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
                Update Order
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

            <form role="form" method="post" action="<?php echo e(route('purchases.update', $purchases->id)); ?>">

                <div class="card-body">
                <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <label for="code">P.O. #</label>
                        <input type="text" class="form-control" name="code" id="code"
                            value="<?php echo e($purchases->code); ?>" autocomplete="off" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name_long">Item</label>
                        <select name="supplier_id" class="custom-select" id="supplier_id">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e(( $item->id == $purchases->item_id) ? 'selected' : ''); ?>>
                                <?php echo e($item->name_long); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        
                        <label for="dr_no">DR #</label>
                        <input type="text" class="form-control" name="dr_no" id="dr_no"
                            value="<?php echo e($purchases->dr_no); ?>" autocomplete="off">
                    </div>

                    
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="text" class="form-control" name="cost" id="cost"
                            value="<?php echo e($purchases->cost); ?>" autocomplete="off">
                    </div>

                    <label for="received_at">Received At</label>
                    <div class="input-group date" id="receive_date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                            value="<?php echo e($purchases->received_at ? date('m/d/Y h:i:s A', strtotime($purchases->received_at)) : ''); ?>"
                            autocomplete="off" value="" 
                            name="received_at" data-target="#receive_date" 
                            data-placement="top" rel="tooltip" 
                            title="Click the icon on the right side to display the calendar" 
                            data-original-title="Click the icon on the right side to display the calendar">

                            <div class="input-group-append" data-target="#receive_date" data-toggle="datetimepicker">
                                <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="text" class="form-control" name="qty" id="cost"
                            value="<?php echo e($purchases->qty); ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="order_datetime">Ordered On</label>
                        <div class="input-group date" id="order_date" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input"
                              value="<?php echo e(date('m/d/Y h:i:s A', strtotime($purchases->created_at))); ?>"
                              autocomplete="off" value="" 
                              name="order_date" data-target="#order_date" 
                              data-placement="top" rel="tooltip" 
                              title="Click the icon on the right side to display the calendar" 
                              data-original-title="Click the icon on the right side to display the calendar">

                            <div class="input-group-append" data-target="#order_date" data-toggle="datetimepicker">
                                <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                            </div>
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

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/purchases/edit.blade.php ENDPATH**/ ?>