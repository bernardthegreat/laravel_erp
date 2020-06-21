@extends('layouts.main_layout')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Suppliers
                </h1>


                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Supplier</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form method="post" action="{{ route('suppliers.store') }}">
                                    @csrf

                                    <div class="input-group mb-3">
                                        <input type="text" name="name_short" class="form-control"
                                            placeholder="Short Name" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="name_long" class="form-control"
                                            placeholder="Long Name" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="input-group mb-3">
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Address" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" name="contact_no" class="form-control"
                                            placeholder="Contact No." autocomplete="off">
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
                    <li class="breadcrumb-item active">Suppliers</li>
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
                    data-target="#modal-default" data-placement="top" rel="tooltip" title="Create Supplier">
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
                        <th>Name Short</th>
                        <th>Name Long</th>
                        <th>Contact No</th>
                        <th>Creation Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td> {{$supplier->name_short}} </td>
                        <td> {{$supplier->name_long}} </td>
                        <td> {{$supplier->contact_no}} </td>
                        <td> {{ date('m/d/Y h:i:s A', strtotime($supplier->created_at)) }} </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger btn-sm" href="{{ route('suppliers.edit', $supplier->id)}}"
                                    data-placement="top" rel="tooltip" title="Edit {{$supplier->name_short}}"
                                    data-original-title="Edit">
                                    <i class="fa fa-edit">
                                    </i>
                                </a>

                                <a class="btn btn-danger btn-sm delete"
                                    href="{{ route('suppliers.soft_delete', $supplier->id)}} " data-placement="top"
                                    rel="tooltip" title="Delete {{$supplier->name_short}}" data-original-title="soft ">
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
                        <th>Name Short</th>
                        <th>Name Long</th>
                        <th>Contact No</th>
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
