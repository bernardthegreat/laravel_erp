@extends('layouts.main_layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Revenue
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Revenue</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sell</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post" action="{{ route('insert_sale') }}">
                    @csrf

                    
                    <div class="input-group mb-3">
                        <select name="client_id" class="custom-select" id="client_id" 
                            data-placement="right" rel="tooltip" title="Clients"
                        >
                            @foreach($clients as $client) 
                                <option value="{{$client->id}}">{{$client->name_long}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <select name="item_id" class="custom-select" id="item_id"
                            data-placement="right" rel="tooltip" title="Items"
                        >
                            @foreach($items as $item) 
                                <option value="{{$item->item_id}}">{{$item->item_name}} -- {{$item->qty}}  {{$item->unit}}/s in stock </em></option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    <div class="input-group mb-3">
                        <input type="text" name="order_qty" class="form-control" placeholder="Quantity"
                            autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill-alt"></span>
                            </div>
                        </div>
                    </div>

                   
                    <div class="input-group mb-3">
                        <input type="text" name="discount" class="form-control" placeholder="Discount"
                            autocomplete="off" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill-alt"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="additional_fee" class="form-control" placeholder="Additional Fee"
                            autocomplete="off" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill-alt"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="dr_no" class="form-control" placeholder="DR #"
                            autocomplete="off" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill-alt"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="invoice_no" class="form-control" placeholder="Invoice #"
                            autocomplete="off" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill-alt"></span>
                            </div>
                        </div>
                    </div>

                    @php
                        $user = auth()->user();
                    @endphp
                    <input type="hidden" name="user_id"  id="user_id" value="{{$user->id}}" class="form-control" autocomplete="off">

                    
                    <div class="input-group mb-3">
                        <textarea class="form-control" rows="3" name="remarks" id="remarks" placeholder="Remarks"></textarea>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="card-tools btn-group">
                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal"
                        data-target="#modal-default" data-placement="top" rel="tooltip" title="Sell">
                        <i class="fa fa-plus"> </i>
                    </button>
                    <a href="{{ route('payments') }}" class="btn btn-danger btn-flat" 
                    data-placement="top" rel="tooltip" title="Process Payment">
                        <i class="fa fa-money-bill-alt"> </i>
                    </a>

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

            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Sold Date</th>
                        <th>Client</th>
                        <th>Item</th>
                        <th>DR #</th>
                        <th>Cost</th>
                        <th>Quantity</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td> {{ date('m/d/Y h:i:s A', strtotime($sale->created_at)) }} </td>
                        <td> {{$sale->client_name}} </td>
                        <td> {{$sale->item_name}} </td>
                        <td> {{$sale->dr_no}} </td>
                        <td> {{$sale->cost}} </td>
                        <td> {{$sale->qty}} </td>
                        <td> 

                            <div class="btn-group">
                                <a class="btn btn-danger btn-sm" href="{{ route('sales.edit', $sale->id)}}"
                                    data-placement="top" rel="tooltip" title="Edit {{$sale->client_name}}"
                                    data-original-title="Edit">
                                    <i class="fa fa-edit">
                                    </i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sold Date</th>
                        <th>Client</th>
                        <th>Item</th>
                        <th>DR #</th>
                        <th>Cost</th>
                        <th>Quantity</th>
                        <th> </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<!-- Main content -->

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
