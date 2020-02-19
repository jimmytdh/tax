<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoadCtrl extends Controller
{
        public function __construct()
        {
            $this->middleware('login');
        }

        public function  employeeYear()
        {
            return view('load.employee_year');
        }
}
