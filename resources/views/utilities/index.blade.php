@extends('layouts.main_layout')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Utilities
                </h1>


                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Utilities</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form method="post" action="{{ route('utilities.store') }}">
                                    @csrf

                                    <div class="input-group mb-3">

                                        <select id="items" name="item_id" class="custom-select" style="width: 100px;"
                                            data-placement="right" rel="tooltip" title="Utility Type">
                                            @foreach($utility_types as $utility_type)
                                            <option value="{{$utility_type->id}}">
                                                {{$utility_type->name_long}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="cost" class="form-control" placeholder="Cost"
                                            autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-dollar-sign"></span>
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

                <div class="modal fade" id="modal-default2">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Utility Types</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form method="post" action="{{ route('utility_types.store') }}">
                                    @csrf

                                    <div class="input-group mb-3">
                                        <input type="text" name="name_long" class="form-control"
                                            placeholder="Name Long" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="name_short" class="form-control"
                                            placeholder="Name Short" autocomplete="off" required>
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
                    <li class="breadcrumb-item active">Utilities</li>
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
                <div class="card-tools btn-group">
                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal"
                        data-target="#modal-default"
                        data-placement="top" rel="tooltip"
                        title="Add Utility"
                    >
                        <i class="fa fa-plus"> </i>
                    </button>

                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal"
                        data-target="#modal-default2"
                        data-placement="top" rel="tooltip"
                        title="Add Utility Types"
                    >
                        <i class="fa fa-bolt"> </i>
                    </button>
                </div>

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
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true">Utilities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false">Utility Types</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">


                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Utility Type</th>
                                        <th>Cost</th>
                                        <th>Creation Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($utilities as $utility)
                                    <tr>
                                        <td> {{$utility->utility_types->name_long}} </td>
                                        <td> {{$utility->cost}} </td>
                                        <td> {{ date('m/d/Y h:i:s A', strtotime($utility->created_at)) }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('utilities.edit', $utility->id)}}"
                                                    data-placement="top" rel="tooltip"
                                                    title="Edit {{$utility->utility_types->name_long}}"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>

                                                <a class="btn btn-danger btn-sm delete"
                                                    href="{{ route('utilities.soft_delete', $utility->id)}} "
                                                    data-placement="top" rel="tooltip"
                                                    title="Delete {{$utility->utility_types->name_long}}"
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
                                        <th>Utility Type</th>
                                        <th>Cost</th>
                                        <th>Creation Date</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>


                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">


                            <table id="example2" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Name Short</th>
                                        <th>Name Long</th>
                                        <th>Creation Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($utility_types as $utility_type)
                                    <tr>
                                        <td> {{$utility_type->name_short}} </td>
                                        <td> {{$utility_type->name_long}} </td>
                                        <td> {{ date('m/d/Y h:i:s A', strtotime($utility_type->created_at)) }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('utility_types.edit', $utility_type->id)}}"
                                                    data-placement="top" rel="tooltip"
                                                    title="Edit {{$utility_type->name_long}}"
                                                    data-original-title="Edit">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>

                                                <a class="btn btn-danger btn-sm delete"
                                                    href="{{ route('utility_types.soft_delete', $utility_type->id)}} "
                                                    data-placement="top" rel="tooltip"
                                                    title="Delete {{$utility_type->name_long}}"
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
                                        <th>Name Short</th>
                                        <th>Name Long</th>
                                        <th>Creation Date</th>
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
