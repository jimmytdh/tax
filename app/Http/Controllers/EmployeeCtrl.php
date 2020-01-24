<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function index(){
        $data = Employee::orderBy('lname','asc')
                    ->get();
        return view('employee',[
            'menu' => 'employee',
            'data' => $data
        ]);
    }
}
