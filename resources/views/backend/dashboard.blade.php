@extends('backend.template.template1')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>



    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Table</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered" id="reportDataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>ID</th>
                                <th>Index</th>
                                <th>isActive</th>
                                <th>Picture</th>
                                <th>tags</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $data = DB::table('data')->get();
                            @endphp
                            @foreach($data as $single)
                            <tr>
                                <td>{{$single->name}}</td>
                                <td>{{$single->id}}</td>
                                <td>{{$single->index_}}</td>
                                <td>{{$single->isActive}}</td>
                                <td>{{$single->picture}}</td>
                                <td>{{$single->tags1}} , {{$single->tags2}}</td>
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
