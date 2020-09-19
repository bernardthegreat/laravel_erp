@extends('layouts.login_layout')

@section('content')
<div class="login-logo">
  <b>Web</b>ERP
</div>
<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">Sign in using your account.</p>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username"
          name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
        @error('username')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"
          name="password" required autocomplete="current-password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-danger btn-block">Log In</button>
        </div>
      </div>
    </form>
  </div>
  @endsection