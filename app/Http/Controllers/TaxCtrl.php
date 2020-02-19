<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class TaxCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function index()
    {

    }

    public function taxPerEmployee(Request $req)
    {
        $employee = Employee::where('employees.id',$req->emp)
                ->leftJoin('salary','employees.id','=','salary.emp_id')
                ->first();

        return view('taxEmployee',[
            'menu' => 'tax',
            'employee' => $employee,
            'year' => $req->year
        ]);
    }
}
