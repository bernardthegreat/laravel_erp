

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Orders
                </h1>



                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Order</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form method="post" action="<?php echo e(route('purchases.store')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="input-group mb-3">

                                        <select id="items" name="item_id" class="custom-select" style="width: 100px;">
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($items->id); ?>">
                                                <?php echo e($items->name_long); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>


                                    <div class="input-group mb-3">
                                        <input type="text" name="dr_no" class="form-control dr_no" placeholder="DR No."
                                            autocomplete="off" >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" name="cost" class="form-control" placeholder="Cost"
                                            autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" name="qty" class="form-control" placeholder="Quantity"
                                            autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
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

            <div class="card card-danger card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true">All Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false">Delivered</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                                aria-selected="false">Undelivered</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">

                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Purchase Date</th>
                                        <th>Purchase Order No.</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                        <th>Received Date</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($purchase->created_at))); ?> </td>
                                        <td> <?php echo e($purchase->code); ?> </td>
                                        <td> <?php echo e($purchase->items->name_long); ?> </td>
                                        <td> <?php echo e($purchase->dr_no); ?> </td>
                                        <td> 
                                            <?php if(isset($purchase->received_at)): ?>
                                                <?php echo e(date('m/d/Y h:i:s A', strtotime($purchase->received_at))); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td data-placement="bottom" rel="tooltip" title="Cost: <?php echo e($purchase->cost); ?>"> <?php echo e($purchase->qty); ?> </td>

                                        <td>
                                            <div class="btn-group">

                                                <?php if(is_null($purchase->received_at)): ?>
                                                <a class="btn btn-danger btn-sm receive_purchase_btn" href="#"
                                                    data-toggle="modal" data-purchase-id="<?php echo e($purchase->id ?? ''); ?>"
                                                    data-url="<?php echo e(route('receive_purchase', $purchase->id)); ?> "
                                                    data-target="#modal-receive-purchase" data-placement="top"
                                                    rel="tooltip"
                                                    title="Receive Order of <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-cart-arrow-down">
                                                    </i>
                                                </a>
                                                <?php endif; ?>

                                                <a class="btn btn-danger btn-sm"
                                                    href="<?php echo e(route('purchases.edit', $purchase->id)); ?>"
                                                    data-placement="top" rel="tooltip"
                                                    title="Edit  <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>

                                                <a class="btn btn-danger btn-sm delete"
                                                    href="<?php echo e(route('purchases.soft_delete', $purchase->id)); ?> "
                                                    data-placement="top" rel="tooltip"
                                                    title="Delete order of <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="soft ">
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
                                        <th>Purchase Date</th>
                                        <th>Purchase Order No.</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                        <th>Received Date</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">
                            
                            <table id="example2" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Purchase D/T</th>
                                        <th>Purchase Order No.</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                        <th>Received D/T</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!is_null($purchase->received_at)): ?>
                                    <tr>
                                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($purchase->created_at))); ?> </td>
                                        <td> <?php echo e($purchase->code); ?> </td>
                                        <td> <?php echo e($purchase->items->name_long); ?> </td>
                                        <td> <?php echo e($purchase->dr_no); ?> </td>
                                        <td> 
                                            <?php if(isset($purchase->received_at)): ?>
                                                <?php echo e(date('m/d/Y h:i:s A', strtotime($purchase->received_at))); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td data-placement="bottom" rel="tooltip" title="Cost: <?php echo e($purchase->cost); ?>"> <?php echo e($purchase->qty); ?> </td>

                                        <td>
                                            <div class="btn-group">

                                                <?php if(is_null($purchase->received_at)): ?>
                                                <a class="btn btn-danger btn-sm receive_purchase_btn" href="#"
                                                    data-toggle="modal" data-purchase-id="<?php echo e($purchase->id ?? ''); ?>"
                                                    data-url="<?php echo e(route('receive_purchase', $purchase->id)); ?> "
                                                    data-target="#modal-receive-purchase" data-placement="top"
                                                    rel="tooltip"
                                                    title="Receive Order of <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-cart-arrow-down">
                                                    </i>
                                                </a>
                                                <?php endif; ?>

                                                <a class="btn btn-danger btn-sm"
                                                    href="<?php echo e(route('purchases.edit', $purchase->id)); ?>"
                                                    data-placement="top" rel="tooltip"
                                                    title="Edit  <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>

                                                <a class="btn btn-danger btn-sm delete"
                                                    href="<?php echo e(route('purchases.soft_delete', $purchase->id)); ?> "
                                                    data-placement="top" rel="tooltip"
                                                    title="Delete order of <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="soft ">
                                                    <i class="fa fa-trash">
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
                                        <th>Purchase Date</th>
                                        <th>Purchase Order No.</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                        <th>Received Date</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>


                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                            aria-labelledby="custom-tabs-four-messages-tab">
                            
                            <table id="example3" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Purchase Date</th>
                                        <th>Purchase Order No.</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php if(is_null($purchase->received_at) || $purchase->received_at == ''): ?>
                                    <tr>
                                        <td> <?php echo e(date('m/d/Y h:i:s A', strtotime($purchase->created_at))); ?> </td>
                                        <td> <?php echo e($purchase->code); ?> </td>
                                        <td> <?php echo e($purchase->items->name_long); ?> </td>
                                        <td> <?php echo e($purchase->dr_no); ?> </td>
                                        <td data-placement="bottom" rel="tooltip" title="Cost: <?php echo e($purchase->cost); ?>"> <?php echo e($purchase->qty); ?> </td>

                                        <td>
                                            <div class="btn-group">

                                                <?php if(is_null($purchase->dr_no)): ?>
                                                <a class="btn btn-danger btn-sm receive_purchase_btn" href="#"
                                                    data-toggle="modal" data-purchase-id="<?php echo e($purchase->id ?? ''); ?>"
                                                    data-url="<?php echo e(route('receive_purchase', $purchase->id)); ?> "
                                                    data-target="#modal-receive-purchase" data-placement="top"
                                                    rel="tooltip"
                                                    title="Receive Order of <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-cart-arrow-down">
                                                    </i>
                                                </a>
                                                <?php endif; ?>

                                                <a class="btn btn-danger btn-sm"
                                                    href="<?php echo e(route('purchases.edit', $purchase->id)); ?>"
                                                    data-placement="top" rel="tooltip"
                                                    title="Edit  <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>

                                                <a class="btn btn-danger btn-sm delete"
                                                    href="<?php echo e(route('purchases.soft_delete', $purchase->id)); ?> "
                                                    data-placement="top" rel="tooltip"
                                                    title="Delete order of <?php echo e($purchase->items->name_long); ?>"
                                                    data-original-title="soft ">
                                                    <i class="fa fa-trash">
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
                                        <th>Purchase Date</th>
                                        <th>Purchase Order No.</th>
                                        <th>Item</th>
                                        <th>DR #</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>




            <div class="modal fade" id="modal-receive-purchase">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Receive Order</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <form method="post" action="" id="receive-purchase">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" id="data-purchase-id" value="">
                                <div class="input-group mb-3">
                                    <input type="number" name="dr_no" id="dr_no" class="form-control" placeholder="DR #"
                                        autocomplete="off" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-box"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Receive</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->



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

        $('.receive_purchase_btn').click(function () {
            var purchase_id = $(this).attr('data-purchase-id');
            var receive_url = $(this).attr('data-url');

            $("#data-purchase-id").attr("value", purchase_id);
            $("#receive-purchase").attr("action", receive_url);


        });

        $('#modal-receive-purchase').on('shown.bs.modal', function () {
            $('#dr_no').focus();
        });

    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/purchases/index.blade.php ENDPATH**/ ?>