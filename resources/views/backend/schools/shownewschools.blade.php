@extends('backend.template.template1')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Schools</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Schools</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>School Name</th>
                            <th>Head Name</th>
                            <th>School Level</th>
                            <th style="width:130px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schools as $school)
                        <tr>
                            <td>{{$school->inst_name}}</td>
                            <td>{{$school->inst_head_name}}</td>
                            <td>{{$school->teaching_level}}</td>
                            <td>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a class="btn btn-sm btn-warning" href="{{route('editschool',$school->reg_id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-success">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
