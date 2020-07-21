

<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Point of Sale</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/clients">Sales</a></li>
          <li class="breadcrumb-item active">Point of Sale</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6" id="clients">
        <div class="card card-danger card-outline">
          <div class="card-header">
            <h3 class="card-title">
              Clients
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body text-center">
            <table id="pos1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Client</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($client->name_long); ?></td>
                  <td>
                    <button type="button" 
                      data-client-id="<?php echo e($client->id); ?>"  
                      data-client-name="<?php echo e($client->name_long); ?>" 
                      id="show_items" class="btn btn-danger">
                      <i class="fa fa-shopping-cart"></i>
                    </button>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Client</th>
                  <th> </th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-6" id="items" style="display:none;">
        <div class="card card-danger card-outline">
          <div class="card-header box-profile">
            <h3 class="card-title">
              <a href="#" id="show_clients" class="btn btn-danger">
                <i class="fa fa-users"></i>
              </a>
              Items
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body text-center">
            <table id="pos2" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Quantity</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->qty > 0): ?>
                <tr>
                  <td><?php echo e($item->item_name); ?></td>
                  <td><?php echo e($item->qty); ?> / <?php echo e($item->unit); ?></td>
                  <td>
                    <button type="button" id="select_items" 
                      data-item-id="<?php echo e($item->item_id); ?>"
                      data-item-name="<?php echo e($item->item_name); ?>" 
                      class="btn btn-danger">
                      <i class="fa fa-shopping-cart"></i>
                    </button>
                  </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Item</th>
                  <th>Quantity</th>
                  <th> </th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-danger card-outline">
          <div class="card-header box-profile">
            <div class="text-center">
              <input type="text" class="btn btn-danger" id="data-item-name">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function() {
  $('#pos1').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "responsive": true,
    "order": [1, "desc"],
    dom: '<"d-flex w-100"<l><"#mydiv.d-flex ml-auto text-right"f>>tips',
  });
  $('#pos2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "responsive": true,
    "order": [1, "desc"],
    dom: '<"d-flex w-100"<l><"#mydiv.d-flex ml-auto text-right"f>>tips',
  });

  $("#show_items").click(function() {
    $("#items").show();
    $("#clients").hide();
  });

  $("#show_clients").click(function() {
    $("#clients").show();
    $("#items").hide();
  });

  $('#select_items').click(function(){
    console.log($(this).attr('data-item-name'));
    var item_name = $(this).attr('data-item-name');
    $("#data-item-name").attr("value", item_name);
  });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/sales/point_of_sale.blade.php ENDPATH**/ ?>