@extends('layouts.main_layout')

@section('content')

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
                @foreach($clients as $client)
                <tr>
                  <td>{{$client->name_long}}</td>
                  <td>
                    <button type="button" 
                      data-client-id="{{$client->id}}"  
                      data-client-name="{{$client->name_long}}" 
                      id="show_items" class="btn btn-danger">
                      <i class="fa fa-shopping-cart"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
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
                @foreach($items as $item)
                @if($item->qty > 0)
                <tr>
                  <td>{{$item->item_name}}</td>
                  <td>{{$item->qty}} / {{$item->unit}}</td>
                  <td>
                    <button type="button" id="select_items" 
                      data-item-id="{{$item->item_id}}"
                      data-item-name="{{$item->item_name}}" 
                      class="btn btn-danger">
                      <i class="fa fa-shopping-cart"></i>
                    </button>
                  </td>
                </tr>
                @endif
                @endforeach
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

@endsection