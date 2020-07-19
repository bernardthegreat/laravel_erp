@extends('layouts.main_layout')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Clients
        </h1>
      </div>
      <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Register Client</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        Register Client
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <form role="form" method="post" action="{{ route('clients.store') }}">
        <div class="card-body">
          <div class="form-group">
            @csrf
            @method('POST')
            <label for="name_short">Name Short</label>
            <input type="text" class="form-control" name="name_short" id="name_short" placeholder="Name Short">
          </div>
          <div class="form-group">
            <label for="name_long">Name Long</label>
            <input type="text" class="form-control" name="name_long" id="name_long" placeholder="Name Long" required>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
          </div>

          <div class="form-group">
            <label for="contact_no">Contact #</label>
            <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Contact #">
          </div>

          <div class="form-group">
            <label for="payment_term">Terms</label>
            <input type="text" class="form-control" name="payment_term" id="payment_term" placeholder="Terms">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-danger">Submit</button>
        </div>
      </form>
    </div>
  </div>

</section>

<script>
$(document).ready(function() {
  $('[rel="tooltip"]').tooltip({
    trigger: "hover"
  });

  $(".delete").on("click", function() {
    return confirm("Do you want to delete this?");
  });
});
</script>

@endsection