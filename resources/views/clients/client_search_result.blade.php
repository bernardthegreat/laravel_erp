@extends('layouts.main_layout')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Clients</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item active">Search Client</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      @foreach($clients as $client)
      <div class="col-md-4">
        <div class="card card-widget widget-user">
          <div class="widget-user-header bg-danger">
            <h3 class="widget-user-username">{{$client->name_long}}</h3>
            <h5 class="widget-user-desc">{{$client->name_short}}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="{{asset('img/avatar.png')}}" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-6 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{$client->contact_no}}</h5>
                  <span class="description-text">Contact #</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="description-block">
                  <h5 class="description-header">{{$client->payment_term}}</h5>
                  <span class="description-text">Payment Term</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="description-block">
                  <h5 class="description-header">{{$client->address}}</h5>
                  <span class="description-text">Address</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 border-right">
                <div class="description-block">
                  <h5 class="description-header">
                    <a href="/clients/{{$client->id}}/edit" class="btn btn-block btn-danger btn-flat"
                      data-placement="top" rel="tooltip" title="View Client">
                      <i class="fa fa-user-edit"> </i>
                    </a>
                  </h5>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="description-block">
                  <h5 class="description-header">
                    <a href="/sales/create/{{$client->id}}" class="btn btn-block btn-danger btn-flat"
                      data-placement="top" rel="tooltip" title="Sell to this Client">
                      <i class="fa fa-cart-arrow-down"> </i>
                    </a>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection