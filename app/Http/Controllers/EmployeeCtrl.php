<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function index($edit = false, $info = null)
    {
        $keyword = Session::get('empKeyword');

        $data = Employee::select('*');
        if($keyword){
            $data = $data->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orwhere('mname','like',"%$keyword%")
                    ->orwhere('lname','like',"%$keyword%")
                    ->orwhere('division','like',"%$keyword%")
                    ->orwhere('designation','like',"%$keyword%");
            });
        }
        $data = $data->orderBy('lname','asc')
            ->paginate(15);

        $designation = Designation::orderBy('name','asc')->get();

        return view('employee',[
            'menu' => 'employee',
            'data' => $data,
            'edit' => $edit,
            'info' => $info,
            'designation' => $designation
        ]);
    }

    public function search(Request $req)
    {
        Session::put('empKeyword',$req->keyword);
        return self::index(false,null);
    }

    public function save(Request $req)
    {
        $data = array(
            'birth_date' => $req->dob,
            'lname' => $req->lname,
            'mname' => $req->mname,
            'fname' => $req->fname,
            'suffix' => $req->suffix,
            'division' => $req->division,
            'designation' => $req->designation,
            'hired_date' => $req->hired_date
        );

        Employee::create($data);

        return redirect()->back()->with('status','saved');
    }

    public function update(Request $req, $id)
    {
        Employee::find($id)
            ->update([
                'birth_date' => $req->dob,
                'lname' => $req->lname,
                'mname' => $req->mname,
                'fname' => $req->fname,
                'suffix' => $req->suffix,
                'division' => $req->division,
                'designation' => $req->designation,
                'hired_date' => $req->hired_date
            ]);

        return redirect()->back()->with('status','updated');
    }

    public function delete($id)
    {
        Employee::find($id)->delete();

        return redirect('/employee')->with('status','deleted');
    }

    public function edit($id)
    {
        $info = Employee::find($id);
        if(!$info)
            return redirect('/employee');

        return self::index(true,$info);
    }
}
