@extends('layouts.main_layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/users">Users</a></li>
                    <li class="breadcrumb-item active">{{$users->first_name}} {{$users->middle_name}}
                        {{$users->last_name}} {{$users->name_suffix}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatar.png')}}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$users->first_name}} {{$users->middle_name}}
                            {{$users->last_name}} {{$users->name_suffix}}</h3>

                        <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Sales</b> <a class="float-right">1,322</a>
                  </li>
                </ul> -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">

                    <form role="form" method="post" action="{{ route('users.update', $users->id ) }}">

                        <div class="card-body">

                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id=""
                                    value="{{$users->first_name}}" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" id=""
                                    value="{{$users->middle_name}}" placeholder="Middle Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id=""
                                    value="{{$users->last_name}}" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" name="password" id="" value=""
                                    placeholder="New Password">
                            </div>

                            <div class="form-group">
                                <label for="prefix">Name Suffix</label>
                                <input type="text" class="form-control" name="prefix" id="prefix" value="{{$users->prefix}}"
                                    placeholder="Prefix" autocomplete="off">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.card -->





@endsection
