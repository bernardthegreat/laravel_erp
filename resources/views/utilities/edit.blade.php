@extends('layouts.main_layout')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <h1>
                    Utility
                </h1>

            </div>
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('utilities.index')}}">Utilities</a></li>
                    <li class="breadcrumb-item active">Edit Utility</li>
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

            <form role="form" method="post" action="{{ route('utilities.update', $utilities->id) }}">

                <div class="card-body">
                    @csrf
                        @method('PATCH')
                    
                    <div class="form-group">
                        <label for="utility_type_id">Utility Type</label>
                        <select name="utility_type_id" class="custom-select" id="utility_type_id">
                            @foreach($utility_types as $utility_type)
                            <option value="{{$utility_type->id}}" {{ ( $utility_type->id == $utilities->utility_type_id) ? 'selected' : '' }}>
                                {{$utility_type->name_long}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="text" class="form-control" name="cost" id="cost"
                            value="{{$utilities->cost}}" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                      <label for="cost">From Date</label>
                      <div class="input-group mb-3 date" id="utilities_coverage" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#utilities_coverage"
                          name="from_date"
                          autocomplete="off"
                          data-placement="top" rel="tooltip" 
                          value="{{ date('m/d/Y', strtotime($utilities->from_date)) }}"
                          title="Click the icon on the right side to display the calendar" 
                          data-original-title="Click the icon on the right side to display the calendar"
                          required
                        >
                        <div class="input-group-append" data-target="#utilities_coverage" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div> 
                    </div>

                    <div class="form-group">
                      <label for="cost">To Date</label>
                      <div class="input-group mb-3 date" id="utilities_to_date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#utilities_to_date"
                          name="to_date"
                          autocomplete="off"
                          data-placement="top" rel="tooltip" 
                          value="{{ date('m/d/Y', strtotime($utilities->to_date)) }}"
                          title="Click the icon on the right side to display the calendar" 
                          data-original-title="Click the icon on the right side to display the calendar"
                          required
                        >
                        <div class="input-group-append" data-target="#utilities_to_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div> 
                    </div>
                </div>

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
