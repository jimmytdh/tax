<?php

namespace App\Http\Controllers;

use App\Designation;
use App\SalaryGradeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LibraryCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function designation($edit = false, $info = null)
    {
        $keyword = Session::get('designationKeyword');

        $data = Designation::select('*');
        if($keyword){
            $data = $data->where(function($q) use ($keyword){
                $q->where('name','like',"%$keyword%")
                    ->orwhere('code','like',"%$keyword%");
            });
        }
        $data = $data->orderBy('name','asc')
                    ->paginate(15);

        return view('designation',[
            'menu' => 'lib',
            'sub' => 'designation',
            'data' => $data,
            'edit' => $edit,
            'info' => $info
        ]);
    }

    public function designationSearch(Request $req)
    {
        Session::put('designationKeyword',$req->keyword);
        return redirect('/library/designation');
    }

    public function designationSave(Request $req)
    {
        $data = array(
            'code' => $req->code,
            'name' => $req->name,
            'salary_grade' => $req->sg
        );
        Designation::create($data);

        return redirect()->back()->with('status','saved');
    }

    public function designationEdit($id)
    {
        $info = Designation::find($id);
        if(!$info)
            return redirect('/library/designation');

        return self::designation(true,$info);
    }

    public function designationUpdate(Request $req, $id)
    {
        Designation::find($id)
            ->update([
                'code' => $req->code,
                'name' => $req->name,
                'salary_grade' => $req->sg
            ]);
        return redirect()->back()->with('status','updated');
    }

    static function getDesignationInfo($id)
    {
        $info = Designation::find($id);
        if($info)
            return $info;
        return (object) array(
            'name' => '',
            'code' => '',
            'id' => ''
        );
    }
    public function sg()
    {
        $year = Session::get('year');
        if(!$year)
            $year = date('Y');

        return view('sg',[
            'menu' => 'lib',
            'sub' => 'sg',
            'data' => array(),
            'year' => $year
        ]);
    }

    public function updateSg(Request $req)
    {
        $year = Session::get('year');
        if(!$year)
            $year = date('Y');
        $match = array(
            'id' => $req->pk
        );
        $data = array(
            $req->name => floatval(str_replace(',', '', $req->value)),
            'year' => $year,
            'code' => $req->code
        );
        SalaryGradeTable::updateOrCreate($match,$data);
        return $_POST;
    }

    public function updateYear(Request $req)
    {
        Session::put('year',$req->value);
    }

    static function getSg($code)
    {
        $default = array(
            'salary' => 0,
            'id' => 0
        );
        $year = Session::get('year');
        if(!$year)
            $year = date('Y');
        $sg = SalaryGradeTable::where('year',$year)
                ->where('code',$code)
                ->first();
        if($sg)
            return $sg;
        return (object) $default;
    }
}
