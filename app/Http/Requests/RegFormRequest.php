<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "fk_school_id" => "required",
            "inst_name" => "filled",
            "inst_type" => "school",
            "medium_of_instruction" => "urdu",
            "teaching_level" => "junior",
            "union_council" => "rwp",
            "area" => "rwp",
            "street" => "rwp",
            "address" => "rwp",
            "longitude" => "35.6555654",
            "latitude" => "75.35514587",
            "web_address" => "a@gmail.com",
            "inst_email" => "b@gmail.com",
            "inst_phone" => "54353",
            "inst_fax" => "43534",
            "inst_head_name" => "talal raja",
            "head_phone" => "3423",
            "head_fax" => "45324",
            "head_email" => "tala@gmail.com",
            "matric_male" => null,
            "matric_female" => null,
            "matric_total" => null,
            "inter_male" => null,
            "inter_female" => null,
            "inter_total" => null,
            "grad_male" => null,
            "grad_female" => null,
            "grad_total" => null,
            "grad4_male" => null,
            "grad4_female" => null,
            "grad4_total" => null,
            "post_grad_male" => null,
            "post_grad_female" => null,
            "post_grad_total" => null,
            "ms_male" => null,
            "ms_female" => null,
            "ms_total" => null,
            "phd_male" => null,
            "phd_female" => null,
            "phd_total" => null,
            "overall_male" => null,
            "overall_female" => null,
            "overall_total" => null,
            "pre_school_male" => null,
            "pre_school_female" => null,
            "pre_school_total" => null,
            "pre_school_str" => null,
            "pre_school_curriculum_type2" => null,
            "grade1_5_male" => null,
            "grade1_5_female" => null,
            "grade1_5_total" => null,
            "grade1_5_str" => null,
            "grade1_5_curriculum_type2" => null,
            "grade6_8_male" => null,
            "grade6_8_female" => null,
            "grade6_8_total" => null,
            "grade6_8_str" => null,
            "grade6_8_curriculum_type2" => null,
            "grade9_10_male" => null,
            "grade9_10_female" => null,
            "grade9_10_total" => null,
            "grade9_10_str" => null,
            "grade9_10_curriculum_type2" => null,
            "ordinary_level1_3_male" => null,
            "ordinary_level1_3_female" => null,
            "ordinary_level1_3_total" => null,
            "ordinary_level1_3_str" => null,
            "ordinary_level1_3_curriculum_type2" => null,
            "grade11_12_male" => null,
            "grade11_12_female" => null,
            "grade11_12_total" => null,
            "grade11_12_str" => null,
            "grade11_12_curriculum_type2" => null,
            "advanced_level1_2_male" => null,
            "advanced_level1_2_female" => null,
            "advanced_level1_2_total" => null,
            "advanced_level1_2_str" => null,
            "advanced_level1_2_curriculum_type2" => null,
            "pre_school_curriculum_type" => null,
            "pre_school_exam_board" => null,
            "pre_school_inst_nep" => null,
            "grade1_5_curriculum_type" => null,
            "grade1_5_exam_board" => null,
            "grade1_5_inst_nep" => null,
            "grade6_8_curriculum_type" => null,
            "grade6_8_exam_board" => null,
            "grade6_8_inst_nep" => null,
            "grade9_10_curriculum_type" => null,
            "grade9_10_exam_board" => null,
            "grade9_10_inst_nep" => null,
            "ordinary_level1_3_curriculum_type" => null,
            "ordinary_level1_3_exam_board" => null,
            "ordinary_level1_3_inst_nep" => null,
            "grade11_12_curriculum_type" => null,
            "grade11_12_exam_board" => null,
            "grade11_12_inst_nep" => null,
            "advanced_level1_2_curriculum_type" => null,
            "advanced_level1_2_exam_board" => null,
            "advanced_level1_2_inst_nep" => null,
            "type_of_building" => null,
            "property_status" => null,
            "total_area" => null,
            "no_of_clasrooms" => null,
            "lib_reference_books" => null,
            "lib_subscription" => null,
            "lib_journals_subscription" => null,
            "lib_other_resources" => null,
            "lab_available_staff" => null,
            "lab_available_laboratories" => null,
            "lab_available_equipments" => null,
            "lab_installed_safety_equipments" => null,
            "no_of_computers" => null,
            "comp_lab_equipments" => null,
            "faculty_admin_staff_ratio" => null,
            "extra_curricular_activities" => null,
            "extra_curricular_facilities" => null
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
