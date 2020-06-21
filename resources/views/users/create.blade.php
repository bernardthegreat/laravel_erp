@extends('layouts.login_layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add User
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
      <form method="post" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group">
        
            <input type="text" name="username">   
        </div>

        <div class="form-group">
            <input type="password" name="password">   
        </div>

        <div class="form-group">
            <input type="text" name="first_name">   
        </div>

        <div class="form-group">
            <input type="text" name="last_name">   
        </div>

        <div class="form-group">
            <input type="text" name="created_by">   
        </div>
        <div class="form-group">
            <input type="text" name="updated_by">   
        </div>
          <button type="submit" class="btn btn-primary">Add Data</button>
      </form>
  </div>
</div>
@endsection