<html>

<head>

</head>
<style>
    input:focus {
        outline: none;
    }

    .test1 {
        width: 100%;
        font-size: 19px;
    }

    .test {
        font-size: 13pt;
        align: right;
    }

    .partial {
        width: 50%
    }

    .input {
        font-size: 19px;
        width: 90%;
    }

    .left {
        float: left
    }

    .right {
        float: right
    }

    .p-0 {
        padding: 0;
    }

    .span {
        color: black;
        margin-bottom: 0.8rem;
        font-size: 17px;
        font-weight: 600;
    }



    .col-xl,
    .col-xl-auto,
    .col-xl-12,
    .col-xl-11,
    .col-xl-10,
    .col-xl-9,
    .col-xl-8,
    .col-xl-7,
    .col-xl-6,
    .col-xl-5,
    .col-xl-4,
    .col-xl-3,
    .col-xl-2,
    .col-xl-1,
    .col-lg,
    .col-lg-auto,
    .col-lg-12,
    .col-lg-11,
    .col-lg-10,
    .col-lg-9,
    .col-lg-8,
    .col-lg-7,
    .col-lg-6,
    .col-lg-5,
    .col-lg-4,
    .col-lg-3,
    .col-lg-2,
    .col-lg-1,
    .col-md,
    .col-md-auto,
    .,
    .col-md-11,
    .col-md-10,
    .col-md-9,
    .col-md-8,
    .col-md-7,
    .,
    .col-md-5,
    .,
    .,
    .col-md-2,
    .col-md-1,
    .col-sm,
    .col-sm-auto,
    .col-sm-12,
    .col-sm-11,
    .col-sm-10,
    .col-sm-9,
    .col-sm-8,
    .col-sm-7,
    .col-sm-6,
    .col-sm-5,
    .col-sm-4,
    .col-sm-3,
    .col-sm-2,
    .col-sm-1,
    .col,
    .col-auto,
    .col-12,
    .col-11,
    .col-10,
    .col-9,
    .col-8,
    .col-7,
    .col-6,
    .col-5,
    .col-4,
    .col-3,
    .col-2,
    .col-1 {
        position: relative;
        width: 100%;
        padding-right: 1.5rem;
        padding-left: 1.5rem;
    }

    .note {
        color: black;
    }

    .fade {
        transition: opacity 0.15s linear;
    }

    @media (prefers-reduced-motion: reduce) {
        .fade {
            transition: none;
        }
    }

    .fade:not(.show) {
        opacity: 0;
    }

    @page {
        size: 8.5in 11in;
        margin-footer: 5mm;
    }

</style>

