<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SchoolController extends Controller
{
    public function showNewSchools()
    {
        $schools = DB::table('general_information')->get();
        return view('backend.schools.shownewschools')->with('schools',$schools);
    }

    public function editSchools($id)
    {
        $school = DB::table('general_information')->where('reg_id',$id)->first();
        // dd($school);
        return view('backend.schools.editschool')->with('school',$school);
    }

    public function getSchools()
    {
        $schools = DB::table('general_information')->select('reg_id','fk_school_id','inst_name','latitude','longitude','status_reg','status_since')->get();
        return $schools;
    }
}
