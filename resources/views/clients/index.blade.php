@extends('layouts.main_layout')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Clients
        </h1>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header ">
                <h4 class="modal-title">Add Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{ route('clients.create') }}">
                  @csrf
                  <div class="input-group mb-3">
                    <input type="text" name="name_long" class="form-control" placeholder="Name" autocomplete="off"
                      required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="address" class="form-control" placeholder="Address" autocomplete="off">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="contact_no" class="form-control" placeholder="Contact No."
                      autocomplete="off">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="number" name="payment_term" class="form-control" placeholder="Payment Term"
                      autocomplete="off" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
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
          <li class="breadcrumb-item active">Clients</li>
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
          data-placement="top" rel="tooltip" title="Add Client">
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
      <table id="desc_last_column1" class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th>Name Long</th>
            <th>Address</th>
            <th>Contact No</th>
            <th>Creation Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($clients as $client)
          <tr>
            <td> {{$client->name_long}} </td>
            <td> {{$client->address}} </td>
            <td> {{$client->contact_no}} </td>
            <td> {{ date('m/d/Y h:i:s A', strtotime($client->created_at)) }} </td>
            <td>
              <div class="btn-group">
                @if($client->has_debt == 1)
                <a class="btn btn-danger btn-sm" href="{{ route('generate_billing_statement', $client->id)}}"
                  data-placement="top" rel="tooltip" title="Bill {{$client->name_short}}">
                  <i class="fa fa-credit-card">
                  </i>
                </a>
                @endif
                <a class="btn btn-danger btn-sm" href="{{ route('clients.edit', $client->id)}}" data-placement="top"
                  rel="tooltip" title="Edit {{$client->name_short}}" data-original-title="Edit">
                  <i class="fa fa-edit">
                  </i>
                </a>
                <a class="btn btn-danger btn-sm delete" href="{{ route('clients.soft_delete', $client->id)}} "
                  data-placement="top" rel="tooltip" title="Delete {{$client->name_short}}" data-original-title="soft ">
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
            <th>Name Long</th>
            <th>Address</th>
            <th>Contact No</th>
            <th>Creation Date</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>

@endsection