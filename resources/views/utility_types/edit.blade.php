@extends('layouts.main_layout')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Utility Types
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('utilities.index')}}">Utilities</a></li>
                    <li class="breadcrumb-item active">Edit {{$utility_types->name_long}}</li>
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
                Edit Utility
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

            <form role="form" method="post" action="{{ route('utility_types.update', $utility_types->id) }}">

                <div class="card-body">
                    @csrf
                        @method('PATCH')
                    <div class="form-group">
                        <label for="name_short">Name Short</label>
                        <input type="text" class="form-control" name="name_short" id="name_short"
                            value="{{$utility_types->name_short}}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="name_long">Name Long</label>
                        <input type="text" class="form-control" name="name_long" id="name_long"
                            value="{{$utility_types->name_long}}" autocomplete="off">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>

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
