@extends('layouts.main_layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Employee Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/employees">Employees</a></li>
                    <li class="breadcrumb-item active">{{$employees->first_name}} {{$employees->middle_name}}
                        {{$employees->last_name}} {{$employees->name_suffix}}</li>
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

                        <h3 class="profile-username text-center"> {{$employees->first_name}} {{$employees->middle_name}}
                            {{$employees->last_name}} {{$employees->name_suffix}} </h3>

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
                    <div class="card-header">
                        <h3 class="card-title">
                            {{$employees->first_name}} {{$employees->middle_name}}
                            {{$employees->last_name}} {{$employees->name_suffix}}
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="card card-danger card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                            href="#custom-tabs-four-home" role="tab"
                                            aria-controls="custom-tabs-four-home" aria-selected="true">Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                            href="#custom-tabs-four-profile" role="tab"
                                            aria-controls="custom-tabs-four-profile" aria-selected="false">Payroll</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-home-tab">

                                        <form role="form" method="post"
                                            action="{{ route('employees.update', $employees->id ) }}">

                                            <div class="card-body">

                                                <div class="form-group">
                                                    @csrf
                                                    @method('PATCH')
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" id=""
                                                        value="{{$employees->first_name}}" placeholder="First Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle_name">Middle Name</label>
                                                    <input type="text" class="form-control" name="middle_name" id=""
                                                        value="{{$employees->middle_name}}" placeholder="Middle Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" id=""
                                                        value="{{$employees->last_name}}" placeholder="Last Name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="prefix">Name Suffix</label>
                                                    <input type="text" class="form-control" name="prefix" id="prefix"
                                                        value="{{$employees->prefix}}" placeholder="Prefix"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="prefix">Address</label>
                                                    <input type="text" class="form-control" name="address" id="address"
                                                        value="{{$employees->address}}" placeholder="Address"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="prefix">Contact #</label>
                                                    <input type="text" class="form-control" name="contact_no"
                                                        id="contact_no" value="{{$employees->contact_no}}"
                                                        placeholder="Contact #" autocomplete="off">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-profile-tab">


                                        <table id="example1" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Hours Worked</th>
                                                    <th>Cost</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($payrolls as $payroll)
                                                <tr>
                                                    <td> {{$payroll->hours_worked}}</td>
                                                    <td> {{$payroll->cost}}</td>
                                                    
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-danger btn-sm"
                                                                href="{{ route('employees.edit', $employees->id)}}"
                                                                data-placement="top" rel="tooltip"
                                                                title="Print Payslip of {{$employees->first_name}} "
                                                                data-original-title="Edit">
                                                                <i class="fa fa-print">
                                                                </i>
                                                            </a>

                                                            <a class="btn btn-danger btn-sm delete"
                                                                href="{{ route('employees.soft_delete', $employees->id)}} "
                                                                data-placement="top" rel="tooltip"
                                                                title="Delete "
                                                                data-original-title="soft ">
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
                                                    <th>Hours Worked</th>
                                                    <th>Cost</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>







                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.card -->





@endsection
