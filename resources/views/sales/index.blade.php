@extends('layouts.main_layout')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>
          Revenue
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Revenue</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <div class="card-tools btn-group">
          <a href="{{ route('point_of_sale') }}" class="btn btn-danger btn-flat"
            data-placement="top" rel="tooltip" title="Sell">
            <i class="fa fa-dollar-sign"> </i>
          </a>
          <a href="{{ route('payments') }}" class="btn btn-danger btn-flat" data-placement="top" rel="tooltip"
            title="Process Payment">
            <i class="fa fa-money-bill-alt"> </i>
          </a>
        </div>
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
            <th>Sold Date</th>
            <th>Client</th>
            <th>Item</th>
            <th>DR #</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          @foreach($sales as $sale)
          <tr>
            <td> {{ date('m/d/Y h:i:s A', strtotime($sale->added_on)) }} </td>
            <td> {{$sale->client_name}} </td>
            <td> {{$sale->item_name}} </td>
            <td> {{$sale->delivery_no}} </td>
            <td> {{$sale->cost}} </td>
            <td> {{$sale->quantity}} </td>
            <td>

              <div class="btn-group">
                <a class="btn btn-danger btn-sm" href="{{ route('sales.edit', $sale->sale_id)}}" data-placement="top"
                  rel="tooltip" title="Edit {{$sale->client_name}}" data-original-title="Edit">
                  <i class="fa fa-edit">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm delete" href="{{ route('sales.delete', $sale->sale_id)}}" data-placement="top"
                  rel="tooltip" title="Delete sale for {{$sale->client_name}}">
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
            <th>Sold Date</th>
            <th>Client</th>
            <th>Item</th>
            <th>DR #</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th> </th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>

@endsection