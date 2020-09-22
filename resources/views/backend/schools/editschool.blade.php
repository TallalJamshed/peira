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
        <div class="card-body">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="School Name">
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection