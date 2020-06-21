@extends('layouts.main_layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Reports</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Sales Report</li>
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
                            Monthly Income Report
                        </h3>
                        <div class="card-tools">
                            <a href="/sales/reports/print/monthly_sales_income" target="_blank" 
                            class="btn-sm btn-info"> <i class="fa fa-print"></i>  Print </a>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Item</th>
                                    <th>Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($monthly_sales_report as $sales)
                                <tr>
                                    <td> {{$sales->client_name}} </td>
                                    <td> {{$sales->item_name}} </td>
                                    <td> {{$sales->total_cost}} </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                    <th>Client Name</th>
                                    <th>Item</th>
                                    <th>Total Cost</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div><!-- /.card-body -->
                </div>

                <!-- /.card -->
            </section>




            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Sales
                        </h3>

                        <div class="card-tools">
                            <a href="/sales/reports/print/monthly_sales_income" target="_blank" class="btn-sm btn-success"> <i class="fa fa-print"></i>  Print </a>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">

                        <table id="example2" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td> test data </td>
                                    <td> test data </td>
                                    <td> test data </td>
                                    <td> test data </td>
                                    <td> test data </td>
                                    <td> test data </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                    <th>Sales</th>
                                    <th>Sales</th>
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
