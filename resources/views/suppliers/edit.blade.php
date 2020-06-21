@extends('layouts.main_layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Client Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">{{$clients->name_long}}</li>
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
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatar.png')}}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$clients->name_long}} </h3>

                        <!-- <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Total Sales</b> <a class="float-right">1,322</a>
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

                    <form role="form" method="post" action="{{ route('clients.update', $clients->id ) }}">

                        <div class="card-body">

                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="exampleInputEmail1">Name Short</label>
                                <input type="text" class="form-control" name="name_short" id=""
                                    value="{{$clients->name_short}}" placeholder="Name Short">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Long</label>
                                <input type="text" class="form-control" name="name_long" id=""
                                    value="{{$clients->name_long}}" placeholder="Name Long">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" name="address" id=""
                                    value="{{$clients->address}}" placeholder="Address">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact #</label>
                                <input type="text" class="form-control" name="contact_no" id=""
                                    value="{{$clients->contact_no}}" placeholder="Contact #">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
