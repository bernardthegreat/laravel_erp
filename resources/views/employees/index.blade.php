@extends('layouts.main_layout')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Employees
                </h1>


                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Register Employees</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form method="post" action="{{ route('employees.store') }}">
                                    @csrf

                                    <div class="input-group mb-3">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Username" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="First Name" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="middle_name" class="form-control"
                                            placeholder="Middle Name" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                            autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="name_suffix" class="form-control"
                                            placeholder="Name Suffix" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                    <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal"
                        data-target="#modal-default">
                    <i class="fa fa-plus"> </i>
                    </button>
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

            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact #</th>
                        <th>Creation Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td> {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}</td>
                        <td> {{$employee->address}} </td>
                        <td> {{$employee->contact_no}}</td>
                        <td> {{ date('m/d/Y h:i:s A', strtotime($employee->created_at)) }} </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger btn-sm" href="{{ route('employees.edit', $employee->id)}}"
                                    data-placement="top" rel="tooltip" title="Edit {{$employee->first_name}}"
                                    data-original-title="Edit">
                                    <i class="fa fa-edit">
                                    </i>
                                </a>

                                <a class="btn btn-danger btn-sm delete"
                                    href="{{ route('employees.soft_delete', $employee->id)}} " data-placement="top"
                                    rel="tooltip" title="Delete {{$employee->first_name}}" data-original-title="soft ">
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
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact #</th>
                        <th>Creation Date</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>



        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<script>
    
    $(document).ready(function () {
        $('[rel="tooltip"]').tooltip({
            trigger: "hover"
        });

        $(".delete").on("click", function () {
            return confirm("Do you want to delete this?");
        });
    });

</script>

@endsection
