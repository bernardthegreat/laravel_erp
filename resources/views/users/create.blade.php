@extends('layouts.login_layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Register User
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('users.external_store') }}">
        @csrf
        <div class="form-group">
        
            <input type="text" name="username" placeholder="Username">   
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password">   
        </div>

        <div class="form-group">
            <input type="text" name="first_name" placeholder="Firstname">   
        </div>

        <div class="form-group">
            <input type="text" name="last_name" placeholder="Lastname">   
        </div>
          <button type="submit" class="btn btn-primary">Register</button>
      </form>
  </div>
</div>
@endsection