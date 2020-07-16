

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Interest
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('interests.index')); ?>">Interests</a></li>
                    <li class="breadcrumb-item active">Edit Interest</li>
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
                Edit Interest
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

            <form role="form" method="post" action="<?php echo e(route('interests.update', $interests->id)); ?>">

                <div class="card-body">
                    <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                    
                    <div class="form-group">
                        <label for="item_id">Item</label>
                        <select name="item_id" class="custom-select" id="item_id">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e(( $item->id == $interests->item_id) ? 'selected' : ''); ?>>
                                <?php echo e($item->name_long); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="qty_from">Quantity From</label>
                        <input type="text" class="form-control" name="qty_from" id="qty_from"
                            value="<?php echo e($interests->qty_from); ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="qty_from">Quantity To</label>
                        <input type="text" class="form-control" name="qty_to" id="qty_to"
                            value="<?php echo e($interests->qty_to); ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="rate">Rate</label>
                        <input type="text" class="form-control" name="rate" id="rate"
                            value="<?php echo e($interests->rate); ?>" autocomplete="off">
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

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/interests/edit.blade.php ENDPATH**/ ?>