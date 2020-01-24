<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;

class SalaryCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function index(){

    }

    static function getInfo($id)
    {
        $output = Salary::orderBy('code','desc')->findOrFail($id);
        return $output;
    }
}
