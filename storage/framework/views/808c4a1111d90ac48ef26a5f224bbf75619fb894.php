

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Utility Types
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('utilities.index')); ?>">Utilities</a></li>
                    <li class="breadcrumb-item active">Edit <?php echo e($utility_types->name_long); ?></li>
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
                Edit Utility
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

            <form role="form" method="post" action="<?php echo e(route('utility_types.update', $utility_types->id)); ?>">

                <div class="card-body">
                    <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <label for="name_short">Name Short</label>
                        <input type="text" class="form-control" name="name_short" id="name_short"
                            value="<?php echo e($utility_types->name_short); ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="name_long">Name Long</label>
                        <input type="text" class="form-control" name="name_long" id="name_long"
                            value="<?php echo e($utility_types->name_long); ?>" autocomplete="off">
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

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/utility_types/edit.blade.php ENDPATH**/ ?>