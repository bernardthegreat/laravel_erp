@extends('layouts.main_layout')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Orders
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Orders</a></li>
                    <li class="breadcrumb-item active">Update Order</li>
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
                Update Order
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

            <form role="form" method="post" action="{{ route('purchases.update', $purchases->id) }}">

                <div class="card-body">

                    <div class="form-group">
                        <label for="name_long">Item</label>
                        <select name="supplier_id" class="custom-select" id="supplier_id">
                            @foreach($items as $item)
                            <option value="{{$item->id}}" {{ ( $item->id == $purchases->item_id) ? 'selected' : '' }}>
                                {{$item->name_long}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        @csrf
                        @method('POST')
                        <label for="dr_no">DR #</label>
                        <input type="text" class="form-control" name="dr_no" id="dr_no"
                            value="{{$purchases->dr_no}}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="text" class="form-control" name="cost" id="cost"
                            value="{{$purchases->cost}}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="text" class="form-control" name="qty" id="cost"
                            value="{{$purchases->qty}}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="order_datetime">Ordered On</label>
                        <input type="text" class="form-control" id="order_datetime"
                            value="{{ date('m/d/Y h:i:s A', strtotime($purchases->created_at)) }}" autocomplete="off" readonly>
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
