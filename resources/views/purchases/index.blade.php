@extends('layouts.main_layout')

@section('content')

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
                <form method="post" action="{{ route('purchases.store') }}">
                  @csrf
                  <div class="input-group mb-3">
                    <select id="items" name="item_id" class="custom-select" style="width: 100px;">
                      @foreach($items as $items)
                      <option value="{{$items->id}}">
                        {{$items->name_long}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="dr_no" class="form-control dr_no" placeholder="DR No." autocomplete="off">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="cost" class="form-control" placeholder="Cost" autocomplete="off"
                      required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="number" name="qty" class="form-control" placeholder="Quantity" autocomplete="off"
                      required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group date mb-3" id="order_date" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input"
                        autocomplete="off" value="" 
                        name="order_date" data-target="#order_date" 
                        data-placement="top" rel="tooltip" 
                        placeholder="Order Date"
                        title="Click the icon on the right side to display the calendar" 
                        data-original-title="Click the icon on the right side to display the calendar">

                    <div class="input-group-append" data-target="#order_date" data-toggle="datetimepicker">
                        <div class="input-group-text" data-placement="top" rel="tooltip" title="Click this icon to display the calendar" data-original-title="Click the icon on the right side to display the calendar"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Orders</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#modal-default"
          data-placement="top" rel="tooltip" title="Purchase Order">
          <i class="fa fa-plus"> </i>
        </button>
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
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
          @foreach($purchases as $purchase)
          <tr>
            <td> {{ date('m/d/Y h:i:s A', strtotime($purchase->added_on)) }} </td>
            <td> {{$purchase->purchase_no}} </td>
            <td> {{$purchase->item_name}} </td>
            <td> {{$purchase->delivery_no}} </td>
            <td>
              @if(isset($purchase->received_on))
                {{ date('m/d/Y h:i:s A', strtotime($purchase->received_on)) }}
              @endif
            </td>
            <td data-placement="bottom" rel="tooltip" title="Cost: {{$purchase->cost}}"> {{$purchase->quantity}}</td>
            <td>
              <div class="btn-group">
                @if(is_null($purchase->received_on))
                <a class="btn btn-danger btn-sm receive_purchase_btn" href="#" data-toggle="modal"
                  data-purchase-id="{{$purchase->id ?? ''}}" data-url="{{ route('receive_purchase', $purchase->purchase_id)}} "
                  data-target="#modal-receive-purchase" data-placement="top" rel="tooltip"
                  title="Receive Order of {{$purchase->item_name}}" data-original-title="Edit">
                  <i class="fa fa-cart-arrow-down">
                  </i>
                </a>
                @endif
                <a class="btn btn-danger btn-sm" href="{{ route('purchases.edit', $purchase->purchase_id)}}" data-placement="top"
                  rel="tooltip" title="Edit  {{$purchase->item_name}}" data-original-title="Edit">
                  <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm delete" href="{{ route('purchases.delete', $purchase->purchase_id)}}" data-placement="top"
                  rel="tooltip" title="Delete order of {{$purchase->item_name}}">
                  <i class="fa fa-trash">
                  </i>
                </a>
              </div>
            </td>
          </tr>
          @endforeach
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
                @csrf
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
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function() {
  $('.receive_purchase_btn').click(function() {
    var purchase_id = $(this).attr('data-purchase-id');
    var receive_url = $(this).attr('data-url');

    $("#data-purchase-id").attr("value", purchase_id);
    $("#receive-purchase").attr("action", receive_url);
  });

  $('#modal-receive-purchase').on('shown.bs.modal', function() {
    $('#dr_no').focus();
  });

});
</script>

@endsection