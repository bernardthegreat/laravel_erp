@extends('layouts.main_layout')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <h1>
          Utilities
        </h1>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Utilities</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{ route('utilities.store') }}">
                  @csrf
                  <div class="input-group mb-3">
                    <select id="items" name="utility_type_id" class="custom-select" style="width: 100px;"
                      data-placement="right" rel="tooltip" title="Utility Type">
                      @foreach($utility_types as $utility_type)
                      <option value="{{$utility_type->id}}">
                        {{$utility_type->name_long}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="cost" class="form-control" placeholder="Cost" autocomplete="off" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-dollar-sign"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3 date" id="utilities_coverage" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#utilities_coverage"
                        name="from_date"
                        autocomplete="off"
                        data-placement="top" rel="tooltip" 
                        title="Click the icon on the right side to display the calendar" 
                        data-original-title="Click the icon on the right side to display the calendar"
                      >
                      <div class="input-group-append" data-target="#utilities_coverage" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div> 
                  <div class="input-group mb-3 date" id="utilities_to_date" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#utilities_to_date"
                        name="to_date"
                        autocomplete="off"
                        data-placement="top" rel="tooltip" 
                        title="Click the icon on the right side to display the calendar" 
                        data-original-title="Click the icon on the right side to display the calendar"
                      >
                      <div class="input-group-append" data-target="#utilities_to_date" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>                 
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-default2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Utility Types</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{ route('utility_types.store') }}">
                  @csrf
                  <div class="input-group mb-3">
                    <input type="text" name="name_long" class="form-control" placeholder="Name" autocomplete="off"
                      required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-bolt"></span>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Utilities</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <div class="card-tools btn-group">
          <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-default2"
            data-placement="top" rel="tooltip" title="Add Utility Types">
            <i class="fa fa-bolt"> </i>
          </button>
          <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-default"
            data-placement="top" rel="tooltip" title="Add Utility">
            <i class="fa fa-plus"> </i>
          </button>
        </div>
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-7">
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th colspan="5"> Utilities </th>
              </tr>
              <tr>
                <th>Utility Type</th>
                <th>Cost</th>
                <th>Coverage</th>
                <th>Creation Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($utilities as $utility)
              <tr>
                <td> {{$utility->utility_types->name_long}} </td>
                <td> {{$utility->cost}} </td>
                <td> 
                  @if(isset($utility->from_date))
                    {{ date('M Y', strtotime($utility->from_date)) }} - {{ date('M Y', strtotime($utility->to_date)) }}
                  @endif
                </td>
                <td> {{ date('m/d/Y h:i:s A', strtotime($utility->created_at)) }} </td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-danger btn-sm" href="{{ route('utilities.edit', $utility->id)}}"
                      data-placement="top" rel="tooltip" title="Edit {{$utility->utility_types->name_long}}"
                      data-original-title="Edit">
                      <i class="fa fa-edit">
                      </i>
                    </a>
                    <a class="btn btn-danger btn-sm delete" href="{{ route('utilities.soft_delete', $utility->id)}} "
                      data-placement="top" rel="tooltip" title="Delete {{$utility->utility_types->name_long}}"
                      data-original-title="soft ">
                      <i class="fa fa-trash">
                      </i>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Utility Type</th>
                <th>Cost</th>
                <th>Coverage</th>
                <th>Creation Date</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-sm-5">
          <table id="example2" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th colspan="4"> Utility Types </th>
              </tr>
              <tr>
                <th>Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($utility_types as $utility_type)
              <tr>
                <td> {{$utility_type->name_long}} </td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-danger btn-sm" href="{{ route('utility_types.edit', $utility_type->id)}}"
                      data-placement="top" rel="tooltip" title="Edit {{$utility_type->name_long}}"
                      data-original-title="Edit">
                      <i class="fa fa-edit">
                      </i>
                    </a>
                    <a class="btn btn-danger btn-sm delete"
                      href="{{ route('utility_types.soft_delete', $utility_type->id)}} " data-placement="top"
                      rel="tooltip" title="Delete {{$utility_type->name_long}}" data-original-title="soft ">
                      <i class="fa fa-trash">
                      </i>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection