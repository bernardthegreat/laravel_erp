

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
      <div class="col-md-5" id="clients">
        <div class="card card-danger card-outline" style="height:35%;overflow-y:auto;">
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
                      id="show_items" class="btn btn-danger clients">
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

      <div class="col-md-5" id="items" style="display:none;">
        <div class="card card-danger card-outline" style="height:53%;overflow-y:auto;">
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
                      data-toggle="modal" data-target="#modal-item"
                      class="btn btn-danger items">
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
      <div class="col-md-7">
        <div class="card card-danger card-outline" style="height:53%;overflow-y:auto;">
          <div class="card-header box-profile">
            <div class="text-center">
              <h3 id="data-client-name-html"> </h3>
            </div>
          </div>
          <form method="post" action="<?php echo e(route('submit_pos_order')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card-body item-board" style="display:none">
              
              <input type="hidden" id="data-client-id" name="client_id">
              <input type="hidden" id="data-item-id">
              <input type="hidden" id="data-item-name">
              <div>
                <div class="input-group mb-3">
                  <input type="text" name="dr_no" class="form-control dr_no" placeholder="DR No." autocomplete="off">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-dollar-sign"></span>
                    </div>
                  </div>
                </div>
              </div> 
              <?php
              $user = auth()->user();
              ?>
              <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user->id); ?>" class="form-control"
                autocomplete="off">
              
              <div class="" style="height:550px;overflow:auto;background-color: #f2f2f2;">
                <div class="pt-2">
                  <h4 class="text-center"> Items </h4>
                </div>
                <div class="nav flex-column nav-pills p-1 pr-2 pl-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  
                </div>
                <div class="tab-content item-details mt-2 pb-2" id="v-pills-tabContent" style="display:none;">
                  <h4 class="text-center"> Item Details </h4>
                </div>
                <div class="card-footer text-center submit-order border-top border-bottom border-danger bg-white" style="display:none;position:static !important;"> 
                  <button type="submit" class="btn btn-danger"> Order </button>
                  <button type="button" class="btn btn-danger btn-clear"> Clear </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function() {
  $('#pos1').DataTable({
    "paging": false,
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
    "paging": false,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "responsive": true,
    "order": [1, "desc"],
    dom: '<"d-flex w-100"<l><"#mydiv.d-flex ml-auto text-right"f>>tips',
  });

  $(".clients").click(function() {
    var client_name = $(this).attr('data-client-name');
    var client_id = $(this).attr('data-client-id');
    var data_html = $("#data-client-name-html").html('Order for ' + client_name);
    console.log(client_id);
    var data = $("#data-client-name").attr("value", client_name);
    var data_id = $("#data-client-id").attr("value", client_id);
    $("#items").show();
    $("#clients").hide();
    $(".item-board").show();
  });

  $("#show_clients").click(function() {
    $("#clients").show();
    $("#items").hide();
    $('.submit-order').hide();
  });
  
  var num = 0;
  $('.items').click(function(){
    $('.submit-order').show();
    $(".item-board").show();
    $('.item-details').show();
    var item_name = $(this).attr('data-item-name');
    var item_id = $(this).attr('data-item-id');
    var data_name = $("#data-item-name").attr("value", item_name);
    var header_name = $(".item-name").html(item_name);
    var data_id = $("#data-item-id").attr("value", item_id);
    
    $(".orders").append(`<input type='hidden' class='btn btn-danger btn-items' value='${data_id.val()}' name='item_id[]'> `); 
    if(data_name.val() != $(`.item-id-val-${data_id.val()}`).attr('data-pill')) {
      $("#v-pills-tab").append(`
        <a class="nav-link order-item-${data_id.val()} list-order pills-tab item-id-val-${data_id.val()} mb-1" id="v-pills-${data_id.val()}-tab" data-toggle="pill" 
          href="#v-pills-${data_id.val()}" role="tab" aria-controls="v-pills-${data_id.val()}" data-pill="${data_name.val()}" 
          aria-selected="true">
          <i class="fas fa-box pr-2"> </i>${data_name.val()}
        </a>`);
      
      $("#v-pills-tabContent").append(`
        <div class="tab-pane fade show list-order order-content-item-${data_id.val()} px-2" id="v-pills-${data_id.val()}" role="tabpanel" aria-labelledby="v-pills-${data_id.val()}-tab">
          <input type="hidden" name="item_id[]" value="${data_id.val()}">
          <label for="qty">Quantity</label>
          <div class="input-group mb-3">
            <input type="text" name="qty[]" class="form-control qty" placeholder="Quantity" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-dollar-sign"></span>
              </div>
            </div>
          </div>
          <label for="cost">Cost</label>
          <div class="input-group mb-3">
            <input type="text" name="cost[]" class="form-control cost" placeholder="Cost" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-dollar-sign"></span>
              </div>
            </div>
          </div>
          <label for="discount">Discount</label>
          <div class="input-group mb-3">
            <input type="text" name="discount[]" value="0.00" class="form-control discount" placeholder="Discount" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-dollar-sign"></span>
              </div>
            </div>
          </div>
          <label for="addl_fee">Additional Fee</label>
          <div class="input-group mb-3">
            <input type="text" name="additional_fee[]" value="0.00" class="form-control addl_fee" placeholder="Additional Fee" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-dollar-sign"></span>
              </div>
            </div>
          </div>
          <label for="remarks">Remarks</label>
          <div class="input-group mb-3">
            <input type="text" name="remarks[]" class="form-control remarks" placeholder="Remarks" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-dollar-sign"></span>
              </div>
            </div>
          </div>
        </div>`);
    }
    
    $(`.order-item-${data_id.val()}`).dblclick(function(){
      $(this).remove();
      $(`.order-content-item-${data_id.val()}`).remove();
    });

  });

  $(document).on("click", ".btn-clear" , function() {
      $('.list-order').remove();
      $(".item-board").hide();
      $('.submit-order').hide();
  });

});
</script>

<style>
  table tbody tr td {
    text-align:center;
  }
  .pills-tab {
    background-color: #dc3545;
    color: white !important;
  }
  .pills-tab.active {
    background-color: #ffc107 !important;
    color: black !important;
  }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/sales/point_of_sale.blade.php ENDPATH**/ ?>