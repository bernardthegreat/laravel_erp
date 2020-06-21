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
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content" id="app">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-orange elevation-1">
                        <i class="fa fa-user-plus"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Yesterday's Sales</span>
                        <span id="yesterday_sales" class="info-box-number count"></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1">
                        <i class="fa fa-viruses"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Today's Sales</span>
                        <span id="today_sales" class="info-box-number count"></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fa fa-hand-holding-heart "></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Client Dues</span>
                        <span id="client_dues" class="info-box-number count">

                        </span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-gray-dark elevation-1">
                        <i class="fa fa-hand-holding-medical"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Client Lapses</span>
                        <span id="deaths" class="info-box-number count">

                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </div>
</section>

<!-- Main content -->



<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sales</h3>

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
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Sales</th>
                        <th>Sales</th>
                        <th>Sales</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>



<section class="content">

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>Sales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Sales</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>Sales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Sales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

</section>



@endsection
