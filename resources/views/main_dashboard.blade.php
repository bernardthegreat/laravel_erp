@extends('layouts.main_layout')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">WebERP</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>
            @if(isset($gross_income_today[0]->cost))
              {{$gross_income_today[0]->cost}}
            @else
              0
            @endif
          </h3>
          <p>Gross Income Today</p>
        </div>
        <div class="icon">
          <i class="fa fa-money-check-alt"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>
            @if(isset($gross_expense_today[0]->cost))
              {{number_format($gross_expense_today[0]->cost, 2)}}
            @else
              0
            @endif
          </h3>
          <p>Gross Expense Today</p>
        </div>
        <div class="icon">
          <i class="fas fa-money-bill-alt"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>
            @if(isset($count_pending_delivery_supplies))
              {{$count_pending_delivery_supplies}}
            @endif
          </h3>
          <p>Order Delivery Pendings</p>
        </div>
        <div class="icon">
          <i class="fas fa-truck"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>
            @if(isset($count_client_dues))
              {{$count_client_dues}}
            @endif
          </h3>
          <p>Client Dues</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daily Reporting</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="card card-danger card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home"
                role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Stock Counts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile"
                role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Due Clients</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
              aria-labelledby="custom-tabs-four-home-tab">
              <table id="desc_second_column2" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($stock_counts as $stock_count)
                  <tr>
                    <td> {{$stock_count->item_name}} </td>
                    <td> {{$stock_count->qty}} </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
              aria-labelledby="custom-tabs-four-profile-tab">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Client</th>
                    <th>Debt Cost</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($client_dues as $client_due)
                  <tr>
                    <td> {{$client_due->name_long}} </td>
                    <td> {{$client_due->debt_cost}} </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Client</th>
                    <th>Debt Cost</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Delivery Pendings</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <table id="example3" class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th>Supplier</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Order Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pending_delivery_supplies as $pending_delivery_supply)
          <tr>
            <td> {{$pending_delivery_supply->item_name}} </td>
            <td> {{$pending_delivery_supply->cost}} </td>
            <td> {{$pending_delivery_supply->quantity}} </td>
            <td> {{ date('m/d/Y h:i:s A', strtotime($pending_delivery_supply->purchased_date)) }} </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Supplier</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Purchased Date</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>

@endsection