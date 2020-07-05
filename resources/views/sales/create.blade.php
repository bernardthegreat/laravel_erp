@extends('layouts.main_layout')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Sales
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Sales</li>
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
                Sell to
                <em class="text-bold">
                    @foreach($client as $client_name) 
                        {{$client_name->name_long}}
                    @endforeach
                </em>
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


            <form method="post" action="{{ route('insert_sale') }}">
                @csrf
                @foreach($client as $client_name) 
                    <input type="hidden" name="client_id"  id="client_id" value="{{$client_name->id}}" class="form-control" autocomplete="off">
                @endforeach

                @php
                    $user = auth()->user();
                @endphp
                <input type="hidden" name="user_id"  id="user_id" value="{{$user->id}}" class="form-control" autocomplete="off">
                <label class="col-form-label" for="item_id"><i class="fas fa-check"></i> Item <span style="color:red">*</span></label>
                <div class="input-group mb-3">
                    <select name="item_id" class="custom-select" id="item_id">
                        @foreach($items as $item) 
                            <option value="{{$item->item_id}}">{{$item->item_name}} -- {{$item->qty}}  {{$item->unit}}/s in stock </em></option>
                        @endforeach
                    </select>
                </div>
                

                

                <label class="col-form-label" for="order_qty"><i class="fas fa-check"></i> Quantity <span style="color:red">*</span></label>
                <div class="input-group mb-3">
                    <input type="text" name="order_qty"  id="order_qty" class="form-control" autocomplete="off" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-box"></span>
                        </div>
                    </div>
                </div>

                <label class="col-form-label" for="discount"><i class="fas fa-check"></i> Discount</label>
                <div class="input-group mb-3">
                    <input type="number" name="discount"  id="discount" class="form-control" autocomplete="off" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-box"></span>
                        </div>
                    </div>
                </div>

                <label class="col-form-label" for="additional_fee"><i class="fas fa-check"></i> Additional Fee </label>
                <div class="input-group mb-3">
                    <input type="number" name="additional_fee"  id="additional_fee" class="form-control" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-box"></span>
                        </div>
                    </div>
                </div>

                <label class="col-form-label" for="dr_no"><i class="fas fa-check"></i> DR # </label>
                <div class="input-group mb-3">
                    <input type="number" name="dr_no"  id="dr_no" class="form-control" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-box"></span>
                        </div>
                    </div>
                </div>

                <label class="col-form-label" for="invoice_no"><i class="fas fa-check"></i> Invoice # </label>
                <div class="input-group mb-3">
                    <input type="number" name="invoice_no"  id="invoice_no" class="form-control" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-box"></span>
                        </div>
                    </div>
                </div>

                <label class="col-form-label" for="remarks"><i class="fas fa-check"></i> Remarks </label>
                <div class="input-group mb-3">
                    <textarea class="form-control" rows="3" name="remarks" id="remarks" placeholder="" ></textarea>

                </div>


                <div class="justify-content-between">
                    <button type="submit" class="btn btn-danger">Sell</button>
                    <small style="color:red"><em>* Fields required</em></small>
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
