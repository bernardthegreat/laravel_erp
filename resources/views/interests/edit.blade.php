@extends('layouts.main_layout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Interest
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('interests.index')}}">Interests</a></li>
                    <li class="breadcrumb-item active">Edit Interest</li>
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
                Edit Interest
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

            <form role="form" method="post" action="{{ route('interests.update', $interests->id) }}">

                <div class="card-body">
                    @csrf
                        @method('PATCH')
                    
                    <div class="form-group">
                        <label for="item_id">Item</label>
                        <select name="item_id" class="custom-select" id="item_id">
                            @foreach($items as $item)
                            <option value="{{$item->id}}" {{ ( $item->id == $interests->item_id) ? 'selected' : '' }}>
                                {{$item->name_long}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="qty_from">Quantity From</label>
                        <input type="text" class="form-control" name="qty_from" id="qty_from"
                            value="{{$interests->qty_from}}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="qty_from">Quantity To</label>
                        <input type="text" class="form-control" name="qty_to" id="qty_to"
                            value="{{$interests->qty_to}}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="rate">Rate</label>
                        <input type="text" class="form-control" name="rate" id="rate"
                            value="{{$interests->rate}}" autocomplete="off">
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
