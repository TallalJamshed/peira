<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class SchoolController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
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

    public function deleteSchools(Request $request)
    {
        
        $school = DB::table('general_information')->where('reg_id',$request->reg_id)->first();
        if($school){
            if(DB::table('general_information')->where('reg_id',$request->reg_id)->delete()){
                Session::flash("alert-class","bg-warning");
                Session::flash("message","School is deleted successfully !");
                return redirect()->back();
            }
        }else{
            session::flash("alert-class","bg-danger");
            session::flash("message","School is not found!");
            return redirect()->back();
        }
    }
}
