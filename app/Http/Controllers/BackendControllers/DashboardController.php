<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $count['totalschool'] = DB::table('general_information')->count();
        $count['registered'] = DB::table('general_information')->where('status_since','>',0)->whereIn('status_reg',['Applied For Renewal','Renewal'])->orWhere('status_reg','')->count();
        $count['unregistered'] = DB::table('general_information')->whereIn('status_reg',['Never Applied For Registration'])->count();
        $count['underprocess'] = DB::table('general_information')->whereIn('status_reg',['New Registration','Renewal','Applied For Renewal'])->count();
        
        return view('backend.dashboard')->with('count',$count);
    }
}
