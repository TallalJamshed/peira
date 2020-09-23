@extends('frontend.templates.template1')
@section('content')
@isset($file)
    <meta http-equiv="refresh" content="5;url=@php print_r($file) @endphp">
@endif
<section class="page-section portfolio" id="rform">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Application Form</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <section id="tabs">
            <div class="container">
                <form action="{{route('saveregform')}}" method="POST" id="regform">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 ">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link nav-style active" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home"
                                        aria-selected="true">General Information</a>

                                    <a class="nav-item nav-link nav-style" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">Faculty & Students</a>

                                    <a class="nav-item nav-link nav-style" id="nav-contact-tab" data-toggle="tab"
                                        href="#nav-contact" role="tab" aria-controls="nav-contact"
                                        aria-selected="false">Curriculum & Assessment</a>

                                    <a class="nav-item nav-link nav-style" id="nav-about-tab" data-toggle="tab"
                                        href="#nav-about" role="tab" aria-controls="nav-about"
                                        aria-selected="false">Infrastructure & Facilities</a>

                                    <a class="nav-item nav-link nav-style" id="nav-tandp-tab" data-toggle="tab"
                                        href="#nav-tandp" role="tab" aria-controls="nav-tandp"
                                        aria-selected="false">Transparency & Public Disclosure</a>

                                    <a class="nav-item nav-link nav-style" id="nav-overallstrength-tab"
                                        data-toggle="tab" href="#nav-overallstrength" role="tab"
                                        aria-controls="nav-overallstrength" aria-selected="false">Strength &
                                        co-Curricular Facilities</a>
                                </div>
                            </nav>

                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
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
                                                        <u><span style="color: black" id="file_download" data-url="{{'Http://localhost/peiraadmin/storage/schoolpdf/'.session('file')}}">Click This Link</a></u>.
                                                    </h6>
                                                </div>
                                                @endif
                                                
                                                <div class="col-md-12">
                                                    <label>Institutions List</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <select name="fk_school_id" id="fk_school_id" class="form-control gen_info" required>
                                                        <option>Select Institute</option>
                                                        @foreach ($schools as $school)
                                                        <option value="{{$school->school_id}}">{{$school->school_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <br />
                                                </div>
                                                <div id='inst_div' class="col-md-12" style="background-color: rgb(255, 194, 194)">
                                                    {{-- code in footer scripts --}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Type of Institution</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <select name="inst_type" value="{{old('inst_type')}}" class="form-control gen_info" required>
                                                        <option></option>
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
                                                    <select name="medium_of_instruction" value="{{old('medium_of_instruction')}}" class="form-control gen_info" required>
                                                        <option></option>
                                                        <option value="urdu">Urdu</option>
                                                        <option value="english">English</option>
                                                        <option value="other">Any other</option>
                                                    </select>
                                                    <br />
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Teaching Level</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <select name="teaching_level" value="{{old('teaching_level')}}" class="form-control gen_info" required>
                                                        <option></option>
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
                                                    <input type="text" name="union_council" value="{{old('union_council')}}"
                                                        placeholder="Union Council" class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Zone/Sector</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="text" name="area" value="{{old('area')}}" placeholder="Zone/Sector"
                                                        class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Street</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="text" name="street" value="{{old('street')}}" placeholder="Street"
                                                        class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Address</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="text" name="address" value="{{old('address')}}" placeholder="Address"
                                                        class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>GPS Coordinates</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" min="0" step='any' name="latitude" value="{{old('latitude')}}" placeholder="Latitude"
                                                        class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" min="0" step='any' name="longitude" value="{{old('longitude')}}" placeholder="Longitude"
                                                        class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Official Web Address of School</label>
                                                    <input type="text" name="web_address" value="{{old('web_address')}}"
                                                        placeholder="Official Web Address of School/Institution"
                                                        class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Official E-mail Address of School/Institution</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="email" name="inst_email" value="{{old('inst_email')}}"
                                                        placeholder="Official E-mail Address of School/Institution"
                                                        class="form-control gen_info" required /><br />
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Institution Contact</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="number" min="0" name="inst_phone" value="{{old('inst_phone')}}"
                                                        placeholder="Institution Contact" class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Institution Fax</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="number" min="0" name="inst_fax" value="{{old('inst_fax')}}"
                                                        placeholder="Institution Fax" class="form-control gen_info" required /><br />
                                                </div>

                                                <div class="col-md-12">
                                                    <label>Name of Head of the Institution</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="text" name="inst_head_name" value="{{old('inst_head_name')}}"
                                                        placeholder="Name of Head of the Institution"
                                                        class="form-control gen_info" required /><br />
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Landline Number</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="number" min="0" name="head_phone" value="{{old('head_phone')}}"
                                                        placeholder="Landline text" class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Fax</label> <span style="font-size:11px; color:red;">*</span>
                                                    <input type="text" min="0" name="head_fax" value="{{old('head_fax')}}" placeholder="Fax"
                                                        class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-12">
                                                    <label>E-mail</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="email" name="head_email" value="{{old('head_email')}}" placeholder="E-mail"
                                                        class="form-control gen_info" required /><br />
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" style="float:right;" id="mybutton"
                                                        onclick="step1()" class="btn btn-success">Next</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="row tab-box">
                                        <div class="col-md-12">
                                            <label for="facultystrength"> <b> Overall Faculty Strength in the
                                                    School/Institute </b></label><br><br>
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
                                                                value="{{old('matric_male')}}" name="matric_male"></td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('matric_female')}}" name="matric_female"></td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('matric_total')}}" name="matric_total"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Intermediate</th>
                                                        <td><input type="number" class="form-control" value="{{old('inter_male')}}" name="inter_male">
                                                        </td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('inter_female')}}" name="inter_female"></td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('inter_total')}}" name="inter_total"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Graduation {BSc/BA}</th>
                                                        <td><input type="number" class="form-control" value="{{old('grad_male')}}" name="grad_male">
                                                        </td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('grad_female')}}" name="grad_female"></td>
                                                        <td><input type="number" class="form-control" value="{{old('grad_total')}}" name="grad_total">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Graduation {BS 4 Years}</th>
                                                        <td><input type="number" class="form-control" value="{{old('grad4_male')}}" name="grad4_male">
                                                        </td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('grad4_female')}}" name="grad4_female"></td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('grad4_total')}}" name="grad4_total"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Post-Graduation {MA/MSc}</th>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('post_grad_male')}}" name="post_grad_male"></td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('post_grad_female')}}" name="post_grad_female"></td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('post_grad_total')}}" name="post_grad_total"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">MS/ M.Phill</th>
                                                        <td><input type="number" class="form-control" value="{{old('ms_male')}}" name="ms_male">
                                                        </td>
                                                        <td><input type="number" class="form-control" value="{{old('ms_female')}}" name="ms_female">
                                                        </td>
                                                        <td><input type="number" class="form-control" value="{{old('ms_total')}}" name="ms_total">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">PhD</th>
                                                        <td><input type="number" class="form-control" value="{{old('phd_male')}}" name="phd_male">
                                                        </td>
                                                        <td><input type="number" class="form-control" value="{{old('phd_female')}}" name="phd_female">
                                                        </td>
                                                        <td><input type="number" class="form-control" value="{{old('phd_total')}}" name="phd_total">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Overall Faculty Strength</th>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('overall_male')}}" name="overall_male"></td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('overall_female')}}" name="overall_female"></td>
                                                        <td><input type="number" class="form-control"
                                                                value="{{old('overall_total')}}" name="overall_total"></td>
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
                                                                    value="{{old('pre_school_male')}}" name="pre_school_male"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('pre_school_female')}}" name="pre_school_female"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('pre_school_total')}}" name="pre_school_total"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('pre_school_str')}}" name="pre_school_str"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="pre_school_curriculum_type2" id="">
                                                                    <option value=""></option>
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
                                                                    value="{{old('grade1_5_male')}}" name="grade1_5_male"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('grade1_5_female')}}" name="grade1_5_female"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('grade1_5_total')}}" name="grade1_5_total"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('grade1_5_str')}}" name="grade1_5_str"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="grade1_5_curriculum_type2" id="">
                                                                    <option value=""></option>
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
                                                                    value="{{old('grade6_8_male')}}" name="grade6_8_male"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('grade6_8_female')}}" name="grade6_8_female"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('grade6_8_total')}}" name="grade6_8_total"></td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{old('grade6_8_str')}}" name="grade6_8_str"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="grade6_8_curriculum_type2" id="">
                                                                    <option value=""></option>
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
                                                                   value="{{old('grade9_10_male')}}" name="grade9_10_male"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('grade9_10_female')}}" name="grade9_10_female"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('grade9_10_total')}}" name="grade9_10_total"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('grade9_10_str')}}" name="grade9_10_str"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="grade9_10_curriculum_type2" id="">
                                                                    <option value=""></option>
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
                                                                   value="{{old('ordinary_level1_3_male')}}" name="ordinary_level1_3_male"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('ordinary_level1_3_female')}}" name="ordinary_level1_3_female"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('ordinary_level1_3_total')}}" name="ordinary_level1_3_total"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('ordinary_level1_3_str')}}" name="ordinary_level1_3_str"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="ordinary_level1_3_curriculum_type2" id="">
                                                                    <option value=""></option>
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
                                                                   value="{{old('grade11_12_male')}}" name="grade11_12_male"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('grade11_12_female')}}" name="grade11_12_female"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('grade11_12_total')}}" name="grade11_12_total"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('grade11_12_str')}}" name="grade11_12_str"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="grade11_12_curriculum_type2" id="">
                                                                    <option value=""></option>
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
                                                                   value="{{old('advanced_level1_2_male')}}" name="advanced_level1_2_male"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('advanced_level1_2_female')}}" name="advanced_level1_2_female"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('advanced_level1_2_total')}}" name="advanced_level1_2_total"></td>
                                                            <td><input type="number" class="form-control"
                                                                   value="{{old('advanced_level1_2_str')}}" name="advanced_level1_2_str"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="advanced_level1_2_curriculum_type2" id="">
                                                                    <option value=""></option>
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
                                                <div class="col-md-12">
                                                    <button type="button" style="float:left;" class="btn btn-danger"
                                                        onclick="backstep1()">Back</button>
                                                    <button type="button" id="step2btn" onclick="step2()"
                                                        style="float:right;" class="btn btn-success">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <div class="row tab-box">
                                        <div class="col-md-12">
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
                                                                <option value=""></option>
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
                                                                <option value=""></option>
                                                                <option value="bise">BISE</option>
                                                                <option value="cie">CIE</option>
                                                                <option value="plc">PLC</option>
                                                                <option value="other">Other</option>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                name="pre_school_inst_nep" value="{{old('pre_school_inst_nep')}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Grade 1-5</th>
                                                        <td>
                                                            <select class="form-control" name="grade1_5_curriculum_type"
                                                                id="">
                                                                <option value=""></option>
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
                                                                <option value=""></option>
                                                                <option value="bise">BISE</option>
                                                                <option value="cie">CIE</option>
                                                                <option value="plc">PLC</option>
                                                                <option value="other">Other</option>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                name="grade1_5_inst_nep" value="{{old('grade1_5_inst_nep')}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Grade 6-8</th>
                                                        <td>
                                                            <select class="form-control" name="grade6_8_curriculum_type"
                                                                id="">
                                                                <option value=""></option>
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
                                                                <option value=""></option>
                                                                <option value="bise">BISE</option>
                                                                <option value="cie">CIE</option>
                                                                <option value="plc">PLC</option>
                                                                <option value="other">Other</option>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                name="grade6_8_inst_nep" value="{{old('grade6_8_inst_nep')}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Grade 9-10</th>
                                                        <td>
                                                            <select class="form-control"
                                                                name="grade9_10_curriculum_type" id="">
                                                                <option value="{{old('union_council')}}"></option>
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
                                                                <option value="{{old('union_council')}}"></option>
                                                                <option value="bise">BISE</option>
                                                                <option value="cie">CIE</option>
                                                                <option value="plc">PLC</option>
                                                                <option value="other">Other</option>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                name="grade9_10_inst_nep" value="{{old('grade9_10_inst_nep')}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Ordinary Level (1-3)</th>
                                                        <td>
                                                            <select class="form-control"
                                                                name="ordinary_level1_3_curriculum_type" id="">
                                                                <option value="{{old('union_council')}}"></option>
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
                                                                <option value="{{old('union_council')}}"></option>
                                                                <option value="bise">BISE</option>
                                                                <option value="cie">CIE</option>
                                                                <option value="plc">PLC</option>
                                                                <option value="other">Other</option>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                name="ordinary_level1_3_inst_nep" value="{{old('ordinary_level1_3_inst_nep')}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Grade 11-12</th>
                                                        <td>
                                                            <select class="form-control"
                                                                name="grade11_12_curriculum_type" id="">
                                                                <option value="{{old('union_council')}}"></option>
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
                                                                <option value="{{old('union_council')}}"></option>
                                                                <option value="bise">BISE</option>
                                                                <option value="cie">CIE</option>
                                                                <option value="plc">PLC</option>
                                                                <option value="other">Other</option>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                name="grade11_12_inst_nep" value="{{old('grade11_12_inst_nep')}}"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Advanced Level (1-2)</th>
                                                        <td>
                                                            <select class="form-control"
                                                                name="advanced_level1_2_curriculum_type" id="">
                                                                <option value="{{old('union_council')}}"></option>
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
                                                                <option value="{{old('union_council')}}"></option>
                                                                <option value="bise">BISE</option>
                                                                <option value="cie">CIE</option>
                                                                <option value="plc">PLC</option>
                                                                <option value="other">Other</option>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                name="advanced_level1_2_inst_nep" value="{{old('advanced_level1_2_inst_nep')}}"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-md-12">
                                                <button type="button" style="float:left;" onclick="backstep2()"
                                                    class="btn btn-danger">Back</button>
                                                <button type="button" style="float:right;" id="step3btn"
                                                    onclick="step3()" class="btn btn-success">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
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
                                                        <option value="{{old('union_council')}}"></option>
                                                        <option value="built">Purpose Built</option>
                                                        <option value="residential">Residential</option>
                                                        <option value="commercial">Commercial</option>
                                                    </select><br />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status of Property Possession</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <select class="form-control" name="property_status" id="">
                                                        <option value="{{old('union_council')}}"></option>
                                                        <option value="owned">Owned</option>
                                                        <option value="leased">Leased</option>
                                                        <option value="rented">Rented</option>
                                                    </select>
                                                    <br />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Total Area of the School/Institution Premises (in Square
                                                        feets)</label> <span style="font-size:11px; color:red;">*</span>
                                                    <input type="number" class="form-control" name="total_area" value="{{old('total_area')}}">
                                                    <br />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Number of Classrooms</label> <span
                                                        style="font-size:11px; color:red;">*</span>
                                                    <input type="number" class="form-control" name="no_of_clasrooms" value="{{old('no_of_clasrooms')}}">
                                                    <br />
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Please mention any other allied facilities availabale on the
                                                        premises</label> <span
                                                        style="font-size:11px; color:red;">*</span><br>
                                                    <ul>
                                                        <li>
                                                            <label class="checkbox-inline"><input type="checkbox"
                                                                    name="auditorium" value="true">Auditorium</label>
                                                        </li>
                                                        <li>
                                                            <label class="checkbox-inline"><input type="checkbox"
                                                                    name="conference_room" value="true">Conference
                                                                Room</label>
                                                        </li>
                                                        <li>
                                                            <label class="checkbox-inline"><input type="checkbox"
                                                                    name="tutorial_room" value="true">Tutorial Rooms</label>
                                                        </li>
                                                        <li>
                                                            <label class="checkbox-inline"><input type="checkbox"
                                                                    name="exam_hall" value="true">Examination Halls</label>
                                                        </li>
                                                        <li>
                                                            <label class="checkbox-inline"><input type="checkbox"
                                                                    name="ground_sports_room" value="true">Sports Grounds
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="checkbox-inline"><input type="checkbox"
                                                                    name="sports_room" value="true">Sports Rooms</label>
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
                                                    <input type="number" class="form-control"  value="{{old('lib_reference_books')}}" name="lib_reference_books">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Subscription to E-Library</label>
                                                    <input type="text" class="form-control" value="{{old('lib_subscription')}}" name="lib_subscription">
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Subscription to Journals</label>
                                                    <input type="text" class="form-control"
                                                        value="{{old('lib_journals_subscription')}}" name="lib_journals_subscription"><br>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Please enlist any other resources and instructional material
                                                        available in the library</label>
                                                    <textarea class="form-control" value="{{old('lib_other_resources')}}" name="lib_other_resources" id=""
                                                        cols="5" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <label><b> Science Laboratories</b></label>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Number of laboratory staff available in each
                                                        laboratory</label>
                                                    <input type="text" class="form-control" value="{{old('lab_available_staff')}}" name="lab_available_staff">
                                                    <br>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Please enlist Laboratories Available on Premises</label>
                                                    <textarea class="form-control" value="{{old('lab_available_laboratories')}}" name="lab_available_laboratories"
                                                        id="" cols="5" rows="5"></textarea><br>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Please enlist the equipment available in each
                                                        laboratory</label>
                                                    <textarea class="form-control" value="{{old('lab_available_equipments')}}" name="lab_available_equipments" id=""
                                                        cols="5" rows="5"></textarea><br>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Please enlist the safety equipment installed in each
                                                        laboratory</label>
                                                    <textarea class="form-control"
                                                        value="{{old('lab_installed_safety_equipments')}}" name="lab_installed_safety_equipments" id="" cols="5"
                                                        rows="4"></textarea> <br>
                                                </div>
                                            </div>
                                            <hr>
                                            <label><b> Computer Laboratories</b></label>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Number of Computers available in the laboratory</label>
                                                    <input type="number" class="form-control" value="{{old('no_of_computers')}}" name="no_of_computers"> <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Number of Computers in working condition</label>
                                                    <input type="number" class="form-control" value="{{old('working_computers')}}" name="working_computers"> <br>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Please enlist the equipment Available in each
                                                        Laboratory</label>
                                                    <textarea class="form-control" value="{{old('comp_lab_equipments')}}" name="comp_lab_equipments" id=""
                                                        cols="5" rows="5"></textarea><br>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" style="float:left;" onclick="backstep3()"
                                                        class="btn btn-danger">Back</button>
                                                    <button type="button" style="float:right;" id="step4btn"
                                                        onclick="step4()" class="btn btn-success">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-tandp" role="tabpanel"
                                    aria-labelledby="nav-tandp-tab">
                                    <div class="row tab-box">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Yes</th>
                                                        <th scope="col">No</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Whether the School/Institute has made public its
                                                            fee structure and policy for annual increase</th>
                                                        <td><input type="radio" class="" value="Yes"
                                                                name="fee_struc_policy"></td>
                                                        <td><input type="radio" class="" value="No"
                                                                name="fee_struc_policy"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Whether the School/Institute has devised and
                                                            made public its Scholarship Policy</th>
                                                        <td><input type="radio" class="" value="Yes"
                                                                name="scholarship_policy"></td>
                                                        <td><input type="radio" class="" value="No"
                                                                name="scholarship_policy"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Whether the School/Institute has any other
                                                            source of income</th>
                                                        <td><input type="radio" class="" value="Yes"
                                                                name="other_source_of_income"></td>
                                                        <td><input type="radio" class="" value="No"
                                                                name="other_source_of_income"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Whether the School has maintained a record of
                                                            its income and expenditure</th>
                                                        <td><input type="radio" class="" value="Yes"
                                                                name="income_expenditure_record"></td>
                                                        <td><input type="radio" class="" value="No"
                                                                name="income_expenditure_record"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Whether the financial accounts of the
                                                            School/Institute are properly audited by a certified auditor
                                                        </th>
                                                        <td><input type="radio" class="" value="Yes"
                                                                name="properly_audited"></td>
                                                        <td><input type="radio" class="" value="No"
                                                                name="properly_audited"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Whether the School/Institute has formulated and
                                                            made punlic its academic calender on prospectus and website
                                                        </th>
                                                        <td><input type="radio" class="" value="Yes"
                                                                name="public_calender"></td>
                                                        <td><input type="radio" class="" value="No"
                                                                name="public_calender"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-md-12">
                                                <button type="button" style="float:left;" onclick="backstep4()"
                                                    class="btn btn-danger">Back</button>
                                                <button type="button" style="float:right;" id="step5btn"
                                                    onclick="step5()" class="btn btn-success">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-overallstrength" role="tabpanel"
                                    aria-labelledby="nav-overallstrength-tab">

                                    <div class="row tab-box">
                                        <div class="col-md-12">
                                            <label>What is the Faculty to Administrative Staff's Ratio in the
                                                School/Institution</label>
                                            <textarea class="form-control md-textarea" value="{{old('faculty_admin_staff_ratio')}}" name="faculty_admin_staff_ratio"
                                                id="" cols="4" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Please enlist the Extra-Curricular Activities Conducted by the
                                                School/Institute on Regular Basis</label>
                                            <textarea class="form-control md-textarea"
                                                value="{{old('extra_curricular_activities')}}" name="extra_curricular_activities" id="" cols="4" rows="4"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Please enlist the Extra-Curricular Facilities Available on Premises
                                                of the School/Institution</label>
                                            <textarea class="form-control md-textarea"
                                                value="{{old('extra_curricular_facilities')}}" name="extra_curricular_facilities" id="" cols="4" rows="4"></textarea>
                                        </div>
                                        <div class="col-md-12" style="    margin-top: 3%;">
                                            <button type="button" style="float:left;" onclick="backstep5()"
                                                class="btn btn-danger">Back</button>
                                            <input type="submit" id="form-sub"  name="save" style="float:right;"
                                                class="btn btn-success" value="Save Form" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade bg-danger" id="savemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Important Notice !!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Before final Submission, please be advised to check your provided particulars and information carefully as after final Submission,
                    you will not be able to amend any uploaded record. You will be notified through sms and email. You may track your case for registration
                    by login into web portal or through our mobile app.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-Danger" id="saveform" type="button" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
