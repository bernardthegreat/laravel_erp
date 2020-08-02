@extends('layouts.main_layout')

@section('content')


 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Analytics</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Analytics</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">



<div class="card">
  <div class="card-header">
        <h3 class="card-title">Disposition Analytics -- <a href="{{route ('analytics.disposition_analytics_print')}}" target="_blank"> Print
        <i class="fa fa-print"></i></a></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>

    @if(isset($disposition))
    <div class="card-body">

        <table id="analytics1" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Disposition</th>
                <th>Total Count</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($disposition as $patient)  
            <tr>
                <td> {{$patient->disposition_name}} </td>
                <td> {{$patient->total}} </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Disposition</th>
                <th>Total Count</th>
            </tr>
            </tfoot>
        </table>
            



    </div>
    @endif
  <!-- /.card-body -->
</div>



</section>
<!-- /.content -->

<script>


</script>

@endsection
