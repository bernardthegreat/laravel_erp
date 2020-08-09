@extends('layouts.main_layout')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Analytics
        </h1>
      </div>
      <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Analytics</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content" >
  <div class="card" id="app">
    <div class="card-header">
      <h3 class="card-title">
        Monthly Analytics
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('get_analytics_listing') }}">
        @csrf
        <div class="input-group mb-3">
          <select id="items" name="analytics_id" class="custom-select" style="width: 100px;">
            @foreach($analytics_listings as $keys => $lists)
                @php
                  if(isset($analytics_selected)) {
                    $selected = $analytics_selected;
                  } else {
                    $selected = '';
                  }
                @endphp
                <option id="{{$keys}}" value="{{$keys}}" {{ ( $selected == $keys) ? 'selected' : '' }}>{{$lists}}</option>
            
            @endforeach
          </select>
          <div class="input-group-append">
            <div class="btn-group">
              <button type="submit" class="btn btn-sm btn-danger w-100"><i class="fas fa-search-dollar"> </i></button>
              @if($results ?? '')
                @if(count($results) > 0)
                  <a href="{{$analytics_selected}}_print" target="_blank" class="btn btn-sm btn-danger pt-2"><i class="fas fa-print"> </i></a>
                @endif
              @endif
            </div>
          </div>
        </div>

        @if($results ?? '')
          @if($analytics_selected == 'monthly_sales_report')
            <div class="input-group mb-3" style="width:990px; overflow-x:auto;">
              <table id="analytics1" class="table table-bordered table-striped text-center" width="100%">
                <thead>
                  <tr>
                    <!-- <th>Sale #</th> -->
                    <th width="5%">DR #</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Cost</th>
                    <th>Discount</th>
                    <th>Additional Fee</th>
                    <th>Quantity</th>
                    <th>Total Cost</th>
                    <th>Paid Date</th>
                    <th>Sold Date</th>
                    <th>Sold By</th>
                    <th>Payment Method</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($results as $value)
                  <tr>
                    <!-- <td>{{$value->sale_no}}</td> -->
                    <td>{{$value->delivery_no}}</td>
                    <td>{{$value->client_name}}</td>
                    <td>{{$value->item_name}}</td>
                    <td>{{$value->cost}}</td>
                    <td>{{$value->discount}}</td>
                    <td>{{$value->additional_fee}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->total_cost}}</td>
                    <td>
                      {{$value->paid_on ? date('m/d/Y', strtotime($value->paid_on)) : '' }}
                    </td>
                    <td>
                      {{date('m/d/Y', strtotime($value->added_on)) }}  
                    </td>
                    <td>{{$value->added_by}}</td>
                    <td>{{$value->description}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <!-- <th>Sale #</th> -->
                    <th>DR #</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Cost</th>
                    <th>Discount</th>
                    <th>Additional Fee</th>
                    <th>Quantity</th>
                    <th>Total Cost</th>
                    <th>Paid Date</th>
                    <th>Sold Date</th>
                    <th>Sold By</th>
                    <th>Payment Method</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          @elseif($analytics_selected == 'sales_vs_purchases')
            <div class="input-group mb-3" style="width:990px; overflow-x:auto;">
              <table id="analytics2" class="table table-bordered table-striped text-center" width="100%">
                <thead>
                  <tr>
                    <th>Sale Date</th>
                    <th>Delivery #</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Selling Cost</th>
                    <th>Sold Quantity</th>
                    <th>Purchase Cost</th>
                    <th>Interest Rate</th>
                    <th>Net Income</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($results as $value)
                  <tr>
                    <td>
                      {{$value->sale_date ? date('m/d/Y', strtotime($value->sale_date)) : '' }}
                    </td>
                    <td>{{$value->delivery_no}}</td>
                    <td>{{$value->client_name}}</td>
                    <td>{{$value->item_name}}</td>
                    <td>{{$value->selling_cost}}</td>
                    <td>{{$value->sold_qty}}</td>
                    <td>{{$value->purchase_cost}}</td>
                    <td>{{$value->interest_rate}}</td>
                    <td>{{$value->net_income}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Sale Date</th>
                    <th>Delivery #</th>
                    <th>Client</th>
                    <th>Item</th>
                    <th>Selling Cost</th>
                    <th>Sold Quantity</th>
                    <th>Purchase Cost</th>
                    <th>Interest Rate</th>
                    <th>Net Income</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          @endif

        @endif
      </form>
    </div>
  </div>
</section>

@endsection