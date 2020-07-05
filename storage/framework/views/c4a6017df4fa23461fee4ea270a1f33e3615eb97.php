

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Interests
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Interests</li>
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
                <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal"
                    data-target="#modal-default" data-placement="top" rel="tooltip" title="Create Item">
                    <i class="fa fa-plus"> </i>
                </button>
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
                        <th>Item</th>
                        <th>Quantity From</th>
                        <th>Quantity To</th>
                        <th>Rate</th>
                        <th>Creation Date </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($interest->items->name_long); ?> </td>
                        <td> <?php echo e($interest->qty_from); ?> </td>
                        <td> <?php echo e($interest->qty_to); ?> </td>
                        <td> <?php echo e($interest->rate); ?> </td>
                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($interest->created_at))); ?> </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger btn-sm" href="<?php echo e(route('interests.edit', $interest->id)); ?>"
                                    data-placement="top" rel="tooltip" title="Edit"
                                    data-original-title="Edit">
                                    <i class="fa fa-edit">
                                    </i>
                                </a>

                                <a class="btn btn-danger btn-sm delete"
                                    href="<?php echo e(route('interests.soft_delete', $interest->id)); ?> " data-placement="top"
                                    rel="tooltip" title="Delete" data-original-title="soft ">
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
                        <th>Item</th>
                        <th>Quantity From</th>
                        <th>Quantity To</th>
                        <th>Rate</th>
                        <th>Creation Date </th>
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

        $(".delete").on("click", function () {
            return confirm("Do you want to delete this?");
        });


    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/interests/index.blade.php ENDPATH**/ ?>