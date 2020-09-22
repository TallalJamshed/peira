<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegFormRequest;
use DB;
use PDF;
use PDF2;
use Storage;

class RegistrationController extends Controller
{
    public function index()
    {
        $schools = DB::table('schools')->get();
        return view('frontend.registration.registrationform')->with('schools',$schools);
    }

    public function saveRegForm(Request $request)
    {
        // $file = '115_PEIRA_Registration_Preview.pdf';
        // $response['form_success'] = 'Form is saved and pdf is generated.';
        // dd($file,$success);
        // return redirect()->back()->with('file',$file)->with('response',collect($response));

        $response = array() ;
        if(isset($request->fk_school_id) && isset($request->inst_type) 
            && isset($request->teaching_level) && isset($request->medium_of_instruction) 
            && isset($request->union_council) && isset($request->area) && isset($request->street)
            && isset($request->address) && isset($request->longitude) && isset($request->latitude)
            && isset($request->web_address) && isset($request->inst_email) && isset($request->inst_phone)
            && isset($request->inst_fax) && isset($request->inst_head_name) && isset($request->head_phone)
            && isset($request->head_fax) && isset($request->head_email))
		{
            $fk_school_id               = $request->fk_school_id;
			$inst_name                  = $request->inst_name;
			$inst_type                  = $request->inst_type;
			$teaching_level             = $request->teaching_level;
			$medium_of_instruction      = $request->medium_of_instruction;
			$union_council		        = $request->union_council;
			$area		                = $request->area;
			$street		                = $request->street;
			$address		            = $request->address;
			$longitude	                = $request->longitude;
			$latitude	                = $request->latitude;
			$web_address		        = $request->web_address;
			$inst_email		            = $request->inst_email;
			$inst_phone	                = $request->inst_phone;
			$inst_fax		            = $request->inst_fax;
			$inst_head_name		        = $request->inst_head_name;
			$head_phone		            = $request->head_phone;
			$head_fax	                = $request->head_fax;
            $head_email	                = $request->head_email;
            
            if(isset($request->grad_male)){
                $grad_male = $request->grad_male;
            }
            if(isset($request->grad_female)){
                $grad_female = $request->grad_female;
            }
            if(isset($request->grad_total)){
                $grad_total = $request->grad_total;
            }
            if(isset($request->matric_male)){
                $matric_male = $request->matric_male;
            }
            if(isset($request->matric_female)){
                $matric_female = $request->matric_female;
            }
            if(isset($request->matric_total)){
                $matric_total = $request->matric_total;
            }
            if(isset($request->inter_male)){
                $inter_male = $request->inter_male;
            }
            if(isset($request->inter_female)){
                $inter_female = $request->inter_female;
            }
            if(isset($request->inter_total)){
                $inter_total = $request->inter_total;
            }
            if(isset($request->grad4_male)){
                $grad4_male = $request->grad4_male;
            }
            if(isset($request->grad4_female)){
                $grad4_female = $request->grad4_female;
            }
            if(isset($request->grad4_total)){
                $grad4_total = $request->grad4_total;
            }
            if(isset($request->post_grad_male)){
                $post_grad_male = $request->post_grad_male;
            }
            if(isset($request->post_grad_female)){
                $post_grad_female = $request->post_grad_female;
            }
            if(isset($request->post_grad_total)){
                $post_grad_total = $request->post_grad_total;
            }
            if(isset($request->ms_male)){
                $ms_male = $request->ms_male;
            }
            if(isset($request->ms_female)){
                $ms_female = $request->ms_female;
            }
            if(isset($request->ms_total)){
                $ms_total = $request->ms_total;
            }
            if(isset($request->phd_male)){
                $phd_male = $request->phd_male;
            }
            if(isset($request->phd_female)){
                $phd_female = $request->phd_female;
            }
            if(isset($request->phd_total)){
                $phd_total = $request->phd_total;
            }
            if(isset($request->pre_school_male)){
                $pre_school_male = $request->pre_school_male;
            }
            if(isset($request->pre_school_female)){
                $pre_school_female = $request->pre_school_female;
            }
            if(isset($request->pre_school_total)){
                $pre_school_total = $request->pre_school_total;
            }
            if(isset($request->pre_school_str)){
                $pre_school_str = $request->pre_school_str;
            }
            if(isset($request->pre_school_curriculum_type)){
                $pre_school_curriculum_type	= $request->pre_school_curriculum_type;
            }
            if(isset($request->grade1_5_male)){
                $grade1_5_male = $request->grade1_5_male;
            }
            if(isset($request->grade1_5_female)){
                $grade1_5_female = $request->grade1_5_female;
            }
            if(isset($request->grade1_5_total)){
                $grade1_5_total = $request->grade1_5_total;
            }
            if(isset($request->grade1_5_str)){
                $grade1_5_str = $request->grade1_5_str;
            }
            if(isset($request->grade1_5_curriculum_type)){
                $grade1_5_curriculum_type = $request->grade1_5_curriculum_type;
            }
            if(isset($request->grade6_8_male)){
                $grade6_8_male = $request->grade6_8_male;
            }
            if(isset($request->grade6_8_female)){
                $grade6_8_female = $request->grade6_8_female;
            }
            if(isset($request->grade6_8_total)){
                $grade6_8_total = $request->grade6_8_total;
            }
            if(isset($request->grade6_8_str)){
                $grade6_8_str = $request->grade6_8_str;
            }
            if(isset($request->grade6_8_curriculum_type)){
                $grade6_8_curriculum_type = $request->grade6_8_curriculum_type;
            }
            if(isset($request->grade9_10_male)){
                $grade9_10_male = $request->grade9_10_male;
            }
            if(isset($request->grade9_10_female)){
                $grade9_10_female = $request->grade9_10_female;
            }
            if(isset($request->grade9_10_total)){
                $grade9_10_total = $request->grade9_10_total;
            }
            if(isset($request->grade9_10_str)){
                $grade9_10_str = $request->grade9_10_str;
            }
            if(isset($request->grade9_10_curriculum_type)){
                $grade9_10_curriculum_type = $request->grade9_10_curriculum_type;
            }
            if(isset($request->ordinary_level1_3_male)){
                $ordinary_level1_3_male	= $request->ordinary_level1_3_male;
            }
            if(isset($request->ordinary_level1_3_female)){
                $ordinary_level1_3_female = $request->ordinary_level1_3_female;
            }
            if(isset($request->ordinary_level1_3_total)){
                $ordinary_level1_3_total = $request->ordinary_level1_3_total;
            }
            if(isset($request->ordinary_level1_3_str)){
                $ordinary_level1_3_str = $request->ordinary_level1_3_str;
            }
            if(isset($request->ordinary_level1_3_curriculum_type)){
                $ordinary_level1_3_curriculum_type = $request->ordinary_level1_3_curriculum_type;
            }
            if(isset($request->grade11_12_male)){
                $grade11_12_male = $request->grade11_12_male;
            }
            if(isset($request->grade11_12_female)){
                $grade11_12_female = $request->grade11_12_female;
            }
            if(isset($request->grade11_12_total)){
                $grade11_12_total = $request->grade11_12_total;
            }
            if(isset($request->grade11_12_str)){
                $grade11_12_str = $request->grade11_12_str;
            }
            if(isset($request->grade11_12_curriculum_type)){
                $grade11_12_curriculum_type	= $request->grade11_12_curriculum_type;
            }
            if(isset($request->advanced_level1_2_male)){
                $advanced_level1_2_male = $request->advanced_level1_2_male;
            }
            if(isset($request->advanced_level1_2_female)){
                $advanced_level1_2_female = $request->advanced_level1_2_female;
            }
            if(isset($request->advanced_level1_2_total)){
                $advanced_level1_2_total = $request->advanced_level1_2_total;
            }
            if(isset($request->advanced_level1_2_str)){
                $advanced_level1_2_str = $request->advanced_level1_2_str;
            }
            if(isset($request->advanced_level1_2_curriculum_type)){
                $advanced_level1_2_curriculum_type = $request->advanced_level1_2_curriculum_type;
            }
            if(isset($request->pre_school_curriculum_type2)){
                $pre_school_curriculum_type2 = $request->pre_school_curriculum_type2;
            }
            if(isset($request->ordinary_level1_3_curriculum_type2)){
                $ordinary_level1_3_curriculum_type2	= $request->ordinary_level1_3_curriculum_type2;
            }
            if(isset($request->grade1_5_curriculum_type2)){
                $grade1_5_curriculum_type2 = $request->grade1_5_curriculum_type2;
            }
            if(isset($request->grade6_8_curriculum_type2)){
                $grade6_8_curriculum_type2 = $request->grade6_8_curriculum_type2;
            }
            if(isset($request->grade9_10_curriculum_type2)){
                $grade9_10_curriculum_type2	= $request->grade9_10_curriculum_type2;
            }
            if(isset($request->grade11_12_curriculum_type2)){
                $grade11_12_curriculum_type2 = $request->grade11_12_curriculum_type2;
            }
            if(isset($request->advanced_level1_2_curriculum_type2)){
                $advanced_level1_2_curriculum_type2 = $request->advanced_level1_2_curriculum_type2;
            } 
            if(isset($request->fee_struc_policy)){
                $fee_struc_policy = $request->fee_struc_policy;
            }
            if(isset($request->scholarship_policy)){
                $scholarship_policy = $request->scholarship_policy;
            }
            if(isset($request->other_source_of_income)){
                $other_source_of_income = $request->other_source_of_income;
            }
            if(isset($request->income_expenditure_record)){
                $income_expenditure_record = $request->income_expenditure_record;
            }
            if(isset($request->properly_audited)){
                $properly_audited = $request->properly_audited;
            }
            if(isset($request->public_calender)){
                $public_calender = $request->public_calender;
            }
            if(isset($request->faculty_admin_staff_ratio)){
                $faculty_admin_staff_ratio = $request->faculty_admin_staff_ratio;
            }
            if(isset($request->extra_curricular_activities)){
                $extra_curricular_activities = $request->extra_curricular_activities;
            }
            if(isset($request->extra_curricular_facilities)){
                $extra_curricular_facilities = $request->extra_curricular_facilities;
            }
            if(isset($request->type_of_building)){
                $type_of_building = $request->type_of_building;
            }
            if(isset($request->property_status)){
                $property_status = $request->property_status;
            }
            if(isset($request->total_area)){
                $total_area = $request->total_area;
            }
            if(isset($request->no_of_clasrooms)){
                $no_of_clasrooms = $request->no_of_clasrooms;
            }

            if(isset($request->auditorium) ){
                $auditorium = 1;
            }else{
                $auditorium = 0;
            }
            if(isset($request->tutorial_room)){
                $tutorial_room = 1;
            }else{
                $tutorial_room = 0;
            }
            if(isset($request->conference_room)){
                $conference_room = 1;
            }else{
                $conference_room = 0;
            }
            if(isset($request->exam_hall)){
                $exam_hall = 1;
            }else{
                $exam_hall = 0;
            }
            if(isset($request->ground_sports_room)){
                $ground_sports_room = 1;
            }else{
                $ground_sports_room = 0;
            }
            if(isset($request->sports_room)){
                $sports_room = 1;
            }else{
                $sports_room = 0;
            }
            // dd($auditorium,$sports_room,$ground_sports_room,$exam_hall,$conference_room,$tutorial_room);

            if(isset($request->lib_reference_books)){
                $lib_reference_books = $request->lib_reference_books;
            }
            if(isset($request->lib_subscription)){
                $lib_subscription = $request->lib_subscription;
            }
            if(isset($request->lib_journals_subscription)){
                $lib_journals_subscription = $request->lib_journals_subscription;
            }
            if(isset($request->lib_other_resources)){
                $lib_other_resources = $request->lib_other_resources;
            }
            if(isset($request->no_of_computers)){
                $no_of_computers = $request->no_of_computers;
            }
            if(isset($request->working_computers)){
                $working_computers = $request->working_computers;
            }
            if(isset($request->comp_lab_equipments)){
                $comp_lab_equipments = $request->comp_lab_equipments;
            }
            if(isset($request->lab_available_laboratories)){
                $lab_available_laboratories = $request->lab_available_laboratories;
            }
            if(isset($request->lab_available_staff)){
                $lab_available_staff = $request->lab_available_staff;
            }
            if(isset($request->lab_available_equipments)){
                $lab_available_equipments = $request->lab_available_equipments;
            }
            if(isset($request->lab_installed_safety_equipments)){
                $lab_installed_safety_equipments = $request->lab_installed_safety_equipments;
            }
            if(isset($request->pre_school_exam_board)){
                $pre_school_exam_board = $request->pre_school_exam_board;
            }
            if(isset($request->pre_school_inst_nep)){
                $pre_school_inst_nep = $request->pre_school_inst_nep;
            }
            if(isset($request->grade1_5_exam_board)){
                $grade1_5_exam_board = $request->grade1_5_exam_board;
            }
            if(isset($request->grade1_5_inst_nep)){
                $grade1_5_inst_nep = $request->grade1_5_inst_nep;
            }
            if(isset($request->grade6_8_exam_board)){
                $grade6_8_exam_board = $request->grade6_8_exam_board;
            }
            if(isset($request->grade6_8_inst_nep)){
                $grade6_8_inst_nep = $request->grade6_8_inst_nep;
            }
            if(isset($request->grade9_10_exam_board)){
                $grade9_10_exam_board = $request->grade9_10_exam_board;
            }
            if(isset($request->grade9_10_inst_nep)){
                $grade9_10_inst_nep = $request->grade9_10_inst_nep;
            }
            if(isset($request->ordinary_level1_3_exam_board)){
                $ordinary_level1_3_exam_board = $request->ordinary_level1_3_exam_board;
            }
            if(isset($request->ordinary_level1_3_inst_nep)){
                $ordinary_level1_3_inst_nep = $request->ordinary_level1_3_inst_nep;
            }
            if(isset($request->grade11_12_exam_board)){
                $grade11_12_exam_board = $request->grade11_12_exam_board;
            }
            if(isset($request->grade11_12_inst_nep)){
                $grade11_12_inst_nep = $request->grade11_12_inst_nep;
            }
            if(isset($request->grade11_12_curriculum_type)){
                $grade11_12_curriculum_type = $request->grade11_12_curriculum_type;
            }	
            if(isset($request->advanced_level1_2_exam_board)){
                $advanced_level1_2_exam_board = $request->advanced_level1_2_exam_board;
            }
            if(isset($request->advanced_level1_2_inst_nep)){
                $advanced_level1_2_inst_nep = $request->advanced_level1_2_inst_nep;
            }
            if(isset($request->advanced_level1_2_curriculum_type)){
                $advanced_level1_2_curriculum_type = $request->advanced_level1_2_curriculum_type;
            }
            if(isset($request->overall_male)){
                $overall_male = $request->overall_male;
            }
            if(isset($request->overall_female)){
                $overall_female = $request->overall_female;
            }
            if(isset($request->overall_total)){
                $overall_total = $request->overall_total;
            }

            if(!empty($fk_school_id) && !empty($inst_type) && !empty($teaching_level) && !empty($medium_of_instruction) 
                && !empty($union_council) && !empty($area) && !empty($street) && !empty($address) 
                && !empty($longitude) && !empty($latitude) && !empty($web_address) && !empty($inst_email) 
                && !empty($inst_phone) && !empty($inst_fax) && !empty($inst_head_name) && !empty($head_phone) && !empty($head_fax)
                && !empty($head_email))
            {
                $gen_info = DB::table('general_information')->insert(
                    [
                        'fk_school_id' => $fk_school_id,
                        'inst_name' => $inst_name,
                        'inst_type' => $inst_type,
                        'teaching_level' => $teaching_level,
                        'medium_of_instruction' => $medium_of_instruction,
                        'union_council' => $union_council,
                        'area' => $area,
                        'street' => $street,
                        'address' => $address,
                        'longitude' => $longitude,
                        'latitude' => $latitude,
                        'web_address' => $web_address,
                        'inst_email' => $inst_email,
                        'inst_phone' => $inst_phone,
                        'inst_fax' => $inst_fax,
                        'inst_head_name' => $inst_head_name,
                        'head_phone' => $head_phone,
                        'head_fax' => $head_fax,
                        'head_email' => $head_email
                    ]);
                if($gen_info){
                    $last_id = DB::getPdo()->lastInsertId();

                    if(!empty($fee_struc_policy) || !empty($scholarship_policy) || !empty($other_source_of_income) 
                        || !empty($faculty_admin_staff_ratio) || !empty($public_calender) || !empty($properly_audited) || !empty($income_expenditure_record) 
                        || !empty($income_expenditure_record) || !empty($extra_curricular_activities) || !empty($extra_curricular_facilities))
                    {
                        $public_disc = DB::table('transparency_public_disclosure')->insert(
                            [
                                'fee_struc_policy' => $fee_struc_policy,
                                'fk_reg_id' => $last_id,
                                'scholarship_policy' => $scholarship_policy,
                                'other_source_of_income' => $other_source_of_income,
                                'income_expenditure_record' => $income_expenditure_record,
                                'properly_audited' => $properly_audited,
                                'public_calender' => $public_calender,
                                'faculty_admin_staff_ratio' => $faculty_admin_staff_ratio,
                                'extra_curricular_activities' => $extra_curricular_activities,
                                'extra_curricular_facilities' => $extra_curricular_facilities 
                            ]);
                    }
                    if(!empty($type_of_building) || !empty($property_status) || !empty($total_area) || !empty($no_of_clasrooms) 
                        || !empty($auditorium) || !empty($tutorial_room) || !empty($conference_room) || !empty($exam_hall) 
                        || !empty($ground_sports_room) || !empty($sports_room))
                    {
                        $gross_area = DB::table('gross_area_building')->insert(
                            [
                                'type_of_building' => $type_of_building, 
                                'property_status' => $property_status, 
                                'total_area' => $total_area, 
                                'no_of_clasrooms' => $no_of_clasrooms,
                                'auditorium' => $auditorium,
                                'tutorial_room' => $tutorial_room,
                                'conference_room' => $conference_room,
                                'exam_hall' => $exam_hall,
                                'ground_sports_room' => $ground_sports_room,
                                'sports_room' => $sports_room,
                                'fk_reg_id' => $last_id
                            ]);
                    }
                    if(!empty($lib_reference_books) || !empty($lib_subscription) || !empty($lib_journals_subscription) || !empty($lib_other_resources) 
                        || !empty($no_of_computers) || !empty($working_computers) || !empty($comp_lab_equipments) || !empty($lab_available_laboratories) || !empty($lab_available_staff) 
                        || !empty($lab_available_equipments) || !empty($lab_installed_safety_equipments))
                    {
                        $inst_labs = DB::table('institute_labs')->insert(
                            [
                                'lib_reference_books' => $lib_reference_books,
                                'lib_subscription' => $lib_subscription,
                                'lib_journals_subscription' => $lib_journals_subscription,
                                'lib_other_resources' => $lib_other_resources,
                                'no_of_computers' => $no_of_computers,
                                'working_computers' => $working_computers,
                                'comp_lab_equipments' => $comp_lab_equipments,
                                'lab_available_laboratories' => $lab_available_laboratories,
                                'lab_available_staff' => $lab_available_staff,
                                'lab_available_equipments' => $lab_available_equipments,
                                'lab_installed_safety_equipments' => $lab_installed_safety_equipments,
                                'fk_reg_id' => $last_id
                            ]);
                    }
                    if(!empty($pre_school_curriculum_type) || !empty($pre_school_exam_board) || !empty($pre_school_inst_nep) || !empty($grade1_5_curriculum_type) 
                        || !empty($grade1_5_exam_board) || !empty($grade1_5_inst_nep) || !empty($grade6_8_curriculum_type) 
                        || !empty($grade6_8_exam_board) || !empty($grade6_8_inst_nep) || !empty($grade9_10_curriculum_type) || !empty($grade9_10_exam_board) 
                        || !empty($grade9_10_inst_nep) || !empty($ordinary_level1_3_curriculum_type) || !empty($ordinary_level1_3_exam_board) || !empty($ordinary_level1_3_inst_nep) || !empty($grade11_12_curriculum_type)
                        || !empty($grade11_12_exam_board) || !empty($grade11_12_inst_nep) || !empty($advanced_level1_2_curriculum_type) || !empty($advanced_level1_2_exam_board) || !empty($advanced_level1_2_inst_nep))
                    {
                        $curriculum_assessment = DB::table('curriculum_assessment')->insert(
                            [
                                'pre_school_curriculum_type' => $pre_school_curriculum_type,
                                'pre_school_exam_board' => $pre_school_exam_board,
                                'pre_school_inst_nep' => $pre_school_inst_nep,
                                'grade1_5_curriculum_type' => $grade1_5_curriculum_type,
                                'grade1_5_exam_board' => $grade1_5_exam_board,
                                'grade1_5_inst_nep' => $grade1_5_inst_nep,
                                'grade6_8_curriculum_type' => $grade6_8_curriculum_type,
                                'grade6_8_exam_board' => $grade6_8_exam_board, 
                                'grade6_8_inst_nep' => $grade6_8_inst_nep, 
                                'grade9_10_curriculum_type' => $grade9_10_curriculum_type, 
                                'grade9_10_exam_board' => $grade9_10_exam_board,
                                'grade9_10_inst_nep' => $grade9_10_inst_nep,
                                'ordinary_level1_3_curriculum_type' => $ordinary_level1_3_curriculum_type, 
                                'ordinary_level1_3_exam_board' => $ordinary_level1_3_exam_board,
                                'ordinary_level1_3_inst_nep' => $ordinary_level1_3_inst_nep, 
                                'grade11_12_curriculum_type' => $grade11_12_curriculum_type,
                                'grade11_12_exam_board' => $grade11_12_exam_board,
                                'grade11_12_inst_nep' => $grade11_12_inst_nep, 
                                'advanced_level1_2_curriculum_type' => $advanced_level1_2_curriculum_type, 
                                'advanced_level1_2_exam_board' => $advanced_level1_2_exam_board,
                                'advanced_level1_2_inst_nep' => $advanced_level1_2_inst_nep,
                                'fk_reg_id' => $last_id
                            ]);
                    }
                    if(!empty($grad_male) || !empty($grad_female) || !empty($grad_total) || !empty($matric_male) 
                        || !empty($matric_female) || !empty($matric_total) || !empty($inter_male) || !empty($inter_female) 
                        || !empty($inter_total) || !empty($grad4_male) || !empty($grad4_female) || !empty($grad4_total) 
                        || !empty($post_grad_male) || !empty($post_grad_female) || !empty($post_grad_total) || !empty($ms_male) || !empty($ms_female)
                        || !empty($ms_total) || !empty($phd_male) || !empty($phd_female) || !empty($phd_total) 
                        || !empty($overall_male) || !empty($overall_female) || !empty($overall_total))
                    {
                        $faculty_strength = DB::table('faculty_strength')->insert(
                            [
                                'grad_male' => $grad_male, 
                                'grad_female' => $grad_female,
                                'grad_total' => $grad_total, 
                                'matric_male' => $matric_male, 
                                'matric_female' => $matric_female,
                                'matric_total' => $matric_total,
                                'inter_male' => $inter_male, 
                                'inter_female' => $inter_female, 
                                'inter_total' => $inter_total,
                                'grad4_male' => $grad4_male,
                                'grad4_female' => $grad4_female,
                                'grad4_total' => $grad4_total,
                                'post_grad_male' => $post_grad_male,
                                'post_grad_female' => $post_grad_female,
                                'post_grad_total' => $post_grad_total, 
                                'ms_male' => $ms_male, 
                                'ms_female' => $ms_female, 
                                'ms_total' => $ms_total,
                                'phd_male' => $phd_male, 
                                'phd_female' => $phd_female, 
                                'phd_total' => $phd_total,
                                'overall_male' => $overall_male, 
                                'overall_female' => $overall_female, 
                                'overall_total' => $overall_total,
                                'fk_reg_id' => $last_id
                            ]);
                    }
                    if(!empty($pre_school_male) || !empty($pre_school_female) || !empty($pre_school_total) || !empty($pre_school_str) 
                        || !empty($pre_school_curriculum_type2) || !empty($grade1_5_male) || !empty($grade1_5_female) || !empty($grade1_5_total) 
                        || !empty($grade1_5_str) || !empty($grade1_5_curriculum_type2) || !empty($grade6_8_male) || !empty($grade6_8_female) 
                        || !empty($grade6_8_total) || !empty($grade6_8_str) || !empty($grade6_8_curriculum_type2) || !empty($grade9_10_male) || !empty($grade9_10_female)
                        || !empty($grade9_10_total) || !empty($grade9_10_str)|| !empty($grade9_10_curriculum_type2)|| !empty($ordinary_level1_3_male)
                        || !empty($ordinary_level1_3_female)|| !empty($ordinary_level1_3_total)|| !empty($ordinary_level1_3_str)|| !empty($ordinary_level1_3_curriculum_type2)
                        || !empty($grade11_12_male) || !empty($grade11_12_female) || !empty($grade11_12_total) || !empty($grade11_12_str)
                        || !empty($grade11_12_curriculum_type2) || !empty($advanced_level1_2_male)|| !empty($advanced_level1_2_female)|| !empty($advanced_level1_2_total)
                        || !empty($advanced_level1_2_str) || !empty($advanced_level1_2_curriculum_type2))
                    {
                        $student_strength = DB::table('student_strength')->insert(
                            [
                                'pre_school_male' => $pre_school_male, 
                                'pre_school_female' => $pre_school_female,
                                'pre_school_total' => $pre_school_total,
                                'pre_school_str' => $pre_school_str, 
                                'pre_school_curriculum_type2' => $pre_school_curriculum_type2,
                                'grade1_5_male' => $grade1_5_male,
                                'grade1_5_female' => $grade1_5_female,
                                'grade1_5_total' => $grade1_5_total,
                                'grade1_5_str' => $grade1_5_str, 
                                'grade1_5_curriculum_type2' => $grade1_5_curriculum_type2, 
                                'grade6_8_male' => $grade6_8_male, 
                                'grade6_8_female' => $grade6_8_female, 
                                'grade6_8_total' => $grade6_8_total,
                                'grade6_8_str' => $grade6_8_str, 
                                'grade6_8_curriculum_type2' => $grade6_8_curriculum_type2,
                                'grade9_10_male' => $grade9_10_male,
                                'grade9_10_female' => $grade9_10_female, 
                                'grade9_10_total' => $grade9_10_total,
                                'grade9_10_str' => $grade9_10_str,
                                'grade9_10_curriculum_type2' => $grade9_10_curriculum_type2,
                                'ordinary_level1_3_male' => $ordinary_level1_3_male, 
                                'ordinary_level1_3_female' => $ordinary_level1_3_female, 
                                'ordinary_level1_3_total' => $ordinary_level1_3_total, 
                                'ordinary_level1_3_str' => $ordinary_level1_3_str, 
                                'ordinary_level1_3_curriculum_type2' => $ordinary_level1_3_curriculum_type2,
                                'grade11_12_male' => $grade11_12_male,
                                'grade11_12_female' => $grade11_12_female,
                                'grade11_12_total' => $grade11_12_total,
                                'grade11_12_str' => $grade11_12_str, 
                                'grade11_12_curriculum_type2' => $grade11_12_curriculum_type2,
                                'advanced_level1_2_male' => $advanced_level1_2_male, 
                                'advanced_level1_2_female' => $advanced_level1_2_female,
                                'advanced_level1_2_total' => $advanced_level1_2_total, 
                                'advanced_level1_2_str' => $advanced_level1_2_str,
                                'advanced_level1_2_curriculum_type2' => $advanced_level1_2_curriculum_type2, 
                                'fk_reg_id' => $last_id
                            ]);
                    }
                }else{
                    $response['general_error'] = 'General Information could not be saved!';
                    return redirect()->back()->withInput()->with('response',collect($response));
                }
            }else{
                $response['general_error'] = 'Please fill General Information Form Completely!';
                return redirect()->back()->withInput()->with('response',collect($response));
            }
        }else{
            $response['general_error'] = 'Please fill General Information Form Completely!';
            return redirect()->back()->withInput()->with('response',collect($response));
        }
        $file = $this->generatePdf($last_id);
        $response['form_success'] = 'Form is saved and pdf is generated.';
        // dd($file,$success);
        return redirect()->back()->with('file',$file)->with('response',collect($response));
        // dd('pdf generated' , $file);
    // return redirect()->back()->withInput()->with('response',collect($response));
    }

