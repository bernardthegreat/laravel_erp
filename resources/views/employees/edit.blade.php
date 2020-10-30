@extends('layouts.main_layout')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Employee Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/employees">Employees</a></li>
          <li class="breadcrumb-item active">{{$employees->first_name}} {{$employees->middle_name}}
            {{$employees->last_name}} {{$employees->name_suffix}}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-danger card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatar.png')}}"
                alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"> {{$employees->first_name}} {{$employees->middle_name}}
              {{$employees->last_name}} {{$employees->name_suffix}} </h3>
            <p class="text-muted text-center"> {{$employees->contact_no}} </p>
          </div>
        </div>
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Salary Rates</h3>
              <div class="card-tools">
                <a class="btn btn-danger btn-sm" href="#" 
                  data-toggle="modal"
                  data-target="#modal-salary-rates"
                  data-placement="top" rel="tooltip" title="Edit Salary Rate of {{$employees->fullname}}"
                >
                  <i class="fa fa-plus">
                  </i>
                </a>
              </div>
            </div>
            <div class="card-body mb-4" style="height:600px; overflow-y:auto;">
              <table class="table table-bordered table-striped text-center">
                @foreach($salary_rates as $salary_rate)
                <tr>
                  <th>
                    Hourly Fee.: {{$salary_rate->hourly_fee}} <br>
                  </th>
                  <td>
                    Created: {{ date('m/d/Y h:i:s A', strtotime($salary_rate->created_at)) }}
                  </td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="{{ route('employees.edit_salary_rates', $salary_rate->id)}}"
                        data-placement="top" rel="tooltip" title="Edit Salary Rate"
                        data-original-title="Edit">
                        <i class="fa fa-edit">
                        </i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              {{$employees->first_name}} {{$employees->middle_name}}
              {{$employees->last_name}} {{$employees->name_suffix}}
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <form role="form" method="post" action="{{ route('employees.update', $employees->id ) }}">
              <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="" value="{{$employees->first_name}}"
                  placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" name="middle_name" id="" value="{{$employees->middle_name}}"
                  placeholder="Middle Name">
              </div>
              <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="" value="{{$employees->last_name}}"
                  placeholder="Last Name">
              </div>
              <div class="form-group">
                <label for="prefix">Name Suffix</label>
                <input type="text" class="form-control" name="name_suffix" id="Name Suffix" value="{{$employees->name_suffix}}"
                  placeholder="Prefix" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="prefix">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{$employees->address}}"
                  placeholder="Address" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="prefix">Contact #</label>
                <input type="text" class="form-control" name="contact_no" id="contact_no"
                  value="{{$employees->contact_no}}" placeholder="Contact #" autocomplete="off">
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-danger">Submit</button>
          </div>
          </form>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Payroll
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Hours Worked</th>
                  <th>Cost</th>
                  <th>Coverage</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($payrolls as $payroll)
                <tr>
                  <td> {{$payroll->hours_worked}}</td>
                  <td> {{$payroll->cost}}</td>
                  <td> {{ date('m/d/Y', strtotime($payroll->from_date)) }} -
                    {{ date('m/d/Y', strtotime($payroll->to_date)) }} </td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-danger btn-sm" href="{{ route('get_payslip', $payroll->id)}}" target="_blank"
                        data-placement="top" rel="tooltip" title="Print Payslip of {{$employees->first_name}} "
                        data-original-title="">
                        <i class="fa fa-print">
                        </i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Hours Worked</th>
                  <th>Cost</th>
                  <th>Coverage</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <div class="modal fade modal-process-payment" id="modal-salary-rates">
          <form method="post" action="{{ route('employees.add_salary_rates', $employees->id ) }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Salary Rate </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="data-employee-id" name="employee_id" value="{{$employees->id}}">
                    <div class="input-group mb-3">
                      <input type="number" name="hourly_fee" id="hourly_fee" class="form-control"
                          placeholder="Hourly Fee" autocomplete="off" required>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-money-bill"></span>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="data-salaryrate-url" class="btn btn-danger" onClick="">Save Salary Rate</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

@endsection