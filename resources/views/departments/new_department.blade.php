@extends('layouts.base')

@section('title', 'add new department')


@section('main')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><i class="fa fa-fw fa-file-word"></i>Add new department </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('departments') }}" class="breadcrumb-link">all departments</a></li>
                                <li class="breadcrumb-item active" aria-current="page"Add>new department</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card influencer-profile-data">
                    <div class="card-body">
                        <form method="POST" action="{{ route('new_dept') }}" id="validationform">
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"><i class="fa fa-file-word"></i>Add new department</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">department Name <span class="text-danger">*</span> </label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" name="department_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Faculty <span class="text-danger">*</span></label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select name="faculty_id" id="" class="form-control">
                                        <option disabled selected>Select the faculty</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{$faculty->id}}">{{ $faculty->faculty_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @csrf
                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                </div>
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection