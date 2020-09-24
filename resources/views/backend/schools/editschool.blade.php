@extends('backend.template.template1')
@section('content')

    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit School</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-capitalize">Edit {{$school->inst_name}}</h6>
        </div>
        <form action="{{route('updateschool')}}" method="POST">
            @csrf
            <div class="card-body">
                {{-- Generall Information --}}
                <div class="row tab-box">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 note">
                                <b>Note:</b> Answer to each question should be clear and
                                definite.<br />
                                <hr />
                            </div>
                            
                            @if(session('response') && session('response')->has('general_error'))
                                <div class="col-md-12 note" style="color:red">
                                    <strong>{{session('response')->first()}}</strong>
                                </div>
                            @endif
                            @if(session('response') && session('file') && session('response')->has('form_success'))
                            <div class="col-md-12 note" style="color:green; background-color:rgb(195, 255, 195)">
                                <h6>{{session('response')->first()}}
                                    If Download does not start automatically please 
                                    <u><span style="color: black" id="file_download" data-url="{{env('APP_URL').'/storage/schoolpdf'.'/'.session('file')}}">Click This Link</a></u>.
                                </h6>
                            </div>
                            @endif
                            
                            <!-- <div class="col-md-12">
                                <input type="number" name="reg_id" value="{{$school->reg_id}}" hidden>
                                <label>Institutions List</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <select name="fk_school_id" id="fk_school_id" class="form-control" required>
                                    <option value="{{$school->school_id}}">{{$school->school_name}}</option>
                                    @foreach ($schools as $sch)
                                    <option value="{{$sch->school_id}}">{{$sch->school_name}}
                                    </option>
                                    @endforeach
                                </select>
                                <br />
                            </div> -->
                            <!-- <div id='inst_div' class="col-md-12" >
                                <span style="color: red">In Case of other institute please enter Institute Name manually.</span>
                                <br>
                                <label>Name of the Institution</label> 
                                <span style="font-size:11px; color:red;">*</span>
                                <input type="text" id="inst_name" name="inst_name" value="{{$school->inst_name}}" placeholder="Name" class="form-control" />
                                <br />
                            </div> -->
                            <div class="col-md-6">
                                <label>Type of Institution</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <select name="inst_type" value="" class="form-control" required>
                                    <option  value="{{$school->inst_type}}">{{$school->inst_type}}</option>
                                    <option value="school">School</option>
                                    <option value="college">College</option>
                                    <option value="tuition center">Tuition Centre</option>
                                    <option value="day care">Day-care Centre</option>
                                </select>
                                <br />
                            </div>
                            <div class="col-md-6">
                                <label>Medium of Instruction</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <select name="medium_of_instruction" value="" class="form-control" required>
                                    <option value="{{$school->medium_of_instruction}}">{{$school->medium_of_instruction}}</option>
                                    <option value="urdu">Urdu</option>
                                    <option value="english">English</option>
                                    <option value="other">Any other</option>
                                </select>
                                <br />
                            </div>
                            <div class="col-md-12">
                                <label>Teaching Level</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <select name="teaching_level"  class="form-control" required>
                                    <option value="{{$school->teaching_level}}">{{$school->teaching_level}}</option>
                                    <option value="junior">Junior School</option>
                                    <option value="primary">Primary</option>
                                    <option value="secondary">Secondary</option>
                                    <option value="higher_secondary">Higher Secondary</option>
                                </select>
                                <br />
                            </div>
                            <div class="col-md-3">
                                <label>Union Council</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="text" name="union_council" value="{{$school->union_council}}"
                                    placeholder="Union Council" class="form-control" required /><br />
                            </div>
                            <div class="col-md-3">
                                <label>Zone/Sector</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="text" name="area" value="{{$school->area}}" placeholder="Zone/Sector"
                                    class="form-control" required /><br />
                            </div>
                            <div class="col-md-3">
                                <label>Street</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="text" name="street" value="{{$school->street}}" placeholder="Street"
                                    class="form-control" required /><br />
                            </div>
                            <div class="col-md-3">
                                <label>Address</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="text" name="address" value="{{$school->address}}" placeholder="Address"
                                    class="form-control" required /><br />
                            </div>
                            <div class="col-md-2">
                                <label><b>GPS Coordinates</b></label>
                            </div>
                            <div class="col-md-5">
                                <label>Latitude</label><span
                                style="font-size:11px; color:red;">*</span>
                                <input type="number" min="0" step='any' name="latitude" value="{{$school->latitude}}" placeholder="Latitude"
                                    class="form-control" required /><br />
                            </div>
                            <div class="col-md-5">
                                <label>Longitude</label><span
                                style="font-size:11px; color:red;">*</span>
                                <input type="number" min="0" step='any' name="longitude" value="{{$school->longitude}}" placeholder="Longitude"
                                    class="form-control" required /><br />
                            </div>
                            <div class="col-md-6">
                                <label>Official Web Address of School</label>
                                <input type="text" name="web_address" value="{{$school->web_address}}"
                                    placeholder="Official Web Address of School/Institution"
                                    class="form-control" required /><br />
                            </div>
                            <div class="col-md-6">
                                <label>Official E-mail Address of School/Institution</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="email" name="inst_email" value="{{$school->inst_email}}"
                                    placeholder="Official E-mail Address of School/Institution"
                                    class="form-control" required /><br />
                            </div>

                            <div class="col-md-6">
                                <label>Institution Landline No/ Cell No</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="number" min="0" name="inst_phone" value="{{$school->inst_phone}}"
                                    placeholder="Institution Landline No/ Cell No" class="form-control" required /><br />
                            </div>
                            <div class="col-md-6">
                                <label>Institution Fax</label>
                                <input type="number" min="0" name="inst_fax" value="{{$school->inst_fax}}"
                                    placeholder="Institution Fax" class="form-control"  /><br />
                            </div>

                            <div class="col-md-12">
                                <label>Name of Head of the Institution</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="text" name="inst_head_name" value="{{$school->inst_head_name}}"
                                    placeholder="Name of Head of the Institution"
                                    class="form-control" required /><br />
                            </div>

                            <div class="col-md-6">
                                <label>Landline No/ Cell No</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="number" min="0" name="head_phone" value="{{$school->head_phone}}"
                                    placeholder="Landline No/ Cell No" class="form-control" required /><br />
                            </div>
                            <div class="col-md-6">
                                <label>Fax</label> 
                                <input type="text" min="0" name="head_fax" value="{{$school->head_fax}}" placeholder="Fax"
                                    class="form-control"  /><br />
                            </div>
                            <div class="col-md-12">
                                <label>E-mail</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="email" name="head_email" value="{{$school->head_email}}" placeholder="E-mail"
                                    class="form-control" required /><br />
                            </div>
                            <div class="col-md-6">
                                <label><b>School Status:</b></label>
                                <select name="status_reg" id="status_reg" class="form-control" >
                                    <option value="{{$school->status_reg}}">{{$school->status_reg}}</option>
                                    <option value="Registered">Registered</option>
                                    <option value="Applied For Renewal">Applied For Renewal</option>
                                    <option value="Never Applied For Registration">Never Applied For Registration</option>
                                    <option value="New Registration">New Registration</option>
                                    <option value="Registration expired before 5 years">Registration expired before 5 years</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label><b>Status Since:</b></label>
                                <input type="text" name="status_since" value="{{$school->status_since}}" placeholder="Status Since"
                                    class="form-control" /><br />
                            </div>
                            <div id='status_reg_div' class="col-md-12" style="">
                                {{-- code in backend footer scripts --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Generall Information --}}

                {{-- student and faculty strength --}}
                <div class="row tab-box">
                    <div class="col-md-12">
                        <hr />
                        <label for="facultystrength"> <b> Overall Faculty Strength in the
                                School/Institute </b></label>
                                <hr />
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Male</th>
                                    <th scope="col">Female</th>
                                    <th scope="col">Total Faculty Strength</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Matriculation</th>
                                    <td><input type="number" class="form-control"
                                            name="matric_male" value="{{$school->matric_male}}"></td>
                                    <td><input type="number" class="form-control"
                                            name="matric_female" value="{{$school->matric_female}}"></td>
                                    <td><input type="number" class="form-control"
                                            name="matric_total" value="{{$school->matric_total}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Intermediate</th>
                                    <td><input type="number" class="form-control" name="inter_male" value="{{$school->inter_male}}">
                                    </td>
                                    <td><input type="number" class="form-control"
                                            name="inter_female" value="{{$school->inter_female}}"></td>
                                    <td><input type="number" class="form-control"
                                            name="inter_total" value="{{$school->inter_total}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Graduation {BSc/BA}</th>
                                    <td><input type="number" class="form-control" name="grad_male" value="{{$school->grad_male}}">
                                    </td>
                                    <td><input type="number" class="form-control"
                                            name="grad_female" value="{{$school->grad_female}}"></td>
                                    <td><input type="number" class="form-control" name="grad_total" value="{{$school->grad_total}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Graduation {BS 4 Years}</th>
                                    <td><input type="number" class="form-control" name="grad4_male" value="{{$school->grad4_male}}">
                                    </td>
                                    <td><input type="number" class="form-control"
                                            name="grad4_female" value="{{$school->grad4_female}}"></td>
                                    <td><input type="number" class="form-control"
                                            name="grad4_total" value="{{$school->grad4_total}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Post-Graduation {MA/MSc}</th>
                                    <td><input type="number" class="form-control"
                                            name="post_grad_male" value="{{$school->post_grad_male}}"></td>
                                    <td><input type="number" class="form-control"
                                            name="post_grad_female" value="{{$school->post_grad_female}}"></td>
                                    <td><input type="number" class="form-control"
                                            name="post_grad_total" value="{{$school->post_grad_total}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">MS/ M.Phill</th>
                                    <td><input type="number" class="form-control" name="ms_male" value="{{$school->ms_male}}">
                                    </td>
                                    <td><input type="number" class="form-control" name="ms_female" value="{{$school->ms_female}}"> 
                                    </td>
                                    <td><input type="number" class="form-control" name="ms_total" value="{{$school->ms_total}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">PhD</th>
                                    <td><input type="number" class="form-control" name="phd_male" value="{{$school->phd_male}}">
                                    </td>
                                    <td><input type="number" class="form-control" name="phd_female" value="{{$school->phd_female}}">
                                    </td>
                                    <td><input type="number" class="form-control" name="phd_total" value="{{$school->phd_total}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Overall Faculty Strength</th>
                                    <td><input type="number" class="form-control"
                                            name="overall_male" value="{{$school->overall_male}}"></td>
                                    <td><input type="number" class="form-control"
                                            name="overall_female" value="{{$school->overall_female}}"></td>
                                    <td><input type="number" class="form-control"
                                            name="overall_total" value="{{$school->overall_total}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <label for="studentsenrolled"><b>Students Enrollment in the
                                    School/Institute</b></label>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Gradewise Students Enrollment</th>
                                        <th scope="col">Male</th>
                                        <th scope="col">Female</th>
                                        <th scope="col">Total Student Strength</th>
                                        <th scope="col">Student-Teacher Ratio</th>
                                        <th scope="col">Type of Curriculum Adopted at each level
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Pre-School</th>
                                        <td><input type="number" class="form-control"
                                                name="pre_school_male" value="{{$school->pre_school_male}}" ></td>
                                        <td><input type="number" class="form-control"
                                                name="pre_school_female" value="{{$school->pre_school_female}}" ></td>
                                        <td><input type="number" class="form-control"
                                                name="pre_school_total" value="{{$school->pre_school_total}}" ></td>
                                        <td><input type="number" class="form-control"
                                                name="pre_school_str" value="{{$school->pre_school_str}}" ></td>
                                        <td>
                                            <select class="form-control"
                                                name="pre_school_curriculum_type2" id="">
                                                <option value="{{$school->pre_school_curriculum_type2}}">{{$school->pre_school_curriculum_type2}}</option>
                                                <option value="national curriculum">National
                                                    Curriculum</option>
                                                <option value="cie">CIE</option>
                                                <option value="plc">PLC</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Grade 1-5</th>
                                        <td><input type="number" class="form-control"
                                                name="grade1_5_male" value="{{$school->grade1_5_male}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade1_5_female" value="{{$school->grade1_5_female}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade1_5_total" value="{{$school->grade1_5_total}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade1_5_str" value="{{$school->grade1_5_str}}"></td>
                                        <td>
                                            <select class="form-control"
                                                name="grade1_5_curriculum_type2" id="">
                                                <option  value="{{$school->grade1_5_curriculum_type2}}">{{$school->grade1_5_curriculum_type2}}</option>
                                                <option value="national curriculum">National
                                                    Curriculum</option>
                                                <option value="cie">CIE</option>
                                                <option value="plc">PLC</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Grade 6-8</th>
                                        <td><input type="number" class="form-control"
                                                name="grade6_8_male" value="{{$school->grade6_8_male}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade6_8_female" value="{{$school->grade6_8_female}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade6_8_total" value="{{$school->grade6_8_total}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade6_8_str" value="{{$school->grade6_8_str}}"></td>
                                        <td>
                                            <select class="form-control"
                                                name="grade6_8_curriculum_type2" id="">
                                                <option value="{{$school->grade6_8_curriculum_type2}}">{{$school->grade6_8_curriculum_type2}}</option>
                                                <option value="national curriculum">National
                                                    Curriculum</option>
                                                <option value="cie">CIE</option>
                                                <option value="plc">PLC</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Grade 9-10</th>
                                        <td><input type="number" class="form-control"
                                                name="grade9_10_male" value="{{$school->grade9_10_male}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade9_10_female" value="{{$school->grade9_10_female}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade9_10_total" value="{{$school->grade9_10_total}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade9_10_str" value="{{$school->grade9_10_str}}"></td>
                                        <td>
                                            <select class="form-control"
                                                name="grade9_10_curriculum_type2" id="">
                                                <option value="{{$school->grade9_10_curriculum_type2}}">{{$school->grade9_10_curriculum_type2}}</option>
                                                <option value="national curriculum">National
                                                    Curriculum</option>
                                                <option value="cie">CIE</option>
                                                <option value="plc">PLC</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ordinary Level (1-3)</th>
                                        <td><input type="number" class="form-control"
                                                name="ordinary_level1_3_male" value="{{$school->ordinary_level1_3_male}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="ordinary_level1_3_female" value="{{$school->ordinary_level1_3_female}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="ordinary_level1_3_total" value="{{$school->ordinary_level1_3_total}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="ordinary_level1_3_str" value="{{$school->ordinary_level1_3_str}}"></td>
                                        <td>
                                            <select class="form-control"
                                                name="ordinary_level1_3_curriculum_type2" id="">
                                                <option value="{{$school->ordinary_level1_3_curriculum_type2}}">{{$school->ordinary_level1_3_curriculum_type2}}</option>
                                                <option value="national curriculum">National
                                                    Curriculum</option>
                                                <option value="cie">CIE</option>
                                                <option value="plc">PLC</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Grade 11-12</th>
                                        <td><input type="number" class="form-control"
                                                name="grade11_12_male" value="{{$school->grade11_12_male}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade11_12_female" value="{{$school->grade11_12_female}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade11_12_total" value="{{$school->grade11_12_total}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="grade11_12_str" value="{{$school->grade11_12_str}}"></td>
                                        <td>
                                            <select class="form-control"
                                                name="grade11_12_curriculum_type2" id="">
                                                <option value="{{$school->grade11_12_curriculum_type2}}">{{$school->grade11_12_curriculum_type2}}</option>
                                                <option value="national curriculum">National
                                                    Curriculum</option>
                                                <option value="cie">CIE</option>
                                                <option value="plc">PLC</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Advanced Level (1-2)</th>
                                        <td><input type="number" class="form-control"
                                                name="advanced_level1_2_male" value="{{$school->advanced_level1_2_male}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="advanced_level1_2_female" value="{{$school->advanced_level1_2_female}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="advanced_level1_2_total" value="{{$school->advanced_level1_2_total}}"></td>
                                        <td><input type="number" class="form-control"
                                                name="advanced_level1_2_str" value="{{$school->advanced_level1_2_str}}"></td>
                                        <td>
                                            <select class="form-control"
                                                name="advanced_level1_2_curriculum_type2" id="">
                                                <option value="{{$school->advanced_level1_2_curriculum_type2}}">{{$school->advanced_level1_2_curriculum_type2}}</option>
                                                <option value="national curriculum">National
                                                    Curriculum</option>
                                                <option value="cie">CIE</option>
                                                <option value="plc">PLC</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <div class="col-md-12">
                                <button type="button" style="float:left;" class="btn btn-danger"
                                    onclick="backstep1()">Back</button>
                                <button type="button" id="step2btn" onclick="step2()"
                                    style="float:right;" class="btn btn-success">Next</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                {{--End student and faculty strength --}}
                
                {{-- Curriculum & Assessments --}}
                <div class="row tab-box">
                    <div class="col-md-12">
                        <hr />
                        <label for="curriculumandassessment"><b>Curriculum & Assessment
                                (Examination) Mode of the School/Institute</b></label>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Grade/Level</th>
                                    <th scope="col">Type of Curriculum Adopted at each level</th>
                                    <th scope="col">Examination Board</th>
                                    <th scope="col">Please state whether and how the institute is
                                        adhering to National Education Policy of Government of
                                        Pakistan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Pre-School</th>
                                    <td>
                                        <select class="form-control"
                                            name="pre_school_curriculum_type" id="">
                                            <option value="{{$school->pre_school_curriculum_type}}">{{$school->pre_school_curriculum_type}}</option>
                                            <option value="national curriculum">National Curriculum
                                            </option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="pre_school_exam_board"
                                            id="">
                                            <option value="{{$school->pre_school_exam_board}}">{{$school->pre_school_exam_board}}</option>
                                            <option value="bise">BISE</option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="pre_school_inst_nep" value="{{$school->pre_school_inst_nep}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Grade 1-5</th>
                                    <td>
                                        <select class="form-control" name="grade1_5_curriculum_type"
                                            id="">
                                            <option value="{{$school->grade1_5_curriculum_type}}">{{$school->grade1_5_curriculum_type}}</option>
                                            <option value="national_curriculum">National Curriculum
                                            </option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="grade1_5_exam_board"
                                            id="">
                                            <option value="{{$school->grade1_5_exam_board}}">{{$school->grade1_5_exam_board}}</option>
                                            <option value="bise">BISE</option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="grade1_5_inst_nep" value="{{$school->grade1_5_inst_nep}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Grade 6-8</th>
                                    <td>
                                        <select class="form-control" name="grade6_8_curriculum_type"
                                            id="">
                                            <option value="{{$school->grade6_8_curriculum_type}}">{{$school->grade6_8_curriculum_type}}</option>
                                            <option value="natioanl_curriculum">National Curriculum
                                            </option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="grade6_8_exam_board"
                                            id="">
                                            <option value="{{$school->grade6_8_exam_board}}">{{$school->grade6_8_exam_board}}</option>
                                            <option value="bise">BISE</option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="grade6_8_inst_nep" value="{{$school->grade6_8_inst_nep}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Grade 9-10</th>
                                    <td>
                                        <select class="form-control"
                                            name="grade9_10_curriculum_type" id="">
                                            <option value="{{$school->grade9_10_curriculum_type}}">{{$school->grade9_10_curriculum_type}}</option>
                                            <option value="natioanl_curriculum">National Curriculum
                                            </option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="grade9_10_exam_board"
                                            id="">
                                            <option value="{{$school->grade9_10_exam_board}}">{{$school->grade9_10_exam_board}}</option>
                                            <option value="bise">BISE</option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="grade9_10_inst_nep" value="{{$school->grade9_10_inst_nep}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Ordinary Level (1-3)</th>
                                    <td>
                                        <select class="form-control"
                                            name="ordinary_level1_3_curriculum_type" id="">
                                            <option value="{{$school->ordinary_level1_3_curriculum_type}}">{{$school->ordinary_level1_3_curriculum_type}}</option>
                                            <option value="national_curriculum">National Curriculum
                                            </option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control"
                                            name="ordinary_level1_3_exam_board" id="">
                                            <option value="{{$school->ordinary_level1_3_exam_board}}">{{$school->ordinary_level1_3_exam_board}}</option>
                                            <option value="bise">BISE</option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="ordinary_level1_3_inst_nep" value="{{$school->grade9_10_inst_nep}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Grade 11-12</th>
                                    <td>
                                        <select class="form-control"
                                            name="grade11_12_curriculum_type" id="">
                                            <option value="{{$school->grade11_12_curriculum_type}}">{{$school->grade11_12_curriculum_type}}</option>
                                            <option value="natioanl_curriculum">National Curriculum
                                            </option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="grade11_12_exam_board"
                                            id="">
                                            <option value="{{$school->grade11_12_exam_board}}">{{$school->grade11_12_exam_board}}</option>
                                            <option value="bise">BISE</option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="grade11_12_inst_nep" value="{{$school->grade11_12_inst_nep}}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Advanced Level (1-2)</th>
                                    <td>
                                        <select class="form-control"
                                            name="advanced_level1_2_curriculum_type" id="">
                                            <option value="{{$school->advanced_level1_2_curriculum_type}}">{{$school->advanced_level1_2_curriculum_type}}</option>
                                            <option value="natioanl_curriculum">National Curriculum
                                            </option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control"
                                            name="advanced_level1_2_exam_board" id="">
                                            <option value="{{$school->advanced_level1_2_exam_board}}">{{$school->advanced_level1_2_exam_board}}</option>
                                            <option value="bise">BISE</option>
                                            <option value="cie">CIE</option>
                                            <option value="plc">PLC</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="advanced_level1_2_inst_nep" value="{{$school->advanced_level1_2_inst_nep}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- End Curriculum & Assessments --}}
                
                {{-- Gross Area & Building --}}
                <div class="row tab-box">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 note">
                                <hr />
                                <b> Gross Area & Building</b><br />
                                <hr />
                            </div>
                            <div class="col-md-6">
                                <label>Type of Building</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <select class="form-control" name="type_of_building" id="">
                                    <option value="{{$school->type_of_building}}">{{$school->type_of_building}}</option>
                                    <option value="built">Purpose Built</option>
                                    <option value="residential">Residential</option>
                                    <option value="commercial">Commercial</option>
                                </select><br />
                            </div>
                            <div class="col-md-6">
                                <label>Status of Property Possession</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <select class="form-control" name="property_status" id="">
                                    <option value="{{$school->property_status}}">{{$school->property_status}}</option>
                                    <option value="owned">Owned</option>
                                    <option value="leased">Leased</option>
                                    <option value="rented">Rented</option>
                                </select>
                                <br />
                            </div>
                            <div class="col-md-6">
                                <label>Total Area of the School/Institution Premises (in Square
                                    feets)</label> <span style="font-size:11px; color:red;">*</span>
                                <input type="number" class="form-control" name="total_area" value="{{$school->total_area}}">
                                <br />
                            </div>
                            <div class="col-md-6">
                                <label>Number of Classrooms</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="number" class="form-control" name="no_of_clasrooms" value="{{$school->no_of_clasrooms}}">
                                <br />
                            </div>
                            <div class="col-md-6">
                                <label>Number of washrooms</label> <span
                                    style="font-size:11px; color:red;">*</span>
                                <input type="number" class="form-control" name="no_of_washrooms" value="{{$school->no_of_washrooms}}">
                                <br />
                            </div>
                            <div class="col-md-12">
                                <label>Please mention any other allied facilities availabale on the
                                    premises</label> <span
                                    style="font-size:11px; color:red;">*</span><br>
                                <ul>
                                    <li>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="auditorium"   
                                                @if(isset($school->auditorium) && $school->auditorium == 1){
                                                    checked='checked'
                                                @endif>Auditorium
                                            </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline"><input type="checkbox"
                                                name="conference_room" @if(isset($school->conference_room) && $school->conference_room == 1){
                                                                                checked='checked'
                                                                            @endif>Conference
                                                                                        Room</label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline"><input type="checkbox"
                                                name="tutorial_room" @if(isset($school->tutorial_room) && $school->tutorial_room == 1){
                                                                                checked='checked'
                                                                            @endif>Tutorial Rooms</label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline"><input type="checkbox"
                                                name="exam_hall" @if(isset($school->exam_hall) && $school->exam_hall == 1){
                                                                        checked='checked'
                                                                    @endif >Examination Halls</label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline"><input type="checkbox"
                                                name="ground_sports_room" @if(isset($school->ground_sports_room) && $school->ground_sports_room == 1){
                                                                                    checked='checked'
                                                                                @endif>Sports Grounds
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline"><input type="checkbox"
                                                name="sports_room" @if(isset($school->sports_room) && $school->sports_room == 1){
                                                                        checked='checked'
                                                                    @endif>Sports Rooms</label>
                                    </li>
                                    <li>
                                        <label class="checkbox-inline"><input type="checkbox"
                                                name="canteen" @if(isset($school->canteen) && $school->canteen == 1){
                                                                        checked='checked'
                                                                    @endif>Cafeteria/ Canteen</label>
                                    </li>
                                </ul><br /> 
                            </div>
                        </div>
                        <hr>
                        <label><b> School Library</b></label>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Number of Reference Books Available in the Library</label>
                                <input type="number" class="form-control" name="lib_reference_books" value="{{$school->lib_reference_books}}">
                            </div>
                            <div class="col-md-6">
                                <label>Subscription to E-Library</label>
                                <input type="text" class="form-control" name="lib_subscription" value="{{$school->lib_subscription}}">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label>Subscription to Journals</label>
                                <input type="text" class="form-control"
                                    name="lib_journals_subscription" value="{{$school->lib_journals_subscription}}"><br>
                            </div>
                            <div class="col-md-12">
                                <label>Please enlist any other resources and instructional material
                                    available in the library</label>
                                <textarea class="form-control" name="lib_other_resources"  id=""
                                    cols="5" rows="4">{{$school->lib_other_resources}}</textarea>
                            </div>
                        </div>
                        <hr>
                        <label><b> Science Laboratories</b></label>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Number of laboratory staff available in each
                                    laboratory</label>
                                <input type="text" class="form-control" name="lab_available_staff" value="{{$school->lab_available_staff}}">
                                <br>
                            </div>
                            <div class="col-md-12">
                                <label>Please enlist Laboratories Available on Premises</label>
                                <textarea class="form-control" name="lab_available_laboratories" 
                                    id="" cols="5" rows="5">{{$school->lab_available_laboratories}}</textarea><br>
                            </div>
                            <div class="col-md-12">
                                <label>Please enlist the equipment available in each
                                    laboratory</label>
                                <textarea class="form-control" name="lab_available_equipments"  id=""
                                    cols="5" rows="5">{{$school->lab_available_equipments}}</textarea><br>
                            </div>
                            <div class="col-md-12">
                                <label>Please enlist the safety equipment installed in each
                                    laboratory</label>
                                <textarea class="form-control"
                                    name="lab_installed_safety_equipments"  id="" cols="5"
                                    rows="4">{{$school->lab_installed_safety_equipments}}</textarea> <br>
                            </div>
                        </div>
                        <hr>
                        <label><b> Computer Laboratories</b></label>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Number of Computers available in the laboratory</label>
                                <input type="number" class="form-control" name="no_of_computers" value="{{$school->no_of_computers}}"> <br>
                            </div>
                            <div class="col-md-6">
                                <label>Number of Computers in working condition</label>
                                <input type="number" class="form-control" name="working_computers" value="{{$school->working_computers}}"> <br>
                            </div>
                            <div class="col-md-12">
                                <label>Please enlist the equipment Available in each
                                    Laboratory</label>
                                <textarea class="form-control" name="comp_lab_equipments"  id=""
                                    cols="5" rows="5">{{$school->comp_lab_equipments}}</textarea><br>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End Gross Area & Building --}}

                {{-- Transperency and public disclosure --}}
                <div class="row tab-box">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Transparency & Public Disclosure</th>
                                    <th scope="col">Yes</th>
                                    <th scope="col">No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Whether the School/Institute has made public its
                                        fee structure and policy for annual increase</th>
                                    <td><input type="radio" class="" value="Yes"
                                            name="fee_struc_policy"
                                            @if($school->fee_struc_policy == 'Yes'){
                                                        checked='checked'
                                                    @endif></td>
                                    <td><input type="radio" class="" value="No"
                                            name="fee_struc_policy" 
                                            @if($school->fee_struc_policy == 'No'){
                                                        checked='checked'
                                                    @endif></td>
                                </tr>
                                <tr>
                                    <th scope="row">Whether the School/Institute has devised and
                                        made public its Scholarship Policy</th>
                                    <td><input type="radio" class="" value="Yes"
                                            name="scholarship_policy" 
                                            @if($school->scholarship_policy == 'Yes'){
                                                            checked='checked'
                                                        @endif></td>
                                    <td><input type="radio" class="" value="No"
                                            name="scholarship_policy"
                                            @if($school->scholarship_policy == 'No'){
                                                            checked='checked'
                                                        @endif></td>
                                </tr>
                                <tr>
                                    <th scope="row">Whether the School/Institute has any other
                                        source of income</th>
                                    <td><input type="radio" class="" value="Yes"
                                            name="other_source_of_income" 
                                            @if($school->other_source_of_income == 'Yes'){
                                                        checked='checked'
                                                    @endif></td>
                                    <td><input type="radio" class="" value="No"
                                            name="other_source_of_income" 
                                            @if($school->other_source_of_income == 'No'){
                                                    checked='checked'
                                                @endif></td>
                                </tr>
                                <tr>
                                    <th scope="row">Whether the School has maintained a record of
                                        its income and expenditure</th>
                                    <td><input type="radio" class="" value="Yes"
                                            name="income_expenditure_record" 
                                            @if($school->income_expenditure_record == 'Yes'){
                                                            checked='checked'
                                                        @endif></td>
                                    <td><input type="radio" class="" value="No"
                                            name="income_expenditure_record" 
                                            @if($school->income_expenditure_record == 'No'){
                                                        checked='checked'
                                                    @endif></td>
                                </tr>
                                <tr>
                                    <th scope="row">Whether the financial accounts of the
                                        School/Institute are properly audited by a certified auditor
                                    </th>
                                    <td><input type="radio" class="" value="Yes"
                                            name="properly_audited" 
                                            @if($school->properly_audited == 'Yes'){
                                                            checked='checked'
                                                        @endif></td>
                                    <td><input type="radio" class="" value="No"
                                            name="properly_audited" 
                                            @if($school->properly_audited == 'No'){
                                                        checked='checked'
                                                    @endif></td>
                                </tr>
                                <tr>
                                    <th scope="row">Whether the School/Institute has formulated and
                                        made punlic its academic calender on prospectus and website
                                    </th>
                                    <td><input type="radio" class="" value="Yes"
                                            name="public_calender" 
                                            @if($school->public_calender == 'Yes'){
                                                        checked='checked'
                                                    @endif></td>
                                    <td><input type="radio" class="" value="No"
                                            name="public_calender" 
                                            @if($school->public_calender == 'No'){
                                                        checked='checked'
                                                    @endif></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- End Transperency and public disclosure --}}

                {{-- Overall faculty strength --}}
                <div class="row tab-box">
                    <div class="col-md-12">
                    <hr />
                        <label for="facultystrength"> <b> Overall Faculty Strength in the
                                School/Institute </b></label>
                                <hr />
                        <label>What is the Faculty to Administrative Staff's Ratio in the
                            School/Institution</label>
                        <textarea class="form-control md-textarea" name="faculty_admin_staff_ratio"
                        id="" cols="4" rows="2">{{$school->faculty_admin_staff_ratio}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Please enlist the Extra-Curricular Activities Conducted by the
                            School/Institute on Regular Basis</label>
                        <textarea class="form-control md-textarea"
                            name="extra_curricular_activities"  id="" cols="4" rows="4">{{$school->extra_curricular_activities}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Please enlist the Extra-Curricular Facilities Available on Premises
                            of the School/Institution</label>
                        <textarea class="form-control md-textarea"
                            name="extra_curricular_facilities"  id="" cols="4" rows="4">{{$school->extra_curricular_facilities}}</textarea>
                    </div>
                </div>
                {{--End Overall faculty strength --}}

                <div class="col-md-12" style="    margin-top: 0%;">
                    <input type="submit" name="submit" style="float:right;"
                        class="btn btn-success" value="Submit Form" />
                </div>
            </div>
        </form>   
    </div>
</div>
<!-- /.container-fluid -->
@endsection