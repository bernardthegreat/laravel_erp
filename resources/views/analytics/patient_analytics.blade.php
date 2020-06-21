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
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

<!-- Default box -->


<div class="card">
  <div class="card-header">
        <h3 class="card-title">Patient Analytics</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>

    @if(isset($patient_census))
    <div class="card-body">
        <a href="{{route ('analytics.patient_analytics_print')}}"> Print
        <i class="fa fa-print"></i></a>
        <table>
        <tr>
          <td> Patient </td>
        <tr>
        @foreach($patient_census as $patient)  
        <tr>
            <td> {{$patient->disposition_name}} </td>
            <td> {{$patient->total}} </td>
        </tr>
        @endforeach
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
