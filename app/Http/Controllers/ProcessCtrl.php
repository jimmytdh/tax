<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Session;

class ProcessCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function index()
    {
        $status = session('status');
        self::updateEmployee(Session::get('csv'));
        return self::parseCsv();
    }

    public function parseCsv()
    {
        $data = Session::get('csv');
        if(!isset($data))
        {
            return redirect('/');
        }
        $headers = $data->first()->keys();
        $included = array(
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'designation' => 'Designation',
            'salaryGrade' => 'Salary Grade',
            'basicSalary' => 'Basic Salary',
            'laundry' => 'Laundry',
            'hazard' => 'Hazard Pay'
        );

        return view('imported',[
            'menu' => 'imported',
            'data' => $data,
            'headers' => $headers,
            'included' => $included
        ]);
    }

    public function importCsv(Request $req)
    {
        $path = $req->file('payroll')->getRealPath();
        $data = Excel::load($path)->get();
        Session::put('payroll_code',"$req->year-$req->month");
        Session::put('csv',$data);

        return redirect('/upload')->with('status','import');
    }

    public function updateEmployee($data)
    {
        $code = Session::get('payroll_code');
        foreach ($data as $row) {
            $match = array(
                'lname' => $row->family_name,
                'fname' => $row->first_name,
                'mname' => $row->middle_initial,
                'suffix' => $row->suffix
            );

            $employee = array(
                'designation' => $row->designation,
                'salary_grade' => $row->sg,
                'basic_salary' => $row['4th_tranche_basic_pay'],
                'division' => $row->division,
                'land_bank_acct' => $row->land_bank_acct,
                'phlhealth_pen' => $row->phlhealth_pen,
                'pag_ibig_mid' => $row->pag_ibig_mid,
                'gsis_bp_number' => $row->gsis_bp_number,
                'bir_tin_number' => $row->bir_tin_number,
                'birth_date' => $row->birth_date
            );

            $emp = Employee::updateOrCreate($match, $employee);

            $tmp = array(
                'emp_id' => $emp->id,
                'designation' => $row->designation,
                'appointment_date' => $row->appointment_date,
                'sg' => $row->sg,
                'basic_salary' => $row['4th_tranche_basic_pay']
            );

            Salary::updateOrCreate($tmp,[
                'code' => $code
            ]);
        }
    }

}
