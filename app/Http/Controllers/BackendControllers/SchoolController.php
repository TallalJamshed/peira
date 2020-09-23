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
        $schools = DB::table('schools')->get();
        $school = DB::table('general_information')
                            ->leftjoin('curriculum_assessment','curriculum_assessment.fk_reg_id','general_information.reg_id')
                            ->leftjoin('faculty_strength','faculty_strength.fk_reg_id','general_information.reg_id')
                            ->leftjoin('gross_area_building','gross_area_building.fk_reg_id','general_information.reg_id')
                            ->leftjoin('institute_labs','institute_labs.fk_reg_id','general_information.reg_id')
                            ->leftjoin('student_strength','student_strength.fk_reg_id','general_information.reg_id')
                            ->leftjoin('transparency_public_disclosure','transparency_public_disclosure.fk_reg_id','general_information.reg_id')
                            ->leftjoin('schools','schools.school_id','general_information.fk_school_id')
                            ->where('reg_id',$id)->first();
        // dd($school->school_name);
        return view('backend.schools.editschool')->with('school',$school)->with('schools',$schools);
    }

    public function updateSchool(Request $request)
    {
        // dd($request);

        $request->auditorium == 'on' ?  $auditorium = 1 : $auditorium = 0;
        $request->tutorial_room == 'on' ?  $tutorial_room = 1 : $tutorial_room = 0;
        $request->conference_room == 'on' ?  $conference_room = 1 : $conference_room = 0;
        $request->exam_hall == 'on' ?  $exam_hall = 1 : $exam_hall = 0;
        $request->ground_sports_room == 'on' ?  $ground_sports_room = 1 : $ground_sports_room = 0;
        $request->sports_room == 'on' ?  $sports_room = 1 : $sports_room = 0;

        $gen_info = DB::table('general_information')->where('reg_id', $request->reg_id)->first();
        if($gen_info->reg_id){
            $gen_info = DB::table('general_information')->where('reg_id', $request->reg_id)
                    ->updateOrInsert(
        [
            'reg_id' => $request->reg_id,
        ],
        [
            'fk_school_id' => $request->fk_school_id,
            'inst_name' => $request->inst_name,
            'inst_type' => $request->inst_type,
            'teaching_level' => $request->teaching_level,
            'medium_of_instruction' => $request->medium_of_instruction,
            'union_council' => $request->union_council,
            'area' => $request->area,
            'street' => $request->street,
            'address' => $request->address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'web_address' => $request->web_address,
            'inst_email' => $request->inst_email,
            'inst_phone' => $request->inst_phone,
            'inst_fax' => $request->inst_fax,
            'inst_head_name' => $request->inst_head_name,
            'head_phone' => $request->head_phone,
            'head_fax' => $request->head_fax,
            'head_email' => $request->head_email,
            'status_reg' => $request->status_reg,
            'status_since' => $request->status_since,
        ]);

        $public_disc = DB::table('transparency_public_disclosure')->where('fk_reg_id', $request->reg_id)
                    ->updateOrInsert(
            [
                'fk_reg_id' => $request->reg_id,
            ],
            [
                'fee_struc_policy' => $request->fee_struc_policy,
                'fk_reg_id' => $request->reg_id,
                'scholarship_policy' => $request->scholarship_policy,
                'other_source_of_income' => $request->other_source_of_income,
                'income_expenditure_record' => $request->income_expenditure_record,
                'properly_audited' => $request->properly_audited,
                'public_calender' => $request->public_calender,
                'faculty_admin_staff_ratio' => $request->faculty_admin_staff_ratio,
                'extra_curricular_activities' => $request->extra_curricular_activities,
                'extra_curricular_facilities' => $request->extra_curricular_facilities 
            ]);

            $gross_area = DB::table('gross_area_building')->where('fk_reg_id', $request->reg_id)
                        ->updateOrInsert(
                [
                    'fk_reg_id' => $request->reg_id,
                ],
                [
                    'type_of_building' => $request->type_of_building, 
                    'property_status' => $request->property_status, 
                    'total_area' => $request->total_area, 
                    'no_of_clasrooms' => $request->no_of_clasrooms,
                    'auditorium' => $auditorium,
                    'tutorial_room' => $tutorial_room,
                    'conference_room' => $conference_room,
                    'exam_hall' => $exam_hall,
                    'ground_sports_room' => $ground_sports_room,
                    'sports_room' => $sports_room,
                    'fk_reg_id' => $request->reg_id
                ]);

                $inst_labs = DB::table('institute_labs')->where('fk_reg_id', $request->reg_id)
                        ->updateOrInsert(
                    [
                        'fk_reg_id' => $request->reg_id,
                    ],        
                    [
                        'lib_reference_books' => $request->lib_reference_books,
                        'lib_subscription' => $request->lib_subscription,
                        'lib_journals_subscription' => $request->lib_journals_subscription,
                        'lib_other_resources' => $request->lib_other_resources,
                        'no_of_computers' => $request->no_of_computers,
                        'working_computers' => $request->working_computers,
                        'comp_lab_equipments' => $request->comp_lab_equipments,
                        'lab_available_laboratories' => $request->lab_available_laboratories,
                        'lab_available_staff' => $request->lab_available_staff,
                        'lab_available_equipments' => $request->lab_available_equipments,
                        'lab_installed_safety_equipments' => $request->lab_installed_safety_equipments,
                        'fk_reg_id' => $request->reg_id
                    ]);

                    $curriculum_assessment = DB::table('curriculum_assessment')->where('fk_reg_id', $request->reg_id)
                            ->updateOrInsert(
                        [
                            'fk_reg_id' => $request->reg_id,
                        ],
                        [
                            'pre_school_curriculum_type' => $request->pre_school_curriculum_type,
                            'pre_school_exam_board' => $request->pre_school_exam_board,
                            'pre_school_inst_nep' => $request->pre_school_inst_nep,
                            'grade1_5_curriculum_type' => $request->grade1_5_curriculum_type,
                            'grade1_5_exam_board' => $request->grade1_5_exam_board,
                            'grade1_5_inst_nep' => $request->grade1_5_inst_nep,
                            'grade6_8_curriculum_type' => $request->grade6_8_curriculum_type,
                            'grade6_8_exam_board' => $request->grade6_8_exam_board, 
                            'grade6_8_inst_nep' => $request->grade6_8_inst_nep, 
                            'grade9_10_curriculum_type' => $request->grade9_10_curriculum_type, 
                            'grade9_10_exam_board' => $request->grade9_10_exam_board,
                            'grade9_10_inst_nep' => $request->grade9_10_inst_nep,
                            'ordinary_level1_3_curriculum_type' => $request->ordinary_level1_3_curriculum_type, 
                            'ordinary_level1_3_exam_board' => $request->ordinary_level1_3_exam_board,
                            'ordinary_level1_3_inst_nep' => $request->ordinary_level1_3_inst_nep, 
                            'grade11_12_curriculum_type' => $request->grade11_12_curriculum_type,
                            'grade11_12_exam_board' => $request->grade11_12_exam_board,
                            'grade11_12_inst_nep' => $request->grade11_12_inst_nep, 
                            'advanced_level1_2_curriculum_type' => $request->advanced_level1_2_curriculum_type, 
                            'advanced_level1_2_exam_board' => $request->advanced_level1_2_exam_board,
                            'advanced_level1_2_inst_nep' => $request->advanced_level1_2_inst_nep,
                            'fk_reg_id' => $request->reg_id
                        ]);

                        $faculty_strength = DB::table('faculty_strength')->where('fk_reg_id', $request->reg_id)
                                    ->updateOrInsert(
                            [
                                'fk_reg_id' => $request->reg_id,
                            ],
                            [
                                'grad_male' => $request->grad_male, 
                                'grad_female' => $request->grad_female,
                                'grad_total' => $request->grad_total, 
                                'matric_male' => $request->matric_male, 
                                'matric_female' => $request->matric_female,
                                'matric_total' => $request->matric_total,
                                'inter_male' => $request->inter_male, 
                                'inter_female' => $request->inter_female, 
                                'inter_total' => $request->inter_total,
                                'grad4_male' => $request->grad4_male,
                                'grad4_female' => $request->grad4_female,
                                'grad4_total' => $request->grad4_total,
                                'post_grad_male' => $request->post_grad_male,
                                'post_grad_female' => $request->post_grad_female,
                                'post_grad_total' => $request->post_grad_total, 
                                'ms_male' => $request->ms_male, 
                                'ms_female' => $request->ms_female, 
                                'ms_total' => $request->ms_total,
                                'phd_male' => $request->phd_male, 
                                'phd_female' => $request->phd_female, 
                                'phd_total' => $request->phd_total,
                                'overall_male' => $request->overall_male, 
                                'overall_female' => $request->overall_female, 
                                'overall_total' => $request->overall_total,
                                'fk_reg_id' => $request->reg_id
                            ]);

                            $student_strength = DB::table('student_strength')->where('fk_reg_id', $request->reg_id)
                                                ->updateOrInsert(
                                [
                                    'fk_reg_id' => $request->reg_id,
                                ],
                                [
                                    'pre_school_male' => $request->pre_school_male, 
                                    'pre_school_female' => $request->pre_school_female,
                                    'pre_school_total' => $request->pre_school_total,
                                    'pre_school_str' => $request->pre_school_str, 
                                    'pre_school_curriculum_type2' => $request->pre_school_curriculum_type2,
                                    'grade1_5_male' => $request->grade1_5_male,
                                    'grade1_5_female' => $request->grade1_5_female,
                                    'grade1_5_total' => $request->grade1_5_total,
                                    'grade1_5_str' => $request->grade1_5_str, 
                                    'grade1_5_curriculum_type2' => $request->grade1_5_curriculum_type2, 
                                    'grade6_8_male' => $request->grade6_8_male, 
                                    'grade6_8_female' => $request->grade6_8_female, 
                                    'grade6_8_total' => $request->grade6_8_total,
                                    'grade6_8_str' => $request->grade6_8_str, 
                                    'grade6_8_curriculum_type2' => $request->grade6_8_curriculum_type2,
                                    'grade9_10_male' => $request->grade9_10_male,
                                    'grade9_10_female' => $request->grade9_10_female, 
                                    'grade9_10_total' => $request->grade9_10_total,
                                    'grade9_10_str' => $request->grade9_10_str,
                                    'grade9_10_curriculum_type2' => $request->grade9_10_curriculum_type2,
                                    'ordinary_level1_3_male' => $request->ordinary_level1_3_male, 
                                    'ordinary_level1_3_female' => $request->ordinary_level1_3_female, 
                                    'ordinary_level1_3_total' => $request->ordinary_level1_3_total, 
                                    'ordinary_level1_3_str' => $request->ordinary_level1_3_str, 
                                    'ordinary_level1_3_curriculum_type2' => $request->ordinary_level1_3_curriculum_type2,
                                    'grade11_12_male' => $request->grade11_12_male,
                                    'grade11_12_female' => $request->grade11_12_female,
                                    'grade11_12_total' => $request->grade11_12_total,
                                    'grade11_12_str' => $request->grade11_12_str, 
                                    'grade11_12_curriculum_type2' => $request->grade11_12_curriculum_type2,
                                    'advanced_level1_2_male' => $request->advanced_level1_2_male, 
                                    'advanced_level1_2_female' => $request->advanced_level1_2_female,
                                    'advanced_level1_2_total' => $request->advanced_level1_2_total, 
                                    'advanced_level1_2_str' => $request->advanced_level1_2_str,
                                    'advanced_level1_2_curriculum_type2' => $request->advanced_level1_2_curriculum_type2, 
                                    'fk_reg_id' => $request->reg_id
                                ]);
            if($gen_info || $public_disc || $gross_area || $inst_labs || $student_strength || $faculty_strength || $curriculum_assessment){
                Session::flash("alert-class","bg-success");
                Session::flash("message","School is updated successfully !");
                return redirect()->back();
            }else{
                Session::flash("alert-class","bg-danger");
                Session::flash("message","School is not updated !");
                return redirect()->back();
            }
    }
    

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