<body>
    <div class='intro'>
        <img src='{{asset('/assets/logo.png')}}' width='80' height='80' style='float:left; margin-top:10px;'>

        <pre>
                        <b>Government of Pakistan
         Ministry of Faderal Education and Professional Training
        Private Education Institutions Regulatory Authority (PEIRA)
                        Islamabad Capital Territory</b>
                                        ******
            </pre>
    </div>

    <div class=''>
        <div class='p-0'>
            <div class='partial left'>
                <span class='span'>Form No.</span>
                <span class='form-control' style='font-size:18px;'>{{$data->reg_id}}</span>
            </div>
            <div class='partial right'>
                <span class='span'>Date:</span>
                <span class='form-control ' style='font-size:18px;'>{{date('Y-m-d')}}</span>
            </div>
        </div><br>
        <div class='p-0'>
            <span class='span'>Name of the Institution</span> <span style='font-size:11px; color:red;'>*</span><br>
            <input type='text' value='
                @if($data->inst_name == null && $data->fk_school_id != 1901)
                    {{$data->school_name}}
                @else
                    {{$data->inst_name}}
                @endif
            ' class='form-control test1' />
        </div>
        <div class='p-0'>
            <div class='partial left'>
                <span class='span'>Type of Institution</span> <span style='font-size:11px; color:red;'>*</span><br>
                <input class='form-control input' value='{{$data->inst_type}}'>
            </div>
            <div class='partial right'>
                <span class='span'>Medium of Institution</span> <span style='font-size:11px; color:red;'>*</span><br>
                <input class='form-control input' value='{{$data->medium_of_instruction}}'>
            </div>
        </div>
        <div class='p-0'>
            <div class='partial left '>
                <span class='span'>Teaching Level</span> <span style='font-size:11px; color:red;'>*</span><br>
                <input value='{{$data->teaching_level}}' class='test input'>
            </div>
            <div class='partial right '>
                <span class='span'>Union Council</span> <span style='font-size:11px; color:red;'>*</span><br>
                <input type='text' value='{{$data->union_council}}' class='form-control input' />
            </div>
        </div>
        <div class='p-0'>
            <div class='partial left '>
                <span class='span'>Zone/Sector</span> <span style='font-size:11px; color:red;'>*</span><br>
                <input type='text' name='area' value='{{$data->area}}' placeholder='Area'
                    class='form-control input' />
            </div>
            <div class='partial left'>
                <span class='span'>Street</span> <span style='font-size:11px; color:red;'>*</span><br>
                <input type='text' name='street' value='{{$data->street}}' placeholder='Street'
                    class='form-control input' />
            </div>
        </div>
        <div class='p-0 '>
            <span class='span'>Address</span> <span style='font-size:11px; color:red;'>*</span><br>
            <input type='text' name='address' value='{{$data->address}}' placeholder='Address'
                class='form-control test1' />
        </div>
        <br>
        <div class='p-0'>
            <span><b>GPS Coordinates</b></span> <span style='font-size:11px; color:red;'>*</span>
        </div>
        <div class='p-0'>
            <div class='partial right'>
                <span class='span'>Latitude</span> <br>
                <input type='text' name='latitude' value='{{$data->latitude}}' placeholder='Latitude'
                    class='form-control input' />
            </div>
            <div class='partial left'>
                <span class='span'>Longitude</span> <br>
                <input type='text' name='longitude' value='{{$data->longitude}}' placeholder='Longitude'
                    class='form-control input' />
            </div>
        </div>
        <div class='p-0'>
            <div class='partial left '>
                <span class='span'>Official Web Address of School/Institution</span> <span
                    style='font-size:11px; color:red;'>*</span><br>
                <input type='text' name='web_address' value='{{$data->web_address}}'
                    placeholder='Official Web Address of School/Institution' class='form-control input' />
            </div>
            <div class='partial right'>
                <span class='span'>Official E-mail Address of School/Institution</span> <span
                    style='font-size:11px; color:red;'>*</span><br>
                <input type='text' name='inst_email' value='{{$data->inst_email}}'
                    placeholder='Official E-mail Address of School/Institution' class='form-control input' />
            </div>
        </div>
        <div class='p-0'>
            <div class='partial left '>
                <span class='span'>Institution Contact</span> <span style='font-size:11px; color:red;'>*</span><br>
                <input type='number' name='inst_phone' value='{{$data->inst_phone}}'
                    placeholder='Institution Contact' class='form-control input' />
            </div>
            <div class='partial right'>
                <span class='span'>Institution Fax</span> <span style='font-size:11px; color:red;'>*</span><br>
                <input type='number' name='inst_fax' value='{{$data->inst_fax}}' placeholder='Institution Fax'
                    class='form-control input' />
            </div>
        </div>
        <div class='p-0'>
            <div class='partial left '>
                <span class='span'>Name of Head of the Institution</span> <span
                    style='font-size:11px; color:red;'>*</span>
                <input type='text' name='inst_head_name' value='{{$data->inst_head_name}}'
                    placeholder='Name of Head of the Institution' class='form-control input' />
            </div>
            <div class='partial right'>
                <span class='span'>Contact</span> <span style='font-size:11px; color:red;'>*</span>
                <input type='number' name='head_phone' value='{{$data->head_phone}}' placeholder='Contact'
                    class='form-control input' />
            </div>
        </div>
        <div class='p-0'>
            <div class='partial left'>
                <span class='span'>Fax</span> <span style='font-size:11px; color:red;'>*</span>
                <input type='number' name='head_fax' value='{{$data->head_fax}}' placeholder='Fax'
                    class='form-control input' />
            </div>
            <div class='partial right'>
                <span class='span'>E-mail</span> <span style='font-size:11px; color:red;'>*</span>
                <input type='email' name='head_email' value='{{$data->head_email}}' placeholder='E-mail'
                    class='form-control input' />
            </div>
        </div>
    </div>
    <br />
    <div class='p-0 '>
        <div class='divv '>
            <hr />
            <span for='facultystrength'> <b> Overall Faculty Strength in the School/Institute </b></span><br>
            <hr />
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th scope='col'>Qualification</th>
                        <th scope='col'>Male</th>
                        <th scope='col'>Female</th>
                        <th scope='col'>Total Faculty Strength</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope=''>Matriculation</th>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->matric_male}}' name='matric_male'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->matric_female}}' name='matric_female'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->matric_total}}' name='matric_total'></td>
                    </tr>
                    <tr>
                        <th scope=''>Intermediate</th>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->inter_male}}' name='inter_male'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->inter_female}}' name='inter_female'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->inter_total}}' name='inter_total'></td>
                    </tr>
                    <tr>
                        <th scope=''>Graduation {BSc/BA}</th>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->grad_male}}' name='grad_male'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->grad_female}}' name='grad_female'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->grad_total}}' name='grad_total'></td>
                    </tr>

                    <tr>
                        <th scope=''>Graduation {BS 4 Years}</th>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->grad4_male}}' name='grad4_male'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->grad4_female}}' name='grad4_female'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->grad4_total}}' name='grad4_total'></td>
                    </tr>



                    <tr>
                        <th scope=''>Post-Graduation {MA/MSc}</th>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->post_grad_male}}' name='post_grad_male'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->post_grad_female}}' name='post_grad_female'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->post_grad_total}}' name='post_grad_total'></td>
                    </tr>
                    <tr>
                        <th scope=''>MS/ M.Phill</th>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->ms_male}}' name='ms_male'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->ms_female}}' name='ms_female'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->ms_total}}' name='ms_total'></td>
                    </tr>
                    <tr>
                        <th scope=''>PhD</th>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->phd_male}}' name='phd_male'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->phd_female}}' name='phd_female'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->phd_total}}' name='phd_total'></td>
                    </tr>
                    <tr>
                        <th scope=''>Overall Faculty Strength</th>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->overall_male}}' name='overall_male'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->overall_female}}' name='overall_female'></td>
                        <td><input type='number' class='form-control' style='width:25%; font-size:20px'
                                value='{{$data->overall_total}}' name='overall_total'></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class='p-0'>
        <div class='divv '>
            <hr>
            <span for='studentsenrolled'><b>Students Enrollment in the School/Institute</b></span>
            <hr>
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th scope='col'>Gradewise Students Enrollment</th>
                        <th scope='col'>Male</th>
                        <th scope='col'>Female</th>
                        <th scope='col'>Total Student Strength</th>
                        <th scope='col'>Student-Teacher Ratio</th>
                        <th scope='col'>Type of Curriculum Adopted at each level</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope=''>Pre-School</th>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->pre_school_male}}' name='pre_school_male'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->pre_school_female}}' name='pre_school_female'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->pre_school_total}}' name='pre_school_total'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->pre_school_str}}' name='pre_school_str'></td>
                        <td><input type='number' class='form-control' style='width:30%; font-size:20px'
                                value='{{$data->pre_school_curriculum_type2}}' name='pre_school_curriculum_type'>
                        </td>
                    </tr>
                    <tr>
                        <th scope=''>Grade 1-5</th>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade1_5_male}}' name='grade1_5_male'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade1_5_female}}' name='grade1_5_female'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade1_5_total}}' name='grade1_5_total'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade1_5_str}}' name='grade1_5_str'></td>
                        <td><input type='number' class='form-control' style='width:30%; font-size:20px'
                                value='{{$data->grade1_5_curriculum_type2}}' name='grade1_5_curriculum_type'></td>
                    </tr>
                    <tr>
                        <th scope=''>Grade 6-8</th>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade6_8_male}}' name='grade6_8_male'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade6_8_female}}' name='grade6_8_female'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade6_8_total}}' name='grade6_8_total'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade6_8_str}}' name='grade6_8_str'></td>
                        <td><input type='number' class='form-control' style='width:30%; font-size:20px'
                                value='{{$data->grade6_8_curriculum_type2}}' name='grade6_8_curriculum_type'></td>
                    </tr>
                    <tr>
                        <th scope=''>Grade 9-10</th>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade9_10_male}}' name='grade9_10_male'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade9_10_female}}' name='grade9_10_female'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade9_10_total}}' name='grade9_10_total'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade9_10_str}}' name='grade9_10_str'></td>
                        <td><input type='number' class='form-control' style='width:30%; font-size:20px'
                                value='{{$data->grade9_10_curriculum_type2}}' name='grade9_10_curriculum_type'>
                        </td>
                    </tr>
                    <tr>
                        <th scope=''>Ordinary Level (1-3)</th>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->ordinary_level1_3_male}}' name='ordinary_level1_3_male'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->ordinary_level1_3_female}}' name='ordinary_level1_3_female'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->ordinary_level1_3_total}}' name='ordinary_level1_3_total'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->ordinary_level1_3_str}}' name='ordinary_level1_3_str'></td>
                        <td><input type='number' class='form-control' style='width:30%; font-size:20px'
                                value='{{$data->ordinary_level1_3_curriculum_type2}}'
                                name='ordinary_level1_3_curriculum_type'></td>
                    </tr>
                    <tr>
                        <th scope=''>Grade 11-12</th>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade11_12_male}}' name='grade11_12_male'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade11_12_female}}' name='grade11_12_female'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade11_12_total}}' name='grade11_12_total'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->grade11_12_str}}' name='grade11_12_str'></td>
                        <td><input type='number' class='form-control' style='width:30%; font-size:20px'
                                value='{{$data->grade11_12_curriculum_type2}}' name='grade11_12_curriculum_type'>
                        </td>
                    </tr>
                    <tr>
                        <th scope=''>Advanced Level (1-2)</th>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->advanced_level1_2_male}}' name='advanced_level1_2_male'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->advanced_level1_2_female}}' name='advanced_level1_2_female'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->advanced_level1_2_total}}' name='advanced_level1_2_total'></td>
                        <td><input type='number' class='form-control' style='width:20%; font-size:20px'
                                value='{{$data->advanced_level1_2_str}}' name='advanced_level1_2_str'></td>
                        <td><input type='number' class='form-control' style='width:30%; font-size:20px'
                                value='{{$data->advanced_level1_2_curriculum_type2}}'
                                name='advanced_level1_2_curriculum_type'></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br />
    <div class='p-0 '>
        <div class='divv '>
            <hr />
            <span for='curriculumandassessment'><b>Curriculum & Assessment (Examination) Mode of the
                    School/Institute</b></span>
            <hr />
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th scope='col'>Grade/Level</th>
                        <th scope='col'>Type of Curriculum Adopted at each level</th>
                        <th scope='col'>Examination Board</th>
                        <th scope='col'>Please state whether and how the institute is adhering to National Education
                            Policy of Government of Pakistan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope=''>Pre-School</th>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->pre_school_curriculum_type}}'>
                        </td>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->pre_school_exam_board}}'>

                        </td>
                        <td><input type='number' class='form-control' style='width:30%;font-size:20px'
                                value='{{$data->pre_school_inst_nep}}' name='pre_school_inst_nep'></td>
                    </tr>
                    <tr>
                        <th scope=''>Grade 1-5</th>
                        <td>
                            <input style='width:30%;  font-size:20px;' value='{{$data->grade1_5_curriculum_type}}'>
                        </td>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->grade1_5_exam_board}}'>
                        </td>
                        <td><input style='width:30%;  font-size:20px' type='number' class='form-control'
                                value='{{$data->grade1_5_inst_nep}}' name='grade1_5_inst_nep'></td>
                    </tr>
                    <tr>
                        <th scope=''>Grade 6-8</th>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->grade6_8_curriculum_type}}'>
                        </td>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->grade6_8_exam_board}}'>
                        </td>
                        <td><input style='width:30%;  font-size:20px' type='number' class='form-control'
                                value='{{$data->grade6_8_inst_nep}}' name='grade6_8_inst_nep'></td>
                    </tr>
                    <tr>
                        <th scope=''>Grade 9-10</th>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->grade9_10_curriculum_type}}'>

                        </td>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->grade9_10_exam_board}}'>

                        </td>
                        <td><input style='width:30%;  font-size:20px' type='number' class='form-control'
                                value='{{$data->grade9_10_inst_nep}}' name='grade9_10_inst_nep'></td>
                    </tr>
                    <tr>
                        <th scope=''>Ordinary Level (1-3)</th>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->ordinary_level1_3_curriculum_type}}'>
                        </td>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->ordinary_level1_3_exam_board}}'>
                        </td>
                        <td><input style='width:30%;  font-size:20px' type='number' class='form-control'
                                value='{{$data->ordinary_level1_3_inst_nep}}' name='ordinary_level1_3_inst_nep'>
                        </td>
                    </tr>
                    <tr>
                        <th scope=''>Grade 11-12</th>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->grade11_12_curriculum_type}}'>
                        </td>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->grade11_12_exam_board}}'>
                        </td>
                        <td><input style='width:30%;  font-size:20px' type='number' class='form-control'
                                value='{{$data->grade11_12_inst_nep}}' name='grade11_12_inst_type'></td>
                    </tr>
                    <tr>
                        <th scope=''>Advanced Level (1-2)</th>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->advanced_level1_2_curriculum_type}}'>
                        </td>
                        <td>
                            <input style='width:30%;  font-size:20px' value='{{$data->advanced_level1_2_exam_board}}'>
                        <td><input style='width:30%;  font-size:20px' type='number' class='form-control'
                                value='{{$data->advanced_level1_2_inst_nep}}' name='advanced_level1_2_inst_nep'>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class='p-0 ' style='margin-top:30px'>
        <div class=''>
            <br />
            <br />
            <br />
            <br />

            <hr />
            <b> Gross Area & Building</b>
            <hr />
            <div class='p-0'>
                <div class='partial left '>
                    <span class='span'>Type of Building</span> <span style='font-size:11px; color:red;'>*</span><br />
                    <input class='form-control ' style='width:70%; font-size:20px' value='{{$data->type_of_building}}'>
                </div>
                <div class='partial right'>
                    <span class='span' style='width=20%'>Status of Property Possession</span> <span
                        style='font-size:11px; color:red;'>*</span>
                    <input style='width=20%' value='{{$data->property_status}}' class='form-control input'>
                </div>
            </div>
            <br />
            <div class='divv '>
                <span class='span'>Total Area of the School/Institution Premises (in Square feets)</span> <span
                    style='font-size:11px; color:red;'>*</span><br />
                <input type='number' class='form-control' style='width:100%;font-size:20px' value='{{$data->total_area}}' name='total_area'>
            </div>
            <br />
            <div class='p-0 '>
                <span class='span'>Number of Classrooms</span> <span style='font-size:11px; color:red;'>*</span><br />
                <input type='number' class='form-control' value='{{$data->no_of_clasrooms}}'
                    style='width:100%; font-size:20px' name='no_of_clasrooms'>

            </div>
            <br />
            <div class='divv '>
                <span>Please mention any other allied facilities availabale on the premises</span> <span
                    style='font-size:11px; color:red;'>*</span><br>
                <ul>
                    <li>
                        <span class='checkbox-inline'><input type='checkbox' name='allied_facilities' 
                            @if($data->auditorium == 1){
                                checked='checked'
                            @endif
                        >Auditorium</span>
                    </li>
                    <li>
                        <span class='checkbox-inline'><input type='checkbox' 
                            @if($data->conference_room == 1){
                                checked='checked'
                            @endif
                        >Conference Room</span>
                    </li>
                    <li>
                        <span class='checkbox-inline'><input type='checkbox'
                            @if($data->tutorial_room == 1){
                                checked='checked'
                            @endif
                        >Tutorial Rooms</span>
                    </li>
                    <li>
                        <span class='checkbox-inline'><input type='checkbox' name='allied_facilities'
                            @if($data->exam_hall == 1){
                                checked='checked'
                            @endif
                        >Examination Halls</span>
                    </li>
                    <li>
                        <span class='checkbox-inline'><input type='checkbox' name='allied_facilities'
                            @if($data->ground_sports_room == 1){
                                checked='checked'
                            @endif
                        >Grounds Sports Rooms</span>
                    </li>
                    <li>
                        <span class='checkbox-inline'><input type='checkbox' name='allied_facilities'
                            @if($data->sports_room == 1){
                                checked='checked'
                            @endif
                        >Sports Rooms</span>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <span><b> School Library</b></span>
        <hr>
        <div class='p-0'>
            <div class='partial left '>
                <span class='span'>Reference Books Available in the Library</span><br>
                <input type='text' class='form-control input' value='{{$data->lib_reference_books}}'
                    name='lib_reference_books'>
            </div>
            <div class='partialright '>
                <span class='span'>Subscription to E-Library</span>
                <input type='text' class='form-control input' value='{{$data->lib_subscription}}'
                    name='lib_subscription'> <br>
            </div>
        </div>
        <br>
        <div class='p-0'>
            <div class='partial left'>
                <span class='span'>Subscription to Journals</span><br>
                <input type='text' class='form-control input' value='{{$data->lib_journals_subscription}}'
                    name='lib_journals_subscription'><br>
            </div>
            <div class='partial right'>
                <span class='span'>Please enlist any other resources and instructional material available in the
                    library</span>
                <textarea class='form-control input' name='lib_other_resources' value='' id='' cols='5' s='4'>{{$data->lib_other_resources}}</textarea>
            </div>
        </div>
        <hr>
        <span><b> Science Laboratories</b></span>
        <hr>
        <div class='p-0'>
            <div class='divv '>
                <span class='span'>Number of laboratory staff available in each laboratory</span><br>
                <input type='text' class='form-control input' value='{{$data->lab_available_staff}}'
                    name='lab_available_staff'> <br>
            </div>
            <div class='divv '>
                <span class='span'>Please enlist Laboratories Available on Premises</span>
                <input class='form-control input' value='{{$data->lab_available_laboratories}}'
                    name='lab_available_laboratories' id=''><br>
            </div>
            <div class='divv '>
                <span class='span'>Please enlist the equipment available in each laboratory</span>
                <input class='form-control input' value='{{$data->lab_available_equipments}}'
                    name='lab_available_equipments' id=''><br>
            </div>
            <div class='divv '>
                <span class='span'>Please enlist the safety equipment installed in each laboratory</span>
                <input class='form-control input' value='{{$data->lab_installed_safety_equipments}}'
                    name='lab_installed_safety_equipments' id=''> <br>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <span><b> Computer Laboratories</b></span>
        <hr>
        <div class='p-0'>
            <div class='divv '>
                <span class='span'>Number of Computers available in the laboratory</span><br>
                <input type='text ' class='form-control input' value='{{$data->no_of_computers}}'
                    name='no_of_computers'> <br>
            </div>
            <div class='divv '>
                <span class='span'>Please enlist the equipment Available in each Laboratory</span>
                <input class='form-control input' value='{{$data->comp_lab_equipments}}' name='comp_lab_equipments'
                    id=''><br>
            </div>
        </div>
    </div>
    <div class=' ' style='margin-left: ;'>
        <div class='divv '>
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th scope='col'>Transperency & Public Disclosure</th>
                        <th scope='col'>Yes</th>
                        <th scope='col'>No</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope=''>Whether the School/Institute has any other source of income</th>
                        <td><input type='radio' class='' value='Yes' name='fee_struc_policy'
                            @if($data->fee_struc_policy == 'Yes'){
                                checked='checked'
                            @endif
                        ></td>
                        <td><input type='radio' class='' value='No' name='fee_struc_policy'
                            @if($data->fee_struc_policy == 'No'){
                                checked='checked'
                            @endif
                        ></td>
                    </tr>
                    <tr>
                        <th scope=''>Whether the School has maintained a record of its income and expenditure</th>
                        <td><input type='radio' class='' value='Yes' name='scholarship_policy'
                            @if($data->scholarship_policy == 'Yes'){
                                checked='checked'
                            @endif
                        ></td>
                        <td><input type='radio' class='' value='No' name='scholarship_policy'
                            @if($data->scholarship_policy == 'No'){
                                checked='checked'
                            @endif
                        ></td>
                    </tr>


                    <tr>
                        <th scope=''>Whether the School/Institute has any other source of income</th>
                        <td><input type='radio' class='' value='Yes' name='other_source_of_income'
                            @if($data->other_source_of_income == 'Yes'){
                                checked='checked'
                            @endif
                        ></td>
                        <td><input type='radio' class='' value='No' name='other_source_of_income'
                            @if($data->other_source_of_income == 'No'){
                                checked='checked'
                            @endif
                        ></td>
                    </tr>
                    <tr>
                        <th scope=''>Whether the School has maintained a record of its income and expenditure</th>
                        <td><input type='radio' class='' value='Yes' name='income_expenditure_record'
                            @if($data->income_expenditure_record == 'Yes'){
                                checked='checked'
                            @endif
                        ></td>
                        <td><input type='radio' class='' value='No' name='income_expenditure_record'
                            @if($data->income_expenditure_record == 'No'){
                                checked='checked'
                            @endif
                        ></td>
                    </tr>
                    <tr>
                        <th scope=''>Whether the financial accounts of the School/Institute are properly audited by a
                            certified auditor</th>
                        <td><input type='radio' class='' value='Yes' name='properly_audited'
                            @if($data->properly_audited == 'Yes'){
                                checked='checked'
                            @endif
                        ></td>
                        <td><input type='radio' class='' value='No' name='properly_audited'
                            @if($data->properly_audited == 'No'){
                                checked='checked'
                            @endif
                        ></td>
                    </tr>
                    <tr>
                        <th scope=''>Whether the School/Institute has formulated and made punlic its academic calender
                            on prospectus and website</th>
                        <td><input type='radio' class='' value='Yes' name='public_calender'
                            @if($data->public_calender == 'Yes'){
                                checked='checked'
                            @endif
                        ></td>
                        <td><input type='radio' class='' value='No' name='public_calender'
                            @if($data->public_calender == 'No'){
                                checked='checked'
                            @endif
                        ></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
    <div class=' p-0'>
        <div class='divv '>
            <span class='span'>What is the Faculty to Administrative Staff's Ratio in the SchoolInstitution</span>
            <input class='form-control input' value='{{$data->faculty_admin_staff_ratio}}'
                name='faculty_admin_staff_ratio' id=''><br>
        </div>
        <div class='divv '>
            <span class='span'>Please enlist the Extra-Curricular Activities Conducted by the School/Institute on
                Regular Basis</span>
            <input class='form-control input' value='{{$data->extra_curricular_activities}}'
                name='extra_curricular_activities' id=''><br>
        </div>
        <div class='divv '>
            <span class='span'>Please enlist the Extra-Curricular Facilities Available on Premises of the
                School/Institution</span>
            <input class='form-control input' value='{{$data->extra_curricular_facilities}}'
                name='extra_curricular_facilities' id=''><br>
        </div>
    </div>
    <br><br><br><br>
    <div>
        <span class='span'> Name & Designation of Submitting Authority:__________________ </span>
    </div>
    <br><br>
    <div>
        <span class='span'> E-Signature:__________________ </span>
    </div>
    <br><br>
    <div>
        <span class='span'> Date of Submission: </span>
    </div>
</body>

</html>
