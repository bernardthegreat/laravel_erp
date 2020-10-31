<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Payroll;
use App\SalaryRate;
use App\Attendance;
use DB;
use PDF;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = DB::select(DB::raw(
            "SELECT 
            id,
            code,
            fullname,
            address,
            contact_no,
            e.created_at,
            (SELECT 
                    from_date
                FROM
                    payroll
                WHERE
                    payroll.employee_id = e.id
                ORDER BY ID DESC
                LIMIT 1) AS from_date,
            (SELECT 
                    to_date
                FROM
                    payroll
                WHERE
                    payroll.employee_id = e.id
                ORDER BY ID DESC
                LIMIT 1) AS to_date
        FROM
            employees e 
        "
        ));

        $attendance = DB::select(DB::raw(
            "SELECT 
                code,
                fullname,
                from_time,
                to_time
            FROM
                attendance a
                    JOIN
                employees e ON e.id = a.employee_id
            WHERE
                a.created_at rlike CURDATE()"
        ));

        

        return view('employees/index', compact('employees', 'attendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $name_suffix = $request->name_suffix;
        $address = $request->address;
        $contact_no = $request->contact_no;
        $user_id = $user->id;
        $remarks = $request->remarks;


        $insert_employee = DB::select('call insert_employee(?,?,?,?,?,?,?,?, @employee)',
            array(
                $first_name, 
                $middle_name,
                $last_name,
                $name_suffix,
                $address,
                $contact_no,
                $user_id,
                $remarks
            )
        );
        $select_error_code = DB::select('select @employee as error_code');
        
        switch ($select_error_code[0]->error_code) {
            case 1:
                return redirect()->back()->with('error', 'Unable to create new employee: Invalid Firstname');
                break;
            case 2:
                return redirect()->back()->with('error', 'Unable to create new employee: Invalid Lastname');
                break;
            case 3:
                return redirect()->back()->with('error', 'Unable to create new employee: Invalid Address');
                break;
            case 4:
                return redirect()->back()->with('error', 'Unable to create new employee: Invalid Order Contact #');
                break;
            case 5:
                return redirect()->back()->with('error', 'Unable to create new employee: Invalid User');
                break;
            case 6:
                return redirect()->back()->with('error', 'Unable to create new employee: Database Error');
                break;
            default:
                return redirect('/employees')->with('success', 'Successfully created employee');
                break;
        }
    }

    public function time_in_and_out(Request $request)
    {
        $user = auth()->user();
        $employee_code = $request->employee_code;
        $user_id = $user->id;
        $remarks = $request->remarks;

        
        $time_in_and_out = DB::select('call insert_update_attendance(?,?,?, @time_in_and_out)',
            array(
                $employee_code, 
                $user_id,
                $remarks
            )
        );
        $select_error_code = DB::select('select @time_in_and_out as error_code');

        switch ($select_error_code[0]->error_code) {
            case 1:
                return redirect()->back()->with('error', 'Unable to create attendance: Invalid Employee');
                break;
            case 2:
                return redirect()->back()->with('error', 'Unable to create attendance: Invalid User');
                break;
            case 3:
                return redirect()->back()->with('error', 'Unable to create attendance: Database Error');
                break;
            default:
                return redirect()->back()->with('success', 'Success');
                break;
        }
    }

    public function process_payroll(Request $request)
    {
        $user = auth()->user();

        $coverage_payroll_date = $request->coverage_payroll_date;
        $splitted_date = explode(' - ', $coverage_payroll_date);

        $employee_id = $request->employee_id;
        $additional_pay = $request->additional_pay;
        $deduction = $request->deduction;
        $cost = $request->cost;
        $from_date = date('Y-m-d', strtotime($splitted_date[0]));
        $to_date = date('Y-m-d', strtotime($splitted_date[1]));
        $user_id = $user->id;
        $remarks = $request->remarks;
        
        
        $payroll = DB::select('call insert_payroll(?,?,?,?,?,?,?,?, @payroll)',
            array(
                $employee_id,
                $from_date,
                $to_date,
                $cost,
                $additional_pay,
                $deduction, 
                $user_id,
                $remarks
            )
        );
        $select_error_code = DB::select('select @payroll as error_code');

        switch ($select_error_code[0]->error_code) {
            case 1:
                return redirect()->back()->with('error', 'Unable to process payroll: Invalid Employee');
                break;
            case 2:
                return redirect()->back()->with('error', 'Unable to process payroll: Invalid User');
                break;
            case 3:
                return redirect()->back()->with('error', 'Unable to process payroll: No hourly fee found');
                break;
            case 4:
                return redirect()->back()->with('error', 'Unable to process payroll: Database Error');
                break;
            default:
                return redirect()->back()->with('success', 'Success');
                break;
        }
    }

    public function generate_latest_payslip($id)
    {
        $payslip = DB::select(DB::raw(
            "SELECT 
                e.code,
                e.id,
                e.fullname,
                e.address,
                e.contact_no,
                p.cost,
                p.addl_pay,
                p.deduction,
                p.from_date,
                p.to_date,
                p.created_at
            FROM
                payroll p
                    JOIN
                employees e ON e.id = p.employee_id
            WHERE
                employee_id = $id
            ORDER BY id DESC
            LIMIT 1"));
        $pdf = PDF::loadView('employees/payslip_print', compact('payslip') );  
        $pdf->setPaper('LETTER', 'landscape'); 
        return $pdf->stream('Payslip.pdf');
    }

    public function get_payslip($id)
    {
        $payslip = DB::select(DB::raw(
            "SELECT 
            fullname,
            contact_no,
            address,
            cost,
            addl_pay,
            deduction,
            from_date,
            to_date,
            p.created_at
        FROM
            payroll p
                JOIN
            employees e ON e.id = p.employee_id
        WHERE
            p.id = $id"));
        
        $pdf = PDF::loadView('employees/payslip_print', compact('payslip') );  
        $pdf->setPaper('LETTER', 'landscape'); 
        return $pdf->stream('Payslip.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employees = Employee::findOrFail($id);

        $payrolls = Payroll::all()->where('employee_id', $id);

        $salary_rates = SalaryRate::all()->where('employee_id', $id)->sortByDesc('created_at');

        return view('employees/edit', compact('employees', 'payrolls', 'salary_rates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'middle_name' => 'max:20',
            'name_suffix' => 'max:10',
            'address' => 'max:50',
            'contact_no' => 'max:20',
        ]);

        $user = auth()->user();

        Employee::whereId($id)->update($validatedData +[
            'updated_by' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Employee successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function soft_delete(Request $request, $id)
    {
        Employee::where('id', $id)->update(array(
            'remarks' => 'inactive'
        ));

        return redirect()->back()->with('error', 'Employee successfully deleted');
    }

    public function add_salary_rates(Request $request)
    {
      $validatedData = $request->validate([
        'employee_id'=>'max:15',
        'hourly_fee'=>'required|max:15',
        'remarks' => 'max:50',
      ]);
    
      $user = auth()->user();

      $show = SalaryRate::create($validatedData + [
          'created_by' => $user->id,
          'updated_by' => $user->id,
      ]);

      return redirect()->back()->with('success', 'Salary rate for this employee successfully saved');
    }

    public function edit_salary_rates($id)
    {
      $salary_rates = SalaryRate::findOrFail($id);
      // $salary_rates = SalaryRate::all()->where('id', $id);
      return view('employees/edit_salary_rates', compact('salary_rates'));
    }

    public function update_salary_rate(Request $request, $id)
    {
      $validatedData = $request->validate([
        'hourly_fee' => 'required|max:20',
      ]);

      $user = auth()->user();

      SalaryRate::whereId($id)->update($validatedData +[
          'updated_by' => $user->id,
      ]);
      
      return redirect('/employees')->with('success', 'Employee Salary Rate successfully updated');
    }

    public function payroll_delete(Request $request, $id)
    {
      $payroll = Payroll::findOrFail($id);
      $payroll->delete();

      return redirect()->back()->with('error', 'Employee payroll successfully deleted');
    }

    public function payroll_edit($id)
    {
      $payroll = Payroll::findOrFail($id);
      // $salary_rates = SalaryRate::all()->where('id', $id);
      return view('employees/edit_employee_payroll', compact('payroll'));
    }

    public function payroll_update(Request $request, $id)
    {
      $validatedData = $request->validate([
        'cost' => 'required|max:20',
        'addl_pay' => 'max:20',
        'deduction' => 'max:20',
        'cost' => 'max:20',
        'remarks'=> 'max:50'
      ]);

      $user = auth()->user();

      $from_date = date('Y-m-d H:i:s', strtotime($request->from_date));
      $to_date = date('Y-m-d H:i:s', strtotime($request->to_date));

      Payroll::whereId($id)->update($validatedData +[
          'updated_by' => $user->id,
          'from_date' => $from_date,
          'to_date' => $to_date
      ]);
      
      return redirect('/employees')->with('success', 'Employee payroll successfully updated');
    }

}
