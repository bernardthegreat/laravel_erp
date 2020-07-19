@extends('layouts.main_layout')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{$clients->name_long}}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/clients">Clients</a></li>
          <li class="breadcrumb-item active">{{$clients->name_long}}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-danger card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatar.png')}}"
                alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"> {{$clients->name_long}} </h3>
            <p class="text-muted text-center"> {{$clients->contact_no}} </p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Payments</b>
                @php
                  $total_sales = 0;
                  $total_debts = 0;
                @endphp
                @foreach($debts as $debt)
                  @php
                  $total_debts += $debt->cost;
                  @endphp
                @endforeach

                @foreach($payments as $payment)
                  @php
                  $total_sales += $payment->cost;
                  @endphp
                @endforeach
                <a class="float-right">
                  {{ number_format($total_sales, 2) }}
                </a>
              </li>
              <li class="list-group-item">
                <b>Current Debts</b>
                <a class="float-right">
                  {{ number_format($total_debts, 2) }}
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Statement of Accounts</h3>
          </div>
          <div class="card-body mb-4" style="height:600px; overflow-y:auto;">
            <table class="table table-bordered table-striped text-center">
              @foreach($soa as $account)
              <tr>
                <th>
                  DR No.: {{$account->dr_no}} <br>
                  <small>
                    {{ $account->client_name }}
                    <br>
                    {{ $account->paid_on ? 'Paid: '.date('m/d/Y h:i:s A', strtotime($account->paid_on)) : '' }}
                  </small>
                </th>
                <td>
                  <a href="{{route('statement_of_account_print', $account->dr_no)}}" target="_blank" 
                    class="btn btn-sm btn-danger"  data-placement="top" rel="tooltip" title=""
                    data-original-title="Statement of Account">
                    <i class="fas fa-money-bill"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Client Information
            </h3>
          </div>
          <form role="form" method="post" action="{{ route('clients.update', $clients->id ) }}">
            <div class="card-body">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <label for="name_long">Name Long</label>
                <input type="text" class="form-control" name="name_long" id="name_long" value="{{$clients->name_long}}"
                  placeholder="Name Long">
              </div>
              <div class="form-group">
                <label for="payment_term">Terms</label>
                <input type="text" class="form-control" name="payment_term" id="payment_term"
                  value="{{$clients->payment_term}}" placeholder="Terms">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{$clients->address}}"
                  placeholder="Address">
              </div>
              <div class="form-group">
                <label for="contact_no">Contact #</label>
                <input type="text" class="form-control" name="contact_no" id="contact_no"
                  value="{{$clients->contact_no}}" placeholder="Contact #">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          </form>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Payments
            </h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Sold Date</th>
                  <th>DR #</th>
                  <th>Item</th>
                  <th>Paid Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($payments as $payment)
                <tr>
                  <td> {{ date('m/d/Y h:i:s A', strtotime($payment->created_at)) }} </td>
                  <td> {{ $payment->dr_no}} </td>
                  <td> {{ $payment->name_long}} </td>
                  <td> {{ date('m/d/Y h:i:s A', strtotime($payment->paid_on)) }}</td>
                  <td>
                    <a href="{{route('statement_of_account_print', $account->dr_no)}}" target="_blank" 
                      class="btn btn-sm btn-danger"  data-placement="top" rel="tooltip" title=""
                      data-original-title="Statement of Account">
                      <i class="fas fa-money-bill"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Sold Date</th>
                  <th>Invoice #</th>
                  <th>Item</th>
                  <th>Paid Date</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Debts
            </h3>
          </div>
          <div class="card-body">
            <table id="table_without_search1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Sold Date</th>
                  <th>Items</th>
                  <th>DR #</th>
                  <th>Quantity</th>
                  <th>Cost</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php
                $total_qty = 0;
                $total_debts = 0;
                @endphp
                @foreach($debts as $debt)
                <tr>
                  <td> {{ date('m/d/Y h:i:s A', strtotime($debt->created_at)) }} </td>
                  <td> {{ $debt->name_long }} </td>
                  <td> {{ $debt->invoice_no }} </td>
                  <td> {{ $debt->qty}} </td>
                  <td> {{ $debt->cost}}</td>
                  <td>
                    <a href="{{route('statement_of_account_print', $account->dr_no)}}" target="_blank" 
                      class="btn btn-sm btn-danger"  data-placement="top" rel="tooltip" title=""
                      data-original-title="Statement of Account">
                      <i class="fas fa-money-bill"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Sold Date</th>
                  <th>Items</th>
                  <th>DR #</th>
                  <th>Quantity</th>
                  <th>Cost</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection