@extends('layouts.main_layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">WebERP</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Stocks</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Stocks
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('pdf_stock_count') }}" target="_blank" 
                            class="btn-sm btn-info"> <i class="fa fa-print"></i>  Print </a>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                   
                    <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th width="50%">Item</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($stock_count as $sales)
                                <tr>
                                    <td> {{$sales->item}} </td>
                                    <td> {{$sales->stock_count}} </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                    <th>Item</th>
                                    <th>Count</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div><!-- /.card-body -->
                </div>

                <!-- /.card -->
            </section>



        </div>


    </div>
</section>

@endsection
