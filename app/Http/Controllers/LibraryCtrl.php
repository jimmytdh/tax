<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function designation()
    {
        return view('designation',[
            'menu' => 'lib',
            'sub' => 'designation',
            'data' => array()
        ]);
    }
}