    public function generatePdf($id)
    {
        // dd(Storage::disk('pdf')->size('/92_PEIRA Registration Preview.pdf'));
        $filename = $id.'_PEIRA_Registration_Preview.pdf';
        $filepath = storage_path('schoolpdf').'/'.$filename;

        // dd(storage_path('schoolpdf').'/'.$id.'_PEIRA Registration Preview.pdf');
        $data = DB::table('general_information')
                    ->leftjoin('curriculum_assessment','curriculum_assessment.fk_reg_id','general_information.reg_id')
                    ->leftjoin('faculty_strength','faculty_strength.fk_reg_id','general_information.reg_id')
                    ->leftjoin('gross_area_building','gross_area_building.fk_reg_id','general_information.reg_id')
                    ->leftjoin('institute_labs','institute_labs.fk_reg_id','general_information.reg_id')
                    ->leftjoin('student_strength','student_strength.fk_reg_id','general_information.reg_id')
                    ->leftjoin('transparency_public_disclosure','transparency_public_disclosure.fk_reg_id','general_information.reg_id')
                    ->leftjoin('schools','schools.school_id','general_information.fk_school_id')
                    ->where('general_information.reg_id',$id)
                    ->first();
        $pdf = PDF2::loadView('frontend.templates.pdftemplate', ['data'=>$data]);
        $pdf->save($filepath);
        return $filename;
        // $size = Storage::disk('pdf')->size('/'.$filename);
        // $headers = [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'attachment',
        //     'Content-Length' => $size,
        // ];
        // $file = response()->download($filepath, $filename, $headers);
        // return $file;
        // return download(storage_path('schoolpdf').'/'.$id.'_PEIRA Registration Preview.pdf',);
        // return $pdf->download($id.'_PEIRA Registration Preview.pdf');
        // $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape')
        // $pdf = PDF::loadView('frontend.templates.pdftemplate', ['data'=>$data])->setPaper('a4', 'portrait');
        // return $pdf->stream();
    }
}
